<script
    src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places">
</script>
<script>
document.addEventListener('getaddress', event => {
    initAutocomplete(event.detail.map_id);
    var ac=90;
    if(!(event.detail.lt === undefined || event.detail.lg === undefined)){
        showMaps('getLatlangInput',event.detail.lt,event.detail.lg,ac,'mapaddsawah'+'-'+event.detail.map_id,'true'); 
    }
});

async function initAutocomplete($mapid) {
        console.log($mapid)
        var input = document.getElementById(@js($inputname));
        const options = {
            componentRestrictions: { country: "id" },
            fields: ["formatted_address", "geometry", "name"],
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if(!place.geometry){
                @this.set(@js($inputname), document.getElementById(@js($inputname)).value);
            }else{
                var lt=place.geometry['location'].lat();
                var lg=place.geometry['location'].lng();
                var lokasi=document.getElementById(@js($inputname)).value;
                Livewire.emit('getLatlangInput', {'lat': lt, 'long': lg, 'lokasi':lokasi});
            }
        }); 
}
</script>