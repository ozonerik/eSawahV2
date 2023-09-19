<div>
    <x-content_header name="Info" >
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Info</li>
    </x-content_header>
    <div class="row mx-1">
        @if($mode=='read')
        <x-card_table type="primary" width="12" title="Slide Banner Info" :data="$Info" :thead="['Title','Message','Image']" :tbody="['title','message','img']" :tbtn="['edit','del']" search="Search...">
        <x-slot:menu>
            <button wire:click="onAdd" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Tambah"><i class="fas fa-plus"></i></button>
            <button wire:click="onDelSelect" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" @if(empty($checked)) disabled @endif><i class="fas fa-trash"></i></button>
        </x-slot>    
        </x-card_table>
        @elseif($mode=='add')
        <x-card_form name="Add Info" width="12" order="1" smallorder="1" closeto="onRead">
            <h4>Add Info</h4>
            <x-slot:footer>
            <form wire:submit.prevent="addinfo">
                <x-input_form ids="title" label="Title" types="text" name="title" placeholder="Type Title" />
                <x-input_form ids="message" label="Message" types="text" name="message" placeholder="Type Messages" />
                <x-file_form2 ids="img" label="Image" name="img" :placeholder="$filename"/>
                <button type="button" wire:click="onRead" class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @elseif($mode=='edit')
        <x-card_form name="Edit Info" width="12" order="1" smallorder="1" closeto="onRead">
            <h4>Add Info</h4>
            <x-slot:footer>
            <form wire:submit.prevent="editinfo">
                <x-input_form ids="title" label="Title" types="text" name="title" placeholder="Type Title" />
                <x-input_form ids="message" label="Message" types="text" name="message" placeholder="Type Messages" />
                <x-file_form2 ids="img" label="Image" name="img" :placeholder="$filename"/>
                <button type="button" wire:click="onRead" class="btn btn-success float-left">Back</button>
                <button type="submit" class="btn btn-primary float-right" wire:target="img" wire:loading.attr="disabled">Save</button>
            </form>
            </x-slot>
        </x-card_form>
        @endif
    </div>
</div>