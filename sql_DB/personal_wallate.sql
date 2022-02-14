-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2022 at 05:28 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_wallate`
--

-- --------------------------------------------------------

--
-- Table structure for table `Expence`
--

CREATE TABLE `Expence` (
  `id` bigint NOT NULL,
  `id_cetagory` bigint DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `Expence_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Expence`
--

INSERT INTO `Expence` (`id`, `id_cetagory`, `amount`, `discription`, `Expence_date`) VALUES
(1, 1, 1000, 'This monthly Bazar for home ', '2022-02-03'),
(2, 3, 500, 'My computer Keyboard ', '2022-02-03'),
(3, 4, 60, 'I can eat some singara ', '2022-02-09'),
(4, 5, 200, 'Apple and Orange ', '2022-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `ExpenceCetagory`
--

CREATE TABLE `ExpenceCetagory` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ExpenceCetagory`
--

INSERT INTO `ExpenceCetagory` (`id`, `name`) VALUES
(1, 'Monthly Bazar'),
(2, 'weekly Bazar'),
(3, 'Gadgets'),
(4, 'Fast Food'),
(5, 'Froots');

-- --------------------------------------------------------

--
-- Table structure for table `Income`
--

CREATE TABLE `Income` (
  `id` bigint NOT NULL,
  `id_cetagory` bigint DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `income_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Income`
--

INSERT INTO `Income` (`id`, `id_cetagory`, `amount`, `discription`, `income_date`) VALUES
(1, 1, 25000, 'This is my 1 month salary of Teaching ', '2022-02-10'),
(2, 2, 10000, 'its income of 25 days salary ', '2022-02-01'),
(3, 4, 200000, 'this is my 1 years income ', '2022-02-11'),
(4, 5, 7500, 'I took money from my Mother ', '2022-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `IncomeCetagory`
--

CREATE TABLE `IncomeCetagory` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `IncomeCetagory`
--

INSERT INTO `IncomeCetagory` (`id`, `name`) VALUES
(1, 'Teaching'),
(2, 'Freelancing'),
(3, 'Home tutor'),
(4, 'Youtube'),
(5, 'Mothers almira'),
(6, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Expence`
--
ALTER TABLE `Expence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ExpenceCetagory`
--
ALTER TABLE `ExpenceCetagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Income`
--
ALTER TABLE `Income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `IncomeCetagory`
--
ALTER TABLE `IncomeCetagory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Expence`
--
ALTER TABLE `Expence`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ExpenceCetagory`
--
ALTER TABLE `ExpenceCetagory`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Income`
--
ALTER TABLE `Income`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `IncomeCetagory`
--
ALTER TABLE `IncomeCetagory`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
