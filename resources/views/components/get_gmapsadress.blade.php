<script
    src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places">
</script>
<script>
document.addEventListener('getaddress', event => {
    initAutocomplete();
});

async function initAutocomplete() {
        var input = document.getElementById('autocomplate');
        const options = {
            componentRestrictions: { country: "id" },
            fields: ["formatted_address", "geometry", "name"],
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if(!place.geometry){
                //@this.set(@js($name), document.getElementById(@js($name)).value);
                console.log('sdas');
            }else{
                //Livewire.emit(@js($emitname), {'lat': place.geometry['location'].lat(), 'long': place.geometry['location'].lng()});
                console.log(place.geometry['location'].lat());
                console.log(place.geometry['location'].lng());
                console.log(place.formatted_address);
            }
        }); 
}
</script>