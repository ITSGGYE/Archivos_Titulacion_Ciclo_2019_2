-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-12-2020 a las 23:04:53
-- Versión del servidor: 8.0.17
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
-- Base de datos: `consultorios_odontologicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `usuario`, `contrasena`, `nombre_apellido`) VALUES
(1, 'admin', 'admin', 'Miguel Yepez'),
(2, 'mario', 'mario', 'Mario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `paciente` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_especialista` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cit_estado` enum('Asignado','Atendido','Citas Perdidas','Cancelada') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cit_observacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `paciente`, `id_especialidad`, `id_especialista`, `fecha`, `hora`, `cit_estado`, `cit_observacion`, `color`, `id_admin`) VALUES
(1, 3, 1, 1, '2020-12-31', '09:00-09:20', 'Citas Perdidas', '', '#40E0D0', 1),
(3, 1, 2, 2, '2020-12-30', '14:30-14:50', 'Asignado', 'o', '#FF0000', 1),
(4, 1, 2, 2, '2020-12-30', '15:30-15:50', 'Asignado', 'o', '#FF8C00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`) VALUES
(1, 'Ortodoncia'),
(2, 'Rehabilitacion Oral'),
(3, 'Odontopediatria'),
(4, 'Brackest Dental'),
(5, 'Endodoncia'),
(6, 'Implante Dentales'),
(8, 'Diseño de Sonrisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE `especialista` (
  `id_especialista` int(11) NOT NULL,
  `esp_cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_doctor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `especialista` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `esp_telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `esp_direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `esp_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `esp_sexo` enum('Femenino','Masculino') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`id_especialista`, `esp_cedula`, `nombre_doctor`, `especialista`, `esp_telefono`, `esp_direccion`, `esp_email`, `fecha_nacimiento`, `esp_sexo`, `id_especialidad`, `fecha_creacion`) VALUES
(1, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperinas', 'miguelyepez@gmail.com', '1984-01-10', 'Masculino', 1, '0000-00-00 00:00:00'),
(2, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperina', 'miguelyepez@gmail.com', '1984-01-10', 'Masculino', 2, '0000-00-00 00:00:00'),
(3, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperina', 'miguel_yepez@gmail.com', '1984-01-10', 'Masculino', 3, '0000-00-00 00:00:00'),
(4, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperina', 'miguelyepez@gmail.com', '1984-01-10', 'Masculino', 4, '0000-00-00 00:00:00'),
(5, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperina', 'miguelyepez@gmail.com', '1984-01-10', 'Masculino', 5, '0000-00-00 00:00:00'),
(6, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperina', 'miguelyepez@gmail.com', '1984-01-10', 'Masculino', 6, '0000-00-00 00:00:00'),
(8, '0952503214', 'Miguel Yepez', 'Odontologia', '0956899845', 'coop.nueva prosperina', 'miguelyepez@gmail.com', '1984-01-10', 'Masculino', 8, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `pac_cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pac_telefono` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pac_sexo` enum('Femenino','Masculino') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `pac_cedula`, `nombre_apellido`, `pac_telefono`, `correo`, `contrasena`, `fecha_nacimiento`, `pac_sexo`, `fecha_creacion`) VALUES
(1, '0941171854', 'William Tomala Aquino', '0939082736', 'tomalawilliam64@gmail.com', '123', '1998-12-12', 'Masculino', '0000-00-00 00:00:00'),
(3, '0283883828', 'Suanny Sesme Mota', '0938434888', 'suannysesme@gmail.com', '123', '1999-08-09', 'Femenino', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_especialista` (`id_especialista`),
  ADD KEY `paciente` (`paciente`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`id_especialista`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialista`
--
ALTER TABLE `especialista`
  MODIFY `id_especialista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administrador` (`id_administrador`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_especialista`) REFERENCES `especialista` (`id_especialista`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD CONSTRAINT `especialista_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
