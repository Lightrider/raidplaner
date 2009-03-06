-- MySQL dump 10.13  Distrib 5.1.30, for Win32 (ia32)
--
-- Host: localhost    Database: raidplaner
-- ------------------------------------------------------
-- Server version	5.1.30-community

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
-- Table structure for table `chars`
--

DROP TABLE IF EXISTS `chars`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `chars` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `class` enum('warrior','hunter','shaman','priest','druid','rogue','paladin','warlock','mage','deathknight') NOT NULL DEFAULT 'druid',
  `playerid` int(5) NOT NULL DEFAULT '0',
  `faction` enum('alliance','horde') DEFAULT 'horde',
  `race` enum('draenei','bloodelves','gnomes','humans','nightelves','orcs','tauren','trolls','undead','dwarves') NOT NULL DEFAULT 'orcs',
  `level` int(2) NOT NULL DEFAULT '1',
  `hitpoints` int(6) NOT NULL DEFAULT '1',
  `manapoints` int(6) NOT NULL DEFAULT '0',
  `armor` int(6) NOT NULL DEFAULT '1',
  `critchance` float NOT NULL DEFAULT '0',
  `attackpoints` int(6) NOT NULL DEFAULT '0',
  `mp5` int(4) NOT NULL DEFAULT '0',
  `spelldmg` int(4) NOT NULL DEFAULT '0',
  `addheal` int(4) NOT NULL DEFAULT '0',
  `evade` float NOT NULL DEFAULT '0',
  `block` float NOT NULL DEFAULT '0',
  `parry` float NOT NULL DEFAULT '0',
  `info` text,
  `talents` varchar(8) NOT NULL DEFAULT 'xx-xx-xx',
  `type` enum('dd','heal','tank') DEFAULT 'dd',
  `typename` varchar(100) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `chars`
--

LOCK TABLES `chars` WRITE;
/*!40000 ALTER TABLE `chars` DISABLE KEYS */;
/*!40000 ALTER TABLE `chars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `userinfo` text NOT NULL,
  `enabled` enum('yes','no','inactive') NOT NULL DEFAULT 'inactive',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '!',
  `registered` datetime DEFAULT NULL,
  `lastseen` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sdgs','','no','sgsgsgsgsag','!',NULL,NULL),(2,'betagan','','inactive','betagan@betaworx.de','!','2009-02-20 23:26:28',NULL),(3,'Alphagan','','inactive','chris@gbs.de','495fdfa197ee8fe8611d5cf18bd4b838','2009-02-20 23:28:32',NULL),(4,'chris','','inactive','foo@bar.cool','bfb5f4ebec5b0226848bdde0851fbfa1','2009-02-20 23:29:32',NULL),(5,'laber','','yes','nicht@bla.foo','foo','2009-02-21 00:03:42',NULL),(6,'shizzle','','yes','admin@betaworx.de','i584I969','2009-02-21 00:11:17',NULL),(7,'aaaaa','','yes','aaaaaaaaaa','qi30G64Y','2009-02-21 00:13:19',NULL),(8,'fluxus','','yes','fluxus@betaworx.de','f389f511c7c0bc6bfc96a311224bf57f','2009-02-21 22:29:29',NULL),(9,'testuser','','yes','testemail','f845193bc5278311f319b12e84d7edaf','2009-02-22 04:09:34',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-03-06 22:48:23
