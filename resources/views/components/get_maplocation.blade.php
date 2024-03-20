<script>
window.addEventListener(@js($eventname), event => {
    function getPosition(position) {
        var lt=position.coords.latitude;
        var lg=position.coords.longitude;
        var ac = position.coords.accuracy;
        var mapname=@js($mapname)+'-'+event.detail.map_id;
        Livewire.emit(@js($emitname), {'lat': lt.toFixed(7), 'long': lg.toFixed(7)});
        showMaps(@js($emitname),lt,lg,ac,mapname,'true','<center><b>Your Location</b><br>('+lt+','+lg+')</center>') 
    }
    function errorCallback(error){
        alert('Geolocation is not supported by this browser.');
    };
    function options() {
        enableHighAccuracy: true;
        timeout: 10000;
    };
    navigator.geolocation.getCurrentPosition(getPosition, errorCallback, options);
})
</script>