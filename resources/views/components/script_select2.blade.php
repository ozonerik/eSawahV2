<script>
document.addEventListener('livewire:load', function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "Please Choose...",
        allowClear: 'true'
    })
    $('.select2bs4').change(function (e) {
        let elementName = $(this).attr('id');
        @this.set(elementName, e.target.value);
    });
})
</script>