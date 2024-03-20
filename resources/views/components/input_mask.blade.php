<div class="form-group" wire:ignore>
    <label for="{{ $ids }}" class="@if(!empty($wajib)) text-danger  @endif">{{ $label }}</label>
    
    @if($typemask == 'harga')
    <input wire:ignore data-inputmask="'alias':'harga'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'luas')
    <input wire:ignore data-inputmask="'alias':'luas'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'kwintal')
    <input wire:ignore data-inputmask="'alias':'kwintal'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'bata')
    <input wire:ignore data-inputmask="'alias':'bata'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'tanggal')
    <input wire:ignore data-inputmask="'alias':'tanggal'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
        @push('js')
        <script>
            $('#{{ $ids }}').datepicker({
                autoclose:true,
                format:'dd/mm/yyyy',
                orientation:'bottom',
                highlight:true,
                language:'id',
                todayHighlight:true,
                todayBtn:true,
            }).on('changeDate', function(e) {
                @this.set('{{ $name }}', $('#{{ $ids }}').val());
            });
        </script>
        @endpush
    @endif
    @if($typemask == 'derajat')
    <input wire:ignore data-inputmask="'alias':'derajat'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'panjang')
    <input wire:ignore data-inputmask="'alias':'panjang'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'desimal')
    <input wire:ignore data-inputmask="'alias':'desimal'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'nomor')
    <input wire:ignore data-inputmask="'alias':'nomor'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'telp')
    <input wire:ignore data-inputmask="'alias':'telp'"  @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif
    @if($typemask == 'text')
    <input wire:ignore @if(!empty($wajib)) requiered @endif @if($disabled=="true") disabled @endif id="{{ $ids }}" type="{{ $types }}" wire:model="{{ $name }}" class="form-control @if($errors->has( $name )) is-invalid @endif"  placeholder="{{ $placeholder }}" >
    @endif

    @if($errors->has( $name ))
        <span class="invalid-feedback" role="alert">
            {{ $errors->first($name) }}
        </span>
    @endif
</div>