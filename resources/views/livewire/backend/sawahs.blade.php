<div>
    <x-content_header name="Sawah" >
        <li class="breadcrumb-item active">Sawah</li>
        <li class="breadcrumb-item active">Daftar Sawah</li>
    </x-content_header>
    <div class="row mx-1">
        @if($mode=='read')
        <x-card_tablesawah type="primary" width="9" order="1" smallorder="1" title="Daftar Sawah" :data="$Sawah" :thead="['No Surat','Nama Sawah','Luas(m2)','Lokasi','Photo']" :tbody="['nosawah','namasawah','luas','lokasi','img']" :tbtn="['edit','del']" search="Search...">
        <x-slot:menu>
            <button wire:click="onAdd" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
            <button wire:click="onDelSelect" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
        </x-slot>    
        </x-card_tablesawah>
        <x-card_section name="Kalkulator Sawah" type="primary" width="3" order="2" smallorder="2">
        <form wire:submit.prevent="kalkulatorsawah">
            <img alt="images" src="{{ asset('img/sawah.jpg') }}" class="rounded mx-auto d-block" style="max-height:150px"/> 
            <x-input_form ids="p1" label="P1" types="text" name="p1" placeholder="Enter P1" disabled="false"/>
            <x-input_form ids="l1" label="L1" types="text" name="l1" placeholder="Enter L1" disabled="false"/>
            <x-input_form ids="p2" label="P2" types="text" name="p2" placeholder="Enter P2" disabled="false"/>
            <x-input_form ids="l2" label="L2" types="text" name="l2" placeholder="Enter L2" disabled="false"/>
            <x-input_form ids="la" label="LA" types="text" name="la" placeholder="Enter LA" disabled="false"/>
            <x-input_form ids="m" label="M" types="text" name="m" placeholder="Enter M" disabled="false"/>
            <x-input_form ids="ls1" label="Luas (umum) m2 " types="text" name="ls1" placeholder="Luas...." disabled="true"/>
            <x-input_form ids="ls2" label="Luas (pres) m2" types="text" name="ls2" placeholder="Luas...." disabled="true"/>
            <x-input_form ids="ls3" label="Luas (umum) bata" types="text" name="ls3" placeholder="Luas...." disabled="true"/>
            <x-input_form ids="ls4" label="Luas (pres) bata" types="text" name="ls4" placeholder="Luas...." disabled="true"/>
            <div class="form-group text-md-right text-center">
                <button type="submit" class="btn btn-primary">Hitung</button>
            </div>
        </form>
        </x-card-section>
        @endif
    </div>
</div>