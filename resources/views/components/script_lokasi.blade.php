<script>
window.addEventListener('getLocation', event => {
    
    const successCallback = (position) => {
        let lt=position.coords.latitude;
        let lg=position.coords.longitude;
        Livewire.emit('getLatlangInput', {'lat':lt,'long':lg});
    };
    const errorCallback = (error) => {
        alert('Geolocation is not supported by this browser.');
    };
    const options = {
        enableHighAccuracy: true,
        timeout: 10000,
    };
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);
})
</script>