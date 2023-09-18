<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Info extends Component
{
    public function render()
    {
        return view('livewire.backend.info')->extends('layouts.app');
    }
}
