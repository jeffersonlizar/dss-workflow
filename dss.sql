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
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_actividad`
--

CREATE TABLE `indicador_actividad` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `dia_comparativo1` datetime DEFAULT NULL,
  `dia_comparativo2` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `mes_comparativo1` datetime DEFAULT NULL,
  `mes_comparativo2` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `ano_comparativo1` datetime DEFAULT NULL,
  `ano_comparativo2` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_actividad_usuario`
--

CREATE TABLE `indicador_actividad_usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `usuario1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_categoria`
--

CREATE TABLE `indicador_categoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_crecimiento`
--

CREATE TABLE `indicador_crecimiento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `periodo1` datetime DEFAULT NULL,
  `periodo2` datetime DEFAULT NULL,
  `periodo3` datetime DEFAULT NULL,
  `periodo4` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_duracion_transicion`
--

CREATE TABLE `indicador_duracion_transicion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `transicion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_duracion_workflow`
--

CREATE TABLE `indicador_duracion_workflow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `workflow` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_indicadores`
--

CREATE TABLE `indicador_indicadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_resumen`
--

CREATE TABLE `indicador_resumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_tiempo_promedio`
--

CREATE TABLE `indicador_tiempo_promedio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opcion` int(11) NOT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicador_ultimas`
--

CREATE TABLE `indicador_ultimas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ultimas_instancias` int(11) DEFAULT NULL,
  `ultimas_transiciones` int(11) DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `indicador_actividad`
--
ALTER TABLE `indicador_actividad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_actividad_usuario`
--
ALTER TABLE `indicador_actividad_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_categoria`
--
ALTER TABLE `indicador_categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_crecimiento`
--
ALTER TABLE `indicador_crecimiento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_duracion_transicion`
--
ALTER TABLE `indicador_duracion_transicion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_duracion_workflow`
--
ALTER TABLE `indicador_duracion_workflow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_indicadores`
--
ALTER TABLE `indicador_indicadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_resumen`
--
ALTER TABLE `indicador_resumen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_tiempo_promedio`
--
ALTER TABLE `indicador_tiempo_promedio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `indicador_ultimas`
--
ALTER TABLE `indicador_ultimas`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alarmas_workflow`
--
ALTER TABLE `alarmas_workflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indicador_actividad`
--
ALTER TABLE `indicador_actividad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `indicador_actividad_usuario`
--
ALTER TABLE `indicador_actividad_usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `indicador_categoria`
--
ALTER TABLE `indicador_categoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `indicador_crecimiento`
--
ALTER TABLE `indicador_crecimiento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `indicador_duracion_transicion`
--
ALTER TABLE `indicador_duracion_transicion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `indicador_duracion_workflow`
--
ALTER TABLE `indicador_duracion_workflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `indicador_indicadores`
--
ALTER TABLE `indicador_indicadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `indicador_resumen`
--
ALTER TABLE `indicador_resumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `indicador_tiempo_promedio`
--
ALTER TABLE `indicador_tiempo_promedio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `indicador_ultimas`
--
ALTER TABLE `indicador_ultimas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
