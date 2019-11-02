-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 06:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `author` varchar(50) NOT NULL,
  `body` text,
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_accept1`
--

CREATE TABLE `friend_accept1` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  `sender` varchar(55) DEFAULT NULL,
  `accept` tinyint(1) DEFAULT '0',
  `work` tinyint(1) DEFAULT '0',
  `social` tinyint(1) DEFAULT '0',
  `school` tinyint(1) DEFAULT '0',
  `family` tinyint(1) DEFAULT '0',
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_accept1`
--

INSERT INTO `friend_accept1` (`id`, `user1_id`, `user2_id`, `request_id`, `sender`, `accept`, `work`, `social`, `school`, `family`, `publish_date`) VALUES
(21, 18, 38, 115, 'isaac', 1, 0, 1, 0, 0, '2019-10-16 22:49:38'),
(22, 18, 1, 116, 'isaac', 1, 1, 1, 1, 1, '2019-10-16 22:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `friend_accept2`
--

CREATE TABLE `friend_accept2` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  `sender` varchar(55) DEFAULT NULL,
  `accept` tinyint(1) DEFAULT '0',
  `work` tinyint(1) DEFAULT '0',
  `social` tinyint(1) DEFAULT '0',
  `school` tinyint(1) DEFAULT '0',
  `family` tinyint(1) DEFAULT '0',
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_accept2`
--

INSERT INTO `friend_accept2` (`id`, `user1_id`, `user2_id`, `request_id`, `sender`, `accept`, `work`, `social`, `school`, `family`, `publish_date`) VALUES
(19, 38, 18, 115, 'isaac', 1, 0, 1, 0, 0, '2019-10-16 22:49:38'),
(20, 1, 18, 116, 'isaac', 1, 1, 1, 1, 1, '2019-10-16 22:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `req_sender` varchar(55) DEFAULT NULL,
  `body` text,
  `open_req` tinyint(1) DEFAULT '1',
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `user1_id`, `user2_id`, `req_sender`, `body`, `open_req`, `publish_date`) VALUES
(115, 18, 38, 'isaac', 'ham and beans', 0, '2019-10-16 22:49:38'),
(116, 18, 1, 'isaac', 'ham and beans', 0, '2019-10-16 22:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `domain_num` int(2) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` text,
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `domain_num`, `author`, `title`, `body`, `publish_date`) VALUES
(54, 18, 2, 'isaac', 'Hello, Welcome to Lab Social', 'Lab Social is a new social media platform designed to organize interactions in undestandable and meaningful ways. ', '2019-10-16 22:46:58'),
(55, 18, 1, 'isaac', 'Hello, Welcome to Lab Social', 'Lab Social is a new social media platform designed to organize interactions in undestandable and meaningful ways', '2019-10-16 22:53:11'),
(56, 18, 3, 'isaac', 'Hello, Welcome to Lab Social', 'Lab Social is a new social media platform designed to organize interactions in undestandable and meaningful ways. ...', '2019-10-16 22:59:12'),
(57, 18, 4, 'isaac', 'Hello, Welcome to Lab Social', 'Lab Social is a new social media platform designed to organize interactions in undestandable and meaningful ways. ...', '2019-10-16 22:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `profile_img`
--

CREATE TABLE `profile_img` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `publish_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_img`
--

INSERT INTO `profile_img` (`id`, `user_id`, `status`, `publish_date`) VALUES
(5, 18, 1, '2019-10-13 11:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `register_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `pic_status` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `city`, `state`, `about`, `email`, `phone`, `username`, `password`, `is_admin`, `register_date`, `pic_status`) VALUES
(1, 'Mister', 'Testy Calls', 'Saltytown', 'North Illinoisville', '  content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    content    but\r\n why', 'test@test.com', '1234567890', 'test', '$2y$10$dn/4Fiy6yollDPALjxUpnOcznCHVw13MUxzHY1E7E84Sfir.XP1FS', NULL, NULL, 0),
(18, 'Isaac', 'Moore', 'Springfield', 'Illinois', 'What is this shit? How many chumps are going to buy chump-fix? Probably very few chumps will buy chump-fix.\r\n', 'isaac@isaac.com', '123 456 7890', 'isaac', '$2y$10$NTOwi02Lhfj5UOX6n0zAFOVhHxSzJ6hTDGRizdJfBTBzfLExC0i1y', NULL, NULL, 1),
(38, 'toots', 'otto', 'tottyville', 'Illinois', 'let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalet me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   lls some tale i seen on a telEVidEo   let me tell \'yalls some tale i seen on a telEVidEo   ', 'not@friend.com', '123 123 1234', 'notfriend', '$2y$10$TkfT/uhKqjRR4rmLtX9i8.WIlXRJiVAsPRlQIoH4OGVkh7lt17wUu', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `friend_accept1`
--
ALTER TABLE `friend_accept1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `friend_accept2`
--
ALTER TABLE `friend_accept2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile_img`
--
ALTER TABLE `profile_img`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `friend_accept1`
--
ALTER TABLE `friend_accept1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `friend_accept2`
--
ALTER TABLE `friend_accept2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `profile_img`
--
ALTER TABLE `profile_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `friend_accept1`
--
ALTER TABLE `friend_accept1`
  ADD CONSTRAINT `friend_accept1_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_accept1_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_accept1_ibfk_3` FOREIGN KEY (`request_id`) REFERENCES `friend_request` (`id`);

--
-- Constraints for table `friend_accept2`
--
ALTER TABLE `friend_accept2`
  ADD CONSTRAINT `friend_accept2_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_accept2_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_accept2_ibfk_3` FOREIGN KEY (`request_id`) REFERENCES `friend_request` (`id`);

--
-- Constraints for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD CONSTRAINT `friend_request_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friend_request_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile_img`
--
ALTER TABLE `profile_img`
  ADD CONSTRAINT `profile_img_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
