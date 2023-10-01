<script>
window.addEventListener(@js($eventname), event => {
        var lt=event.detail.nlat;
        var lg=event.detail.nlong;
        if (!(lt===0)){
                showMaps(@js($emitname), lt,lg,'',@js($mapname)+'-'+event.detail.map_id,'true','Sawah Location');
        }else{
                showMaps(@js($emitname), lt,lg,'','nomap'+'-'+event.detail.map_id,'true','Sawah Location');
        }
})
</script>