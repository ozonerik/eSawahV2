<div>
    <x-content_header name="Sawah" >
        <li class="breadcrumb-item active">Sawah</li>
        <li class="breadcrumb-item active">Daftar Sawah</li>
    </x-content_header>
    <div class="row mx-1">
        <x-calc_sawah name="Kalkulator Sawah" action="kalkulatorsawah" type="primary" width="3" order="2" smallorder="2"/>
        @if($mode=='read')
        <x-card_tablesawah type="primary" width="9" order="1" smallorder="1" title="Daftar Sawah" :data="$Sawah" :thead="['No Surat','Nama Sawah','Luas(m2)','Lokasi','Photo']" :tbody="['nosawah','namasawah','luas','lokasi','img']" :tbtn="['edit','del']" search="Search...">
        <x-slot:menu>
            <button wire:click="onAdd" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
            <button wire:click="onDelSelect" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
        </x-slot>    
        </x-card_tablesawah>
        @endif
    </div>
</div>