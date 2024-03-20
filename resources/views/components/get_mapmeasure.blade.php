<script>
window.addEventListener(@js($eventname), event => {
    function getPosition(position) {
        var lt=position.coords.latitude;
        var lg=position.coords.longitude;
        var ac = position.coords.accuracy;
        if(ac >  90){
            toastr.warning("Location is not accurate ");
        }else if(ac >  1){
            toastr.success("Location is accurate ");
        }
        var mapname= @js($mapname)+'-'+event.detail.map_id;
        Livewire.emit(@js($emitname), {'lat': lt.toFixed(7), 'long': lg.toFixed(7)});
        showMeasureMaps(@js($emitname),lt,lg,ac,mapname,'true','<center><b>Your Location</b><br>('+lt+','+lg+')</center>') 
    }
    function errorCallback(error){
        toastr.error("Geolocation is not supported by this browser.");
        //alert('Geolocation is not supported by this browser.');
    };
    function options() {
        enableHighAccuracy: true;
        timeout: 10000;
    };
    navigator.geolocation.getCurrentPosition(getPosition, errorCallback, options);
})
</script>