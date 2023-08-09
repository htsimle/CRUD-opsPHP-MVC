-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 09:08 AM
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
-- Database: `webblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `addblog`
--

CREATE TABLE `addblog` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `pic` varchar(20) NOT NULL,
  `disc` varchar(100) NOT NULL,
  `dtime` varchar(20) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addblog`
--

INSERT INTO `addblog` (`id`, `title`, `pic`, `disc`, `dtime`, `userID`) VALUES
(1, 'S22', 'Not now', 'mobile of samsung', '12:20', 1),
(2, 'Micka', 'none', 'devil fruit', '12:23', 0),
(3, 'supra', 'car', 'super car', '2023-07-03T20:55', 0),
(4, 'Anime', 'none', 'cartoon', '2023-07-06T18:57', 0),
(5, 'tennis', 'nor', 'game', '2023-07-09T16:19', 0),
(6, 'acne', 'ni', 'pimple', '12:78', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `email`, `password`) VALUES
(1, 'Farhan', 'fa@nu.gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addblog`
--
ALTER TABLE `addblog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addblog`
--
ALTER TABLE `addblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
