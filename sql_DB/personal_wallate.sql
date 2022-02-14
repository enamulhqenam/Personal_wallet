-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 02:50 PM
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
(4, 4, 200, 'Apple and Orange ', '2022-02-07');

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
(4, 5, 7500, 'I took money from my Mother ', '2022-02-03'),
(5, 3, 15000, 'This is Home tutor Income or every month ', '2022-02-15'),
(6, 1, 20000, 'this is 25 days income of teaching ', '2022-02-12'),
(7, 6, 3000, 'this is outsider incomes ', '2022-02-15'),
(8, 6, 350, 'this is cycle rapier cost', '2022-02-14');

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

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'enam', 'enam@gmail.com', '01750607210', '@enam123'),
(2, 'talha', 'talha@gmail.com', '01750', '!@#$1234'),
(3, 'jahid', 'jahid@gmail.com', '0175', '12345'),
(4, 'mehedi', 'mehedi@gmail.com', '019635', '123456'),
(5, 'nowrin', 'nowrin@gmail.com', '017', '12345');

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
-- Indexes for table `Users`
--
ALTER TABLE `Users`
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
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `IncomeCetagory`
--
ALTER TABLE `IncomeCetagory`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
