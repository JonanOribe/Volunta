function cargarMapa() {

    var mymap = L.map('mapid').setView([41.3922500, 2.1648800], 14);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox.streets'
    }).addTo(mymap);

    L.marker([41.3922500, 2.1648800]).addTo(mymap)
        .bindPopup("<b>Evento!</b><br />").openPopup();

    //L.circle([51.508, -0.11], 500, {
    //    color: 'red',
    //    fillColor: '#f03',
    //    fillOpacity: 0.5
    //}).addTo(mymap).bindPopup("I am a circle.");
    //
    //L.polygon([
    //    [51.509, -0.08],
    //    [51.503, -0.06],
    //    [51.51, -0.047]
    //]).addTo(mymap).bindPopup("I am a polygon.");


    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);
}