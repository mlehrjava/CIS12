CREATE DATABASE  IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Table structure for table `entity_catalog`
--

DROP TABLE IF EXISTS `entity_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_catalog` (
  `catalog_id` int(10) NOT NULL,
  `discipline` int(10) DEFAULT NULL,
  `number` varchar(4) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catalog_id`),
  KEY `discipline` (`discipline`),
  CONSTRAINT `entity_catalog_ibfk_2` FOREIGN KEY (`discipline`) REFERENCES `enum_discipline_catalog` (`discipline_id`),
  CONSTRAINT `entity_catalog_ibfk_1` FOREIGN KEY (`discipline`) REFERENCES `enum_discipline_catalog` (`discipline_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_catalog`
--

LOCK TABLES `entity_catalog` WRITE;
/*!40000 ALTER TABLE `entity_catalog` DISABLE KEYS */;
INSERT INTO `entity_catalog` VALUES (1,1,'12','PHP','Pure Misery'),(2,1,'14a','Javascript','The Best Language Ever'),(3,4,'18B','Business Law','Commercial paper, business organizations, government regulations, protection of property rights and international law.'),(4,5,'1A','English Composition','Teaches college-level critical reading, academic writing, and research skills. PREREQUISITE: ENG-50 or ENG-80 or qualifying placement level.'),(5,5,'50','Basic English Comp',' Prepares students for college-level reading and academic writing. PREREQUISITE: ENG-60B, ESL-55 or qualifying placement level.');
/*!40000 ALTER TABLE `entity_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_instructor`
--

DROP TABLE IF EXISTS `entity_instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_instructor` (
  `instructor_id` int(10) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `mi` char(1) DEFAULT NULL,
  `first_name` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_instructor`
--

LOCK TABLES `entity_instructor` WRITE;
/*!40000 ALTER TABLE `entity_instructor` DISABLE KEYS */;
INSERT INTO `entity_instructor` VALUES (1111111,'Curtain','T','Kerry','1983-01-01','kerry.curtain@rcc.edu'),(1150258,'Lehr','E','Mark','1952-09-25','mark.lehr@rcc.edu'),(2222222,'Judon','R','LaNeshia','1970-05-25','Laneshia.Judon@rcc.edu'),(4588793,'Osgood-Treston','R','Brit','1949-12-25','Brit.Osgood-Treston@rcc.edu'),(9999999,'Tamra','E','Kearn','1965-09-15','Tammy.DiBenedetto@rcc.edu');
/*!40000 ALTER TABLE `entity_instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_section`
--

DROP TABLE IF EXISTS `entity_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_section` (
  `section_id` int(10) NOT NULL,
  `section_number` mediumint(7) DEFAULT NULL,
  `term` varchar(10) DEFAULT NULL,
  `bldg` int(10) DEFAULT NULL,
  `room` varchar(5) DEFAULT NULL,
  `days_of_week` varchar(5) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`section_id`),
  KEY `bldg` (`bldg`),
  CONSTRAINT `entity_section_ibfk_4` FOREIGN KEY (`bldg`) REFERENCES `enum_bldg_section` (`bldg_id`),
  CONSTRAINT `entity_section_ibfk_1` FOREIGN KEY (`bldg`) REFERENCES `enum_bldg_section` (`bldg_id`),
  CONSTRAINT `entity_section_ibfk_2` FOREIGN KEY (`bldg`) REFERENCES `enum_bldg_section` (`bldg_id`),
  CONSTRAINT `entity_section_ibfk_3` FOREIGN KEY (`bldg`) REFERENCES `enum_bldg_section` (`bldg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_section`
--

LOCK TABLES `entity_section` WRITE;
/*!40000 ALTER TABLE `entity_section` DISABLE KEYS */;
INSERT INTO `entity_section` VALUES (1,47924,'Fall 2013',1,'208','TuTh','11:10:00','12:35:00'),(2,47925,'Fall 2013',1,'200','We','14:30:00','17:50:00'),(3,47886,'Fall 2013',4,'25','MTW','00:00:00','01:00:00'),(4,48330,'Fall 2013',5,'119','MTWTh','10:15:00','12:25:00'),(5,48370,'Fall 2013',5,'26','MTWTh','01:15:00','14:35:00');
/*!40000 ALTER TABLE `entity_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_student`
--

DROP TABLE IF EXISTS `entity_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_student` (
  `student_id` int(10) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `mi` char(1) DEFAULT NULL,
  `first_name` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_student`
--

LOCK TABLES `entity_student` WRITE;
/*!40000 ALTER TABLE `entity_student` DISABLE KEYS */;
INSERT INTO `entity_student` VALUES (2222222,'Smith','T','Will','1972-02-02','will@will.com'),(3333333,'Gilbert','J','Daniel','1973-03-03','dgilbert@you.com'),(4889924,'Ricky','R','Adams','1988-06-11','rickyadams@rcc.edu'),(6587982,'Adam','A','Richards','1986-08-11','Adamrichards@rcc.edu'),(9785462,'Raynard','R','Madison','1990-04-22','RayMadison@rcc.edu');
/*!40000 ALTER TABLE `entity_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_bldg_section`
--

DROP TABLE IF EXISTS `enum_bldg_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_bldg_section` (
  `bldg_id` int(10) NOT NULL,
  `short_name` varchar(4) DEFAULT NULL,
  `long_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bldg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_bldg_section`
--

LOCK TABLES `enum_bldg_section` WRITE;
/*!40000 ALTER TABLE `enum_bldg_section` DISABLE KEYS */;
INSERT INTO `enum_bldg_section` VALUES (1,'BE','Business Education'),(2,'MLK','Martin Luther King'),(3,'MTSC','Math - Science'),(4,'ONL','Online'),(5,'QUAD','Quadrangle');
/*!40000 ALTER TABLE `enum_bldg_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_discipline_catalog`
--

DROP TABLE IF EXISTS `enum_discipline_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_discipline_catalog` (
  `discipline_id` int(10) NOT NULL,
  `discipline` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_discipline_catalog`
--

LOCK TABLES `enum_discipline_catalog` WRITE;
/*!40000 ALTER TABLE `enum_discipline_catalog` DISABLE KEYS */;
INSERT INTO `enum_discipline_catalog` VALUES (1,'CIS'),(2,'CSC'),(3,'Mat'),(4,'Bus'),(5,'Eng');
/*!40000 ALTER TABLE `enum_discipline_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_catalog_section`
--

DROP TABLE IF EXISTS `xref_catalog_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_catalog_section` (
  `catalog_section_id` int(10) NOT NULL,
  `catalog_id` int(10) DEFAULT NULL,
  `section_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`catalog_section_id`),
  KEY `catalog_id` (`catalog_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `xref_catalog_section_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `entity_section` (`section_id`),
  CONSTRAINT `xref_catalog_section_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `entity_catalog` (`catalog_id`),
  CONSTRAINT `xref_catalog_section_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `xref_student_section` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_catalog_section`
--

LOCK TABLES `xref_catalog_section` WRITE;
/*!40000 ALTER TABLE `xref_catalog_section` DISABLE KEYS */;
INSERT INTO `xref_catalog_section` VALUES (1,1,1),(2,2,2),(3,3,4),(4,4,4),(5,5,5);
/*!40000 ALTER TABLE `xref_catalog_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_instructor_section`
--

DROP TABLE IF EXISTS `xref_instructor_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_instructor_section` (
  `i_s_x_id` mediumint(8) unsigned NOT NULL,
  `instructor_id` int(10) DEFAULT NULL,
  `section_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`i_s_x_id`),
  KEY `instructor_id` (`instructor_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `xref_instructor_section_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `entity_instructor` (`instructor_id`),
  CONSTRAINT `xref_instructor_section_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `entity_section` (`section_id`),
  CONSTRAINT `xref_instructor_section_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `entity_section` (`section_id`),
  CONSTRAINT `xref_instructor_section_ibfk_4` FOREIGN KEY (`instructor_id`) REFERENCES `entity_instructor` (`instructor_id`),
  CONSTRAINT `xref_instructor_section_ibfk_5` FOREIGN KEY (`instructor_id`) REFERENCES `entity_instructor` (`instructor_id`),
  CONSTRAINT `xref_instructor_section_ibfk_6` FOREIGN KEY (`section_id`) REFERENCES `entity_section` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_instructor_section`
--

LOCK TABLES `xref_instructor_section` WRITE;
/*!40000 ALTER TABLE `xref_instructor_section` DISABLE KEYS */;
INSERT INTO `xref_instructor_section` VALUES (1,1111111,1),(2,1150258,2),(3,2222222,3),(4,4588793,4),(5,9999999,5);
/*!40000 ALTER TABLE `xref_instructor_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_student_section`
--

DROP TABLE IF EXISTS `xref_student_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_student_section` (
  `xref_student_section_id` int(10) NOT NULL,
  `student_id` int(10) DEFAULT NULL,
  `section_id` int(10) DEFAULT NULL,
  `grade` char(1) DEFAULT NULL,
  `lab_time` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`xref_student_section_id`),
  KEY `student_id` (`student_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `xref_student_section_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `entity_section` (`section_id`),
  CONSTRAINT `xref_student_section_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `entity_student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_student_section`
--

LOCK TABLES `xref_student_section` WRITE;
/*!40000 ALTER TABLE `xref_student_section` DISABLE KEYS */;
INSERT INTO `xref_student_section` VALUES (1,3333333,2,'C',19),(2,2222222,1,'F',17),(3,4889924,1,'A',20),(4,6587982,4,'B',18),(5,9785462,5,'A',40);
/*!40000 ALTER TABLE `xref_student_section` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-14 19:56:32
