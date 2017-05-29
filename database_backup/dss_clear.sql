-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alarmas_transicion`
--

DROP TABLE IF EXISTS `alarmas_transicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alarmas_transicion` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alarmas_transicion`
--

LOCK TABLES `alarmas_transicion` WRITE;
/*!40000 ALTER TABLE `alarmas_transicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `alarmas_transicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alarmas_workflow`
--

DROP TABLE IF EXISTS `alarmas_workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alarmas_workflow` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alarmas_workflow`
--

LOCK TABLES `alarmas_workflow` WRITE;
/*!40000 ALTER TABLE `alarmas_workflow` DISABLE KEYS */;
/*!40000 ALTER TABLE `alarmas_workflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_actividad`
--

DROP TABLE IF EXISTS `indicador_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_actividad` (
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
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_actividad`
--

LOCK TABLES `indicador_actividad` WRITE;
/*!40000 ALTER TABLE `indicador_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_actividad_usuario`
--

DROP TABLE IF EXISTS `indicador_actividad_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_actividad_usuario` (
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_actividad_usuario`
--

LOCK TABLES `indicador_actividad_usuario` WRITE;
/*!40000 ALTER TABLE `indicador_actividad_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_actividad_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_categoria`
--

DROP TABLE IF EXISTS `indicador_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_categoria` (
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_categoria`
--

LOCK TABLES `indicador_categoria` WRITE;
/*!40000 ALTER TABLE `indicador_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_crecimiento`
--

DROP TABLE IF EXISTS `indicador_crecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_crecimiento` (
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_crecimiento`
--

LOCK TABLES `indicador_crecimiento` WRITE;
/*!40000 ALTER TABLE `indicador_crecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_crecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_duracion_transicion`
--

DROP TABLE IF EXISTS `indicador_duracion_transicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_duracion_transicion` (
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_duracion_transicion`
--

LOCK TABLES `indicador_duracion_transicion` WRITE;
/*!40000 ALTER TABLE `indicador_duracion_transicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_duracion_transicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_duracion_workflow`
--

DROP TABLE IF EXISTS `indicador_duracion_workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_duracion_workflow` (
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_duracion_workflow`
--

LOCK TABLES `indicador_duracion_workflow` WRITE;
/*!40000 ALTER TABLE `indicador_duracion_workflow` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_duracion_workflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_indicadores`
--

DROP TABLE IF EXISTS `indicador_indicadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_indicadores` (
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_indicadores`
--

LOCK TABLES `indicador_indicadores` WRITE;
/*!40000 ALTER TABLE `indicador_indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_resumen`
--

DROP TABLE IF EXISTS `indicador_resumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_resumen` (
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_resumen`
--

LOCK TABLES `indicador_resumen` WRITE;
/*!40000 ALTER TABLE `indicador_resumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_resumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_tiempo_promedio`
--

DROP TABLE IF EXISTS `indicador_tiempo_promedio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_tiempo_promedio` (
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_tiempo_promedio`
--

LOCK TABLES `indicador_tiempo_promedio` WRITE;
/*!40000 ALTER TABLE `indicador_tiempo_promedio` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_tiempo_promedio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicador_ultimas`
--

DROP TABLE IF EXISTS `indicador_ultimas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicador_ultimas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ultimas_instancias` int(11) DEFAULT NULL,
  `ultimas_transiciones` int(11) DEFAULT NULL,
  `usuario_admin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicador_ultimas`
--

LOCK TABLES `indicador_ultimas` WRITE;
/*!40000 ALTER TABLE `indicador_ultimas` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicador_ultimas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-27 23:44:07
