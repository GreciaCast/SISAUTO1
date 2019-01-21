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
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitacora`
--

/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` (`idBitacora`,`usuario_Usu`,`sesionInicio`,`actividad`,`tipo_Bico`) VALUES 
 (183,'grecia','2019-01-08 16:04:45','IniciÃ³ de sesiÃ³n',NULL),
 (184,'grecia','2019-01-09 21:12:23','RegistrÃ³ un usuario',NULL),
 (185,'grecia','2019-01-09 21:12:34','CerrÃ³ sesiÃ³n',NULL),
 (186,'tonny22','2019-01-09 21:12:45','IniciÃ³ sesiÃ³n',NULL),
 (187,'tonny22','2019-01-09 21:13:37','CerrÃ³ sesiÃ³n',NULL),
 (188,'grecia','2019-01-10 22:17:01','IniciÃ³ sesiÃ³n',NULL),
 (189,'grecia','2019-01-10 23:27:38','GuardÃ³ un producto',NULL),
 (190,'grecia','2019-01-10 23:32:10','EditÃ³ un producto',NULL),
 (191,'grecia','2019-01-10 23:32:57','GuardÃ³ una compra',NULL),
 (192,'grecia','2019-01-10 23:37:31','IniciÃ³ sesiÃ³n',NULL),
 (193,'grecia','2019-01-11 17:17:20','IniciÃ³ sesiÃ³n',NULL),
 (194,'grecia','2019-01-11 17:23:51','GuardÃ³ una compra',NULL),
 (195,'grecia','2019-01-11 20:58:09','EditÃ³ un producto',NULL),
 (196,'grecia','2019-01-11 21:06:51','IniciÃ³ sesiÃ³n',NULL),
 (197,'grecia','2019-01-11 22:21:02','IniciÃ³ sesiÃ³n',NULL);
INSERT INTO `bitacora` (`idBitacora`,`usuario_Usu`,`sesionInicio`,`actividad`,`tipo_Bico`) VALUES 
 (198,'grecia','2019-01-12 00:44:49','GuardÃ³ una compra',NULL),
 (199,'grecia','2019-01-12 00:46:18','IniciÃ³ nÃºmeros de factura',NULL),
 (200,'grecia','2019-01-12 00:47:42','GuardÃ³ una venta',NULL),
 (201,'grecia','2019-01-12 15:02:50','IniciÃ³ sesiÃ³n',NULL);
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
 (21,'ElÃ­as Alberto Ruiz ',' 8Âª Avenida norte, Col. Santa Elena, pasaje #2, casa 22, San Vicente ','2393-6189','556971-9','1010-030587-104-4',0,NULL),
 (22,'Jonathan Alexis Osorio ','1a. Avenida Sur, pasaje # 1, Bo. El Calvario, San Vicente','2393-0874','226793-2','1010-270995-223-5',1,''),
 (23,'MarÃ¬a HernÃ ndez Canessa ','Bo. el Centro, San Esteban Catarina, San Vicente','2313-6767','789233-1','1010-210482-103-2',1,NULL),
 (24,'Tienda Rodil S.A de C.V.','3ra. calle Oriente, Colonia los Ã€ngeles, Apastepeque','2253-6432','887934-5','0614-170899-201-4',1,NULL),
 (25,'Taller Wilson S.A de C.V','3a. Avenida norte, Bo, San Jose, San Vicente','2319-0393','843102-1','0614-300997-108-9',1,NULL),
 (26,'Roger Saul FernÃ ndez','Verapaz, San Vicente','2314-6798','812264-3','1010-230789-705-6',1,NULL),
 (27,'Brenda Blanca Maradiaga','Sapo Ronco, San Sebastian, San Vicente','2345-5642','456122-2','3456-718818-199-9',1,NULL),
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`idCompra`,`numFac_Com`,`fecha_Com`,`total_Com`,`id_Proveedor`) VALUES 
 (1,123,'2019-01-10',24.46,19),
 (2,777,'2019-01-11',84,11),
 (3,12,'2019-01-12',23.5,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detallecompra`
--

/*!40000 ALTER TABLE `detallecompra` DISABLE KEYS */;
INSERT INTO `detallecompra` (`idDetalleCompra`,`cantidad_DCom`,`precio_DCom`,`id_Compra`,`id_Producto`) VALUES 
 (1,2,12.23,1,25),
 (2,8,10.5,2,17),
 (3,10,2.35,3,25);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalleventa`
--

/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
INSERT INTO `detalleventa` (`idDetalleVenta`,`cantidad_DVen`,`precio_DVen`,`id_Venta`,`id_Producto`,`costo_DVen`) VALUES 
 (1,4,4.11,1,25,3.99667);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturaconsumidor`
--

/*!40000 ALTER TABLE `facturaconsumidor` DISABLE KEYS */;
INSERT INTO `facturaconsumidor` (`idFactura`,`numero_Fac`,`id_Venta`) VALUES 
 (1,122,1);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturacredito`
--

/*!40000 ALTER TABLE `facturacredito` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--

/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`idInventario`,`tipoMovimiento_Inv`,`existencias_Inv`,`precioActual_Inv`,`cantidad_Inv`,`precio_Inv`,`fechaMovimiento_Inv`,`nuevaExistencia_Inv`,`nuevoPrecio_Inv`,`id_Producto`) VALUES 
 (1,0,0,0,2,12.23,'2019-01-10',2,12.23,25),
 (2,0,0,0,8,10.5,'2019-01-11',8,10.5,17),
 (3,0,2,12.23,10,2.35,'2019-01-12',12,3.99667,25),
 (4,1,12,3.99667,4,3.99667,'2019-01-12',8,3.99667,25);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numerofactura`
--

/*!40000 ALTER TABLE `numerofactura` DISABLE KEYS */;
INSERT INTO `numerofactura` (`idnumeroFactura`,`numeroInicial_numF`,`tipo_numF`) VALUES 
 (1,10,1),
 (2,122,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`idProducto`,`nombre_Prod`,`categoria_Prod`,`marca_Prod`,`descripcion_Prod`,`modeloVehiculo_Prod`,`anioVehiculo_Prod`,`codigo_Prod`,`tipo_Prod`,`stock_Prod`,`precio_Prod`) VALUES 
 (1,'Amortiguador x',1,'BRM','MÃ¡s economico','Honda-CRV',2012,'00001',1,4,0),
 (2,'Crico',12,'ACEDELCO','Color gris','',0,'00002',1,3,0),
 (3,'Pastilla de frenos',5,'ACEDELCO','Ninguna','Toyoya-Hilux',2000,'00003',1,2,0),
 (4,'Bateria 9A',12,'VALVOLINE','Ninguna','',0,'00004',1,3,0),
 (5,'Faro delantero',4,'BEHR','Ninguna','Land Cruiser Coronella',2018,'00005',1,3,0),
 (6,'Bujia',2,'ELECTRAN','De alta calidad','Honda-CRV',2010,'00006',1,5,0),
 (7,'Llanta',10,'BRM','Llantas','Ford - Fiesta',2018,'00007',1,4,0),
 (8,'Llanta',10,'Kenda','Ultima generacion','Honda - Civic',2015,'00008',1,6,0),
 (9,'Radiador',8,'Firestone','Motor 25','Honda Accord',2017,'00009',1,3,0),
 (10,'Cuerpo del Acelerador',8,'Bridgestone','Motor radial','Honda Ascot Innova',2010,'00010',1,10,0),
 (11,'Carburador',8,'GoodYear','Combustion externa','NISSAN ALTIMA',2015,'00011',1,2,0),
 (12,'Alternador',8,'Michelin','Combustion interna','ISUZU FORWARD JUSTON',2016,'00012',1,2,0);
INSERT INTO `producto` (`idProducto`,`nombre_Prod`,`categoria_Prod`,`marca_Prod`,`descripcion_Prod`,`modeloVehiculo_Prod`,`anioVehiculo_Prod`,`codigo_Prod`,`tipo_Prod`,`stock_Prod`,`precio_Prod`) VALUES 
 (13,'Amortiguador x',1,'BRM','MÃ¡s economico','Honda-CRV',2003,'00013',1,4,0),
 (14,'Bombilla para luces de frenos',4,'Hella','Tipo de lampara: W2/5W, Tension 12V','Toyota-Land Cruiser Prado',2005,'00014',1,10,0),
 (15,'Termostato',5,'Gates','Refrigerante, temperatura de abertura 82C','Scion-xB',2010,'00015',1,3,0),
 (16,'Filtro de aire',6,'Izusu-Impulse Japanpart','Altura 61mm, diametro exterior 257.2mm','Izusu-Impulse Coupe',2011,'00016',1,4,0),
 (17,'Cojinete de Empuje',11,'Sachs','Cojinete de desembrague','Honda-CRV',2000,'00017',1,5,18.375),
 (18,'Juego de llanta',11,'Firestone','Numero de rin13','Chevrolet - S10',2009,'00018',1,3,0),
 (19,'Juego de alfonbrilla de suelo',12,'Polgum','lado de montaje posterior, color negro','',0,'00019',1,4,0),
 (20,'Aceite para motor',12,'Castrol','Viscosidad GTX 20W-50.','',0,'00020',1,12,0),
 (24,'Grecia',4,'Melina','Castilo','Hernandez',2019,'00021',1,15,0);
INSERT INTO `producto` (`idProducto`,`nombre_Prod`,`categoria_Prod`,`marca_Prod`,`descripcion_Prod`,`modeloVehiculo_Prod`,`anioVehiculo_Prod`,`codigo_Prod`,`tipo_Prod`,`stock_Prod`,`precio_Prod`) VALUES 
 (25,'AMORTUGUADOR XC',1,'GOLD','ALTO CALIBRE','NISSAN FRONTIER',2001,'AM00003',1,3,4.1125);
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`,`usuario_Usu`,`contrasena_Usu`,`nombre_Usu`,`correo_Usu`,`direccion_Usu`,`telefono_Usu`,`dui_Usu`,`tipo_Usu`,`estado_Usu`) VALUES 
 (62,'grecia','10bab2c711bca9ace3036044b0efcc8a','Grecia Melina Hernandez Castillo','grecihdez@gmail.com','Barrio El Santuario, San Vicente, San Vicente','7694-8573','54389107-1',0,1),
 (70,'katita','c066dd182b15f86dd200d4dfde289d91','Katy Briseyda Hernandez Castillo','katybris@gmail.com','San Nicolas Lempa, Tecoluca, San Vicente','2342-1122','23399181-7',1,1),
 (73,'lisbeth','64da72c38be98ef0fbaac9f7a08a3937','Lisbeth Eunice Reyes Melgar','lis@gmail.com','San Marcos Lempa, Tecoluca, San Vicente','6110-2512','23654431-2',1,1),
 (74,'tonny22','10304c1dd517a5e25fa4b15b5f1791e2','Juan Antonio Bautista Perez','tonny.perez22@gmai.com','Ilobasco, CabaÃ±as','7904-2186','37189212-2',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`idVenta`,`fecha_Ven`,`total_Ven`,`id_Cliente`,`estado_Ven`,`comentarioanular_Ven`) VALUES 
 (1,'2019-01-12',16.44,28,NULL,NULL);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
