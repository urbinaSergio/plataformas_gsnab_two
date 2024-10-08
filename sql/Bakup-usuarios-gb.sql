-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para gsnab_db
CREATE DATABASE IF NOT EXISTS `gsnab_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `gsnab_db`;

-- Volcando estructura para tabla gsnab_db.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_cursos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cursos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.cursos: ~5 rows (aproximadamente)
INSERT INTO `cursos` (`id_cursos`, `nombre_curso`) VALUES
	(1, 'FIRST A'),
	(2, 'FIRST B'),
	(3, 'SECOND A'),
	(4, 'SECOND B'),
	(5, 'SECOND C');

-- Volcando estructura para tabla gsnab_db.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.estado: ~2 rows (aproximadamente)
INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
	(1, 'NUEVO'),
	(2, 'ANTIGUO');

-- Volcando estructura para tabla gsnab_db.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.estudiante: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsnab_db.plataforma_arukay
CREATE TABLE IF NOT EXISTS `plataforma_arukay` (
  `id_plataforma_ARUKAY` int(11) NOT NULL AUTO_INCREMENT,
  `user_ARUKAY` varchar(45) NOT NULL,
  `password_ARUKAY` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_ARUKAY`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.plataforma_arukay: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsnab_db.plataforma_cambridge
CREATE TABLE IF NOT EXISTS `plataforma_cambridge` (
  `id_plataforma_CAMBRIDGE` int(11) NOT NULL AUTO_INCREMENT,
  `user_FATHOM_CAMBRIDGE` varchar(45) NOT NULL,
  `password_CAMBRIDGE` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_CAMBRIDGE`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.plataforma_cambridge: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsnab_db.plataforma_delfos
CREATE TABLE IF NOT EXISTS `plataforma_delfos` (
  `id_plataforma_DELFOS` int(11) NOT NULL AUTO_INCREMENT,
  `user_DELFOS` varchar(45) NOT NULL,
  `password_DELFOS` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_DELFOS`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.plataforma_delfos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsnab_db.plataforma_fathom_reads
CREATE TABLE IF NOT EXISTS `plataforma_fathom_reads` (
  `id_plataforma_FATHOM_READS` int(11) NOT NULL AUTO_INCREMENT,
  `user_FATHOM_READS` varchar(45) NOT NULL,
  `password_FATHOM_READS` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_FATHOM_READS`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.plataforma_fathom_reads: ~0 rows (aproximadamente)

-- Volcando estructura para tabla gsnab_db.plataforma_milton_ochoa
CREATE TABLE IF NOT EXISTS `plataforma_milton_ochoa` (
  `id_plataforma_MILTON_OCHOA` int(11) NOT NULL AUTO_INCREMENT,
  `user_MILTON_OCHOA` varchar(45) NOT NULL,
  `password_MILTON_OCHOA` varchar(45) NOT NULL,
  PRIMARY KEY (`id_plataforma_MILTON_OCHOA`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla gsnab_db.plataforma_milton_ochoa: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
