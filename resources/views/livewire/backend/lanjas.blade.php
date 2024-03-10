<div>
    <x-content_header name="Daftar Lanja" >
        <li class="breadcrumb-item active">Lanja</li>
        <li class="breadcrumb-item active">Daftar Lanja</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_form name="Daftar Lanja" width="12" order="1" smallorder="1" closeto="onRead">
            <form wire:submit.prevent="addLanja">

                <div class="form-group">
                  <label>Currency:</label>
                    <input type="text" class="form-control" data-inputmask="'prefix': 'Rp ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Luas:</label>
                    <input type="text" class="form-control" data-inputmask="'suffix': ' m2 ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Panjang:</label>
                    <input type="text" class="form-control" data-inputmask="'suffix': ' m ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Bata:</label>
                    <input type="text" class="form-control" data-inputmask="'suffix': ' bata ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Bau:</label>
                    <input type="text" class="form-control" data-inputmask="'suffix': ' bau ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                
                <div class="form-group">
                  <label>Hektar:</label>
                    <input type="text" class="form-control" data-inputmask="'suffix': ' ha ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Kwintal:</label>
                    <input type="text" class="form-control" data-inputmask="'suffix': ' kw ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Telp:</label>
                    <input type="text" class="form-control" data-inputmask="'mask': ['9999-9999-999[9][9][9]']" data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Decimal:</label>
                    <input type="text" class="form-control" data-inputmask="'alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0', 'rightAlign': false " data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Tanggal:</label>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Email:</label>
                    <input type="text" class="form-control" data-inputmask-alias="email" data-mask>
                  <!-- /.input group -->
                </div>

                <x-input_form disabled="false" ids="mapapikey" label="Google Map API Key" types="text" name="mapapikey" placeholder="Type Google Map API Key" />
                <x-dropdown_form ids="opsipawongan" label="Pawongan Select" name="opsipawongan" :data="$pawongan" values="nama" pilih=""/>
                <x-dropdown_select2 ids="opsipawonganbs4" label="Pawongan Select2bs4" name="opsipawonganbs4" :data="$pawongan" values="id" showval="nama"/>
                <x-dropdown_select2_multi ids="opsipawonganmulti" label="Pawongan Select2bs4 multi" name="opsipawonganmulti" :data="$pawongan" values="id" showval="nama"/>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>