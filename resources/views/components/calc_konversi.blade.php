<div>
    <form wire:submit.prevent="{{$action}}">
        <x-input_form ids="cluas" label="Luas Tanah (m)" types="text" name="cluas" placeholder="Enter Luas Tanah (m)..." disabled="false"/>
        <x-input_form ids="cbata" label="Luas Tanah (bata)" types="text" name="cbata" placeholder="Enter Luas Tanah (bata)..." disabled="false"/>
        <x-input_form ids="conhgpadi" label="Harga Padi (Rp)" types="text" name="conhgpadi" placeholder="Enter Harga Padi" disabled="false"/>
        <x-input_form ids="conlanja" label="Lanja/100 bata (kw)" types="text" name="conlanja" placeholder="Enter Kwintal Lanja" disabled="false"/>
        <x-input_form ids="clanjakw" label="Nilai Lanja/Thn (kw)" types="text" name="clanjakw" placeholder="Nilai Lanja (kw)" disabled="true"/>
        <x-input_form ids="clanjarp" label="Nilai Lanja/Thn (Rp)" types="text" name="clanjarp" placeholder="Nilai Lanja (Rp)" disabled="true"/>
        <div class="form-group text-md-right text-center">
            <button type="submit" class="btn btn-primary">Hitung</button>
        </div>
    </form>
</div>