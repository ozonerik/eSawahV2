<div>
    <x-content_header name="Profile" >
        <li class="breadcrumb-item active">Profile</a></li>
    </x-content_header>
    <div class="row mx-1">
        @if($mode=='read')
        <x-card_table width="12" title="Pawongan Terbaik" :data="$user" :thead="['Nama','Email']" :tbody="['name','email']">
            <x-slot:rowbtn>
                <button class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
            </x-slot>
            <x-slot:menu>
                <button wire:click="onAdd" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                <button class="btn btn-sm btn-success" @if(empty($checked)) disabled @endif><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
                <button class="btn btn-sm btn-success" @if(empty($checked)) disabled @endif><i class="fas fa-download"></i></button>
            </x-slot>
        </x-card_table>
        @elseif($mode=='add')
        <x-card_form name="Add User" width="12" order="12" smallorder="12" closeto="onRead">
            <h4>Hallo</h4>
            <x-slot:footer>
                <button wire:click="onRead" class="btn btn-sm btn-primary">Back</button>
            </x-slot>
        </x-card_form>
        @endif
    </div>
</div>
