-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 12:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(0, 'Unidad de asuntos legales'),
(1, 'Unidad de talento humano');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_workflow` int(11) NOT NULL,
  `inicial` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`, `descripcion`, `id_workflow`, `inicial`, `final`, `id_tipo`) VALUES
(0, 'Recepción de la solicitud - Recepción\n', 'Recepción de la solicitud - Recepción\n', 0, 1, 0, 1),
(1, 'Solicitud rechazada', 'Solicitud rechazada', 0, 0, 1, 1),
(2, 'Remitido a unidad de asuntos legales\n', 'Remitido a unidad de asuntos legales', 0, 0, 0, 2),
(3, 'Recepción de la solicitud - Unidad de asuntos legales\n', 'Recepción de la solicitud - Unidad de asuntos legales\n', 0, 0, 0, 3),
(4, 'Solicitud en revisión \n', 'Solicitud en revisión \n', 0, 0, 0, 3),
(5, 'Elaboración del documento de liberación\n', 'Elaboración del documento de liberación\n', 0, 0, 0, 3),
(6, 'Remitido a jefe de unidad de asuntos legales\n', 'Remitido a jefe de unidad de asuntos legales\n', 0, 0, 0, 2),
(7, 'Recepción del documento - Jefe de asuntos legales\n', 'Recepción del documento - Jefe de asuntos legales', 0, 0, 0, 2),
(8, 'Documento en revisión - Jefe de asuntos legales\n', 'Documento en revisión - Jefe de asuntos legales\n', 0, 0, 0, 2),
(9, 'Remitido a la coordinación general', 'Remitido a la coordinación general', 0, 0, 0, 4),
(10, 'Recibido por la coordinación general\n', 'Recibido por la coordinación general\n', 0, 0, 0, 4),
(11, 'Remitido al despacho', 'Remitido al despacho', 0, 0, 0, 5),
(12, 'Recibido por el procurador general\n', 'Recibido por el procurador general', 0, 0, 0, 5),
(13, 'Documento en revisión - Procurador General\n', 'Documento en revisión - Procurador General\n', 0, 0, 0, 5),
(14, 'Firma Documento de Liberación y Oficio de Remisión\n', 'Firma Documento de Liberación y Oficio de Remisión\n', 0, 0, 1, 0),
(15, 'Recepción de la solicitud - Recepción\n', 'Recepción de la solicitud - Recepción\n', 1, 1, 0, 1),
(16, 'Solicitud rechazada', 'Solicitud rechazada', 1, 0, 1, 1),
(17, 'Remitido a unidad de asuntos legales\n', 'Remitido a unidad de asuntos legales', 1, 0, 0, 2),
(18, 'Recepción de la solicitud - Unidad de asuntos legales\n', 'Recepción de la solicitud - Unidad de asuntos legales\n', 1, 0, 0, 3),
(19, 'Solicitud en revisión \n', 'Solicitud en revisión \n', 1, 0, 0, 3),
(20, 'Remitido a jefe de unidad de asuntos legales\n', 'Remitido a jefe de unidad de asuntos legales\n', 1, 0, 0, 2),
(21, 'Recepción del documento - Jefe de asuntos legales\n', 'Recepción del documento - Jefe de asuntos legales\n', 1, 0, 0, 2),
(22, 'Documento en revisión - Jefe de asuntos legales\n', 'Documento en revisión - Jefe de asuntos legales\n', 1, 0, 0, 2),
(23, 'Remitido a la coordinación general\n', 'Remitido a la coordinación general\n', 1, 0, 0, 4),
(24, 'Recibido por la coordinación general\n', 'Recibido por la coordinación general\n', 1, 0, 0, 4),
(25, 'Remitido al despacho', 'Remitido al despacho', 1, 0, 0, 5),
(26, 'Recibido por el procurador general\n', 'Recibido por el procurador general\n', 1, 0, 0, 5),
(27, 'Documento en revisión - Procurador General\n', 'Documento en revisión - Procurador General\n', 1, 0, 0, 5),
(28, 'Remitido a ejecutivo regional', 'Remitido a ejecutivo regional', 1, 0, 1, 5),
(29, 'Recepción de la solicitud - Recepción\n', 'Recepción de la solicitud - Recepción\n', 2, 1, 0, 1),
(30, 'Remitido a unidad de asuntos legales\n', 'Remitido a unidad de asuntos legales', 2, 0, 0, 2),
(31, 'Recepción de la solicitud - Unidad de asuntos legales\n', 'Recepción de la solicitud - Unidad de asuntos legales\n', 2, 0, 0, 3),
(32, 'Apertura Expediente de expropiación\n', 'Apertura Expediente de expropiación\n', 2, 0, 0, 3),
(33, 'Conforme a leyes', 'Conforme a leyes', 2, 0, 0, 3),
(34, 'Arreglo amistoso de expopiación\n', 'Arreglo amistoso de expopiación\n', 2, 0, 0, 3),
(35, 'Tramites para la adquisición del inmueble ante el registro inmobiliario\n', 'Tramites para la adquisición del inmueble ante el registro inmobiliario\n', 2, 0, 0, 3),
(36, 'Via judicial', 'Via judicial', 2, 0, 0, 3),
(37, 'Actuaciones judiciales ante el tribunal competente\n', 'Actuaciones judiciales ante el tribunal competente', 2, 0, 0, 3),
(38, 'En espera de decisión de tribunal\n', 'En espera de decisión de tribunal\n', 2, 0, 0, 3),
(39, 'Remitido al procurador general', 'Remitido al procurador general', 2, 0, 0, 5),
(40, 'Recibido por el procurador general\n\n', 'Recibido por el procurador general', 2, 0, 1, 5),
(41, 'Recepción de la solicitud - Recepción\n', 'Recepción de la solicitud - Recepción\n', 3, 1, 0, 1),
(42, 'Solicitud rechazada', 'Solicitud rechazada', 3, 0, 1, 1),
(43, 'Remitido a unidad de asuntos legales\n', 'Remitido a unidad de asuntos legales', 3, 0, 0, 2),
(44, 'Recepción de la solicitud - Unidad de asuntos legales\n', 'Recepción de la solicitud - Unidad de asuntos legales\n', 3, 0, 0, 3),
(45, 'Revisión de requisitos de ley\n', 'Revisión de requisitos de ley\n', 3, 0, 0, 3),
(46, 'Elaboración proyecto de decreto\n', 'Elaboración proyecto de decreto\n', 3, 0, 0, 3),
(47, 'Remitido a jefe de unidad de asuntos legales\n', 'Remitido a jefe de unidad de asuntos legales', 3, 0, 0, 2),
(48, 'Recepción de dictamen u opinión jurídica\n', 'Recepción de dictamen u opinión jurídica\n', 3, 0, 0, 2),
(49, 'Revisión de dictamen u opinión jurídica\n', 'Revisión de dictamen u opinión jurídica\n', 3, 0, 0, 2),
(50, 'Remitido a la coordinación general\n', 'Remitido a la coordinación general\n', 3, 0, 0, 4),
(51, 'Recibido por la coordinación general\n', 'Recibido por la coordinación general\n', 3, 0, 0, 4),
(52, 'Remitido al despacho', 'Remitido al despacho', 3, 0, 0, 5),
(53, 'Recibido por el procurador general\n', 'Recibido por el procurador general', 3, 0, 0, 5),
(54, 'En revisión\n', 'En revisión\n', 3, 0, 0, 5),
(55, 'Remitido a ejecutivo regional', 'Remitido a ejecutivo regional', 3, 0, 1, 5),
(56, 'Recepción del documento\n', 'Recepción del documento\n', 4, 1, 0, 6),
(57, 'Revisión de documento dentro de normativa\n', 'Revisión de documento dentro de normativa\n', 4, 0, 0, 6),
(58, 'No cumple con normativa', 'No cumple con normativa', 4, 0, 1, 6),
(59, 'Registro en archivo digital', 'Registro en archivo digital', 4, 0, 0, 6),
(60, 'Remitido a asistente de talento humano\n', 'Remitido a asistente de talento humano', 4, 0, 0, 7),
(61, 'Foliado y Sellado', 'Foliado y Sellado', 4, 0, 0, 7),
(62, 'Expediente archivado', 'Expediente archivado', 4, 0, 0, 7),
(63, 'Informe de estatus a jefe de talento humano\n', 'Informe de estatus a jefe de talento humano', 4, 0, 0, 6),
(64, 'Recepción de estatus a jefe de talento humano\n', 'Recepción de estatus a jefe de talento humano\n', 4, 0, 0, 6),
(65, 'Informe de estatus a procurador general\n', 'Informe de estatus a procurador general', 4, 0, 0, 5),
(66, 'Recepción de estatus a procurador general\n', 'Recepción de estatus a procurador general\n', 4, 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `instancia`
--

CREATE TABLE `instancia` (
  `id_instancia` int(11) NOT NULL,
  `id_workflow` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `satisfactoria` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instancia`
--

INSERT INTO `instancia` (`id_instancia`, `id_workflow`, `id_usuario`, `titulo`, `descripcion`, `satisfactoria`, `fecha_inicio`, `fecha_final`) VALUES
(0, 0, 'recepcion', 'instancia2017-01-02 16:26:43', 'descripcion2017-01-02 16:26:43', 0, '2017-01-02 16:26:43', NULL),
(1, 0, 'recepcion', 'instancia2017-01-01 12:51:44', 'descripcion2017-01-01 12:51:44', 1, '2017-01-01 12:51:44', '2017-01-06 11:19:49'),
(2, 4, 'jefe_uth', 'instancia2017-01-04 05:46:22', 'descripcion2017-01-04 05:46:22', 1, '2017-01-04 05:46:22', '2017-01-13 10:36:29'),
(3, 4, 'jefe_uth', 'instancia2017-01-02 16:18:40', 'descripcion2017-01-02 16:18:40', 1, '2017-01-02 16:18:40', '2017-01-07 08:03:23'),
(4, 0, 'recepcion', 'instancia2017-01-02 23:07:17', 'descripcion2017-01-02 23:07:17', 1, '2017-01-02 23:07:17', '2017-01-03 05:29:37'),
(5, 3, 'recepcion', 'instancia2017-01-04 13:01:08', 'descripcion2017-01-04 13:01:08', 0, '2017-01-04 13:01:08', '2017-01-11 10:32:31'),
(6, 4, 'jefe_uth', 'instancia2017-01-02 03:23:09', 'descripcion2017-01-02 03:23:09', 0, '2017-01-02 03:23:09', '2017-01-12 00:00:08'),
(7, 3, 'recepcion', 'instancia2017-01-05 17:14:44', 'descripcion2017-01-05 17:14:44', 1, '2017-01-05 17:14:44', '2017-01-12 05:13:30'),
(8, 0, 'recepcion', 'instancia2017-01-01 22:24:43', 'descripcion2017-01-01 22:24:43', 0, '2017-01-01 22:24:43', '2017-01-04 01:56:06'),
(9, 0, 'recepcion', 'instancia2017-01-05 22:03:54', 'descripcion2017-01-05 22:03:54', 0, '2017-01-05 22:03:54', '2017-01-12 02:27:23'),
(10, 1, 'recepcion', 'instancia2017-01-05 22:38:29', 'descripcion2017-01-05 22:38:29', 0, '2017-01-05 22:38:29', '2017-01-17 23:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `instancia_usuario`
--

CREATE TABLE `instancia_usuario` (
  `id_instancia_usuario` int(11) NOT NULL,
  `id_instancia` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `realizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instancia_usuario`
--

INSERT INTO `instancia_usuario` (`id_instancia_usuario`, `id_instancia`, `id_estado`, `id_usuario`, `realizado`) VALUES
(0, 2, 56, 'jefe_uth', 1),
(1, 3, 56, '0', 0),
(2, 6, 56, '0', 0),
(3, 10, 15, '0', 1),
(4, 10, 17, '0', 1),
(5, 10, 18, 'abogado', 1),
(6, 10, 19, 'recepcion', 1),
(7, 10, 15, 'jefe_ual', 1),
(8, 10, 17, '0', 1),
(9, 10, 18, 'abogado', 1),
(10, 10, 19, 'recepcion', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `id_instancia` int(11) NOT NULL,
  `id_transicion` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `problema_estado` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `id_usuario`, `id_instancia`, `id_transicion`, `descripcion`, `problema_estado`, `fecha`) VALUES
(0, 'recepcion', 1, 1, 'prueba', 1, '2017-01-06 11:19:49'),
(1, 'jefe_uth', 2, 60, 'prueba', 1, '2017-01-09 23:09:16'),
(2, 'jefe_uth', 2, 61, 'prueba', 0, '2017-01-13 10:36:29'),
(3, 'jefe_uth', 3, 60, 'prueba', 0, '2017-01-02 19:44:05'),
(4, 'jefe_uth', 3, 61, 'prueba', 0, '2017-01-07 08:03:23'),
(5, 'recepcion', 4, 1, 'prueba', 1, '2017-01-03 05:29:37'),
(6, 'recepcion', 5, 46, 'prueba', 0, '2017-01-11 10:32:31'),
(7, 'jefe_uth', 6, 60, 'prueba', 1, '2017-01-08 06:11:42'),
(8, 'jefe_uth', 6, 61, 'prueba', 1, '2017-01-12 00:00:08'),
(9, 'recepcion', 7, 46, 'prueba', 1, '2017-01-12 05:13:30'),
(10, 'recepcion', 8, 1, 'prueba', 1, '2017-01-04 01:56:06'),
(11, 'recepcion', 9, 1, 'prueba', 1, '2017-01-12 02:27:23'),
(12, 'recepcion', 10, 17, 'prueba', 1, '2017-01-10 07:56:59'),
(13, 'jefe_ual', 10, 19, 'prueba', 1, '2017-01-12 12:27:09'),
(14, 'abogado', 10, 20, 'prueba', 0, '2017-01-14 17:26:18'),
(15, 'abogado', 10, 21, 'prueba', 0, '2017-01-17 09:34:23'),
(16, 'recepcion', 10, 17, 'prueba', 0, '2017-01-17 19:14:38'),
(17, 'jefe_ual', 10, 19, 'prueba', 1, '2017-01-17 23:43:39'),
(18, 'abogado', 10, 20, 'prueba', 0, '2017-01-17 23:48:20'),
(19, 'abogado', 10, 21, 'prueba', 1, '2017-01-17 23:51:21'),
(20, 'recepcion', 10, 18, 'prueba', 1, '2017-01-17 23:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `descripcion`) VALUES
(0, 'Admin'),
(1, 'RecepciÃ³n'),
(2, 'Jefe de unidad asuntos legales'),
(3, 'Abogado'),
(4, 'Coordinador general'),
(5, 'Procurador general'),
(6, 'Jefe de unidad de talento humano'),
(7, 'Asistente talento humano');

-- --------------------------------------------------------

--
-- Table structure for table `transicion`
--

CREATE TABLE `transicion` (
  `id_transicion` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado_siguiente` int(11) NOT NULL,
  `estado_asociado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transicion`
--

INSERT INTO `transicion` (`id_transicion`, `nombre`, `descripcion`, `estado_siguiente`, `estado_asociado`) VALUES
(0, 'Remitir a unidad de asuntos legales', 'Remitir a unidad de asuntos legales', 2, 0),
(1, 'Solicitud rechazada', 'Solicitud rechazada', 1, 0),
(2, 'Recibido por unidad de asuntos legales', 'Recibido por unidad de asuntos legales', 3, 2),
(3, 'RevisiÃ³n de la solicitud', 'RevisiÃ³n de la solicitud', 4, 3),
(4, 'No cumple con los requisitos', 'No cumple con los requisitos', 0, 4),
(5, 'Cumple con los requisitos', 'Cumple con los requisitos', 5, 4),
(6, 'Remitir a jefe de unidad de asuntos legales', 'Remitir a jefe de unidad de asuntos legales', 6, 5),
(7, 'Recibido por jefe de unidad de asuntos legales', 'Recibido por jefe de unidad de asuntos legales', 7, 6),
(8, 'RevisiÃ³n del documento', 'RevisiÃ³n del documento', 8, 7),
(9, 'Correcciones pendientes', 'Correcciones pendientes', 5, 8),
(10, 'Sin correcciones', 'Sin correcciones', 9, 8),
(11, 'Recibido por la coordinaciÃ³n', 'Recibido por la coordinaciÃ³n', 10, 9),
(12, 'Remitir al despacho', 'Remitir al despacho', 11, 10),
(13, 'Recibido por el procurador', 'Recibido por el procurador', 12, 11),
(14, 'RevisiÃ³n del documento', 'RevisiÃ³n del documento', 13, 12),
(15, 'Correcciones pendientes', 'Correcciones pendientes', 5, 13),
(16, 'Sin correcciones', 'Sin correcciones', 14, 13),
(17, 'Remitir a unidad de asuntos legales', 'Remitir a unidad de asuntos legales', 17, 15),
(18, 'Solicitud rechazada', 'Solicitud rechazada', 16, 15),
(19, 'Recibido por unidad de asuntos legales', 'Recibido por unidad de asuntos legales', 18, 17),
(20, 'RevisiÃ³n de la solicitud', 'RevisiÃ³n de la solicitud', 19, 18),
(21, 'No cumple con los requisitos', 'No cumple con los requisitos', 15, 19),
(22, 'Cumple con los requisitos', 'Cumple con los requisitos', 20, 19),
(23, 'Recibido por jefe de unidad de asuntos legales', 'Recibido por jefe de unidad de asuntos legales', 21, 20),
(24, 'RevisiÃ³n del documento', 'RevisiÃ³n del documento', 22, 21),
(25, 'Correcciones pendientes', 'Correcciones pendientes', 15, 22),
(26, 'Sin correcciones', 'Sin correcciones', 23, 22),
(27, 'Recibido por la coordinaciÃ³n', 'Recibido por la coordinaciÃ³n', 24, 23),
(28, 'Remitir al despacho', 'Remitir al despacho', 25, 24),
(29, 'Recibido por el procurador', 'Recibido por el procurador', 26, 25),
(30, 'RevisiÃ³n del documento', 'RevisiÃ³n del documento', 27, 26),
(31, 'No cumple con los requisitos', 'No cumple con los requisitos', 15, 27),
(32, 'Cumple con los requisitos', 'Cumple con los requisitos', 28, 27),
(33, 'Remitir a unidad de asuntos legales', 'Remitir a unidad de asuntos legales', 30, 29),
(34, 'Recibido por unidad de asuntos legales', 'Recibido por unidad de asuntos legales', 31, 30),
(35, 'Apertura de expediente', 'Apertura de expediente', 32, 31),
(36, 'Conforme a lo establecido en la ley', 'Conforme a lo establecido en la ley', 33, 32),
(37, 'Arreglo amistoso', 'Arreglo amistoso', 34, 33),
(38, 'Procede arreglo amistoso', 'Procede arreglo amistoso', 35, 34),
(39, 'No procede arreglo amistoso', 'No procede arreglo amistoso', 36, 34),
(40, 'Actuaciones judiciales', 'Actuaciones judiciales', 37, 35),
(41, 'Actuaciones judiciales', 'Actuaciones judiciales', 37, 36),
(42, 'Espera de decisiÃ³n de tribunal', 'Espera de decisiÃ³n de tribunal', 38, 37),
(43, 'DecisiÃ³n recibida', 'DecisiÃ³n recibida', 39, 38),
(44, 'Recibido por el procurador', 'Recibido por el procurador', 40, 39),
(45, 'Remitir a unidad de asuntos legales', 'Remitir a unidad de asuntos legales', 43, 41),
(46, 'Solicitud rechazada', 'Solicitud rechazada', 42, 41),
(47, 'Recibido por unidad de asuntos legales', 'Recibido por unidad de asuntos legales', 44, 43),
(48, 'RevisiÃ³n de requisitos', 'RevisiÃ³n de requisitos', 45, 44),
(49, 'No cumple con los requisitos', 'No cumple con los requisitos', 41, 45),
(50, 'Cumple con los requisitos', 'Cumple con los requisitos', 46, 45),
(51, 'Remitir a jefe de unidad', 'Remitir a jefe de unidad', 47, 46),
(52, 'Recibido dictamen u opiniÃ³n jurÃ­dica', 'Recibido dictamen u opiniÃ³n jurÃ­dica', 48, 47),
(53, 'RevisiÃ³n de dictamen', 'RevisiÃ³n de dictamen', 49, 48),
(54, 'Remitir a coordinaciÃ³n general', 'Remitir a coordinaciÃ³n general', 50, 49),
(55, 'Recibido por coordinaciÃ³n general', 'Recibido por coordinaciÃ³n general', 53, 50),
(56, 'Proceso de revisiÃ³n', 'Proceso de revisiÃ³n', 52, 51),
(57, 'Recibido por el procurador general', 'Recibido por el procurador general', 53, 52),
(58, 'Proceso de revisiÃ³n', 'Proceso de revisiÃ³n', 54, 53),
(59, 'Remitir a ejecutivo regional', 'Remitir a ejecutivo regional', 55, 54),
(60, 'RevisiÃ³n del documento', 'RevisiÃ³n del documento', 57, 56),
(61, 'No cumple con la normativa', 'No cumple con la normativa', 58, 57),
(62, 'Cumple con la normativa', 'Cumple con la normativa', 59, 57),
(63, 'Remitir a asistente', 'Remitir a asistente', 60, 59),
(64, 'Foliar y sellar', 'Foliar y sellar', 61, 60),
(65, 'Archivar expediente', 'Archivar expediente', 62, 61),
(66, 'Informar estatus a jefe de talento humano', 'Informar estatus a jefe de talento humano', 63, 62),
(67, 'RecepciÃ³n de estatus jefe de talento humano', 'RecepciÃ³n de estatus jefe de talento humano', 64, 63),
(68, 'Informar estatus a procurador general', 'Informar estatus a procurador general', 65, 64),
(69, 'RecepciÃ³n de estatus procurador general', 'RecepciÃ³n de estatus procurador general', 66, 65);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `contrasena`, `id_tipo`) VALUES
('abogado', '81dc9bdb52d04dc20036dbd8313ed055', 3),
('admin', '21232f297a57a5a743894a0e4a801fc3', 0),
('asistente_uth', '81dc9bdb52d04dc20036dbd8313ed055', 7),
('coordinador', '81dc9bdb52d04dc20036dbd8313ed055', 4),
('jefe_ual', '81dc9bdb52d04dc20036dbd8313ed055', 2),
('jefe_uth', '81dc9bdb52d04dc20036dbd8313ed055', 6),
('procurador', '81dc9bdb52d04dc20036dbd8313ed055', 5),
('recepcion', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `id_workflow` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`id_workflow`, `nombre`, `descripcion`, `id_categoria`) VALUES
(0, 'ElaboraciÃ³n de Documento de L', 'ElaboraciÃ³n de Documento de L', 0),
(1, 'RevisiÃ³n de Decretos del Ejec', 'RevisiÃ³n de Decretos del Ejec', 0),
(2, 'Procedimiento Judicial de Expr', 'Procedimiento Judicial de Expr', 0),
(3, 'Dictamen u OpiniÃ³n JurÃ­dica', 'Dictamen u OpiniÃ³n JurÃ­dica', 0),
(4, 'Reposo del Personal', 'Reposo del Personal', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_workflow` (`id_workflow`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indexes for table `instancia`
--
ALTER TABLE `instancia`
  ADD PRIMARY KEY (`id_instancia`),
  ADD KEY `id_workflow` (`id_workflow`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `instancia_usuario`
--
ALTER TABLE `instancia_usuario`
  ADD PRIMARY KEY (`id_instancia_usuario`),
  ADD KEY `id_instancia` (`id_instancia`,`id_estado`,`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_instancia` (`id_instancia`),
  ADD KEY `id_transicion` (`id_transicion`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `transicion`
--
ALTER TABLE `transicion`
  ADD PRIMARY KEY (`id_transicion`),
  ADD KEY `estado_siguiente` (`estado_siguiente`),
  ADD KEY `estado_asociado` (`estado_asociado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id_workflow`),
  ADD KEY `id_tipo` (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_workflow`) REFERENCES `workflow` (`id_workflow`),
  ADD CONSTRAINT `estado_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);

--
-- Constraints for table `instancia`
--
ALTER TABLE `instancia`
  ADD CONSTRAINT `instancia_ibfk_1` FOREIGN KEY (`id_workflow`) REFERENCES `workflow` (`id_workflow`),
  ADD CONSTRAINT `instancia_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `instancia_usuario`
--
ALTER TABLE `instancia_usuario`
  ADD CONSTRAINT `instancia_usuario_ibfk_1` FOREIGN KEY (`id_instancia`) REFERENCES `instancia` (`id_instancia`),
  ADD CONSTRAINT `instancia_usuario_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Constraints for table `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `proceso_ibfk_2` FOREIGN KEY (`id_instancia`) REFERENCES `instancia` (`id_instancia`),
  ADD CONSTRAINT `proceso_ibfk_3` FOREIGN KEY (`id_transicion`) REFERENCES `transicion` (`id_transicion`);

--
-- Constraints for table `transicion`
--
ALTER TABLE `transicion`
  ADD CONSTRAINT `transicion_ibfk_1` FOREIGN KEY (`estado_siguiente`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `transicion_ibfk_2` FOREIGN KEY (`estado_asociado`) REFERENCES `estado` (`id_estado`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);

--
-- Constraints for table `workflow`
--
ALTER TABLE `workflow`
  ADD CONSTRAINT `workflow_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
