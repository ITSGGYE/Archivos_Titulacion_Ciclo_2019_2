/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.34-MariaDB : Database - comercial_pincay
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`comercial_pincay` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `comercial_pincay`;

/*Table structure for table `co_orden_compra` */

DROP TABLE IF EXISTS `co_orden_compra`;

CREATE TABLE `co_orden_compra` (
  `id_cabecera` bigint(20) NOT NULL AUTO_INCREMENT,
  `num_ord_pedido` varchar(20) DEFAULT NULL,
  `ruc` varchar(13) DEFAULT NULL,
  `subtotal_final` double DEFAULT NULL,
  `valor_final` double DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `iva_final` double DEFAULT NULL,
  `forma_pago` varchar(15) DEFAULT NULL,
  `recibido` varchar(40) DEFAULT NULL,
  `f_recibido` datetime DEFAULT NULL,
  `verificado` varchar(40) DEFAULT NULL,
  `f_verificado` datetime DEFAULT NULL,
  `descuento_final` double DEFAULT NULL,
  PRIMARY KEY (`id_cabecera`),
  KEY `id_usuario` (`id_usuario`),
  KEY `index_compra` (`num_ord_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `co_orden_compra` */

LOCK TABLES `co_orden_compra` WRITE;

UNLOCK TABLES;

/*Table structure for table `co_orden_compra_detalle` */

DROP TABLE IF EXISTS `co_orden_compra_detalle`;

CREATE TABLE `co_orden_compra_detalle` (
  `id_cabecera` bigint(20) DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `item` int(4) DEFAULT NULL,
  `decuento` double DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  KEY `id_factura` (`id_cabecera`),
  CONSTRAINT `co_orden_compra_detalle_ibfk_1` FOREIGN KEY (`id_cabecera`) REFERENCES `co_orden_compra` (`id_cabecera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `co_orden_compra_detalle` */

LOCK TABLES `co_orden_compra_detalle` WRITE;

UNLOCK TABLES;

/*Table structure for table `co_orden_pedido` */

DROP TABLE IF EXISTS `co_orden_pedido`;

CREATE TABLE `co_orden_pedido` (
  `id_orden_pedido` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `f_emision` datetime DEFAULT NULL,
  `forma_pago` varchar(15) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `id_documento` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `co_orden_pedido` */

LOCK TABLES `co_orden_pedido` WRITE;

UNLOCK TABLES;

/*Table structure for table `co_orden_pedido_detalle` */

DROP TABLE IF EXISTS `co_orden_pedido_detalle`;

CREATE TABLE `co_orden_pedido_detalle` (
  `id_orden_pedido` bigint(20) DEFAULT NULL,
  `linea_detalle` int(4) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `cantidad_solicitada` int(5) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  KEY `id_orden_pedido` (`id_orden_pedido`),
  CONSTRAINT `co_orden_pedido_detalle_ibfk_1` FOREIGN KEY (`id_orden_pedido`) REFERENCES `co_orden_pedido` (`id_orden_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `co_orden_pedido_detalle` */

LOCK TABLES `co_orden_pedido_detalle` WRITE;

UNLOCK TABLES;

/*Table structure for table `cpt_descuento` */

DROP TABLE IF EXISTS `cpt_descuento`;

CREATE TABLE `cpt_descuento` (
  `id_descuento` int(5) NOT NULL AUTO_INCREMENT,
  `descuento` int(5) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cpt_descuento` */

LOCK TABLES `cpt_descuento` WRITE;

UNLOCK TABLES;

/*Table structure for table `cpt_estado` */

DROP TABLE IF EXISTS `cpt_estado`;

CREATE TABLE `cpt_estado` (
  `id_estado` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` text,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cpt_estado` */

LOCK TABLES `cpt_estado` WRITE;

UNLOCK TABLES;

/*Table structure for table `cpt_movimiento` */

DROP TABLE IF EXISTS `cpt_movimiento`;

CREATE TABLE `cpt_movimiento` (
  `id_movimiento` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cpt_movimiento` */

LOCK TABLES `cpt_movimiento` WRITE;

UNLOCK TABLES;

/*Table structure for table `emp_bodega` */

DROP TABLE IF EXISTS `emp_bodega`;

CREATE TABLE `emp_bodega` (
  `id_bodega` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `u_creacion` varchar(50) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(50) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bodega`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `emp_bodega` */

LOCK TABLES `emp_bodega` WRITE;

insert  into `emp_bodega`(`id_bodega`,`nombre`,`estado`,`observacion`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`) values (1,'bodega via a daule','A',NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `emp_empresa` */

DROP TABLE IF EXISTS `emp_empresa`;

CREATE TABLE `emp_empresa` (
  `id_empresa` int(5) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(13) DEFAULT NULL,
  `nombre_comercial` varchar(80) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_cuidad` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `emp_empresa` */

LOCK TABLES `emp_empresa` WRITE;

insert  into `emp_empresa`(`id_empresa`,`ruc`,`nombre_comercial`,`telefono`,`direccion`,`correo`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_cuidad`) values (1,'0912345678','comercial pincay','0987654123','via a daule','@gmail.com','A',NULL,NULL,NULL,NULL,75);

UNLOCK TABLES;

/*Table structure for table `emp_sucursal` */

DROP TABLE IF EXISTS `emp_sucursal`;

CREATE TABLE `emp_sucursal` (
  `id_sucursal` int(5) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(13) DEFAULT NULL,
  `nombre_comercial` varchar(80) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_bodega` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_sucursal`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_bodega` (`id_bodega`),
  CONSTRAINT `emp_sucursal_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `emp_empresa` (`id_empresa`),
  CONSTRAINT `emp_sucursal_ibfk_2` FOREIGN KEY (`id_bodega`) REFERENCES `emp_bodega` (`id_bodega`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `emp_sucursal` */

LOCK TABLES `emp_sucursal` WRITE;

insert  into `emp_sucursal`(`id_sucursal`,`ruc`,`nombre_comercial`,`telefono`,`direccion`,`correo`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_empresa`,`id_bodega`) values (1,'0912345678','sucursal via daule','0912345678','via daule','@gmail.com','A',NULL,NULL,NULL,NULL,1,NULL);

UNLOCK TABLES;

/*Table structure for table `inv_kardex` */

DROP TABLE IF EXISTS `inv_kardex`;

CREATE TABLE `inv_kardex` (
  `id_kardex` bigint(20) NOT NULL AUTO_INCREMENT,
  `entrada` int(11) DEFAULT NULL,
  `salida` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo_actual` double DEFAULT NULL,
  `costo_promedio` double DEFAULT NULL,
  `costo_anterior` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  PRIMARY KEY (`id_kardex`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `inv_kardex_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `seg_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inv_kardex` */

LOCK TABLES `inv_kardex` WRITE;

UNLOCK TABLES;

/*Table structure for table `pdt_categoria` */

DROP TABLE IF EXISTS `pdt_categoria`;

CREATE TABLE `pdt_categoria` (
  `id_categoria` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varbinary(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pdt_categoria` */

LOCK TABLES `pdt_categoria` WRITE;

UNLOCK TABLES;

/*Table structure for table `pdt_marca` */

DROP TABLE IF EXISTS `pdt_marca`;

CREATE TABLE `pdt_marca` (
  `id_marca` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `u_creacion` varchar(50) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(50) DEFAULT NULL,
  `f_actualizacion` date DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pdt_marca` */

LOCK TABLES `pdt_marca` WRITE;

UNLOCK TABLES;

/*Table structure for table `pdt_producto` */

DROP TABLE IF EXISTS `pdt_producto`;

CREATE TABLE `pdt_producto` (
  `id_produc` int(11) NOT NULL,
  `articulo` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `codigo_barra` text,
  `id_subcategoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produc`),
  KEY `id_subcategoria` (`id_subcategoria`),
  KEY `index_producto` (`articulo`),
  KEY `id_marca` (`id_marca`),
  CONSTRAINT `pdt_producto_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `pdt_subcategoria` (`id_subcategoria`),
  CONSTRAINT `pdt_producto_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `pdt_marca` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pdt_producto` */

LOCK TABLES `pdt_producto` WRITE;

UNLOCK TABLES;

/*Table structure for table `pdt_subcategoria` */

DROP TABLE IF EXISTS `pdt_subcategoria`;

CREATE TABLE `pdt_subcategoria` (
  `id_subcategoria` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varbinary(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_subcategoria`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `pdt_subcategoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `pdt_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pdt_subcategoria` */

LOCK TABLES `pdt_subcategoria` WRITE;

UNLOCK TABLES;

/*Table structure for table `seg_persona` */

DROP TABLE IF EXISTS `seg_persona`;

CREATE TABLE `seg_persona` (
  `id_persona` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(90) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(25) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `index_persona` (`Nombre`),
  KEY `index_cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `seg_persona` */

LOCK TABLES `seg_persona` WRITE;

insert  into `seg_persona`(`id_persona`,`Nombre`,`cedula`,`telefono`,`correo_electronico`,`direccion`,`estado`,`observacion`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`Fecha_nacimiento`) values (1,'prueba','000000000','0000000000','kjsdhcd@hotmail.com','pradera','A',NULL,NULL,NULL,NULL,NULL,'1990-01-02'),(2,'carlos cordova','0950963058','0912345678','kjsdhcd@gmail.com','pradera','A',NULL,NULL,NULL,NULL,NULL,'1994-06-21'),(5,'insert','980796868','0993981','insert@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:22:25',NULL,NULL,'1994-02-04'),(6,'insert','980796868','0993981','insert@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:23:51',NULL,NULL,'1994-02-04'),(7,'prueba insert','0930981112','0993981','faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:35:36',NULL,NULL,'1994-02-04'),(8,'prueba insert','0930981112','0993981','faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:35:59',NULL,NULL,'1994-02-04'),(9,'prueba 3','677645356','0993981','faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:40:56',NULL,NULL,'1994-02-04'),(10,'prueba 3','677645356','0993981','faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:43:57',NULL,NULL,'1994-02-04'),(11,'prueba 4','0930981113','0993981','prueba4@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:51:35',NULL,NULL,'1994-02-04'),(12,'prueba 4','0930981113','0993981','prueba4@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:52:01',NULL,NULL,'1994-02-04'),(13,'prueba 5','0930981114','0993981','insert5@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:53:22',NULL,NULL,'1994-02-04'),(14,'prueba 5','0930981114','0993981','insert5@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:54:55',NULL,NULL,'1994-02-04'),(15,'prueba 6','0930981115','0993981','insert6@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:55:21',NULL,NULL,'1994-02-04'),(16,'prueba 6','0930981115','0993981','insert6@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:56:14',NULL,NULL,'1994-02-04'),(17,'prueba 7','0930981116','0993981','insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:56:31',NULL,NULL,'1994-02-04'),(18,'prueba 7','0930981116','0993981','insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:57:15',NULL,NULL,'1994-02-04'),(19,'prueba 7','0930981116','0993981','insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:57:29',NULL,NULL,'1994-02-04'),(20,'prueba 7','0930981116','0993981','insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:00:55',NULL,NULL,'1994-02-04'),(21,'prueba 7','0930981116','0993981','insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:03:07',NULL,NULL,'1994-02-04'),(22,'prueba 8','0930981116','0993981','insert8@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:03:27',NULL,NULL,'1994-02-04'),(23,'prueba 8','0930981116','0993981','insert8@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:05:22',NULL,NULL,'1994-02-04'),(24,'prueba 9','0930981110','0993981','insert9@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:05:50',NULL,NULL,'1994-02-04'),(25,'prueba 10','0930981110','0993981','insert10@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:06:35',NULL,NULL,'1994-02-04'),(26,'prueba 11','0930981110','0993981','insert11@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:06:55',NULL,NULL,'1994-02-04'),(27,'prueba 11','0930981110','0993981','insert11@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:07:46',NULL,NULL,'1994-02-04'),(28,'','1','','','','A',NULL,'ADMIN','2020-02-04 14:48:03',NULL,NULL,'1994-02-04'),(29,'','12','','','','A',NULL,'ADMIN','2020-02-04 14:55:52',NULL,NULL,'1994-02-04');

UNLOCK TABLES;

/*Table structure for table `seg_rol` */

DROP TABLE IF EXISTS `seg_rol`;

CREATE TABLE `seg_rol` (
  `id_rol` int(2) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `seg_rol` */

LOCK TABLES `seg_rol` WRITE;

insert  into `seg_rol`(`id_rol`,`rol`,`estado`) values (1,'administrador','A'),(2,'bodega','A'),(3,'caja','A');

UNLOCK TABLES;

/*Table structure for table `seg_usuario` */

DROP TABLE IF EXISTS `seg_usuario`;

CREATE TABLE `seg_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_usuario` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `id_rol` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_persona` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `seg_usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `seg_persona` (`id_persona`),
  CONSTRAINT `seg_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `seg_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `seg_usuario` */

LOCK TABLES `seg_usuario` WRITE;

insert  into `seg_usuario`(`id_usuario`,`nomb_usuario`,`password`,`email`,`estado`,`observacion`,`id_rol`,`id_sucursal`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`id_persona`) values (1,'prueba usuario','12345','@gmail.com','A','cascasc',3,1,NULL,NULL,NULL,NULL,1),(2,'ccordova','12345','@gmail.com','A','DSDSDCSEWEWEECACACECscasacsfvds',1,1,NULL,NULL,NULL,NULL,2),(3,'980796868','980796868','insert@gmail.co','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:22:25',NULL,NULL,5),(4,'980796868','980796868','insert@gmail.co','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:23:51',NULL,NULL,6),(5,'0930981112','0930981112','faefafa','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:35:36',NULL,NULL,7),(6,'0930981112','0930981112','faefafa','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:35:59',NULL,NULL,8),(7,'677645356','677645356','faefafa','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:40:56',NULL,NULL,9),(8,'677645356','677645356','faefafa','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:43:57',NULL,NULL,10),(9,'0930981113','0930981113','prueba4@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:51:35',NULL,NULL,11),(10,'0930981113','0930981113','prueba4@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:52:01',NULL,NULL,12),(11,'0930981114','0930981114','insert5@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:53:22',NULL,NULL,13),(12,'0930981114','0930981114','insert5@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:54:55',NULL,NULL,14),(13,'0930981115','0930981115','insert6@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:55:21',NULL,NULL,15),(14,'0930981115','0930981115','insert6@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:56:14',NULL,NULL,16),(15,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:56:31',NULL,NULL,17),(16,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:57:15',NULL,NULL,18),(17,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:57:29',NULL,NULL,19),(18,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:00:55',NULL,NULL,20),(19,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:03:07',NULL,NULL,21),(20,'0930981116','0930981116','insert8@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:03:27',NULL,NULL,22),(21,'0930981116','0930981116','insert8@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:05:22',NULL,NULL,23),(22,'0930981110','0930981110','insert9@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:05:50',NULL,NULL,24),(23,'0930981110','0930981110','insert10@gmail.','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:06:35',NULL,NULL,25),(24,'0930981110','0930981110','insert11@gmail.','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:06:55',NULL,NULL,26),(25,'0930981110','0930981110','insert11@gmail.','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:07:46',NULL,NULL,27),(26,'1','1','','A','',3,1,'ADMIN','2020-02-04 14:48:03',NULL,NULL,28),(27,'12','12','','A','',3,1,'ADMIN','2020-02-04 14:55:52',NULL,NULL,29);

UNLOCK TABLES;

/*Table structure for table `ubi_cuidad` */

DROP TABLE IF EXISTS `ubi_cuidad`;

CREATE TABLE `ubi_cuidad` (
  `id_cuidad` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_provincia` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_cuidad`),
  KEY `id_provincia` (`id_provincia`),
  CONSTRAINT `ubi_cuidad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `ubi_provincia` (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=latin1;

/*Data for the table `ubi_cuidad` */

LOCK TABLES `ubi_cuidad` WRITE;

insert  into `ubi_cuidad`(`id_cuidad`,`nombre`,`estado`,`id_provincia`) values (1,'Cuenca','A',1),(2,'Girón','A',1),(3,'Gualaceo','A',1),(4,'Nabón','A',1),(5,'Paute','A',1),(6,'Pucará','A',1),(7,'San Fernando','A',1),(8,'Santa Isabel','A',1),(9,'Sigsig','A',1),(10,'Oña','A',1),(11,'Chordeleg','A',1),(12,'El Pan','A',1),(13,'Sevilla de Oro','A',1),(14,'Guachapala','A',1),(15,'Camilo Ponce Enríquez','A',1),(16,'Guaranda','A',2),(17,'Chillanes','A',2),(18,'Chimbo','A',2),(19,'Echeandia','A',2),(20,'San Miguel','A',2),(21,'Caluma','A',2),(22,'Las Naves','A',2),(23,'Azogues','A',3),(24,'Biblian','A',3),(25,'Cañar','A',3),(26,'La Troncal','A',3),(27,'El Tambo','A',3),(28,'Deleg','A',3),(29,'Suscal','A',3),(30,'Tulcán','A',4),(31,'Bolivar','A',4),(32,'Espejo','A',4),(33,'Mira','A',4),(34,'Montufar','A',4),(35,'San Pedro de huaca','A',4),(36,'Latacunga','A',5),(37,'La Maná','A',5),(38,'Pangua','A',5),(39,'Pujilé','A',5),(40,'Salcedo','A',5),(41,'Saquisií','A',5),(42,'Sigchos','A',5),(43,'Riobamba','A',6),(44,'Alausí','A',6),(45,'Colta','A',6),(46,'Chambo','A',6),(47,'Chunchi','A',6),(48,'Guamote','A',6),(49,'Guano','A',6),(50,'Pallatanga','A',6),(51,'Penipe','A',6),(52,'Cumanda','A',6),(53,'Machala','A',7),(54,'Arenillas','A',7),(55,'Atahualpa','A',7),(56,'Balsas','A',7),(57,'Chilla','A',7),(58,'El Guabo','A',7),(59,'Huaquillas','A',7),(60,'Marcabeli','A',7),(61,'Pasaje','A',7),(62,'Piñas','A',7),(63,'Portovelo','A',7),(64,'Santa Rosa','A',7),(65,'Zaruma','A',7),(66,'Las Lajas','A',7),(67,'Esmeraldas','A',8),(68,'Eloy Alfaro','A',8),(69,'Muisne','A',8),(70,'Quininde','A',8),(71,'San Lorenzo','A',8),(72,'Atacames','A',8),(73,'RioVerde','A',8),(74,'La Concordia','A',8),(75,'Guayaquil','A',9),(76,'Alfredo Baquerizo Moreno','A',9),(77,'Balao','A',9),(78,'Balzar','A',9),(79,'Colmes','A',9),(80,'Daule','A',9),(81,'Durán','A',9),(82,'Empalme','A',9),(83,'El Triunfo','A',9),(84,'Milagro','A',9),(85,'Naranjal','A',9),(86,'Naranjito','A',9),(87,'Palestina','A',9),(88,'Pedro Carbo','A',9),(89,'Samborondón','A',9),(90,'Santa Lucía','A',9),(91,'Salitre','A',9),(92,'San Jacinto de Yaguachi','A',9),(93,'Playas','A',9),(94,'Simon Bolivar','A',9),(95,'Cronel. Marcelino Maridueña','A',9),(96,'Lomas de Sargentillo','A',9),(97,'Nobol','A',9),(98,'Grnal. Antonio Elizalde','A',9),(99,'Isidro Ayora','A',9),(100,'Antonio Ante','A',10),(101,'Cotacachi','A',10),(102,'Ibarra','A',10),(103,'Otavalo','A',10),(104,'Pimampiro','A',10),(105,'San Miguel de Urcuquí','A',10),(106,'Loja','A',11),(107,'Calvas','A',11),(108,'Catamayo','A',11),(109,'Celica','A',11),(110,'Chaguarpamba','A',11),(111,'Espindola','A',11),(112,'Gonzanamá','A',11),(113,'Macará','A',11),(114,'Paltas','A',11),(115,'Puyango','A',11),(116,'Saraguro','A',11),(117,'Sozoranga','A',11),(118,'Zapotillo','A',11),(119,'Pindal','A',11),(120,'Quilanga','A',11),(121,'Olmedo','A',11),(122,'Babahoyo','A',12),(123,'Baba','A',12),(124,'Montalvo','A',12),(125,'PuebloViejo','A',12),(126,'Quevedo','A',12),(127,'Urdaneta','A',12),(128,'Ventanas','A',12),(129,'Vinces','A',12),(130,'Palenque','A',12),(131,'Buena Fé','A',12),(132,'Valencia','A',12),(133,'Mocache','A',12),(134,'Quinsaloma','A',12),(135,'Portoviejo','A',13),(136,'Bolivar','A',13),(137,'Chone','A',13),(138,'El Carmen','A',13),(139,'Flavio Alfaro','A',13),(140,'Jipijapa','A',13),(141,'Junín','A',13),(142,'Manta','A',13),(143,'Montecristi','A',13),(144,'Paján','A',13),(145,'Pichincha','A',13),(146,'Rocafuerte','A',13),(147,'Santa Ana','A',13),(148,'Sucre','A',13),(149,'Tosagua','A',13),(150,'24 de Mayo','A',13),(151,'Pedernales','A',13),(152,'Olmedo','A',13),(153,'Puerto López','A',13),(154,'Jama','A',13),(155,'Jaramijó','A',13),(156,'San Vicente','A',13),(157,'Morona','A',14),(158,'Gualaquiza','A',14),(159,'Limón Indanza','A',14),(160,'Palora','A',14),(161,'Santiago','A',14),(162,'Sucúa','A',14),(163,'Huamboya','A',14),(164,'San Juan Bosco','A',14),(165,'Taisha','A',14),(166,'Logroño','A',14),(167,'Pablo Sexto','A',14),(168,'Tiwintza','A',14),(169,'Tena','A',15),(170,'Archidona','A',15),(171,'El Chaco','A',15),(172,'Quijos','A',15),(173,'Carlos Julio Arosema Tola','A',15),(174,'Pastaza','A',16),(175,'Mera','A',16),(176,'Santa Clara','A',16),(177,'Arajuno','A',16),(178,'Quito','A',17),(179,'Cayambe','A',17),(180,'Mejía','A',17),(181,'Pedro Moncayo','A',17),(182,'Rumiñahui','A',17),(183,'San Miguel de los Bancos','A',17),(184,'Pedro Vicente Maldoonado','A',17),(185,'Puerto Quito','A',17),(186,'Ambato','A',18),(187,'Baños de Agua Santa','A',18),(188,'Cevallos','A',18),(189,'Mocha','A',18),(190,'Patate','A',18),(191,'Quero','A',18),(192,'San Pedro de Pelileo','A',18),(193,'Santiago de Pillaro','A',18),(194,'Tisaleo','A',18),(195,'Zamora','A',19),(196,'Chinchipe','A',19),(197,'Nangaritza','A',19),(198,'Yacuambi','A',19),(199,'Yantzatza','A',19),(200,'El Pangui','A',19),(201,'Centinela del Condor','A',19),(202,'Palanda','A',19),(203,'Paquisha','A',19),(204,'San Cristobal','A',20),(205,'Isabela','A',20),(206,'Santa Cruz','A',20),(207,'Lago Agrio','A',21),(208,'Gonzalo Pizarro','A',21),(209,'Putumayo','A',21),(210,'Shushufindi','A',21),(211,'Sucumbios','A',21),(212,'Cascales','A',21),(213,'Cuyabeno','A',21),(214,'Orellana','A',22),(215,'Aguarico','A',22),(216,'La Joya de los Sachas','A',22),(217,'Loreto','A',22),(218,'Santo Domingo','A',23),(219,'Santa Elena','A',24),(220,'La Libertad','A',24),(221,'Salinas','A',24);

UNLOCK TABLES;

/*Table structure for table `ubi_pais` */

DROP TABLE IF EXISTS `ubi_pais`;

CREATE TABLE `ubi_pais` (
  `id_pais` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

/*Data for the table `ubi_pais` */

LOCK TABLES `ubi_pais` WRITE;

insert  into `ubi_pais`(`id_pais`,`nombre`,`estado`) values (1,'Ecusdor','A'),(2,'Afganistán','A'),(3,'Asia Central','A'),(4,'Albania','A'),(5,'Argelia','A'),(6,'Samoa Americana','A'),(7,'Andorra','A'),(8,'Angola','A'),(9,'Anguilla','A'),(10,'Antártida','A'),(11,'Antigua y Barbuda','A'),(12,'Argentina','A'),(13,'Armenia','A'),(14,'Aruba','A'),(15,'Australia','A'),(16,'Austria','A'),(17,'Azerbaiyán','A'),(18,'Bahamas','A'),(19,'Bahrein','A'),(20,'Bangladesh','A'),(21,'Barbados','A'),(22,'Bielorrusia','A'),(23,'Bélgica','A'),(24,'Belice','A'),(25,'Benín','A'),(26,'Bermudas','A'),(27,'Bután','A'),(28,'Bolivia','A'),(29,'Bosnia-Herzegovina','A'),(30,'Botswana','A'),(31,'Brasil','A'),(32,'Brunei Darussalam','A'),(33,'Bulgaria','A'),(34,'Burkina Faso','A'),(35,'Burundi','A'),(36,'Camboya','A'),(37,'Camerún','A'),(38,'Canadá','A'),(39,'Cabo Verde','A'),(40,'Islas Caimán','A'),(41,'República Centroafricana','A'),(42,'Chad','A'),(43,'Chile','A'),(44,'China','A'),(45,'Isla De Navidad. Isla Christmas','A'),(46,'Islas Cocos','A'),(47,'Colombia','A'),(48,'Comores','A'),(49,'República Democrática del Congo','A'),(50,'República del Congo','A'),(51,'Islas Cook','A'),(52,'Costa Rica','A'),(53,'Costa de Marfil','A'),(54,'Croacia','A'),(55,'Cuba','A'),(56,'Chipre','A'),(57,'República Checa','A'),(58,'Dinamarca','A'),(59,'Djibouti. Yibuti','A'),(60,'Dominica','A'),(61,'República Dominicana','A'),(62,'Timor Oriental','A'),(63,'Egipto','A'),(64,'El Salvador','A'),(65,'Guinea Ecuatorial','A'),(66,'Eritrea','A'),(67,'Estonia','A'),(68,'Etiopía','A'),(69,'Islas Malvinas','A'),(70,'Islas Feroe','A'),(71,'Fiyi','A'),(72,'Finlandia','A'),(73,'Francia','A'),(74,'Guayana Francesa','A'),(75,'Polinesia Francesa','A'),(76,'Tierras Australes y Antárticas Francesas','A'),(77,'Gabón','A'),(78,'Gambia','A'),(79,'Georgia','A'),(80,'Alemania','A'),(81,'Ghana','A'),(82,'Gibraltar','A'),(83,'Gran Bretaña','A'),(84,'Grecia','A'),(85,'Groenlandia','A'),(86,'Granada','A'),(87,'Guadalupe','A'),(88,'Guam','A'),(89,'Guatemala','A'),(90,'República Guinea','A'),(91,'Guinea Bissau','A'),(92,'Guyana','A'),(93,'Spanish Name - Nombre Español','A'),(94,'Haiti','A'),(95,'Santa Sede. Vaticano. Ciudad del Vatican','A'),(96,'Honduras','A'),(97,'Hong Kong','A'),(98,'Hungría','A'),(99,'Islandia','A'),(100,'India','A'),(101,'Indonesia','A'),(102,'Irán','A'),(103,'Iraq','A'),(104,'Irlanda','A'),(105,'Israel','A'),(106,'Italia','A'),(107,'Jamaica','A'),(108,'Japón','A'),(109,'Jordania','A'),(110,'Kazajstán','A'),(111,'Kenia','A'),(112,'Kiribati','A'),(113,'Corea del Norte','A'),(114,'Corea del Sur','A'),(115,'Kosovo','A'),(116,'Kuwait','A'),(117,'Kirguistán','A'),(118,'República Democrática Popular Lao','A'),(119,'Letonia','A'),(120,'Líbano','A'),(121,'Lesotho','A'),(122,'Liberia','A'),(123,'Libia','A'),(124,'Liechtenstein','A'),(125,'Lituania','A'),(126,'Luxemburgo','A'),(127,'Macao','A'),(128,'Macedonia','A'),(129,'Madagascar','A'),(130,'Malawi','A'),(131,'Malasia','A'),(132,'Maldivas','A'),(133,'Malí','A'),(134,'Malta','A'),(135,'Islas Marshall','A'),(136,'Martinica','A'),(137,'Mauritania','A'),(138,'Mauricio','A'),(139,'Mayotte','A'),(140,'México','A'),(141,'Micronesia','A'),(142,'Moldavia','A'),(143,'Mónaco','A'),(144,'Mongolia','A'),(145,'Montenegro','A'),(146,'Montserrat','A'),(147,'Marruecos','A'),(148,'Mozambique','A'),(149,'Myanmar. Birmania','A'),(150,'Namibia','A'),(151,'Nauru','A'),(152,'Nepal','A'),(153,'Países Bajos. Holanda','A'),(154,'Antillas Holandesas','A'),(155,'Nueva Caledonia','A'),(156,'Nueva Zelanda','A'),(157,'Nicaragua','A'),(158,'Niger','A'),(159,'Nigeria','A'),(160,'Niue','A'),(161,'Marianas del Norte','A'),(162,'Noruega','A'),(163,'Omán','A'),(164,'Pakistán','A'),(165,'Palau','A'),(166,'Territorios Palestinos','A'),(167,'Panamá','A'),(168,'Papúa-Nueva Guinea','A'),(169,'Paraguay','A'),(170,'Perú','A'),(171,'Filipinas','A'),(172,'Isla Pitcairn','A'),(173,'Polonia','A'),(174,'Portugal','A'),(175,'Puerto Rico','A'),(176,'Qatar','A'),(177,'Reunión','A'),(178,'Rumanía','A'),(179,'Federación Rusa','A'),(180,'Ruanda','A'),(181,'San Cristobal y Nevis','A'),(182,'Santa Lucía','A'),(183,'San Vincente y Granadinas','A'),(184,'Samoa','A'),(185,'San Marino','A'),(186,'Santo Tomé y Príncipe','A'),(187,'Arabia Saudita','A'),(188,'Senegal','A'),(189,'Serbia','A'),(190,'Seychelles','A'),(191,'Sierra Leona','A'),(192,'Singapur','A'),(193,'Eslovaquia','A'),(194,'Eslovenia','A'),(195,'Islas Salomón','A'),(196,'Somalia','A'),(197,'Sudáfrica','A'),(198,'Sudán del Sur','A'),(199,'España','A'),(200,'Sri Lanka','A'),(201,'Sudán','A'),(202,'Surinam','A'),(203,'Swazilandia','A'),(204,'Suecia','A'),(205,'Suiza','A'),(206,'Siria','A'),(207,'Taiwan','A'),(208,'Tadjikistan','A'),(209,'Tanzania','A'),(210,'Tailandia','A'),(211,'Tíbet','A'),(212,'Timor Oriental','A'),(213,'Togo','A'),(214,'Tokelau','A'),(215,'Tonga','A'),(216,'Trinidad y Tobago','A'),(217,'Túnez','A'),(218,'Turquía','A'),(219,'Turkmenistan','A'),(220,'Islas Turcas y Caicos','A'),(221,'Tuvalu','A'),(222,'Uganda','A'),(223,'Ucrania','A'),(224,'Emiratos Árabes Unidos','A'),(225,'Reino Unido','A'),(226,'Estados Unidos','A'),(227,'Uruguay','A'),(228,'Uzbekistán','A'),(229,'Vanuatu','A'),(230,'Ciudad del Vaticano','A'),(231,'Venezuela','A'),(232,'Vietnam','A'),(233,'Islas Virgenes Británicas','A'),(234,'Islas Virgenes Americanas','A'),(235,'Wallis y Futuna','A'),(236,'Sáhara Occidental','A'),(237,'Yemen','A'),(238,'Zambia','A'),(239,'Zimbabwe','A');

UNLOCK TABLES;

/*Table structure for table `ubi_provincia` */

DROP TABLE IF EXISTS `ubi_provincia`;

CREATE TABLE `ubi_provincia` (
  `id_provincia` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `id_pais` (`id_pais`),
  CONSTRAINT `ubi_provincia_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `ubi_pais` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `ubi_provincia` */

LOCK TABLES `ubi_provincia` WRITE;

insert  into `ubi_provincia`(`id_provincia`,`nombre`,`estado`,`id_pais`) values (1,'Azuay','A',1),(2,'Bolivar','A',1),(3,'Cañar','A',1),(4,'Carchi','A',1),(5,'Cotopaxi','A',1),(6,'Chimborazo','A',1),(7,'El Oro','A',1),(8,'Esmeraldas','A',1),(9,'Guayas','A',1),(10,'Imbabura','A',1),(11,'Loja','A',1),(12,'Los Ríos','A',1),(13,'Manabí','A',1),(14,'Morona Santiago','A',1),(15,'Napo','A',1),(16,'Pastaza','A',1),(17,'Pichincha','A',1),(18,'Tungurahua','A',1),(19,'Zamora Chinchipe','A',1),(20,'Galápagos','A',1),(21,'Sucumbios','A',1),(22,'Orellana','A',1),(23,'Santo Domingo de los Tsáchilas','A',1),(24,'Santa Elena','A',1);

UNLOCK TABLES;

/*Table structure for table `ven_cabecera` */

DROP TABLE IF EXISTS `ven_cabecera`;

CREATE TABLE `ven_cabecera` (
  `id_cabecera` bigint(20) NOT NULL AUTO_INCREMENT,
  `num_fact` varchar(20) DEFAULT NULL,
  `ruc` varchar(13) DEFAULT NULL,
  `subtotal_final` double DEFAULT NULL,
  `valor_final` double DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `iva_final` double DEFAULT NULL,
  `f_recibido` datetime DEFAULT NULL,
  `f_verificado` datetime DEFAULT NULL,
  `descuento_final` double DEFAULT NULL,
  `forma_pago` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_cabecera`),
  KEY `id_usuario` (`id_usuario`),
  KEY `index_venta` (`num_fact`),
  CONSTRAINT `ven_cabecera_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `seg_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ven_cabecera` */

LOCK TABLES `ven_cabecera` WRITE;

UNLOCK TABLES;

/*Table structure for table `ven_caja` */

DROP TABLE IF EXISTS `ven_caja`;

CREATE TABLE `ven_caja` (
  `id_caja` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ven_caja` */

LOCK TABLES `ven_caja` WRITE;

UNLOCK TABLES;

/*Table structure for table `ven_caja_detalle` */

DROP TABLE IF EXISTS `ven_caja_detalle`;

CREATE TABLE `ven_caja_detalle` (
  `id_caja` bigint(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `f_inicio` date DEFAULT NULL,
  `f_cierre` date DEFAULT NULL,
  `h_inicio` time DEFAULT NULL,
  `h_cierre` time DEFAULT NULL,
  `dinero_inicio` double DEFAULT NULL,
  `dinero_cierre` double DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ven_caja_detalle` */

LOCK TABLES `ven_caja_detalle` WRITE;

UNLOCK TABLES;

/*Table structure for table `ven_detalle` */

DROP TABLE IF EXISTS `ven_detalle`;

CREATE TABLE `ven_detalle` (
  `id_cabecera` bigint(20) DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `linea_detalle` int(4) DEFAULT NULL,
  `decuento` double DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  KEY `id_factura` (`id_cabecera`),
  CONSTRAINT `ven_detalle_ibfk_1` FOREIGN KEY (`id_cabecera`) REFERENCES `ven_cabecera` (`id_cabecera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ven_detalle` */

LOCK TABLES `ven_detalle` WRITE;

UNLOCK TABLES;

/* Procedure structure for procedure `persona` */

/*!50003 DROP PROCEDURE IF EXISTS  `persona` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `persona`()
BEGIN
SELECT
  `id_persona`,
  `Nombre`,
  `cedula`,
  `telefono`,
  `correo_electronico`,
  `direccion`,
  `estado`,
  `observacion`,
  `usuario_creacion`,
  `f_creacion`,
  `usuario_actulizacion`,
  `f_actualizacion`,
  `Fecha_nacimiento`
FROM `seg_persona`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `seg_usuario_insert` */

/*!50003 DROP PROCEDURE IF EXISTS  `seg_usuario_insert` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `seg_usuario_insert`(nom varchar(90),ced varchar(13),tel varchar(15),correo varchar(25), 
    dir varchar(80), obser text, u_crea varchar(80),fecha date,id_suc int,ro varchar(15)/*,pas varchar(15),nomb_us varchar(15)*/,out salida varchar(40))
BEGIN
    
    declare v_id_per bigint; 
    declare v_id_rol varchar(15);
INSERT INTO `seg_persona`
            (`Nombre`,
             `cedula`,
             `telefono`,
             `correo_electronico`,
             `direccion`,
             `estado`,
             `usuario_creacion`,
             `f_creacion`,
             `Fecha_nacimiento`)
VALUES (nom,
        ced,
        tel,
        correo,
        dir,
        'A',
        u_crea,
        NOW(),
        fecha);
        
select max(`id_persona`) into v_id_per from `seg_persona`;
select `id_rol` into v_id_rol from `seg_rol` where `rol` = ro;
INSERT INTO `seg_usuario`
            (`nomb_usuario`,
             `password`,
             `email`,
             `estado`,
             `observacion`,
             `id_rol`,
             `id_sucursal`,
             `usuario_creacion`,
             `f_creacion`,
             `id_persona`)
VALUES (ced,
        ced,
        correo,
        'A',
        obser,
        v_id_rol,
        id_suc,
        u_crea,
        now(),
        v_id_per);
        
        SET salida = 'USUARIO CREADO CORRECTAMENTE';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `seg_usuario_select_all` */

/*!50003 DROP PROCEDURE IF EXISTS  `seg_usuario_select_all` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `seg_usuario_select_all`()
BEGIN
SELECT `seg_persona`.`id_persona`,`seg_persona`.`Nombre`,`seg_persona`.`cedula`,`seg_persona`.`telefono`, 
`seg_persona`.`correo_electronico`,`seg_persona`.`direccion`,`seg_persona`.`estado`,  
`seg_persona`.`usuario_creacion`,`seg_persona`.`f_creacion`,`seg_persona`.`usuario_actulizacion`,`seg_persona`.`f_actualizacion`, 
`seg_persona`.`Fecha_nacimiento`, 
`seg_rol`.`id_rol`,`seg_rol`.`estado`,`seg_rol`.`rol`, 
`seg_usuario`.`id_usuario`,`seg_usuario`.`nomb_usuario`,`seg_usuario`.`password`,`seg_usuario`.`email`, 
`seg_usuario`.`estado`,`seg_usuario`.`observacion`,`seg_usuario`.`id_rol`,`seg_usuario`.`id_sucursal`, 
`seg_usuario`.`usuario_creacion`,`seg_usuario`.`f_creacion`,`seg_usuario`.`usuario_actulizacion`, 
`seg_usuario`.`f_actualizacion`,`seg_usuario`.`id_persona` 
FROM `seg_persona` INNER JOIN `seg_usuario` ON `seg_persona`.`id_persona` = `seg_usuario`.`id_persona` 
INNER JOIN `seg_rol` ON `seg_rol`.`id_rol` = `seg_usuario`.`id_rol` 
ORDER BY `seg_persona`.`id_persona`;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `seg_usuario_select_cedula` */

/*!50003 DROP PROCEDURE IF EXISTS  `seg_usuario_select_cedula` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `seg_usuario_select_cedula`(ced VARCHAR(13), id_suc INT)
BEGIN
SELECT 
`seg_persona`.`id_persona`,`seg_persona`.`Nombre`,`seg_persona`.`cedula`,`seg_persona`.`telefono`, 
`seg_persona`.`correo_electronico`,`seg_persona`.`direccion`,`seg_persona`.`estado`,  
`seg_persona`.`usuario_creacion`,`seg_persona`.`f_creacion`,`seg_persona`.`usuario_actulizacion`,`seg_persona`.`f_actualizacion`, 
`seg_persona`.`Fecha_nacimiento`, 
`seg_rol`.`id_rol`,`seg_rol`.`estado`,`seg_rol`.`rol`, 
`seg_usuario`.`id_usuario`,`seg_usuario`.`nomb_usuario`,`seg_usuario`.`password`,`seg_usuario`.`email`, 
`seg_usuario`.`estado`,`seg_usuario`.`observacion`,`seg_usuario`.`id_rol`,`seg_usuario`.`id_sucursal`, 
`seg_usuario`.`usuario_creacion`,`seg_usuario`.`f_creacion`,`seg_usuario`.`usuario_actulizacion`, 
`seg_usuario`.`f_actualizacion`,`seg_usuario`.`id_persona` 
FROM 
`seg_persona` INNER JOIN `seg_usuario` ON `seg_persona`.`id_persona` = `seg_usuario`.`id_persona` 
INNER JOIN `seg_rol` ON `seg_rol`.`id_rol` = `seg_usuario`.`id_rol` 
WHERE 
`seg_persona`.`cedula` LIKE CONCAT('%',ced,'%')  AND `seg_usuario`.`id_sucursal` = id_suc AND `seg_usuario`.`estado` = 'A';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `seg_usuario_select_id` */

/*!50003 DROP PROCEDURE IF EXISTS  `seg_usuario_select_id` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `seg_usuario_select_id`(id_us int, id_suc int)
BEGIN
SELECT 
`seg_persona`.`id_persona`,`seg_persona`.`Nombre`,`seg_persona`.`cedula`,`seg_persona`.`telefono`, 
`seg_persona`.`correo_electronico`,`seg_persona`.`direccion`,`seg_persona`.`estado`, 
`seg_persona`.`usuario_creacion`,`seg_persona`.`f_creacion`,`seg_persona`.`usuario_actulizacion`,`seg_persona`.`f_actualizacion`, 
`seg_persona`.`Fecha_nacimiento`, 
`seg_rol`.`id_rol`,`seg_rol`.`estado`,`seg_rol`.`rol`, 
`seg_usuario`.`id_usuario`,`seg_usuario`.`nomb_usuario`,`seg_usuario`.`password`,`seg_usuario`.`email`, 
`seg_usuario`.`estado`,`seg_usuario`.`observacion`,`seg_usuario`.`id_rol`,`seg_usuario`.`id_sucursal`, 
`seg_usuario`.`usuario_creacion`,`seg_usuario`.`f_creacion`,`seg_usuario`.`usuario_actulizacion`, 
`seg_usuario`.`f_actualizacion`,`seg_usuario`.`id_persona` 
FROM 
`seg_persona` INNER JOIN `seg_usuario` ON `seg_persona`.`id_persona` = `seg_usuario`.`id_persona` 
INNER JOIN `seg_rol` ON `seg_rol`.`id_rol` = `seg_usuario`.`id_rol` 
WHERE 
`seg_usuario`.`id_usuario` = id_us and `seg_usuario`.`id_sucursal` = id_suc and `seg_usuario`.`estado` = 'A';
    END */$$
DELIMITER ;

/* Procedure structure for procedure `seg_usuario_select_nombre` */

/*!50003 DROP PROCEDURE IF EXISTS  `seg_usuario_select_nombre` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `seg_usuario_select_nombre`(nombre varchar(80), id_suc int)
BEGIN
SELECT 
`seg_persona`.`id_persona`,`seg_persona`.`Nombre`,`seg_persona`.`cedula`,`seg_persona`.`telefono`, 
`seg_persona`.`correo_electronico`,`seg_persona`.`direccion`,`seg_persona`.`estado`,  
`seg_persona`.`usuario_creacion`,`seg_persona`.`f_creacion`,`seg_persona`.`usuario_actulizacion`,`seg_persona`.`f_actualizacion`, 
`seg_persona`.`Fecha_nacimiento`, 
`seg_rol`.`id_rol`,`seg_rol`.`estado`,`seg_rol`.`rol`, 
`seg_usuario`.`id_usuario`,`seg_usuario`.`nomb_usuario`,`seg_usuario`.`password`,`seg_usuario`.`email`, 
`seg_usuario`.`estado`,`seg_usuario`.`observacion`,`seg_usuario`.`id_rol`,`seg_usuario`.`id_sucursal`, 
`seg_usuario`.`usuario_creacion`,`seg_usuario`.`f_creacion`,`seg_usuario`.`usuario_actulizacion`, 
`seg_usuario`.`f_actualizacion`,`seg_usuario`.`id_persona` 
FROM 
`seg_persona` INNER JOIN `seg_usuario` ON `seg_persona`.`id_persona` = `seg_usuario`.`id_persona` 
INNER JOIN `seg_rol` ON `seg_rol`.`id_rol` = `seg_usuario`.`id_rol` 
WHERE 
`seg_persona`.`Nombre` LIKE CONCAT('%',nombre,'%')  AND `seg_usuario`.`id_sucursal` = id_suc AND `seg_usuario`.`estado` = 'A';
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
