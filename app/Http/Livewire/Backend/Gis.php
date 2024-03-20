<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Gis extends Component
{
    protected $listeners = [
        'getLatlangInput',
        'onGetAdress',
        'getMeasure'
    ];

    public $latlang,$luas,$luasbata,$keliling,$lokasi;
    public $mode='read';
    public $map_id = 0;
    public $hgpadi;
    public $lanja;
    public $lanjakw;
    public $lanjarp;

    //autocomplete address

    public function onGetAdress(){
        $this->dispatchBrowserEvent('getaddress',['map_id' => $this->map_id]);    
    }
    //end autocomplete address
    
    public function mount(){
        //$this->emit('postAdded', 'hallo');
        $this->resetForm();
    }

    public function getMeasure($data){
        //dd($data);
        $this->luas=($data['ls']);
        $this->luasbata= round(floatval($this->luas/14.00),2);
        $this->keliling=($data['kl']);
        $this->onHitung();
    }

    public function getLatlangInput($data)
    {
        if($data['lat']==0 || $data['long']==0){
            $this->latlang='';
            $this->lt=0;
            $this->lg=0;
        }else{
            $this->latlang=$data['lat'].','.$data['long'];
            $this->lt=$data['lat'];
            $this->lg=$data['long'];
        }
   
        if(empty($data['lokasi'])){
            //$geocoder=geo_alamat($data['lat'],$data['long']);
            $geocoder=google_alamat($data['lat'],$data['long']);
            if($geocoder !== 'result_not_found'){
                $this->lokasi=  $geocoder ;
            }else{
                $this->lokasi=  '' ;
                $this->dispatchBrowserEvent('getaddress',[
                    'map_id' => $this->map_id,
                    'lt' => 0,
                    'lg' => 0,
                    'kordinat' => '',
                ]);   
            }    
        }else{
            $this->lokasi=$data['lokasi'];
            $this->map_id++;
            $this->dispatchBrowserEvent('getaddress',[
                'map_id' => $this->map_id,
                'lt' => $data['lat'],
                'lg' => $data['long'],
                'kordinat' => $this->latlang,
            ]);
        }
    }

    public function onGetlokasi(){
        $this->map_id++;
        $this->dispatchBrowserEvent('getLocation',['map_id' => $this->map_id]);
    }

    public function getResetlocation($data)
    {
        $this->latlang='';
    }


    public function onRead(){
        $this->mode='read';
        $this->resetForm();
    }

    private function resetForm(){
        $this->dispatchBrowserEvent('resetLocation',['map_id' => $this->map_id]);
        $this->latlang='';
        $this->lokasi='';
        $this->map_id=0;
        $this->luas=0;
        $this->luasbata=0;
        $this->keliling=0;
        $this->hgpadi=get_hargapadi();
        $this->lanja=get_nilailanja();
        $this->lanjakw=0;
        $this->lanjarp=0;
/*         $this->lanjakw=get_lanja($this->luas,$this->lanja);
        $this->lanjarp=get_nlanja($this->luas,$this->lanja,$this->hgpadi); */
    }

    public function updatedLuas($value){
        $this->luasbata= get_Nconvtobata($this->luas);
        $this->onHitung();
    }
    public function updatedLuasbata($value){
        $this->luas= get_NBatatoluas($this->luasbata);
        $this->onHitung();
    }
    public function updatedHgpadi($value){
        //dd($value);
        $this->onHitung();
    }
    public function updatedLanja($value){
        //dd($value);
        $this->onHitung();
    }

    public function onHitung(){
/*          $this->validate(
             [ 
                 'luas' => 'numeric|nullable',
                 'luasbata' => 'numeric|nullable',
                 'hgpadi' => 'required|numeric',
                 'lanja' => 'required|numeric',
             ]); */
            $luas=$this->luas;
            $luasbata=$this->luasbata;
            $hgpadi=$this->hgpadi;
            $lanja=$this->lanja;
            //$this->lanjakw=5;
            $this->lanjakw= get_lanja($luas,$lanja);
            $this->lanjarp= get_nlanja($luas,$lanja,$hgpadi);
    }

    public function onReset(){
        $this->resetForm();
    }
    
    public function render()
    {
        $this->dispatchBrowserEvent('run_maskcurrency');
        return view('livewire.backend.gis')->extends('layouts.app');
    }
}
