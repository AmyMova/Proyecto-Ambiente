<?php include ("Component\Header.php") ?>


<!--Aqui se hace casi que lo mismo que se hizo en el administrador pero con vista al vendedor con el que uno ingreso-->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                            <i class="fa-solid fa-users"></i>
                                <p class="font-16 m-b-5">Nuevos Clientes</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">23</h1><!--Se hace un query en el que se busque todos los clientes del mes primer dia del mes pasado al dia de hoy-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;"
                                aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                            <i class="fa-solid fa-rotate-left"></i>
                                <p class="font-16 m-b-5">Devoluciones</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">169</h1><!--Se hace un query en donde se buscan la cantidad de devoluciones que ha pasado este mes-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                            <i class="fa-solid fa-colon-sign"></i>
                                <p class="font-16 m-b-5">Ventas del Mes</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">157</h1><!-- Se hace un query en donde se buscan la cantidad de facturas creadas del mes actual -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                            <i class="fa-solid fa-bookmark"></i>
                                <p class="font-16 m-b-5">Apartados</p>
                            </div>
                            <div class="ml-auto">
                                <h1 class="font-light text-right">236</h1><!--Se hace un query en donde muestra el numero de apartados que hubieron en el mes-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Email campaign chart -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12 col-md-12 order-lg-2 order-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title">Porcentaje de ventas</h4>
                        </div>
                        <div class="ml-auto">
                            <div class="dl m-b-10">
                                <select class="custom-select border-0 text-muted">
                                    <option value="0" selected="">August 2018</option><!--Se actualizan las opciones con los meses y el año correspondiente-->
                                    <option value="1">May 2018</option>
                                    <option value="2">March 2018</option>
                                    <option value="3">June 2018</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center no-block">
                        <div>
                            <span class="text-muted">Esta semana</span>
                            <h3 class="mb-0 text-info font-light">$23.5K <span class="text-muted font-12"><i
                                        class="mdi mdi-arrow-up text-success"></i>18.6</span></h3><!-- Se hace un query en donde se muestra el total de las ventas de la semana actual y el procentaje que subio o bajo en esta semana contra la semana pasada-->
                        </div>
                        <div class="ml-4">
                            <span class="text-muted">Semana Pasada</span>
                            <h3 class="mb-0 text-muted font-light">$945 <span class="text-muted font-12"><i
                                        class="mdi mdi-arrow-down text-danger"></i>46.3</span></h3><!-- Se hace un query en donde se muestra el total de las ventas de la semana pasada y el procentaje que subio o bajo en esta semana contra la semana actual-->
                        </div>
                    </div>
                    <div class="sales ct-charts mt-5"></div><!-- se hace una grafica de linea con los datos anteriores-->
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- Ravenue - page-view-bounce rate -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4 class="card-title mb-0">Últimas Ventas</h4>
                        </div>
                        <div class="ml-auto">
                            <select class="custom-select border-0 text-muted">
                                <option value="0" selected="">August 2018</option><!--Se actualizan las opciones con los meses y el año correspondiente-->
                                <option value="1">May 2018</option>
                                <option value="2">March 2018</option>
                                <option value="3">June 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <h3 class="m-b-0 font-light">August 2018</h3><!--Se actualizan las opciones con los meses y el año correspondiente-->
                            <span class="font-14 text-muted">Reporte de Ventas</span>
                        </div>
                        <div class="col-xs-12 col-md-6 align-self-center display-6 text-info text-right">$3,690</div><!--Se actualiza con el total completo de las ventas del día -->
                    </div>
                </div>
                <div class="table-responsive"><!--Se hace una tabla dinamica de las ultimas ventas, solo se muestran 5-->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="border-top-0">Cliente</th>
                                <th class="border-top-0">Vendedor</th>
                                <th class="border-top-0">Fecha</th>
                                <th class="border-top-0">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td class="txt-oflo">Elite admin</td>
                                <td><span class="label label-success label-rounded">SALE</span> </td>
                                <td class="txt-oflo">April 18, 2017</td>
                                <td><span class="font-medium">$24</span></td>
                            </tr>
                            <tr>

                                <td class="txt-oflo">Real Homes WP Theme</td>
                                <td><span class="label label-info label-rounded">EXTENDED</span></td>
                                <td class="txt-oflo">April 19, 2017</td>
                                <td><span class="font-medium">$1250</span></td>
                            </tr>
                            <tr>

                                <td class="txt-oflo">Ample Admin</td>
                                <td><span class="label label-purple label-rounded">Tax</span></td>
                                <td class="txt-oflo">April 19, 2017</td>
                                <td><span class="font-medium">$1250</span></td>
                            </tr>
                            <tr>

                                <td class="txt-oflo">Medical Pro WP Theme</td>
                                <td><span class="label label-success label-rounded">Sale</span></td>
                                <td class="txt-oflo">April 20, 2017</td>
                                <td><span class="font-medium">-$24</span></td>
                            </tr>
                            <tr>

                                <td class="txt-oflo">Hosting press html</td>
                                <td><span class="label label-success label-rounded">SALE</span></td>
                                <td class="txt-oflo">April 21, 2017</td>
                                <td><span class="font-medium">$24</span></td>
                            </tr>
                            <tr>

                                <td class="txt-oflo">Digital Agency PSD</td>
                                <td><span class="label label-danger label-rounded">Tax</span> </td>
                                <td class="txt-oflo">April 23, 2017</td>
                                <td><span class="font-medium">-$14</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php include ("Component\Footer.php") ?>