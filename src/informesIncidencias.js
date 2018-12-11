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
    var tituloPDFSplit = String(d).split(" ");
    var tituloPDF = tituloPDFSplit[1] + " " + tituloPDFSplit[2] + " " + tituloPDFSplit[3];
    var informacionLista = $('#datosOcultosIncidencias')[0].innerHTML;
    var informacionListaSplit = informacionLista.split(",");
    var informacionListaFinal = [];
    var contador = 1;

    informacionListaSplit.forEach(element => {

        if (contador % 2 != 0) {
            element = '\n' + element;
        }
        informacionListaFinal.push(element);
        contador++;
    });

    doc.text('Informe de prueba:\n' +
        '\n*Tipo: ' + 'Informe incidencias' +
        '\n*Fechas: ' + tituloPDF +
        '\n' + informacionListaFinal, 10, 10);
    doc.save(tituloPDF + '.pdf')
}