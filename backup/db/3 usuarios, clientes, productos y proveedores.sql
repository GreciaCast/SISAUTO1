SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS bitacora CASCADE;

CREATE TABLE `bitacora` (
  `idBitacora` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_Usu` varchar(8) DEFAULT NULL,
  `sesionInicio` datetime DEFAULT NULL,
  `actividad` varchar(50) DEFAULT NULL,
  `tipo_Bico` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`idBitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=latin1;

INSERT INTO bitacora VALUES("271","grecia","2019-01-17 01:46:27","Registró un usuario","");
INSERT INTO bitacora VALUES("272","grecia","2019-01-17 01:48:06","Registró un usuario","");


DROP TABLE IF EXISTS cliente CASCADE;

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

INSERT INTO cliente VALUES("5","Comercial España II","1ra. Calle Poniente, Barrio El Centro, San Vicente","2345-9034","189367-0","1010-130298-198-2","0","Porque cambio de sociedad");
INSERT INTO cliente VALUES("6","Clínicas Unidas","8ª Avenida Sur, Barrio San Francisco, San Vicente","2389-2178","548907-1","1010-250396-121-1","1","");
INSERT INTO cliente VALUES("7","Tienda Aguilar","4ª Avenida Oeste, Barrio El Paraíso, San Sebastián","2325-9034","189397-0","1010-130298-125-2","0","");
INSERT INTO cliente VALUES("8","Librería Miriam","6ª Avenida Norte, Barrio El Calvario, San Vicente","2358-1176","345568-9","1010-270899-293-1","1","");
INSERT INTO cliente VALUES("9","Negocio Los Angeles SA de CV","7ma avenida Sur, B. Calvario, San Vicete","2367-6767","146434-9","1010-230798-321-1","0","");
INSERT INTO cliente VALUES("10","Negocio Las Palmas","San Vicente, San Vicente","2365-4321","654321-8","2122-210879-212-1","0","");
INSERT INTO cliente VALUES("11","Eduardo Emilio Abarca","5ta Avenida Sur, Bo. Santa Teresa, San Sebastián, San Vicente","2458-6754","345874-0","1010-100393-520-0","0","");
INSERT INTO cliente VALUES("12","Negocio las Gemelas","Calle Álvaro Quiñones de Osorio, San Vicente","2368-5437","455367-8","0614-290209-008-9","0","");
INSERT INTO cliente VALUES("13","Banquetes Cristabel ","Calle Luis Alberto Aguilar, San Vicente ","2393-2622","285174-5","0614-220802-075-1","1","");
INSERT INTO cliente VALUES("14","Juan Carlos Pérez","1ª Avenida Sur, Barrio San Juan de Dios, casa # 10, San Vicente ","7751-2831","547981-0","1010-210881-603-4","1","");
INSERT INTO cliente VALUES("15","Ericka Zulma González","Ingenio Jiboa, San Vicente","2313-6128","423759-1","1010-131186-201-2","1","");
INSERT INTO cliente VALUES("16","Pastelería Los Principitos","Calle Dr. Francisco Paniagua, San Vicente ","7676-9662","844231-6","0614-210291-703-3","1","");
INSERT INTO cliente VALUES("17","Alejandro Esteban Navarro ","4ta. Calle poniente, Avenida Crescencio Miranda, San Vicente ","7283-4107","483361-5","1010-121292-101-1","1","");
INSERT INTO cliente VALUES("18","Sur Line Premium ","1ra. Avenida Sur, Bo. San Juan de Dios, San Vicente","2295-6137","719210-2","0614-245345-224-5","1","");
INSERT INTO cliente VALUES("19","Big Pizza ","2ª Calle Oriente, Avenida Crescencio Miranda, San Vicente ","2393-4093","225894-4","0614-100608-109-8","0","");
INSERT INTO cliente VALUES("20","Farmacia Vicentina ","2ª Avenida Sur, San Vicente ","2393-5954","384367-0","0614-150380-709-1","1","");
INSERT INTO cliente VALUES("21","Elías Alberto Ruiz "," 8ª Avenida norte, Col. Santa Elena, pasaje #2, casa 22, San Vicente ","2393-6189","556971-9","1010-030587-104-4","1","");
INSERT INTO cliente VALUES("22","Jonathan Alexis Osorio ","1a. Avenida Sur, pasaje # 1, Bo. El Calvario, San Vicente","2393-0874","226793-2","1010-270995-223-5","1","");
INSERT INTO cliente VALUES("23","Marìa Hernàndez Canessa ","Bo. el Centro, San Esteban Catarina, San Vicente","2313-6767","789233-1","1010-210482-103-2","1","");
INSERT INTO cliente VALUES("24","Tienda Rodil S.A de C.V.","3ra. calle Oriente, Colonia los Àngeles, Apastepeque","2253-6432","887934-5","0614-170899-201-4","1","");
INSERT INTO cliente VALUES("25","Taller Wilson S.A de C.V","3a. Avenida norte, Bo, San Jose, San Vicente","2319-0393","843102-1","0614-300997-108-9","1","");
INSERT INTO cliente VALUES("26","Roger Saul Fernàndez","Verapaz, San Vicente","2314-6798","812264-3","1010-230789-705-6","1","");
INSERT INTO cliente VALUES("27","Brenda Blanca Maradiaga","Sapo Ronco, San Sebastian, San Vicente","2345-5642","456122-2","3456-718818-199-9","1","");
INSERT INTO cliente VALUES("28","Cliente Repuestos Vaquerano","","","","","1","");


DROP TABLE IF EXISTS compra CASCADE;

CREATE TABLE `compra` (
  `idCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numFac_Com` int(10) unsigned NOT NULL,
  `fecha_Com` date DEFAULT NULL,
  `total_Com` float NOT NULL,
  `id_Proveedor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `FK_compra_Proveedor` (`id_Proveedor`),
  CONSTRAINT `FK_compra_Proveedor` FOREIGN KEY (`id_Proveedor`) REFERENCES `proveedor` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS detallecompra CASCADE;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS detallesdevoluciones CASCADE;

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



DROP TABLE IF EXISTS detalleventa CASCADE;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS devoluciones CASCADE;

CREATE TABLE `devoluciones` (
  `idDevoluciones` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_Dev` date NOT NULL,
  `justificacion_Dev` varchar(45) NOT NULL,
  PRIMARY KEY (`idDevoluciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS facturaconsumidor CASCADE;

CREATE TABLE `facturaconsumidor` (
  `idFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_Fac` int(10) unsigned NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `FK_facturaconsumidor_1` (`id_Venta`),
  CONSTRAINT `FK_facturaconsumidor_1` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS facturacredito CASCADE;

CREATE TABLE `facturacredito` (
  `idFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_Fac` int(10) unsigned NOT NULL,
  `id_Venta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `FK_factura_Venta` (`id_Venta`),
  CONSTRAINT `FK_factura_Venta` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`idVenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS inventario CASCADE;

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS numerofactura CASCADE;

CREATE TABLE `numerofactura` (
  `idnumeroFactura` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numeroInicial_numF` int(10) unsigned NOT NULL,
  `tipo_numF` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idnumeroFactura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS producto CASCADE;

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES("1","Amortiguador","1","ELECTRAN","5 pulgadas, cromado","Ford - Ranger","2000","AM00001","1","10","0");
INSERT INTO producto VALUES("2","Crico","12","ACEDELCO","Color gris","","0","UN00001","1","3","0");
INSERT INTO producto VALUES("3","Pastilla de frenos","5","ACEDELCO","Ninguna","Toyoya-Hilux","2000","EN00001","1","2","0");
INSERT INTO producto VALUES("4","Bateria 9A","12","VALVOLINE","Ninguna","","0","UN00002","1","3","0");
INSERT INTO producto VALUES("5","Faro delantero","4","BEHR","Ninguna","Land Cruiser Coronella","2018","EL00001","1","3","0");
INSERT INTO producto VALUES("6","Bujia","2","ELECTRAN","De alta calidad","Honda-CRV","2010","BU00001","1","5","0");
INSERT INTO producto VALUES("7","Llanta","10","BRM"," Rin 14, de estrella","Ford - Fiesta","2018","SU00001","1","4","0");
INSERT INTO producto VALUES("8","Llanta","10","Kenda","Ultima generacion, rin 16","Honda - Civic","2015","SU00002","1","6","0");
INSERT INTO producto VALUES("9","Radiador","8","Firestone","Motor 25","Honda Accord","2017","MO00001","1","3","0");
INSERT INTO producto VALUES("10","Cuerpo del Acelerador","8","Bridgestone","Motor radial","Honda Ascot Innova","2010","MO00002","1","10","0");
INSERT INTO producto VALUES("11","Carburador","8","GoodYear","Combustion externa","NISSAN ALTIMA","2015","MO00003","1","2","0");
INSERT INTO producto VALUES("12","Alternador","8","Michelin","Combustion interna","ISUZU FORWARD JUSTON","2016","MO00004","1","2","0");
INSERT INTO producto VALUES("13","Amortiguador x","1","BRM","Más economico","Honda-CRV","2003","AM00002","1","4","0");
INSERT INTO producto VALUES("14","Bombilla para luces de frenos","4","Hella","Tipo de lampara: W2/5W, Tension 12V","Toyota-Land Cruiser Prado","2005","EL00002","1","10","0");
INSERT INTO producto VALUES("15","Termostato","5","Gates","Refrigerante, temperatura de abertura 82C","Scion-xB","2010","EN00002","1","3","0");
INSERT INTO producto VALUES("16","Filtro de aire","6","Izusu-Impulse Japanpart","Altura 61mm, diametro exterior 257.2mm","Izusu-Impulse Coupe","2011","FI00001","1","4","0");
INSERT INTO producto VALUES("17","Cojinete de Empuje","11","Sachs","Cojinete de desembrague","Honda-CRV","2000","TR00001","1","5","0");
INSERT INTO producto VALUES("18","Juego de llanta","10","Firestone","Numero de rin13","Chevrolet - S10","2009","SU00003","1","3","0");
INSERT INTO producto VALUES("19","Juego de alfonbrilla de suelo","12","Polgum","lado de montaje posterior, color negro","","0","UN00003","1","4","0");
INSERT INTO producto VALUES("20","Aceite para motor","12","Castrol","Viscosidad GTX 20W-50.","","0","UN00004","1","12","0");


DROP TABLE IF EXISTS proveedor CASCADE;

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

INSERT INTO proveedor VALUES("2","Rodasa S.A de C.V","Rodasa91@hotmail.com","2345-9130","Colonia santa fe 35 Av sur #12","Sonia Daniela Pérez López","7655-9130","0","");
INSERT INTO proveedor VALUES("3","Napa Auto Parts","naparepuestos@hotmail.com","2357-8291","25 Av Lotificación 750 ex edificio record","Lucas Antonio Rivas Jovel","7588-9626","1","");
INSERT INTO proveedor VALUES("4","La super corona","Super_corona52@gmail.com","2301-9375","Colonia bolívar km 4 carretera troncal del norte","Blanca Nohemy Maradiaga","7918-4243","0","");
INSERT INTO proveedor VALUES("5","Rodriguez Rayam S.A de C.V","rodriguez_Rayam@gmail.com","2299-7125","Bulevar constitución colonia Toluca #4","Josué Ricardo Rivas Rosa","7230-4214","0","");
INSERT INTO proveedor VALUES("6","Impresa Repuestos","impresarepuestos@gmail.com","2210-0854","29 calle poniente 7° Av norte # 8","Bryan Manuel Guillén Aguirre","6301-2145","1","");
INSERT INTO proveedor VALUES("7","Gemelas AutoParts","autoparts@gmail.com","2211-7632","Calle Ferrocarril Col Cucumacayan No 13","Dinora Esmeralda Abarca Solis","6565-6565","1","");
INSERT INTO proveedor VALUES("8","Mario Auto Parts","marioautoparts@gmail.com","2253-3109","5 avenida norte numero 1719, San Salvador CP 1101","Cristian Alberto Jovel Arias","7834-1726","0","");
INSERT INTO proveedor VALUES("9","Repuestos Izalco","repuestosizalco@hotmail.com","2270-5401","Col. America #1798 calle a San Marcos","Rosario de la Cruz Lara ","6326-1828","1","");
INSERT INTO proveedor VALUES("10","Chambita Auto Parts","chambitarepuestos@hotmail.com","2209-5193","29 Calle Oriente San Salvador","Daniel Antonio Aguilar","7824-3364","0","");
INSERT INTO proveedor VALUES("11","Auto Repuestos Ramos ","repuestosramos.2012@gmail.com","2235-5555","29 calle oriente y 12 avenida norte San Salvador","Claudia Marleni Jovel Guillen","7246-1826","1","");
INSERT INTO proveedor VALUES("12","Import Cars SA de CV","importcars2011@hotmail.com","2339-9500","No.1027 calle poniente San Salvador","Claudia Ligia Maravilla Maradiaga","7342-5252","1","");
INSERT INTO proveedor VALUES("13","El Americano SA de CV","americanorepuestos@hotmail.com","2235-2039","27 calle poniente y primera avenida norte #209 San Salvador","Dinora Esmeralda Abarca Pereyra","7343-6283","1","");
INSERT INTO proveedor VALUES("14","Part Plus","partplusrepuestos@gmail.com","2205-7878","29 calle poniente entre 23 y 25 av, norte pasaje Laico San Salvador","Vidal Antonio Carrillo","7435-2636","1","");
INSERT INTO proveedor VALUES("15","Pavito Auto Parts","pavitorepuestos@gmail.com","2225-9841","31 calle poniente San Salvador","Jaime Osmany Rivas Hernandez","6341-2765","0","");
INSERT INTO proveedor VALUES("16","La Casa del Repuesto","lacasadelrepuesto@gmail.com","2235-1987","Novena calle oriente #933 San Salvador","Lilibeth Lorena Maravilla Carranza","7643-9086","1","");
INSERT INTO proveedor VALUES("17","TOKYO Auto Parts","tokyoautoparts@gmail.com","2235-7777","San Savador 29 calle poniente #1117","Antonio Alexander Jovel Guillen","7345-6789","1","");
INSERT INTO proveedor VALUES("18","Auto Repuestos Hasbun","hasbunrepuesto@hotmail.com","2278-4488","Calle Las Flores avenida el Boqueron ciudad Merliot","Jacquelin Estefany Gonzalez Gonzalez","6223-4567","0","");
INSERT INTO proveedor VALUES("19","Econoparts","econoparts@gmail.com","2505-9595","Av. Prusia y carretera de oro San Salvador","Juan Pablo Hernandez Castillo","7830-2836","1","");
INSERT INTO proveedor VALUES("20","Super Repuestos La Garita","superrepuestos@gmail.com","2239-5100","Calle concepccion #1001 San Salvador","Rafael Armando Maradona","6123-4567","1","");
INSERT INTO proveedor VALUES("21","Super Repuestos San Miguelito","repuestosmiguelitos@gmail.com","2234-5600","Novena calle poniente y 17 av. norte #110 San Salvador","Sonia Daniela Perez Vidal","7245-8008","1","");
INSERT INTO proveedor VALUES("22","JAP Motors SA de CV","japmotorsrepuestos@hotmail.com","2348-5137","Septima calle poniente San Salvador","Rogelio Omar Melara Lainez","7812-3456","1","");
INSERT INTO proveedor VALUES("23","Importaciones Pleites SA de CV","pleitesrepuestos@hotmail.com","2235-5545","Octava calle Sur y 12 av. norte San Salvador","Sebastian de Jesus Guillen Arias","7254-5765","1","");
INSERT INTO proveedor VALUES("24","Mega Auto Parts","megarepuestos@hotmail.com","2345-6336","25 calle poniente barrio nuevo Santa Ana","Mauricio Enrique Quintanilla Maravilla","7345-6723","1","");


DROP TABLE IF EXISTS usuario CASCADE;

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("62","grecia","10bab2c711bca9ace3036044b0efcc8a","Grecia Melina Hernandez Castillo","grecihdez@gmail.com","Barrio El Santuario, San Vicente, San Vicente","7694-8573","54389107-1","0","1");
INSERT INTO usuario VALUES("75","alegonzy","13742e0b0b56b800856a3c1e3851d169","Yoselin Alexandra Gonzalez Gonzalez","alexandragonz@gmail.com","El Ingenio, San Vicente, San Vicente","7653-4132","34562122-3","1","1");
INSERT INTO usuario VALUES("76","brenda","e5e9b41c8f1ad39ffb22df4a7aa7d876","Brenda del Carmen Guillen Maradiaga","brendacg@gmail.com","Barrio Santa Tereza, San Sebastian, San Vicente","6724-1322","46432221-4","1","1");


DROP TABLE IF EXISTS venta CASCADE;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;



SET FOREIGN_KEY_CHECKS=1;

