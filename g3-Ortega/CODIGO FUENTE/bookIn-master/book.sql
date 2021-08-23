-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2020 a las 18:59:53
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `book`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE `asientos` (
  `id_asiento` int(11) NOT NULL,
  `asiento` int(10) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_capacitacion` int(2) UNSIGNED NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp(),
  `asistencia` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`id_asiento`, `asiento`, `id_empleado`, `id_capacitacion`, `fecha_creacion`, `asistencia`) VALUES
(4, 3, 153, 29, '2020-05-21', 0),
(5, 4, 165, 29, '2020-05-21', 0),
(6, 5, 45, 29, '2020-05-21', 0),
(8, 3, 1, 29, '2020-05-22', 0),
(9, 2, 153, 76, '2020-05-22', 0),
(10, 2, 153, 76, '2020-05-22', 0),
(11, 1, 153, 31, '2020-05-22', 0),
(12, 21, 153, 75, '2020-05-22', 0),
(13, 3, 1, 31, '2020-05-24', 1),
(15, 5, 165, 34, '2020-05-24', 1),
(16, 4, 1, 34, '2020-05-24', 1),
(17, 3, 153, 37, '2020-05-24', 1),
(18, 4, 165, 37, '2020-05-24', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `ID_CAPACITACION` int(2) UNSIGNED NOT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `ID_CAPACITADOR` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capacitaciones`
--

INSERT INTO `capacitaciones` (`ID_CAPACITACION`, `DESCRIPCION`, `FECHA_INICIO`, `FECHA_FIN`, `ID_CAPACITADOR`) VALUES
(1, ' Reglamento Interno de Trabajo de Laboratorios Vida S.A.', '2020-01-06 14:00:00', '2020-01-06 16:00:00', 1),
(2, ' Reglamento Interno de Trabajo de Laboratorios Vida S.A.', '2020-01-10 14:00:00', '2020-01-10 16:00:00', 1),
(3, ' Reglamento Interno de Trabajo de Laboratorios Vida S.A.', '2020-01-15 14:00:00', '2020-01-15 16:00:00', 1),
(4, ' Seguridad y Salud ocupacional', '2020-01-20 14:00:00', '2020-01-20 16:00:00', 2),
(5, ' Seguridad y Salud ocupacional', '2020-01-24 14:00:00', '2020-01-24 16:00:00', 2),
(6, ' Seguridad y Salud ocupacional', '2020-01-30 14:00:00', '2020-01-30 16:00:00', 2),
(7, ' Gestión Ambiental', '2020-02-05 13:00:00', '2020-02-05 14:00:00', 3),
(8, ' Gestión Ambiental', '2020-02-11 13:00:00', '2020-02-11 14:00:00', 3),
(9, ' Gestión Ambiental', '2020-02-14 13:00:00', '2020-02-14 14:00:00', 3),
(10, ' Estructura Organizacional de Laboratorios Vida S.A.', '2020-02-17 13:00:00', '2020-02-17 14:00:00', 4),
(11, ' Estructura Organizacional de Laboratorios Vida S.A.', '2020-02-22 13:00:00', '2020-02-22 14:00:00', 4),
(12, ' Estructura Organizacional de Laboratorios Vida S.A.', '2020-02-28 13:00:00', '2020-02-28 14:00:00', 4),
(13, ' Estructura Organizacional de Laboratorios Vida S.A.', '2020-03-05 09:00:00', '2020-03-05 10:30:00', 5),
(14, ' Personal autorizado para la planta Beta de Laboratorios Vida S.A.', '2020-03-09 09:00:00', '2020-03-09 10:30:00', 5),
(15, ' Personal autorizado para la planta Beta de Laboratorios Vida S.A.', '2020-03-13 09:00:00', '2020-03-13 10:30:00', 5),
(16, ' Personal autorizado para la planta Beta de Laboratorios Vida S.A.', '2020-01-16 14:00:00', '2020-01-16 16:00:00', 2),
(17, ' Personal autorizado para la planta No Beta de Laboratorios Vida S.A..', '2020-01-23 14:00:00', '2020-01-23 16:00:00', 2),
(18, ' Habilidades Gerenciales', '2020-01-31 14:00:00', '2020-01-31 16:00:00', 2),
(19, ' Habilidades Gerenciales', '2020-04-06 09:00:00', '2020-04-06 10:00:00', 3),
(20, ' Habilidades Gerenciales', '2020-04-10 09:00:00', '2020-04-10 10:00:00', 3),
(21, ' Gestión de procesos y mejora continua', '2020-04-15 09:00:00', '2020-04-15 10:00:00', 3),
(22, ' Gestión de procesos y mejora continua', '2020-04-20 09:00:00', '2020-04-20 10:00:00', 4),
(23, ' Gestión de procesos y mejora continua', '2020-04-24 09:00:00', '2020-04-24 10:00:00', 4),
(24, ' Continuidad y estrategía de negocios', '2020-04-30 09:00:00', '2020-04-30 10:00:00', 4),
(25, ' Continuidad y estrategía de negocios', '2020-05-04 09:00:00', '2020-05-04 10:00:00', 5),
(26, ' Continuidad y estrategía de negocios', '2020-05-11 09:00:00', '2020-05-11 10:00:00', 5),
(27, ' Reglamento Interno de Trabajo de Laboratorios Vida S.A.', '2020-05-15 09:00:00', '2020-05-15 10:00:00', 5),
(28, ' Productos Fabricados por Laboratorios Vida S.A.', '2020-05-18 09:00:00', '2020-05-18 10:00:00', 1),
(29, ' Productos Fabricados por Laboratorios Vida S.A.', '2020-05-25 09:00:00', '2020-05-25 10:00:00', 1),
(30, ' Productos Fabricados por Laboratorios Vida S.A.', '2020-05-29 09:00:00', '2020-05-29 10:00:00', 1),
(31, ' Procesos que se deben llevar a cabo en la distribución del sector publico como Privado', '2020-06-04 09:00:00', '2020-06-04 10:00:00', 2),
(32, ' Procesos que se deben llevar a cabo en la distribución del sector publico como Privado', '2020-06-11 09:00:00', '2020-06-11 10:00:00', 2),
(33, ' Procesos que se deben llevar a cabo en la distribución del sector publico como Privado', '2020-06-15 09:00:00', '2020-06-15 10:00:00', 2),
(34, ' Correcto uso de los Equipos de Bioseguridad', '2020-06-19 09:00:00', '2020-06-19 10:00:00', 3),
(35, ' Correcto uso de los Equipos de Bioseguridad', '2020-06-23 09:00:00', '2020-06-23 10:00:00', 3),
(36, ' Correcto uso de los Equipos de Bioseguridad', '2020-06-30 09:00:00', '2020-06-30 10:00:00', 3),
(37, ' Higiene en la elaboracion de los productos', '2020-07-06 09:00:00', '2020-07-06 10:00:00', 4),
(38, ' Higiene en la elaboracion de los productos', '2020-07-10 09:00:00', '2020-07-10 10:00:00', 4),
(39, ' Higiene en la elaboracion de los productos', '2020-07-15 09:00:00', '2020-07-15 10:00:00', 4),
(40, ' Contaminación Cruzada', '2020-07-20 09:00:00', '2020-07-20 10:00:00', 5),
(41, ' Contaminación Cruzada', '2020-07-27 09:00:00', '2020-07-27 10:00:00', 5),
(42, ' Contaminación Cruzada', '2020-07-31 09:00:00', '2020-07-31 10:00:00', 5),
(43, ' Almacenamiento Transporte de materias Primas y producto Final', '2020-08-04 09:00:00', '2020-08-04 10:00:00', 1),
(44, ' Almacenamiento Transporte de materias Primas y producto Final', '2020-08-07 09:00:00', '2020-08-07 10:00:00', 1),
(45, ' Almacenamiento Transporte de materias Primas y producto Final', '2020-08-14 09:00:00', '2020-08-14 10:00:00', 1),
(46, ' Control de los procesos de producción', '2020-08-17 09:00:00', '2020-08-17 10:00:00', 2),
(47, ' Control de los procesos de producción', '2020-08-24 09:00:00', '2020-08-24 10:00:00', 2),
(48, ' Control de los procesos de producción', '2020-08-31 09:00:00', '2020-08-31 10:00:00', 2),
(49, ' Reglamento Interno de Trabajo de Laboratorios Vida S.A.', '2020-09-04 09:00:00', '2020-09-04 10:00:00', 3),
(50, 'Generalidades, Políticas y Objetivos de Laboratorios Vida S.A.', '2020-09-10 09:00:00', '2020-09-10 10:00:00', 3),
(51, 'Generalidades, Políticas y Objetivos de Laboratorios Vida S.A.', '2020-09-15 09:00:00', '2020-09-15 10:00:00', 3),
(52, 'Generalidades, Políticas y Objetivos de Laboratorios Vida S.A.', '2020-09-18 09:00:00', '2020-09-18 10:00:00', 4),
(53, 'Certificaciones Otorgadas a Laboratorios Vida S.A.', '2020-09-21 09:00:00', '2020-09-21 10:00:00', 4),
(54, 'Certificaciones Otorgadas a Laboratorios Vida S.A.', '2020-09-30 09:00:00', '2020-09-30 10:00:00', 4),
(55, 'Control de la Información Documentada', '2020-10-05 09:00:00', '2020-10-05 10:00:00', 5),
(56, 'Control de la Información Documentada', '2020-10-09 09:00:00', '2020-10-09 10:00:00', 5),
(57, 'Control de la Información Documentada', '2020-10-15 09:00:00', '2020-10-15 10:00:00', 5),
(58, 'Correcta evaluación a los resultados obtenidos en los informes de auditoria', '2020-10-19 09:00:00', '2020-10-19 10:00:00', 1),
(59, 'Correcta evaluación a los resultados obtenidos en los informes de auditoria', '2020-10-26 09:00:00', '2020-10-26 10:00:00', 1),
(60, 'Correcta evaluación a los resultados obtenidos en los informes de auditoria', '2020-10-30 09:00:00', '2020-10-30 10:00:00', 1),
(61, 'Programa de Saneamento Laboratorios Vida S.A.', '2020-11-04 09:00:00', '2020-11-04 10:00:00', 2),
(62, 'Programa de Saneamento Laboratorios Vida S.A.', '2020-11-09 09:00:00', '2020-11-09 10:00:00', 2),
(63, 'Programa de Saneamento Laboratorios Vida S.A.', '2020-11-14 09:00:00', '2020-11-14 10:00:00', 2),
(64, 'Sistemas de prevención y Control de incendios dentro de nuestras instalaciones.', '2020-11-30 09:00:00', '2020-11-30 10:00:00', 3),
(65, 'Sistemas de prevención y Control de incendios dentro de nuestras instalaciones.', '2020-11-16 09:00:00', '2020-11-16 10:00:00', 3),
(66, 'Sistemas de prevención y Control de incendios dentro de nuestras instalaciones.', '2020-11-23 09:00:00', '2020-11-23 10:00:00', 3),
(67, 'Politicas de seguridad aplicadas en la información', '2020-12-04 09:00:00', '2020-12-04 10:00:00', 4),
(68, 'Politicas de seguridad aplicadas en la información', '2020-12-10 09:00:00', '2020-12-10 10:00:00', 4),
(69, 'Politicas de seguridad aplicadas en la información', '2020-12-15 09:00:00', '2020-12-04 10:00:00', 4),
(70, 'Cierre de ciclo con los objetivos cumplidos', '2020-12-18 09:00:00', '2020-12-18 10:00:00', 5),
(71, 'Cierre de ciclo con los objetivos cumplidos', '2020-12-18 09:00:00', '2020-12-18 10:00:00', 5),
(72, 'Cierre de ciclo con los objetivos cumplidos', '2020-12-23 09:00:00', '2020-12-23 10:00:00', 5),
(73, 'Cierre de ciclo con los objetivos cumplidos', '2020-12-30 09:00:00', '2020-12-30 10:00:00', 5),
(74, 'Capacitacion de word', '2020-05-21 20:09:00', '2020-05-21 22:09:00', 8),
(75, 'Capacitacion de excel avanzado', '2020-07-01 09:00:00', '2020-07-01 10:00:00', 6),
(76, 'Capacitacion de bussines intelligence', '2020-06-22 09:00:00', '2020-06-22 10:00:00', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitadores`
--

CREATE TABLE `capacitadores` (
  `ID_CAPACITADORES` int(2) UNSIGNED NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CEDULA` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capacitadores`
--

INSERT INTO `capacitadores` (`ID_CAPACITADORES`, `NOMBRE`, `CEDULA`) VALUES
(1, 'Ing. Roberto Cruz', '0999999999'),
(2, 'Lcdo. Martin Ochoa', '0000000000'),
(3, 'Dra. Matilda Iturralde', '0000000003'),
(4, 'Ing. Belen Vera', '1111111111'),
(5, 'Lcda. Susana Rivera', '0999999999'),
(6, 'Ing. Esteban Cruz', '0999999999'),
(7, 'Lcdo Martin Queirolo', '0987651212'),
(8, 'Belen Ortega C', '0952124812'),
(9, 'Ing Angel Barrezueta', '0914562548');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `ID_DEPARTAMENTO` int(2) UNSIGNED NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`ID_DEPARTAMENTO`, `DESCRIPCION`) VALUES
(1, 'SISTEMAS'),
(2, 'MANTENIMIENTO'),
(3, 'R.R.H.H.'),
(4, 'COSTOS'),
(5, 'CONTABILIDAD'),
(6, 'INSTITUCIONES'),
(8, 'PLANIFICACION Y COMPRAS'),
(9, 'PRODUCCION'),
(10, 'ASEG. CALIDAD'),
(11, 'CONTROL CALIDAD'),
(13, 'TESORERIA'),
(14, 'MARKETING'),
(15, 'DESARROLLO'),
(16, 'GERENCIA'),
(17, 'BODEGA'),
(19, 'CREDITO Y COBRANZA'),
(20, 'AUDITORIA'),
(21, 'FV DANIVET COSTA'),
(23, 'FV LEBENFARMA AUSTRO'),
(24, 'FV FARMALIGHT COSTA'),
(26, 'FV LABOVIDA AUSTRO'),
(27, 'FV LABOVIDA COSTA'),
(28, 'FV LABOVIDA SIERRA'),
(29, 'FV LEBENFARMA COSTA'),
(30, 'FV LEBENFARMA SIERRA'),
(31, 'FV DANIVET SIERRA'),
(32, 'FV DANIVET AUSTRO'),
(33, 'FV FARMALIGHT SIERRA'),
(34, 'FV FARMALIGHT AUSTRO'),
(35, 'ASUNTOS REGULATORIOS'),
(37, 'VENTAS'),
(38, 'SEGURIDAD FISICA E INDUSTRIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PWD` varchar(255) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(75) DEFAULT NULL,
  `ID_DEPARTAMENTO` int(2) UNSIGNED NOT NULL,
  `ADMIN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_USER`, `USERNAME`, `PWD`, `NOMBRE`, `APELLIDO`, `EMAIL`, `ID_DEPARTAMENTO`, `ADMIN`) VALUES
(1, 'BVERA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'BRYAN', 'VERA', 'bvera@grupolabovida.com', 1, 1),
(2, 'ADUARTE', 'c15d93356ade947267b08cfbb207de11a27a7c2c', 'ANTONIO', 'DUARTE', 'aduarte@grupolabovida.com', 1, 1),
(3, 'CPAUTA', 'c02d9fcf8b6134189fddbf1bdcbc2400d8cf4120', 'CINTHYA', 'PAUTA', 'cpauta@grupolabovida.com', 1, 1),
(4, 'JDOMINGUEZ', '6a74e3a58219cb77ee34d231b0101281efa8510f', 'JANETH', 'DOMINGUEZ', 'jdominguez@grupolabovida.com', 1, 1),
(11, 'ZRODRIGUEZ', 'c11781e0c90f696a504e380692a49f9f3c585b26', 'ZULLY', 'RODRIGUEZ', 'zrodriguez@grupolabovida.com', 4, 0),
(12, 'BMONTIEL', 'd0ba3f50304a6fd8740c702698d45d9f9ab266ef', 'BRILLYT', 'MONTIEL', 'bmontiel@hotmail.com', 13, 0),
(13, 'AVARGAS', '2e3f9e5b6aa42054b8acb3fbd2ca5990d3edc4f4', 'ANDREA', 'VARGAS', 'avargas@grupolabovida.com', 13, 0),
(14, 'APAREDES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ANDREA', 'PAREDES', 'aparedes@grupolabovida.com', 6, 0),
(15, 'MRENDON', 'bb7a352c1044b95b4eab8e9802b7e96efb85b39f', 'RICARDO', 'RENDON', 'mrendon@grupolabovida.com', 17, 0),
(16, 'KGUAMAN', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KARINA', 'GUAMAN', 'kguaman@grupolabovida.com', 19, 0),
(17, 'ACASTILLO', '99ac311e78fcc49126d47b9c1510927da4c462a2', 'ADRIANA', 'CASTILLO', 'acastillo@grupolabovida.com', 11, 0),
(18, 'NJIMENEZ', 'a3c1d58873f4f08bfc4b601b2ce0464a5a71e423', 'NATALY', 'JIMENEZ', 'njimenez@grupolabovida.com', 4, 0),
(19, 'AAGUILAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ALBERTO', 'AGUILAR', 'aaguilar@grupolabovida.com', 16, 0),
(20, 'JLARA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JUAN', 'LARA', 'jlara@grupolabovida.com', 9, 0),
(21, 'KMONTES', '381d136c3ae72517ab85a903f826f3d4ec278b9e', 'KARINA', 'MONTES', 'kmontes@grupolabovida.com', 5, 0),
(22, 'FTORRES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FRANCISCO', 'TORRES', 'ftorres@grupolabovida.com', 8, 0),
(23, 'CQUIMIS', '59d459439db47fbee4adc568f313fa4dddbf0c7b', 'CYNTHIA', 'QUIMIS', 'cquimis@grupolabovida.com', 13, 0),
(24, 'YAGUILAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'YULIANA', 'AGUILAR', 'yaguilar@grupolabovida.com', 16, 0),
(25, 'GMORALES', '8861254817ddf425c3552ff84b99bbb0f7342808', 'GENESIS', 'MORALES', 'gmorales@grupolabovida.com', 4, 0),
(26, 'RJIMENEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'RAUL', 'JIMENEZ', 'rjimenez@grupolabovida.com', 35, 0),
(27, 'ACEVALLOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ALEXANDRA', 'CEVALLOS', 'acevallos@grupolabovida.com', 31, 0),
(28, 'CRIVERA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'CLAUDIA', 'RIVERA', 'crivera@grupolabovida.com', 27, 0),
(29, 'DGALLINO', '32a91a33556afc67fa73e36760207fbd01a91fac', 'DAVID', 'GALLINO', 'dgallino@grupolabovida.com', 20, 0),
(30, 'JMORA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JOHANNA', 'MORA', 'jmora@grupolabovida.com', 19, 0),
(31, 'JOROMERO', 'adcd7048512e64b48da55b027577886ee5a36350', 'JORGE', 'ROMERO', 'joromero@grupolabovida.com', 9, 0),
(32, 'FTORRES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FRANCISCO', 'TORRES', 'ftorres@grupolabovida.com', 8, 0),
(33, 'GMORENO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'GABRIEL', 'MORENO', 'gmoreno@grupolabovida.com', 14, 0),
(34, 'GNARANJO', '0288d3e07be0a4f6fac2720083635bc1906f8351', 'GENESIS', 'NARANJO', 'gnaranjo@grupolabovida.com', 5, 0),
(35, 'JAGUILAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JULIO', 'AGUILAR', 'jaguilar@grupolabovida.com', 16, 0),
(36, 'IBEJARANO', '45ba296ee56ec3e8238781c0d48d205604f4c011', 'IVETH', 'BEJARANO', 'ibejarano@grupolabovida.com', 16, 0),
(37, 'JYEPEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JANETH', 'YEPEZ', 'jyepez@grupolabovida.com', 19, 0),
(38, 'JRAMIREZ', '36b96cc19b062a9bc89921ecc2be4f2fd23d5695', 'JAZMINE', 'RAMIREZ', 'jramirez@grupolabovida.com', 10, 0),
(39, 'OMEJIA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'OSCAR', 'MEJIA', 'jmarketing@grupolabovida.com', 14, 0),
(40, 'JSUAREZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JHONATAN', 'SUAREZ', 'jsuarez@grupolabovida.com', 17, 0),
(41, 'JLARA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JUAN', 'LARA', 'jlara@grupolabovida.com', 9, 0),
(42, 'KGUAMAN', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KARINA', 'GUAMAN', 'kguaman@grupolabovida.com', 19, 0),
(43, 'KMONTES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KARINA', 'MONTES', 'kmontes@grupolabovida.com', 5, 0),
(44, 'KLALANGUI', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KARLA', 'LALANGUI', 'klalangui@grupolabovida.com', 9, 0),
(45, 'THERMIDA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'TANIA', 'HERMIDA', 'thermida@grupolabovida.com', 6, 0),
(46, 'MCABANILLA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARIA', 'CABANILLA', 'mcabanilla@grupolabovida.com', 9, 0),
(47, 'MCEBALLOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARIA', 'CEBALLOS', 'mceballos@grupolabovida.com', 19, 0),
(48, 'MLINDAO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARIA FERNANDA', 'LINDAO', 'mlindao@grupolabovida.com', 5, 0),
(49, 'MRAMIA', '4d164f57a481a8edcc1c95adcd8da07c20756904', 'MARIA', 'RAMIA', 'mramia@grupolabovida.com', 19, 0),
(50, 'NYAGUAL', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'NANCY', 'YAGUAL', 'nyagual@grupolabovida.com', 19, 0),
(51, 'KNICOLA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KAREN', 'NICOLA', 'knicola@grupolabovida.com', 9, 0),
(52, 'ODUCHE', '104309ded4dba98e2e02a11febe465b0b35bdd78', 'OMAR', 'DUCHE', 'oduche@grupolabovida.com', 20, 0),
(53, 'SSINCHIGUANO', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'SHIRLEY', 'SINCHIGUANO', 'ssinchiguano@grupolabovida.com', 2, 0),
(55, 'TLAVAYEN', 'a536e7a10556391a1c42afad71109fad108f2d61', 'TATIANA', 'LAVAYEN', 'tlavayen@grupolabovida.com', 8, 0),
(56, 'VBARCOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'VERONICA', 'BARCOS', 'vbarcos@grupolabovida.com', 19, 0),
(57, 'VMONROY', '4f36c1b717c211ce3a7188f81115e7835ec80309', 'VICTOR', 'MONROY', 'vmonroy@grupolabovida.com', 6, 0),
(58, 'VMANZABA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'VLADIMIR', 'MANZABA', 'vmanzaba@grupolabovida.com', 17, 0),
(59, 'WPEREZ', 'adcd7048512e64b48da55b027577886ee5a36350', 'WENDY', 'PEREZ', 'wperez@grupolabovida.com', 9, 0),
(60, 'XORDONEZ', 'eed030de1282b032e6f8dc8529d94764f437e589', 'XIMENA', 'ORDOÑEZ', 'xordonez@grupolabovida.com', 19, 0),
(61, 'ZVALENCIA', 'e9a61d55c2ba6545748aa9fb8e42475696ce0f34', 'ZAYDI', 'VALENCIA', 'zvalencia@grupolabovida.com', 6, 0),
(63, 'SAGUILAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'STEFANNY', 'AGUILAR', 'saguilar@grupolabovida.com', 9, 0),
(67, 'AGRANDA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ALEX GRANDA', 'PRODUCCION', 'agranda@grupolabovida.com', 28, 0),
(68, 'MPROANO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARIA ALEJANDRO', 'PROANO', 'macosta@grupolabovida.com', 31, 0),
(69, 'EMERA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ERIKA', 'MERA', 'emera@grupolabovida.com', 24, 0),
(70, 'EOÑATE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'EDUARDO', 'OÑATE', 'eonate@grupolabovida.com', 24, 0),
(71, 'ILIZANO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'IVAN', 'LIZANO', 'ilizano@grupolabovida.com', 33, 0),
(72, 'JBALDEON', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JUAN', 'BALDEON', 'jbaldeon@grupolabovida.com', 6, 0),
(73, 'JBRAVO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JOFFRE', 'BRAVO', 'jbravo@grupolabovida.com', 24, 0),
(74, 'JREINA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JOHANNA ', 'REINA', 'jreina@grupolabovida.com', 24, 0),
(75, 'ASANTOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ALAN', 'SANTOS', 'asantos@grupolabovida.com', 33, 0),
(76, 'MCABRERA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MANUEL', 'CABRERA', 'mcabrebra@grupolabovida.com', 19, 0),
(77, 'PJIMENEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'PABLO', 'JIMENEZ', 'pjimenez@grupolabovida.com', 33, 0),
(78, 'DPEREZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DANNY', 'PEREZ', 'dperez@grupolabovida.com', 24, 0),
(79, 'YCEDENO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'YOLANDA', 'CEDEÑO', 'yedeno@grupolabovida.com', 27, 0),
(80, 'SRUIZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'SANDRA', 'RUIZ', 'sruiz@grupolabovida.com', 24, 0),
(81, 'XFRANCO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'XAVIER', 'FRANCO', 'xfranco@grupolabovida.com', 21, 0),
(82, 'AMUÑOZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ALEX', 'MUÑOZ', 'amunoz@grupolabovida.com', 34, 0),
(83, 'JANGULO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JACQUELINE', 'ANGULO', 'jangulo@grupolabovida.com', 31, 0),
(84, 'EMATOVELLE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'EDWIN', 'MATOVELLE', 'fcoello@grupolabovida.com', 31, 0),
(85, 'FPATIÑO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FRANCISCO', 'PATIÑO', 'fpatiño@grupolabovida.com', 31, 0),
(86, 'NLOOR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'NESTOR', 'LOOR', 'nloor@grupolabovida.com', 27, 0),
(87, 'EYANEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ESTEFANY', 'YANEZ', 'eyanez@grupolabovida.com', 27, 0),
(88, 'WJALON', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'WENDY', 'JALON', 'wjalon@grupolabovida.com', 27, 0),
(89, 'JPEREZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JOSE', 'PEREZ', 'jperez@grupolabovida.com', 29, 0),
(90, 'PAVILA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'PATRICIA', 'AVILA', 'pavila@grupolabovida.com', 27, 0),
(91, 'APAVON', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'AUGUSTO', 'PAVON', 'apavon@grupolabovida.com', 28, 0),
(92, 'DABARCA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DIOGENES', 'ABARCA', 'dabarca@grupolabovida.com', 27, 0),
(93, 'ECONDE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ELIZABETH', 'CONDE', 'econde@grupolabovida.com', 27, 0),
(94, 'GANDRADE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'GABRIELA', 'ANDRADE', 'gandrade@grupolabovida.com', 26, 0),
(95, 'IMOREJON', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ISRAEL', 'MOREJON', 'imorejon@grupolabovida.com', 28, 0),
(96, 'BHINOJOZA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'BETSY', 'HINOJOZA', 'bhinojoza@grupolabovida.com', 27, 0),
(97, 'RCELI', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'RODRIGO', 'CELI', 'rceli@grupolabovida.com', 26, 0),
(98, 'JULLOA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JUAN CARLOS', 'ULLOA', 'ssigcho@grupolabovida.com', 28, 0),
(99, 'CPRO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'CARLOS', 'PRO', 'cpro@grupolabovida.com', 17, 0),
(100, 'MGONZALEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARIO', 'GONZALEZ', 'dalonso@grupolabovida.com', 17, 0),
(101, 'JMINAN', 'ff52970bf699fbe35c9b1cf099871e237e2b6b29', 'JONATHAN', 'MINAN', 'jminan@grupolabovida.com', 8, 0),
(102, 'MMORENO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARCOS', 'MORENO', 'mmoreno@grupolabovida.com', 2, 0),
(103, 'JSOLIS', '12d1640d2c2a21a09d41015d7bf449902013464d', 'JUAN', 'SOLIS', 'jsolis@grupolabovida.com', 10, 0),
(104, 'GBENAVIDES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'GONZALO', 'BENAVIDES', 'gbenavides@grupolabovida.com', 33, 0),
(105, 'PGARCIA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'PRISCILA', 'GARCIA', 'pgarcia@grupolabovida.com', 19, 0),
(106, 'AMALDONADO', '1bc3ed960226f0d842c9f845b7715f37c3721096', 'ANA', 'MALDONADO', 'amaldonado@grupolabovida.com', 19, 0),
(107, 'FRODRIGUEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FRANCISCO', 'RODRIGUEZ', 'frodriguez@grupolabovida.com', 37, 0),
(108, 'FNAVARRETE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FREDDY', 'NAVARRETE', 'mmedina@grupolabovida.com', 37, 0),
(109, 'HLAVERDE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'HUGO', 'LAVERDE', 'hlaverde@grupolabovida.com', 37, 0),
(110, 'JORTIZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JOSE LUIS', 'ORTIZ', 'jortiz@grupolabovida.com', 37, 0),
(111, 'IPESANTES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ILIANA', 'PESANTES', 'ipesantes@grupolabovida.com', 37, 0),
(112, 'JCEDENO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'YOLANDA', 'CEDENO', 'ycedeno@grupolabovida.com', 37, 0),
(113, 'FALVARADO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FABRICIO', 'ALVARADO', 'ralvarado@grupolabovida.com', 37, 0),
(114, 'ARIOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ARMANDO', 'RIOS', 'arios@grupolabovida.com', 27, 0),
(115, 'LSOTOMAYOR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'LUIS', 'SOTOMAYOR', 'lsotomayor@grupolabovida.com', 28, 0),
(116, 'GCEVALLOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'GABRIEL', 'CEVALLOS', 'gcevallos@grupolabovida.com', 29, 0),
(117, 'BPAEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'BYRON', 'PAEZ', 'bpaez@grupolabovida.com', 30, 0),
(118, 'YMOLINA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'YAMIT', 'MOLINA', 'sacosta@grupolabovida.com', 30, 0),
(119, 'BMEDRANDA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'BLANCA', 'MEDRANDA', 'lmedranda@grupolabovida.com', 30, 0),
(120, 'DMALDONADO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DIANA', 'MALDONADO', 'dmaldonado@grupolabovida.com', 33, 0),
(121, 'LMONTENEGRO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'LUIS', 'MONTENEGRO', 'jmunoz@grupolabovida.com', 31, 0),
(122, 'TOCHOA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'TITO', 'OCHOA', 'tochoa@grupolabovida.com', 34, 0),
(123, 'DSANCHEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DARWIN', 'SANCHEZ', 'dsanchez@grupolabovida.com', 31, 0),
(124, 'OZAMORA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'OSCAR', 'ZAMORA', 'mproano@grupolabovida.com', 31, 0),
(125, 'FLASSO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FRANKLIN', 'LASSO', 'flasso@grupolabovida.com', 30, 0),
(126, 'NZAMBRANO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'NELLY', 'ZAMBRANO', 'mromero@grupolabovida.com', 33, 0),
(127, 'GPEÑAHERRERA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'GUILLERMO', 'PEÑAHERRERA', 'jcastellano@grupolabovida.com', 33, 0),
(128, 'OMONTES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'OSCAR', 'MONTES', 'omontes@grupolabovida.com', 28, 0),
(129, 'RMACIAS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ROGGER', 'MACIAS', 'rmacias@grupolabovida.com', 9, 0),
(130, 'LVANEGAS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'LAURA', 'VANEGAS', 'lvanegas@grupolabovida.com', 9, 0),
(131, 'CJIMENEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'CARLOS', 'JIMENEZ', 'cjimenez@grupolabovida.com', 27, 0),
(132, 'JARBOLEDA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JERAL', 'ARBOLEDA', 'jarboleda@grupolabovida.com', 17, 0),
(133, 'FSALGADO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FERNANDO', 'SALGADO', 'fsalgado@grupolabovida.com', 9, 0),
(135, 'YAGUILAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'YULIANNA', 'AGUILAR', 'rmazzini@grupolabovida.com', 16, 0),
(136, 'NHIDALGO', '2cbea1d8b28a4d58260511ac593d2c8833fdf020', 'NELLY', 'HIDALGO', 'nhidalgo@grupolabovida.com', 8, 0),
(137, 'JALEMAN', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JUDITH', 'ALEMAN', 'jaleman@grupolaboovida.com', 9, 0),
(138, 'MCHAVEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARÍA D LOURDES', 'CHAVEZ', 'gerencia1@grupolabovida.com', 19, 0),
(139, 'AVERA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ALEXI', 'VERA', 'mparedes@grupolabovida.com', 37, 0),
(140, 'MPAGUAY', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MARIA', 'PAGUAY', 'maguay@grupolabovida.com', 9, 0),
(141, 'YABRIGO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'YESENIA', 'ABRIGO', 'yabrigo@grupolabovida.com', 10, 0),
(142, 'EMARTINEZ', 'f36a15b665d0cbad4ebebaaae9b9230e262e9957', 'ELITTA', 'MARTINEZ', 'emartinez@grupolabovida.com', 10, 0),
(143, 'GSEOAGE', '5f38efa58b2330671582e41ba5b5b371ff283210', 'GLORIA', 'SEOAGE', 'gseoage@grupolabovida.com', 37, 0),
(144, 'DYAGUAL', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DIANA', 'YAGUAL', 'dyagual@grupolabovida.com', 10, 0),
(145, 'KPESANTES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KARINA', 'PESANTES', 'kpesantes@grupolabovida.com', 3, 0),
(146, 'JCASTRO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JESSENIA', 'CASTRO', 'jcastro@grupolabovida.com', 19, 0),
(147, 'SNARANJO', 'c6beec69a2196f26253634bcbb27fd861bbac0d3', 'Shirley', 'Naranjo', 'snaranjo@grupolabovida.com', 9, 0),
(148, 'DALVAREZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DARIO', 'ALVAREZ', 'dalvarez@grupolabovida.com', 27, 0),
(149, 'CAFRANCO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'CARLOS', 'FRANCO ', 'cfranco@grupolabovida.com', 27, 0),
(150, 'JJAGUILAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JULIO', 'AGUILAR', 'jjaguilar@grupolabovida.com', 16, 0),
(151, 'IANDRADE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ITALO', 'ANDRADE', 'carcos@grupolabovida.com', 33, 0),
(152, 'ALARREA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ANGELA', 'LARREA', 'alarrea@grupolabovida.com', 19, 0),
(153, 'BORTEGA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'BELEN', 'ORTEGA', 'karenbelen0201@hotmail.com', 6, 1),
(154, 'Dup - GMOR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'Dup - GABR', 'Dup - MORENO', 'gmoreno@grupolabovida.com', 14, 0),
(155, 'JGUERRERO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JUAN SEBASTIAN', 'GUERRERO', 'jguerrero@grupolabovida.com', 16, 0),
(156, 'JBRITO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KATTY', 'BRITO', 'jbrito@grupolabovida.com', 14, 0),
(157, 'ACERVANTE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ANDY', 'CERVANTE', 'acervante@grupolabovida.com', 17, 0),
(158, 'INSPECCALIDAD', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'INSPECTORES', 'CTRL. CALIDAD', 'jlara@grupolabovida.com', 11, 0),
(159, 'OALVAREZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'OLGA', 'ALVAREZ', 'oalvarez@grupolabovida.com', 5, 0),
(160, 'DCONTRERAS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DUNNIA', 'CONTRERAS', 'ncontreras@grupolabovida.com', 33, 0),
(161, 'MZUNIGA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MELIDA', 'ZUÑIGA', 'mzuniga@grupolabovida.com', 5, 0),
(162, 'MAVILES', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MONICA', 'AVILES', 'mavilesl@grupolabovida.com', 16, 0),
(163, 'BSALAZAR', 'a16eade17827c0a4dfa37bdea1ef4993a93c859a', 'BETSABETH', 'SALAZAR', 'bsalazar@grupolabovida.com', 19, 0),
(164, 'CPARRA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'CRISTINA', 'PARRA', 'cparra@grupolabovida.com', 19, 0),
(165, 'EBRAVO', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'EMILY', 'BRAVO', 'ebravo@grupolabovida.com', 6, 0),
(166, 'DCRUZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DIXIANA ', 'CRUZ', 'dcruz@grupolabovida.com', 5, 0),
(167, 'JSALAZAR', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JHON', 'SALAZAR', 'jarboleda@grupolabovida.com', 17, 0),
(168, 'DARMIJOS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DIANA ', 'ARMIJOS', 'darmijos@grupolabovida.com', 6, 0),
(169, 'SACOSTA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'SAUL', 'ACOSTA', 'sacosta@grupolabovida.com', 30, 0),
(170, 'ACHIQUITO', 'aaa761b278b2ec3de3632dba8d81e0c3433009e3', 'AYLIN', 'CHIQUITO', 'achiquito@grupolabovida.com', 8, 0),
(171, 'AESPINOZA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ARMANDO', 'ESPINOZA', 'aespinoza@grupolabovida.com', 29, 0),
(172, 'KGORTAIRE', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'KEVIN', 'GORTAIRE', 'kgortaire@grupolabovida.com', 14, 0),
(173, 'CVASQUEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'CARLOS', 'VASQUEZ', 'vmanzaba@grupolabovida.com', 17, 0),
(174, 'RBARBA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'RENE', 'BARBA', 'rbarba@grupolabovida.com', 10, 0),
(175, 'JVEGA', 'f1e117944281f5ba7a72272360e96d77cc498042', 'JADIRA', 'VEGA', 'jvega@grupolabovida.com', 6, 0),
(176, 'DRIVAS', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DEYSI', 'RIVAS', 'drivas@grupolabovida.com', 9, 0),
(178, 'Dup - CJIM', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'Dup - CARL', 'Dup - JIMENEZ', 'cjimenez@grupolabovida.com', 27, 0),
(179, 'FTENESACA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'FANNY', 'TENESACA', 'ftenesaca@grupolabovida.com', 27, 0),
(180, 'AVASQUEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ANDRES', 'VASQUEZ', 'avasquez@grupolabovida.com', 17, 0),
(181, 'JMALLA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JULIO', 'MALLA', 'jmalla@grupolabovida.com', 33, 0),
(182, 'MRENDON', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MANOLO', 'RENDON', 'mrendon@grupolabovida.com', 17, 0),
(184, 'NVELASQUEZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'NESTOR ', 'VELASQUEZ', 'nvelasquez@grupolabovida.com', 27, 0),
(185, 'DZUNIGA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DIANA', 'ZUÑIGA', 'dzuniga@grupolabovida.com', 19, 0),
(186, 'DSEGARRA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'DANIELA', 'SEGARRA', 'jsegarra@grupolaboovida.com', 9, 0),
(187, 'VMIRANDA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'VANESA', 'MIRANDA', 'zvalencia@grupolabovida.com', 6, 0),
(188, 'MRENDON2', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'MRENDON2', 'MANOLO RENDON 2', 'mrendon@grupolabovida.com', 17, 0),
(189, 'ARAMIREZ', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'ANDREA', 'RAMIREZ', 'aramirez@grupolabovida.com', 17, 0),
(190, 'LVINUEZA', 'ccb7a5ea747124900d2c33b637d668aa1f1d9acb', 'LUIS', 'VINUEZA', 'lvinueza@grupolabovida.com', 17, 0),
(191, 'MLARA', '49ca314097d5d43ca0c301cf5090e09c1b3de0ba', 'JOAO', 'LARA', 'mlara@grupolabovidalcom', 38, 0),
(194, 'AMACIAS', '6fb7fad56b8a84e24855df0c91244ada071f346b', 'ANTONIO', 'MACIAS', 'amacias@grupolabovida.com', 14, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD PRIMARY KEY (`id_asiento`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_capacitacion` (`id_capacitacion`);

--
-- Indices de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD PRIMARY KEY (`ID_CAPACITACION`),
  ADD KEY `ID_CAPACITADOR` (`ID_CAPACITADOR`);

--
-- Indices de la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  ADD PRIMARY KEY (`ID_CAPACITADORES`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asientos`
--
ALTER TABLE `asientos`
  MODIFY `id_asiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `ID_CAPACITACION` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  MODIFY `ID_CAPACITADORES` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `ID_DEPARTAMENTO` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD CONSTRAINT `asientos_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`ID_USER`),
  ADD CONSTRAINT `asientos_ibfk_2` FOREIGN KEY (`id_capacitacion`) REFERENCES `capacitaciones` (`ID_CAPACITACION`);

--
-- Filtros para la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD CONSTRAINT `capacitaciones_ibfk_1` FOREIGN KEY (`ID_CAPACITADOR`) REFERENCES `capacitadores` (`ID_CAPACITADORES`),
  ADD CONSTRAINT `capacitaciones_ibfk_2` FOREIGN KEY (`ID_CAPACITADOR`) REFERENCES `capacitadores` (`ID_CAPACITADORES`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamentos` (`ID_DEPARTAMENTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
