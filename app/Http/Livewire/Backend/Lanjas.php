<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Lanjas extends Component
{
    public function render()
    {
        return view('livewire.backend.lanjas')->extends('layouts.app');
    }
}
