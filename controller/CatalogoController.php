<?php
require_once '../Model/CatalogoModel.php';

switch ($_GET["op"]) {

    case 'ListarTarjetaProducto':

        $catalogo = new Catalogo();
        $catalogos = $catalogo->VerCatalogosDB();

        $data = array();

        if (is_array($catalogos) || is_object($catalogos)) {
            foreach ($catalogos as $reg) {

                $data[] = array(
                    "IdProducto" => $reg->getIdProducto(),
                    "Descripcion" => $reg->getDescripcion(),
                    "Categoria" => $reg->getNombreCategoria(),
                    "Marca" => $reg->getMarca(),
                    "CantXS" => $reg->getCantXS(),
                    "CantS" => $reg->getCantS(),
                    "CantM" => $reg->getCantM(),
                    "CantL" => $reg->getCantL(),
                    "CantXL" => $reg->getCantXL(),
                    "CantXXL" => $reg->getCantXXL(),
                    "PrecioV" => $reg->getPrecioVenta(),
                    "PrecioC" => $reg->getPrecioCredito(),
                    "Imagen" => $reg->getImagen(),
                    "Opcion" => '<button class="btn btn-success" id="VerInformacion">Más</button> '
                );
            }


        } else {
            // Handle the case where $catalogos is not an array or object
            // For example, log an error message or return an empty array
            error_log("Catalog data is not an array or object.");
            $data = array();
        }

        echo json_encode($data);
        break;
        case 'VerInformacion':
            $IdProducto = isset($_POST["id"]) ? trim($_POST["id"]) : "";
            $Descripcion = isset($_POST["Nueva_Descripcion"]) ? trim($_POST["Nueva_Descripcion"]) : "";
            $CantXS = isset($_POST["Nueva_Cant_XS"]) ? trim($_POST["Nueva_Cant_XS"]) : "";
            $CantS = isset($_POST["Nueva_Cant_S"]) ? trim($_POST["Nueva_Cant_S"]) : "";
            $CantM = isset($_POST["Nueva_Cant_M"]) ? trim($_POST["Nueva_Cant_M"]) : "";
            $CantL = isset($_POST["Nueva_Cant_L"]) ? trim($_POST["Nueva_Cant_L"]) : "";
            $CantXL = isset($_POST["Nueva_Cant_XL"]) ? trim($_POST["Nueva_Cant_XL"]) : "";
            $CantXXL = isset($_POST["Nueva_Cant_XXL"]) ? trim($_POST["Nueva_Cant_XXL"]) : "";
            $IdCategoria = isset($_POST["Nuevo_Id_Categoria"]) ? trim($_POST["Nuevo_Id_Categoria"]) : "";
            $IdMarca = isset($_POST["Nuevo_Id_Marca"]) ? trim($_POST["Nuevo_Id_Marca"]) : "";
            $PrecioVenta = isset($_POST["Nuevo_Precio_Venta"]) ? trim($_POST["Nuevo_Precio_Venta"]) : "";
            $PrecioCredito = isset($_POST["Nuevo_Precio_Credito"]) ? trim($_POST["Nuevo_Precio_Credito"]) : "";
            $Imagen = isset($_POST["Nueva_Imagen"]) ? trim($_POST["Nueva_Imagen"]) : "";
    
            $producto = new Catalogo();
    
            $producto->setIdProducto($IdProducto);
            $encontrado = $producto->verificarExistenciaProductoByIDDb();
            if ($encontrado == 1) {
                $producto->llenarCamposCatalogo($IdProducto);
    
                $producto->setDescripcion($Descripcion);
                $producto->setCantXS($CantXS);
                $producto->setCantS($CantS);
                $producto->setCantM($CantM);
                $producto->setCantL($CantL);
                $producto->setCantXL($CantXL);
                $producto->setCantXXL($CantXXL);
                $producto->setIdCategoria($IdCategoria);
                $producto->setIdMarca($IdMarca);
                $producto->setImagen($Imagen);
                $producto->setPrecioCredito($PrecioCredito);
                $producto->setPrecioVenta($PrecioVenta);
                $producto->setIdProducto($IdProducto);
            } else {
                echo 2;
            }
            break;
}
