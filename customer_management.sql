
CREATE DATABASE customer_management

-- Table Account
CREATE TABLE `customer_management`.`customer` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(200) NULL , 
  `username` VARCHAR(100) NULL , 
  `password` VARCHAR(50) NULL , 
  `level` TINYINT NULL , PRIMARY KEY (`id`)) 
  ENGINE = InnoDB;

-- Table Customer
CREATE TABLE `customer_management`.`customer` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(200) NULL , 
  `email` VARCHAR(200) NULL , 
  `created_date` DATE NULL , 
  `updated_date` DATE NULL , 
  PRIMARY KEY (`id`)) ENGINE = InnoDB;