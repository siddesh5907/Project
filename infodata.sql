-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 10:40 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infodata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `password`) VALUES
(1, 'siddesh59', 'sid59'),
(2, 'siddesh12345', '12345'),
(3, 'adminsid', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` enum('male','female','','') CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `photo`, `phone`, `email`, `gender`, `address`) VALUES
(1, 'Siddesh Kalangutkar', 'man-profile-cartoon.jpg', '9561595907', 'sid595907@gmail.com', 'male', 'Housing Board Bicholim'),
(2, 'Bhakti Kalangutkar', 'seema.jpg', '9049050824', 'bhakti@gmail.com', 'female', 'Bicholim Goa'),
(3, 'Harsha', 'download.jpeg', '9595959592', 'harsha8@mail.com', 'female', 'Bicholim Goa'),
(4, 'Goerge', '17.jpeg', '9595959511', 'geo@mail.com', 'male', 'Austrailia'),
(5, 'Neil Armstrong ', 'images21.jpeg', '9192939495', 'sdfas456@mail.com', 'male', 'benglore India'),
(6, 'Bang Mang', 'images18.jpeg', '9049050230', 'mkoo44@mail.com', 'male', 'Austrailia'),
(7, 'juicey don', 'images15.jpeg', '9179595959', 'ba345@mail.com', 'female', 'america'),
(8, 'Tejas Kalangutkar', 'images13.jpeg', '9823456777', 'tejas8@mail.com', 'male', 'Bicholim Goa'),
(9, 'Fern Zara', 'images19.jpeg', '9595959500', 'fern8@mail.com', 'female', 'verna goa'),
(10, 'Roman Hem', 'images16.jpeg', '9123456708', 'hck1234@gmail.com', 'male', 'Bicholim Goa'),
(11, 'Tyro Gyro', 'images1.png', '9049050212', 'Sin8@mail.com', 'male', 'USA'),
(12, 'Jumbo', 'man-profile-cartoon.jpg', '9049050235', 'jumbo8@mail.com', 'male', 'belgum india'),
(13, 'Sid K', '20190330_233209-01.jpeg', '9049050232', 'sidk@mail.com', 'male', 'Bicholim Goa'),
(14, 'Zoom Raid', 'images14.jpeg', '9234562312', 'zoomgu@msil.com', 'male', 'Amsterdam'),
(15, 'Sam Cook', 'images18.jpeg', '7878787878', 'jim78@mail.com', 'male', 'Canada'),
(16, 'Jason Digger', 'images19.jpeg', '9012324509', 'jason@mail.com', 'male', 'Japan'),
(17, 'Hanumant ', 'WIN_20200816_16_00_40_Pro.jpg', '9755507885', 'hsk@mail.com', 'male', 'Bicholim Goa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminName` (`adminName`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
