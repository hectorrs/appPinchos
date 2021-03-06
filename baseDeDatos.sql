-- MySQL Script generated by MySQL Workbench
-- 11/27/14 19:46:17
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Creamos un usuario
-- -----------------------------------------------------

-- CREATE USER 'apppinchos'@'localhost' IDENTIFIED BY 'apppinchos';
GRANT ALL PRIVILEGES ON * . * TO 'apppinchos'@'localhost' IDENTIFIED BY 'apppinchos';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`admin` ;

CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `usuario` VARCHAR(12) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Concurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`concurso` ;

CREATE TABLE IF NOT EXISTS `mydb`.`concurso` (
  `nombre` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `bases` VARCHAR(45) NOT NULL,
  `premios` VARCHAR(200) NOT NULL,
  `patrocinadores` VARCHAR(200) NOT NULL,
  `logo` VARCHAR(45) NOT NULL,
  `Admin_usuario` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`nombre`),
  CONSTRAINT `fk_Concurso_Admin1`
    FOREIGN KEY (`Admin_usuario`)
    REFERENCES `mydb`.`admin` (`usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`establecimiento` ;

CREATE TABLE IF NOT EXISTS `mydb`.`establecimiento` (
  `nombre` VARCHAR(20) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `horario` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL,
  `pagina_web` VARCHAR(45) NULL,
  `telefono` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pincho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pincho` ;

CREATE TABLE IF NOT EXISTS `mydb`.`pincho` (
  `idPincho` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `ingredientes` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NOT NULL,
  `Concurso_nombre` VARCHAR(45) NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `Establecimiento_nombre` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idPincho`),
  CONSTRAINT `fk_Pincho_Concurso1`
    FOREIGN KEY (`Concurso_nombre`)
    REFERENCES `mydb`.`concurso` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pincho_Establecimiento1`
    FOREIGN KEY (`Establecimiento_nombre`)
    REFERENCES `mydb`.`establecimiento` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Jurado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`jurado` ;

CREATE TABLE IF NOT EXISTS `mydb`.`jurado` (
  `idJurado` INT NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `tipo` TINYINT(1) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`idJurado`,`usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Voto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`voto` ;

CREATE TABLE IF NOT EXISTS `mydb`.`voto` (
  `idVoto` VARCHAR(45) NOT NULL,
  `puntuacion` INT NOT NULL,
  `Pincho_idPincho` INT NOT NULL,
  `Jurado_idJurado` INT NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idVoto`,`categoria`,`Pincho_idPincho`),
  CONSTRAINT `fk_Voto_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `mydb`.`pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Voto_Jurado1`
    FOREIGN KEY (`Jurado_idJurado`)
    REFERENCES `mydb`.`jurado` (`idJurado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`comentario` ;

CREATE TABLE IF NOT EXISTS `mydb`.`comentario` (
  `idComentario` INT NOT NULL,
  `comentario` VARCHAR(200) NOT NULL,
  `Jurado_idJurado` INT NOT NULL,
  `Pincho_idPincho` INT NOT NULL,
  PRIMARY KEY (`idComentario`),
  CONSTRAINT `fk_Comentario_Jurado1`
    FOREIGN KEY (`Jurado_idJurado`)
    REFERENCES `mydb`.`jurado` (`idJurado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Pincho1`
    FOREIGN KEY (`Pincho_idPincho`)
    REFERENCES `mydb`.`pincho` (`idPincho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Insertamos elementos en las tablas
-- -----------------------------------------------------

-- ADMIN

INSERT INTO `mydb`.`admin` (`usuario`, `password`) VALUES ('admin','admin');

-- CONCURSO
INSERT INTO `mydb`.`concurso` (`nombre`, `fecha_creacion`, `bases`, `premios`, `patrocinadores`, `logo`, `Admin_usuario`) VALUES ('Ourense' , '2014-04-12' , 'bases' , 'premios' , 'patrocinadores' , 'ruta al logo' , 'admin');

-- ESTABLECIMIENTOS
INSERT INTO `mydb`.`establecimiento` (`nombre`, `direccion`, `horario`, `foto`, `pagina_web`, `telefono`) VALUES ('Bar Manolo' , 'Calle Progreso n51' , '8:30 a 10:30' , 'foto.jpg','www.barmanolo.com' , 988235107);
INSERT INTO `mydb`.`establecimiento` (`nombre`, `direccion`, `horario`, `foto`, `pagina_web`, `telefono`) VALUES ('Bar Pepe' , 'Calle Paseo n12' , '8:30 a 15:30' , 'foto.jpg' , 'www.barpepe.es' , 988154985);
INSERT INTO `mydb`.`establecimiento` (`nombre`, `direccion`, `horario`, `foto`, `pagina_web`, `telefono`) VALUES ('Bar Carlos' , 'Plaza Alameda n51' , '8:30 a 20:30' , 'foto.jpg' , '' , 988574986);

-- JURADO PROFESIONAL
INSERT INTO `mydb`.`jurado` (`idJurado`, `usuario`, `password`, `tipo`, `email`, `nombre`, `apellidos`, `telefono`) VALUES (1, 'prof1', 'profesional', 1, 'profesional1@profesionales.com', 'Maria', 'perez', '695686868');
INSERT INTO `mydb`.`jurado` (`idJurado`, `usuario`, `password`, `tipo`, `email`, `nombre`, `apellidos`, `telefono`) VALUES (2, 'prof2', 'profesional', 1, 'profesional2@profesionales.com', 'Alberto', 'Chicote', '675986329');
INSERT INTO `mydb`.`jurado` (`idJurado`, `usuario`, `password`, `tipo`, `email`, `nombre`, `apellidos`, `telefono`) VALUES (3, 'prof3', 'profesional', 1, 'profesional3@profesionales.com', 'Manuel', 'Dieguez', '614574962');


-- JURADO POPULAR
INSERT INTO `mydb`.`jurado` (`idJurado`, `usuario`, `password`, `tipo`, `email`, `nombre`, `apellidos`, `telefono`) VALUES (4,'pop1','popular', 0 ,'popular1@populares.com','Pedro','García','615975631');
INSERT INTO `mydb`.`jurado` (`idJurado`, `usuario`, `password`, `tipo`, `email`, `nombre`, `apellidos`, `telefono`) VALUES (5,'pop2','popular', 0 ,'popular2@populares.com','Óscar','Gutiérrez','624351892');
INSERT INTO `mydb`.`jurado` (`idJurado`, `usuario`, `password`, `tipo`, `email`, `nombre`, `apellidos`, `telefono`) VALUES (6,'pop3','popular', 0 ,'popular3@populares.com','Zinedine','Zidane','602351976');

-- PINCHO
INSERT INTO `mydb`.`pincho` (`idPincho`, `nombre`, `descripcion`, `ingredientes`, `foto`, `precio`, `Concurso_nombre`, `estado`, `Establecimiento_nombre`)
			VALUES (1,'Pincho de Tortilla','Pincho de tortilla tradicional','Pan, Patatas, Huevos, Cebolla','ejemploPincho.jpg','1e','Ourense', 0 ,'Bar Manolo');
INSERT INTO `mydb`.`pincho` (`idPincho`, `nombre`, `descripcion`, `ingredientes`, `foto`, `precio`, `Concurso_nombre`, `estado`, `Establecimiento_nombre`)
			VALUES (2, 'Pincho de Jamon', 'Reinvencion de jamon serrano', 'Jamon serrano, sal, sirope de fresas, pan', 'ejemploPincho.jpg', '2e', 'Ourense', '1', 'Bar Pepe');
INSERT INTO `mydb`.`pincho` (`idPincho`, `nombre`, `descripcion`, `ingredientes`, `foto`, `precio`, `Concurso_nombre`, `estado`, `Establecimiento_nombre`)
			VALUES (3, 'Pantumaca a la gallega', 'Pan con tomate, aceite y pulpo', 'Tomate, Pan, Aceite, Pulpo, Sal', 'ejemploPincho.jpg', '2e', 'Ourense', '1', 'Bar Carlos');

-- COMENTARIO
INSERT INTO `mydb`.`comentario` (`idComentario`, `comentario`, `Jurado_idJurado`, `Pincho_idPincho`) VALUES (1 , 'Es un un pincho clasico pero hacen una de las mejores tortillas de Ourense. Recomendado 100%' , 4 , 1);
INSERT INTO `mydb`.`comentario` (`idComentario`, `comentario`, `Jurado_idJurado`, `Pincho_idPincho`) VALUES (2 , 'Me ha encantado, ¡Ojala gane!' , 5 , 1);
INSERT INTO `mydb`.`comentario` (`idComentario`, `comentario`, `Jurado_idJurado`, `Pincho_idPincho`) VALUES (3 , '¡Riquisimo! Casi mejor tortilla que la de mi mujer, pero ¡que no se entere!' , 6 , 1);

-- VOTO
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('1', '3', '1', '1', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('2', '2', '1', '2', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('3', '1', '1', '3', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('4', '3', '2', '1', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('5', '4', '2', '2', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('6', '5', '2', '3', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('7', '3', '3', '1', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('8', '2', '3', '2', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('9', '3', '3', '3', 'ingenio');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('10', '5', '1', '1', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('11', '4', '1', '2', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('12', '1', '1', '3', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('13', '2', '2', '1', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('14', '2', '2', '2', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('15', '3', '2', '3', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('16', '3', '3', '1', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('17', '4', '3', '2', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('18', '3', '3', '3', 'sabor');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('19', '3', '1', '1', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('20', '5', '1', '2', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('21', '1', '1', '3', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('22', '4', '2', '1', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('23', '3', '2', '2', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('24', '3', '2', '3', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('25', '2', '3', '1', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('26', '3', '3', '2', 'presentacion');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('27', '2', '3', '3', 'presentacion');

INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('28', '1', '1', '4', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('29', '0', '1', '6', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('30', '1', '2', '4', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('31', '0', '2', '5', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('32', '0', '2', '6', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('33', '1', '3', '4', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('34', '1', '1', '5', 'popular');
INSERT INTO `mydb`.`voto` (`idVoto`, `puntuacion`, `Pincho_idPincho`, `Jurado_idJurado`, `categoria`) VALUES ('35', '0', '3', '5', 'popular');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
