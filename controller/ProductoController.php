<?php
require_once '../Model/ProductoModel.php';
require_once '../Model/MovimientoModel.php';
require_once '../Model/ErrorModel.php';
switch ($_GET["op"]) {
    case 'ListarTablaProducto':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $producto = new Producto();
            $productos = $producto->VerProductosDB();
            $data = array();
            foreach ($productos as $reg) {
                $data[] = array(
                    "0" => $reg->getIdProducto(),
                    "1" => $reg->getDescripcion(),
                    "2" => $reg->getCategoria(),
                    "3" => $reg->getMarca(),
                    "4" => $reg->getCantXS(),
                    "5" => $reg->getCantS(),
                    "6" => $reg->getCantM(),
                    "7" => $reg->getCantL(),
                    "8" => $reg->getCantXL(),
                    "9" => $reg->getCantXXL(),
                    "10" => $reg->getPrecioVenta(),
                    "11" => '<button class="btn waves-effect waves-light  btn-warning" id="modificarProducto"><i class="ti-pencil-alt"></i></button> | ' .
                        '<button class="btn waves-effect waves-light  btn-danger" onclick="EliminarProducto(\'' . $reg->getIdProducto() . '\')"><i class="ti-trash"></i></button>',
                    "12" => $reg->getPrecioCredito(),
                    "13" => $reg->getImagen(),
                    "14" => $reg->getIdCategoria(),
                    "15" => $reg->getIdMarca()
                );
            }
            $resultados = array(
                "sEcho" => 1, ##informacion para datatables
                "iTotalRecords" => count($data), ## total de registros al datatable
                "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
                "aaData" => $data
            );
            echo json_encode($resultados);
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'AgregarProducto':
        try {//Crea un nuevo producto en la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $Descripcion = isset($_POST["descripcionP"]) ? trim($_POST["descripcionP"]) : "";
            $CantXS = isset($_POST["Cantidad_XS"]) ? trim($_POST["Cantidad_XS"]) : "";
            $CantS = isset($_POST["Cantidad_S"]) ? trim($_POST["Cantidad_S"]) : "";
            $CantM = isset($_POST["Cantidad_M"]) ? trim($_POST["Cantidad_M"]) : "";
            $CantL = isset($_POST["Cantidad_L"]) ? trim($_POST["Cantidad_L"]) : "";
            $CantXL = isset($_POST["Cantidad_XL"]) ? trim($_POST["Cantidad_XL"]) : "";
            $CantXXL = isset($_POST["Cantidad_XXL"]) ? trim($_POST["Cantidad_XXL"]) : "";
            $IdCategoria = isset($_POST["Id_Categoria"]) ? trim($_POST["Id_Categoria"]) : "";
            $IdMarca = isset($_POST["Id_Marca"]) ? trim($_POST["Id_Marca"]) : "";
            $PrecioVenta = isset($_POST["Precio_Venta"]) ? trim($_POST["Precio_Venta"]) : "";
            $PrecioCredito = isset($_POST["Precio_Credito"]) ? trim($_POST["Precio_Credito"]) : "";

            $newImageName = "";
            if (isset($_FILES["imagenP"]["name"])) {
                $imagenName = $_FILES["imagenP"]["name"];
                $tmpName = $_FILES["imagenP"]["tmp_name"];

                $validImageExtension = ['jpeg', 'jpg', 'png'];
                $imageExtension = explode('.', $imagenName);

                $name = $imageExtension[0];
                $imageExtension = strtolower(end($imageExtension));

                if (!in_array($imageExtension, $validImageExtension)) {

                    $newImageName = "imagenPredeterminada-65f0e2911dded.jpg";

                } else {
                    $newImageName = $name . "-" . uniqid() . '.' . $imageExtension;

                }

            }

            $producto = new Producto();

            $producto->setDescripcion($Descripcion);
            $encontrado = $producto->verificarExistenciaProductoDb();
            if ($encontrado == 0) {
                $producto->setCantXS($CantXS);
                $producto->setCantS($CantS);
                $producto->setCantM($CantM);
                $producto->setCantL($CantL);
                $producto->setCantXL($CantXL);
                $producto->setCantXXL($CantXXL);
                $producto->setIdCategoria($IdCategoria);
                $producto->setIdMarca($IdMarca);
                $producto->setPrecioCredito($PrecioCredito);
                $producto->setPrecioVenta($PrecioVenta);
                $producto->setImagen($newImageName);
                $producto->CrearProductoDB();
                move_uploaded_file($tmpName, '../view/assets/img/' . $newImageName);
                if ($producto->verificarExistenciaProductoDb()) {
                    echo 1; //producto registrado 
                    //  echo 4; //producto registrado y envio de correo fallido
                    //}
                } else {
                    echo 3; //Fallo al realizar el registro
                }
            } else {
                echo 2; //el producto ya existe
            }

        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'EditarProducto':
        try {
            //Modifica un producto de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
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

            //Verificacion de imagen en el campo nuevaImagen
            $newImageName = "";
            if (!empty($_FILES["Nueva_Imagen"]["name"])) {
                $imagenName = $_FILES["Nueva_Imagen"]["name"];
                $tmpName = $_FILES["Nueva_Imagen"]["tmp_name"];

                // Validar el tipo de archivo y el tamaño de la imagen
                $validImageExtensions = ['jpeg', 'jpg', 'png'];
                $imageExtension = strtolower(pathinfo($imagenName, PATHINFO_EXTENSION));

                if (!in_array($imageExtension, $validImageExtensions) || $_FILES["Nueva_Imagen"]["size"] > 5000000) { // 5MB límite de tamaño
                    echo "Error: La imagen debe ser en formato JPEG, JPG o PNG y no debe exceder los 5MB de tamaño.";
                    exit;
                }

                // Generar un nuevo nombre único para la imagen
                $newImageName = $imagenName . "-" . uniqid() . '.' . $imageExtension;
            }

            
            

            $producto = new Producto();
            $producto->setIdUsuario($IdUsuario);
            $producto->setIdProducto($IdProducto);
            $encontrado = $producto->verificarExistenciaProductoByIdDb();
            if ($encontrado == 1) {
                $producto->llenarCampos($IdProducto);
                $producto->setDescripcion($Descripcion);
                $producto->setCantXS($CantXS);
                $producto->setCantS($CantS);
                $producto->setCantM($CantM);
                $producto->setCantL($CantL);
                $producto->setCantXL($CantXL);
                $producto->setCantXXL($CantXXL);
                $producto->setIdCategoria($IdCategoria);
                $producto->setIdMarca($IdMarca);
                $producto->setImagen($newImageName);
                $producto->setPrecioCredito($PrecioCredito);
                $producto->setPrecioVenta($PrecioVenta);
                $producto->setIdProducto($IdProducto);

                $modificados = $producto->EditarProducto();
                if ($modificados > 0) {
                    if (!empty($newImageName)) {
                        if (!move_uploaded_file($tmpName, '../view/assets/img/' . $newImageName)) {
                            echo "Error al subir la imagen.";
                            exit;
                        }
                    }
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 2;
            }

        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'EliminarProducto':
        //Elimina el producto de la bd
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $producto = new Producto();
            $producto->setIdProducto(trim($_POST['IdProducto']));
            
            $encontrado = $producto->verificarExistenciaProductoByIdDb();
            if ($encontrado == 1) {
                $producto->EliminarProducto();
                $eliminado = $producto->verificarExistenciaProductoByIdDb();

                if ($eliminado == 0) {
                    echo 1;//Se elimino el producto
                } else {
                    echo 3;//No se pudo eliminar
                }
            } else {
                echo 2;//No se encontro el producto
            }
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;

}