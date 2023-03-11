-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2023 at 04:51 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

DROP TABLE IF EXISTS `tbl_employees`;
CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(75) NOT NULL,
  `job` varchar(25) NOT NULL,
  `image` varchar(50) NOT NULL,
  `thumb` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role(fk)` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `fname`, `lname`, `job`, `image`, `thumb`, `username`, `password`, `role`) VALUES
(1, 'Mary', 'Smith', 'Accounting', 'person1th.jpg', 'person1th.jpg', 'mary22', 'sling1', 0),
(2, 'Bob', 'Delgado', 'Sales', 'person2.jpg', 'person2th.jpg', 'bob322', 'Andy4me', 0),
(3, 'Emily', 'Strange', 'Sales', 'person3.jpg', 'person3th.jpg', 'Safer22', 'OmyOmy', 0),
(4, 'Greg', 'Murphy', 'CEO', 'person4.jpg', 'person4th.jpg', 'YourBabe2', 'babeImyour', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `roles_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `roles_name` varchar(20) NOT NULL,
  `roles_description` varchar(50) NOT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roles_id`, `roles_name`, `roles_description`) VALUES
(1, 'Admin', 'Can update or delete'),
(2, 'Guest', 'Don\'t have functions like the Admin..'),
(3, 'Unregistered ', 'New person and have to be registered');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
