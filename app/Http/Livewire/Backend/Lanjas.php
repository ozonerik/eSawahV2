<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Pawongan;
use Manny;
use Carbon\Carbon;

class Lanjas extends Component
{
    public $pawongan,$opsipawongan,$opsipawonganbs4,$luas,$tanggal;
    public $opsipawonganmulti=[];

    public function addLanja(){
        $luas=Manny::stripper($this->luas,['num']);
        $tanggal=Carbon::parse($this->tanggal)->format("Y-m-d");
        dd($tanggal);
    }
    public function mount(){
        $this->dispatchBrowserEvent('run_select2');
        $this->pawongan=Pawongan::get();
        $this->luas='1500';
        $this->tanggal=Carbon::parse(now())->format("d/m/Y");;
        //dd($pawongan);
    }
    public function render()
    {
        //$data['pawongan']= $this->pawongan;
        $this->dispatchBrowserEvent('run_select2');
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
