<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $search;
    private $user;
    public $perPage=5;
    
    protected $listeners = ['do_search'];
    protected $paginationTheme = 'bootstrap';

    public function do_search($val){
        $this->search = $val;
    }

    public function render()
    {
        $user = User::paginate($this->perPage,['*'], 'userPage');
        $user2 = User::paginate($this->perPage,['*'], 'userPage2');
        return view('livewire.backend.dashboard',compact(['user','user2']))->extends('layouts.app');
    }
}
