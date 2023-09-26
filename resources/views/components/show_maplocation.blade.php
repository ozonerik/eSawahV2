<script>
window.addEventListener('showLocation', event => {
        var lt=event.detail.nlat;
        var lg=event.detail.nlong;
        showMaps(lt,lg,@js($name)+'-'+event.detail.map_id,'true');
})
</script>