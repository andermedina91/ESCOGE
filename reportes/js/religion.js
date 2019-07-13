function name(params) {

}
// function to get get form values
function getinputval(id) {
    return document.getElementById(id).value;
}


var dbreporte = db.collection('ficha');
dbreporte.get().then(function(querySnapshot) {

    var content = '';
    //console.log(doc.doc);
    querySnapshot.forEach(function(data) {
        console.log(data.data());


        content += '<tr>';
        content += '<td>' + data.data().nombre + '</td>';
        content += '<td>' + data.data().apellido + '</td>';
        content += '<td>' + data.data().identidad + '</td>';
        content += '<td>' + data.data().religion + '</td>';

        content += '</tr>';

        if (querySnapshot.empty) {
            // do something with the data
        } else {
            console.log('document not found');
        }

    });


    $('#dataTable').append(content);


});