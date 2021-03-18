-- MySQL dump 10.13  Distrib 5.5.15, for osx10.6 (i386)
--
-- Host: localhost    Database: cellar
-- ------------------------------------------------------
-- Server version	5.5.15

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
-- Table structure for table `wine`
--

DROP TABLE IF EXISTS `wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `grapes` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `description` blob,
  `picture` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine`
--

LOCK TABLES `wine` WRITE;
/*!40000 ALTER TABLE `wine` DISABLE KEYS */;
INSERT INTO `wine` VALUES 
(1,'Transylvanian Ice Wine','2016','albi','France','89 lei','Cel mai bun vin spumant!','ice_wine.jpg'),
(2,'Har - Dagon Clan','2017','roz','Romania','42 lei','Cel mai bun vin rose!','har.jpg'),
(3,'Lechburg Pinot Grigio','2016','albi','Italia','44 lei','Cel mai bun Pinot Gris!','lurton-pinot-gris.jpg'),
(4,'Cuvee Petit - Avincis','2016','albi','Spania','43 lei','Cel mai bun Sauvignon Blanc','cuvee_petit.jpg'),
(5,'Premium Fume - Budureasca','2017','albi','Romania','37 lei','Cel mai bun vin alb!','premium_fume.jpg'),
(6,'Avincis Cramposie Selectionata','2017','albi','Romania','43 lei','Cel mai bun vin alb!','avincis_cramposie.jpg'),
(7,'Bauer Merlot - Cramele Recas','2016','rosii','Romania','59 lei','Cel mai bun vin rosu!','bauer_merlot.jpg'),
(8,'Bauer,Selene Merlot ','2017','rosii','Romania','59 lei','Cel mai bun vin rosu!','selene_merlot.jpg'),
(9,'Cvartet - 7arts','2016','rosii','Romania','75 lei','Cel mai bun vin rosu multisoi!','cvartet.jpg'),
(10,'Via Marchizului Negru de Dragasani - Viile Metamorfosis ','2016','rosii','Romania','66 lei','Cel mai bun vin rosu!','viile_metamorfosis.jpg'),
(11,'Feteasca Neagra: Cuvee Guy de Poix','2015','rosii','Romania','148 lei','Cel mai bun vin rosu soiuri locale!','feteasca_neagra.jpg'),
(12,'Smerenie - Crama Oprisor','2016','rosii','Romania','128 lei','Cel mai bun vin rosu!','crama_oprisor.jpg');
/*!40000 ALTER TABLE `wine` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-01  9:22:24
