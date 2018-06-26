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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alimento`
--

LOCK TABLES `tb_alimento` WRITE;
/*!40000 ALTER TABLE `tb_alimento` DISABLE KEYS */;
INSERT INTO `tb_alimento` VALUES (7,'Arroz','g','Vegetal',68,93,29,52,1),(8,'FeijÃ£o','g','Vegetal',5,6,2,8,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_avaliacao`
--

LOCK TABLES `tb_avaliacao` WRITE;
/*!40000 ALTER TABLE `tb_avaliacao` DISABLE KEYS */;
INSERT INTO `tb_avaliacao` VALUES (11,34,'2018-06-20');
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_infofisicas`
--

LOCK TABLES `tb_infofisicas` WRITE;
/*!40000 ALTER TABLE `tb_infofisicas` DISABLE KEYS */;
INSERT INTO `tb_infofisicas` VALUES (34,52,1.86,15.031,81,45,1.8,'Ativo',1);
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
  PRIMARY KEY (`id_refeicao`,`id_alimento`),
  KEY `fk_alimentoxitem` (`id_alimento`),
  CONSTRAINT `fk_alimentoxitem` FOREIGN KEY (`id_alimento`) REFERENCES `tb_alimento` (`id`),
  CONSTRAINT `fk_refeicaoxitem` FOREIGN KEY (`id_refeicao`) REFERENCES `tb_refeicao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_itemrefeicao`
--

LOCK TABLES `tb_itemrefeicao` WRITE;
/*!40000 ALTER TABLE `tb_itemrefeicao` DISABLE KEYS */;
INSERT INTO `tb_itemrefeicao` VALUES (1,7,4),(2,7,1),(20,7,23),(20,8,92),(21,7,68),(21,8,65);
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
  `chave` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nutricionista`
--

LOCK TABLES `tb_nutricionista` WRITE;
/*!40000 ALTER TABLE `tb_nutricionista` DISABLE KEYS */;
INSERT INTO `tb_nutricionista` VALUES (1,'admin@admin.com','admin','Administrador','','$2y$10$866ngOHnUSmE7TOd3mIbFOqf6nR9MXvhWMUbBtBTyZsOVSHacEhze'),(2,'cjunqueira@nutrion.com','12345','Carlos Junqueira','','$2y$10$AyQ9OuRV0rjyz197axLmYO6DiOwOxhIYDpsJ4yqiQpOTCEkTa6hPi'),(3,'jtavares@nutrion.com','abcde','Juliana Tavares','',NULL),(4,'teste@teste.com','teste','testeuser','',NULL),(7,'tesyfekuzu@mailinator.net','12345','Tesy','nutrion','$2y$10$rnI8o3GmsdBkvVqX5RL40OpyzHpQiim6qlXcyR7eMCC/wbaBAtEAW'),(11,'guilhermesalome1@gmail.com','','guilherme goncalves','google',NULL),(12,'thiagosalome@gmail.com','','Thiago Salome','google',NULL),(13,'out@teste.com','35asdas','Teste','nutrion',NULL),(14,'hysynumic@mailinator.net','$2y$10$QwZrQJEsm813mTUPRCB/1ewzVmmOcPU1KnuK6kpfjOToyvt0tCmVO','Hy','nutrion',NULL),(15,'dipyr@mailinator.com','$2y$10$/B5Dr6CgA41P1t7QD2pbxO/4RL6JsE3N6Ag7l2nDSipsX2JRS3r3a','Di','nutrion',NULL),(16,'sumel@mailinator.net','$2y$10$Q9ZkJj2GW5u4x6SjTytnTeBjWfrNjm7hBQ0mUecdbDp9615odNWk2','Sumel','nutrion',NULL),(17,'feh.farias11@gmail.com','','','google',NULL);
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
INSERT INTO `tb_paciente` VALUES (1,'Everaldo Dias da Silva','(31) 99865-9852','M','691.771.040-72','everaldodias@gmail.com','1998-07-15',1),(2,'Mariana Souza','(31)3030-4444','F','111.111.111-11','mariana@gmail.com','1976-03-28',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_refeicao`
--

LOCK TABLES `tb_refeicao` WRITE;
/*!40000 ALTER TABLE `tb_refeicao` DISABLE KEYS */;
INSERT INTO `tb_refeicao` VALUES (1,'café da manhã','09h00',1),(2,'almoço','12h00',1),(3,'janta','19h00',2),(4,'Teste','20:05',1),(5,'Teste','20:05',1),(6,'Teste','20:05',1),(7,'teste','05:20',1),(8,'teste','05:20',1),(9,'teste','05:20',1),(10,'Teste a','05:06',1),(11,'Teste a','05:06',1),(12,'Teste a','05:06',1),(13,'Teste a','05:06',1),(14,'Teste a','05:06',1),(15,'Teste a','05:06',1),(16,'Teste','06:13',1),(17,'Teste','06:13',1),(18,'Teste','06:13',1),(19,'Novo','13:08',1),(20,'Teste','14:48',1),(21,'Novo','16:11',1);
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

-- Dump completed on 2018-06-22 16:15:24
