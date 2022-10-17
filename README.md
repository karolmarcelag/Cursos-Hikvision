# Cursos
 
CREATE SCHEMA `cursos_hikvision` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `cursos_hikvision`.`evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `hora` TIME NULL,
  `id_instructor` INT NULL,
  `id_capacitacion` INT NULL,
  `tipo_cliente` INT NULL,
  `id_sucursal` INT NULL,
  `publicar` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
ALTER TABLE `cursos_hikvision`.`evento` 
ADD COLUMN `tipo_capacitacion` INT NULL AFTER `id_sucursal`;
ALTER TABLE `cursos_hikvision`.`evento` 
DROP COLUMN `tipo_capacitacion`;
ALTER TABLE `cursos_hikvision`.`evento` 
CHANGE COLUMN `publicar` `publicar` INT NULL DEFAULT NULL ;
ALTER TABLE `cursos_hikvision`.`evento` 
ADD COLUMN `registrado` INT NULL AFTER `publicar`;

CREATE TABLE `cursos_hikvision`.`instructor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NULL,
  `apellido` VARCHAR(30) NULL,
  `correo` VARCHAR(30) NULL,
  `id_region` INT NULL,
  `tipo_capacitacion` INT NULL,
  `estatus` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
ALTER TABLE `cursos_hikvision`.`instructor` 
DROP COLUMN `tipo_capacitacion`;
ALTER TABLE `cursos_hikvision`.`instructor` 
CHANGE COLUMN `correo` `correo` VARCHAR(45) NULL DEFAULT NULL ;

CREATE TABLE `cursos_hikvision`.`sucursal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NULL,
  `id_region` INT NULL,
  `aforo` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '2' WHERE (`id` = '3');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '3' WHERE (`id` = '4');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '4' WHERE (`id` = '5');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '5' WHERE (`id` = '6');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '6' WHERE (`id` = '7');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '7' WHERE (`id` = '8');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '8' WHERE (`id` = '9');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '9' WHERE (`id` = '10');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '10' WHERE (`id` = '11');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '11' WHERE (`id` = '12');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '12' WHERE (`id` = '13');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '13' WHERE (`id` = '14');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '14' WHERE (`id` = '15');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '15' WHERE (`id` = '16');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '16' WHERE (`id` = '17');
UPDATE `cursos_hikvision`.`sucursal` SET `id` = '17' WHERE (`id` = '18');

CREATE TABLE `cursos_hikvision`.`region` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `cursos_hikvision`.`capacitacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(30) NULL,
  `division` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
ALTER TABLE `cursos_hikvision`.`capacitacion` 
DROP COLUMN `division`;
ALTER TABLE `cursos_hikvision`.`capacitacion` 
ADD COLUMN `tipo_capacitacion` INT NULL AFTER `titulo`;
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '1');
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '2');
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '3');
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '4');
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '5');
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '6');
UPDATE `cursos_hikvision`.`capacitacion` SET `tipo_capacitacion` = '2' WHERE (`id` = '7');
INSERT INTO `cursos_hikvision`.`capacitacion` (`titulo`, `tipo_capacitacion`) VALUES ('Videovigilancia', '1');
INSERT INTO `cursos_hikvision`.`capacitacion` (`titulo`, `tipo_capacitacion`) VALUES ('Control de Acceso', '1');
INSERT INTO `cursos_hikvision`.`capacitacion` (`titulo`, `tipo_capacitacion`) VALUES ('Alarmas', '1');
INSERT INTO `cursos_hikvision`.`capacitacion` (`titulo`, `tipo_capacitacion`) VALUES ('Intercom', '1');
INSERT INTO `cursos_hikvision`.`capacitacion` (`titulo`, `tipo_capacitacion`) VALUES ('Cloud', '1');
INSERT INTO `cursos_hikvision`.`capacitacion` (`titulo`, `tipo_capacitacion`) VALUES ('Hikcentral', '1');
