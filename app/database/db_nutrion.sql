-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: db_nutrion
-- ------------------------------------------------------
-- Server version	5.7.18-1

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
-- Table structure for table `tb_alimento`
--

DROP TABLE IF EXISTS `tb_alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_alimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(40) NOT NULL,
  `medida` char(40) NOT NULL,
  `tipoProteina` char(15) NOT NULL,
  `proteina` float NOT NULL,
  `caloria` float NOT NULL,
  `carboidrato` float NOT NULL,
  `gordura` float NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nutricionistaXalimento` (`id_nutricionista`),
  CONSTRAINT `fk_nutricionistaXalimento` FOREIGN KEY (`id_nutricionista`) REFERENCES `tb_nutricionista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alimento`
--

LOCK TABLES `tb_alimento` WRITE;
/*!40000 ALTER TABLE `tb_alimento` DISABLE KEYS */;
INSERT INTO `tb_alimento` VALUES (7,'Arroz','g','Vegetal',68,93,29,52,1);
/*!40000 ALTER TABLE `tb_alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_avaliacao`
--

DROP TABLE IF EXISTS `tb_avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_infoFisicas` int(11) NOT NULL,
  `dataAval` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_infofisicasXavaliacao` (`id_infoFisicas`),
  CONSTRAINT `fk_infofisicasXavaliacao` FOREIGN KEY (`id_infoFisicas`) REFERENCES `tb_infofisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_avaliacao`
--

LOCK TABLES `tb_avaliacao` WRITE;
/*!40000 ALTER TABLE `tb_avaliacao` DISABLE KEYS */;
INSERT INTO `tb_avaliacao` VALUES (1,1,'2018-02-21'),(2,2,'2018-01-01'),(4,4,'2018-04-20'),(5,25,'2018-06-18'),(6,26,'2018-06-18'),(7,27,'2018-06-18'),(8,31,'2018-06-18'),(9,32,'2018-06-18');
/*!40000 ALTER TABLE `tb_avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dieta`
--

DROP TABLE IF EXISTS `tb_dieta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dieta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `dataDieta` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pacienteXdieta` (`id_paciente`),
  CONSTRAINT `fk_pacienteXdieta` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dieta`
--

LOCK TABLES `tb_dieta` WRITE;
/*!40000 ALTER TABLE `tb_dieta` DISABLE KEYS */;
INSERT INTO `tb_dieta` VALUES (1,1,'2018-06-10'),(2,2,'2018-06-08');
/*!40000 ALTER TABLE `tb_dieta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_infofisicas`
--

DROP TABLE IF EXISTS `tb_infofisicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_infofisicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `imc` float NOT NULL,
  `cintura` float NOT NULL,
  `quadril` float NOT NULL,
  `icq` float NOT NULL,
  `classificacaoIPAQ` char(25) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pacienteXinfofisicas` (`id_paciente`),
  CONSTRAINT `fk_pacienteXinfofisicas` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_infofisicas`
--

LOCK TABLES `tb_infofisicas` WRITE;
/*!40000 ALTER TABLE `tb_infofisicas` DISABLE KEYS */;
INSERT INTO `tb_infofisicas` VALUES (1,75.3,180,24.5,70,70,0.85,'Sedentário',1),(2,65.8,173,21.5,50,50,0.79,'Ativo',2),(4,66,173,22,52,52,0.81,'Muito Ativo',2),(5,5,5,0.2,16,20,5,'Irregularmente Ativo',1),(6,37,86,61,88,71,55,'Irregularmente Ativo',1),(7,65,88,60,37,2,57,'Irregularmente Ativo',1),(8,86,80,61,79,74,15,'Muito Ativo',1),(9,22,58,10,25,10,18,'SedentÃ¡rio',1),(10,89,6,73,27,40,62,'SedentÃ¡rio',1),(11,81,99,96,2,99,43,'Ativo',1),(12,5,55,84,64,40,95,'Muito Ativo',1),(13,88,99,17,53,81,91,'Irregularmente Ativo',1),(14,96,21,18,8,63,8,'Irregularmente Ativo',1),(15,49,4,22,76,47,89,'Irregularmente Ativo',1),(16,43,66,72,16,46,2,'Irregularmente Ativo',1),(17,74,11,90,93,75,85,'Irregularmente Ativo',1),(18,25,55,45,78,24,1,'Ativo',1),(19,17,63,5,35,72,43,'Ativo',1),(20,68,53,82,73,11,41,'SedentÃ¡rio',1),(21,49,63,20,10,42,28,'Muito Ativo',1),(22,31,79,16,58,99,90,'Muito Ativo',1),(23,85,86,39,27,73,61,'SedentÃ¡rio',1),(24,59,11,79,66,1,19,'Irregularmente Ativo',1),(25,5,40,100,99,59,92,'Muito Ativo',1),(26,33,20,5,6,4,61,'Muito Ativo',1),(27,3,15,15,20,93,11,'Muito Ativo',1),(28,85,2,27.444,58,55,1.054,'SedentÃ¡rio',1),(29,20,2,99,72,78,25,'Ativo',1),(30,27,2,84,66,94,38,'Ativo',1),(31,38,77,49,24,5,80,'SedentÃ¡rio',1),(32,27,1.76,5,32,87,34,'Ativo',1);
/*!40000 ALTER TABLE `tb_infofisicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_itemrefeicao`
--

DROP TABLE IF EXISTS `tb_itemrefeicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_itemrefeicao` (
  `id_refeicao` int(11) NOT NULL,
  `id_alimento` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id_refeicao`,`id_alimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_itemrefeicao`
--

LOCK TABLES `tb_itemrefeicao` WRITE;
/*!40000 ALTER TABLE `tb_itemrefeicao` DISABLE KEYS */;
INSERT INTO `tb_itemrefeicao` VALUES (1,2,4),(2,2,1),(2,4,1),(3,3,1);
/*!40000 ALTER TABLE `tb_itemrefeicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nutricionista`
--

DROP TABLE IF EXISTS `tb_nutricionista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nutricionista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(40) NOT NULL,
  `senha` char(255) NOT NULL,
  `nome` char(40) NOT NULL,
  `conta` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nutricionista`
--

LOCK TABLES `tb_nutricionista` WRITE;
/*!40000 ALTER TABLE `tb_nutricionista` DISABLE KEYS */;
INSERT INTO `tb_nutricionista` VALUES (1,'admin@admin.com','admin','Administrador',''),(2,'cjunqueira@nutrion.com','12345','Carlos Junqueira',''),(3,'jtavares@nutrion.com','abcde','Juliana Tavares',''),(4,'teste@teste.com','teste','testeuser',''),(7,'tesyfekuzu@mailinator.net','12345','Tesy','nutrion'),(11,'guilhermesalome1@gmail.com','','guilherme goncalves','google'),(12,'thiagosalome@gmail.com','','Thiago Salome','google'),(13,'out@teste.com','35asdas','Teste','nutrion'),(14,'hysynumic@mailinator.net','$2y$10$QwZrQJEsm813mTUPRCB/1ewzVmmOcPU1KnuK6kpfjOToyvt0tCmVO','Hy','nutrion'),(15,'dipyr@mailinator.com','$2y$10$/B5Dr6CgA41P1t7QD2pbxO/4RL6JsE3N6Ag7l2nDSipsX2JRS3r3a','Di','nutrion'),(16,'sumel@mailinator.net','$2y$10$Q9ZkJj2GW5u4x6SjTytnTeBjWfrNjm7hBQ0mUecdbDp9615odNWk2','Sumel','nutrion'),(17,'feh.farias11@gmail.com','','','google');
/*!40000 ALTER TABLE `tb_nutricionista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_paciente`
--

DROP TABLE IF EXISTS `tb_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(40) NOT NULL,
  `telefone` char(15) NOT NULL,
  `sexo` char(1) NOT NULL,
  `cpf` char(15) NOT NULL,
  `email` char(40) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_nutricionistaXpaciente` (`id_nutricionista`),
  CONSTRAINT `fk_nutricionistaXpaciente` FOREIGN KEY (`id_nutricionista`) REFERENCES `tb_nutricionista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_paciente`
--

LOCK TABLES `tb_paciente` WRITE;
/*!40000 ALTER TABLE `tb_paciente` DISABLE KEYS */;
INSERT INTO `tb_paciente` VALUES (1,'Everaldo Dias','(31)99999-9999','m','11544238673','everaldo@gmail.com','1996-04-18',1),(2,'Mariana Souza','(31)3030-4444','F','111.111.111-11','mariana@gmail.com','1976-03-28',1);
/*!40000 ALTER TABLE `tb_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_refeicao`
--

DROP TABLE IF EXISTS `tb_refeicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_refeicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(40) NOT NULL,
  `horario` char(5) NOT NULL,
  `id_dieta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dietaXrefeicao` (`id_dieta`),
  CONSTRAINT `fk_dietaXrefeicao` FOREIGN KEY (`id_dieta`) REFERENCES `tb_dieta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_refeicao`
--

LOCK TABLES `tb_refeicao` WRITE;
/*!40000 ALTER TABLE `tb_refeicao` DISABLE KEYS */;
INSERT INTO `tb_refeicao` VALUES (1,'café da manhã','09h00',1),(2,'almoço','12h00',1),(3,'janta','19h00',2);
/*!40000 ALTER TABLE `tb_refeicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_nutrion'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-18 10:59:03
