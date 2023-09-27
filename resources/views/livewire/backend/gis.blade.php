@push('js')
<!-- edit -->
<x-get_mapmeasure eventname="resetLocation" emitname="getResetlocation" mapname="resetmap"/>
<x-get_mapmeasure eventname="getLocation" emitname="getLatlangInput" mapname="gismap"/>
<!-- init map -->
<x-script_lokasimeasure/>
@endpush
<div>
    <x-content_header name="Sawah" >
        <li class="breadcrumb-item active">Sawah</li>
        <li class="breadcrumb-item active">GIS</li>
    </x-content_header>
    <div class="row mx-1">
        @if($mode=='read')
        <x-card_section2 name="GIS - Sawah" type="primary" width="12" order="1" smallorder="1">
        <form wire:submit.prevent="onHitung">
            <div wire:ignore id="gismap-{{$map_id}}" class="w-100 rounded bg-blank" style="height: 400px;"></div>
            <x-inputlokasi_form action="onGetlokasi" labelbtn="Get My Location" wajib="" disabled="" ids="latlang" label="Koordinat" types="text" name="latlang" placeholder="Get Koordinat" />
            <x-input_form wajib="" disabled="" ids="luas" label="Luas (m2)" types="text" name="luas" placeholder="Enter Luas (m2)" />
            <x-input_form wajib="" disabled="" ids="luasbata" label="Luas (bata)" types="text" name="luasbata" placeholder="Enter Luas (bata)" />
            <x-input_form wajib="" disabled="" ids="keliling" label="Keliling (m)" types="text" name="keliling" placeholder="Enter Keliling (m)" />
            <x-input_form wajib="true" ids="hgpadi" label="Harga Padi (Rp)" types="text" name="hgpadi" placeholder="Enter Harga Padi" disabled="false"/>
            <x-input_form wajib="true" ids="lanja" label="Lanja/100 bata (kw)" types="text" name="lanja" placeholder="Enter Kwintal Lanja" disabled="false"/>
            <x-input_form ids="lanjakw" label="Nilai Lanja/Thn (kw)" types="text" name="lanjakw" placeholder="Nilai Lanja (kw)" disabled="true"/>
            <x-input_form ids="lanjarp" label="Nilai Lanja/Thn (Rp)" types="text" name="lanjarp" placeholder="Nilai Lanja (Rp)" disabled="true"/>
            <button wire:click="onReset" type="button" class="btn btn-success float-left">Reset</button>
            <button type="submit" class="btn btn-primary float-right">Hitung</button>
        </form>
        </x-card-section2>
        @endif
    </div>
</div>