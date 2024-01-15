-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ems
CREATE DATABASE IF NOT EXISTS `ems` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ems`;

-- Dumping structure for table ems.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_designation` varchar(255) DEFAULT NULL,
  `emp_department` varchar(255) DEFAULT NULL,
  `emp_contract_type` varchar(255) DEFAULT NULL,
  `emp_start_date` date DEFAULT NULL,
  `emp_end_date` date DEFAULT NULL,
  `emp_status` varchar(255) DEFAULT NULL,
  `emp_nric` int DEFAULT NULL,
  `emp_phone` int DEFAULT NULL,
  `emp_password` varchar(255) DEFAULT NULL,
  `emp_admin_access` tinyint(1) DEFAULT '0',
  `emp_al` int DEFAULT NULL,
  `emp_mc` int DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `emp_email` (`emp_email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ems.leave_info
CREATE TABLE IF NOT EXISTS `leave_info` (
  `leave_id` int NOT NULL AUTO_INCREMENT,
  `leave_name` varchar(255) DEFAULT NULL,
  `leave_designation` varchar(255) DEFAULT NULL,
  `leave_department` varchar(255) DEFAULT NULL,
  `leave_start_date` date DEFAULT NULL,
  `leave_end_date` date DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `leave_reason` text,
  `leave_approval` tinyint(1) DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  PRIMARY KEY (`leave_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ems.memo
CREATE TABLE IF NOT EXISTS `memo` (
  `memo_id` int NOT NULL AUTO_INCREMENT,
  `memo_subject` varchar(255) DEFAULT NULL,
  `memo_content` text,
  `memo_department` varchar(255) DEFAULT NULL,
  `memo_start_date` date DEFAULT NULL,
  `memo_end_date` date DEFAULT NULL,
  `memo_post_date` date DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  PRIMARY KEY (`memo_id`),
  KEY `fk_memo_emp_id` (`emp_id`),
  CONSTRAINT `fk_memo_emp_id` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ems.opt
CREATE TABLE IF NOT EXISTS `opt` (
  `opt_department_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ems.opt_department
CREATE TABLE IF NOT EXISTS `opt_department` (
  `opt_department_id` int NOT NULL AUTO_INCREMENT,
  `opt_department_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`opt_department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table ems.required_fields
CREATE TABLE IF NOT EXISTS `required_fields` (
  `require_id` bigint DEFAULT NULL,
  `require_name` tinyint(1) DEFAULT '1',
  `require_nric` tinyint DEFAULT '1',
  `require_phone` tinyint DEFAULT '1',
  `require_designation` tinyint DEFAULT '1',
  `require_department` tinyint DEFAULT '1',
  `require_contract_type` tinyint DEFAULT '1',
  `require_status` tinyint DEFAULT '1',
  `require_al` tinyint DEFAULT '1',
  `require_mc` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
