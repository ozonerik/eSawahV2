<div class="form-group">
    <label for="{{$ids}}" >{{$label}}</label>
    <div class="select2bs4-blue" wire:ignore>
        <select wire:model="{{$name}}" data-placeholder="Please Choose..." name="{{$name}}" multiple="multiple" id="{{$ids}}" style="width:100%" data-dropdown-css-class="select2bs4-blue" class="form-control select2bs4 @if($errors->has( $name )) is-invalid @endif" >
            <option value="">Please Choose...</option> 
            @foreach ($data as $row)
            <option value="{{$row->$values}}" > {{$row->$values}}</option>
            @endforeach
        </select>
    </div>
    @if($errors->has( $name ))<div class="invalid-feedback">{{ $errors->first($name) }}</div>@endif
</div>