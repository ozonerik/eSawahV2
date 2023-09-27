<script>
window.addEventListener(@js($eventname), event => {
    function getPosition(position) {
        var lt=position.coords.latitude;
        var lg=position.coords.longitude;
        Livewire.emit(@js($emitname), {'lat': lt, 'long': lg});
        showMeasureMaps(@js($emitname),lt,lg,@js($mapname)+'-'+event.detail.map_id,'true') 
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