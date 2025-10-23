-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: site_etec
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `alternativas`
--

DROP TABLE IF EXISTS `alternativas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questao_id` int(11) NOT NULL,
  `letra` char(1) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questao_id` (`questao_id`),
  CONSTRAINT `alternativas_ibfk_1` FOREIGN KEY (`questao_id`) REFERENCES `questoes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternativas`
--

LOCK TABLES `alternativas` WRITE;
/*!40000 ALTER TABLE `alternativas` DISABLE KEYS */;
INSERT INTO `alternativas` VALUES (1,1,'A','O aluno'),(2,1,'B','estudou'),(3,1,'C','para a prova'),(4,1,'D','nenhuma das alternativas'),(5,2,'A','Concerto'),(6,2,'B','Conserto'),(7,2,'C','Consserto'),(8,2,'D','Concerto ou Conserto, depende do que está referindo'),(9,3,'A','9'),(10,3,'B','12'),(11,3,'C','25'),(12,3,'D','7'),(13,4,'A','10'),(14,4,'B','12'),(15,4,'C','14'),(16,4,'D','4'),(17,5,'A','Central Processing Unit'),(18,5,'B','Computer Personal Unit'),(19,5,'C','Central Program Unit'),(20,5,'D','Control Processing Unit'),(21,6,'A','Um tipo de hardware'),(22,6,'B','Uma sequência de passos para resolver um problema'),(23,6,'C','Um vírus de computador'),(24,6,'D','Um tipo de software');
/*!40000 ALTER TABLE `alternativas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questoes`
--

DROP TABLE IF EXISTS `questoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `simulado_id` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `resposta_correta` char(1) NOT NULL,
  `materia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `simulado_id` (`simulado_id`),
  CONSTRAINT `questoes_ibfk_1` FOREIGN KEY (`simulado_id`) REFERENCES `simulados` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questoes`
--

LOCK TABLES `questoes` WRITE;
/*!40000 ALTER TABLE `questoes` DISABLE KEYS */;
INSERT INTO `questoes` VALUES (1,1,' Qual é o sujeito na frase: O aluno estudou para a prova\r\n',NULL,'A',' Português'),(2,1,' Assinale a palavra correta',NULL,'D','Português'),(3,1,'Qual é o valor de 3² + 4²',NULL,'C','Matemática'),(4,1,'Qual é a raiz quadrada de 144',NULL,'B','Matemática'),(5,1,'O que significa CPU em um computador\r\n',NULL,'A','Informática'),(6,1,'O que é um algoritmo',NULL,'B','Informática');
/*!40000 ALTER TABLE `questoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `simulados`
--

DROP TABLE IF EXISTS `simulados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `simulados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simulados`
--

LOCK TABLES `simulados` WRITE;
/*!40000 ALTER TABLE `simulados` DISABLE KEYS */;
INSERT INTO `simulados` VALUES (1,'',NULL,'Prova_VagasRema_Info_2025');
/*!40000 ALTER TABLE `simulados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `RM` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('aluno','professor') NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `descoberta_site` text DEFAULT NULL,
  `motivo_entrada` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `RM` (`RM`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'murilo','muriloteste','teste','aluno','179999999999','af','afaf'),(2,'murilo_bressam','murilo2025','murilo','aluno','1087918','aohaosdgho','qihgioqweho'),(3,'Kehdy','prof1@etec151','kehdy1','professor','1','professor','professor'),(4,'Otavio Santos Chierigatti','32243','otavio1','aluno','(17)4002-8922','Achei por recomendações de amigos','Os cursos gratuitos e o ensino excelente');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-18 14:12:27
