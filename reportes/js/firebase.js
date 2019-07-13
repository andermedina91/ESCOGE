// variables para llenar los graficos
var genero_femenino = 0;
var genero_masculino = 0;
//var genero_otro = 0;

// grafico de arquidiocesis
var ar_stgo = 0;
var ar_sto_dgo = 0;

// variables de diocesis
var cant_diocesis = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

var total_personas = 0;

// variables grafico por Sacramento
var bautismo = 0;
var pcomunion = 0;
var confirmacion = 0;

// Variable Grafico Barra
var barra = 0;


// variables Mensajes sin Leer
var contacto = 0;



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

// Extrayendo la data de Fichas
var dbRef = db.collection("ficha");

// Variable para acceder a travez de GOOGLE
var login = 0;



dbRef.get().then(function(querySnapshot) {
    querySnapshot.forEach(function(doc) {
        // para el grafico de pie - Sexo
        if (doc.data().genero == 'femenino')
            genero_femenino++;
        if (doc.data().genero == 'masculino')
            genero_masculino++;
        //  else
        //    genero_otro++;

        console.log(doc)
            // para el grafico lineal - Cant. personas por arquidiocesis
        if (doc.data().arquidiocesis == 1)
            ar_sto_dgo++;
        if (doc.data().arquidiocesis == 2)
            ar_stgo++;

        // para el grafico de area - Cant. de personas por diocesis
        if (doc.data().diocesis == 'Diócesis de La Vega')
            cant_diocesis[0]++;

        if (doc.data().diocesis == 'Diócesis de Santiago')
            cant_diocesis[1]++;

        if (doc.data().diocesis == 'Diócesis de San Francisco de Macoris')
            cant_diocesis[2]++;

        if (doc.data().diocesis == 'Diócesis de Santo Domingo')
            cant_diocesis[3]++;

        if (doc.data().diocesis == 'Diócesis de San Pedro de Macorís')
            cant_diocesis[4]++;

        if (doc.data().diocesis == 'Diócesis de San Juan de la Maguana')
            cant_diocesis[5]++;

        if (doc.data().diocesis == 'Diócesis de la Romana')
            cant_diocesis[6]++;

        if (doc.data().diocesis == 'Diócesis de Barahona')
            cant_diocesis[7]++;

        if (doc.data().diocesis == 'Diócesis de Mao-Monte Cristi')
            cant_diocesis[8]++;

        if (doc.data().diocesis == 'Diócesis de Puerto Plata')
            cant_diocesis[9]++;

        if (doc.data().diocesis == 'Diócesis de Baní')
            cant_diocesis[10]++;

        // cantidad de personas
        total_personas++;

        //SOLO INCREMENTA 1 EN EL GRAFICO SI ESTA BAUTIZADO
        if (doc.data().bautismo == 'SI')
            bautismo++;

        //SOLO INCREMENTA 1 EN EL GRAFICO SI ESTA BAUTIZADO Y HIZO LA PRIMERA COMUNINION 
        if (doc.data().pcomunion == 'SI') {
            bautismo--;
            pcomunion++;
        }

        // SOLO INCREMENTA 1 EN EL GRAFICO SI ESTA BAUTIZADO, HIZO LA PRIMERA COMUNION Y LA CONFIRMACION
        if (doc.data().confirmacion == 'SI') {
            pcomunion--;
            confirmacion++;
        }

        // poniendo disabled a las propiedades inicialmente
        $('#pcomunion').prop("disabled", true);
        $('#id_Confirmacion').prop("disabled", true);

        // si la persona ha realizado bautismo
        $('#id_bautismo').on("change", function() {

            // habilito el select html para elegir si he hecho la primera comunion o no
            if (this.value == 'SI')
                $('#pcomunion').prop("disabled", false);
            else
                $('#pcomunion').prop("disabled", true);
        });

        // si la persona ha realizado la primera comunion
        $('#pcomunion').on("change", function() {

            // habilito el select html para elegir si he hecho la primera comunion o no
            if (this.value == 'SI')
                $('#id_Confirmacion').prop("disabled", false);
            else
                $('#id_Confirmacion').prop("disabled", true);
        });

    });


})

// Extrayendo la data de Fichas
var dbRef = db.collection("contacto");

dbRef.get().then(function(querySnapshot) {
    querySnapshot.forEach(function(doc) {
        // CANTIDAD DE MENSAJE SIN LEER
        if (doc.data().contacto == 'contacto')
            contacto++;
    });
})

.catch(function(error) {
    console.log("Error getting document:", error);
});


setTimeout(function() {
    $('#cant_personas').html(total_personas);
    console.log(bautismo, pcomunion, confirmacion);
    //console.log('masculino', genero_masculino, 'femenino', genero_femenino);
}, 500);