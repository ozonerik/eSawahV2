@push('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('js')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#multiple-select-field').select2({
        theme: "bootstrap4",
    });
});
</script>
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
                <x-dropdown_form ids="opsipawongan" label="Hak Akses" name="opsipawongan" :data="$pawongan" values="nama" pilih=""/>
                <select class="form-control" id="multiple-select-field" name="states[]" data-placeholder="Choose anything" multiple>
                    <option>Christmas Island</option>
                    <option>South Sudan</option>
                    <option>Jamaica</option>
                    <option>Kenya</option>
                    <option>French Guiana</option>
                    <option>Mayotta</option>
                    <option>Liechtenstein</option>
                    <option>Denmark</option>
                    <option>Eritrea</option>
                    <option>Gibraltar</option>
                    <option>Saint Helena, Ascension and Tristan da Cunha</option>
                    <option>Haiti</option>
                    <option>Namibia</option>
                    <option>South Georgia and the South Sandwich Islands</option>
                    <option>Vietnam</option>
                    <option>Yemen</option>
                    <option>Philippines</option>
                    <option>Benin</option>
                    <option>Czech Republic</option>
                    <option>Russia</option>
                </select>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>