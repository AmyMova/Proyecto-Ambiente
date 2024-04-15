<?php
require_once '../Model/CarritoModel.php';
require_once '../Model/ProductoModel.php';
require_once '../Model/ErrorModel.php';
switch ($_GET["op"]) {
    case 'ListarTablaCarrito':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            //Lista los datos necesarios en la tabla de carrito
            $carrito = new Carrito();
            $carritos = $carrito->VerCarritoDB($IdUsuario);
            $data = array();
            foreach ($carritos as $reg) {
                $data[] = array(
                    "0" => $reg->getIdCarrito(),
                    "1" => $reg->getDescripcion(),
                    "2" => $reg->getXS(),
                    "3" => $reg->getS(),
                    "4" => $reg->getM(),
                    "5" => $reg->getL(),
                    "6" => $reg->getXL(),
                    "7" => $reg->getXXL(),
                    "8" => $reg->getPrecio(),
                    "9" => '<button class="btn btn-warning" id="modificarProductoCarrito"><i class="ti-pencil-alt"></i></button> | ' .
                        '<button class="btn btn-danger" onclick="EliminarProductoCarrito(\'' . $reg->getIdCarrito() . '\',event)"><i class="ti-trash"></i></button>',
                    "10" => $reg->getPrecioVenta(),
                    "11" => $reg->getImagen(),
                    "12" => $reg->getIdProducto(),
                    "13" => $reg->getDB_XS(),
                    "14" => $reg->getDB_S(),
                    "15" => $reg->getDB_M(),
                    "16" => $reg->getDB_L(),
                    "17" => $reg->getDB_XL(),
                    "18" => $reg->getDB_XXL(),

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

    case 'AgregarCarrito':
        try {
            $idUsuario = isset($_POST["idUsuario"]) ? trim($_POST["idUsuario"]) : "";
            $XS = isset($_POST["Cantidad_XS"]) ? trim($_POST["Cantidad_XS"]) : "";
            $S = isset($_POST["Cantidad_S"]) ? trim($_POST["Cantidad_S"]) : "";
            $M = isset($_POST["Cantidad_M"]) ? trim($_POST["Cantidad_M"]) : "";
            $L = isset($_POST["Cantidad_L"]) ? trim($_POST["Cantidad_L"]) : "";
            $XL = isset($_POST["Cantidad_XL"]) ? trim($_POST["Cantidad_XL"]) : "";
            $XXL = isset($_POST["Cantidad_XXL"]) ? trim($_POST["Cantidad_XXL"]) : "";


            $IdProducto = isset($_POST["Id_Producto"]) ? trim($_POST["Id_Producto"]) : "";
            if (!$IdProducto) {//Revisa que los datos esten completos

                echo 4;//los datos no estan completos
            } else {
                //Si los datos estan completos entonces verifica que no tenga el mismo producto en la bd
                $carrito = new Carrito();

                $carrito->setIdProducto($IdProducto);
                $carrito->setIdUsuario($idUsuario);
                $encontrado = $carrito->verificarExistenciaProductoCarritoDb();

                if ($encontrado == 0) {//Si no lo encontró entonces los deja ingresar
                    $carrito->setXS($XS);
                    $carrito->setS($S);
                    $carrito->setM($M);
                    $carrito->setL($L);
                    $carrito->setXL($XL);
                    $carrito->setXXL($XXL);
                    $carrito->setIdUsuario($idUsuario);
                    $carrito->setIdProducto($IdProducto);
                    $carrito->AgregarProductoCarrito();
                    if ($carrito->verificarExistenciaProductoCarritoDb()) {//Verifica que el producto se haya ingresado correctamente
                        echo 1; //carrito registrado 
                        //  echo 4; //carrito registrado y envio de correo fallido
                        //}
                    } else {
                        echo 3; //Fallo al realizar el registro
                    }
                } else {
                    echo 2; //el carrito ya existe
                }

            }
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($idUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'EditarProductoCarrito':
        try {
            $idUsuario = isset($_POST["EidUsuario"]) ? trim($_POST["EidUsuario"]) : "";
            $IdCarrito = isset($_POST["id"]) ? trim($_POST["id"]) : "";
            $XS = isset($_POST["Nueva_Cant_XS"]) ? trim($_POST["Nueva_Cant_XS"]) : "";
            $S = isset($_POST["Nueva_Cant_S"]) ? trim($_POST["Nueva_Cant_S"]) : "";
            $M = isset($_POST["Nueva_Cant_M"]) ? trim($_POST["Nueva_Cant_M"]) : "";
            $L = isset($_POST["Nueva_Cant_L"]) ? trim($_POST["Nueva_Cant_L"]) : "";
            $XL = isset($_POST["Nueva_Cant_XL"]) ? trim($_POST["Nueva_Cant_XL"]) : "";
            $XXL = isset($_POST["Nueva_Cant_XXL"]) ? trim($_POST["Nueva_Cant_XXL"]) : "";
            $PrecioVenta = isset($_POST["Nuevo_Precio_Venta"]) ? trim($_POST["Nuevo_Precio_Venta"]) : "";
            $IdProducto = isset($_POST["Nuevo_Id_Producto"]) ? trim($_POST["Nuevo_Id_Producto"]) : "";
            $Descripcion = isset($_POST["Nueva_Descripcion"]) ? trim($_POST["Nueva_Descripcion"]) : "";
            //Verificacion de imagen en el campo nuevaImagen
            
            $carrito = new Carrito();
            $carrito->setIdCarrito($IdCarrito);
            $encontrado = $carrito->verificarExistenciaByIdDb();
            if ($encontrado == 1) {
                $carrito->llenarCampos($IdCarrito);
                $carrito->setXS($XS);
                $carrito->setS($S);
                $carrito->setM($M);
                $carrito->setL($L);
                $carrito->setXL($XL);
                $carrito->setXXL($XXL);
                $carrito->setIdProducto($IdProducto);
                $carrito->setIdCarrito($IdCarrito);

                $modificados = $carrito->EditarProductoCarrito();
                if ($modificados > 0) {
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
            $error->setIdUsuario($idUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;

    case 'BuscarProductoAgregarC':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            //Aqui se rellena la tabla de productos para agregar al carrito
            $etiqueta = new Producto();
            $etiquetas = $etiqueta->VerProductosDB();
            $data = array();
            foreach ($etiquetas as $reg) {
                $data[] = array(
                    "0" => $reg->getIdProducto(),
                    "1" => $reg->getDescripcion(),
                    "2" => '<button class="btn btn-success" id="SeleccionarAC"><i class="fa-solid fa-check"></i></button>',
                    "3" => $reg->getPrecioVenta(),
                    "4" => $reg->getCantXS(),
                    "5" => $reg->getCantS(),
                    "6" => $reg->getCantM(),
                    "7" => $reg->getCantL(),
                    "8" => $reg->getCantXL(),
                    "9" => $reg->getCantXXL(),
                    "10"=>$reg->getImagen()
                );
            }
            $resultados = array(
                "sEcho" => 1, ##informacion para datatables
                "iTotalRecords" => count($data), ## total de registros al datatable
                "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
                "aaData" => $data
            );
            echo json_encode($resultados);
            break;
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }

    case 'BuscarProductoEditarC':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $etiqueta = new Producto();
            $etiquetas = $etiqueta->VerProductosDB();
            $data = array();
            foreach ($etiquetas as $reg) {
                $data[] = array(
                    "0" => $reg->getIdProducto(),
                    "1" => $reg->getDescripcion(),
                    "2" => '<button class="btn btn-success" id="SeleccionarEC"><i class="fa-solid fa-check"></i></button>',
                    "3" => $reg->getPrecioVenta(),
                    "4" => $reg->getCantXS(),
                    "5" => $reg->getCantS(),
                    "6" => $reg->getCantM(),
                    "7" => $reg->getCantL(),
                    "8" => $reg->getCantXL(),
                    "9" => $reg->getCantXXL(),
                    "10"=>$reg->getImagen()
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
        //Aqui se rellena la tabla de productos para editar algun producto del carrito

        break;


    case 'EliminarProductoCarrito':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $carrito = new Carrito();
            $carrito->setIdCarrito(trim($_POST['IdCarrito']));

            $encontrado = $carrito->verificarExistenciaByIdDb();
            if ($encontrado == 1) {
                $carrito->EliminarProductoCarrito();
                $eliminado = $carrito->verificarExistenciaByIdDb();
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

    //Elimina Todos los productos del carrito
    case 'EliminarProductosCarrito':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $carrito = new Carrito();
            $carrito->setIdUsuario($IdUsuario);


            $encontrado = $carrito->verificarProductosDB();

            if ($encontrado == 1) {
                $carrito->EliminarProductosCarrito();
                $eliminado = $carrito->verificarProductosDB();
                if ($eliminado == 0) {
                    echo 1;//Se elimino los productos
                } else {
                    echo 3;//No se pudo eliminar
                }
            } else {
                echo 2;//no hay productos
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