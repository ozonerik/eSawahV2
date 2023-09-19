<div>
    <x-content_header name="Info" >
        <li class="breadcrumb-item active">Settings</li>
        <li class="breadcrumb-item active">Info</li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_section name="Info" type="primary" width="12" order="1" smallorder="1">
            <x-card_table width="12" title="Users" :data="$user" :thead="['Nama','Email']" :tbody="['name','email']" :tbtn="['edit','del']">
            </x-card_table>
        </x-card-section>
    </div>
</div>