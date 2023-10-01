<script
    src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places">
</script>
<script>
document.addEventListener(@js($eventname), event => {
    initAutocomplete();
    var ac=90;
    var lt=event.detail.lt;
    var lg=event.detail.lg;
    var map_id=event.detail.map_id;
    var kordinat=event.detail.kordinat;
    if (!(lt === undefined || lg === undefined || lt === 0 || lg === 0)){
        showMaps(@js($emitname),lt,lg,ac,@js($mapname)+'-'+map_id,'true',kordinat);
    }else{
        showMaps(@js($emitname),lt,lg,ac,'nomap'+'-'+map_id,'true','NoMap');
    }
});

async function initAutocomplete() {
        var input = document.getElementById(@js($name));
        const options = {
            componentRestrictions: { country: "id" },
            fields: ["formatted_address", "geometry", "name"],
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if(!place.geometry){
                var lokasi=document.getElementById(@js($name)).value;
                @this.set(@js($name), lokasi);
                @this.set('latlang','');
                Livewire.emit(@js($emitname), {'lat': 0, 'long': 0, 'lokasi':lokasi});
            }else{
                var lt=place.geometry['location'].lat();
                var lg=place.geometry['location'].lng();
                var lokasi=document.getElementById(@js($name)).value;
                @this.set(@js($name), lokasi);
                var ac=90;
                Livewire.emit(@js($emitname), {'lat': lt, 'long': lg, 'lokasi':lokasi});
            }
        }); 
}
</script>