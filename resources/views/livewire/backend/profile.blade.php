<div>
    <x-content_header name="Profile" >
        <li class="breadcrumb-item active">Profile</a></li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_table width="12" title="Pawongan Terbaik" :data="$user" :thead="['Nama','Email']" :tbody="['name','email']">
            <x-slot:btn>
                <button class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
            </x-slot>
            <x-slot:menu>
                <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                <button class="btn btn-sm btn-success" @if(empty($checked)) disabled @endif><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
                <button class="btn btn-sm btn-success" @if(empty($checked)) disabled @endif><i class="fas fa-download"></i></button>
            </x-slot>
            {{ print_r($checked) }}
        </x-card_table>
    </div>
</div>
