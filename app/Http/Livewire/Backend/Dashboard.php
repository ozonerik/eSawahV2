<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.backend.dashboard')->extends('layouts.app');
    }
}
