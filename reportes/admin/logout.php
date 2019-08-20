<?php

    session_start();
    unset($SESSION['user_data']);
    session_destroy();

    header('Location: http://localhost/ESCOGE/');