<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Dashboard extends Component
{
    public $search;
    
    protected $listeners = ['do_search'];

    public function do_search($val){
        $this->search = $val;
    }

    public function render()
    {
        return view('livewire.backend.dashboard')->extends('layouts.app');
    }
}
