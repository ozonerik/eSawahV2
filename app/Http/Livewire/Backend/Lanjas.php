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
        $regex=conv_inputmask($this->luas);
        $luas=Manny::stripper($this->luas,['num','comma']);
        $tanggal=Carbon::parse($this->tanggal)->format("Y-m-d");
    }
    public function mount(){
        $this->dispatchBrowserEvent('run_select2');
        $this->pawongan=Pawongan::get();
        $this->luas='0';
        $this->tanggal=Carbon::parse(now())->format("d/m/Y");;
        $string='1.200,45 m2';
        $result= conv_inputmask($string);
        dd($result);
    }
    public function render()
    {
        //$data['pawongan']= $this->pawongan;
        $this->dispatchBrowserEvent('run_select2');
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
