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
                            AND b.es_principal = 1
                ) AS imagen,

                (
                    SELECT
                        b.id_detalle
                    FROM
                        album_imagenes as b
                    WHERE
                        a.id_album = b.id_album
                    LIMIT 1
                ) AS id_detalle
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
            $data["id_album"][] = $row['id_album'];
            $data['titulo'][] = $row['titulo'];
            $data['subtitulo'][] = $row['subtitulo'];
            $data['slug'][] = $row['slug'];
            $data['descripcion'][] = $row['descripcion'];
            $data['imagen'][] = $row['imagen'];
            $data['fecha'][] = $row['fecha_creacion'];
            $data['id_detalle'][] = $row['id_detalle'];
        }

        return $data ?? 0;
    }


    function getGallery ($slug_or_id)
    {
        include('conexion.php');

        $query = "
            SELECT
                *
            FROM
                albums as a
                    INNER JOIN
                album_imagenes as b on a.id_album = b.id_album
            WHERE
                (CASE
                    WHEN '$slug_or_id' REGEXP '^-?[0-9]+$' THEN a.id_album = '$slug_or_id'
                    ELSE a.slug = '$slug_or_id'
                END)
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
            $data['id_detalle'][] = $row['id_detalle'];
            $data['id_album'][] = $row['id_album'];
            $data['es_principal'][] = $row['es_principal'];
        }

        return $data ?? 0;
    }

    //INICIO DE RETIRO

    function retiros ()
    {
        include('conexion.php');

        $query = "
            SELECT
                *
            FROM
                info_retiro
        ";

        // guardo los resultados de la consulta
        $result = $conn->query($query);

        // cierro la conexion a la base de datos
        //$conn->close();

        // recorriendo los resultados de la consulta
        while($row = $result->fetch_assoc())
        {
            $data['titulo'][] = $row['titulo'];
            $data['descripcion'][] = $row['descripcion'];
        }

        return $data ?? 0;
    }

    //INICIO DE CAROUSEL

    function carousel ()
    {
        include('conexion.php');

        $query = "
           
            SELECT 
            id_carousel,titulo,subtitulo,slug,descripcion,imagen,  FROM carousel
        ";

        // guardo los resultados de la consulta
        $result = $conn->query($query);

        // cierro la conexion a la base de datos
        $conn->close();

        // recorriendo los resultados de la consulta
        while($row = $result->fetch_assoc())
        {
            $data['titulo'][] = $row['titulo'];
            $data['subtitulo'][] = $row['subtitulo'];
            $data['slug'][] = $row['slug'];
            $data['descripcion'][] = $row['descripcion'];
            $data['imagen'][] = $row['imagen'];
        }

        return $data ?? 0;
    }

    function eventos ()
    {
        include('conexion.php');

        $query = "
            SELECT
                *
            FROM
                eventos
        ";

        // guardo los resultados de la consulta
        $result = $conn->query($query);

        // cierro la conexion a la base de datos
        //$conn->close();

        // recorriendo los resultados de la consulta
        while($row = $result->fetch_assoc())
        {
            $data['imagen'][] = $row['imagen'];
            $data['titulo'][] = $row['titulo'];
            $data['descripcion'][] = $row['descripcion'];
        }

        return $data ?? 0;
    }

    function existUser ($email, $pass)
    {
        include('conexion.php');

        $query = "
            SELECT
                *
            FROM
                login
            WHERE
                email = '$email'
                    and password = '$pass'
            LIMIT 1
        ";

        $result = $conn->query($query);

        while($row = $result->fetch_assoc())
        {
            $data['username'] = $row['username'];
            $data['email'] = $row['email'];
            $data['password'] = $row['password'];
        }

        return isset($data) ? true : false;
    }

    function buscarEmail ($email)
    {
        include('conexion.php');

        $query = "
            SELECT
                *
            FROM
                login
            WHERE
                email = '$email'
            LIMIT 1
        ";

        $result = $conn->query($query);

        while($row = $result->fetch_assoc())
        {
            $data['email'] = $row['email'];
        }

        return isset($data) ? true : false;
    }
?>