<div>
    <x-content_header name="Info" >
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Info</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_section name="Info" type="primary" width="12" order="1" smallorder="1">
            <x-card_table width="12" title="Info" :data="$Info" :thead="['Titles','Messages','Images']" :tbody="['titles','messages','images']" :tbtn="['edit','del']" search="Search Titles">
            <x-slot:menu>
                <button wire:click="onAdd" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
                <button wire:click="onDelSelect" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
            </x-slot>    
            </x-card_table>
        </x-card-section>
    </div>
</div>