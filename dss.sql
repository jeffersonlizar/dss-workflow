-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 06:15 AM
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
  `ultimas_transiciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `preferencias`
--

INSERT INTO `preferencias` (`id`, `actividad`, `categoria`, `indicadores`, `crecimiento`, `tiempo_promedio`, `actividad_usuario`, `resumen`, `ultimas_instancias`, `ultimas_transiciones`) VALUES
(2, 4, 8, 8, 24, 21, 216, 8, 3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preferencias`
--
ALTER TABLE `preferencias`
  ADD UNIQUE KEY `id` (`id`);

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
