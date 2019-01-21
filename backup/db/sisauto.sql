-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB


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
-- Definition of table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `idBitacora` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_Usu` varchar(8) DEFAULT NULL,
  `sesionInicio` datetime DEFAULT NULL,
  `actividad` varchar(50) DEFAULT NULL,
  `tipo_Bico` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idBitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitacora`
--

/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` (`idBitacora`,`usuario_Usu`,`sesionInicio`,`actividad`,`tipo_Bico`) VALUES 
 (273,'grecia','2019-01-15 23:51:29','EditÃ³ un producto',NULL),
 (274,'grecia','2019-01-15 23:52:11','EditÃ³ un producto',NULL),
 (277,'grecia','2019-01-16 18:06:29','IniciÃ³ sesiÃ³n',NULL),
 (278,'grecia','2019-01-16 18:30:24','RegistrÃ³ un usuario',NULL),
 (279,'grecia','2019-01-16 18:32:53','RegistrÃ³ un usuario',NULL),
 (280,'grecia','2019-01-16 18:34:46','RegistrÃ³ un usuario',NULL),
 (281,'grecia','2019-01-16 18:36:04','RegistrÃ³ un usuario',NULL),
 (282,'grecia','2019-01-16 18:37:49','RegistrÃ³ un usuario',NULL),
 (283,'grecia','2019-01-16 18:39:35','RegistrÃ³ un usuario',NULL),
 (284,'grecia','2019-01-16 18:42:45','RegistrÃ³ un usuario',NULL),
 (285,'grecia','2019-01-16 18:45:43','RegistrÃ³ un usuario',NULL),
 (286,'grecia','2019-01-16 18:47:37','RegistrÃ³ un usuario',NULL),
 (289,'grecia','2019-01-16 19:01:00','IniciÃ³ sesiÃ³n',NULL),
 (292,'grecia','2019-01-16 19:11:04','EditÃ³ un producto',NULL),
 (296,'grecia','2019-01-16 20:27:18','IniciÃ³ sesiÃ³n',NULL);
INSERT INTO `bitacora` (`idBitacora`,`usuario_Usu`,`sesionInicio`,`actividad`,`tipo_Bico`) VALUES 
 (300,'grecia','2019-01-16 20:46:42','GuardÃ³ una compra',NULL),
 (301,'grecia','2019-01-16 20:48:16','GuardÃ³ una compra',NULL),
 (302,'grecia','2019-01-16 20:51:31','GuardÃ³ una compra',NULL),
 (303,'grecia','2019-01-16 20:56:32','GuardÃ³ una compra',NULL),
 (304,'grecia','2019-01-16 20:59:05','GuardÃ³ una compra',NULL),
 (305,'grecia','2019-01-16 21:01:27','GuardÃ³ una compra',NULL),
 (306,'grecia','2019-01-16 21:03:44','GuardÃ³ una compra',NULL),
 (307,'grecia','2019-01-16 21:05:32','GuardÃ³ una compra',NULL),
 (308,'grecia','2019-01-16 21:09:40','GuardÃ³ una compra',NULL),
 (309,'grecia','2019-01-16 21:15:14','GuardÃ³ una compra',NULL),
 (310,'grecia','2019-01-16 21:17:26','GuardÃ³ una compra',NULL),
 (311,'grecia','2019-01-16 21:18:19','GuardÃ³ una compra',NULL),
 (312,'grecia','2019-01-16 21:20:35','GuardÃ³ una compra',NULL),
 (313,'grecia','2019-01-16 21:25:25','CerrÃ³ sesiÃ³n',NULL),
 (314,'brenda','2019-01-16 21:25:33','IniciÃ³ sesiÃ³n',NULL);
INSERT INTO `bitacora` (`idBitacora`,`usuario_Usu`,`sesionInicio`,`actividad`,`tipo_Bico`) VALUES 
 (315,'brenda','2019-01-16 21:30:39','GuardÃ³ una compra',NULL),
 (316,'brenda','2019-01-16 22:10:15','GuardÃ³ un producto',NULL),
 (317,'brenda','2019-01-16 22:11:57','GuardÃ³ un producto',NULL),
 (318,'brenda','2019-01-16 22:13:05','GuardÃ³ un producto',NULL),
 (319,'brenda','2019-01-16 22:14:32','GuardÃ³ un producto',NULL),
 (320,'brenda','2019-01-16 22:15:26','GuardÃ³ un producto',NULL),
 (321,'brenda','2019-01-16 22:19:40','GuardÃ³ un producto',NULL),
 (322,'brenda','2019-01-16 22:22:55','GuardÃ³ un producto',NULL),
 (323,'brenda','2019-01-16 22:25:14','GuardÃ³ un producto',NULL),
 (324,'brenda','2019-01-16 22:26:54','GuardÃ³ un producto',NULL),
 (325,'brenda','2019-01-16 22:28:53','CerrÃ³ sesiÃ³n',NULL),
 (326,'grecia','2019-01-16 22:29:01','IniciÃ³ sesiÃ³n',NULL),
 (327,'grecia','2019-01-16 22:29:32','IniciÃ³ nÃºmeros de factura',NULL),
 (328,'grecia','2019-01-16 22:30:06','GuardÃ³ una venta',NULL),
 (329,'grecia','2019-01-16 22:30:31','GuardÃ³ una venta',NULL);
INSERT INTO `bitacora` (`idBitacora`,`usuario_Usu`,`sesionInicio`,`actividad`,`tipo_Bico`) VALUES 
 (330,'grecia','2019-01-16 22:31:08','GuardÃ³ una venta',NULL),
 (331,'grecia','2019-01-16 22:31:43','GuardÃ³ una venta',NULL),
 (332,'grecia','2019-01-16 22:31:54','CerrÃ³ sesiÃ³n',NULL),
 (333,'alegonzy','2019-01-16 22:32:04','IniciÃ³ sesiÃ³n',NULL),
 (334,'alegonzy','2019-01-16 22:32:24','GuardÃ³ una venta',NULL),
 (335,'alegonzy','2019-01-16 22:32:43','GuardÃ³ una venta',NULL),
 (336,'alegonzy','2019-01-16 22:33:11','GuardÃ³ una venta',NULL),
 (337,'alegonzy','2019-01-16 22:33:21','CerrÃ³ sesiÃ³n',NULL),
 (338,'brenda','2019-01-16 22:33:30','IniciÃ³ sesiÃ³n',NULL),
 (339,'brenda','2019-01-16 22:33:45','GuardÃ³ una venta',NULL),
 (340,'brenda','2019-01-16 22:34:12','GuardÃ³ una venta',NULL),
 (341,'brenda','2019-01-16 22:37:16','GuardÃ³ una venta',NULL),
 (342,'brenda','2019-01-16 22:38:16','CerrÃ³ sesiÃ³n',NULL),
 (343,'grecia','2019-01-16 22:38:22','IniciÃ³ sesiÃ³n',NULL);
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idCliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_Cli` varchar(50) NOT NULL,
  `direccion_Cli` varchar(100) DEFAULT NULL,
  `telefono_Cli` varchar(10) DEFAULT NULL,
  `nrc_Cli` varchar(8) DEFAULT NULL,
  `nit_Cli` varchar(17) DEFAULT NULL,
  `tipo_Cli` int(10) unsigned NOT NULL,
  `descripcion_Cli` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idCliente`,`nombre_Cli`,`direccion_Cli`,`telefono_Cli`,`nrc_Cli`,`nit_Cli`,`tipo_Cli`,`descripcion_Cli`) VALUES 
 (5,'Comercial EspaÃ±a II','1ra. Calle Poniente, Barrio El Centro, San Vicente','2345-9034','189367-0','1010-130298-198-2',0,'Porque cambio de sociedad'),
 (6,'ClÃ­nicas Unidas','8Âª Avenida Sur, Barrio San Francisco, San Vicente','2389-2178','548907-1','1010-250396-121-1',1,NULL),
 (7,'Tienda Aguilar','4Âª Avenida Oeste, Barrio El ParaÃ­so, San SebastiÃ¡n','2325-9034','189397-0','1010-130298-125-2',0,NULL),
 (8,'LibrerÃ­a Miriam','6Âª Avenida Norte, Barrio El Calvario, San Vicente','2358-1176','345568-9','1010-270899-293-1',1,NULL),
 (9,'Negocio Los Angeles SA de CV','7ma avenida Sur, B. Calvario, San Vicete','2367-6767','146434-9','1010-230798-321-1',0,NULL),
 (10,'Negocio Las Palmas','San Vicente, San Vicente','2365-4321','654321-8','2122-210879-212-1',0,NULL),
 (11,'Eduardo Emilio Abarca','5ta Avenida Sur, Bo. Santa Teresa, San SebastiÃ¡n, San Vicente','2458-6754','345874-0','1010-100393-520-0',0,NULL),
 (12,'Negocio las Gemelas','Calle Ãlvaro QuiÃ±ones de Osorio, San Vicente','2368-5437','455367-8','0614-290209-008-9',0,NULL);
INSERT INTO `cliente` (`idCliente`,`nombre_Cli`,`direccion_Cli`,`telefono_Cli`,`nrc_Cli`,`nit_Cli`,`tipo_Cli`,`descripcion_Cli`) VALUES 
 (13,'Banquetes Cristabel ','Calle Luis Alberto Aguilar, San Vicente ','2393-2622','285174-5','0614-220802-075-1',1,NULL),
 (14,'Juan Carlos PÃ©rez','1Âª Avenida Sur, Barrio San Juan de Dios, casa # 10, San Vicente ','7751-2831','547981-0','1010-210881-603-4',1,NULL),
 (15,'Ericka Zulma GonzÃ¡lez','Ingenio Jiboa, San Vicente','2313-6128','423759-1','1010-131186-201-2',1,NULL),
 (16,'PastelerÃ­a Los Principitos','Calle Dr. Francisco Paniagua, San Vicente ','7676-9662','844231-6','0614-210291-703-3',1,NULL),
 (17,'Alejandro Esteban Navarro ','4ta. Calle poniente, Avenida Crescencio Miranda, San Vicente ','7283-4107','483361-5','1010-121292-101-1',1,NULL),
 (18,'Sur Line Premium ','1ra. Avenida Sur, Bo. San Juan de Dios, San Vicente','2295-6137','719210-2','0614-245345-224-5',1,NULL),
 (19,'Big Pizza ','2Âª Calle Oriente, Avenida Crescencio Miranda, San Vicente ','2393-4093','225894-4','0614-100608-109-8',0,NULL),
 (20,'Farmacia Vicentina ','2Âª Avenida Sur, San Vicente ','2393-5954','384367-0','0614-150380-709-1',1,NULL);
INSERT INTO `cliente` (`idCliente`,`nombre_Cli`,`direccion_Cli`,`telefono_Cli`,`nrc_Cli`,`nit_Cli`,`tipo_Cli`,`descripcion_Cli`) VALUES 
 (21,'ElÃ­as Alberto Ruiz ',' 8Âª Avenida norte, Col. Santa Elena, pasaje #2, casa 22, San Vicente ','2393-6189','556971-9','1010-030587-104-4',1,NULL),
 (22,'Jonathan Alexis Osorio ','1a. Avenida Sur, pasaje # 1, Bo. El Calvario, San Vicente','2393-0874','226793-2','1010-270995-223-5',1,''),
 (23,'MarÃ¬a HernÃ ndez Canessa ','Bo. el Centro, San Esteban Catarina, San Vicente','2313-6767','789233-1','1010-210482-103-2',1,NULL),
 (24,'Tienda Rodil S.A de C.V.','3ra. calle Oriente, Colonia los Ã€ngeles, Apastepeque','2253-6432','887934-5','0614-170899-201-4',1,NULL),
 (25,'Taller Wilson S.A de C.V','3a. Avenida norte, Bo, San Jose, San Vicente','2319-0393','843102-1','0614-300997-108-9',1,NULL),
 (26,'Roger Saul FernÃ ndez','Verapaz, San Vicente','2314-6798','812264-3','1010-230789-705-6',1,NULL),
 (28,'Cliente Repuestos Vaquerano',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `idCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numFac_Com` int(10) unsigned NOT NULL,
  `fecha_Com` date DEFAULT NULL,
  `total_Com` float NOT NULL,
  `id_Proveedor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `FK_compra_Proveedor` (`id_Proveedor`),
  CONSTRAINT `FK_compra_Proveedor` FOREIGN KEY (`id_Proveedor`) REFERENCES `proveedor` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`idCompra`,`numFac_Com`,`fecha_Com`,`total_Com`,`id_Proveedor`) VALUES 
 (13,123,'2019-01-16',300.6,11),
 (14,157,'2019-01-02',243.6,19),
 (15,215,'2019-01-03',195.9,13),
 (16,310,'2019-01-05',77.4,7),
 (17,215,'2019-01-07',285,23),
 (18,122,'2019-01-09',243.75,12),
 (19,211,'2019-01-07',271.9,22),
 (20,301,'2019-01-10',55,16),
 (21,225,'2019-01-10',548.15,17),
 (22,199,'2019-01-11',436.5,9),
 (23,23,'2019-01-14',261.6,6),
 (24,2311,'2019-01-14',100,12),
 (25,235,'2019-01-14',250,19),
 (26,234,'2019-01-15',42,13);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;


--
-- Definition of table `detallecompra`
--

DROP TABLE IF EXISTS `detallecompra`;
CREATE TABLE `detallecompra` (
  `idDetalleCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad_DCom` int(10) unsigned NOT NULL,
  `precio_DCom` float NOT NULL,
  `id_Compra` int(10) unsigned NOT NULL,
  `id_Producto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idDetalleCompra`),
  KEY `FK_detalleCompra_Compra` (`id_Compra`),
  KEY `FK_detalleCompra_Producto` (`id_Producto`),
  CONSTRAINT `FK_detalleCompra_Compra` FOREIGN KEY (`id_Compra`) REFERENCES `compra` (`idCompra`),
  CONSTRAINT `FK_detalleCompra_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detallecompra`
--

/*!40000 ALTER TABLE `detallecompra` DISABLE KEYS */;
INSERT INTO `detallecompra` (`idDetalleCompra`,`cantidad_DCom`,`precio_DCom`,`id_Compra`,`id_Producto`) VALUES 
 (14,12,11.25,13,1),
 (15,12,13.8,13,13),
 (16,24,10.15,14,6),
 (17,24,0.35,15,14),
 (18,10,18.75,15,5),
 (19,12,6.45,16,15),
 (20,5,35,17,16),
 (21,10,11,17,1),
 (22,5,27.5,18,12),
 (23,5,21.25,18,10),
 (24,6,22.9,19,9),
 (25,10,13.45,19,11),
 (26,50,1.1,20,17),
 (27,15,11.75,21,4),
 (28,8,21.3,21,8),
 (29,10,20.15,21,18),
 (30,10,10.65,22,2),
 (31,40,5.25,22,20),
 (32,10,12,22,4),
 (33,12,11.3,23,1),
 (34,10,12.6,23,13),
 (35,10,10,24,6),
 (36,10,7.75,25,19),
 (37,5,34.5,25,16),
 (38,2,21,26,10);
/*!40000 ALTER TABLE `detallecompra` ENABLE KEYS */;


--
-- Definition of table `detallesdevoluciones`
--

DROP TABLE IF EXISTS `detallesdevoluciones`;
CREATE TABLE `detallesdevoluciones` (
  `idDetallesDev` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Devoluciones` int(10) unsigned NOT NULL,
  `id_DetalleCompra` int(10) unsigned NOT NULL,
  `cantidad_DDev` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idDetallesDev`),
  KEY `FK_detallesdevoluciones_1` (`id_Devoluciones`),
  KEY `FK_detallesdevoluciones_2` (`id_DetalleCompra`),
  CONSTRAINT `FK_detallesdevoluciones_1` FOREIGN KEY (`id_Devoluciones`) REFERENCES `devoluciones` (`idDevoluciones`),
  CONSTRAINT `FK_detallesdevoluciones_2` FOREIGN KEY (`id_DetalleCompra`) REFERENCES `detallecompra` (`idDetalleCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detallesdevoluciones`
--

/*!40000 ALTER TABLE `detallesdevoluciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallesdevoluciones` ENABLE KEYS */;


--
-- Definition of table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad_DVen` int(10) unsigned NOT NULL,
  `precio_DVen` float NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  `id_Producto` int(10) unsigned NOT NULL,
  `costo_DVen` float DEFAULT NULL,
  PRIMARY KEY (`idDetalleVenta`),
  KEY `FK_detalleVenta_Producto` (`id_Producto`),
  KEY `FK_detalleventa_Venta` (`id_Venta`),
  CONSTRAINT `FK_detalleVenta_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`idProducto`),
  CONSTRAINT `FK_detalleventa_Venta` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalleventa`
--

/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
INSERT INTO `detalleventa` (`idDetalleVenta`,`cantidad_DVen`,`precio_DVen`,`id_Venta`,`id_Producto`,`costo_DVen`) VALUES 
 (26,2,60.38,26,16,34.75),
 (27,2,17.5,27,6,10.1059),
 (28,1,17.5,28,6,10.1059),
 (29,2,16.81,29,1,11.1941),
 (30,1,21,30,4,11.85),
 (31,1,36.75,31,10,21.1786),
 (32,1,37.28,32,8,21.3),
 (33,1,17.5,33,6,10.1059),
 (34,2,9.19,34,20,5.25),
 (35,1,21,35,4,11.85);
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;


--
-- Definition of table `devoluciones`
--

DROP TABLE IF EXISTS `devoluciones`;
CREATE TABLE `devoluciones` (
  `idDevoluciones` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_Dev` date NOT NULL,
  `justificacion_Dev` varchar(45) NOT NULL,
  PRIMARY KEY (`idDevoluciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devoluciones`
--

/*!40000 ALTER TABLE `devoluciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `devoluciones` ENABLE KEYS */;


--
-- Definition of table `facturaconsumidor`
--

DROP TABLE IF EXISTS `facturaconsumidor`;
CREATE TABLE `facturaconsumidor` (
  `idFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_Fac` int(10) unsigned NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `FK_facturaconsumidor_1` (`id_Venta`),
  CONSTRAINT `FK_facturaconsumidor_1` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturaconsumidor`
--

/*!40000 ALTER TABLE `facturaconsumidor` DISABLE KEYS */;
INSERT INTO `facturaconsumidor` (`idFactura`,`numero_Fac`,`id_Venta`) VALUES 
 (17,100,26),
 (18,101,29),
 (19,102,31),
 (20,103,34);
/*!40000 ALTER TABLE `facturaconsumidor` ENABLE KEYS */;


--
-- Definition of table `facturacredito`
--

DROP TABLE IF EXISTS `facturacredito`;
CREATE TABLE `facturacredito` (
  `idFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_Fac` int(10) unsigned NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `FK_factura_Venta` (`id_Venta`),
  CONSTRAINT `FK_factura_Venta` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturacredito`
--

/*!40000 ALTER TABLE `facturacredito` DISABLE KEYS */;
INSERT INTO `facturacredito` (`idFactura`,`numero_Fac`,`id_Venta`) VALUES 
 (1,20,27),
 (2,21,28),
 (3,22,30),
 (4,23,33),
 (5,24,35);
/*!40000 ALTER TABLE `facturacredito` ENABLE KEYS */;


--
-- Definition of table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `idInventario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoMovimiento_Inv` int(10) unsigned NOT NULL,
  `existencias_Inv` int(10) unsigned NOT NULL,
  `precioActual_Inv` float NOT NULL,
  `cantidad_Inv` int(10) unsigned NOT NULL,
  `precio_Inv` float NOT NULL,
  `fechaMovimiento_Inv` date DEFAULT NULL,
  `nuevaExistencia_Inv` int(10) unsigned NOT NULL,
  `nuevoPrecio_Inv` float NOT NULL,
  `id_Producto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idInventario`),
  KEY `FK_inventario_Producto` (`id_Producto`),
  CONSTRAINT `FK_inventario_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--

/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`idInventario`,`tipoMovimiento_Inv`,`existencias_Inv`,`precioActual_Inv`,`cantidad_Inv`,`precio_Inv`,`fechaMovimiento_Inv`,`nuevaExistencia_Inv`,`nuevoPrecio_Inv`,`id_Producto`) VALUES 
 (39,0,0,0,12,11.25,'2019-01-16',12,11.25,1),
 (40,0,0,0,12,13.8,'2019-01-16',12,13.8,13),
 (41,0,0,0,24,10.15,'2019-01-02',24,10.15,6),
 (42,0,0,0,24,0.35,'2019-01-03',24,0.35,14),
 (43,0,0,0,10,18.75,'2019-01-03',10,18.75,5),
 (44,0,0,0,12,6.45,'2019-01-05',12,6.45,15),
 (45,0,0,0,5,35,'2019-01-07',5,35,16),
 (46,0,12,11.25,10,11,'2019-01-07',22,11.1364,1),
 (47,0,0,0,5,27.5,'2019-01-09',5,27.5,12),
 (48,0,0,0,5,21.25,'2019-01-09',5,21.25,10),
 (49,0,0,0,6,22.9,'2019-01-07',6,22.9,9),
 (50,0,0,0,10,13.45,'2019-01-07',10,13.45,11),
 (51,0,0,0,50,1.1,'2019-01-10',50,1.1,17),
 (52,0,0,0,15,11.75,'2019-01-10',15,11.75,4),
 (53,0,0,0,8,21.3,'2019-01-10',8,21.3,8),
 (54,0,0,0,10,20.15,'2019-01-10',10,20.15,18),
 (55,0,0,0,10,10.65,'2019-01-11',10,10.65,2),
 (56,0,0,0,40,5.25,'2019-01-11',40,5.25,20),
 (57,0,15,11.75,10,12,'2019-01-11',25,11.85,4);
INSERT INTO `inventario` (`idInventario`,`tipoMovimiento_Inv`,`existencias_Inv`,`precioActual_Inv`,`cantidad_Inv`,`precio_Inv`,`fechaMovimiento_Inv`,`nuevaExistencia_Inv`,`nuevoPrecio_Inv`,`id_Producto`) VALUES 
 (58,0,22,11.1364,12,11.3,'2019-01-14',34,11.1941,1),
 (59,0,12,13.8,10,12.6,'2019-01-14',22,13.2545,13),
 (60,0,24,10.15,10,10,'2019-01-14',34,10.1059,6),
 (61,0,0,0,10,7.75,'2019-01-14',10,7.75,19),
 (62,0,5,35,5,34.5,'2019-01-14',10,34.75,16),
 (63,0,5,21.25,2,21,'2019-01-15',7,21.1786,10),
 (64,1,10,34.75,2,34.75,'2019-01-16',8,34.75,16),
 (65,1,34,10.1059,2,10.1059,'2019-01-16',32,10.1059,6),
 (66,1,32,10.1059,1,10.1059,'2019-01-16',31,10.1059,6),
 (67,1,34,11.1941,2,11.1941,'2019-01-16',32,11.1941,1),
 (68,1,25,11.85,1,11.85,'2019-01-16',24,11.85,4),
 (69,1,7,21.1786,1,21.1786,'2019-01-16',6,21.1786,10),
 (70,1,8,21.3,1,21.3,'2019-01-16',7,21.3,8),
 (71,1,31,10.1059,1,10.1059,'2019-01-16',30,10.1059,6),
 (72,1,40,5.25,2,5.25,'2019-01-16',38,5.25,20),
 (73,1,24,11.85,1,11.85,'2019-01-16',23,11.85,4);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;


--
-- Definition of table `numerofactura`
--

DROP TABLE IF EXISTS `numerofactura`;
CREATE TABLE `numerofactura` (
  `idnumeroFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroInicial_numF` int(10) unsigned NOT NULL,
  `tipo_numF` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idnumeroFactura`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numerofactura`
--

/*!40000 ALTER TABLE `numerofactura` DISABLE KEYS */;
INSERT INTO `numerofactura` (`idnumeroFactura`,`numeroInicial_numF`,`tipo_numF`) VALUES 
 (5,20,1),
 (6,100,2);
/*!40000 ALTER TABLE `numerofactura` ENABLE KEYS */;


--
-- Definition of table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idProducto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_Prod` varchar(45) NOT NULL,
  `categoria_Prod` int(10) unsigned NOT NULL,
  `marca_Prod` varchar(45) NOT NULL,
  `descripcion_Prod` varchar(50) NOT NULL,
  `modeloVehiculo_Prod` varchar(45) NOT NULL,
  `anioVehiculo_Prod` int(10) unsigned NOT NULL,
  `codigo_Prod` varchar(7) NOT NULL,
  `tipo_Prod` int(10) unsigned NOT NULL,
  `stock_Prod` int(10) unsigned DEFAULT NULL,
  `precio_Prod` float DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`idProducto`,`nombre_Prod`,`categoria_Prod`,`marca_Prod`,`descripcion_Prod`,`modeloVehiculo_Prod`,`anioVehiculo_Prod`,`codigo_Prod`,`tipo_Prod`,`stock_Prod`,`precio_Prod`) VALUES 
 (1,'Amortiguador',1,'ELECTRAN','5 pulgadas, cromado','Ford - Ranger',2000,'AM00001',1,10,19.775),
 (2,'Crico',12,'ACEDELCO','Color gris','',0,'UN00001',1,3,18.6375),
 (3,'Pastilla de frenos',5,'ACEDELCO','Ninguna','Toyoya-Hilux',2000,'EN00001',1,2,0),
 (4,'Bateria 9A',12,'VALVOLINE','Ninguna','',0,'UN00002',1,3,21),
 (5,'Faro delantero',4,'BEHR','Ninguna','Land Cruiser Coronella',2018,'EL00001',1,3,32.8125),
 (6,'Bujia',2,'ELECTRAN','De alta calidad','Honda-CRV',2010,'BU00001',1,5,17.5),
 (7,'Llanta',10,'BRM',' Rin 14, de estrella','Ford - Fiesta',2018,'SU00001',1,4,0),
 (8,'Llanta',10,'Kenda','Ultima generacion, rin 16','Honda - Civic',2015,'SU00002',1,6,37.275),
 (9,'Radiador',8,'Firestone','Motor 25','Honda Accord',2017,'MO00001',1,3,40.075),
 (10,'Cuerpo del Acelerador',8,'Bridgestone','Motor radial','Honda Ascot Innova',2010,'MO00002',1,10,36.75),
 (11,'Carburador',8,'GoodYear','Combustion externa','NISSAN ALTIMA',2015,'MO00003',1,2,23.5375);
INSERT INTO `producto` (`idProducto`,`nombre_Prod`,`categoria_Prod`,`marca_Prod`,`descripcion_Prod`,`modeloVehiculo_Prod`,`anioVehiculo_Prod`,`codigo_Prod`,`tipo_Prod`,`stock_Prod`,`precio_Prod`) VALUES 
 (12,'Alternador',8,'Michelin','Combustion interna','ISUZU FORWARD JUSTON',2016,'MO00004',1,2,48.125),
 (13,'Amortiguador x',1,'BRM','MÃ¡s economico','Honda-CRV',2003,'AM00002',1,4,22.05),
 (14,'Bombilla para luces de frenos',4,'Hella','Tipo de lampara: W2/5W, Tension 12V','Toyota-Land Cruiser Prado',2005,'EL00002',1,10,0.6125),
 (15,'Termostato',5,'Gates','Refrigerante, temperatura de abertura 82C','Scion-xB',2010,'EN00002',1,3,11.2875),
 (16,'Filtro de aire',6,'Izusu-Impulse Japanpart','Altura 61mm, diametro exterior 257.2mm','Izusu-Impulse Coupe',2011,'FI00001',1,4,60.375),
 (17,'Cojinete de Empuje',11,'Sachs','Cojinete de desembrague','Honda-CRV',2000,'TR00001',1,5,1.925),
 (18,'Llanta',10,'Firestone','Numero de rin13','Chevrolet - S10',2009,'SU00003',1,3,35.2625),
 (19,'Juego de alfonbrilla de suelo',12,'Polgum','lado de montaje posterior, color negro','',0,'UN00003',1,4,13.5625),
 (20,'Aceite para motor',12,'Castrol','Viscosidad GTX 20W-50.','',0,'UN00004',1,12,9.1875);
INSERT INTO `producto` (`idProducto`,`nombre_Prod`,`categoria_Prod`,`marca_Prod`,`descripcion_Prod`,`modeloVehiculo_Prod`,`anioVehiculo_Prod`,`codigo_Prod`,`tipo_Prod`,`stock_Prod`,`precio_Prod`) VALUES 
 (21,'Disco de freno',7,'ABG','Color azul','Pick up Nissan TD27',2010,'FR00001',1,3,0),
 (22,'Bomba central de frenos',7,'NFR','20 Lb','GMC Fordwar',2015,'FR00002',1,2,0),
 (23,'Pastilla de freno',7,'ARG','Ninguna','HYUNDAI ',2012,'FR00003',1,5,0),
 (24,'Sensor de presion',9,'SS','Kit de sensores de reversa','Nissan Sentra',2009,'SE00001',1,4,0),
 (25,'Sensor de kilometros',9,'SS','Alto calibre','Toyota Hilux',2007,'SE00002',1,3,0),
 (26,'Disco de friccion',11,'Eagle Plymouth','Columna mejorada','KIA Picanto',2011,'TR00002',1,2,0),
 (27,'Filtro de aire',6,'Bosch','2.0 TDI 130 kw','Kia Carens',2015,'FI00002',1,2,0),
 (28,'Juego de cables',2,'Delphi','Color amarillo','AUDI A6 C7 Berlina',2014,'BU00002',1,2,0),
 (29,'Bujias',2,'NGK','1.6L','Mazda Protege',2010,'BU00003',1,4,0);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Definition of table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `idProveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_Prov` varchar(50) NOT NULL,
  `correo_Prov` varchar(50) NOT NULL,
  `telefono_Prov` varchar(10) NOT NULL,
  `direccion_Prov` varchar(100) NOT NULL,
  `nombreResp_Prov` varchar(50) NOT NULL,
  `telefonoResp_Prov` varchar(10) NOT NULL,
  `tipo_Prov` int(10) unsigned NOT NULL,
  `descripcion_Prov` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`idProveedor`,`nombre_Prov`,`correo_Prov`,`telefono_Prov`,`direccion_Prov`,`nombreResp_Prov`,`telefonoResp_Prov`,`tipo_Prov`,`descripcion_Prov`) VALUES 
 (2,'Rodasa S.A de C.V','Rodasa91@hotmail.com','2345-9130','Colonia santa fe 35 Av sur #12','Sonia Daniela PÃ©rez LÃ³pez','7655-9130',0,NULL),
 (3,'Napa Auto Parts','naparepuestos@hotmail.com','2357-8291','25 Av LotificaciÃ³n 750 ex edificio record','Lucas Antonio Rivas Jovel','7588-9626',1,NULL),
 (4,'La super corona','Super_corona52@gmail.com','2301-9375','Colonia bolÃ­var km 4 carretera troncal del norte','Blanca Nohemy Maradiaga','7918-4243',0,NULL),
 (5,'Rodriguez Rayam S.A de C.V','rodriguez_Rayam@gmail.com','2299-7125','Bulevar constituciÃ³n colonia Toluca #4','JosuÃ© Ricardo Rivas Rosa','7230-4214',0,''),
 (6,'Impresa Repuestos','impresarepuestos@gmail.com','2210-0854','29 calle poniente 7Â° Av norte # 8','Bryan Manuel GuillÃ©n Aguirre','6301-2145',1,''),
 (7,'Gemelas AutoParts','autoparts@gmail.com','2211-7632','Calle Ferrocarril Col Cucumacayan No 13','Dinora Esmeralda Abarca Solis','6565-6565',1,''),
 (8,'Mario Auto Parts','marioautoparts@gmail.com','2253-3109','5 avenida norte numero 1719, San Salvador CP 1101','Cristian Alberto Jovel Arias','7834-1726',0,NULL);
INSERT INTO `proveedor` (`idProveedor`,`nombre_Prov`,`correo_Prov`,`telefono_Prov`,`direccion_Prov`,`nombreResp_Prov`,`telefonoResp_Prov`,`tipo_Prov`,`descripcion_Prov`) VALUES 
 (9,'Repuestos Izalco','repuestosizalco@hotmail.com','2270-5401','Col. America #1798 calle a San Marcos','Rosario de la Cruz Lara ','6326-1828',1,NULL),
 (10,'Chambita Auto Parts','chambitarepuestos@hotmail.com','2209-5193','29 Calle Oriente San Salvador','Daniel Antonio Aguilar','7824-3364',0,NULL),
 (11,'Auto Repuestos Ramos ','repuestosramos.2012@gmail.com','2235-5555','29 calle oriente y 12 avenida norte San Salvador','Claudia Marleni Jovel Guillen','7246-1826',1,NULL),
 (12,'Import Cars SA de CV','importcars2011@hotmail.com','2339-9500','No.1027 calle poniente San Salvador','Claudia Ligia Maravilla Maradiaga','7342-5252',1,NULL),
 (13,'El Americano SA de CV','americanorepuestos@hotmail.com','2235-2039','27 calle poniente y primera avenida norte #209 San Salvador','Dinora Esmeralda Abarca Pereyra','7343-6283',1,NULL),
 (14,'Part Plus','partplusrepuestos@gmail.com','2205-7878','29 calle poniente entre 23 y 25 av, norte pasaje Laico San Salvador','Vidal Antonio Carrillo','7435-2636',1,NULL);
INSERT INTO `proveedor` (`idProveedor`,`nombre_Prov`,`correo_Prov`,`telefono_Prov`,`direccion_Prov`,`nombreResp_Prov`,`telefonoResp_Prov`,`tipo_Prov`,`descripcion_Prov`) VALUES 
 (15,'Pavito Auto Parts','pavitorepuestos@gmail.com','2225-9841','31 calle poniente San Salvador','Jaime Osmany Rivas Hernandez','6341-2765',0,NULL),
 (16,'La Casa del Repuesto','lacasadelrepuesto@gmail.com','2235-1987','Novena calle oriente #933 San Salvador','Lilibeth Lorena Maravilla Carranza','7643-9086',1,NULL),
 (17,'TOKYO Auto Parts','tokyoautoparts@gmail.com','2235-7777','San Savador 29 calle poniente #1117','Antonio Alexander Jovel Guillen','7345-6789',1,NULL),
 (18,'Auto Repuestos Hasbun','hasbunrepuesto@hotmail.com','2278-4488','Calle Las Flores avenida el Boqueron ciudad Merliot','Jacquelin Estefany Gonzalez Gonzalez','6223-4567',0,NULL),
 (19,'Econoparts','econoparts@gmail.com','2505-9595','Av. Prusia y carretera de oro San Salvador','Juan Pablo Hernandez Castillo','7830-2836',1,NULL),
 (20,'Super Repuestos La Garita','superrepuestos@gmail.com','2239-5100','Calle concepccion #1001 San Salvador','Rafael Armando Maradona','6123-4567',1,NULL),
 (21,'Super Repuestos San Miguelito','repuestosmiguelitos@gmail.com','2234-5600','Novena calle poniente y 17 av. norte #110 San Salvador','Sonia Daniela Perez Vidal','7245-8008',1,NULL);
INSERT INTO `proveedor` (`idProveedor`,`nombre_Prov`,`correo_Prov`,`telefono_Prov`,`direccion_Prov`,`nombreResp_Prov`,`telefonoResp_Prov`,`tipo_Prov`,`descripcion_Prov`) VALUES 
 (22,'JAP Motors SA de CV','japmotorsrepuestos@hotmail.com','2348-5137','Septima calle poniente San Salvador','Rogelio Omar Melara Lainez','7812-3456',1,NULL),
 (23,'Importaciones Pleites SA de CV','pleitesrepuestos@hotmail.com','2235-5545','Octava calle Sur y 12 av. norte San Salvador','Sebastian de Jesus Guillen Arias','7254-5765',1,NULL),
 (24,'Mega Auto Parts','megarepuestos@hotmail.com','2345-6336','25 calle poniente barrio nuevo Santa Ana','Mauricio Enrique Quintanilla Maravilla','7345-6723',1,NULL);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_Usu` varchar(8) NOT NULL,
  `contrasena_Usu` tinytext,
  `nombre_Usu` varchar(50) NOT NULL,
  `correo_Usu` varchar(50) NOT NULL,
  `direccion_Usu` varchar(100) NOT NULL,
  `telefono_Usu` varchar(10) NOT NULL,
  `dui_Usu` varchar(10) NOT NULL,
  `tipo_Usu` int(10) unsigned NOT NULL,
  `estado_Usu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`,`usuario_Usu`,`contrasena_Usu`,`nombre_Usu`,`correo_Usu`,`direccion_Usu`,`telefono_Usu`,`dui_Usu`,`tipo_Usu`,`estado_Usu`) VALUES 
 (62,'grecia','10bab2c711bca9ace3036044b0efcc8a','Grecia Melina Hernandez Castillo','grecihdez@gmail.com','Barrio El Santuario, San Vicente, San Vicente','7694-8573','54389107-1',0,1),
 (63,'alegonzy','13742e0b0b56b800856a3c1e3851d169','Joselyn Alexandra Gonzalez Gonzalez','alegonzalez@gmail.com','Ingenio Jiboa, San Vicente, San Vicente','2365-4512','32771628-1',1,1),
 (64,'brenda','e5e9b41c8f1ad39ffb22df4a7aa7d876','Brenda del Carmen Guillen Maradiaga','brendacgmaradiaga@gmail.com','Barrio El Transito, San Sebastian, San Vicente','7625-4162','23787192-1',1,1),
 (65,'abigail','37f299007792a4e9dec1481bca604016','Roxana Abigail Majano Alvarado','roxanamajano@gmail.com','San Salvador, San Salvador','7634-5621','35261928-3',1,1),
 (66,'andrea','1c42f9c1ca2f65441465b43cd9339d6c','Andrea Stefany Alegria Fuentes','alealegria@gmail.com','San Carlos Lempa, Tecoluca, San Vicente','7638-2912','45882916-2',1,1),
 (67,'centeno','73b5498b79df94cf62d5c280874896cb','Jonathan Alexander Centeno Manzanares','jonnycenteno@gmail.com','San Nicolas Lempa, Tecoluca, San Vicente','7635-3524','42817152-1',1,1);
INSERT INTO `usuario` (`idUsuario`,`usuario_Usu`,`contrasena_Usu`,`nombre_Usu`,`correo_Usu`,`direccion_Usu`,`telefono_Usu`,`dui_Usu`,`tipo_Usu`,`estado_Usu`) VALUES 
 (68,'jenny','a37b2a637d2541a600d707648460397e','Jenny Karina Perez Flores','jennyperez@gmail.com','Santa Cruz Porrillo, Tecoluca, San Vicente','6123-4562','34212322-1',1,1),
 (69,'william','fd820a2b4461bddd116c1518bc4b0f77','William Ernesto Maravilla Gutierrez','william14@gmail.com','williamernesto@gmail.com','7632-4122','23871524-1',1,1),
 (70,'francis','d0ab7fe6c314f4fe5b6c18a0157c96b4','Francisco Ariel Hernandez Solis','franciscohernandez@gmail.com','San Marcos Lempa, Jiquilisco, Usulutan','7820-3122','54728191-2',1,1),
 (71,'dominic','850ab44cce67bf2c5457c6dca6181d60','Dominic Omar Cortez Ayala','dominiccortez@gmail.com','La Sabana, Tecoluca, San Vicente','7547-9301','45271921-2',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `idVenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_Ven` date DEFAULT NULL,
  `total_Ven` float NOT NULL,
  `id_Cliente` int(10) unsigned NOT NULL,
  `estado_Ven` int(10) unsigned DEFAULT NULL,
  `comentarioanular_Ven` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `FK_venta_Cliente` (`id_Cliente`),
  CONSTRAINT `FK_venta_Cliente` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`idVenta`,`fecha_Ven`,`total_Ven`,`id_Cliente`,`estado_Ven`,`comentarioanular_Ven`) VALUES 
 (26,'2019-01-16',120.76,28,0,NULL),
 (27,'2019-01-16',35,20,0,NULL),
 (28,'2019-01-16',17.5,21,0,NULL),
 (29,'2019-01-16',33.62,28,0,NULL),
 (30,'2019-01-16',21,6,0,NULL),
 (31,'2019-01-16',36.75,28,0,NULL),
 (32,'2019-01-16',37.28,28,0,NULL),
 (33,'2019-01-16',17.5,20,0,NULL),
 (34,'2019-01-16',18.38,28,0,NULL),
 (35,'2019-01-16',21,6,0,NULL);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
