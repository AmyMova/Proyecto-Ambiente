<?php
//include_once 'Componentes.php'; 
include_once '../Model/CatalogoModel.php';
        
function VerCatalogoController()
{
    $catalogo = VerCatalogo(); 
    if (!empty($catalogo)) {
       
        foreach ($catalogo as $item) { 
            
            echo '<div class="col-xl-3 col-lg-4 col-md-6">';
            echo '<div class="gallery-item h-100">';
            echo '<div class="card">';
            echo '<p class="card-text">'. $item["Imagen"] . '</p>'; 
            echo '<div class="card-body text-center mx-auto">';
            echo '<div class="cvp">';
            echo '<h5 class="card-title font-weight-bold">'. $item["Descripcion"] . '</h5>'; 
            echo '<p class="card-text">₡'.$item["PrecioVenta"].'</p>'; 
            echo '<a class="btn btn-primary btn-outline-light btn-lg" href="../view/VerProducto.php?q=' . $item["IdProducto"] .'">Más información</a>';
            echo '</div>'; 
            echo '</div>';
            echo '</div>';
            echo '</div>'; 
            echo '</div>'; 
        }
    } else {
        
        echo "No items found in the catalog.";
    }
}

/*<a class="btn btn-primary btn-outline-light btn-lg" href="../view/VerProducto.php?q=' . $item["IdProducto"] .'">Actualizar</a>*/

function VerProductoController($id)
{ 
    $producto = CargarProductoModel($id);
    $item = mysqli_fetch_array($producto);

    return $item;
}