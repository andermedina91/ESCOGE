firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        // User is signed in.

        document.getElementById("user_div").style.display = "block";
        document.getElementById("login_div").style.display = "none";
        document.getElementById("register_div").style.display = "none";

        var user = firebase.auth().currentUser;

        if (user != null) {

            var email_id = user.email;
            document.getElementById("user_para").innerHTML = "Bienvenido  : " + email_id;

        }

    } else {
        // No user is signed in.

        document.getElementById("user_div").style.display = "none";
        document.getElementById("login_div").style.display = "block";
        document.getElementById("register_div").style.display = "none";

    }
});

function register() {
    document.getElementById("login_div").style.display = "none";
    document.getElementById("register_div").style.display = "block";
}

function login() {

    let userEmail = document.getElementById("email_field").value;
    let userPass = document.getElementById("password_field").value;

    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).then(function() {
        window.alert("Login in Success : " + userEmail);
    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;

        window.alert("Error : " + errorMessage);

        // ...
    });

}

function create() {

    let userName = document.getElementById("fullname_field").value;
    let userEmail = document.getElementById("create_email_field").value;
    let userPass = document.getElementById("create_password_field").value;

    firebase.auth().createUserWithEmailAndPassword(userEmail, userPass).then(function() {
        window.alert("Create user : " + userEmail);

        db.collection("users").doc(userName).set({
            fullname: userName,
            userEmail: userEmail
        }).then(function() {
            console.log("Document successfully written!");
        }).catch(function(error) {
            console.error("Error writing document: ", error);
        });

    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;

        window.alert("Error : " + errorMessage + "ErrorCode : " + errorCode);

        // ...
    });

}

function logout() {
    firebase.auth().signOut();
}