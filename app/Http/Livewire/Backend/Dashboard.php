<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Dashboard extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.backend.dashboard')->extends('layouts.app');
    }
}
