<div class="form-group">
    <label for="{{ $ids }}" class="@if(!empty($wajib)) text-danger  @endif">{{ $label }}</label>
    <input wire:model="{{ $name }}" type="text" @if(!empty($wajib)) requiered @endif @if(!empty($disabled)) disabled @endif class="form-control datepicker @if($errors->has( $name )) is-invalid @endif" placeholder="{{ $placeholder }}" autocomplete="off" 
    data-provide="datepicker" 
    data-date-language="id" 
    data-date-autoclose="true" 
    data-date-format="{{$formatdate}}" 
    data-date-orientation="bottom" 
    data-date-today-highlight="true" 
    onchange="this.dispatchEvent(new InputEvent('input'))"
    >
    @if($errors->has( $name ))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>