<?php

    $servername = "localhost";
    $database = "escogerd";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Se produjo un error al conectarse en la base de datos: " . $conn->connect_error);
    }

?>