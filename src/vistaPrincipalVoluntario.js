$(function() {
    tablaEventosAdministrador()

});

function tablaEventosAdministrador() {

    $('#myTable tr').remove();
    $('#myTable tbody').remove();
    $('#myTable thead').remove();
    $('#campoBusqueda input').remove();
    $('#myInput').remove();
    var contentInput = '<input type="text" id="myInput" onkeyup="busquedaMatriculas()" placeholder="Busqueda por matricula.." title="Type in a name">';
    $('#campoBusqueda').append(contentInput);

    var content = '<thead><tr><th>Título evento</th><th>Organizador</th><th>Tipo evento</th><th>Participantes</th><th>Disponibilidad</th><th>Más información</th></tr></thead><tbody>';


    content += '<td>Concierto Saurom</td><td> Paco</td><td> Concierto</td><td>405</td><td><div class="alert alert-success textoCentrado" role="alert">' +
        'Disponible' + '</div></td><td><button type="button" class="btn btn-info btn-block" onclick="addRowHandlers()">Info</button></td></tr>';

    content += '<td>Marcha Barcelona</td><td> Arty SL</td><td> Carrera</td><td>97</td><td><div class="alert alert-danger textoCentrado" role="alert">' +
        'Lleno</div></td><td><button type="button" class="btn btn-info btn-block" onclick="addRowHandlers()">Info</button></td></tr>';

    content += '<td>Paseo montaña</td><td> Caritas</td><td> Trekking</td><td>10</td><td><div class="alert alert-success textoCentrado" role="alert">' +
        'Disponible' + '</div></td><td><button type="button" class="btn btn-info btn-block" onclick="addRowHandlers()">Info</button></td></tr>';

    content += "</table>"

    $('#myTable').append(content);
}