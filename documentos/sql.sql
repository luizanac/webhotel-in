-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema webco519_booking_system
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema webco519_booking_system
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webco519_booking_system` DEFAULT CHARACTER SET utf8 ;
USE `webco519_booking_system` ;

-- -----------------------------------------------------
-- Table `webco519_booking_system`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`users` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `phone_user` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `celphone_user` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `email_user` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `pass_user` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  `login_user` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `template_user` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `login_user_UNIQUE` (`login_user` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`clients` (
  `id_client` INT(11) NOT NULL AUTO_INCREMENT,
  `name_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `celphone_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `email_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `city_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `state_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `country_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `cep_client` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  INDEX `fk_clients_users1_idx` (`id_user` ASC),
  CONSTRAINT `fk_clients_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `webco519_booking_system`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`features`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`features` (
  `id_feature` INT(11) NOT NULL AUTO_INCREMENT,
  `name_feature` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `description_feature` TEXT CHARACTER SET 'utf8' NOT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_feature`),
  INDEX `fk_features_users1_idx` (`id_user` ASC),
  CONSTRAINT `fk_features_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `webco519_booking_system`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`room_kinds`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`room_kinds` (
  `id_room_kind` INT(11) NOT NULL AUTO_INCREMENT,
  `name_room_kind` VARCHAR(45) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_room_kind`),
  INDEX `fk_room_kinds_users1_idx` (`id_user` ASC),
  CONSTRAINT `fk_room_kinds_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `webco519_booking_system`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`kind_images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`kind_images` (
  `id_kind_image` INT(11) NOT NULL AUTO_INCREMENT,
  `kind_image_route` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `id_room_kind` INT(11) NOT NULL,
  PRIMARY KEY (`id_kind_image`),
  INDEX `fk_kind_images_room_kinds1_idx` (`id_room_kind` ASC),
  CONSTRAINT `fk_kind_images_room_kinds1`
    FOREIGN KEY (`id_room_kind`)
    REFERENCES `webco519_booking_system`.`room_kinds` (`id_room_kind`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 48
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`reservations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`reservations` (
  `id_reservation` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date_reservation` DATETIME NOT NULL,
  `end_date_reservation` DATETIME NOT NULL,
  `description_reservation` TEXT CHARACTER SET 'utf8' NOT NULL,
  `total_value_reservation` DECIMAL(10,2) NOT NULL,
  `id_client` INT(11) NOT NULL,
  `id_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_reservation`),
  INDEX `fk_reservations_clients1_idx` (`id_client` ASC),
  INDEX `fk_reservations_users1_idx` (`id_user` ASC),
  CONSTRAINT `fk_reservations_clients1`
    FOREIGN KEY (`id_client`)
    REFERENCES `webco519_booking_system`.`clients` (`id_client`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservations_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `webco519_booking_system`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`rooms` (
  `id_room` INT(11) NOT NULL AUTO_INCREMENT,
  `number_room` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `description_room` TEXT CHARACTER SET 'utf8' NOT NULL,
  `double_bed_room` INT(11) NOT NULL,
  `single_bed_room` INT(11) NOT NULL,
  `disabled_room` TINYINT(1) NULL DEFAULT '0',
  `bunk_bed_room` INT(11) NOT NULL DEFAULT '0',
  `id_user` INT(11) NOT NULL,
  `id_room_kind` INT(11) NOT NULL,
  PRIMARY KEY (`id_room`, `id_room_kind`),
  UNIQUE INDEX `number_room_UNIQUE` (`number_room` ASC),
  INDEX `fk_rooms_users1_idx` (`id_user` ASC),
  INDEX `fk_rooms_room_kinds1_idx` (`id_room_kind` ASC),
  CONSTRAINT `fk_rooms_room_kinds1`
    FOREIGN KEY (`id_room_kind`)
    REFERENCES `webco519_booking_system`.`room_kinds` (`id_room_kind`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rooms_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `webco519_booking_system`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`reservation_rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`reservation_rooms` (
  `id_reservation_room` INT(11) NOT NULL AUTO_INCREMENT,
  `adults_reservation_room` INT(11) NOT NULL,
  `childrens_reservation_room` INT(11) NOT NULL,
  `id_room` INT(11) NOT NULL,
  `id_reservation` INT(11) NOT NULL,
  PRIMARY KEY (`id_reservation_room`, `id_room`, `id_reservation`),
  INDEX `fk_reservation_rooms_rooms1_idx` (`id_room` ASC),
  INDEX `fk_reservation_rooms_reservations1_idx` (`id_reservation` ASC),
  CONSTRAINT `fk_reservation_rooms_reservations1`
    FOREIGN KEY (`id_reservation`)
    REFERENCES `webco519_booking_system`.`reservations` (`id_reservation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservation_rooms_rooms1`
    FOREIGN KEY (`id_room`)
    REFERENCES `webco519_booking_system`.`rooms` (`id_room`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`room_features`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`room_features` (
  `id_feature` INT(11) NOT NULL,
  `id_room_kind` INT(11) NOT NULL,
  PRIMARY KEY (`id_feature`, `id_room_kind`),
  INDEX `fk_rooms_has_fature_fature1_idx` (`id_feature` ASC),
  INDEX `fk_room_features_room_kinds1_idx` (`id_room_kind` ASC),
  CONSTRAINT `fk_room_features_room_kinds1`
    FOREIGN KEY (`id_room_kind`)
    REFERENCES `webco519_booking_system`.`room_kinds` (`id_room_kind`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rooms_has_fature_fature1`
    FOREIGN KEY (`id_feature`)
    REFERENCES `webco519_booking_system`.`features` (`id_feature`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`room_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`room_image` (
  `id_image` INT(11) NOT NULL AUTO_INCREMENT,
  `route_image` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `id_room` INT(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  INDEX `fk_room_image_rooms1_idx` (`id_room` ASC),
  CONSTRAINT `fk_room_image_rooms1`
    FOREIGN KEY (`id_room`)
    REFERENCES `webco519_booking_system`.`rooms` (`id_room`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`tariffs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`tariffs` (
  `id_tariff` INT(11) NOT NULL AUTO_INCREMENT,
  `name_tariff` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `id_user` INT(11) NOT NULL,
  `base_price` DECIMAL(10,2) NOT NULL,
  `adult_price` DECIMAL(10,2) NOT NULL,
  `children_price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_tariff`),
  INDEX `fk_room_kind_interval_users1_idx` (`id_user` ASC),
  CONSTRAINT `fk_room_kind_interval_users1`
    FOREIGN KEY (`id_user`)
    REFERENCES `webco519_booking_system`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `webco519_booking_system`.`tariff_has_room_kinds`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webco519_booking_system`.`tariff_has_room_kinds` (
  `id_tariff` INT(11) NOT NULL,
  `id_room_kind` INT(11) NOT NULL,
  PRIMARY KEY (`id_tariff`, `id_room_kind`),
  INDEX `fk_tariff_has_room_kinds_room_kinds1_idx` (`id_room_kind` ASC),
  INDEX `fk_tariff_has_room_kinds_tariff1_idx` (`id_tariff` ASC),
  CONSTRAINT `fk_tariff_has_room_kinds_room_kinds1`
    FOREIGN KEY (`id_room_kind`)
    REFERENCES `webco519_booking_system`.`room_kinds` (`id_room_kind`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tariff_has_room_kinds_tariff1`
    FOREIGN KEY (`id_tariff`)
    REFERENCES `webco519_booking_system`.`tariffs` (`id_tariff`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
