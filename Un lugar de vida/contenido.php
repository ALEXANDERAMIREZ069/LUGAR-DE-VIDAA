<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family = Roboto + Mono: ital, wght @ 1300 & display = swap " rel=" stylesheet ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family = Bebas + Neue & display = swap " rel=" stylesheet ">
    <link rel="icon" type="image/jpg" href="img-anette/descarga.png">
    <link rel="stylesheet" href="css/contenido.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/11f546f2b8.js" crossorigin="anonymous"></script>
    <title>Un lugar de vida</title>
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
            <li><a href="principal.php" class="bar">¿Quines somos?</a></li>
            <li><a href="contenido.php" class="bar2">!!Tiendita:3!!</a></li>
            <li class="develop">
                <a href="servicio.php" class="bar">Catalogo</a>

            </li>

            <li><a href="bd/index.html" class="bar">Unetenos OwO</a></li>
        </ul>
    </nav>
    <!--contenido pricipal-->
    <a href="#" id="abrir" class="carrito"><i class="fas fa-shopping-cart"></i></a>
    <header>
        <div class="container">
            <h1 class="text-center">TIENDA</h1>
            <hr>
        </div>
    </header>
    <!-- START SECTION STORE -->
    <section class="store">
        <?php  
$conex=mysqli_connect("localhost","root","12345678","UnLugarDeVida");
$ins="SELECT * FROM producto";
$datos=mysqli_query($conex,$ins);
while($row=$datos->fetch_array()){

?>
        <div class="info">
            <h2>por esto deberias comprar!!</h2>
            <p>
                <?php echo $nombre=$row['descripcion'];?>
            </p>
        </div>
        <div class="container">
            <div class="items">
                <div class="col-12 col-md-6">
                    <div class="item shadow mb-4">
                        <h3 class="item-title">
                            <?php echo $nombre=$row['nombre'];?>
                        </h3>
                        <img class="item-image" width="300px" height="200px" src="data:image/jpg;base64,<?php  echo base64_encode($row['img']);?>">

                        <div class="item-details">
                            <h4 class="item-price">
                                <?php 
                                 $nombre=$row['precio'];
                                 echo "$nombre  MXN";
                                 ?>
                            </h4>
                            <button  style="background-color: black; border-color: black;"class="item-button btn btn-primary addToCart">AÑADIR AL CARRITO</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
}
?>
    </section>
    <!-- END SECTION STORE -->
    <!-- START SECTION SHOPPING CART -->
    <div class="overlay" id="overlay">
        <div class="ventana" id="ventana">
            <a href="#" id="cerrar" class="cerrar"><i class="fas fa-times"></i></a>
            <section class="shopping-cart">
                <div class="container">
                    <h1 class="text-center">CARRITO</h1>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="shopping-cart-header">
                                <h6>Producto</h6>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="shopping-cart-header">
                                <h6 class="text-truncate">Precio</h6>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="shopping-cart-header">
                                <h6>Cantidad</h6>
                            </div>
                        </div>
                    </div>
                    <!-- ? START SHOPPING CART ITEMS -->
                    <div class="shopping-cart-items shoppingCartItemsContainer">
                    </div>
                    <!-- ? END SHOPPING CART ITEMS -->

                    <!-- START TOTAL -->
                    <div class="row">
                        <div class="col-12">
                            <div class="shopping-cart-total d-flex align-items-center">
                                <p class="mb-0">Total</p>
                                <p class="ml-4 mb-0 shoppingCartTotal">0€</p>
                                <div class="toast ml-auto bg-info" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                                    <div class="toast-header">
                                        <span>✅</span>
                                        <strong class="mr-auto ml-1 text-secondary">Elemento en el carrito</strong>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="toast-body text-white">
                                        Se aumentó correctamente la cantidad
                                    </div>
                                </div>
                                <button class="btn btn-success ml-auto comprarButton" type="button" data-toggle="modal" data-target="#comprarModal">Comprar</button>
                            </div>
                        </div>
                    </div>

                    <!-- END TOTAL -->

                    <!-- START MODAL COMPRA -->
                    <!--<div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="comprarModalLabel">Gracias por su compra</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Pronto recibirá su pedido</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    <!-- END MODAL COMPRA -->


                </div>

            </section>
        </div>
    </div>
    <!-- END SECTION SHOPPING CART -->






    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="js/tienda.js"></script>

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
</body>

</html>