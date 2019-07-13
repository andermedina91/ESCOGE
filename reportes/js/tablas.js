function name(params) {

}
// function to get get form values
function getinputval(id) {
    return document.getElementById(id).value;
}

// conexion a Firebase y Configuracion
var firebaseConfig = {
    apiKey: "AIzaSyD0mkwckSn7XLkSjUWIjyxa25OeQQMmhCA",
    authDomain: "escogerd01.firebaseapp.com",
    databaseURL: "https://escogerd01.firebaseio.com",
    projectId: "escogerd01",
    storageBucket: "escogerd01.appspot.com",
    messagingSenderId: "1054260091136"
};

// Inicializando Firebase
var app = firebase.initializeApp(firebaseConfig);
var db = firebase.firestore(app);


var dbreporte = db.collection('ficha');
dbreporte.get().then(function(querySnapshot) {

    var content = '';
    //console.log(doc.doc);
    querySnapshot.forEach(function(data) {
        console.log(data.data());


        content += '<tr>';
        content += '<td>' + data.data().createAt + '</td>';
        content += '<td>' + data.data().nombre + '</td>';
        content += '<td>' + data.data().apellido + '</td>';
        content += '<td>' + data.data().identidad + '</td>';
        content += '<td>' + data.data().edad + '</td>';
        content += '<td>' + data.data().phone + '</td>';
        content += '<td>' + data.data().genero + '</td>';
        content += '<td>' + data.data().ecivil + '</td>';
        content += '<td>' + data.data().estudios + '</td>';
        content += '<td>' + data.data().direccion + '</td>';
        content += '<td>' + data.data().diocesis + '</td>';
        content += '<td>' + data.data().ciudad + '</td>';
        content += '<td>' + data.data().religion + '</td>';
        content += '<td>' + data.data().bautismo + '</td>';
        content += '<td>' + data.data().pcomunion + '</td>';
        content += '<td>' + data.data().Confirmacion + '</td>';
        content += '<td>' + data.data().tutores + '</td>';
        content += '<td>' + data.data().ntutores + '</td>';
        content += '<td>' + data.data().size + '</td>';
        content += '</tr>';

        if (querySnapshot.empty) {
            // do something with the data
        } else {
            console.log('document not found');
        }

    });


    $('#dataTable').append("<tbody>" + content + "</tbody>");

    $('#dataTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

});