-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 06:16 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexaminationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_exam`
--

CREATE TABLE `employee_exam` (
  `empID` int NOT NULL,
  `examID` int NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `edate` date NOT NULL,
  `ename` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_exam`
--

INSERT INTO `employee_exam` (`empID`, `examID`, `exam_name`, `edate`, `ename`, `email`) VALUES
(1, 1, 'Business Analyst', '2023-06-03', 'Sithum Senanayake', 'nirman@gmail.com'),
(1, 2, 'Payment Management', '2023-06-30', 'Sithum Senanayake', 'nirman@gmail.com'),
(1, 4, 'IELTS', '2023-06-29', 'Sithum Senanayake', 'nirman@gmail.com'),
(1, 7, 'Finance Management', '2023-06-28', 'Sithum Senanayake', 'nirman@gmail.com'),
(8, 2, 'Payment Management', '2023-06-14', 'Isuru Weerasinghe', 'isuru@gmail.com'),
(8, 3, 'Project Management', '2023-06-10', 'Isuru Weerasinghe', 'isuru@gmail.com'),
(8, 6, 'Human Resource Management', '2023-06-15', 'Isuru Weerasinghe', 'isuru@gmail.com'),
(17, 2, 'Payment Management', '2023-06-20', 'Hari Prasad', 'prasad@gmail.com'),
(20, 2, 'Payment Management', '2023-06-21', 'Saduni Perera', 'saduni@gmail.com'),
(20, 6, 'Human Resource Management', '2023-06-21', 'Saduni Perera', 'saduni@gmail.com'),
(21, 1, 'Business Analyst', '2024-01-31', '<<Employee Name>>', 'employee@gmail.com'),
(21, 4, 'IELTS', '2024-01-24', 'Sample Name', 'employee@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examID` int NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `exam_date` date NOT NULL,
  `instructions` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examID`, `exam_name`, `exam_date`, `instructions`) VALUES
(1, 'Business Analyst', '2023-10-15', 'Read the case study provided and answer the questions based on your analysis.'),
(2, 'Payment Management', '2023-07-05', 'You will be given a set of payment scenarios. Solve them and provide the appropriate payment management solutions.'),
(3, 'Project Management', '2023-11-20', 'Create a detailed project plan, including milestones, tasks, and resource allocation.'),
(4, 'IELTS', '2023-10-10', 'Complete the four sections of the IELTS exam: Listening, Reading, Writing, and Speaking.'),
(5, 'Accounting Management', '2023-09-01', 'Prepare financial statements based on the provided trial balance and make recommendations for improving financial performance.'),
(6, 'Human Resource Management', '2023-09-15', 'Develop an HR strategy to attract and retain top talent in the organization.'),
(7, 'Finance Management', '2023-10-05', 'Analyze financial data and develop a comprehensive financial plan for the next fiscal year.'),
(8, 'Marketing Management', '2023-10-20', 'Create a marketing campaign for a new product, including target audience identification and promotional strategies.');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultID` int NOT NULL,
  `examID` int NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `empID` int NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `marks` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`resultID`, `examID`, `exam_name`, `empID`, `employee_name`, `marks`) VALUES
(10, 2, 'Payment Management', 21, 'Sample Name', 80.5),
(11, 4, 'IELTS', 21, 'Sample Name', 90),
(12, 5, 'Accounting Management', 21, 'Sample Name', 45);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int NOT NULL,
  `Ename` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Egender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `EPhoneNo` int NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `User_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `Ename`, `Egender`, `EPhoneNo`, `Email`, `Address`, `dob`, `password`, `User_type`) VALUES
(21, 'Sample Employee Name', 'Male', 711111111, 'employee@gmail.com', 'No 01, Sample Address, City Location', '1994-03-05', '448ddd517d3abb70045aea6929f02367', 'employee'),
(22, 'Sample Exam Admin Name', 'Female', 711111111, 'examadmin@gmail.com', 'No 01, Sample Address, Location', '1989-02-14', '448ddd517d3abb70045aea6929f02367', 'exam_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_exam`
--
ALTER TABLE `employee_exam`
  ADD PRIMARY KEY (`empID`,`examID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`resultID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
