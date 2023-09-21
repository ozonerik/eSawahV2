<div>
    <x-content_header name="Sawah" >
        <li class="breadcrumb-item active">Sawah</li>
        <li class="breadcrumb-item active">Daftar Sawah</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_section name="Kalkulator Sawah" type="primary" width="3" order="2" smallorder="2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($modecal=='htluas') active @endif" id="hitungluas-tab" wire:click="onHtluas" data-toggle="tab" data-target="#hitungluas" type="button" role="tab" aria-controls="hitungluas" aria-selected="true">Hitung Luas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($modecal=='htconv') active @endif" id="konversi-tab" wire:click="onCbata" data-toggle="tab" data-target="#konversi" type="button" role="tab" aria-controls="konversi" aria-selected="false">Konversi</button>
                </li>
            </ul>
            <div class="tab-content mt-2" id="myTabContent">
                <div class="tab-pane fade @if($modecal=='htluas') show active @endif" id="hitungluas" role="tabpanel" aria-labelledby="hitungluas-tab">
                    <x-calc_sawah action="kalkulatorsawah"/>
                </div>
                <div class="tab-pane fade @if($modecal=='htconv') show active @endif" id="konversi" role="tabpanel" aria-labelledby="konversi-tab">
                    <x-calc_konversi action="konversisawah"/>
                </div>
            </div>
        </x-card-section> 
        
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