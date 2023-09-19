<div class="form-group">
    @if(!empty($label))
    <label for="{{ $ids }}">{{ $label }}</label>
    @endif
    <div class="custom-file" wire:ignore>
        <input type="file" wire:model="{{ $name }}" wire:target="{{ $name }}" wire:loading.attr="disabled" class="custom-file-input @if ($message = Session::get($name)) is-invalid @endif" id="{{ $ids }}" aria-describedby="{{ $ids }}">
        <label class="custom-file-label" for="{{ $ids }}">Choose file</label>
        @if ($message = Session::get($name))
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @endif
    </div>
</div>