CREATE DATABASE  IF NOT EXISTS `47924` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `47924`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: 47924
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `mr2358174_karate_entity_blackbelts`
--

DROP TABLE IF EXISTS `mr2358174_karate_entity_blackbelts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_entity_blackbelts` (
  `blackbelt_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `belt_degree` int(2) DEFAULT NULL,
  `bio` text,
  `image_url` tinytext,
  PRIMARY KEY (`blackbelt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_entity_blackbelts`
--

LOCK TABLES `mr2358174_karate_entity_blackbelts` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_entity_blackbelts` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_entity_blackbelts` VALUES (1,'Master Arnold Sandubrae',8,'Sensei Arnold Sandubrae began his Isshinryu Karate training in 1973, under the instruction of Sensei\'s Robert L. White, and Sam Santilli, students of Master Willie Adams. Several years later, he transferred to train directly under Master Willie Adams because Master Adams Dojo was located only blocks from Sensei Sandubrae\'s office. From 1973 until 1986 he amassed over 200 trophies in all categories, Kata, Kumite, Weapons, and Breaking.  <a href=\"./biography.php\">Read More</a>','1ea2c871f3aa416b8b5876dbaa20d20c_ajfm.png'),(2,'Master Pat Mcconnell',7,'Master Pat Mcconnell, 7th Degree Black Belt Began his training under Master Sandubrae on June 12th 1980 and was one of the first students to join the Palm Springs ','53fdf94c89b7c650a3abffa9d8696eae.png'),(3,'Master Tom Tweedie',5,'Master Tom Tweedie 5th Degree Black Belt Began his training under Master Sandubrae on ','21fa2c2b103cad9b76c8ac5665ec1230.png'),(4,'Master Jay Doster',4,NULL,'fff876428d651d84ab19aa7b777e3986.png'),(5,'Mr. Erik Kindell',2,NULL,'de538475856f087cd2af50e4ab91049a_g6bq.png'),(6,'Mr. Jeff Manger',1,NULL,'blank_face.jpg'),(7,'Mr. Gerald Petersen',1,NULL,'7dd343ca0c9fe61918e0b8f0855fcca2.jpg'),(8,'Mr. Marvin Peterson',1,NULL,'e753dbfd68edb0eb7bfbd8a444567547_ej4p.png'),(9,'Mr. Daniel Caballero',1,NULL,'17335eef6f7ca36c1538540a3e0d15ec_876m_w19f.png'),(10,'Mr. Angel Mota',1,NULL,'blank_face.jpg');
/*!40000 ALTER TABLE `mr2358174_karate_entity_blackbelts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr2358174_karate_entity_contact`
--

DROP TABLE IF EXISTS `mr2358174_karate_entity_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_entity_contact` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `message` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_entity_contact`
--

LOCK TABLES `mr2358174_karate_entity_contact` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_entity_contact` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_entity_contact` VALUES (15,'michael','r@r.r','1 (234) 567-8911','sakdhsakhsakjhdskajhd','2013-11-01 01:04:26',1),(16,'michael','r@r.r','1 (951) 320-6107 ext 6107','akshdkashdas kljd lkjsad lkj adlkajs lkadjsas kjaslkds lkhdsdsaksahdjhj ahj dsahdsa  lkahl d hldkjdsalkhj sda lha lhd d jl ads dsa d ds sad dsa  dsa da fd f d  f v  v cxklcchcjcjkhh h shj ad hdjshjs hdjs h adhj a hads','2013-11-01 23:29:37',0);
/*!40000 ALTER TABLE `mr2358174_karate_entity_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr2358174_karate_entity_events`
--

DROP TABLE IF EXISTS `mr2358174_karate_entity_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_entity_events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_entity_events`
--

LOCK TABLES `mr2358174_karate_entity_events` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_entity_events` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_entity_events` VALUES (1,'White Belt Testing','Testing student for white belts','2013-10-19','19:00:00','20:00:00'),(10,'Test Event','1st of month','2013-10-01','01:00:00','13:00:00'),(11,'Site Presention','Show and tell for the site','2013-10-22','11:10:00','12:35:00');
/*!40000 ALTER TABLE `mr2358174_karate_entity_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr2358174_karate_entity_student`
--

DROP TABLE IF EXISTS `mr2358174_karate_entity_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_entity_student` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `past_experience` varchar(50) DEFAULT NULL,
  `belts` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `parent_cell` varchar(50) DEFAULT NULL,
  `comments` text,
  `current_belt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_entity_student`
--

LOCK TABLES `mr2358174_karate_entity_student` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_entity_student` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_entity_student` VALUES (1,'michael',22,'1234567890','rishermichael@gmail.com','',NULL,NULL,NULL,'',NULL),(2,'michael',22,'1234567890','rishermichael@gmail.com','Self',NULL,NULL,NULL,'',NULL),(3,'michael',22,'1234567890','r@r.r','No',NULL,NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `mr2358174_karate_entity_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr2358174_karate_entity_terms`
--

DROP TABLE IF EXISTS `mr2358174_karate_entity_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_entity_terms` (
  `termId` int(10) NOT NULL AUTO_INCREMENT,
  `term` varchar(50) DEFAULT NULL,
  `meaning` text,
  `section` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`termId`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_entity_terms`
--

LOCK TABLES `mr2358174_karate_entity_terms` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_entity_terms` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_entity_terms` VALUES (1,'age uke','Upward block.','0'),(2,'awase uke','Joined hand block.','0'),(3,'gedan barai','Downward block.','0'),(4,'gedan ude uke','Low forearm block.','0'),(5,'haishu uke','A block using the back of the hand.','0'),(6,'hiji uke','A blocking action using the elbow.','0'),(7,'hiza uke','A blocking action using the knee.','0'),(8,'juji uke','X block.','0'),(9,'kake-te','Hook block.','0'),(10,'kakiwake','A two handed block using the outer surface of the wrist to neutralize a two-handed attack, such as a grab.','0'),(11,'kakuto uke','Wrist joint block. also known as ko uke \"crane block\" or \"arch block\". same as kakuto uke.','0'),(12,'manji uke','A double block where one arm executes gedan barai to one side, while the other arm executes jodan uchi uke (or jodan soto yoko te).','0'),(13,'morote uke','Augmented block. one arm and fist support the other arm in a block.','0'),(14,'osae uke','Pressing block.','0'),(15,'shuto te','Same as shuto uke. this name was used before the advent of sport karate. used to describe one of the techniques in bogyo roku kyodo.','0'),(16,'shuto uke','Knife-hand block.','0'),(17,'soto (ude) uke','Outside (forearm) block.','0'),(18,'soto yoko te','Same as uchi ude uke. this name was used before the advent of sport karate. used to describe one of the techniques in bogyo roku kyodo.','0'),(19,'sukui te','Same as sukui uke. this name was used before the advent of sport karate. used to describe one of the techniques in bogyo roku kyodo.','0'),(20,'sukui uke','Scooping block.','0'),(21,'teisho uke','Palm heel block.','0'),(22,'uchi (ude) uke','Inside (forearm) block.','0'),(23,'uchi yoko te','Same as soto ude uke. this name was used before the advent of sport karate. used to describe one of the techniques in bogyo roku kyodo.','0'),(24,'wa-uke','A block where the path taken is similar to the yoko- uke. imagine wiping a wall in front of you with your palm in a half-circle. at the end of the block the hand is angled slightly to the outside. this block occurs in the shinpa kata.','0'),(25,'age zuki','Rising punch.','1'),(26,'awase zuki','U punch. also referred to as morote zuki.','1'),(27,'choku zuki','Straight punch.','1'),(28,'chudan zuki','A punch to the mid-section of the opponent\'s body.','1'),(29,'empi uchi','elbow strike (also called hiji-ate)','1'),(30,'gedan zuki','A punch to the lower section of the opponent\'s body.','1'),(31,'gyaku zuki','Reverse punch.','1'),(32,'haishu uchi','A strike with the back of the hand.','1'),(33,'haito uchi','Ridge-hand strike.','1'),(34,'harai te','Sweeping technique with the arm','1'),(35,'hasami zuki','Scissor punch.','1'),(36,'heiko zuki','\"parallel punch\" (a double, simultaneous punch).','1'),(37,'hiji atemi','Elbow strikes.','1'),(38,'hiji-ate','elbow strike (also called empi-uchi)','1'),(39,'kagi zuki','Hook punch.','1'),(40,'kakuto uchi','Wrist joint strike. also known as \"ko uchi.\"','1'),(41,'kentsui uchi (or tettsui uchi)','Hammer fist stike.','1'),(42,'kizami zuki','Jab punch.','1'),(43,'ko uchi','Wrist joint strike. also known as kakuto uchi.','1'),(44,'mae empi','Forward elbow strike.','1'),(45,'mawashi empi uchi','Circular elbow strike. also referred to as mawashi hiji ate.','1'),(46,'mawashi hiji ate','Circular elbow strike. also referred to as mawashi empi uchi.','1'),(47,'mawashi zuki','Roundhouse punch.','1'),(48,'morote zuki','U-punch. punching with both fists simultaneously. also referred to as awase zuki.','1'),(49,'otoshi empi uchi','An elbow strike by dropping the elbow. also referred to as otoshi hiji ate.','1'),(50,'tate empi','Upward elbow strike.','1'),(51,'tate uraken uchi','Vertical back-fist attack.','1'),(52,'tate zuki','Vertical punch. a fist punch with the palm along a verticalplane.','1'),(53,'teisho uchi','Palm heel strike.','1'),(54,'tettsui uchi','Hammer strike. also called kentsui.','1'),(55,'yama zuki','Mountain punch. a wide u-shaped dual punch.','1'),(56,'ura zuki','An upper cut punch used at close range. uraken back knuckle.','1'),(57,'ayumi dachi','A stance found in itosu-kai shito-ryu. it is a natural \"walking\" stance with the weight over the center.','2'),(58,'fudo dachi','Immovable stance. also referred to as sochin dachi.','2'),(59,'gankaku dachi','Crane stance, sometimes referred to as tsuru ashi dachi and sagi ashi dachi.','2'),(60,'hachiji dachi','A natural stance, feet positioned about one shoulder width apart, with feet pointed slightly outward.','2'),(61,'hangetsu dachi','\"half-moon\" stance.','2'),(62,'heiko dachi','A natural stance. feet positioned about one shoulder width apart, with feet pointed straight forward. some kata begin from this position.','2'),(63,'heiko dachi (higaonna line)','A heiko dachi stance, where the front foot is turned slightly inwards while the rear foot is straight. this stance is found in the shinpa kata.','2'),(64,'heisoku dachi','An informal attention stance. feet are together and pointed straight forward.','2'),(65,'horan no kamae','\"egg in the nest ready position.\" a \"ready\" position used in some kata where the fist in covered by the other hand.','2'),(66,'ki-o-tsuke','\"attention\". musubi 0 dachi with open hands down both sides.','2'),(67,'kiba dachi','Staddle stance. also known as naifanchi or naihanchi dachi.','2'),(68,'kokutsu dachi','A stance which has most of the weight to the back. referred to in english as back stance.','2'),(69,'kosa dachi','Crossed-leg stance.','2'),(70,'reinoji dachi','A stance with feet making a \"l-shape.\"','2'),(71,'sagi ashi dachi','One leg stance. also referred to as gankaku dachi or tsuru ashi dachi.','2'),(72,'sanchin dachi','Hour-glass stance.','2'),(73,'seisan dachi','Forward stance with feet shoulders width apart and the back of the heal of the forward foot on a line with the front of the large toe on the rear foot','2'),(74,'shiko dachi','Square stance. a stance often used in goju-ryu and shito-ryu.','2'),(75,'shizentai natural position.','The body remains relaxed but alert.','2'),(76,'sochin dachi','Immovable stance. also referred to as fudo dachi.','2'),(77,'teiji dachi','A stance with the feet in a \"t-shape.\"','2'),(78,'tsuru ashi dachi','Crane stance, also referred to as gankaku dachi and sagi ashi dachi.','2'),(79,'zenkutsu dachi','Forward stance.','2'),(80,'ashi barai','Foot sweep','3'),(81,'ashi waza','Name given to all leg and foot techniques..','3'),(82,'fumikomi','Stomp kick, usually applied to the knee, shin, or instep of an opponent.','3'),(83,'gyaku mawashi geri','Reverse round-house kick.','3'),(84,'keage','Snap kick. (literally, kick upward).','3'),(85,'kekomi','Front thrust kick. also referred to as mae kekomi.','3'),(86,'mae geri keage','Front snap kick. also referred to as mae keage. mae geri','3'),(87,'mawashi geri','Roundhouse kick.','3'),(88,'mikazuki geri','Crescent kick.','3'),(89,'tobi geri','Jump kick.','3'),(90,'uchi mawashi geri','Inside roundhouse kick.','3'),(91,'ushiro geri','Back kick.','3'),(92,'yoko geri keage','Side snap kick. also referred to as yoko keage.','3'),(93,'yoko geri kekomi','Side thrust kick. also referred to as yoko kekomi.','3'),(94,'yoko tobi geri','Flying side kick.','3'),(95,'bo staff','A long stick used as a weapon (approximately 6 feet long).','4'),(96,'ekku','A wooden oar used by the okinawan\'s which was improvised as a weapon.','4'),(97,'jo','Wooden staff about 4\'-5\' in length. the jo originated as a walking stick.','4'),(98,'kama','Sickle','4'),(99,'nunchaku','Two 12  inch batons connected at the ends with a short cord.','4'),(100,'sai','An okinawan weapon that is shaped like the greek letter \'psi\' with the middle being much longer.','4'),(101,'tonfa','A farm tool (believed to have been used as a handle for a millstone) developed into a weapon by the okinawan\'s.','4'),(102,'atemi waza','Striking techniques that are normally used in conjunction with grappling and throwing techniques.','5'),(103,'bogyo roku kyodo','Six defense actions. a basic drill of the japan karate-do ryobu-kai. uses the old names of techniqes such as age te, harai te (or gedan barai), soto yoko te, uchi yoko te, shuto te, and sukui te. budo martial way. the japanese character for \"bu\" (martial) is derived from characters meaning \"stop\" and (a weapon like a) \"halberd.\" in conjunction, then, \"bu\" may have the connotation \"to stop the halberd.\" in karate, there is an assumption that the best way to prevent violent conflict is to emphasize the cultivation of individual character. the way (do) of karate is thus equivalent to the way of bu, taken in this sense of preventing or avoiding violence so far as possible.','5'),(104,'chudan','Mid-section. during the practice of kihon ippon kumite (one step basic sparring), the attacker will normally announce where he/she will attack jodan, chudan, or gedan (upper level, mid-level, or lower level).','5'),(105,'counting to','10 in japanese 1.ichi 2.ni 3.san 4.shi 5.go 6.roku 7.shichi 8.hachi 9.kyu or ku 10.ju','5'),(106,'bunkai','A study of the techniques and applications in kata.','5'),(107,'dani','(dan)level, rank or degree. black belt rank. ranks under black belt are called kyu ranks.','5'),(108,'do','Way/path. the japanese character for \"do\" is the same as the chinese character for tao (as in \"taoism\"). in karate, the connotation is that of a way of attaining enlightenment or a way of improving one\'s character through traditional training.','5'),(109,'dojo','Literally \"place of the way.\" also \"place of enlightenment.\" the place where we practice karate. traditional etiquette prescribes bowing in the direction of the designated front of the dojo (shomen) whenever entering or leaving the dojo.','5'),(110,'domo arigato gozaimashita','Japanese for \"thank you very much.\" at the end of each class, it is proper to bow and thank the instructor and those with whom you\'ve trained.','5'),(111,'embusen','Floor pattern of a given kata.','5'),(112,'empi','(1) one the black belt level kata, translated as \"the flight of a sparrow\". (2) elbow. sometimes referred to as hiji.','5'),(113,'gasshukua','special training camp.','5'),(114,'gedan','Lower section. during the practice of kihon','5'),(115,'ippon kumite','One step sparring.','5'),(116,'gi (do gi) (keiko gi) (karate gi)','Training uniform. in traditional japanese and okinawan karate dojo you would see your sensei for allowable patches and markings.','5'),(117,'go no sen','The tactic where one allows the opponent to attack first so to open up targets for counter acttack.','5'),(118,'gohon kumite','Five step basic sparring. the attacker steps in five consecutive times with a striking technique with each step. the defender steps back five times, blocking each technique. after the fifth block, the defender executes a counter-strike.','5'),(119,'hai','\"yes\".','5'),(120,'hajime','\"begin\". a command given to start a given drill, kata, or kumite.','5'),(121,'hangetsu','A black belt level kata.','5'),(122,'hanshi','\"master.\" an honorary title given to the highest black belts of an organization, signifying their understanding of their art.','5'),(123,'harai waza','Sweeping techniques.','5'),(124,'henka waza','is varied and many, dependent on the given condition.','5'),(125,'hidari','\"left\".','5'),(126,'hiji','\"elbow\", also known as empi.','5'),(127,'hiki-te','The retracting (pulling and twisting) arm during a technique. it gives the balance of power to the forward moving technique. it can also be used as a pulling technique after a grab, or a strike backward with the elbow.','5'),(128,'hitosashi ippon ken','Forefinger knuckle.','5'),(129,'hombu dojo','A term used to refer to the central dojo of an organization.','5'),(130,'inasu','evasion of an on-coming attack through the course of removing the body from the line of attack.','5'),(131,'ippon ken','\"one knuckle fist\".','5'),(132,'ippon nukite','A stabbing action using the extended index finger.','5'),(133,'irimi','to penetrate, to enter. usually describes moving closer to the opponent than the attack as you close in defense.','5'),(134,'jiyu ippon kumite','One step free sparring. the participants can attack with any technique whenever ready.','5'),(135,'jiyu kumite','Free sparring.','5'),(136,'jodan','Upper level. during the practice of kihon ippon kumite (one step basic sparring), the attacker will normally announce where he/she will attack jodan, chudan, or gedan (upper level, mid-level, or lower level).','5'),(137,'jun zuki','The wado ryu term for oi-zuki. kaisho open hand. this refers to the type of blow which is delivered with the open palm. it can also be used to describe other hand blows in which the fist is not fully clenched.','5'),(138,'kakushi waza','\"hidden techniques.\"','5'),(139,'kamae','may also connote proper distance (ma-ai) with respect to one\'s partner. although \"kamae\" generally refers to a physical stance, there is an important parallel in karate between one\'s physical and one\'s psychological bearing. adopting a strong physical stance helps to promote the correlative adoption of a strong psychological attitude. it is important to try so far as possible to maintain a positive and strong mental bearing in karate.','5'),(140,'kamae-te','A command given by the instructor for students to get into position.','5'),(141,'kappo','Techniques of resuscitating people who have succumbed to a shock to the nervous system. karate \"empty hand\". when karate was first introduced to japan, it was called \"to-de\". the characters of tode could be pronounced. however, the meaning of tode is chinese hand.','5'),(142,'karate-do','\"the way of karate\". this implies not only the physical aspect of karate, but also the mental and social aspects of karate.','5'),(143,'karateka','A practitioner of karate. kata a \"form\" or prescribed pattern of movement. (but also \"shoulder.\")','5'),(144,'keiko','(1) training. the secret to success in karate. (2) joined fingertips.','5'),(145,'kempo','\"fist law.\" a generic term to describe fighting systems that uses the fist. in this regard, karate is also kempo.','5'),(146,'kensei','The technique with silent kiai. related to meditation.','5'),(147,'kentsui','Hammer fist also known as tettsui. keri kick. ki mind. spirit. energy. vital-force. intention. (chinese \"chi\") the definitions presented here are very general.','5'),(148,'ki','is one word that cannot be translated directly into any language.','5'),(149,'kiai','A shout delivered for the purpose of focusing all of one\'s energy into a single movement. even when audible kiai are absent, one should try to preserve the feeling of kiai at certain crucial points within karate techniques. manifestation of ki (simultaneous union of spirit and expression of physical strength).','5'),(150,'kihon','(something which is) fundamental. basic techniques.','5'),(151,'kime','Focus of power.','5'),(152,'ko bo ichi','The concept of \"attack-defence connection\".','5'),(153,'kohai','A student junior to oneself.','5'),(154,'koken','Wrist joint.','5'),(155,'kokoro','\"spirit, heart.\" in japanese culture, the spirit dwells in the heart.','5'),(156,'koshin','Rearward.','5'),(157,'kuatsu','The method of resuscitating a person who has lost consciousness due to strangulation or shock.','5'),(158,'kubotan','A self-defense tool developed by takayuki','5'),(159,'kubota','This tool serves normally as a key chain.','5'),(160,'kumade','Bear hand.','5'),(161,'kyoshi','\"knowledgeable person,\" and usually this title is conferred at rokudan or shichidan, depending on system.','5'),(162,'kyu','\"grade\". any rank below shodan.','5'),(163,'kyusho waza','Pressure point techniques. ma-ai proper distancing or timing with respect to one\'s partner. since karate techniques always vary according to circumstances, it is important to understand how differences in initial position affect the timing and application of techniques.','5'),(164,'maai ga toh','\"not proper distance\" mae front.','5'),(165,'mae ashi geri','Kicking with the front leg.','5'),(166,'mae ukemi','forward fall/roll.','5'),(167,'makoto','A feeling of absolute sincerity and total frankness, which requires a pure mind, free from pressure of events.','5'),(168,'manabu','\"learning by imitating.\" a method of studying movement and techniques by following and imitating the instructor.','5'),(169,'matte','\"wait\".','5'),(170,'mawat-te','A command given by the instructor for students to turn around.','5'),(171,'migi','Right.','5'),(172,'mokuso','Meditation. practice often begins or ends with a brief period of meditation. the purpose of meditation is to clear one\'s mind and to develop cognitive equanimity. perhaps more importantly, meditation is an opportunity to become aware of conditioned patterns of thought and behavior so that such patterns can be modified, eliminated or more efficiently put to use.','5'),(173,'mudansha','Students without black-belt ranking.','5'),(174,'onegai shimasu','\"i welcome you to train with me,\" or literally, \"i make a request.\" this is said to one\'s partner when initiating practice.','5'),(175,'oyayubi ippon ken','Thumb knuckle.','5'),(176,'oyo waza','Applications interpreted from techniques in kata, implemented according to a given condition.','5'),(177,'rei','\"respect\". a method of showing respect in japanese culture is the bow. it is proper for the junior person bows lower than the senior person.','5'),(178,'reigi','Etiquette. also referred to as reishiki. observance of proper etiquette at all times (but especially observance of proper dojo etiquette) is as much a part of one\'s training as the practice of techniques. observation of etiquette indicates one\'s sincerity, one\'s willingness to learn, and one\'s recognition of the rights and interests of others.','5'),(179,'rensei','Practice tournament. competitors are critiqued on their performances.','5'),(180,'renshi','\"a person who has mastered oneself.\" this person is considered an expert instructor. this status is prerequisite before attaining the status as kyoshi. renshi \"has a name.\" renshi is no longer one of the many, so to speak. renshi is usually given at yodan to rokudan, depending on the system.','5'),(181,'sanbon kumite','Three step sparring.','5'),(182,'sashite','Raising of the hand either to strike, grab, or block.','5'),(183,'seiken','Forefist.','5'),(184,'seiryuto','Bull strike. a hand technique delivered with the base of the shuto (knife hand).','5'),(185,'seiza','A proper sitting position. sitting on one\'s knees. sitting this way requires acclimatization, but provides both a stable base and greater ease of movement than sitting cross-legged. it is used for the formal opening and closing of the class in many dojo.','5'),(186,'sempai','A senior student.','5'),(187,'sen no sen','Attacking at the exact moment when the opponent attacks.','5'),(188,'sen sen no sen','Attacking before the opponent attacks. preemptive attack.','5'),(189,'sensei','Teacher, \"one who has gone before\". it is usually considered proper to address the instructor during practice as \"sensei\" rather than by his/her name. if the instructor is a permanent instructor for one\'s dojo or for an organization, it is proper to address him/her as \"sensei\" off the mat as well.','5'),(190,'shiai','A match or a contest (event).','5'),(191,'shidoin','Formally recognized instructor who has not yet be recognized as a sensei. assistant instructor.','5'),(192,'shihan','A formal title meaning, approximately, \"master instructor.\" a \"teacher of teachers.\" hanshi is \"wise\" or sage-like, hence the common translation of \"master.\" shinan','5'),(193,'shomen','Front or top of head. also the designated front of a dojo.','5'),(194,'sokuto','Edge of foot. this term is often used to refer to the side thrust kick.','5'),(195,'suwari waza','Techniques from a sitting position.','5'),(196,'tai sabaki','Body movement/shifting.','5'),(197,'taiming ga osoi','\"not proper timing\"','5'),(198,'tsukami waza','Catching technique. a blocking technique by seizing the opponent\'s weapon, arm, or leg. used often for grappling techniques. tsuki a punch or thrust (esp. an attack to the midsection).','5'),(199,'tuite','Grappling skills.','5'),(200,'uchi deshi','A live-in student. a student who lives in a dojo and devotes him/herself both to training and to the maintenence of the dojo (and sometimes to personal service to the sensei of the dojo).','5'),(201,'uke','Block.','5'),(202,'ukemi waza','Breakfall techniques.','5'),(203,'ushiro empi uchi','Striking to the rear with the elbow.','5'),(204,'waza','Technique(s).','5'),(205,'yasumi','Rest. a term used by the instructor to have the students relax, normally following a long series of drills.','5'),(206,'yoi','Ready.','5'),(207,'yoko','Side.','5'),(208,'yoko mawashi empi uchi','Striking with the elbow to the side.','5'),(209,'yowai','\"weak focus\"','5'),(210,'yudansha',' lack belt holder (any rank).','5'),(211,'za-rei','The traditional japanese bow from the kneeling position.','5'),(212,'zanshin','Lit. \"remaining mind/heart.\" even after a karate technique has been completed, one should remain in a balanced and aware state. zanshin thus connotes \"following through\" in a technique, as well as preservation of one\'s awareness so that one is prepared to respond to additional attacks.','5'),(213,'zenshin','Forward.','5'),(214,'zori','Japanese slippers.','5'),(215,'aka','Red aiuchi \"simultaneous scoring technique.\" no point awarded to either contestant. referee brings fists together in front of the chest.','6'),(216,'aka (shiro) ippon','\"red (white) scores ippon.\" the referee obliquely raises his arm on the side of the winner (as in ...no kachi).','6'),(217,'aka (shiro) no kachi','\"red (white) wins!\" the referee obliquely raises his arm on the side of the winner.','6'),(218,'atenai yoni','\"warning without penalty.\" this may be imposed for attended minor infractions or for the first instance of a minor infraction. the referee raises one hand in a fist with the other hand covering it at chest level and shows it to the offender.','6'),(219,'atoshi baraku','\"a little more time left.\" an audible signal will be given by the time keeper 30 seconds before the actual end of the bout.','6'),(220,'attate iru','\"contact\"','6'),(221,'chui','\"warning\"','6'),(222,'encho-sen','\"extension.\" after a draw, the match goes into over-time. referee reopens match with command','6'),(223,'shobu','Hajime. \"fujubun not enough power\"','6'),(224,'fukushin shugo','\"judges conference\"','6'),(225,'hansoku','is also invoked when the number of hansoku-chui and keikoku imposed raise the opponent\'s score to sanbon. the referee points with his index finger to the face of the offender at a 45 degree angle and announces a victory for the opponent.','6'),(226,'hansoku chui','\"warning with an ippon penalty. this is a penalty in which ippon is added to the opponent\'s score. hansoku-chui is usually imposed for infractions for which a keikoku has previously been given in that bout. the referee points with his index finger to the abdomen of the offender of the offender parallel to the floor.','6'),(227,'hantei','\"judgment.\" referee calls for judgment by blowing his whistle and the judges render their decision by flag signal.','6'),(228,'hantei kachi','\"winner by decision\".','6'),(229,'hikiwake','\"draw.\" referee crosses arms over chest, then un-crosses and holds arms out from the body with the palms showing upwards.','6'),(230,'ippon shobu','One point match, used in tournaments.','6'),(231,'jikan','\"time\".','6'),(232,'jogai','\"exit from fighting area.\" the referee points with his index finger at a 45 degree angle to the area boundary on the side of the offender.','6'),(233,'jogai hansoku chui','\"third exit from fighting area\". referee uses two hand signals with announcement \"aka (or shiro) jogai hansoku chui\". he first points with his index finger to the match boundary on the side of the offender, then to the offender\'s abdomen. an ippon is awarded to the opponent.','6'),(234,'jogai keikoku','\"second exit from fighting area.\" waza-ari penalty is given to the opponent.','6'),(235,'kachi','Victorious. (e.g., aka kachi) in a tournament.','6'),(236,'keikoku','is imposed for minor infractions for which a warning has previously been given in that bout, or for infractions not sufficiently serious to merit hansoku-chui. referee points with his index finger to the feet of the offender at an angle of 45 degrees.','6'),(237,'kiken','\"renunciation.\" the referee points one index finger towards the contestant.','6'),(238,'mienai','\"i could not see.\" a call by a judge to indicate that a given technique was not visible form his/her angle.','6'),(239,'mumobi','\"warning for lack of regard for ones own safety.\" referee points one index finger in the air at a 60 degree angle on the side of the offender.','6'),(240,'moto no ichi','\"original position.\" contestants, referee and judge return to their respective standing lines.','6'),(241,'sanbon shobu','Three point match. used in tournaments.','6'),(242,'shiro','White','6'),(243,'shobu hajime','\"start the extended bout.\" shobu sanbon hajime \"start the bout\"','6'),(244,'shugo','\"judges called.\" the referee beckons with his arms to the judges.','6'),(245,'toranai','\"no point\"','6'),(246,'torimasen','\"unacceptable as scoring techniques.\" as hikiwake, but culminating with the palms facing downwards towards body.','6'),(247,'tsuzukete','\"fight on!\" resumption of fighting ordered when unauthorized interruption occurs.','6'),(248,'tsuzukete hajime','\"resume fighting - begin!\" referee standing upon his line, steps back into zenkutsu dachi and brings the palms of this hands toward each other.','6'),(249,'waza ari','\"half point\" yame stop!','6');
/*!40000 ALTER TABLE `mr2358174_karate_entity_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr2358174_karate_entity_users`
--

DROP TABLE IF EXISTS `mr2358174_karate_entity_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_entity_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `date_created` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_ip` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `last_browser` varchar(50) DEFAULT NULL,
  `last_browser_version` varchar(50) DEFAULT NULL,
  `last_platform` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_entity_users`
--

LOCK TABLES `mr2358174_karate_entity_users` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_entity_users` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_entity_users` VALUES (1,'michael','b04963b95c69712d21ccc42786882bf3','2013-10-23 00:08:27','::1','rishermichael@gmail.com','Chrome','30.0.1599.101','Windows');
/*!40000 ALTER TABLE `mr2358174_karate_entity_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr2358174_karate_enum_sections`
--

DROP TABLE IF EXISTS `mr2358174_karate_enum_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mr2358174_karate_enum_sections` (
  `id` int(5) NOT NULL,
  `section` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr2358174_karate_enum_sections`
--

LOCK TABLES `mr2358174_karate_enum_sections` WRITE;
/*!40000 ALTER TABLE `mr2358174_karate_enum_sections` DISABLE KEYS */;
INSERT INTO `mr2358174_karate_enum_sections` VALUES (0,'Blocks'),(1,'Strikes and Punches'),(2,'Stances (Dachi)'),(3,'Kicks (Geri) and Foot Techniques'),(4,'Weapons'),(5,'General Terms'),(6,'Tournament Terminology');
/*!40000 ALTER TABLE `mr2358174_karate_enum_sections` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-07 11:10:05
