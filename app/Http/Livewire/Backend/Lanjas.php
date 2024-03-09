<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Pawongan;

class Lanjas extends Component
{
    public $pawongan,$opsipawongan;
    public function addLanja(){
        dd($this->opsipawongan);
    }
    public function mount(){
        $this->dispatchBrowserEvent('run_select2');
        $this->pawongan=Pawongan::get();
        //dd($pawongan);
    }
    public function render()
    {
        //$data['pawongan']= $this->pawongan;
        $this->dispatchBrowserEvent('run_select2');
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
