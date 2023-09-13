<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $mode='read';
    public $user,$name,$email,$current_password,$password,$password_confirmation;

    private function resetpasswd(){
        $this->current_password='';
        $this->password='';
        $this->password_confirmation='';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $user=User::find(Auth::user()->id);
        return view('livewire.backend.profile')->extends('layouts.app');
    }
    
    public function mount()
    {
        $this->resetpasswd();
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

    public function updatepasswd()
    {
        $this->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required','confirmed',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => ['required'],
        ]);

        User::updateOrCreate(['id' => Auth::user()->id], [
            'password' => Hash::make($this->password)
        ]);
        //flash message
        session()->flash('success', 'Password Berhasil Diganti.');
        //redirect
        return redirect()->route('profile');
    }
}
