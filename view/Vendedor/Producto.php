<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->

    <!-- listado de productos -->
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <!--Encabezado y titulo de la tabla productos-->
                <div class="card-header">
                    <h3 class="card-title">Productos existentes</h3>

                </div>
                <!-- Encabezado y titulo de la tabla productos -->
                <!-- Cuerpo de la tabla productos -->
                <div class="card-body ">

                    <div class="row ">

                        <div class="col">
                            <table id="tblListadoProducto" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Marca</th>
                                    <th>XS</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                    <th>XXL</th>
                                    <th>Precio</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Marca</th>
                                    <th>XS</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                    <th>XXL</th>
                                    <th>Precio</th>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div><!-- Cuerpo de la tabla productos -->

            </div>
        </div>
    </div>



    <!-- Estos scripts cambian el preview de la imagen tanto para editar como al agregar  -->
    <script type="text/javascript">
        imagenP.onchange = evt => {
            const [file] = imagenP.files;
            if (file) {
                img.src = URL.createObjectURL(file);
            }
        }
    </script>
    <script type="text/javascript">
        Nueva_Imagen.onchange = evt => {
            const [file] = Nueva_Imagen.files;
            if (file) {
                img_edit.src = URL.createObjectURL(file);
            }
        }
    </script>

    <!-- Desde aqui se llama el footer -->
    <?php include ("Component\Footer.php") ?>