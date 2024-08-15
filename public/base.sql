-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema examen1appweb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema examen1appweb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `examen1appweb` DEFAULT CHARACTER SET utf8 ;
USE `examen1appweb` ;

-- -----------------------------------------------------
-- Table `examen1appweb`.`clubes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen1appweb`.`clubes` (
  `club_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `deporte` VARCHAR(45) NOT NULL,
  `ubicacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`club_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examen1appweb`.`miembros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen1appweb`.`miembros` (
  `miembro_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`miembro_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `examen1appweb`.`registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examen1appweb`.`registros` (
  `registro_id` INT NOT NULL AUTO_INCREMENT,
  `estado` INT NOT NULL COMMENT 'Campo para saber el estado del club\n\n1=activo\n0=inactivo',
  `fecha_registro` DATETIME NOT NULL,
  `valor_inscripcion` INT NOT NULL,
  `cupos` INT NOT NULL COMMENT 'Cantidad de cupos disponibles para registrar',
  `clubes_club_id` INT NOT NULL,
  `miembros_miembro_id` INT NOT NULL,
  PRIMARY KEY (`registro_id`),
  INDEX `fk_registros_clubes_idx` (`clubes_club_id` ASC) ,
  INDEX `fk_registros_miembros1_idx` (`miembros_miembro_id` ASC) ,
  CONSTRAINT `fk_registros_clubes`
    FOREIGN KEY (`clubes_club_id`)
    REFERENCES `examen1appweb`.`clubes` (`club_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_registros_miembros1`
    FOREIGN KEY (`miembros_miembro_id`)
    REFERENCES `examen1appweb`.`miembros` (`miembro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;