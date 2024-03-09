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
                <x-dropdown_form ids="opsipawongan" label="Pawongan" name="opsipawongan" :data="$pawongan" values="nama" pilih=""/>
                
                
                <div class="form-group">
                  <label>Select2bs4</label>
                  <div class="select2bs4-blue">
                    <select class="select2bs4 form-control" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2bs4-blue" style="width: 100%;">
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Select2bs4</label>
                  <div class="select2-blue">
                    <select class="select2 form-control" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-blue" style="width: 100%;">
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Minimal</label>
                  <div id="myModal">
                    <select class="form-control select2bs4" style="width:100%">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
        </x-card_form>
    </div>
</div>