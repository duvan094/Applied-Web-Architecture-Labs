-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 10:33 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` varchar(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `noOfPages` int(11) DEFAULT NULL,
  `edition` int(11) DEFAULT NULL,
  `publicationYear` int(11) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `reserved` varchar(3) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `title`, `author`, `noOfPages`, `edition`, `publicationYear`, `publisher`, `reserved`) VALUES
('1234567891011', 'Thinking With Type', 'Johan Andersson', 123, 1, 1998, 'Bonnier', 'Yes'),
('1238673721919', 'My Life', 'Ulf Svensson', 404, 1, 1998, 'Bonnier', 'No'),
('6662367891032', 'A 100 Things About Pencils', 'Stefan Andersson', 1001, 4, 2014, 'Atlas', 'Yes'),
('7474567578544', 'Thinking With Your Head', 'Roger Gruneberg', 142, 4, 2009, 'Penguin', 'No'),
('9012341238888', 'Writing With Text', 'Birgitta Andersson', 255, 1, 2017, 'Penguin', 'Yes'),
('9877626262626', 'Typing Text With A Keyboard', 'Ylva Unebeck', 422, 3, 2001, 'Bonnier', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('joppe94', '7aec5e6ec029660f668f7756f89dab65ac1e23f7'),
('mihirre1', '77ba9cd915c8e359d9733edcfe9c61e5aca92afb'),
('steffe87', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
