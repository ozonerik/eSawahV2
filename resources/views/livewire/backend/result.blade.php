<div>
    <x-content_header name="Result" >
        <li class="breadcrumb-item active">Result</a></li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_list width="12" title="Search Result">
            @foreach($user as $row)
            <x-card_listitem photo="{{asset('dist/img/default-150x150.png')}}" link="#" title="{{$row->name}}" desc="Sawah Mundu" value="1.000.000" />
            @endforeach
        </x-card_list>
    </div>
</div>
