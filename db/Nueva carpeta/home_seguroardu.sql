-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2020 a las 20:26:49
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `home_seguroardu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `Codigo_admin` int(5) NOT NULL,
  `Nombre_admin` varchar(10) DEFAULT NULL,
  `Apellido_admin` varchar(20) DEFAULT NULL,
  `usuario_admin` varchar(15) DEFAULT NULL,
  `pass_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_de_actividad`
--

CREATE TABLE `registro_de_actividad` (
  `Codigo_actividad` int(5) NOT NULL,
  `fecha_actividad` date DEFAULT NULL,
  `hora_actividad` time DEFAULT NULL,
  `situacion_actividad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `Codigo_seguridad` int(5) NOT NULL,
  `pass_seguridad` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Codigo_admin`);

--
-- Indices de la tabla `registro_de_actividad`
--
ALTER TABLE `registro_de_actividad`
  ADD PRIMARY KEY (`Codigo_actividad`);

--
-- Indices de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  ADD PRIMARY KEY (`Codigo_seguridad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_registro` FOREIGN KEY (`Codigo_admin`) REFERENCES `registro_de_actividad` (`Codigo_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_seguridad` FOREIGN KEY (`Codigo_admin`) REFERENCES `seguridad` (`Codigo_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguridad`
--
ALTER TABLE `seguridad`
  ADD CONSTRAINT `seguridad_registro` FOREIGN KEY (`Codigo_seguridad`) REFERENCES `registro_de_actividad` (`Codigo_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
