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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
                    <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#navbarSupportedContent " aria-controls="navbarSupportedContent " aria-expanded="false " aria-label="Toggle navigation ">
                        <span class="text-white lnr lnr-menu "></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center " id="navbarSupportedContent ">
                        <ul class="navbar-nav ">
                            <li><a href="index.php ">INICIO</a></li>
                            <li><a href="#conoceme">CONÓCEME</a></li>
                            <li><a href="#historia">HISTORIA</a></li>
                            <li><a href="#escogerd">ESCOGERD</a></li>
                            <li><a href="contacto.html ">CONTACTO</a></li>
                            <!-- Dropdown -->
                            <li class="dropdown ">
                                <a class="dropdown-toggle " href="# " id="navbardrop " data-toggle="dropdown " aria-expanded="false ">
                                    ESCOGE
                                </a>
                                <div class="dropdown-menu ">

                                    <a class="dropdown-item " href="#eventos">EVENTOS</a>
                                    <a class="dropdown-item " href="ficha.html ">FICHA</a>
                                    <a class="dropdown-item " href="galeria.php ">GALERIA</a>
                                    <!-- <a class="dropdown-item " href="contenido.html ">CONTENIDO</a> -->
                                    <a class="dropdown-item " href="equiponacional.html ">EQUIPO NACIONAL</a>
                                    <a class="dropdown-item " href="diocesano.html ">EQUIPO POR DIOCESIS</a>


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
    <span class="ir-arriba icon-circle-up "></span>
    <section class="default-banner active-blog-slider ">
    <?php
        require_once('reportes/admin/consultas.php');

        $albums = galleries();

        if(! empty($albums))
        {
            for($x = 0; $x < count($albums['titulo']); $x++)
            {
                echo '
                    <div class="item-slider relative" style="background: url('. substr($albums['imagen'][$x], 6) .'); background-size: cover;">
                        <div class="overlay " style="background: rgba(0,0,0,.3) "></div>
                        <div class="container ">
                            <div class="row fullscreen justify-content-center align-items-center ">
                                <div class="col-md-10 col-12 ">
                                    <div class="banner-content text-center ">
                                        <h2 class="text-white mb-20 text-uppercase ">'. $albums['titulo'][$x] .'</h2>
                                        <h3 class="text-uppercase text-white ">'. $albums['subtitulo'][$x] .'</h3>
                                        
                                        <p class="text-white ">'. $albums['descripcion'][$x] .'</p>
                                        <a href="mostrargaleria.php?gallery='.$albums['slug'][$x].'" class="text-uppercase header-btn " target="_blank">Ver Mas Imagenes</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                ';
            }
        }
    ?>
        <!-- <div class="item-slider relative " style="background: url(img/jmd.jpg);background-size: cover; ">
            <div class="overlay " style="background: rgba(0,0,0,.3) "></div>
            <div class="container ">
                <div class="row fullscreen justify-content-center align-items-center ">
                    <div class="col-md-10 col-12 ">
                        <div class="banner-content text-center ">
                            <h2 class="text-white mb-20 text-uppercase ">Jornada Misionera Diocesana</h2>
                            <h3 class="text-uppercase text-white ">La Vega 2018</h3>
                            <p class="text-white ">El Domingo 03/12/2018 se realizo la XX Asambla Nacional de Comunidades Escoge 2018</p>
                            <a href="jmd.html" class="text-uppercase header-btn ">Ver Mas Imagenes</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="item-slider relative " style="background: url(img/santiago.jpg);background-size: cover; ">
            <div class="overlay " style="background: rgba(0,0,0,.3) "></div>
            <div class="container ">
                <div class="row fullscreen justify-content-center align-items-center ">
                    <div class="col-md-10 col-12 ">
                        <div class="banner-content text-center ">
                            <h2 class="text-white mb-20 text-uppercase ">Asamblea Nacional de Comunidades</h2>
                            <h3 class="text-uppercase text-white ">La Vega 2017</h3>
                            <p class="text-white ">El Domingo 03/12/2018 se realizo la XX Asambla Nacional de Comunidades Escoge 2017.</p>
                            <a href="asamblea17.html" class="text-uppercase header-btn ">Ver Mas Imagenes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item-slider relative " style="background: url(img/sfm.jpg);background-size: cover; ">
            <div class="overlay " style="background: rgba(0,0,0,.3) "></div>
            <div class="container ">
                <div class="row fullscreen justify-content-center align-items-center ">
                    <div class="col-md-10 col-12 ">
                        <div class="banner-content text-center ">
                            <h2 class="text-white mb-20 text-uppercase ">Compartir de Comunidades</h2>
                            <h3 class="text-uppercase text-white ">Santo Domingo 2018</h3>
                            <p class="text-white ">El Domingo 03/12/2018 se realizo la XX Asambla Nacional de Comunidades Escoge 2017.</p>
                            <a href="asamblea18.html" class="text-uppercase header-btn ">Ver Mas Imagenes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>


    <!-- QUE ES EL ESCOGE -->
    <section class="section-gap info-area " id="page-top" id="about ">
        <div class="container ">
            <div class="row d-flex justify-content-center ">
                <div class="menu-content pb-40 col-lg-8 ">
                    <div class="title text-center ">
                        <h2 class="mb-10 ">"UNIDOS TODOS PARA QUE EL MUNDO CREA "</h2>
                    </div>
                </div>
            </div>
            <div class="single-info row mt-40 " id="conoceme">
                <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left ">
                    <div class="info-thumb ">
                        <img src="img/escoge.png " class="img-fluid " alt=" ">
                        <p>
                            <h3>Logo Movimiento Escoge</h3>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 no-padding info-rigth ">
                    <div class="info-content ">
                        <h2 class="pb-30 ">QUE ES EL ESCOGE</h2>
                        <P>Es un movimiento de la Iglesia Católica que pretende integrar al participante como persona a su familia humana y a su familia de fe, para que pueda cumplir su vocación laical en el.
                            <br>El ESCOGE es un movimiento católico para jóvenes solteros de 20 a 45 años de edad, cuyo objetivo es integrar al joven con su Familia Humana y de Fe, para que pueda realizar su vocación laical en el mundo y ser testimonios
                            del amor de Cristo ante los demás.
                        </P>
                        <p>
                            <p><a class="primary-btn mt-20 " href="escoge.html " role="button ">seguir leyendo</a></p>
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN QUE ES EL ESCOGE -->

    <!-- INICIO DE LA HISTORIA -->
    <section class="section-gap info-area " id="about ">
        <div class="container ">

            <div class="single-info row mt-40 " id="historia">
                <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left ">
                    <div class="info-thumb ">
                        <img src="img/sacerdote.jpg " class="img-fluid " alt=" ">
                        <p>
                            <h3>Chuck Gallagher (Fundador del Movimiento Escoge)</h3>
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 no-padding info-rigth ">
                    <div class="info-content ">
                        <h2 class="pb-30 " class="title">HISTORIA</h2>
                        El ESCOGE es un movimiento católico para jóvenes solteros de 20 a 45 años de edad, cuyo objetivo es integrar al joven con su Familia Humana y de Fe, para que pueda realizar su vocación laical en el mundo y ser testimonios del amor de Cristo ante los demás.
                        El sacerdote Chuck Gallagher de USA, se dedicaba especialmente a dirigir retiros espirituales para jóvenes, hasta que fue invitado en Octubre de 1968 a un Fin de Semana (FDS) de Encuentro Conyugal, integrado en el Movimiento Familiar
                        Cristiano (MFC). Desde ese momento, se dedicó en cuerpo y alma a promover y potenciar el carisma renovador que allí descubrió.<br>
                        <p>
                            <p><a class="primary-btn mt-20 " href="historia.html " role="button ">seguir leyendo</a></p>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DE LA HISTORIA -->

    <!-- INICIO ESCOGE REPUBLICA DOMINICANA -->
    <section class="section-gap info-area " id="about ">
        <div class="container ">

            <div class="single-info row mt-40 " id="escogerd">
                <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left ">
                    <div class="info-thumb ">
                        <img src="img/historia.png " class="img-fluid " height="800 " width="100% ">
                        <p>
                            <h3>Primeros Dominicano en vivir la Experiencia Escoge en Mexico</h3>
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 no-padding info-rigth ">
                    <div class="info-content ">
                        <h2 class="pb-30 ">ESCOGE REPUBLICA DOMINICANA</h2>
                        <p>En Febrero del 1996, se realizó el primer FDS del Escoge en La Diócesis de la Vega, República Dominicana, en la casa de Cursillos del Santo Cerro, gracias al apoyo del Equipo Eclesial de Toluca y de un grupo de parejas y jóvenes,
                            24 Mexicanos que viajaron por 10 días a R. D. y así se pudo hacer realidad este gran reto.
                        </p>
                        <p>
                            <p><a class="primary-btn mt-20 " href="escogerd.html " role="button ">seguir leyendo</a></p>
                        </p>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DE ESCOGE REPUBLICA DOMINICANA -->


    <!-- INICIO EVENTOS-->
    <section class="project-area section-gap " id="eventos">
        <div class="container ">
            <div class="row d-flex justify-content-center ">
                <div class="menu-content pb-30 col-lg-8 ">
                    <div class="title text-center ">
                        <h1 class="mb-10 ">EVENTOS REPUBLICA DOMINICANA </h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center d-flex ">
                <div class="active-works-carousel mt-40 col-lg-8 ">


                    <!-- <div class="item ">
                        <img class="img-fluid " src="img/fds54.jpg " alt=" ">
                        <div class="caption text-center mt-20 ">
                            <h6 class="text-uppercase ">FIN DE SEMANA ESCOGE 54 </h6>
                            <p> Dichosos los que oyen la Palabra de Dios y la guardan. <br>(Lucas 11:28) </p>
                        </div>
                    </div>
                    <div class="item ">
                        <img class="img-fluid " src="img/fds55.jpg " alt=" ">
                        <div class="caption text-center mt-20 ">
                            <h6 class="text-uppercase ">FIN DE SEMANA ESCOGE 55</h6>
                            <p>Y Jesús les dijo: Seguidme, y yo haré que seáis pescadores de hombres. <br>(Marcos 1:17) </p>
                        </div>
                    </div>
                    <div class="item ">
                        <img class="img-fluid " src="img/retiro.jpg " alt=" ">
                        <div class="caption text-center mt-20 ">
                            <h6 class="text-uppercase ">RETIRO DE INTEGRACION</h6>
                            <p>Les digo que así mismo se alegra Dios con sus ángeles por un pecador que se arrepiente.<br> (Lucas 15:10)</p>
                        </div>
                    </div> -->

                    <?php

                        require_once('reportes/admin/consultas.php');

                        $eventos = eventos();

                        if(! empty($eventos))
                        {
                            for($x = 0; $x < count($eventos['titulo']); $x++)
                            {
                                echo '
                                    <div class="item ">
                                        <img class="img-fluid " src="'. substr($eventos['imagen'][$x], 6) .'" alt=" ">
                                        <div class="caption text-center mt-20 ">
                                            <h6 class="text-uppercase ">'.strtoupper($eventos['titulo'][$x]).'</h6>
                                            <p>'.$eventos['descripcion'][$x].'</p>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- FIN DE EVENTOS -->


    <!-- INICIO CALENDARIO DE RETIRO-->
    <section class="feature-area section-gap " id="secvice ">
        <div class="container ">
            <div class="row d-flex justify-content-center ">
                <div class="menu-content pb-60 col-lg-8 ">
                    <div class="title text-center ">
                        <h1 class="mb-10 " id="retiros ">RETIROS REPUBLICA DOMINICANA</h1>
                        <p>PORQUE SON MUCHOS LOS LLAMADOS Y POCOS LOS ESCOGIDOS.</p>
                    </div>
                </div>
            </div>

            <div class="row ">
                <?php

                    require_once('reportes/admin/consultas.php');

                    $retiros = retiros();

                    if(! empty($retiros))
                    {
                        for($x = 0; $x < count($retiros['titulo']); $x++)
                        {
                            echo '
                                <div class="col-lg-4 col-md-6 ">
                                    <div class="single-feature mb-30 ">
                                        <div class="title d-flex flex-row pb-20 ">
                                            <span class="lnr lnr-user "></span>
                                            <h4><a href="">'.strtoupper($retiros['titulo'][$x]).'</a></h4>
                                        </div>
                                        <p><a href="">'.$retiros['descripcion'][$x].'</a></p>
                                    </div>
                                </div>
                            ';
                        }
                    }

                    else
                        echo '<h3>No existen retiros publicados.</h3>';
                ?>
            </div>
        </div>
    </section>
    <!-- FINAL DEL CALENDARIO DE RETIRO-->

    <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
        <i class="fas fa-angle-up"></i>
    </a>


</body>
<!-- INICIO DEL FOOTER -->
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


<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js "><\/script>')
</script>

<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js "></script>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase-firestore.js "></script>

</html>