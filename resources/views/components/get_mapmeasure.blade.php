<script>
window.addEventListener(@js($eventname), event => {
    function getPosition(position) {
        var lt=position.coords.latitude;
        var lg=position.coords.longitude;
        var ac = position.coords.accuracy;
        Livewire.emit(@js($emitname), {'lat': lt, 'long': lg});
        showMeasureMaps(@js($emitname),lt,lg,ac,@js($mapname)+'-'+event.detail.map_id,'true','Your Location') 
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