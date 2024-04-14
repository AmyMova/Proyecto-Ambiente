-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2024 a las 01:18:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rosayanil`
--



CREATE DATABASE IF NOT EXISTS `rosayanil` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rosayanil`;

DELIMITER $$
--
-- Procedimientos
--

-- Procedimiento para crear un apartado
CREATE PROCEDURE CrearApartado(
    IN p_ValorTotal VARCHAR(255),
    IN Producto VARCHAR(255),
    IN CantidadTotal VARCHAR(255),
    IN PrecioTotal VARCHAR(255),
    IN Duracion VARCHAR(50),
    IN AporteUsuario VARCHAR(255),
    IN MetodoPago VARCHAR(255),
    IN NombreCliente VARCHAR(100),
    IN FechaApartado VARCHAR(100),
    IN CorreoCliente VARCHAR(100)
)
BEGIN
    -- Insertar el nuevo apartado en la tabla de apartados
    INSERT INTO apartado (ValorTotal, Producto, CantidadTotal, PrecioTotal, Duracion, AporteUsuario, MetodoPago, NombreCliente, FechaApartado, CorreoCliente)
    VALUES (p_ValorTotal, Producto, CantidadTotal, PrecioTotal, Duracion, AporteUsuario, MetodoPago, NombreCliente, FechaApartado, CorreoCliente);
END$$

DROP PROCEDURE IF EXISTS `CopiarEtiquetas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CopiarEtiquetas` (IN `Precio_Venta` DECIMAL, IN `Precio_Credito` DECIMAL, IN `Id_Categoria` INT, IN `Id_Marca` INT, IN `Id_Producto` INT, IN `Id_Talla` INT)   BEGIN
    INSERT INTO producto
(PrecioVenta,PrecioCredito,IdCategoria,IdMarca,IdProducto,IdTalla)
    VALUES (Precio_Venta,Precio_Credito,Id_Categoria,Id_Marca,Id_Producto,Id_Talla);
END$$

DROP PROCEDURE IF EXISTS `CrearCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearCategoria` (IN `Nombre_Categoria` VARCHAR(20))   BEGIN
    INSERT INTO categoria(NombreCategoria) VALUES (Nombre_Categoria);
END$$

DROP PROCEDURE IF EXISTS `CrearMarca`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearMarca` (IN `Nombre_Tipo` VARCHAR(20))   BEGIN
    INSERT INTO Marca(Marca) VALUES (Nombre_Marca);
END$$

DROP PROCEDURE IF EXISTS `CrearProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearProducto` (IN `Cantidad_XS` INT, IN `descripcionP` VARCHAR(100), IN `Id_Categoria` INT, IN `Id_Marca` INT, IN `imagenP` VARCHAR(100), IN `Cantidad_XXL` INT, IN `Precio_Venta` DECIMAL, IN `Precio_Credito` DECIMAL, IN `Cantidad_S` INT, IN `Cantidad_M` INT, IN `Cantidad_L` INT, IN `Cantidad_XL` INT)   BEGIN
    INSERT INTO producto(cantXS, descripcion, idcategoria, idMarca, imagen, cantXXL, precioVenta, precioCredito,CantS,CantM,CantL,CantXL)
    VALUES (Cantidad_XS, descripcionP, Id_Categoria, Id_Marca, imagenP, Cantidad_XXL, Precio_Venta, Precio_Credito,Cantidad_S,Cantidad_M,Cantidad_L,Cantidad_XL);
END$$

DROP PROCEDURE IF EXISTS `EditarCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarCategoria` (IN `id` INT, IN `Nuevo_Nombre_Categoria` VARCHAR(20))   BEGIN
    UPDATE categoria SET NombreCategoria = Nuevo_Nombre_Categoria WHERE IdCategoria = id;
END$$

DROP PROCEDURE IF EXISTS `EditarMarca`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarMarca` (IN `id` INT, IN `Nuevo_Nombre_Marca` VARCHAR(20))   BEGIN
    UPDATE Marca SET Marca= Nuevo_Nombre_Marca WHERE IdMarca = id;
END$$

DROP PROCEDURE IF EXISTS `EditarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarProducto` (IN `id` INT, IN `Nueva_Cant_XS` INT, IN `Nueva_Descripcion` VARCHAR(100), IN `Nuevo_Id_Categoria` INT, IN `Nuevo_Id_Marca` INT, IN `Nueva_Imagen` VARCHAR(100), IN `Nueva_Cant_XXL` INT, IN `Nuevo_Precio_Venta` DECIMAL, IN `Nuevo_Precio_Credito` DECIMAL, IN `Nueva_Cant_S` INT, IN `Nueva_Cant_M` INT, IN `Nueva_Cant_L` INT, IN `Nueva_Cant_XL` INT)   BEGIN
    UPDATE producto SET 
    descripcion =Nueva_Descripcion,
IdCategoria= Nuevo_Id_Categoria,
IdMarca=Nuevo_Id_Marca,
Imagen=Nueva_Imagen,
PrecioVenta=Nuevo_Precio_Venta,
PrecioCredito=Nuevo_Precio_Credito,
CantXS=Nueva_Cant_XS,
CantS=Nueva_Cant_S,
CantM=Nueva_Cant_M,
CantL=Nueva_Cant_L,
CantXL=Nueva_Cant_XL,
CantXXL=Nueva_Cant_XXL where id=IdProducto;
END$$

DROP PROCEDURE IF EXISTS `EliminarApartado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarApartado` (`id` INT)   BEGIN
    DELETE
FROM
    apartado
WHERE
    IdApartado = id ; END$$

DROP PROCEDURE IF EXISTS `EliminarCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarCategoria` (`id` INT)   BEGIN
    DELETE
FROM
    categoria
WHERE
    IdCategoria = id ; END$$

DROP PROCEDURE IF EXISTS `EliminarEtiquetas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarEtiquetas` ()   DELETE FROM ETIQUETA$$

DROP PROCEDURE IF EXISTS `EliminarMarca`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarMarca` (IN `id` INT)   BEGIN
    DELETE
FROM
    Marca
WHERE
    IdMarca = id ; END$$

DROP PROCEDURE IF EXISTS `EliminarProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarProducto` (IN `id` INT)   BEGIN
    DELETE
FROM
    producto
WHERE
    producto.Idproducto = id ; END$$

DROP PROCEDURE IF EXISTS `EliminarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuario` (`id` INT)   BEGIN
    DELETE
FROM
    usuario
WHERE
    Idusuario = id ; END$$

DROP PROCEDURE IF EXISTS `VerApartado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerApartado` (`id` INT)   BEGIN
    SELECT
        *
    FROM
        apartado A
    WHERE
        id = A.IdApartado ; END$$

DROP PROCEDURE IF EXISTS `VerApartados`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerApartados` ()   BEGIN
    SELECT * FROM apartado;
END$$

DROP PROCEDURE IF EXISTS `VerCatalogo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerCatalogo` ()   BEGIN
    SELECT p.IdProducto,c.NombreCategoria,m.marca,p.Descripcion,p.PrecioVenta,p.PrecioCredito,p.CantXS,p.CantS,p.CantM,p.CantL,p.CantXL,p.CantXXL,p.Imagen FROM Producto p,categoria c, marca m where p.IdTipo=m.IdMarca and c.IdCategoria=p.IdCategoria or CantS>0 or CantXS>0 or CantM>0 or CantL>0 or CantXL>0 or CantXXL>0;
END$$

DROP PROCEDURE IF EXISTS `VerCategoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerCategoria` (`id` INT)   BEGIN
    SELECT
        *
    FROM
        categoria C
    WHERE
        id = C.IdCategoria ; END$$

DROP PROCEDURE IF EXISTS `VerCategorias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerCategorias` ()   BEGIN
    SELECT * FROM categoria;
END$$

DROP PROCEDURE IF EXISTS `VerEtiquetas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerEtiquetas` ()   BEGIN
    SELECT 
p.Descripcion,
c.NombreCategoria,
m.Marca,
e.PrecioVenta,
e.PrecioCredito,
t.Talla
FROM Etiqueta e,
categoria c,
marca m,
producto p,
talla t 
where 
e.IdMarca=m.IdMarca 
and c.IdCategoria=e.IdCategoria
and p.IdProducto=e.IdProducto
and t.IdTalla=e.IdTalla;
END$$

DROP PROCEDURE IF EXISTS `VerMarca`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerMarca` (IN `id` INT)   BEGIN
    SELECT
        *
    FROM
        Marca M
    WHERE
        id = M.IdMarca ; END$$

DROP PROCEDURE IF EXISTS `VerMarcas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerMarcas` ()   BEGIN
    SELECT * FROM Marca;
END$$

DROP PROCEDURE IF EXISTS `VerProducto`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerProducto` (IN `id` INT)   BEGIN
    SELECT
        *
    FROM
        Producto P
    WHERE
        id = P.idProducto ; END$$

DROP PROCEDURE IF EXISTS `VerProductos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerProductos` ()   BEGIN
    SELECT p.IdProducto,c.NombreCategoria,m.Marca,p.Descripcion,p.PrecioVenta,p.PrecioCredito,p.CantXS,p.CantS,p.CantM,p.CantL,p.CantXL,p.CantXXL,p.Imagen FROM Producto p,categoria c, marca m where p.IdMarca=m.IdMarca and c.IdCategoria=p.IdCategoria;
END$$

DROP PROCEDURE IF EXISTS `VerRol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerRol` (IN `id` INT)   BEGIN
    SELECT
        *
    FROM
        Rol R
    WHERE
        id = R.IdRol; END$$

DROP PROCEDURE IF EXISTS `VerRoles`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerRoles` ()   BEGIN
    SELECT * FROM Rol;
END$$

DROP PROCEDURE IF EXISTS `VerUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerUsuario` (IN `id` INT)   BEGIN
    SELECT
        *
    FROM
        usuario U
    WHERE
        id = U.IdUsuario ; END$$

DROP PROCEDURE IF EXISTS `VerUsuarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerUsuarios` ()   BEGIN
    SELECT * FROM usuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartado`
--

DROP TABLE IF EXISTS `apartado`;
CREATE TABLE `apartado` (
  `IdApartado` INT AUTO_INCREMENT PRIMARY KEY,
  `ValorTotal` varchar(100) NOT NULL,
  `Producto` varchar(100) NOT NULL,  
  `CantidadTotal` varchar(100) NOT NULL,  
  `PrecioTotal` varchar(100) NOT NULL,
  `Duracion` varchar(100) NOT NULL,
  `AporteUsuario` varchar(100) NOT NULL,
  `MetodoPago` varchar(100) NOT NULL,
  `NombreCliente` varchar(100) NOT NULL,
  `FechaApartado` varchar(100) NOT NULL,
  `CorreoCliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Sweater');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

DROP TABLE IF EXISTS `etiqueta`;
CREATE TABLE `etiqueta` (
  `IdEtiqueta` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdMarca` int(11) NOT NULL,
  `PrecioVenta` decimal(10,0) NOT NULL,
  `PrecioCredito` decimal(10,0) NOT NULL,
  `IdTalla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`IdEtiqueta`, `IdProducto`, `IdCategoria`, `IdMarca`, `PrecioVenta`, `PrecioCredito`, `IdTalla`) VALUES
(1, 1, 1, 1, 17500, 22500, 1),
(2, 1, 1, 1, 17500, 22500, 1),
(3, 1, 1, 1, 17500, 22500, 1),
(4, 1, 1, 1, 17500, 22500, 1),
(5, 1, 1, 1, 17500, 22500, 2),
(6, 1, 1, 1, 17500, 22500, 2),
(7, 1, 1, 1, 17500, 22500, 2),
(8, 1, 1, 1, 17500, 22500, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `IdMarca` int(11) NOT NULL,
  `Marca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`IdMarca`, `Marca`) VALUES
(1, 'Cuero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdMarca` int(11) NOT NULL,
  `CantXS` int(11) NOT NULL,
  `CantS` int(11) NOT NULL,
  `CantM` int(11) NOT NULL,
  `CantL` int(11) NOT NULL,
  `CantXL` int(11) NOT NULL,
  `CantXXL` int(11) NOT NULL,
  `PrecioVenta` decimal(10,0) NOT NULL,
  `PrecioCredito` decimal(10,0) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `IdCategoria`, `IdMarca`, `CantXS`, `CantS`, `CantM`, `CantL`, `CantXL`, `CantXXL`, `PrecioVenta`, `PrecioCredito`, `Descripcion`, `Imagen`) VALUES
(1, 1, 1, 4, 4, 6, 2, 2, 2, 17500, 22500, 'Chaqueta', 'No Hay'),
(2, 1, 1, 80, 6, 4, 8, 10, 4, 20000, 25000, 'CHAQUETA DE CUERO CAFE', 'Si hay imagen solo que hay problemas'),
(4, 1, 1, 10, 5, 12, 15, 0, 23, 10500, 15500, 'CAMISETA', 'No hay'),
(5, 1, 1, 10, 5, 12, 15, 0, 23, 10500, 15500, 'CAMISETA', 'No hay'),
(6, 1, 1, 25, 62, 12, 12, 10, 0, 11500, 12500, 'CAMISETA2', 'Si hay'),
(7, 1, 1, 12, 5, 16, 19, 20, 0, 12050, 15050, 'CAMISETA3', 'No contiene'),
(8, 1, 1, 12, 5, 16, 19, 20, 0, 12050, 15050, 'CAMISETA4', 'No contiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `IdRol` int(11) NOT NULL,
  `NombreRol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`IdRol`, `NombreRol`) VALUES
(1, 'Admin'),
(2, 'Cliente'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

DROP TABLE IF EXISTS `talla`;
CREATE TABLE `talla` (
  `IdTalla` int(11) NOT NULL,
  `Talla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`IdTalla`, `Talla`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(20) NOT NULL,
  `ApellidoUsuario` varchar(20) NOT NULL,
  `NumeroCedula` varchar(9) NOT NULL,
  `NumeroTelefono` varchar(8) NOT NULL,
  `CorreoElectronico` varchar(30) NOT NULL,
  `Contrasenna` varchar(20) NOT NULL,
  `DiaCumpleanos` int(11) NOT NULL,
  `MesCumpleanos` int(11) NOT NULL,
  `AnoCumpleanos` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apartado`
--
ALTER TABLE `apartado`
  ADD PRIMARY KEY (`IdApartado`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`IdEtiqueta`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdMarca` (`IdMarca`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdTipo` (`IdMarca`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`IdTalla`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartado`
--
ALTER TABLE `apartado`
  MODIFY `IdApartado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `IdEtiqueta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `IdMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `IdTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apartado`
--
ALTER TABLE `apartado`
  ADD CONSTRAINT `apartado_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Filtros para la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD CONSTRAINT `etiqueta_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `etiqueta_ibfk_2` FOREIGN KEY (`IdMarca`) REFERENCES `marca` (`IdMarca`),
  ADD CONSTRAINT `etiqueta_ibfk_3` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdMarca`) REFERENCES `marca` (`IdMarca`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`);
COMMIT;


DROP PROCEDURE IF EXISTS `VerApartadosAdmin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VerApartadosAdmin` ()   begin
select * from 
apartado;
end$$

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
