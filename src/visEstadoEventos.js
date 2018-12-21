var calendarStart;
var calendarEnd;

$(function() {
    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        minDate: moment('2018-09-11 10:50'),
        timePicker24Hour: true,
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'YYYY-MM-DD HH:mm'
        }
    })

    $('#seleccionComboBox').change(function() {
        var dataComboBox = $('#seleccionComboBox').find('option:selected').text();
        console.log({ dataComboBox });
    });
    $('#dateTime').change(function() {
        var dataCalendar = $('#dateTime')[0].value;
        console.log({ dataCalendar });
    });

});

function llamadaBaseDatos() {

    fetch('http://localhost:3000/eventos')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            console.log(myJson);
            crearVis(myJson)
        });
}

function enviarFiltro() {
    var dataComboBoxEnvio = $('#seleccionComboBox').find('option:selected').text();
    var dataCalendarEnvio = $('#dateTime')[0].value;
    var calendarSplit = dataCalendarEnvio.split(" - ");
    calendarStart = calendarSplit[0];
    calendarEnd = calendarSplit[1];
    console.log({ dataComboBoxEnvio, dataCalendarEnvio, calendarStart, calendarEnd });
    $('#mytimeline3').remove();
    var contenido = '<div id="mytimeline3"></div>';
    $('#visContainer').append(contenido);
}

function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}

function crearVis(myJson) {

    // specify options
    var options = {
        multiselect: true,
        maxHeight: 400,
        start: calendarStart,
        end: calendarEnd,
        editable: false
    };

    // create groups
    var respuestaLlamada = [];
    respuestaLlamada = myJson;
    //console.log({respuestaLlamada});
    var eventos = respuestaLlamada.map(function(vehiculo) { return respuestaLlamada[truck].tituloEvento + " " + respuestaLlamada[truck].organizador + " " + respuestaLlamada[truck].tipoEvento });
    var unique = eventos.filter(onlyUnique);
    console.log({ unique })
    var numberOfGroups = unique.length;
    var groups = new vis.DataSet();

    for (var i = 0; i < numberOfGroups; i++) {
        groups.add({
            id: i,
            content: unique[i]
        })
    }

    // create items for groups
    console.log(respuestaLlamada.length);
    var totalElementosLlamada = respuestaLlamada.length;
    var itemsWithGroups = new vis.DataSet();

    var itemsPerGroup = 1; //Math.round(numberOfItems/numberOfGroups);

    for (var truck = 0; truck < totalElementosLlamada; truck++) {
        for (var order = 0; order < itemsPerGroup; order++) {
            var fechaFinal = respuestaLlamada[truck].fecha.split(" - ");

            var start = new Date(fechaFinal[0]);

            var end = new Date(fechaFinal[1]);
            var posicionEnVis = unique.indexOf(respuestaLlamada[truck].tituloEvento + " " + respuestaLlamada[truck].organizador + " " + respuestaLlamada[truck].tipoEvento);
            itemsWithGroups.add({
                id: order + itemsPerGroup * truck,
                group: posicionEnVis,
                start: start,
                end: end,
                content: 'Código Organizador: ' + respuestaLlamada[truck].codigoOrganizador + " Fecha evento: " + respuestaLlamada[truck].fecha,
                title: '<div class="alert alert-primary textoCentroToolTip" role="alert">Código Organizador: ' + respuestaLlamada[truck].codigoOrganizador + '</div>' +
                    '<div class="alert alert-secondary" role="alert">Fecha evento:' + respuestaLlamada[truck].fecha + '</div>'
            });
        }
    }


    var options3 = jQuery.extend(options, {
        orientation: 'top',
        tooltipOnItemUpdateTime: true
    })
    var container3 = document.getElementById('mytimeline3');
    timeline3 = new vis.Timeline(container3, itemsWithGroups, groups, options3);

}