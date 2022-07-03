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


-- Volcando estructura de base de datos para gestion-in
CREATE DATABASE IF NOT EXISTS `gestion-in` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gestion-in`;

-- Volcando estructura para tabla gestion-in.incidencias
CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `comentario` varchar(450) DEFAULT NULL,
  `aula` int(1) unsigned zerofill DEFAULT NULL,
  `hecho` varchar(50) DEFAULT NULL,
  `prioridad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `FK_incidencias_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla gestion-in.incidencias: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
INSERT INTO `incidencias` (`id`, `id_usuario`, `fecha_inicio`, `fecha_final`, `material`, `comentario`, `aula`, `hecho`, `prioridad`) VALUES
	(176, 2, '2022-01-08 10:38:48', '2022-01-08 10:39:50', 'raton', 'No funciona el raton porque el cable esta roto', 123, 'oido chef', 'media'),
	(177, 2, '2022-01-09 12:43:00', '2022-01-09 12:43:13', 'teclado', 'no f', 204, 'ya funciona correctamente', 'alta'),
	(178, 3, '2022-01-09 01:48:58', '2022-01-09 12:53:23', 'raton', 'Hola, no me funciona el raton desde hace dias  y estoy trabajando desde mi portatil', 102, 'ya funciona correctamente', 'media'),
	(179, 3, '2022-01-09 01:49:52', '2022-01-09 01:13:14', 'otros', 'El cable del monitor que da seÃ±al esta flojo ', 123, 'ya funciona correctamente', 'alta'),
	(180, 3, '2022-01-09 01:50:32', '2022-01-09 01:13:24', 'monitor', 'El 2do monitor del aula de actos esta fallando, sale rayas moradas y azules', 240, 'ya funciona correctamente', 'alta'),
	(181, 3, '2022-01-09 01:51:00', '2022-01-09 01:13:28', 'teclado', 'Necesito un cambio de teclado urgente', 102, 'ya funciona correctamente', 'alta'),
	(182, 3, '2022-01-09 01:51:08', '2022-01-09 01:13:31', 'teclado', 'u', 204, 'ya funciona correctamente', 'alta'),
	(183, 3, '2022-01-09 01:51:52', '2022-01-09 01:13:33', 'teclado', 'La parte numerico del telcado falla, me lo pueden cambiar cambiar gracias', 204, 'ya funciona correctamente', 'baja'),
	(184, 2, '2022-01-09 01:52:21', '2022-01-09 01:13:34', 'raton', 'No funciona el raton de algunos equipos se ve que el conector usb esta estropeado', 102, 'ya funciona correctamente', 'media'),
	(185, 2, '2022-01-09 01:52:41', '2022-01-09 01:13:48', 'monitor', 'El conector del monitor al tocarlo no va', 204, 'oido chef', 'baja'),
	(186, 2, '2022-01-09 01:52:56', '2022-01-09 01:13:52', 'otros', 'El cable de red, el conector esta roto', 204, 'oido chef', 'alta'),
	(187, 2, '2022-01-09 01:10:20', '2022-01-09 01:12:47', 'teclado', 'No funciona la mayotira de equipos', 204, 'ya funciona correctamente', 'alta'),
	(188, 2, '2022-01-09 01:17:28', '2022-01-10 08:37:06', 'teclado', '', 204, 'ya funciona correctamente', 'alta'),
	(189, 3, '2022-01-10 08:36:47', '2022-01-15 04:17:31', 'teclado', 'no me funciona\r\n', 204, 'ya funciona correctamente', 'alta'),
	(190, 3, '2022-01-15 04:18:01', '2022-01-15 04:18:21', 'teclado', 'No funciona el teclado', 204, 'ya funciona correctamente', 'alta');
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;

-- Volcando estructura para tabla gestion-in.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla gestion-in.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `password`, `mail`, `role`) VALUES
	(1, 'ander', '12', 'ander@ander.com', 'ROLE_ADMIN'),
	(2, 'Erick', '1234', 'erick@erick.com', 'ROLE_USER'),
	(3, 'patryk', '12', 'patryk@patryk.com', 'ROLE_USER');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
