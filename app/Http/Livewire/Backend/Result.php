<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class Result extends Component
{
    public $search='';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
    ];

    public function render()
    {
        return view('livewire.backend.result')->extends('layouts.app');
    }
}
