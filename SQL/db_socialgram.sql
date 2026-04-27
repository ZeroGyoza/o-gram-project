-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2026 at 04:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_socialgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocked_acc`
--

CREATE TABLE `blocked_acc` (
  `block_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocked_acc`
--

INSERT INTO `blocked_acc` (`block_id`, `user_id`, `reason`) VALUES
(2, 5, 'test block');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`bookmark_id`, `post_id`, `user_id`) VALUES
(3, 5, 1),
(5, 5, 3),
(9, 5, 4),
(10, 4, 1),
(11, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `caption`) VALUES
(1, 1, 5, 'Mantap boss'),
(2, 1, 5, ''),
(3, 1, 5, ''),
(4, 1, 5, ''),
(5, 4, 5, 'uiiihhh, halo test!'),
(6, 3, 5, 'lah, kok ada error?'),
(7, 4, 8, 'gray'),
(8, 7, 5, 'Halo');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likes_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likes_id`, `user_id`, `post_id`) VALUES
(8, 3, 5),
(9, 1, 5),
(17, 1, 4),
(18, 1, 6),
(19, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `bookmarked` int(11) DEFAULT 0,
  `comment` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `caption`, `gambar`, `likes`, `bookmarked`, `comment`) VALUES
(4, 1, 'test POST', 'pict/Screenshot 2026-04-02 150200.png', 1, 1, 0),
(5, 3, 'test POST', 'pict/Screenshot 2026-03-17 111926.png', 3, 4, 7),
(6, 1, 'test POST apalah', 'pict/Screenshot 2026-02-24 214129.png', 1, 0, 0),
(7, 4, 'eww :v', 'pict/Screenshot 2026-03-12 092228.png', 0, 0, 0),
(8, 1, 'last for now', 'pict/Screenshot 2026-03-04 105702.png', 0, 0, 1),
(9, 1, 'Caption aja', 'pict/', 0, 0, 0),
(10, 7, 'TEST postingan', 'pict/Screenshot 2026-04-20 211112.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hashpassword` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `role` enum('member','admin') DEFAULT 'member',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `bgcol` varchar(10) DEFAULT '1',
  `profilepic` varchar(255) DEFAULT NULL,
  `bannerpic` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'ready'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nickname`, `email`, `password`, `hashpassword`, `date_of_birth`, `location`, `phone`, `gender`, `bio`, `role`, `created_at`, `bgcol`, `profilepic`, `bannerpic`, `status`) VALUES
(1, 'test', 'TTESSSST', 'test@email.com', 'qawsed', 'befe9f8a14346e3e52c762f333395796', '2005-02-26', 'Bandung, Indonesia', '08123456789', 'Male', 'dsgfsdfgdsgdsgdfs', 'member', '2026-04-26 06:51:42', '2', 'Screenshot 2026-04-02 150205.png', 'Screenshot 2026-04-02 150209.png', 'ready'),
(3, 'test1', 'ytuj57i5', 'apalah1@gmail.com', 'qawsed', 'befe9f8a14346e3e52c762f333395796', '2026-04-03', 'Jacksonville, USA', '081234354', '', 'kuk,,nm,bkjgjyju', 'member', '2026-04-26 09:10:10', '2', 'avatar def.jpg', 'white.jpg', 'ready'),
(4, 'test2', 't54cxvsrgytj', 'apalah2@gmail.com', 'qawsed', 'befe9f8a14346e3e52c762f333395796', '2026-04-23', 'Cairo, Egypt', '0832347649', '', 'flykly7jbvnbrgf4 tw4eby trhsb rf', 'member', '2026-04-26 09:11:55', '2', 'avatar def.jpg', 'white.jpg', 'ready'),
(5, 'test3', '386bdhiwfy', 'apalah3@gmail.com', 'qawsed', 'befe9f8a14346e3e52c762f333395796', '2077-12-06', 'Oslo, Norway', '0487346773', '', 'hjsaodqbnjffceifjret', 'member', '2026-04-26 11:19:34', '1', 'avatar def.jpg', 'white.jpg', 'block'),
(6, '12345678', 'David Christian', 'john.doe@email.com', 'abcde', 'befe9f8a14346e3e52c762f333395796', '2026-01-05', 'Bandung, Indonesia', '0812345678', 'Male', 'Halo aku David', 'admin', '2026-04-27 02:12:02', 'white', 'avatar def.jpg', 'white.jpg', 'ready'),
(7, 'test10', 'ubah1', 'apalah4@gmail.com', 'qawsed', 'befe9f8a14346e3e52c762f333395796', '2003-10-04', 'Tokyo, Japan', '08573862', 'Female', 'dsgf sdfgd sgdsgdfs', 'member', '2026-04-27 02:40:41', '1', 'Screenshot 2026-02-24 213112.png', 'Screenshot 2026-01-27 120732.png', 'ready');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocked_acc`
--
ALTER TABLE `blocked_acc`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocked_acc`
--
ALTER TABLE `blocked_acc`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
