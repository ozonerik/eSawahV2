@push('search')
    <x-navitem_search target='dashboard'/>
@endpush
<div>
    <x-content_header name="Dashboard">
        <li class="breadcrumb-item active">Dashboard</a></li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_section width="4" order="1" smallorder="2">
            <x-card name="Dashboard">
                <h3>1</h3> {{ $search }}
            </x-card>
        </x-card_section>
        <x-card_section width="8" order="2" smallorder="1">
            <x-card name="Dashboard">
                <h3>2</h3> {{ $search }}
            </x-card>
        </x-card_section>
    </div>
</div>