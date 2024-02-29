<?php

include_once '../config/Conexion.php';
        
function VerProductos()
{ 
    $instancia = AbrirBD();
    $productos = $instancia -> query("CALL VerProductos()");
    CerrarBD($instancia);  

    return $productos;
}
function VerProducto($id)
{ 
    $instancia = AbrirBD();
    $producto = $instancia -> query("CALL VerProducto('$id')");
    CerrarBD($instancia);  

    return $producto;
}
function EliminarProducto($id)
{ 
    $instancia = AbrirBD();
    $instancia -> query("CALL EliminarProducto('$id')");
    CerrarBD($instancia);
}

function EditarProducto($id,$Nueva_Cant_XS,$Nueva_Descripcion,$Nuevo_Id_Categoria,$Nuevo_Id_Tipo,$Nueva_Imagen,$Nueva_Cant_XXL,$Nuevo_Precio_Venta,$Nuevo_Precio_Credito,
$Nueva_Cant_S,$Nueva_Cant_M,$Nueva_Cant_L,$Nueva_Cant_XL){ 
    $instancia = AbrirBD();
    $instancia -> query("CALL EditarProducto('$id','$Nueva_Cant_XS','$Nueva_Descripcion','$Nuevo_Id_Categoria','$Nuevo_Id_Tipo','$Nueva_Imagen,'$Nueva_Cant_XXL',
    '$Nuevo_Precio_Venta','$Nuevo_Precio_Credito',
    '$Nueva_Cant_S','$Nueva_Cant_M','$Nueva_Cant_L','$Nueva_Cant_XL')");
    CerrarBD($instancia);
}
function VerCategorias()
{ 
    $instancia = AbrirBD();
    $categorias = $instancia -> query("CALL VerCategorias()");
    CerrarBD($instancia);  

    return $categorias;
}
function VerTipos()
{ 
    $instancia = AbrirBD();
    $tipos = $instancia -> query("CALL VerTipos()");
    CerrarBD($instancia);  

    return $tipos;
}

function CrearProducto($Cantidad_XS,$descripcionP,$Id_Categoria,$Id_Tipo,$imagenP,$Cantidad_XXL,$Precio_Venta,$Precio_Credito,$Cantidad_S,$Cantidad_M,$Cantidad_L,$Cantidad_XL)
{ 
    $instancia = AbrirBD();
    $instancia -> query("CALL CrearProducto( '$Cantidad_XS','$descripcionP','$Id_Categoria','$Id_Tipo','$imagenP','$Cantidad_XXL','$Precio_Venta','$Precio_Credito','$Cantidad_S','$Cantidad_M','$Cantidad_L','$Cantidad_XL')");
    CerrarBD($instancia);
}


?>