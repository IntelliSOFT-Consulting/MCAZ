-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: mcaz_pv_prod
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.16.04.1

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
-- Table structure for table `aefi_reactions`
--

DROP TABLE IF EXISTS `aefi_reactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aefi_reactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aefi_id` int(11) DEFAULT NULL,
  `reaction_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aefi_reactions`
--

LOCK TABLES `aefi_reactions` WRITE;
/*!40000 ALTER TABLE `aefi_reactions` DISABLE KEYS */;
INSERT INTO `aefi_reactions` VALUES (1,176,'Aortic stenosis & incompetence','2022-05-04 09:03:32','2022-05-04 09:03:32'),(2,176,'Bleeding PR (excl gut hemorrhage & piles)','2022-05-04 09:03:32','2022-05-04 09:03:32'),(3,177,'Bleeding PR (excl gut hemorrhage & piles)','2022-05-04 09:04:33','2022-05-04 09:04:33'),(4,178,'Aches & pains in legs','2022-05-04 09:25:41','2022-05-04 09:25:41'),(5,178,'Aches & pains in legs','2022-05-04 09:25:41','2022-05-04 09:25:41'),(6,178,'HLA-A*3101 assay positive','2022-05-04 09:25:41','2022-05-04 09:25:41'),(7,179,'Aortic stenosis & incompetence','2022-05-04 10:38:02','2022-05-04 10:38:02'),(8,179,'Bone & joint tuberculosis','2022-05-04 10:38:02','2022-05-04 10:38:02'),(9,180,'Acute laryngitis & tracheitis','2022-05-23 06:25:03','2022-05-23 06:25:03'),(10,182,'Acute laryngitis & tracheitis','2022-08-08 14:07:50','2022-08-08 14:07:50'),(11,182,'Bleeding PR (excl gut hemorrhage & piles)','2022-08-08 14:07:50','2022-08-08 14:07:50'),(12,182,'Chills & fever','2022-08-08 14:07:50','2022-08-08 14:07:50'),(13,182,'Heart & lung transplant','2022-08-08 14:07:50','2022-08-08 14:07:50'),(14,182,'Oedema lips & face','2022-08-08 14:07:50','2022-08-08 14:07:50');
/*!40000 ALTER TABLE `aefi_reactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-26 14:42:35
