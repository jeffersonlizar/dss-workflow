-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 06:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarmas_transicion`
--

CREATE TABLE `alarmas_transicion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `workflow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instancia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_max` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_min` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alarmas_transicion`
--

INSERT INTO `alarmas_transicion` (`id`, `nombre`, `descripcion`, `workflow`, `instancia`, `tipo_usuario`, `usuario`, `tiempo_max`, `tiempo_min`) VALUES
(1, 'alarma 1 tran', 'alarma', 'all', 'all', 'all', 'all', '6000', '');

-- --------------------------------------------------------

--
-- Table structure for table `alarmas_workflow`
--

CREATE TABLE `alarmas_workflow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `workflow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instancia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_max` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_min` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alarmas_workflow`
--

INSERT INTO `alarmas_workflow` (`id`, `nombre`, `descripcion`, `workflow`, `instancia`, `tipo_usuario`, `usuario`, `tiempo_max`, `tiempo_min`) VALUES
(1, 'alarma1', 'alarma de prueba en el sistema', 'all', 'all', 'all', 'all', '87400', ''),
(2, 'alarma2', 'descripcion alarma 2', 'all', 'all', 'all', 'recepcion', '20000', '');

-- --------------------------------------------------------

--
-- Table structure for table `preferencias`
--

CREATE TABLE `preferencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actividad` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `indicadores` int(11) NOT NULL,
  `crecimiento` int(11) NOT NULL,
  `tiempo_promedio` int(11) NOT NULL,
  `actividad_usuario` int(11) NOT NULL,
  `resumen` int(11) NOT NULL,
  `ultimas_instancias` int(11) NOT NULL,
  `ultimas_transiciones` int(11) NOT NULL,
  `duracion_transicion` int(11) NOT NULL,
  `duracion_workflow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `preferencias`
--

INSERT INTO `preferencias` (`id`, `actividad`, `categoria`, `indicadores`, `crecimiento`, `tiempo_promedio`, `actividad_usuario`, `resumen`, `ultimas_instancias`, `ultimas_transiciones`, `duracion_transicion`, `duracion_workflow`) VALUES
(2, 4, 8, 8, 24, 21, 216, 8, 3, 5, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `nombre`, `apellido`, `contrasena`, `email`, `tipo`) VALUES
('Nicole', 'Nicole Andrea Quijada Bracho', 'Quijada Bracho', '81dc9bdb52d04dc20036dbd8313ed055', 'quijadabnicolea@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alarmas_transicion`
--
ALTER TABLE `alarmas_transicion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `alarmas_workflow`
--
ALTER TABLE `alarmas_workflow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `preferencias`
--
ALTER TABLE `preferencias`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alarmas_transicion`
--
ALTER TABLE `alarmas_transicion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alarmas_workflow`
--
ALTER TABLE `alarmas_workflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
