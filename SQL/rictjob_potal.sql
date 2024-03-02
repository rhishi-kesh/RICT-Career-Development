-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2024 at 07:11 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rictjob_potal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `job_post_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(20) NOT NULL,
  `age` int NOT NULL,
  `uni_ins_name` varchar(191) NOT NULL,
  `sub_dep_name` varchar(100) NOT NULL,
  `year_senmister_name` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_post_id`, `name`, `email`, `number`, `age`, `uni_ins_name`, `sub_dep_name`, `year_senmister_name`, `cv`) VALUES
(3, 1, 'rr', 'reshikesh@gamj', '34', 3223, 'jj', 'hkh', 'hk', 'ff'),
(4, 1, 'Rhishi Kesh', 'reshikash300@gmail.com', '01629005842', 21, 'da', 'ad', 'adsf', 'Sarmily Biswas CV (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobposts`
--

DROP TABLE IF EXISTS `jobposts`;
CREATE TABLE IF NOT EXISTS `jobposts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company_logo` varchar(191) NOT NULL,
  `company_details` text NOT NULL,
  `job_position` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobposts`
--

INSERT INTO `jobposts` (`id`, `post_title`, `company_title`, `company_logo`, `company_details`, `job_position`, `status`) VALUES
(1, 'df', 'asdf', 'df', 'afd', 'adf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(3, 'Rhishi', 'rictadmin@gmail.com', 'a3a8f356d1c56d3db4da9a2afc062a82149efb60');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
