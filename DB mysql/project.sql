-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 10:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin&employee`
--

CREATE TABLE `admin&employee` (
  `ID` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin&employee`
--

INSERT INTO `admin&employee` (`ID`, `userName`, `Email`, `Password`, `Role`) VALUES
(1, 'Hamza', 'hamza123@gmail.com', 'hamza123', 'Admin'),
(2, 'Talha', 'talha123@gmail.com', 'talha123', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_name` varchar(255) NOT NULL,
  `cart_price` decimal(10,2) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL DEFAULT '1',
  `cart_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_name`, `cart_price`, `cart_quantity`, `cart_image`, `product_id`, `user_id`) VALUES
(70, 'Perfume', 200.00, '1', 'perfume image 01.webp', 19, 2),
(72, 'School Bag', 25.00, '1', 'bag image 01.jpg', 1, 2),
(74, 'Perfume', 200.00, '1', 'perfume image 01.webp', 19, 5),
(75, 'Doll', 55.00, '1', 'doll image 03.webp', 15, 5),
(87, 'Wallet', 100.00, '3', 'wallet image 02.jpg', 13, 1),
(92, 'Hand Bag', 30.00, '1', 'hand bag women 02.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(255) NOT NULL,
  `checkout_Fname` varchar(255) NOT NULL,
  `checkout_Lname` varchar(255) NOT NULL,
  `checkout_email` varchar(255) NOT NULL,
  `checkout_mobile` varchar(255) NOT NULL,
  `checkout_address1` varchar(255) NOT NULL,
  `checkout_address2` varchar(255) NOT NULL,
  `checkout_city` varchar(255) NOT NULL,
  `checkout_zip_code` varchar(255) NOT NULL,
  `checkout_payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `checkout_Fname`, `checkout_Lname`, `checkout_email`, `checkout_mobile`, `checkout_address1`, `checkout_address2`, `checkout_city`, `checkout_zip_code`, `checkout_payment_method`) VALUES
(1, 'Abdul', 'Rehman', 'abdul123@gmail.com', '03112682258', 'lines area saddar karachi', 'same ', 'Karachi', '744002', 'Cash_On_Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Abdul Rehman', 'abdul556@gmail.com', 'hello world', 'your product is good'),
(2, 'Wahab Ghaffar', 'wahab12@gmail.com', 'hello world 2.0', 'testing'),
(3, 'Hamza Afridi', 'hamza12@gmail.com', 'okey ', 'message check'),
(5, 'Abdul Asim', 'asim12@gmail.com', 'hello world', 'hello world hello world hello world'),
(6, 'Laiba', 'laiba78@gmail.com', 'hello world', 'hello world testing hello world testing');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackform`
--

CREATE TABLE `feedbackform` (
  `f_id` int(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbackform`
--

INSERT INTO `feedbackform` (`f_id`, `rating`, `review`, `u_id`, `p_id`) VALUES
(5, 'Very Good', 'good perfume  ( testing feedback form )', '1', '13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_des` varchar(255) NOT NULL,
  `p_cat` int(255) NOT NULL,
  `p_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_des`, `p_cat`, `p_image`) VALUES
(1, 'School Bag', '25', 'JanSport SuperBreak One Backpacks, Black - Durable, Lightweight Bookbag', 7, 'bag image 01.jpg'),
(2, 'Hand Bag', '30', 'Leather, Nylon Imported, 2 pockets (1 zip)', 2, 'hand bag women 02.jpg'),
(3, 'Greeting Card', '10', 'This greeting card is perfect for Thanks', 3, 'card image 001.jpg'),
(4, 'Hand Bag', '35', 'Vegan Leather Imported , Well-organized Structure', 2, 'hand bag women.jpg'),
(5, 'Greeting Card', '20', 'Birthday Wish Card Hand made', 3, 'geeting card image 01.webp'),
(6, 'School Bag', '50', 'LoadSpring shoulder straps help ease the weight.', 7, 'school bag image 01.jpg'),
(10, 'Files', '5', 'Hanging File Folders, Letter Size, Assorted Colors, ', 5, 'file image 01.jpeg'),
(11, 'Wallet', '70', '100% Leather, Imported, Cotton lining, Fold closure, Hand Wash', 6, 'wallet image 01.jpg'),
(12, 'Files', '8', 'Pendaflex Recycled Hanging Folders provide a smart option for everyday filing', 5, 'file image 02.jpeg'),
(13, 'Wallet', '100', 'GENUINE LEATHER MENS WALLET: The Timberland Men’s Slimfold Wallet is a thin-designed wallet made from 100% genuine leather. It’s slim design lets it fit perfectly in jeans, dress slacks, and shorts.', 6, 'wallet image 02.jpg'),
(14, 'Dolls', '40', 'Doll stands 18” tall and features deep brown eyes with rooted eyelashes.', 4, 'doll image 02.jpg'),
(15, 'Doll', '55', 'Doll is 18” tall and features deep brown eyes with rooted eyelashes.', 4, 'doll image 03.webp'),
(16, 'Face Wash', '60', 'Our effective yet gentle facial cleanser washes away excess oil, dirt and bacteria and removes makeup without over-drying or irritating skin, leaving skin feeling soft and clean', 1, 'face wash image 02.jpg'),
(17, 'Makeup Box', '130', 'This most wanted makeup gift set comes in a representable gift style packaging with premium protection inside and outside the box. Makeup a great gift idea for any occasion.', 1, 'eye lashes box image 01.webp'),
(18, 'Hair Gel', '45', 'Best Hair gel for men ..', 1, 'gel image 01.webp'),
(19, 'Perfume', '200', 'J. brings to you a masterpiece by the name of Janan which has been composed by carefully handpicking the finest of ingredients from a wide range of striking medleys in order to meet your taste.', 1, 'perfume image 01.webp');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `c_id` int(255) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`c_id`, `c_name`) VALUES
(1, 'Beauty Products'),
(2, 'Hand Bags'),
(3, 'Greeting Cards'),
(4, 'Dolls'),
(5, 'Files'),
(6, 'Wallets'),
(7, 'School Bag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_Cpass` varchar(255) NOT NULL,
  `u_number` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_Cpass`, `u_number`, `OTP`) VALUES
(1, 'Abdul Rehman', 'abdul556@gmail.com', '123', '123', '03112682258', '85689'),
(2, 'Waqas Ahmed', 'waqas11@gmail.com', '12345', '12345', '03244574589', '82865'),
(3, 'Hamza Afridi', 'hamza12@gmail.com', '', '', '', '95043'),
(4, 'Abdul Asim', 'asim12@gmail.com', '', '', '', '29032'),
(5, 'Laiba Khan', 'laiba123@gmail.com', 'laiba123', 'laiba123', '03115478965', '21446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin&employee`
--
ALTER TABLE `admin&employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbackform`
--
ALTER TABLE `feedbackform`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_cat` (`p_cat`);
ALTER TABLE `product` ADD FULLTEXT KEY `p_name` (`p_name`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin&employee`
--
ALTER TABLE `admin&employee`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbackform`
--
ALTER TABLE `feedbackform`
  MODIFY `f_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`p_cat`) REFERENCES `p_category` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
