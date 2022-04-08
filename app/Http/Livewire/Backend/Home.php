<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Home extends Component
{
    use AuthorizesRequests;
    
    public function render()
    {
        return view('livewire.backend.home')->extends('layouts.app');
    }
}
