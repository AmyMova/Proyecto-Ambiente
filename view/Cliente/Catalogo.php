<?php include ("Componentes/Header.php"); ?>

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
                            data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                                class="sr-only">Previous</span> </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span
                                class="sr-only">Next</span> </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
    <div class="row ">
        <div class="col-12">
            <!-- Row -->
            <div class="row row-cols-4">
                <!-- column -->
                <div class="col-lg-3 col-md-6">
                    <!-- Card -->
                    <div class="card">
                        <img class="card-img-top img-responsive" src="../assets/img/big/img1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <div class="row justify-content-center">
                                <div class="button-group">

                                    <button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-info">Ver más</button>

                                    <button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-success">Agregar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <!-- column -->
            </div>
            <!-- Row -->
        </div>
    </div>

    <?php include ("Componentes/Footer.php"); ?>