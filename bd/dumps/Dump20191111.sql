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
-- Table structure for table `tblcolors`
--

DROP TABLE IF EXISTS `tblcolors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcolors` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `hexadecimal` varchar(7) NOT NULL,
  `classe_css` varchar(1000) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcolors`
--

LOCK TABLES `tblcolors` WRITE;
/*!40000 ALTER TABLE `tblcolors` DISABLE KEYS */;
INSERT INTO `tblcolors` VALUES (1,'Laranja','#d47e46','back_orange'),(2,'Rosa','#870c4a','back_pink'),(3,'Amarelo','#dbcc40','back_yellow'),(4,'Verde Limão','#81b356','back_green_limao'),(5,'Verde Limão Claro','#a6d498','back_green_limao_light'),(6,'Verde','#32a881','back_green'),(7,'Goiaba','#ba6159','back_goiaba');
/*!40000 ALTER TABLE `tblcolors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcontatos`
--

DROP TABLE IF EXISTS `tblcontatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcontatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `homepage` varchar(2048) DEFAULT NULL,
  `facebook` varchar(2048) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
INSERT INTO `tblcontatos` VALUES (1,'Yasmin Silva','(011) 5557-7777','(011) 9999-9999','yasmin@gmail.com','http://localhost/ds2t20192/yas','http://facebook','sugestao','Não apague o banco de novo risos','F','Desenvolvedora '),(2,'Pedro Meideiros','(011) 5557-7777','(011) 9999-9999','pedro@gmail.com','http://localhost/ds2t20192/yas','http://facebook','critica','A International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática. A empresa é uma das poucas na área de tecnologia da informação com uma história contínua que remonta ao século XIX.\r\nA International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática. A empresa é uma das poucas na área de tecnologia da informação com uma história contínua que remonta ao século XIX.\r\nA International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática. A empresa é uma das poucas na área de tecnologia da informação com uma história contínua que remonta ao século XIX.','M','Desenvolvedor');
/*!40000 ALTER TABLE `tblcontatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcuriosidades`
--

DROP TABLE IF EXISTS `tblcuriosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcuriosidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `texto` text NOT NULL,
  `foto` varchar(3000) NOT NULL,
  `codecor` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcuriosidades`
--

LOCK TABLES `tblcuriosidades` WRITE;
/*!40000 ALTER TABLE `tblcuriosidades` DISABLE KEYS */;
INSERT INTO `tblcuriosidades` VALUES (1,'Nossos sucos atuam em prol dos sistemas digestivo e imunológico:','Fonte de fibras alimentares e vitamina C e A, o suco delícia gelada é responsável por fazer com que o nosso sistema digestivo funcione de maneira correta. Além disso, as substâncias antioxidantes fortalecem o nosso sistema imunológico, prevenindo o desenvolvimento de gripes e resfriados','b48e80b5d24f985d98dcd1e022867c66.jpg',1),(3,'Nossos sucos aliviam os sintomas da enxaqueca:','Para quem sofre com a incômoda enxaqueca, o suco delícia gelada pode auxiliar na diminuição dos sintomas, já que os ingredientes são naturais e são fonte de nutrientes como ômega 3 e magnésio possuem propriedades anti-inflamatórias e são calmantes. Para esses casos, dê preferência para a linhaça e o espinafre que são ricos nessa substância.','f3fd7ef50753dc7f53412e4ebc39e6f6.jpg',2),(5,'Nossos produtos proporcionam bem-estar:','Com o organismo limpo, livre de toxinas, a absorção de nutrientes é muito melhor, beneficiando o organismo: \"Por ser essencialmente natural e conter diversos nutrientes em sua constituição, o suco delícia gelada tem efeitos claros no aumento da sensação de bem-estar, atuando, inclusive, na melhoria da qualidade do sono\", analisa a Dra. Daniella Chein.\r\n\r\n','9d37346186826cbbf5bbfa8afb8a92a0.jpg',7),(6,'Possuímos diversos sabores:','Uma das principais vantagens do suco delícia gelada é que ele possui uma diversidade muito grande de combinações. O suco amarelo com abacaxi ou maracujá, o suco vermelho com baterrada e laranja, limão ou cenoura, e para o suco rosa, melancia, e gengibre, hortelã e outras hortaliças de sua preferência.','4493b3896cf3fbe578079a6795052770.jpg',6);
/*!40000 ALTER TABLE `tblcuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblniveis`
--

DROP TABLE IF EXISTS `tblniveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblniveis` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `adm_conteudo` tinyint(4) NOT NULL,
  `adm_cliente` tinyint(4) NOT NULL,
  `adm_usuarios` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `email` varchar(1000) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(2000) NOT NULL,
  `codenivel` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (1,'Yasmin Silva','yasmin@gmail.com','(011) 9999-9999','yasmin123','25.555.884-4','898.999.998-88','202cb962ac59075b964b07152d234b70',1,1);
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

-- Dump completed on 2019-11-11 17:02:09
