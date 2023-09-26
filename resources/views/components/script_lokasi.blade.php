<script>

var map_init;

window.addEventListener('getLocation', event => { 
    function getPosition(position) {
        lt=position.coords.latitude;
        lg=position.coords.longitude;
        Livewire.emit('getLatlangInput', {'lat':lt,'long':lg});
        showMaps(lt,lg);
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

function showMaps($lat, $long){
    var container = L.DomUtil.get("mapsawah");
    if (container != null) {
    container._leaflet_id = null;
    }
    map_init = L.map('mapsawah', {
    center: [$lat, $long],
    zoom: 18,
    measureControl: true
    });
    //https://stackoverflow.com/questions/9394190/leaflet-map-api-with-google-satellite-layer
    googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map_init);
    var marker = new L.Marker([$lat,$long]).addTo(map_init)
    .bindPopup('My Location')
    .openPopup();
    map_init.invalidateSize();
}
</script>