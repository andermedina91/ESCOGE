<?php

session_start();

if(! isset($_SESSION['user_data']))
    header('Location: http://localhost/ESCOGE/login.php');