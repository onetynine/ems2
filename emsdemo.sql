/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `ems` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ems`;

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
  `emp_admin_access` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `emp_email` (`emp_email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DELETE FROM `employee`;
INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_email`, `emp_designation`, `emp_department`, `emp_contract_type`, `emp_start_date`, `emp_end_date`, `emp_status`, `emp_nric`, `emp_phone`, `emp_password`, `emp_admin_access`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'John Doe', 'john.doe@example.com', 'Manager', 'Sales', 'Full-Time', '2023-01-01', '2023-12-31', 'Active', NULL, NULL, '1234', NULL),
	(3, 'Jane Smith', 'jane.smith@example.com', 'Engineer', 'IT', 'Part-Time', '2023-02-01', '2023-11-30', 'Inactive', NULL, NULL, NULL, NULL),
	(4, 'Bob Johnson', 'bob.johnson@example.com', 'Analyst', 'Finance', 'Full-Time', '2023-03-01', '2023-10-31', 'Active', NULL, NULL, NULL, NULL),
	(5, 'Alice Williams', 'alice.williams@example.com', 'Developer', 'IT', 'Full-Time', '2023-04-01', '2023-09-30', 'Active', NULL, NULL, NULL, NULL),
	(6, 'Charlie Brown', 'charlie.brown@example.com', 'Coordinator', 'HR', 'Part-Time', '2023-05-01', '2023-08-31', 'Inactive', NULL, NULL, NULL, NULL),
	(7, 'Eva Davis', 'eva.davis@example.com', 'Designer', 'Marketing', 'Full-Time', '2023-06-01', '2023-07-31', 'Active', NULL, NULL, NULL, NULL),
	(8, 'David Lee', 'david.lee@example.com', 'Supervisor', 'Operations', 'Full-Time', '2023-07-01', '2023-06-30', 'Active', NULL, NULL, NULL, NULL),
	(9, 'Grace Miller', 'grace.miller@example.com', 'Manager', 'HR', 'Part-Time', '2023-08-01', '2023-05-31', 'Inactive', NULL, NULL, NULL, NULL),
	(10, 'Sam Wilson', 'sam.wilson@example.com', 'Analyst', 'Finance', 'Full-Time', '2023-09-01', '2023-04-30', 'Active', NULL, NULL, NULL, NULL),
	(11, 'Linda Taylor', 'linda.taylor@example.com', 'Engineer', 'IT', 'Full-Time', '2023-10-01', '2023-03-31', 'Active', NULL, NULL, NULL, NULL);

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

DELETE FROM `leave_info`;
INSERT INTO `leave_info` (`leave_id`, `leave_name`, `leave_designation`, `leave_department`, `leave_start_date`, `leave_end_date`, `leave_type`, `leave_reason`, `leave_approval`, `emp_id`) VALUES
	(1, 'John Doe', 'Manager', 'Sales', '2023-03-01', '2023-03-05', 'Vacation', 'Holiday break', 1, 1),
	(2, 'Jane Smith', 'Engineer', 'IT', '2023-04-01', '2023-04-03', 'Sick Leave', 'Flu', 0, 2),
	(3, 'Bob Johnson', 'Analyst', 'Finance', '2023-05-01', '2023-05-05', 'Vacation', 'Family trip', 1, 3),
	(4, 'Alice Williams', 'Developer', 'IT', '2023-06-01', '2023-06-03', 'Personal Leave', 'Important event', 0, 4),
	(5, 'Charlie Brown', 'Coordinator', 'HR', '2023-07-01', '2023-07-05', 'Vacation', 'Summer break', 1, 5),
	(6, 'Eva Davis', 'Designer', 'Marketing', '2023-08-01', '2023-08-03', 'Sick Leave', 'Cold', 0, 6),
	(7, 'David Lee', 'Supervisor', 'Operations', '2023-09-01', '2023-09-05', 'Vacation', 'Traveling', 1, 7),
	(8, 'Grace Miller', 'Manager', 'HR', '2023-10-01', '2023-10-03', 'Personal Leave', 'Family function', 0, 8),
	(9, 'Sam Wilson', 'Analyst', 'Finance', '2023-11-01', '2023-11-05', 'Vacation', 'Holiday trip', 1, 9),
	(10, 'Linda Taylor', 'Engineer', 'IT', '2023-12-01', '2023-12-03', 'Sick Leave', 'Fever', 0, 10);

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

DELETE FROM `memo`;
INSERT INTO `memo` (`memo_id`, `memo_subject`, `memo_content`, `memo_department`, `memo_start_date`, `memo_end_date`, `memo_post_date`, `emp_id`) VALUES
	(1, 'Important Announcement', 'Please be informed about the upcoming meeting.', 'HR', '2023-03-01', '2023-03-01', '2023-02-25', 1),
	(2, 'Reminder: Project Deadline', 'The project deadline is approaching. Ensure all tasks are completed.', 'IT', '2023-04-01', '2023-04-10', '2023-03-25', 2),
	(3, 'Policy Update', 'There have been updates to the company policies. Please review the changes.', 'Finance', '2023-05-01', '2023-05-01', '2023-04-25', 3),
	(4, 'Team Building Event', 'Get ready for the upcoming team building event on the weekend!', 'Marketing', '2023-06-01', '2023-06-02', '2023-05-25', 4),
	(5, 'Training Session', 'There will be a mandatory training session for all employees next week.', 'Operations', '2023-07-01', '2023-07-05', '2023-06-25', 5),
	(6, 'New Employee Introduction', 'Welcome our new team member joining us next month!', 'HR', '2023-08-01', '2023-08-01', '2023-07-25', 6);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
