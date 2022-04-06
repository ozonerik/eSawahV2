<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Home extends Component
{
    
    public function render()
    {
        return view('livewire.backend.home')->extends('layouts.app');
    }
}
