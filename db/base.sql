/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.3.15-MariaDB : Database - home_seguroardu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`home_seguroardu` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `home_seguroardu`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Codigo_admin` int(5) NOT NULL,
  `Nombre_admin` varchar(10) DEFAULT NULL,
  `Apellido_admin` varchar(20) DEFAULT NULL,
  `usuario_admin` varchar(15) DEFAULT NULL,
  `pass_admin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Codigo_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`Codigo_admin`,`Nombre_admin`,`Apellido_admin`,`usuario_admin`,`pass_admin`) values (1,'admin','admin','admin','admin');

/*Table structure for table `registro_de_actividad` */

DROP TABLE IF EXISTS `registro_de_actividad`;

CREATE TABLE `registro_de_actividad` (
  `Codigo_actividad` int(5) NOT NULL,
  `fecha_actividad` date DEFAULT NULL,
  `hora_actividad` time DEFAULT NULL,
  `situacion_actividad` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Codigo_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `registro_de_actividad` */

/*Table structure for table `seguridad` */

DROP TABLE IF EXISTS `seguridad`;

CREATE TABLE `seguridad` (
  `Codigo_seguridad` int(5) NOT NULL,
  `pass_seguridad` int(6) DEFAULT NULL,
  PRIMARY KEY (`Codigo_seguridad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `seguridad` */

insert  into `seguridad`(`Codigo_seguridad`,`pass_seguridad`) values (1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
