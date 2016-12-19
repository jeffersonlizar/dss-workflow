-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2016 at 04:28 AM
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
(0, 'Decretos');

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
(1, 'Abogado'),
(2, 'Jefe de unidad de asuntos legales'),
(3, 'Coordinador general'),
(4, 'Procurador general');

-- --------------------------------------------------------

--
-- Table structure for table `transicion`
--

CREATE TABLE `transicion` (
  `id_transicion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `estado_siguiente` int(11) NOT NULL,
  `estado_asociado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(30) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `contrasena`, `id_tipo`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `id_workflow` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`id_workflow`, `nombre`, `descripcion`, `id_categoria`) VALUES
(0, 'RevisiÃ³n de Decretos del Ejec', 'Workflow que gestiona la Revis', 0);

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
