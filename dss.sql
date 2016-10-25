-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 06:56 AM
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

--
-- Dumping data for table `alarmas_transicion`
--

INSERT INTO `alarmas_transicion` (`id`, `nombre`, `descripcion`, `workflow`, `instancia`, `tipo_usuario`, `usuario`, `tiempo_max`, `usuario_admin`, `fecha`) VALUES
(1, 'alarma 1 tran', 'alarma', 'all', 'all', 'all', 'all', '6000', '', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `alarmas_workflow`
--

INSERT INTO `alarmas_workflow` (`id`, `nombre`, `descripcion`, `workflow`, `instancia`, `tipo_usuario`, `usuario`, `tiempo_max`, `usuario_admin`, `fecha`) VALUES
(1, 'alarma1', 'alarma de prueba en el sistema', 'all', 'all', 'all', 'all', '87400', '', '0000-00-00 00:00:00'),
(2, 'alarma2', 'descripcion alarma 2', 'all', 'all', 'all', 'recepcion', '20000', '', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `indicador_actividad`
--

INSERT INTO `indicador_actividad` (`id`, `opcion`, `dia`, `dia_comparativo1`, `dia_comparativo2`, `mes`, `mes_comparativo1`, `mes_comparativo2`, `ano`, `ano_comparativo1`, `ano_comparativo2`, `usuario_admin`, `fecha`) VALUES
(2, 1, '2016-09-15 00:00:00', '2016-09-08 00:00:00', '2016-09-20 00:00:00', '2016-09-01 00:00:00', '2016-09-01 00:00:00', '2016-10-01 00:00:00', '2016-01-01 00:00:00', '2016-01-01 00:00:00', '2016-01-01 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_actividad_usuario`
--

INSERT INTO `indicador_actividad_usuario` (`id`, `opcion`, `usuario1`, `usuario2`, `tipo_usuario`, `dia`, `mes`, `ano`, `usuario_admin`, `fecha`) VALUES
(1, 216, 'recepcion', 'gerencia', '2', '2016-09-14 00:00:00', '2016-09-01 00:00:00', '2016-01-01 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_categoria`
--

INSERT INTO `indicador_categoria` (`id`, `opcion`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(1, 8, '2016-09-13 00:00:00', '2016-09-01 00:00:00', '2016-01-01 00:00:00', '2016-09-01 00:00:00', '2016-10-14 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_crecimiento`
--

INSERT INTO `indicador_crecimiento` (`id`, `opcion`, `periodo1`, `periodo2`, `periodo3`, `periodo4`, `usuario_admin`, `fecha`) VALUES
(1, 0, '2016-09-13 00:00:00', '2016-09-24 00:00:00', '2016-09-17 00:00:00', '2016-09-24 00:00:00', NULL, NULL),
(2, 14, '2016-09-13 00:00:00', '2016-09-24 00:00:00', '2016-09-17 00:00:00', '2016-09-24 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_duracion_transicion`
--

INSERT INTO `indicador_duracion_transicion` (`id`, `opcion`, `transicion`, `tipo_usuario`, `usuario`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(1, 8, 'all', 'all', 'all', '2016-09-14 00:00:00', '2016-09-01 00:00:00', '2016-01-01 00:00:00', '2016-09-06 00:00:00', '2016-09-30 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_duracion_workflow`
--

INSERT INTO `indicador_duracion_workflow` (`id`, `opcion`, `workflow`, `tipo_usuario`, `usuario`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(2, 8, 'all', 'all', 'all', '2016-09-15 00:00:00', '2016-09-01 00:00:00', '2016-01-01 00:00:00', '2016-09-13 00:00:00', '2016-09-22 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_indicadores`
--

INSERT INTO `indicador_indicadores` (`id`, `opcion`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(1, 8, '2016-09-15 00:00:00', '2016-09-01 00:00:00', '2016-01-01 00:00:00', '2016-08-02 00:00:00', '2016-09-14 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_resumen`
--

INSERT INTO `indicador_resumen` (`id`, `opcion`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(1, 8, '2016-09-15 00:00:00', '2016-09-01 00:00:00', '2016-01-01 00:00:00', '2016-09-13 00:00:00', '2016-09-21 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_tiempo_promedio`
--

INSERT INTO `indicador_tiempo_promedio` (`id`, `opcion`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(1, 25, '2016-09-01 00:00:00', '2016-01-01 00:00:00', '2016-09-08 00:00:00', '2016-09-15 00:00:00', NULL, NULL);

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

--
-- Dumping data for table `indicador_ultimas`
--

INSERT INTO `indicador_ultimas` (`id`, `ultimas_instancias`, `ultimas_transiciones`, `usuario_admin`, `fecha`) VALUES
(1, 15, 10, NULL, NULL);

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
('antonio', 'antonio', 'alvaradoa', '81dc9bdb52d04dc20036dbd8313ed055', 'a@a.com', 0),
('Nicole', 'Nicole Andrea Quijada Bracho', 'Quijada Brachohjgfh', '81dc9bdb52d04dc20036dbd8313ed055', 'quijadabnicolea@gmail.com', 1),
('pedro', 'pedro', 'jimenez', '81dc9bdb52d04dc20036dbd8313ed055', 'pjimenez@prueba.com', 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indicador_actividad`
--
ALTER TABLE `indicador_actividad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indicador_actividad_usuario`
--
ALTER TABLE `indicador_actividad_usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indicador_categoria`
--
ALTER TABLE `indicador_categoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicador_crecimiento`
--
ALTER TABLE `indicador_crecimiento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indicador_duracion_transicion`
--
ALTER TABLE `indicador_duracion_transicion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicador_duracion_workflow`
--
ALTER TABLE `indicador_duracion_workflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `indicador_indicadores`
--
ALTER TABLE `indicador_indicadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicador_resumen`
--
ALTER TABLE `indicador_resumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicador_tiempo_promedio`
--
ALTER TABLE `indicador_tiempo_promedio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indicador_ultimas`
--
ALTER TABLE `indicador_ultimas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `preferencias`
--
ALTER TABLE `preferencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
