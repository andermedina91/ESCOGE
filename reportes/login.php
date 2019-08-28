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

    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="css/reporte.css">

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
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/cruz.png" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenid@s</h1>
                                    </div>
                                    <form class="user" method="POST">

                                        <?php
                                     
                                     header('Location: http://localhost/ESCOGE/reportes/');
                                        include 'conexion.php';

                                        if ($conexion->connect_error) {
                                            die("La conexion falló: " . $conexion->connect_error);
                                        }

                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        $sql = "SELECT * FROM $login WHERE user_name = '$username'";


                                        $result = $conexion->query($sql);


                                        if ($result->num_rows > 0) { }


                                        $row = $result->fetch_array(MYSQLI_ASSOC);
                                        // if (password_verify($password, $row['password'])) { 
                                        if ($password == $row['password']) {


                                            // $_SESSION['loggedin'] = true;
                                            $_SESSION['username'] = $username;
                                            $_SESSION['start'] = time();
                                            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

                                            echo "Bienvenido! " . $_SESSION['username'];
                                            echo "<br><br><a href=panel-control.php>Panel de Control</a>";

                                            header('Location: http://localhost/ESCOGE/reportes/');
                                        } else {
                                            echo "Username o Password estan incorrectos.";

                                            echo "<br><a href='login.html'>Volver a Intentarlo</a>";
                                        }
                                        mysqli_close($conexion);
                                        ?>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Iniciar Seccion
                                        </a>
                                        <!-- <a href="/" class="btn btn-primary btn-user btn-block" onclick="SignInWithEmailAndPass()">Iniciar Seccion                
                                        </a> -->
                                        <!-- <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block" onclick="googleSignln()">
                                            <i class="fab fa-google fa-fw"></i> Iniciar con Google
                                        </a>
                                        
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Iniciar con Facebook
                                        </a>
                                        -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="contrasena.php">Olvidaste la Contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registro.html" onclick="create()">Crear Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        >

    </div>
</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/5.8.1/firebase.js "></script>


<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->

<script src="js/reporte.min.js"></script>
<script src="js/login.js"></script>



</html>