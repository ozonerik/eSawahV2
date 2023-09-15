<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage=5;
    public $selectPage = false;
    public $checked = [];
    public $search='';
    public $mode='read';
    public $ids,$users,$name,$email,$password,$password_confirmation;
    
    public function getUserProperty(){
        return User::where('name','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'userPage');
    }

    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->User->pluck('id')->toArray();
        }else{
            $this->checked = [];
        }
        //dd($this->checked);
    }

    public function updatedChecked($value){
        $this->selectPage=false;
    }

    public function is_checked($id){
        return in_array($id,$this->checked);
    }

    public function RowEdit($id){
        dd($id);
    }

    public function RowDel($id){
        User::whereIn('id',[$id])->delete();
        //flash message
        session()->flash('success', 'User berhasil dihapus');
        //redirect
        return redirect()->route('users');
    }

    public function adduser(){
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','confirmed',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required',

        ]);
        $users=User::updateOrCreate(['id' => $this->ids], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $users->assignRole('user');
        //flash message
        session()->flash('success', 'User berhasil ditambahkan');
        //redirect
        return redirect()->route('users');
    }

    public function onAdd(){
        $this->mode='add';
    }

    public function onRead(){
        $this->mode='read';
    }

    public function render()
    {
        $data['user'] = $this->User;
        return view('livewire.backend.users',$data)->extends('layouts.app');
    }
    
}
