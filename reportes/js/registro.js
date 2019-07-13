    // Initialize Firebase
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

    function create() {
        let userName = document.getElementById("nombres").Value;
        let userLast = document.getElementById("apellidos").Value;
        let userEmail = document.getElementById("email").Value;
        let userPass = document.getElementById("contrasena").Value;
        let userPassRepit = document.getElementById("repetircontrasena").Value;

        firestore.auth().createUserWithEmailAndPassword(userEmail, userPass).then(function() {
            Window.alert("Usuario Creado:" + userEmail);


            db.collection("users").doc(userName).set({
                    nombres: userName,
                    apellidos: userLast,
                    Email: userEmail,
                }).then(function() {
                    console.log("EStoy Aprendiendo COÑo")
                })
                .catch(function(error) {
                    console.error("Montro Aun Te Falta por Aprender", error);

                })
                .catch(function(error) {
                    var errorCode = error.code;
                    var errorMessage = error.message;

                    window.alert("Error: " + errorMessage + "ErrorCode:" + errorCode);
                })
        })

    }