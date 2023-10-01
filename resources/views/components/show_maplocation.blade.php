<script>
window.addEventListener(@js($eventname), event => {
        var lt=event.detail.nlat;
        var lg=event.detail.nlong;
        var mapname=@js($mapname)+'-'+event.detail.map_id
        var kordinat=event.detail.kordinat;
        if (!(lt===0)){
                showMaps(@js($emitname), lt,lg,'',mapname,'true',kordinat);
        }else{
                showMaps(@js($emitname), lt,lg,'','nomap'+'-'+event.detail.map_id,'true','NoMap');
        }
})
</script>