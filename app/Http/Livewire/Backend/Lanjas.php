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

    protected $listeners = ['runMask'];

    public function runMask($value){
        //$result=conv_inputmask($this->luas);
        //$luas=Manny::stripper($this->luas,['num','comma']);
        $this->result=$value;
    }

    public function mount(){
        $this->pawongan=Pawongan::get();
    }
    public function render()
    {
        $this->dispatchBrowserEvent('run_select2');
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
