-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 06:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result`
--

-- --------------------------------------------------------

--
-- Table structure for table `class1`
--

CREATE TABLE `class1` (
  `id` bigint(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `totalobtained` int(11) NOT NULL,
  `totalmarks` int(11) NOT NULL,
  `percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class1`
--

INSERT INTO `class1` (`id`, `name`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `totalobtained`, `totalmarks`, `percent`) VALUES
(1, 'alen', 100, 100, 100, 100, 100, 500, 500, 100),
(2, 'alen', 100, 100, 100, 100, 100, 500, 500, 100),
(3, 'aasasas', 45, 45, 56, 67, 66, 279, 500, 55.8),
(4, 'aasasas', 45, 45, 56, 67, 66, 279, 500, 55.8),
(5, 'john', 45, 45, 56, 67, 100, 313, 500, 62.6),
(6, 'john', 45, 45, 56, 67, 100, 313, 500, 62.6),
(7, 'john', 45, 45, 56, 67, 100, 313, 500, 62.6),
(8, 'Rohan', 55, 66, 77, 88, 99, 385, 500, 77),
(9, 'alex', 100, 100, 100, 100, 100, 500, 500, 100),
(10, 'sam', 100, 100, 100, 45, 100, 445, 500, 89);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class1`
--
ALTER TABLE `class1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class1`
--
ALTER TABLE `class1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
