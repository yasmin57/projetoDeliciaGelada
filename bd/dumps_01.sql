CREATE DATABASE  IF NOT EXISTS `dbcontatos2019projeto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbcontatos2019projeto`;
-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbcontatos2019projeto
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Dumping data for table `tblcolors`
--

LOCK TABLES `tblcolors` WRITE;
/*!40000 ALTER TABLE `tblcolors` DISABLE KEYS */;
INSERT INTO `tblcolors` VALUES (1,'Laranja','#d47e46','back_orange'),(2,'Rosa','#870c4a','back_pink'),(3,'Amarelo','#dbcc40','back_yellow'),(4,'Verde Limão','#81b356','back_green_limao'),(5,'Verde Limão Claro','#a6d498','back_green_limao_light'),(6,'Verde','#32a881','back_green'),(7,'Goiaba','#ba6159','back_goiaba');
/*!40000 ALTER TABLE `tblcolors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
INSERT INTO `tblcontatos` VALUES (1,'Yasmin Silva','(011) 5557-7777','(011) 9999-9999','yasmin@gmail.com','http://localhost/ds2t20192/yas','http://facebook','sugestao','Não apague o banco de novo risos','F','Desenvolvedora '),(2,'Pedro Meideiros','(011) 5557-7777','(011) 9999-9999','pedro@gmail.com','http://localhost/ds2t20192/yas','http://facebook','critica','A International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática. A empresa é uma das poucas na área de tecnologia da informação com uma história contínua que remonta ao século XIX.\r\nA International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática. A empresa é uma das poucas na área de tecnologia da informação com uma história contínua que remonta ao século XIX.\r\nA International Business Machines Corporation é uma empresa dos Estados Unidos voltada para a área de informática. A empresa é uma das poucas na área de tecnologia da informação com uma história contínua que remonta ao século XIX.','M','Desenvolvedor');
/*!40000 ALTER TABLE `tblcontatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblcuriosidades`
--

LOCK TABLES `tblcuriosidades` WRITE;
/*!40000 ALTER TABLE `tblcuriosidades` DISABLE KEYS */;
INSERT INTO `tblcuriosidades` VALUES (1,'Nossos sucos atuam em prol dos sistemas digestivo e imunológico:','Fonte de fibras alimentares e vitamina C e A, o suco delícia gelada é responsável por fazer com que o nosso sistema digestivo funcione de maneira correta. Além disso, as substâncias antioxidantes fortalecem o nosso sistema imunológico, prevenindo o desenvolvimento de gripes e resfriados','72bffd2d9b21b69e7683f4f927ac3a72.jpg',7,1,1),(3,'Nossos sucos aliviam os sintomas da enxaqueca:','Para quem sofre com a incômoda enxaqueca, o suco delícia gelada pode auxiliar na diminuição dos sintomas, já que os ingredientes são naturais e são fonte de nutrientes como ômega 3 e magnésio possuem propriedades anti-inflamatórias e são calmantes. Para esses casos, dê preferência para a linhaça e o espinafre que são ricos nessa substância.','f3fd7ef50753dc7f53412e4ebc39e6f6.jpg',6,1,3),(5,'Nossos produtos proporcionam bem-estar:','Com o organismo limpo, livre de toxinas, a absorção de nutrientes é muito melhor, beneficiando o organismo: \"Por ser essencialmente natural e conter diversos nutrientes em sua constituição, o suco delícia gelada tem efeitos claros no aumento da sensação de bem-estar, atuando, inclusive, na melhoria da qualidade do sono\", analisa a Dra. Daniella Chein.\r\n\r\n','9d37346186826cbbf5bbfa8afb8a92a0.jpg',2,1,2),(6,'Possuímos diversos sabores:','Uma das principais vantagens do suco delícia gelada é que ele possui uma diversidade muito grande de combinações. O suco amarelo com abacaxi ou maracujá, o suco vermelho com baterrada e laranja, limão ou cenoura, e para o suco rosa, melancia, e gengibre, hortelã e outras hortaliças de sua preferência.','4493b3896cf3fbe578079a6795052770.jpg',6,1,1);
/*!40000 ALTER TABLE `tblcuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbllojas`
--

LOCK TABLES `tbllojas` WRITE;
/*!40000 ALTER TABLE `tbllojas` DISABLE KEYS */;
INSERT INTO `tbllojas` VALUES (1,'Bauru - SP','Shopping Bauru','RUA HENRIQUE SAVI',55,'(011) 2109-6300','(011) 4444-5555','Segunda à Sábado das 10h às 22h.','4dfd2bb2a32c8bb837e11c280fdc2391.png',1),(4,'Barueri - SP','Parque Shopping','Rua General de Divisão Pedro Rodrigues da Silva',400,'(011) 3656-6599','(011) 5576-5895','Segunda à Sábado das 10h às 22h.','184378cf90fd3b8df0b7be15214f4b2b.png',1);
/*!40000 ALTER TABLE `tbllojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (1,'Administrador',1,1,1,1),(2,'Operador de Conteúdo',1,0,0,1),(3,'Relacionamento com o Cliente',0,1,0,1),(4,'Teste',0,1,1,1);
/*!40000 ALTER TABLE `tblniveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblseparasessao`
--

LOCK TABLES `tblseparasessao` WRITE;
/*!40000 ALTER TABLE `tblseparasessao` DISABLE KEYS */;
INSERT INTO `tblseparasessao` VALUES (1,'7a1cdb5c10c1c4895dc5117fe6a01348.png','Foto de Abacate'),(2,'270b8e3aada3c20800ed03bd6ca28f19.jpg','Foto de Laranja'),(3,'94221b5e43adb994760488ed6716bdb9.jpg','Foto de Limão');
/*!40000 ALTER TABLE `tblseparasessao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbltopocuriosidades`
--

LOCK TABLES `tbltopocuriosidades` WRITE;
/*!40000 ALTER TABLE `tbltopocuriosidades` DISABLE KEYS */;
INSERT INTO `tbltopocuriosidades` VALUES (1,'Curiosidades','5d4ae55a7d69dcfc4771e3e404604e00.jpg',7,1),(2,'Conheça Nossas Curiosidades','62483b0f0614b343382f8efcb89484d9.png',4,0);
/*!40000 ALTER TABLE `tbltopocuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbltopolojas`
--

LOCK TABLES `tbltopolojas` WRITE;
/*!40000 ALTER TABLE `tbltopolojas` DISABLE KEYS */;
INSERT INTO `tbltopolojas` VALUES (1,'822082fd15afc0010bda4cdbcf033ea3.png',1),(3,'9a0c9e0324f1d9f67e27671e1f90aa6b.png',0);
/*!40000 ALTER TABLE `tbltopolojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (1,'Yasmin Pereira da Silva','yasmin@gmail.com','(011) 9999-9999','yasmin123','25.555.884-4','898.999.998-88','202cb962ac59075b964b07152d234b70',1,1),(2,'Pedro Henrique Meideiros','machoalfa@gmail.com','(011) 5485-7982','pedro123','02.555.555-5','189.775.588-88','202cb962ac59075b964b07152d234b70',2,1),(3,'Ingrid Pereira da Silva','ingridsilva@gmail','(011) 6598-4982','ingrid123','98.121.031-9','913.012.189-99','202cb962ac59075b964b07152d234b70',2,1),(4,'Wesley Meneghini','wesleySeguraEmail@gmail.com','(011) 8989-5454','wesley123','58.784.859-6','265.875.894-88','202cb962ac59075b964b07152d234b70',3,1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbcontatos2019projeto'
--

--
-- Dumping routines for database 'dbcontatos2019projeto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-17 10:17:17
