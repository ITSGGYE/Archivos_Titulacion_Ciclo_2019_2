-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 23:07:34
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softhotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonoscreditos`
--

CREATE TABLE `abonoscreditos` (
  `codabono` int(11) NOT NULL,
  `codcaja` int(11) NOT NULL,
  `codventa` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montoabono` decimal(12,2) NOT NULL,
  `fechaabono` datetime NOT NULL,
  `codsucursal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonoscreditosreservaciones`
--

CREATE TABLE `abonoscreditosreservaciones` (
  `codabono` int(11) NOT NULL,
  `codcaja` int(11) NOT NULL,
  `codreservacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montoabono` decimal(12,2) NOT NULL,
  `fechaabono` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonoscreditosventas`
--

CREATE TABLE `abonoscreditosventas` (
  `codabono` int(11) NOT NULL,
  `codcaja` int(11) NOT NULL,
  `codventa` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montoabono` decimal(12,2) NOT NULL,
  `fechaabono` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arqueocaja`
--

CREATE TABLE `arqueocaja` (
  `codarqueo` int(11) NOT NULL,
  `codcaja` int(11) NOT NULL,
  `montoinicial` float(12,2) NOT NULL,
  `ingresos` float(12,2) NOT NULL,
  `egresos` float(12,2) NOT NULL,
  `creditos` float(12,2) NOT NULL,
  `abonos` float(12,2) NOT NULL,
  `dineroefectivo` float(12,2) NOT NULL,
  `diferencia` float(12,2) NOT NULL,
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaapertura` datetime NOT NULL,
  `fechacierre` datetime NOT NULL,
  `statusarqueo` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `arqueocaja`
--

INSERT INTO `arqueocaja` (`codarqueo`, `codcaja`, `montoinicial`, `ingresos`, `egresos`, `creditos`, `abonos`, `dineroefectivo`, `diferencia`, `comentarios`, `fechaapertura`, `fechacierre`, `statusarqueo`) VALUES
(1, 1, 0.00, 146.27, 0.00, 583.39, 0.00, 0.00, 0.00, '', '2019-09-15 01:11:58', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `codcaja` int(11) NOT NULL,
  `nrocaja` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nomcaja` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`codcaja`, `nrocaja`, `nomcaja`, `codigo`) VALUES
(1, '#113', 'CAJA PRINCIPAL', 2),
(2, '#115', 'CAJA RECEPCIONISTA', 3),
(3, '#118', 'CAJA DE COBRO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `codcategoria` int(11) NOT NULL,
  `nomcategoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codcategoria`, `nomcategoria`) VALUES
(1, 'PASTILLAS'),
(2, 'GALLETAS'),
(3, 'PEPITOS'),
(7, 'CHUPETAS'),
(4, 'JUGOS NATURALES'),
(5, 'JUGO CITRICOS'),
(6, 'CHOCOLATES'),
(8, 'CARAMELOS'),
(9, 'REFRESCOS DE LATA'),
(10, 'REFRESCOS DE BOTELLA'),
(11, 'TORTAS'),
(12, 'INSU. LIMPIEZA'),
(13, 'DETERGENTES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documcliente` int(11) NOT NULL,
  `dnicliente` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nomcliente` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `paiscliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudadcliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccliente` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefcliente` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correocliente` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `passwordcliente` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `limitecredito` float(12,2) NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `codcliente`, `documcliente`, `dnicliente`, `nomcliente`, `paiscliente`, `ciudadcliente`, `direccliente`, `telefcliente`, `correocliente`, `passwordcliente`, `limitecredito`, `fechaingreso`) VALUES
(1, 'C1', 1, '216900456', 'RUBEN DARIO CHIRINOS RODRIGUEZ', 'VE', 'CABIMAS ESTADO ZULIA', 'SECTOR PADRE GRANADO', '(0414) 7225970', '', '45e72fc395cfeed2a521192bc30ce9008bee71d7', 300.00, '2019-08-27'),
(2, 'C2', 2, '21099254', 'MOISES RODOLFO', 'VE', 'CABIMAS', 'SECTOR R10', '(0424) 6551231', '', '1bae48f0fbe2eaf45152198cfba4ee0b0a616949', 0.00, '2019-08-27'),
(3, 'C3', 2, '19144821', 'RAFAEL DE JESUS', 'VE', 'CABIMAS - ESTADO ZULIA', 'SECTOR LA PADRERA', '(0416) 5441231', 'RAF@GMAIL.COM', 'aa0b7586de1df90252560e631876f212ff1301f2', 0.00, '2019-08-27'),
(4, 'C4', 2, '1003125877', 'MARCELA DEL ROCIO', 'EC', 'URRIBARI', 'URRIBARI', '(5836) 9857885', '', 'fbe00d4012d8e3f19474c81a0183a291c54aa540', 0.00, '2019-08-27'),
(5, 'C5', 2, '15432452', 'CARLOS DAVID', 'VE', 'EL VIGIA', 'SECTOR LA PEDREGOSA', '(0424) 6541222', '', 'c3e5b78f8b0570ebea955de2740cf3183694f9c2', 0.00, '2019-08-27'),
(6, 'C6', 16, '28761982', 'RICHARD JOSSE CHIRINOS RODRIGUEZ', 'VE', 'CABIMAS', 'LOS LAURELES', '(0412) 8761009', 'RICHARDJCH@GMAIL.COM', '7b7c5179d358eb8df3ee038e450ba4e13ff0cb28', 0.00, '2019-10-17'),
(7, 'C7', 16, '18633174', 'RUBEN DARIO CHIRINOS RODRIGUEZ', 'VE', 'MERIDA', 'EL VIGIA', '(0414) 7225970', 'ELSAIYA@GMAIL.COM', '42c38bca675772b7bacc4102c079d3f250ecfa65', 0.00, '2019-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idcompra` int(11) NOT NULL,
  `codcompra` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codproveedor` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subtotalivasic` decimal(12,2) NOT NULL,
  `subtotalivanoc` decimal(12,2) NOT NULL,
  `ivac` decimal(12,2) NOT NULL,
  `totalivac` decimal(12,2) NOT NULL,
  `descuentoc` decimal(12,2) NOT NULL,
  `totaldescuentoc` decimal(12,2) NOT NULL,
  `totalpagoc` decimal(12,2) NOT NULL,
  `tipocompra` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `formacompra` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechavencecredito` date NOT NULL,
  `fechapagado` date NOT NULL,
  `observaciones` text CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `statuscompra` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaemision` date NOT NULL,
  `fecharecepcion` date NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idcompra`, `codcompra`, `codproveedor`, `subtotalivasic`, `subtotalivanoc`, `ivac`, `totalivac`, `descuentoc`, `totaldescuentoc`, `totalpagoc`, `tipocompra`, `formacompra`, `fechavencecredito`, `fechapagado`, `observaciones`, `statuscompra`, `fechaemision`, `fecharecepcion`, `codigo`) VALUES
(1, '00634', 'P2', '3820.00', '0.00', '18.00', '687.60', '0.00', '0.00', '4507.60', 'CONTADO', '1', '0000-00-00', '0000-00-00', 'NINGUNA', 'PAGADA', '2019-10-02', '2019-10-04', 2),
(2, '08734', 'P4', '11200.00', '0.00', '18.00', '2016.00', '0.00', '0.00', '13216.00', 'CONTADO', '1', '0000-00-00', '0000-00-00', 'NINGUNA', 'PAGADA', '2019-10-04', '2019-10-04', 2),
(3, '00983', 'P5', '15870.00', '0.00', '18.00', '2856.60', '0.00', '0.00', '18726.60', 'CREDITO', 'CREDITO', '2019-10-18', '0000-00-00', 'NINGUNA', 'PENDIENTE', '2019-10-05', '2019-10-06', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `documgerente` int(11) NOT NULL,
  `cedgerente` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nomgerente` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tlfgerente` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direcgerente` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documenhotel` int(11) NOT NULL,
  `nrohotel` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nomhotel` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tlfhotel` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direchotel` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `emailhotel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `categoriahotel` int(2) NOT NULL,
  `nroactividad` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `iniciofactura` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaautorizacion` date NOT NULL,
  `llevacontabilidad` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `acerca` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `metodopago` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dsctor` decimal(12,2) NOT NULL,
  `dsctov` decimal(12,2) NOT NULL,
  `codmoneda` int(11) NOT NULL,
  `codmoneda2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `documgerente`, `cedgerente`, `nomgerente`, `tlfgerente`, `direcgerente`, `documenhotel`, `nrohotel`, `nomhotel`, `tlfhotel`, `direchotel`, `emailhotel`, `categoriahotel`, `nroactividad`, `iniciofactura`, `fechaautorizacion`, `llevacontabilidad`, `acerca`, `metodopago`, `dsctor`, `dsctov`, `codmoneda`, `codmoneda2`) VALUES
(1, 11, '1060000770001', 'RUBEN DARIO CHIRINOS RODRIGUEZ', '(4014) 7225970', 'SANTA CRUZ DE MORA, ESTADO MERIDA', 1, '7665287123', 'HOTEL MADRID', '58 (0414) 7225970', 'IBARRA, IMBABURA - ECUADOR', 'ELSAIYA@GMAIL.COM', 4, '0001', '000000001', '0000-00-00', 'NO', 'NUESTRA EXCLUSIVA ARQUITECTURA NOS PERMITE BRINDARLE LOS M&Aacute;S ALTOS NIVELES DE CONFORT Y ELEGANCIA EN AMBIENTES DISE&Ntilde;ADOS Y ACONDICIONADOS CON EL &Uacute;NICO FIN DE SATISFACER TODAS SUS EXPECTATIVAS.', 'EFECTIVO, DEP&Oacute;SITO BANCARIO, TRANSFERENCIA BANCARIA Y TARJETAS DE CR&Eacute;DITO: AMERICAN EXPRESS, DINERS, MASTERCARD, VISA.', '5.00', '0.00', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditosxclientes`
--

CREATE TABLE `creditosxclientes` (
  `codcredito` int(11) NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montocredito` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `creditosxclientes`
--

INSERT INTO `creditosxclientes` (`codcredito`, `codcliente`, `montocredito`) VALUES
(1, 'C1', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `coddetallecompra` int(11) NOT NULL,
  `codcompra` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoentrada` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codproducto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `producto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcategoria` int(11) NOT NULL,
  `preciocomprac` decimal(12,2) NOT NULL,
  `precioventac` decimal(12,2) NOT NULL,
  `cantcompra` int(15) NOT NULL,
  `ivaproductoc` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descproductoc` decimal(12,2) NOT NULL,
  `descfactura` decimal(12,2) NOT NULL,
  `valortotal` decimal(12,2) NOT NULL,
  `totaldescuentoc` decimal(12,2) NOT NULL,
  `valorneto` decimal(12,2) NOT NULL,
  `lotec` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaelaboracionc` date NOT NULL,
  `fechaexpiracionc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detallecompras`
--

INSERT INTO `detallecompras` (`coddetallecompra`, `codcompra`, `tipoentrada`, `codproducto`, `producto`, `codcategoria`, `preciocomprac`, `precioventac`, `cantcompra`, `ivaproductoc`, `descproductoc`, `descfactura`, `valortotal`, `totaldescuentoc`, `valorneto`, `lotec`, `fechaelaboracionc`, `fechaexpiracionc`) VALUES
(1, '00634', 'PRODUCTO', '11', 'REFRESCO PEQUENO', 10, '150.00', '180.00', 4, 'SI', '0.00', '0.00', '600.00', '0.00', '600.00', '0', '0000-00-00', '0000-00-00'),
(2, '00634', 'PRODUCTO', '12', 'REFRESCO MEDIANO COCA COLA', 10, '120.00', '150.00', 15, 'SI', '0.00', '0.00', '1800.00', '0.00', '1800.00', '0', '0000-00-00', '0000-00-00'),
(3, '00634', 'INSUMO', 'I4', 'JABON LIQUIDO', 13, '60.00', '0.00', 12, 'SI', '0.00', '0.00', '720.00', '0.00', '720.00', '0', '0000-00-00', '0000-00-00'),
(4, '00634', 'INSUMO', 'I5', 'JABON AZUL LIQUIDO 1LT', 13, '70.00', '0.00', 10, 'SI', '0.00', '0.00', '700.00', '0.00', '700.00', '0', '0000-00-00', '0000-00-00'),
(5, '08734', 'PRODUCTO', '13', 'REFRESCO GRANDE COCA COLA', 10, '250.00', '320.00', 18, 'SI', '0.00', '0.00', '4500.00', '0.00', '4500.00', '0', '0000-00-00', '0000-00-00'),
(6, '08734', 'PRODUCTO', '17', 'CHOCOLATE GRANDE SAVOY', 6, '340.00', '380.00', 15, 'SI', '0.00', '0.00', '5100.00', '0.00', '5100.00', '0', '0000-00-00', '0000-00-00'),
(7, '08734', 'INSUMO', 'I2', 'ESCOBA SIN PALO', 12, '100.00', '0.00', 16, 'SI', '0.00', '0.00', '1600.00', '0.00', '1600.00', '0', '0000-00-00', '0000-00-00'),
(8, '00983', 'PRODUCTO', '21', 'CARAMELO UVITA', 8, '10.00', '13.00', 35, 'SI', '0.00', '0.00', '350.00', '0.00', '350.00', '0', '0000-00-00', '0000-00-00'),
(9, '00983', 'PRODUCTO', '19', 'GALLETA CLUB SOCIAL', 2, '50.00', '80.00', 49, 'SI', '0.00', '0.00', '2450.00', '0.00', '2450.00', '0', '0000-00-00', '0000-00-00'),
(10, '00983', 'PRODUCTO', '20', 'CARAMELOS DE LECHE', 8, '10.00', '15.00', 15, 'SI', '0.00', '0.00', '150.00', '0.00', '150.00', '0', '0000-00-00', '0000-00-00'),
(11, '00983', 'INSUMO', 'I3', 'COLETO CON PALO', 12, '180.00', '0.00', 4, 'SI', '0.00', '0.00', '720.00', '0.00', '720.00', '0', '0000-00-00', '0000-00-00'),
(12, '00983', 'INSUMO', 'I2', 'ESCOBA SIN PALO', 12, '100.00', '0.00', 122, 'SI', '0.00', '0.00', '12200.00', '0.00', '12200.00', '0', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereservaciones`
--

CREATE TABLE `detallereservaciones` (
  `coddetallereservacion` int(11) NOT NULL,
  `codreservacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codhabitacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `adultos` int(5) NOT NULL,
  `children` int(5) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `deschabitacion` decimal(12,2) NOT NULL,
  `valortotal` decimal(12,2) NOT NULL,
  `totaldescuento` decimal(12,2) NOT NULL,
  `valorneto` decimal(12,2) NOT NULL,
  `fechadetalle` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detallereservaciones`
--

INSERT INTO `detallereservaciones` (`coddetallereservacion`, `codreservacion`, `codhabitacion`, `adultos`, `children`, `desde`, `hasta`, `deschabitacion`, `valortotal`, `totaldescuento`, `valorneto`, `fechadetalle`) VALUES
(1, '0001-000000001', 'H1', 2, 1, '2019-10-14', '2019-10-16', '8.00', '84.00', '4.56', '79.44', '2019-10-14'),
(2, '0001-000000002', 'H3', 1, 0, '2019-10-14', '2019-10-15', '5.00', '56.00', '3.14', '52.86', '2019-10-14'),
(3, '0001-000000003', 'H6', 1, 0, '2019-10-14', '2019-10-17', '0.00', '112.00', '0.00', '112.00', '2019-10-14'),
(4, '0001-000000004', 'H2', 1, 0, '2019-10-17', '2019-10-20', '0.00', '112.00', '0.00', '112.00', '2019-10-14'),
(5, '0001-000000005', 'H5', 2, 0, '2019-10-19', '2019-10-24', '0.00', '90.00', '0.00', '90.00', '2019-10-14'),
(6, '0001-000000005', 'H6', 2, 1, '2019-10-19', '2019-10-24', '0.00', '168.00', '0.00', '168.00', '2019-10-14'),
(7, '0001-000000006', 'H4', 3, 0, '2019-10-29', '2019-10-31', '0.00', '84.00', '0.00', '84.00', '2019-10-17'),
(8, '0001-000000007', 'H2', 2, 1, '2019-11-05', '2019-11-08', '0.00', '152.00', '0.00', '152.00', '2019-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `coddetalleventa` int(11) NOT NULL,
  `codventa` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codproducto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantventa` int(15) NOT NULL,
  `preciocompra` decimal(12,2) NOT NULL,
  `precioventa` decimal(12,2) NOT NULL,
  `ivaproducto` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descproducto` decimal(12,2) NOT NULL,
  `valortotal` decimal(12,2) NOT NULL,
  `totaldescuentov` decimal(12,2) NOT NULL,
  `valorneto` decimal(12,2) NOT NULL,
  `valorneto2` decimal(12,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`coddetalleventa`, `codventa`, `codproducto`, `cantventa`, `preciocompra`, `precioventa`, `ivaproducto`, `descproducto`, `valortotal`, `totaldescuentov`, `valorneto`, `valorneto2`) VALUES
(1, '0001-000000001', '10', 4, '17.00', '22.00', 'SI', '0.00', '88.00', '0.00', '88.00', '68.00'),
(2, '0001-000000001', '12', 2, '120.00', '150.00', 'SI', '0.00', '300.00', '0.00', '300.00', '240.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `coddocumento` int(11) NOT NULL,
  `documento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`coddocumento`, `documento`, `descripcion`) VALUES
(1, 'RUC', 'REGISTRO UNICO DE CONTRIBUYENTES'),
(2, 'RUT', 'REGISTRO UNICO TRIBUTARIO'),
(3, 'RIF', 'REGISTRO DE INFORMACION FISCAL'),
(4, 'RFC', 'REGISTRO FEDERAL DE CONTRIBUYENTES'),
(5, 'RTN', 'REGISTRO TRIBUTARIO NACIONAL'),
(6, 'RTU', 'REGISTRO TRIBUTARIO UNIFICADO'),
(7, 'RNC', 'REGISTRO NACIONAL DEL CONTRIBUYENTE'),
(8, 'NIF', 'NUMERO DE IDENTIFICACION FISCAL'),
(9, 'NIT', 'NUMERO DE IDENTIFICACION TRIBUTARIA'),
(10, 'NITE', 'NUMERO DE IDENTIFICACION TRIBUTARIA ESPECIAL'),
(11, 'DNI', 'DOCUMENTO NACIONAL DE IDENTIDAD'),
(12, 'CUIL', 'CODIGO UNICO DE IDENTIFICACION LABORAL'),
(13, 'CUIT', 'CODIGO UNICO DE IDENTIFICACION TRIBUTARIA'),
(14, 'REGISTRO CIVIL', 'REGISTRO CIVIL'),
(15, 'TARJ. DE IDENTIDAD', 'TARJETA DE IDENTIDAD'),
(16, 'CI', 'CI EXTRANJERA'),
(17, 'PASAPORTE', 'PASAPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_insumos`
--

CREATE TABLE `entrada_insumos` (
  `identrada` int(11) NOT NULL,
  `codentrada` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codinsumo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precioentrada` decimal(12,2) NOT NULL,
  `cantentrada` int(5) NOT NULL,
  `fechaexpiracion` date NOT NULL,
  `codproveedor` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaentrada` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entrada_insumos`
--

INSERT INTO `entrada_insumos` (`identrada`, `codentrada`, `codinsumo`, `precioentrada`, `cantentrada`, `fechaexpiracion`, `codproveedor`, `fechaentrada`) VALUES
(1, 'C1', 'I1', '0.00', 5, '0000-00-00', '0', '2019-09-01'),
(2, 'C2', 'I5', '0.00', 12, '0000-00-00', '0', '2019-09-01'),
(3, 'C3', 'I5', '0.00', 6, '0000-00-00', '0', '2019-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idhabitacion` int(11) NOT NULL,
  `codhabitacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numhabitacion` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descriphabitacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `piso` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `vista` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `maxadultos` int(5) NOT NULL,
  `maxninos` int(5) NOT NULL,
  `codtarifa` int(5) NOT NULL,
  `deschabitacion` decimal(12,2) NOT NULL,
  `statushab` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idhabitacion`, `codhabitacion`, `numhabitacion`, `descriphabitacion`, `piso`, `vista`, `maxadultos`, `maxninos`, `codtarifa`, `deschabitacion`, `statushab`) VALUES
(1, 'H1', '111', 'HABITACION DOBLE', 'PRIMERO', 'VENTANA A LA CALLE', 2, 1, 2, '8.00', 0),
(2, 'H2', '112', 'HABITACION DOBLE', 'PRIMERO', 'VENTANA A LA CALLE', 2, 1, 2, '0.00', 0),
(3, 'H3', '113', 'HABITACION DOBLE', 'PRIMERO', 'VENTANA A LA CALLE', 2, 1, 2, '5.00', 0),
(4, 'H4', '114', 'HABITACION DOBLE', 'PRIMERO', 'VENTANA A LA CALLE', 3, 1, 2, '0.00', 0),
(5, 'H5', '115', 'HABITACION SIMPLE', 'PRIMERO', 'INTERMEDIA', 2, 0, 1, '0.00', 0),
(6, 'H6', '116', 'HABITACION DOBLE', 'PRIMERO', 'INTERMEDIA', 2, 1, 2, '0.00', 0),
(7, 'H7', '117', 'HABITACION DOBLE', 'PRIMERO', 'ATRAS', 2, 1, 2, '7.00', 0),
(8, 'H8', '118', 'HABITACION TRIPLE', 'PRIMERO', 'ATRAS', 3, 4, 3, '0.00', 0),
(9, 'H9', '119', 'HABITACION DOBLE', 'PRIMERO', 'ATRAS', 2, 1, 2, '0.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE `impuestos` (
  `codimpuesto` int(11) NOT NULL,
  `nomimpuesto` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valorimpuesto` decimal(12,2) NOT NULL,
  `statusimpuesto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaimpuesto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `impuestos`
--

INSERT INTO `impuestos` (`codimpuesto`, `nomimpuesto`, `valorimpuesto`, `statusimpuesto`, `fechaimpuesto`) VALUES
(1, 'IGV', '18.00', 'ACTIVO', '2019-06-02'),
(2, 'IVA', '13.00', 'INACTIVO', '2019-06-02'),
(3, 'ITBMS', '7.00', 'INACTIVO', '2019-06-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `idinsumo` int(11) NOT NULL,
  `codinsumo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `insumo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcategoria` int(11) NOT NULL,
  `preciocompra` decimal(12,2) NOT NULL,
  `precioventa` decimal(12,2) NOT NULL,
  `existencia` int(5) NOT NULL,
  `stockminimo` int(5) NOT NULL,
  `ivainsumo` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descinsumo` decimal(12,2) NOT NULL,
  `fechaexpiracion` date NOT NULL,
  `codproveedor` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lote` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`idinsumo`, `codinsumo`, `insumo`, `codcategoria`, `preciocompra`, `precioventa`, `existencia`, `stockminimo`, `ivainsumo`, `descinsumo`, `fechaexpiracion`, `codproveedor`, `lote`) VALUES
(1, 'I1', 'ESCOBA CON PALO', 12, '130.00', '0.00', 44, 0, 'SI', '0.00', '0000-00-00', '0', '1'),
(2, 'I2', 'ESCOBA SIN PALO', 12, '100.00', '0.00', 153, 0, 'SI', '0.00', '0000-00-00', 'P5', '0'),
(3, 'I3', 'COLETO CON PALO', 12, '180.00', '0.00', 54, 0, 'SI', '0.00', '0000-00-00', 'P5', '0'),
(4, 'I4', 'JABON LIQUIDO', 13, '60.00', '0.00', 37, 0, 'SI', '0.00', '0000-00-00', 'P2', '0'),
(5, 'I5', 'JABON AZUL LIQUIDO 1LT', 13, '70.00', '0.00', 52, 0, 'SI', '0.00', '0000-00-00', 'P2', '0'),
(6, 'I6', 'JABON EN POLVO DE 4 KG', 13, '80.00', '0.00', 20, 0, 'SI', '0.00', '0000-00-00', '0', '1'),
(7, 'I7', 'LAVAPLATOS AXION', 13, '56.00', '0.00', 60, 0, 'SI', '0.00', '0000-00-00', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex_insumos`
--

CREATE TABLE `kardex_insumos` (
  `codkardex` int(11) NOT NULL,
  `codproceso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `codresponsable` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codinsumo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `movimiento` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `entradas` int(5) NOT NULL,
  `salidas` int(5) NOT NULL,
  `devolucion` int(5) NOT NULL,
  `stockactual` int(10) NOT NULL,
  `ivainsumo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `descinsumo` decimal(12,2) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `fechakardex` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `kardex_insumos`
--

INSERT INTO `kardex_insumos` (`codkardex`, `codproceso`, `codresponsable`, `codinsumo`, `movimiento`, `entradas`, `salidas`, `devolucion`, `stockactual`, `ivainsumo`, `descinsumo`, `precio`, `documento`, `fechakardex`) VALUES
(1, 'I1', '0', 'I1', 'ENTRADAS', 44, 0, 0, 44, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(2, 'I2', '0', 'I2', 'ENTRADAS', 15, 0, 0, 15, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(3, 'I3', '0', 'I3', 'ENTRADAS', 50, 0, 0, 50, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(4, 'I4', '0', 'I4', 'ENTRADAS', 25, 0, 0, 25, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(5, 'I5', '0', 'I5', 'ENTRADAS', 42, 0, 0, 42, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(6, 'I6', '0', 'I6', 'ENTRADAS', 20, 0, 0, 20, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(7, 'I7', '0', 'I7', 'ENTRADAS', 60, 0, 0, 60, 'SI', '0.00', '0.00', 'INVENTARIO INICIAL', '2019-10-05'),
(8, '00634', 'P2', 'I4', 'ENTRADAS', 12, 0, 0, 34, 'SI', '0.00', '60.00', 'COMPRA: 00634', '2019-10-06'),
(9, '00634', 'P2', 'I5', 'ENTRADAS', 10, 0, 0, 52, 'SI', '0.00', '70.00', 'COMPRA: 00634', '2019-10-06'),
(10, '08734', 'P4', 'I2', 'ENTRADAS', 16, 0, 0, 31, 'SI', '0.00', '100.00', 'COMPRA: 08734', '2019-10-06'),
(11, '00983', 'P5', 'I3', 'ENTRADAS', 4, 0, 0, 54, 'SI', '0.00', '180.00', 'COMPRA: 00983', '2019-10-06'),
(12, '00983', 'P5', 'I2', 'ENTRADAS', 122, 0, 0, 153, 'SI', '0.00', '100.00', 'COMPRA: 00983', '2019-10-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex_productos`
--

CREATE TABLE `kardex_productos` (
  `codkardex` int(11) NOT NULL,
  `codproceso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `codresponsable` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `codproducto` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `movimiento` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `entradas` int(5) NOT NULL,
  `salidas` int(5) NOT NULL,
  `devolucion` int(5) NOT NULL,
  `stockactual` int(10) NOT NULL,
  `ivaproducto` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `descproducto` decimal(12,2) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `fechakardex` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `kardex_productos`
--

INSERT INTO `kardex_productos` (`codkardex`, `codproceso`, `codresponsable`, `codproducto`, `movimiento`, `entradas`, `salidas`, `devolucion`, `stockactual`, `ivaproducto`, `descproducto`, `precio`, `documento`, `fechakardex`) VALUES
(1, '1', '0', '1', 'ENTRADAS', 100, 0, 0, 100, 'SI', '0.00', '280.00', 'INVENTARIO INICIAL', '2019-10-05'),
(2, '2', '0', '2', 'ENTRADAS', 118, 0, 0, 118, 'SI', '0.00', '400.00', 'INVENTARIO INICIAL', '2019-10-05'),
(3, '3', '0', '3', 'ENTRADAS', 100, 0, 0, 100, 'SI', '0.00', '180.00', 'INVENTARIO INICIAL', '2019-10-05'),
(4, '4', '0', '4', 'ENTRADAS', 150, 0, 0, 150, 'SI', '0.00', '420.00', 'INVENTARIO INICIAL', '2019-10-05'),
(5, '5', '0', '5', 'ENTRADAS', 100, 0, 0, 100, 'SI', '0.00', '510.00', 'INVENTARIO INICIAL', '2019-10-05'),
(6, '6', '0', '6', 'ENTRADAS', 80, 0, 0, 80, 'SI', '0.00', '130.00', 'INVENTARIO INICIAL', '2019-10-05'),
(7, '7', '0', '7', 'ENTRADAS', 85, 0, 0, 85, 'SI', '0.00', '65.00', 'INVENTARIO INICIAL', '2019-10-05'),
(8, '8', '0', '8', 'ENTRADAS', 119, 0, 0, 119, 'SI', '0.00', '29.00', 'INVENTARIO INICIAL', '2019-10-05'),
(9, '9', '0', '9', 'ENTRADAS', 49, 0, 0, 49, 'SI', '0.00', '28.00', 'INVENTARIO INICIAL', '2019-10-05'),
(10, '10', '0', '10', 'ENTRADAS', 75, 0, 0, 75, 'SI', '0.00', '22.00', 'INVENTARIO INICIAL', '2019-10-05'),
(11, '11', '0', '11', 'ENTRADAS', 45, 0, 0, 45, 'SI', '0.00', '180.00', 'INVENTARIO INICIAL', '2019-10-05'),
(12, '12', '0', '12', 'ENTRADAS', 52, 0, 0, 52, 'SI', '0.00', '150.00', 'INVENTARIO INICIAL', '2019-10-05'),
(13, '13', '0', '13', 'ENTRADAS', 54, 0, 0, 54, 'SI', '0.00', '320.00', 'INVENTARIO INICIAL', '2019-10-05'),
(14, '14', '0', '14', 'ENTRADAS', 75, 0, 0, 75, 'SI', '0.00', '220.00', 'INVENTARIO INICIAL', '2019-10-05'),
(15, '15', '0', '15', 'ENTRADAS', 85, 0, 0, 85, 'SI', '0.00', '220.00', 'INVENTARIO INICIAL', '2019-10-05'),
(16, '16', '0', '16', 'ENTRADAS', 85, 0, 0, 85, 'SI', '0.00', '150.00', 'INVENTARIO INICIAL', '2019-10-05'),
(17, '17', '0', '17', 'ENTRADAS', 55, 0, 0, 55, 'SI', '0.00', '380.00', 'INVENTARIO INICIAL', '2019-10-05'),
(18, '18', '0', '18', 'ENTRADAS', 59, 0, 0, 59, 'SI', '0.00', '150.00', 'INVENTARIO INICIAL', '2019-10-05'),
(19, '19', '0', '19', 'ENTRADAS', 150, 0, 0, 150, 'SI', '0.00', '80.00', 'INVENTARIO INICIAL', '2019-10-05'),
(20, '20', '0', '20', 'ENTRADAS', 55, 0, 0, 55, 'SI', '0.00', '15.00', 'INVENTARIO INICIAL', '2019-10-05'),
(21, '21', '0', '21', 'ENTRADAS', 113, 0, 0, 113, 'SI', '0.00', '13.00', 'INVENTARIO INICIAL', '2019-10-05'),
(22, '00634', 'P2', '11', 'ENTRADAS', 4, 0, 0, 49, 'SI', '0.00', '150.00', 'COMPRA: 00634', '2019-10-06'),
(23, '00634', 'P2', '12', 'ENTRADAS', 15, 0, 0, 67, 'SI', '0.00', '120.00', 'COMPRA: 00634', '2019-10-06'),
(24, '08734', 'P4', '13', 'ENTRADAS', 18, 0, 0, 72, 'SI', '0.00', '250.00', 'COMPRA: 08734', '2019-10-06'),
(25, '08734', 'P4', '17', 'ENTRADAS', 15, 0, 0, 70, 'SI', '0.00', '340.00', 'COMPRA: 08734', '2019-10-06'),
(26, '00983', 'P5', '21', 'ENTRADAS', 35, 0, 0, 148, 'SI', '0.00', '10.00', 'COMPRA: 00983', '2019-10-06'),
(27, '00983', 'P5', '19', 'ENTRADAS', 49, 0, 0, 199, 'SI', '0.00', '50.00', 'COMPRA: 00983', '2019-10-06'),
(28, '00983', 'P5', '20', 'ENTRADAS', 15, 0, 0, 70, 'SI', '0.00', '10.00', 'COMPRA: 00983', '2019-10-06'),
(29, '0001-000000001', 'C1', '11', 'SALIDAS', 0, 2, 0, 47, 'SI', '0.00', '180.00', 'VENTA: 0001-000000001', '2019-10-14'),
(30, '0001-000000001', 'C1', '1', 'SALIDAS', 0, 3, 0, 97, 'SI', '0.00', '280.00', 'VENTA: 0001-000000001', '2019-10-14'),
(31, '0001-000000002', 'C4', '17', 'SALIDAS', 0, 1, 0, 69, 'SI', '0.00', '380.00', 'VENTA: 0001-000000002', '2019-10-14'),
(32, '0001-000000002', 'C4', '19', 'SALIDAS', 0, 2, 0, 197, 'SI', '0.00', '80.00', 'VENTA: 0001-000000002', '2019-10-14'),
(33, '0001-000000001', 'C4', '10', 'SALIDAS', 0, 4, 0, 71, 'SI', '0.00', '22.00', 'VENTA: 0001-000000001', '2019-10-14'),
(34, '0001-000000001', 'C4', '12', 'SALIDAS', 0, 2, 0, 65, 'SI', '0.00', '150.00', 'VENTA: 0001-000000001', '2019-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo` datetime DEFAULT NULL,
  `detalles` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `paginas` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `ip`, `tiempo`, `detalles`, `paginas`, `usuario`) VALUES
(1, '::1', '2019-11-03 03:21:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '/hotel/index.php', 'RUBENCHIRINOS'),
(2, '::1', '2019-11-14 04:51:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '/hotelapart/index.php', 'RUBENCHIRINOS'),
(3, '::1', '2019-11-14 04:54:05', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '/hotelapart/index.php', 'MARIO GRANIZO'),
(4, '::1', '2019-11-14 05:02:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '/hotelapart/index.php', 'CARMEN HERRERA'),
(5, '::1', '2019-11-14 05:05:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '/hotelapart/index.php', 'MARIO GRANIZO'),
(6, '::1', '2019-11-14 05:21:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '/hotelapart/index.php', 'MARIO GRANIZO'),
(7, '::1', '2019-11-14 05:22:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', '/hotelapart/index.php', 'MARIA MORANTE ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediospagos`
--

CREATE TABLE `mediospagos` (
  `codmediopago` int(11) NOT NULL,
  `mediopago` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mediospagos`
--

INSERT INTO `mediospagos` (`codmediopago`, `mediopago`) VALUES
(1, 'EFECTIVO'),
(2, 'CHEQUE A FECHA'),
(3, 'CHEQUE AL DIA'),
(4, 'NOTA DE CREDITO'),
(5, 'RED COMPRA'),
(6, 'TRANSFERENCIA'),
(7, 'TARJETA DE CREDITO'),
(8, 'CUPON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `codmensaje` int(11) NOT NULL,
  `codigo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` datetime NOT NULL,
  `respuesta` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientoscajas`
--

CREATE TABLE `movimientoscajas` (
  `codmovimiento` int(11) NOT NULL,
  `codcaja` int(11) NOT NULL,
  `tipomovimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionmovimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `montomovimiento` decimal(12,2) NOT NULL,
  `codmediopago` int(11) NOT NULL,
  `fechamovimiento` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `codnoticia` int(11) NOT NULL,
  `titulonoticia` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcnoticia` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `publicado` datetime NOT NULL,
  `statusnoticia` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`codnoticia`, `titulonoticia`, `descripcnoticia`, `publicado`, `statusnoticia`, `codigo`) VALUES
(1, 'INFORMACI&Oacute;N E INQUIETUD', 'EL HOTEL MADRID, INVITA A NUESTROS HUESPEDES, EN CASO DE TENER CUALQUIER INQUIETUD, QUEJA O RECLAMO DEL MISMO, POR FAVOR DIRIGIRSE A LA ADMINISTRACI&Oacute;N DEL HOTEL PARA TOMAR NOTA DE SUS INQUIETUDES Y PODER ATENDERLOS LO MEJOR POSIBLE. ATTE. LA ADMINISTRACI&Oacute;N.', '2019-10-06 09:18:06', 'PUBLICADA', 2),
(2, 'MENSAJE DE BIENVENIDA', 'EL HOTEL MADRID, LES DA LA BIENVENIDA A TODOS NUESTRO HUESPEDES, DESEANDOLES, LA MEJOR ESTANCIA EN NUESTRO HOTEL, AGRADECIENDOLES POR SU ACEPTACI&Oacute;N Y CONFIANZA, MUCHAS GRACIAS. ATTE. LA ADMINISTRACI&Oacute;N.', '2019-10-06 09:15:49', 'PUBLICADA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `codperfil` int(11) NOT NULL,
  `nomperfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descperfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`codperfil`, `nomperfil`, `descperfil`) VALUES
(1, 'NUESTRA UBICACI&Oacute;N', 'EL HOTEL MADRID UBICADO EN LA PROVINCIA DE IMBABURA, CIUDAD A LA QUE SIEMPRE SE VUELVE, UNA PROVINCIA PLENA EN BELLEZAS NATURALES: LAGOS, CASCADAS, ETC. FORMAN PARTE DE UN BUEN TIEMPO TUR&Iacute;STICO, EN ESTE MARCO NATURAL SE ENCUENTRA INSTALADO EN PLENO CENTRO A DOS CUADRAS DEL OBELISCO, NOS MUESTRA CON ORGULLO SUS TRES PISOS, SESENTA HABITACIONES DISTRIBUIDAS EN HABITACIONES. STANDARD, SUPERIOR, DEPARTAMENTOS Y SUITES, UN EDIFICIO CONSTRUIDO PARA BRINDAR AL CLIENTE EL MAYOR CONFORT, SESENTA HABITACIONES EQUIPADAS CON AIRE ACONDICIONADO FR&Iacute;O-CALOR INDIVIDUAL, TELEVISOR CON CABLE, CAJAS DE SEGURIDAD, FRIGOBAR Y ROOM SERVICES.'),
(2, 'D&Oacute;NDE ESTAMOS', 'NOS ENCONTRAMOS EN UNA ZONA EXCLUSIVA Y MUY ATRACTIVA DE LA PROVINCIA DE IMBABURA, A UN PASO DE RESTAURANTES Y BARES, BANCOS, BOUTIQUES, TIENDAS, Y LIBRER&Iacute;AS. DESDE NUESTRO HOTEL PODR&Aacute; LLEGAR, EN CINCO MINUTOS AL TERMINAL TERRESTRE.'),
(3, 'ACERCA DE NUESTRO HOTEL', 'NUESTRA EXCLUSIVA ARQUITECTURA NOS PERMITE BRINDARLE LOS M&Aacute;S ALTOS NIVELES DE CONFORT Y ELEGANCIA EN AMBIENTES DISE&Ntilde;ADOS Y ACONDICIONADOS CON EL &Uacute;NICO FIN DE SATISFACER TODAS SUS EXPECTATIVAS.'),
(4, 'QUI&Eacute;NES SOMOS', 'ESTAMOS ENTRE LOS HOTELES M&Aacute;S IMPORTANTES DE LA PROVINCIA DE IMBABURA, NUESTRAS RA&Iacute;CES TIENEN INICIO EN LA CIUDAD DE IBARRA HACE 36 A&Ntilde;OS CON LA INAUGURACI&Oacute;N DE NUESTRO HOTEL. CON EL PASAR DE LOS A&Ntilde;OS HEMOS IDO CRECIENDO, CON EL PRINCIPAL OBJETIVO DE ASEGURAR A NUESTROS VISITANTES UNA PLACENTERA ESTAD&Iacute;A, DURANTE SU AVENTURA DE CONOCER LA PROVINCIA DE IMBABURA. &quot;SU SONRISA ES NUESTRO OBJETIVO&quot;.'),
(5, 'NUESTRA MISI&Oacute;N', 'NUESTRA MISI&Oacute;N ES PROVEERLES A NUESTROS CLIENTES LA EXPERIENCIA PERFECTA EN SU ESTAD&Iacute;A, SORPRENDI&Eacute;NDOLOS EN CADA EXPECTACI&Oacute;N, DESDE EL PRIMER MOMENTO QUE CONTACTE CON HOTEL MADRID HASTA EL FINAL DE SU ESTAD&Iacute;A. HACER VIVIR A NUESTROS HU&Eacute;SPEDES LA VERDADERA HOSPITALIDAD Y DIVERSIDAD DEL ECUADOR.'),
(6, 'NUESTRA VISI&Oacute;N', 'CREAR UNA AUT&Eacute;NTICA CULTURA DE SERVICIO INSPIRADA EN LA AMABILIDAD, RA&Iacute;CES Y VALORES DE VIDA DE NUESTRA GENTE. HABIENDO VIAJADO POR EL MUNDO DESDE MUY TEMPRANA EDAD, LOS FUNDADORES HAN APRENDIDO HA APRECIAR LA BELLEZA Y LO &Uacute;NICO QUE CADA PA&Iacute;S TIENE POR OFRECER. AUNQUE EN NUESTRA OPINI&Oacute;N POCOS DESTINOS TIENEN LA HABILIDAD DE MEZCLAR SU ALMA Y LLENAR SUS M&Aacute;S GRANDES DESEOS POR LA AVENTURA, CULTURA, HISTORIA, DEPORTE, ROMANCE, QUE POSEE NUESTRA CIUDAD DE IBARRA.'),
(7, 'NUESTROS VALORES', '&bull; HOSPITALIDAD, QUE NOS LLEVA A APRECIAR E INTERESARNOS POR NUESTROS HU&Eacute;SPEDES.\r\n&bull; AUTENTICIDAD, PORQUE SOMOS FIELES A NUESTROS OR&Iacute;GENES Y CONVICCIONES.\r\n&bull; DIVERSIDAD, NUESTRO HOTEL EXPRESA UNA REALIDAD Y CULTURA DIFERENTE.\r\n&bull; CREATIVIDAD HOTELERA, PARA SUPERAR LAS EXPECTATIVAS DE NUESTROS HU&Eacute;SPEDES.\r\n&bull; TRABAJO.\r\n&bull; HONESTIDAD.\r\n&bull; COMPROMISO'),
(8, 'NUESTRA FILOSOF&Iacute;A', '&bull; SATISFACCI&Oacute;N DEL CLIENTE.\r\n&bull; DECISIONES CON RESPONSABILIDAD DE LOS COLABORADORES.\r\n&bull; DIRECCI&Oacute;N ABIERTA.\r\n&bull; TRABAJO EN EQUIPO.\r\n&bull; PRODUCTIVIDAD.'),
(9, 'OBJETIVOS ESTRATEGICOS', '1. CONVERTIR A IMBABURA UN CENTRO DE PRIMER ORDEN EN MATERIA DE PRESTACI&Oacute;N DE SERVICIOS EN EL MUNDO DE LOS NEGOCIOS.\r\n2. UTILIZAR EL TURISMO COMO UNA HERRAMIENTA CLAVE PARA PROMOVER A IMBABURA COMO CIUDAD IDEAL PARA VISITAR, VIVIR Y HACER NEGOCIOS.\r\n3. INCENTIVAR LA IMAGEN DE IMBABURA A NIVEL NACIONAL E INTERNACIONAL A FIN DE CREAR UNA IDENTIDAD ADECUADA PARA LA INVERSI&Oacute;N TUR&Iacute;STICA GLOBAL.\r\n4. CONVERTIR EL TURISMO EN UN INSTRUMENTO CLAVE PARA LA GENERACI&Oacute;N DE EMPLEOS Y LA INCREMENTACI&Oacute;N DE LAS EXPORTACIONES.\r\n5. CREAR LAS CONDICIONES ADECUADAS PARA BRINDAR A LOS TURISTAS QUE VISITAN IMBABURA, UN SERVICIO DE BUENA CALIDAD.'),
(10, 'SERVICIOS DEL HOTEL', '1. ACCESO A INTERNET\r\n2. CAJA DE SEGURIDAD\r\n3. SERVICIO DE LAVANDERIA\r\n4. AIRE ACONDICIONADO\r\n5. SERVICIO DE RECEPCI&Oacute;N LAS 24 HORAS\r\n6. TEL&Eacute;FONO CON DISCADO DIRECTO NACIONAL E INTERNACIONAL\r\n7. CAMBIO DE MONEDA\r\n8. ZONA DE NO FUMAR EN EL RESTAURANTE\r\n9. GUARDARROPAN10. BAR-ES\r\n11. ASCENSOR-ES\r\n12. SALAS DE CONFERENCIAS\r\n13. RESTAURANTE (DESAYUNOS, BUFFETS, ALMUERZOS, CENAS, COFFEE BREAKS Y COCKTAILS.)\r\n14. SERVICIOS DE HABITACIONES\r\n15. GARAJE'),
(11, 'NUESTRAS HABITACIONES', 'NUESTRAS 60 ELEGANTES HABITACIONES Y 1 AMPLIAS SUITE, HAN SIDO ESPECIALMENTE AMBIENTADAS PARA ASEGURAR ALTOS NIVELES DE CALIDAD Y COMODIDAD, BAJO LA SUPERVISI&Oacute;N Y CALIDEZ DE NUESTRO PERSONAL, LAS MISMAS QUE DISPONEN DE:\r\n&bull; AGUA CALIENTE.\r\n&bull; AIRE ACONDICIONADO.\r\n&bull; AMENIDADES (SHAMPOO, CREMA, JAB&Oacute;N, PA&Ntilde;UELOS DESECHABLES, COSTURERO, LUSTRA ZAPATOS, GORRO DE BA&Ntilde;O).\r\n&bull; BATAS DE BA&Ntilde;O Y PANTUFLAS.\r\n&bull; CALEFACCI&Oacute;N.\r\n&bull; CONEXI&Oacute;N A INTERNET DE BANDA ANCHA.\r\n&bull; CORRIENTE DE 220V Y 110V.\r\n&bull; FRIGOBAR.\r\n&bull; TV V&Iacute;A SAT&Eacute;LITE / TV POR CABLE.'),
(12, 'RESTAURANTE &quot;EL CALLEJ&Oacute;N&quot; ', 'NUESTRO RESTAURANTE EL CALLEJON EST&Aacute; SITUADO EN EL MISMO EDIFICIO DEL HOTEL EN EL PRIMER PISO, LO DESLUMBRAR&Aacute; CON LA DIVERSIDAD DE NUESTROS PLATOS DE LA COCINA ECUATORIANA E INTERNACIONAL.'),
(13, 'SALA DE CONFERENCIA Y EVENTOS', 'CONTAMOS CON UN SAL&Oacute;N CON CAPACIDAD HASTA PARA 60 PERSONAS, MODERNA INFRAESTRUCTURA Y UN COMPLETO SERVICIO DE EQUIPOS AUDIOVISUALES, LOS CUALES, JUNTO CON LA EFICIENCIA DE NUESTRO PERSONAL GARANTIZAR&Aacute;N EL &Eacute;XITO DE SUS EVENTOS.'),
(14, 'BUSINESS CENTER ', 'CONTAMOS CON CONEXI&Oacute;N A INTERNET LAS 24 HORAS DEL D&Iacute;A, PARA QUE USTED PUEDA COMUNICARSE CON CUALQUIER PARTE DEL MUNDO.'),
(15, 'CAMBIO DE MONEDA EXTRANJERA', 'LA MONEDA OFICIAL ES EL D&Oacute;LAR, REPRESENTADO CON EL S&Iacute;MBOLO &quot;$&quot;. LA MAYOR&Iacute;A DE LOCALES ACEPTA D&Oacute;LARES AL TIPO DE CAMBIO DEL D&Iacute;A. EL SERVICIO DE CAMBIO DE MONEDA EST&Aacute; DISPONIBLE EN NUESTRA CAJA DE RECEPCI&Oacute;N, LAS 24 HORAS DEL D&Iacute;A. ADICIONALMENTE, PUEDE USTED CAMBIAR D&Oacute;LARES Y EUROS EN LOS BANCOS.'),
(16, 'M&Eacute;TODOS DE PAGO', 'EN NUESTRO ESTABLECIMIENTO:\r\n&bull; EFECTIVO\r\n&bull; TARJETAS DE CR&Eacute;DITO: AMERICAN EXPRESS, DINERS, MASTERCARD, VISA.\r\nSISTEMA DE RESERVACIONES:\r\n&bull; DEP&Oacute;SITO BANCARIO\r\n&bull; TRANSFERENCIA BANCARIA\r\n&bull; TARJETAS DE CR&Eacute;DITO: AMERICAN EXPRESS, DINERS, MASTERCARD, VISA.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `codproducto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `producto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcategoria` int(11) NOT NULL,
  `preciocompra` decimal(12,2) NOT NULL,
  `precioventa` decimal(12,2) NOT NULL,
  `existencia` int(5) NOT NULL,
  `stockminimo` int(5) NOT NULL,
  `stockmaximo` int(5) NOT NULL,
  `ivaproducto` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descproducto` decimal(12,2) NOT NULL,
  `codigobarra` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaelaboracion` date NOT NULL,
  `fechaexpiracion` date NOT NULL,
  `codproveedor` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lote` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `stockteorico` int(10) NOT NULL,
  `motivoajuste` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `codproducto`, `producto`, `codcategoria`, `preciocompra`, `precioventa`, `existencia`, `stockminimo`, `stockmaximo`, `ivaproducto`, `descproducto`, `codigobarra`, `fechaelaboracion`, `fechaexpiracion`, `codproveedor`, `lote`, `stockteorico`, `motivoajuste`) VALUES
(1, '1', 'CHEESE TRIS PEQUENO', 3, '250.00', '280.00', 97, 10, 20, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P4', '', 0, 'NINGUNO'),
(2, '2', 'CHEESE TRIS GRANDE', 3, '350.00', '400.00', 118, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(3, '3', 'DORITOS PEQUENO', 3, '140.00', '180.00', 100, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(4, '4', 'DORITOS GRANDE', 3, '360.00', '420.00', 150, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(5, '5', 'RUFLES GRANDE', 3, '420.00', '510.00', 100, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(6, '6', 'PEPITOS CHIS PEQUENO', 3, '110.00', '130.00', 80, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(7, '7', 'CHUPETAS BOM BOM BUM', 7, '50.00', '65.00', 85, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(8, '8', 'CHUPETA FRESITA', 7, '14.00', '29.00', 119, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(9, '9', 'CHUPETA REDONDA', 7, '23.00', '28.00', 49, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(10, '10', 'CHUPETA PALETAS', 7, '17.00', '22.00', 71, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(11, '11', 'REFRESCO PEQUENO', 10, '150.00', '180.00', 47, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P2', '0', 0, 'NINGUNO'),
(12, '12', 'REFRESCO MEDIANO COCA COLA', 10, '120.00', '150.00', 65, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P2', '0', 0, 'NINGUNO'),
(13, '13', 'REFRESCO GRANDE COCA COLA', 10, '250.00', '320.00', 72, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P4', '0', 0, 'NINGUNO'),
(14, '14', 'COCA COLA', 9, '180.00', '220.00', 75, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(15, '15', 'CHINOTTO', 9, '150.00', '220.00', 85, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(16, '16', 'FRESCOLITA', 9, '120.00', '150.00', 85, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(17, '17', 'CHOCOLATE GRANDE SAVOY', 6, '340.00', '380.00', 69, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P4', '0', 0, 'NINGUNO'),
(18, '18', 'CHOCOLATE PEQUENO SAVOY', 6, '130.00', '150.00', 59, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '', 0, 'NINGUNO'),
(19, '19', 'GALLETA CLUB SOCIAL', 2, '50.00', '80.00', 197, 5, 10, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '0', 0, 'NINGUNO'),
(20, '20', 'CARAMELOS DE LECHE', 8, '10.00', '15.00', 70, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '0', 0, 'NINGUNO'),
(21, '21', 'CARAMELO UVITA', 8, '10.00', '13.00', 148, 5, 5, 'SI', '0.00', '', '0000-00-00', '0000-00-00', 'P5', '0', 0, 'NINGUNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `codproveedor` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documproveedor` int(11) NOT NULL,
  `cuitproveedor` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nomproveedor` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tlfproveedor` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direcproveedor` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `emailproveedor` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `vendedor` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tlfvendedor` varchar(20) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `fechaingreso` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `codproveedor`, `documproveedor`, `cuitproveedor`, `nomproveedor`, `tlfproveedor`, `direcproveedor`, `emailproveedor`, `vendedor`, `tlfvendedor`, `fechaingreso`) VALUES
(1, 'P1', 1, '10451248495', 'PRODUCTOS GENERICOS RSA', '(8012) 3334454', 'JR HUANTA 11', 'GENERIS@GMAIL.COM', 'JULIAN RENGIFO', '(0412) 5896632', '2019-02-13'),
(2, 'P2', 1, '3488729001-J', 'ACCESORIOS Y VENTAS DE LIMPIEZA', '(0416) 7642234', 'LA CONCORDIA', 'VENTAS@GMAIL.COM', 'LCDO. JORGE LUIS CAMACHO', '(0416) 7642234', '2019-02-13'),
(3, 'P3', 2, '872445162-J', 'ABASTO Y LICORERIA LA MORITA', '(0416) 7652345', 'AL LADO DEL CC MURALLA', 'MORITA@GMAIL.COM', 'SRA. CARMEN ALICIA CONTRERAS', '(0416) 5456998', '2019-02-13'),
(4, 'P4', 1, '00235998745-7', 'DISTRIBUIDORA MIKASA', '(0274) 9986589', 'CALLE PRINCIPAL', 'MIKASA@HOTMAIL.COM', 'LICDO. JESUS CARDOZO', '(0424) 7896583', '2019-04-30'),
(5, 'P5', 1, '9-877615234-0', 'CHUCHERIAS LA MORITA', '(0274) 9985685', 'AVENIDA INTERCOMUNAL', 'MORITA@GMAIL.COM', 'CARLOS JESUS CONTRERAS', '(0412) 5874968', '2019-09-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `idreservacion` int(11) NOT NULL,
  `tipodocumento` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcaja` int(11) NOT NULL,
  `codreservacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codserie` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codautorizacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `iva` decimal(12,2) NOT NULL,
  `totaliva` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `descuento` decimal(12,2) NOT NULL,
  `totaldescuento` decimal(12,2) NOT NULL,
  `totalpago` decimal(12,2) NOT NULL,
  `tipopago` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montopagado` decimal(12,2) NOT NULL,
  `montodevuelto` decimal(12,2) NOT NULL,
  `tipotarjeta` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrotarjeta` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `expira` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codverifica` int(4) NOT NULL,
  `nrotransferencia` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cheque` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `bancocheque` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechavencecredito` date NOT NULL,
  `fechapagado` date NOT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `statuspago` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `reservacion` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`idreservacion`, `tipodocumento`, `codcaja`, `codreservacion`, `codserie`, `codautorizacion`, `codcliente`, `iva`, `totaliva`, `subtotal`, `descuento`, `totaldescuento`, `totalpago`, `tipopago`, `montopagado`, `montodevuelto`, `tipotarjeta`, `nrotarjeta`, `expira`, `codverifica`, `nrotransferencia`, `cheque`, `bancocheque`, `fechavencecredito`, `fechapagado`, `observaciones`, `statuspago`, `reservacion`, `fecharegistro`, `codigo`) VALUES
(1, 'TICKETRESERVA', 1, '0001-000000001', '0001', '570661064790464897300716598048', 'C1', '18.00', '13.91', '77.28', '5.00', '4.56', '86.63', 'EFECTIVO', '100.00', '13.37', '0', '0', '0', 0, '0', '0', '0', '0000-00-00', '0000-00-00', '0', 'PAGADA', 'CULMINADA', '2019-10-14 10:32:43', 2),
(2, 'TICKETRESERVA', 1, '0001-000000002', '0001', '097914528211450550320847835016', 'C4', '18.00', '9.58', '53.20', '5.00', '3.14', '59.64', 'EFECTIVO', '70.00', '10.36', '0', '0', '0', 0, '0', '0', '0', '0000-00-00', '0000-00-00', '0', 'PAGADA', 'CULMINADA', '2019-10-14 10:33:32', 2),
(3, 'TICKETRESERVA', 1, '0001-000000003', '0001', '219171633244169985224876307410', 'C1', '18.00', '20.16', '112.00', '5.00', '6.61', '125.55', 'TRANSFERENCIA', '0.00', '0.00', '0', '0', '0', 0, '09554273645', '0', '0', '0000-00-00', '0000-00-00', '0', 'PAGADA', 'ACTIVA', '2019-10-14 10:54:46', 2),
(4, 'FACTURARESERVA', 1, '0001-000000004', '0001', '968014744857436650198380959370', 'C4', '18.00', '20.16', '112.00', '5.00', '6.61', '125.55', 'CREDITO', '0.00', '0.00', '0', '0', '0', 0, '0', '0', '0', '2019-10-23', '0000-00-00', '0', 'PENDIENTE', 'ACTIVA', '2019-10-14 10:58:42', 2),
(5, 'TICKETRESERVA', 1, '0001-000000005', '0001', '654582346586878106800690456567', 'C5', '18.00', '46.44', '258.00', '5.00', '15.22', '289.22', 'CHEQUE', '0.00', '0.00', '0', '0', '0', 0, '0', '08876142653', 'BANCO UNIVERSAL', '0000-00-00', '0000-00-00', '0', 'PAGADA', 'PENDIENTE', '2019-10-14 11:51:54', 2),
(6, 'TICKETRESERVA', 0, '0001-000000006', '0001', '189487890040145795379604623021', 'C6', '18.00', '15.12', '84.00', '5.00', '4.96', '94.16', 'TARJETA', '0.00', '0.00', 'MASTERCARD', '5300721119159769', '03/22', 252, '0', '0', '0', '0000-00-00', '0000-00-00', '0', 'PAGADA', 'PENDIENTE', '2019-10-17 01:20:09', 0),
(7, 'TICKETRESERVA', 0, '0001-000000007', '0001', '250121852029659620000318131714', 'C7', '18.00', '27.36', '152.00', '5.00', '8.97', '170.39', 'TRANSFERENCIA', '0.00', '0.00', '0', '0', '0', 0, '055487888896', '0', '0', '0000-00-00', '0000-00-00', '0', 'PAGADA', 'PENDIENTE', '2019-11-03 03:21:03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_insumos`
--

CREATE TABLE `salida_insumos` (
  `idsalida` int(11) NOT NULL,
  `codsalida` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codinsumo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantsalida` int(5) NOT NULL,
  `preciosalida` decimal(12,2) NOT NULL,
  `ivasalida` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descsalida` decimal(12,2) NOT NULL,
  `fechasalida` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `codservicio` int(11) NOT NULL,
  `descripcionservicio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`codservicio`, `descripcionservicio`) VALUES
(1, 'ACCESO A INTERNET'),
(2, 'CAJA DE SEGURIDAD'),
(3, 'SERVICIO DE LAVANDERIA'),
(4, 'AIRE ACONDICIONADO'),
(5, 'SERVICIO DE RECEPCI&Oacute;N LAS 24 HORAS'),
(6, 'TEL&Eacute;FONO CON DISCADO DIRECTO NACIONAL E INTERNACIONAL'),
(7, 'CAMBIO DE MONEDA'),
(8, 'ZONA DE NO FUMAR EN EL RESTAURANTE'),
(9, 'GUARDARROPA'),
(10, 'BAR-ES'),
(11, 'ASCENSOR-ES'),
(12, 'SALAS DE CONFERENCIAS'),
(13, 'RESTAURANTE (DESAYUNOS, BUFFETS, ALMUERZOS, CENAS, COFFEE BREAKS Y COCKTAILS.)'),
(14, 'SERVICIOS DE HABITACIONES'),
(15, 'GARAJE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `codtarifa` int(11) NOT NULL,
  `codtipo` int(11) NOT NULL,
  `baja` decimal(12,2) NOT NULL,
  `media` decimal(12,2) NOT NULL,
  `alta` decimal(12,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`codtarifa`, `codtipo`, `baja`, `media`, `alta`) VALUES
(1, 1, '10.00', '15.00', '20.00'),
(2, 2, '18.00', '28.00', '38.00'),
(3, 3, '24.00', '42.00', '45.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `codtemporada` int(11) NOT NULL,
  `temporada` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`codtemporada`, `temporada`, `desde`, `hasta`) VALUES
(1, 'BAJA', '2019-01-01', '2019-05-31'),
(2, 'MEDIA', '2019-06-01', '2019-10-30'),
(3, 'ALTA', '2019-11-01', '2019-12-31'),
(4, 'BAJA', '2020-01-01', '2020-05-31'),
(5, 'MEDIA', '2020-06-01', '2020-10-31'),
(6, 'ALTA', '2020-11-01', '2020-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposcambio`
--

CREATE TABLE `tiposcambio` (
  `codcambio` int(11) NOT NULL,
  `descripcioncambio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montocambio` decimal(12,3) NOT NULL,
  `codmoneda` int(11) NOT NULL,
  `fechacambio` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiposcambio`
--

INSERT INTO `tiposcambio` (`codcambio`, `descripcioncambio`, `montocambio`, `codmoneda`, `fechacambio`) VALUES
(1, 'TIPO DE CAMBIO SUNAT', '3.278', 1, '2019-03-26'),
(2, 'TIPO DE CAMBIO SUNAT', '3.780', 1, '2019-04-26'),
(3, 'TIPO DE CAMBIO SUNAT', '4.230', 1, '2019-05-26'),
(4, 'TIPO DE CAMBIO SUNAT', '6.852', 2, '2019-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposhabitaciones`
--

CREATE TABLE `tiposhabitaciones` (
  `codtipo` int(11) NOT NULL,
  `nomtipo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiposhabitaciones`
--

INSERT INTO `tiposhabitaciones` (`codtipo`, `nomtipo`) VALUES
(1, 'HABITACI&Oacute;N SIMPLE'),
(2, 'HABITACI&Oacute;N DOBLE'),
(3, 'HABITACI&Oacute;N TRIPLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmoneda`
--

CREATE TABLE `tiposmoneda` (
  `codmoneda` int(11) NOT NULL,
  `moneda` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `siglas` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `simbolo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposmoneda`
--

INSERT INTO `tiposmoneda` (`codmoneda`, `moneda`, `siglas`, `simbolo`) VALUES
(1, 'US DOLLAR', 'USD', '$'),
(2, 'EURO', 'EUR', '&euro;'),
(3, 'PESO CHILENO', 'CLP', '$'),
(4, 'DOLAR CANADIENSE', 'CAD', '$'),
(5, 'QUETZAL', 'GTQ', 'Q'),
(6, 'DOLAR BELIZE', 'BZD', 'B'),
(7, 'SOLES', 'SOL', 'S/.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `dni` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nivel` varchar(35) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `dni`, `nombres`, `sexo`, `direccion`, `telefono`, `email`, `usuario`, `password`, `nivel`, `status`) VALUES
(1, '123456789', 'LEIDA RODRIGUEZ', 'FEMENINO', 'SANTA CRUZ DE MORA', '(0416) 9983764', 'LEIDA@GMAIL.COM', 'LEIDARODRIGUEZ', 'ae44b58705496d4671985ccde9067f28c2b5badb', 'SECRETARIA', 1),
(5, '0909137176', 'MARIO GRANIZO VILLAGOMEZ', 'MASCULINO', 'MALEC&Oacute;N SIM&Oacute;N BOLIVAR', '(0999) 616161', 'CARMAXSUITES@GMAIL.COM', 'MARIO GRANIZO', '5829170d72e7b425ab4d7dcfb853a476d6e24bd6', 'ADMINISTRADOR(A)', 1),
(6, '0917665572', 'CARMEN HERRERA', 'FEMENINO', 'MALEC&Oacute;N SIM&Oacute;N BOLIVAR', '(0967) 728189', 'APARTGUAYAQUIL@GMAIL.COM', 'CARMEN HERRERA', '22d019bddb565db0291f73e4aa06eceaeb9bb00b', 'RECEPCIONISTA', 1),
(7, '0940846876', 'MARIA MORANTE', 'FEMENINO', 'FLORIDA NORTE', '(0989) 968149', 'ALEXESTHER1012@GMAIL.COM', 'MARIA MORANTE', '3a1aa1cb6619e885fb4d0550619bcdf326de1531', 'SECRETARIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL,
  `tipodocumento` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcaja` int(11) NOT NULL,
  `codventa` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codserie` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codautorizacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codcliente` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subtotalivasi` decimal(12,2) NOT NULL,
  `subtotalivano` decimal(12,2) NOT NULL,
  `iva` decimal(12,2) NOT NULL,
  `totaliva` decimal(12,2) NOT NULL,
  `descuento` decimal(12,2) NOT NULL,
  `totaldescuento` decimal(12,2) NOT NULL,
  `totalpago` decimal(12,2) NOT NULL,
  `totalpago2` decimal(12,2) NOT NULL,
  `tipopago` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `formapago` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montopagado` decimal(12,2) NOT NULL,
  `montodevuelto` decimal(12,2) NOT NULL,
  `fechavencecredito` date NOT NULL,
  `fechapagado` date NOT NULL,
  `statusventa` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaventa` datetime NOT NULL,
  `observaciones` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `tipodocumento`, `codcaja`, `codventa`, `codserie`, `codautorizacion`, `codcliente`, `subtotalivasi`, `subtotalivano`, `iva`, `totaliva`, `descuento`, `totaldescuento`, `totalpago`, `totalpago2`, `tipopago`, `formapago`, `montopagado`, `montodevuelto`, `fechavencecredito`, `fechapagado`, `statusventa`, `fechaventa`, `observaciones`, `codigo`) VALUES
(1, 'TICKET', 1, '0001-000000001', '0001', '3219831535912206581449011345364511085167648856838', 'C4', '388.00', '0.00', '18.00', '69.84', '0.00', '0.00', '457.84', '308.00', 'CREDITO', 'CREDITO', '0.00', '0.00', '2019-10-24', '0000-00-00', 'PENDIENTE', '2019-10-14 11:00:10', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonoscreditos`
--
ALTER TABLE `abonoscreditos`
  ADD PRIMARY KEY (`codabono`);

--
-- Indices de la tabla `abonoscreditosreservaciones`
--
ALTER TABLE `abonoscreditosreservaciones`
  ADD PRIMARY KEY (`codabono`);

--
-- Indices de la tabla `abonoscreditosventas`
--
ALTER TABLE `abonoscreditosventas`
  ADD PRIMARY KEY (`codabono`);

--
-- Indices de la tabla `arqueocaja`
--
ALTER TABLE `arqueocaja`
  ADD PRIMARY KEY (`codarqueo`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`codcaja`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codcategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompra`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `creditosxclientes`
--
ALTER TABLE `creditosxclientes`
  ADD PRIMARY KEY (`codcredito`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`coddetallecompra`);

--
-- Indices de la tabla `detallereservaciones`
--
ALTER TABLE `detallereservaciones`
  ADD PRIMARY KEY (`coddetallereservacion`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`coddetalleventa`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`coddocumento`);

--
-- Indices de la tabla `entrada_insumos`
--
ALTER TABLE `entrada_insumos`
  ADD PRIMARY KEY (`identrada`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idhabitacion`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`codimpuesto`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idinsumo`);

--
-- Indices de la tabla `kardex_insumos`
--
ALTER TABLE `kardex_insumos`
  ADD PRIMARY KEY (`codkardex`);

--
-- Indices de la tabla `kardex_productos`
--
ALTER TABLE `kardex_productos`
  ADD PRIMARY KEY (`codkardex`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mediospagos`
--
ALTER TABLE `mediospagos`
  ADD PRIMARY KEY (`codmediopago`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`codmensaje`);

--
-- Indices de la tabla `movimientoscajas`
--
ALTER TABLE `movimientoscajas`
  ADD PRIMARY KEY (`codmovimiento`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`codnoticia`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`codperfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`idreservacion`);

--
-- Indices de la tabla `salida_insumos`
--
ALTER TABLE `salida_insumos`
  ADD PRIMARY KEY (`idsalida`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`codservicio`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`codtarifa`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`codtemporada`);

--
-- Indices de la tabla `tiposcambio`
--
ALTER TABLE `tiposcambio`
  ADD PRIMARY KEY (`codcambio`);

--
-- Indices de la tabla `tiposhabitaciones`
--
ALTER TABLE `tiposhabitaciones`
  ADD PRIMARY KEY (`codtipo`);

--
-- Indices de la tabla `tiposmoneda`
--
ALTER TABLE `tiposmoneda`
  ADD PRIMARY KEY (`codmoneda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonoscreditos`
--
ALTER TABLE `abonoscreditos`
  MODIFY `codabono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `abonoscreditosreservaciones`
--
ALTER TABLE `abonoscreditosreservaciones`
  MODIFY `codabono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `abonoscreditosventas`
--
ALTER TABLE `abonoscreditosventas`
  MODIFY `codabono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `arqueocaja`
--
ALTER TABLE `arqueocaja`
  MODIFY `codarqueo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `codcaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `codcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `creditosxclientes`
--
ALTER TABLE `creditosxclientes`
  MODIFY `codcredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  MODIFY `coddetallecompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detallereservaciones`
--
ALTER TABLE `detallereservaciones`
  MODIFY `coddetallereservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `coddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `coddocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `entrada_insumos`
--
ALTER TABLE `entrada_insumos`
  MODIFY `identrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idhabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `codimpuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idinsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `kardex_insumos`
--
ALTER TABLE `kardex_insumos`
  MODIFY `codkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `kardex_productos`
--
ALTER TABLE `kardex_productos`
  MODIFY `codkardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mediospagos`
--
ALTER TABLE `mediospagos`
  MODIFY `codmediopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `codmensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientoscajas`
--
ALTER TABLE `movimientoscajas`
  MODIFY `codmovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `codnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `codperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `idreservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salida_insumos`
--
ALTER TABLE `salida_insumos`
  MODIFY `idsalida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `codservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `codtarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `codtemporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiposcambio`
--
ALTER TABLE `tiposcambio`
  MODIFY `codcambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiposhabitaciones`
--
ALTER TABLE `tiposhabitaciones`
  MODIFY `codtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiposmoneda`
--
ALTER TABLE `tiposmoneda`
  MODIFY `codmoneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
