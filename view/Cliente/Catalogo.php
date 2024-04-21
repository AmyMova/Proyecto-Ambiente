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


    <div class="row ">
        <div class="container">
            <div class="products_wrapper text-center justify-content-center">

            </div>
        </div>
    </div>
    <!--Modal Ver Más Información-->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" id="Vermas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" id="Modal_Title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card justify-content-center">
                        <img src="" class="card-img-top mx-auto" alt=""><!--imagen del articulo -->
                        <div class="card-body">
                            <h5 class="card-title"></h5><!--Nombre del articulo -->
                            <p class="card-text precioModal"></p><!--Nombre del articulo -->
                            <p class="card-text">Disponibilidad por Talla:</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item XSModal"></li><!--Cantidad por talla del articulo -->
                                <li class="list-group-item SModal"></li><!--Cantidad por talla del articulo -->
                                <li class="list-group-item MModal"></li><!--Cantidad por talla del articulo -->
                                <li class="list-group-item LModal"></li><!--Cantidad por talla del articulo -->
                                <li class="list-group-item XLModal"></li><!--Cantidad por talla del articulo -->
                                <li class="list-group-item XXLModal"></li><!--Cantidad por talla del articulo -->
                            </ul>
                        </div>
                    </div>
                    <p class="Descripcion_Producto" id="Descripcion_Producto"></p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Modal Comprar -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" id="Comprar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" id="Modal_Title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card justify-content-center">
                        <img src="" class="card-img-top mx-auto" alt=""><!--imagen del articulo -->
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text precioModal"></p>


                            <form name="modulos_agregar_carritoEnLinea" id="carritoEnLinea_agregar" method="POST"
                                enctype="multipart/form-data">
                                <!-- se agrega el enctype para que el formulario acepte imagenes -->
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="col ">
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="hidden" class="ID" id="Id_Producto" name="Id_Producto" value="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="row ">
                                        <div class="col">
                                        <div class="input-group">
                                        <input type="text" class="form-control ID" id="Id_Producto" readonly
                                                    data-validation-required-message="Este campo es necesario"
                                                    name="Id_Producto" 
                                                     hidden><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_XS">Tamaño XS</label></br>
                                                <label class="form-group XSModal" for="Cantidad_XS"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_XS"
                                                        name="Cantidad_XS" value="0" min=0
                                                        required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_S">Tamaño S</label></br>
                                                <label class="form-group SModal" for="Cantidad_S"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_S"
                                                        name="Cantidad_S" value="0" min=0
                                                        required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_M">Tamaño M</label></br>
                                                <label class="form-group MModal" for="Cantidad_M"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_M"
                                                        name="Cantidad_M" value="0" min=0
                                                        required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row ">
                                        <div class="col ">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_L">Tamaño L</label></br>
                                                <label class="form-group LModal" for="Cantidad_L"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_L"
                                                        name="Cantidad_L" value="0" min=0
                                                        required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_XL">Tamaño XL</label></br>
                                                <label class="form-group XLModal" for="Cantidad_XL"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_XL"
                                                        name="Cantidad_XL" value="0" min=0
                                                        required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">

                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_XXL">Tamaño XXL</label></br>
                                                <label class="form-group XXLModal" for="Cantidad_XXL"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_XXL"
                                                        name="Cantidad_XXL" value="0" min=0
                                                        required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row button-group">
                                        <!-- grupo de botones con diferentes funciones -->
                                        <div class="col-3">
                                            <input type="submit" id="btnRegistar" class="btn btn-success btn-block"
                                                value="Agregar"><!-- registra lo que tiene el formulario -->

                                        </div>
                                        <div class="col-3">
                                            <input type="button" id="btnCancelar" class="btn btn-secondary btn-block"
                                                value="Cancelar"
                                                onclick="cancelarFormCarrito()"><!-- Cancela y oculta el formulario -->
                                        </div>

                                    </div>
                                </div>

                            </form>
                            <!--Nombre del articulo -->
                            <!--Nombre del articulo -->

                        </div>
                    </div>
                    <p class="Descripcion_Producto" id="Descripcion_Producto"></p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- sample modal content -->








    <?php include ("Componentes/Footer.php"); ?>
    <script src="./../assets/js/Catalogo.js"></script>
    <script src="./../assets/js/CarritoEnLinea.js"></script>