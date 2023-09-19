<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use App\Models\Info;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage=10;
    public $infobanner;

    public function mount()
    {
        $this->infobanner=Info::all();
    }
    
    public function render()
    {
        return view('livewire.backend.dashboard')->extends('layouts.app');
    }
}
