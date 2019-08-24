<?php
    date_default_timezone_set('America/Santo_Domingo');

    if($_POST)
    {
        include('admin/consultas.php');

        // obtengo el email que viene desde el formulario
        $email = $_POST['email'];
        $errores = [];
        $success = [];

        /*
            verifico que la cuenta de correo enviada exista en la bd para
            proceder a mandarle un correo para re-establecer su contraseña
        */
        if(buscarEmail($email))
        {
            // incluyo los archivos de trabajo
            include('admin/conexion.php');
            include('admin/send-email/send-email.php');
            include('admin/token.php');

            // preparo los parametros a enviar a la bd
            $token = new Token();
            $token = $token->getHash();
            $fecha_expiracion = date('Y-m-d H:i:s', time() + 60 * 5);

            // preparo la sentencia sql
            $sql = "
                UPDATE
                    login
                SET
                    token = '$token',
                    fecha_expiracion = '$fecha_expiracion'
                WHERE
                    email = '$email'
            ";

            // ejecuto la consulta
            if($conn->query($sql))
            {
                // envia el correo al usuario
                enviar_correo($email, $token);

                //enviar_correo($email);
                $success['send_email'] = 'Acabamos de enviar un correo a tu cuenta, por favor, procede a cambiar tu contrasena.';
            }

            else
                echo 'Ocurrio un problema mientras se enviaba el correo.';
        }

        else
            $errores['email'] = 'La cuenta ingresada no existe.';
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
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/repote.jpg" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Lo conseguimos, las cosas pasan. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña.!</p>
                                    </div>
                                    <form class="user" action="http://localhost/ESCOGE/reportes/contrasena.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrar con el Correo Eletronico...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Recibir correo
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="registro.html">Crear Cuenta!</a> -->
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="http://localhost/ESCOGE/login.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
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

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>

    <?php
        // alerta para notificar al usuario que hay errores
        if(isset($errores['email']))
        {
            echo '
                <script>
                    Swal.fire({
                        type: "error",
                        title: "Oops...",
                        text: "'.$errores['email'].'",
                        footer: "Por favor, comprueba que la cuenta ingresada te pertenece."
                    });
                </script>
            ';

            $errores = null;
        }

        // alerta de exito cuando se envia el correo al usuario
        if(isset($success['send_email']))
        {
            echo '
                <script>
                    Swal.fire({
                        title: "Envio de correo exitoso",
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