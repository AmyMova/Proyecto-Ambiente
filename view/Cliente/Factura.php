<?php include ("Componentes/Header.php"); ?>


    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Facturas existentes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <div class="row ">
                        <div class="col">
                            <table id="tblListadoFacturaCliente"
                                class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Vendedor</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Vendedor</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include ("Componentes/Footer.php"); ?>

    <script src="./../assets/js/Factura.js"></script>