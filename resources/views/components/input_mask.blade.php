<div class="form-group" wire:ignore>
    <label for="{{ $ids }}" class="@if(!empty($wajib)) text-danger  @endif">{{ $label }}</label>
    
    @if($typemask == 'harga')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'shortcuts':{'r': '1000', 'j': '1000000','m':'1000000000','t':'1000000000000'},'prefix': 'Rp ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'luas')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'suffix': ' m2','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'panjang')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'suffix': ' m','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'bata')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'suffix': ' bata','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'bau')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'suffix': ' bau','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'hektar')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'suffix': ' ha','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'kwintal')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'suffix': ' kw','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'desimal')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'telp')
    <input wire:ignore data-inputmask="'autoUnmask': true, 'mask': ['9999-9999-999[9][9][9]']" @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'tanggal')
    <input wire:ignore data-inputmask="'alias':'datetime', 'inputformat':'dd/mm/yyyy' " @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control datepicker @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" autocomplete="off" 
    data-provide="datepicker" 
    data-date-language="id" 
    data-date-autoclose="true" 
    data-date-format="dd/mm/yyyy" 
    data-date-orientation="bottom" 
    data-date-today-highlight="true" 
    
    >
    @elseif($typemask == 'email')
    <input wire:ignore data-inputmask="'alias':'email', greedy: false"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    
    @if($errors->has( $name ))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>
<script>
document.addEventListener('livewire:load', function () {
    $('#{{ $ids }}').change(function (e) {
        console.log(this.value);
        @this.set('{{$name}}', this.value);
    });
})
window.addEventListener('run_inputmask', event => {
    $('#{{ $ids }}').change(function (e) {
        console.log(this.value);
        @this.set('{{$name}}', this.value);
    });
})
</script>