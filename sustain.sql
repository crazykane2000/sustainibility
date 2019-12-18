-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2019 at 03:26 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sustain`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `for` varchar(100) NOT NULL DEFAULT 'admin',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notification`, `date`, `for`, `user_id`, `status`) VALUES
(1, 'A New User Created', '2019-11-01 15:41:11', 'admin', 0, 'Unread'),
(2, 'A New User Created', '2019-11-01 15:41:14', 'admin', 0, 'Unread'),
(3, 'A New User Created', '2019-11-01 15:41:16', 'admin', 0, 'Unread'),
(4, 'A New User Created', '2019-11-02 06:20:35', 'admin', 0, 'Unread'),
(5, 'A New Asset has been added by Kishan  Sharma', '2019-11-02 06:22:03', 'admin', 0, 'Unread'),
(6, 'A New User Created', '2019-11-08 07:07:25', 'admin', 0, 'Unread'),
(7, 'A New User Created', '2019-12-02 17:24:34', 'admin', 0, 'Unread'),
(8, 'A New User Created', '2019-12-02 17:28:10', 'admin', 0, 'Unread'),
(9, 'A New Asset has been added by Ritam  Gupta', '2019-12-02 17:30:10', 'admin', 0, 'Unread'),
(10, 'A New User Created', '2019-12-02 18:27:19', 'admin', 0, 'Unread'),
(11, 'A New Asset has been added by Mack B.', '2019-12-02 18:28:31', 'admin', 0, 'Unread'),
(12, 'A New User Created', '2019-12-02 18:30:22', 'admin', 0, 'Unread'),
(13, 'A New User Created', '2019-12-05 09:01:32', 'admin', 0, 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tx_address` varchar(60) NOT NULL,
  `file` varchar(150) NOT NULL DEFAULT 'default.jpg',
  `gender` varchar(10) NOT NULL DEFAULT 'Male',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verified` varchar(20) NOT NULL DEFAULT 'True',
  `password` varchar(100) NOT NULL DEFAULT 'pass',
  `phone` varchar(20) NOT NULL DEFAULT '1234567890',
  `activation_code` varchar(50) NOT NULL DEFAULT '123456',
  `tutorial_taken` varchar(10) NOT NULL DEFAULT 'No',
  `balance` varchar(10) NOT NULL DEFAULT '0',
  `kyc_approved` varchar(20) NOT NULL DEFAULT 'Pending',
  `g_auth_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tx_address`, `file`, `gender`, `date`, `verified`, `password`, `phone`, `activation_code`, `tutorial_taken`, `balance`, `kyc_approved`, `g_auth_key`) VALUES
(61, 'Sustainability', 'admin@sustainability.io', '0x184d11bd6c5bd928a82d4572000edddb52d0ba3c', '15686259281.png', 'Male', '2019-11-08 06:52:28', 'Yes', 'pass', '7987829007', '5a8b8a8e5531b', 'Yes', '145555.328', 'Approved', ''),
(67, 'Kishan  Sharma', 'crazykane2000@gmail.com', '0xc8a2b8886475e14cd918865c176d3fc55af443c1', 'default.jpg', '', '2019-11-01 15:12:58', 'Yes', 'password', '', '', 'No', '0', 'Pending', ''),
(69, 'Ritam Gupta', 'ritamg123@gmail.com', '0x2083e2e4a5ef246f68b1e169d1e84b9181c50f5f', 'default.jpg', '', '2019-11-08 07:07:25', 'Yes', 'asdfghjkl', '', '', 'No', '0', 'Pending', ''),
(70, 'test test', 'test@sustainability.com', '0x77074e81116afd52aa96e404cede52ef219b2821', 'default.jpg', 'Male', '2019-12-02 17:23:40', 'Yes', 'pass', '1234567890', '123456', 'No', '0', 'Pending', ''),
(71, 'Kinie Sharma', 'kishan@sustainability.io', '0xef8bfe32ea92ebfe28390457e74226032a31fccf', 'default.jpg', 'Male', '2019-12-02 17:24:34', 'Yes', 'pass', '1234567890', '123456', 'No', '0', 'Pending', NULL),
(72, 'Ritam  Gupta', 'ritamg12@gmail.com', '0x7c682ffbd1e2de5979d15177241b3fcb5c8f1c9b', 'default.jpg', 'Male', '2019-12-02 17:28:10', 'Yes', 'pass', '1234567890', '123456', 'No', '0', 'Pending', NULL),
(73, 'Mack B.', 'mack@sio.com', '0xd71604839601eed60e6b78731461b1ed3fc28055', 'default.jpg', 'Male', '2019-12-02 18:27:19', 'Yes', 'pass', '1234567890', '123456', 'No', '0', 'Pending', NULL),
(74, 'Ken T.', 'ken@sio.com', '0x1605ae922a7d01eb4edd53f897bf4a0a1edec01e', 'default.jpg', 'Male', '2019-12-02 18:30:22', 'Yes', 'pass', '1234567890', '123456', 'No', '0', 'Pending', NULL),
(75, 'Tester Tester', 'Testing@sustainability.io', '0x69523358cfe53c45d09bf027f1e3071033e5bbad', 'default.jpg', 'Male', '2019-12-05 09:01:32', 'Yes', 'pass', '1234567890', '123456', 'No', '0', 'Pending', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
