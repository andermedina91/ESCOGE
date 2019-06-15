function name(params) {

}

// function to get get form values
function getinputval(id) {
    return document.getElementById(id).value;
}

var config = {
    apiKey: "AIzaSyD0mkwckSn7XLkSjUWIjyxa25OeQQMmhCA",
    authDomain: "escogerd01.firebaseapp.com",
    databaseURL: "https://escogerd01.firebaseio.com",
    projectId: "escogerd01",
    storageBucket: "escogerd01.appspot.com",
    messagingSenderId: "1054260091136"
};
var app = firebase.initializeApp(config);
db = firebase.firestore(app);

var database = firebase.firestore(app);

// Opciones de fecha
var date = new Date();
var options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
    //hour: "numeric",
    hour12: "true"
};
var dateValue = date.toLocaleString("es-ES", options).toString();

//me falta esto que devuelve el id creado aho es que se cae el proceso


function CreateContact() {
    var Nombres = document.getElementById('Nombres').value;
    var Apellidos = document.getElementById('Apellidos').value;
    var Email = document.getElementById('Email').value;
    var Mensaje = document.getElementById('mensaje').value;

    db.collection("contactos").doc(`${Email}`).set({
            Nombres: Nombres,
            Apellidos: Apellidos,
            Email: Email,
            mensaje: Mensaje,
            createAt: dateValue
        })
        .then(function() {
            console.log("Document written with ID: ");

            Swal.fire(
                    'Muy Bien!',
                    'Su Mensaje fue enviado',
                    'con excito'
                )
                // window.alert("Solicitud enviada");
            Clear();
        })
        .catch(function() {
            //console.error("Error adding document: ");
        });

}


function Clear() {
    document.getElementById('Nombres').value = '';
    document.getElementById('Apellidos').value = '';
    document.getElementById('Email').value = '';
    document.getElementById('mensaje').value = '';
}