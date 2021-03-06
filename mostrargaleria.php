<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/150.jpg">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>ESCOGE REPUPLICA DOMINICANA</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--CSS ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- <link rel="stylesheet" href="css/animate.min.css"> -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body>
    <!-- INICIO DE NAVBAR  -->
    <section class="banner-area" id="home">
        <!-- Start Header Area -->
        <header class="default-header">
            <nav class="navbar navbar-expand-lg  navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/Logo_banner.png" style="height: 50%;width: 50%;" alt="logo de la pagina">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="text-white lnr lnr-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center " id="navbarSupportedContent ">
                        <ul class="navbar-nav ">
                            <li><a href="index.php">INICIO</a></li>
                            <li><a href="index.php#conoceme">CONÓCEME</a></li>
                            <li><a href="index.php#historia">HISTORIA</a></li>
                            <li><a href="index.php#escogerd">ESCOGERD</a></li>
                            <li><a href="contacto.html ">CONTACTO</a></li>
                            <!-- Dropdown -->
                            <li class="dropdown ">
                                <a class="dropdown-toggle " href="# " id="navbardrop " data-toggle="dropdown " aria-expanded="false ">
                                    ESCOGE
                                </a>
                                <div class="dropdown-menu ">

                                    <a class="dropdown-item " href="index.php#eventos">EVENTOS</a>
                                    <a class="dropdown-item " href="ficha.html">FICHA</a>
                                    <a class="dropdown-item " href="galeria.php">GALERIA</a>
                                    <!-- <a class="dropdown-item " href="contenido.html ">CONTENIDO</a> -->
                                    <a class="dropdown-item " href="equiponacional.html">EQUIPO NACIONAL</a>
                                    <a class="dropdown-item " href="diocesano.html">EQUIPO POR DIOCESIS</a>


                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- End Header Area -->
    </section>
    <!-- FINAL DEL NAVBAR -->
    <hr class="featurette-divider">

    <!-- INICIO DE GALERIA  -->

    <div class="container">
        <?php
                    
            require_once('reportes/admin/consultas.php');

            $gallery = getGallery($_GET['gallery']);

        ?>

        <h1><?php echo $gallery['titulo'][0] ?></h1>

        <div class="row">
            <div class="row">
                <?php
                    
                    if(! empty($gallery))
                    {
                        for($x = 0; $x < count($gallery['titulo']); $x++)
                        {
                            echo '
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="'
                                    .$gallery['titulo'][$x].'" data-image="'.substr($gallery['imagen'][$x], 6).'" data-target="#image-gallery">
                                        <img class="img-thumbnail" src="'.substr($gallery['imagen'][$x], 6).'" alt="Another alt text">
                                    </a>
                                </div>
                            ';
                        }
                    }

                    else
                        echo '<h3>No existen fotos en la galeria seleccionada.</h3>';

                ?>

                <div class="col-md-12">
                    <?php

                        echo '<p style="margin-top: 40px">'. $gallery['descripcion'][0] .'</p>';
                    ?>
                </div>
            </div>

            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- FINAL DE GALERIA  -->



</body>
<!-- INICIO DEL FOOTER-->
<footer class="footer-area section-gap ">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-5 col-md-6 col-sm-6 ">
                <div class="single-footer-widget ">
                    <h6>NOMBRES/ EMAIL</h6>
                    <p>
                        ANDERSON MEDINA / andermedina91@gmail.com
                        <br> HEIDY FERNANDEZ / hfernandez@gmail.com
                        <br> YIRA RODRIGUEZ / yrodriguez@gmail.com
                    </p>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->


                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6 ">
                <div class="single-footer-widget ">
                    <h6>DIOCESIS/ ARQUIDIOCESIS</h6>
                    <p>DIOCESIS DE LA VEGA <br> ARQUIDIOCESIS DE SANTIAGO
                        <br> ARQUIDIOCESIS DE SANTO DOMINGO

                    </p>
                    <div class=" " id="mc_embed_signup ">

                        <form target="_blank " novalidate="true " action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01 " method="get " class="form-inline ">

                            <div class="d-flex flex-row ">
                                <div style="position: absolute; left: -5000px; ">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a " tabindex="-1 " value=" " type="text ">
                                </div>

                                <!-- <div class="col-lg-4 col-md-4 ">
                                                    <button class="bb-btn btn "><span class="lnr lnr-arrow-right "></span></button>
                                                </div>  -->
                            </div>
                            <div class="info "></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget ">
                <div class="single-footer-widget ">
                    <h6>SÍGUENOS EN NUESTRAS <br> REDES SOCIALES</h6>

                    <div class="footer-social d-flex align-items-center ">
                        <a href="https://www.facebook.com/ "><i class="fa fa-facebook "></i></a>
                        <a href="https://twitter.com/ "><i class="fa fa-twitter "></i></a>
                        <a href="# "><i class="fa fa-youtube "></i></a>
                        <a href="# "><i class="fa fa-instagram "></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <br>
    <br>
    <br>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Ander Medina; Todos los derechos Reservado 2019</span>
        </div>
    </div>
</footer>
<!-- FINAL DEL FOOTER -->

<script src="js/vendor/jquery-2.2.4.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js " integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4 " crossorigin="anonymous "></script>
<script src="js/vendor/bootstrap.min.js "></script>
<script src="js/jquery.ajaxchimp.min.js "></script>
<script src="js/jquery.magnific-popup.min.js "></script>
<script src="js/owl.carousel.min.js "></script>
<script src="js/jquery.sticky.js "></script>
<script src="js/slick.js "></script>
<script src="js/jquery.counterup.min.js "></script>
<script src="js/waypoints.min.js "></script>
<script src="js/main.js "></script>
<script src="js/galeria1.js">
</script>

</html>