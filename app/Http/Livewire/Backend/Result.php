<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use \Illuminate\Session\SessionManager;

class Result extends Component
{
    public $search='';

    public function getUserProperty(){
        $user = User::query();
        //pencarian user
        if(!empty($this->search)){
            $user->where('name','like','%'.$this->search.'%');
        }else{
            $user->find(0);
        }
            
        return $user;
    }

    public function mount(SessionManager $session)
    {
        $this->search=$session->get("search");
    }

    public function render()
    {
        $data['user']=$this->User->get();
        return view('livewire.backend.result',$data)->extends('layouts.app');
    }
}
