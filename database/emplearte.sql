-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.11.0-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci */;
USE `test`;

-- Volcando estructura para tabla test.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `IdLegajo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Apellido` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `Nombre` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `Direccion` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `Localidad` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `ID_TIPO_DOCUMENTO` int(11) NOT NULL DEFAULT 0,
  `NroDocumento` int(10) unsigned NOT NULL DEFAULT 0,
  `CodigoPostal` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '0',
  `ID_PROVINCIA` int(11) NOT NULL DEFAULT 0,
  `Activo` enum('S','N') COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`IdLegajo`),
  KEY `IdLegajo` (`IdLegajo`),
  KEY `FK_IDTipoDoc_emp` (`ID_TIPO_DOCUMENTO`),
  KEY `FK_IDProv_emp` (`ID_PROVINCIA`),
  CONSTRAINT `FK_IDProv_emp` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`id_provincia`),
  CONSTRAINT `FK_IDTipoDoc_emp` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla test.empleados: ~4 rows (aproximadamente)
INSERT INTO `empleados` (`IdLegajo`, `Apellido`, `Nombre`, `Direccion`, `Localidad`, `ID_TIPO_DOCUMENTO`, `NroDocumento`, `CodigoPostal`, `ID_PROVINCIA`, `Activo`) VALUES
	(1, 'Carlos', 'Lopez', 'Chaz 3244', 'CABA', 1, 44532122, '6543', 1, 'S'),
	(2, 'Juan', 'Sosa', 'Paz 900', 'Rio 4to', 2, 998078878, '4355', 2, 'S'),
	(3, 'Roberto ', 'Paz', 'Lima 2020', '9878', 3, 90821, '8467', 3, 'S'),
	(4, 'Gerardo', 'Rossi', 'Peru 100', 'Bs.As', 1, 523121233, '8009', 1, 'S');

-- Volcando estructura para vista test.empleados_detalle
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `empleados_detalle` (
	`IdLegajo` INT(10) UNSIGNED NOT NULL,
	`Apellido` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_spanish_ci',
	`Nombre` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_spanish_ci',
	`Direccion` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_spanish_ci',
	`Localidad` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_spanish_ci',
	`ID_TIPO_DOCUMENTO` INT(11) NOT NULL,
	`DESC_DOCUMENTO` VARCHAR(30) NULL COLLATE 'latin1_swedish_ci',
	`NroDocumento` INT(10) UNSIGNED NOT NULL,
	`CodigoPostal` VARCHAR(10) NOT NULL COLLATE 'utf8mb3_spanish_ci',
	`ID_PROVINCIA` INT(11) NOT NULL,
	`PROVINCIA` VARCHAR(30) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla test.provincia
CREATE TABLE IF NOT EXISTS `provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `id_provincia` (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla test.provincia: ~3 rows (aproximadamente)
INSERT INTO `provincia` (`id_provincia`, `provincia`) VALUES
	(1, 'Buenos Aires'),
	(2, 'Cordoba'),
	(3, 'Santa Fe');

-- Volcando estructura para tabla test.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`),
  UNIQUE KEY `id_tipo_documento_3` (`id_tipo_documento`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_tipo_documento_2` (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla test.tipo_documento: ~3 rows (aproximadamente)
INSERT INTO `tipo_documento` (`id_tipo_documento`, `tipo_documento`) VALUES
	(1, 'DNI'),
	(2, 'LC'),
	(3, 'Pasaporte');

-- Volcando estructura para tabla test.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb3 NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb3 NOT NULL DEFAULT '',
  `apellido` varchar(255) CHARACTER SET utf8mb3 NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb3 NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb3 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla test.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `username`, `nombre`, `apellido`, `email`, `password`) VALUES
	(37, 'admin', 'Administrador', 'Admin', 'admin@admin.com', '$2y$10$9R2757/hG19Tqd2hhLjR/.fI0ehc8wQKiGDSP5gRgZqceHURwomsW'),
	(38, 'eze', 'Ezequiel', 'Almeira', 'eze@eze.com', '$2y$10$MRhv7zi7NX.QV3dcVETEZOTWkdaQtkb8qvQ3Ku4u5TGGyPrJ6hFHq');

-- Volcando estructura para vista test.empleados_detalle
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `empleados_detalle`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `empleados_detalle` AS SELECT emp.IdLegajo, emp.Apellido, emp.Nombre, emp.Direccion, emp.Localidad, emp.ID_TIPO_DOCUMENTO, td.tipo_documento as DESC_DOCUMENTO, emp.NroDocumento, emp.CodigoPostal, emp.ID_PROVINCIA, pr.PROVINCIA
FROM `test`.`empleados` AS emp LEFT JOIN `test`.`tipo_documento` AS td ON td.id_tipo_documento = emp.ID_TIPO_DOCUMENTO
LEFT JOIN `test`.`provincia` AS pr ON pr.Id_Provincia = emp.ID_PROVINCIA WHERE emp.Activo = 'S' ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
