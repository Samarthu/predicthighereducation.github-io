-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 03:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

CREATE TABLE `tbl_college` (
  `id` int(11) NOT NULL,
  `cname` varchar(55) NOT NULL,
  `caddress` varchar(55) NOT NULL,
  `ccity` varchar(55) NOT NULL,
  `stream` varchar(55) NOT NULL,
  `cutoff` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_college`
--

INSERT INTO `tbl_college` (`id`, `cname`, `caddress`, `ccity`, `stream`, `cutoff`) VALUES
(1, 'BMIT', 'Mangalwed Road', 'solapur', 'BA', '76'),
(4, 'AGPIT', 'Vijapur Road', 'solapur', 'BA', '90'),
(5, 'VVP', 'Soregao', 'solapur', 'BCOM', '89');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `username` varchar(55) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`username`, `message`) VALUES
('john', 'dfdfdf'),
('johny', 'gfgfg\njghjghg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `username` varchar(55) NOT NULL,
  `ssc` varchar(5) NOT NULL,
  `hsc` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`username`, `ssc`, `hsc`) VALUES
('john', '78.4', '67.9'),
('johny', '78', '89');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(55) NOT NULL,
  `city` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(55) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `username`, `password`, `name`, `gender`, `address`, `city`, `mobile`, `email`, `date_created`) VALUES
(1, 'john', 'j123', 'John David', 'male', '52, Sai, Vijapur Road', 'solapur', '8798767890', 'john@gmail.com', '2019-01-14'),
(2, 'samarth', 's123', 'samarth', 'male', 'Navi peth', 'solapur', '9898989898', 'sam@gmail.com', '2019-01-17'),
(3, 'johny', 'j123', 'John Tobo', 'male', 'sdsd', 'solapur', '4545454', 'dsds@sds.com', '2019-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `ttype` varchar(25) NOT NULL,
  `que` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `ttype`, `que`, `option1`, `option2`, `option3`, `option4`, `ans`) VALUES
(1, 'maths', 'What is JAVA', 'AAA', 'VVV', 'DDD', 'DDD', 2),
(2, 'english', 'who is java developer', 'James Gosling', 'RAM', 'SHAM', 'SEETA', 2),
(3, 'aptitude', 'ssfd', 'dfd', 'fdf', 'fdf', 'fdf', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_college`
--
ALTER TABLE `tbl_college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_college`
--
ALTER TABLE `tbl_college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
