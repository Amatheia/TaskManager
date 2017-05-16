-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `Task`;

CREATE TABLE `requests` (
  `username` varchar(500) NOT NULL,
  `create` int(11) DEFAULT NULL,
  `readId` int(11) DEFAULT NULL,
  `readAll` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  KEY `username` (`username`),
  CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `requests` (`username`, `create`, `readId`, `readAll`, `update`, `delete`) VALUES
('amalbaugh',	4,	6,	29,	3,	2),
('portishead',	5,	6,	11,	6,	5),
('loureed',	8,	6,	7,	8,	7);

CREATE TABLE `Task` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Task` (`id`, `description`) VALUES
(1,	'do dishes'),
(2,	'walk dog'),
(3,	'water the plants'),
(4,	'take out the trash'),
(8,	'study for PHP test'),
(68,	'do laundry'),
(69,	'do laundry'),
(71,	'do laundry'),
(72,	'do laundry'),
(73,	'do laundry'),
(74,	'water the plants'),
(75,	'do laundry'),
(76,	'sweep the floor'),
(77,	'do laundry'),
(79,	'do laundry'),
(80,	'do laundry'),
(81,	'make dinner'),
(82,	'make dinner'),
(83,	'make dinner');

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `created`) VALUES
(6,	'amalbaugh',	'h3ll0',	'2016-11-22 16:13:31'),
(7,	'portishead',	'12345',	'2016-11-22 16:18:15'),
(8,	'loureed',	'perfectday',	'2016-11-23 22:57:15');

-- 2016-11-24 15:51:24
