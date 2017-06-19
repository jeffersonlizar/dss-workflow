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
  `id_categoria` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Unidad de asuntos legales'),(2,'Unidad de talento humano');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_workflow` bigint(20) unsigned NOT NULL,
  `inicial` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `id_tipo` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `id_estado` (`id_estado`),
  KEY `id_workflow` (`id_workflow`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_workflow`) REFERENCES `workflow` (`id_workflow`),
  CONSTRAINT `estado_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',1,1,0,2),(2,'Solicitud rechazada','Solicitud rechazada',1,0,1,2),(3,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',1,0,0,3),(4,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',1,0,0,4),(5,'Solicitud en revisión','Solicitud en revisión',1,0,0,4),(6,'Elaboración del documento de liberación','Elaboración del documento de liberación',1,0,0,4),(7,'Remitido a jefe de unidad de asuntos legales','Remitido a jefe de unidad de asuntos legales',1,0,0,3),(8,'Recepción del documento - Jefe de asuntos legales','Recepción del documento - Jefe de asuntos legales',1,0,0,3),(9,'Documento en revisión - Jefe de asuntos legales','Documento en revisión - Jefe de asuntos legales',1,0,0,3),(10,'Remitido a la coordinación general','Remitido a la coordinación general',1,0,0,5),(11,'Recibido por la coordinación general','Recibido por la coordinación general',1,0,0,5),(12,'Remitido al despacho','Remitido al despacho',1,0,0,6),(13,'Recibido por el procurador general','Recibido por el procurador general',1,0,0,6),(14,'Documento en revisión - Procurador General','Documento en revisión - Procurador General',1,0,0,6),(15,'Firma Documento de Liberación y Oficio de Remisión','Firma Documento de Liberación y Oficio de Remisión',1,0,1,6),(16,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',2,1,0,2),(17,'Solicitud rechazada','Solicitud rechazada',2,0,1,2),(18,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',2,0,0,3),(19,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',2,0,0,4),(20,'Solicitud en revisión','Solicitud en revisión',2,0,0,4),(21,'Remitido a jefe de unidad de asuntos legales','Remitido a jefe de unidad de asuntos legales',2,0,0,3),(22,'Recepción del documento - Jefe de asuntos legales','Recepción del documento - Jefe de asuntos legales',2,0,0,3),(23,'Documento en revisión - Jefe de asuntos legales','Documento en revisión - Jefe de asuntos legales',2,0,0,3),(24,'Remitido a la coordinación general','Remitido a la coordinación general',2,0,0,5),(25,'Recibido por la coordinación general','Recibido por la coordinación general',2,0,0,5),(26,'Remitido al despacho','Remitido al despacho',2,0,0,6),(27,'Recibido por el procurador general','Recibido por el procurador general',2,0,0,6),(28,'Documento en revisión - Procurador General','Documento en revisión - Procurador General',2,0,0,6),(29,'Remitido a ejecutivo regional','Remitido a ejecutivo regional',2,0,1,6),(30,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',3,1,0,2),(31,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',3,0,0,3),(32,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',3,0,0,4),(33,'Apertura Expediente de expropiación','Apertura Expediente de expropiación',3,0,0,4),(34,'Conforme a leyes','Conforme a leyes',3,0,0,4),(35,'Arreglo amistoso de expopiación','Arreglo amistoso de expopiación',3,0,0,4),(36,'Tramites para la adquisición del inmueble ante el registro inmobiliario','Tramites para la adquisición del inmueble ante el registro inmobiliario',3,0,0,4),(37,'Via judicial','Via judicial',3,0,0,4),(38,'Actuaciones judiciales ante el tribunal competente','Actuaciones judiciales ante el tribunal competente',3,0,0,4),(39,'En espera de decisión de tribunal','En espera de decisión de tribunal',3,0,0,4),(40,'Remitido al procurador general','Remitido al procurador general',3,0,0,6),(41,'Recibido por el procurador general','Recibido por el procurador general',3,0,1,6),(42,'Recepción de la solicitud - Recepción','Recepción de la solicitud - Recepción',4,1,0,2),(43,'Solicitud rechazada','Solicitud rechazada',4,0,1,2),(44,'Remitido a unidad de asuntos legales','Remitido a unidad de asuntos legales',4,0,0,3),(45,'Recepción de la solicitud - Unidad de asuntos legales','Recepción de la solicitud - Unidad de asuntos legales',4,0,0,4),(46,'Revisión de requisitos de ley','Revisión de requisitos de ley',4,0,0,4),(47,'Elaboración proyecto de decreto','Elaboración proyecto de decreto',4,0,0,4),(48,'Remitido a jefe de unidad de asuntos legales','Remitido a jefe de unidad de asuntos legales',4,0,0,3),(49,'Recepción de dictamen u opinión jurÃ­dica','Recepción de dictamen u opinión jurÃ­dica',4,0,0,3),(50,'Revisión de dictamen u opinión jurÃ­dica','Revisión de dictamen u opinión jurÃ­dica',4,0,0,3),(51,'Remitido a la coordinación general','Remitido a la coordinación general',4,0,0,5),(52,'Recibido por la coordinación general','Recibido por la coordinación general',4,0,0,5),(53,'Remitido al despacho','Remitido al despacho',4,0,0,6),(54,'Recibido por el procurador general','Recibido por el procurador general',4,0,0,6),(55,'En revisión','En revisión',4,0,0,6),(56,'Remitido a ejecutivo regional','Remitido a ejecutivo regional',4,0,1,6),(57,'Recepción del documento','Recepción del documento',5,1,0,7),(58,'Revisión de documento dentro de normativa','Revisión de documento dentro de normativa',5,0,0,7),(59,'No cumple con normativa','No cumple con normativa',5,0,1,7),(60,'Registro en archivo digital','Registro en archivo digital',5,0,0,7),(61,'Remitido a asistente de talento humano','Remitido a asistente de talento humano',5,0,0,8),(62,'Foliado y Sellado','Foliado y Sellado',5,0,0,8),(63,'Expediente archivado','Expediente archivado',5,0,0,8),(64,'Informe de estatus a jefe de talento humano','Informe de estatus a jefe de talento humano',5,0,0,7),(65,'Recepción de estatus a jefe de talento humano','Recepción de estatus a jefe de talento humano',5,0,0,7),(66,'Informe de estatus a procurador general','Informe de estatus a procurador general',5,0,0,6),(67,'Recepción de estatus a procurador general','Recepción de estatus a procurador general',5,0,1,6);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instancia`
--

DROP TABLE IF EXISTS `instancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancia` (
  `id_instancia` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_workflow` bigint(20) unsigned NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `satisfactoria` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime DEFAULT NULL,
  PRIMARY KEY (`id_instancia`),
  UNIQUE KEY `id_instancia` (`id_instancia`),
  KEY `id_workflow` (`id_workflow`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `instancia_ibfk_1` FOREIGN KEY (`id_workflow`) REFERENCES `workflow` (`id_workflow`),
  CONSTRAINT `instancia_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancia`
--

LOCK TABLES `instancia` WRITE;
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */;
INSERT INTO `instancia` VALUES (2,1,'recepcion','Liberación de crédito #4565','Credito habitacional',0,'2017-06-08 00:50:16','2017-06-08 01:08:19'),(3,1,'recepcion4','Liberación de crédito #4589','Solicitado por: Pedro Jimenez',1,'2017-05-02 13:12:35','2017-05-08 18:39:52'),(4,4,'recepcion4','Dictamen #00456','Solicitado por: Nicole Medina',0,'2017-05-04 09:15:14','2017-05-11 09:15:49'),(5,4,'recepcion','Opinión #502245','Solicitado por: Kerly Cruz',1,'2017-05-04 14:35:40','2017-05-18 21:57:05'),(6,5,'jefe_uth','Reposo de personal #3102','Solicitado por: Luis Salazar',0,'2017-05-03 10:52:11','2017-05-19 23:50:41'),(7,1,'recepcion2','Liberación de crédito #4851','Solicitado por: Antonio Quijada',1,'2017-05-02 16:14:40','2017-05-19 22:00:42'),(8,2,'recepcion3','Decreto oficial #0025','Solicitado por: Jennifer Campos',1,'2017-05-03 23:07:55','2017-05-19 23:59:54'),(9,5,'jefe_uth','Reposo de personal #3109','Solicitado por: Josue Herrero',0,'2017-05-01 14:10:45','2017-05-19 23:54:37'),(10,5,'jefe_uth','Reposo de personal #3152','Solicitado por: Juan Rivera',1,'2017-05-05 23:46:11','2017-05-19 22:41:26'),(11,4,'abogado4','Opinión #592245','Solicitado por: Alvaro Sanchez',0,'2017-05-05 20:51:24','2017-05-19 21:07:15'),(12,1,'recepcion4','Liberación de crédito #5012','Solicitado por: María  Pérez',1,'2017-05-01 20:50:20','2017-05-19 22:49:17'),(13,1,'abogado4','Liberación de crédito #5107','Solicitado por: Adrian Reyes',0,'2017-05-01 17:23:59','2017-05-19 23:13:26'),(14,3,'recepcion','Expropiación #100456','Solicitado por: Jose Ortiz ',1,'2017-05-02 14:53:08','2017-05-19 23:32:46'),(15,2,'abogado4','Decreto oficial #0053','Solicitado por: Sara Leon',1,'2017-05-02 18:05:49','2017-05-19 23:56:57'),(16,5,'jefe_uth','Reposo de personal #3184','Solicitado por: María  Pérez',0,'2017-05-05 10:21:28','2017-05-19 23:59:58'),(17,2,'recepcion4','Decreto oficial #0055','Solicitado por: Antonio Arias',0,'2017-05-03 03:17:39','2017-05-19 23:23:43'),(18,3,'recepcion2','Expropiación #100459','Solicitado por: Pedro Soto',1,'2017-05-01 13:46:58','2017-05-19 23:55:23'),(19,5,'jefe_uth','Reposo de personal #3199','Solicitado por: Carolina Torres',1,'2017-05-05 15:41:48','2017-05-19 23:49:06'),(20,3,'abogado4','Expropiación #150712','Solicitado por: Javier Rodriguez',1,'2017-05-03 07:56:24','2017-05-19 23:54:23'),(21,2,'recepcion','Decreto oficial #0091','Solicitado por: Josue Herrero',0,'2017-05-05 04:57:06','2017-05-12 21:57:41'),(22,5,'jefe_uth','Reposo de personal #3205','Solicitado por: Andrea Ramos',1,'2017-05-04 01:24:31','2017-05-07 00:30:49'),(23,1,'abogado4','Liberación de crédito #5226','Solicitado por: Carolina Torres',0,'2017-05-04 20:48:57','2017-05-11 04:53:47'),(24,5,'jefe_uth','Reposo de personal #3210','Solicitado por: Sara Leon',0,'2017-05-04 18:45:24','2017-06-01 14:34:52'),(25,5,'jefe_uth','Reposo de personal #3219','Solicitado por: Daniela Rojas',0,'2017-05-04 09:50:06','2017-05-13 15:05:14'),(26,1,'recepcion4','Liberación de crédito #5255','Solicitado por: Nicole Navarro',0,'2017-05-05 07:13:50','2017-06-01 03:07:19'),(27,2,'recepcion2','Decreto oficial #0120','Solicitado por: Juan Rivera',0,'2017-05-01 16:04:08','2017-06-07 17:51:55'),(28,1,'recepcion3','Liberación de crédito #5300','Solicitado por: Andrea Ramos',1,'2017-05-01 20:17:11','2017-05-04 01:35:01'),(29,1,'recepcion3','Liberación de crédito #5313','Solicitado por: Diana Díaz',0,'2017-05-03 17:30:26','2017-05-09 20:38:51'),(30,2,'recepcion3','Decreto oficial #0151','Solicitado por: Luis Salazar',1,'2017-05-02 17:08:27','2017-05-04 07:52:58'),(31,5,'jefe_uth','Reposo de personal #3261','Solicitado por: Carolina Torres',1,'2017-05-02 05:58:20','2017-05-13 04:05:56'),(32,3,'recepcion4','Expropiación #160165','Solicitado por: Victor Gomez',0,'2017-05-05 14:18:29','2017-06-07 22:14:49'),(33,5,'jefe_uth','Reposo de personal #3277','Solicitado por: Javier Rodriguez',0,'2017-05-31 05:48:51','2017-06-12 02:37:43'),(34,5,'jefe_uth','Reposo de personal #3310','Solicitado por: Jose Ortiz ',1,'2017-05-31 03:38:25','2017-06-15 23:59:55'),(35,2,'recepcion','Decreto oficial #0203','Solicitado por: Daniel Martínez',0,'2017-06-02 04:06:41','2017-06-05 23:26:40'),(36,5,'jefe_uth','Reposo de personal #3325','Solicitado por: Adrian Gózales',1,'2017-06-03 22:32:31','2017-06-13 01:04:45'),(37,3,'recepcion2','Expropiación #160789','Solicitado por: Adrian Gózales',1,'2017-06-01 04:57:34','2017-06-15 23:54:18'),(38,5,'jefe_uth','Reposo de personal #3331','Solicitado por: Diego Vargas',1,'2017-06-03 03:07:44','2017-06-16 00:00:00'),(39,5,'jefe_uth','Reposo de personal #3345','Solicitado por: Nicole Medina',1,'2017-06-01 07:37:13','2017-06-03 23:37:54'),(40,5,'jefe_uth','Reposo de personal #3369','Solicitado por: Victor Gomez',0,'2017-05-31 04:04:04','2017-06-06 00:13:21'),(41,1,'abogado4','Liberación de crédito #5349','Solicitado por: Joselyn Ruiz',1,'2017-05-31 21:06:28','2017-06-15 22:59:28'),(42,5,'jefe_uth','Reposo de personal #3403','Solicitado por: Luis Salazar',1,'2017-05-30 19:13:47','2017-06-15 23:52:23');
/*!40000 ALTER TABLE `instancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instancia_usuario`
--

DROP TABLE IF EXISTS `instancia_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancia_usuario` (
  `id_instancia_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_instancia` bigint(20) unsigned NOT NULL,
  `id_estado` bigint(20) unsigned NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `realizado` int(11) NOT NULL,
  PRIMARY KEY (`id_instancia_usuario`),
  UNIQUE KEY `id_instancia_usuario` (`id_instancia_usuario`),
  KEY `id_instancia` (`id_instancia`,`id_estado`,`id_usuario`),
  KEY `id_estado` (`id_estado`),
  CONSTRAINT `instancia_usuario_ibfk_1` FOREIGN KEY (`id_instancia`) REFERENCES `instancia` (`id_instancia`),
  CONSTRAINT `instancia_usuario_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancia_usuario`
--

LOCK TABLES `instancia_usuario` WRITE;
/*!40000 ALTER TABLE `instancia_usuario` DISABLE KEYS */;
INSERT INTO `instancia_usuario` VALUES (7,2,3,'0',1),(8,2,4,'0',1),(9,2,5,'0',1),(10,2,6,'0',1),(11,2,7,'jefe_ual',1),(12,2,8,'jefe_ual',1),(13,2,9,'jefe_ual',1),(14,2,10,'0',1),(15,2,11,'0',1),(16,2,12,'0',1),(17,2,13,'0',1),(18,2,14,'0',0);
/*!40000 ALTER TABLE `instancia_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proceso`
--

DROP TABLE IF EXISTS `proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proceso` (
  `id_proceso` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(30) NOT NULL,
  `id_instancia` bigint(20) unsigned NOT NULL,
  `id_transicion` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `problema_estado` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_proceso`),
  UNIQUE KEY `id_proceso` (`id_proceso`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_instancia` (`id_instancia`),
  KEY `id_transicion` (`id_transicion`),
  CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `proceso_ibfk_2` FOREIGN KEY (`id_instancia`) REFERENCES `instancia` (`id_instancia`),
  CONSTRAINT `proceso_ibfk_3` FOREIGN KEY (`id_transicion`) REFERENCES `transiciones` (`id_transicion`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso`
--

LOCK TABLES `proceso` WRITE;
/*!40000 ALTER TABLE `proceso` DISABLE KEYS */;
INSERT INTO `proceso` VALUES (2,'recepcion',2,1,'Documento recibido',0,'2017-06-08 00:59:22'),(3,'jefe_ual',2,3,'recibido conforme',1,'2017-06-08 01:00:26'),(4,'abogado2',2,4,'revisando solicitud',1,'2017-06-08 01:01:45'),(5,'abogado2',2,6,'todo en orden',0,'2017-06-08 01:02:36'),(6,'abogado3',2,7,'remitido documento',0,'2017-06-08 01:04:28'),(7,'jefe_ual',2,8,'recibido conforme',0,'2017-06-08 01:05:16'),(8,'jefe_ual',2,9,'revisando documento',0,'2017-06-08 01:05:33'),(9,'jefe_ual',2,11,'sin correcciones',0,'2017-06-08 01:05:52'),(10,'coordinador',2,12,'recibido ',0,'2017-06-08 01:06:24'),(11,'coordinador',2,13,'remitido a despacho',0,'2017-06-08 01:06:39'),(12,'procurador',2,14,'recibido',0,'2017-06-08 01:07:42'),(13,'procurador',2,15,'revisando documento',0,'2017-06-08 01:07:59'),(14,'procurador',2,17,'sin correcciones!',0,'2017-06-08 01:08:19'),(15,'abogado4',3,2,'',0,'2017-05-08 18:39:52'),(16,'recepcion',4,47,'',1,'2017-05-11 09:15:49'),(17,'recepcion2',5,46,'',1,'2017-05-10 02:03:28'),(18,'recepcion3',5,46,'',1,'2017-05-12 06:01:19'),(19,'recepcion4',5,47,'',1,'2017-05-18 21:57:05'),(20,'jefe_uth',6,61,'',1,'2017-05-09 07:40:05'),(21,'jefe_uth',6,63,'',0,'2017-05-15 09:34:21'),(22,'jefe_uth',6,64,'',1,'2017-05-16 06:39:22'),(23,'asistente_uth',6,65,'',0,'2017-05-16 12:40:05'),(24,'asistente_uth',6,66,'',1,'2017-05-18 23:46:27'),(25,'asistente_uth',6,67,'',1,'2017-05-19 20:09:32'),(26,'jefe_uth',6,68,'',0,'2017-05-19 21:47:45'),(27,'jefe_uth',6,69,'',0,'2017-05-19 23:34:19'),(28,'procurador',6,70,'',0,'2017-05-19 23:50:41'),(29,'recepcion',7,1,'',1,'2017-05-03 02:52:06'),(30,'recepcion3',8,18,'',0,'2017-05-07 17:19:26'),(31,'jefe_ual',7,3,'',0,'2017-05-07 04:13:56'),(32,'jefe_ual',8,20,'',1,'2017-05-09 00:45:37'),(33,'abogado',7,4,'',1,'2017-05-08 06:38:10'),(34,'abogado2',8,21,'',0,'2017-05-15 16:14:39'),(35,'abogado3',7,6,'',1,'2017-05-10 10:53:22'),(36,'abogado6',8,23,'',1,'2017-05-18 03:43:03'),(37,'abogado5',7,7,'',0,'2017-05-16 07:37:01'),(38,'jefe_ual',8,24,'',1,'2017-05-18 13:24:31'),(39,'jefe_ual',7,8,'',1,'2017-05-18 21:47:08'),(40,'jefe_ual',8,25,'',0,'2017-05-19 01:52:32'),(41,'jefe_ual',7,9,'',1,'2017-05-19 08:00:04'),(42,'jefe_ual',8,26,'',0,'2017-05-19 09:33:48'),(43,'recepcion4',8,18,'',1,'2017-05-19 23:56:48'),(44,'jefe_ual',7,11,'',0,'2017-05-19 12:36:20'),(45,'jefe_ual',8,20,'',1,'2017-05-19 23:58:50'),(46,'coordinador',7,12,'',0,'2017-05-19 14:07:20'),(47,'abogado6',8,21,'',1,'2017-05-19 23:59:13'),(48,'coordinador',7,13,'',1,'2017-05-19 17:12:07'),(49,'procurador',7,14,'',0,'2017-05-19 17:46:54'),(50,'abogado3',8,22,'',1,'2017-05-19 23:59:53'),(51,'procurador',7,15,'',1,'2017-05-19 21:55:11'),(52,'recepcion2',8,19,'',0,'2017-05-19 23:59:54'),(53,'procurador',7,17,'',1,'2017-05-19 22:00:42'),(54,'jefe_uth',9,61,'',0,'2017-05-05 01:46:42'),(55,'jefe_uth',10,61,'',0,'2017-05-08 07:54:25'),(56,'jefe_uth',9,63,'',0,'2017-05-09 18:09:43'),(57,'jefe_uth',10,63,'',1,'2017-05-14 15:40:46'),(58,'jefe_uth',9,64,'',0,'2017-05-10 00:21:51'),(59,'jefe_uth',10,64,'',0,'2017-05-17 16:48:06'),(60,'asistente_uth',9,65,'',0,'2017-05-13 16:02:44'),(61,'asistente_uth',10,65,'',0,'2017-05-18 17:39:01'),(62,'asistente_uth',9,66,'',1,'2017-05-18 20:22:10'),(63,'asistente_uth',10,66,'',1,'2017-05-19 06:12:24'),(64,'asistente_uth',9,67,'',0,'2017-05-19 18:36:08'),(65,'asistente_uth',10,67,'',0,'2017-05-19 13:46:41'),(66,'jefe_uth',9,68,'',0,'2017-05-19 23:28:13'),(67,'jefe_uth',10,68,'',0,'2017-05-19 14:15:15'),(68,'jefe_uth',9,69,'',0,'2017-05-19 23:50:17'),(69,'jefe_uth',10,69,'',1,'2017-05-19 21:06:20'),(70,'procurador',9,70,'',0,'2017-05-19 23:54:37'),(71,'procurador',10,70,'',0,'2017-05-19 22:41:26'),(72,'recepcion4',11,46,'',0,'2017-05-10 15:30:26'),(73,'recepcion4',12,1,'',1,'2017-05-07 17:39:11'),(74,'recepcion',11,46,'',1,'2017-05-14 17:44:48'),(75,'jefe_ual',12,3,'',1,'2017-05-09 18:23:15'),(76,'recepcion',11,46,'',0,'2017-05-19 00:11:51'),(77,'abogado2',12,4,'',0,'2017-05-12 12:54:47'),(78,'recepcion',11,46,'',1,'2017-05-19 04:16:07'),(79,'abogado2',12,5,'',0,'2017-05-18 20:14:28'),(80,'recepcion2',11,46,'',0,'2017-05-19 20:27:20'),(81,'recepcion',12,2,'',0,'2017-05-19 22:49:17'),(82,'recepcion',11,47,'',1,'2017-05-19 21:07:15'),(83,'recepcion2',13,1,'',1,'2017-05-07 23:02:41'),(84,'recepcion2',14,34,'',0,'2017-05-05 07:30:02'),(85,'jefe_ual',13,3,'',0,'2017-05-12 03:12:23'),(86,'jefe_ual',14,35,'',1,'2017-05-07 18:34:18'),(87,'abogado5',13,4,'',1,'2017-05-13 16:01:46'),(88,'abogado6',14,36,'',1,'2017-05-08 20:49:21'),(89,'abogado3',13,5,'',0,'2017-05-17 16:38:47'),(90,'abogado5',14,37,'',1,'2017-05-14 09:41:03'),(91,'recepcion2',13,1,'',0,'2017-05-18 20:39:11'),(92,'abogado3',14,38,'',1,'2017-05-19 21:24:52'),(93,'jefe_ual',13,3,'',0,'2017-05-19 01:26:08'),(94,'abogado5',14,40,'',0,'2017-05-19 22:33:43'),(95,'abogado2',13,4,'',1,'2017-05-19 17:20:11'),(96,'abogado',14,42,'',1,'2017-05-19 22:54:26'),(97,'abogado',14,43,'',1,'2017-05-19 23:11:41'),(98,'abogado',13,5,'',0,'2017-05-19 19:05:25'),(99,'abogado5',14,44,'',1,'2017-05-19 23:14:23'),(100,'abogado4',13,2,'',0,'2017-05-19 23:13:26'),(101,'procurador',14,45,'',1,'2017-05-19 23:32:46'),(102,'recepcion3',15,18,'',0,'2017-05-04 08:51:23'),(103,'jefe_uth',16,61,'',0,'2017-05-11 19:45:06'),(104,'jefe_ual',15,20,'',0,'2017-05-10 19:14:13'),(105,'jefe_uth',16,63,'',1,'2017-05-18 16:46:21'),(106,'abogado3',15,21,'',0,'2017-05-15 04:23:57'),(107,'jefe_uth',16,64,'',1,'2017-05-19 07:16:30'),(108,'abogado6',15,23,'',0,'2017-05-18 17:45:22'),(109,'asistente_uth',16,65,'',1,'2017-05-19 18:18:54'),(110,'jefe_ual',15,24,'',1,'2017-05-19 06:55:50'),(111,'jefe_ual',15,25,'',1,'2017-05-19 13:03:57'),(112,'asistente_uth',16,66,'',0,'2017-05-19 21:53:10'),(113,'jefe_ual',15,27,'',0,'2017-05-19 16:11:40'),(114,'asistente_uth',16,67,'',0,'2017-05-19 23:37:40'),(115,'coordinador',15,28,'',0,'2017-05-19 17:02:21'),(116,'jefe_uth',16,68,'',0,'2017-05-19 23:54:58'),(117,'coordinador',15,29,'',1,'2017-05-19 23:05:31'),(118,'jefe_uth',16,69,'',1,'2017-05-19 23:59:28'),(119,'procurador',15,30,'',0,'2017-05-19 23:30:35'),(120,'procurador',16,70,'',1,'2017-05-19 23:59:58'),(121,'procurador',15,31,'',1,'2017-05-19 23:53:46'),(122,'abogado4',17,18,'',0,'2017-05-09 22:10:41'),(123,'procurador',15,33,'',1,'2017-05-19 23:56:57'),(124,'recepcion3',18,34,'',1,'2017-05-03 18:07:46'),(125,'jefe_ual',17,20,'',1,'2017-05-13 14:56:06'),(126,'jefe_ual',18,35,'',1,'2017-05-10 19:37:49'),(127,'abogado2',17,21,'',1,'2017-05-18 06:47:50'),(128,'abogado6',18,36,'',0,'2017-05-12 19:59:13'),(129,'abogado',17,22,'',1,'2017-05-19 14:53:34'),(130,'abogado',18,37,'',1,'2017-05-19 22:32:53'),(131,'recepcion2',17,18,'',0,'2017-05-19 22:14:14'),(132,'abogado3',18,38,'',0,'2017-05-19 22:56:09'),(133,'jefe_ual',17,20,'',1,'2017-05-19 22:46:54'),(134,'abogado3',18,39,'',1,'2017-05-19 23:15:13'),(135,'abogado6',17,21,'',1,'2017-05-19 22:52:31'),(136,'abogado5',18,41,'',0,'2017-05-19 23:27:30'),(137,'abogado2',17,22,'',1,'2017-05-19 22:56:25'),(138,'abogado3',18,43,'',0,'2017-05-19 23:39:26'),(139,'abogado4',17,19,'',1,'2017-05-19 23:23:43'),(140,'abogado2',18,44,'',0,'2017-05-19 23:54:36'),(141,'jefe_uth',19,61,'',0,'2017-05-11 10:09:13'),(142,'jefe_uth',19,63,'',1,'2017-05-11 18:00:36'),(143,'procurador',18,45,'',0,'2017-05-19 23:55:23'),(144,'jefe_uth',19,64,'',1,'2017-05-18 08:39:10'),(145,'asistente_uth',19,65,'',0,'2017-05-19 12:08:49'),(146,'asistente_uth',19,66,'',0,'2017-05-19 22:15:32'),(147,'asistente_uth',19,67,'',0,'2017-05-19 23:13:15'),(148,'jefe_uth',19,68,'',0,'2017-05-19 23:39:49'),(149,'jefe_uth',19,69,'',1,'2017-05-19 23:45:26'),(150,'procurador',19,70,'',1,'2017-05-19 23:49:06'),(151,'abogado4',20,34,'',0,'2017-05-06 11:03:55'),(152,'jefe_ual',20,35,'',1,'2017-05-07 23:43:02'),(153,'abogado2',20,36,'',1,'2017-05-14 08:53:06'),(154,'abogado5',20,37,'',1,'2017-05-19 03:25:38'),(155,'abogado2',20,38,'',1,'2017-05-19 19:41:30'),(156,'abogado5',20,39,'',0,'2017-05-19 21:24:40'),(157,'abogado3',20,41,'',0,'2017-05-19 22:38:55'),(158,'abogado',20,43,'',1,'2017-05-19 23:48:21'),(159,'abogado2',20,44,'',0,'2017-05-19 23:53:24'),(160,'procurador',20,45,'',0,'2017-05-19 23:54:23'),(161,'recepcion',21,19,'',1,'2017-05-12 21:57:41'),(162,'jefe_uth',22,61,'',1,'2017-05-06 13:26:18'),(163,'jefe_uth',22,62,'',0,'2017-05-07 00:30:49'),(164,'recepcion2',23,2,'',0,'2017-05-11 04:53:47'),(165,'jefe_uth',24,61,'',1,'2017-05-11 18:18:13'),(166,'jefe_uth',24,63,'',0,'2017-05-13 01:28:51'),(167,'jefe_uth',24,64,'',1,'2017-05-20 15:18:56'),(168,'asistente_uth',24,65,'',0,'2017-05-21 09:05:54'),(169,'asistente_uth',24,66,'',0,'2017-05-24 23:42:18'),(170,'asistente_uth',24,67,'',0,'2017-05-27 06:52:49'),(171,'jefe_uth',24,68,'',0,'2017-05-27 18:49:29'),(172,'jefe_uth',24,69,'',0,'2017-05-30 16:25:15'),(173,'procurador',24,70,'',1,'2017-06-01 14:34:52'),(174,'jefe_uth',25,61,'',1,'2017-05-12 05:23:02'),(175,'jefe_uth',25,62,'',0,'2017-05-13 15:05:14'),(176,'recepcion',26,1,'',1,'2017-05-10 00:29:18'),(177,'jefe_ual',26,3,'',0,'2017-05-17 00:15:22'),(178,'abogado3',26,4,'',1,'2017-05-24 13:04:17'),(179,'abogado',26,5,'',1,'2017-05-25 14:30:16'),(180,'recepcion2',26,2,'',1,'2017-06-01 03:07:19'),(181,'recepcion',27,18,'',0,'2017-05-05 06:32:45'),(182,'jefe_ual',27,20,'',1,'2017-05-07 21:41:23'),(183,'abogado5',27,21,'',0,'2017-05-12 02:52:03'),(184,'abogado3',27,23,'',1,'2017-05-13 11:38:12'),(185,'jefe_ual',27,24,'',1,'2017-05-14 05:21:33'),(186,'jefe_ual',27,25,'',1,'2017-05-15 08:07:39'),(187,'jefe_ual',27,27,'',0,'2017-05-18 19:33:00'),(188,'coordinador',27,28,'',0,'2017-05-24 05:16:08'),(189,'coordinador',27,29,'',1,'2017-05-26 06:21:01'),(190,'procurador',27,30,'',1,'2017-06-02 14:58:13'),(191,'procurador',27,31,'',0,'2017-06-03 04:33:40'),(192,'procurador',27,32,'',0,'2017-06-07 10:19:05'),(193,'recepcion3',27,19,'',0,'2017-06-07 17:51:55'),(194,'recepcion4',28,2,'',0,'2017-05-04 01:35:01'),(195,'abogado4',29,2,'',1,'2017-05-09 20:38:51'),(196,'recepcion',30,19,'',0,'2017-05-04 07:52:58'),(197,'jefe_uth',31,61,'',0,'2017-05-08 00:37:38'),(198,'jefe_uth',31,62,'',0,'2017-05-13 04:05:56'),(199,'recepcion2',32,34,'',1,'2017-05-12 05:03:35'),(200,'jefe_ual',32,35,'',1,'2017-05-19 14:10:13'),(201,'abogado6',32,36,'',0,'2017-05-21 18:28:54'),(202,'abogado5',32,37,'',0,'2017-05-27 07:30:37'),(203,'abogado5',32,38,'',1,'2017-05-27 16:12:30'),(204,'abogado',32,40,'',1,'2017-05-29 04:47:53'),(205,'abogado3',32,42,'',1,'2017-05-31 16:52:40'),(206,'abogado5',32,43,'',0,'2017-06-02 04:43:29'),(207,'abogado',32,44,'',0,'2017-06-07 13:03:38'),(208,'procurador',32,45,'',0,'2017-06-07 22:14:49'),(209,'jefe_uth',33,61,'',0,'2017-06-07 08:00:42'),(210,'jefe_uth',33,62,'',0,'2017-06-12 02:37:43'),(211,'jefe_uth',34,61,'',0,'2017-06-07 08:50:31'),(212,'jefe_uth',34,63,'',1,'2017-06-11 04:06:03'),(213,'jefe_uth',34,64,'',1,'2017-06-15 21:40:42'),(214,'asistente_uth',34,65,'',0,'2017-06-15 23:04:03'),(215,'asistente_uth',34,66,'',1,'2017-06-15 23:52:38'),(216,'asistente_uth',34,67,'',1,'2017-06-15 23:56:54'),(217,'jefe_uth',34,68,'',0,'2017-06-15 23:59:03'),(218,'jefe_uth',34,69,'',1,'2017-06-15 23:59:10'),(219,'procurador',34,70,'',0,'2017-06-15 23:59:55'),(220,'recepcion',35,19,'',1,'2017-06-05 23:26:40'),(221,'jefe_uth',36,61,'',0,'2017-06-05 07:41:37'),(222,'jefe_uth',36,62,'',1,'2017-06-13 01:04:45'),(223,'abogado4',37,34,'',0,'2017-06-02 06:21:45'),(224,'jefe_ual',37,35,'',1,'2017-06-03 03:53:59'),(225,'abogado',37,36,'',1,'2017-06-07 22:02:20'),(226,'abogado5',37,37,'',1,'2017-06-11 22:22:36'),(227,'abogado2',37,38,'',1,'2017-06-14 21:23:45'),(228,'abogado',37,39,'',1,'2017-06-15 14:19:35'),(229,'abogado3',37,41,'',0,'2017-06-15 22:40:21'),(230,'abogado2',37,43,'',0,'2017-06-15 23:23:51'),(231,'abogado2',37,44,'',1,'2017-06-15 23:44:08'),(232,'procurador',37,45,'',0,'2017-06-15 23:54:18'),(233,'jefe_uth',38,61,'',1,'2017-06-10 00:27:52'),(234,'jefe_uth',38,63,'',1,'2017-06-12 17:26:45'),(235,'jefe_uth',38,64,'',1,'2017-06-14 18:32:22'),(236,'asistente_uth',38,65,'',1,'2017-06-15 20:41:47'),(237,'asistente_uth',38,66,'',0,'2017-06-15 23:59:43'),(238,'asistente_uth',38,67,'',0,'2017-06-15 23:59:52'),(239,'jefe_uth',38,68,'',0,'2017-06-15 23:59:59'),(240,'jefe_uth',38,69,'',0,'2017-06-16 00:00:00'),(241,'procurador',38,70,'',0,'2017-06-16 00:00:00'),(242,'jefe_uth',39,61,'',1,'2017-06-02 15:37:04'),(243,'jefe_uth',39,62,'',1,'2017-06-03 23:37:54'),(244,'jefe_uth',40,61,'',1,'2017-05-31 22:22:04'),(245,'jefe_uth',40,62,'',1,'2017-06-06 00:13:21'),(246,'abogado4',41,1,'',0,'2017-06-02 20:37:50'),(247,'jefe_ual',41,3,'',0,'2017-06-09 23:59:39'),(248,'abogado',41,4,'',1,'2017-06-11 09:31:26'),(249,'abogado3',41,5,'',0,'2017-06-13 14:08:08'),(250,'recepcion',41,2,'',1,'2017-06-15 22:59:28'),(251,'jefe_uth',42,61,'',1,'2017-06-03 04:41:15'),(252,'jefe_uth',42,63,'',1,'2017-06-10 17:47:28'),(253,'jefe_uth',42,64,'',0,'2017-06-13 12:10:05'),(254,'asistente_uth',42,65,'',0,'2017-06-13 17:41:35'),(255,'asistente_uth',42,66,'',1,'2017-06-14 20:36:14'),(256,'asistente_uth',42,67,'',1,'2017-06-15 06:08:18'),(257,'jefe_uth',42,68,'',1,'2017-06-15 17:39:47'),(258,'jefe_uth',42,69,'',0,'2017-06-15 23:42:05'),(259,'procurador',42,70,'',0,'2017-06-15 23:52:23');
/*!40000 ALTER TABLE `proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Admin'),(2,'Recepción'),(3,'Jefe de unidad asuntos legales'),(4,'Abogado'),(5,'Coordinador general'),(6,'Procurador general'),(7,'Jefe de unidad de talento humano'),(8,'Asistente talento humano');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transiciones`
--

DROP TABLE IF EXISTS `transiciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transiciones` (
  `id_transicion` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado_siguiente` bigint(20) unsigned NOT NULL,
  `estado_asociado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_transicion`),
  UNIQUE KEY `id_transicion` (`id_transicion`),
  KEY `estado_siguiente` (`estado_siguiente`),
  KEY `estado_asociado` (`estado_asociado`),
  CONSTRAINT `transiciones_ibfk_1` FOREIGN KEY (`estado_siguiente`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `transiciones_ibfk_2` FOREIGN KEY (`estado_asociado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transiciones`
--

LOCK TABLES `transiciones` WRITE;
/*!40000 ALTER TABLE `transiciones` DISABLE KEYS */;
INSERT INTO `transiciones` VALUES (1,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',3,1),(2,'Solicitud rechazada','Solicitud rechazada',2,1),(3,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',4,3),(4,'Revisión de la solicitud','Revisión de la solicitud',5,4),(5,'No cumple con los requisitos','No cumple con los requisitos',1,5),(6,'Cumple con los requisitos','Cumple con los requisitos',6,5),(7,'Remitir a jefe de unidad de asuntos legales','Remitir a jefe de unidad de asuntos legales',7,6),(8,'Recibido por jefe de unidad de asuntos legales','Recibido por jefe de unidad de asuntos legales',8,7),(9,'Revisión del documento','Revisión del documento',9,8),(10,'Correcciones pendientes','Correcciones pendientes',6,9),(11,'Sin correcciones','Sin correcciones',10,9),(12,'Recibido por la coordinación','Recibido por la coordinación',11,10),(13,'Remitir al despacho','Remitir al despacho',12,11),(14,'Recibido por el procurador','Recibido por el procurador',13,12),(15,'Revisión del documento','Revisión del documento',14,13),(16,'Correcciones pendientes','Correcciones pendientes',6,14),(17,'Sin correcciones','Sin correcciones',15,14),(18,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',18,16),(19,'Solicitud rechazada','Solicitud rechazada',17,16),(20,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',19,18),(21,'Revisión de la solicitud','Revisión de la solicitud',20,19),(22,'No cumple con los requisitos','No cumple con los requisitos',16,20),(23,'Cumple con los requisitos','Cumple con los requisitos',21,20),(24,'Recibido por jefe de unidad de asuntos legales','Recibido por jefe de unidad de asuntos legales',22,21),(25,'Revisión del documento','Revisión del documento',23,22),(26,'Correcciones pendientes','Correcciones pendientes',16,23),(27,'Sin correcciones','Sin correcciones',24,23),(28,'Recibido por la coordinación','Recibido por la coordinación',25,24),(29,'Remitir al despacho','Remitir al despacho',26,25),(30,'Recibido por el procurador','Recibido por el procurador',27,26),(31,'Revisión del documento','Revisión del documento',28,27),(32,'No cumple con los requisitos','No cumple con los requisitos',16,28),(33,'Cumple con los requisitos','Cumple con los requisitos',29,28),(34,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',31,30),(35,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',32,31),(36,'Apertura de expediente','Apertura de expediente',33,32),(37,'Conforme a lo establecido en la ley','Conforme a lo establecido en la ley',34,33),(38,'Arreglo amistoso','Arreglo amistoso',35,34),(39,'Procede arreglo amistoso','Procede arreglo amistoso',36,35),(40,'No procede arreglo amistoso','No procede arreglo amistoso',37,35),(41,'Actuaciones judiciales','Actuaciones judiciales',38,36),(42,'Actuaciones judiciales','Actuaciones judiciales',38,37),(43,'Espera de decisión de tribunal','Espera de decisión de tribunal',39,38),(44,'Decisión recibida','Decisión recibida',40,39),(45,'Recibido por el procurador','Recibido por el procurador',41,40),(46,'Remitir a unidad de asuntos legales','Remitir a unidad de asuntos legales',42,42),(47,'Solicitud rechazada','Solicitud rechazada',43,42),(48,'Recibido por unidad de asuntos legales','Recibido por unidad de asuntos legales',45,44),(49,'Revisión de requisitos','Revisión de requisitos',46,45),(50,'No cumple con los requisitos','No cumple con los requisitos',42,46),(51,'Cumple con los requisitos','Cumple con los requisitos',47,46),(52,'Remitir a jefe de unidad','Remitir a jefe de unidad',48,47),(53,'Recibido dictamen u opinión jurÃ­dica','Recibido dictamen u opinión jurÃ­dica',49,48),(54,'Revisión de dictamen','Revisión de dictamen',50,49),(55,'Remitir a coordinación general','Remitir a coordinación general',51,50),(56,'Recibido por coordinación general','Recibido por coordinación general',52,51),(57,'Proceso de revisión','Proceso de revisión',53,52),(58,'Recibido por el procurador general','Recibido por el procurador general',54,53),(59,'Proceso de revisión','Proceso de revisión',55,54),(60,'Remitir a ejecutivo regional','Remitir a ejecutivo regional',56,55),(61,'Revisión del documento','Revisión del documento',58,57),(62,'No cumple con la normativa','No cumple con la normativa',59,58),(63,'Cumple con la normativa','Cumple con la normativa',60,58),(64,'Remitir a asistente','Remitir a asistente',61,60),(65,'Foliar y sellar','Foliar y sellar',62,61),(66,'Archivar expediente','Archivar expediente',63,62),(67,'Informar estatus a jefe de talento humano','Informar estatus a jefe de talento humano',64,63),(68,'Recepción de estatus jefe de talento humano','Recepción de estatus jefe de talento humano',65,64),(69,'Informar estatus a procurador general','Informar estatus a procurador general',66,65),(70,'Recepción de estatus procurador general','Recepción de estatus procurador general',67,66);
/*!40000 ALTER TABLE `transiciones` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('abogado','81dc9bdb52d04dc20036dbd8313ed055',4),('abogado2','81dc9bdb52d04dc20036dbd8313ed055',4),('abogado3','81dc9bdb52d04dc20036dbd8313ed055',4),('abogado4','81dc9bdb52d04dc20036dbd8313ed055',2),('abogado5','81dc9bdb52d04dc20036dbd8313ed055',4),('abogado6','81dc9bdb52d04dc20036dbd8313ed055',4),('admin','81dc9bdb52d04dc20036dbd8313ed055',1),('asistente_uth','81dc9bdb52d04dc20036dbd8313ed055',8),('coordinador','81dc9bdb52d04dc20036dbd8313ed055',5),('jefe_ual','81dc9bdb52d04dc20036dbd8313ed055',3),('jefe_uth','81dc9bdb52d04dc20036dbd8313ed055',7),('procurador','81dc9bdb52d04dc20036dbd8313ed055',6),('recepcion','81dc9bdb52d04dc20036dbd8313ed055',2),('recepcion2','81dc9bdb52d04dc20036dbd8313ed055',2),('recepcion3','81dc9bdb52d04dc20036dbd8313ed055',2),('recepcion4','81dc9bdb52d04dc20036dbd8313ed055',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workflow`
--

DROP TABLE IF EXISTS `workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workflow` (
  `id_workflow` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_categoria` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_workflow`),
  UNIQUE KEY `id_workflow` (`id_workflow`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `workflow_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workflow`
--

LOCK TABLES `workflow` WRITE;
/*!40000 ALTER TABLE `workflow` DISABLE KEYS */;
INSERT INTO `workflow` VALUES (1,'Elaboración de Documento de Liberación de Créditos Habitacionales','Elaboración de Documento de Liberación de Créditos Habitacionales',1),(2,'Revisión de Decretos del Ejecutivo Regional','Revisión de Decretos del Ejecutivo Regional',1),(3,'Procedimiento Judicial de Expropiación','Procedimiento Judicial de Expropiación',1),(4,'Dictamen u Opinión Jurídica','Dictamen u Opinión Jurídica',1),(5,'Reposo del Personal','Reposo del Personal',2);
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

-- Dump completed on 2017-06-19  0:22:04
