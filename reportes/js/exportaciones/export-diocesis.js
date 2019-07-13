function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Especifique el nombre del archivo
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Crear elemento de enlace de descarga
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, diocesis);
    } else {
        // Crear un enlace al archivo.
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Configurando el nombre del archivo
        downloadLink.download = filename;

        //activando la función
        downloadLink.click();
    }
}