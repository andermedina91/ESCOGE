<!-- <?php
// require_once('admin/current_user.php');
?> -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ESCOGE RD Registro</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="img/150.jpg">

    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="reportes/css/reporte.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block "><img src="reportes/img/biblia.png" alt=""></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Registrate!</h1>
                            </div>
                            <form class="user" method="POST" action="reportes/admin/registro.php">
                                <div class="form-group row">
                                    <!-- <div class="col-sm-6 mb-6 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="nombres"id="nombres" placeholder="Nombre de Usuario"
                                        required autocomplete="off" required="">
                                    </div>

                                    <!-- <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="apellidos" name="apellidos"
                                        placeholder="Apellidos" required autocomplete="off" required="">
                                    </div> -->
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"name="email"
                                    placeholder="Correo Electronicos" required autocomplete="off" required="">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password"name="password"
                                         placeholder="Contraseña" required autocomplete="off" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"id="repeat_password"name="repeat_password"
                                         placeholder="Repetir Contraeña" required autocomplete="off" required="">
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-user btn-block"  type="submit">Registrar Cuenta 

                                </button>
                                
                                <!-- <a href="#" class="btn btn-primary btn-user btn-block"  type="submit">Registrar Cuenta </a>
                                <hr> -->
                                <!-- <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Registrar con Google
                                </a> -->
                                <!-- <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Registrar con Facebook
                                </a> -->
                            </form>
                            <hr>
                            <div class="text-center">
                                <!-- <a class="small" href="contrasena.php">Se te olvidó tu contraseña?</a> -->
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
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
</body>

</html>