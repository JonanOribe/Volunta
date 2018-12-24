function enviarFiltro() {
    var d = new Date();
    generarInforme(d);
}

function generarInforme(d) {
    // Default export is a4 paper, portrait, using milimeters for units
    var doc = new jsPDF();
    var tituloPDFSplit = String(d).split(" ");
    var tituloPDF = tituloPDFSplit[1] + " " + tituloPDFSplit[2] + " " + tituloPDFSplit[3];
    var informacionLista = $('#datosOcultosUsuario')[0].innerHTML;
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
        '\n*Tipo: ' + 'Informe voluntario' +
        '\n*Fechas: ' + tituloPDF +
        '\n' + informacionLista, 10, 10);
    doc.save(tituloPDF + '.pdf')
}