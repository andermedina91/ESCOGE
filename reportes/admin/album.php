<?php

    // llamo el archivo de conexion para la base de datos
    include_once('conexion.php');

    // directorio donde se van a guardar las imagenes
    $path = '../../img/albums/';

    // otros datos del formulario
    $titulo = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo)));
    $subtitulo =$_POST['subtitulo'];
    $descripcion = $_POST['description'];

    // guardando la info. en la entidad Albums
    $query = "
        INSERT INTO
            albums (titulo, slug, subtitulo, descripcion)
        VALUES
            ('$titulo', '$slug','$subtitulo', '$descripcion')
    ";

    // verifico si la sentencia se ha ejecutado correctamente
    if($conn->query($query) === TRUE)
    {
        // consulto el id_ del ultimo album registrado
        $result = $conn->query("SELECT MAX(id_album) as id_album FROM albums");

        // recorro el resultado de la consulta
        while($row = $result->fetch_assoc())
        {
            $id_album = $row["id_album"];
        }
    }

    else
        echo $conn->error;

    // obtener la fecha actual
    $fecha = new DateTime();

    // ciclo para recorrer todas las imagenes que vienen desde el formulario
    for($x = 0; $x < count($_FILES['imagenes']['name']); $x++)
    {
        $image_arr = explode('.', $_FILES['imagenes']['name'][$x]);
    
        // armo la ruta completa en donde se va a guardar la imagen
        $complete_path = $path . $image_arr[0] . $fecha->getTimestamp() . $image_arr[1];

        // muevo las imagenes al directorio especificado en la variable: $path
        if(move_uploaded_file($_FILES['imagenes']['tmp_name'][$x], $complete_path))
        {
            $query = "
                INSERT INTO
                    album_imagenes (id_album, imagen)
                VALUES
                    ('$id_album', '$complete_path')
            ";

            $conn->query($query);
        }
    }

    $conn->close();

    header('Location: http://localhost/ESCOGE/reportes/');

?>