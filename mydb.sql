-- Progettazione Web 
DROP DATABASE if exists mydb; 
CREATE DATABASE mydb; 
USE mydb; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `character_identifier`
--

DROP TABLE IF EXISTS `character_identifier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character_identifier` (
  `characterID` varchar(16) NOT NULL,
  `userID` varchar(16) NOT NULL,
  `faction` varchar(12) NOT NULL,
  `race` varchar(16) NOT NULL,
  `class` varchar(16) NOT NULL,
  `gold` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `honor` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `atkpw` int(11) NOT NULL,
  `defencertg` float NOT NULL,
  `dodge` int(11) NOT NULL,
  `critchance` float NOT NULL,
  `criticalstk` int(11) NOT NULL,
  `itemlvl` int(11) NOT NULL,
  `pvpw` int(11) DEFAULT NULL,
  `pvpl` int(11) DEFAULT NULL,
  PRIMARY KEY (`characterID`),
  UNIQUE KEY `idcharacter_UNIQUE` (`characterID`),
  KEY `fk_character_user1_idx` (`userID`),
  CONSTRAINT `fk_character_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character_identifier`
--

LOCK TABLES `character_identifier` WRITE;
/*!40000 ALTER TABLE `character_identifier` DISABLE KEYS */;
INSERT INTO `character_identifier` VALUES ('BEH','RedMario','Alliance','Draenei','Mage',0,1,12,12,1,0,0,0,0,1,0,0),('deddo','Khor','Horde','Goblin','Mage',0,1,0,10,1,0,0,0,0,1,0,0),('DOVAKIN','RedMario','Alliance','Dwarf','Paladin',0,1,0,10,1,0,0,0,0,1,0,0),('Drakoo','RedMario','Horde','Goblin','Mage',0,4,0,10,1,0,0,0,0,1,0,0),('DreadLock','RedMario','Horde','Orc','Warlock',0,5,0,10,1,0,0,0,0,1,0,0),('due','RedMario','Horde','Goblin','Hunter',0,1,0,10,1,0,0,0,0,1,0,0),('gggg','Khor','Horde','Orc','Warlock',0,1,0,10,1,0,0,0,0,1,0,0),('KhorHORDE','Khor','Horde','Goblin','Mage',0,1,0,10,1,0,0,0,0,1,0,0),('KhorHunter','Khor','Alliance','Night Elf','Hunter',5930,4,322,67,26,0.16,32,0.11,27,1,85,0),('lolololo','RedMario','Horde','Goblin','Mage',0,2,0,10,1,0,0,0,0,1,0,0),('pasqualino','Khor','Alliance','Dwarf','Priest',0,1,0,10,1,0,0,0,0,1,0,0),('ThunderKing','RedMario','Horde','Troll','Shaman',0,3,0,10,1,0,0,0,0,1,0,0);
/*!40000 ALTER TABLE `character_identifier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dungeon`
--

DROP TABLE IF EXISTS `dungeon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dungeon` (
  `dungeonID` varchar(24) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`dungeonID`),
  UNIQUE KEY `dungeonID_UNIQUE` (`dungeonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dungeon`
--

LOCK TABLES `dungeon` WRITE;
/*!40000 ALTER TABLE `dungeon` DISABLE KEYS */;
/*!40000 ALTER TABLE `dungeon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equip`
--

DROP TABLE IF EXISTS `equip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equip` (
  `characterID` varchar(16) NOT NULL,
  `itemID` int(11) NOT NULL,
  `slot` varchar(12) NOT NULL,
  PRIMARY KEY (`characterID`,`itemID`),
  KEY `fk_character_has_item_item2_idx` (`itemID`),
  KEY `fk_character_has_item_character2_idx` (`characterID`),
  CONSTRAINT `fk_character_has_item_character2` FOREIGN KEY (`characterID`) REFERENCES `character_identifier` (`characterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_has_item_item2` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equip`
--

LOCK TABLES `equip` WRITE;
/*!40000 ALTER TABLE `equip` DISABLE KEYS */;
INSERT INTO `equip` VALUES ('KhorHunter',10001,'head'),('KhorHunter',10002,'shoulders'),('KhorHunter',10003,'chest'),('KhorHunter',10004,'hands'),('KhorHunter',10005,'legs'),('KhorHunter',10006,'feet'),('KhorHunter',10007,'waist'),('KhorHunter',10008,'wrist'),('KhorHunter',10009,'neck'),('KhorHunter',10010,'ring'),('KhorHunter',10011,'main'),('KhorHunter',10012,'off');
/*!40000 ALTER TABLE `equip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_faction`
--

DROP TABLE IF EXISTS `game_faction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_faction` (
  `factionID` varchar(24) NOT NULL,
  PRIMARY KEY (`factionID`),
  UNIQUE KEY `factionID_UNIQUE` (`factionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_faction`
--

LOCK TABLES `game_faction` WRITE;
/*!40000 ALTER TABLE `game_faction` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_faction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `characterID` varchar(16) NOT NULL,
  `itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`characterID`,`itemID`),
  KEY `fk_character_has_item_item1_idx` (`itemID`),
  KEY `fk_character_has_item_character1_idx` (`characterID`),
  CONSTRAINT `fk_character_has_item_character1` FOREIGN KEY (`characterID`) REFERENCES `character_identifier` (`characterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_has_item_item1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES ('KhorHunter',10001,1),('KhorHunter',10002,84),('KhorHunter',10003,1),('KhorHunter',10004,1),('KhorHunter',10005,1),('KhorHunter',10006,1),('KhorHunter',10010,1),('KhorHunter',10011,1),('KhorHunter',10012,1);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `itemlvl` int(11) NOT NULL,
  `levelreq` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `atkpw` int(11) NOT NULL,
  `defencertg` float NOT NULL,
  `dodge` int(11) NOT NULL,
  `critichance` float NOT NULL,
  `criticalstk` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `category` varchar(16) NOT NULL,
  PRIMARY KEY (`itemID`),
  UNIQUE KEY `idemID_UNIQUE` (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (10001,'Basic Helm',1,1,10,2,0.01,1,0.01,5,10,5,'head'),(10002,'Basic Shoulders',1,1,10,1,0.02,1,0.01,5,15,7,'shoulders'),(10003,'Basic Chest',1,1,10,1,0.02,5,0.01,1,12,6,'chest'),(10004,'Basic Gloves',1,1,5,2,0.01,1,0.01,1,8,4,'hands'),(10005,'Basic Pants',1,1,5,1,0.01,1,0.01,1,10,5,'legs'),(10006,'Basic Boots',1,1,5,1,0.01,1,0.01,1,8,4,'feet'),(10007,'Basic Waist',1,1,5,1,0.01,1,0.01,1,6,3,'waist'),(10008,'Basic Wrist',1,1,5,1,0.01,1,0.01,1,6,3,'wrist'),(10009,'Lucky Pendant',1,1,1,1,0,0,0,0,2,1,'neck'),(10010,'Shiny Ring',1,1,1,0,0,0,0,0,2,1,'ring'),(10011,'Long Sword',1,1,5,15,0.01,5,0.02,10,20,10,'main'),(10012,'Small Shield',1,1,5,0,0.05,15,0.01,1,10,5,'off'),(20001,'Super Helm',2002,4,900,3,0.5,3000,0.9,1000,2000,300,'head');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matrix`
--

DROP TABLE IF EXISTS `matrix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matrix` (
  `faction` varchar(16) NOT NULL,
  `race` varchar(16) NOT NULL,
  `class` varchar(16) NOT NULL,
  PRIMARY KEY (`faction`,`race`,`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matrix`
--

LOCK TABLES `matrix` WRITE;
/*!40000 ALTER TABLE `matrix` DISABLE KEYS */;
INSERT INTO `matrix` VALUES ('Alliance','Draenei','Mage'),('Alliance','Draenei','Paladin'),('Alliance','Draenei','Priest'),('Alliance','Draenei','Shaman'),('Alliance','Draenei','Warrior'),('Alliance','Dwarf','Hunter'),('Alliance','Dwarf','Paladin'),('Alliance','Dwarf','Priest'),('Alliance','Dwarf','Shaman'),('Alliance','Dwarf','Warrior'),('Alliance','Gnome','Mage'),('Alliance','Gnome','Paladin'),('Alliance','Gnome','Warlock'),('Alliance','Gnome','Warrior'),('Alliance','Human','Hunter'),('Alliance','Human','Mage'),('Alliance','Human','Paladin'),('Alliance','Human','Priest'),('Alliance','Human','Warrior'),('Alliance','Night Elf','Hunter'),('Alliance','Night Elf','Mage'),('Alliance','Night Elf','Warlock'),('Alliance','Night Elf','Warrior'),('Alliance','Worgen','Hunter'),('Alliance','Worgen','Mage'),('Alliance','Worgen','Shaman'),('Alliance','Worgen','Warlock'),('Alliance','Worgen','Warrior'),('Horde','Blood Elf','Hunter'),('Horde','Blood Elf','Mage'),('Horde','Blood Elf','Paladin'),('Horde','Blood Elf','Priest'),('Horde','Blood Elf','Warlock'),('Horde','Goblin','Hunter'),('Horde','Goblin','Mage'),('Horde','Goblin','Shaman'),('Horde','Goblin','Warrior'),('Horde','Orc','Hunter'),('Horde','Orc','Shaman'),('Horde','Orc','Warlock'),('Horde','Orc','Warrior'),('Horde','Tauren','Mage'),('Horde','Tauren','Paladin'),('Horde','Tauren','Shaman'),('Horde','Tauren','Warrior'),('Horde','Troll','Hunter'),('Horde','Troll','Mage'),('Horde','Troll','Shaman'),('Horde','Troll','Warlock'),('Horde','Troll','Warrior'),('Horde','Undead','Mage'),('Horde','Undead','Paladin'),('Horde','Undead','Warlock'),('Horde','Undead','Warrior');
/*!40000 ALTER TABLE `matrix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progress` (
  `characterID` varchar(16) NOT NULL,
  `dungeonID` varchar(24) NOT NULL,
  `normal` int(11) DEFAULT NULL,
  `epic` int(11) DEFAULT NULL,
  `legend` int(11) DEFAULT NULL,
  PRIMARY KEY (`characterID`,`dungeonID`),
  KEY `fk_character_has_Dungeon_Dungeon1_idx` (`dungeonID`),
  KEY `fk_character_has_Dungeon_character1_idx` (`characterID`),
  CONSTRAINT `fk_character_has_Dungeon_Dungeon1` FOREIGN KEY (`dungeonID`) REFERENCES `dungeon` (`dungeonID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_has_Dungeon_character1` FOREIGN KEY (`characterID`) REFERENCES `character_identifier` (`characterID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progress`
--

LOCK TABLES `progress` WRITE;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reputation`
--

DROP TABLE IF EXISTS `reputation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reputation` (
  `characterID` varchar(16) NOT NULL,
  `factionID` varchar(24) NOT NULL,
  `reputation` float NOT NULL,
  PRIMARY KEY (`characterID`,`factionID`),
  KEY `fk_character_has_game_faction_game_faction1_idx` (`factionID`),
  KEY `fk_character_has_game_faction_character1_idx` (`characterID`),
  CONSTRAINT `fk_character_has_game_faction_character1` FOREIGN KEY (`characterID`) REFERENCES `character_identifier` (`characterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_character_has_game_faction_game_faction1` FOREIGN KEY (`factionID`) REFERENCES `game_faction` (`factionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reputation`
--

LOCK TABLES `reputation` WRITE;
/*!40000 ALTER TABLE `reputation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reputation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dungeonID` varchar(24) NOT NULL,
  `story` varchar(200) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_section_dungeon1_idx` (`dungeonID`),
  CONSTRAINT `fk_section_dungeon1` FOREIGN KEY (`dungeonID`) REFERENCES `dungeon` (`dungeonID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` varchar(16) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Khor'),('RedMario');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_data` (
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  `lastname` varchar(16) NOT NULL,
  `birth` date NOT NULL,
  `userID` varchar(16) NOT NULL,
  PRIMARY KEY (`email`,`password`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_login_user1_idx` (`userID`),
  CONSTRAINT `fk_login_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_data`
--

LOCK TABLES `user_data` WRITE;
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
INSERT INTO `user_data` VALUES ('nome.cognome@gmail.com','password','Marco','Pontone','1994-05-12','Khor'),('mario.rossi@gmail.com','2066','Mario','Rossi','1995-05-12','RedMario');
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-18 12:22:55
