function cargarMapa() {

    if ($('#mapid').length > 0) {
        $("#mapid").remove();
    }

    var htmlMapa = '<div id="mapid" style="width: 100%; height: 400px;"></div>';

    $("#espacioMapa").append(htmlMapa);

    var evento = $('#tituloEvento')[0].innerHTML;
    var longitudSplit = document.getElementById('longitud').innerHTML.split(":");
    var latitudSplit = document.getElementById('latitud').innerHTML.split(":");
    var longitud = longitudSplit[1];
    var latitud = latitudSplit[1];
    var mymap = L.map('mapid').setView([longitud, latitud], 14);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox/streets-v11'
    }).addTo(mymap);


   L.marker([longitud, latitud]).addTo(mymap)
        .bindPopup("<b>" + evento + "!</b><br />").openPopup();

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);
}