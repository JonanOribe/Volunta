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
    var dataComboBoxEnvio = $('#seleccionComboBox').find('option:selected').text();
    var dataCalendarEnvio = $('#dateTime')[0].value;
    console.log({ dataComboBoxEnvio, dataCalendarEnvio });
    generarInforme(dataComboBoxEnvio, dataCalendarEnvio);
}

function generarInforme(dataComboBoxEnvio, dataCalendarEnvio) {
    // Default export is a4 paper, portrait, using milimeters for units
    var doc = new jsPDF();
    var tituloPDF = dataComboBoxEnvio + "/" + dataCalendarEnvio;

    doc.text('Informe de prueba:\n' +
        '\n*Evento: ' + dataComboBoxEnvio +
        '\n*Fechas: ' + dataCalendarEnvio, 10, 10);
    doc.save(tituloPDF + '.pdf')
}