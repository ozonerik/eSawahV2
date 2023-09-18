<div>
    <x-content_header name="Users" >
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Users</li>
    </x-content_header>
    <div class="row mx-1">
        @if($mode=='read')
        <x-card_table width="12" title="Users" :data="$user" :thead="['Nama','Email']" :tbody="['name','email']" :tbtn="['edit','del']">
            <x-slot:menu>
                <button wire:click="onAdd" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
                <button wire:click="onEditSelect" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit" @if(empty($checked)) disabled @endif><i class="fas fa-edit"></i></button>
                <button wire:click="onDelSelect" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
                <button class="btn btn-sm btn-success" data-toggle="tooltip" title="Download" @if(empty($checked)) disabled @endif><i class="fas fa-download"></i></button>
                <button class="btn btn-sm btn-info" data-toggle="tooltip" title="Upload" @if(empty($checked)) disabled @endif><i class="fas fa-upload"></i></button>
            </x-slot>
        </x-card_table>
        @elseif($mode=='add')
        <x-card_form name="Add User" width="12" order="12" smallorder="12" closeto="onRead">
            <h4>Add User</h4>
            <x-slot:footer>
            <form wire:submit.prevent="adduser">
                <x-input_form ids="name" label="Name" types="text" name="name" placeholder="Enter Name" />
                <x-input_form ids="email" label="Email address" types="email" name="email" placeholder="Enter email" />
                <x-input_form ids="newpassword" label="New password" types="password" name="password" placeholder="New Password" />
                <x-input_form ids="confirmpassword" label="Retype new password" types="password" name="password_confirmation" placeholder="Retype new password" />
                <x-dropdown_form ids="opsiroles" label="Hak Akses" name="opsiroles" :data="$roles" values="name" pilih=""/>
                <button type="button" wire:click="onRead"class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @elseif($mode=='edit')
        <x-card_form name="Edit User" width="12" order="12" smallorder="12" closeto="onRead">
            <h4>Edit User</h4>
            <x-slot:footer>
            <form wire:submit.prevent="edituser">
                <x-input_form ids="name" label="Name" types="text" name="name" placeholder="Enter Name" />
                <x-input_form ids="email" label="Email address" types="email" name="email" placeholder="Enter email" />
                <x-input_form ids="newpassword" label="New password" types="password" name="password" placeholder="New Password" />
                <x-input_form ids="confirmpassword" label="Retype new password" types="password" name="password_confirmation" placeholder="Retype new password" />
                <x-dropdown_form ids="opsiroles" label="Hak Akses" name="opsiroles" :data="$roles" values="name" pilih="{{$user_roles}}"/>
                <button type="button" wire:click="onRead"class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @elseif($mode=='editselect')
        <x-card_form name="Edit User Selected" width="12" order="12" smallorder="12" closeto="onRead">
            <h4>Edit User Selected</h4>
            <x-slot:footer>
            <form wire:submit.prevent="edituserselected">
                <x-input_form ids="newpassword" label="New password" types="password" name="password" placeholder="New Password" />
                <x-input_form ids="confirmpassword" label="Retype new password" types="password" name="password_confirmation" placeholder="Retype new password" />
                <x-dropdown_form ids="opsiroles" label="Hak Akses" name="opsiroles" :data="$roles" values="name" pilih=""/>
                <button type="button" wire:click="onRead"class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @endif
    </div>
</div>
