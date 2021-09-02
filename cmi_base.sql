-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2020 a las 05:21:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cmi`
--
   DROP DATABASE IF EXISTS cmi;
   CREATE DATABASE cmi;
   USE cmi;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `paciente_cod` int(11) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `registrador_id` int(11) DEFAULT NULL,
  `asunto` varchar(30) DEFAULT NULL,
  `costo_cita` decimal(5,2) NOT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `estado_pago` varchar(10) DEFAULT NULL,
  `estado_cita` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idconfiguracion` int(11) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `ruc` varchar(13) DEFAULT NULL,
  `responsable` varchar(60) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`idconfiguracion`, `razon_social`, `ruc`, `responsable`, `email`, `telefono`, `direccion`) VALUES
(1, 'Centro Medico Isabelita', '0917912735001', 'Nombre del Responsable', 'example@example.com', '0993018998 - 0968513415', 'Coop. Fortin de la Flor Bloque 4 Mz. 1427 Solar 1 (Diagonal a la Escuela la Consolata)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL,
  `agenda_id` int(11) DEFAULT NULL,
  `motivo_consulta` varchar(200) DEFAULT NULL,
  `enfermedad_actual` varchar(200) DEFAULT NULL,
  `anteced` varchar(200) DEFAULT NULL,
  `sintomas` varchar(200) DEFAULT NULL,
  `cod_diagnostico` int(11) NOT NULL,
  `tratamiento` varchar(200) DEFAULT NULL,
  `prescripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `cod_dia` int(11) NOT NULL,
  `dia` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`cod_dia`, `dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `cod_diagnostico` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `enfermedad` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diagnostico`
--

delete from diagnostico;

INSERT INTO `diagnostico` (`cod_diagnostico`, `codigo`, `enfermedad`, `estado`) VALUES
(1, 'A00-B99', 'Ciertas enfermedades infecciosas y parasitarias', 1),
(2, 'C00-D48', 'Neoplasias', 1),
(3, 'E00-E90', 'Enfermedades endocrinas, nutricionales y metabólic', 1),
(4, 'F00-F99', 'Trastornos mentales y del comportamiento', 1),
(5, 'G00-G99', 'Enfermedades del sistema nervioso', 1),
(6, 'H00-H59', 'Enfermedades del ojo y sus anexos', 1),
(7, 'H60-H95', 'Enfermedades del oído y de la apófisis mastoides', 1),
(8, 'I00-I99', 'Enfermedades del sistema circulatorio', 1),
(9, 'J00-J99', 'Enfermedades del sistema respiratorio', 1),
(10, 'K00-K93', 'Enfermedades del aparato digestivo', 1),
(11, 'L00-L99', 'Enfermedades de la piel y el tejido subcutáneo', 1),
(12, 'M00-M99', 'Enfermedades del sistema osteomuscular', 1),
(13, 'N00-N99', 'Enfermedades del aparato genitourinario', 1),
(14, 'O00-O99', 'Embarazo, parto y puerperio', 1),
(15, 'B09-F04', 'Acidez de estómago', 1),
(16, 'J09-D05', 'Acné', 1),
(17, '', 'Alergia', 1),
(18, '', 'Adenoma hipofisiario', 1),
(19, '', 'Agorafobia', 1),
(20, '', 'Bulimia', 1),
(21, '', 'Balanitis', 1),
(22, '', 'Bronquitis', 1),
(23, '', 'Callos', 1),
(24, '', 'Dengue', 1),
(25, '', 'Gastritis', 1),
(26, '', 'Glaucoma', 1),
(27, '', 'Gases y flatulencia', 1),
(28, '', 'Gonorrea', 1),
(29, 'H05-H20', 'Hepatitis A', 1),
(30, 'H10-H30', 'Hepatitis B', 1),
(31, 'H10-H40', 'Hepatitis C', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `esp_id` int(11) NOT NULL,
  `esp_nombre` varchar(20) DEFAULT NULL,
  `esp_descripcion` varchar(100) DEFAULT NULL,
  `agregado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`esp_id`, `esp_nombre`, `esp_descripcion`, `agregado`, `estado`) VALUES
(1, 'Medicina General', 'Atencion General', '2020-05-20 06:17:45', 1),
(2, 'Odontologia', 'Se ocupa de la dentadura y sus enfermedades.', '2020-05-20 16:17:00', 1),
(3, 'Pediatria', 'Especialidad médica que estudia al niño y sus enfermedades', '2020-05-26 21:16:53', 1),
(4, 'Cardialogia', NULL, '2020-06-08 15:37:02', 0),
(5, 'Dermatologia', NULL, '2020-05-08 18:09:39', 0),
(6, 'Traumatologia', NULL, '2020-04-30 04:02:00', 1),
(7, 'NInguna', NULL, '2020-05-01 05:35:17', 1),
(8, 'Dermatología', NULL, '2020-05-13 23:09:49', 1),
(9, 'Ecografia', 'es un procedimiento de diagnóstico usado en los hospitales y clínicas', '2020-05-29 21:31:17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_medica`
--

CREATE TABLE `ficha_medica` (
  `idficha_medica` int(11) NOT NULL,
  `agenda_id` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `presion_art` int(11) DEFAULT NULL,
  `alergias` varchar(30) DEFAULT NULL,
  `temperatura` int(11) DEFAULT NULL,
  `habitos` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `cod_dia` int(11) DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `fin` time DEFAULT NULL,
  `intervalo` int(11) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `medico_id`, `cod_dia`, `inicio`, `fin`, `intervalo`, `horario`, `estado`) VALUES
(337, 34, 3, '14:15:00', '18:30:00', 30, '14:15:00', 'Disponible'),
(338, 34, 3, '14:15:00', '18:30:00', 30, '14:45:00', 'Disponible'),
(339, 34, 3, '14:15:00', '18:30:00', 30, '15:15:00', 'Disponible'),
(340, 34, 3, '14:15:00', '18:30:00', 30, '15:45:00', 'Disponible'),
(341, 34, 3, '14:15:00', '18:30:00', 30, '16:15:00', 'Disponible'),
(342, 34, 3, '14:15:00', '18:30:00', 30, '16:45:00', 'Disponible'),
(343, 34, 3, '14:15:00', '18:30:00', 30, '17:15:00', 'Disponible'),
(344, 34, 3, '14:15:00', '18:30:00', 30, '17:45:00', 'Disponible'),
(345, 34, 3, '14:15:00', '18:30:00', 30, '18:15:00', 'Disponible'),
(496, 34, 4, '11:00:00', '17:00:00', 45, '11:00:00', 'Disponible'),
(497, 34, 4, '11:00:00', '17:00:00', 45, '11:45:00', 'Disponible'),
(498, 34, 4, '11:00:00', '17:00:00', 45, '12:30:00', 'Disponible'),
(499, 34, 4, '11:00:00', '17:00:00', 45, '13:15:00', 'Disponible'),
(500, 34, 4, '11:00:00', '17:00:00', 45, '14:00:00', 'Disponible'),
(501, 34, 4, '11:00:00', '17:00:00', 45, '14:45:00', 'Disponible'),
(502, 34, 4, '11:00:00', '17:00:00', 45, '15:30:00', 'Disponible'),
(503, 34, 4, '11:00:00', '17:00:00', 45, '16:15:00', 'Disponible'),
(567, 34, 7, '12:00:00', '16:00:00', 30, '12:00:00', 'Disponible'),
(568, 34, 7, '12:00:00', '16:00:00', 30, '12:30:00', 'Disponible'),
(569, 34, 7, '12:00:00', '16:00:00', 30, '13:00:00', 'Disponible'),
(570, 34, 7, '12:00:00', '16:00:00', 30, '13:30:00', 'Disponible'),
(571, 34, 7, '12:00:00', '16:00:00', 30, '14:00:00', 'Disponible'),
(572, 34, 7, '12:00:00', '16:00:00', 30, '14:30:00', 'Disponible'),
(573, 34, 7, '12:00:00', '16:00:00', 30, '15:00:00', 'Disponible'),
(574, 34, 7, '12:00:00', '16:00:00', 30, '15:30:00', 'Disponible'),
(575, 34, 1, '15:00:00', '23:00:00', 30, '15:00:00', 'Disponible'),
(576, 34, 1, '15:00:00', '23:00:00', 30, '15:30:00', 'Disponible'),
(577, 34, 1, '15:00:00', '23:00:00', 30, '16:00:00', 'Disponible'),
(578, 34, 1, '15:00:00', '23:00:00', 30, '16:30:00', 'Disponible'),
(579, 34, 1, '15:00:00', '23:00:00', 30, '17:00:00', 'Disponible'),
(580, 34, 1, '15:00:00', '23:00:00', 30, '17:30:00', 'Disponible'),
(581, 34, 1, '15:00:00', '23:00:00', 30, '18:00:00', 'Disponible'),
(582, 34, 1, '15:00:00', '23:00:00', 30, '18:30:00', 'Disponible'),
(583, 34, 1, '15:00:00', '23:00:00', 30, '19:00:00', 'Disponible'),
(584, 34, 1, '15:00:00', '23:00:00', 30, '19:30:00', 'Disponible'),
(585, 34, 1, '15:00:00', '23:00:00', 30, '20:00:00', 'Disponible'),
(586, 34, 1, '15:00:00', '23:00:00', 30, '20:30:00', 'Disponible'),
(587, 34, 1, '15:00:00', '23:00:00', 30, '21:00:00', 'Disponible'),
(588, 34, 1, '15:00:00', '23:00:00', 30, '21:30:00', 'Disponible'),
(589, 34, 1, '15:00:00', '23:00:00', 30, '22:00:00', 'Disponible'),
(590, 34, 1, '15:00:00', '23:00:00', 30, '22:30:00', 'Disponible'),
(617, 34, 2, '09:00:00', '22:00:00', 30, '09:00:00', 'Disponible'),
(618, 34, 2, '09:00:00', '22:00:00', 30, '09:30:00', 'Disponible'),
(619, 34, 2, '09:00:00', '22:00:00', 30, '10:00:00', 'Disponible'),
(620, 34, 2, '09:00:00', '22:00:00', 30, '10:30:00', 'Disponible'),
(621, 34, 2, '09:00:00', '22:00:00', 30, '11:00:00', 'Disponible'),
(622, 34, 2, '09:00:00', '22:00:00', 30, '11:30:00', 'Disponible'),
(623, 34, 2, '09:00:00', '22:00:00', 30, '12:00:00', 'Disponible'),
(624, 34, 2, '09:00:00', '22:00:00', 30, '12:30:00', 'Disponible'),
(625, 34, 2, '09:00:00', '22:00:00', 30, '13:00:00', 'Disponible'),
(626, 34, 2, '09:00:00', '22:00:00', 30, '13:30:00', 'Disponible'),
(627, 34, 2, '09:00:00', '22:00:00', 30, '14:00:00', 'Disponible'),
(628, 34, 2, '09:00:00', '22:00:00', 30, '14:30:00', 'Disponible'),
(629, 34, 2, '09:00:00', '22:00:00', 30, '15:00:00', 'Disponible'),
(630, 34, 2, '09:00:00', '22:00:00', 30, '15:30:00', 'Disponible'),
(631, 34, 2, '09:00:00', '22:00:00', 30, '16:00:00', 'Disponible'),
(632, 34, 2, '09:00:00', '22:00:00', 30, '16:30:00', 'Disponible'),
(633, 34, 2, '09:00:00', '22:00:00', 30, '17:00:00', 'Disponible'),
(634, 34, 2, '09:00:00', '22:00:00', 30, '17:30:00', 'Disponible'),
(635, 34, 2, '09:00:00', '22:00:00', 30, '18:00:00', 'Disponible'),
(636, 34, 2, '09:00:00', '22:00:00', 30, '18:30:00', 'Disponible'),
(637, 34, 2, '09:00:00', '22:00:00', 30, '19:00:00', 'Disponible'),
(638, 34, 2, '09:00:00', '22:00:00', 30, '19:30:00', 'Disponible'),
(639, 34, 2, '09:00:00', '22:00:00', 30, '20:00:00', 'Disponible'),
(640, 34, 2, '09:00:00', '22:00:00', 30, '20:30:00', 'Disponible'),
(641, 34, 2, '09:00:00', '22:00:00', 30, '21:00:00', 'Disponible'),
(642, 34, 2, '09:00:00', '22:00:00', 30, '21:30:00', 'Disponible'),
(643, 34, 6, '12:00:00', '23:00:00', 30, '12:00:00', 'Disponible'),
(644, 34, 6, '12:00:00', '23:00:00', 30, '12:30:00', 'Disponible'),
(645, 34, 6, '12:00:00', '23:00:00', 30, '13:00:00', 'Disponible'),
(646, 34, 6, '12:00:00', '23:00:00', 30, '13:30:00', 'Disponible'),
(647, 34, 6, '12:00:00', '23:00:00', 30, '14:00:00', 'Disponible'),
(648, 34, 6, '12:00:00', '23:00:00', 30, '14:30:00', 'Disponible'),
(649, 34, 6, '12:00:00', '23:00:00', 30, '15:00:00', 'Disponible'),
(650, 34, 6, '12:00:00', '23:00:00', 30, '15:30:00', 'Disponible'),
(651, 34, 6, '12:00:00', '23:00:00', 30, '16:00:00', 'Disponible'),
(652, 34, 6, '12:00:00', '23:00:00', 30, '16:30:00', 'Disponible'),
(653, 34, 6, '12:00:00', '23:00:00', 30, '17:00:00', 'Disponible'),
(654, 34, 6, '12:00:00', '23:00:00', 30, '17:30:00', 'Disponible'),
(655, 34, 6, '12:00:00', '23:00:00', 30, '18:00:00', 'Disponible'),
(656, 34, 6, '12:00:00', '23:00:00', 30, '18:30:00', 'Disponible'),
(657, 34, 6, '12:00:00', '23:00:00', 30, '19:00:00', 'Disponible'),
(658, 34, 6, '12:00:00', '23:00:00', 30, '19:30:00', 'Disponible'),
(659, 34, 6, '12:00:00', '23:00:00', 30, '20:00:00', 'Disponible'),
(660, 34, 6, '12:00:00', '23:00:00', 30, '20:30:00', 'Disponible'),
(661, 34, 6, '12:00:00', '23:00:00', 30, '21:00:00', 'Disponible'),
(662, 34, 6, '12:00:00', '23:00:00', 30, '21:30:00', 'Disponible'),
(663, 34, 6, '12:00:00', '23:00:00', 30, '22:00:00', 'Disponible'),
(664, 34, 6, '12:00:00', '23:00:00', 30, '22:30:00', 'Disponible'),
(761, 34, 5, '09:00:00', '16:00:00', 30, '09:00:00', 'Disponible'),
(762, 34, 5, '09:00:00', '16:00:00', 30, '09:30:00', 'Disponible'),
(763, 34, 5, '09:00:00', '16:00:00', 30, '10:00:00', 'Disponible'),
(764, 34, 5, '09:00:00', '16:00:00', 30, '10:30:00', 'Disponible'),
(765, 34, 5, '09:00:00', '16:00:00', 30, '11:00:00', 'Disponible'),
(766, 34, 5, '09:00:00', '16:00:00', 30, '11:30:00', 'Disponible'),
(767, 34, 5, '09:00:00', '16:00:00', 30, '12:00:00', 'Disponible'),
(768, 34, 5, '09:00:00', '16:00:00', 30, '12:30:00', 'Disponible'),
(769, 34, 5, '09:00:00', '16:00:00', 30, '13:00:00', 'Disponible'),
(770, 34, 5, '09:00:00', '16:00:00', 30, '13:30:00', 'Disponible'),
(771, 34, 5, '09:00:00', '16:00:00', 30, '14:00:00', 'Disponible'),
(772, 34, 5, '09:00:00', '16:00:00', 30, '14:30:00', 'Disponible'),
(773, 34, 5, '09:00:00', '16:00:00', 30, '15:00:00', 'Disponible'),
(774, 34, 5, '09:00:00', '16:00:00', 30, '15:30:00', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `modulo_id` int(11) NOT NULL,
  `modulo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`modulo_id`, `modulo`) VALUES
(1, 'Escritorio'),
(2, 'Paciente'),
(3, 'Citas'),
(4, 'Personal'),
(5, 'Valoracion'),
(6, 'Consulta Medica'),
(7, 'Horario'),
(8, 'Especialidad'),
(9, 'Consultas'),
(10, 'Configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `paciente_cod` int(11) NOT NULL,
  `pac_cedula` varchar(10) NOT NULL,
  `pac_nombre` varchar(20) NOT NULL,
  `pac_apellido` varchar(20) NOT NULL,
  `pac_fchnac` date NOT NULL,
  `pac_sangre` varchar(5) NOT NULL,
  `pac_genero` varchar(10) NOT NULL,
  `pac_email` varchar(30) NOT NULL,
  `pac_direccion` varchar(30) DEFAULT NULL,
  `pac_telf` varchar(10) NOT NULL,
  `pac_resp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`paciente_cod`, `pac_cedula`, `pac_nombre`, `pac_apellido`, `pac_fchnac`, `pac_sangre`, `pac_genero`, `pac_email`, `pac_direccion`, `pac_telf`, `pac_resp`) VALUES
(1, '0958562233', 'Jesus Andrado', 'Santiago Lopez', '1990-07-18', 'B+', 'Masculino', 'jesus@gmail.com', 'Las Malvinas', '0958442231', 'Jose Lopez'),
(2, '0944564640', 'Pancho Jose', 'Echeveria', '1995-06-14', 'O+', 'Masculino', 'guri@gmail.com', 'Las duras', '0959565640', ''),
(3, '0954643649', 'Juan', 'Ponce Lopez', '1989-03-14', 'AB+', 'Masculino', '', 'Las Peñas', '0959595494', ''),
(4, '0958235426', 'Gabriel', 'Sosa', '1975-11-12', 'B-', 'Masculino', '', '', '0990595000', ''),
(5, '0958235541', 'Jose Enrique', 'Ibarra', '1979-07-11', 'B+', 'Masculino', '', '', '0905044040', ''),
(6, '0995095909', 'Alvaro', 'Yepes', '1962-08-11', 'B-', 'Masculino', '', '', '0952950909', ''),
(7, '0956466646', 'Luisa', 'Sosa', '1989-06-11', 'AB-', 'Femenino', '', '', '0955656009', ''),
(8, '0952149464', 'Viviana', 'Flores', '1992-04-11', 'AB+', 'Femenino', '', '', '', 'Pablo Garcia'),
(9, '0953595050', 'Victor Lucas', 'Rogelio', '1985-05-11', 'A-', 'Masculino', '', 'Cdla.La Bolivariana', '0905595909', ''),
(10, '0952164644', 'Manuel', 'Gonzales', '1981-06-11', 'B+', 'Masculino', '', 'Cdla. Las orquideas', '0955464616', ''),
(11, '0954266461', 'Pablo', 'Perez', '1980-06-14', 'B+', 'Masculino', '', 'Av. de las Americas', '0995646949', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `per_cedula` varchar(10) NOT NULL,
  `per_nombre` varchar(30) NOT NULL,
  `per_apellido` varchar(30) NOT NULL,
  `per_fchnac` date NOT NULL,
  `per_genero` varchar(20) NOT NULL,
  `per_email` varchar(30) DEFAULT NULL,
  `per_telf` varchar(10) NOT NULL,
  `esp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `per_cedula`, `per_nombre`, `per_apellido`, `per_fchnac`, `per_genero`, `per_email`, `per_telf`, `esp_id`) VALUES
(33, '0954690480', 'Javier Miguel', 'Gomez', '1979-05-11', 'Masculino', '', '', 2),
(34, '0954231330', 'Paola', 'Garcia', '1996-06-11', 'Femenino', '', '', 1),
(35, '0954231330', 'Humberto', 'Garcia', '1974-04-12', 'Masculino', '', '0950950950', 3),
(36, '0954690480', 'Jose Luis', 'Lopez', '1990-06-11', 'Masculino', '', '', 7),
(37, '0959499464', 'Alex Jorge', 'Silva', '1966-05-11', 'Masculino', '', '', 8),
(38, '0954231313', 'Javier Miguel', 'Garcia', '1980-06-14', 'Masculino', '', '', 6),
(39, '0959499464', 'Gabriel', 'Perez Carrizo', '1984-05-14', 'Masculino', '', '', 2),
(40, '0952120063', 'Clever Augusto', 'Garcia Silva', '1980-06-14', 'Masculino', NULL, '0965221203', NULL),
(41, '0959545009', 'Gabriel', 'Yepez', '1979-06-14', 'Masculino', '', '0959494949', 7),
(42, '0958650659', 'Lucia', 'Vasquez', '1977-06-14', 'Masculino', '', '0959946066', 7),
(43, '0954056905', 'Mateo Devian', 'Morales Valbuena', '1970-05-11', 'Masculino', '', '0909895095', 1),
(44, '0958230559', 'Hector', 'Perez', '1980-06-11', 'Masculino', '', '0958205060', 7),
(45, '0955624523', 'Enrique', 'Flavio', '1970-06-11', 'Masculino', '', '', 1),
(47, '0920868122', 'Clara', 'Romero', '1980-11-01', 'Femenino', '', '', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `acceso` varchar(45) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `rol`, `acceso`, `clave`, `estado`) VALUES
(33, 'Medico', 'javier111', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(34, 'Medico', 'paola', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(35, 'Medico', 'humberto123', '8bfd946784a4f0d377628af1d004e07eb8208a980acb040194b09e8142cccc7c', 1),
(36, 'Admin', 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(37, 'Medico', 'medico123', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(38, 'Medico', 'user123', '756bc47cb5215dc3329ca7e1f7be33a2dad68990bb94b76d90aa07f4e44a233a', 1),
(39, 'Medico', 'gabriel1234', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(40, 'Admin', 'augusto', '1234', 1),
(42, 'Secretaria', 'cajera', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(43, 'Medico', 'mateo123', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0),
(44, 'Admin', 'user123', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(45, 'Medico', 'emrique', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(47, 'Auxiliar', 'clara123', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_modulo`
--

CREATE TABLE `usuario_modulo` (
  `idusuario_modulo` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `modulo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_modulo`
--

INSERT INTO `usuario_modulo` (`idusuario_modulo`, `usuario_id`, `modulo_id`) VALUES
(250, 39, 1),
(251, 39, 6),
(252, 39, 9),
(257, 37, 1),
(258, 37, 3),
(259, 37, 6),
(260, 37, 9),
(261, 33, 1),
(262, 33, 2),
(263, 33, 6),
(264, 33, 9),
(277, 36, 1),
(278, 36, 2),
(279, 36, 3),
(280, 36, 4),
(281, 36, 5),
(282, 36, 7),
(283, 36, 8),
(284, 36, 9),
(285, 36, 10),
(286, 34, 1),
(287, 34, 2),
(288, 34, 3),
(289, 34, 6),
(290, 43, 6),
(291, 43, 9),
(292, 42, 1),
(293, 42, 2),
(294, 42, 3),
(295, 42, 5),
(296, 42, 9),
(297, 44, 1),
(298, 44, 2),
(299, 44, 3),
(300, 44, 4),
(301, 44, 5),
(302, 44, 6),
(303, 44, 7),
(304, 44, 8),
(305, 44, 9),
(306, 44, 10),
(315, 47, 2),
(316, 47, 3),
(317, 47, 5),
(318, 45, 1),
(319, 45, 2),
(320, 45, 5),
(321, 45, 6),
(322, 45, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`),
  ADD KEY `paciente_cod` (`paciente_cod`),
  ADD KEY `medico_id` (`medico_id`),
  ADD KEY `registrador_id` (`registrador_id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idconfiguracion`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `agenda_id` (`agenda_id`),
  ADD KEY `cod_diagnostico` (`cod_diagnostico`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`cod_dia`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`cod_diagnostico`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`esp_id`);

--
-- Indices de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  ADD PRIMARY KEY (`idficha_medica`),
  ADD KEY `agenda_id` (`agenda_id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`),
  ADD KEY `cod_dia` (`cod_dia`),
  ADD KEY `medico_id` (`medico_id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`modulo_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`paciente_cod`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `esp_id` (`esp_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  ADD PRIMARY KEY (`idusuario_modulo`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `cod_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `cod_diagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `esp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  MODIFY `idficha_medica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `modulo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `paciente_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  MODIFY `idusuario_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`paciente_cod`) REFERENCES `paciente` (`paciente_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`medico_id`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`registrador_id`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`agenda_id`) REFERENCES `agenda` (`agenda_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`cod_diagnostico`) REFERENCES `diagnostico` (`cod_diagnostico`);

--
-- Filtros para la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  ADD CONSTRAINT `ficha_medica_ibfk_1` FOREIGN KEY (`agenda_id`) REFERENCES `agenda` (`agenda_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`cod_dia`) REFERENCES `dia` (`cod_dia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`medico_id`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`esp_id`) REFERENCES `especialidad` (`esp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`usuario_id`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  ADD CONSTRAINT `usuario_modulo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_modulo_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`modulo_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;