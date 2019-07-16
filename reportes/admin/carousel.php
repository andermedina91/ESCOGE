<?php

    // llamo el archivo de conexion para la base de datos
    include_once('conexion.php');
eventos
    // directorio donde se van a guardar las imagenes
    $path = '../../img/carousel/';

    // otros datos del formulario
    $titulo = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo)));
    $descripcion = $_FILES['description'];

    // guardando la info. en la entidad eventos
    $query = "
        INSERT INTO
        carousel (titulo, slug, descripcion)
        VALUES
            ('$titulo', '$slug', '$descripcion')
    ";

    // verifico si la sentencia se ha ejecutado correctamente
    if($conn->query($query) === TRUE)
    {
        // consulto el id_ del ultimo album registrado
        $result = $conn->query("SELECT MAX(id_carousel) as id_carousel FROM carousel");

        // recorro el resultado de la consulta
        while($row = $result->fetch_assoc())
        {
            $id_carousel = $row["id_carousel"];
        }
    }

    else
        echo 'caraii... nada!!' . $conn->error;

    // ciclo para recorrer todas las imagenes que vienen desde el formulario
    for($x = 0; $x < count($_FILES['imagenes']['name']); $x++)
    {
        // armo la ruta completa en donde se va a guardar la imagen
        $complete_path = $path . $_FILES['imagenes']['name'][$x];

        // muevo las imagenes al directorio especificado en la variable: $path
        if(move_uploaded_file($_FILES['imagenes']['tmp_name'][$x], $complete_path))
        {
            $query = "
                INSERT INTO
                    carousel_imagenes (id_carousel, imagen)
                VALUES
                    ('$id_carousel', '$complete_path')
            ";

            $conn->query($query);
        }
    }

    $conn->close();

    header('Location: http://localhost/ESCOGE/reportes/');
?>