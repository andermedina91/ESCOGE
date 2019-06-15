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

function

googleSignln = () => {
    base_provider = new firebase.aunt.GoogleAuthProvider()
    firebase.aunt().signlnWithRedirect(base_provider).then(function(result) {
        console.log(result)
        console.log("Success.. Google Account Linked")

    }).catch(function(err) {
        console.log(err)
        console.log("Failend to do")
    })

}