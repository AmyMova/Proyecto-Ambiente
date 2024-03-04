<?php

include_once '../config/Conexion.php';
        
/*Consulta todos los productos que existen*/
function ConsultarEtiquetasModel()
{ 
    $instancia = AbrirBD();
    $etiquetas = $instancia -> query("CALL VerEtiquetas()");
    CerrarBD($instancia);  

    return $etiquetas;
}


?>