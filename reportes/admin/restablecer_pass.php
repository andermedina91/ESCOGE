<?php

include('conexion.php');

// variables de trabajo
$pass = $_POST['password'];
$repeat_pass = $_POST['repeat_password'];
$token = $_POST['token'];

/*
    TAREA: validar que las contrasenas sean iguales
*/

# cambiar contrasena #

// preparo la sentencia sql
$sql = "
    UPDATE
        login
    SET
        password = '$pass',
        fecha_expiracion = NULL,
        token = NULL
    WHERE
        token = '$token'
";

// ejecuto la consulta
if($conn->query($sql))
{
    //enviando al user al login
    header('Location: http://localhost/ESCOGE/login.php');
}