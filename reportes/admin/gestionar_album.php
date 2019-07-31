<?php

    // llamo el archivo de conexion para la base de datos
    include_once('conexion.php');
    
    // otros datos del formulario
    $id_imagen = $_POST['id_imagen'];
    $id_album = $_POST['id_album'];

    // actualizzando la info. de la imagen
    $query = "
        UPDATE
            album_imagenes
        SET
            es_principal = 0
        WHERE
            id_album = '$id_album'
    ";

    $conn->query($query);

    $query = "
        UPDATE
            album_imagenes
        SET
            es_principal = 1
        WHERE
            id_detalle = '$id_imagen'
    ";

    // verifico si la sentencia se ha ejecutado correctamente
    if($conn->query($query))
        echo 1;

    $conn->close();