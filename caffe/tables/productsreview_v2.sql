-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 11:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

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
(1, 4, 4, 'I accidentally drank tea with this mug and then it exploded!\r\nCool, would recommend  ', 3, '2021-08-21'),
(2, 1, 5, 'I bought this because it looks nothing like my cat, and if they ask me \"Is that your cat?\" I just say no', 1, '2021-05-08'),
(3, 4, 5, 'I bought this for my mom, she really liked it, until she drank coffee out of it and her hair fell off\r\nMug: 0/10 would not reccoment\r\nBald mom: 101/10 She\'s just like me now!', 5, '2021-06-18');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
