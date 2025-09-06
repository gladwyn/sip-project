-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 01:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ite_venue`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `adminname` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminname`, `adminpassword`) VALUES
('', ''),
('', ''),
('1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reportvenue`
--

CREATE TABLE `reportvenue` (
  `ID` int(11) NOT NULL,
  `venuecode` varchar(255) NOT NULL,
  `venuename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(255) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `EnrolledCourse` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `EnrolledClass` varchar(255) NOT NULL,
  `venuecode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venueimage`
--

CREATE TABLE `venueimage` (
  `ID` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `venuecode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reportvenue`
--
ALTER TABLE `reportvenue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `venuecode` (`venuecode`),
  ADD KEY `venuename` (`venuename`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `venuecode` (`venuecode`);

--
-- Indexes for table `venueimage`
--
ALTER TABLE `venueimage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `venuecode` (`venuecode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reportvenue`
--
ALTER TABLE `reportvenue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `venueimage`
--
ALTER TABLE `venueimage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`venuecode`) REFERENCES `reportvenue` (`venuecode`);

--
-- Constraints for table `venueimage`
--
ALTER TABLE `venueimage`
  ADD CONSTRAINT `venueimage_ibfk_1` FOREIGN KEY (`venuecode`) REFERENCES `reportvenue` (`venuecode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
