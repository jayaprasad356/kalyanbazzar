-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 12:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalyanbazzar`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `description`, `image`) VALUES
(1, 'Sanjay', ' I am happy with this application and it continues to provide a satisfying interface for getting Matka results online. As always, I found this app satisfactory on the Play Store.', 'upload/profiles/1013-2022-12-29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `app` varchar(400) DEFAULT NULL,
  `app_name` text DEFAULT NULL,
  `developer_name` text DEFAULT NULL,
  `ratings` text DEFAULT NULL,
  `downloads_count` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `image1` text DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `image3` text DEFAULT NULL,
  `image4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app`, `app_name`, `developer_name`, `ratings`, `downloads_count`, `about`, `image`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 'https://play.google.com/store/apps/details?id=com.matkaliveline.matkaliveline', 'STAR MATKA OFFICIAL', 'SATTA MATKA', '5', '100k', 'Please note that our app is only for entertainment purpose. No Real money involved in our app\n\nKalyan Bazar Satta Matka - Online Matka Play App is Online Kalyan Bazar Satta Matka Play App for Entertainment Purpose Only.\n\nOnline Matka Play App for Entertainment Purpose Only.', 'upload/images/1672305893.6904.png', 'upload/images/1672305893.6714.png', 'upload/images/1672305893.6783.png', 'upload/images/1672305893.6822.png', 'upload/images/1672305893.6864.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
