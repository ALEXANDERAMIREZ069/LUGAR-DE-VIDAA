<?php
	session_start();
    $usuario=$_SESSION['usuario'];
    $correo=$_SESSION['correo'];
    $numero=$_SESSION['Num_tel'];
    ?>  
<html>
<head>
    <title>Un lugar de vida </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family = Roboto + Mono: ital, wght @ 1300 & display = swap " rel=" stylesheet ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family = Bebas + Neue & display = swap " rel=" stylesheet ">
    <link rel="icon" type="image/jpg" href="img-anette/descarga.png">
    <link rel="stylesheet" href="css/principal.css">
    
</head>

<body>
    <!-- barra de estado-->
    <nav>
        <div class="logo">
            <svg viewBox="0 0 1600 200">
            <symbol id="s-text">
                <text text-anchor="middle" x="50%" y="80%">Un lugar de vida</text>
            </symbol>
        
            <g class = "g-ants">
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
                <use xlink:href="#s-text" class="text-copy"></use>
            </g>
        </svg>
        </div>
        <ul class="cont-ul">
            <li><a href="principal.php" class="bar2">¿Quines somos?</a></li>
            <li><a href="contenido.php" class="bar">!!Tiendita:3!!</a></li>
            <li class="develop">
                <a href="servicio.php" class="bar">Catalogo</a>

            </li>
                <?php
                if(strlen($usuario)){
                ?>
                <li><a href="#" id="abrir" class="bar">ver informacion</a></li>
                <?php
                }else{
                    ?>
                    <li><a href="bd/index.html"  class="bar">Unetenos OwO</a></li>
                    <?php
                }

                ?>
            
        </ul>
    </nav>
    <!--informacion del cliente -->
    <div class="overlay2" id="overlay2">
        <div class="ventana2" id="ventana2">
            <a href="#" class="icono"><i class="fas fa-user"></i></a>
            <a href="#" class="cerrar2" id="cerrar2"><i class="fas fa-times"></i></a>
            <p>Nombre: </p>
            <p><?php 
            if($usuario){
                echo "$usuario";
            }else{
              echo "------";
            }
            ?></p><br>
            <p>Numero: </p>
            <p><?php 
            if($numero){
                echo "$numero";
            }else{
              echo "------";
            }
            ?></p><br>
            <p>Correo</p>
            <p><?php 
            if($correo){
                echo "$correo";
            }else{
              echo "------";
            }
            ?></p>
            <form action="bd/salir.php">
                <input type="submit" class="boton" value="cerrar sesion">
            </form>
        </div>
    </div>
    <!--carrucel -->
    <div class="contenedor">
        <ul class="carrucel">
            <li class="cont-carrucel"><img src="img/9.jpg" width="1000px" ;></li>
            <li class="cont-carrucel"><img src="img/5.jpg" width="1000px" ;></li>
            <li class="cont-carrucel"><img src="img/6.jpg" width="1000px" ;></li>
            <li class="cont-carrucel"><img src="img/7.jpg" width="1000px" ;></li>
        </ul>
    </div>
    <div class="tarjeta">
        <div class="info">
            <img src="img/2.jpg">
            <h3>Escoje la mejor planta</h3>
            <p>te ayudaremos y guiaremos para que puedas escojer la mejor planta para ti de forma que se adapte a tu manera de vida y tambien que se adapte a tu estilo de vida</p>
        </div>
        <div class="info">
            <img src="img/3.jpg">
            <h3>Los cuidados para una vida </h3>
            <p>Te brindaremos recomendaciones o cuidados especiales dependiendo la planta que escojas o que lleges a tener para que esta tenga una vida placidad y feliz</p>
        </div>
        <div class="info">
            <img src="img/4.jpg">
            <h3>Mas que plantas tambien tenemos flores</h3>
            <p>No simplemente no especializamos en plantas si no que tambien tenemos una variedad de flores muy hermosas como los tulipanes, entre otras cosas esto lo vas apoder checar con mas detalle en el apartado de catalogo o si te interesa abquirir
                una esta esta en tiendita</p>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Mas sobre nosotros</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Un lugar de vida
                        </h6>
                        <p>
                            La intencion de un lugar de vida es poder difundir informacion sobre los cuidados necesarios para las plantas y al mismo tiempo que los usuarios se animen a comprar una planta o flores para hacer un lugar mejor </p>
                    </div>
                    <!-- Grid column -->



                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            acciones
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">¿Quines somos?</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">!!Tiendita!!</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Catalogo</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Unetenos</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i>Anette Vargas Garcia</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i> vxga041115mmcrrr@soycecytem.mx
                        </p>
                        <p><i class="fas fa-phone me-3"></i> whatsapp - 5544797162</p>
                        <p><i class="fas fa-print me-3"></i> numero - 5585767521</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 corp AMAP:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">desarrollo por AMAP </a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="js/informacion.js"></script>
</body>

</html>