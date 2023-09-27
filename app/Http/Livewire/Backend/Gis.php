<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Gis extends Component
{
    protected $listeners = [
        'getLatlangInput',
    ];

    public $latlang,$luas,$keliling;
    public $mode='read';
    public $map_id = 0;

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

    private function resetForm(){
        $this->latlang='';
        $this->luas='0';
        $this->keliling='0';
    }

    public function onHitung(){
        dd($this->latlang.' - '.$this->luas);
    }

    public function onReset(){
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.backend.gis')->extends('layouts.app');
    }
}
