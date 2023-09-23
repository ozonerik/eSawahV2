<script>
window.addEventListener('getLocation', event => {
    
    const successCallback = (position) => {
        let coord=position.coords.latitude+','+position.coords.longitude
        Livewire.emit('getLatlangInput', coord);
    };
    const errorCallback = (error) => {
        Livewire.emit('getLatlangInput', 'Geolocation is not supported by this browser.');
    };
    const options = {
        enableHighAccuracy: true,
        timeout: 10000,
    };
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);
})
</script>