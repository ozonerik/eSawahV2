<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Pawongan;
use Manny;
use Carbon\Carbon;

class Lanjas extends Component
{
    public $pawongan,$opsipawongan,$opsipawonganbs4,$luas,$result,$tanggal;
    public $opsipawonganmulti=[];

    public function updatedLuas($value){
        $this->result=$value;
    }

    public function updatedTanggal($value){
        $this->result=$value;
    }

    public function addLanja(){
        dd('Add Lanja');
    }


    public function mount(){
        $this->dispatchBrowserEvent('run_select2');
        $this->pawongan=Pawongan::get();
    }
    public function render()
    {
        
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
