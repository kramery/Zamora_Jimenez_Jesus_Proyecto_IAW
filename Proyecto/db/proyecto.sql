-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `aves`
--

DROP TABLE IF EXISTS `aves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aves` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aves`
--

LOCK TABLES `aves` WRITE;
/*!40000 ALTER TABLE `aves` DISABLE KEYS */;
INSERT INTO `aves` VALUES (1,'Bowie','verde','amazonas','jsus366_2015-11-03_12-48-47.jpg',NULL),(69,'iunjokm','unojkml','unokm','../img/7 recomendaciones para potenciar tu bl','f fdfv');
/*!40000 ALTER TABLE `aves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avistar`
--

DROP TABLE IF EXISTS `avistar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avistar` (
  `fecha` date DEFAULT NULL,
  `usuarios_dni` int(11) DEFAULT NULL,
  `sitio` varchar(45) DEFAULT NULL,
  `aves_codigo` int(11) NOT NULL,
  KEY `fk_avistar_usuarios_idx` (`usuarios_dni`),
  KEY `fk_avistar_aves1_idx` (`aves_codigo`),
  CONSTRAINT `fk_avistar_aves` FOREIGN KEY (`aves_codigo`) REFERENCES `aves` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_avistar_usuarios` FOREIGN KEY (`usuarios_dni`) REFERENCES `usuarios` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avistar`
--

LOCK TABLES `avistar` WRITE;
/*!40000 ALTER TABLE `avistar` DISABLE KEYS */;
INSERT INTO `avistar` VALUES ('2017-01-19',1,'parque de maria luisa',1);
/*!40000 ALTER TABLE `avistar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `cod_pais` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_pais`),
  UNIQUE KEY `cod_pais_UNIQUE` (`cod_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_encuentra`
--

DROP TABLE IF EXISTS `se_encuentra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_encuentra` (
  `pais_cod_pais` int(11) NOT NULL,
  `aves_codigo` int(11) NOT NULL,
  KEY `fk_se_encuentra_pais1_idx` (`pais_cod_pais`),
  KEY `fk_se_encuentra_aves1_idx` (`aves_codigo`),
  CONSTRAINT `fk_se_encuentra_aves1` FOREIGN KEY (`aves_codigo`) REFERENCES `aves` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_se_encuentra_pais1` FOREIGN KEY (`pais_cod_pais`) REFERENCES `pais` (`cod_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_encuentra`
--

LOCK TABLES `se_encuentra` WRITE;
/*!40000 ALTER TABLE `se_encuentra` DISABLE KEYS */;
/*!40000 ALTER TABLE `se_encuentra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pass` varchar(45) NOT NULL,
  `rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dni`),
  UNIQUE KEY `dni_UNIQUE` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jesus','Zamora','España','Sevilla','jsus365@gmail.com','prueba','Administrador'),(3,'Pepa','Pig','Francia','Lyon','pepa@pepa.com','pepa','usuario'),(4,'Pedro','vargas','espaÃ±a','salamanca','pedro@pedro.com','pedro','usuario'),(5,'juan','Jimenez-Castellanos','EspaÃ±a','Sevilla','juanjccarmona@gmail.com','contrasenajuan','usuario'),(52,'admin','admin','admin','admin','admin@admin','admin','administrador'),(68,'user','user','user','user','user@user.com','user','usuario'),(98,'holi','holi','holi','holi','holi@holi.com','holi',''),(645,'64513','6845312','6845132','645132','654132@gmai.com','sccsdc','Administrador'),(789,'iojklm','iojkml','ijkml','ijkm','ikm@dg.com','sdccsdc',''),(867,'admin1','admin1','admin1','admin1','admin1@admin1.cm','admin1',''),(5645,'pedro','pedro','pedro','pedro','pedro@pedro.com','pedro','Usuario'),(6333,'juan','juan','juan','juan','juan@juan.com','juan',''),(7565,'hola1','hola1','hola1','hola1','hola1@hola1.com','hola1',''),(7867,'ikui','uikui','kuikui','kuikuk','uik@yhty.com','hola',''),(8877,'mercedes','gonzalez','espana','sevilla','mervisco@gmail.com','mercedes','Usuario'),(42410,'irene','csdc','dcsdc','sdcsc','irene@irene.com','irene','Administrador'),(54657,'hola','h','h','h','hh@s.com','h',''),(63333,'juan','juan','juan','juan','juan@juan.com','',''),(68532,'pojiln','ojk','ojÃ±k','`kokmÃ±','`kpml@scsc.com','sdsdc','Administrador'),(75645,'hola','hola','hola','hola','hola@hola.com','hola',''),(98765,'jhg','hgf','hgfj','hgf','adhgf@gomail.com','gh',''),(651654,'Jaime','zamora','espaa','sevilla','admin@gmail.com','Candela*65','usuario'),(864531,'bhknlm','kjnlkm ,','hk jml','h kjml,','h@dfvdfv.com','sdcsdc','Administrador');
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

-- Dump completed on 2017-01-29 19:36:48
