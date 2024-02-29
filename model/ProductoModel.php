<?php

include_once '../config/Conexion.php';
        
/*Consulta todos los productos que existen*/
function ConsultarProductosModel()
{ 
    $instancia = AbrirBD();
    $productos = $instancia -> query("CALL VerProductos()");
    CerrarBD($instancia);  

    return $productos;
}
/*Consulta un producto en especifico*/
function CargarProductoModel($id)
{ 
    $instancia = AbrirBD();
    $producto = $instancia -> query("CALL VerProducto('$id')");
    CerrarBD($instancia);  

    return $producto;
}
/*Carga las categorias existentes para el select*/
function ConsultarCategoriasModel()
{ 
    $instancia = AbrirBD();
    $categorias = $instancia -> query("CALL VerCategorias()");
    CerrarBD($instancia);  

    return $categorias;
}
/*Carga los tipos existentes para el select*/
function ConsultarTiposModel()
{ 
    $instancia = AbrirBD();
    $categorias = $instancia -> query("CALL VerTipos()");
    CerrarBD($instancia);  

    return $categorias;
}
/*Registra los productos a la base de datos*/
function RegistrarProductoModel($Cantidad_XS,$descripcionP,$Id_Categoria,$Id_Tipo,$imagenP,$Cantidad_XXL,$Precio_Venta,$Precio_Credito,$Cantidad_S,$Cantidad_M,$Cantidad_L,$Cantidad_XL)
{ 
    $instancia = AbrirBD();
    $instancia -> query("CALL CrearProducto('$Cantidad_XS','$descripcionP','$Id_Categoria','$Id_Tipo','$imagenP','$Cantidad_XXL','$Precio_Venta','$Precio_Credito','$Cantidad_S','$Cantidad_M','$Cantidad_L','$Cantidad_XL')");
    CerrarBD($instancia);
}
/*Elimina el producto seleccionado de la base de datos*/
function EliminarProductoModel($id)
{ 
    $instancia = AbrirBD();
    $instancia -> query("CALL EliminarProducto('$id')");
    CerrarBD($instancia);
}
/*Actualiza el producto seleccionado en la base de datos*/
function ActualizarProductoModel($id,$Nueva_Cant_XS,$Nueva_Descripcion,$Nuevo_Id_Categoria,$Nuevo_Id_Tipo,$Nueva_Imagen,$Nueva_Cant_XXL,$Nuevo_Precio_Venta,$Nuevo_Precio_Credito,$Nueva_Cant_S,$Nueva_Cant_M,$Nueva_Cant_L,$Nueva_Cant_XL)
{ 
   
    $instancia = AbrirBD();
    $instancia -> query("CALL EditarProducto('$id','$Nueva_Cant_XS','$Nueva_Descripcion','$Nuevo_Id_Categoria','$Nuevo_Id_Tipo','$Nueva_Imagen','$Nueva_Cant_XXL','$Nuevo_Precio_Venta','$Nuevo_Precio_Credito','$Nueva_Cant_S','$Nueva_Cant_M','$Nueva_Cant_L','$Nueva_Cant_XL')");
    CerrarBD($instancia);
}
?>