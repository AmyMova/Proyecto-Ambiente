<?php
require_once '../Model/EtiquetaModel.php';
require_once '../Model/ProductoModel.php';

switch ($_GET["op"]) {
    case 'ListarTablaEtiqueta':
        $etiqueta = new Etiqueta();
        $etiquetas = $etiqueta->VerEtiquetasDB();
        $data = array();
        foreach ($etiquetas as $reg) {
            $data[] = array(
                "0" => $reg->getIdEtiqueta(),
                "1" => $reg->getDescripcion(),
                "2" => $reg->getXS(),
                "3" => $reg->getS(),
                "4" => $reg->getM(),
                "5" => $reg->getL(),
                "6" => $reg->getXL(),
                "7" => $reg->getXXL(),
                "8" => $reg->getPrecioVenta(),
                "9" => $reg->getPrecioCredito(),
                "10" => '</button> <button class="btn btn-warning" id="modificarEtiqueta"><i class="ti-pencil-alt"></i></button> | ' .
                    '<button class="btn btn-danger" onclick="EliminarEtiqueta(\'' . $reg->getIdEtiqueta() . '\')"><i class="ti-trash"></i></button>',
                "11" => $reg->getIdProducto(),
                "12" => $reg->getCategoria(),
                "13" => $reg->getMarca(),
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
    case 'ListarTarjetaEtiqueta':
        $etiqueta = new Etiqueta();
        $etiquetas = $etiqueta->VerEtiquetasDB();
        $data = array();
        foreach ($etiquetas as $reg) {
            $data[] = array(
                "Descripcion" => $reg->getDescripcion(),
                "Categoria" => $reg->getCategoria(),
                "Marca" => $reg->getMarca(),
                "XS" => $reg->getXS(),
                "S" => $reg->getS(),
                "M" => $reg->getM(),
                "L" => $reg->getL(),
                "XL" => $reg->getXL(),
                "XXL" => $reg->getXXL(),
                "PrecioVenta" => $reg->getPrecioVenta(),
                "PrecioCredito" => $reg->getPrecioCredito()
            );
        }
        echo json_encode($data);
        break;
    case 'AgregarEtiqueta':
        $IdProducto = isset($_POST["IdProducto"]) ? trim($_POST["IdProducto"]) : "";
        $XS = isset($_POST["XS"]) ? trim($_POST["XS"]) : "";
        $S = isset($_POST["S"]) ? trim($_POST["S"]) : "";
        $M = isset($_POST["M"]) ? trim($_POST["M"]) : "";
        $L = isset($_POST["L"]) ? trim($_POST["L"]) : "";
        $XL = isset($_POST["XL"]) ? trim($_POST["XL"]) : "";
        $XXL = isset($_POST["XXL"]) ? trim($_POST["XXL"]) : "";




        $etiqueta = new Etiqueta();

        $etiqueta->setIdProducto($IdProducto);
        $encontrado = $etiqueta->verificarExistenciaEtiquetaDb();

        if ($encontrado == 0) {
            $etiqueta->setXS($XS);
            $etiqueta->setS($S);
            $etiqueta->setM($M);
            $etiqueta->setL($L);
            $etiqueta->setXL($XL);
            $etiqueta->setXXL($XXL);
            $etiqueta->CrearEtiquetaDB();

            if ($etiqueta->verificarExistenciaEtiquetaDb()) {
                echo 1; //etiqueta registrado 
                //  echo 4; //etiqueta registrado y envio de correo fallido
                //}
            } else {
                echo 3; //Fallo al realizar el registro
            }
        } else {
            echo 2; //el etiqueta ya existe
        }

        break;
    case 'EditarEtiqueta':
        $IdEtiqueta = isset($_POST["id"]) ? trim($_POST["id"]) : "";
        $IdProducto = isset($_POST["Id_Producto"]) ? trim($_POST["Id_Producto"]) : "";
        $XS = isset($_POST["Nuevo_XS"]) ? trim($_POST["Nuevo_XS"]) : "";
        $S = isset($_POST["Nuevo_S"]) ? trim($_POST["Nuevo_S"]) : "";
        $M = isset($_POST["Nuevo_M"]) ? trim($_POST["Nuevo_M"]) : "";
        $L = isset($_POST["Nuevo_L"]) ? trim($_POST["Nuevo_L"]) : "";
        $XL = isset($_POST["Nuevo_XL"]) ? trim($_POST["Nuevo_XL"]) : "";
        $XXL = isset($_POST["Nuevo_XXL"]) ? trim($_POST["Nuevo_XXL"]) : "";


        $etiqueta = new Etiqueta();

        $etiqueta->setIdEtiqueta($IdEtiqueta);
        $encontrado = $etiqueta->verificarExistenciaEtiquetaByIDDb();
        if ($encontrado == 1) {
            $etiqueta->llenarCampos($IdEtiqueta);

            $etiqueta->setXS($XS);
            $etiqueta->setS($S);
            $etiqueta->setM($M);
            $etiqueta->setL($L);
            $etiqueta->setXL($XL);
            $etiqueta->setXXL($XXL);
            $etiqueta->setIdProducto($IdProducto);
            $modificados = $etiqueta->EditarEtiqueta();

            if ($modificados > 0) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 2;
        }
        break;

    case 'EliminarEtiqueta':
        $etiqueta = new Etiqueta();
        $etiqueta->setIdEtiqueta(trim($_POST['IdEtiqueta']));
        $encontrado = $etiqueta->verificarExistenciaEtiquetaByIDDb();
        if ($encontrado == 1) {
            $rspta = $etiqueta->EliminarEtiqueta();
        } else {
            $rspta = "No encontrado";
        }

        echo $rspta;
    case 'EliminarEtiquetas':
        $etiqueta = new Etiqueta();
        $encontrado = $etiqueta->verificarCantidadDB();
        if ($encontrado == 1) {
            $etiqueta->EliminarEtiquetas();
            $eliminado = $etiqueta->verificarCantidadDB();
            if ($eliminado > 0) {
                echo 1;
            } else {
                echo 0;
            }

        }
    case 'BuscarProductoAgregar':
        $etiqueta = new Producto();
        $etiquetas = $etiqueta->VerProductosDB();
        $data = array();
        foreach ($etiquetas as $reg) {
            $data[] = array(
                "0" => $reg->getIdProducto(),
                "1" => $reg->getDescripcion(),
                "2" => '</button> <button class="btn btn-success" id="SeleccionarA"><i class="fa-solid fa-check"></i></button>' 
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
    case 'BuscarProductoEditar':
        $etiqueta = new Producto();
        $etiquetas = $etiqueta->VerProductosDB();
        $data = array();
        foreach ($etiquetas as $reg) {
            $data[] = array(
                "0" => $reg->getIdProducto(),
                "1" => $reg->getDescripcion(),
                "2" => '</button> <button class="btn btn-success" id="SeleccionarE"><i class="fa-solid fa-check"></i></button>' 
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