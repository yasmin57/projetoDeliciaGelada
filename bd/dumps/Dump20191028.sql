CREATE DATABASE  IF NOT EXISTS `dbcontatos2019projeto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `dbcontatos2019projeto`;
-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcontatos2019projeto
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblcontatos`
--

DROP TABLE IF EXISTS `tblcontatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcontatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `homepage` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
INSERT INTO `tblcontatos` VALUES (5,'Yasmin Silva','(011) 5557-7777','(011) 9999-9999','yasmin@gmail.com','http://localhost/ds2t20192/yas','http://facebook','sugestao',' ','F','Desenvolvedora '),(8,'Jaiminho','','(055) 5555-5555','jaiminho@outlook','http://localhost/ds2t20192/yas','http://facebook','critica','Você não permite que eu evite a fadiga','M','carteiro');
/*!40000 ALTER TABLE `tblcontatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblniveis`
--

DROP TABLE IF EXISTS `tblniveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblniveis` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `adm_conteudo` tinyint(4) NOT NULL DEFAULT '0',
  `adm_cliente` tinyint(4) NOT NULL DEFAULT '0',
  `adm_usuarios` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (1,'Administrador',1,1,1,1),(2,'Operador de Conteúdo',1,0,0,1),(3,'Relacionamento com o Cliente',0,1,0,1);
/*!40000 ALTER TABLE `tblniveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblusuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `codenivel` tinyint(4) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-28 15:58:48
