<?php
    include('reportes/admin/consultas.php');
    date_default_timezone_set('America/Santo_Domingo');

    // script para cuando el usuario envia su nueva contrasena
    if($_POST)
    {
        $errores = [];
        $success = [];

        // variables de trabajo
        $pass = $_POST['password'];
        $repeat_pass = $_POST['repeat_password'];
        $token = $_POST['token'];
        $fecha_expiracion_token = expiraToken($token);

        // verifico que el token aun se encuentre activo
        if(strtotime($fecha_expiracion_token) > time())
        {
            # cambiar contrasena #
            if($pass == $repeat_pass)
            {
                include('reportes/admin/conexion.php');

                // preparo la sentencia sql
                $sql = "
                    UPDATE
                        login
                    SET
                        password = '$pass',
                        fecha_expiracion = NULL,
                        token = NULL
                    WHERE
                        token = '$token'
                ";

                // ejecuto la consulta
                if($conn->query($sql))
                    $success['send_email'] = 'La contrasena se ha restablecido correctamente.';
            }

            else
                $errores['pass'] = 'La pass ingresada no coinciden.';
        }

        else
            $errores['token'] = 'No puedes cambiar tu contrasena usando este token.';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ESCOGE RD Olvidar Contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="img/150.jpg">

    <!-- Custom styles for this template-->
    <link href="reportes/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="reportes/img/repote.jpg" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Cambia tu contraseña</h1>
                                    </div>
                                    <form class="user" action="http://localhost/ESCOGE/recover_pass.php" method="POST">
                                        <!-- <form class="user" action="http://localhost/ESCOGE/reportes/admin/restablecer_pass.php" method="POST"> -->
                                        <div class="form-group">
                                            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Nueva contrasena">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="repeat_password" name="repeat_password" placeholder="Repita la nueva contrasena">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Restablecer Contraseña
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="registro.html">Crear Cuenta!</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
    <?php
        if(isset($errores['pass']))
        {
            echo '
                <script>
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "'.$errores['pass'].'",
                        footer: "Por favor, ingresa tus credenciales nuevamente."
                    });
                </script>
            ';

            $errores['pass'] = null;
        }
        
        // alerta para el token
        if(isset($errores['token']))
        {
            echo '
                <script>
                    Swal.fire({
                        title: "El token ha expirado",
                        text: "'.$errores['token'].'",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Okey!"
                        }).then((result) => {
                            if (result.value)
                            {
                                window.location.href = "http://localhost/ESCOGE/reportes/contrasena.php";
                            }
                    });
                </script>
            ';

            $errores['token'] = null;
        }

        // alerta de exito cuando se envia el correo al usuario
        if(isset($success['send_email']))
        {
            echo '
                <script>
                    Swal.fire({
                        title: "Cambio de contrasena exitoso",
                        text: "'.$success['send_email'].'",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Okey!"
                        }).then((result) => {
                            if (result.value)
                            {
                                window.location.href = "http://localhost/ESCOGE/login.php";
                            }
                    });
                </script>
            ';
                    
            $success = null;
        }
    ?>

</body>

</html>