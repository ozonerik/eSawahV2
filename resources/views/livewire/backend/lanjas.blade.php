<div>
    <x-content_header name="Daftar Lanja" >
        <li class="breadcrumb-item active">Lanja</li>
        <li class="breadcrumb-item active">Daftar Lanja</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_form name="Daftar Lanja" width="12" order="1" smallorder="1" closeto="onRead">
            <form wire:submit.prevent="addLanja">
                <x-input_mask typemask="luas" disabled="false" ids="luas" label="Luas" types="text" name="luas" placeholder="Type Luas" />
                <x-input_form disabled="false" ids="result" label="Result" types="text" name="result" placeholder="Result"/>
                <x-input_mask typemask="tanggal" disabled="false" ids="tanggal" label="Tanggal" types="text" name="tanggal" placeholder="Type Tanggal" />
                <x-dropdown_form ids="opsipawongan" label="Pawongan Select" name="opsipawongan" :data="$pawongan" values="nama" pilih=""/>
                <x-dropdown_select2 ids="opsipawonganbs4" label="Pawongan Select2bs4" name="opsipawonganbs4" :data="$pawongan" values="id" showval="nama"/>
                <x-dropdown_select2_multi ids="opsipawonganmulti" label="Pawongan Select2bs4 multi" name="opsipawonganmulti" :data="$pawongan" values="id" showval="nama"/>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>