-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2020 a las 02:20:48
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
-- Estructura de tabla para la tabla `registro_de_actividad`
--

CREATE TABLE `registro_de_actividad` (
  `Codigo_actividad` int(5) NOT NULL,
  `fecha_actividad` date DEFAULT NULL,
  `hora_actividad` time DEFAULT NULL,
  `situacion_actividad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_de_actividad`
--

INSERT INTO `registro_de_actividad` (`Codigo_actividad`, `fecha_actividad`, `hora_actividad`, `situacion_actividad`) VALUES
(1, '2020-04-09', '00:19:42', 'se encendio la alarma');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_de_actividad`
--
ALTER TABLE `registro_de_actividad`
  ADD PRIMARY KEY (`Codigo_actividad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
