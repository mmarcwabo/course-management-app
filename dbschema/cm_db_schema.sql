-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema courses_management_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema courses_management_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `courses_management_db` DEFAULT CHARACTER SET utf8 ;
USE `courses_management_db` ;

-- -----------------------------------------------------
-- Table `courses_management_db`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courses_management_db`.`user` ;

CREATE TABLE IF NOT EXISTS `courses_management_db`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `names` VARCHAR(66) NOT NULL,
  `birthdate` VARCHAR(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(81) NOT NULL,
  `usertype` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `courses_management_db`.`promotion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courses_management_db`.`promotion` ;

CREATE TABLE IF NOT EXISTS `courses_management_db`.`promotion` (
  `idpromotion` INT NOT NULL,
  `level` VARCHAR(8) NOT NULL,
  `departement` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idpromotion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `courses_management_db`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courses_management_db`.`student` ;

CREATE TABLE IF NOT EXISTS `courses_management_db`.`student` (
  `idstudent` INT NOT NULL AUTO_INCREMENT,
  `user_iduser` INT NOT NULL,
  `promotion_idpromotion` INT NOT NULL,
  PRIMARY KEY (`idstudent`),
  INDEX `fk_student_user_idx` (`user_iduser` ASC),
  INDEX `fk_student_promotion1_idx` (`promotion_idpromotion` ASC),
  CONSTRAINT `fk_student_user`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `courses_management_db`.`user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_student_promotion1`
    FOREIGN KEY (`promotion_idpromotion`)
    REFERENCES `courses_management_db`.`promotion` (`idpromotion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `courses_management_db`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courses_management_db`.`teacher` ;

CREATE TABLE IF NOT EXISTS `courses_management_db`.`teacher` (
  `idteacher` INT NOT NULL,
  `grade` VARCHAR(12) NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idteacher`),
  INDEX `fk_teacher_user1_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_teacher_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `courses_management_db`.`user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `courses_management_db`.`course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courses_management_db`.`course` ;

CREATE TABLE IF NOT EXISTS `courses_management_db`.`course` (
  `idcourse` INT NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `weight` INT NOT NULL,
  `volume` VARCHAR(10) NOT NULL,
  `teacher_idteacher` INT NOT NULL,
  `promotion_idpromotion` INT NOT NULL,
  PRIMARY KEY (`idcourse`),
  INDEX `fk_course_teacher1_idx` (`teacher_idteacher` ASC),
  INDEX `fk_course_promotion1_idx` (`promotion_idpromotion` ASC),
  CONSTRAINT `fk_course_teacher1`
    FOREIGN KEY (`teacher_idteacher`)
    REFERENCES `courses_management_db`.`teacher` (`idteacher`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_course_promotion1`
    FOREIGN KEY (`promotion_idpromotion`)
    REFERENCES `courses_management_db`.`promotion` (`idpromotion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `courses_management_db`.`logs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `courses_management_db`.`logs` ;

CREATE TABLE IF NOT EXISTS `courses_management_db`.`logs` (
  `idlogs` INT NOT NULL AUTO_INCREcourses_management_dbuserMENT,
  PRIMARY KEY (`idlogs`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
