CREATE DATABASE  IF NOT EXISTS `47924` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `47924`;
-- MySQL dump 10.13  Distrib 5.6.11, for Win32 (x86)
--
-- Host: localhost    Database: 47924
-- ------------------------------------------------------
-- Server version	5.6.11

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
-- Table structure for table `ra2441135_isskar_entity_users`
--

DROP TABLE IF EXISTS `ra2441135_isskar_entity_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ra2441135_isskar_entity_users` (
  `userID` mediumint(7) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `pass` char(50) NOT NULL,
  `RegistrationDate` datetime NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ra2441135_isskar_entity_users`
--

LOCK TABLES `ra2441135_isskar_entity_users` WRITE;
/*!40000 ALTER TABLE `ra2441135_isskar_entity_users` DISABLE KEYS */;
INSERT INTO `ra2441135_isskar_entity_users` VALUES (1,'Ricky','Adams','insanelr@email.com','be8ec20d52fdf21c23e83ba2bb7446a7fecb32ac','2013-11-12 11:51:49'),(2,'MisterE','Guy','randomguy@yahoo.com','16ac21abc5e7a1bb883fbf1c9da2fa27a8a621e9','2013-11-12 11:52:38'),(3,'Robert','De Nero','RDen@email.com','22b89bcd5ef556121f5cbda4e7d6813dbe5e5622','2013-11-12 11:53:31'),(4,'Al','Pachino','ALPA@email.com','f6e0b6d7d1d63e4b2115aba57dcc22b44e9a8be7','2013-11-12 11:56:00'),(5,'Jennifer','Lawrence','JLa@email.com','b6dd5af04a357474e9c245bc5a4d3b04a33209f6','2013-11-12 11:57:07'),(6,'Scarlet','Johansson','ScarJo@email.com','97f732a0e9e33cd5a3bb2697e4d134882ec48b7d','2013-11-12 11:57:53'),(7,'Jon','Meyers','HVIII@email.com','481902ec14eaf3fcfec6be82bd6a63b972ac517f','2013-11-12 11:58:25'),(8,'Chris','He','THOR@email.com','6d3cb8105ea44e391de37bb1f5c3274e385052df','2013-11-12 11:58:52');
/*!40000 ALTER TABLE `ra2441135_isskar_entity_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-12 12:20:46
