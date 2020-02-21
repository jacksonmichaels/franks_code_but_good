-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=1;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema clients
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS clientprocess;

-- -----------------------------------------------------
-- Schema clients
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS clientprocess DEFAULT CHARACTER SET utf8 ;
USE clientprocess ;

-- -----------------------------------------------------
-- Table Department
-- -----------------------------------------------------
DROP TABLE IF EXISTS Department ;

CREATE TABLE IF NOT EXISTS Department (
  dept_id INT NOT NULL,
  dept_name VARCHAR(45) NOT NULL,
  PRIMARY KEY (dept_id))
;


-- -----------------------------------------------------
-- Table CorpClient
-- -----------------------------------------------------
DROP TABLE IF EXISTS CorpClient ;

CREATE TABLE IF NOT EXISTS CorpClient (
  cid INT NOT NULL,
  cfn VARCHAR(255) NOT NULL,
  cln VARCHAR(255) NOT NULL,
  cem VARCHAR(255) NOT NULL,
  dept_id INT NOT NULL,
  PRIMARY KEY (cid),
  CONSTRAINT fk_Client_Department1
    FOREIGN KEY (dept_id)
    REFERENCES Department (dept_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;


-- -----------------------------------------------------
-- Table Address
-- -----------------------------------------------------
DROP TABLE IF EXISTS Address ;

CREATE TABLE IF NOT EXISTS Address (
  cid INT NOT NULL,
  cstreet VARCHAR(255) NOT NULL,
  ccity VARCHAR(255) NOT NULL,
  cst CHAR(2) NOT NULL,
  czip CHAR(5) NOT NULL,
  PRIMARY KEY (cid),
  CONSTRAINT fk_Address_Client
    FOREIGN KEY (cid)
    REFERENCES CorpClient (cid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;


-- -----------------------------------------------------
-- Table Software
-- -----------------------------------------------------
DROP TABLE IF EXISTS Software ;

CREATE TABLE IF NOT EXISTS Software (
  soft_id INT NOT NULL,
  soft_name VARCHAR(45) NOT NULL,
  soft_type int NOT NULL,
  PRIMARY KEY (soft_id))
;


-- -----------------------------------------------------
-- Table ClientSoftware
-- -----------------------------------------------------
DROP TABLE IF EXISTS ClientSoftware ;

CREATE TABLE IF NOT EXISTS ClientSoftware (
  cid INT NOT NULL,
  soft_id INT NOT NULL,
  PRIMARY KEY (cid, soft_id),
  CONSTRAINT fk_Client_has_Software_Client1
    FOREIGN KEY (cid)
    REFERENCES CorpClient (cid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Client_has_Software_Software1
    FOREIGN KEY (soft_id)
    REFERENCES Software (soft_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;


-- -----------------------------------------------------
-- Table ClientComments
-- -----------------------------------------------------
DROP TABLE IF EXISTS ClientComments ;

CREATE TABLE IF NOT EXISTS ClientComments (
  cid INT NOT NULL,
  comm_id INT NOT NULL auto_increment,
  comments VARCHAR(255) NOT NULL,
  PRIMARY KEY (cid,comm_id),
  CONSTRAINT fk_ClientComments_Client1
    FOREIGN KEY (cid)
    REFERENCES CorpClient (cid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
