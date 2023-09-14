<div class="form-group">
    <div class="custom-file" wire:ignore>
        {{ $errors->first($name) }}
        <input type="file" id="{{ $ids }}"  wire:model="{{ $name }}" wire:target="{{ $name }}" wire:loading.attr="disabled" class="custom-file-input form-control  @if ($message = Session::get($name)) is-invalid @endif" >
        <label class="custom-file-label" for="{{ $ids }}">{{ $label }}</label>
        @if ($message = Session::get($name))
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @endif
    </div>
</div>