-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 09:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `uni_ins_name` varchar(191) NOT NULL,
  `sub_dep_name` varchar(100) NOT NULL,
  `year_senmister_name` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cv_drop`
--

CREATE TABLE `cv_drop` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pdf_cv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cv_drop`
--

INSERT INTO `cv_drop` (`id`, `name`, `email`, `number`, `address`, `pdf_cv`) VALUES
(1, 'admin', 'res1@gmail.com', 1629005842, 'er', 'Syful.pdf'),
(2, 'admin', 'res2@gmail.com', 1629005842, 'er', 'Capture1.PNG'),
(3, 'rohm hossain', 'res7@gmail.com', 1629005844, 'er', 'Syful.pdf'),
(4, 'Geoffrey Sawyer', 'pyvyw@mailinator.com', 1716726510, 'Nisi aliquip ipsum ', 'CamScanner 01-28-2024 13.25.pdf'),
(5, 'Oliver Carson', 'herusywola@mailinator.com', 1471112223, 'Natus aperiam labore', 'CamScanner 01-28-2024 13.25.pdf'),
(6, 'Martena Gentry', 'mdsyful243@gmail.com', 1477777888, 'Doloremque commodo n', 'Option-04.pdf'),
(7, 'Wynter Haynes', 'nirupyvu@mailinator.com', 1477777888, 'Cumque reiciendis es', 'Option-01 (1).pdf'),
(8, 'Emerson Brock', 'gilaqity@mailinator.com', 1712345678, 'Labore voluptatem V', 'Option-04.pdf'),
(9, 'Danielle Blanchard', 'qoda@mailinator.com', 1478945632, 'Itaque voluptas dict', 'Option-02.pdf'),
(10, 'Tana Mitchell', 'beco@mailinator.com', 1477777888, 'Perferendis et non s', 'Option-01.pdf'),
(11, 'Xenos Walters', 'dipo@mailinator.com', 1932456874, 'Veritatis aliquid si', 'Option-01 (1).pdf'),
(12, 'Channing James', 'megecob@mailinator.com', 1932456874, 'Id atque odit dolore', 'Option-04.pdf'),
(13, 'Ainsley Gibbs', 'zetejajyb@mailinator.com', 1932456874, 'Soluta amet qui qui', 'CamScanner 01-28-2024 13.25.pdf'),
(14, 'Hillary Sawyer', 'tuhipyhydo@mailinator.com', 1932456872, 'Provident rem itaqu', 'CamScanner 01-28-2024 13.25.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobposts`
--

CREATE TABLE `jobposts` (
  `id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `company_title` varchar(191) NOT NULL,
  `company_logo` varchar(191) NOT NULL,
  `company_details` text NOT NULL,
  `job_position` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `image`) VALUES
(38, '919Capture.PNG'),
(39, '768pexels-fauxels-3182812.jpg'),
(40, '861pexels-mikhail-nilov-6930549.jpg'),
(41, '050syful.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(3, 'Rhishi', 'rictadmin@gmail.com', 'a3a8f356d1c56d3db4da9a2afc062a82149efb60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_drop`
--
ALTER TABLE `cv_drop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobposts`
--
ALTER TABLE `jobposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cv_drop`
--
ALTER TABLE `cv_drop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobposts`
--
ALTER TABLE `jobposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
