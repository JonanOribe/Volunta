function recargarInfo() {
    document.getElementById('informacionEvento').style.display = 'block';
}

function addRowHandlers() {
    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler =
            function(row) {
                return function() {
                    var datos = [];
                    var tituloEvento = row.getElementsByTagName("td")[1].innerHTML;
                    var organizador = row.getElementsByTagName("td")[3].innerHTML;
                    var longitud = row.getElementsByTagName("td")[5].innerHTML;
                    var latitud = row.getElementsByTagName("td")[6].innerHTML;

                    datos.push(tituloEvento, organizador, longitud, latitud);

                    launchInfo(datos);
                };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}

//FIN INDICE OF ROW
function launchInfo(datos) {
    console.log(document.getElementsByClassName("tablink")[0]);
    document.getElementsByClassName("tablink")[0].click();
    document.getElementById('id01').style.display = 'block';
    console.log(datos);
    document.getElementById('informacionEvento').style.display = 'block';
    document.getElementById('tituloEvento').innerHTML = "Titulo evento: " + datos[0];
    document.getElementById('organizador').innerHTML = "Organizador: " + datos[1];
    document.getElementById('longitud').innerHTML = "Tipo evento: " + datos[2];
    document.getElementById('latitud').innerHTML = "Participantes: " + datos[3];
}

//MODAL

function openCity(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].classList.remove("w3-light-grey");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.classList.add("w3-light-grey");
}
//FIN MODAL
