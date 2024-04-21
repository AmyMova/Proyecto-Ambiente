<?php include ("Componentes/Header.php"); ?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header bg-info">
                    <div id="cantidadproductos">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tblListadoCarritoEnLinea" class="table product-overview">
                            <thead>
                                <tr>
                                    <th colspan="2">Producto</th>
                                    <th colspan="6">Cantidades</th>
                                    <th colspan="1">Precio</th>
                                    <th colspan="1" rowspan=2>Opciones</th>
                                </tr>
                                <tr>

                                    <th>Imagen</th>
                                    <th>Descripción</th>


                                    <th>XS</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                    <th>XXL</th>

                                    <th>Total Uni.</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <hr>
                        <div class="d-flex no-block align-items-center">
                            <button class="btn btn-dark btn-outline"><i class="fas fa-arrow-left"></i> Continue
                                shopping</button>
                            <div class="ml-auto">
                                <button class="btn btn-danger"><i class="fa fa fa-shopping-cart"></i> Apartar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-3 col-lg-3">
            <div id="contenedor-tarjeta-PrecioFinal"></div>

        </div>
    </div>

    <?php include ("Componentes/Footer.php"); ?>

    <script src="./../assets/js/CarritoEnLinea.js"></script>