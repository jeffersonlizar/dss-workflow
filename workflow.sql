-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 08:10 AM
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
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `id_workflow` int(11) NOT NULL,
  `inicial` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`, `descripcion`, `id_workflow`, `inicial`, `final`, `id_tipo`) VALUES
(0, 'RecepciÃ³n de la solicitud - R', 'RecepciÃ³n de la solicitud - RecepciÃ³n', 0, 1, 0, 1),
(1, 'Solicitud rechazada', 'Solicitud rechazada', 0, 0, 1, 1),
(2, 'Remitido a unidad de asuntos l', 'Remitido a unidad de asuntos legales', 0, 0, 0, 2),
(3, 'RecepciÃ³n de la solicitud - U', 'RecepciÃ³n de la solicitud - Unidad de asuntos legales', 0, 0, 0, 3),
(4, 'Solicitud en revisiÃ³n', 'Solicitud en revisiÃ³n', 0, 0, 0, 3),
(5, 'ElaboraciÃ³n del documento de ', 'ElaboraciÃ³n del documento de liberaciÃ³n', 0, 0, 0, 3),
(6, 'Remitido a jefe de unidad de a', 'Remitido a jefe de unidad de asuntos legales', 0, 0, 0, 2),
(7, 'RecepciÃ³n del documento - Jef', 'RecepciÃ³n del documento - Jefe de asuntos legales', 0, 0, 0, 2),
(8, 'Documento en revisiÃ³n - Jefe ', 'Documento en revisiÃ³n - Jefe de asuntos legales', 0, 0, 0, 2),
(9, 'Remitido a la coordinaciÃ³n ge', 'Remitido a la coordinaciÃ³n general', 0, 0, 0, 4),
(10, 'Recibido por la coordinaciÃ³n ', 'Recibido por la coordinaciÃ³n general', 0, 0, 0, 4),
(11, 'Remitido al despacho', 'Remitido al despacho', 0, 0, 0, 5),
(12, 'Recibido por el procurador gen', 'Recibido por el procurador general', 0, 0, 0, 5),
(13, 'Documento en revisiÃ³n - Procu', 'Documento en revisiÃ³n - Procurador General', 0, 0, 0, 5),
(14, 'Firma Documento de LiberaciÃ³n', 'Firma Documento de LiberaciÃ³n y Oficio de RemisiÃ³n', 0, 0, 1, 0),
(15, 'RecepciÃ³n de la solicitud - R', 'RecepciÃ³n de la solicitud - RecepciÃ³n', 1, 1, 0, 1),
(16, 'Solicitud rechazada', 'Solicitud rechazada', 1, 0, 1, 1),
(17, 'Remitido a unidad de asuntos l', 'Remitido a unidad de asuntos legales', 1, 0, 0, 2),
(18, 'RecepciÃ³n de la solicitud - U', 'RecepciÃ³n de la solicitud - Unidad de asuntos legales', 1, 0, 0, 3),
(19, 'Solicitud en revisiÃ³n', 'Solicitud en revisiÃ³n', 1, 0, 0, 3),
(20, 'Remitido a jefe de unidad de a', 'Remitido a jefe de unidad de asuntos legales', 1, 0, 0, 2),
(21, 'RecepciÃ³n del documento - Jef', 'RecepciÃ³n del documento - Jefe de asuntos legales', 1, 0, 0, 2),
(22, 'Documento en revisiÃ³n - Jefe ', 'Documento en revisiÃ³n - Jefe de asuntos legales', 1, 0, 0, 2),
(23, 'Remitido a la coordinaciÃ³n ge', 'Remitido a la coordinaciÃ³n general', 1, 0, 0, 4),
(24, 'Recibido por la coordinaciÃ³n ', 'Recibido por la coordinaciÃ³n general', 1, 0, 0, 4),
(25, 'Remitido al despacho', 'Remitido al despacho', 1, 0, 0, 5),
(26, 'Recibido por el procurador gen', 'Recibido por el procurador general', 1, 0, 0, 5),
(27, 'Documento en revisiÃ³n - Procu', 'Documento en revisiÃ³n - Procurador General', 1, 0, 0, 5),
(28, 'Remitido a ejecutivo regional', 'Remitido a ejecutivo regional', 1, 0, 1, 5),
(29, 'RecepciÃ³n de la solicitud - R', 'RecepciÃ³n de la solicitud - RecepciÃ³n', 2, 1, 0, 1),
(30, 'Remitido a unidad de asuntos l', 'Remitido a unidad de asuntos legales', 2, 0, 0, 2),
(31, 'RecepciÃ³n de la solicitud - U', 'RecepciÃ³n de la solicitud - Unidad de asuntos legales', 2, 0, 0, 3),
(32, 'Apertura Expediente de expropi', 'Apertura Expediente de expropiaciÃ³n', 2, 0, 0, 3),
(33, 'Conforme a leyes', 'Conforme a leyes', 2, 0, 0, 3),
(34, 'Arreglo amistoso de expopiaciÃ', 'Arreglo amistoso de expopiaciÃ³n', 2, 0, 0, 3),
(35, 'Tramites para la adquisiciÃ³n ', 'Tramites para la adquisiciÃ³n del inmueble ante el registro inmobiliario', 2, 0, 0, 3),
(36, 'Via judicial', 'Via judicial', 2, 0, 0, 3),
(37, 'Actuaciones judiciales ante el', 'Actuaciones judiciales ante el tribunal competente', 2, 0, 0, 3),
(38, 'En espera de decisiÃ³n de trib', 'En espera de decisiÃ³n de tribunal', 2, 0, 0, 3),
(39, 'Remitido al procurador general', 'Remitido al procurador general', 2, 0, 0, 5),
(40, 'Recibido por el procurador gen', 'Recibido por el procurador general', 2, 0, 1, 5),
(41, 'RecepciÃ³n de la solicitud - R', 'RecepciÃ³n de la solicitud - RecepciÃ³n', 3, 1, 0, 1),
(42, 'Solicitud rechazada', 'Solicitud rechazada', 3, 0, 1, 1),
(43, 'Remitido a unidad de asuntos l', 'Remitido a unidad de asuntos legales', 3, 0, 0, 2),
(44, 'RecepciÃ³n de la solicitud - U', 'RecepciÃ³n de la solicitud - Unidad de asuntos legales', 3, 0, 0, 3),
(45, 'RevisiÃ³n de requisitos de ley', 'RevisiÃ³n de requisitos de ley', 3, 0, 0, 3),
(46, 'ElaboraciÃ³n proyecto de decre', 'ElaboraciÃ³n proyecto de decreto', 3, 0, 0, 3),
(47, 'Remitido a jefe de unidad de a', 'Remitido a jefe de unidad de asuntos legales', 3, 0, 0, 2),
(48, 'RecepciÃ³n de dictamen u opini', 'RecepciÃ³n de dictamen u opiniÃ³n jurÃ­dica', 3, 0, 0, 2),
(49, 'RevisiÃ³n de dictamen u opiniÃ', 'RevisiÃ³n de dictamen u opiniÃ³n jurÃ­dica', 3, 0, 0, 2),
(50, 'Remitido a la coordinaciÃ³n ge', 'Remitido a la coordinaciÃ³n general', 3, 0, 0, 4),
(51, 'Recibido por la coordinaciÃ³n ', 'Recibido por la coordinaciÃ³n general', 3, 0, 0, 4),
(52, 'Remitido al despacho', 'Remitido al despacho', 3, 0, 0, 5),
(53, 'Recibido por el procurador gen', 'Recibido por el procurador general', 3, 0, 0, 5),
(54, 'En revisiÃ³n', 'En revisiÃ³n', 3, 0, 0, 5),
(55, 'Remitido a ejecutivo regional', 'Remitido a ejecutivo regional', 3, 0, 1, 5),
(56, 'RecepciÃ³n del documento', 'RecepciÃ³n del documento', 4, 1, 0, 6),
(57, 'RevisiÃ³n de documento dentro ', 'RevisiÃ³n de documento dentro de normativa', 4, 0, 0, 6),
(58, 'No cumple con normativa', 'No cumple con normativa', 4, 0, 1, 6),
(59, 'Registro en archivo digital', 'Registro en archivo digital', 4, 0, 0, 6),
(60, 'Remitido a asistente de talent', 'Remitido a asistente de talento humano', 4, 0, 0, 7),
(61, 'Foliado y Sellado', 'Foliado y Sellado', 4, 0, 0, 7),
(62, 'Expediente archivado', 'Expediente archivado', 4, 0, 0, 7),
(63, 'Informe de estatus a jefe de t', 'Informe de estatus a jefe de talento humano', 4, 0, 0, 6),
(64, 'RecepciÃ³n de estatus a jefe d', 'RecepciÃ³n de estatus a jefe de talento humano', 4, 0, 0, 6),
(65, 'Informe de estatus a procurado', 'Informe de estatus a procurador general', 4, 0, 0, 5),
(66, 'RecepciÃ³n de estatus a procur', 'RecepciÃ³n de estatus a procurador general', 4, 0, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_workflow` (`id_workflow`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_workflow`) REFERENCES `workflow` (`id_workflow`),
  ADD CONSTRAINT `estado_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
