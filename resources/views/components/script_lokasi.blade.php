<script>
window.addEventListener('getLocation', event => { 
    function getPosition(position) {

        var lt=position.coords.latitude;
        var lg=position.coords.longitude;
        var accuracy = position.coords.accuracy
        showMaps(lt,lg,'mapsawah')
        Livewire.emit("getLatlangInput", {'lat': lt, 'long': lg});
        
    };

    const errorCallback = (error) => {
        alert('Geolocation is not supported by this browser.');
    };

    const options = {
        enableHighAccuracy: true,
        timeout: 10000,
    };

    navigator.geolocation.getCurrentPosition(getPosition, errorCallback, options);
})
function showMaps($lat, $long, $iddiv){
    var map_init = null; //added
    var marker;

    if (map_init !== undefined && map_init !== null) { map_init.remove(); }
    map_init = L.map($iddiv, {
        center: [$lat, $long],
        zoom: 18,
    });
    //https://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer
    googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map_init);
    
    if (marker) {
        map_init.removeLayer(marker)
    }

    marker = new L.marker([$lat, $long], {
            draggable: 'true'
        }).addTo(map_init).bindPopup('Your Location').openPopup();
    
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
        draggable: 'true'
        }).bindPopup(position).update();
        console.log("lat= "+position.lat);
        console.log("lat= "+position.lng);
        Livewire.emit("getLatlangInput", {'lat': position.lat, 'long': position.lng});
    });

    map_init.invalidateSize();
}
</script>