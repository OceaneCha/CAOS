CREATE DATABASE  IF NOT EXISTS `caos` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `caos`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: caos
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `question_id` int NOT NULL,
  `isCorrect` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `question_id_idx` (`question_id`),
  CONSTRAINT `question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'Florent Pagny',1,0),(2,'Philippe Lavil',1,0),(3,'Enrico Macias',1,0),(4,'Pascal Obispo',1,1),(5,'Gérald de Palmas',2,0),(6,'Etienne Daho',2,1),(7,'Gérard de Nerval',2,0),(8,'François Feldman',2,0),(9,'Sur ton parquet ciré',3,0),(10,'Sur ton vélo rouillé',3,0),(11,'Sur les lames de ton plancher',3,1),(12,'Sur les larmes de ton grand nez',3,0),(13,'Mon voisin, comme chaque année',4,0),(14,'Tryo',4,0),(15,'Zebda',4,1),(16,'Sinsemilia',4,0),(17,'Jane Birkin',5,1),(18,'France Gall',5,0),(19,'Catherine Deneuve',5,0),(20,'Isabelle Adjani',5,0),(21,'Patrick Hernandez',6,1),(22,'Claude François',6,0),(23,'Donna Summer',6,0),(24,'Enrique Iglésias',6,0),(25,'1970',7,1),(26,'1980',7,0),(27,'1990',7,0),(28,'2000',7,0),(29,'Boney M',8,1),(30,'Gang Pas Kool',8,0),(31,'Bee Gees',8,0),(32,'Earth Wind and Fire',8,0),(33,'Miley Cyrus',9,1),(34,'Britney Spears',9,0),(35,'Zac Effron',9,0),(36,'Demi Moore',9,0),(37,'Lady Gaga et Bradley Cooper',10,1),(38,'Tic et Tac',10,0),(39,'Simon and Garfunkel',10,0),(40,'Peter et Sloane',10,0);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `theme_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `theme_id_idx` (`theme_id`),
  CONSTRAINT `theme_id` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'\"Je suis tombé pour elle. Je nai d\'yeux que pour elle. Ma maison, ma tour Eiffel.\" Qui chante ce refrain ?',1),(2,'Qui chante \"Be bop pieds nus sous la lune, sans foi ni toit ni fortune, je passe mon temps à faire n\'importe quoi...',1),(3,'Complétez ces paroles : \"Quelque chose vient de tomber...\"',1),(4,'Qui tombait la chemise en 1999 ?',1),(5,'Qui a chanté \"Dieu est un fumeur de havanes\" en duo avec Serge Gainsbourg ?',1),(6,'Qui a chanté le tube mondial \"Born To Be Alive\" sorti en 1978 ?',1),(7,'Quelle est la décennie emblématique du disco ?',1),(8,'Quel groupe a chanté \"Daddy Cool\" sorti en 1976 ?',1),(9,'Qui chante \"Flowers\" et fait un carton ?',1),(10,'Quel duo pour \"Shallow\" ?',1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `background` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (1,'Musique',NULL),(2,'Cinéma & Séries',NULL),(3,'Cuisine',NULL),(4,'Promo',NULL),(5,'Animaux',NULL),(6,'Astronomie',NULL),(7,'Géographie',NULL),(8,'Astrologie',NULL);
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-05 19:05:09
