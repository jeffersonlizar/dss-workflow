-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2016 at 06:20 AM
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
('456', '123', '123', '', 'dvjefferson@gmail.com', 0),
('asdf', 'asdf', 'asdf', '1234', 'jeffersonlr@outlook.com', 0),
('jeff', 'jefferson', 'Lizarzabal', '1234', 'dvjefferson@gmail.com', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
