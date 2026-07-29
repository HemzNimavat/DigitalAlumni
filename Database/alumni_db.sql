-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2025 at 10:41 AM
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
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `email`, `msg`) VALUES
(1, 'Hemz', 'hemznimavat@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(12) NOT NULL,
  `eventTitle` varchar(50) NOT NULL,
  `eventPoster` blob NOT NULL,
  `eventCategory` varchar(20) NOT NULL,
  `eventDescription` varchar(500) NOT NULL,
  `eventStartDate` date NOT NULL,
  `eventEndDate` date NOT NULL,
  `eventVenue` varchar(50) NOT NULL,
  `eventMode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventTitle`, `eventPoster`, `eventCategory`, `eventDescription`, `eventStartDate`, `eventEndDate`, `eventVenue`, `eventMode`) VALUES
(1, 'PU Fresher Fest', 0x75706c6f616465645f696d672f7075332e6a7067, 'Fest', 'Frehsers party to welcome new students in our university', '2025-09-10', '2025-09-10', 'Parul University', 'offline'),
(3, 'Vadodara Hackthon 6.0', 0x75706c6f616465645f696d672f76682e6a7067, 'MCA', 'Hackthon to show your technical skill.', '2025-09-02', '2025-09-04', 'Parul University', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(120) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `email`, `feedback`) VALUES
(1, 'Hemz', 'hemznimavat@gmail.com', 'Hello'),
(2, 'Krishna', 'jk5104@gmail.com', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `token`, `expiry`, `created_at`) VALUES
(1, 3, 'a6158887b047873834da595157639fbdfab093530f362708c211928bccd4b0e7', '2025-09-04 09:37:57', '2025-09-04 06:37:57'),
(2, 3, 'fe3dae62149b31a03235eadf683251bab4346154582c4e7d26d5d9b0bf4fa826', '2025-09-04 09:42:36', '2025-09-04 06:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `graduationYear` int(11) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `currentCompany` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `linkedIn` varchar(500) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `email`, `phoneNumber`, `gender`, `graduationYear`, `degree`, `branch`, `currentCompany`, `designation`, `linkedIn`, `password`, `img`) VALUES
(2, 'Administraror', 'admin@gmail.com', 2147483647, 'Female', 2009, '', 'Admin', 'ParulUniversity', 'Admin', 'https://linkedin.com', 'PuAdmin@1234', 'uploaded_img/default-avatar.png'),
(3, 'Hemadri', 'hemznimavat@gmail.com', 2147483647, 'Female', 2027, 'MCA', 'Vadodara', 'Google', 'ProjectManager', 'https://linkedin.com', 'Abc@1234', 'uploaded_img/default.png'),
(4, 'KrishnaJoshi', 'jk5104@gmail.com', 2147483647, 'Female', 2025, 'MCA', 'Vadodara', 'Google', 'ProjectManager', 'https://linkedin.com', 'Abc@1234', 'uploaded_img/default.png'),
(5, 'Lalit', 'lalit5104@gmail.com', 2147483647, 'Male', 2025, 'MCA', 'Vadodara', 'Google', 'ProjectManager', 'https://linkedin.com', 'Abc@1234', 'uploaded_img/default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
