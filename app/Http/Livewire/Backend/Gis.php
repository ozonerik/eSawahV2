<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Spatie\Geocoder\Geocoder;

class Gis extends Component
{
    protected $listeners = [
        'getLatlangInput',
    ];

    public $latlang,$luas,$luasbata,$keliling,$lokasi;
    public $mode='read';
    public $map_id = 0;
    public $hgpadi;
    public $lanja;
    public $lanjakw;
    public $lanjarp;

    public function mount(){
        $this->resetForm();
    }

    public function getLatlangInput($data)
    {
        $this->latlang=$data['lat'].','.$data['long'];
        $this->lokasi=$this->onGetGeocoder($data['lat'],$data['long']);
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

    public function postAdded($value){
        dd($value);
    }

    private function resetForm(){
        $this->dispatchBrowserEvent('resetLocation',['map_id' => $this->map_id]);
        $this->latlang='';
        $this->map_id=0;
        $this->luas=0;
        $this->luasbata=0;
        $this->keliling=0;
        $this->hgpadi=get_hargapadi();
        $this->lanja=get_nilailanja();
        $this->lanjakw=get_lanja($this->luas,$this->lanja);
        $this->lanjarp=get_nlanja($this->luas,$this->lanja,$this->hgpadi);
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
         $this->validate(
             [ 
                 'luas' => 'numeric|nullable',
                 'luasbata' => 'numeric|nullable',
                 'hgpadi' => 'required|numeric',
                 'lanja' => 'required|numeric',
             ]);
            $luas=$this->luas;
            $luasbata=$this->luasbata;
            $hgpadi=$this->hgpadi;
            $lanja=$this->lanja;
            $this->lanjakw= get_lanja($luas,$lanja);
            $this->lanjarp= get_nlanja($luas,$lanja,$hgpadi);
    }

    public function onReset(){
        $this->resetForm();
    }

    public function onGetGeocoder($lat,$lng){
        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));
        $g=collect($geocoder->getAddressForCoordinates($lat,$lng));
        $lokasi= $g->get('formatted_address');
        return $lokasi;
    }
    
    public function render()
    {
        return view('livewire.backend.gis')->extends('layouts.app');
    }
}
