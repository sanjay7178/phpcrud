-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 10:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES
(7, 'test1', 'test2', '2022-06-29 17:15:04'),
(8, 'test1', 'test2', '2022-06-29 17:16:43'),
(9, '', '', '2022-06-29 22:39:39'),
(10, '', '', '2022-06-29 22:39:45'),
(12, 'go to market1', 'hey go the market and buy some crate', '2022-06-29 22:41:07'),
(13, 'go to market1', 'hey go the market and buy some crate', '2022-06-29 22:41:20'),
(14, 'fhhf', 'hfhfh', '2022-06-29 23:01:29'),
(15, 'kkkckc', 'dkdkkd', '2022-06-29 23:04:43'),
(16, 'kkkckc', 'dkdkkd', '2022-06-29 23:17:51'),
(17, 'kkkckc', 'dkdkkd', '2022-06-29 23:18:25'),
(18, 'kkkckc', 'dkdkkd', '2022-06-29 23:19:49'),
(19, 'kkkckc', 'dkdkkd', '2022-06-29 23:20:02'),
(20, 'kkkckc', 'dkdkkd', '2022-06-29 23:21:29'),
(21, 'kkkckc', 'dkdkkd', '2022-06-29 23:22:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
