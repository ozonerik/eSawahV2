<div>
    <x-content_header name="Referensi" >
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Referensi</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_form name="Referensi" width="12" order="1" smallorder="1" closeto="onRead">
            <form wire:submit.prevent="editreferensi">
                <x-input_form disabled="false" ids="hargapadi" label="Harga Padi (Rp.)" types="text" name="hargapadi" placeholder="Type Harga Padi" />
                <x-input_form disabled="false" ids="nilailanja" label="Nilai Lanja /100 bata (kw)" types="text" name="nilailanja" placeholder="Type Nilai Lanja" />
                <button type="button" wire:click="onRead" class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>