-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 06:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_link` varchar(150) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` text NOT NULL,
  `product_detail` text NOT NULL,
  `rates` float NOT NULL,
  `views` int(11) NOT NULL,
  `publisher_email` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_link`, `product_name`, `product_type`, `product_detail`, `rates`, `views`, `publisher_email`, `publisher_name`, `product_image`, `product_upload_date`) VALUES
(24, 'l4Bpf64V', ' Real-Time Rating and Review System', 'User rating and reviews become a crowd’s wisdom, guiding users in what is good and bad.', 'Introducing a rating and review system enhances user engagement and facilitates informed decision-making. Through ratings, users can express their satisfaction or dissatisfaction with products or services, while reviews offer detailed insights and personal experiences. This system fosters trust and credibility, empowering consumers to make confident choices. For businesses, it provides valuable feedback for improvement and helps identify areas of strength. Implementing a user-friendly interface encourages active participation and cultivates a vibrant community. Moreover, it fosters transparency and accountability, ensuring fair evaluations. Overall, a well-executed rating and review system not only benefits consumers by aiding their decision-making process but also contributes to the growth and success of businesses.', 0, 3, 'santhosh@gmail.com', 'santhosh I', 'l4Bpf64V.png', '2024-04-11'),
(25, '4OOYhJj0', ' Android Operating System', 'Android is an open source and Linux-based Operating System for mobile devices such as smartphones and tablet computers', 'Android is an open source and Linux-based Operating System for mobile devices such as smartphones and tablet computers. Android was developed by the Open Handset Alliance, led by Google, and other companies. Android offers a unified approach to application development for mobile devices', 0, 2, 'sample@gmail.com', 'person 1', '4OOYhJj0.jpg', '2024-04-11'),
(26, 'z7zoKmKv', ' marina beach', 'Marina Beach, or simply the Marina, is a natural urban beach in Chennai, Tamil Nadu, India, along the Bay of Bengal.', 'The Marina is a primarily sandy beach, with an average width of 300 m (980 ft)[5] and the width at the widest stretch is 437 m (1,434 ft). Bathing and swimming at the Marina are legally prohibited because of the dangers, as the undercurrent is very turbulent.', 0, 1, 'sample2@gmail.com', 'person 2', 'z7zoKmKv.jpeg', '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `product_like`
--

CREATE TABLE `product_like` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `liker_email` varchar(100) NOT NULL,
  `likeCommend` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_like`
--

INSERT INTO `product_like` (`id`, `product`, `liker_email`, `likeCommend`) VALUES
(31, 'l4Bpf64V', 'santhosh@gmail.com', 'like'),
(32, 'l4Bpf64V', 'sample@gmail.com', 'like'),
(33, '4OOYhJj0', 'sample@gmail.com', 'like'),
(34, '4OOYhJj0', 'sample2@gmail.com', 'like'),
(35, 'l4Bpf64V', 'sample2@gmail.com', 'like'),
(37, 'z7zoKmKv', 'sample2@gmail.com', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `reviewer_email` varchar(100) NOT NULL,
  `reviewer_rate` float NOT NULL,
  `reviewer_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product`, `reviewer_email`, `reviewer_rate`, `reviewer_message`) VALUES
(36, 'l4Bpf64V', 'santhosh@gmail.com', 4, 'Overall, a well-executed rating and review system not only benefits consumers by aiding their decision-making process but also contributes to the growth and success of businesses.'),
(37, 'l4Bpf64V', 'sample@gmail.com', 5, 'really good product '),
(38, '4OOYhJj0', 'sample@gmail.com', 5, 'Open source product really good one'),
(39, '4OOYhJj0', 'sample2@gmail.com', 3, 'good product'),
(40, 'l4Bpf64V', 'sample2@gmail.com', 4, 'good one 👍😁👍👍'),
(41, 'z7zoKmKv', 'sample2@gmail.com', 5, 'good place for relaxing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `img`) VALUES
(14, 'santhosh', 'I', 'santhosh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'santhosh@gmail.com.png'),
(16, 'person', '1', 'sample@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sample@gmail.com.jpg'),
(17, 'person', '2', 'sample2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sample2@gmail.com.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_like`
--
ALTER TABLE `product_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_like`
--
ALTER TABLE `product_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
