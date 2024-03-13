<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
<div class="col-md-12" id="formulario_update">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Datos del Producto</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="producto_update" id="producto_update" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nueva_Descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="Nueva_Descripcion"
                                                name="Nueva_Descripcion" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Precio_Venta">Precio Venta</label>
                                            <input type="number" class="form-control" id="Nuevo_Precio_Venta"
                                                name="Nuevo_Precio_Venta" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_XS">XS</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_XS"
                                                name="Nueva_Cant_XS" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_S">S</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_S"
                                                name="Nueva_Cant_S" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_M">M</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_M"
                                                name="Nueva_Cant_M" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_L">L</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_L"
                                                name="Nueva_Cant_L" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_XL">XL</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_XL"
                                                name="Nueva_Cant_XL" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_XXL">XXL</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_XXL"
                                                name="Nueva_Cant_XXL" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                        <label for="Nueva_Marca">Marca</label>
                                            <input type="text" class="form-control" id="Nueva_Marca"
                                                name="Nueva_Marca" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                        <label for="Nueva_Categoria">Categoria</label>
                                            <input type="text" class="form-control" id="Nueva_Categoria"
                                                name="Nueva_Categoria" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        
                                            <img src="" id="img" alt="Preview" class="img-thumbnail"style="width: 100px;height:100px;">
                                        
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="form-control btn btn-warning" value="Modificar">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="button" class="form-control btn btn-info" value="Cancelar"
                                    onclick="cancelarForm()">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="container text-center">
                <div id="contenedor-tarjetas"class="row">
                    <!-- Aquí se cargarán las tarjetas de productos -->
                
            </div>
        </div>
    </div>


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="plugins/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/bootbox/bootbox.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="assets/js/Catalogos.js"></script>
</body>

</html>