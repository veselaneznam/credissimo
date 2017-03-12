-- MySQL dump 10.13  Distrib 5.7.17, for osx10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: credissimo
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `attribute`
--
CREATE DATABASE `credissimo` IF NOT EXISTS;

DROP TABLE IF EXISTS `attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FA7AEFFB5E237E06` (`name`),
  KEY `attribute_category_id_fk` (`category_id`),
  CONSTRAINT `attribute_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute`
--

LOCK TABLES `attribute` WRITE;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` VALUES (1,'detail_description','Detail Description',5,1),(2,'inches','Inches',3,1);
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'Cosmetik'),(1,'Mobile');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacture`
--

DROP TABLE IF EXISTS `manufacture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DD197B315E237E06` (`name`),
  KEY `manufacture_category_id_fk` (`category_id`),
  CONSTRAINT `manufacture_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacture`
--

LOCK TABLES `manufacture` WRITE;
/*!40000 ALTER TABLE `manufacture` DISABLE KEYS */;
INSERT INTO `manufacture` VALUES (1,'SONY',1),(2,'wewe',1);
/*!40000 ALTER TABLE `manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) NOT NULL,
  PRIMARY KEY (`version`),
  UNIQUE KEY `migration_versions_version_uindex` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_manufacture` datetime NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `product_category_id_fk` (`category_id`),
  KEY `product_manufacture_id_fk` (`manufacture_id`),
  KEY `product_user_id_fk` (`user_id`),
  CONSTRAINT `product_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_manufacture_id_fk` FOREIGN KEY (`manufacture_id`) REFERENCES `manufacture` (`id`),
  CONSTRAINT `product_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'iphone','dhgfhjsgd','a:0:{}','23','2012-01-01 00:00:00',600,1,1,1,1),(2,'Sony','sony-3','a:0:{}','experia3','2012-01-01 00:00:00',600,1,1,1,1),(3,'Sony','sony-3','a:1:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":7:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0createdAt\";N;s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0updatedAt\";N;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:32:\"It is so beautiful and efficient\";}}','experia3','2012-01-01 00:00:00',600,1,1,1,2),(4,'Sony','sony-3','a:1:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":7:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0createdAt\";N;s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0updatedAt\";N;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:8:\"dasdasda\";}}','experia3','2012-01-01 00:00:00',600,1,1,1,1),(5,'Sony','sony-3','a:1:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":7:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0createdAt\";N;s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0updatedAt\";N;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:4:\"ssss\";}}','experia3','2012-01-01 00:00:00',600,1,1,1,1),(6,'Sony','sony-3','a:2:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":5:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:32:\"It is so beautiful and efficient\";}i:1;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":5:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:2;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:6:\"inches\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:6:\"Inches\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:3;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";r:8;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:2:\"22\";}}','experia3','2012-01-01 00:00:00',600,1,1,1,1),(7,'Sony','sony-3','a:1:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":7:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0createdAt\";N;s:49:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0updatedAt\";N;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:28:\"dasdasda veselaqqksjdhaskdjh\";}}','experia3','2012-01-01 00:00:00',600,1,1,1,2),(8,'Sony','sony-3','a:2:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":5:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:16:\"dasdasda vesela3\";}i:1;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":5:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:2;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:6:\"inches\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:6:\"Inches\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:3;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";r:8;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:2:\"23\";}}','experia3','2012-01-01 00:00:00',600,1,1,1,1),(9,'Test','sony-4','a:2:{i:0;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":5:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:1;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:18:\"detail_description\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:18:\"Detail Description\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:5;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";O:52:\"Proxies\\__CG__\\Credissimo\\Shop\\Domain\\Model\\Category\":3:{s:17:\"__isInitialized__\";b:0;s:41:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0id\";i:1;s:43:\"\0Credissimo\\Shop\\Domain\\Model\\Category\0name\";N;}}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:8:\"rwerwerw\";}i:1;O:43:\"Credissimo\\Shop\\Domain\\Value\\AttributeValue\":2:{s:54:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0attribute\";O:38:\"Credissimo\\Shop\\Domain\\Model\\Attribute\":5:{s:42:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0id\";i:2;s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0name\";s:6:\"inches\";s:45:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0label\";s:6:\"Inches\";s:44:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0type\";i:3;s:48:\"\0Credissimo\\Shop\\Domain\\Model\\Attribute\0category\";r:8;}s:50:\"\0Credissimo\\Shop\\Domain\\Value\\AttributeValue\0value\";s:2:\"22\";}}','experia3','2012-01-01 00:00:00',600,1,2,1,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_image_product_id_fk` (`product_id`),
  CONSTRAINT `product_image_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','vesela.ferdinandova@gmail.com','vesela.ferdinandova@gmail.com',1,NULL,'$2y$13$Zg4oQwaLkqVYGrlZfDgTPuWGiHc5SFBHRDYK7uvjVs7OeyVhlD/d.','2017-03-12 14:09:57',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-12 14:55:23
