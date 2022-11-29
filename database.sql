CREATE DATABASE  IF NOT EXISTS `bd_agendaJMF` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_agendaJMF`;
-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: bd_agendaJMF
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

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
-- Table structure for table `agenda_contato`
--

DROP TABLE IF EXISTS `agenda_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda_contato` (
  `id_contato` int NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_contato` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_contato` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_contato` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_contato`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_contato`
--

LOCK TABLES `agenda_contato` WRITE;
/*!40000 ALTER TABLE `agenda_contato` DISABLE KEYS */;
INSERT INTO `agenda_contato` VALUES (27,'b','b@e.com','85991000000','6385f000472f5.png'),(29,'d','d@c.com','85991222222','6385f9a9abd44.jpg');
/*!40000 ALTER TABLE `agenda_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda_user`
--

DROP TABLE IF EXISTS `agenda_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_user` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_user` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_user`
--

LOCK TABLES `agenda_user` WRITE;
/*!40000 ALTER TABLE `agenda_user` DISABLE KEYS */;
INSERT INTO `agenda_user` VALUES (1,'Emilson Filho','emilsonfilhocontato@gmail.com','fqnsJWCfEm9peHB','85991427214','avatar.jpg'),(2,'Leandro Costa','ltitreinamento@hotmail.com','123456','85991223344','avatar.jpg'),(3,'Maria Helena','carioca@outlook.com','879546','85991999999','avatar.jpg'),(4,'Sei lá','sla@email.com','MTIzNDY1','85991223344','avatar.jpg'),(5,'Emilson Filho','emilsonfilho@email.com','MTU0NjQ5NjE4OQ==','85991427214','avatar.jpg'),(6,'Emilson','emilson@email.com','NDE2MTgxOA==','85991223344','avatar.jpg'),(7,'Fernando','dograu@email.com','NDExNjkxODUxODU=','85991223344','avatar.jpg'),(8,'','','ZnFuc0pXQ2ZFbTlwZUhC','','avatar.jpg'),(9,'Tiago','tiago@email.com','NDExNDQ1NjUy','85991223344','avatar.jpg'),(10,'Taigo','tiago@email.com','MTY1NjY0NTU=','85991223344','avatar.jpg'),(11,'Emi','emilsonf@email.com','MTg2NTUx','85991427214','avatar.jpg'),(12,'','','ZnFuc0pXQ2ZFbTlwZUhC','','avatar.jpg'),(13,'Emilson Filho','emilson@emial.com','MTA2OTE2','85991223344','635916cde3d58.jpg'),(14,'Emi','emislfon@gmal.com','MTYxNjE2OQ==','85991223344','63591d998a8c5.jpg'),(15,'Emi','emislfon@gmal.com','MTYxNjE2OQ==','85991223344','63591da73c532.jpg'),(16,'Mislayne Miranda','mislayneferreira180700@gmail.com','c25laGE=','85991998877','636a4b1e376c9.jpg'),(17,'Richard','','ZDQxZDhjZDk4ZjAwYjIwNGU5ODAwOTk4ZWNmODQyN2U=','','avatar.jpg'),(18,'Richard','richard@gmail.com','ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=','85991427215','636a5655a5544.jpeg'),(19,'Emilson Filho','emilsonfilhocontato@gmail.com','ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=','85991427214','636b925394af8.jpg'),(20,'Teste','teste@gmail.com','ZTEwYWRjMzk0OWJhNTlhYmJlNTZlMDU3ZjIwZjg4M2U=','85991427214','636b92ae1ef4a.jpg');
/*!40000 ALTER TABLE `agenda_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_agendaJMF'
--

--
-- Dumping routines for database 'bd_agendaJMF'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-29  9:32:34
