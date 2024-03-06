<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Pawongan;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Pawongans extends Component
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
    public $ids,$nik,$nama,$alamat,$telp,$photo;
    public $oldpath,$newpath,$tmpphoto;
    public $filename="Choose File";
    protected $listeners = [
        'delpawongan',
        'delpawonganselect'
    ];

    //jangan gunakan variabel dengan nama rules dan messages 


    // Batas Awal Fungsi Tabel
    public function getPawonganProperty(){
        $searchQuery = trim($this->search);
        $requestData = ['nik', 'nama', 'alamat','lokasi'];
        return Pawongan::where(function($q) use($requestData, $searchQuery) {
            foreach ($requestData as $field)
            $q->orWhere($field, 'like', "%{$searchQuery}%");
        })->orderBy('updated_at', 'DESC')->where('user_id',Auth::user()->id)->paginate($this->perPage,['*'], 'pawonganPage');

        //return Info::where('title','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'infoPage');
    }
    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->Pawongan->pluck('id')->toArray();
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
        $data['Pawongan'] = $this->Pawongan;
        return view('livewire.backend.pawongans',$data)->extends('layouts.app');
    }
    // Batas Akhir Fungsi Tabel

    private function deletefile($pathfile){
        if(Storage::disk('public')->exists($pathfile)){
            Storage::disk('public')->delete($pathfile);
        }
    }

    private function hapusfile($id){
        $this->oldpath = Pawongan::findOrFail($id)->photo;
        //dd($this->oldpath);
        $dir='pawongan'; 
        if(!empty($this->oldpath)){
            $this->deletefile($this->oldpath);
        }
    }

    public function hapusfileselect()
    {
        $pawongan = Pawongan::whereIn('id', $this->checked)->get();
        foreach($pawongan as $q)
        {
            if(!empty( $q->photo )){
                $this->deletefile( $q->photo );
            }
        }
    }

    private function resetForm()
    {
        $this->ids='';
        $this->nik='';
        $this->nama='';
        $this->alamat='';
        $this->telp='';
        $this->photo=null;
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

    public function updatedPhoto($value){
        if($value){
            $this->filename=$value->getClientOriginalName();
        }else{
            $this->filename="Choose File";
        }
    }

    public function addpawongan(){
        //dd($this->img);
        $dir='pawongan'; 
        if(!empty($this->photo)){
            $this->validate(
            [ 
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'photo' => 'image|max:1024'
            ]);
            $this->newpath=$this->photo->store($dir,'public');
            $pawongan=Pawongan::updateOrCreate(['id' => $this->ids], [
                'nik' => $this->nik,
                'nama' => $this->nama,
                'alamat' => $this->alamat,
                'telp' => $this->telp,
                'photo' => $this->newpath,
                'user_id' => Auth::user()->id,
            ]);
        }else{
            $this->validate(
                [ 
                    'nik' => 'required|digits:16',
                    'nama' => 'required',
                ]);
                $pawongan=Pawongan::updateOrCreate(['id' => $this->ids], [
                    'nik' => $this->nik,
                    'nama' => $this->nama,
                    'alamat' => $this->alamat,
                    'telp' => $this->telp,
                    'user_id' => Auth::user()->id,
                ]);
        }  

        //flash message
        $this->alert('success', 'Pawongan berhasil ditambahkan');
        //session()->flash('success', 'Info terbaru berhasil ditambahkan');
        //redirect
        return redirect()->route('pawongans');
    }

    public function onDelete($id){
        $this->ids=$id;
        $pawongan = Pawongan::whereIn('id',[$id]);
        $this->confirm("Apakah anda yakin ingin hapus ?<p class='text-danger font-weight-bold'>".$pawongan->pluck('nama')->implode(',<br>')."</p>", 
        [
            'onConfirmed' => 'delpawongan'
        ]);
    }

    public function delpawongan()
    {
        $this->hapusfile($this->ids);
        Pawongan::findOrFail($this->ids)->delete();
        //reset form
        $this->resetForm();
        //flash message
        $this->alert('success', 'Pawongan berhasil dihapus');
        //session()->flash('success', 'Info berhasil dihapus');
        //redirect
        return redirect()->route('pawongans');
    }

    public function onDelSelect(){
        $pawongan = Pawongan::whereIn('id',$this->checked);
        $this->confirm("Apakah anda yakin ingin hapus ?<p class='text-danger font-weight-bold'>".$pawongan->pluck('nama')->implode(', ')."</p>", 
        [
            'onConfirmed' => 'delpawonganselect'
        ]);
    }

    public function delpawonganselect()
    {
        $this->hapusfileselect();
        Pawongan::whereIn('id',$this->checked)->delete();
        //reset form
        $this->resetForm();
        //flash message
        $this->alert('success', 'Pawongan berhasil dihapus');
        //session()->flash('success', 'User berhasil dihapus');
        //redirect
        return redirect()->route('pawongans');
    }

    public function onEdit($id){
        $this->mode='edit';
        $this->ids=$id;
        $pawongan = Pawongan::findOrFail($id);
        $this->nik = $pawongan->nik;
        $this->nama = $pawongan->nama;
        $this->alamat = $pawongan->alamat;
        $this->telp = $pawongan->telp;
        $this->photo = $pawongan->photo;
        $this->tmpphoto=$pawongan->photo;    
    }

    public function editpawongan()
    {     
        $dir='pawongan'; 
        $this->validate(
            [ 
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'photo' => 'image|max:1024'
            ]);
        if(!empty($this->photo)){
            $this->hapusfile($this->ids);
            $this->newpath=$this->photo->store($dir,'public');
        }else{
            $this->newpath=Pawongan::findOrFail($this->ids)->photo;
        }
        
        $pawongan=Pawongan::updateOrCreate(['id' => $this->ids], [
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'telp' => $this->telp,
            'photo' => $this->newpath,
            'user_id' => Auth::user()->id,
        ]);

        //flash message
        $this->alert('success', 'Pawongan berhasil diupdate');
        //session()->flash('success', 'Info berhasil diupdate');
        //redirect
        return redirect()->route('pawongans');
    }
}
