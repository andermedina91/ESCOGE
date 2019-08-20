<?php

require_once('consultas.php');

$user_name = $_POST['username'];
$password = $_POST['password'];

if(existUser($user_name, $password))
{
    session_start();

    // habilita una variable de session para los users autenticados
    $_SESSION['user_data'] = $user_name;

    // redirecciono a la parte admin del proyectoS
    header('Location: http://localhost/ESCOGE/reportes/');
}

else
    echo 'Credenciales incorrectas.';