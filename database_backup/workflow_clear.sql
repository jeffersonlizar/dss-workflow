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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (0,'Unidad de asuntos legales'),(1,'Unidad de talento humano');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_workflow` int(11) NOT NULL,
  `inicial` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_workflow` (`id_workflow`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (0,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',0,1,0,1),(1,'Solicitud rechazada','Solicitud rechazada',0,0,1,1),(2,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',0,0,0,2),(3,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',0,0,0,3),(4,'Solicitud en revisión ','Solicitud en revisión ',0,0,0,3),(5,'Elaboración del documento de liberación','Elaboración del documento de liberación',0,0,0,3),(6,'Remitido a jefe de unidad de asuntos legales','Remitido a jefe de unidad de asuntos legales',0,0,0,2),(7,'Recepción del documento - Jefe de asuntos legales','Recepción del documento - Jefe de asuntos legales',0,0,0,2),(8,'Documento en revisión - Jefe de asuntos legales','Documento en revisión - Jefe de asuntos legales',0,0,0,2),(9,'Remitido a la coordinación general','Remitido a la coordinación general',0,0,0,4),(10,'Recibido por la coordinación general','Recibido por la coordinación general',0,0,0,4),(11,'Remitido al despacho','Remitido al despacho',0,0,0,5),(12,'Recibido por el procurador general','Recibido por el procurador general',0,0,0,5),(13,'Documento en revisión - Procurador General','Documento en revisión - Procurador General',0,0,0,5),(14,'Firma Documento de Liberación y Oficio de Remisión','Firma Documento de Liberación y Oficio de Remisión',0,0,1,0),(15,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',1,1,0,1),(16,'Solicitud rechazada','Solicitud rechazada',1,0,1,1),(17,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',1,0,0,2),(18,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',1,0,0,3),(19,'Solicitud en revisión ','Solicitud en revisión ',1,0,0,3),(20,'Remitido a jefe de unidad de asuntos legales','Remitido a jefe de unidad de asuntos legales',1,0,0,2),(21,'Recepción del documento - Jefe de asuntos legales','Recepción del documento - Jefe de asuntos legales',1,0,0,2),(22,'Documento en revisión - Jefe de asuntos legales','Documento en revisión - Jefe de asuntos legales',1,0,0,2),(23,'Remitido a la coordinación general','Remitido a la coordinación general',1,0,0,4),(24,'Recibido por la coordinación general','Recibido por la coordinación general',1,0,0,4),(25,'Remitido al despacho','Remitido al despacho',1,0,0,5),(26,'Recibido por el procurador general','Recibido por el procurador general',1,0,0,5),(27,'Documento en revisión - Procurador General','Documento en revisión - Procurador General',1,0,0,5),(28,'Remitido a ejecutivo regional','Remitido a ejecutivo regional',1,0,1,5),(29,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',2,1,0,1),(30,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',2,0,0,2),(31,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',2,0,0,3),(32,'Apertura Expediente de expropiación','Apertura Expediente de expropiación',2,0,0,3),(33,'Conforme a leyes','Conforme a leyes',2,0,0,3),(34,'Arreglo amistoso de expopiación','Arreglo amistoso de expopiación',2,0,0,3),(35,'Tramites para la adquisición del inmueble ante el registro inmobiliario','Tramites para la adquisición del inmueble ante el registro inmobiliario',2,0,0,3),(36,'Via judicial','Via judicial',2,0,0,3),(37,'Actuaciones judiciales ante el tribunal competente','Actuaciones judiciales ante el tribunal competente',2,0,0,3),(38,'En espera de decisión de tribunal','En espera de decisión de tribunal',2,0,0,3),(39,'Remitido al procurador general','Remitido al procurador general',2,0,0,5),(40,'Recibido por el procurador general','Recibido por el procurador general',2,0,1,5),(41,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',3,1,0,1),(42,'Solicitud rechazada','Solicitud rechazada',3,0,1,1),(43,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',3,0,0,2),(44,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',3,0,0,3),(45,'Revisión de requisitos de ley','Revisión de requisitos de ley',3,0,0,3),(46,'Elaboración proyecto de decreto','Elaboración proyecto de decreto',3,0,0,3),(47,'Remitido a jefe de unidad de asuntos legales','Remitido a jefe de unidad de asuntos legales',3,0,0,2),(48,'Recepción de dictamen u opinión jurídica','Recepción de dictamen u opinión jurídica',3,0,0,2),(49,'Revisión de dictamen u opinión jurídica','Revisión de dictamen u opinión jurídica',3,0,0,2),(50,'Remitido a la coordinación general','Remitido a la coordinación general',3,0,0,4),(51,'Recibido por la coordinación general','Recibido por la coordinación general',3,0,0,4),(52,'Remitido al despacho','Remitido al despacho',3,0,0,5),(53,'Recibido por el procurador general','Recibido por el procurador general',3,0,0,5),(54,'En revisión','En revisión',3,0,0,5),(55,'Remitido a ejecutivo regional','Remitido a ejecutivo regional',3,0,1,5),(56,'Recepción del documento','Recepción del documento',4,1,0,6),(57,'Revisión de documento dentro de normativa','Revisión de documento dentro de normativa',4,0,0,6),(58,'No cumple con normativa','No cumple con normativa',4,0,1,6),(59,'Registro en archivo digital','Registro en archivo digital',4,0,0,6),(60,'Remitido a asistente de talento humano','Remitido a asistente de talento humano',4,0,0,7),(61,'Foliado y Sellado','Foliado y Sellado',4,0,0,7),(62,'Expediente archivado','Expediente archivado',4,0,0,7),(63,'Informe de estatus a jefe de talento humano','Informe de estatus a jefe de talento humano',4,0,0,6),(64,'Recepción de estatus a jefe de talento humano','Recepción de estatus a jefe de talento humano',4,0,0,6),(65,'Informe de estatus a procurador general','Informe de estatus a procurador general',4,0,0,5),(66,'Recepción de estatus a procurador general','Recepción de estatus a procurador general',4,0,1,5);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instancia`
--

DROP TABLE IF EXISTS `instancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancia` (
  `id_instancia` int(11) NOT NULL,
  `id_workflow` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `satisfactoria` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime DEFAULT NULL,
  PRIMARY KEY (`id_instancia`),
  KEY `id_workflow` (`id_workflow`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancia`
--

LOCK TABLES `instancia` WRITE;
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `instancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instancia_usuario`
--

DROP TABLE IF EXISTS `instancia_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancia_usuario` (
  `id_instancia_usuario` int(11) NOT NULL,
  `id_instancia` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `realizado` int(11) NOT NULL,
  PRIMARY KEY (`id_instancia_usuario`),
  KEY `id_instancia` (`id_instancia`,`id_estado`,`id_usuario`),
  KEY `id_estado` (`id_estado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancia_usuario`
--

LOCK TABLES `instancia_usuario` WRITE;
/*!40000 ALTER TABLE `instancia_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `instancia_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proceso`
--

DROP TABLE IF EXISTS `proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proceso` (
  `id_proceso` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `id_instancia` int(11) NOT NULL,
  `id_transicion` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `problema_estado` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_proceso`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_instancia` (`id_instancia`),
  KEY `id_transicion` (`id_transicion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso`
--

LOCK TABLES `proceso` WRITE;
/*!40000 ALTER TABLE `proceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (0,'Admin'),(1,'Recepción'),(2,'Jefe de unidad asuntos legales'),(3,'Abogado'),(4,'Coordinador general'),(5,'Procurador general'),(6,'Jefe de unidad de talento humano'),(7,'Asistente talento humano');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transicion`
--

DROP TABLE IF EXISTS `transicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transicion` (
  `id_transicion` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado_siguiente` int(11) NOT NULL,
  `estado_asociado` int(11) NOT NULL,
  PRIMARY KEY (`id_transicion`),
  KEY `estado_siguiente` (`estado_siguiente`),
  KEY `estado_asociado` (`estado_asociado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transicion`
--

LOCK TABLES `transicion` WRITE;
/*!40000 ALTER TABLE `transicion` DISABLE KEYS */;
INSERT INTO `transicion` VALUES (0,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',2,0),(1,'Solicitud rechazada','Solicitud rechazada',1,0),(2,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',3,2),(3,'Revisión de la solicitud','Revisión de la solicitud',4,3),(4,'No cumple con los requisitos','No cumple con los requisitos',0,4),(5,'Cumple con los requisitos','Cumple con los requisitos',5,4),(6,'Remitir a jefe de unidad de asuntos legales','Remitir a jefe de unidad de asuntos legales',6,5),(7,'Recibido por jefe de unidad de asuntos legales','Recibido por jefe de unidad de asuntos legales',7,6),(8,'Revisión del documento','Revisión del documento',8,7),(9,'Correcciones pendientes','Correcciones pendientes',5,8),(10,'Sin correcciones','Sin correcciones',9,8),(11,'Recibido por la coordinación','Recibido por la coordinación',10,9),(12,'Remitir al despacho','Remitir al despacho',11,10),(13,'Recibido por el procurador','Recibido por el procurador',12,11),(14,'Revisión del documento','Revisión del documento',13,12),(15,'Correcciones pendientes','Correcciones pendientes',5,13),(16,'Sin correcciones','Sin correcciones',14,13),(17,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',17,15),(18,'Solicitud rechazada','Solicitud rechazada',16,15),(19,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',18,17),(20,'Revisión de la solicitud','Revisión de la solicitud',19,18),(21,'No cumple con los requisitos','No cumple con los requisitos',15,19),(22,'Cumple con los requisitos','Cumple con los requisitos',20,19),(23,'Recibido por jefe de unidad de asuntos legales','Recibido por jefe de unidad de asuntos legales',21,20),(24,'Revisión del documento','Revisión del documento',22,21),(25,'Correcciones pendientes','Correcciones pendientes',15,22),(26,'Sin correcciones','Sin correcciones',23,22),(27,'Recibido por la coordinación','Recibido por la coordinación',24,23),(28,'Remitir al despacho','Remitir al despacho',25,24),(29,'Recibido por el procurador','Recibido por el procurador',26,25),(30,'Revisión del documento','Revisión del documento',27,26),(31,'No cumple con los requisitos','No cumple con los requisitos',15,27),(32,'Cumple con los requisitos','Cumple con los requisitos',28,27),(33,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',30,29),(34,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',31,30),(35,'Apertura de expediente','Apertura de expediente',32,31),(36,'Conforme a lo establecido en la ley','Conforme a lo establecido en la ley',33,32),(37,'Arreglo amistoso','Arreglo amistoso',34,33),(38,'Procede arreglo amistoso','Procede arreglo amistoso',35,34),(39,'No procede arreglo amistoso','No procede arreglo amistoso',36,34),(40,'Actuaciones judiciales','Actuaciones judiciales',37,35),(41,'Actuaciones judiciales','Actuaciones judiciales',37,36),(42,'Espera de decisión de tribunal','Espera de decisión de tribunal',38,37),(43,'Decisión recibida','Decisión recibida',39,38),(44,'Recibido por el procurador','Recibido por el procurador',40,39),(45,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',43,41),(46,'Solicitud rechazada','Solicitud rechazada',42,41),(47,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',44,43),(48,'Revisión de requisitos','Revisión de requisitos',45,44),(49,'No cumple con los requisitos','No cumple con los requisitos',41,45),(50,'Cumple con los requisitos','Cumple con los requisitos',46,45),(51,'Remitir a jefe de unidad','Remitir a jefe de unidad',47,46),(52,'Recibido dictamen u opinión jurídica','Recibido dictamen u opinión jurídica',48,47),(53,'Revisión de dictamen','Revisión de dictamen',49,48),(54,'Remitir a coordinación general','Remitir a coordinación general',50,49),(55,'Recibido por coordinación general','Recibido por coordinación general',53,50),(56,'Proceso de revisión','Proceso de revisión',52,51),(57,'Recibido por el procurador general','Recibido por el procurador general',53,52),(58,'Proceso de revisión','Proceso de revisión',54,53),(59,'Remitir a ejecutivo regional','Remitir a ejecutivo regional',55,54),(60,'Revisión del documento','Revisión del documento',57,56),(61,'No cumple con la normativa','No cumple con la normativa',58,57),(62,'Cumple con la normativa','Cumple con la normativa',59,57),(63,'Remitir a asistente','Remitir a asistente',60,59),(64,'Foliar y sellar','Foliar y sellar',61,60),(65,'Archivar expediente','Archivar expediente',62,61),(66,'Informar estatus a jefe de talento humano','Informar estatus a jefe de talento humano',63,62),(67,'Recepción de estatus jefe de talento humano','Recepción de estatus jefe de talento humano',64,63),(68,'Informar estatus a procurador general','Informar estatus a procurador general',65,64),(69,'Recepción de estatus procurador general','Recepción de estatus procurador general',66,65);
/*!40000 ALTER TABLE `transicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('abogado','81dc9bdb52d04dc20036dbd8313ed055',3),('abogado2','81dc9bdb52d04dc20036dbd8313ed055',3),('abogado3','81dc9bdb52d04dc20036dbd8313ed055',3),('abogado4','81dc9bdb52d04dc20036dbd8313ed055',1),('abogado5','81dc9bdb52d04dc20036dbd8313ed055',3),('abogado6','81dc9bdb52d04dc20036dbd8313ed055',3),('admin','21232f297a57a5a743894a0e4a801fc3',0),('asistente_uth','81dc9bdb52d04dc20036dbd8313ed055',7),('coordinador','81dc9bdb52d04dc20036dbd8313ed055',4),('jefe_ual','81dc9bdb52d04dc20036dbd8313ed055',2),('jefe_uth','81dc9bdb52d04dc20036dbd8313ed055',6),('procurador','81dc9bdb52d04dc20036dbd8313ed055',5),('recepcion','81dc9bdb52d04dc20036dbd8313ed055',1),('recepcion2','81dc9bdb52d04dc20036dbd8313ed055',1),('recepcion3','81dc9bdb52d04dc20036dbd8313ed055',1),('recepcion4','81dc9bdb52d04dc20036dbd8313ed055',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflow`
--

DROP TABLE IF EXISTS `workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflow` (
  `id_workflow` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_workflow`),
  KEY `id_tipo` (`id_categoria`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflow`
--

LOCK TABLES `workflow` WRITE;
/*!40000 ALTER TABLE `workflow` DISABLE KEYS */;
INSERT INTO `workflow` VALUES (0,'Elaboración de Documento de Liberación de Créditos Habitacionales','Elaboración de Documento de Liberación de Créditos Habitacionales',0),(1,'Revisión de Decretos del Ejecutivo Regional','Revisión de Decretos del Ejecutivo Regional',0),(2,'Procedimiento Judicial de Expropiación','Procedimiento Judicial de Expropiación',0),(3,'Dictamen u Opinión Jurídica','Dictamen u Opinión Jurídica',0),(4,'Reposo del Personal','Reposo del Personal',1);
/*!40000 ALTER TABLE `workflow` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-27 23:43:54
