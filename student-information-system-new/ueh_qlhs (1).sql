-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ueh_qlhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` nvarchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` nvarchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fname` nvarchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` nvarchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'admin', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` nvarchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` nvarchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `course` nvarchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course_ori` nvarchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile_num` nvarchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bookgraduate_num` nvarchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_graduate` date NOT NULL,
  `status` nvarchar(26) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note` nvarchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `admission_num`, `mssv`, `fname`, `lname`, `date_of_birth`, `course`, `course_ori`, `profile_num`, `bookgraduate_num`, `date_graduate`, `status`, `note`) VALUES
(1, 1, 33241026203, 'Võ Tuấn', 'Huy', '2000-10-29', 'K50', 'K50', '0290', '79611.24', '2024-12-17', 'Tốt nghiệp', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
