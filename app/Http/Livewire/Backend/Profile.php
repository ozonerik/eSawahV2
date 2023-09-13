<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $mode='read';
    public $user,$name,$email;

    public function render()
    {
        $user=User::find(Auth::user()->id);
        return view('livewire.backend.profile')->extends('layouts.app');
    }
    
    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $user = User::find(Auth::user()->id);          
        if($user) {
            $this->name    = $user->name;
            $this->email  = $user->email;
        }
    }

    public function updateprofile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id
        ]);
        User::updateOrCreate(['id' => Auth::user()->id], [
            'name' => $this->name,
            'email' => $this->email,
        ]);
        //flash message
        session()->flash('success', 'Profile Berhasil Diupdate.');
        //redirect
        return redirect()->route('profile');
    }
}
