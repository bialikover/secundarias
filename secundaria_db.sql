-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2012 at 06:22 AM
-- Server version: 5.5.24-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `secundaria_db`
--

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `tipoUsuarioId` int(2) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`tipoUsuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

LOCK TABLES `tipo_usuario` WRITE;
INSERT INTO `tipo_usuario` VALUES (1,'sa'),(2,'escuela'),(3,'docente'),(4,'alumno'),(5,'padre');
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioId` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE utf8_bin UNIQUE DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tipoUsuarioId` int(2) DEFAULT NULL,
  PRIMARY KEY (`usuarioId`),
  KEY `tipoUsuarioId` (`tipoUsuarioId`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipoUsuarioId`) REFERENCES `tipo_usuario` (`tipoUsuarioId`)

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

/*
 LOCK TABLES `usuario` WRITE;
   INSERT INTO `usuario` VALUES (1,'sa','admin',1);
   UNLOCK TABLES;
   */

-- --------------------------------------------------------

--
-- Table structure for table `adicional`
--

DROP TABLE IF EXISTS `adicional`;
CREATE TABLE IF NOT EXISTS `adicional` (
  `usuarioId` bigint(20) NOT NULL,
  `curp` varchar(18) COLLATE utf8_bin DEFAULT NULL,
  `especialidad` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `matricula` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `rutaFoto` text COLLATE utf8_bin,
  PRIMARY KEY (`usuarioId`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `adicional_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

/*
LOCK TABLES `adicional` WRITE, `usuario` WRITE;
INSERT INTO `adicional` VALUES ('','','','','',(SELECT `usuarioId` FROM usuario WHERE `usuario`='sa'));
UNLOCK TABLES;
*/
-- --------------------------------------------------------

--
-- Table structure for table `datos_contacto`
--

DROP TABLE IF EXISTS `datos_contacto`;
CREATE TABLE IF NOT EXISTS `datos_contacto` (
  `usuarioId` bigint(20) NOT NULL,
  `telefono` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `telMovil` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`usuarioId`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `datos_contacto_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;
/*
LOCK TABLES `datos_contacto` WRITE, `usuario` WRITE;
INSERT INTO `datos_contacto` VALUES ('','','','',(SELECT `usuarioId` FROM usuario WHERE `usuario`='sa'));
UNLOCK TABLES;
*/
-- --------------------------------------------------------

--
-- Table structure for table `datos_personal`
--

DROP TABLE IF EXISTS `datos_personal`;
CREATE TABLE IF NOT EXISTS `datos_personal` (
  `usuarioId` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `aPaterno` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `aMaterno` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `genero` enum('M','F') COLLATE utf8_bin DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  PRIMARY KEY (`usuarioId`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `datos_personal_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;
/*
LOCK TABLES `datos_personal` WRITE, `usuario` WRITE;
INSERT INTO `datos_personal` VALUES ('','','','','','',(SELECT `usuarioId` FROM usuario WHERE `usuario`='sa'));
UNLOCK TABLES;
*/
-- --------------------------------------------------------

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE IF NOT EXISTS `domicilio` (
  `usuarioId` bigint(20) NOT NULL,
  `calle` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `colonia` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cp` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `municipioId` int(5) DEFAULT NULL,
  PRIMARY KEY (`usuarioId`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;
/*
LOCK TABLES `domicilio` WRITE, `usuario` WRITE;
INSERT INTO `domicilio` VALUES ('','','','','','',(SELECT `usuarioId` FROM usuario WHERE `usuario`='sa'));
UNLOCK TABLES;
*/
-- --------------------------------------------------------

--
-- Table structure for table `escuela`
--

DROP TABLE IF EXISTS `escuela`;
CREATE TABLE IF NOT EXISTS `escuela` (
  `escuelaId` bigint(20) NOT NULL,
  `escuela` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `claveEscuela` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descEscuela` text COLLATE utf8_bin,
  `adicional` text COLLATE utf8_bin,
  PRIMARY KEY (`escuelaId`),
  KEY `escuelaId` (`escuelaId`),
  CONSTRAINT `escuela_ibfk_1` FOREIGN KEY (`escuelaId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------

--
-- Table structure for table `contacto_escuela`
--

DROP TABLE IF EXISTS `contacto_escuela`;
CREATE TABLE IF NOT EXISTS `contacto_escuela` (
  `escuelaId` bigint(20) NOT NULL,
  `telEscuela` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `emailEscuela` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`escuelaId`),
  KEY `escuelaId` (`escuelaId`),
  CONSTRAINT `contacto_escuela_ibfk_1` FOREIGN KEY (`escuelaId`) REFERENCES `escuela` (`escuelaId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------

--
-- Table structure for table `domicilio_escuela`
--

DROP TABLE IF EXISTS `domicilio_escuela`;
CREATE TABLE IF NOT EXISTS `domicilio_escuela` (
  `escuelaId` bigint(20) NOT NULL,
  `zona` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `sector` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `municipioId` bigint(20) DEFAULT NULL,
  `localidad` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  PRIMARY KEY (`escuelaId`),
  KEY `escuelaId` (`escuelaId`),
  CONSTRAINT `domicilio_escuela_ibfk_1` FOREIGN KEY (`escuelaId`) REFERENCES `escuela` (`escuelaId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------

--
-- Triggers `escuela`
--
DROP TRIGGER IF EXISTS `insertar_escuela`;
DELIMITER //
CREATE TRIGGER `insertar_escuela` AFTER INSERT ON `escuela`
 FOR EACH ROW BEGIN
            INSERT INTO contacto_escuela VALUES (NEW.escuelaId,'','');
            INSERT INTO domicilio_escuela VALUES (NEW.escuelaId,'','','','','','');
        END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `estadoId` int(5) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`estadoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `grupoId` bigint(20) NOT NULL AUTO_INCREMENT,
  `claveGrupo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cicloEscolar` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `grado` enum('1','2','3') COLLATE utf8_bin DEFAULT NULL,
  `turno` enum('Matutino','Vespertino') COLLATE utf8_bin DEFAULT NULL,
  `escuelaId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`grupoId`),
  KEY `escuelaId` (`escuelaId`),
  CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`escuelaId`) REFERENCES `escuela` (`escuelaId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `materiaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `matriculaMateria` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `grado` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`materiaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

LOCK TABLES `materia` WRITE;
INSERT INTO `materia` VALUES (1,'Español I','ES1','1'),(2,'Español II','ES2','2'),(3,'Español III','ES3','3'),(4,'Segunda Lengua I','SL1','1'),(5,'Segunda Lengua II','SL2','2'),(6,'Segunda Lengua III','SL3','3'),(7,'Matemáticas I','MT1','1'),(8,'Matemáticas II','MT2','2'),(9,'Matemáticas III','MT3','3'),(10,'Ciencias I (Biología)','C1B','1'),(11,'Ciencias II (Física)','C2F','2'),(12,'Ciencias III (Química)','C3Q','3'),(13,'Gegorafía de México y del Mund','GMM','1'),(14,'Historia I','H1','2'),(15,'Historia II','H2','3'),(16,'Formación Cívica y Ética I','FCE1','2'),(17,'Formación Cívica y Ética II','FCE2','3'),(18,'Educación Física I','EF1','1'),(19,'Educación Física II','EF2','2'),(20,'Educación Física III','EF3','3'),(21,'Tecnología I','T1','1'),(22,'Tecnología II','T2','2'),(23,'Tecnología III','T3','3'),(24,'Artes I','A1','1'),(25,'Artes II','A2','2'),(26,'Artes III','A3','3');
UNLOCK TABLES;
-- --------------------------------------------------------

  --
  -- Table structure for table `mensaje`
  --

  DROP TABLE IF EXISTS `mensaje`;
  CREATE TABLE IF NOT EXISTS `mensaje` (
    `mensajeId` bigint(20) NOT NULL AUTO_INCREMENT,
    `emisorId` bigint(20) DEFAULT NULL,
    `receptorId` bigint(20) DEFAULT NULL,
    `mensaje` text COLLATE utf8_bin,
    `fechaMensaje` datetime DEFAULT NULL,
    PRIMARY KEY (`mensajeId`),
    KEY `emisorId` (`emisorId`),
    KEY `receptorId` (`receptorId`),
    CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`emisorId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`receptorId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE

  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

  -- --------------------------------------------------------

  --
  -- Table structure for table `municipio`
  --

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `municipioId` int(5) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `estadoId` int(5) DEFAULT NULL,
  PRIMARY KEY (`municipioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------

--
-- Triggers `usuario`
--
DROP TRIGGER IF EXISTS `borrar_usuario`;
DELIMITER //
CREATE TRIGGER `borrar_usuario` AFTER DELETE ON `usuario`
 FOR EACH ROW BEGIN
            DECLARE tipoUsuarioId INT(2);
            SET tipoUsuarioId = OLD.tipoUsuarioId;
            IF tipoUsuarioId = 1 THEN
                DELETE FROM escuela WHERE administradorId=OLD.usuarioID;
            END IF;
        END
//
DELIMITER ;

/**************************************************************************************************
//Trigger AFTER INSERT on usuario
//**************************************************************************************************/

DELIMITER ;
DROP TRIGGER IF EXISTS `insertar_usuario`;
DELIMITER //
CREATE TRIGGER `insertar_usuario` AFTER INSERT ON `usuario`
 FOR EACH ROW BEGIN
            DECLARE tipoUsuarioId INT(2);
            SET tipoUsuarioId = NEW.tipoUsuarioId;
            INSERT INTO datos_personal VALUES (NEW.usuarioId, '', '', '', '', '');
            INSERT INTO adicional VALUES ( NEW.usuarioId, '', '', '', '');
            INSERT INTO datos_contacto VALUES (NEW.usuarioId, '', '', '');
            INSERT INTO domicilio VALUES (NEW.usuarioId,'', '', '', '', '');
            IF tipoUsuarioId = 2 THEN
                INSERT INTO escuela VALUES (NEW.usuarioId, '', '', '', '');
            ELSEIF tipoUsuarioId = 3 THEN
                INSERT INTO docente VALUES (NEW.usuarioId, NEW.usuario);
            ELSEIF tipoUsuarioId = 4 THEN
                INSERT INTO alumno VALUES (NEW.usuarioId, NEW.usuario);
            ELSEIF tipoUsuarioId = 5 THEN
                INSERT INTO padre VALUES (NEW.usuarioId, '',NEW.usuario);
            END IF;
        END
//
DELIMITER ;

/**************************************************************************************************
//Trigger AFTER UPDATE on datos_personal
//**************************************************************************************************/

DELIMITER ;
DROP TRIGGER IF EXISTS `actualizar_datos_personal`;
DELIMITER //
CREATE TRIGGER `actualizar_datos_personal` AFTER UPDATE ON `datos_personal`
 FOR EACH ROW BEGIN
            DECLARE tipoUsuarioId INT(2);
            SELECT usuario.tipoUsuarioId INTO tipoUsuarioId FROM usuario WHERE usuarioId=OLD.usuarioId;
            IF tipoUsuarioId = 3 THEN
                UPDATE docente SET nombre=(SELECT CONCAT(NEW.nombre, ' ', NEW.aPaterno, ' ', NEW.aMaterno)) WHERE docenteId=OLD.usuarioId;
                UPDATE docente_materia SET nombre=(SELECT CONCAT(NEW.nombre, ' ', NEW.aPaterno, ' ', NEW.aMaterno)) WHERE docenteId=OLD.usuarioId;
            ELSEIF tipoUsuarioId = 4 THEN
                UPDATE alumno SET nombre=(SELECT CONCAT(NEW.nombre, ' ', NEW.aPaterno, ' ', NEW.aMaterno)) WHERE alumnoId=OLD.usuarioId;
            ELSEIF tipoUsuarioId = 5 THEN
                UPDATE padre SET nombrePadre=(SELECT CONCAT(NEW.nombre, ' ', NEW.aPaterno, ' ', NEW.aMaterno)) WHERE padreId=OLD.usuarioId;
            END IF;
        END
//
DELIMITER ;

-- 
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `docenteId` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`docenteId`),
  KEY `docenteId` (`docenteId`),
  CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`docenteId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;  

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `alumnoId` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`alumnoId`),
  KEY `alumnoId` (`alumnoId`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`alumnoId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `padre`
--

DROP TABLE IF EXISTS `padre`;
CREATE TABLE IF NOT EXISTS `padre` (
  `padreId` bigint(20) NOT NULL,
  `alumnoId` bigint(20),
  `nombrePadre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`padreId`),
  KEY `padreId` (`padreId`),
  CONSTRAINT `padre_ibfk_1` FOREIGN KEY (`padreId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `docente_materia`
--

DROP TABLE IF EXISTS `docente_materia`;
CREATE TABLE IF NOT EXISTS `docente_materia` (
  `docente_materiaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `docenteId` bigint(20) NOT NULL,  
  `materiaId` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombreMateria` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  KEY `docenteId` (`docenteId`),
  KEY `materiaId` (`materiaId`),
  PRIMARY KEY (`docente_materiaId`),
  CONSTRAINT `docente_materia_ibfk_1` FOREIGN KEY (`docenteId`) REFERENCES `docente` (`docenteId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `docente_materia_ibfk_2` FOREIGN KEY (`materiaId`) REFERENCES `materia` (`materiaId`) ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `alumno_grupo`
--

DROP TABLE IF EXISTS `alumno_grupo`;
CREATE TABLE IF NOT EXISTS `alumno_grupo` (
  `alumnoId` bigint(20) NOT NULL, 
  `grupoId` bigint(20) NOT NULL , 
  `lista` INT DEFAULT  NULL ,
  CONSTRAINT `alumno_grupo_ibfk_1` FOREIGN KEY (`alumnoId`) REFERENCES `alumno` (`alumnoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumno_grupo_ibfk_2` FOREIGN KEY (`grupoId`) REFERENCES `grupo` (`grupoId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `padre_alumno`
--

DROP TABLE IF EXISTS `padre_alumno`;
CREATE TABLE IF NOT EXISTS `padre_alumno` (
  `padreId` bigint(20) NOT NULL, 
  `alumnoId` bigint(20) NOT NULL , 
  `lista` INT DEFAULT  NULL ,
  CONSTRAINT `padre_alumno_ibfk_1` FOREIGN KEY (`padreId`) REFERENCES `padre` (`padreId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `padre_alumno_ibfk_2` FOREIGN KEY (`alumnoId`) REFERENCES `alumno` (`alumnoId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `grupo_docente_materia`
--

DROP TABLE IF EXISTS `grupo_docente_materia`;
CREATE TABLE IF NOT EXISTS `grupo_docente_materia` (
  `grupo_docente_materiaId` bigint(20) NOT NULL AUTO_INCREMENT,
  `grupoId` bigint(20) NOT NULL,  
  `docente_materiaId` bigint(20) NOT NULL,
  `claveGrupo` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nombreMateria1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`grupo_docente_materiaId`),
  KEY `grupoId` (`grupoId`),
  KEY `docente_materiaId` (`docente_materiaId`),
  CONSTRAINT `grupo_docente_materia_ibfk_1` FOREIGN KEY (`grupoId`) REFERENCES `grupo` (`grupoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grupo_docente_materia_ibfk_2` FOREIGN KEY (`docente_materiaId`) REFERENCES `docente_materia` (`docente_materiaId`) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

--
-- Table structure for table `tipo_actividad`
--

DROP TABLE IF EXISTS `tipo_actividad`;
CREATE TABLE IF NOT EXISTS `tipo_actividad` (
  `tipoActividadId` int(2) NOT NULL AUTO_INCREMENT,
  `tipoActividad` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`tipoActividadId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

LOCK TABLES `tipo_actividad` WRITE;
   INSERT INTO `tipo_actividad` VALUES (1,'evento'),(2,'publicacion'),(3,'noticia');
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE IF NOT EXISTS `actividad` (
  `actividadId` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipoActividadId` int(2) DEFAULT NULL,
  `nombreActividad` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descActividad` text COLLATE utf8_bin,
  `rutaActividad` text COLLATE utf8_bin,
  `fecha` datetime DEFAULT NULL,
  `grupo_docente_materiaId` bigint(20) NULL,
  PRIMARY KEY (`actividadId`),
  KEY `tipoActividadId` (`tipoActividadId`),
  KEY `grupo_docente_materiaId` (`grupo_docente_materiaId`),
  CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`tipoActividadId`) REFERENCES `tipo_actividad` (`tipoActividadId`)ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`grupo_docente_materiaId`) REFERENCES `grupo_docente_materia` (`grupo_docente_materiaId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `comentarioId` bigint(20) NOT NULL AUTO_INCREMENTh,
  `comentario` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `usuarioId` bigint(20) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `actividadId` bigint(20) NOT NULL,
  PRIMARY KEY (`comentarioId`),
  KEY `actividadId` (`actividadId`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`actividadId`) REFERENCES `actividad` (`actividadId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;  

 
LOCK TABLES `usuario` WRITE;
   INSERT INTO `usuario` VALUES (1,'admin','admin',1);
UNLOCK TABLES;

/**************************************************************************************************
// PROCEDURES FOR NAMES
//**************************************************************************************************/

DELIMITER ;
DROP PROCEDURE IF EXISTS `procedure_docente_materia`;
DELIMITER //
CREATE PROCEDURE `procedure_docente_materia`()
    BEGIN
        DECLARE docenteCur VARCHAR(100);
        DECLARE materiaCur VARCHAR(100);
        DECLARE nombreDoce VARCHAR(100);
        DECLARE nombreMate VARCHAR(100);
        DECLARE done BOOLEAN DEFAULT 0;
        DECLARE nombres CURSOR FOR
            SELECT docenteId, materiaId FROM docente_materia WHERE nombre IS NULL;
        DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;
            OPEN nombres;
            REPEAT
                FETCH nombres INTO docenteCur, materiaCur;
                SELECT docente.nombre INTO nombreDoce FROM docente WHERE docenteId=docenteCur;
                SELECT materia.materia INTO nombreMate FROM materia WHERE materiaId=materiaCur;

                UPDATE docente_materia SET nombre=nombreDoce WHERE docenteId=docenteCur;
                UPDATE docente_materia SET nombreMateria=nombreMate WHERE materiaId=materiaCur;

            UNTIL done end REPEAT;
        CLOSE nombres;

    END
//
DELIMITER ;


DELIMITER ;
DROP PROCEDURE IF EXISTS `procedure_grupo_docente_materia`;
DELIMITER //
CREATE PROCEDURE `procedure_grupo_docente_materia`()
    BEGIN
        DECLARE grupoCur VARCHAR(100);
        DECLARE docente_materiaCur VARCHAR(100);
        DECLARE claveGrupo VARCHAR(100);
        DECLARE nombreMate VARCHAR(100);
        DECLARE done BOOLEAN DEFAULT 0;
        DECLARE nombres CURSOR FOR
            SELECT grupoId, docente_materiaId FROM grupo_docente_materia WHERE claveGrupo IS NULL;
        DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;
            OPEN nombres;
            REPEAT
                FETCH nombres INTO grupoCur, docente_materiaCur;
                SELECT docente_materia.nombreMateria INTO nombreMate FROM docente_materia WHERE docente_materiaId=docente_materiaCur;
                SELECT grupo.claveGrupo INTO claveGrupo FROM grupo WHERE grupoId=grupoCur;

                UPDATE grupo_docente_materia SET claveGrupo=claveGrupo WHERE grupoId=grupoCur;
                UPDATE grupo_docente_materia SET nombreMateria1=nombreMate WHERE docente_materiaId=docente_materiaCur;

            UNTIL done end REPEAT;
        CLOSE nombres;

    END
//
DELIMITER ;