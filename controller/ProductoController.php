<?php
include_once '../Model/ProductoModel.php';
      /*Carga la tabla de productos*/   
function ConsultarProductosController()
{ 
    $productos = ConsultarProductosModel();
    while ($item = mysqli_fetch_array($productos)) 
    { 

        echo "<tr>";
        echo "<td>" . $item["IdProducto"] . "</td>";
        echo "<td>" . $item["Descripcion"] . "</td>";
        echo "<td>" . $item["NombreCategoria"] . "</td>";
        echo "<td>" . $item["Marca"] . "</td>";
        echo "<td>" . $item["CantXS"] . "</td>";
        echo "<td>" . $item["CantS"] . "</td>";
        echo "<td>" . $item["CantM"] . "</td>";
        echo "<td>" . $item["CantL"] . "</td>";
        echo "<td>" . $item["CantXL"] . "</td>";
        echo "<td>" . $item["CantXXL"] . "</td>";
        echo "<td>" . $item["PrecioVenta"] . "</td>";
        echo "<td>" . $item["PrecioCredito"] . "</td>";
        echo '<td><a class="btn btn-primary btn-outline-light btn-lg" href="../view/VerProducto.php?q=' . $item["IdProducto"] .'">Actualizar</a> ||
         <input type="button" onclick="Eliminar(' . $item["IdProducto"] . ');" value="Eliminar" id= "Eliminar" class=" btn btn-primary btn btn-outline-light btn-lg"></td>';
        echo "</tr>";
    }
}
/*Muestra el producto seleccionado*/
function CargarProductoController($id)
{ 
    $producto = CargarProductoModel($id);
    $item = mysqli_fetch_array($producto);

    return $item;
}/*Muestra todas las categorias disponibles*/
function ConsultarCategoriasController()
{ 
    $categorias = ConsultarCategoriasModel();
    while ($item = mysqli_fetch_array($categorias)) 
    {
        echo "<option value=" . $item["IdCategoria"] . ">" . $item["NombreCategoria"] . "</option>";
    }
}/*Muestra todos los tipos disponibles*/
function ConsultarMarcasController()
{ 
    $Marca = ConsultarMarcasModel();
    while ($item = mysqli_fetch_array($Marca)) 
    {
        echo "<option value=" . $item["IdMarca"] . ">" . $item["Marca"] . "</option>";
    }
}
/*Reacciona a la hora de apretar el btnRegistrarProducto y guarda el producto en la base de datos*/ 
if(isset($_POST['btnRegistrarProducto']))
{
    $Cantidad_XS=$_POST["txtxs"];
    $descripcionP= $_POST["txtdescripcion"];
    $Id_Categoria= $_POST["txtid_categoria"];
    $Id_Marca= $_POST["txtid_tipo"];
    $Cantidad_XXL= $_POST["txtxxl"];
    $Precio_Venta= $_POST["txtprecioventa"];
    $Precio_Credito= $_POST["txtpreciocredito"];
    $Cantidad_S= $_POST["txts"];
    $Cantidad_M= $_POST["txtm"];
    $Cantidad_L= $_POST["txtl"];
    $Cantidad_XL= $_POST["txtxl"];
    $imagenP= $_POST["txtimagen"];

    RegistrarProductoModel($Cantidad_XS,$descripcionP,$Id_Categoria,$Id_Marca,$imagenP,$Cantidad_XXL,$Precio_Venta,$Precio_Credito,$Cantidad_S,$Cantidad_M,$Cantidad_L,$Cantidad_XL);
    Header("Location: ../View/Producto.php");
}

if(isset($_POST['Funcion']) == "Eliminar")
{
    $id = $_POST["id"];
    EliminarProductoModel($id);
}

if(isset($_POST['btnActualizarProducto']))
{
    $Nueva_Cant_XS=$_POST["txtxs"];
    $Nueva_Descripcion= $_POST["txtdescripcion"];
    $Nuevo_Id_Categoria= $_POST["txtid_categoria"];
    $Nuevo_Id_Marca= $_POST["txtid_tipo"];
    $Nueva_Cant_XXL= $_POST["txtxxl"];
    $Nuevo_Precio_Venta= $_POST["txtprecioventa"];
    $Nuevo_Precio_Credito= $_POST["txtpreciocredito"];
    $Nueva_Cant_S= $_POST["txts"];
    $Nueva_Cant_M= $_POST["txtm"];
    $Nueva_Cant_L= $_POST["txtl"];
    $Nueva_Cant_XL= $_POST["txtxl"];
    $Nueva_Imagen= $_POST["txtimagen"];
    $id = $_POST["txtid_producto"];

    ActualizarProductoModel($id,$Nueva_Cant_XS,$Nueva_Descripcion,$Nuevo_Id_Categoria,$Nuevo_Id_Marca,$Nueva_Imagen,
    $Nueva_Cant_XXL,$Nuevo_Precio_Venta,$Nuevo_Precio_Credito,$Nueva_Cant_S,$Nueva_Cant_M,$Nueva_Cant_L,$Nueva_Cant_XL);
    Header("Location: ../View/Producto.php");
}
?>