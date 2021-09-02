-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2021 a las 21:28:09
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `usuario_admin` varchar(15) DEFAULT NULL,
  `pass_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`Codigo_admin`, `usuario_admin`, `pass_admin`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_de_actividad`
--

CREATE TABLE `registro_de_actividad` (
  `Codigo_actividad` int(5) NOT NULL,
  `situacion_actividad` varchar(30) DEFAULT NULL,
  `hora_fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_de_actividad`
--

INSERT INTO `registro_de_actividad` (`Codigo_actividad`, `situacion_actividad`, `hora_fecha`) VALUES
(2, 'encendio', '2020-06-12 20:31:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `Codigo_seguridad` int(5) NOT NULL,
  `pass_seguridad` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`Codigo_seguridad`, `pass_seguridad`) VALUES
(1, 12345);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_de_actividad`
--
ALTER TABLE `registro_de_actividad`
  MODIFY `Codigo_actividad` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
