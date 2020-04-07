-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2020 at 08:44 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `To-Do-List`
--

-- --------------------------------------------------------

--
-- Table structure for table `Lijsten`
--

CREATE TABLE IF NOT EXISTS `Lijsten` (
  `id` int(11) NOT NULL,
  `naam` varchar(500) NOT NULL,
  `taak_1` varchar(500) NOT NULL,
  `taak_2` varchar(500) NOT NULL,
  `taak_3` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lijsten`
--

INSERT INTO `Lijsten` (`id`, `naam`, `taak_1`, `taak_2`, `taak_3`) VALUES
(1, 'Huiswerk', 'Front-End CSS', 'Back-End PHP', 'Back-End SQL'),
(2, 'Episch Gamen', 'Gamen', 'TFT', 'Geen Taak'),
(3, 'Kamer Onderhoud', 'rekenen', 'Schoonmaken', 'Boeken Lezen');

-- --------------------------------------------------------

--
-- Table structure for table `Taken`
--

CREATE TABLE IF NOT EXISTS `Taken` (
  `id` int(11) NOT NULL,
  `naam` varchar(500) NOT NULL,
  `beschrijving` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `duur` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Taken`
--

INSERT INTO `Taken` (`id`, `naam`, `beschrijving`, `status`, `duur`) VALUES
(1, 'Geen Taak', 'Geen Taak', 'geen', '0'),
(2, 'Front-End CSS', 'Styling maken', 'Bijna klaar', '20'),
(3, 'Back-End PHP', 'PHP codes schrijven', 'klaar', '20'),
(4, 'Back-End SQL', 'Query''s schrijven en testen', 'klaar', '20'),
(5, 'rekenen', 'rekensommen oplossen', 'moet nog gebeuren', '40'),
(7, 'Boeken Lezen', 'Lezen onder genot van muziek', 'komt in het ov weer', '15'),
(8, 'Gamen', 'Episch Gamen', 'vanavond', '120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Lijsten`
--
ALTER TABLE `Lijsten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Taken`
--
ALTER TABLE `Taken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Lijsten`
--
ALTER TABLE `Lijsten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Taken`
--
ALTER TABLE `Taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
