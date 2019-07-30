<?php

    // llamo el archivo de conexion para la base de datos
    include_once('conexion.php');
    
    // otros datos del formulario
    $id_imagen = $_POST['id_imagen'];

    // actualizzando la info. de la imagen
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
    
    //header('Location: http://localhost/ESCOGE/reportes/gestionalbums.php');