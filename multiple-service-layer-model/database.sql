SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `phalcon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `phalcon` ;

-- -----------------------------------------------------
-- Table `phalcon`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `phalcon`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(200) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(200) NOT NULL ,
  `datetime` DATETIME NOT NULL ,
  PRIMARY KEY (`iduser`) )
ENGINE = InnoDB;

USE `phalcon` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

