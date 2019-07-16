<?php

    // llamo el archivo de conexion para la base de datos
    include_once('conexion.php');

    // otros datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // guardando la info. en la entidad eventos
    $query = "
        INSERT INTO info_retiro (titulo, descripcion)
        VALUES ('$titulo', '$descripcion')
    ";

    // verifico si la sentencia se ha ejecutado correctamente
    $conn->query($query);

    $conn->close();

    header('Location: http://localhost/ESCOGE/reportes/');
?>