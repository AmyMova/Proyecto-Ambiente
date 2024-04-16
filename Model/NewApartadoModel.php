<?php
require_once '../config/Conexion.php';

class NewApartadoModel extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $valor_total = null;
    private $Producto = null;
    private $CantidadTotal = null;
    private $PrecioTotal = null;
    private $Duracion = null;
    private $AporteUsuario = null;
    private $MetodoPago = null;
    private $NombreCliente = null;
    private $FechaApartado = null;
    private $CorreoCliente = null;
    private $IdUsuario = null;
    private $Vendedor = null;
    private $FechaCreacion = null;
    private $FechaPago1 = null;
    private $FechaPago2 = null;
    private $FechaPago3 = null;
    private $Notificacion1 = null;
    private $Notificacion2 = null;
    private $Notificacion3 = null;
    private $Pago1 = null;
    private $Pago2 = null;
    private $Pago3 = null;
    private $SaldoPendiente = null;
    private $SaldoCancelado = null;
    
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct()
    {
    }
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/

    public function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }
    
    public function getIdUsuario() {
        return $this->IdUsuario;
    }
    
    public function setVendedor($Vendedor) {
        $this->Vendedor = $Vendedor;
    }
    
    public function getVendedor() {
        return $this->Vendedor;
    }
    
    public function setIdApartado($idApartado)
    {
        $this->idApartado = $idApartado;
    }

    public function getIdApartado()
    {
        return $this->idApartado;
    }

    public function getValorTotal()
    {
        return $this->valor_total;
    }
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
    }

    public function getProducto()
    {
        return $this->Producto;
    }
    public function setProducto($Producto)
    {
        $this->Producto = $Producto;
    }

    public function getCantidadTotal()
    {
        return $this->CantidadTotal;
    }
    public function setCantidadTotal($CantidadTotal)
    {
        $this->CantidadTotal = $CantidadTotal;
    }

    public function getPrecioTotal()
    {
        return $this->PrecioTotal;
    }
    public function setPrecioTotal($PrecioTotal)
    {
        $this->PrecioTotal = $PrecioTotal;
    }

    public function getDuracion()
    {
        return $this->Duracion;
    }
    public function setDuracion($Duracion)
    {
        $this->Duracion = $Duracion;
    }

    public function getAporteUsuario()
    {
        return $this->AporteUsuario;
    }
    public function setAporteUsuario($AporteUsuario)
    {
        $this->AporteUsuario = $AporteUsuario;
    }

    public function getMetodoPago()
    {
        return $this->MetodoPago;
    }
    public function setMetodoPago($MetodoPago)
    {
        $this->MetodoPago = $MetodoPago;
    }

    public function getNombreCliente()
    {
        return $this->NombreCliente;
    }
    public function setNombreCliente($NombreCliente)
    {
        $this->NombreCliente = $NombreCliente;
    }

    public function getFechaApartado()
    {
        return $this->FechaApartado;
    }
    public function setFechaApartado($FechaApartado)
    {
        $this->FechaApartado = $FechaApartado;
    }

    public function getCorreoCliente()
    {
        return $this->CorreoCliente;
    }
    public function setCorreoCliente($CorreoCliente)
    {
        $this->CorreoCliente = $CorreoCliente;
    }

    public function getFechaCreacion() {
        return $this->FechaCreacion;
    }
    
    public function setFechaCreacion($FechaCreacion) {
        $this->FechaCreacion = $FechaCreacion;
    }
    
    public function getFechaPago1() {
        return $this->FechaPago1;
    }
    
    public function setFechaPago1($FechaPago1) {
        $this->FechaPago1 = $FechaPago1;
    }
    
    public function getFechaPago2() {
        return $this->FechaPago2;
    }
    
    public function setFechaPago2($FechaPago2) {
        $this->FechaPago2 = $FechaPago2;
    }
    
    public function getFechaPago3() {
        return $this->FechaPago3;
    }
    
    public function setFechaPago3($FechaPago3) {
        $this->FechaPago3 = $FechaPago3;
    }
    
    public function getNotificacion1() {
        return $this->Notificacion1;
    }
    
    public function setNotificacion1($Notificacion1) {
        $this->Notificacion1 = $Notificacion1;
    }
    
    public function getNotificacion2() {
        return $this->Notificacion2;
    }
    
    public function setNotificacion2($Notificacion2) {
        $this->Notificacion2 = $Notificacion2;
    }
    
    public function getNotificacion3() {
        return $this->Notificacion3;
    }
    
    public function setNotificacion3($Notificacion3) {
        $this->Notificacion3 = $Notificacion3;
    }
    
    public function getPago1() {
        return $this->Pago1;
    }
    
    public function setPago1($Pago1) {
        $this->Pago1 = $Pago1;
    }
    
    public function getPago2() {
        return $this->Pago2;
    }
    
    public function setPago2($Pago2) {
        $this->Pago2 = $Pago2;
    }
    
    public function getPago3() {
        return $this->Pago3;
    }
    
    public function setPago3($Pago3) {
        $this->Pago3 = $Pago3;
    }
    
    public function getSaldoPendiente() {
        return $this->SaldoPendiente;
    }
    
    public function setSaldoPendiente($SaldoPendiente) {
        $this->SaldoPendiente = $SaldoPendiente;
    }
    
    public function getSaldoCancelado() {
        return $this->SaldoCancelado;
    }
    
    public function setSaldoCancelado($SaldoCancelado) {
        $this->SaldoCancelado = $SaldoCancelado;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
    =            Metodos de la Clase              =
    =============================================*/
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function agregarApartado($valor_total, $Producto, $CantidadTotal, $PrecioTotal, $Duracion, $AporteUsuario, $MetodoPago, $NombreCliente, $FechaApartado, $CorreoCliente)
    {
        $query = "CALL CrearApartado(:ValorTotal, :Producto, :CantidadTotal, :PrecioTotal, :Duracion, :AporteUsuario, :MetodoPago, :NombreCliente, :FechaApartado, :CorreoCliente)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":ValorTotal", $valor_total, PDO::PARAM_STR);
            $resultado->bindParam(":Producto", $Producto, PDO::PARAM_STR);
            $resultado->bindParam(":CantidadTotal", $CantidadTotal, PDO::PARAM_STR);
            $resultado->bindParam(":PrecioTotal", $PrecioTotal, PDO::PARAM_STR);
            $resultado->bindParam(":Duracion", $Duracion, PDO::PARAM_STR);
            $resultado->bindParam(":AporteUsuario", $AporteUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":MetodoPago", $MetodoPago, PDO::PARAM_STR);
            $resultado->bindParam(":NombreCliente", $NombreCliente, PDO::PARAM_STR);
            $resultado->bindParam(":FechaApartado", $FechaApartado, PDO::PARAM_STR);
            $resultado->bindParam(":CorreoCliente", $CorreoCliente, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return true;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function VerApartadosAdmin()
    {
        $query = "CALL VerApartadosAdmin()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $apartado = new NewApartadoModel();
                
                // Establece los valores de las propiedades del objeto apartado
                $apartado->setIdApartado($encontrado['IdApartado']);
                $apartado->setIdUsuario($encontrado['IdUsuario']);
                $apartado->setVendedor($encontrado['Vendedor']);
                $apartado->setProducto($encontrado['Productos']);
                $apartado->setFechaCreacion($encontrado['FechaCreacion']);
                $apartado->setPrecioTotal($encontrado['PrecioTotal']);
                $apartado->setFechaPago1($encontrado['FechaPago1']);
                $apartado->setFechaPago2($encontrado['FechaPago2']);
                $apartado->setFechaPago3($encontrado['FechaPago3']);
                $apartado->setNotificacion1($encontrado['Notificacion1']);
                $apartado->setNotificacion2($encontrado['Notificacion2']);
                $apartado->setNotificacion3($encontrado['Notificacion3']);
                $apartado->setPago1($encontrado['Pago1']);
                $apartado->setPago2($encontrado['Pago2']);
                $apartado->setPago3($encontrado['Pago3']);
                $apartado->setSaldoPendiente($encontrado['SaldoPendiente']);
                $apartado->setSaldoCancelado($encontrado['SaldoCancelado']);
    
                $arr[] = $apartado;
            }
            
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
    
    public function obtenerDatosParaGrafico() {
        // Define la consulta SQL para obtener `NombreCliente` y la suma de `PrecioTotal`.
        $query = "SELECT NombreCliente, SUM(PrecioTotal) AS PrecioTotal
                  FROM apartado
                  GROUP BY NombreCliente";
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            
            $datos = array();
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $row;
            }
    
            return $datos;
        } catch (PDOException $Exception) {
            self::desconectar();
            return false;
        }
    }
    
    public function obtenerVentasDiarias() {
        // Define la consulta SQL para obtener la fecha y la suma de `PrecioTotal`.
        $query = "SELECT FechaApartado, SUM(PrecioTotal) AS TotalVenta
                  FROM apartado
                  GROUP BY FechaApartado
                  ORDER BY FechaApartado";
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
    
            $ventasDiarias = array();
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $ventasDiarias[] = $row;
            }
    
            return $ventasDiarias;
        } catch (PDOException $Exception) {
            self::desconectar();
            return false;
        }
    }
    
    /*=====  End of Metodos de la Clase  ======*/
}
?>
