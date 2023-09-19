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
    public $oldpath,$newpath;
    
    //jangan gunakan variabel dengan nama rules dan messages 
 

     // Batas Awal Fungsi Tabel
    public function getInfoProperty(){
        $searchQuery = trim($this->search);
        $requestData = ['title', 'message'];
        return Info::where(function($q) use($requestData, $searchQuery) {
            foreach ($requestData as $field)
               $q->orWhere($field, 'like', "%{$searchQuery}%");
        })->paginate($this->perPage,['*'], 'infoPage');

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

    public function onRead(){
        $this->mode='read';
    }

    public function onAdd(){
        $this->mode='add';
        $this->title='';
        $this->message='';
    }

    public function addinfo(){
        //dd($this->img);
        $validatedData = $this->validate(
        [ 
            'title' => 'required|min:4|max:255',
            'message' => 'required|min:4|max:255',
            'img' => 'required|image|max:1024'
        ]);

        if ($validatedData->fails()) {
            session()->flash('img',$validatedData->errors()->first('img'));
            return redirect()->route('infos');
        }

        $dir='info'; 
        $this->newpath=$this->img->store($dir,'public');

        //dd($this->message);

        $info=Info::updateOrCreate(['id' => $this->ids], [
            'title' => $this->title,
            'message' => $this->message,
            'img' => $this->newpath,
        ]);

        //flash message
        session()->flash('success', 'Info terbaru berhasil ditambahkan');
        //redirect
        return redirect()->route('infos');

    }

}
