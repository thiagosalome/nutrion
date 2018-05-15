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
  `medida` varchar(50) NOT NULL,
  `tipoProteina` varchar(50) NOT NULL,
  `proteina` float NOT NULL,
  `carboidrato` float NOT NULL,
  `gordura` float NOT NULL,
  `caloria` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alimento`
--

LOCK TABLES `tb_alimento` WRITE;
/*!40000 ALTER TABLE `tb_alimento` DISABLE KEYS */;
INSERT INTO `tb_alimento` VALUES (1,'batata','','',4,20,0,24),(2,'ervilha','','',3,3,0,6),(3,'peixe','','',20,20,8,50),(4,'frango','','',25,10,4,39);
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
  KEY `fk_id_infoFisicas` (`id_infoFisicas`),
  CONSTRAINT `fk_id_infoFisicas` FOREIGN KEY (`id_infoFisicas`) REFERENCES `tb_infofisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_avaliacao`
--

LOCK TABLES `tb_avaliacao` WRITE;
/*!40000 ALTER TABLE `tb_avaliacao` DISABLE KEYS */;
INSERT INTO `tb_avaliacao` VALUES (1,1,'2018-02-21'),(2,2,'2018-01-01'),(3,3,'2018-04-15'),(4,4,'2018-04-20');
/*!40000 ALTER TABLE `tb_avaliacao` ENABLE KEYS */;
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
  `altura` int(11) NOT NULL,
  `imc` float NOT NULL,
  `cintura` int(11) NOT NULL,
  `quadril` int(11) NOT NULL,
  `icq` float NOT NULL,
  `classificacaoIPAQ` char(25) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_paciente` (`id_paciente`),
  CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_infofisicas`
--

LOCK TABLES `tb_infofisicas` WRITE;
/*!40000 ALTER TABLE `tb_infofisicas` DISABLE KEYS */;
INSERT INTO `tb_infofisicas` VALUES (1,75.3,180,24.5,70,70,0.85,'Sedentário',1),(2,65.8,173,21.5,50,50,0.79,'Ativo',2),(3,68,180,24,68,68,0.83,'Irregularmente Ativo',3),(4,66,173,22,52,52,0.81,'Muito Ativo',2);
/*!40000 ALTER TABLE `tb_infofisicas` ENABLE KEYS */;
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
  `senha` char(10) NOT NULL,
  `nome` char(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nutricionista`
--

LOCK TABLES `tb_nutricionista` WRITE;
/*!40000 ALTER TABLE `tb_nutricionista` DISABLE KEYS */;
INSERT INTO `tb_nutricionista` VALUES (1,'cjunqueira@nutrion.com','12345','Carlos Junqueira'),(2,'jtavares@nutrion.com','abcde','Juliana Tavares'),(3,'admin@admin.com','admin','Administrador'),(4,'teste@teste.com','teste','testeuser');
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
  `email` varchar(100) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `id_nutricionista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_id_nutricionista` (`id_nutricionista`),
  CONSTRAINT `fk_id_nutricionista` FOREIGN KEY (`id_nutricionista`) REFERENCES `tb_nutricionista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_paciente`
--

LOCK TABLES `tb_paciente` WRITE;
/*!40000 ALTER TABLE `tb_paciente` DISABLE KEYS */;
INSERT INTO `tb_paciente` VALUES (1,'Everaldo Dias','(31)99999-9999','M','999.999.999-99',NULL,'1996-04-30',1),(2,'Mariana Souza','(31)3030-4444','F','111.111.111-11',NULL,'1976-03-28',2),(3,'Douglas Miranda','(31)3343-2244','M','222.222.222-22',NULL,'1985-02-11',3),(4,'Tek','(31)99659-9999','F','850.224.880-43','tekuxuzeze@mailinator.com','2013-03-16',1);
/*!40000 ALTER TABLE `tb_paciente` ENABLE KEYS */;
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

-- Dump completed on 2018-05-15  0:28:46
