<?php
require_once '../Model/CarritoModel.php';
require_once '../Model/ProductoModel.php';
switch ($_GET["op"]) {
    case 'ListarTablaCarrito':
        $carrito = new Carrito();
        $carritos = $carrito->VerCarritoDB();
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
                "9" => '<button class="btn btn-warning" id="modificarCarrito"><i class="ti-pencil-alt"></i></button> | ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdCarrito() . '\')"><i class="ti-trash"></i></button>',
                "10" => $reg->getCategoria(),
                "11" => $reg->getMarca(),
                "12" => $reg->getPrecioVenta(),
                "13" => $reg->getImagen()

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

    case 'AgregarCarrito':
        $XS = isset($_POST["Cantidad_XS"]) ? intval(trim($_POST["Cantidad_XS"])) : "";
        $S = isset($_POST["Cantidad_S"]) ? intval(trim($_POST["Cantidad_S"])) : "";
        $M = isset($_POST["Cantidad_M"]) ? intval(trim($_POST["Cantidad_M"])) : "";
        $L = isset($_POST["Cantidad_L"]) ? intval(trim($_POST["Cantidad_L"])) : "";
        $XL = isset($_POST["Cantidad_XL"]) ? intval(trim($_POST["Cantidad_XL"])) : "";
        $XXL = isset($_POST["Cantidad_XXL"]) ? intval(trim($_POST["Cantidad_XXL"])) : "";
        //Verificar que la cantidad que se haya agregado exista en en la bd

        $IdProducto = isset($_POST["Id_Producto"]) ? trim($_POST["Id_Producto"]) : "";
        if (!$IdProducto) {
            echo 5;//los datos no estan completos
        } else {
            $carrito = new Carrito();

            $carrito->setIdProducto($IdProducto);
            $carrito->setIdUsuario(1);
            $encontrado = $carrito->verificarExistenciaProductoCarritoDb();

            if ($encontrado == 0) {
                $carrito->setXS($XS);
                $carrito->setS($S);
                $carrito->setM($M);
                $carrito->setL($L);
                $carrito->setXL($XL);
                $carrito->setXXL($XXL);
                $carrito->setIdUsuario(1);
                $carrito->setIdProducto($IdProducto);
                echo "paso la verificicacion";
                $carrito->AgregarProductoCarrito();
                if ($carrito->verificarExistenciaProductoCarritoDb()) {
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
        break;
    case 'BuscarProductoAgregarC':
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
                "9" => $reg->getCantXXL()
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
}