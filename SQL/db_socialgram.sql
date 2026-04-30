-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2026 at 09:32 AM
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
(7, 7, 'Test block');

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
(1, 1, 1),
(2, 1, 3),
(3, 2, 5),
(4, 4, 1);

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
(1, 2, 1, 'Heellooooo'),
(2, 3, 1, 'Hello'),
(3, 5, 1, 'ooohhm helo helo'),
(4, 4, 1, 'Hiii'),
(5, 1, 4, 'Pikachu is my favorite :DD');

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
(1, 2, 1),
(3, 5, 1),
(4, 5, 2),
(5, 5, 3),
(6, 4, 3),
(7, 4, 2),
(8, 1, 4);

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
(1, 1, 'Halo Semua!', 'pict/Screenshot 2026-04-30 131731.png', 2, 2, 4),
(2, 3, 'Night Life', 'pict/Screenshot 2026-04-30 132957.png', 2, 1, 0),
(3, 3, 'Golden Lights', 'pict/Screenshot 2026-04-30 133105.png', 2, 0, 0),
(4, 4, 'Pokemons :D', 'pict/Screenshot 2026-04-30 134109.png', 1, 1, 1);

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
(1, 'user', 'Manusa Alam', 'john.doe@email.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2009-07-15', 'Jakarta, Indonesia', '084573842536', 'Male', 'Halo semua! Welcome :D', 'member', '2026-04-30 06:13:50', '1', 'Screenshot 2026-04-30 131533.png', 'Screenshot 2026-04-30 131458.png', 'ready'),
(2, 'user2', 'Sally Sunari', 'hauda@gmail.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2005-06-13', 'Yogyakarta, Indonesia', '084512316495', 'Female', 'Just walking by the digital landscape', 'member', '2026-04-30 06:21:30', '1', 'Screenshot 2026-04-30 132206.png', 'Screenshot 2026-04-30 132223.png', 'ready'),
(3, 'user3', 'Johnny Silver', 'john.silver@email.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2001-10-17', 'New York, USA', '087543436723', 'Male', 'Wake up samurai, we got a city to burn', 'member', '2026-04-30 06:26:37', '1', 'Screenshot 2026-04-30 132707.png', 'Screenshot 2026-04-30 132656.png', 'ready'),
(4, 'user4', 'Emily Santos', 'haudalina@gmail.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2006-11-10', 'Rio de Janeiro, Brazil', '089976675463', 'Female', 'Be not stressed... that is the key', 'member', '2026-04-30 06:33:40', '1', 'Screenshot 2026-04-30 133539.png', 'Screenshot 2026-04-30 133449.png', 'ready'),
(5, 'user5', 'asdas', 'apalah@gmail.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2008-01-16', 'Houston, USA', '084563457734', '', 'Everything', 'member', '2026-04-30 06:38:33', '1', 'avatar def.jpg', 'white.jpg', 'ready'),
(6, 'admin', 'Admin', 'bebas@email.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2026-04-01', 'Moscow, Russia', '099944447777', 'Male', 'Hakerman', 'admin', '2026-04-30 07:07:48', 'white', 'avatar def.jpg', 'white.jpg', 'ready'),
(7, 'deleteme', 'Delete ME ', 'deleteme@email.com', 'password', '5f4dcc3b5aa765d61d8327deb882cf99', '2026-04-23', 'Chennai, India', '000000000000', 'Male', 'Delete me plzzzz', 'member', '2026-04-30 07:20:40', 'white', 'avatar def.jpg', 'white.jpg', 'block');

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
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
