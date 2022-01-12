/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.23-log : Database - db_comercial_pincay_desa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_comercial_pincay_desa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_comercial_pincay_desa`;

/*Table structure for table `bit_entrada` */

DROP TABLE IF EXISTS `bit_entrada`;

CREATE TABLE `bit_entrada` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario_ingreso` text,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_entrada`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `bit_entrada` */

insert  into `bit_entrada`(`id_entrada`,`id_producto`,`fecha_ingreso`,`usuario_ingreso`,`cantidad`) values 
(6,20,'2020-07-19','ccordova',4),
(7,20,'2020-07-21','ccordova',7),
(11,19,'2020-07-25','ccordova',5),
(12,23,'2020-07-25','ccordova',3),
(13,25,'2020-07-25','ccordova',25),
(14,20,'2020-07-30','ccordova',7),
(15,21,'2020-07-30','ccordova',18);

/*Table structure for table `bit_salida` */

DROP TABLE IF EXISTS `bit_salida`;

CREATE TABLE `bit_salida` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `usuario_salida` text,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_salida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bit_salida` */

/*Table structure for table `co_orden_compra` */

DROP TABLE IF EXISTS `co_orden_compra`;

CREATE TABLE `co_orden_compra` (
  `id_cabecera` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_proveedor` bigint(11) DEFAULT NULL,
  `num_ord_pedido` varchar(20) DEFAULT NULL,
  `id_sucursal` bigint(11) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `forma_pago` varchar(20) DEFAULT NULL,
  `f_verificado` datetime DEFAULT NULL,
  `f_recibido` datetime DEFAULT NULL,
  `ruc` varchar(13) DEFAULT NULL,
  `total_subtotal` double(15,7) DEFAULT NULL,
  `total_iva` double(15,7) DEFAULT NULL,
  `total_descuento` double(15,7) DEFAULT NULL,
  `total_facturado` double(15,7) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `iva_final` double DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `recibido` varchar(40) DEFAULT NULL,
  `verificado` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_cabecera`),
  KEY `index_compra` (`num_ord_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `co_orden_compra` */

insert  into `co_orden_compra`(`id_cabecera`,`id_proveedor`,`num_ord_pedido`,`id_sucursal`,`estado`,`forma_pago`,`f_verificado`,`f_recibido`,`ruc`,`total_subtotal`,`total_iva`,`total_descuento`,`total_facturado`,`usuario_creacion`,`iva_final`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`recibido`,`verificado`) values 
(10,33,NULL,1,'APROVADO',NULL,'2020-07-22 16:25:00',NULL,NULL,540.0000000,64.8000000,0.2700000,604.8000000,'ccordova',NULL,'2020-07-09 01:08:38','ccordova','2020-07-22 16:25:00','FHDT','FTHFTH'),
(11,33,NULL,1,'APROVADO',NULL,'2020-07-22 01:52:02',NULL,NULL,562.0000000,67.4400000,0.0000000,629.4400000,'ccordova',NULL,'2020-07-15 22:49:20','ccordova','2020-07-22 01:52:02','FYJF','FYJFYJ'),
(25,33,NULL,1,'APROVADO',NULL,'2020-07-25 21:19:05',NULL,NULL,725.0000000,87.0000000,NULL,812.0000000,'ccordova',NULL,'2020-07-23 03:03:33','ccordova','2020-07-25 21:19:05','RECIBIDO','CARLOS CORDOVA LUCAS'),
(26,33,NULL,1,'APROVADO',NULL,'2020-07-25 21:10:47',NULL,NULL,1098.0000000,131.7600000,NULL,1229.7600000,'ccordova',NULL,'2020-07-25 21:10:08','ccordova','2020-07-25 21:10:47','APROBADO','CARLOS CORDOVA LUCAS'),
(27,33,NULL,1,'APROVADO',NULL,'2020-07-25 22:49:56',NULL,NULL,21.2500000,2.5500000,NULL,23.8000000,'ccordova',NULL,'2020-07-25 22:49:33','ccordova','2020-07-25 22:49:56','RECIBIDO','CARLOS CORDOVA LUCAS'),
(28,33,NULL,1,'GENERADO',NULL,'2020-07-30 13:33:01',NULL,NULL,132.0000000,15.8400000,NULL,147.8400000,'ccordova',NULL,'2020-07-30 13:31:13','ccordova','2020-07-30 13:33:01','DAVID','CARLOS CORDOVA LUCAS');

/*Table structure for table `co_orden_compra_detalle` */

DROP TABLE IF EXISTS `co_orden_compra_detalle`;

CREATE TABLE `co_orden_compra_detalle` (
  `id_detalle_compra` bigint(11) DEFAULT NULL,
  `linea_detalle` int(11) DEFAULT NULL,
  `id_cabecera` bigint(20) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio_unitario` double(15,7) DEFAULT NULL,
  `sub_total` double(15,7) DEFAULT NULL,
  `iva` double(15,7) DEFAULT NULL,
  `decuento` double(15,7) DEFAULT NULL,
  `total` double(15,7) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `item` int(4) DEFAULT NULL,
  KEY `id_factura` (`id_cabecera`),
  CONSTRAINT `co_orden_compra_detalle_ibfk_1` FOREIGN KEY (`id_cabecera`) REFERENCES `co_orden_compra` (`id_cabecera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `co_orden_compra_detalle` */

insert  into `co_orden_compra_detalle`(`id_detalle_compra`,`linea_detalle`,`id_cabecera`,`id_producto`,`cantidad`,`descripcion`,`precio_unitario`,`sub_total`,`iva`,`decuento`,`total`,`estado`,`item`) values 
(NULL,1,10,17,20,'NEUMATICO CHEVROLET - MEDIDA: 23-32',27.0000000,540.0000000,64.8000000,0.2700000,604.8000000,'A',NULL),
(NULL,1,11,19,10,'BIELA DE SUSPENSION RENAULT',55.0000000,550.0000000,66.0000000,0.0000000,616.0000000,'A',NULL),
(NULL,2,11,20,2,'MANUBRIO GS 125 SUZUKI',6.0000000,12.0000000,1.4400000,0.0000000,13.4400000,'A',NULL),
(NULL,1,25,19,5,'BIELA DE SUSPENSION RENAULT',55.0000000,275.0000000,33.0000000,NULL,308.0000000,'A',NULL),
(NULL,2,25,23,3,'RADIADOR CHEVROLET ',150.0000000,450.0000000,54.0000000,NULL,504.0000000,'A',NULL),
(NULL,1,26,17,30,'NEUMATICO CHEVROLET - MEDIDA: 23-32',27.0000000,810.0000000,97.2000000,NULL,907.2000000,'A',NULL),
(NULL,2,26,24,12,'ACEITE DE KENDAL - ENVASE: BOTELLA - MEDIDA: 1L',4.0000000,48.0000000,5.7600000,NULL,53.7600000,'A',NULL),
(NULL,3,26,22,3,'CIGUEÑAL DE CHEVY',80.0000000,240.0000000,28.8000000,NULL,268.8000000,'A',NULL),
(NULL,1,27,25,25,'CARBON BORITA - ENVASE: FUNDA',0.8500000,21.2500000,2.5500000,NULL,23.8000000,'A',NULL),
(NULL,1,28,20,7,'MANUBRIO GS 125 SUZUKI',6.0000000,42.0000000,5.0400000,NULL,47.0400000,'A',NULL),
(NULL,2,28,21,18,'BOMBA DE ACEITE PS 135 PULSAR ',5.0000000,90.0000000,10.8000000,NULL,100.8000000,'A',NULL);

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

/*Table structure for table `emp_bodega` */

DROP TABLE IF EXISTS `emp_bodega`;

CREATE TABLE `emp_bodega` (
  `id_bodega` int(4) NOT NULL AUTO_INCREMENT,
  `nombre_bodega` varchar(40) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion_bod` varchar(300) DEFAULT NULL,
  `u_creacion` varchar(50) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(50) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bodega`),
  KEY `id_sucursal` (`id_sucursal`),
  CONSTRAINT `emp_bodega_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `emp_sucursal` (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `emp_bodega` */

insert  into `emp_bodega`(`id_bodega`,`nombre_bodega`,`estado`,`observacion_bod`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_sucursal`) values 
(1,'bodega via a daule','A',NULL,NULL,NULL,NULL,NULL,1),
(2,'bodega norte','A',NULL,NULL,NULL,NULL,NULL,1);

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

insert  into `emp_empresa`(`id_empresa`,`ruc`,`nombre_comercial`,`telefono`,`direccion`,`correo`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_cuidad`) values 
(1,'0912345678','comercial pincay','0987654123','via a daule','@gmail.com','A',NULL,NULL,NULL,NULL,75);

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
  `observacion_suc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_sucursal`),
  KEY `id_empresa` (`id_empresa`),
  CONSTRAINT `emp_sucursal_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `emp_empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `emp_sucursal` */

insert  into `emp_sucursal`(`id_sucursal`,`ruc`,`nombre_comercial`,`telefono`,`direccion`,`correo`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_empresa`,`observacion_suc`) values 
(1,'0912345678','sucursal via daule','0912345678','via daule','@gmail.com','A',NULL,NULL,NULL,NULL,1,NULL);

/*Table structure for table `gen_iva` */

DROP TABLE IF EXISTS `gen_iva`;

CREATE TABLE `gen_iva` (
  `id_iva` bigint(2) NOT NULL AUTO_INCREMENT,
  `iva` int(5) DEFAULT NULL,
  `estdo_iva` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_iva`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `gen_iva` */

insert  into `gen_iva`(`id_iva`,`iva`,`estdo_iva`) values 
(1,12,'A'),
(2,13,'I'),
(3,14,'I'),
(4,0,'A');

/*Table structure for table `inv_detalle_tarifario` */

DROP TABLE IF EXISTS `inv_detalle_tarifario`;

CREATE TABLE `inv_detalle_tarifario` (
  `id_detalle_tarifario` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_tarifario` bigint(11) DEFAULT NULL,
  `id_producto` bigint(11) DEFAULT NULL,
  `valor_costo` double(10,7) DEFAULT NULL,
  `valor_venta` double(10,7) DEFAULT NULL,
  `valor_descuento` double(10,7) DEFAULT NULL,
  `aplica_iva` varchar(2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `porcentaje_venta` double DEFAULT NULL,
  `porcentaje_descuento` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_detalle_tarifario`),
  KEY `id_producto` (`id_producto`),
  KEY `id_tarifario` (`id_tarifario`),
  CONSTRAINT `inv_detalle_tarifario_ibfk_1` FOREIGN KEY (`id_tarifario`) REFERENCES `inv_tarifario` (`id_tarifario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `inv_detalle_tarifario` */

insert  into `inv_detalle_tarifario`(`id_detalle_tarifario`,`id_tarifario`,`id_producto`,`valor_costo`,`valor_venta`,`valor_descuento`,`aplica_iva`,`estado`,`porcentaje_venta`,`porcentaje_descuento`,`fecha`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`) values 
(17,1,17,25.0000000,27.0000000,0.2700000,'SI','I',11,0,'2020-07-20',NULL,NULL,'YO','2020-07-22 01:29:10'),
(18,1,23,150.0000000,200.0000000,10.0000000,'SI','A',10,0,'2020-07-20',NULL,NULL,'YO','2020-07-25 21:19:07'),
(19,1,18,180.0000000,250.0000000,0.0000000,'SI','A',10,0,'2020-07-20',NULL,NULL,NULL,NULL),
(20,1,19,55.0000000,65.0000000,0.0000000,'SI','A',11,0,'2020-07-20',NULL,NULL,'YO','2020-07-25 21:19:06'),
(21,1,20,2.0000000,4.0000000,0.0000000,'SI','I',12,0,'2020-07-20',NULL,NULL,'YO','2020-07-22 01:49:49'),
(22,1,22,80.0000000,100.0000000,3.0000000,'SI','A',13,0,'2020-07-20',NULL,NULL,'YO','2020-07-25 21:11:08'),
(23,1,21,5.0000000,8.0000000,0.0000000,'SI','A',14,0,'2020-07-20',NULL,NULL,'YO','2020-07-30 13:33:03'),
(24,1,24,0.0000000,0.0000000,0.0000000,'SI','I',0,0,'2020-07-20',NULL,NULL,'YO','2020-07-20 20:04:33'),
(25,1,24,4.0000000,5.0000000,0.0000000,'SI','A',25,0,'2020-07-20','YO','2020-07-20 20:04:33','YO','2020-07-25 21:11:06'),
(26,1,17,27.0000000,30.0000000,1.5000000,'SI','A',11.1,5,'2020-07-22','YO','2020-07-22 01:29:10','YO','2020-07-25 21:10:49'),
(27,1,20,5.0000000,5.6000000,0.0000000,'SI','I',12,NULL,'2020-07-22','YO','2020-07-22 01:49:49','YO','2020-07-22 01:52:05'),
(28,1,20,6.0000000,6.7200000,0.0000000,'SI','A',12,NULL,'2020-07-22','YO','2020-07-22 01:52:05','YO','2020-07-30 13:33:02'),
(29,1,25,0.0000000,0.0000000,0.0000000,'NO','I',10,0,'2020-07-25','YO','2020-07-25 22:44:36','YO','2020-07-25 22:47:31'),
(30,1,25,0.8500000,1.0000000,0.0000000,'NO','A',18,0,'2020-07-25','YO','2020-07-25 22:47:31','YO','2020-07-25 22:49:58'),
(31,1,26,0.0000000,0.0000000,0.0000000,'NO','A',20,0,'2020-07-30','YO','2020-07-30 13:18:34',NULL,NULL);

/*Table structure for table `inv_inventario` */

DROP TABLE IF EXISTS `inv_inventario`;

CREATE TABLE `inv_inventario` (
  `id_kardex` bigint(20) NOT NULL AUTO_INCREMENT,
  `entrada` int(11) DEFAULT NULL,
  `salida` int(11) DEFAULT NULL,
  `estado_inv` char(1) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo_actual` double DEFAULT NULL,
  `costo_promedio` double DEFAULT NULL,
  `costo_anterior` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `id_bodega` bigint(11) DEFAULT NULL,
  `id_tipo_documento` bigint(11) DEFAULT NULL,
  `id_producto` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_kardex`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `inv_inventario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `pdt_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `inv_inventario` */

insert  into `inv_inventario`(`id_kardex`,`entrada`,`salida`,`estado_inv`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`cantidad`,`costo_actual`,`costo_promedio`,`costo_anterior`,`fecha`,`valor_total`,`id_bodega`,`id_tipo_documento`,`id_producto`) values 
(9,NULL,NULL,'A','YO','2020-07-08 22:33:49',NULL,NULL,26,NULL,NULL,NULL,NULL,NULL,1,NULL,17),
(10,NULL,NULL,'A','YO','2020-07-08 23:09:50',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,1,NULL,18),
(11,NULL,NULL,'A','YO','2020-07-08 23:09:50',NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,1,NULL,19),
(12,NULL,NULL,'A','YO','2020-07-08 23:09:50',NULL,NULL,7,NULL,NULL,NULL,NULL,NULL,1,NULL,20),
(13,NULL,NULL,'A','YO','2020-07-08 23:09:50',NULL,NULL,18,NULL,NULL,NULL,NULL,NULL,1,NULL,21),
(14,NULL,NULL,'A','YO','2020-07-08 23:09:50',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,1,NULL,22),
(15,NULL,NULL,'A','YO','2020-07-08 23:09:50',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,1,NULL,23),
(16,NULL,NULL,'A','YO','2020-07-19 16:58:26',NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,1,NULL,24),
(17,NULL,NULL,'A','YO','2020-07-25 22:44:36',NULL,NULL,25,NULL,NULL,NULL,NULL,NULL,1,NULL,25),
(18,NULL,NULL,'A','YO','2020-07-30 13:18:34',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,1,NULL,26);

/*Table structure for table `inv_tarifario` */

DROP TABLE IF EXISTS `inv_tarifario`;

CREATE TABLE `inv_tarifario` (
  `id_tarifario` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` bigint(11) DEFAULT NULL,
  `tarifario` varchar(20) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_tarifario`),
  KEY `id_tarifario` (`id_tarifario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `inv_tarifario` */

insert  into `inv_tarifario`(`id_tarifario`,`id_sucursal`,`tarifario`,`fecha_inicio`,`fecha_final`,`estado`) values 
(1,NULL,'2019-2020','2019-01-01','2020-12-31','A');

/*Table structure for table `pdt_articulo` */

DROP TABLE IF EXISTS `pdt_articulo`;

CREATE TABLE `pdt_articulo` (
  `id_articulo` bigint(11) NOT NULL AUTO_INCREMENT,
  `articulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `index_producto` (`articulo`),
  KEY `id_marca` (`id_marca`),
  CONSTRAINT `pdt_articulo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `pdt_marca` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `pdt_articulo` */

insert  into `pdt_articulo`(`id_articulo`,`articulo`,`descripcion`,`estado`,`observacion`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`id_marca`) values 
(17,'NEUMATICO',NULL,'A',NULL,'YO','2020-06-28 13:41:04','YO','2020-07-05 20:04:24',14),
(18,'PARILLA AL CARBON',NULL,'A',NULL,'YO','2020-06-28 13:59:04',NULL,NULL,15),
(19,'BIELA DE SUSPENSION',NULL,'A',NULL,'YO','2020-06-28 14:50:08','YO','2020-07-05 20:04:31',16),
(20,'MANUBRIO GS 125',NULL,'A',NULL,'YO','2020-06-28 14:53:07','YO','2020-07-05 20:37:12',17),
(21,'BOMBA DE ACEITE PS 135',NULL,'A',NULL,'YO','2020-06-28 15:09:46','YO','2020-07-05 18:20:05',18),
(22,'CIGUEÑAL',NULL,'A',NULL,'YO','2020-06-28 15:33:29','YO','2020-07-05 20:04:35',19),
(23,'RADIADOR',NULL,'A',NULL,'YO','2020-06-28 16:06:11','YO','2020-07-05 20:04:27',14),
(24,'ACEITE',NULL,'A',NULL,'YO','2020-07-19 16:57:36',NULL,NULL,20),
(25,'CARBON',NULL,'A',NULL,'YO','2020-07-25 22:27:31',NULL,NULL,21),
(26,'GASEOSA',NULL,'A',NULL,'YO','2020-07-30 13:17:03',NULL,NULL,22);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pdt_categoria` */

insert  into `pdt_categoria`(`id_categoria`,`nombre`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`) values 
(1,'VEHICULO','A','YO','2020-03-09 11:48:39','YO','2020-07-05 18:19:33'),
(2,'HOGAR','A','YO','2020-05-23 10:12:52','YO','2020-05-23 10:13:44'),
(3,'FARMACIA','A','YO','2020-06-28 14:44:51',NULL,NULL),
(4,'RESTAURANTE','A','YO','2020-07-30 13:07:59','YO','2020-07-30 13:09:20');

/*Table structure for table `pdt_envase` */

DROP TABLE IF EXISTS `pdt_envase`;

CREATE TABLE `pdt_envase` (
  `id_envase` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_envase` text,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` text,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` text,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_envase`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `pdt_envase` */

insert  into `pdt_envase`(`id_envase`,`nombre_envase`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`) values 
(1,'CAJA \r ','A','YO','2020-02-22 21:45:04','YO','2020-06-05 23:13:46'),
(2,'BOTELLA','A','YO','2020-02-22 21:45:04',NULL,NULL),
(3,'FUNDA','A','YO','2020-02-22 21:51:36',NULL,NULL),
(4,'NINGUNO','A','YO','2020-06-05 23:37:13',NULL,NULL);

/*Table structure for table `pdt_marca` */

DROP TABLE IF EXISTS `pdt_marca`;

CREATE TABLE `pdt_marca` (
  `id_marca` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_marca` text,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(50) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(50) DEFAULT NULL,
  `f_actualizacion` date DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_marca`),
  KEY `id_subcategoria` (`id_subcategoria`),
  CONSTRAINT `pdt_marca_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `pdt_subcategoria` (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `pdt_marca` */

insert  into `pdt_marca`(`id_marca`,`nombre_marca`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`descripcion`,`id_subcategoria`) values 
(14,'CHEVROLET','A','YO','2020-06-28 13:38:12','YO','2020-07-05',NULL,9),
(15,'CHAR BROIL','A','YO','2020-06-28 13:58:44',NULL,NULL,NULL,10),
(16,'RENAULT','A','YO','2020-06-28 14:49:39','YO','2020-07-05',NULL,9),
(17,'SUZUKI','A','YO','2020-06-28 14:52:56','YO','2020-07-05',NULL,11),
(18,'PULSAR','A','YO','2020-06-28 15:09:17','YO','2020-07-05',NULL,11),
(19,'CHEVY','A','YO','2020-06-28 15:33:10','YO','2020-07-05',NULL,9),
(20,'KENDAL','A','YO','2020-07-19 16:57:18',NULL,NULL,NULL,14),
(21,'BORITA','A','YO','2020-07-25 22:26:05','YO','2020-07-25',NULL,10),
(22,'COCACOLA','A','YO','2020-07-30 13:13:02','YO','2020-07-30',NULL,15);

/*Table structure for table `pdt_medida` */

DROP TABLE IF EXISTS `pdt_medida`;

CREATE TABLE `pdt_medida` (
  `id_medida` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_medida` text,
  `estdao` char(1) DEFAULT NULL,
  `u_creacion` text,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` text,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `pdt_medida` */

insert  into `pdt_medida`(`id_medida`,`nombre_medida`,`estdao`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`) values 
(1,'NINGUNA','A','YO',NULL,NULL,NULL),
(2,'10 X 100 CM','A','YO','2020-02-23 01:22:30','YO','2020-06-05 22:49:29'),
(3,'1L','A','YO','2020-03-11 17:25:13',NULL,NULL),
(4,'1GL','A','YO','2020-06-05 22:43:14','YO','2020-06-05 22:44:22'),
(5,'NINGUNO','A','YO','2020-06-05 23:22:29',NULL,NULL),
(6,'23-32','A','YO','2020-06-24 00:01:00',NULL,NULL),
(7,'80CMX1.25CM','A','YO','2020-06-28 14:00:05',NULL,NULL);

/*Table structure for table `pdt_presentacion` */

DROP TABLE IF EXISTS `pdt_presentacion`;

CREATE TABLE `pdt_presentacion` (
  `id_presentacion` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_medida` bigint(11) DEFAULT NULL,
  `id_envase` bigint(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` text,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` text,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_articulo` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_presentacion`),
  KEY `id_envase` (`id_envase`),
  KEY `id_medida` (`id_medida`),
  KEY `id_articulo` (`id_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `pdt_presentacion` */

insert  into `pdt_presentacion`(`id_presentacion`,`id_medida`,`id_envase`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_articulo`) values 
(1,1,1,'A','YO','2020-03-09 18:06:12',NULL,NULL,1),
(2,3,2,'A','YO','2020-03-11 17:25:30',NULL,NULL,2),
(3,1,4,'A','YO','2020-03-19 13:55:08',NULL,NULL,3),
(4,1,1,'A','YO','2020-04-28 11:42:37',NULL,NULL,4),
(5,1,1,'A','YO','2020-05-23 10:25:52',NULL,NULL,5),
(6,3,2,'A','YO','2020-05-23 11:45:20',NULL,NULL,6),
(7,3,2,'A','YO','2020-05-23 16:01:44',NULL,NULL,7),
(8,1,1,'A','YO','2020-06-22 17:56:50',NULL,NULL,5),
(9,3,2,'A','YO','2020-06-22 18:04:56',NULL,NULL,4);

/*Table structure for table `pdt_producto` */

DROP TABLE IF EXISTS `pdt_producto`;

CREATE TABLE `pdt_producto` (
  `id_producto` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` text,
  `codigo_barra` text,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(30) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(30) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `precio` double(15,7) DEFAULT NULL,
  `id_iva` bigint(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `iva` varchar(5) DEFAULT NULL,
  `descripcion` text,
  `minimo` int(11) DEFAULT NULL,
  `maximo` int(11) DEFAULT NULL,
  `id_bodega` int(11) DEFAULT NULL,
  `id_articulo` bigint(20) DEFAULT NULL,
  `id_medida` int(11) DEFAULT NULL,
  `id_envase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_iva` (`id_iva`),
  KEY `id_articulo` (`id_articulo`),
  KEY `id_medida` (`id_medida`),
  KEY `id_envase` (`id_envase`),
  CONSTRAINT `pdt_producto_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `pdt_articulo` (`id_articulo`),
  CONSTRAINT `pdt_producto_ibfk_2` FOREIGN KEY (`id_medida`) REFERENCES `pdt_medida` (`id_medida`),
  CONSTRAINT `pdt_producto_ibfk_3` FOREIGN KEY (`id_envase`) REFERENCES `pdt_envase` (`id_envase`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `pdt_producto` */

insert  into `pdt_producto`(`id_producto`,`nombre_producto`,`codigo_barra`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`precio`,`id_iva`,`total`,`iva`,`descripcion`,`minimo`,`maximo`,`id_bodega`,`id_articulo`,`id_medida`,`id_envase`) values 
(17,'NEUMATICO CHEVROLET - MEDIDA: 23-32','','A','YO','2020-06-28 13:43:14','YO','2020-07-08 00:54:34',35.0000000,1,NULL,'SI','',20,40,1,17,6,4),
(18,'PARILLA AL CARBON CHAR BROIL - MEDIDA: 80CMX1.25CM','','A','YO','2020-06-28 14:01:09',NULL,NULL,255.0000000,1,NULL,'SI','',1,3,2,18,7,1),
(19,'BIELA DE SUSPENSION RENAULT','','A','YO','2020-06-28 14:51:14','YO','2020-07-07 23:11:43',120.0000000,1,NULL,'SI','',5,12,1,19,1,1),
(20,'MANUBRIO GS 125 SUZUKI','','A','YO','2020-06-28 14:55:59','YO','2020-07-05 20:37:14',3.5000000,1,NULL,'SI','',5,10,2,20,1,4),
(21,'BOMBA DE ACEITE PS 135 PULSAR ','','A','YO','2020-06-28 15:10:33','YO','2020-07-05 18:20:07',10.0000000,1,NULL,'SI','prueba de actualizar.',4,10,1,21,1,1),
(22,'CIGUEÑAL DE CHEVY','','A','YO','2020-06-28 15:54:52','YO','2020-07-05 20:04:36',80.0000000,1,NULL,'SI','',2,8,1,22,1,4),
(23,'RADIADOR CHEVROLET ','','A','YO','2020-06-28 16:06:46','YO','2020-07-05 20:04:28',120.0000000,1,NULL,'SI','',3,6,2,23,1,4),
(24,'ACEITE DE KENDAL - ENVASE: BOTELLA - MEDIDA: 1L','','A','YO','2020-07-19 16:58:26',NULL,NULL,NULL,1,NULL,'SI','',3,12,1,24,3,2),
(25,'CARBON BORITA - ENVASE: FUNDA','','A','YO','2020-07-25 22:44:35',NULL,NULL,NULL,4,NULL,'NO','',15,40,1,25,1,3),
(26,'GASEOSA DE COCACOLA - ENVASE: BOTELLA - MEDIDA: 1L','','A','YO','2020-07-30 13:18:34','YO','2020-07-30 13:21:22',NULL,4,NULL,'NO','',5,20,1,26,3,2);

/*Table structure for table `pdt_subcategoria` */

DROP TABLE IF EXISTS `pdt_subcategoria`;

CREATE TABLE `pdt_subcategoria` (
  `id_subcategoria` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_subcategoria`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `pdt_subcategoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `pdt_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `pdt_subcategoria` */

insert  into `pdt_subcategoria`(`id_subcategoria`,`nombre`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_categoria`) values 
(9,'4 RUEDAS','A','YO','2020-06-28 13:37:38','yo','2020-07-05 20:04:17',1),
(10,'JARDIN','A','YO','2020-06-28 13:55:03',NULL,NULL,2),
(11,'2 RUEDAS','A','YO','2020-06-28 14:05:51','YO','2020-07-05 18:19:59',1),
(12,'6 RUEDAS','A','YO','2020-06-28 14:29:55','yo','2020-07-05 19:49:44',1),
(13,'12 RUEDAS','A','YO','2020-06-28 14:33:37','YO','2020-07-05 18:20:09',1),
(14,'LIQUIDOS','A','YO','2020-06-28 16:12:04','YO','2020-07-05 18:20:11',1),
(15,'BEBIDAS','A','YO','2020-07-30 13:10:13',NULL,NULL,4);

/*Table structure for table `seg_persona` */

DROP TABLE IF EXISTS `seg_persona`;

CREATE TABLE `seg_persona` (
  `id_persona` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(90) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(80) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `seg_persona` */

insert  into `seg_persona`(`id_persona`,`Nombre`,`cedula`,`telefono`,`celular`,`correo_electronico`,`direccion`,`estado`,`observacion`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`Fecha_nacimiento`) values 
(1,'Consumidor Final','9999999999999','(04)9999999','0999999999','consumidor_final@gmail.com','**********','A',NULL,NULL,NULL,NULL,NULL,'1990-01-02'),
(2,'CARLOS CORDOVA LUCAS','0950963058','0993981878',NULL,'kjsdhcd@gmail.com','BASTION POPULAR ZADS','A',NULL,NULL,NULL,NULL,'2020-08-08 12:04:51','1994-06-21'),
(5,'insert','980796868','0993981',NULL,'insert@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:22:25',NULL,NULL,'1994-02-04'),
(6,'INSERT INDS','980796868','099398161',NULL,'insert@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:23:51',NULL,'2020-08-08 12:06:34','1994-02-04'),
(7,'prueba insert','0930981112','0993981',NULL,'faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:35:36',NULL,NULL,'1994-02-04'),
(8,'prueba insert','0930981112','0993981',NULL,'faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:35:59',NULL,NULL,'1994-02-04'),
(9,'prueba 3','677645356','0993981',NULL,'faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:40:56',NULL,NULL,'1994-02-04'),
(10,'prueba 3','677645356','0993981',NULL,'faefafa','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:43:57',NULL,NULL,'1994-02-04'),
(11,'prueba 4','0930981113','0993981',NULL,'prueba4@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:51:35',NULL,NULL,'1994-02-04'),
(12,'prueba 4','0930981113','0993981',NULL,'prueba4@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:52:01',NULL,NULL,'1994-02-04'),
(13,'prueba 5','0930981114','0993981',NULL,'insert5@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:53:22',NULL,NULL,'1994-02-04'),
(14,'prueba 5','0930981114','0993981',NULL,'insert5@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:54:55',NULL,NULL,'1994-02-04'),
(15,'prueba 6','0930981115','0993981',NULL,'insert6@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:55:21',NULL,NULL,'1994-02-04'),
(16,'prueba 6','0930981115','0993981',NULL,'insert6@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:56:14',NULL,NULL,'1994-02-04'),
(17,'prueba 7','0930981116','0993981',NULL,'insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:56:31',NULL,NULL,'1994-02-04'),
(18,'prueba 7','0930981116','0993981',NULL,'insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:57:15',NULL,NULL,'1994-02-04'),
(19,'prueba 7','0930981116','0993981',NULL,'insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 02:57:29',NULL,NULL,'1994-02-04'),
(20,'prueba 7','0930981116','0993981',NULL,'insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:00:55',NULL,NULL,'1994-02-04'),
(21,'prueba 7','0930981116','0993981',NULL,'insert7@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:03:07',NULL,NULL,'1994-02-04'),
(22,'prueba 8','0930981116','0993981',NULL,'insert8@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:03:27',NULL,NULL,'1994-02-04'),
(23,'prueba 8','0930981116','0993981',NULL,'insert8@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:05:22',NULL,NULL,'1994-02-04'),
(24,'prueba 9','0930981110','0993981',NULL,'insert9@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:05:50',NULL,NULL,'1994-02-04'),
(25,'prueba 10','0930981110','0993981',NULL,'insert10@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:06:35',NULL,NULL,'1994-02-04'),
(26,'prueba 11','0930981110','0993981',NULL,'insert11@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:06:55',NULL,NULL,'1994-02-04'),
(27,'Cliente 1','0930981110','(04)3098971','0939848461','insert11@gmail.com','fdksbfb','A',NULL,'ADMIN','2020-02-04 03:07:46',NULL,NULL,'1994-02-04'),
(28,'','1','',NULL,'','','A',NULL,'ADMIN','2020-02-04 14:48:03',NULL,NULL,'1994-02-04'),
(29,'','12','',NULL,'','','A',NULL,'ADMIN','2020-02-04 14:55:52',NULL,NULL,'1994-02-04'),
(30,'PRUEBA','0912345678','0912345678',NULL,'@gmail.com','BASTION POPULAR','A',NULL,NULL,'2020-02-20 17:16:15',NULL,NULL,'2020-02-03'),
(31,'PRUEBA ','0912345678','0912345678',NULL,'@gmail.com','EAKJNEQNEQDQ','A',NULL,NULL,'2020-02-20 17:17:07',NULL,NULL,'2020-02-03'),
(32,'LACANCLANCAW','0921345678','0912345678',NULL,'@gmail.com','CKJENWNCWNEICWCWME','A',NULL,NULL,'2020-02-20 17:26:52',NULL,NULL,'2020-02-03'),
(33,'AKJNCNOCA','0988744562','0905016888',NULL,'@gmail.com','XJHVXU WJXQWX','A',NULL,NULL,'2020-02-20 17:39:30',NULL,NULL,'2020-02-03'),
(34,'PROVEEDOR','0987455887','0912345678',NULL,'proveedor@gmail.com','AKJCNWON','A',NULL,NULL,'2020-05-30 19:01:54',NULL,'2020-05-30 19:59:39','2000-05-08'),
(35,'CLIENTE DOS ','0921548637','0912345678',NULL,'@gmail.com','BASTION','A',NULL,NULL,'2020-08-07 23:25:32',NULL,'2020-08-08 12:09:03','1900-01-01');

/*Table structure for table `seg_rol` */

DROP TABLE IF EXISTS `seg_rol`;

CREATE TABLE `seg_rol` (
  `id_rol` int(2) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `seg_rol` */

insert  into `seg_rol`(`id_rol`,`rol`,`estado`) values 
(1,'ADMINISTRADOR','A'),
(2,'COMPRA','A'),
(3,'VENTA','A'),
(4,'CLIENTE','A'),
(5,'SUPERVISOR','A'),
(6,'GERENTE','A'),
(7,'PASANTE','I'),
(8,'PROVEEDOR','A');

/*Table structure for table `seg_usuario` */

DROP TABLE IF EXISTS `seg_usuario`;

CREATE TABLE `seg_usuario` (
  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomb_usuario` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `observacion` text,
  `id_rol` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_persona` bigint(11) DEFAULT NULL,
  `monbre_comercial` varchar(90) DEFAULT NULL,
  `telefono_dos` varbinary(13) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `seg_usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `seg_persona` (`id_persona`),
  CONSTRAINT `seg_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `seg_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `seg_usuario` */

insert  into `seg_usuario`(`id_usuario`,`nomb_usuario`,`password`,`email`,`estado`,`observacion`,`id_rol`,`id_sucursal`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`,`id_persona`,`monbre_comercial`,`telefono_dos`) values 
(1,'prueba usuario','12345','consumidor_final@gmail.com','A','cascasc',4,1,NULL,NULL,NULL,NULL,1,NULL,NULL),
(2,'ccordova','12345','ccordova@gmail.c','A','PRUEBA',1,1,NULL,NULL,NULL,'2020-08-08 12:04:51',2,NULL,NULL),
(3,'980796868','980796868','insert@gmail.co','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:22:25',NULL,NULL,5,NULL,NULL),
(4,'980796868','980796868','insert@gmail.co','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:23:51',NULL,'2020-08-08 12:06:34',6,NULL,NULL),
(5,'0930981112','0930981112','faefafa','I','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:35:36','ccordova','2020-02-21 13:41:08',7,NULL,NULL),
(6,'0930981112','0930981112','faefafa','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:35:59',NULL,NULL,8,NULL,NULL),
(7,'677645356','677645356','faefafa','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:40:56',NULL,NULL,9,NULL,NULL),
(8,'677645356','677645356','faefafa','I','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:43:57','ccordova','2020-02-21 13:43:52',10,NULL,NULL),
(9,'0930981113','0930981113','prueba4@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:51:35',NULL,NULL,11,NULL,NULL),
(10,'0930981113','0930981113','prueba4@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:52:01',NULL,NULL,12,NULL,NULL),
(11,'0930981114','0930981114','insert5@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:53:22',NULL,NULL,13,NULL,NULL),
(12,'0930981114','0930981114','insert5@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:54:55',NULL,NULL,14,NULL,NULL),
(13,'0930981115','0930981115','insert6@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:55:21',NULL,NULL,15,NULL,NULL),
(14,'0930981115','0930981115','insert6@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:56:14',NULL,NULL,16,NULL,NULL),
(15,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:56:31',NULL,NULL,17,NULL,NULL),
(16,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:57:15',NULL,NULL,18,NULL,NULL),
(17,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 02:57:29',NULL,NULL,19,NULL,NULL),
(18,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:00:55',NULL,NULL,20,NULL,NULL),
(19,'0930981116','0930981116','insert7@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:03:07',NULL,NULL,21,NULL,NULL),
(20,'0930981116','0930981116','insert8@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:03:27',NULL,NULL,22,NULL,NULL),
(21,'0930981116','0930981116','insert8@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:05:22',NULL,NULL,23,NULL,NULL),
(22,'0930981110','0930981110','insert9@gmail.c','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:05:50',NULL,NULL,24,NULL,NULL),
(23,'0930981110','0930981110','insert10@gmail.','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:06:35',NULL,NULL,25,NULL,NULL),
(24,'0930981110','0930981110','insert11@gmail.','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:06:55',NULL,NULL,26,NULL,NULL),
(25,'0930981110','0930981110','insert11@gmail.','A','ivnsnbcksbv',3,1,'ADMIN','2020-02-04 03:07:46',NULL,NULL,27,NULL,NULL),
(26,'1','1','','A','',3,1,'ADMIN','2020-02-04 14:48:03',NULL,NULL,28,NULL,NULL),
(27,'12','12','','A','',3,1,'ADMIN','2020-02-04 14:55:52',NULL,NULL,29,NULL,NULL),
(28,'0912345678','0912345678','@gmail.com','A','',1,1,NULL,'2020-02-20 17:16:15',NULL,NULL,30,NULL,NULL),
(29,'0912345678','0912345678','@gmail.com','A','',2,1,NULL,'2020-02-20 17:17:07',NULL,NULL,31,NULL,NULL),
(30,'0921345678','0921345678','@gmail.com','A','',2,1,NULL,'2020-02-20 17:26:52',NULL,NULL,32,NULL,NULL),
(31,'0988744562','0988744562','@gmail.com','A','',2,1,NULL,'2020-02-20 17:39:30',NULL,NULL,33,NULL,NULL),
(32,NULL,NULL,'@gmail.com','A',NULL,4,1,NULL,'2020-04-18 13:10:04',NULL,NULL,27,NULL,NULL),
(33,'0987455887','0987455887','proveedor@gmail.com','A','NINGUNA',8,1,NULL,'2020-05-30 19:01:54','ccordova','2020-06-18 01:46:49',34,'COMERCIAL PROVEEDOR','0912345678'),
(34,'0921548637','0921548637','@gmail.com','A','',4,1,NULL,'2020-08-07 23:25:32',NULL,'2020-08-08 12:09:03',35,NULL,NULL);

/*Table structure for table `ubi_pais` */

DROP TABLE IF EXISTS `ubi_pais`;

CREATE TABLE `ubi_pais` (
  `id_pais` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

/*Data for the table `ubi_pais` */

insert  into `ubi_pais`(`id_pais`,`nombre`,`estado`) values 
(1,'Ecusdor','A'),
(2,'Afganistán','A'),
(3,'Asia Central','A'),
(4,'Albania','A'),
(5,'Argelia','A'),
(6,'Samoa Americana','A'),
(7,'Andorra','A'),
(8,'Angola','A'),
(9,'Anguilla','A'),
(10,'Antártida','A'),
(11,'Antigua y Barbuda','A'),
(12,'Argentina','A'),
(13,'Armenia','A'),
(14,'Aruba','A'),
(15,'Australia','A'),
(16,'Austria','A'),
(17,'Azerbaiyán','A'),
(18,'Bahamas','A'),
(19,'Bahrein','A'),
(20,'Bangladesh','A'),
(21,'Barbados','A'),
(22,'Bielorrusia','A'),
(23,'Bélgica','A'),
(24,'Belice','A'),
(25,'Benín','A'),
(26,'Bermudas','A'),
(27,'Bután','A'),
(28,'Bolivia','A'),
(29,'Bosnia-Herzegovina','A'),
(30,'Botswana','A'),
(31,'Brasil','A'),
(32,'Brunei Darussalam','A'),
(33,'Bulgaria','A'),
(34,'Burkina Faso','A'),
(35,'Burundi','A'),
(36,'Camboya','A'),
(37,'Camerún','A'),
(38,'Canadá','A'),
(39,'Cabo Verde','A'),
(40,'Islas Caimán','A'),
(41,'República Centroafricana','A'),
(42,'Chad','A'),
(43,'Chile','A'),
(44,'China','A'),
(45,'Isla De Navidad. Isla Christmas','A'),
(46,'Islas Cocos','A'),
(47,'Colombia','A'),
(48,'Comores','A'),
(49,'República Democrática del Congo','A'),
(50,'República del Congo','A'),
(51,'Islas Cook','A'),
(52,'Costa Rica','A'),
(53,'Costa de Marfil','A'),
(54,'Croacia','A'),
(55,'Cuba','A'),
(56,'Chipre','A'),
(57,'República Checa','A'),
(58,'Dinamarca','A'),
(59,'Djibouti. Yibuti','A'),
(60,'Dominica','A'),
(61,'República Dominicana','A'),
(62,'Timor Oriental','A'),
(63,'Egipto','A'),
(64,'El Salvador','A'),
(65,'Guinea Ecuatorial','A'),
(66,'Eritrea','A'),
(67,'Estonia','A'),
(68,'Etiopía','A'),
(69,'Islas Malvinas','A'),
(70,'Islas Feroe','A'),
(71,'Fiyi','A'),
(72,'Finlandia','A'),
(73,'Francia','A'),
(74,'Guayana Francesa','A'),
(75,'Polinesia Francesa','A'),
(76,'Tierras Australes y Antárticas Francesas','A'),
(77,'Gabón','A'),
(78,'Gambia','A'),
(79,'Georgia','A'),
(80,'Alemania','A'),
(81,'Ghana','A'),
(82,'Gibraltar','A'),
(83,'Gran Bretaña','A'),
(84,'Grecia','A'),
(85,'Groenlandia','A'),
(86,'Granada','A'),
(87,'Guadalupe','A'),
(88,'Guam','A'),
(89,'Guatemala','A'),
(90,'República Guinea','A'),
(91,'Guinea Bissau','A'),
(92,'Guyana','A'),
(93,'Spanish Name - Nombre Español','A'),
(94,'Haiti','A'),
(95,'Santa Sede. Vaticano. Ciudad del Vatican','A'),
(96,'Honduras','A'),
(97,'Hong Kong','A'),
(98,'Hungría','A'),
(99,'Islandia','A'),
(100,'India','A'),
(101,'Indonesia','A'),
(102,'Irán','A'),
(103,'Iraq','A'),
(104,'Irlanda','A'),
(105,'Israel','A'),
(106,'Italia','A'),
(107,'Jamaica','A'),
(108,'Japón','A'),
(109,'Jordania','A'),
(110,'Kazajstán','A'),
(111,'Kenia','A'),
(112,'Kiribati','A'),
(113,'Corea del Norte','A'),
(114,'Corea del Sur','A'),
(115,'Kosovo','A'),
(116,'Kuwait','A'),
(117,'Kirguistán','A'),
(118,'República Democrática Popular Lao','A'),
(119,'Letonia','A'),
(120,'Líbano','A'),
(121,'Lesotho','A'),
(122,'Liberia','A'),
(123,'Libia','A'),
(124,'Liechtenstein','A'),
(125,'Lituania','A'),
(126,'Luxemburgo','A'),
(127,'Macao','A'),
(128,'Macedonia','A'),
(129,'Madagascar','A'),
(130,'Malawi','A'),
(131,'Malasia','A'),
(132,'Maldivas','A'),
(133,'Malí','A'),
(134,'Malta','A'),
(135,'Islas Marshall','A'),
(136,'Martinica','A'),
(137,'Mauritania','A'),
(138,'Mauricio','A'),
(139,'Mayotte','A'),
(140,'México','A'),
(141,'Micronesia','A'),
(142,'Moldavia','A'),
(143,'Mónaco','A'),
(144,'Mongolia','A'),
(145,'Montenegro','A'),
(146,'Montserrat','A'),
(147,'Marruecos','A'),
(148,'Mozambique','A'),
(149,'Myanmar. Birmania','A'),
(150,'Namibia','A'),
(151,'Nauru','A'),
(152,'Nepal','A'),
(153,'Países Bajos. Holanda','A'),
(154,'Antillas Holandesas','A'),
(155,'Nueva Caledonia','A'),
(156,'Nueva Zelanda','A'),
(157,'Nicaragua','A'),
(158,'Niger','A'),
(159,'Nigeria','A'),
(160,'Niue','A'),
(161,'Marianas del Norte','A'),
(162,'Noruega','A'),
(163,'Omán','A'),
(164,'Pakistán','A'),
(165,'Palau','A'),
(166,'Territorios Palestinos','A'),
(167,'Panamá','A'),
(168,'Papúa-Nueva Guinea','A'),
(169,'Paraguay','A'),
(170,'Perú','A'),
(171,'Filipinas','A'),
(172,'Isla Pitcairn','A'),
(173,'Polonia','A'),
(174,'Portugal','A'),
(175,'Puerto Rico','A'),
(176,'Qatar','A'),
(177,'Reunión','A'),
(178,'Rumanía','A'),
(179,'Federación Rusa','A'),
(180,'Ruanda','A'),
(181,'San Cristobal y Nevis','A'),
(182,'Santa Lucía','A'),
(183,'San Vincente y Granadinas','A'),
(184,'Samoa','A'),
(185,'San Marino','A'),
(186,'Santo Tomé y Príncipe','A'),
(187,'Arabia Saudita','A'),
(188,'Senegal','A'),
(189,'Serbia','A'),
(190,'Seychelles','A'),
(191,'Sierra Leona','A'),
(192,'Singapur','A'),
(193,'Eslovaquia','A'),
(194,'Eslovenia','A'),
(195,'Islas Salomón','A'),
(196,'Somalia','A'),
(197,'Sudáfrica','A'),
(198,'Sudán del Sur','A'),
(199,'España','A'),
(200,'Sri Lanka','A'),
(201,'Sudán','A'),
(202,'Surinam','A'),
(203,'Swazilandia','A'),
(204,'Suecia','A'),
(205,'Suiza','A'),
(206,'Siria','A'),
(207,'Taiwan','A'),
(208,'Tadjikistan','A'),
(209,'Tanzania','A'),
(210,'Tailandia','A'),
(211,'Tíbet','A'),
(212,'Timor Oriental','A'),
(213,'Togo','A'),
(214,'Tokelau','A'),
(215,'Tonga','A'),
(216,'Trinidad y Tobago','A'),
(217,'Túnez','A'),
(218,'Turquía','A'),
(219,'Turkmenistan','A'),
(220,'Islas Turcas y Caicos','A'),
(221,'Tuvalu','A'),
(222,'Uganda','A'),
(223,'Ucrania','A'),
(224,'Emiratos Árabes Unidos','A'),
(225,'Reino Unido','A'),
(226,'Estados Unidos','A'),
(227,'Uruguay','A'),
(228,'Uzbekistán','A'),
(229,'Vanuatu','A'),
(230,'Ciudad del Vaticano','A'),
(231,'Venezuela','A'),
(232,'Vietnam','A'),
(233,'Islas Virgenes Británicas','A'),
(234,'Islas Virgenes Americanas','A'),
(235,'Wallis y Futuna','A'),
(236,'Sáhara Occidental','A'),
(237,'Yemen','A'),
(238,'Zambia','A'),
(239,'Zimbabwe','A');

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

insert  into `ubi_provincia`(`id_provincia`,`nombre`,`estado`,`id_pais`) values 
(1,'Azuay','A',1),
(2,'Bolivar','A',1),
(3,'Cañar','A',1),
(4,'Carchi','A',1),
(5,'Cotopaxi','A',1),
(6,'Chimborazo','A',1),
(7,'El Oro','A',1),
(8,'Esmeraldas','A',1),
(9,'Guayas','A',1),
(10,'Imbabura','A',1),
(11,'Loja','A',1),
(12,'Los Ríos','A',1),
(13,'Manabí','A',1),
(14,'Morona Santiago','A',1),
(15,'Napo','A',1),
(16,'Pastaza','A',1),
(17,'Pichincha','A',1),
(18,'Tungurahua','A',1),
(19,'Zamora Chinchipe','A',1),
(20,'Galápagos','A',1),
(21,'Sucumbios','A',1),
(22,'Orellana','A',1),
(23,'Santo Domingo de los Tsáchilas','A',1),
(24,'Santa Elena','A',1);

/*Table structure for table `ven_cabecera_venta` */

DROP TABLE IF EXISTS `ven_cabecera_venta`;

CREATE TABLE `ven_cabecera_venta` (
  `id_cabecera` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) DEFAULT NULL,
  `num_fact` varchar(20) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `forma_pago` varchar(15) DEFAULT NULL,
  `f_recibido` datetime DEFAULT NULL,
  `f_verificado` datetime DEFAULT NULL,
  `total_subtotal` double(15,7) DEFAULT NULL,
  `total_iva` double(15,7) DEFAULT NULL,
  `total_descuento` double(15,7) DEFAULT NULL,
  `total_facturado` double(15,7) DEFAULT NULL,
  `usuario_creacion` varchar(80) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `usuario_actulizacion` varchar(80) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cabecera`),
  KEY `id_usuario` (`id_cliente`),
  KEY `index_venta` (`num_fact`),
  CONSTRAINT `ven_cabecera_venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `seg_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `ven_cabecera_venta` */

insert  into `ven_cabecera_venta`(`id_cabecera`,`id_cliente`,`num_fact`,`id_sucursal`,`estado`,`forma_pago`,`f_recibido`,`f_verificado`,`total_subtotal`,`total_iva`,`total_descuento`,`total_facturado`,`usuario_creacion`,`f_creacion`,`usuario_actulizacion`,`f_actualizacion`) values 
(2,27,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-24 11:46:31',NULL,NULL),
(3,27,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-24 16:25:05',NULL,NULL),
(4,27,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-24 17:50:24',NULL,NULL),
(5,1,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-28 11:35:07',NULL,NULL),
(6,1,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-28 11:36:41',NULL,NULL),
(7,1,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-28 11:38:44',NULL,NULL),
(8,1,NULL,1,'A','CONTADO',NULL,NULL,30.0000000,3.6000000,2.5000000,31.1000000,'ccordova','2020-04-28 11:39:44',NULL,NULL),
(9,1,NULL,1,'A','CONTADO',NULL,NULL,150.0000000,18.0000000,0.0000000,168.0000000,'ccordova','2020-05-23 11:32:34',NULL,NULL),
(10,1,NULL,1,'A','CONTADO',NULL,NULL,625.0000000,75.0000000,0.0000000,700.0000000,'ccordova','2020-05-23 11:36:53',NULL,NULL),
(11,1,NULL,1,'A','CONTADO',NULL,NULL,25.0000000,3.0000000,0.0000000,28.0000000,'ccordova','2020-05-23 15:43:42',NULL,NULL),
(12,1,NULL,1,'A','CONTADO',NULL,NULL,25.0000000,3.0000000,0.0000000,28.0000000,'ccordova','2020-05-23 15:54:23',NULL,NULL),
(13,1,NULL,1,'A','CONTADO',NULL,NULL,120.0000000,14.4000000,6.0000000,128.4000000,'ccordova','2020-07-30 13:59:14',NULL,NULL);

/*Table structure for table `ven_caja` */

DROP TABLE IF EXISTS `ven_caja`;

CREATE TABLE `ven_caja` (
  `id_caja` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `u_creacion` varchar(40) DEFAULT NULL,
  `f_creacion` datetime DEFAULT NULL,
  `u_actualizacion` varchar(40) DEFAULT NULL,
  `f_actualizacion` datetime DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ven_caja` */

insert  into `ven_caja`(`id_caja`,`nombre`,`estado`,`u_creacion`,`f_creacion`,`u_actualizacion`,`f_actualizacion`,`id_sucursal`) values 
(1,'caja 1','A','YO','2020-08-08 22:07:15','YO','2020-08-09 22:29:15',1),
(2,'caja 2','A','YO','2020-08-09 19:26:58','YO','2020-08-09 22:44:44',1);

/*Table structure for table `ven_caja_detalle` */

DROP TABLE IF EXISTS `ven_caja_detalle`;

CREATE TABLE `ven_caja_detalle` (
  `id_caja` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `f_inicio` datetime DEFAULT NULL,
  `f_cierre` datetime DEFAULT NULL,
  `dinero_inicio` double DEFAULT NULL,
  `dinero_cierre` double DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `dinero_venta` double DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ven_caja_detalle` */

insert  into `ven_caja_detalle`(`id_caja`,`id_usuario`,`f_inicio`,`f_cierre`,`dinero_inicio`,`dinero_cierre`,`estado`,`dinero_venta`,`id_sucursal`,`fecha`) values 
(1,2,'2020-08-12 00:18:59',NULL,20,0,'A',0,1,NULL);

/*Table structure for table `ven_detalle_venta` */

DROP TABLE IF EXISTS `ven_detalle_venta`;

CREATE TABLE `ven_detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `linea_detalle` int(4) DEFAULT NULL,
  `id_cabecera` bigint(20) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio_unitario` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `decuento` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_venta`),
  KEY `id_factura` (`id_cabecera`),
  CONSTRAINT `ven_detalle_venta_ibfk_1` FOREIGN KEY (`id_cabecera`) REFERENCES `ven_cabecera_venta` (`id_cabecera`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `ven_detalle_venta` */

insert  into `ven_detalle_venta`(`id_detalle_venta`,`linea_detalle`,`id_cabecera`,`id_producto`,`cantidad`,`descripcion`,`precio_unitario`,`sub_total`,`iva`,`decuento`,`total`,`estado`) values 
(1,1,4,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',30,30,3.6,2.5,31.1,'A'),
(2,1,5,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',30,30,3.6,2.5,31.1,'A'),
(3,1,6,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',30,30,3.6,2.5,31.1,'A'),
(4,1,7,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',30,30,3.6,2.5,31.1,'A'),
(5,1,8,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',30,30,3.6,2.5,31.1,'A'),
(6,1,9,1,6,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',25,150,18,0,168,'A'),
(7,1,10,1,25,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',25,625,75,0,700,'A'),
(8,1,11,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',25,25,3,0,28,'A'),
(9,1,12,1,1,'CORREA POLY V DE RENAULT 4 FAMILIAR 0.7 DE 04.1962, 20 CV CAJA NINGUNA',25,25,3,0,28,'A'),
(10,1,13,17,4,'NEUMATICO CHEVROLET - MEDIDA: 23-32',30,120,14.4,6,128.4,'A');

/* Function  structure for function  `id_cabecera_compra` */

/*!50003 DROP FUNCTION IF EXISTS `id_cabecera_compra` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`pincay`@`%` FUNCTION `id_cabecera_compra`(id_proveedor1 INT(11),id_sucursal1 INT(11),
                                                            total DOUBLE(15,7),fecha_creacion1 DATETIME) RETURNS int(11)
BEGIN
       DECLARE valor INT; 
          
          SELECT `id_cabecera` INTO valor
          FROM `co_orden_compra` WHERE `id_proveedor`=id_proveedor1 AND `id_sucursal` = id_sucursal1 
                    AND `total_facturado`= total AND `f_creacion` = fecha_creacion1;
       
       RETURN valor;
    END */$$
DELIMITER ;

/* Function  structure for function  `id_cabecera_venta` */

/*!50003 DROP FUNCTION IF EXISTS `id_cabecera_venta` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`pincay`@`%` FUNCTION `id_cabecera_venta`(id_cliente1 int(11),id_sucursal1 int(11),
                                                            total double(15,7),fecha_creacion1 datetime) RETURNS int(11)
BEGIN
       DECLARE valor INT; 
          
          select `id_cabecera` into valor
          from `ven_cabecera_venta` where `id_cliente`=id_cliente1 and `id_sucursal` = id_sucursal1 
                    and `total_facturado`= total and `f_creacion` = fecha_creacion1;
       
       return valor;
    END */$$
DELIMITER ;
