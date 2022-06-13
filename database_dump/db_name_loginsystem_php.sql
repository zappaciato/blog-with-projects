-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               10.4.22-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Zrzut struktury bazy danych loginsystem_php
CREATE DATABASE IF NOT EXISTS `loginsystem_php` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `loginsystem_php`;

-- Zrzut struktury tabela loginsystem_php.spc_game_results
CREATE TABLE IF NOT EXISTS `spc_game_results` (
  `game_index` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `attempts` int(11) unsigned NOT NULL,
  `wins` int(11) unsigned NOT NULL,
  `losses` int(11) unsigned NOT NULL,
  `draws` int(11) unsigned NOT NULL,
  `user_number` int(11) unsigned NOT NULL,
  PRIMARY KEY (`game_index`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Eksport danych został odznaczony.

-- Zrzut struktury tabela loginsystem_php.users_loginsys_php
CREATE TABLE IF NOT EXISTS `users_loginsys_php` (
  `user_number` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` tinytext NOT NULL,
  `user_password` tinytext NOT NULL,
  PRIMARY KEY (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4;

-- Eksport danych został odznaczony.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
