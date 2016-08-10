-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 05:31 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubbalyrics`
--
CREATE DATABASE IF NOT EXISTS `bubbalyrics` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bubbalyrics`;

-- --------------------------------------------------------

--
-- Table structure for table `adminnotes`
--

DROP TABLE IF EXISTS `adminnotes`;
CREATE TABLE `adminnotes` (
  `noteId` int(11) NOT NULL,
  `noteContent` text NOT NULL,
  `adminName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `articleId` int(11) NOT NULL,
  `articleNumber` varchar(11) NOT NULL,
  `articlePictureLink` varchar(40) NOT NULL,
  `articleTitle` varchar(80) NOT NULL,
  `articleContent` text NOT NULL,
  `pictureDescription` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `carouselId` int(11) NOT NULL,
  `slideNumber` varchar(11) NOT NULL,
  `carouselPictureLink` varchar(40) NOT NULL,
  `pictureDescription` varchar(40) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personinformation`
--

DROP TABLE IF EXISTS `personinformation`;
CREATE TABLE `personinformation` (
  `personInformationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `phoneNumber` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personinformation`
--

INSERT INTO `personinformation` (`personInformationId`, `userId`, `firstName`, `lastName`, `phoneNumber`, `gender`) VALUES
(1, 1, 'Michael', 'Dobachesky', '(555)-555-5555', 'male'),
(2, 2, 'Tom', 'Cass', '(555)-555-5555', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE `userlogin` (
  `userId` int(11) NOT NULL,
  `adminLevel` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userId`, `adminLevel`, `email`, `password`) VALUES
(1, 1, 'mike@email.com', 'password'),
(2, 2, 'tom@email.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminnotes`
--
ALTER TABLE `adminnotes`
  ADD PRIMARY KEY (`noteId`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carouselId`);

--
-- Indexes for table `personinformation`
--
ALTER TABLE `personinformation`
  ADD PRIMARY KEY (`personInformationId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminnotes`
--
ALTER TABLE `adminnotes`
  MODIFY `noteId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `carouselId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personinformation`
--
ALTER TABLE `personinformation`
  MODIFY `personInformationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personinformation`
--
ALTER TABLE `personinformation`
  ADD CONSTRAINT `personinformation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userlogin` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
