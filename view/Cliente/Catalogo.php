<?php include ("Componentes/Header.php"); ?>
<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- row -->
    <div class="row justify-content-center">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="img-fluid" src="../assets/img/big/img4.jpg"
                                    alt="First slide"> </div>
                            <div class="carousel-item"> <img class="img-fluid" src="../assets/img/big/img5.jpg"
                                    alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="img-fluid" src="../assets/img/big/img6.jpg"
                                    alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span> </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">Ropa</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <h1 class="logo">Ropa</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <button id="todos" class="boton-menu boton-categoria active"><i class="bi bi-hand-index-thumb-fill"></i> Todos los productos</button>
                    </li>
                
                    <li>
                        <button id="abrigos" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Abrigos</button>
                    </li>
                    <li>
                        <button id="camisetas" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Camisetas</button>
                    </li>
                    <li>
                        <button id="pantalones" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Pantalones</button>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito" href="carrito.php">
                            <i class="bi bi-cart-fill"></i> Carrito <span id="numerito" class="numerito">0</span>
                        </a>

                    </li>
                </ul>
            </nav>
        </aside>
        <main>
            <h2 class="titulo-principal" id="titulo-principal">Todos los productos</h2>
            <div id="contenedor-productos" class="contenedor-productos">
            
            </div>
        </main>
    </div>


    <!-- End row -->


    <?php include ("Componentes/Footer.php"); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>