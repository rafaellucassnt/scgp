-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbscgp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbscgp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbscgp` DEFAULT CHARACTER SET utf8mb4 ;
USE `dbscgp` ;

-- -----------------------------------------------------
-- Table `dbscgp`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `position` VARCHAR(100) NULL DEFAULT NULL,
  `token_trello` VARCHAR(255) NULL DEFAULT NULL,
  `token_github` VARCHAR(255) NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_user_position_idx` (`position` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`projects` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `type` INT(1) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  `token_repository_github` VARCHAR(255) NULL DEFAULT NULL,
  `token_board_trello` VARCHAR(255) NULL DEFAULT NULL,
  `start_date` DATE NULL DEFAULT NULL,
  `end_date` DATE NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_projects_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_projects_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `dbscgp`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`assessments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`assessments` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projects_id` INT(10) UNSIGNED NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `resolution` TEXT NULL DEFAULT NULL,
  `type` INT(1) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_assessments_projects1_idx` (`projects_id` ASC),
  CONSTRAINT `fk_assessments_projects`
    FOREIGN KEY (`projects_id`)
    REFERENCES `dbscgp`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`failed_jobs` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbscgp`.`github`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`github` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbscgp`.`networks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`networks` (
  `id` INT(11) NOT NULL,
  `user_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `link_github` VARCHAR(255) NULL DEFAULT NULL,
  `link_trello` VARCHAR(255) NULL DEFAULT NULL,
  `link_linkedin` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_network_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_network`
    FOREIGN KEY (`user_id`)
    REFERENCES `dbscgp`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `dbscgp`.`tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`tasks` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `projects_id` INT(10) UNSIGNED NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `tag` INT(1) NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT NULL,
  `function_point` INT(11) NULL DEFAULT NULL,
  `start_date` DATE NULL DEFAULT NULL,
  `end_date` DATE NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tasks_projects1_idx` (`projects_id` ASC),
  CONSTRAINT `fk_tasks_projects1`
    FOREIGN KEY (`projects_id`)
    REFERENCES `dbscgp`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`trello`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`trello` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `token` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `dbscgp`.`users_projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbscgp`.`users_projects` (
  `users_id` INT(10) UNSIGNED NOT NULL,
  `projects_id` INT(10) UNSIGNED NOT NULL,
  `access_level` INT(1) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`users_id`, `projects_id`),
  INDEX `fk_users_has_projects_projects1_idx` (`projects_id` ASC),
  INDEX `fk_users_has_projects_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_projects_projects1`
    FOREIGN KEY (`projects_id`)
    REFERENCES `dbscgp`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_projects_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `dbscgp`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
