<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;

class Result extends Component
{
    public $search='';

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
    ];

    public function getUserProperty(){
        $user = User::query();
        
        if(!empty($this->search)){
            $user->where('name','like','%'.$this->search.'%');
        }else{
            $user->find(0);
        }
            
        return $user;
    }

    public function render()
    {
        $data['user']=$this->User->get();
        return view('livewire.backend.result',$data)->extends('layouts.app');
    }
}
