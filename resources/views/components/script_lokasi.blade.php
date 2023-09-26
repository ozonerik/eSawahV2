@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css">
@endpush
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" ></script>
<script>
function showMaps($lat, $long, $iddiv){
    var map_init=null;
    var marker,vlat,vlong;
    map_init = L.map($iddiv, {
        center: [$lat, $long],
        zoom: 18
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
        Livewire.emit("getLatlangInput", {'lat': position.lat, 'long': position.lng});
    });
}
</script>