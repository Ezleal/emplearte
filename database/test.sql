-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `test`;

-- Volcando estructura para tabla test.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `IdLegajo` int(10) unsigned NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `Localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `ID_TIPO_DOCUMENTO` int(11) NOT NULL DEFAULT '0',
  `NroDocumento` int(10) unsigned NOT NULL DEFAULT '0',
  `CodigoPostal` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `ID_PROVINCIA` int(11) NOT NULL DEFAULT '0',
  `Activo` enum('S','N') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'S',
  PRIMARY KEY (`IdLegajo`),
  KEY `IdLegajo` (`IdLegajo`),
  KEY `FK_IDTipoDoc_emp` (`ID_TIPO_DOCUMENTO`),
  KEY `FK_IDProv_emp` (`ID_PROVINCIA`),
  CONSTRAINT `FK_IDProv_emp` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`id_provincia`),
  CONSTRAINT `FK_IDTipoDoc_emp` FOREIGN KEY (`ID_TIPO_DOCUMENTO`) REFERENCES `tipo_documento` (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista test.empleados_detalle
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `empleados_detalle` (
	`IdLegajo` INT(10) UNSIGNED NOT NULL,
	`Apellido` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`Nombre` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`Direccion` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`Localidad` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`ID_TIPO_DOCUMENTO` INT(11) NOT NULL,
	`DESC_DOCUMENTO` VARCHAR(30) NULL COLLATE 'latin1_swedish_ci',
	`NroDocumento` INT(10) UNSIGNED NOT NULL,
	`CodigoPostal` VARCHAR(10) NOT NULL COLLATE 'utf8_spanish_ci',
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla test.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`),
  UNIQUE KEY `id_tipo_documento_3` (`id_tipo_documento`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_tipo_documento_2` (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista test.empleados_detalle
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `empleados_detalle`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `empleados_detalle` AS SELECT emp.IdLegajo, emp.Apellido, emp.Nombre, emp.Direccion, emp.Localidad, emp.ID_TIPO_DOCUMENTO, td.tipo_documento as DESC_DOCUMENTO, emp.NroDocumento, emp.CodigoPostal, emp.ID_PROVINCIA, pr.PROVINCIA
FROM `test`.`empleados` AS emp LEFT JOIN `test`.`tipo_documento` AS td ON td.id_tipo_documento = emp.ID_TIPO_DOCUMENTO
LEFT JOIN `test`.`provincia` AS pr ON pr.Id_Provincia = emp.ID_PROVINCIA WHERE emp.Activo = 'S' ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
