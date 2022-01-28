-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 04:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `student_name` varchar(1000) NOT NULL,
  `student_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `student_name`, `student_gender`) VALUES
(1, 'ravi', 'male'),
(2, 'sai', 'male'),
(3, 'jhon', 'male'),
(4, 'seeta', 'female'),
(5, 'rosy', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks_table`
--

CREATE TABLE `student_marks_table` (
  `id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `subject` varchar(2000) NOT NULL,
  `marks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_marks_table`
--

INSERT INTO `student_marks_table` (`id`, `student_id`, `subject`, `marks`) VALUES
(1, 1, 'English', 75),
(2, 1, 'Telugu', 55),
(3, 1, 'Hindi', 45),
(4, 1, 'Science', 85),
(5, 1, 'Social', 95),
(6, 2, 'English', 43),
(7, 2, 'Telugu', 69),
(8, 2, 'Hindi', 68),
(9, 2, 'Science', 96),
(10, 2, 'Social', 47),
(11, 3, 'English', 65),
(12, 3, 'Telugu', 75),
(13, 3, 'Hindi', 89),
(14, 3, 'Science', 73),
(15, 3, 'Social', 53),
(16, 4, 'English', 32),
(17, 4, 'Telugu', 56),
(18, 4, 'Hindi', 56),
(19, 4, 'Science', 99),
(20, 4, 'Social', 89),
(21, 5, 'English', 85),
(22, 5, 'Telugu', 96),
(23, 5, 'Hindi', 37),
(24, 5, 'Science', 99),
(25, 5, 'Social', 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks_table`
--
ALTER TABLE `student_marks_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_marks_table`
--
ALTER TABLE `student_marks_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
