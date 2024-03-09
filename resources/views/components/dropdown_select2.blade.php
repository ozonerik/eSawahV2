<div class="form-group">
    <label for="{{$ids}}" >{{$label}}</label>
    <div wire:ignore>
    <select wire:model="{{$name}}" id="{{$ids}}" class="select2bs4 form-control @if($errors->has( $name )) is-invalid @endif" style="width:100%">
        <option value="">Please Choose...</option> 
        @foreach ($data as $row)
        <option value="{{$row->$values}}" > {{$row->$values}}</option>
        @endforeach
    </select>
    @if($errors->has( $name ))<div class="invalid-feedback">{{ $errors->first($name) }}</div>@endif
    </div>
</div>

<script>
document.addEventListener('livewire:load', function () {
    $('#{{$ids}}').select2({
        theme: 'bootstrap4',
        placeholder: "Please Choose...",
        allowClear: 'true'
    })
    $('#{{$ids}}').change(function (e) {
        let elementName = $(this).attr('id');
        @this.set(elementName, e.target.value);
    });
})
</script>