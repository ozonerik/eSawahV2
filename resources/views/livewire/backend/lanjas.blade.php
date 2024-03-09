@push('js')
<x-script_select2/>
@endpush
<div>
    <x-content_header name="Daftar Lanja" >
        <li class="breadcrumb-item active">Lanja</li>
        <li class="breadcrumb-item active">Daftar Lanja</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_form name="Daftar Lanja" width="12" order="1" smallorder="1" closeto="onRead">
            <form wire:submit.prevent="addLanja">
                <x-input_form disabled="false" ids="mapapikey" label="Google Map API Key" types="text" name="mapapikey" placeholder="Type Google Map API Key" />
                <x-dropdown_form ids="opsipawongan" label="Pawongan Selec2" name="opsipawongan" :data="$pawongan" values="nama" pilih=""/>
                <x-dropdown_select2 ids="opsipawonganbs4" label="Pawongan Select2bs4" name="opsipawonganbs4" :data="$pawongan" values="nama" pilih=""/>
                <x-dropdown_select2_multi ids="opsipawonganmulti" label="Pawongan Select2bs4 multi" name="opsipawonganmulti" :data="$pawongan" values="nama" pilih=""/>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>