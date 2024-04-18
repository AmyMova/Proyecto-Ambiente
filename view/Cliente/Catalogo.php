<?php include ("Componentes/Header.php"); ?>
<link rel="stylesheet" href="../assets/css/Catalogo.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body ">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="img-fluid"
                                    src="../assets/img/Carousel/portada 1.jpg" alt="First slide"
                                    style="height:500px;width:1120px;"> </div>
                            <div class="carousel-item"> <img class="img-fluid"
                                    src="../assets/img/Carousel/portada 2.jpg" alt="Second slide"
                                    style="height:500px;width:1120px;"> </div>
                            <div class="carousel-item"> <img class="img-fluid"
                                    src="../assets/img/Carousel/portada 3.jpg" alt="Third slide"
                                    style="height:500px;width:1120px;"> </div>
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
    <button class="btn btn-info"data-target="#VerInformacion" >Más</button>
    <div class="row ">
        <div class="container">
            <div class="products_wrapper text-center justify-content-center">

            </div>
        </div>
    </div>

    <!--Modal Ver Más Información-->
    <div id="VerInformacion" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Ver más Información</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>Título</h4>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!--Modal Comprar -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <h4>Overflowing text to show scroll behavior</h4>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php include ("Componentes/Footer.php"); ?>
    <script src="./../assets/js/Catalogo.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>