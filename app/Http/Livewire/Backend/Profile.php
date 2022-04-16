<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage=2;
    public $selectPage = false;
    public $checked = [];
    public $search='';
    
    public function getUserProperty(){
        return User::where('name','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'userPage');
    }

    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->User->pluck('id')->toArray();
        }else{
            $this->checked = [];
        }
    }

    public function updatedChecked($value){
        $this->selectPage=false;
    }

    public function render()
    {
        $data['user'] = $this->User;
        return view('livewire.backend.profile',$data)->extends('layouts.app');
    }
}
