@push('search')
    <x-navitem_search target='dashboard' placeholder="Search..."/>
@endpush
<div>
    <x-content_header name="Dashboard" >
        <li class="breadcrumb-item active">Dashboard</a></li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_section width="12" order="1" smallorder="1">
            <x-card name="Dashboard">
                Navbar Search Result: {{ $search }}
            </x-card>
        </x-card_section>
    </div>
</div>