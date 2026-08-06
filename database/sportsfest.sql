-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2026 at 02:03 AM
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
-- Database: `sportsfest`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `max_points` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_place` int(11) DEFAULT 0,
  `second_place` int(11) DEFAULT 0,
  `third_place` int(11) DEFAULT 0,
  `fourth_place` int(11) DEFAULT 0,
  `fifth_place` int(11) DEFAULT 0,
  `sixth_place` int(11) DEFAULT 0,
  `non_winner` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `category`, `max_points`, `created_at`, `first_place`, `second_place`, `third_place`, `fourth_place`, `fifth_place`, `sixth_place`, `non_winner`) VALUES
(1, 'Walkathon', 'Major', 0, '2026-08-04 08:37:35', 30, 25, 20, 15, 10, 5, 0),
(2, 'Mixed Volleyball', 'Major', 0, '2026-08-04 08:56:25', 30, 25, 20, 15, 10, 5, 0),
(3, 'Bowling', 'Major', 0, '2026-08-05 02:30:14', 30, 25, 20, 15, 10, 5, 0),
(4, ' Mr. DTI Teambangan ng Bayan', 'Major', 0, '2026-08-05 02:31:40', 20, 15, 10, 0, 0, 0, 5),
(5, 'Ms. DTI Teambangan ng Bayan', 'Major', 0, '2026-08-05 02:32:03', 20, 15, 10, 0, 0, 0, 5),
(6, 'Rainbow Rumble', 'Major', 0, '2026-08-05 02:32:36', 20, 15, 10, 0, 0, 0, 5),
(7, 'Amazing Minute Race (Gen WOW)', 'Major', 0, '2026-08-05 02:33:13', 20, 15, 10, 0, 0, 0, 5),
(8, 'Amazing Minute Race (Gen NOW)', 'Major', 0, '2026-08-05 02:33:35', 20, 15, 10, 0, 0, 0, 5),
(9, 'Badminton (Doubles -Male)', 'Minor', 0, '2026-08-05 02:34:44', 15, 12, 10, 0, 0, 0, 5),
(10, 'Badminton (Doubles - Female)', 'Minor', 0, '2026-08-05 02:35:31', 15, 12, 10, 0, 0, 0, 5),
(11, 'Pickleball (Doubles - Male)', 'Minor', 0, '2026-08-05 02:36:07', 15, 12, 10, 0, 0, 0, 5),
(12, 'PIckleball (Doubles - Female)', 'Minor', 0, '2026-08-05 02:36:35', 15, 12, 10, 0, 0, 0, 5),
(13, 'Mobile Legends', 'Minor', 0, '2026-08-05 02:37:44', 15, 12, 10, 0, 0, 0, 5),
(14, 'Chess', 'Minor', 0, '2026-08-05 02:40:04', 10, 8, 6, 0, 0, 0, 5),
(15, 'Game of the Generals', 'Minor', 0, '2026-08-05 02:40:26', 10, 8, 6, 0, 0, 0, 5),
(16, 'Word Factory', 'Minor', 0, '2026-08-05 02:40:42', 10, 8, 6, 0, 0, 0, 5),
(17, 'Zumba King ', 'Minor', 0, '2026-08-05 02:41:07', 10, 0, 0, 0, 0, 0, 5),
(18, 'Zumba Queen', 'Minor', 0, '2026-08-05 02:41:20', 10, 0, 0, 0, 0, 0, 5),
(19, 'Flag Raising ', 'Minor', 0, '2026-08-05 02:41:40', 10, 0, 0, 0, 0, 0, 5),
(20, 'Team Chant', 'Minor', 0, '2026-08-05 02:41:55', 10, 0, 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `placement` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `event_id`, `team_id`, `placement`, `points`, `created_at`, `updated_at`) VALUES
(27, 15, 7, 2, 8, '2026-08-05 08:20:46', '2026-08-05 08:20:46'),
(28, 15, 6, 1, 10, '2026-08-05 08:20:46', '2026-08-05 08:20:46'),
(29, 15, 10, 99, 5, '2026-08-05 08:20:46', '2026-08-05 08:20:46'),
(30, 15, 8, 3, 6, '2026-08-05 08:20:46', '2026-08-05 08:20:46'),
(31, 15, 9, 99, 5, '2026-08-05 08:20:46', '2026-08-05 08:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `score_history`
--

CREATE TABLE `score_history` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `placement` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `recorded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score_history`
--

INSERT INTO `score_history` (`id`, `event_id`, `team_id`, `placement`, `points`, `recorded_at`) VALUES
(1, 3, 1, 1, 30, '2026-08-05 11:06:23'),
(2, 3, 1, 2, 25, '2026-08-05 11:08:20'),
(3, 14, 1, 1, 10, '2026-08-05 13:14:55'),
(4, 14, 2, 2, 8, '2026-08-05 13:14:55'),
(5, 14, 1, 1, 10, '2026-08-05 15:40:35'),
(6, 14, 2, 2, 8, '2026-08-05 15:40:35'),
(7, 14, 3, 3, 6, '2026-08-05 15:40:35'),
(8, 14, 4, 4, 0, '2026-08-05 15:40:35'),
(9, 14, 5, 5, 0, '2026-08-05 15:40:35'),
(10, 14, 1, 1, 10, '2026-08-05 15:41:35'),
(11, 14, 2, 2, 8, '2026-08-05 15:41:35'),
(12, 14, 3, 3, 6, '2026-08-05 15:41:35'),
(13, 14, 4, 4, 0, '2026-08-05 15:41:35'),
(14, 14, 5, 99, 5, '2026-08-05 15:41:35'),
(15, 14, 1, 1, 10, '2026-08-05 16:13:50'),
(16, 14, 2, 2, 8, '2026-08-05 16:13:50'),
(17, 14, 3, 3, 6, '2026-08-05 16:13:50'),
(18, 14, 4, 4, 0, '2026-08-05 16:13:50'),
(19, 14, 5, 99, 5, '2026-08-05 16:13:50'),
(20, 14, 1, 1, 10, '2026-08-05 16:17:49'),
(21, 14, 2, 2, 8, '2026-08-05 16:17:49'),
(22, 14, 3, 3, 6, '2026-08-05 16:17:49'),
(23, 14, 4, 99, 5, '2026-08-05 16:17:50'),
(24, 14, 5, 99, 5, '2026-08-05 16:17:50'),
(25, 15, 7, 2, 8, '2026-08-05 16:20:46'),
(26, 15, 6, 1, 10, '2026-08-05 16:20:46'),
(27, 15, 10, 99, 5, '2026-08-05 16:20:46'),
(28, 15, 8, 3, 6, '2026-08-05 16:20:46'),
(29, 15, 9, 99, 5, '2026-08-05 16:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `created_at`, `logo`) VALUES
(6, 'Blue Thunders', '2026-08-05 08:19:25', NULL),
(7, 'Black Phoenix', '2026-08-05 08:19:35', NULL),
(8, 'Red Sultans', '2026-08-05 08:19:44', NULL),
(9, 'Team Ultraviolet', '2026-08-05 08:19:54', NULL),
(10, 'Golden Eagles', '2026-08-05 08:20:04', NULL),
(11, 'Team A', '2026-08-06 00:00:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'admin', '$2y$10$EqGDBk.3WIQw6kCUP8gA9evaf0jhN5z/1ISoYwNwmmLXLveJMDAyG', '2026-08-05 13:14:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`team_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `score_history`
--
ALTER TABLE `score_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `score_history`
--
ALTER TABLE `score_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
