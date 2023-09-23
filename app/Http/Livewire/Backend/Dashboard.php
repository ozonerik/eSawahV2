<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use App\Models\Info;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Dashboard extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $perPage=10;
    public $infobanner;

    public function mount()
    {
        $this->infobanner=Info::orderBy('updated_at', 'DESC')->get();
    }
    
    public function render()
    {
        return view('livewire.backend.dashboard')->extends('layouts.app');
    }
}
