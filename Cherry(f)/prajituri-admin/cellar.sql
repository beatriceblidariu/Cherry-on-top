-- MySQL dump 10.13  Distrib 5.5.15, for osx10.6 (i386)
--
-- Host: localhost    Database: cherry
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
-- Table structure for table `prajituri`
--

DROP TABLE IF EXISTS `prajituri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prajituri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(45) DEFAULT NULL,
  `data_valabilitate` varchar(45) DEFAULT NULL,
  `calorii` varchar(45) DEFAULT NULL,
  `tip` varchar(45) DEFAULT NULL,
  `eveniment` varchar(45) DEFAULT NULL,
  `description` blob,
  `picture` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prajituri`
--

LOCK TABLES `prajituri` WRITE;
/*!40000 ALTER TABLE `prajituri` DISABLE KEYS */;
INSERT INTO `prajituri` VALUES
 (1,'AMANDINE','2-3 zile la frigider','243/ 100g','clasic','Petrecere','Amandine este un tort cu straturi de ciocolată românești umplut cu ciocolată cu caramel și cremă de fondant. Uneori se folosește cremă de migdale.','amandine.jpg'),
(2,'RAW RASBBERY BARS ','2-3 zile la frigider','180/baton','raw vegan','Petrecere','Cele mai dulci,fructificate și delicioase batoane !','baton_rv.jpg'),
(3,'CHEC MARMORAT','5-6 zile','324','clasic','Petrecere','Cel mai pufos și delicios chec','chec.jpg'),
(4,'RAW CHEESECAKE ','2-3 zile la frigider','200','raw vegan','Petrecere','Acest RAW CHEESECAKE de nucă de cocos cu bază de cacao, amestecă aromele de nucă de nucă de cocos, trandafir și ciocolată într-un delicios, rafinat, fără zahăr desert.','cheesecake_rv.jpg'),
(5,'CREMA DE ZAHĂR ARS','2-3 zile la frigider','130/100g','clasic','Petrecere','Crema de  zahăr ar cunoscută pentru gustul său deosebit și textura fină','crema_zahar_ars.jpg'),
(6,'GOGOAȘĂ','4 zile','413','clasic','Petrecere','Una din gurstările preferate din copilările. Simplă și delicioasă','gogoasa.jpg'),
(7,'SALAM DE BISCUIȚI','5 zile la frigider','256/100g','clasic','Petrecere','Salamul de biscuiți, este un desert  românesc, făcută cu biscuiți, cacao  și aromat cu rom.','salam_bisc.jpg'),
(8,'TARTĂ CU PRUNE','3 zile la frigider','150/100g','diabetici','Petrecere','Un desert fresh,gustos  și potrivit chiar și pentru diabetici','tarta_d.jpg'),
(9,'TARTĂ CU MERE','3 zile la frigider','170/100g','clasic','Petrecere','Desert delicios potrivit pentru zilele de vară toride','tarta_mere.jpg'),
(10,'TORT COPII','2-3 zile la frigider','370/100g','clasic','Aniversări/Botez','Un tort triplu stratificat, cu blat de banană și ciocolată, cu ciocolată și unt de arahide  cremă elvețiană, glazurat cu  ganache de ciocolată belgiană..','tort_copii.jpg'),
(11,'TORT ANIVERSAR','2-3 zile la frigider','400/100g','clasic','Aniversări','Un tort aniversar de excepție, cu un decor elegant și deosebit, realizat cu glazură scursă, macarons, bezele ân diferite nuanțe și texturi, flori din pastă de zahăr și căpșuni proaspete.','tort_aniversar.jpg'),
(12,'TORT KINDER','2-3 zile la frigider','457/100g','clasic','Aniversări','Tortul Kinder are, asemeni prajiturii Kinder, un blat pufos cu cocolată, ganaj de ciocolată cu lapte și cremă ușoară. Este cu siguranta una dintre cele mai bune alegeri pentru iubitorii de ciocolată.','tort_kinder.jpg');
/*!40000 ALTER TABLE `prajituri` ENABLE KEYS */;
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
