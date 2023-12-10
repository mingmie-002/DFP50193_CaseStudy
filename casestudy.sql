-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casestudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `katalaluan` varchar(250) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `katalaluan`, `name`) VALUES
(4, '$2y$10$K.UjQxN8BKY.zYZxLcMe6O1olpRwDWRkCSTo2Y8CWCmVFCNp.w2nq', 'azfar');

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `icnumber` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`icnumber`, `name`, `dob`, `email`, `mobilenumber`, `gender`, `address`, `city`, `state`, `status`) VALUES
('031014030211', 'fahmie', '2003-10-14', 'niesafahmie@gmail.com', '2147483647', 'male', 'Taman Hijrah', 'kangar', 'perlis', 'permanent'),
('031014030212', 'azfar', '2003-10-14', 'Azfar@gmail.com', '019453453745', 'male', 'Taman Pelangi', 'kuala perlis', 'perlis', 'training'),
('031014030213', 'amsyarrr', '2003-10-14', 'fizi@gmail.com', '01458362445', 'male', 'taman sentosa', 'kuala perlis', 'perlis', 'part-time');

-- --------------------------------------------------------

--
-- Table structure for table `employee_limit`
--

CREATE TABLE `employee_limit` (
  `status` varchar(250) NOT NULL,
  `limit_employee` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_limit`
--

INSERT INTO `employee_limit` (`status`, `limit_employee`) VALUES
('permanent', 5),
('training', 3),
('part-time', 4);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `category`, `name`, `quantity`) VALUES
(7, 'snack', 'q', 4);

-- --------------------------------------------------------

--
-- Table structure for table `stock_limit`
--

CREATE TABLE `stock_limit` (
  `category` varchar(250) NOT NULL,
  `limit_stock` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_limit`
--

INSERT INTO `stock_limit` (`category`, `limit_stock`) VALUES
('beverages', 3),
('snack', 3),
('bread', 3),
('candy', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`icnumber`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
