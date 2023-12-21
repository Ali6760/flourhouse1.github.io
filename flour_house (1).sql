-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 01:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flour_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `date_time`, `message`) VALUES
(30, 'ali', '2023-12-15 00:47:14', 'nice'),
(31, 'ali', '2023-12-22 00:12:18', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `image_url`) VALUES
(1, 'Special Pasta', 'A delightful pasta dish made with special ingredients.', 12.99, 'sp.png'),
(2, 'Margherita Pizza', 'A classic pizza topped with fresh tomatoes and mozzarella. ', 14.99, 'OIP (5).jpg'),
(3, 'Grilled Salmon', 'Freshly grilled salmon served with a savory touch.', 14.99, 'OIP (9).jpg'),
(4, 'Alfredo Chicken', 'Creamy Alfredo sauce with succulent chicken.', 16.99, 'IMG_0400.webp'),
(5, 'Caesar Salad', 'Fresh and crisp Caesar salad with homemade dressing.', 14.99, 'R (3).jpg'),
(6, 'Shrimp Pasta', 'Delicious pasta dish with succulent shrimp.', 14.99, 'OIP (7).jpg'),
(7, 'Beef Tacos', 'Classic ground beef tacos with all the fixings.', 14.99, 'R (2).jpg'),
(8, 'Veggie Burger', 'Delicious veggie burger made with fresh, wholesome ingredients.', 12.99, 'OIP (8).jpg'),
(25, 'Chicken Fahita', 'A special combination of chicken and mozzarella cheese with vegetables and avocado sauce', 11.99, 'https://mamaghanouj.com.au/wp-content/uploads/2022/01/Fahita-Rolls-with-Avocado-Sauce-1200x1600.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `quantity`, `order_date`, `location`, `phone_number`) VALUES
(1, 3, 1, '2023-12-16 23:00:54', NULL, NULL),
(2, 2, 1, '2023-12-16 23:09:40', NULL, NULL),
(3, 2, 2, '2023-12-16 23:10:04', NULL, NULL),
(4, 1, 2, '2023-12-16 23:10:09', NULL, NULL),
(5, 1, 1, '2023-12-16 23:21:53', NULL, NULL),
(6, 1, 1, '2023-12-21 20:27:07', NULL, NULL),
(7, NULL, NULL, '2023-12-21 20:31:04', NULL, NULL),
(8, NULL, NULL, '2023-12-21 20:36:01', NULL, NULL),
(9, NULL, NULL, '2023-12-21 20:37:14', NULL, NULL),
(10, NULL, NULL, '2023-12-21 20:39:47', NULL, NULL),
(11, 1, 1, '2023-12-21 20:41:27', NULL, NULL),
(12, 1, 1, '2023-12-21 20:50:44', 'tyre', '71555666'),
(13, 1, 1, '2023-12-21 20:53:11', 'tyre', '71555666'),
(14, 1, 1, '2023-12-21 20:54:28', 'tyre', '71555666'),
(15, 1, 1, '2023-12-21 20:54:54', '', ''),
(16, 6, 1, '2023-12-21 20:56:12', '', ''),
(17, 1, 3, '2023-12-21 21:05:15', 'tyre', '71451540'),
(18, 2, 4, '2023-12-21 21:05:16', 'tyre', '71451540'),
(19, 1, 3, '2023-12-21 21:11:12', 'tyre', '71451540'),
(20, 2, 4, '2023-12-21 21:11:12', 'tyre', '71451540');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `special_requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
