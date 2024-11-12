-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2024 at 11:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` bigint NOT NULL,
  `emp_official_id` varchar(255) DEFAULT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_mobile` varchar(21) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_nid` varchar(50) NOT NULL,
  `emp_password` varchar(32) NOT NULL,
  `emp_photo` varchar(100) NOT NULL,
  `emp_joining_date` varchar(50) NOT NULL,
  `employee_type_id` int NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `emp_slug` varchar(255) NOT NULL,
  `emp_checkin_status` int NOT NULL DEFAULT '0',
  `emp_active_status` int NOT NULL DEFAULT '1',
  `checkin_inserted_id` bigint DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_task`
--

CREATE TABLE `employee_task` (
  `emp_task_id` bigint NOT NULL,
  `emp_task_title` varchar(150) NOT NULL,
  `emp_task_details` text NOT NULL,
  `emp_task_assign_date` varchar(50) NOT NULL,
  `emp_task_due_date` varchar(50) NOT NULL,
  `assigned_employee_id` bigint NOT NULL,
  `emp_task_slug` varchar(255) NOT NULL,
  `emp_task_complete_status` int NOT NULL DEFAULT '0',
  `task_work_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `employee_type_id` int NOT NULL,
  `employee_type_name` varchar(255) NOT NULL,
  `employee_type_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance_report`
--

CREATE TABLE `emp_attendance_report` (
  `attendance_report_id` bigint NOT NULL,
  `emp_id` bigint NOT NULL,
  `c_date` varchar(50) NOT NULL,
  `check_in_time` varchar(50) DEFAULT NULL,
  `check_out_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_task_comment`
--

CREATE TABLE `emp_task_comment` (
  `emp_task_comment_id` bigint NOT NULL,
  `commentator_role_id` int NOT NULL,
  `emp_task_comment` text NOT NULL,
  `emp_task_id` bigint NOT NULL,
  `emp_task_comment_time` varchar(50) NOT NULL,
  `emp_task_comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int NOT NULL,
  `sa_email` varchar(100) NOT NULL,
  `sa_password` varchar(32) NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `sa_email`, `sa_password`, `role_id`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_task`
--
ALTER TABLE `employee_task`
  ADD PRIMARY KEY (`emp_task_id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`employee_type_id`);

--
-- Indexes for table `emp_attendance_report`
--
ALTER TABLE `emp_attendance_report`
  ADD PRIMARY KEY (`attendance_report_id`);

--
-- Indexes for table `emp_task_comment`
--
ALTER TABLE `emp_task_comment`
  ADD PRIMARY KEY (`emp_task_comment_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_task`
--
ALTER TABLE `employee_task`
  MODIFY `emp_task_id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `employee_type_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_attendance_report`
--
ALTER TABLE `emp_attendance_report`
  MODIFY `attendance_report_id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_task_comment`
--
ALTER TABLE `emp_task_comment`
  MODIFY `emp_task_comment_id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
