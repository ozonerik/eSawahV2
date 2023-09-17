<div class="form-group">
    <label for="{{$ids}}" >{{$label}}</label>
    <select wire:model="{{$name}}" id="{{$ids}}" class="form-control @if($errors->has( $name )) is-invalid @endif" >
        <option value="">Please Choose...</option> 
        @foreach ($data as $row)
        <option value="{{$row->$values}}" > {{$row->$values}}</option>
        @endforeach
    </select>
    @if($errors->has( $name ))<div class="invalid-feedback">{{ $errors->first($name) }}</div>@endif
</div>