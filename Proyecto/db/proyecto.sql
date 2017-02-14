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
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aves`
--

LOCK TABLES `aves` WRITE;
/*!40000 ALTER TABLE `aves` DISABLE KEYS */;
INSERT INTO `aves` VALUES (1,'Bowie','verde','amazonas','img/cacatua.jpg',NULL),(4,'Amazona amazonica','Verde','Psittacidae','','Es una especie de ave psitaciforme de la familia Psittacidae que vive en SudamÃ©rica.\r\n\r\nSe trata de un loro mediano, que mide 33 cm de largo y pesa 340 g de promedio. Ambos sexos son similares. Su pl'),(5,'Loro yaco','Gris y rojo','Psittacus erithacus','','Es una especie de ave psitaciformes que pertenece a la familia Psittacidae. Es la Ãºnica especie del gÃ©nero monotÃ­pico Psittacus, y uno de los loros que viven en Ãfrica. Su aspecto es inconfundible'),(6,'Cacatua','Blanco y amarillo','Psitaciformes','','Son oriundas de Australia, continente muy rico en cuanto variedad de especies exÃ³ticas. En su territorio natal viven en comunidad y es fÃ¡cil avistarlas dado la abundancia de variedades que comprende'),(7,'Cotorra de kramer','Verde','Psittacula','','Debido a su potencial colonizador y por constituir una amenaza grave para las especies autÃ³ctonas, los hÃ¡bitats o los ecosistemas, esta especie ha sido incluida en el CatÃ¡logo EspaÃ±ol de Especies '),(8,'Cotorrita del sol','Amarillo, verde, rojo azul, verde y violeta.','Aratinga','','Estas aves suelen ser muy domÃ©sticas y suelen criar fÃ¡cilmente, tanto en libertad como en cautividad. La pareja suele estar unida toda la vida. Ponen entre 3 y 5 huevos, con una incubaciÃ³n de 24 dÃ'),(9,'cotorra1','verde','asxasx','','edEDEW'),(10,'er','erfe','rferfer','','sdc<sdc'),(11,'ghnf','gfgbfgb','fgbfgb','','adssd'),(12,'gallo','naranja y amarillo','gallina','','hjgh'),(13,'dfgbfgb','fgbfgb','fgbfgb','','sdfdgfh'),(14,'ar','erferf','erferf','','arefaerf'),(15,'hola','dfvdf','fvdfv','','d'),(16,'cacatuaa','sdcs','sdsdsd','img/hgcopia.jpg','dfdfvdfv'),(17,'hbjk','nhbk','nj gjh kj','img/dsfdgf.jpg','dfvdfvdfv'),(18,'gallo','gallo','gallo','img/dsfdgf.jpg','gallo');
/*!40000 ALTER TABLE `aves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avistar`
--

DROP TABLE IF EXISTS `avistar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avistar` (
  `sitio` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `usuarios_dni` int(11) NOT NULL,
  `aves_codigo` int(11) NOT NULL,
  PRIMARY KEY (`sitio`,`fecha`,`usuarios_dni`,`aves_codigo`),
  KEY `fk_avistar_usuarios` (`usuarios_dni`),
  KEY `fk_aves_codigo` (`aves_codigo`),
  CONSTRAINT `fk_aves_codigo` FOREIGN KEY (`aves_codigo`) REFERENCES `aves` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_avistar_usuarios` FOREIGN KEY (`usuarios_dni`) REFERENCES `usuarios` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avistar`
--

LOCK TABLES `avistar` WRITE;
/*!40000 ALTER TABLE `avistar` DISABLE KEYS */;
INSERT INTO `avistar` VALUES ('dlfjndfv','2017-02-10',852,1),('Eeeeee','2017-02-08',28895033,1),('en el parque','2017-02-16',52,1),('en rodallejo','2017-02-08',52,9),('fgdfc ','2017-02-11',52,18),('fvdfvdfv','2017-02-03',852,8),('jejeje ok','2017-02-24',52,6),('Jfjdnd','2017-02-09',52,6),('sdfdg','2017-02-18',52,10);
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
  `email` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `rol` varchar(45) DEFAULT 'usuario',
  PRIMARY KEY (`dni`),
  UNIQUE KEY `dni_UNIQUE` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jesus','Zamora','España','Sevilla','jsus365@gmail.com','irene1','Administrador'),(52,'irene','irene','irene','irene','irene@irene.com','hola1','usuario'),(111,'migue','migue','migue','migue','migue@migue.com','migue','usuario'),(789,'iojklm','iojkml','ijkml','ijkm','ikm@dg.com','irene1',''),(852,'quique','quique','quique','quique','quique@quique.com','quique','usuario'),(6888,'jesusito','zamora','espaÃ±a','sevilla','jsus365@gmail.com','irene1',''),(25444,'pablito','pablito','pablito','pablito','pablito@pablito.com','irene1',''),(75645,'hola','hola','hola','hola','hola@hola.com','irene1',''),(89651,'david','el gnomo','espaÃ±a','sevilla','david@david.com','david','Usuario'),(98765,'jhg','hgf','hgfj','hgf','adhgf@gomail.com','irene1',''),(525412,'pedrito','pedrito','pedrito','pedrito','pedrito@pedrito.com','pedro','usuario'),(4579525,'daniel','rodrigues','espaÃ±a','sevilla','dani.rodrigues.martin@gmail.com','miratico','usuario'),(28895033,'Esperanza','Jimenez','EspaÃ±a','Sevilla','esquivel.ej@gmail.com','12345','usuario'),(77823279,'mercedes','marin gonzalez','espaÃ±a','sevill','mervisco@gmail.com','irene1','');
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

-- Dump completed on 2017-02-14 12:37:25
