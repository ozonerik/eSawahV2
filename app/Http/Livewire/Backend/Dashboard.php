<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $search='';
    private $user;
    public $perPage=2;
    public $selectPage = false;
    public $checked = [];
    
    protected $listeners = ['do_search'];
    protected $paginationTheme = 'bootstrap';

    public function getUserProperty(){
        return User::where('name','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'userPage');
    }
    public function do_search($val){
        $this->search = $val;
    }
    //lifecylce hook updated<namavariable>
    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->User->pluck('id')->toArray();
        }else{
            $this->checked = [];
        }
    }
    //lifecylce hook updated<namavariable>
    public function updatedChecked($value){
        $this->selectPage=false;
    } 

    public function render()
    {
        $user = $this->User;
        return view('livewire.backend.dashboard',compact(['user']))->extends('layouts.app');
    }
}
