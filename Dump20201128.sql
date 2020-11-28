CREATE DATABASE  IF NOT EXISTS `herd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `herd`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: herd
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `const_herd`
--

DROP TABLE IF EXISTS `const_herd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_herd` (
  `herd_id` int NOT NULL AUTO_INCREMENT,
  `type_id` int DEFAULT NULL,
  `owner_id` int DEFAULT NULL,
  `mother_id` int DEFAULT NULL,
  `img_url` varchar(450) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `age` int DEFAULT NULL,
  `herd_name` varchar(450) DEFAULT NULL,
  `herd_year` int DEFAULT NULL,
  `p_type` int DEFAULT '0',
  PRIMARY KEY (`herd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_herd`
--

LOCK TABLES `const_herd` WRITE;
/*!40000 ALTER TABLE `const_herd` DISABLE KEYS */;
INSERT INTO `const_herd` VALUES (1,1,0,NULL,NULL,NULL,NULL,'-',NULL,0),(14,1,3,1,'1605494519.png',1,NULL,'Хүрэн азарга',NULL,1),(15,1,1,1,NULL,1,NULL,'Хонгор гүү /хэнтий',NULL,2),(16,1,1,15,NULL,14,NULL,'Хонгор байдас /4 хөл цагаан/',NULL,0),(17,1,1,15,NULL,14,NULL,'Зээрд даага',NULL,0),(18,1,1,1,NULL,1,NULL,'Саарал гүү',NULL,2),(19,1,1,18,NULL,14,NULL,'Хул унага',NULL,0),(20,1,1,1,NULL,1,NULL,'Хээр гүү /Мэргээ/',NULL,2),(21,1,1,20,NULL,14,NULL,'Хээр даага',NULL,0),(22,1,3,1,NULL,1,NULL,'Хүрэн гүү /өвөрхангай/',NULL,2),(23,1,3,22,NULL,14,NULL,'Зээрд даага',NULL,0),(24,1,2,1,NULL,1,NULL,'Зээрд гүү /өвөрхангай/',NULL,2),(25,1,2,24,NULL,14,NULL,'Зээрд даага',NULL,0),(26,1,2,1,NULL,1,NULL,'Зэгэл хонгор гүү',NULL,2),(27,1,2,26,NULL,14,NULL,'Сартай хонгор үрээ',NULL,0),(28,1,2,26,NULL,14,NULL,'Хонгор байдас',NULL,0),(29,1,2,26,NULL,14,NULL,'Зэгэл унага',NULL,0),(30,1,4,1,NULL,1,NULL,'Хонгор гүү /ж тамгатай/',NULL,2),(31,1,4,30,NULL,14,NULL,'Хонгор даага',NULL,0),(32,1,4,30,NULL,14,NULL,'Сартай хонгор унага',NULL,0),(33,1,6,1,NULL,1,NULL,'Хүрэн халзан гүү',NULL,2),(34,1,6,33,NULL,14,NULL,'Хүрэн халзан даага',NULL,0),(35,1,4,1,NULL,1,NULL,'Хул гүү',NULL,2),(36,1,4,35,NULL,14,NULL,'Хонгор халзан даага',NULL,0),(37,1,3,1,NULL,1,NULL,'Хээр гүү',NULL,2),(38,1,3,37,NULL,14,NULL,'Хээр унага',NULL,0),(39,1,1,1,NULL,1,NULL,'Хар байдас',NULL,0),(40,1,3,1,NULL,1,NULL,'Хамар цагаан хонгор морь',NULL,0),(41,1,3,1,NULL,1,NULL,'Хул морь',NULL,0),(42,1,3,1,NULL,1,NULL,'Хээр морь',NULL,0),(43,1,1,1,NULL,1,NULL,'Халиун морь',NULL,0),(44,1,1,1,NULL,1,NULL,'Бор морь',NULL,0),(45,1,1,1,NULL,1,NULL,'Хонгор морь /Сэтэрт/',NULL,0),(46,1,4,1,NULL,1,NULL,'Хонгор халзан хязаалан',NULL,0),(47,2,1,1,NULL,1,NULL,'Хонгор азарга',NULL,1),(48,2,2,1,NULL,1,NULL,'Хар алаг гүү',NULL,2),(49,2,2,48,NULL,47,NULL,'Хар унагатай',NULL,0),(50,2,1,1,NULL,1,NULL,'Хул гүүний /хэнтий/',NULL,2),(51,2,1,50,NULL,47,NULL,'Зээрд даага',NULL,0),(52,2,4,1,NULL,1,NULL,'Бор халзан гүү',NULL,2),(53,2,1,52,NULL,47,NULL,'Толбот',NULL,0),(54,2,4,52,NULL,47,NULL,'Бор халзан шүдлэн',NULL,0),(55,2,4,52,NULL,47,NULL,'Саарал даага',NULL,0),(56,2,5,1,NULL,1,NULL,'Хул алаг гүү',NULL,2),(57,2,5,56,NULL,47,NULL,'Хонгор даага',NULL,0),(58,2,5,56,NULL,48,NULL,'Хул алаг унага',NULL,0),(59,2,1,1,NULL,1,NULL,'Бор халиун гүү',NULL,2),(60,2,2,1,NULL,1,NULL,'Хээр гүү',NULL,2),(61,2,2,60,NULL,47,NULL,'Хээр даага',NULL,0),(62,2,7,1,NULL,1,NULL,'Хул гүү',NULL,2),(63,2,7,62,NULL,47,NULL,'Бор даага',NULL,0),(64,2,1,1,NULL,1,NULL,'Бор гүү хулгар',NULL,2),(65,2,1,64,NULL,47,NULL,'Зээр унага',NULL,0),(66,2,1,1,NULL,1,NULL,'Халиун хязаалан үрээ',NULL,0),(67,2,1,1,NULL,1,NULL,'Халиун шүдлэн үрээ',NULL,0),(68,2,1,1,NULL,1,NULL,'Халиун байдас',NULL,0),(69,2,3,1,NULL,1,NULL,'Хээр морь',NULL,0),(70,2,7,1,NULL,1,NULL,'Цавьдар морь',NULL,0),(71,2,3,1,NULL,1,NULL,'Хонгор морь',NULL,0),(72,2,4,1,NULL,1,NULL,'Хул үрээ /хулгар/',NULL,0),(73,2,2,1,NULL,1,NULL,'Хонгор байдас /бөгтөр/',NULL,0),(74,2,2,1,NULL,1,NULL,'Хул байдас /бөгтөр/',NULL,0),(75,3,1,1,NULL,1,NULL,'Буурал азарга',NULL,1),(76,3,1,1,NULL,1,NULL,'Шарга гүү',NULL,2),(77,3,1,76,NULL,75,NULL,'Шарга унага',NULL,0),(78,3,1,1,NULL,1,NULL,'Шарга гүү',NULL,2),(79,3,1,78,NULL,75,NULL,'Хул унага',NULL,0),(80,3,2,1,NULL,1,NULL,'Хүрэн гүү /бөгтөр/',NULL,2),(81,3,2,80,NULL,75,NULL,'Хүрэн даага',NULL,0),(82,3,2,80,NULL,75,NULL,'Зээрд унага',NULL,0),(83,3,2,1,NULL,1,NULL,'Сартай хүрэн гүү',NULL,2),(84,3,2,83,NULL,75,NULL,'Буурал унага',NULL,0),(85,3,1,1,NULL,1,NULL,'Бор гүү',NULL,2),(86,3,1,85,NULL,75,NULL,'Хээр даага',NULL,0),(87,3,4,1,NULL,1,NULL,'Хул өсгий цагаан байдас /Ж тамгат/',NULL,0),(88,3,4,1,NULL,1,NULL,'Зээрд гүү',NULL,2),(89,3,4,88,NULL,75,NULL,'Буурал даага',NULL,0),(90,3,5,1,NULL,1,NULL,'Хонгор гүү',NULL,2),(91,3,5,90,NULL,75,NULL,'Буурал даага',NULL,0),(92,3,7,1,NULL,1,NULL,'Хээр гүү',NULL,2);
/*!40000 ALTER TABLE `const_herd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_owner`
--

DROP TABLE IF EXISTS `const_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_owner` (
  `owner_id` int NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_owner`
--

LOCK TABLES `const_owner` WRITE;
/*!40000 ALTER TABLE `const_owner` DISABLE KEYS */;
INSERT INTO `const_owner` VALUES (1,'A'),(2,'I'),(3,'O'),(4,'D'),(5,'M'),(6,'S'),(7,'B');
/*!40000 ALTER TABLE `const_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_type`
--

DROP TABLE IF EXISTS `const_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_type`
--

LOCK TABLES `const_type` WRITE;
/*!40000 ALTER TABLE `const_type` DISABLE KEYS */;
INSERT INTO `const_type` VALUES (1,'Хүрэн'),(2,'Хонгор'),(3,'Буурал');
/*!40000 ALTER TABLE `const_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_year`
--

DROP TABLE IF EXISTS `const_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_year` (
  `year_id` int NOT NULL,
  `year_name` int DEFAULT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_year`
--

LOCK TABLES `const_year` WRITE;
/*!40000 ALTER TABLE `const_year` DISABLE KEYS */;
INSERT INTO `const_year` VALUES (2018,2018),(2019,2019),(2020,2020),(2021,2021),(2022,2022),(2023,2023);
/*!40000 ALTER TABLE `const_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `count_herd`
--

DROP TABLE IF EXISTS `count_herd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `count_herd` (
  `count_id` int NOT NULL AUTO_INCREMENT,
  `count_year` int DEFAULT NULL,
  `herd_id` int DEFAULT NULL,
  `is_enable` int DEFAULT NULL,
  `comment` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`count_id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `count_herd`
--

LOCK TABLES `count_herd` WRITE;
/*!40000 ALTER TABLE `count_herd` DISABLE KEYS */;
INSERT INTO `count_herd` VALUES (161,2020,1,1,NULL),(162,2020,14,1,'8'),(163,2020,15,1,NULL),(164,2020,16,1,NULL),(165,2020,17,1,NULL),(166,2020,18,1,NULL),(167,2020,19,1,NULL),(168,2020,20,1,NULL),(169,2020,21,1,NULL),(170,2020,22,1,NULL),(171,2020,23,1,NULL),(172,2020,24,1,NULL),(173,2020,25,1,NULL),(174,2020,26,1,NULL),(175,2020,27,1,NULL),(176,2020,28,1,NULL),(177,2020,29,1,NULL),(178,2020,30,1,NULL),(179,2020,31,1,NULL),(180,2020,32,1,NULL),(181,2020,33,1,NULL),(182,2020,34,1,NULL),(183,2020,35,1,NULL),(184,2020,36,1,NULL),(185,2020,37,1,NULL),(186,2020,38,1,NULL),(187,2020,39,1,NULL),(188,2020,40,1,NULL),(189,2020,41,1,'8'),(190,2020,42,1,NULL),(191,2020,43,1,NULL),(192,2020,44,1,NULL),(193,2020,45,1,NULL),(194,2020,46,1,NULL),(195,2020,47,1,NULL),(196,2020,48,1,NULL),(197,2020,49,1,NULL),(198,2020,50,1,NULL),(199,2020,51,1,NULL),(200,2020,52,1,NULL),(201,2020,53,1,NULL),(202,2020,54,1,NULL),(203,2020,55,1,NULL),(204,2020,56,1,NULL),(205,2020,57,1,NULL),(206,2020,58,1,NULL),(207,2020,59,1,NULL),(208,2020,60,1,NULL),(209,2020,61,1,NULL),(210,2020,62,1,NULL),(211,2020,63,1,NULL),(212,2020,64,1,NULL),(213,2020,65,1,NULL),(214,2020,66,1,NULL),(215,2020,67,1,NULL),(216,2020,68,1,NULL),(217,2020,69,1,NULL),(218,2020,70,1,NULL),(219,2020,71,1,NULL),(220,2020,72,1,NULL),(221,2020,73,1,NULL),(222,2020,74,1,NULL),(223,2020,75,1,NULL),(224,2020,76,1,NULL),(225,2020,77,1,NULL),(226,2020,78,1,NULL),(227,2020,79,1,NULL),(228,2020,80,1,NULL),(229,2020,81,1,NULL),(230,2020,82,1,NULL),(231,2020,83,1,NULL),(232,2020,84,1,NULL),(233,2020,85,1,NULL),(234,2020,86,1,NULL),(235,2020,87,1,NULL),(236,2020,88,1,NULL),(237,2020,89,1,NULL),(238,2020,90,1,NULL),(239,2020,91,1,NULL),(240,2020,92,1,NULL);
/*!40000 ALTER TABLE `count_herd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Selenge','selengetu@gmail.com','$2y$10$sCHp.pgmWWUPtrpoivjYK.4uxn5772UDXY3OEiwxTruJdTBXI01Qi',NULL,'2020-11-02 01:31:07','2020-11-02 01:31:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_const_herd`
--

DROP TABLE IF EXISTS `v_const_herd`;
/*!50001 DROP VIEW IF EXISTS `v_const_herd`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_const_herd` AS SELECT 
 1 AS `herd_id`,
 1 AS `type_id`,
 1 AS `owner_id`,
 1 AS `mother_id`,
 1 AS `img_url`,
 1 AS `parent_id`,
 1 AS `age`,
 1 AS `herd_name`,
 1 AS `owner_name`,
 1 AS `type_name`,
 1 AS `parent_name`,
 1 AS `mother_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_count_herd`
--

DROP TABLE IF EXISTS `v_count_herd`;
/*!50001 DROP VIEW IF EXISTS `v_count_herd`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_count_herd` AS SELECT 
 1 AS `herd_id`,
 1 AS `type_id`,
 1 AS `owner_id`,
 1 AS `mother_id`,
 1 AS `img_url`,
 1 AS `parent_id`,
 1 AS `age`,
 1 AS `herd_name`,
 1 AS `owner_name`,
 1 AS `type_name`,
 1 AS `parent_name`,
 1 AS `mother_name`,
 1 AS `count_year`,
 1 AS `is_enable`,
 1 AS `comment`,
 1 AS `count_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_const_herd`
--

/*!50001 DROP VIEW IF EXISTS `v_const_herd`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_const_herd` AS select `const_herd`.`herd_id` AS `herd_id`,`const_herd`.`type_id` AS `type_id`,`const_herd`.`owner_id` AS `owner_id`,`const_herd`.`mother_id` AS `mother_id`,`const_herd`.`img_url` AS `img_url`,`const_herd`.`parent_id` AS `parent_id`,`const_herd`.`age` AS `age`,`const_herd`.`herd_name` AS `herd_name`,`const_owner`.`owner_name` AS `owner_name`,`const_type`.`type_name` AS `type_name`,`h`.`herd_name` AS `parent_name`,`m`.`herd_name` AS `mother_name` from ((((`const_herd` join `const_owner`) join `const_type`) join `const_herd` `h`) join `const_herd` `m`) where ((`const_herd`.`owner_id` = `const_owner`.`owner_id`) and (`const_type`.`type_id` = `const_herd`.`type_id`) and (`const_herd`.`parent_id` = `h`.`herd_id`) and (`const_herd`.`mother_id` = `m`.`herd_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_count_herd`
--

/*!50001 DROP VIEW IF EXISTS `v_count_herd`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_count_herd` AS select `h`.`herd_id` AS `herd_id`,`h`.`type_id` AS `type_id`,`h`.`owner_id` AS `owner_id`,`h`.`mother_id` AS `mother_id`,`h`.`img_url` AS `img_url`,`h`.`parent_id` AS `parent_id`,`h`.`age` AS `age`,`h`.`herd_name` AS `herd_name`,`h`.`owner_name` AS `owner_name`,`h`.`type_name` AS `type_name`,`h`.`parent_name` AS `parent_name`,`h`.`mother_name` AS `mother_name`,`c`.`count_year` AS `count_year`,`c`.`is_enable` AS `is_enable`,`c`.`comment` AS `comment`,`c`.`count_id` AS `count_id` from (`count_herd` `c` join `v_const_herd` `h`) where (`h`.`herd_id` = `c`.`herd_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-28 19:04:38
