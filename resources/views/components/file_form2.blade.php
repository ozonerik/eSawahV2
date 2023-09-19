<div class="form-group">
    <label for="{{$ids}}">{{$label}}</label>
    <div class="custom-file">
        <input type="file" wire:model="{{$name}}" wire:target="{{$name}}" wire:loading.attr="disabled" class="custom-file-input @if($errors->has($name)) is-invalid @endif" id="{{$ids}}" aria-describedby="{{$ids}}">
        <label class="custom-file-label" for="{{$ids}}">{{ $placeholder }}</label>
        @if($errors->has($name))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first($name) }}
            </span>
        @endif
    </div>
</div>