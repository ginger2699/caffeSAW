-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 05:50 PM
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
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `path`) VALUES
(1, '../assets/img/avatar/cat1.jpg'),
(2, '../assets/img/avatar/cat2.jpg'),
(3, '../assets/img/avatar/cat3.jpg'),
(4, '../assets/img/avatar/cat4.jpg'),
(5, '../assets/img/avatar/cat5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menufilter`
--

CREATE TABLE `menufilter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filterName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menufilter`
--

INSERT INTO `menufilter` (`id`, `filterName`) VALUES
(1, 'Salads'),
(2, 'Specialty'),
(3, 'Starters');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish` varchar(50) DEFAULT NULL,
  `ingredients` varchar(200) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `filter` varchar(20) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`id`, `dish`, `ingredients`, `price`, `filter`, `picture`) VALUES
(1, 'Mozzarella Stick', 'Breadcrumbs, mozzarella, olive oil', '4.95', 'Starters', '../assets/img/menu/mozzarella.jpg'),
(2, 'Greek Salad', 'Fresh spinach, crisp romaine, tomatoes, and Greek olives', '9.95', 'Salads', '../assets/img/menu/greek-salad.jpg'),
(3, 'Classic cake', 'Slice of cake topped with whipped cream and strawberries', '3.50', 'Specialty', '../assets/img/menu/cake.jpg'),
(4, 'Lobster Roll', 'Lobsters,tortilla,carrots and parmesean', '8.90', 'Starters', '../assets/img/menu/lobster-roll.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category`, `picture`) VALUES
(1, 'Black Meowglietta', 'A 100% organic cotton T-Shirt for black cats and puns lovers', 25.00, 1, '../assets/img/products/blackTshirt.jpg'),
(2, 'White Cat T-Shirt', 'A 100% organic cotton T-Shirt for all cat people', 25.00, 1, '../assets/img/products/whiteTshirt.jpg'),
(3, 'Coffurr Pin', 'We usually do not want fur in our coffee, this pin is an exception', 4.20, 2, '../assets/img/products/catPin.jpg'),
(4, 'Cat Paw Mug', 'You can exclusively drink milk out of this', 14.90, 3, '../assets/img/products/pawMug.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productscategory`
--

CREATE TABLE `productscategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productscategory`
--

INSERT INTO `productscategory` (`id`, `name`) VALUES
(3, 'mug'),
(2, 'pin'),
(1, 'tshirt');

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
(2, 1, 5, 'I bought this because it looks nothing like my cat, and if they ask me \"Is that your cat?\" I just say no', 0, '2021-05-08'),
(3, 4, 5, 'I bought this for my mom, she really liked it, until she drank coffee out of it and her hair fell off\r\nMug: 0/10 would not reccoment\r\nBald mom: 101/10 She\'s just like me now!', 0, '2021-06-18'),
(5, 2, 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 4, '2021-07-15'),
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
(26, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(27, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(28, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(29, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(30, 2, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believabl', 4, '2021-07-15'),
(32, 1, 4, 'Nice Shoes!', 5, '2021-08-29'),
(33, 1, 4, 'prova', 2, '2021-08-29');

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `subtotal` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE `purchasedetail` (
  `purchase` bigint(20) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokenrecoverpassword`
--

CREATE TABLE `tokenrecoverpassword` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `token` text DEFAULT NULL,
  `expDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokenrecoverpassword`
--

INSERT INTO `tokenrecoverpassword` (`id`, `email`, `token`, `expDate`) VALUES
(1, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d19466', '2021-08-29'),
(2, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d11930', '2021-08-29'),
(3, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d19380', '2021-08-29'),
(4, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d15252', '2021-08-29'),
(5, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d12629', '2021-08-29'),
(6, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d16220', '2021-08-29'),
(7, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d11918', '2021-08-29'),
(8, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d18581', '2021-08-29'),
(9, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d17011', '2021-08-29'),
(10, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d13567', '2021-08-29'),
(11, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d16755', '2021-08-29'),
(12, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d19744', '2021-08-29'),
(13, 'a@a.it', '8cb777d04124436b98d8bf9620b11d038031', '2021-08-29'),
(14, 'a@a.it', '8cb777d04124436b98d8bf9620b11d0364', '2021-08-29'),
(15, 'a@a.it', '8cb777d04124436b98d8bf9620b11d038568', '2021-08-29'),
(16, 'a@a.it', '8cb777d04124436b98d8bf9620b11d03581', '2021-08-29'),
(17, 'ghirardellim2@gmail.com', '60733e6a12d01d07519f9ef2c83139d15566', '2021-08-29'),
(18, 'cnicora@virgilio.it', '4593510e9af79ece22195b2d3ce9282d2514', '2021-08-29'),
(19, 'cnicora@virgilio.it', '4593510e9af79ece22195b2d3ce9282d8020', '2021-08-29'),
(20, 'cnicora@virgilio.it', '4593510e9af79ece22195b2d3ce9282d6638', '2021-08-29');

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
(8, 'Ce', 'Prova', 'cnicora@virgilio.it', '1223423', 3, '$2y$10$PPgZQwOb2blFwNCgd/U/POPLE3BAx0uPCUhINkGm2kcud0861Xd46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `menufilter`
--
ALTER TABLE `menufilter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `filterName` (`filterName`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `menuitems_ibfk_1` (`filter`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `productCategory` (`category`);

--
-- Indexes for table `productscategory`
--
ALTER TABLE `productscategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `productsreview`
--
ALTER TABLE `productsreview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewUser` (`user`),
  ADD KEY `reviewProduct` (`product`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `purchaseUser` (`user`);

--
-- Indexes for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD PRIMARY KEY (`purchase`,`product`),
  ADD KEY `detailProduct` (`product`);

--
-- Indexes for table `tokenrecoverpassword`
--
ALTER TABLE `tokenrecoverpassword`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menufilter`
--
ALTER TABLE `menufilter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productscategory`
--
ALTER TABLE `productscategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productsreview`
--
ALTER TABLE `productsreview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokenrecoverpassword`
--
ALTER TABLE `tokenrecoverpassword`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usersinfo`
--
ALTER TABLE `usersinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`filter`) REFERENCES `menufilter` (`filterName`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productCategory` FOREIGN KEY (`category`) REFERENCES `productscategory` (`id`);

--
-- Constraints for table `productsreview`
--
ALTER TABLE `productsreview`
  ADD CONSTRAINT `reviewProduct` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `reviewUser` FOREIGN KEY (`user`) REFERENCES `usersinfo` (`id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchaseUser` FOREIGN KEY (`user`) REFERENCES `usersinfo` (`id`);

--
-- Constraints for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD CONSTRAINT `detailProduct` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `detailPurchase` FOREIGN KEY (`purchase`) REFERENCES `purchase` (`id`);

--
-- Constraints for table `tokenrecoverpassword`
--
ALTER TABLE `tokenrecoverpassword`
  ADD CONSTRAINT `tokenrecoverpassword_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usersinfo` (`email`);

--
-- Constraints for table `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD CONSTRAINT `usersinfo_ibfk_1` FOREIGN KEY (`path`) REFERENCES `avatar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
