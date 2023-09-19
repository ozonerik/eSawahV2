<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Infos;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Info extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    
    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.backend.info')->extends('layouts.app');
    }
}
