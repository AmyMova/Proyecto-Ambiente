<?php
include_once '../Model/EtiquetasModel.php';
/*

      /*Carga los datos de la tabla Etiquetas 
function ConsultarEtiquetasController()
{ 
    $etiquetas = ConsultarEtiquetasModel();
    while ($item = mysqli_fetch_array($etiquetas)) 
    { 
        /*echo "<div class='container'>";
        echo "<div class='row row-cols-6'>";
        echo "<div class='col-1'>";
        echo "<pre style='font-size: 12.5px;'>";
        echo "<b>Rosa & Añil</b>" ."\n";
        echo "Tel:2252-7036" ."\n";
        echo "Descrip: ". $item["Descripcion"] ."\n";
        echo "Marca: ".$item["Marca"] ."\n";
        echo "Estilo: ".$item["NombreCategoria"] ."\n";
        echo "Talla: XS" ."\n" ;
        echo "Precio: ₡".$item["PrecioVenta"] ."\n";
        echo "XX".$item["PrecioCredito"]."XX" ."\n";
        echo "-------------------------"."\n" ;
        echo "Descrip: ". $item["Descripcion"] ."\n";
        echo "Marca: ".$item["Marca"] ."\n";
        echo "Estilo: ".$item["NombreCategoria"] ."\n";
        echo "Talla: XS" ."\n" ;
        echo "Precio: ₡".$item["PrecioVenta"] ."\n";
        echo "XX".$item["PrecioCredito"]."XX" ."\n";
        echo "Tarjeta()Efect.()Simpe()";
        echo "</pre>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo '<div class="col-xl-3 col-lg-4 col-md-6">';
            echo '<div class="gallery-item h-100">';
            echo '<div class="card">';
            echo '<p class="card-text">'. $item["Imagen"] . '</p>'; // Display item image
            echo '<div class="card-body text-center mx-auto">';
            echo '<div class="cvp">';
            echo '<h5 class="card-title font-weight-bold">'. $item["Descripcion"] . '</h5>'; // Display item description
            echo '<p class="card-text">₡'.$item["PrecioVenta"].'</p>'; // Display item price
            echo '<a class="btn btn-primary btn-outline-light btn-lg" href="../view/VerProducto.php?q=' . $item["IdProducto"] .'">Más información</a>'; // A link or button
            echo '</div>'; 
            echo '</div>';
            echo '</div>';
            echo '</div>'; 
            echo '</div>'; 
    }
}*/

function ConsultarEtiquetasController()
{
    $etiquetas = ConsultarEtiquetasModel();
    $item = mysqli_fetch_array($etiquetas);
}

?>