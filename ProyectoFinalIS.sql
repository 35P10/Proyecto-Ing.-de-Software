DROP DATABASE IF EXISTS computerscience;
CREATE DATABASE computerscience;
USE computerscience;
-- ---
-- Table 'persona'
-- 
-- ---

DROP TABLE IF EXISTS `persona`;
		
CREATE TABLE `persona` (
  `dni` INTEGER NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`dni`)
);

-- ---
-- Table 'participante'
-- 
-- ---

DROP TABLE IF EXISTS `participante`;
		
CREATE TABLE `participante` (
  `dni_persona` INTEGER NOT NULL,
  `universidad` VARCHAR(100) NOT NULL,
  `grado` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`dni_persona`)
);

-- ---
-- Table 'administrador'
-- 
-- ---

DROP TABLE IF EXISTS `administrador`;
		
CREATE TABLE `administrador` (
  `dni_persona` INTEGER NOT NULL,
  PRIMARY KEY (`dni_persona`)
);

-- ---
-- Table 'participante_concurso'
-- 
-- ---

DROP TABLE IF EXISTS `participante_concurso`;
		
CREATE TABLE `participante_concurso` (
  `dni_participante` INTEGER NOT NULL,
  `id_concurso` INTEGER NOT NULL,
  PRIMARY KEY (`dni_participante`, `id_concurso`)
);

-- ---
-- Table 'concurso'
-- 
-- ---

DROP TABLE IF EXISTS `concurso`;
		
CREATE TABLE `concurso` (
  `id_evento` INTEGER NOT NULL,
  `num_participantes` INTEGER NOT NULL,
  `requisitos` VARCHAR(1000) NOT NULL,
  `ganadores` INTEGER NOT NULL,
  `moderador` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_evento`)
);

-- ---
-- Table 'ponencia'
-- 
-- ---

DROP TABLE IF EXISTS `ponencia`;
		
CREATE TABLE `ponencia` (
  `id_evento` INTEGER NOT NULL,
  `arch_presentacion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_evento`)
);

-- ---
-- Table 'evento'
-- 
-- ---

DROP TABLE IF EXISTS `evento`;
		
CREATE TABLE `evento` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `tema` VARCHAR(200) NOT NULL,
  `descripcion` VARCHAR(3000) NOT NULL,
  `dni_administrador` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'ponente'
-- 
-- ---

DROP TABLE IF EXISTS `ponente`;
		
CREATE TABLE `ponente` (
  `dni` INTEGER NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `grado_academico` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(1500) NOT NULL,
  `especialidad` VARCHAR(100) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `telefono` INTEGER NOT NULL,
  `dni_administrador` INTEGER NOT NULL,
  PRIMARY KEY (`dni`)
);

-- ---
-- Table 'evento_ponente'
-- 
-- ---

DROP TABLE IF EXISTS `evento_ponente`;
		
CREATE TABLE `evento_ponente` (
  `id` INTEGER AUTO_INCREMENT NOT NULL,
  `dni_ponente` INTEGER NULL,
  `id_ponencia` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'sesion_evento'
-- 
-- ---

DROP TABLE IF EXISTS `sesion_evento`;
		
CREATE TABLE `sesion_evento` (
  `id_sesion` INTEGER NOT NULL,
  `id_evento` INTEGER NOT NULL,
  `hora_inicio` TIME NOT NULL,
  PRIMARY KEY (`id_sesion`, `id_evento`)
);

-- ---
-- Table 'sesion'
-- 
-- ---

DROP TABLE IF EXISTS `sesion`;
		
CREATE TABLE `sesion` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_final` TIME NOT NULL,
  `enlace_meet` VARCHAR(100) NOT NULL,
  `id_programa` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'programa'
-- 
-- ---

DROP TABLE IF EXISTS `programa`;
		
CREATE TABLE `programa` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  `descripcion` VARCHAR(1000) NOT NULL,
  `dni_administrador` INTEGER NOT NULL,
  `anio_edicion` YEAR NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `participante` ADD FOREIGN KEY (dni_persona) REFERENCES `persona` (`dni`);
ALTER TABLE `participante_concurso` ADD FOREIGN KEY (dni_participante) REFERENCES `participante` (`dni_persona`);
ALTER TABLE `administrador` ADD FOREIGN KEY (dni_persona) REFERENCES `persona` (`dni`);
ALTER TABLE `participante_concurso` ADD FOREIGN KEY (id_concurso) REFERENCES `concurso` (`id_evento`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `concurso` ADD FOREIGN KEY (id_evento) REFERENCES `evento` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `ponencia` ADD FOREIGN KEY (id_evento) REFERENCES `evento` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `evento_ponente` ADD FOREIGN KEY (id_ponencia) REFERENCES `ponencia` (`id_evento`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `sesion_evento` ADD FOREIGN KEY (id_evento) REFERENCES `evento` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `evento` ADD FOREIGN KEY (dni_administrador) REFERENCES `administrador` (`dni_persona`);
ALTER TABLE `evento_ponente` ADD FOREIGN KEY (dni_ponente) REFERENCES `ponente` (`dni`) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE `sesion_evento` ADD FOREIGN KEY (id_sesion) REFERENCES `sesion` (`id`);
ALTER TABLE `ponente` ADD FOREIGN KEY (dni_administrador) REFERENCES `administrador` (`dni_persona`);
ALTER TABLE `sesion` ADD FOREIGN KEY (id_programa) REFERENCES `programa` (`id`);
ALTER TABLE `programa` ADD FOREIGN KEY (dni_administrador) REFERENCES `administrador` (`dni_persona`);

