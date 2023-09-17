<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deluser'
    ];

    public $perPage=5;
    public $selectPage = false;
    public $checked = [];
    public $search='';
    public $mode='read';
    public $roles,$ids,$users,$name,$email,$password,$password_confirmation;
    public $user_id,$user_role,$opsiroles;
    
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

    public function deluser()
    {
        User::whereIn('id',$this->user_id)->delete();
        //reset form
        $this->resetForm();
        //flash message
        session()->flash('success', 'User berhasil dihapus');
        //redirect
        return redirect()->route('users');
    }

    private function resetForm()
    {
        $this->mode='read';
        $this->user_id='';
        $this->name='';
        $this->email='';
        $this->password='';
        $this->password_confirmation='';
        $this->opsiroles =null;
        $this->resetErrorBag();
        $this->resetValidation();

    }

    public function edituser()
    {
        //dd(empty($this->opsiroles));
        $cek_password=( is_null($this->password) || $this->password=="" ) ;       
        if($cek_password){
            //dd($this->password);
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
                'opsiroles' => 'required',
            ],
            [
                'opsiroles.required' => 'The :attribute field is required.',
            ],
            ['opsiroles' => 'hak akses']);
            $users=User::updateOrCreate(['id' => $this->user_id], [
                'name' => $this->name,
                'email' => $this->email,
            ]);
        }else{
            //dd($this->password);
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
                'password' => ['required','confirmed',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
                'password_confirmation' => 'required',
                'opsiroles' => 'required',
            ],
            [
                'opsiroles.required' => 'The :attribute field is required.',
            ],
            ['opsiroles' => 'hak akses']); 
            $users=User::updateOrCreate(['id' => $this->user_id], [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }
        $users->syncRoles([$this->opsiroles]);
        //reset form
        $this->resetForm();
        //flash message
        session()->flash('success', 'User berhasil diupdate');
        //redirect
        return redirect()->route('users');
    }


    public function adduser(){
        //dd($this->opsiroles);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','confirmed',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required',
            'opsiroles' => 'required',

        ],
        [
            'opsiroles.required' => 'The :attribute field is required.',
        ],
        ['opsiroles' => 'hak akses']);
        $users=User::updateOrCreate(['id' => $this->ids], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        
        $users->assignRole($this->opsiroles);
        //reset form
        $this->resetForm();
        //flash message
        session()->flash('success', 'User berhasil ditambahkan');
        //redirect
        return redirect()->route('users');
    }

    public function onAdd(){
        $this->mode='add';
        $this->roles=Role::get();
        $this->name='';
        $this->email='';
        $this->password='';
        $this->password_confirmation='';
        $this->opsiroles ='';
    }
    
    public function onRead(){
        $this->mode='read';
        //reset form
        $this->resetForm();
    }

    public function onDelete($id){
        $this->user_id=$id;
        $users = User::whereIn('id',[$id]);
        $this->confirm('Apakah anda yakin ingin hapus ?<br>'.$users->pluck('name')->implode(',<br>'), [
            'onConfirmed' => 'deluser',
        ]);
    }

    public function onEdit($id){
        $this->user_roles = User::findOrFail($id)->roles->pluck('name')->implode(',');
        $this->opsiroles = $this->user_roles;
        //dd($this->user_roles);
        $this->mode='edit';
        $this->user_id=$id;
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;       
    }

    public function render()
    {
        $data['user'] = $this->User;
        $this->roles=Role::get();
        return view('livewire.backend.users',$data)->extends('layouts.app');
    }
    
}
