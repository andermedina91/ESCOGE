<?php

    function galleries ()
    {
        include_once('conexion.php');

        $query = "
            SELECT
                a.*,
                (
                    SELECT
                        b.imagen
                    FROM
                        album_imagenes as b
                    WHERE
                        a.id_album = b.id_album
                    LIMIT 1
                ) AS imagen
            FROM
                albums as a
        ";

        // guardo los resultados de la consulta
        $result = $conn->query($query);

        // cierro la conexion a la base de datos
        $conn->close();

        // recorriendo los resultados de la consulta
        while($row = $result->fetch_assoc())
        {
            $data['titulo'][] = $row['titulo'];
            $data['slug'][] = $row['slug'];
            $data['descripcion'][] = $row['descripcion'];
            $data['imagen'][] = $row['imagen'];
        }

        return $data ?? 0;
    }


    function getGallery ($slug)
    {
        include_once('conexion.php');

        $query = "
            SELECT
                *
            FROM
                albums as a
                    INNER JOIN
                album_imagenes as b on a.id_album = b.id_album
            WHERE
                a.slug = '$slug'
        ";

        // guardo los resultados de la consulta
        $result = $conn->query($query);

        // cierro la conexion a la base de datos
        $conn->close();

        // recorriendo los resultados de la consulta
        while($row = $result->fetch_assoc())
        {
            $data['titulo'][] = $row['titulo'];
            $data['descripcion'][] = $row['descripcion'];
            $data['imagen'][] = $row['imagen'];
        }

        return $data ?? 0;
    }


    
?>