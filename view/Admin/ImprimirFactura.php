<?php include ("Component\Header.php") ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <div class="encabezado">
                    <h3><b>Factura</b> <span class="pull-right">Numero de Factura</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Rosa y Añil</b></h3>
                                    <p class="text-muted m-l-5">teléfono 2252-7036
                                        <br /> hatillo #3 frente
                                        <br /> al centro de reciclaje,
                                    </p>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h3>Para,</h3>
                                    <h4 class="font-bold">Nombre Cliente,</h4>
                                    <p class="text-muted m-l-30">teléfono numero de telefono
                                        <br /> correoElectronico,
                                    </p>
                                    <p class="m-t-30"><b>Fecha de creación :</b> <i class="fa fa-calendar"></i> se añade
                                        la fecha
                                    </p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cuerpo">
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Producto</th>
                                        <th class="text-right">Cantidad XS</th>
                                        <th class="text-right">Cantidad S</th>
                                        <th class="text-right">Cantidad M</th>
                                        <th class="text-right">Cantidad L</th>
                                        <th class="text-right">Cantidad XL</th>
                                        <th class="text-right">Cantidad XXL</th>
                                        <th class="text-right">Precio Unitario</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                            <p>Sub - Total: ₡13,848</p>
                            <p>IVA : ₡ </p>
                            <hr>
                            <h3><b>Total :</b> ₡13,986</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i
                                        class="fa fa-print"></i> Imprimir</span> </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include ("Component\Footer.php") ?>