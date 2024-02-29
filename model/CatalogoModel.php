<?php

include_once '../config/Conexion.php';
        
function VerCatalogo()
{ 
    $instancia = AbrirBD();
    $catalogo = $instancia -> query("CALL 	VerCatalogo()");
    CerrarBD($instancia);  

    return $catalogo;
}
function CargarProductoModel($id)
{ 
    $instancia = AbrirBD();
    $producto = $instancia -> query("CALL VerProducto('$id')");
    CerrarBD($instancia);  

    return $producto;
}

?>