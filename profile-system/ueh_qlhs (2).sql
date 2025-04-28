-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 11:30 AM
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
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
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
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course_ori` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile_num` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bookgraduate_num` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(26) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `note_special` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `admission_num`, `mssv`, `fname`, `date_of_birth`, `gender`, `course`, `course_ori`, `profile_num`, `bookgraduate_num`, `date_graduate`, `status`, `note`, `note_special`) VALUES
(1, 5187, 31171021515, 'Trần Thị Quyên', '1999-10-25', 'Nữ', 'K51', 'K51', '1515', '', NULL, 'Còn học', '', 'thu nhận lại sinh viên');

-- --------------------------------------------------------

--
-- Table structure for table `students1`
--

CREATE TABLE `students1` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course-ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(26) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students2`
--

CREATE TABLE `students2` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(26) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students3`
--

CREATE TABLE `students3` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(26) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students4`
--

CREATE TABLE `students4` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(26) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students5`
--

CREATE TABLE `students5` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students6`
--

CREATE TABLE `students6` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students7`
--

CREATE TABLE `students7` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students8`
--

CREATE TABLE `students8` (
  `student_id` int(11) NOT NULL,
  `admission_num` bigint(5) NOT NULL,
  `mssv` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `course` varchar(5) NOT NULL,
  `course_ori` varchar(25) NOT NULL,
  `profile_num` varchar(5) NOT NULL,
  `bookgraduate_num` varchar(25) NOT NULL,
  `date_graduate` date DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `note` varchar(100) NOT NULL,
  `note_special` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `students1`
--
ALTER TABLE `students1`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students2`
--
ALTER TABLE `students2`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students3`
--
ALTER TABLE `students3`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students4`
--
ALTER TABLE `students4`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students5`
--
ALTER TABLE `students5`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students6`
--
ALTER TABLE `students6`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students7`
--
ALTER TABLE `students7`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students8`
--
ALTER TABLE `students8`
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

--
-- AUTO_INCREMENT for table `students1`
--
ALTER TABLE `students1`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students2`
--
ALTER TABLE `students2`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students3`
--
ALTER TABLE `students3`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students4`
--
ALTER TABLE `students4`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students5`
--
ALTER TABLE `students5`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students6`
--
ALTER TABLE `students6`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students7`
--
ALTER TABLE `students7`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students8`
--
ALTER TABLE `students8`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
