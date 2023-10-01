<script
    src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places">
</script>
<script>
document.addEventListener('getaddress', event => {
    initAutocomplete();
    var ac=90;
    if(event.detail.lt === undefined){
        
    }else{
        showMaps('getLatlangInput',event.detail.lt,event.detail.lg,ac,'mapaddsawah'+'-'+event.detail.map_id,'true',event.detail.kordinat);
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
                @this.set(@js($name), document.getElementById(@js($name)).value);
                @this.set('latlang','');
            }else{
                var lt=place.geometry['location'].lat();
                var lg=place.geometry['location'].lng();
                var lokasi=document.getElementById(@js($name)).value;
                var ac=90;
                Livewire.emit('getLatlangInput', {'lat': lt, 'long': lg, 'lokasi':lokasi});
            }
        }); 
}
</script>