<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Pawongan;
use Manny;

class Lanjas extends Component
{
    public $pawongan,$opsipawongan,$opsipawonganbs4,$luas;
    public $opsipawonganmulti=[];

    public function addLanja(){
        dd(Manny::stripper($this->luas,['num']));
    }
    public function mount(){
        $this->dispatchBrowserEvent('run_select2');
        $this->pawongan=Pawongan::get();
        $this->luas='1500';
        //dd($pawongan);
    }
    public function render()
    {
        //$data['pawongan']= $this->pawongan;
        $this->dispatchBrowserEvent('run_select2');
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
