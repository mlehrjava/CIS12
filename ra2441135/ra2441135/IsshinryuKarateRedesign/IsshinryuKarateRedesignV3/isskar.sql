CREATE DATABASE  IF NOT EXISTS `47924` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `47924`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: 47924
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
-- Table structure for table `ra2441135_isskar_entity_terminology`
--

DROP TABLE IF EXISTS `ra2441135_isskar_entity_terminology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ra2441135_isskar_entity_terminology` (
  `termId` int(10) NOT NULL AUTO_INCREMENT,
  `term` varchar(50) DEFAULT NULL,
  `section` int(2) DEFAULT NULL,
  `definition` varchar(255) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`termId`),
  KEY `section` (`section`),
  CONSTRAINT `ra2441135_isskar_entity_terminology_ibfk_1` FOREIGN KEY (`section`) REFERENCES `ra2441135_isskar_enum_section` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ra2441135_isskar_entity_terminology`
--

LOCK TABLES `ra2441135_isskar_entity_terminology` WRITE;
/*!40000 ALTER TABLE `ra2441135_isskar_entity_terminology` DISABLE KEYS */;
INSERT INTO `ra2441135_isskar_entity_terminology` VALUES (1,'Age Zuki',1,'Rising Punch',NULL),(2,'Awase Zuki u-Punch',1,'Punching with both fists simultaniously','Morote Zuki'),(3,'Choku Zuki',1,'Straight Punch',NULL),(4,'Chudan Zuki',1,'A punch to the mid-section of the opponent\'s body.',NULL),(5,'Empi Uchi',1,'Elbow strike','Hiji-Ate'),(6,'Gedan Zuki',1,'A punch to the lower section of the opponent\'s body.',NULL),(7,'Gyaku Zuki',1,'Reverse Punch',NULL),(8,'Haishu Uchi',1,'A strike with the back of the hand.',NULL),(9,'Haito Uchi',1,'Ridge-hand Strike',NULL),(10,'Harai Te',1,'Sweeping technique with the arm',NULL),(11,'Hasami Zuki',1,'Scissor Punch',NULL),(12,'Heiko Zuki',1,'\"Parallel Punch\" (A double, simultaneous punch.',NULL),(13,'Hiji Atemi',1,'Elbow Strikes',NULL),(14,'Hiji-Ate',1,'Elbow Strike','Empi-Uchi'),(15,'Kagi Zuki',1,'Hook Punch',NULL),(16,'Kakuto Uchi',1,'Wrist joint strike','Ko Uchi'),(17,'Kentsui Uchi',1,'Hammer Fist Strike','Tettsui Uchi'),(18,'Kizami Zuki',1,'Jab Punch',NULL),(19,'Ko Uchi',1,'Wrist joint strike','Kakuto Uchi'),(20,'Mae Empi',1,'Forward elbow strike',NULL),(21,'Mawashi Empi Uchi',1,'Circular elbow strike','Mawashi Hiji Ate'),(22,'Mawashi Hiji Ate',1,'Circular elbow strike','Mawashi Empi Uchi'),(23,'Mawashi Zuki',1,'Roundhouse punch',NULL),(24,'Morote Zuki U-Punch',1,'Punching with both fists simultaniously','Awase Zuki U-Punch'),(25,'Otoshi Empi Uchi',1,'An elbow strike by dropping the elbow','Otshi Hiji Ate'),(26,'Tate Empi',1,'Upward elbow strike',NULL),(27,'Tate Uraken Uchi',1,'Vertical back-fist attack',NULL),(28,'Tate Zuki',1,'Vertical punch','A fist punch with the palm along a verticalplane'),(29,'Teisho Uchi',1,'Palm heel strike',NULL),(30,'Tettsui Uchi',1,'Hammer Strike','Kentsui'),(31,'Yama Zuki Mountain Punch',1,'A wide U-shaped dual punch',NULL),(32,'Ura Zuki',1,'An upper cut punch used at close range','Uraken Back Knuckle'),(33,'Ayumi Dachi',2,'A stance found in ITOSU-KAI SHITO-RYU. It is a natural \"Walking\" stance with the weight over the center.',NULL),(34,'FUDO DACHI',2,'Immovable Stance','SOCHIN DACHI'),(35,'GANKAKU DACHI',2,'Crane stance.','TSURU ASHI DACHI/SAGI ASHI DACHI'),(36,'HACHIJI DACHI',2,'A natural stance, feet positioned about one shoulder width apart, with feet pointed slightly outward.',NULL),(37,'HANGETSU DACHI',2,'\"Half-Moon\" Stance.',NULL),(38,'HEIKO DACHI',2,'A natural stance. Feet positioned about one shoulder width apart, with feet pointed straight forward. Some Kata begin from this position.',NULL),(39,'HEIKO DACHI',2,'A Heiko Dachi stance, where the front foot is turned slightly inwards while the rear foot is straight. This stance is found in the Shinpa kata.','HIGAONNA LINE'),(40,'HEISOKU DACHI',2,'An informal attention stance. Feet are together and pointed straight forward.',NULL),(41,'HORAN NO KAMAE',2,'A \"ready\" position used in some KATA where the fist in covered by the other hand.','\"Egg in the nest ready position.\"'),(42,'KI-O-TSUKE',2,'MUSUBI O DACHI with open hands down both sides.','\"Attention\"'),(43,'KIBA DACHI',2,'Saddlw Stance','NAIFANCHI/NAIHANCHI DACHI'),(44,'KOKUTSKU DACHI',2,'A stance which has most of the weight to the back.','\"Back Stance.\"'),(45,'KOSA DACHI',2,'Crossed-Leg Stance',NULL),(46,'REINOJI DACHI',2,'A stance with feet making a \"L-shape.\"',NULL),(47,'SAGI ASHI DACHI',2,'One Leg Stance','GANKAKU DACHI/TSURU ASHI DACHI'),(48,'SANCHIN DACHI',2,'Hour-glass stance.',NULL),(49,'SEISAN DACHI',2,'Forward stance with feet shoulders width apart and the back of the heal of the forward foot on a line with the front of the large toe on the rear foot',NULL),(50,'SHIKO DACHI',2,'A stance often used in GOJU-RYU and SHITO-RYU.','\"Square Stance\"'),(51,'SHIZENTAI',2,'The body remains relaxed but alert.','\"Natural Position.\"'),(52,'SOCHIN DACHI',2,'Immovable Stance','FUDO DACHI'),(53,'TEIJI DACHI',2,'A stance with the feet in a \"T-shape.\"',NULL),(54,'TSURU ASHI DACHI',2,'Crane Stance','GANKAKU DACHI/SAGI ASHI DACHI'),(55,'ZENKUTSU DACHI',2,'Forward stance',NULL),(56,'ASHI BARAI ',3,'Foot Sweep',NULL),(57,'ASHI WAZA ',3,'Name given to all lef and foot techniques ',NULL),(58,'FUMIKOMI',3,'Stomp kick, usually apploed to the knee, shin, or instep of an opponent',NULL),(59,'GYAKU MAWASHI GERI',3,'reverse round-house kick.',NULL),(60,'KEAGE',3,'Snap kick (litterally, kick upward). ',NULL),(61,'KEKOMI',3,'Thrust kick (literally, kick into/straigh).',NULL),(62,'MAE GERI KEAGE',3,'Front snap kick','MAE KEAGE. MAE GERI'),(63,'KEKOMI',3,'Front thrust kick. ','MAE KEKOMI '),(64,'MAWASHI GERI',3,'Roundhouse kick. ',NULL),(65,'MIKAZUKI GERI ',3,'cresent kick ',NULL),(66,'TOBI GERI ',3,'Jump kick ',NULL),(67,'UCHI MAWASHI GERI ',3,'Inside roundhous kick. ',NULL),(68,'USHIRO GERI',3,'back kick',NULL),(69,'YOKO GERI KEAGE ',3,'side snap kick ','YOKO KEAGE'),(70,'YIKO GERI KEKOMI ',3,'Side thrust kick','YOKO KEKOMI'),(71,'YOKO TOBI GERI',3,'Side kick',NULL),(72,'BO Staff',4,'A long stick used as a weapon ',NULL),(73,'EKKU',4,'A wooden oar used by the okinawan\'s which was improvised as a weapon',NULL),(74,'JO',4,'Wooden staff about 4\'-5\' in length the JO orginated as a walking stick',NULL),(75,'NUNCHAKU',4,'two 12 inch batons connected at the ends with a shot cord',NULL),(76,'SAI',4,'An okinawan weapon that is shaped like the greek letter \'PSI\' with the middle being much longer',NULL),(77,'TONFA',5,'A farm tool (believed to have been used as a handle for a millstone) developed into a weapon by the Okinawan\'s.',NULL),(78,'ATEMI WAZA',5,NULL,NULL),(79,'BOGYO ROKU KYODO',5,NULL,NULL),(80,'TE, SHUTO TE/ SUKUI TE',5,'BUDO Martial Way.',NULL),(81,'JODAN',5,'Upper-Section',NULL),(82,'CHUDAN',5,'Mid-Section',NULL),(83,'GEDAN',5,'Lower-Section',NULL),(84,'ICHI',5,'one',NULL),(85,'NI',5,'two',NULL),(86,'SAN',5,'three',NULL),(87,'SHI',5,'four',NULL),(88,'GO',5,'five',NULL),(89,'ROKU',5,'six',NULL),(90,'SHICHI',5,'seven',NULL),(91,'HACHI',5,'eight',NULL),(92,'KYU',5,'nine','KU'),(93,'JU',5,'ten',NULL),(94,'BUNKAI',5,'A study of the techniques and applications in KATA',NULL),(95,'DANI',5,'(Dan)Level, Rank or Degree. Black Belt rank. Ranks under Black Belt are called KYU ranks.',NULL),(96,'DO',5,'Way/Path. The Japanese character for \"DO\" is the same as the Chinese character for Tao (as in \"Taoism\"). In Karate, the connotation is that of a way of attaining enlightenment or a way of improving one\'s character through traditional training.',NULL),(97,'DOJO',5,'Literally \"Place of the Way.\" Also \"place of enlightenment.\" The place where we practice Karate. Traditional etiquette prescribes bowing in the direction of the designated front of the dojo (SHOMEN) whenever entering or leaving the DOJO.',NULL),(98,'DOMO ARIGATO GOZAIMASHITA',5,' Japanese for \"thank you very much.\" At the end of each class, it is proper to bow and thank the instructor and those with whom you\'ve trained.',NULL),(99,'EMBUSEN',5,'Floor pattern of a given KATA.',NULL),(100,'EMP',5,'(1) One the Black Belt level KATA, translated as \"The Flight of a Sparrow\". (2) Elbow.','HIJI'),(101,'IPPON KUMITE',5,'(one step basic sparring), the attacker will normally announce where he/she will attack JODAN, CHUDAN, or GEDAN (Upper level, Mid-level, or lower level).',NULL),(102,'GI',5,NULL,'DO GI/KEIKO GI/KARATE GI'),(103,'GO NO SEN',5,'The tactic where one allows the opponent to attack first so to open up targets for counter acttack.',NULL),(104,'GOHON KUMITE',5,' Five step basic sparring. The attacker steps in five consecutive times with a striking technique with each step. The defender steps back five times, blocking each technique. After the fifth block, the defender executes a counter-strike.',NULL),(105,'HAI',5,'Yes',NULL),(106,'HAJIME',5,'\"Begin\". A command given to start a given drill, Kata, or Kumite.',NULL),(107,'HANGETSU',5,'A Black Belt level KATA',NULL),(108,'HANSHI',5,'\"Master.\" An honorary title given to the highest Black Belts of an organization, signifying their understanding of their art',NULL),(109,'AKA Red AUICHI',5,'\"Simultaneous Scoring Technique.\" No point awarded to either contestant. Referee brings fists together in front of the chest.',NULL),(110,'AKA (SHIRO) IPPON',6,'\"Red (White) Scores Ippon.\" The Referee obliquely raises his arm on the side of the winner (as in ...NO KACHI).',NULL),(111,'AKA (SHIRO) NO KACHI',6,'\"Red (White) Wins!\" The Referee obliquely raises his arm on the side of the winner.',NULL),(112,'ATENAI YON',6,'\"Warning without penalty.\" This may be imposed for attended minor infractions or for the first instance of a minor infraction. The Referee raises one hand in a fist with the other hand covering it at chest level and shows it to the offender.',NULL),(113,'ATOSHI BARAKU',6,'\"A little more time left.\" An audible signal will be given by the time keeper 30 seconds before the actual end of the bout.',NULL),(114,'CHUI',6,'\"Warning\"',NULL),(115,'ENCHO-SEN',6,'\"Extension\"','Overtime'),(116,'SHAOBU HAJIME',6,'After over-time the referee reopens the match with this command',NULL),(117,'FUJUBUN',6,'Not enough power',NULL),(118,'FUKUSHIN SHUGO',6,'Judges conferrence.',NULL),(119,'HANSOKU',6,'\"Foul.\" This is imposed following a very serious infraction. It results in the opponent\'s score being raised to SANBON',NULL),(120,'HANSOKU CHUI',6,'\"Warning with an IPPON penalty. This is a penalty in which IPPON is added to the opponent\'s score. HANSOKU-CHUI is usually imposed for infractions for which a KEIKOKU has previously been given in that bout. ',NULL),(121,'HANTEI',6,'\"Judgment.\" Referee calls for judgment by blowing his whistle and the Judges render their decision by flag signal.',NULL),(122,'HANTEI KACHI',6,'\"Winner by decision.\"',NULL),(123,'HIKIWAKE',6,'\"Draw.\" Referee crosses arms over chest, then un-crosses and holds arms out from the body with the palms showing upwards.',NULL),(124,'IPPON SHOBU',6,'One point match, used in tournaments',NULL),(125,'JIKAN',6,'\"Time.\"',NULL),(126,'JOGAI',6,'\"Exit from fighting area.\" The Referee points with his index finger at a 45 degree angle to the area boundary on the side of the offender.',NULL),(127,'JOGAI HANSOKU CHUI',6,'\"Fourth and Final Exit from the fighting area.\" Fourth exit from the fighting area causes victory to the opponent.',NULL),(128,'JOGAI KEIKOKU',6,'\"Second exit from fighting area.\" WAZA-ARI penalty is given to the opponent.',NULL),(129,'KACHI',6,'Victorious',NULL),(130,'KEIKOKU',6,'\"Warning with WAZA-ARI penalty in SANBON SHOBU. This is a penalty in which WAZA-ARI is added to the opponent\'s score.',NULL),(131,'KIKEN',6,'\"Renunciation.\" The Referee points one index finger towards the contestant.',NULL),(132,'MEINAI',6,'\"I could not see.\" A call by a judge to indicate that a given technique was not visible form his/her angle.',NULL),(133,'MUMOBI',6,'\"Warning for lack of regard for ones own safety.\" Referee points one index finger in the air at a 60 degree angle on the side of the offender.',NULL),(134,'MOTO NO ICHI',6,'\"Original Position.\" Contestants, Referee and Judge return to their respective standing lines.',NULL),(135,'SANBON SHOBU',6,'Three Point match. Used in tournaments',NULL),(136,'SHIRO',6,'White',NULL),(137,'SHOBU HAJIME',6,'\"Start the Extended Bout.\"',NULL),(138,'SHOBU SANBON HAJIME',6,'\"Start the Bout\"',NULL),(139,'SHUGO',6,'\"Judges Called.\" The Referee beckons with his arms to the Judges.',NULL),(140,'TORANAI',6,'\"No Point\"',NULL),(141,'TORIMASEN',6,'\"Unacceptable as scoring techniques.\"',NULL),(142,'TSUZUKETE',6,'\"Fight On!\" Resumption of fighting ordered when unauthorized interruption occurs.',NULL),(250,'TSUZUKETE HAJIME',6,'\"Resume Fighting - Begin!\" Referee standing upon his line, steps back into ZENKUTSU DACHI and brings the palms of this hands toward each other.',NULL),(251,'WAZA ARI',6,'\"Half point\"',NULL),(252,'YAME',6,'\"Stop!\"',NULL);
/*!40000 ALTER TABLE `ra2441135_isskar_entity_terminology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ra2441135_isskar_enum_section`
--

DROP TABLE IF EXISTS `ra2441135_isskar_enum_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ra2441135_isskar_enum_section` (
  `id` int(10) NOT NULL,
  `section` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ra2441135_isskar_enum_section`
--

LOCK TABLES `ra2441135_isskar_enum_section` WRITE;
/*!40000 ALTER TABLE `ra2441135_isskar_enum_section` DISABLE KEYS */;
INSERT INTO `ra2441135_isskar_enum_section` VALUES (0,'Blocks'),(1,'Strikes and Punches'),(2,'Stances (Dachi)'),(3,'Kicks (Geri) and Foot Techniques'),(4,'Weapons'),(5,'General Terms'),(6,'Tournament Terminology');
/*!40000 ALTER TABLE `ra2441135_isskar_enum_section` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-22  8:48:27
