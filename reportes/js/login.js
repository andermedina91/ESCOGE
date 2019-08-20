// googleSignln = () => {
//     user = new firebase.aut().googleAutProvider()
//     firebase(user).then(function(result) {
//             console.log(result)
//             console.log("Excente... Esta Vaina Funciona COÑO")
//         })
//         .catch(function(error) {
//             console.log(err)
//             console.log("Algo Estoy haciendo Mal, debo seguir intentandolo")
//         })
// }

/* INICIO DE  PRUEBA DE NUEVO LOGIN
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

var provider = new firebase.auth.GoogleAuthProvider();

$(".user").submit(function(event) {

    event.preventDefault();

    let userEmail = $("#email").val();
    let userPass = $("#password").val();

    console.log(userEmail, userPass);

    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        console.log(errorCode);
        console.log(errorMessage);
        // ...
    });
});

provider.addScope('https://www.googleapis.com/auth/contacts.readonly');

firebase.auth().signInWithPopup(provider).then(function(result) {
    // Esto le da un token de acceso de Google. Puedes usarlo para acceder a la API de Google.
    var token = result.credential.accessToken;
    // La información de usuario que ha iniciado sesión
    var user = result.user;
    // ...
}).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // l correo electrónico de la cuenta del usuario utilizado.
    var email = error.email;
    //El tipo firebase.auth.AuthCredential que se usó.
    var credential = error.credential;
    // ...
});
*/
////firebase.auth().signOut().then(function() {
// Sign-out successful.
//}).catch(function(error) {
// An error happened.
//});PRO