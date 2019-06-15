function name(params) {

}
// function to get get form values
function getinputval(id) {
    return document.getElementById(id).value;
}

var config = {
    apiKey: "AIzaSyD0mkwckSn7XLkSjUWIjyxa25OeQQMmhCA",
    authDomain: "escogerd01.firebaseapp.com",
    databaseURL: "https://escogerd01.firebaseio.com/",
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
    // hour: "numeric",
    hour12: "true"
};
var dateValue = date.toLocaleString("es-ES", options).toString();

function CreateFicha() {
    var nombre = document.getElementById('id_nombre').value;
    var apellido = document.getElementById('id_apellido').value;
    var identidad = document.getElementById('id_identidad').value;
    var edad = document.getElementById('id_edad').value;
    var genero = document.getElementById('id_genero').value;
    var ecivil = document.getElementById('id_ecivil').value;
    var fecha = document.getElementById('id_fecha').value;
    var estudios = document.getElementById('id_estudios').value;
    var direccion = document.getElementById('id_direccion').value;
    var arquidiocesis = document.getElementById('id_arquidiocesis').value;
    var diocesis = document.getElementById('id_diocesis').value;
    var ciudad = document.getElementById('id_ciudad').value;
    var phone = document.getElementById('id_phone').value;
    var dtrabajo = document.getElementById('id_dtrabajo').value;
    var ttrabajo = document.getElementById('ttrabajo').value;
    var religion = document.getElementById('id_religion').value;
    var bautismo = document.getElementById('id_bautismo').value;
    var pcomunion = document.getElementById('pcomunion').value;
    var Confirmacion = document.getElementById('id_Confirmacion').value;
    var size = document.getElementById('id_size').value;

    var tutores = document.getElementById('id_tutores').value;
    var ntutores = document.getElementById('id_ntutores').value;
    var ttutores = document.getElementById('id_ttutores').value;
    var npadres = document.getElementById('id_npadres').value;
    var telpadre = document.getElementById('id_telpadre').value;
    var nmadres = document.getElementById('id_nmadres').value;
    var telmadre = document.getElementById('id_telmadre').value;
    var retiro = document.getElementById('id_retiro').value;
    var nretiro = document.getElementById('id_nretiro').value;
    var experiencia = document.getElementById('id_experiencia').value;
    var esperas = document.getElementById('id_esperas').value;


    // Validar  campo nombre


    //Swal.fire('El campo nombre esta vacio!')
    // if (!nombre.length) {
    //alert('el campo nombre esta vacio!');
    if (!nombre.length) {
        alert('el campo Apellido esta vacio!');
        //Swal.fire('El campo nombre esta vacio!');
        return 0;
    }

    // Validar  campo Apellido
    if (!apellido.length) {
        alert('el campo Apellido esta vacio!');
        return 0;
    }
    // Validar  campo identidad
    if (!identidad.length) {
        alert('el campo Identidad esta vacio!');
        return 0;
    }

    // Validar  campo edad
    if (!edad.length) {
        alert('el campo Edad esta vacio!');
        return 0;
    }

    // Validar Campo Genero
    if (genero == "genero") {
        alert('El Campo Genero no fue seleccionado')
        return 0;
    }

    // Validar  campo Estado Civil
    if (!ecivil.length) {
        alert('el campo Estado Civil esta vacio!');
        return 0;
    }

    // Validar  campo nombre
    if (!phone.length) {
        alert('el campo Telefono esta vacio!');
        return 0;
    }

    if (!diocesis.length) {
        alert('el campo Diocesis/ Arquidiocesis esta vacio!');
        return 0;
    }

    if (!ciudad.length) {
        alert('el campo Ciudad esta vacio!');
        return 0;
    }


    db.collection("ficha").doc(`${identidad}`).set({
            nombre: nombre,
            apellido: apellido,
            edad: edad,
            genero: genero,
            ecivil: ecivil,
            fecha: fecha,
            estudios: estudios,
            direccion: direccion,
            arquidiocesis: arquidiocesis,
            diocesis: diocesis,
            ciudad: ciudad,
            phone: phone,
            dtrabajo: dtrabajo,
            ttrabajo: ttrabajo,
            religion: religion,
            bautismo: bautismo,
            pcomunion: pcomunion,
            Confirmacion: Confirmacion,
            size: size,
            tutores: tutores,
            ntutores: ntutores,
            ttutores: ttutores,
            npadres: npadres,
            telpadre: telpadre,
            nmadres: nmadres,
            telmadre: telmadre,
            retiro: retiro,
            nretiro: nretiro,
            experiencia: experiencia,
            esperas: esperas,
            createAt: dateValue
        })
        .then(function() {
            console.log("Document written with ID: ");
            Swal.fire(
                    'Muy Bien!',
                    'Su ficha fue enviada',
                    'con excito'
                )
                // window.alert("Solicitud enviada");
            Clear();

        })
        .catch(function() {
            console.error("Error adding document: ");
        });

}

//  lista de diocesis
var diocsesis = [
    "Diócesis de Baní",
    "Diócesis de San Juan de la Maguana",
    "Diócesis de Barahona",
    "Diócesis de San Pedro de Macorís",
    "Diócesis de Nuestra Señora de la Altagracia en Higüey",
    "Diócesis de Santo Domingo",
    "Diócesis de La Vega",
    "Diócesis de San Francisco de Macorís",
    "Diócesis de Mao-Monte Cristi",
    "Diócesis de Puerto Plata",
    "Diócesis de Santiago"

];

// controlo que cuando el valor de la arquidiosesis sea igual a 0, no me presente diocsesis
if ($("#id_arquidiocesis").val() == 0)
    $("#id_diocesis")
    .html('<option value="0">Seleccione primero una arquidiocesis...</option>');

// capturo el valor de la arquidiocesis cuando cambia de estado, es decir, cuando el usuario cambia de opcion
$("#id_arquidiocesis").change(function() {
    var arquidiocesis = $("#id_arquidiocesis").val();


    // verifico si no hay ninguna arquidiosesis seleccionada
    if ($("#id_arquidiocesis").val() == 0)
        $("#id_diocesis")
        .html('<option value="0">Seleccione primero una arquidiocesis...</option>');

    // verifico si la arquidiocesis seleccionada es de Sto. Dgo.
    if (arquidiocesis == 1) {
        $("#id_diocesis").html("");

        // recorro el arreglo hasta la posicion [5] (corresponden a las diosesis de Sto. Dgo.)
        for (var x = 0; x < 5; x++) {
            $("#id_diocesis")
                .append('<option value="' + diocsesis[x] + '">' + diocsesis[x] + '</option>');
        }
    }

    // verifico si la arquidiocesis seleccionada es de Stgo.
    if (arquidiocesis == 2) {
        $("#id_diocesis").html("");

        // recorro el arreglo desde la posicion [6] hasta la posicion [9] (corresponden a las diosesis de Stgo.)
        for (var x = 6; x <= 9; x++) {
            $("#id_diocesis")
                .append('<option value="' + diocsesis[x] + '">' + diocsesis[x] + '</option>');
        }
    }
});

function Clear() {
    document.getElementById('id_nombre').value = '';
    document.getElementById('id_apellido').value = '';
    document.getElementById('id_identidad').value = '';
    document.getElementById('id_edad').value = '';
    document.getElementById('id_genero').value = '';
    document.getElementById('id_ecivil').value = '';
    document.getElementById('id_fecha').value = '';
    document.getElementById('id_estudios').value = '';
    document.getElementById('id_direccion').value = '';
    document.getElementById('id_arquidiocesis').value = '';
    document.getElementById('id_diocesis').value = '';
    document.getElementById('id_ciudad').vvalue = '';
    document.getElementById('id_phone').value = '';
    document.getElementById('id_dtrabajo').value = '';
    document.getElementById('ttrabajo').value = '';
    document.getElementById('id_religion').value = '';
    document.getElementById('id_bautismo').value = '';
    document.getElementById('pcomunion').value = '';
    document.getElementById('id_Confirmacion').value = '';
    document.getElementById('id_size').value = '';

    document.getElementById('id_tutores').value = '';
    document.getElementById('id_ntutores').value = '';
    document.getElementById('id_ttutores').value = '';
    document.getElementById('id_npadres').value = '';
    document.getElementById('id_telpadre').value = '';
    document.getElementById('id_nmadres').value = '';
    document.getElementById('id_telmadre').value = '';
    document.getElementById('id_retiro').value = '';
    document.getElementById('id_nretiro').value = '';
    document.getElementById('id_experiencia').value = '';
    document.getElementById('id_esperas').value = '';

}