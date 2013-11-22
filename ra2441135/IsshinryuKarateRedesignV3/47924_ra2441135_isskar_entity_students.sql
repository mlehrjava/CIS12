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
-- Table structure for table `ra2441135_isskar_entity_students`
--

DROP TABLE IF EXISTS `ra2441135_isskar_entity_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ra2441135_isskar_entity_students` (
  `studentID` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `ChildFirstName` varchar(20) DEFAULT NULL,
  `ChildLastName` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `times` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ra2441135_isskar_entity_students`
--

LOCK TABLES `ra2441135_isskar_entity_students` WRITE;
/*!40000 ALTER TABLE `ra2441135_isskar_entity_students` DISABLE KEYS */;
INSERT INTO `ra2441135_isskar_entity_students` VALUES (1,'Ricky','Adams','Mya','Madison','insaneslr@yahooo.com','Kids 4 Years and Older: Tuesday 5:00PM to 6:00PM'),(2,'Random','Guy','','','randomguy@yahoo.com','Adults: Thursday 7:00PM to 8:00PM'),(3,'Robert','De Nero','Bobby','De Nero','RDeN@email.com','Kids 4 Years and Older: Tuesday 6:00PM to 7:00PM'),(4,'Al','Pachino','Little','Friend','ALPA@email.com','Kids 4 Years and Older: Tuesday 5:00PM to 6:00PM'),(5,'Jennifer','Lawrence',NULL,'','JLa@email.com','Adults: Thursday 7:00PM to 8:00PM'),(6,'Scarlet','Johansson',NULL,'','ScarJo@email.com','Adults: Tuesday 7:00PM to 8:00PM'),(7,'Jon','Meyers','Henry','Tudor','HVIII@email.com','Kids 4 Years and Older: Thursday 6:00PM to 7:00PM'),(8,'Chris','Hemsworth',NULL,'','THOR@email.com','Adults: Thursday 7:00PM to 8:00PM'),(9,'Charlie','Hunnam','Jax','Teller','JT@email.com','Kids 4 Years and Older: Thursday 6:00PM to 7:00PM');
/*!40000 ALTER TABLE `ra2441135_isskar_entity_students` ENABLE KEYS */;
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
