-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1,	'Claire',	'clairecarsnorthampton@hotmail.com',	'17618f01a3a21b911c925bcb525a1d21abd30673'),
(2,	'Fred',	'fredthestaff@hotmail.com',	'47dd780a37f75bfa79f96baf6e6e08004407fc24');

DROP TABLE IF EXISTS `car_image`;
CREATE TABLE `car_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL,
  `img_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `car_image` (`id`, `car_id`, `img_name`, `updated`) VALUES
(1,	1,	'1.jpg',	'N'),
(2,	2,	'2.jpg',	'N'),
(3,	3,	'3.jpg',	'N'),
(4,	4,	'4.jpg',	'N'),
(5,	5,	'5.jpg',	'N');

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_price` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_price` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postedBy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturerId` int DEFAULT NULL,
  `description` longblob,
  `archived` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cars` (`id`, `car_name`, `engine`, `mileage`, `prev_price`, `cur_price`, `postedBy`, `manufacturerId`, `description`, `archived`) VALUES
(1,	'XJS',	'Petrol',	'16',	'15000',	'',	'Claire',	1,	'Made in 1996, available in green and black.',	'N'),
(2,	'E-Type',	'Petrol',	'11',	'30000',	'',	'Claire',	1,	'Excellent condition used E-Type, only 20,000 miles. ',	'N'),
(3,	'280SL',	'Diesel',	'12',	'35000',	'',	'Fred',	2,	'Gold, in excellent condition',	'N'),
(4,	'300SL',	'Petrol',	'20',	'14000',	'',	'Claire',	2,	'1992 model with just 70,000 miles.',	'N'),
(5,	'DB4',	'Diesel',	'20',	'99000',	'',	'Claire',	3,	'Classic DB4. Minor scratches but otherwise flawless condition. ',	'N');

DROP TABLE IF EXISTS `customers_enquiry`;
CREATE TABLE `customers_enquiry` (
  `enquiry_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enquiry` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enquiry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` longblob NOT NULL,
  `vacancy` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE `manufacturers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(1,	'Jaguar'),
(2,	'Mercedes'),
(3,	'Aston Martin');

DROP TABLE IF EXISTS `stories`;
CREATE TABLE `stories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `updated_carimage`;
CREATE TABLE `updated_carimage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL,
  `img_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2022-11-13 04:42:40