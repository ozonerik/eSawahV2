<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Sawah;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Sawahs extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $perPage=5;
    public $selectPage = false;
    public $checked = [];
    public $search='';
    public $mode='read';
    public $ids,$nosawah,$namasawah,$luas,$lokasi,$latlang,$b_barat,$b_utara,$b_timur,$b_selatan,$namapenjual,$img,$user_id,$hargabeli;
    public $oldpath,$newpath;
    public $filename="Choose File";
    public $p1,$l1,$p2,$l2,$la,$m,$ls1,$ls2,$ls3,$ls4;
    protected $listeners = [
        'delsawah',
        'delsawahselect'
    ];
    
    //jangan gunakan variabel dengan nama rules dan messages 
 

     // Batas Awal Fungsi Tabel
    public function getSawahProperty(){
        $searchQuery = trim($this->search);
        $requestData = ['nosawah','namasawah','luas','lokasi','latlang','b_barat','b_utara','b_timur','b_selatan','namapenjual','hargabeli',];
        return Sawah::where(function($q) use($requestData, $searchQuery) {
            foreach ($requestData as $field)
               $q->orWhere($field, 'like', "%{$searchQuery}%");
        })->where('id',Auth::user()->id)->paginate($this->perPage,['*'], 'sawahPage');

        //return Info::where('title','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'infoPage');
    }
    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->Sawah->pluck('id')->toArray();
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
        $data['Sawah'] = $this->Sawah;
        return view('livewire.backend.sawahs',$data)->extends('layouts.app');
    }
    // Batas Akhir Fungsi Tabel

    public function updatedP1($value){
        $this->kalkulatorsawah();
    }
    public function updatedL1($value){
        $this->kalkulatorsawah();
    }
    public function updatedP2($value){
        $this->kalkulatorsawah();
    }
    public function updatedL2($value){
        $this->kalkulatorsawah();
    }
    public function updatedLa($value){
            $this->m=get_sisiMsegi3($this->p1,$this->l2,$this->la); 
            $this->kalkulatorsawah();
    }
    public function updatedM($value){
        $this->kalkulatorsawah();
    }

    public function kalkulatorsawah(){
        $p1=$this->p1;
        $l1=$this->l1;
        $p2=$this->p2;
        $l2=$this->l2;
        $la=$this->la;
        $m=$this->m;
        
        if(empty($p2)||empty($l2)){
            $this->ls1=get_conluas($p1*$l1);
            $this->ls2=get_conluas($p1*$l1);
            $this->ls3= get_convtobata($p1*$l1);
            $this->ls4= get_convtobata($p1*$l1);
        }elseif(!empty($m)){
            $ls1=get_luassegi4($p1,$l1,$p2,$l2,$m);
            $ls2=get_luassegi4($p1,$l1,$p2,$l2,$m);
            $this->ls1=get_conluas($ls1);
            $this->ls2=get_conluas($ls2);
            $this->ls3= get_convtobata($ls1);
            $this->ls4= get_convtobata($ls2);
        }else{
            $ls1=get_luaspersegi($p1,$l1,$p2,$l2);
            $this->ls1=get_conluas($ls1);
            $this->ls2="";
            $this->ls3= get_convtobata($ls1);
            $this->ls4="";
        }

    }

}
