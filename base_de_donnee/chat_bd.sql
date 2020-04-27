-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 02:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf32_roman_ci NOT NULL,
  `vu` tinyint(1) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_expediteur` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `supprimer` enum('recepteur','envoyeur','tous','non') COLLATE utf32_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_roman_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `vu`, `date_message`, `id_expediteur`, `id_recepteur`, `supprimer`) VALUES
(37, 'Hello', 0, '2020-01-01 10:53:38', 3, 6, 'non'),
(38, 'Hello', 0, '2020-01-01 10:53:45', 3, 6, 'non'),
(40, 'Hmm', 0, '2020-01-01 11:03:48', 3, 5, 'non'),
(41, 'Merci', 0, '2020-01-01 11:04:53', 3, 4, 'non'),
(43, 'Salut', 0, '2020-01-18 09:50:48', 1, 3, 'non'),
(44, 'Comment tu va', 0, '2020-01-18 09:50:58', 1, 3, 'non'),
(45, 'Salut', 0, '2020-04-20 02:22:58', 1, 4, 'non'),
(46, 'Hello', 0, '2020-04-21 11:36:42', 1, 4, 'non');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf32_roman_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_roman_ci NOT NULL,
  `connecte` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_roman_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `connecte`) VALUES
(1, 'admin', '123', NULL),
(3, 'doris', '123', NULL),
(4, 'rene', '123', NULL),
(5, 'fatou', '123', NULL),
(6, 'Ali', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_expediteur` (`id_expediteur`),
  ADD KEY `fk_recepteur` (`id_recepteur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_expediteur` FOREIGN KEY (`id_expediteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recepteur` FOREIGN KEY (`id_recepteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
