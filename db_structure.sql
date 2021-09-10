-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema farm_survey
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema farm_survey
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `farm_survey` DEFAULT CHARACTER SET utf8 ;
USE `farm_survey` ;

-- -----------------------------------------------------
-- Table `farm_survey`.`designation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`designation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `view_report` INT NULL,
  `take_survey` INT NULL,
  `correct_survey` INT NULL,
  `approval` INT NULL,
  `users_management` INT NULL,
  `register_farmer` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NULL,
  `middlename` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `email` VARCHAR(80) NULL,
  `phone` VARCHAR(14) NULL,
  `phone2` VARCHAR(14) NULL,
  `passkey` VARCHAR(900) NULL,
  `created_on` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `last_logged` DATETIME NULL,
  `designation_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_designation_idx` (`designation_id` ASC),
  CONSTRAINT `fk_users_designation`
    FOREIGN KEY (`designation_id`)
    REFERENCES `farm_survey`.`designation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`farmer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`farmer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NULL,
  `middlename` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `phone_no` VARCHAR(14) NULL,
  `email` VARCHAR(45) NULL,
  `gender` VARCHAR(8) NULL,
  `dob` DATE NULL,
  `marital_status` VARCHAR(45) NULL,
  `education_type` VARCHAR(45) NULL,
  `education_grade` VARCHAR(45) NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_farmer_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_farmer_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `farm_survey`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`farm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`farm` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `state` VARCHAR(45) NULL,
  `lga` VARCHAR(45) NULL,
  `cluster_community` VARCHAR(45) NULL,
  `crops_grown` TEXT NULL,
  `documented_on` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `farmer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_farm_farmer1_idx` (`farmer_id` ASC),
  CONSTRAINT `fk_farm_farmer1`
    FOREIGN KEY (`farmer_id`)
    REFERENCES `farm_survey`.`farmer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`warehouse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `state` VARCHAR(45) NULL,
  `lga` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `documented_on` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `farmer_id` INT NOT NULL,
  `farm_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_warehouse_farmer1_idx` (`farmer_id` ASC),
  INDEX `fk_warehouse_farm1_idx` (`farm_id` ASC),
  CONSTRAINT `fk_warehouse_farmer1`
    FOREIGN KEY (`farmer_id`)
    REFERENCES `farm_survey`.`farmer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_warehouse_farm1`
    FOREIGN KEY (`farm_id`)
    REFERENCES `farm_survey`.`farm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`farm_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`farm_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `item_name` VARCHAR(100) NULL,
  `description` TEXT NULL,
  `naira_value` DECIMAL(19,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`training`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`training` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NULL,
  `description` LONGTEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`images` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` LONGTEXT NULL,
  `farm_id` INT NOT NULL,
  `warehouse_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_images_farm1_idx` (`farm_id` ASC),
  INDEX `fk_images_warehouse1_idx` (`warehouse_id` ASC),
  CONSTRAINT `fk_images_farm1`
    FOREIGN KEY (`farm_id`)
    REFERENCES `farm_survey`.`farm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_warehouse1`
    FOREIGN KEY (`warehouse_id`)
    REFERENCES `farm_survey`.`warehouse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question` TEXT NULL,
  `type` VARCHAR(45) NULL,
  `production` INT NULL,
  `farm` INT NULL,
  `warehouse` INT NULL,
  `option1` TEXT NULL,
  `option2` TEXT NULL,
  `option3` TEXT NULL,
  `option4` TEXT NULL,
  `option5` TEXT NULL,
  `option6` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`loans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`loans` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL(19,2) NULL,
  `is_paying` VARCHAR(5) NULL,
  `status` INT NULL,
  `farmer_id` INT NOT NULL,
  `farm_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_loans_farmer1_idx` (`farmer_id` ASC),
  INDEX `fk_loans_farm1_idx` (`farm_id` ASC),
  CONSTRAINT `fk_loans_farmer1`
    FOREIGN KEY (`farmer_id`)
    REFERENCES `farm_survey`.`farmer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_loans_farm1`
    FOREIGN KEY (`farm_id`)
    REFERENCES `farm_survey`.`farm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`farm_has_farm_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`farm_has_farm_items` (
  `farm_id` INT NOT NULL,
  `farm_items_id` INT NOT NULL,
  `quantity` INT NULL,
  PRIMARY KEY (`farm_id`, `farm_items_id`),
  INDEX `fk_farm_has_farm_items_farm_items1_idx` (`farm_items_id` ASC),
  INDEX `fk_farm_has_farm_items_farm1_idx` (`farm_id` ASC),
  CONSTRAINT `fk_farm_has_farm_items_farm1`
    FOREIGN KEY (`farm_id`)
    REFERENCES `farm_survey`.`farm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_farm_has_farm_items_farm_items1`
    FOREIGN KEY (`farm_items_id`)
    REFERENCES `farm_survey`.`farm_items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`survey_data`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`survey_data` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `documented_on` DATE NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` DATETIME NULL,
  `end_date` DATETIME NULL,
  `device_id` TEXT NULL,
  `superisor_id` INT NULL,
  `remarks` TEXT NULL,
  `response` TEXT NULL,
  `latitude` TEXT NULL,
  `longitude` TEXT NULL,
  `farm_id` INT NOT NULL,
  `warehouse_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_survey_data_farm1_idx` (`farm_id` ASC),
  INDEX `fk_survey_data_warehouse1_idx` (`warehouse_id` ASC),
  CONSTRAINT `fk_survey_data_farm1`
    FOREIGN KEY (`farm_id`)
    REFERENCES `farm_survey`.`farm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_survey_data_warehouse1`
    FOREIGN KEY (`warehouse_id`)
    REFERENCES `farm_survey`.`warehouse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`survey_data_has_questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`survey_data_has_questions` (
  `survey_data_id` INT NOT NULL,
  `questions_id` INT NOT NULL,
  `answer` LONGTEXT NULL,
  PRIMARY KEY (`survey_data_id`, `questions_id`),
  INDEX `fk_survey_data_has_questions_questions1_idx` (`questions_id` ASC),
  INDEX `fk_survey_data_has_questions_survey_data1_idx` (`survey_data_id` ASC),
  CONSTRAINT `fk_survey_data_has_questions_survey_data1`
    FOREIGN KEY (`survey_data_id`)
    REFERENCES `farm_survey`.`survey_data` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_survey_data_has_questions_questions1`
    FOREIGN KEY (`questions_id`)
    REFERENCES `farm_survey`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`survey_correction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`survey_correction` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `correction_type` VARCHAR(45) NULL,
  `description` LONGTEXT NULL,
  `survey_data_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_survey_correction_survey_data1_idx` (`survey_data_id` ASC),
  INDEX `fk_survey_correction_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_survey_correction_survey_data1`
    FOREIGN KEY (`survey_data_id`)
    REFERENCES `farm_survey`.`survey_data` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_survey_correction_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `farm_survey`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `farm_survey`.`survey_data_has_training`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `farm_survey`.`survey_data_has_training` (
  `survey_data_id` INT NOT NULL,
  `training_id` INT NOT NULL,
  PRIMARY KEY (`survey_data_id`, `training_id`),
  INDEX `fk_survey_data_has_training_training1_idx` (`training_id` ASC),
  INDEX `fk_survey_data_has_training_survey_data1_idx` (`survey_data_id` ASC),
  CONSTRAINT `fk_survey_data_has_training_survey_data1`
    FOREIGN KEY (`survey_data_id`)
    REFERENCES `farm_survey`.`survey_data` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_survey_data_has_training_training1`
    FOREIGN KEY (`training_id`)
    REFERENCES `farm_survey`.`training` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
