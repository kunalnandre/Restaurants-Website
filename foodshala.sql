-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 12:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemDetail` varchar(1000) DEFAULT NULL,
  `itemCost` float NOT NULL,
  `itemType` varchar(10) NOT NULL DEFAULT 'veg',
  `restroId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `itemName`, `itemDetail`, `itemCost`, `itemType`, `restroId`) VALUES
(1, 'paneer tikka', 'spicy paneer tikka prepared in olive oil for best taste.', 200, 'veg', 1),
(2, 'paneer paratha', 'A delicious paratha with paneer stuffed inside it for mouth watering experience.', 120, 'veg', 1),
(3, 'aloo paratha', '', 85, 'veg', 1),
(5, 'Butter chicken', 'very creamy and way too much buttery. ', 350, 'non veg', 2),
(6, 'Shahi Paneer', 'shahi paneer for shahi customers.', 320, 'veg', 2),
(7, 'Masala Paneer', 'A paneer gravy full of spices.', 300, 'veg', 2),
(8, 'Tandoori Roti', 'Best of rotis to go with your gravy.', 35, 'veg', 2),
(9, 'chicken paratha', 'A delicious paratha with chicken stuffed inside it for mouth watering experience.', 160, 'non veg', 1),
(11, 'paneer 65', '', 150, 'veg', 1),
(13, 'Butter chicken', 'very buttery butter chicken to make your meal heavenly.', 420, 'non veg', 1),
(14, 'chilli chicken', '', 310, 'non veg', 1),
(21, 'Shahi Paneer', '', 250, 'veg', 24),
(22, 'paneer 65', 'Best of paneer you can find', 110, 'veg', 24),
(23, 'roasted chicken', 'very spicy roasted chicken served with green chutney and onion salad.', 260, 'non veg', 1),
(24, 'veg burger', 'veg burger with aloo tikki and onions and a cheese slice to add heavenly taste to it.', 65, 'veg', 1),
(26, 'chicken burger', 'veg burger with chicken tikki and a cheese slice to add heavenly taste to it.', 90, 'non veg', 1),
(28, 'chilli paneer', 'chillies and paneer, best combination ever.', 150, 'veg', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(10) NOT NULL,
  `buyerId` int(10) NOT NULL,
  `sellerId` int(10) NOT NULL,
  `itemId` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ordered',
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `buyerId`, `sellerId`, `itemId`, `status`, `time`) VALUES
(1, 1, 1, 1, 'delivered', '2020-06-02 00:00:00'),
(2, 1, 2, 6, 'delivered', '2020-06-02 00:00:00'),
(3, 1, 2, 8, 'delivered', '2020-06-02 00:00:00'),
(5, 1, 1, 1, 'delivered', '2020-06-02 00:00:00'),
(6, 1, 1, 1, 'delivered', '2020-06-02 00:00:00'),
(7, 1, 1, 9, 'delivered', '2020-06-02 00:00:00'),
(8, 1, 1, 9, 'delivered', '2020-06-02 00:00:00'),
(9, 2, 1, 14, 'delivered', '2020-06-02 00:00:00'),
(10, 2, 1, 13, 'delivered', '2020-06-02 00:00:00'),
(11, 1, 1, 2, 'delivered', '2020-06-02 00:00:00'),
(12, 2, 2, 5, 'delivered', '2020-06-02 00:00:00'),
(13, 2, 2, 8, 'delivered', '2020-06-02 00:00:00'),
(14, 1, 2, 5, 'delivered', '2020-06-02 00:00:00'),
(15, 1, 1, 3, 'delivered', '2020-06-03 00:00:00'),
(16, 1, 1, 11, 'delivered', '2020-06-02 18:43:36'),
(17, 2, 1, 12, 'delivered', '2020-06-02 18:44:20'),
(18, 1, 1, 3, 'delivered', '2020-06-02 20:13:02'),
(19, 1, 1, 11, 'delivered', '2020-06-02 20:13:27'),
(20, 1, 1, 1, 'delivered', '2020-06-03 17:39:20'),
(21, 1, 1, 2, 'delivered', '2020-06-03 22:34:32'),
(22, 1, 1, 2, 'ordered', '2020-06-04 11:47:31'),
(23, 1, 1, 11, 'ordered', '2020-06-05 15:24:59'),
(24, 1, 24, 21, 'ordered', '2020-06-05 15:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `restro`
--

CREATE TABLE `restro` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isPureVeg` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restro`
--

INSERT INTO `restro` (`id`, `name`, `email`, `password`, `isPureVeg`) VALUES
(1, 'restro 1', 'restro1@gmail.com', '912ec803b2ce49e4a541068d495ab570', 0),
(2, 'restro 2', 'restro2@gmail.com', '912ec803b2ce49e4a541068d495ab570', 0),
(24, 'restro 3', 'restro3@gmail.com', '912ec803b2ce49e4a541068d495ab570', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `preference` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `preference`) VALUES
(1, 'user1', 'user1@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'veg'),
(2, 'user2', 'user2@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'non veg'),
(5, 'user 3', 'user3@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'non veg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `restro`
--
ALTER TABLE `restro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `restro`
--
ALTER TABLE `restro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
