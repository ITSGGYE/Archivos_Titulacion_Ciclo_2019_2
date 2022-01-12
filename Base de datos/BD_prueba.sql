-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_prueba
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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) DEFAULT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `sangre` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `fech_nacimiento` date DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `etnia` varchar(45) DEFAULT NULL,
  `domicilio` varchar(250) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `discapacidad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `procedencia` varchar(45) DEFAULT NULL,
  `correo_edu` varchar(150) DEFAULT NULL,
  `codigo_matricula` varchar(25) DEFAULT NULL,
  `fech_matricula` date DEFAULT NULL,
  `fech_admision` date DEFAULT NULL,
  `periodoI` int DEFAULT NULL,
  `periodoF` int DEFAULT NULL,
  `jornada` varchar(45) DEFAULT NULL,
  `grado_id` int NOT NULL,
  PRIMARY KEY (`id`,`grado_id`),
  KEY `fk_alumno_grado1_idx` (`grado_id`),
  CONSTRAINT `fk_alumno_grado1` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) DEFAULT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `sangre` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `fech_nacimiento` date DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `etnia` varchar(45) DEFAULT NULL,
  `domicilio` varchar(250) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `discapacidad` varchar(45) DEFAULT NULL,
  `nivel_edu` varchar(45) DEFAULT NULL,
  `especialidad` varchar(45) DEFAULT NULL,
  `correo_edu` varchar(150) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(60) DEFAULT NULL,
  `nombre_grado` varchar(60) DEFAULT NULL,
  `nivel` varchar(60) DEFAULT NULL,
  `numeros_alumnos` int DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (11,'1555','Segundo B','Segundo',10,'ninguna');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(25) DEFAULT NULL,
  `jornada` varchar(45) DEFAULT NULL,
  `nomb_materia` varchar(45) DEFAULT NULL,
  `grado_id` int NOT NULL,
  PRIMARY KEY (`id`,`grado_id`),
  KEY `fk_materia_grado2_idx` (`grado_id`),
  CONSTRAINT `fk_materia_grado2` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (5,'8561','Matutina','Ingles',11);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nota_uno` decimal(5,2) DEFAULT NULL,
  `nota_dos` decimal(5,2) DEFAULT NULL,
  `nota_tres` decimal(5,2) DEFAULT NULL,
  `promedio` decimal(5,2) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `quimestre` varchar(45) DEFAULT NULL,
  `materia_id` int NOT NULL,
  `alumno_id1` int NOT NULL,
  `grado_id` int NOT NULL,
  PRIMARY KEY (`id`,`materia_id`,`alumno_id1`,`grado_id`),
  KEY `fk_notas_materia1_idx` (`materia_id`),
  KEY `fk_notas_alumno1_idx` (`alumno_id1`),
  KEY `fk_notas_grado1_idx` (`grado_id`),
  CONSTRAINT `fk_notas_alumno1` FOREIGN KEY (`alumno_id1`) REFERENCES `alumno` (`id`),
  CONSTRAINT `fk_notas_grado1` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id`),
  CONSTRAINT `fk_notas_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-22 22:39:09
