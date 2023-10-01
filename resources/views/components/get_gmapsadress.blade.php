<script
    src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places">
</script>
<script>
document.addEventListener('getaddress', event => {
    initAutocomplete(event.detail.map_id);
    var ac=90;
    console.log(event.detail.lt);
    if(event.detail.lt === undefined){
        
    }else{
        showMaps('getLatlangInput',event.detail.lt,event.detail.lg,ac,'mapaddsawah'+'-'+event.detail.map_id,'true',event.detail.kordinat);
    }
});

async function initAutocomplete($mapid) {
        console.log($mapid)
        var input = document.getElementById(@js($name));
        const options = {
            componentRestrictions: { country: "id" },
            fields: ["formatted_address", "geometry", "name"],
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if(!place.geometry){
                //@this.set(@js($name), document.getElementById(@js($name)).value);
                console.log(document.getElementById(@js($name)).value);
            }else{
                //Livewire.emit(@js($emitname), {'lat': place.geometry['location'].lat(), 'long': place.geometry['location'].lng()});
                console.log(place.geometry['location'].lat());
                console.log(place.geometry['location'].lng());
                console.log(place.formatted_address);
                var lt=place.geometry['location'].lat();
                var lg=place.geometry['location'].lng();
                var lokasi=document.getElementById(@js($name)).value;
                var ac=90;
                Livewire.emit('getLatlangInput', {'lat': lt, 'long': lg, 'lokasi':lokasi});
                //showMaps('getLatlangInput',lt,lg,ac,'mapaddsawah'+'-'+$mapid,'true')
            }
        }); 
}
</script>