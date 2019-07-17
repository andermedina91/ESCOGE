<?php

    // echo '<pre>';
    // var_dump($_FILES['imagen']['name']);
    // return 0;

    // llamo el archivo de conexion para la base de datos
    include_once('conexion.php');

    // directorio donde se van a guardar las imagenes
    $path = '../../img/eventos/';

    // otros datos del formulario
    $titulo = $_POST['title'];
    $descripcion = $_POST['description'];
    $imagen = $path . $_FILES['imagen']['name'];

    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen))
    {
        $query = "
            INSERT INTO
                eventos (imagen, titulo, descripcion)
            VALUES
                ('$imagen', '$titulo', '$descripcion')
        ";

        $conn->query($query);
    }

    $conn->close();

    header('Location: http://localhost/ESCOGE/reportes/');
?>