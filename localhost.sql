-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2016 at 03:28 PM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) unsigned NOT NULL,
  `cat_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_type`) VALUES
(1, 'hot_drinks'),
(2, 'soft_drinks');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) unsigned NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `room_no` int(10) unsigned NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_image` varchar(200) NOT NULL,
  `EXT` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `Email`, `Password`, `room_no`, `customer_name`, `customer_image`, `EXT`) VALUES
(8, 'khaled7oza@yahoo.com', '123', 5001, 'khaled', 'coffee.png', 20123),
(9, 'ahmedmoawad@gmail.com', '123', 5001, 'khaled', 'IMG_0187.JPG', 1254);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `order_id` int(10) unsigned NOT NULL,
  `product` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_amount` int(10) unsigned NOT NULL,
  `order_notes` varchar(300) NOT NULL,
  `order_customer_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) unsigned NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(10) unsigned NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_status`) VALUES
(5, 'tea', 2, 'IMG_0187.JPG', 'hot_drinks', 'available'),
(6, 'coffee', 3, '/var/www/html/Cafeteria_Projects/img/1937216_963539953695603_2427118625703023155_n.jpg', 'hot_drinks', 'available'),
(7, 'cola', 10, '/var/www/html/Cafeteria_Projects/img/12321236_963540093695589_7600068167871038428_n.jpg', 'hot_drinks', 'available'),
(8, 'fayrouz', 15, '/var/www/html/Cafeteria_Projects/img/12472400_963540103695588_7166887994450989510_n.jpg', 'soft_drinks', 'available'),
(9, 'stella', 25, '/var/www/html/Cafeteria_Projects/img/12510505_1560747080883746_8769426327159941476_n.jpg', 'soft_drinks', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(10) unsigned NOT NULL,
  `room_no` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`) VALUES
(1, 5001),
(2, 5002),
(3, 5003),
(4, 5004);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `category` (`cat_type`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD KEY `room_id` (`room_no`),
  ADD KEY `room_no` (`room_no`),
  ADD KEY `room_no_2` (`room_no`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD KEY `order` (`order_id`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer_id` (`order_customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_no` (`room_no`),
  ADD KEY `room_no_2` (`room_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `categories` (`cat_type`) ON UPDATE CASCADE;
--
-- Database: `phplab`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `relpost_id` int(10) unsigned NOT NULL,
  `comment` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) unsigned NOT NULL,
  `post` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post`, `user_id`) VALUES
(1, 'hi sara', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(9, 'amr', 'ahmed', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `relpost_id` (`relpost_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`relpost_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
--
-- Database: `testing`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`teacher1`@`localhost` PROCEDURE `absent_khaled`()
begin
select absent from relations where student_id=1;
end$$

CREATE DEFINER=`teacher1`@`localhost` PROCEDURE `avg_linux`()
begin select avg(score) from relations where subject_name='linux'; end$$

CREATE DEFINER=`teacher1`@`localhost` PROCEDURE `sum_result`()
begin select sum(score) from relations where student_id =1; end$$

--
-- Functions
--
CREATE DEFINER=`teacher1`@`localhost` FUNCTION `fail_count`() RETURNS int(11)
begin  return (select count(*) from relations where score<30 and  quiz_type='final' and subject_name='linux'); end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `type` char(30) NOT NULL,
  `max_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`type`, `max_score`) VALUES
('final', 50),
('quiz', 10);

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE IF NOT EXISTS `relations` (
  `student_id` int(10) unsigned NOT NULL DEFAULT '0',
  `subject_name` char(50) NOT NULL,
  `quiz_type` char(30) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `absent` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`student_id`, `subject_name`, `quiz_type`, `score`, `date`, `absent`) VALUES
(1, 'linux', 'final', 40, '2016-01-22', 'not'),
(2, 'linux', 'final', 45, '2016-02-11', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `student_id` int(10) unsigned NOT NULL,
  `info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `info`) VALUES
(1, 9876543),
(2, 1123456789);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` char(20) NOT NULL,
  `last_name` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `password`, `gender`, `birth_date`, `first_name`, `last_name`) VALUES
(1, 'khaled.hoza@gmail.com', 'me4ha2olk', 'male', '1991-02-11', 'khaled', 'hoza'),
(2, 'mohamed@gmail.com', '123456', 'male', '1991-02-11', 'mohamed', 'rezo'),
(3, 'mohamed@gmail.com', '123456', 'male', '1991-02-11', 'mohamed', 'rezo'),
(4, 'mohamed@gmail.com', '123456', 'male', '1991-02-11', 'mohamed', 'rezo');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `std_update` BEFORE UPDATE ON `students`
 FOR EACH ROW begin insert into students_update set first_name=old.first_name, last_name=old.last_name, gender=old.gender, email=old.email, birth_date=old.birth_date, id=old.id, password=old.password; end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students_update`
--

CREATE TABLE IF NOT EXISTS `students_update` (
  `id` int(10) unsigned NOT NULL,
  `email` char(100) NOT NULL,
  `password` char(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` char(20) NOT NULL,
  `last_name` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_update`
--

INSERT INTO `students_update` (`id`, `email`, `password`, `gender`, `birth_date`, `first_name`, `last_name`) VALUES
(1, 'khaled.hoza@gmail.com', 'me4ha2olk', 'male', '1991-02-11', 'khaled', 'ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `name` char(50) NOT NULL,
  `total_grades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`name`, `total_grades`) VALUES
('linux', 15),
('sql', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`student_id`,`quiz_type`,`subject_name`,`date`),
  ADD KEY `quiz_type` (`quiz_type`),
  ADD KEY `subject_name` (`subject_name`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`id`),
  ADD KEY `unique` (`email`);

--
-- Indexes for table `students_update`
--
ALTER TABLE `students_update`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`id`),
  ADD KEY `unique` (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students_update`
--
ALTER TABLE `students_update`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`quiz_type`) REFERENCES `quiz` (`type`),
  ADD CONSTRAINT `relations_ibfk_3` FOREIGN KEY (`subject_name`) REFERENCES `subject` (`name`);

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `student_info_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
--
-- Database: `testing1`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
