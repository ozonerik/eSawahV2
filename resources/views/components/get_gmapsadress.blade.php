<script
    src="https://maps.googleapis.com/maps/api/js?key={{get_googleapikey()}}&language=id&libraries=places&callback=initAutocomplete" async defer>
</script>
<script>
function initAutocomplete() {
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
        }
        
    });
}
</script>