-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 03:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbweb4`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `name`) VALUES
(0, 'Nuvri', 'iyu', 'nuvri'),
(1, 'ridacantik', '12345rd', 'Ridaa'),
(2, 'Nuvri', 'iyu', 'nuvri');

-- --------------------------------------------------------

--
-- Table structure for table `talbum`
--

CREATE TABLE `talbum` (
  `album_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `photos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talbum`
--

INSERT INTO `talbum` (`album_id`, `name`, `keterangan`, `photos_id`) VALUES
(1, 'hellow gais', 'asdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tcategory`
--

CREATE TABLE `tcategory` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tcategory`
--

INSERT INTO `tcategory` (`cat_id`, `name`, `keterangan`) VALUES
(14, 'rida', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tphotos`
--

CREATE TABLE `tphotos` (
  `photos_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tphotos`
--

INSERT INTO `tphotos` (`photos_id`, `tanggal`, `title`, `keterangan`, `post_id`) VALUES
(1, '2020-05-06', 'yakinnn', 'duduududoo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tpost`
--

CREATE TABLE `tpost` (
  `post_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `slug` varchar(25) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpost`
--

INSERT INTO `tpost` (`post_id`, `tanggal`, `slug`, `title`, `keterangan`, `cat_id`) VALUES
(3, '2020-05-06', 'helloy', 'gigi', 'asde', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talbum`
--
ALTER TABLE `talbum`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `photo_id` (`photos_id`);

--
-- Indexes for table `tcategory`
--
ALTER TABLE `tcategory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tphotos`
--
ALTER TABLE `tphotos`
  ADD PRIMARY KEY (`photos_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `tpost`
--
ALTER TABLE `tpost`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `talbum`
--
ALTER TABLE `talbum`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tcategory`
--
ALTER TABLE `tcategory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tphotos`
--
ALTER TABLE `tphotos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tpost`
--
ALTER TABLE `tpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `talbum`
--
ALTER TABLE `talbum`
  ADD CONSTRAINT `talbum_ibfk_1` FOREIGN KEY (`photos_id`) REFERENCES `tphotos` (`photos_id`);

--
-- Constraints for table `tphotos`
--
ALTER TABLE `tphotos`
  ADD CONSTRAINT `tphotos_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tpost` (`post_id`);

--
-- Constraints for table `tpost`
--
ALTER TABLE `tpost`
  ADD CONSTRAINT `tpost_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tcategory` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
