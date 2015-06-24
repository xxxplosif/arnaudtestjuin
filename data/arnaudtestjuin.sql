-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema arnaudtestjuin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema arnaudtestjuin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `arnaudtestjuin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `arnaudtestjuin` ;

-- -----------------------------------------------------
-- Table `arnaudtestjuin`.`droit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arnaudtestjuin`.`droit` (
  `id` INT UNSIGNED NULL AUTO_INCREMENT,
  `lenom` VARCHAR(45) NULL,
  `laperm` SMALLINT UNSIGNED NULL DEFAULT 2,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `lenom_UNIQUE` (`lenom` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arnaudtestjuin`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arnaudtestjuin`.`utilisateur` (
  `id` INT UNSIGNED NULL AUTO_INCREMENT,
  `lelogin` VARCHAR(100) NULL,
  `lepass` VARCHAR(45) NULL,
  `lemail` VARCHAR(150) NULL,
  `lenom` VARCHAR(80) NULL,
  `valide` TINYINT UNSIGNED NULL DEFAULT 1,
  `droit_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `lelogin_UNIQUE` (`lelogin` ASC),
  INDEX `fk_utilisateur_droit_idx` (`droit_id` ASC),
  CONSTRAINT `fk_utilisateur_droit`
    FOREIGN KEY (`droit_id`)
    REFERENCES `arnaudtestjuin`.`droit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arnaudtestjuin`.`photo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arnaudtestjuin`.`photo` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lenom` VARCHAR(50) NULL,
  `lextension` CHAR(3) NULL,
  `lepoids` INT UNSIGNED NULL,
  `lalargeur` INT UNSIGNED NULL,
  `lahauteur` INT UNSIGNED NULL,
  `letitre` VARCHAR(60) NULL,
  `ladesc` VARCHAR(500) NULL,
  `affiche` SMALLINT UNSIGNED NULL DEFAULT '2',
  `utilisateur_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `lenom_UNIQUE` (`lenom` ASC),
  INDEX `fk_photo_utilisateur1_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_photo_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `arnaudtestjuin`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arnaudtestjuin`.`rubrique`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arnaudtestjuin`.`rubrique` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lintitule` VARCHAR(60) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `arnaudtestjuin`.`photo_has_rubrique`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `arnaudtestjuin`.`photo_has_rubrique` (
  `photo_id` INT UNSIGNED NOT NULL,
  `rubrique_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`photo_id`, `rubrique_id`),
  INDEX `fk_photo_has_rubrique_rubrique1_idx` (`rubrique_id` ASC),
  INDEX `fk_photo_has_rubrique_photo1_idx` (`photo_id` ASC),
  CONSTRAINT `fk_photo_has_rubrique_photo1`
    FOREIGN KEY (`photo_id`)
    REFERENCES `arnaudtestjuin`.`photo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_photo_has_rubrique_rubrique1`
    FOREIGN KEY (`rubrique_id`)
    REFERENCES `arnaudtestjuin`.`rubrique` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
