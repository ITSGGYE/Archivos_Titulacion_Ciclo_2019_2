-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2021 a las 04:47:16
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
-- Base de datos: `citas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contrasena` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre_apellido` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_rol` int(10) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `usuario`, `contrasena`, `nombre_apellido`, `id_rol`, `fecha_creacion`) VALUES
(1, 'admin', 'vnShz/SAurnLq7Zgc+K9EQ==', 'Andrea Hernandez Lopez', 1, '2021-05-09 08:52:03'),
(2, 'prueba', 'WZLegg1nFaqaS0JqeSbklA==', 'prueba prueva', 1, '2021-05-09 22:02:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `paciente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_especialista` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` enum('asignado','atendido','cancelado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `observacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_paciente`, `paciente`, `id_especialidad`, `id_especialista`, `fecha`, `hora`, `estado`, `observacion`) VALUES
(1, 1, 'Jennis Valders', 8, 13, '2021-05-04', '09:00:00', 'atendido', 'envio de paracetamol'),
(2, 1, 'Jennis Valders', 10, 14, '2021-05-13', '14:45:00', 'atendido', 'enviado a descanzar y relajacion '),
(4, 2, 'Nat Martínez', 10, 14, '2021-05-15', '11:45:00', 'asignado', 'ansiedad'),
(7, 3, 'jean duls leal', 8, 13, '2021-06-30', '11:45:00', 'cancelado', 'dolor de cabeza'),
(10, 1, 'Jennis Valders', 10, 14, '2021-05-15', '18:30:00', 'cancelado', 'prueba2'),
(11, 1, 'Jennis Valders', 10, 17, '2021-08-06', '16:15:00', 'cancelado', 'prueba 3'),
(12, 4, 'Marin Gonzales', 8, 13, '2021-08-08', '16:15:00', 'asignado', 'pruevba'),
(15, 1, 'Jennis Valders', 8, 13, '2021-05-15', '18:30:00', 'cancelado', ''),
(16, 1, 'Jennis Valders', 10, 17, '2021-06-20', '12:30:00', 'asignado', ''),
(17, 39, 'Carlos Merlin', 8, 13, '2021-06-04', '14:00:00', 'cancelado', 'nnnnnn'),
(18, 39, 'Carlos Merlin', 8, 13, '2021-05-28', '16:15:00', 'cancelado', ''),
(19, 3, 'jean duls leal', 10, 14, '2021-05-20', '13:15:00', 'cancelado', ''),
(20, 2, 'Nat Martínez', 8, 13, '2021-05-14', '12:30:00', 'cancelado', ''),
(21, 1, 'Jennis Valders', 8, 13, '2021-06-01', '14:45:00', 'asignado', ''),
(22, 3, 'jean duls leal', 8, 13, '2021-06-04', '16:15:00', 'asignado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre_contacto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre_contacto`, `telefono`, `correo`, `mensaje`) VALUES
(1, 'DANIEL Benites', '0947851200', 'danbeni56@hotmail.com', 'hello'),
(5, 'Gabriela Gallardo', '0987451478', 'gabila4@gmail.com', 'hello'),
(6, 'hello', '042147855', 'hell@hotmail.com', 'jbkcgzxiugxciukx'),
(7, 'rambo miracles', '0987451478', 'marlen desire', 'necesito saber de precios o es gratuito'),
(8, 'name', '0921684588', 'leua23@hotmail.com', 'b,mnbkj'),
(9, 'yenny', '0921684588', 'jesus@hotmail.com', 'nbkjnbkj'),
(10, 'jerry gold', '0987451245', 'njumthebest@hotmail.com', 'vcbcbv'),
(11, 'yensenia', '0987451245', 'anun@hotmail.com', 'vcbjlkhhk'),
(13, 'iyiutuyfh', '0456879122', 'jav66@hotmail.com', 'jfdsfewsera'),
(15, 'esto es una prueba', '0980809091', 'moragonzales@hotmail.com', 'esto es una prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`) VALUES
(8, 'reprogramar vida'),
(10, 'Psicología'),
(15, 'medico general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE `especialista` (
  `id_especialista` int(11) NOT NULL,
  `cedula_esp` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_especialidad` int(10) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`id_especialista`, `cedula_esp`, `nombre_doctor`, `telefono`, `direccion`, `correo`, `fecha_nacimiento`, `genero`, `id_especialidad`) VALUES
(13, '0985412500', 'daniella mendoza', '0921874631', 'samanes', 'dm@hotmail.com', '1989-05-10', 'Femenino', 8),
(14, '0987457601', 'Duet Danins', '0947851210', 'Guasmo Norte', 'duetdas981@gmail.com', '1989-02-06', 'Masculino', 10),
(17, '0953983749', 'yen ced', '0954781245', 'Samanes 5', 'yen@gmail.com', '1989-05-23', 'Femenino', 10),
(19, '0909817512', 'Daniela Contreras', '0909874512', 'Los Alamos ', 'danContreras1992@gmail.com', '1992-10-25', 'Femenino', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(10) NOT NULL,
  `cod_paciente` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_paciente` int(60) NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(2225) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(225) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(225) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `civil` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mot` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `recom` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `cod_paciente`, `id_paciente`, `cedula`, `fecha_nacimiento`, `genero`, `correo`, `edad`, `pais`, `provincia`, `ciudad`, `direccion`, `telefono`, `civil`, `mot`, `recom`) VALUES
(1, '00020', 1, '0953983700', '1991-05-05', 'Femenino', 'jenvaer92@hotmail.com', '27', 'ecuador', 'guayas', 'guayaquil', 'samanes', '0987451274', 'Soltero/a', 'sin dormir y dolor de espalda y nuca 	', 'descanso ejercio de respiracion y envio de medicina'),
(2, '0003', 3, '0987451122', '1995-06-16', 'Masculino', 'jean@hotmail.com', '22', 'Ecuador', 'manabi', 'manabi', 'manabi', '0980809091', 'Soltero/a', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `cedula` char(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` enum('Femenino','Masculino') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(10) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `cedula`, `nombre_apellido`, `correo`, `contrasena`, `fecha_nacimiento`, `sexo`, `id_rol`) VALUES
(1, '0953983700', 'Jennis Valders', 'jenvaer92@hotmail.com', 'fKyEGsvGGdXFrPEBKnb7Vw==', '1991-05-05', 'Femenino', 2),
(2, '0987451111', 'Nat Martínez', 'natwell65@hotmail.com', 'fKyEGsvGGdXFrPEBKnb7Vw==', '1996-05-13', 'Femenino', 2),
(3, '0987451122', 'jean duls leal', 'jean@hotmail.com', 'Oh1yRiNGxNCXfuijcB0q9g==', '1995-06-16', 'Masculino', 2),
(4, '0940874985', 'Marin Gonzales', 'ramditech@gmail.com', 'Mujq4z7noSn52Px3Lyojig==', '1997-04-25', 'Masculino', 2),
(24, '0953983701', 'Señor Prueba', 'prueba22@hotmail.com', 'gcX4fWEXi938ZK0VOxiyeQ==', '1990-05-05', 'Masculino', 2),
(28, '0909814752', 'Joel Gonzales', 'gonzalesjoel@hotmail.com', 'fKyEGsvGGdXFrPEBKnb7Vw==', '2021-05-13', 'Masculino', 2),
(39, '0909850679', 'Carlos Merlin', 'leua23@hotmail.com', 'WZLegg1nFaqaS0JqeSbklA==', '1967-05-04', 'Masculino', 2),
(40, '0921684585', 'Nathaly uvidia', 'michelletomala04@gmail.com', 'fKyEGsvGGdXFrPEBKnb7Vw==', '1995-05-12', 'Masculino', 2),
(41, '0930044888', 'Carlos Merlin', 'admin@hmkvm.com', 'Vmtw10WjVvyfEZNdBZtqiQ==', '1967-05-12', 'Masculino', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL,
  `nombre_rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `estado`) VALUES
(1, 'Administrador', 'A'),
(2, 'Paciente', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio`
--

CREATE TABLE `sitio` (
  `id_sitio` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `subtema` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sitio`
--

INSERT INTO `sitio` (`id_sitio`, `id_especialidad`, `subtema`, `descripcion`, `imagen`) VALUES
(4, 8, 'Salud Emocional', 'Sesiones de acompañamiento que contribuirán al desarrollo de herramientas emocionales que le permitan al cliente. Enfrentar las adversidades de lo cotidiano de una manera más profunda y reflexiva... Encaminadas a generar un pleno desarrollo del Ser Humano\r\n\r\nAlcanzar lo que queremos y transformar nuestra vida es la meta que todos deseamos.\r\n', 'img/img.jpg'),
(5, 10, 'Salud Emocional y Mental', 'La psicología o sicología es una ciencia social y una disciplina académica enfocadas en el análisis y la comprensión de la conducta humana y de los procesos mentales experimentados por individuos y por grupos sociales durante momentos y situaciones determinadas.\r\n\r\nCiencia social se interesa por los procesos de la percepción, la motivación, la atención, la inteligencia, el aprendizaje, el pensamiento, la personalidad, el amor, la conciencia y la inconsciencia, pero también por las relaciones interpersonales y por el funcionamiento bioquímico del cerebro.\r\n\r\n\r\n', 'img/psicologia.jpg');

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
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`id_especialista`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sitio`
--
ALTER TABLE `sitio`
  ADD PRIMARY KEY (`id_sitio`);

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
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `especialista`
--
ALTER TABLE `especialista`
  MODIFY `id_especialista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sitio`
--
ALTER TABLE `sitio`
  MODIFY `id_sitio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
