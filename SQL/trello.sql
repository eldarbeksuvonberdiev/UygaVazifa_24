-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2024 at 06:08 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trello`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `comment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `img`, `user_id`, `status`, `comment`) VALUES
(1, 'Something', 'Something Something', NULL, 1, 4, ''),
(2, 'Something Something', ' Something Something', NULL, 1, 0, 'Buni qaytadan qilish kerak'),
(3, 'Something', 'Something Something Something', NULL, 1, 0, 'Something'),
(4, 'Something', 'Something Something ', 'App/Images/24-10-16_05-49-14.jpg', 1, 1, NULL),
(5, 'dsnfkjanfkjdf', 'adkmvnkjanfj;nbk s;f', 'App/Images/24-10-16_06-07-22.', 1, 4, NULL),
(6, 'trerg', 'wrgegr', 'App/Images/24-10-16_12-52-41.', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, 'Boltavoy', 'boltavoy@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0),
(2, 'Elbek', 'elbek@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 0),
(8, 'Hech', 'janob@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0),
(9, 'Kimdir', 'kimdir@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 1),
(15, 'sal', 'sal@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0),
(16, 'Salomat', 'salomat@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 1),
(17, 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0),
(18, 'tester', 'tester@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0),
(19, 'sal', 'salomatmisiz@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0),
(20, 'men', 'men@gmial.com', '202cb962ac59075b964b07152d234b70', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
