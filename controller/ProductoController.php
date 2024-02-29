<?php
include_once 'Componentes.php';
include_once '../model/ProductoModel.php';
        
function VerProductosController()
{ 
    $productos = VerProductos();
    while ($item = mysqli_fetch_array($productos)) 
    { 
        echo "<tr>";
        echo "<td>" . $item["IdProducto"] . "</td>";
        echo "<td>" . $item["Descripcion"] . "</td>";
        echo "<td>" . $item["NombreCategoria"] . "</td>";
        echo "<td>" . $item["NombreTipo"] . "</td>";
        echo "<td>" . $item["CantXS"] . "</td>";
        echo "<td>" . $item["CantS"] . "</td>";
        echo "<td>" . $item["CantM"] . "</td>";
        echo "<td>" . $item["CantL"] . "</td>";
        echo "<td>" . $item["CantXL"] . "</td>";
        echo "<td>" . $item["CantXXL"] . "</td>";
        echo "<td>" . $item["PrecioVenta"] . "</td>";
        echo "<td>" . $item["PrecioCredito"] . "</td>";
        echo '<td>  <a class="btn btn-outline-light " href="../View/ActualizarProducto.php?q=' . $item["IdProducto"] .'">Editar</a>
        || <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#Editar_Producto" data-productid="'. $item["IdProducto"] .'">Editar</button>
        || <input type="button" onclick="Eliminar(' . $item["IdProducto"] . ');" value="Eliminar" id= "Eliminar" class="btn btn-outline-light">';
        echo "</tr>";
    }
}


function VerProductoController($id)
{ 
    $producto = VerProducto($id);
    $item = mysqli_fetch_array($producto);
    

    return $item;
}

function VerCategoriasController()
{ 
    $categorias = VerCategorias();
    while ($item = mysqli_fetch_array($categorias)) 
    {
        echo "<option value=" . $item["IdCategoria"] . ">" . $item["NombreCategoria"] . "</option>";
    }
}
function VerTiposController()
{ 
    $tipos = VerTipos();
    while ($item = mysqli_fetch_array($tipos)) 
    {
        echo "<option value=" . $item["IdTipo"] . ">" . $item["NombreTipo"] . "</option>";
    }
}

function p()
{
    $productos = VerProducto();
    while ($item = mysqli_fetch_array($productos))
    {
        echo '<div class="producto antes" data-target="p-1" data-name="p-1">';
        echo "<img src=".$item["imagen"] .">";
        echo "<h3>".$item["detalle"] ."</h3>";
        echo "<div>" .$item["precio"] . "</div>";
        echo '<div class="botones">
        <input type="button" class="btn btn-light" id="btnAgregarCarrito" name="btnAgregarCarrito"
        value="Agregar al carrito" onclick="AgregarAlCarrito('. $item["id_producto"] .');">
        </div>';
        echo '</div>';
    }

}

if(isset($_POST['Funcion']) == "Eliminar_Producto")
{
    $id_producto = $_POST["id_producto"];
    EliminarProductoModel($id_producto);
}

if(isset($_POST['btnActualizarProducto']))
{
    $descripcionP=$_POST["txtDescripcion"];
    $Id_Categoria=$_POST["txtCategoria"];
    $Id_Tipo=$_POST["txtTipo"];
    $Precio_Venta=$_POST["txtPrecioVenta"];
    $Precio_Credito=$_POST["txtPrecioCredito"];
    $Cantidad_XS=$_POST["txtCantidadXS"];
    $Cantidad_S=$_POST["txtCantidadS"];
    $Cantidad_M=$_POST["txtCantidadM"];
    $Cantidad_L=$_POST["txtCantidadL"];
    $Cantidad_XL=$_POST["txtCantidadXL"];
    $Cantidad_XXL=$_POST["txtCantidadXXL"];
    $Imagen=$_POST["inputImage"];
    EditarProducto($id,$Nueva_Cant_XS,$Nueva_Descripcion,$Nuevo_Id_Categoria,$Nuevo_Id_Tipo,$Nueva_Imagen,$Nueva_Cant_XXL,$Nuevo_Precio_Venta,$Nuevo_Precio_Credito,
    $Nueva_Cant_S,$Nueva_Cant_M,$Nueva_Cant_L,$Nueva_Cant_XL);
    Header("Location: ../View/Productos.php");
}

if(isset($_POST['btnRegistrarProducto']))
{

    $descripcionP=$_POST["txtDescripcion"];
    $Id_Categoria=$_POST["txtCategoria"];
    $Id_Tipo=$_POST["txtTipo"];
    $Precio_Venta=$_POST["txtPrecioVenta"];
    $Precio_Credito=$_POST["txtPrecioCredito"];
    $Cantidad_XS=$_POST["txtCantidadXS"];
    $Cantidad_S=$_POST["txtCantidadS"];
    $Cantidad_M=$_POST["txtCantidadM"];
    $Cantidad_L=$_POST["txtCantidadL"];
    $Cantidad_XL=$_POST["txtCantidadXL"];
    $Cantidad_XXL=$_POST["txtCantidadXXL"];
    $Imagen=$_POST["inputImage"];
    CrearProducto($Cantidad_XS,$descripcionP,$Id_Categoria,$Id_Tipo,$imagenP,$Cantidad_XXL,$Precio_Venta,$Precio_Credito,$Cantidad_S,$Cantidad_M,$Cantidad_L,$Cantidad_XL);
    echo'estoy aqui';
    Header("Location: ../view/Producto.php");
}




?>