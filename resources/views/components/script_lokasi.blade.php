@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css">
@endpush
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" ></script>
<script>
function showMaps($emitname, $lat, $long, $accuracy, $iddiv, $dragable){
    var map_init=null;
    var marker,vlat,vlong,circle;
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

    if($dragable!==''){
        marker = new L.marker([$lat, $long], {
            draggable: 'true'
        }).addTo(map_init).bindPopup('Your Location').openPopup();
    }else{
        marker = new L.marker([$lat, $long], {
        }).addTo(map_init).bindPopup('Your Location').openPopup();
    }
    
    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
        draggable: 'true'
        }).bindPopup(position.lat.toFixed(7)+","+position.lng.toFixed(7)).openPopup().update();
        Livewire.emit($emitname, {'lat': position.lat, 'long': position.lng});
    });

    circle = L.circle([$lat, $long], { radius: $ac });
    var featureGroup = L.featureGroup([marker, circle]).addTo(map_init);
    map_init.fitBounds(featureGroup.getBounds());
}
</script>