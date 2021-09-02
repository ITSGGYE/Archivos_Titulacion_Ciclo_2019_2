CREATE DATABASE  IF NOT EXISTS `GUANABASO` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `GUANABASO`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 3.14.82.157    Database: GUANABASO
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `FACTURAS`
--

DROP TABLE IF EXISTS `FACTURAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FACTURAS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_FACTURA` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CEDULA_VENDEDOR` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CEDULA_CLIENTE` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NOMBRES_CLIENTE` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TELEFONO_CLIENTE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `COD_TRANSACCION` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FECHA_TRANSACCION` date NOT NULL,
  `HORA_TRANSACCION` time NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `COD_FACTURA` (`COD_FACTURA`),
  UNIQUE KEY `COD_TRANSACCION` (`COD_TRANSACCION`),
  KEY `CEDULA_VENDEDOR` (`CEDULA_VENDEDOR`),
  KEY `FECHA_TRANSACCION` (`FECHA_TRANSACCION`),
  CONSTRAINT `CODIGO_TRANSACCION` FOREIGN KEY (`COD_TRANSACCION`) REFERENCES `TRANSACCIONES` (`COD_TRANSACCION`) ON UPDATE CASCADE,
  CONSTRAINT `VENDEDOR_FACTURA` FOREIGN KEY (`CEDULA_VENDEDOR`) REFERENCES `VENDEDORES` (`CEDULA_VENDEDOR`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FACTURAS`
--

LOCK TABLES `FACTURAS` WRITE;
/*!40000 ALTER TABLE `FACTURAS` DISABLE KEYS */;
INSERT INTO `FACTURAS` VALUES (1,'1000','0952989953','0952989952','JOSUE ZAMBRANO','0992181293','T-19','2020-04-02','02:46:47'),(2,'1001','0952989953','0952989952','JOSUE ZAMBRANO','0992181293','T-20','2020-04-02','03:04:10'),(3,'1002','0952989953','0952989952','JOSUE ZAMBRANO','0992181293','T-21','2020-04-02','04:09:14'),(4,'1003','0952989953','0952989964','JOSE REYES','0992181294','T-25','2020-04-02','04:36:02'),(5,'1004','0952989952','092323 1377','JOSEITO ','2986353','T-28','2020-05-22','14:34:46'),(6,'1005','0992181293','092323 1377','JOSEITO ','29864646','T-29','2020-05-22','18:24:12'),(7,'1006','0992181293','092323 1377','JOSEITO ','2986253','T-33','2020-05-27','20:04:12'),(8,'1007','0992181293','092323 1377','MIGUEL ','0936363639','T-35','2020-05-27','20:10:09'),(9,'1008','0992181293','092323 1377','JOSEITO ','2989393','T-37','2020-05-30','16:58:06'),(10,'1009','0952989953','0915343008	','carmen vizueta','0987654321','T-38','2020-05-30','20:41:43'),(11,'1010','0992181293','092323 1377','cheito ','2986353','T-40','2020-06-02','21:47:45'),(12,'1011','0952989953','','','','T-41','2020-06-17','18:23:53');
/*!40000 ALTER TABLE `FACTURAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HISTORY_TRANSACCION`
--

DROP TABLE IF EXISTS `HISTORY_TRANSACCION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `HISTORY_TRANSACCION` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TYPE_CODE` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `DESCRIPCION` text COLLATE utf8mb4_general_ci NOT NULL,
  `ROW_AFFECT` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `ITEMS` int NOT NULL,
  `DATE` date NOT NULL,
  `TIME` time NOT NULL,
  `DATA` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`ID`),
  KEY `HISTORY_TYPE_CODE` (`TYPE_CODE`),
  CONSTRAINT `HISTORY_TYPE_CODE` FOREIGN KEY (`TYPE_CODE`) REFERENCES `TYPES_CODES` (`COD_TYPE`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HISTORY_TRANSACCION`
--

LOCK TABLES `HISTORY_TRANSACCION` WRITE;
/*!40000 ALTER TABLE `HISTORY_TRANSACCION` DISABLE KEYS */;
INSERT INTO `HISTORY_TRANSACCION` VALUES (1,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P01',7,'2020-03-12','20:02:16',NULL),(9,'CD-INS-INV','HOLA','P01',90,'2020-03-12','20:54:21',NULL),(10,'CD-INS-INV','HOLA','P01',90,'2020-03-12','20:54:39',NULL),(11,'CD-INS-INV','HI','P01',7,'2020-03-12','20:59:14',NULL),(12,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P06',3,'2020-03-12','21:14:15',NULL),(13,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P07',20,'2020-03-12','21:17:15',NULL),(14,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P07',20,'2020-03-12','21:18:10',NULL),(15,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P03',60,'2020-03-12','21:18:42',NULL),(16,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P04',78,'2020-03-12','21:20:15',NULL),(17,'CD-INS-PRO','SE AGREGO UN NUEVO PRODUCTO','P08',0,'2020-03-12','21:23:11',NULL),(18,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P01',2,'2020-05-22','13:46:34','NONE'),(19,'CD-UPD-PRO','SE ACTUALIZO UN NUEVO PRODUCTO','P08',0,'2020-05-22','16:11:02','CODIGO DEL PRODUICTO: P08 NOMBRE DEL PRODUCTO: JUGO DE GUANABANA  TIPO DE PRESENTACI√ìN: GUA-PR-250 PRECIO: 0.9'),(20,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P05',50,'2020-05-22','16:13:09','NONE'),(21,'CD-INS-PRO','SE AGREGO UN NUEVO PRODUCTO','P09',0,'2020-05-22','16:16:06','NONE'),(22,'CD-INS-PRO','SE AGREGO UN NUEVO PRODUCTO','P010',0,'2020-05-22','16:16:58','NONE'),(23,'CD-UPD-PRO','SE ACTUALIZO UN NUEVO PRODUCTO','P09',0,'2020-05-22','16:17:34','CODIGO DEL PRODUICTO: P09 NOMBRE DEL PRODUCTO: JUGOS DE LIM√ìN-NATURAL TIPO DE PRESENTACI√ìN: GUA-PR-250 PRECIO: 1.25'),(24,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P02',12,'2020-05-22','16:40:44','NONE'),(25,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P04',6,'2020-05-22','16:41:02','NONE'),(26,'CD-UPD-PRO','SE ACTUALIZO UN NUEVO PRODUCTO','P02',0,'2020-05-27','21:52:58','CODIGO DEL PRODUICTO: P02 NOMBRE DEL PRODUCTO: JUGO DE GUANABANA CON GUINEO TIPO DE PRESENTACI√ìN: GUA-PR-250 PRECIO: 2'),(27,'CD-UPD-PRO','SE ACTUALIZO UN NUEVO PRODUCTO','P05',0,'2020-05-27','21:53:14','CODIGO DEL PRODUICTO: P05 NOMBRE DEL PRODUCTO: JUGO DE GUAYABA TIPO DE PRESENTACI√ìN: GUA-PR-250 PRECIO: 12'),(28,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P02',10,'2020-06-03','02:49:47','NONE'),(29,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P03',20,'2020-06-03','02:50:03','NONE'),(30,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P08',20,'2020-06-03','02:50:32','NONE'),(31,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P09',15,'2020-06-03','02:50:42','NONE'),(32,'CD-INS-INV','SE AGREGO UN NUEVO ITEM','P010',9,'2020-06-03','02:50:59','NONE');
/*!40000 ALTER TABLE `HISTORY_TRANSACCION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `INVENTARIO_PRODUCTO`
--

DROP TABLE IF EXISTS `INVENTARIO_PRODUCTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `INVENTARIO_PRODUCTO` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_PRODUCTO` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CANTIDAD` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `COD_PRODUCTO` (`COD_PRODUCTO`),
  KEY `CANTIDAD` (`CANTIDAD`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `INVENTARIO_PRODUCTO`
--

LOCK TABLES `INVENTARIO_PRODUCTO` WRITE;
/*!40000 ALTER TABLE `INVENTARIO_PRODUCTO` DISABLE KEYS */;
INSERT INTO `INVENTARIO_PRODUCTO` VALUES (1,'P01',70),(2,'P02',10),(3,'P03',20),(4,'P04',6),(5,'P05',50),(6,'P06',3),(7,'P07',40),(8,'P08',20),(9,'P09',15),(10,'P010',9);
/*!40000 ALTER TABLE `INVENTARIO_PRODUCTO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PERSONAS`
--

DROP TABLE IF EXISTS `PERSONAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PERSONAS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CEDULA` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PRIMER_NOMBRE` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SEGUNDO_NOMBRE` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PRIMER_APELLIDO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SEGUNDO_APELLIDO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL DEFAULT '1900-01-01',
  `DIRECCION` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TELEFONO` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CELULAR` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CORREO` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CEDULA` (`CEDULA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PERSONAS`
--

LOCK TABLES `PERSONAS` WRITE;
/*!40000 ALTER TABLE `PERSONAS` DISABLE KEYS */;
INSERT INTO `PERSONAS` VALUES (1,'0952989952','JOSUE','SALOMON','ZAMBRANO','REYES','1900-01-01','ISLA TRINITARIA COOP. INDEPENDENCIA 2 MZ. 1047 SL. 3','0992181293','0992181293','josuezambranoreyes3h@gmail.com'),(2,'0952989953','JOSE ','MIGUEL','ZU√ëIGA','LEON','1995-08-14','28 de agosto','2986353','0967420732','zunigajose1995@gmail.com'),(3,'0952989954','ROSA','CATALINA','REYES','VILLON','2020-03-16','Isla Trinitaria Coop. Independencia 2 Mz. 1047 Sl.3, Casa Color Verde de una planta alfrente tienda','0962545642','0992181293','ROSA@ROSA.COM'),(4,'0992181293','DEBORA','REBECA','ZAMBRANO','REYES','2020-03-02','Isla Trinitaria Coop. Independencia 2 Mz. 1047 Sl.3, Casa Color Verde de una planta alfrente tienda','0962545642','0987654321','DEBORA@DEBORA.COM');
/*!40000 ALTER TABLE `PERSONAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCTOS`
--

DROP TABLE IF EXISTS `PRODUCTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PRODUCTOS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_PRODUCTO` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NOMBRE_PRODUCTO` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TIPO_PRESENTACION` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PRECIO` float(4,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `COD_PRODUCTO` (`COD_PRODUCTO`),
  KEY `TIPO_PRESENTACION` (`TIPO_PRESENTACION`),
  KEY `PRECIO` (`PRECIO`),
  CONSTRAINT `PRESENTACION_PRODUCTO` FOREIGN KEY (`TIPO_PRESENTACION`) REFERENCES `TIPO_PRESENTACIONES` (`COD_PRESENTACION`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTOS`
--

LOCK TABLES `PRODUCTOS` WRITE;
/*!40000 ALTER TABLE `PRODUCTOS` DISABLE KEYS */;
INSERT INTO `PRODUCTOS` VALUES (1,'P01','JUGO DE GUANABANA CON GUINEO','GUA-PR-250',1.25),(2,'P02','JUGO DE GUANABANA CON GUINEO','GUA-PR-250',1.75),(3,'P03','JUGO DE GUANABANA CON GUINEO','GUA-PR-250',1.00),(4,'P04','JUGO DE GUAYABA','GUA-PR-250',1.25),(5,'P05','JUGO DE GUAYABA','GUA-PR-250',1.20),(6,'P06','JUGO DE GUANABANA ','GUA-PR-250',1.00),(7,'P07','JUGO DE GUANABANA CON GUINEO','GUA-PR-250',1.00),(8,'P08','JUGO DE GUANABANA ','GUA-PR-250',0.90),(9,'P09','JUGOS DE LIM√ìN-NATURAL','GUA-PR-250',1.25),(10,'P010','JUGO DE GUANABANA CON PITAHAYA ','GUA-PR-250',1.00);
/*!40000 ALTER TABLE `PRODUCTOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TIPO_PRESENTACIONES`
--

DROP TABLE IF EXISTS `TIPO_PRESENTACIONES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TIPO_PRESENTACIONES` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_PRESENTACION` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TAMA√ëO_PRESENTACION` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `COD_PRESENTACION` (`COD_PRESENTACION`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TIPO_PRESENTACIONES`
--

LOCK TABLES `TIPO_PRESENTACIONES` WRITE;
/*!40000 ALTER TABLE `TIPO_PRESENTACIONES` DISABLE KEYS */;
INSERT INTO `TIPO_PRESENTACIONES` VALUES (1,'GUA-PR-250','250 ML');
/*!40000 ALTER TABLE `TIPO_PRESENTACIONES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TRANSACCIONES`
--

DROP TABLE IF EXISTS `TRANSACCIONES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TRANSACCIONES` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_TRANSACCION` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CANTIDAD_PRODUCTO` int NOT NULL,
  `COD_PRODUCTO` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `COD_PRODUCTO` (`COD_PRODUCTO`),
  KEY `COD_TRANSACCION` (`COD_TRANSACCION`),
  CONSTRAINT `TRANS_PRODUCTO` FOREIGN KEY (`COD_PRODUCTO`) REFERENCES `PRODUCTOS` (`COD_PRODUCTO`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TRANSACCIONES`
--

LOCK TABLES `TRANSACCIONES` WRITE;
/*!40000 ALTER TABLE `TRANSACCIONES` DISABLE KEYS */;
INSERT INTO `TRANSACCIONES` VALUES (5,'T-0',3,'P03'),(6,'T-0',3,'P03'),(7,'T-Array',3,'P03'),(8,'T-Array',3,'P03'),(9,'T-8',3,'P03'),(10,'T-8',3,'P03'),(11,'T-10',3,'P03'),(12,'T-10',3,'P03'),(13,'T-12',3,'P03'),(14,'T-12',3,'P03'),(15,'T-14',3,'P03'),(16,'T-14',3,'P03'),(17,'T-16',4,'P01'),(18,'T-17',4,'P01'),(19,'T-18',4,'P01'),(20,'T-19',4,'P01'),(21,'T-20',4,'P02'),(22,'T-21',4,'P01'),(23,'T-21',6,'P02'),(24,'T-21',7,'P03'),(25,'T-21',3,'P04'),(26,'T-25',5,'P03'),(28,'T-26',2,'P03'),(29,'T-28',4,'P03'),(30,'T-29',5,'P01'),(31,'T-29',1,'P03'),(32,'T-31',2,'P04'),(33,'T-32',2,'P04'),(34,'T-33',2,'P02'),(35,'T-33',6,'P05'),(36,'T-35',3,'P02'),(37,'T-35',5,'P04'),(38,'T-37',10,'P01'),(39,'T-38',4,'P05'),(40,'T-38',3,'P06'),(41,'T-40',4,'P05'),(42,'T-41',2,'P010');
/*!40000 ALTER TABLE `TRANSACCIONES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TYPES_CODES`
--

DROP TABLE IF EXISTS `TYPES_CODES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TYPES_CODES` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_TYPE` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `NAME_COD_TYPE` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `COD_TYPE` (`COD_TYPE`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TYPES_CODES`
--

LOCK TABLES `TYPES_CODES` WRITE;
/*!40000 ALTER TABLE `TYPES_CODES` DISABLE KEYS */;
INSERT INTO `TYPES_CODES` VALUES (1,'CD-INS-INV','NUEVO ITEMS INVENTARIO'),(2,'CD-DEL-INV','ELIMINACION DE ITEMS INVENTARIO'),(3,'CD-INS-USR','NUEVO USUARIO'),(4,'CD-DEL-USR','ELIMINACION DE USUARIO'),(5,'CD-UPD-USR','ACTUALIZACI√ìN DE USUARIO'),(6,'CD-INS-PRO','NUEVO PRODUCTO'),(7,'CD-DEL-PRO','ELIMINACION DE PRODUCTO'),(8,'CD-UPD-PRO','ACTUALIZACI√ìN DE PRODUCTO');
/*!40000 ALTER TABLE `TYPES_CODES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `USUARIOS` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PASSWORD` blob NOT NULL,
  `TIPO_USUARIO` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USUARIO` (`USUARIO`),
  KEY `TIPO_USUARIO` (`TIPO_USUARIO`),
  CONSTRAINT `USUARIOS` FOREIGN KEY (`USUARIO`) REFERENCES `PERSONAS` (`CEDULA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (3,'0952989952',_binary '\Ÿ\ﬁgX3GTæ\—N\…(¡',1),(4,'0952989953',_binary 'vÅØ®Ü\ÌLt˝\’r\ÿG&+',2),(5,'0952989954',_binary '\Ë+Ωf(\’:!µ\Z/áúº\„<',2),(6,'0992181293',_binary '[W∑\Áâuu*™#\Â',2);
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VENDEDORES`
--

DROP TABLE IF EXISTS `VENDEDORES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `VENDEDORES` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CEDULA_VENDEDOR` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CEDULA_VENDEDOR` (`CEDULA_VENDEDOR`),
  CONSTRAINT `VENDEDOR` FOREIGN KEY (`CEDULA_VENDEDOR`) REFERENCES `PERSONAS` (`CEDULA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VENDEDORES`
--

LOCK TABLES `VENDEDORES` WRITE;
/*!40000 ALTER TABLE `VENDEDORES` DISABLE KEYS */;
INSERT INTO `VENDEDORES` VALUES (1,'0952989952'),(2,'0952989953'),(3,'0952989954'),(4,'0992181293');
/*!40000 ALTER TABLE `VENDEDORES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'GUANABASO'
--

--
-- Dumping routines for database 'GUANABASO'
--
/*!50003 DROP FUNCTION IF EXISTS `FUNC_ADD_ITEMS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_ADD_ITEMS`(_COD_PRODUCTO varchar(10), _CANTIDAD int) RETURNS int
    READS SQL DATA
    DETERMINISTIC
begin
    DECLARE CODIGO VARCHAR(10);
    DECLARE CANT INT;
    DECLARE NEWCANT INT;
    DECLARE _ID INT;

    SELECT COD_PRODUCTO INTO CODIGO FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
    IF CODIGO <=> _COD_PRODUCTO THEN
        SELECT CANTIDAD INTO CANT FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        SET NEWCANT = _CANTIDAD + CANT;
        SELECT ID INTO _ID FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        UPDATE GUANABASO.INVENTARIO_PRODUCTO SET CANTIDAD = NEWCANT WHERE ID = _ID;
        SET CANT = NULL;
        SELECT CANTIDAD INTO CANT FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        IF CANT <=> NEWCANT THEN
            RETURN 1;
        ELSE
            RETURN 0;
        end if;
    ELSE
        INSERT INTO GUANABASO.INVENTARIO_PRODUCTO (COD_PRODUCTO, CANTIDAD) VALUES (_COD_PRODUCTO, _CANTIDAD);
        SELECT COD_PRODUCTO INTO CODIGO FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        IF CODIGO <=> _COD_PRODUCTO THEN
            RETURN 1;
        ELSE
            RETURN 0;
        end if;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_CREATE_HISTORY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_CREATE_HISTORY`(_TYPE_CODE varchar(10), _DESCRIPCION text,
                                                           _ROW_AFFECTED varchar(20), _ITEMS int, _DATE date,
                                                           _TIME time,_DATA TEXT) RETURNS int
    READS SQL DATA
    DETERMINISTIC
begin
    DECLARE TYPE_CODE_ VARCHAR(10);
    SELECT COD_TYPE INTO TYPE_CODE_ FROM GUANABASO.TYPES_CODES WHERE COD_TYPE = _TYPE_CODE;

    IF TYPE_CODE_ <=> _TYPE_CODE THEN
        INSERT INTO GUANABASO.HISTORY_TRANSACCION(TYPE_CODE, DESCRIPCION, ROW_AFFECT, ITEMS,DATE,TIME,DATA)
        VALUES (_TYPE_CODE, _DESCRIPCION, _ROW_AFFECTED, _ITEMS,_DATE,_TIME,_DATA);
        SET TYPE_CODE_ = NULL;
        SELECT TYPE_CODE INTO TYPE_CODE_ FROM GUANABASO.HISTORY_TRANSACCION WHERE TYPE_CODE = _TYPE_CODE AND DESCRIPCION = _DESCRIPCION AND ROW_AFFECT = _ROW_AFFECTED AND  DATE = _DATE AND TIME = _TIME;
        IF TYPE_CODE_ <=> _TYPE_CODE THEN
            RETURN 1;
        ELSE
            RETURN 0;
        end if;
    ELSE
        RETURN 0;
    END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_CREATE_PERSONAS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_CREATE_PERSONAS`(_CEDULA varchar(13), _PRIMER_NOMBRE varchar(30),
                                                            _SEGUNDO_NOMBRE varchar(30), _PRIMER_APELLIDO varchar(30),
                                                            _SEGUNDO_APELLIDO varchar(30), _FECHA DATE,
                                                            _DIRECCION varchar(200), _TELEFONO varchar(10),
                                                            _CELUALR varchar(10), _CORREO varchar(200)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _CEDULA_ VARCHAR (13);

SELECT 
    CEDULA
INTO _CEDULA_ FROM
    GUANABASO.PERSONAS
WHERE
    CEDULA = _CEDULA;
IF _CEDULA_ <=> _CEDULA THEN
RETURN 1;
ELSE
SET _CEDULA_ = NULL;
INSERT INTO GUANABASO.PERSONAS(CEDULA,PRIMER_NOMBRE,
SEGUNDO_NOMBRE,PRIMER_APELLIDO,
SEGUNDO_APELLIDO,FECHA_NACIMIENTO,DIRECCION,TELEFONO,
CELULAR,CORREO) VALUES (_CEDULA,_PRIMER_NOMBRE,
_SEGUNDO_NOMBRE,_PRIMER_APELLIDO,
_SEGUNDO_APELLIDO,_FECHA,_DIRECCION,_TELEFONO,
_CELUALR,_CORREO);

SELECT 
    CEDULA
INTO _CEDULA_ FROM
    GUANABASO.PERSONAS
WHERE
    CEDULA = _CEDULA;
IF _CEDULA_ <=> _CEDULA THEN 
RETURN 1;
ELSE 
RETURN 0;
END IF;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_CREATE_PRESENTACION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_CREATE_PRESENTACION`(_COD_PRESENTACIONES VARCHAR (10),_TAMA√ëO_PRESENTACION VARCHAR (100)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _COD_PRESENTACION_ VARCHAR (10);
SELECT 
    COD_PRESENTACION
INTO _COD_PRESENTACION_ FROM
    GUANABASO.TIPO_PRESENTACIONES
WHERE
    COD_PRESENTACION = _COD_PRESENTACION;
IF _COD_PRESENTACION_ <=> _COD_PRESENTACION_ THEN 
RETURN 1;
ELSE 
SET _COD_PRESENTACION_ = NULL;
INSERT INTO GUANABASO.TIPO_PRESENTACIONES (COD_PRESENTACION,NOMBRE_PRESENTACIONE) VALUES (_COD_PRESENTACION,_NOMBRE_PRESENTACION);
SELECT 
    COD_PRESENTACION
INTO _COD_PRESENTACION_ FROM
    GUANABASO.TIPO_PRESENTACIONES
WHERE
    COD_PRESENTACION = _COD_PRESENTACION;
IF _COD_PRESENTACION_ <=> _COD_PRESENTACION_ THEN 
RETURN 1;
ELSE
RETURN 0;
END IF;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_CREATE_PRODUCTOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_CREATE_PRODUCTOS`(_COD_PRODUCTO VARCHAR (10),
_NOMBRE_PRODUCTO VARCHAR (200), _TIPO_PRESENTACION VARCHAR (10), _PRECIO FLOAT) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _COD_PRODUCTO_ VARCHAR (10);
SELECT 
    COD_PRODUCTO
INTO _COD_PRODUCTO_ FROM
    GUANABASO.PRODUCTOS
WHERE
    COD_PRODUCTO = _COD_PRODUCTO;
IF _COD_PRODUCTO_ <=> _COD_PRODUCTO THEN 
RETURN 1;
ELSE
SET _COD_PRODUCTO_ = NULL;
INSERT INTO GUANABASO.PRODUCTOS (COD_PRODUCTO,NOMBRE_PRODUCTO,TIPO_PRESENTACION,PRECIO) VALUES (_COD_PRODUCTO,_NOMBRE_PRODUCTO,_TIPO_PRESENTACION,_PRECIO);
SELECT 
    COD_PRODUCTO
INTO _COD_PRODUCTO_ FROM
    GUANABASO.PRODUCTOS
WHERE
    COD_PRODUCTO = _COD_PRODUCTO;
IF _COD_PRODUCTO_ <=> _COD_PRODUCTO THEN 
RETURN 1;
ELSE
RETURN 0;
END IF;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_CREATE_USUARIOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_CREATE_USUARIOS`(_USUARIO VARCHAR (13), _PASSWORD BLOB,
_TIPO_USUARIO INT) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _USUARIO_ VARCHAR (13);
DECLARE KEYENCRYPT BLOB;
DECLARE _PASSWORD_ BLOB;
SELECT 
    USUARIO
INTO _USUARIO_ FROM
    GUANABASO.USUARIOS
WHERE
    USUARIO = _USUARIO;
IF _USUARIO_ <=> _USUARIO THEN 
RETURN 1;
ELSE
SET KEYENCRYPT = MD5("hSvDxA!d=MsjP4v");
SET _PASSWORD_ = AES_ENCRYPT(_USUARIO,KEYENCRYPT);
INSERT INTO GUANABASO.USUARIOS (USUARIO,PASSWORD,TIPO_USUARIO) VALUES (_USUARIO,_PASSWORD_,_TIPO_USUARIO);
SET _USUARIO_ = NULL;
SELECT 
    USUARIO
INTO _USUARIO_ FROM
    GUANABASO.USUARIOS
WHERE
    USUARIO = _USUARIO;
IF _USUARIO_ <=> _USUARIO THEN 
RETURN 1;
ELSE
RETURN 0;
END IF;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_CREATE_VENDEDOR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_CREATE_VENDEDOR`(CEDULA_ VARCHAR (13)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _CEDULA_ VARCHAR (13);
SELECT 
    CEDULA_VENDEDOR
INTO _CEDULA_ FROM
    GUANABASO.VENDEDORES
WHERE
    CEDULA_VENDEDOR = CEDULA_;

IF _CEDULA_ <=> CEDULA_ THEN
RETURN 1;
ELSE
SET _CEDULA_ = NULL;
INSERT INTO GUANABASO.VENDEDORES (CEDULA_VENDEDOR) VALUES (CEDULA_);
SELECT 
    CEDULA_VENDEDOR
INTO _CEDULA_ FROM
    GUANABASO.VENDEDORES
WHERE
    CEDULA_VENDEDOR = CEDULA_;
IF _CEDULA_ <=> CEDULA_ THEN 
RETURN 1;
ELSE
RETURN 0;
END IF;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_LOGIN_VERIFY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_LOGIN_VERIFY`(_USUARIO VARCHAR (13),_PASSWORD VARCHAR (200)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _USUARIO_ VARCHAR (13);
DECLARE _PASSWORD_ BLOB;
DECLARE __PASSWORD BLOB;
DECLARE KEYENCRYPT BLOB;
SET KEYENCRYPT = MD5("hSvDxA!d=MsjP4v");
SET __PASSWORD = AES_ENCRYPT(_PASSWORD,KEYENCRYPT);

SELECT USUARIO INTO _USUARIO_ FROM GUANABASO.USUARIOS WHERE USUARIO = _USUARIO;
IF _USUARIO_ <=> _USUARIO THEN 
SELECT PASSWORD INTO _PASSWORD_ FROM GUANABASO.USUARIOS WHERE USUARIO = _USUARIO AND PASSWORD = __PASSWORD;
IF _PASSWORD_ <=> __PASSWORD THEN 
RETURN 1;
ELSE 
RETURN 3;
END IF;
ELSE
RETURN 2; 
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_NEW_FACTURA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_NEW_FACTURA`(_COD_FACTURA varchar(10), _CEDULA_VENDEDOR varchar(13),
                                                        _CEDULA_CLIENTE varchar(13), NOMBRES varchar(200),
                                                        TELEFONO varchar(10), _COD_TRANSACCION varchar(10)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE NUM_FACT INT;
INSERT INTO GUANABASO.FACTURAS (COD_FACTURA,CEDULA_VENDEDOR,CEDULA_CLIENTE,NOMBRES_CLIENTE,TELEFONO_CLIENTE,COD_TRANSACCION,FECHA_TRANSACCION,HORA_TRANSACCION) VALUES (_COD_FACTURA,_CEDULA_VENDEDOR,_CEDULA_CLIENTE,NOMBRES,TELEFONO,_COD_TRANSACCION,CURDATE(),DATE_FORMAT(NOW(),"%H:%i:%s"));
SELECT COUNT(COD_FACTURA) INTO NUM_FACT FROM GUANABASO.FACTURAS WHERE COD_FACTURA = _COD_FACTURA;
IF NUM_FACT > 0 THEN 
RETURN 1;
ELSE
RETURN 0;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_REMOVE_ITEMS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_REMOVE_ITEMS`(_COD_PRODUCTO varchar(10), _CANTIDAD int) RETURNS int
    READS SQL DATA
    DETERMINISTIC
begin
    DECLARE CODIGO VARCHAR(10);
    DECLARE CANT INT;
    DECLARE NEWCANT INT;
    DECLARE _ID INT;
    DECLARE ITEMSADD INT;

    SELECT COD_PRODUCTO INTO CODIGO FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
    IF CODIGO <=> _COD_PRODUCTO THEN
        SELECT CANTIDAD INTO CANT FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        SET NEWCANT = CANT - _CANTIDAD ;
        IF NEWCANT < 0 THEN
            SET NEWCANT = 0;
        end if;
        SELECT ID INTO _ID FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        UPDATE GUANABASO.INVENTARIO_PRODUCTO SET CANTIDAD = NEWCANT WHERE ID = _ID;
        SET CANT = NULL;
        SELECT CANTIDAD INTO CANT FROM GUANABASO.INVENTARIO_PRODUCTO WHERE COD_PRODUCTO = _COD_PRODUCTO;
        IF CANT <=> NEWCANT THEN
            SET CODIGO = NULL;
            SET CANT = NULL;
            SET NEWCANT = NULL;
            SET _ID = NULL;
            SET ITEMSADD = NULL;
            RETURN 1;
        ELSE
            SET CODIGO = NULL;
            SET CANT = NULL;
            SET NEWCANT = NULL;
            SET _ID = NULL;
            SET ITEMSADD = NULL;
            RETURN 0;
        end if;
    ELSE
        SELECT GUANABASO.FUNC_ADD_ITEMS(_COD_PRODUCTO, 0) INTO ITEMSADD;
        IF ITEMSADD <=> 1 THEN
            SET CODIGO = NULL;
            SET CANT = NULL;
            SET NEWCANT = NULL;
            SET _ID = NULL;
            SET ITEMSADD = NULL;
            RETURN 1;
        ELSE
            SET CODIGO = NULL;
            SET CANT = NULL;
            SET NEWCANT = NULL;
            SET _ID = NULL;
            SET ITEMSADD = NULL;
            RETURN 0;
        end if;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_RESET_PASSWORD` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_RESET_PASSWORD`(CEDULA varchar(13)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
begin
    DECLARE _USUARIO_ VARCHAR(13);
    DECLARE KEYENCRYPT BLOB;
    DECLARE _PASSWORD_ BLOB;
    DECLARE PASSWORD_ BLOB;
    DECLARE _ID INT;
    SELECT USUARIO
    INTO _USUARIO_
    FROM GUANABASO.USUARIOS
    WHERE USUARIO = CEDULA;
    IF _USUARIO_ <=> CEDULA THEN
        SET KEYENCRYPT = MD5("hSvDxA!d=MsjP4v");
        SET _PASSWORD_ = AES_ENCRYPT(CEDULA, KEYENCRYPT);
        SELECT ID INTO _ID FROM GUANABASO.USUARIOS WHERE USUARIO = CEDULA;
        UPDATE GUANABASO.USUARIOS SET PASSWORD = _PASSWORD_ WHERE ID = _ID;
        SELECT PASSWORD
        INTO PASSWORD_
        FROM GUANABASO.USUARIOS
        WHERE USUARIO = CEDULA;
        IF _PASSWORD_ <=> PASSWORD_ THEN
            RETURN 1;
        ELSE
            RETURN 0;
        END IF;
        ELSE
        RETURN 0;
    END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_SET_TRANSACTION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_SET_TRANSACTION`(_COD_TRANSACCION VARCHAR (10),_CANTIDAD INT, _COD_PRODUCTO VARCHAR (10)) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE COUNT_TRANS INT;
INSERT INTO GUANABASO.TRANSACCIONES(COD_TRANSACCION,CANTIDAD_PRODUCTO,COD_PRODUCTO) VALUES (_COD_TRANSACCION,_CANTIDAD,_COD_PRODUCTO);
SELECT COUNT(COD_TRANSACCION) INTO COUNT_TRANS FROM GUANABASO.TRANSACCIONES WHERE COD_TRANSACCION = COD_TRANSACCION;
IF COUNT_TRANS > 0 THEN 
RETURN 1; 
ELSE 
RETURN 0;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_UPDATE_PRODUCTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_UPDATE_PRODUCTO`(_COD_PRODUCTO VARCHAR (10),_NOMBRE_PRODUCTO VARCHAR (200),
_PRESENTACION VARCHAR (10),_PRECIO FLOAT) RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE _ID_ INT;
DECLARE _ID INT;

SELECT ID INTO _ID FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = _COD_PRODUCTO;

IF _ID != 0 THEN 
UPDATE GUANABASO.PRODUCTOS SET NOMBRE_PRODUCTO  = _NOMBRE_PRODUCTO, TIPO_PRESENTACION = _PRESENTACION, PRECIO = _PRECIO WHERE ID = _ID;
SELECT ID INTO _ID_ FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = _COD_PRODUCTO AND NOMBRE_PRODUCTO = _NOMBRE_PRODUCTO AND TIPO_PRESENTACION = _PRESENTACION AND PRECIO = _PRECIO; 
IF _ID <=> _ID_ THEN
RETURN 1;
ELSE
RETURN 0;
END IF;
ELSE 
RETURN 0;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_UPDATE_USER` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_UPDATE_USER`(_CEDULA VARCHAR (13),_TIPO_USUARIO_ INT) RETURNS int
    READS SQL DATA
    DETERMINISTIC
begin
    DECLARE _ID INT;
    DECLARE CEDULA_ VARCHAR (13);
    DECLARE _TIPO_USUARIO INT;
    SELECT USUARIO INTO CEDULA_ FROM GUANABASO.USUARIOS WHERE USUARIO = _CEDULA;
    IF CEDULA_ <=> _CEDULA THEN
            SELECT ID INTO _ID FROM GUANABASO.USUARIOS WHERE USUARIO = _CEDULA;
            UPDATE GUANABASO.USUARIOS SET TIPO_USUARIO = _TIPO_USUARIO_ WHERE ID = _ID;
            SELECT TIPO_USUARIO INTO _TIPO_USUARIO FROM GUANABASO.USUARIOS WHERE ID = _ID;
            IF _TIPO_USUARIO <=> _TIPO_USUARIO_ THEN
                RETURN 1;
                ELSE
                RETURN 0;
            end if;
        ELSE
        RETURN 0;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `FUNC_UPDATE_USUARIOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` FUNCTION `FUNC_UPDATE_USUARIOS`(_CEDULA varchar(13), _PRIMER_NOMBRE varchar(30),
                                     _SEGUNDO_NOMBRE varchar(30), _PRIMER_APELLIDO varchar(30),
                                     _SEGUNDO_APELLIDO varchar(30), _FECHA date,
                                     _DIRECCION varchar(200), _TELEFONO varchar(10),
                                     _CELULAR varchar(10), _CORREO varchar(200),
                                     _TIPO_USUARIO_ int) RETURNS int
    READS SQL DATA
    DETERMINISTIC
begin
    DECLARE CEDULA_ VARCHAR(13);
    DECLARE PRIMER_NOMBRE_ varchar(30);
    DECLARE SEGUNDO_NOMBRE_ varchar(30);
    DECLARE PRIMER_APELLIDO_ varchar(30);
    DECLARE SEGUNDO_APELLIDO_ varchar(30);
    DECLARE FECHA_ date;
    DECLARE DIRECCION_ varchar(200);
    DECLARE TELEFONO_ varchar(10);
    DECLARE CELUALR_ varchar(10);
    DECLARE CORREO_ varchar(200);
    DECLARE TIPO_USUARIO_ int;
    DECLARE ID_ INT;

    SELECT CEDULA INTO CEDULA_ FROM GUANABASO.PERSONAS WHERE CEDULA = _CEDULA;

    IF CEDULA_ <=> _CEDULA THEN
        SELECT ID INTO ID_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        UPDATE GUANABASO.PERSONAS
        SET PRIMER_NOMBRE    = _PRIMER_NOMBRE,
            SEGUNDO_NOMBRE   = _SEGUNDO_NOMBRE,
            PRIMER_APELLIDO  = _PRIMER_APELLIDO,
            SEGUNDO_APELLIDO = _SEGUNDO_APELLIDO,
            FECHA_NACIMIENTO = _FECHA,
            DIRECCION        = _DIRECCION,
            TELEFONO         = _TELEFONO,
            CELULAR          = _CELULAR,
            CORREO           = _CORREO
        WHERE ID = ID_;
        SELECT PRIMER_NOMBRE INTO PRIMER_NOMBRE_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT SEGUNDO_NOMBRE INTO SEGUNDO_NOMBRE_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT PRIMER_APELLIDO INTO PRIMER_APELLIDO_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT SEGUNDO_APELLIDO INTO SEGUNDO_APELLIDO_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT FECHA_NACIMIENTO INTO FECHA_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT DIRECCION INTO DIRECCION_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT TELEFONO INTO TELEFONO_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT CELULAR INTO CELUALR_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;
        SELECT CORREO INTO CORREO_ FROM GUANABASO.PERSONAS WHERE CEDULA = CEDULA_;

        IF ((PRIMER_NOMBRE_ <=> _PRIMER_NOMBRE) AND (SEGUNDO_NOMBRE_ <=> _SEGUNDO_NOMBRE) AND (PRIMER_APELLIDO_ <=> _PRIMER_APELLIDO)
            AND (_SEGUNDO_APELLIDO <=> SEGUNDO_APELLIDO_) AND (FECHA_ <=> _FECHA) AND (_DIRECCION <=> DIRECCION_)
            AND (TELEFONO_ <=> _TELEFONO) AND (CELUALR_ <=> _CELULAR) AND (_CORREO <=> CORREO_)) THEN
            SELECT GUANABASO.FUNC_UPDATE_USER (_CEDULA,_TIPO_USUARIO_) INTO TIPO_USUARIO_;
            IF TIPO_USUARIO_ = 1 THEN
                RETURN 1;
                ELSE
                RETURN 0;
                    END IF;
            ELSE
                RETURN 0;
            END IF;

    ELSE
        RETURN 0;
    end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ADD_ITEMS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `ADD_ITEMS`(IN _COD_PRODUCTO varchar(10), IN _CANTIDAD int, OUT ESTADO text)
BEGIN
DECLARE INVENTARIO INT;
DECLARE TRANSACTION INT ;
DECLARE _DATE DATE;
DECLARE _TIME TIME;
SET AUTOCOMMIT = 0;
START TRANSACTION;

SELECT GUANABASO.FUNC_ADD_ITEMS(_COD_PRODUCTO,_CANTIDAD) INTO INVENTARIO;

IF INVENTARIO <=> 1 THEN
COMMIT;
CALL CREATE_HISTORY("CD-INS-INV","SE AGREGO UN NUEVO ITEM",_COD_PRODUCTO,_CANTIDAD,CURDATE(),CURTIME(), "NONE",@EST);
SET ESTADO = "SE AGREGARON LOS ITEMS CORRECTAMENTE";
ELSE
SET ESTADO = "ERRORES AL AGREGAR LOS ITEMS INTENTE NUEVAMENTE";
ROLLBACK;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CREATE_HISTORY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `CREATE_HISTORY`(IN _TYPE_CODE varchar(10), IN _DESCRIPCION text,
                                                       IN _ROW_AFFECTED varchar(20), IN _ITEMS int, IN _DATE date,
                                                       IN _TIME time, IN _DATA TEXT, OUT EST int)
begin
    DECLARE HISTORY INT;
    SET AUTOCOMMIT = 0;
    START TRANSACTION ;
    SELECT GUANABASO.FUNC_CREATE_HISTORY(_TYPE_CODE, _DESCRIPCION, _ROW_AFFECTED,
                                         _ITEMS,_DATE,_TIME,_DATA)
    INTO HISTORY;

    IF HISTORY <=> 1 THEN
        SET AUTOCOMMIT = 1;
        SET EST = 1;
        COMMIT;
    ELSE
        SET AUTOCOMMIT = 1;
        SET EST = 0;
        ROLLBACK;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CREATE_NEW_FACTURA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `CREATE_NEW_FACTURA`(IN _COD_FACTURA varchar(10), IN _CEDULA_VENDEDOR varchar(13),
                                                        IN _CEDULA_CLIENTE varchar(13),IN _NOMBRES varchar(200),
                                                        IN _TELEFONO varchar(10), _COD_TRANSACCION varchar(10), OUT MENSAJE INT)
begin
    DECLARE FACTURA INT;
    SET AUTOCOMMIT = 0;
    START TRANSACTION ;

    SELECT GUANABASO.FUNC_NEW_FACTURA(_COD_FACTURA,_CEDULA_VENDEDOR,
        _CEDULA_CLIENTE,_NOMBRES,_TELEFONO,_COD_TRANSACCION) INTO FACTURA;
    IF FACTURA = 1 THEN
        SET AUTOCOMMIT = 1;
        COMMIT;
        SET MENSAJE = 1;
        ELSE
        ROLLBACK ;
        SET AUTOCOMMIT = 1;
        SET MENSAJE = 0;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CREATE_NEW_PRODUCT` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `CREATE_NEW_PRODUCT`(IN _COD_PRODUCTO varchar(10),
                                                           IN _NOMBRE_PRODUCTO varchar(200),
                                                           IN _TIPO_PRESENTACION varchar(10), IN _CANTIDAD int,
                                                           IN _PRECIO float, OUT ESTADO text)
BEGIN
DECLARE PRODUCTO INT;
DECLARE INVENTARIO INT;
SET AUTOCOMMIT = 0;
START TRANSACTION;
SELECT 
    GUANABASO.FUNC_CREATE_PRODUCTOS(_COD_PRODUCTO,
            _NOMBRE_PRODUCTO,
            _TIPO_PRESENTACION,_PRECIO)
INTO PRODUCTO;
IF PRODUCTO <=> 1 THEN 
SELECT GUANABASO.FUNC_ADD_ITEMS (_COD_PRODUCTO,_CANTIDAD) INTO INVENTARIO;
IF INVENTARIO <=> 1 THEN 
COMMIT;
CALL CREATE_HISTORY("CD-INS-PRO","SE AGREGO UN NUEVO PRODUCTO",_COD_PRODUCTO,_CANTIDAD,CURDATE(),CURTIME(), "NONE",@EST);
SET ESTADO = "CREADO CON √âXITO";
ELSE
ROLLBACK;
SET ESTADO = "NO SE CREO EL INVENTARIO DEL PRODUCTO, POR FAVOR VUELVA A REGISTRAR EL PRODUCTO || NO SE PROCESARA LA TRASACCI√ìN";
END IF;
ELSE
ROLLBACK;
SET ESTADO = "NO SE CREO EL NUEVO PRODUCTO"; 
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CREATE_NEW_TRANSACTION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `CREATE_NEW_TRANSACTION`(IN _COD_TRANSACTION varchar(10), IN _CANTIDAD int,
                                                               IN _COD_PRODUCTO varchar(10), OUT ESTADO int)
BEGIN
DECLARE TRANSACTION_ INT ;
SET AUTOCOMMIT = 0;
START TRANSACTION;
SELECT GUANABASO.FUNC_SET_TRANSACTION (_COD_TRANSACTION,_CANTIDAD,_COD_PRODUCTO) INTO TRANSACTION_;
IF TRANSACTION_ <=> 1 THEN 
SET ESTADO = 1;
COMMIT;
ELSE
ROLLBACK;
SET ESTADO = 0;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CREATE_USUARIOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `CREATE_USUARIOS`(IN _CEDULA varchar(13), IN _PRIMER_NOMBRE varchar(30),
                                                        IN _SEGUNDO_NOMBRE varchar(30), IN _PRIMER_APELLIDO varchar(30),
                                                        IN _SEGUNDO_APELLIDO varchar(30), IN _FECHA date,
                                                        IN _DIRECCION varchar(200), IN _TELEFONO varchar(10),
                                                        IN _CELUALR varchar(10), IN _CORREO varchar(200),
                                                        IN _TIPO_USUARIO_ int, OUT ESTADO text)
BEGIN
    DECLARE PERSONA INT;
    DECLARE VENDEDOR INT;
    DECLARE USUARIO INT;
    SET AUTOCOMMIT = 0;
    START TRANSACTION ;
    IF TIPO_USUARIO = 1 THEN
        SELECT GUANABASO.FUNC_CREATE_PERSONAS(_CEDULA, _PRIMER_NOMBRE,
                                              _SEGUNDO_NOMBRE, _PRIMER_APELLIDO,
                                              _SEGUNDO_APELLIDO, _FECHA, _DIRECCION,
                                              _TELEFONO, _CELUALR,
                                              _CORREO)
        INTO PERSONA;
        IF PERSONA = 1 THEN
            SELECT GUANABASO.FUNC_CREATE_USUARIOS(_CEDULA, _CEDULA, _TIPO_USUARIO_);
            IF USUARIO = 1 THEN
                SET AUTOCOMMIT = 1;
                COMMIT;
                SET ESTADO = "SE REGISTRO CON √âXITO AL USUARIO";
            ELSE
                ROLLBACK;
                SET AUTOCOMMIT = 1;
                SET ESTADO = "ERROR AL REGISTRAR USUARIO";
            end if;
        ELSE
            ROLLBACK;
            SET AUTOCOMMIT = 1;
            SET ESTADO = "ERROR AL REGISTRAR USUARIO";
        end if;


    ELSE
        IF TIPO_USUARIO = 2 THEN
            SELECT GUANABASO.FUNC_CREATE_PERSONAS(_CEDULA, _PRIMER_NOMBRE,
                                                  _SEGUNDO_NOMBRE, _PRIMER_APELLIDO,
                                                  _SEGUNDO_APELLIDO,_FECHA, _DIRECCION,
                                                  _TELEFONO, _CELUALR,
                                                  _CORREO)
            INTO PERSONA;
            IF PERSONA = 1 THEN
                SELECT GUANABASO.FUNC_CREATE_VENDEDOR(_CEDULA) INTO VENDEDOR;

                IF VENDEDOR = 1 THEN
                    SELECT GUANABASO.FUNC_CREATE_USUARIOS(_CEDULA, _CEDULA, TIPO_USUARIO) INTO USUARIO;
                    IF USUARIO = 1 THEN
                        SET AUTOCOMMIT = 1;
                        COMMIT;
                        SET ESTADO = "SE REGISTRO CON √âXITO AL USUARIO";
                    ELSE
                        ROLLBACK;
                        SET AUTOCOMMIT = 1;
                        SET ESTADO = "ERROR AL REGISTRAR USUARIO";
                    end if;
                ELSE
                    ROLLBACK;
                    SET AUTOCOMMIT = 1;
                    SET ESTADO = "ERROR AL REGISTRAR USUARIO";
                end if;
            ELSE
                ROLLBACK;
                SET AUTOCOMMIT = 1;
                SET ESTADO = "ERROR AL REGISTRAR USUARIO";
            end if;


        ELSE
            ROLLBACK;
            SET AUTOCOMMIT = 1;
            SET ESTADO = "ERROR AL REGISTRAR USUARIO";
        end if;

    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REMOVE_ITEMS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `REMOVE_ITEMS`(IN _COD_PRODUCTO varchar(10), IN _CANTIDAD int, OUT ESTADO text)
BEGIN
DECLARE INVENTARIO INT;
SET AUTOCOMMIT = 0;
START TRANSACTION;

SELECT GUANABASO.FUNC_REMOVE_ITEMS(_COD_PRODUCTO,_CANTIDAD) INTO INVENTARIO;

IF INVENTARIO <=> 1 THEN
SET ESTADO = "SE ELIMINARON LOS ITEMS CORRECTAMENTE";
COMMIT;
ELSE
SET ESTADO = "ERRORES AL AGREGAR LOS ITEMS INTENTE NUEVAMENTE";
ROLLBACK;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RESET_PASSWORD` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `RESET_PASSWORD`(IN CEDULA VARCHAR (13), OUT ESTADO TEXT)
begin
    DECLARE PASS INT;
    SET AUTOCOMMIT = 0;
    START TRANSACTION ;

    SELECT GUANABASO.FUNC_RESET_PASSWORD(CEDULA) INTO PASS;
    IF PASS = 1 THEN
        COMMIT;
        SET AUTOCOMMIT = 1;
        SET ESTADO = "SE RESTABLECIO LA CONTRASE√ëA";
        ELSE
        ROLLBACK ;
        SET AUTOCOMMIT = 1;
        SET ESTADO = "NO SE RESTABLECIO LA CONTRASE√ëA";
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SET_NEW_FACTURA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `SET_NEW_FACTURA`(IN _COD_FACTURA VARCHAR (10),IN _CEDULA_VENDEDOR VARCHAR (13), IN _CEDULA_CLIENTE VARCHAR (13), 
IN _NOMBRES_CLIENTE VARCHAR (200), IN _TELEFONO_CLIENTES VARCHAR (10), IN _COD_TRANSACCION VARCHAR (10),OUT ESTADO TEXT)
BEGIN
DECLARE FACTURA INT;
SET AUTOCOMMIT = 0;
START TRANSACTION;
SELECT GUANABASO.FUNCT_NEW_FACTURA(_COD_FACTURA,_CEDULA_VENDEDOR,_CEDULA_CLIENTE, 
_NOMBRES_CLIENTE,_TELEFONO_CLIENTES,_COD_TRANSACCION) INTO FACTURA;

IF FACTURA <=> 1 THEN
COMMIT; 
SET ESTADO = "TRANSACCION EXITOSA";
ELSE
ROLLBACK;
SET ESTADO = "ERROR EN LA TRANSACCI√ìN POR FAVOR INTENTE NUEVAMENTE";
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UPDATE_PRODUCTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `UPDATE_PRODUCTO`(IN _COD_PRODUCTO varchar(10), IN _NOMBRE_PRODUCTO varchar(200),
                                                        IN _PRESENTACION varchar(10), IN _PRECIO float, OUT ESTADO text)
BEGIN
DECLARE UP INT;
DECLARE DATA TEXT;
DECLARE COD_ VARCHAR(10);
DECLARE NOMBRE_PRODUCTO_ varchar(200);
DECLARE PRESENTACION_ varchar(10);
DECLARE PRECIO_ float;
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET COD_ = _COD_PRODUCTO;
SELECT NOMBRE_PRODUCTO INTO NOMBRE_PRODUCTO_ FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = _COD_PRODUCTO;
SELECT TIPO_PRESENTACION INTO PRESENTACION_ FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = _COD_PRODUCTO;
SELECT PRECIO INTO PRECIO_ FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = _COD_PRODUCTO;
SET DATA = CONCAT("CODIGO DEL PRODUICTO: ",COD_," ","NOMBRE DEL PRODUCTO: ",NOMBRE_PRODUCTO_," ","TIPO DE PRESENTACI√ìN: ",PRESENTACION_," ","PRECIO: ",PRECIO_);
SELECT GUANABASO.FUNC_UPDATE_PRODUCTO(_COD_PRODUCTO,_NOMBRE_PRODUCTO,
_PRESENTACION, _PRECIO) INTO UP;

IF UP <=> 1 THEN
COMMIT;
CALL CREATE_HISTORY("CD-UPD-PRO","SE ACTUALIZO UN NUEVO PRODUCTO",_COD_PRODUCTO,0,CURDATE(),CURTIME(),DATA,@EST);
SET ESTADO = "ACTUALIZADO CON √âXITO";
ELSE 
ROLLBACK; 
SET ESTADO = "ERROR AL ACTUALIZAR EL PRODUCTO";
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UPDATE_USUARIOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`jszambranor`@`%` PROCEDURE `UPDATE_USUARIOS`(IN _CEDULA varchar(13), IN _PRIMER_NOMBRE varchar(30),
                                                        IN _SEGUNDO_NOMBRE varchar(30), IN _PRIMER_APELLIDO varchar(30),
                                                        IN _SEGUNDO_APELLIDO varchar(30), IN _FECHA date,
                                                        IN _DIRECCION varchar(200), IN _TELEFONO varchar(10),
                                                        IN _CELUALR varchar(10), IN _CORREO varchar(200),
                                                        IN _TIPO_USUARIO_ int, OUT ESTADO text)
begin
    DECLARE USUARIO INT;
    SET AUTOCOMMIT = 0;
    START TRANSACTION ;
    SELECT GUANABASO.FUNC_UPDATE_USUARIOS(_CEDULA, _PRIMER_NOMBRE,
                                          _SEGUNDO_NOMBRE, _PRIMER_APELLIDO,
                                          _SEGUNDO_APELLIDO, _FECHA,
                                          _DIRECCION, _TELEFONO,
                                          _CELUALR, _CORREO, _TIPO_USUARIO_)
    INTO USUARIO;
    IF USUARIO = 1 THEN
        COMMIT;
        SET AUTOCOMMIT = 1;
        SET ESTADO = "SE ACTUALIZ√ì CON √âXITO AL USUARIO";
    ELSE
        ROLLBACK;
        SET AUTOCOMMIT = 1;
        SET ESTADO = "OCURRIO UN ERROR AL ACTUALIZAR LOS DATOS DEL USUARIO";
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-11 17:40:40
