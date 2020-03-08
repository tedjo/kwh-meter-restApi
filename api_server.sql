-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 07:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_kwh`
--

CREATE TABLE `info_kwh` (
  `id` int(11) NOT NULL,
  `amper` varchar(128) NOT NULL,
  `power` varchar(128) NOT NULL,
  `kwh` varchar(128) NOT NULL,
  `kwh_cost` varchar(128) NOT NULL,
  `tarif` varchar(128) NOT NULL,
  `time_on` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_kwh`
--

INSERT INTO `info_kwh` (`id`, `amper`, `power`, `kwh`, `kwh_cost`, `tarif`, `time_on`) VALUES
(1, '0.18', '38.26', '1.00', '1.00', '1467.84', '00:13'),
(2, '2', '450', '0.5', '0', '500.52', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_kwh`
--
ALTER TABLE `info_kwh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_kwh`
--
ALTER TABLE `info_kwh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
