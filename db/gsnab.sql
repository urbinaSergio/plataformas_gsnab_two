-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: gsnab_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id_cursos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cursos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'FIRST A'),(2,'FIRST B'),(3,'SECOND A'),(4,'SECOND B'),(5,'SECOND C');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'NUEVO'),(2,'ANTIGUO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `plataforma_arukay`
--

DROP TABLE IF EXISTS `plataforma_arukay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma_arukay` (
  `id_plataforma_ARUKAY` int(11) NOT NULL AUTO_INCREMENT,
  `user_ARUKAY` varchar(45) NOT NULL,
  `password_ARUKAY` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_ARUKAY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma_arukay`
--

LOCK TABLES `plataforma_arukay` WRITE;
/*!40000 ALTER TABLE `plataforma_arukay` DISABLE KEYS */;
/*!40000 ALTER TABLE `plataforma_arukay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma_cambridge`
--

DROP TABLE IF EXISTS `plataforma_cambridge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma_cambridge` (
  `id_plataforma_CAMBRIDGE` int(11) NOT NULL AUTO_INCREMENT,
  `user_FATHOM_CAMBRIDGE` varchar(45) NOT NULL,
  `password_CAMBRIDGE` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_CAMBRIDGE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma_cambridge`
--

LOCK TABLES `plataforma_cambridge` WRITE;
/*!40000 ALTER TABLE `plataforma_cambridge` DISABLE KEYS */;
/*!40000 ALTER TABLE `plataforma_cambridge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma_delfos`
--

DROP TABLE IF EXISTS `plataforma_delfos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma_delfos` (
  `id_plataforma_DELFOS` int(11) NOT NULL AUTO_INCREMENT,
  `user_DELFOS` varchar(45) NOT NULL,
  `password_DELFOS` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_DELFOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma_delfos`
--

LOCK TABLES `plataforma_delfos` WRITE;
/*!40000 ALTER TABLE `plataforma_delfos` DISABLE KEYS */;
/*!40000 ALTER TABLE `plataforma_delfos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma_fathom_reads`
--

DROP TABLE IF EXISTS `plataforma_fathom_reads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma_fathom_reads` (
  `id_plataforma_FATHOM_READS` int(11) NOT NULL AUTO_INCREMENT,
  `user_FATHOM_READS` varchar(45) NOT NULL,
  `password_FATHOM_READS` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_FATHOM_READS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma_fathom_reads`
--

LOCK TABLES `plataforma_fathom_reads` WRITE;
/*!40000 ALTER TABLE `plataforma_fathom_reads` DISABLE KEYS */;
/*!40000 ALTER TABLE `plataforma_fathom_reads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plataforma_milton_ochoa`
--

DROP TABLE IF EXISTS `plataforma_milton_ochoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plataforma_milton_ochoa` (
  `id_plataforma_MILTON_OCHOA` int(11) NOT NULL AUTO_INCREMENT,
  `user_MILTON_OCHOA` varchar(45) NOT NULL,
  `password_MILTON_OCHOA` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_MILTON_OCHOA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plataforma_milton_ochoa`
--

LOCK TABLES `plataforma_milton_ochoa` WRITE;
/*!40000 ALTER TABLE `plataforma_milton_ochoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `plataforma_milton_ochoa` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `numero_identificacion` varchar(45) NOT NULL,
  `nombre_estudiante` varchar(100) NOT NULL,
  `cursos_id_cursos` int(11) NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `fk_plataforma_cambridge` int(11) NOT NULL,
  `fk_plataforma_fathom_reads` int(11) NOT NULL,
  `fk_plataforma_milton_ochoa` int(11) NOT NULL,
  `fk_plataforma_arukay` int(11) NOT NULL,
  `plataforma_DELFOS_id_plataforma_DELFOS1` int(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`,`cursos_id_cursos`,`estado_id_estado`,`fk_plataforma_cambridge`,`fk_plataforma_fathom_reads`,`fk_plataforma_milton_ochoa`,`fk_plataforma_arukay`,`plataforma_DELFOS_id_plataforma_DELFOS1`),
  KEY `fk_estudiante_plataforma_CAMBRIDGE1_idx` (`fk_plataforma_cambridge`),
  KEY `fk_estudiante_plataforma_FATHOM_READS1_idx` (`fk_plataforma_fathom_reads`),
  KEY `fk_estudiante_plataforma_MILTON_OCHOA1_idx` (`fk_plataforma_milton_ochoa`),
  KEY `fk_estudiante_plataforma_ARUKAY1_idx` (`fk_plataforma_arukay`),
  KEY `fk_estudiante_plataforma_DELFOS2_idx` (`plataforma_DELFOS_id_plataforma_DELFOS1`),
  KEY `fk_estudiante_estado1_idx` (`estado_id_estado`),
  KEY `fk_estudiante_cursos1_idx` (`cursos_id_cursos`),
  CONSTRAINT `fk_estudiante_cursos1` FOREIGN KEY (`cursos_id_cursos`) REFERENCES `cursos` (`id_cursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_estado1` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_ARUKAY1` FOREIGN KEY (`fk_plataforma_arukay`) REFERENCES `plataforma_arukay` (`id_plataforma_ARUKAY`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_CAMBRIDGE1` FOREIGN KEY (`fk_plataforma_cambridge`) REFERENCES `plataforma_cambridge` (`id_plataforma_CAMBRIDGE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_DELFOS2` FOREIGN KEY (`plataforma_DELFOS_id_plataforma_DELFOS1`) REFERENCES `plataforma_delfos` (`id_plataforma_DELFOS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_FATHOM_READS1` FOREIGN KEY (`fk_plataforma_fathom_reads`) REFERENCES `plataforma_fathom_reads` (`id_plataforma_FATHOM_READS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudiante_plataforma_MILTON_OCHOA1` FOREIGN KEY (`fk_plataforma_milton_ochoa`) REFERENCES `plataforma_milton_ochoa` (`id_plataforma_MILTON_OCHOA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gsnab_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-20 19:33:02
