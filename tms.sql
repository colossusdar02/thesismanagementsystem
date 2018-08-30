-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 06:51 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `tmsadminid` int(11) NOT NULL,
  `tmsadminfullname` varchar(1000) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `pass` varchar(1000) NOT NULL,
  `status` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`tmsadminid`, `tmsadminfullname`, `user`, `pass`, `status`, `position`) VALUES
(1, 'Thesis Management System', 'tms@dlsl.edu.ph', 'rwed2017', 'Active', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `fullname` varchar(2000) NOT NULL,
  `thesistitle` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`fullname`, `thesistitle`) VALUES
('Darwin Luis M. Sanchez', 'Thesis Management System');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesisid` int(11) NOT NULL,
  `thesistitle` varchar(1000) NOT NULL,
  `thesisauthors` varchar(3000) NOT NULL,
  `thesisschoolyear` varchar(300) NOT NULL,
  `thesiscollege` varchar(250) NOT NULL,
  `thesiscourse` varchar(500) NOT NULL,
  `thesisfilepath` varchar(1000) NOT NULL,
  `thesisfile` varchar(500) NOT NULL,
  `thesisdateuploaded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesisid`, `thesistitle`, `thesisauthors`, `thesisschoolyear`, `thesiscollege`, `thesiscourse`, `thesisfilepath`, `thesisfile`, `thesisdateuploaded`) VALUES
(1, 'Thesis Management System', 'Darwin Luis M. Sanchez', 'S.Y. 2017-2018', 'CITE', 'BSIT', 'thesis/CITE/5a117140a7caf9.27803644.pdf', 'Artista, Precious Mynette T..pdf', '2017-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`tmsadminid`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesisid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `tmsadminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `thesisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
