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
-- Table structure for table `tblcategorias`
--

DROP TABLE IF EXISTS `tblcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcategorias` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategorias`
--

LOCK TABLES `tblcategorias` WRITE;
/*!40000 ALTER TABLE `tblcategorias` DISABLE KEYS */;
INSERT INTO `tblcategorias` VALUES (7,'Naturais','1'),(8,'Joao','1');
/*!40000 ALTER TABLE `tblcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcolors`
--

DROP TABLE IF EXISTS `tblcolors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcolors` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `classe_css` varchar(1000) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcolors`
--

LOCK TABLES `tblcolors` WRITE;
/*!40000 ALTER TABLE `tblcolors` DISABLE KEYS */;
INSERT INTO `tblcolors` VALUES (1,'Laranja','back_orange'),(2,'Pink','back_pink'),(3,'Amarelo','back_yellow'),(4,'Verde Limão','back_green_limao'),(5,'Verde Limão Claro','back_green_limao_light'),(6,'Verde','back_green'),(7,'Goiaba','back_goiaba');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `codeimg` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codecor` (`codecor`),
  KEY `codeimg` (`codeimg`),
  CONSTRAINT `tblcuriosidades_ibfk_1` FOREIGN KEY (`codecor`) REFERENCES `tblcolors` (`codigo`),
  CONSTRAINT `tblcuriosidades_ibfk_2` FOREIGN KEY (`codeimg`) REFERENCES `tblseparasessao` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcuriosidades`
--

LOCK TABLES `tblcuriosidades` WRITE;
/*!40000 ALTER TABLE `tblcuriosidades` DISABLE KEYS */;
INSERT INTO `tblcuriosidades` VALUES (1,'Nossos sucos atuam em prol dos sistemas digestivo e imunológico:','Fonte De Fibras Alimentares E Vitamina C E A, O Suco Delícia Gelada É Responsável Por Fazer Com Que O Nosso Sistema Digestivo Funcione De Maneira Correta. Além Disso, As Substâncias Antioxidantes Fortalecem O Nosso Sistema Imunológico, Prevenindo O Desenvolvimento De Gripes E Resfriados.','ccacd758df7bea364224e5b5dfdfd021.jpg',7,1,1),(2,' Nossos Sucos Aliviam Os Sintomas Da Enxaqueca:','Para Quem Sofre Com A Incômoda Enxaqueca, O Suco Delícia Gelada Pode Auxiliar Na Diminuição Dos Sintomas, Já Que Os Ingredientes São Naturais E São Fonte De Nutrientes Como Ômega 3 E Magnésio Possuem Propriedades Anti-Inflamatórias E São Calmantes. Para Esses Casos, Dê Preferência Para A Linhaça E O Espinafre Que São Ricos Nessa Substância.','9476cf1f2f1aae0e3028ab8f1efb098c.jpg',6,1,2),(3,'Nossos Produtos Proporcionam Bem-Estar:','Com O Organismo Limpo, Livre De Toxinas, A Absorção De Nutrientes É Muito Melhor, Beneficiando O Organismo: \"Por Ser Essencialmente Natural E Conter Diversos Nutrientes Em Sua Constituição, O Suco Delícia Gelada Tem Efeitos Claros No Aumento Da Sensação De Bem-Estar, Atuando, Inclusive, Na Melhoria Da Qualidade Do Sono\", Analisa A Dra. Daniella Chein.','513bba0dd0aaa3e03aa4acb5586584db.jpg',2,1,3),(4,' Possuímos Diversos Sabores:','Uma Das Principais Vantagens Do Suco Delícia Gelada É Que Ele Possui Uma Diversidade Muito Grande De Combinações. O Suco Amarelo Com Abacaxi Ou Maracujá, O Suco Vermelho Com Baterrada E Laranja, Limão Ou Cenoura, E Para O Suco Rosa, Melancia, E Gengibre, Hortelã E Outras Hortaliças De Sua Preferência.','431862047512e40844fa7695fd32b73d.jpg',6,1,1);
/*!40000 ALTER TABLE `tblcuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllojas`
--

DROP TABLE IF EXISTS `tbllojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbllojas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cidadeestado` varchar(100) NOT NULL,
  `local` varchar(150) NOT NULL,
  `endereco` varchar(3000) NOT NULL,
  `numero` int(11) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `horario` varchar(3000) NOT NULL,
  `foto` varchar(3000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllojas`
--

LOCK TABLES `tbllojas` WRITE;
/*!40000 ALTER TABLE `tbllojas` DISABLE KEYS */;
INSERT INTO `tbllojas` VALUES (1,'Bauru - SP','Parque Shopping','Rua Alameda Soares',400,'(011) 1222-5555','(011) 1111-1111','Segunda à Sábado das 10h às 22h.','965e62aaadd9f65371a83f56a2600167.png',1);
/*!40000 ALTER TABLE `tbllojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmodo`
--

DROP TABLE IF EXISTS `tblmodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblmodo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmodo`
--

LOCK TABLES `tblmodo` WRITE;
/*!40000 ALTER TABLE `tblmodo` DISABLE KEYS */;
INSERT INTO `tblmodo` VALUES (1,'Modo 1: Foto a Esquerda e Texto a Direita'),(2,'Modo 2: Foto em Cima e Texto em Baixo');
/*!40000 ALTER TABLE `tblmodo` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (1,'Administrador',1,1,1,1),(2,'Operador de Conteúdo',1,0,0,1),(3,'Relacionamento com o Cliente',0,1,0,1),(4,'Teste',1,1,1,1);
/*!40000 ALTER TABLE `tblniveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblseparasessao`
--

DROP TABLE IF EXISTS `tblseparasessao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblseparasessao` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `background` varchar(3000) NOT NULL,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblseparasessao`
--

LOCK TABLES `tblseparasessao` WRITE;
/*!40000 ALTER TABLE `tblseparasessao` DISABLE KEYS */;
INSERT INTO `tblseparasessao` VALUES (1,'7a1cdb5c10c1c4895dc5117fe6a01348.png','Foto de Abacates'),(2,'270b8e3aada3c20800ed03bd6ca28f19.jpg','Foto de Laranjas'),(3,'94221b5e43adb994760488ed6716bdb9.jpg','Foto de Limões');
/*!40000 ALTER TABLE `tblseparasessao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobre`
--

DROP TABLE IF EXISTS `tblsobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblsobre` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `foto` varchar(3000) NOT NULL,
  `modo` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`),
  KEY `modo` (`modo`),
  CONSTRAINT `tblsobre_ibfk_1` FOREIGN KEY (`modo`) REFERENCES `tblmodo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobre`
--

LOCK TABLES `tblsobre` WRITE;
/*!40000 ALTER TABLE `tblsobre` DISABLE KEYS */;
INSERT INTO `tblsobre` VALUES (1,'O QUE FAZEMOS?','Acreditamos Que Saudável Também Deve Ser Sinônimo De Gostoso. E Vamos Combinar: Com Tanto Carinho, Frutas Gostosas, Paixão E Vegetais Selecionados Não Tem Como Dar Errado, Não É Mesmo?\r\nAs Bebidas Da Nossa Família São A União Da Energia E Dos Benefícios Das Frutas E Vegetais Da Natureza Com O Trabalho De Especialistas, Pesquisadores E Detalhistas. Cuidamos De Cada Etapa Com Muito Carinho E Dedicação, Investimos Na Produção Própria E Na Transparência Dos Processos Para Buscar A Sua Plena Satisfação.','33b36da4acd506bbbdfc159e3bf318f0.png',1,1),(2,'COMO FAZEMOS?','Assim Como Todas As Frutas, As Nossas Também Vêm Das Fazendas. A Diferença É Que Nossas Fazendas São Selecionadas. Todas Seguem Padrões Internacionais De Qualidade Extremamente Rigorosos. Assim, Garantimos Que As Frutas E Os Vegetais Que Saem Dos Pomares E Das Hortas De Todo O Brasil Sejam Preservados Ao Máximo Até Chegar À Sua Casa Com Tudo O Que Eles Têm De Melhor.','2a1d77e15a00fc8f347ad39f9b8ff5e5.png',2,1);
/*!40000 ALTER TABLE `tblsobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobredestaque`
--

DROP TABLE IF EXISTS `tblsobredestaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblsobredestaque` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobredestaque`
--

LOCK TABLES `tblsobredestaque` WRITE;
/*!40000 ALTER TABLE `tblsobredestaque` DISABLE KEYS */;
INSERT INTO `tblsobredestaque` VALUES (1,'A Delícia Gelada é brasileira e nasceu da vontade de oferecer um produto diferente de tudo o que você já experimentou.\r\nForam anos trabalhando com parceiros de tecnologia da Alemanha, EUA, França, Holanda, Japão e Suécia para fazer um suco de verdade, 100% natural e que preserva ao máximo o sabor de cada ingrediente, porque é produzido a partir de frutas e vegetais frescos.\r\n\r\nHoje, brasileiros e pessoas do mundo todo já aproveitam os benefícios do suco da tampinha verde que você toma aí na sua casa.\r\n\r\nQueremos estar presentes no seu dia, na sua casa e na sua vida de um jeito natural, assim como tudo o que fazemos.\r\n',1);
/*!40000 ALTER TABLE `tblsobredestaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltopocuriosidades`
--

DROP TABLE IF EXISTS `tbltopocuriosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbltopocuriosidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `foto` varchar(3000) NOT NULL,
  `codecor` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `codecor` (`codecor`),
  CONSTRAINT `tbltopocuriosidades_ibfk_1` FOREIGN KEY (`codecor`) REFERENCES `tblcolors` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltopocuriosidades`
--

LOCK TABLES `tbltopocuriosidades` WRITE;
/*!40000 ALTER TABLE `tbltopocuriosidades` DISABLE KEYS */;
INSERT INTO `tbltopocuriosidades` VALUES (1,'Curiosidades','6d9ad6036e1b67a7678f30c4e1497d8d.jpg',7,1);
/*!40000 ALTER TABLE `tbltopocuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltopolojas`
--

DROP TABLE IF EXISTS `tbltopolojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbltopolojas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(3000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltopolojas`
--

LOCK TABLES `tbltopolojas` WRITE;
/*!40000 ALTER TABLE `tbltopolojas` DISABLE KEYS */;
INSERT INTO `tbltopolojas` VALUES (1,'efd55459c285bf1de6863e117fbc736d.png',1);
/*!40000 ALTER TABLE `tbltopolojas` ENABLE KEYS */;
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
  `celular` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(2000) NOT NULL,
  `codenivel` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`),
  KEY `codenivel` (`codenivel`),
  CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`codenivel`) REFERENCES `tblniveis` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (1,'Yasmin Silva','yasmin@gmail','(011) 5555-9999','yasmin123','00.222.000-8','555.555.999-89','202cb962ac59075b964b07152d234b70',1,1),(2,'Junior','estudosenai57@gmail.com','(011) 8989-5454','junior','22.222.222.9','222.222.222-58','202cb962ac59075b964b07152d234b70',4,1),(3,'Pedro Henrique Meideiros','fffffffff@f','(011) 8989-5454','pedro','22.222.222.9','222.222.222-58','202cb962ac59075b964b07152d234b70',2,1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblvalores`
--

DROP TABLE IF EXISTS `tblvalores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblvalores` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `texto` varchar(300) NOT NULL,
  `icone` varchar(3000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblvalores`
--

LOCK TABLES `tblvalores` WRITE;
/*!40000 ALTER TABLE `tblvalores` DISABLE KEYS */;
INSERT INTO `tblvalores` VALUES (1,1,'Missão','SER UMA EMPRESA DE EXCELÊNCIA NA PRODUÇÃO DE SUCOS E DERIVADOS, ATENDENDO TODOS OS PADRÕES DE QUALIDADE, COM CONSCIÊNCIA AMBIENTAL E RESPEITO À COMUNIDADE.','35e4ed5472f04bb199b88c5dc6b447a5.png',1),(2,2,'Visão','TORNAR-SE A MARCA DE SUCOS NATURAIS MAIS CONSUMIDA NO MERCADO NACIONAL, OFERECENDO PRODUTOS DE ALTA QUALIDADE E DE SABOR INCOMPARÁVEL.','c256602f67323cae3ec75d5446186a38.png',1),(3,3,'Valores','PROPORCIONAR MOMENTOS ALEGRES E SAUDÁVEIS PARA TODOS COM INTEGRIDADE, TRANSPARÊNCIA, COMPROMETIMENTO, INOVAÇÃO E QUALIDADE.','e48308a207486beef4348f57455403db.png',1);
/*!40000 ALTER TABLE `tblvalores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-04 15:37:34
