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

    public function addLanja(){
        //$result=conv_inputmask($this->luas);
        //$luas=Manny::stripper($this->luas,['num','comma']);
        $tanggal=$this->tanggal;
        dd( $tanggal);
    }
    public function updatedLuas($value){
        //$this->result=conv_inputmask($value);
    }
    public function mount(){
        $this->pawongan=Pawongan::get();
        $this->tanggal=Carbon::parse(now())->format("d/m/Y");;
    }
    public function render()
    {
        $this->dispatchBrowserEvent('run_select2');
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
