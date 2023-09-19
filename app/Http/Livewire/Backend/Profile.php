<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;
    public $user,$name,$email,$current_password,$password,$password_confirmation,$photo,$oldpath,$newpath;
    public $filename="Choose File";

    private function resetpasswd(){
        $this->current_password='';
        $this->password='';
        $this->password_confirmation='';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    private function deletefile($pathfile){
        if(Storage::disk('public')->exists($pathfile)){
            Storage::disk('public')->delete($pathfile);
        }
    }

    public function render()
    {
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
        $errors = $this->getErrorBag();
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

    public function updatephoto()
    {
        
          $validatedData = Validator::make(
              ['photo' => $this->photo],
              ['photo' => 'image|max:1024'],
          );
          if ($validatedData->fails()) {
              session()->flash('photo',$validatedData->errors()->first('photo'));
              return redirect()->route('profile');
          }
        $myfile = User::findOrFail(Auth::user()->id);
        $this->oldpath = $myfile->photo;
        //dd($this->oldpath);
        $dir='photos'; 
        if(!empty($this->oldpath)){
            $this->newpath=$this->photo->store($dir,'public'); //setingan di confi/filesystem
            $this->deletefile($this->oldpath);
            User::updateOrCreate(['id' => Auth::user()->id], [
                'photo' => $this->newpath
            ]);
        }else{
            $this->newpath=$this->photo->store($dir,'public');
           //dd($this->newpath);
            User::updateOrCreate(['id' => Auth::user()->id], [
                'photo' => $this->newpath
            ]);
        }
        //$this->photo->store('photos');
        //flash message
        session()->flash('success', 'Photo Berhasil Diubah.');
        //redirect
        return redirect()->route('profile');
    }

    public function updatepasswd()
    {
        $errors = $this->getErrorBag();
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
