<?php

require_once('conexion.php');

$nombres = $_POST['nombres'];
// $apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];

// Validar que el correo no exista.


//Insertar data 
// guardando la info. en la entidad Albums
$query = "
    INSERT INTO login( username, password, email, token, fecha_expiracion)
    VALUES ('$nombres','$password','$email','NULL','NULL')
";

// verifico si la sentencia se ha ejecutado correctamente
if ($conn->query($query) === TRUE) {
    echo ('Se impleto el usuario');

    header('Location: http://localhost/ESCOGE/login.php');
} else
    echo 'NO Funciona';






// <!-- echo '<pre>';
// var_dump($_POST); -->
