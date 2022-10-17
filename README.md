# Cursos
 
CREATE DATABASE `cursos_hikvision` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

CREATE TABLE `capacitacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) DEFAULT NULL,
  `tipo_capacitacion` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_instructor` int DEFAULT NULL,
  `id_capacitacion` int DEFAULT NULL,
  `tipo_cliente` int DEFAULT NULL,
  `id_sucursal` int DEFAULT NULL,
  `publicar` int DEFAULT NULL,
  `registrado` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `instructor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `id_region` int DEFAULT NULL,
  `estatus` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `region` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `sucursal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `id_region` int DEFAULT NULL,
  `aforo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
