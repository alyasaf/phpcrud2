-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 02:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budi`
--

-- --------------------------------------------------------

--
-- Table structure for table `budi2`
--

CREATE TABLE `budi2` (
  `id` int(11) NOT NULL,
  `name` varchar(8) NOT NULL,
  `jk` varchar(4) NOT NULL,
  `ortu_id` int(11) NOT NULL,
  `cucu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budi2`
--

INSERT INTO `budi2` (`id`, `name`, `jk`, `ortu_id`, `cucu_id`) VALUES
(1, 'dedi', 'lk', 0, 0),
(2, 'dodi', 'lk', 0, 0),
(3, 'dede', 'lk', 0, 0),
(4, 'dewi', 'pr', 0, 0),
(5, 'feri', 'lk', 1, 1),
(6, 'farah', 'pr', 1, 1),
(7, 'gugus', 'lk', 2, 1),
(8, 'gandi', 'lk', 2, 1),
(9, 'hani', 'pr', 3, 1),
(10, 'hana', 'pr', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budi2`
--
ALTER TABLE `budi2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budi2`
--
ALTER TABLE `budi2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
