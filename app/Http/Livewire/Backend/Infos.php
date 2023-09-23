<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Info;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Infos extends Component
{
    // Batas Awal Fungsi Tabel
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $perPage=5;
    public $selectPage = false;
    public $checked = [];
    public $search='';
    public $mode='read';
    public $ids,$title,$message,$img;
    public $oldpath,$newpath,$tmpimg;
    public $filename="Choose File";
    protected $listeners = [
        'delinfo',
        'delinfoselect'
    ];
    
    //jangan gunakan variabel dengan nama rules dan messages 
 

     // Batas Awal Fungsi Tabel
    public function getInfoProperty(){
        $searchQuery = trim($this->search);
        $requestData = ['title', 'message'];
        return Info::where(function($q) use($requestData, $searchQuery) {
            foreach ($requestData as $field)
               $q->orWhere($field, 'like', "%{$searchQuery}%");
        })->orderBy('updated_at', 'DESC')->paginate($this->perPage,['*'], 'infoPage');

        //return Info::where('title','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'infoPage');
    }
    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->Info->pluck('id')->toArray();
        }else{
            $this->checked = [];
        }
    }
    public function updatedChecked($value){
        $this->selectPage=false;
    }
    public function is_checked($id){
        return in_array($id,$this->checked);
    }
    public function render()
    {
        //dd($this->Info);
        $data['Info'] = $this->Info;
        return view('livewire.backend.infos',$data)->extends('layouts.app');
    }
    // Batas Akhir Fungsi Tabel
    
    private function deletefile($pathfile){
        if(Storage::disk('public')->exists($pathfile)){
            Storage::disk('public')->delete($pathfile);
        }
    }

    private function hapusfile($id){
        $this->oldpath = Info::findOrFail($id)->img;
        //dd($this->oldpath);
        $dir='info'; 
        if(!empty($this->oldpath)){
            $this->deletefile($this->oldpath);
        }
    }

    public function hapusfileselect()
    {
        $info = Info::whereIn('id', $this->checked)->get();
        foreach($info as $q)
        {
            if(!empty( $q->img )){
                $this->deletefile( $q->img );
            }
        }
    }

    private function resetForm()
    {
        $this->ids='';
        $this->title='';
        $this->message='';
        $this->img=null;
        $this->resetErrorBag();
        $this->resetValidation();

    }

    public function onRead(){
        $this->mode='read';
    }

    public function onAdd(){
        $this->mode='add';
        $this->resetForm();
    }

    public function updatedImg($value){
        if($value){
            $this->filename=$value->getClientOriginalName();
        }else{
            $this->filename="Choose File";
        }
    }
    
    public function addinfo(){
        //dd($this->img);
        $dir='info'; 
        if(!empty($this->img)){
            $this->validate(
            [ 
                'title' => 'required|min:4|max:255',
                'message' => 'required|min:4|max:255',
                'img' => 'image|max:1024'
            ]);
            $this->newpath=$this->img->store($dir,'public');
            $info=Info::updateOrCreate(['id' => $this->ids], [
                'title' => $this->title,
                'message' => $this->message,
                'img' => $this->newpath,
            ]);
        }else{
            $this->validate(
                [ 
                    'title' => 'required|min:4|max:255',
                    'message' => 'required|min:4|max:255',
                ]);
                $info=Info::updateOrCreate(['id' => $this->ids], [
                    'title' => $this->title,
                    'message' => $this->message,
                ]);
        }  

        //flash message
        $this->alert('success', 'Info berhasil ditambahkan');
        //session()->flash('success', 'Info terbaru berhasil ditambahkan');
        //redirect
        return redirect()->route('infos');
    }

    public function onDelete($id){
        $this->ids=$id;
        $info = Info::whereIn('id',[$id]);
        $this->confirm("Apakah anda yakin ingin hapus ?<p class='text-danger font-weight-bold'>".$info->pluck('title')->implode(',<br>')."</p>", 
        [
            'onConfirmed' => 'delinfo'
        ]);
    }

    public function delinfo()
    {
        $this->hapusfile($this->ids);
        Info::findOrFail($this->ids)->delete();
        //reset form
        $this->resetForm();
        //flash message
        $this->alert('success', 'Info berhasil dihapus');
        //session()->flash('success', 'Info berhasil dihapus');
        //redirect
        return redirect()->route('infos');
    }

    public function onDelSelect(){
        $info = Info::whereIn('id',$this->checked);
        $this->confirm("Apakah anda yakin ingin hapus ?<p class='text-danger font-weight-bold'>".$info->pluck('title')->implode(', ')."</p>", 
        [
            'onConfirmed' => 'delinfoselect'
        ]);
    }

    public function delinfoselect()
    {
        $this->hapusfileselect();
        Info::whereIn('id',$this->checked)->delete();
        //reset form
        $this->resetForm();
        //flash message
        $this->alert('success', 'Info berhasil dihapus');
        //session()->flash('success', 'User berhasil dihapus');
        //redirect
        return redirect()->route('infos');
    }

    public function onEdit($id){
        $this->mode='edit';
        $this->ids=$id;
        $info = Info::findOrFail($id);
        $this->title = $info->title;
        $this->message = $info->message;
        $this->img = $info->img;
        $this->tmpimg=$info->img;    
    }

    public function editinfo()
    {     
        $dir='info'; 
        $this->validate(
            [ 
                'title' => 'required|min:4|max:255',
                'message' => 'required|min:4|max:255',
                'img' => 'nullable|image|max:1024'
            ]);
        if(!empty($this->img)){
            $this->hapusfile($this->ids);
            $this->newpath=$this->img->store($dir,'public');
        }else{
            $this->newpath=Info::findOrFail($this->ids)->img;
        }
        
        $info=Info::updateOrCreate(['id' => $this->ids], [
            'title' => $this->title,
            'message' => $this->message,
            'img' => $this->newpath,
        ]);

        //flash message
        $this->alert('success', 'Info berhasil diupdate');
        //session()->flash('success', 'Info berhasil diupdate');
        //redirect
        return redirect()->route('infos');
    }


}
