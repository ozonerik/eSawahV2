<div class="form-group">
    <label for="{{ $ids }}" class="@if(!empty($wajib)) text-danger  @endif">{{ $label }}</label>
    
    @if($typemask == 'harga')
    <input data-inputmask="'shortcuts':{'r': '1000', 'j': '1000000','m':'1000000000','t':'1000000000000'},'prefix': 'Rp ','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'luas')
    <input data-inputmask="'suffix': ' m2','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'panjang')
    <input data-inputmask="'suffix': ' m','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'bata')
    <input data-inputmask="'suffix': ' bata','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'bau')
    <input data-inputmask="'suffix': ' bau','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'hektar')
    <input data-inputmask="'suffix': ' ha','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'kwintal')
    <input data-inputmask="'suffix': ' kw','alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'desimal')
    <input data-inputmask="'alias': 'decimal', 'radixPoint':',', 'groupSeparator': '.', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'rightAlign': false "  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'telp')
    <input data-inputmask="'mask': ['9999-9999-999[9][9][9]']" @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @elseif($typemask == 'tanggal')
    <input data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control datepicker @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" autocomplete="off" 
    data-provide="datepicker" 
    data-date-language="id" 
    data-date-autoclose="true" 
    data-date-format="dd/mm/yyyy" 
    data-date-orientation="bottom" 
    data-date-today-highlight="true" 
    
    >
    @elseif($typemask == 'email')
    <input data-inputmask-alias="email"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    
    @if($errors->has( $name ))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>
<script>
document.addEventListener('livewire:load', function () {
    //$('#{{ $ids }}').inputmask();
    $('#{{ $ids }}').on('keyup',function (e) {
        console.log(this.value);
        //let data = $(this).val();
        //@this.set('{{$name}}', data);
    });
})
window.addEventListener('run_inputmask', event => {
    $('#{{ $ids }}').inputmask();
    $('#{{ $ids }}').change(function (e) {
        let data = $(this).val();
        @this.set('{{$name}}', data);
    });
})
</script>