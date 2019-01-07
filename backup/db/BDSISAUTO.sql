-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.27-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sisauto
--

CREATE DATABASE IF NOT EXISTS sisauto;
USE sisauto;

--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(10) unsigned NOT NULL auto_increment,
  `nombre_Cli` varchar(50) NOT NULL,
  `direccion_Cli` varchar(100) NOT NULL,
  `telefono_Cli` varchar(10) NOT NULL,
  `nrc_Cli` varchar(7) NOT NULL,
  `nit_Cli` varchar(17) NOT NULL,
  PRIMARY KEY  (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `idCompra` int(10) unsigned NOT NULL auto_increment,
  `numFac_Com` int(10) unsigned NOT NULL,
  `fecha_Com` datetime NOT NULL,
  `total_Com` float NOT NULL,
  `id_Proveedor` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idCompra`),
  KEY `FK_compra_Proveedor` (`id_Proveedor`),
  CONSTRAINT `FK_compra_Proveedor` FOREIGN KEY (`id_Proveedor`) REFERENCES `proveedor` (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;


--
-- Definition of table `detallecompra`
--

DROP TABLE IF EXISTS `detallecompra`;
CREATE TABLE `detallecompra` (
  `idDetalleCompra` int(10) unsigned NOT NULL auto_increment,
  `cantidad_DCom` int(10) unsigned NOT NULL,
  `precio_DCom` float NOT NULL,
  `id_Compra` int(10) unsigned NOT NULL,
  `id_Producto` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idDetalleCompra`),
  KEY `FK_detalleCompra_Compra` (`id_Compra`),
  KEY `FK_detalleCompra_Producto` (`id_Producto`),
  CONSTRAINT `FK_detalleCompra_Compra` FOREIGN KEY (`id_Compra`) REFERENCES `compra` (`idCompra`),
  CONSTRAINT `FK_detalleCompra_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detallecompra`
--

/*!40000 ALTER TABLE `detallecompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecompra` ENABLE KEYS */;


--
-- Definition of table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(10) unsigned NOT NULL auto_increment,
  `cantidad_DVen` int(10) unsigned NOT NULL,
  `precio_DVen` float NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  `id_Producto` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idDetalleVenta`),
  KEY `FK_detalleVenta_Producto` (`id_Producto`),
  KEY `FK_detalleventa_Venta` (`id_Venta`),
  CONSTRAINT `FK_detalleventa_Venta` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`),
  CONSTRAINT `FK_detalleVenta_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalleventa`
--

/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;


--
-- Definition of table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `idFactura` int(10) unsigned NOT NULL auto_increment,
  `numero_Fac` int(10) unsigned NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idFactura`),
  KEY `FK_factura_Venta` (`id_Venta`),
  CONSTRAINT `FK_factura_Venta` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factura`
--

/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;


--
-- Definition of table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `idInventario` int(10) unsigned NOT NULL auto_increment,
  `tipoMovimiento_Inv` int(10) unsigned NOT NULL,
  `existencias_Inv` int(10) unsigned NOT NULL,
  `precioActual_Inv` float NOT NULL,
  `cantidad_Inv` int(10) unsigned NOT NULL,
  `precio_Inv` float NOT NULL,
  `fechaMovimiento_Inv` datetime NOT NULL,
  `nuevaExistencia_Inv` int(10) unsigned NOT NULL,
  `nuevoPrecio_Inv` float NOT NULL,
  `id_Producto` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idInventario`),
  KEY `FK_inventario_Producto` (`id_Producto`),
  CONSTRAINT `FK_inventario_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--

/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;


--
-- Definition of table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(10) unsigned NOT NULL auto_increment,
  `nombre_Prod` varchar(45) NOT NULL,
  `categoria_Prod` int(10) unsigned NOT NULL,
  `marca_Prod` varchar(45) NOT NULL,
  `descripcion_Prod` varchar(50) NOT NULL,
  `modeloVehiculo_Prod` varchar(45) NOT NULL,
  `anioVehiculo_Prod` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Definition of table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `idProveedor` int(10) unsigned NOT NULL auto_increment,
  `nombre_Prov` varchar(50) NOT NULL,
  `correo_Prov` varchar(50) NOT NULL,
  `telefono_Prov` varchar(10) NOT NULL,
  `direccion_Prov` varchar(100) NOT NULL,
  `nombreResp_Prov` varchar(50) NOT NULL,
  `telefonoResp_Prov` varchar(10) NOT NULL,
  PRIMARY KEY  (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(10) unsigned NOT NULL auto_increment,
  `usuario_Usu` varchar(8) NOT NULL,
  `contrasena_Usu` varchar(8) NOT NULL,
  `nombre_Usu` varchar(50) NOT NULL,
  `correo_Usu` varchar(50) NOT NULL,
  `direccion_Usu` varchar(100) NOT NULL,
  `telefono_Usu` varchar(10) NOT NULL,
  `dui_Usu` varchar(10) NOT NULL,
  `tipo_Usu` int(11) NOT NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `idVenta` int(10) unsigned NOT NULL auto_increment,
  `fecha_Ven` datetime NOT NULL,
  `total_Ven` float NOT NULL,
  `id_Cliente` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`idVenta`),
  KEY `FK_venta_Cliente` (`id_Cliente`),
  CONSTRAINT `FK_venta_Cliente` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
