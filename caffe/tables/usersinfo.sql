-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 12:37 PM
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
-- Database: `catcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--

CREATE TABLE `usersinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `path` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersinfo`
--

INSERT INTO `usersinfo` (`id`, `name`, `surname`, `email`, `phonenumber`, `path`, `password`) VALUES
(3, 'cccc', 'dddd', 'hello@a.it', '', 1, '$2y$10$5KON.F4u9h/pZlmw.YVswOFL.YkRTmNznIyaaHi8XvGw1u.nMxnX6'),
(4, 'Celeste', 'Nicora', 'a@a.it', '', 4, '$2y$10$PTj21jDa1B7cJ7qn0uux..T/amu9jhs/Y2Rtf7/vNGgnfnP55UBMe'),
(5, 'michele', 'prova', 'aa@a.it', '', 1, '$2y$10$zqgmUG0Op.FT6CbCDot/XOwXNw9hWyrRGso.F6H1NQZlVm/pd9nAy'),
(6, 'prova finale', 'dkfjskjd', 'ciao@a.itjtg', '3312348187', 1, '$2y$10$9R2vrn1rA4uA6j1SowQrSe/1xxs7rlQ5GlvlQi63NtUtSOuz0ynuW'),
(7, 'Michele', 'Ciao', 'ghirardellim2@gmail.com', '', 1, '$2y$10$QILZ9D0PvwH8D/4dGVng2eIcS7L6zFGgQq3zvLemTffzJRxbH1f3u'),
(8, 'Ce', 'Prova', 'cnicora@virgilio.it', '1223423', 1, '$2y$10$PPgZQwOb2blFwNCgd/U/POPLE3BAx0uPCUhINkGm2kcud0861Xd46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `path` (`path`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersinfo`
--
ALTER TABLE `usersinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD CONSTRAINT `usersinfo_ibfk_1` FOREIGN KEY (`path`) REFERENCES `avatar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
