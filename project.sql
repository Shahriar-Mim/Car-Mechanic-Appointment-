-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 10:54 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `mechanics_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `phone` int(14) NOT NULL,
  `address` text NOT NULL,
  `license_number` varchar(25) NOT NULL,
  `engine_number` varchar(25) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `u_id`, `mechanics_name`, `user_name`, `phone`, `address`, `license_number`, `engine_number`, `appointment_date`, `status`) VALUES
(1, 116511, 'Debnath Kumar', 'apple', 6496496, 'Dhaka 207', '4sd6f46as54df654', '6as4df564sd645f', '0000-00-00', 1),
(2, 116511, 'Debnath Kumar', 'apple', 4516456, 'Dhaka 207', '341645865', '654645', '0000-00-00', 2),
(3, 116511, 'Baker Bhai ', 'apple', 2147483647, 'wertyertyerty', '45456', '456456', '0000-00-00', 1),
(4, 116511, 'Chayon Chowdhury', 'apple', 123456456, 'Dhaka 207', '857645634', '123456456', '0000-00-00', 1),
(5, 116511, 'Chayon Chowdhury', 'apple', 123456456, 'Dhaka 207', '123456456', '123456456', '2021-05-07', 1),
(6, 116511, 'Select Someone', 'apple', 123456456, 'Dhaka 207', '123456456', '123456456', '2021-05-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `handle` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`id`, `name`, `handle`, `status`) VALUES
(1, 'Abul Kashem ', 1, 1),
(2, 'Baker Bhai ', 1, 1),
(3, 'Chayon Chowdhury ', 4, 0),
(4, 'Debnath Kumar', 4, 0),
(5, 'Emon Chowdhury', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `u_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 116511, 'apple', 'apple@apple.com', '$2y$10$4ZnzxdhJpNXBNOjHm/GcGePWxl8KaL92tJPDVL5tKcYeyf7.E.pBG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
