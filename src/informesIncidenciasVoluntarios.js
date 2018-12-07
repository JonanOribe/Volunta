$(function() {
    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        minDate: moment('2018-09-11 10:50'),
        timePicker24Hour: true,
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'M/DD hh:mm A'
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

function enviarFiltro() {
    var d = new Date();
    generarInforme(d);
}

function generarInforme(d) {
    // Default export is a4 paper, portrait, using milimeters for units
    var doc = new jsPDF();
    var tituloPDF = d;

    doc.text('Informe de prueba:\n' +
        '\n*Evento: ' + 'Otros' +
        '\n*Fechas: ' + d, 10, 10);
    doc.save(tituloPDF + '.pdf')
}