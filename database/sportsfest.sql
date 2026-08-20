-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 03:23 AM
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
(14, 'Chess (Male)', 'Minor', 0, '2026-08-05 02:40:04', 10, 8, 6, 0, 0, 0, 5),
(15, 'Game of the Generals', 'Minor', 0, '2026-08-05 02:40:26', 10, 8, 6, 0, 0, 0, 5),
(16, 'Word Factory', 'Minor', 0, '2026-08-05 02:40:42', 10, 8, 6, 0, 0, 0, 5),
(17, 'Zumba King ', 'Minor', 0, '2026-08-05 02:41:07', 10, 0, 0, 0, 0, 0, 5),
(18, 'Zumba Queen', 'Minor', 0, '2026-08-05 02:41:20', 10, 0, 0, 0, 0, 0, 5),
(19, 'Flag Raising ', 'Minor', 0, '2026-08-05 02:41:40', 10, 0, 0, 0, 0, 0, 5),
(20, 'Team Chant', 'Minor', 0, '2026-08-05 02:41:55', 10, 0, 0, 0, 0, 0, 5),
(21, 'Chess (Female)', 'Major', 0, '2026-08-11 01:10:55', 10, 8, 6, 0, 0, 0, 5),
(22, 'Ms. Teambangan - Highest percentage of Fat Loss', 'Special', 0, '2026-08-11 01:17:22', 3, 0, 0, 0, 0, 0, 0),
(23, 'Mr. Teambangan - Highest percentage of Fat Loss', 'Special', 0, '2026-08-11 01:17:36', 3, 0, 0, 0, 0, 0, 0),
(24, 'Ms. Teambangan - Highest Number of Kilograms Loss', 'Special', 0, '2026-08-11 01:18:05', 3, 0, 0, 0, 0, 0, 0),
(25, 'Mr. Teambangan - Highest Number of Kilograms Loss', 'Special', 0, '2026-08-11 01:18:13', 3, 0, 0, 0, 0, 0, 0),
(26, 'Ms. Teambangan - Lakas ng Dating', 'Special', 0, '2026-08-11 01:18:37', 3, 0, 0, 0, 0, 0, 0),
(27, 'Mr. Teambangan - Lakas ng Dating', 'Major', 0, '2026-08-11 01:18:44', 3, 0, 0, 0, 0, 0, 0),
(28, ' Zumba King and Queen - Best in Props and Costume', 'Special', 0, '2026-08-11 01:19:20', 3, 0, 0, 0, 0, 0, 0),
(29, ' Zumba King and Queen - Most Graceful Pair', 'Special', 0, '2026-08-11 01:19:44', 3, 0, 0, 0, 0, 0, 0),
(30, ' Zumba King and Queen - Zumba Spirit Award (Pair)', 'Special', 0, '2026-08-11 01:20:04', 3, 0, 0, 0, 0, 0, 0),
(31, 'Bowling - Highest Score (Male)', 'Special', 0, '2026-08-11 01:20:42', 3, 0, 0, 0, 0, 0, 0),
(32, 'Bowling - Highest Score (Female)', 'Special', 0, '2026-08-11 01:20:53', 3, 0, 0, 0, 0, 0, 0),
(33, 'Bowling - Highest Pinning (Male)', 'Special', 0, '2026-08-11 01:21:27', 3, 0, 0, 0, 0, 0, 0),
(34, 'Bowling - Highest Pinning (Female)', 'Special', 0, '2026-08-11 01:21:36', 3, 0, 0, 0, 0, 0, 0),
(35, 'Volleyball - MVP', 'Special', 0, '2026-08-11 01:21:52', 3, 0, 0, 0, 0, 0, 0);

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
(32, 13, 7, 99, 5, '2026-08-06 00:06:24', '2026-08-06 00:06:55'),
(33, 13, 6, 2, 12, '2026-08-06 00:06:24', '2026-08-06 00:06:24'),
(34, 13, 10, 3, 10, '2026-08-06 00:06:24', '2026-08-06 00:06:24'),
(35, 13, 8, 1, 15, '2026-08-06 00:06:24', '2026-08-06 00:06:24'),
(36, 13, 9, 99, 5, '2026-08-06 00:06:24', '2026-08-06 00:06:55'),
(63, 14, 7, 99, 5, '2026-08-11 01:11:21', '2026-08-11 01:11:21'),
(64, 14, 6, 1, 10, '2026-08-11 01:11:21', '2026-08-11 01:11:21'),
(65, 14, 10, 3, 6, '2026-08-11 01:11:21', '2026-08-11 01:11:21'),
(66, 14, 8, 2, 8, '2026-08-11 01:11:21', '2026-08-11 01:11:21'),
(67, 14, 9, 99, 5, '2026-08-11 01:11:21', '2026-08-11 01:11:21'),
(68, 21, 7, 2, 8, '2026-08-11 01:11:41', '2026-08-11 01:11:41'),
(69, 21, 6, 3, 6, '2026-08-11 01:11:41', '2026-08-11 01:11:41'),
(70, 21, 10, 99, 5, '2026-08-11 01:11:41', '2026-08-11 01:11:41'),
(71, 21, 8, 99, 5, '2026-08-11 01:11:41', '2026-08-11 01:11:41'),
(72, 21, 9, 1, 10, '2026-08-11 01:11:41', '2026-08-11 01:11:41'),
(73, 16, 7, 2, 8, '2026-08-11 01:12:06', '2026-08-11 01:12:06'),
(74, 16, 6, 99, 5, '2026-08-11 01:12:06', '2026-08-11 01:12:06'),
(75, 16, 10, 3, 6, '2026-08-11 01:12:06', '2026-08-11 01:12:06'),
(76, 16, 8, 1, 10, '2026-08-11 01:12:06', '2026-08-11 01:12:06'),
(77, 16, 9, 99, 5, '2026-08-11 01:12:06', '2026-08-11 01:12:06'),
(78, 15, 7, 2, 8, '2026-08-11 01:12:30', '2026-08-11 01:12:30'),
(79, 15, 6, 1, 10, '2026-08-11 01:12:30', '2026-08-11 01:12:30'),
(80, 15, 10, 99, 5, '2026-08-11 01:12:30', '2026-08-11 01:12:30'),
(81, 15, 8, 3, 6, '2026-08-11 01:12:30', '2026-08-11 01:12:30'),
(82, 15, 9, 99, 5, '2026-08-11 01:12:30', '2026-08-11 01:12:30');

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
(29, 15, 9, 99, 5, '2026-08-05 16:20:46'),
(30, 13, 7, 4, 0, '2026-08-06 08:06:24'),
(31, 13, 6, 2, 12, '2026-08-06 08:06:24'),
(32, 13, 10, 3, 10, '2026-08-06 08:06:24'),
(33, 13, 8, 1, 15, '2026-08-06 08:06:24'),
(34, 13, 9, 5, 0, '2026-08-06 08:06:24'),
(35, 13, 7, 99, 5, '2026-08-06 08:06:55'),
(36, 13, 6, 2, 12, '2026-08-06 08:06:55'),
(37, 13, 10, 3, 10, '2026-08-06 08:06:55'),
(38, 13, 8, 1, 15, '2026-08-06 08:06:55'),
(39, 13, 9, 99, 5, '2026-08-06 08:06:55'),
(40, 15, 7, 2, 8, '2026-08-06 09:47:03'),
(41, 15, 6, 1, 10, '2026-08-06 09:47:03'),
(42, 15, 10, 99, 5, '2026-08-06 09:47:03'),
(43, 15, 8, 3, 6, '2026-08-06 09:47:03'),
(44, 15, 9, 99, 5, '2026-08-06 09:47:03'),
(45, 13, 7, 99, 5, '2026-08-06 10:59:45'),
(46, 13, 6, 2, 12, '2026-08-06 10:59:45'),
(47, 13, 10, 3, 10, '2026-08-06 10:59:45'),
(48, 13, 8, 1, 15, '2026-08-06 10:59:45'),
(49, 13, 9, 99, 5, '2026-08-06 10:59:45'),
(50, 4, 9, 1, 20, '2026-08-06 14:15:08'),
(51, 4, 7, 99, 5, '2026-08-06 16:02:30'),
(52, 4, 6, 1, 20, '2026-08-06 16:02:30'),
(53, 4, 10, 2, 15, '2026-08-06 16:02:30'),
(54, 4, 8, 3, 10, '2026-08-06 16:02:30'),
(55, 4, 9, 99, 5, '2026-08-06 16:02:30'),
(56, 3, 7, 3, 20, '2026-08-06 16:04:17'),
(57, 3, 6, 4, 15, '2026-08-06 16:04:17'),
(58, 3, 10, 2, 25, '2026-08-06 16:04:17'),
(59, 3, 8, 5, 10, '2026-08-06 16:04:17'),
(60, 3, 9, 1, 30, '2026-08-06 16:04:17'),
(61, 14, 7, 99, 5, '2026-08-11 09:11:21'),
(62, 14, 6, 1, 10, '2026-08-11 09:11:21'),
(63, 14, 10, 3, 6, '2026-08-11 09:11:21'),
(64, 14, 8, 2, 8, '2026-08-11 09:11:21'),
(65, 14, 9, 99, 5, '2026-08-11 09:11:21'),
(66, 21, 7, 2, 8, '2026-08-11 09:11:41'),
(67, 21, 6, 3, 6, '2026-08-11 09:11:41'),
(68, 21, 10, 99, 5, '2026-08-11 09:11:41'),
(69, 21, 8, 99, 5, '2026-08-11 09:11:41'),
(70, 21, 9, 1, 10, '2026-08-11 09:11:41'),
(71, 16, 7, 2, 8, '2026-08-11 09:12:06'),
(72, 16, 6, 99, 5, '2026-08-11 09:12:06'),
(73, 16, 10, 3, 6, '2026-08-11 09:12:06'),
(74, 16, 8, 1, 10, '2026-08-11 09:12:06'),
(75, 16, 9, 99, 5, '2026-08-11 09:12:06'),
(76, 15, 7, 2, 8, '2026-08-11 09:12:30'),
(77, 15, 6, 1, 10, '2026-08-11 09:12:30'),
(78, 15, 10, 99, 5, '2026-08-11 09:12:30'),
(79, 15, 8, 3, 6, '2026-08-11 09:12:30'),
(80, 15, 9, 99, 5, '2026-08-11 09:12:30');

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
(6, 'Blue Thunders', '2026-08-05 08:19:25', 'team_85daa3ebefa2df23.jpg'),
(7, 'Black Phoenix', '2026-08-05 08:19:35', 'team_0dbed09e6582efb2.jpg'),
(8, 'Red Sultans', '2026-08-05 08:19:44', 'team_44c568a8cd1fd961.jpg'),
(9, 'Team Ultraviolet', '2026-08-05 08:19:54', 'team_c86aa720c6fc12ab.jpg'),
(10, 'Golden Eagles', '2026-08-05 08:20:04', 'team_bbcd18235ab94050.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `score_history`
--
ALTER TABLE `score_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
