<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Profile extends Component
{

    public function render()
    {
        return view('livewire.backend.profile')->extends('layouts.app');
    }
}
