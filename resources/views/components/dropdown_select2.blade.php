<div class="form-group">
    <label for="{{$ids}}" >{{$label}}</label>
    <div wire:ignore>
    <select wire:model="{{$name}}" id="{{$ids}}" data-placeholder="Please Choose..." name="{{$name}}" class="select2bs4 form-control @if($errors->has( $name )) is-invalid @endif" style="width:100%">
        <option value="">Please Choose...</option> 
        @foreach ($data as $row)
        <option value="{{$row->$values}}" > {{$row->$values}}</option>
        @endforeach
    </select>
    @if($errors->has( $name ))<div class="invalid-feedback">{{ $errors->first($name) }}</div>@endif
    </div>
</div>