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
        <x-card_tablesawah type="primary" width="9" order="1" smallorder="1" title="Daftar Sawah" :data="$Sawah" :thead="['No Surat','Nama Sawah','Luas(m2)','Lokasi','Photo Sawah']" :tbody="['nosawah','namasawah','luas','lokasi','img']" :tbtn="['edit','del']" search="Search...">
        <x-slot:menu>
            <button wire:click="onAdd" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
            <button wire:click="onDelSelect" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
            <button wire:click="onTrashed" class="btn btn-sm btn-success" data-toggle="tooltip" title="Trash"><i class="fa fa-archive mr-2"></i>Trash</button>
        </x-slot>    
        </x-card_tablesawah>
        @elseif($mode=='trashed')
        <x-card_tabletrash type="danger" width="9" order="1" smallorder="1" title="Restore Sawah" :data="$Restoresawah" :thead="['No Surat','Nama Sawah','Luas(m2)','Lokasi']" :tbody="['nosawah','namasawah','luas','lokasi']" :tbtn="['restore','del']" search="Search..."/>
        @elseif($mode=='add')
        <x-card_form name="Add Sawah" width="9" order="1" smallorder="1" closeto="onRead">
            <h4>Add Sawah Selected</h4>
            <x-slot:footer>
            <form wire:submit.prevent="addsawah">
                <x-input_form disabled="false" ids="nosawah" label="No Surat" types="text" name="nosawah" placeholder="Enter No Surat" />
                <x-input_form disabled="false" ids="namasawah" label="Nama Sawah" types="text" name="namasawah" placeholder="Type Nama Sawah" />
                <x-input_form disabled="false" ids="luas" label="Luas Sawah" types="text" name="luas" placeholder="Type Luas Sawah" />
                <x-input_form disabled="false" ids="lokasi" label="Lokasi Sawah" types="text" name="lokasi" placeholder="Type Lokasi Sawah" />
                <x-input_form disabled="false" ids="latlang" label="Koordinat Sawah" types="text" name="latlang" placeholder="Type Kordinat Sawah" />
                <x-input_form disabled="false" ids="b_barat" label="Batas Barat/Kulon" types="text" name="b_barat" placeholder="Type Batas Barat Sawah" />
                <x-input_form disabled="false" ids="b_utara" label="Batas Utara/Lor" types="text" name="b_utara" placeholder="Type Batas Utara Sawah" />
                <x-input_form disabled="false" ids="b_timur" label="Batas Timur/Wetan" types="text" name="b_timur" placeholder="Type Batas Timur Sawah" />
                <x-input_form disabled="false" ids="b_selatan" label="Batas Selatan/Kidul" types="text" name="b_selatan" placeholder="Type Batas Selatan Sawah" />
                <x-input_form disabled="false" ids="namapenjual" label="Nama Penjual" types="text" name="namapenjual" placeholder="Type Penjual Sawah" />
                <x-input_form disabled="false" ids="hargabeli" label="Harga Beli" types="text" name="hargabeli" placeholder="Type Harga Beli Sawah" />
                <x-input_form disabled="false" ids="namapembeli" label="Nama Pembeli" types="text" name="namapembeli" placeholder="Type Pembeli Sawah" />
                <x-input_form disabled="false" ids="hargajual" label="Harga Jual" types="text" name="hargajual" placeholder="Type Harga Jual Sawah" />
                <div class="form-group">
                    <div class="font-weight-bold mb-2">Photo Sawah</div>
                    <img alt="images" src="{{ asset('img/image.png') }}" class="img-thumbnail rounded float-left mb-3" style="max-width:300px"/>
                </div>
                <x-file_form2 ids="img" label="" name="img" :placeholder="$filename" capture="environment"/>
                <button type="button" wire:click="onRead"class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @elseif($mode=='edit')
        <x-card_form name="Edit Sawah" width="9" order="1" smallorder="1" closeto="onRead">
            <h4>Edit Sawah</h4>
            <x-slot:footer>
            <form wire:submit.prevent="editsawah">
                <x-input_form disabled="false" ids="nosawah" label="No Surat" types="text" name="nosawah" placeholder="Enter No Surat" />
                <x-input_form disabled="false" ids="namasawah" label="Nama Sawah" types="text" name="namasawah" placeholder="Type Nama Sawah" />
                <x-input_form disabled="false" ids="luas" label="Luas Sawah" types="text" name="luas" placeholder="Type Luas Sawah" />
                <x-input_form disabled="false" ids="lokasi" label="Lokasi Sawah" types="text" name="lokasi" placeholder="Type Lokasi Sawah" />
                <x-input_form disabled="false" ids="latlang" label="Koordinat Sawah" types="text" name="latlang" placeholder="Type Kordinat Sawah" />
                <x-input_form disabled="false" ids="b_barat" label="Batas Barat/Kulon" types="text" name="b_barat" placeholder="Type Batas Barat Sawah" />
                <x-input_form disabled="false" ids="b_utara" label="Batas Utara/Lor" types="text" name="b_utara" placeholder="Type Batas Utara Sawah" />
                <x-input_form disabled="false" ids="b_timur" label="Batas Timur/Wetan" types="text" name="b_timur" placeholder="Type Batas Timur Sawah" />
                <x-input_form disabled="false" ids="b_selatan" label="Batas Selatan/Kidul" types="text" name="b_selatan" placeholder="Type Batas Selatan Sawah" />
                <x-input_form disabled="false" ids="namapenjual" label="Nama Penjual" types="text" name="namapenjual" placeholder="Type Penjual Sawah" />
                <x-input_form disabled="false" ids="hargabeli" label="Harga Beli" types="text" name="hargabeli" placeholder="Type Harga Beli Sawah" />
                <x-input_form disabled="false" ids="namapembeli" label="Nama Pembeli" types="text" name="namapembeli" placeholder="Type Pembeli Sawah" />
                <x-input_form disabled="false" ids="hargajual" label="Harga Jual" types="text" name="hargajual" placeholder="Type Harga Jual Sawah" />
                <div class="form-group">
                    <div class="font-weight-bold mb-2">Photo Sawah</div>
                    @if(!empty($tmpimg))
                    <img alt="images" src="{{ asset('storage/'. $tmpimg) }}" class="img-thumbnail rounded float-left mb-3" style="max-width:300px"/> 
                    @else
                    <img alt="images" src="{{ asset('img/image.png') }}" class="img-thumbnail rounded float-left mb-3" style="max-width:300px"/>
                    @endif
                </div>
                <x-file_form2 ids="img" label="" name="img" :placeholder="$filename" capture="environment"/>
                <button type="button" wire:click="onRead"class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @endif
    
    </div>
</div>