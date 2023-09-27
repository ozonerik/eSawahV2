<script>
window.addEventListener(@js($eventname), event => {
        var lt=event.detail.nlat;
        var lg=event.detail.nlong;
        showMaps(@js($emitname), lt,lg,@js($mapname)+'-'+event.detail.map_id,'true');
})
</script>