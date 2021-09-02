-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2021 a las 21:35:49
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_uemcc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idAsis` int(20) NOT NULL,
  `curso` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dia` date NOT NULL,
  `atten` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `materia` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `seccion` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `asistEsp` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `materias_idMat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año`
--

CREATE TABLE `año` (
  `id` int(20) NOT NULL,
  `nombreAño` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `año_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idcalificacion` int(11) NOT NULL,
  `estudiantes_idEst` int(20) NOT NULL,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloespecialidad`
--

CREATE TABLE `cicloespecialidad` (
  `idcicloEsp` int(20) NOT NULL,
  `NombrecicloEspecialidad` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `Grado` int(45) NOT NULL,
  `año_id` int(20) NOT NULL,
  `horario_horario_id` int(11) NOT NULL,
  `secciones_idSec` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `idDoc` int(20) NOT NULL,
  `nombreDoc` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(82) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sector` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `barrioCiudadela` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telfCon` int(20) NOT NULL,
  `telfCel` int(20) NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correoInst` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estadoDoc` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `año_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idEst` int(20) NOT NULL,
  `nombreEst` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `repEst` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `edad` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `curso` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `seccion` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cicloEsp` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Estado` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `dia` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora1` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora2` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora3` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora4` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora5` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora6` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora7` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora8` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `año` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `seccion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cicloEspecializacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `horario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiadoc`
--

CREATE TABLE `materiadoc` (
  `idMatdoc` int(10) NOT NULL,
  `nombreDoc` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `asignatura` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `año` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `seccion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cicloEsp` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `materias_idMat` int(20) NOT NULL,
  `docente_idDoc` int(20) NOT NULL,
  `cicloespecialidad_idcicloEsp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idMat` int(20) NOT NULL,
  `nombreMat` varchar(82) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CursoMateria` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `notas` decimal(10,2) NOT NULL,
  `observaciones` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `Nombre` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idSec` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(20) NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_usuario` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreUsuario` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipo_usuario`
--

CREATE TABLE `usuario_tipo_usuario` (
  `usuario_tipo_usuario_id` int(20) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `usuario_id` int(20) NOT NULL,
  `tipo_usuario_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsis`),
  ADD KEY `fk_asistencia_cursos` (`cursos_id`),
  ADD KEY `fk_asistencia_materias1` (`materias_idMat`);

--
-- Indices de la tabla `año`
--
ALTER TABLE `año`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idcalificacion`),
  ADD KEY `fk_calificacion_estudiantes` (`estudiantes_idEst`),
  ADD KEY `fk_calificacion_curso1` (`curso_id`);

--
-- Indices de la tabla `cicloespecialidad`
--
ALTER TABLE `cicloespecialidad`
  ADD PRIMARY KEY (`idcicloEsp`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curso_año1` (`año_id`),
  ADD KEY `fk_curso_horario1` (`horario_horario_id`),
  ADD KEY `fk_curso_secciones1` (`secciones_idSec`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`idDoc`),
  ADD KEY `fk_docente_año1` (`año_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEst`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`horario_id`);

--
-- Indices de la tabla `materiadoc`
--
ALTER TABLE `materiadoc`
  ADD PRIMARY KEY (`idMatdoc`),
  ADD KEY `fk_materiadoc_materias1` (`materias_idMat`),
  ADD KEY `fk_materiadoc_docente1` (`docente_idDoc`),
  ADD KEY `fk_materiadoc_cicloespecialidad1` (`cicloespecialidad_idcicloEsp`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idMat`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSec`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_tipo_usuario`
--
ALTER TABLE `usuario_tipo_usuario`
  ADD PRIMARY KEY (`usuario_tipo_usuario_id`),
  ADD KEY `fk_usuario_tipo_usuario_usuario1` (`usuario_id`),
  ADD KEY `fk_usuario_tipo_usuario_tipo_usuario1` (`tipo_usuario_id1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materiadoc`
--
ALTER TABLE `materiadoc`
  MODIFY `idMatdoc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `idMat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_cursos` FOREIGN KEY (`cursos_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_materias1` FOREIGN KEY (`materias_idMat`) REFERENCES `materias` (`idMat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificacion_estudiantes` FOREIGN KEY (`estudiantes_idEst`) REFERENCES `estudiantes` (`idEst`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_año1` FOREIGN KEY (`año_id`) REFERENCES `sistema_uemc`.`año` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_horario1` FOREIGN KEY (`horario_horario_id`) REFERENCES `horario` (`horario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_secciones1` FOREIGN KEY (`secciones_idSec`) REFERENCES `secciones` (`idSec`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_año1` FOREIGN KEY (`año_id`) REFERENCES `año` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materiadoc`
--
ALTER TABLE `materiadoc`
  ADD CONSTRAINT `fk_materiadoc_cicloespecialidad1` FOREIGN KEY (`cicloespecialidad_idcicloEsp`) REFERENCES `cicloespecialidad` (`idcicloEsp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materiadoc_docente1` FOREIGN KEY (`docente_idDoc`) REFERENCES `docente` (`idDoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materiadoc_materias1` FOREIGN KEY (`materias_idMat`) REFERENCES `materias` (`idMat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_tipo_usuario`
--
ALTER TABLE `usuario_tipo_usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id1`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_usuario_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
