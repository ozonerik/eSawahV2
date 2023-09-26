<div class="form-group">
    <label for="{{ $ids }}" class="@if(!empty($wajib)) text-danger  @endif">{{ $label }}</label>
    <div class="input-group">
        <input @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}">
        <div class="input-group-append">
            <button wire:click="{{ $action }}" class="btn btn-outline-secondary" type="button" id="button-{{ $ids }}">{{$labelbtn}}</button>
        </div>
    </div>
    @if($errors->has( $name ))
    <div class="text-danger">
        <small>{{ $errors->first($name) }}</small>
    </div>
    @endif
</div>