<div>
    <x-content_header name="Referensi" >
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Referensi</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_form name="Referensi" width="12" order="1" smallorder="1" closeto="onRead">
            <form wire:submit.prevent="editreferensi">
                <x-input_form disabled="false" ids="mapapikey" label="Google Map API Key" types="text" name="mapapikey" placeholder="Type Google Map API Key" />
                <x-input_currency disabled="false" ids="hargapadi" label="Harga 1kw Gabah Kering Saat Ini (Rp.)" types="text" name="hargapadi" placeholder="Type Harga Padi" />
                <x-input_form disabled="false" ids="nilailanja" label="Nilai Lanja /100 bata (kw)" types="text" name="nilailanja" placeholder="Type Nilai Lanja" />
                <button type="button" wire:click="onReset" class="btn btn-success float-left">Reset</button>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>