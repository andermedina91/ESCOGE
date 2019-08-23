<?php

require_once('consultas.php');

$email = $_POST['email'];
$password = $_POST['password'];

if(existUser($email, $password))
{
    session_start();

    // habilita una variable de session para los users autenticados
    $_SESSION['user_data'] = $email;

    // redirecciono a la parte admin del proyectoS
    header('Location: http://localhost/ESCOGE/reportes/');
}

else
    echo 'Credenciales incorrectas.';