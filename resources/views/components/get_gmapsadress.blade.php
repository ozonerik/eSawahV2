<script>
document.addEventListener(@js($eventname), event => {
    var mode=event.detail.mode;
    initAutocomplete(mode);
    var ac=90;
    var lt=event.detail.lt;
    var lg=event.detail.lg;
    var map_id=event.detail.map_id;
    var kordinat=event.detail.kordinat;
    var mapname=@js($mapname)+'-'+map_id;
    if (!(lt === undefined || lg === undefined || lt === 0 || lg === 0)){
        showMaps(@js($emitname),lt,lg,ac,mapname,'true',kordinat);
    }else{
        showMaps(@js($emitname),lt,lg,ac,'nomap'+'-'+map_id,'true','NoMap');
    }
});

async function initAutocomplete($mode) {
        var input = document.getElementById(@js($inputname));
        console.log($mode);
        const options = {
            componentRestrictions: { country: "id" },
            fields: ["formatted_address", "geometry", "name"],
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if(!place.geometry){
                var lokasi=document.getElementById(@js($inputname)).value;
                @this.set(@js($inputname), lokasi);
                @this.set(@js($kordinatname),'');
                Livewire.emit(@js($emitname), {'lat': 0, 'long': 0, 'lokasi':lokasi});
            }else{
                var lt=place.geometry['location'].lat();
                var lg=place.geometry['location'].lng();
                var lokasi=document.getElementById(@js($inputname)).value;
                @this.set(@js($inputname), lokasi);
                var ac=90;
                Livewire.emit(@js($emitname), {'lat': lt, 'long': lg, 'lokasi':lokasi});
            }
        }); 
}
</script>