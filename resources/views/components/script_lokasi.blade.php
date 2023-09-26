@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css">
<link rel="stylesheet" href="{{ asset('plugins/leaflet-maps/leaflet-measure.css') }}">
@endpush
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" ></script>
<script src="{{ asset('plugins/leaflet-maps/leaflet-measure.js') }}"></script>
<script>
function showMaps($lat, $long, $iddiv){
    var map_init=null;
    var marker,vlat,vlong;
    map_init = L.map($iddiv, {
        center: [$lat, $long],
        zoom: 18,
        measureControl: true
    });

    map_init.on('measurefinish', function(evt) {
        writeResults(evt);
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

function writeResults(results) {
        document.getElementById('eventoutput').innerHTML = JSON.stringify(
        {
            area: results.area,
            areaDisplay: results.areaDisplay,
            lastCoord: results.lastCoord,
            length: results.length,
            lengthDisplay: results.lengthDisplay,
            pointCount: results.pointCount,
            points: results.points
        },null,2);
    }
</script>