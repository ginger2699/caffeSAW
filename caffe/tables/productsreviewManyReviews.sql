-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 10:16 AM
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
-- Table structure for table `productsreview`
--

CREATE TABLE `productsreview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `review` varchar(200) DEFAULT NULL,
  `stars` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsreview`
--

INSERT INTO `productsreview` (`id`, `product`, `user`, `review`, `stars`, `date`) VALUES
(1, 4, 4, 'I accidentally drank tea with this mug and then it exploded!\r\nCool, would recommend  ', 0, '2021-08-21'),
(2, 1, 5, 'I bought this because it looks nothing like my cat, and if they ask me \"Is that your cat?\" I just say no', 0, '2021-05-08'),
(3, 4, 5, 'I bought this for my mom, she really liked it, until she drank coffee out of it and her hair fell off\r\nMug: 0/10 would not reccoment\r\nBald mom: 101/10 She\'s just like me now!', 0, '2021-06-18'),
(5, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(6, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(7, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(8, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(9, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(10, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(11, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(12, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(13, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(14, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(15, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(16, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(17, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(18, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(19, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(20, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(21, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(22, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(23, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(24, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
(25, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(26, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(27, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(28, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(29, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(30, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15');

--
-- Triggers `productsreview`
--
DELIMITER $$
CREATE TRIGGER `StarsRange` BEFORE INSERT ON `productsreview` FOR EACH ROW IF(new.stars < 1 or new.stars > 5) THEN
   SIGNAL SQLSTATE '45000'
   SET MESSAGE_TEXT = 'Product Reviews must have a number of starts between 1 and 5 included';
END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productsreview`
--
ALTER TABLE `productsreview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewUser` (`user`),
  ADD KEY `reviewProduct` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productsreview`
--
ALTER TABLE `productsreview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productsreview`
--
ALTER TABLE `productsreview`
  ADD CONSTRAINT `reviewProduct` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `reviewUser` FOREIGN KEY (`user`) REFERENCES `usersinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
