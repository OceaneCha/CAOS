-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: caos
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'Florent Pagny',1,0),(2,'Philippe Lavil',1,0),(3,'Enrico Macias',1,0),(4,'Pascal Obispo',1,1),(5,'Gérald de Palmas',2,0),(6,'Etienne Daho',2,1),(7,'Gérard de Nerval',2,0),(8,'François Feldman',2,0),(9,'Sur ton parquet ciré',3,0),(10,'Sur ton vélo rouillé',3,0),(11,'Sur les lames de ton plancher',3,1),(12,'Sur les larmes de ton grand nez',3,0),(13,'Mon voisin, comme chaque année',4,0),(14,'Tryo',4,0),(15,'Zebda',4,1),(16,'Sinsemilia',4,0),(17,'Jane Birkin',5,1),(18,'France Gall',5,0),(19,'Catherine Deneuve',5,0),(20,'Isabelle Adjani',5,0),(21,'Patrick Hernandez',6,1),(22,'Claude François',6,0),(23,'Donna Summer',6,0),(24,'Enrique Iglésias',6,0),(25,'1970',7,1),(26,'1980',7,0),(27,'1990',7,0),(28,'2000',7,0),(29,'Boney M',8,1),(30,'Gang Pas Kool',8,0),(31,'Bee Gees',8,0),(32,'Earth Wind and Fire',8,0),(33,'Miley Cyrus',9,1),(34,'Britney Spears',9,0),(35,'Zac Effron',9,0),(36,'Demi Moore',9,0),(37,'Lady Gaga et Bradley Cooper',10,1),(38,'Tic et Tac',10,0),(39,'Simon and Garfunkel',10,0),(40,'Peter et Sloane',10,0),(41,'Kingstown',12,0),(42,'Kingston',12,1),(43,'Kingsville',12,0),(44,'Jamaica City',12,0),(45,'8449',13,0),(46,'8894',13,0),(47,'8849',13,1),(48,'8984',13,0),(49,'Le Rhin',14,0),(50,'Le Don',14,0),(51,'Le Danube',14,0),(52,'La Volga',14,1),(53,'Selon la position du Soleil et la température de l\'eau ',15,0),(54,'Selon la position du Soleil au moment de la naissance',15,1),(55,'Selon le coefficient des marées le jour de la naissance',15,0),(56,'Selon la position du Soleil et les étoiles',15,0),(57,'Votre apparence et votre style vestimentaire',16,0),(58,'Votre vraie personnalité ',16,1),(59,'Votre face cachée',16,0),(60,'Votre style capillaire',16,0),(61,'Grâce au signe de sa mère, d\'où son nom',17,0),(62,' Grâce à la date, l\'heure de naissance et l\'âge du capitaine',17,0),(63,'Grâce à la date, l\'heure et au lieu de naissance',17,1),(64,' Grâce à la date de naissance et la saison',17,0),(65,'Un signe trés ancien, abandonné depuis l\'Antiquité',18,0),(66,'C\'est bidon. ',18,0),(67,'Le signe astrologique de Harry Potter',18,0),(68,'Le 13e signe du zodiaque, selon des astronomes de la Nasa, qui ont récemment redéfini le calendrier astral en fontion des positions actuelles des planètes',18,1),(69,'air',19,0),(70,'terre',19,0),(71,'eau',19,0),(72,'feu',19,1),(73,'En additionnant jour, mois et année de naissance',20,1),(74,'En additionnant sa date de naisssance, le mois et l\'année en cours',20,0),(75,'En additionnant le nombre de lettres de son nom et l\'année en cours',20,0),(76,'En additionnant sa date de naisssance, sa taille et son poids',20,0),(77,'l\'âge de raison',21,0),(78,'la vieillesse',21,0),(79,'l\'âge mûr',21,0),(80,'l\'adolescence',21,1),(81,'Madame Soleil',22,0),(82,'Elisabeth Tessier',22,1),(83,'Lova Moor',22,0),(84,'Nostradamus',22,0),(85,'Civilisation Hindoue',23,0),(86,'Civilisation  Chinoise',23,0),(87,'Civilisation Sceptique',23,0),(88,'Civilisation Sumérienne',23,1),(89,'le mot \'zoo\'',24,1),(90,'le mot \'zouave\'',24,0),(91,'le mot \'zoroastre\'',24,0),(92,'le mot \'ozô\'',24,0),(93,'Danny DeVito',25,0),(94,'Johnny Depp',25,1),(95,'Christopher Lee',25,0),(96,'Michael Gough',25,0),(97,'Le Big Mac',26,1),(98,'Le Coca Cola',26,0),(99,'Le beurre de cacahuète',26,0),(100,'Le vin',26,0),(101,'6',27,0),(102,'4',27,1),(103,'3',27,0),(104,'5',27,0),(105,'Marc Jacobs',28,0),(106,'Thierry Mugler',28,0),(107,'Jean-Paul Gaultier',28,1),(108,'John Galliano',28,0),(109,'La Belle et le Clochard',29,0),(110,'Merlin l\'Enchanteur',29,0),(111,'Le Livre de la Jungle',29,0),(112,'Bambi',29,1),(113,'Stephen King',30,1),(114,'J.R.R Tolkien',30,0),(115,'Isaac Asimov',30,0),(116,'George R.R Martin',30,0),(117,'1907',31,0),(118,'1917',31,0),(119,'1927',31,1),(120,'1937',31,0),(121,'Frodon Sacquet',32,0),(122,'Rick Grimes',32,1),(123,'Lois Lane',32,0),(124,'Bruce Wayne',32,0),(125,'Un chien nommé Keith',33,0),(126,'Un lapin nommé Lancelot',33,0),(127,'Un lézard nommé Alistair',33,0),(128,'Un singe nommé Marcel',33,1),(129,'Pop-star',34,1),(130,'Vendeuse',34,0),(131,'Peintre',34,0),(132,'Développeuse ',34,0),(133,'La cannelle',35,1),(134,'Le curcuma',35,0),(135,'Le gingembre',35,0),(136,'Le paprika',35,0),(137,'Les oeufs mimosas',36,1),(138,'Les oeufs en meurette',36,0),(139,'Les oeufs à la coque',36,0),(140,'Les oeufs miroir',36,0),(141,'Pâtissière',37,0),(142,'Anglaise',37,1),(143,'Chiboust',37,0),(144,'Crème fraîche',37,0),(145,'Argenteuil',38,0),(146,'Lyon',38,0),(147,'Vichy',38,1),(148,'Bordeaux',38,0),(149,'Des cerises',39,0),(150,'Des poires',39,0),(151,'Des pommes',39,0),(152,'Des pruneaux',39,1),(153,'Une course cycliste',40,1),(154,'Le jumelage de ces deux villes',40,0),(155,'L\'inauguration d\'une ligne de  train',40,0),(156,'Un concours de pâtisserie opposant ces deux villes',40,0),(157,'USA',41,0),(158,'Allemagne',41,1),(159,'Angleterre',41,0),(160,'Canada',41,0),(161,'Dépépiner',42,0),(162,'Dépiner',42,0),(163,'Epépiner',42,1),(164,'Egrener',42,0),(165,'Le tiramisù',43,0),(166,'L\'éclair',43,0),(167,'Le baba au rhum',43,0),(168,'La tarte tatin',43,1),(169,'Les tapixos',44,0),(170,'Les pintxos',44,1),(171,'Les bouritos',44,0),(172,'Les apperitos',44,0),(173,'Le milan',45,0),(174,'La chèvre',45,0),(175,'L’âne',45,1),(176,'Le crocodile',45,0),(177,'Le corbillon',46,0),(178,'Le corbeau',46,0),(179,'Le corbillat',46,1),(180,'Le corbain',46,0),(181,'L\'hippopotame',47,0),(182,'Le rhinocéros',47,1),(183,'Le gorille',47,0),(184,'Le gaur',47,0),(185,'L\'éléphant',48,0),(186,'L\'élan',48,0),(187,'L\'aigle',48,1),(188,'Le serpent',48,0),(189,'Naja',49,1),(190,'Vipère',49,0),(191,'Python',49,0),(192,'Boa',49,0),(193,'Le lama',50,0),(194,'Le chameau',50,0),(195,'Le cerf',50,1),(196,'La girafe',50,0),(197,'La chauve-souris',51,0),(198,'La chèvre',51,0),(199,'La baleine',51,1),(200,'Le dauphin',51,0),(201,'La guêpe',52,1),(202,'La cigale',52,0),(203,'Le criquet',52,0),(204,'La grive',52,0),(205,'Un castor',53,0),(206,'Un chihuahua',53,0),(207,'Un lémurien',53,1),(208,'Un loir',53,0),(209,'Elles craquettent',54,1),(210,'Elles stridulent',54,0),(211,'Elles criaillent',54,0),(212,'Elles zinzinulent',54,0),(213,'les gyoza',55,1),(214,'les raviolis',55,0),(215,'les accras',55,0),(216,'les samossas',55,0),(217,'Coca',56,0),(218,'Monster',56,0),(219,'Powerade',56,0),(220,'Redbull',56,1),(221,'Le chant',57,0),(222,'Le jardinage',57,1),(223,'La couture',57,0),(224,'Le dessin',57,0),(225,'Le chat',58,0),(226,'Le hérisson',58,0),(227,'Le lapin',58,0),(228,'Le colibri',58,1),(229,'Lost',59,0),(230,'Game of Thrones',59,0),(231,'Casa de Papel',59,1),(232,'The Walking Dead',59,0),(233,'Aller à un concert',60,1),(234,'Aller au cinéma',60,0),(235,'Aller au musée',60,0),(236,'Aller à la plage',60,0),(237,'Soso',61,0),(238,'Ouwa',61,1),(239,'Lapin',61,0),(240,'Kiwi',61,0),(241,'Automne',62,0),(242,'Eté',62,1),(243,'Hiver',62,0),(244,'Printemps',62,0),(245,'du Jazz',63,0),(246,'du Hip-hop',63,0),(247,'du Pop-rock',63,1),(248,'du Reggae',63,0),(249,'Fumer',64,0),(250,'Boire un café',64,0),(251,'Prendre une douche',64,0),(252,'Repousser le réveil',64,1),(253,'Hermes',65,1),(254,'Gucci',65,0),(255,'Prada',65,0),(256,'Dior',65,0),(257,'7',66,1),(258,'13',66,0),(259,'9',66,0),(260,'33',66,0),(261,'Gad Elmaleh',67,0),(262,'Florence Foresti',67,1),(263,'Blanche Gardin',67,0),(264,'Claudia Tagbo',67,0),(265,'Aux Seychelles',68,0),(266,'en Irlande',68,0),(267,'sur la Lune',68,1),(268,'sur Mars',68,0),(269,'les raviolis',69,1),(270,'le foie de veau',69,0),(271,'la paëlla',69,0),(272,'le gratin dauphinois',69,0),(273,'Vénus',70,0),(274,'La Terre',70,1),(275,'Mars',70,0),(276,'Mercure',70,0),(277,'149.56',71,1),(278,'146.96',71,0),(279,'145.96',71,0),(280,'146.69',71,0),(281,'Sagittarius',72,0),(282,'Canis Minor',72,0),(283,'Canis Major',72,1),(284,'Messier 79',72,0),(285,'400',73,0),(286,'500',73,0),(287,'600',73,1),(288,'700',73,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'\"Je suis tombé pour elle. Je nai d\'yeux que pour elle. Ma maison, ma tour Eiffel.\" Qui chante ce refrain ?',1),(2,'Qui chante \"Be bop pieds nus sous la lune, sans foi ni toit ni fortune, je passe mon temps à faire n\'importe quoi...',1),(3,'Complétez ces paroles : \"Quelque chose vient de tomber...\"',1),(4,'Qui tombait la chemise en 1999 ?',1),(5,'Qui a chanté \"Dieu est un fumeur de havanes\" en duo avec Serge Gainsbourg ?',1),(6,'Qui a chanté le tube mondial \"Born To Be Alive\" sorti en 1978 ?',1),(7,'Quelle est la décennie emblématique du disco ?',1),(8,'Quel groupe a chanté \"Daddy Cool\" sorti en 1976 ?',1),(9,'Qui chante \"Flowers\" et fait un carton ?',1),(10,'Quel duo pour \"Shallow\" ?',1),(12,'Quelle est la capitale de la Jamaïque ?',7),(13,'L\'Everest est le point culminant de la surface terrestre. Quelle est sa hauteur en mètres ?',7),(14,'Quel est le plus long fleuve d\'Europe ?',7),(15,'Comment détermine-ton le signe astrologique d\'une personne?',8),(16,'Que représente votre ascendant?',8),(17,'Comment calcule-t-on l\'ascendant?',8),(18,'Qu\'est-ce que le signe du serpentaire?',8),(19,'A quel élément appartient le signe du Bélier?',8),(20,'Comment calcule-t-ton son chemin de vie en numérologie?',8),(21,'En astrologie, la planète Mercure symbolise ...',8),(22,'Comment s\'appelait l\'astrologue de François Mitterand?',8),(23,'La première civilisation qui a commencé à observer le ciel et à le découper en constellations est ...',8),(24,'Le terme \'zodiaque\' a le même étymon (radical étymologique) que ...',8),(25,'Lequel de ces acteurs a joué le plus souvent dans les  films de Tim Burton ?',2),(26,'Dans Pulp Fiction, laquelle de ces propositions est  l\'objet d\'une discussion entre Vincent et Jules ?',2),(27,'Combien de films de la saga Star Wars ont été réalisés par Georges Lucas ?',2),(28,'Quel créateur a conçu les costumes du film  Le Cinquième Element de Luc Besson ?',2),(29,'Lequel de ces dessins animés Disney est le plus  ancien ?',2),(30,'Shining est inspiré d\'un roman écrit par :',2),(31,'En quelle année est sorti le premier long-métrage parlant ?',2),(32,'Quel est le nom du personnage principal de la série The Walking Dead ?',2),(33,'Dans la série Friends, quel animal Ross a-t-il adopté ?',2),(34,'Dans la série How I Met Your Mother, quelle activité  Robin a exercé avant de devenir journaliste ?',2),(35,'Avec quelle épice, fabrique-t-on  les traditionnels biscuits de Noël ?',3),(36,'Dans quelle recette les jaunes  d\'oeufs sont-ils émiettés pour être mélangés à la sauce ?',3),(37,'Avec laquelle de ces propositions sont  préparées les îles flottantes ?',3),(38,'Quelle ville a donné son nom à une préparation de carottes ?',3),(39,'Avec quels fruits fait-on le far breton  ?',3),(40,'Le Paris-Brest a été créé pour quelle occasion ?',3),(41,'Quel est le pays d\'origine du hamburger ?',3),(42,'Quel terme signifie \"retirer les pépins\" ?',3),(43,'D\'après la légende, quel dessert est né d\'un accident ?',3),(44,'Quel est le nom donné aux tapas au pays basque ?',3),(45,'Quel animal brait ?',5),(46,'Comment se nomme le petit du corbeau ?',5),(47,'Après l\'éléphant, quel animal terrestre est le plus lourd ?',5),(48,'Quel animal est l\'emblème des États-Unis ?',5),(49,'Quel est l\'autre nom du cobra ?',5),(50,'Parmi ces animaux, qui est le plus rapide ?',5),(51,'Quel animal chante ?',5),(52,'Quel animal vrombit ?',5),(53,' Quel animal est proche du loris ?',5),(54,'Quel est le cri de la cigale et de la cigogne ?',5),(55,'Quel est la plat préféré de Zina?',4),(56,'Parmi ces 4 propositions, quelle est la boisson de prédilection de Louise ?',4),(57,'Quel est le hobby de Manon ?',4),(58,'Quel est l\'animal préféré de Marina?',4),(59,'Naïma a une série préférée, laquelle?',4),(60,'Qu\'est ce qu\'Océane n\'a jamais fait ?',4),(61,'Devine le surnom de Sofia :',4),(62,'Quelle est la saison préférée de Yuan ?',4),(63,'Quel style de musique écoute Sandra?',4),(64,'Que fait Angeline à son réveil ?',4),(65,'C\'est LA marque préférée de Nour : ',4),(66,'Je suis le chiffre porte bonheur de Ravo :',4),(67,'Sarah irait bien boire un thé avec cette star : ',4),(68,'Où Coline rêverait d\'aller ?',4),(69,'Quel plat Carole déteste-t-elle ?',4),(70,'Quelle est la 3ème planète du système solaire ?',6),(71,'Quelle est la distance entre la Terre et le Soleil, en millions de km ?',6),(72,'Comment se nomme l\'objet le plus proche de notre Voie Lactée ?',6),(73,'Combien de fois par second une étoile à neutron peut-elle tourner sur elle-même ?',6);
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

--
-- Dumping routines for database 'caos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-17 14:26:40
