
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2017 a las 22:18:13
-- Versión del servidor: 10.0.28-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u639136022_dss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alarmas_transicion`
--

CREATE TABLE IF NOT EXISTS `alarmas_transicion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `workflow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instancia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_max` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alarmas_transicion`
--

INSERT INTO `alarmas_transicion` (`id`, `nombre`, `descripcion`, `workflow`, `instancia`, `tipo_usuario`, `usuario`, `tiempo_max`, `usuario_admin`, `fecha`) VALUES
(1, 'asdf', 'asdf', 'all', 'all', 'all', 'all', '2880', 'admin', '2017-01-18 15:00:26'),
(2, 'asdf', 'asdf', 'all', 'all', 'all', 'all', '33120', 'admin', '2017-01-18 15:01:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alarmas_workflow`
--

CREATE TABLE IF NOT EXISTS `alarmas_workflow` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `workflow` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instancia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo_max` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alarmas_workflow`
--

INSERT INTO `alarmas_workflow` (`id`, `nombre`, `descripcion`, `workflow`, `instancia`, `tipo_usuario`, `usuario`, `tiempo_max`, `usuario_admin`, `fecha`) VALUES
(1, 'asdf', 'asdf', '0', 'all', '3', 'abogado', '11520', 'admin', '2017-01-18 15:00:05'),
(2, 'Prueba', 'prueba', 'all', 'all', 'all', 'all', '12960', 'admin', '2017-01-18 15:09:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_actividad`
--

CREATE TABLE IF NOT EXISTS `indicador_actividad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `indicador_actividad`
--

INSERT INTO `indicador_actividad` (`id`, `opcion`, `dia`, `dia_comparativo1`, `dia_comparativo2`, `mes`, `mes_comparativo1`, `mes_comparativo2`, `ano`, `ano_comparativo1`, `ano_comparativo2`, `usuario_admin`, `fecha`) VALUES
(96, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 12:48:35'),
(97, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 13:13:22'),
(98, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 15:58:49'),
(99, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 16:18:06'),
(100, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 17:50:19'),
(101, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-21 11:18:31'),
(102, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-02-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-04-06 08:11:54'),
(103, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-01-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-04-22 07:30:15'),
(104, 3, '2017-03-02 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-04-22 13:37:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_actividad_usuario`
--

CREATE TABLE IF NOT EXISTS `indicador_actividad_usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` int(11) NOT NULL,
  `usuario1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `indicador_actividad_usuario`
--

INSERT INTO `indicador_actividad_usuario` (`id`, `opcion`, `usuario1`, `usuario2`, `tipo_usuario`, `dia`, `mes`, `ano`, `usuario_admin`, `fecha`) VALUES
(45, 27, 'jefe_ual', '', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:01:29'),
(46, 210, '', '', '3', '0000-00-00 00:00:00', '2016-12-01 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:54:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_categoria`
--

CREATE TABLE IF NOT EXISTS `indicador_categoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `indicador_categoria`
--

INSERT INTO `indicador_categoria` (`id`, `opcion`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(12, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:01:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_crecimiento`
--

CREATE TABLE IF NOT EXISTS `indicador_crecimiento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` int(11) NOT NULL,
  `periodo1` datetime DEFAULT NULL,
  `periodo2` datetime DEFAULT NULL,
  `periodo3` datetime DEFAULT NULL,
  `periodo4` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `indicador_crecimiento`
--

INSERT INTO `indicador_crecimiento` (`id`, `opcion`, `periodo1`, `periodo2`, `periodo3`, `periodo4`, `usuario_admin`, `fecha`) VALUES
(19, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 17:50:54'),
(20, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 17:51:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_duracion_transicion`
--

CREATE TABLE IF NOT EXISTS `indicador_duracion_transicion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `indicador_duracion_transicion`
--

INSERT INTO `indicador_duracion_transicion` (`id`, `opcion`, `transicion`, `tipo_usuario`, `usuario`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(21, 4, 'all', 'all', 'all', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:04:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_duracion_workflow`
--

CREATE TABLE IF NOT EXISTS `indicador_duracion_workflow` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `indicador_duracion_workflow`
--

INSERT INTO `indicador_duracion_workflow` (`id`, `opcion`, `workflow`, `tipo_usuario`, `usuario`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(43, 4, 'all', 'all', 'all', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:04:25'),
(44, 6, '4', '3', 'all', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 15:14:19'),
(45, 6, '0', '3', 'abogado', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 15:14:43'),
(46, 6, '1', 'all', 'jefe_uth', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 15:15:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_indicadores`
--

CREATE TABLE IF NOT EXISTS `indicador_indicadores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `indicador_indicadores`
--

INSERT INTO `indicador_indicadores` (`id`, `opcion`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(19, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:03:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_resumen`
--

CREATE TABLE IF NOT EXISTS `indicador_resumen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` int(11) NOT NULL,
  `dia` datetime DEFAULT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `indicador_resumen`
--

INSERT INTO `indicador_resumen` (`id`, `opcion`, `dia`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(12, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:02:11'),
(13, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:02:20'),
(14, 5, '0000-00-00 00:00:00', '2016-12-01 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:53:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_tiempo_promedio`
--

CREATE TABLE IF NOT EXISTS `indicador_tiempo_promedio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opcion` int(11) NOT NULL,
  `mes` datetime DEFAULT NULL,
  `ano` datetime DEFAULT NULL,
  `periodo_inicio` datetime DEFAULT NULL,
  `periodo_fin` datetime DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `indicador_tiempo_promedio`
--

INSERT INTO `indicador_tiempo_promedio` (`id`, `opcion`, `mes`, `ano`, `periodo_inicio`, `periodo_fin`, `usuario_admin`, `fecha`) VALUES
(9, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '2017-01-18 14:01:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_ultimas`
--

CREATE TABLE IF NOT EXISTS `indicador_ultimas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ultimas_instancias` int(11) DEFAULT NULL,
  `ultimas_transiciones` int(11) DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `indicador_ultimas`
--

INSERT INTO `indicador_ultimas` (`id`, `ultimas_instancias`, `ultimas_transiciones`, `usuario_admin`, `fecha`) VALUES
(8, 10, 0, 'admin', '2017-01-18 13:23:25'),
(9, 6, 5, 'admin', '2017-01-18 13:29:34'),
(10, 10, 33, 'admin', '2017-01-21 11:46:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `nombre`, `apellido`, `contrasena`, `email`, `tipo`) VALUES
('invitado', 'asdf', 'invitado', '81dc9bdb52d04dc20036dbd8313ed055', 'invitado@invitado.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
