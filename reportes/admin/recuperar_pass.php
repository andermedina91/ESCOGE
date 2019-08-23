<?php

// incluyo los archivos de trabajo
include('conexion.php');
include('consultas.php');
include('send-email/send-email.php');
include('token.php');

// obtengo el email que viene desde el formulario
$email = $_POST['email'];

/*
    verifico que la cuenta de correo enviada exista en la bd para
    proceder a mandarle un correo para re-establecer su contraseña
*/
if(buscarEmail($email))
{
    // preparo los parametros a enviar a la bd
    $token = new Token();
    $token = $token->getHash();
    $fecha_expiracion = time() + 365 * 24 * 60 * 5;

    // preparo la sentencia sql
    $sql = "
        UPDATE
            login
        SET
            token = '$token',
            fecha_expiracion = '$fecha_expiracion'
        WHERE
            email = '$email'
    ";

    // ejecuto la consulta
    if($conn->query($sql))
    {
        // envia el correo al usuario
        enviar_correo($email, $token);

        //enviar_correo($email);
        echo 'Enviamos un correo a tu cuenta.';
    }

    else
        echo 'Ocurrio un problema mientras se enviaba el correo.';
}

else
    echo 'La cuenta ingresada no existe.';