<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12"id="Tabla_Deudores">
            <div class="card" >
                <div class="card-header">
                    <h3 class="card-title">Deudores &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn waves-effect waves-light  btn-info"
                                        id="VerMasDeudores">Ver Más</button>&nbsp;<button class="btn waves-effect waves-light  btn-secondary"
                                        id="OcultarDeudores">Ocultar</button>
                    
                </div>
                <div class="card-body" id="Tabla_Deudores">
                    
                <table id="tblListadoDeudores" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Pendiente</th>
                                    <th>Pago</th>
                                    <th>Por Abonar</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Pendiente</th>
                                    <th>Pago</th>
                                    <th>Por Abonar</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card" id="Tabla_Apartado_Expirado">
                <div class="card-header">
                    <h3 class="card-title">Expiración del Período de Apartado </h3>
                </div>
                <div class="card-body">
                    
                <table id="tblListadoApartadoExpirado" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>N° Apartado</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                <th>ID</th>
                                    <th>Usuario</th>
                                    <th>N° Apartado</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card" id="Tabla_Cumpleaneros">
                <div class="card-header">
                    <h3 class="card-title">Cumpleañeros del Mess</h3>
                </div>
                <div class="card-body">
                    
                <table id="tblListadoCumpleaneros" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                </div>
            </div>
        </div>



    </div>

    <?php include ("Component\Footer.php") ?>