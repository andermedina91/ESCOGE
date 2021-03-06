<?php
    session_start();

    if(isset($_SESSION['user_data']))
        header('Location: http://localhost/ESCOGE/reportes/');

    if($_POST)
    {
        require_once('reportes/admin/consultas.php');
        $errores = [];

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(existUser($email, $password))
        {
            // redirecciono a la parte admin del proyectoS
            header('Location: http://localhost/ESCOGE/reportes/');
        }

        else
            $errores['user'] = 'Las credenciales son incorrectas o el usuario ingresado no existe.';
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

    <title>ESCOGE RD Login</title>
    <link rel="shortcut icon" href="img/150.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="reportes/css/reporte.css">

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
                            <div class="col-lg-6 d-none d-lg-block"><img 
                            src="reportes/img/cruz.png"


                            alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenid@s</h1>
                                    </div>
                                    <!-- <form class="user" method="POST" action="http://localhost/ESCOGE/reportes/"> -->
                                    <form class="user" method="POST" action="login.php">

                                    <!-- header('Location: http://localhost/ESCOGE/reportes/'); -->
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" 
                                            name="email" id="email" placeholder="Ingrese su usuario..." 
                                            required autocomplete="off" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" 
                                            name="password" id="password" placeholder="Ingrese su contraseña" 
                                            autocomplete="off" required="">
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input"
                                                 id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    Recuerdame</label>
                                            </div> -->
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit"> 
                                            Iniciar Sesion
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="reportes/contrasena.php" type="submit ">Olvidaste la Contraseña?</a>
                                    </div>
                                    <div class="text-center">
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
    <script src="reportes/vendor/jquery/jquery.min.js"></script>
    <script src="reportes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="reportes/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

    <?php
        if(isset($errores['user']))
        {
            echo '
                <script>
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "'.$errores['user'].'",
                        footer: "Por favor, ingresa tus credenciales nuevamente."
                    });
                </script>
            ';

            $errores['user'] = null;
        }
    ?>

</body>

</html>