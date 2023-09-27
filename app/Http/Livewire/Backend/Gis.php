<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Gis extends Component
{
    protected $listeners = [
        'getLatlangInput',
    ];

    public $latlang,$luas,$luasbata,$keliling,$lanjakw,$lanjarp;
    public $mode='read';
    public $map_id = 0;
    public $hgpadi="750000";
    public $lanja="5";

    public function getLatlangInput($data)
    {
        $this->latlang=$data['lat'].','.$data['long'];
    }

    public function onGetlokasi(){
        $this->map_id++;
        $this->dispatchBrowserEvent('getLocation',['map_id' => $this->map_id]);
    }

    public function onRead(){
        $this->mode='read';
        $this->resetForm();
    }

    public function postAdded($value){
        dd($value);
    }

    private function resetForm(){
        $this->latlang='';
        $this->luas='0';
        $this->luasbata='0';
        $this->keliling='0';
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

    public function render()
    {
        return view('livewire.backend.gis')->extends('layouts.app');
    }
}
