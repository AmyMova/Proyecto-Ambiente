<?php include ("Component\Header.php") ?>
<div class="container-fluid">

<div class="row">
        <div class="col-6">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <h4 class="m-b-0 text-white">5 Marcas más vendidas</h4>
                </div>
                <div class="card-body">
                <div style="width: 500px;"><canvas id="marcas_mas_vendidas"></canvas></div>
                <p> aqui va la grafica, usar una grafica circular </p>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <h4 class="m-b-0 text-white">Ventas Anuales</h4>
                </div>
                <div class="card-body">
                    <p> Aqui va la grafica, usar una grafica de linea</p>
                <!--<div style="width: 500px;"><canvas id="ventas_anuales"></canvas></div>-->
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <h4 class="m-b-0 text-white">5 Mejores Clientes</h4>
                </div>
                <div class="card-body">
                    <h3 class="card-title">nombre, Monto y articulo</h3>
                    <p> Aqui va la grafica, usar una grafica de barras</p>
                    <!--<div style="width: 500px;"><canvas id="mejores_clientes"></canvas></div>-->
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <h4 class="m-b-0 text-white">Ventas por semana</h4>
                </div>
                <div class="card-body">
                    <p>Aqui va la grafica, usar una grafica de lineas</p>
                <!--<div style="width: 500px;"><canvas id="ventas_semana"></canvas></div>-->
                </div>
            </div>
        </div>











    </div>

    <?php include ("Component\Footer.php") ?>