-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 05:08 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iprepdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(3) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `country`) VALUES
(1, 'Nagano Kosen', 'Japan'),
(2, 'Gifu Kosen', 'Japan'),
(3, 'Republic Poly', 'Singapore'),
(4, 'OCBC Bank', 'Singapore'),
(5, 'Apple', 'United States'),
(6, 'Alibaba', 'China');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(3) NOT NULL,
  `name` varchar(45) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `cost` decimal(15,2) NOT NULL,
  `course_provider` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `genre`, `cost`, `course_provider`) VALUES
(1, 'Introduction to IOT', 'Computer Science', '69.00', 'Coursera'),
(2, 'Deep Learning', 'Computer Science', '200.15', 'Nvidia'),
(3, 'Intro to Digital Manufacturing', 'Mechanical Engineering', '105.00', 'Coursera'),
(4, 'Python Data Structure', 'Computer Science', '80.10', 'University of Glasgow'),
(5, '.NET', 'Programming', '70.10', 'Coursera'),
(6, 'Java', 'Programming', '85.00', 'Coursera'),
(7, 'Full Stack Development', 'Programming', '90.10', 'Coursera'),
(8, 'Cybersecurity', 'IT Security', '200.10', 'Coursera');

-- --------------------------------------------------------

--
-- Table structure for table `oiip_vacancy`
--

CREATE TABLE `oiip_vacancy` (
  `vacancy_id` int(5) NOT NULL,
  `internship_start_date` date DEFAULT NULL,
  `internship_end_date` date DEFAULT NULL,
  `company_mthly_allowance` decimal(10,2) DEFAULT NULL,
  `allowance_currency` varchar(45) DEFAULT NULL,
  `job_role` varchar(45) DEFAULT NULL,
  `company_id` int(3) NOT NULL,
  `accomdation_provided` tinyint(1) DEFAULT NULL,
  `air_ticket_provided` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oiip_vacancy`
--

INSERT INTO `oiip_vacancy` (`vacancy_id`, `internship_start_date`, `internship_end_date`, `company_mthly_allowance`, `allowance_currency`, `job_role`, `company_id`, `accomdation_provided`, `air_ticket_provided`) VALUES
(1, '2017-10-01', '2018-01-31', '1200.00', 'SGD', 'Researcher', 1, 1, 0),
(2, '2017-10-01', '2018-02-28', '100000.00', 'YEN', 'Android developer', 2, 0, 0),
(3, '2017-10-01', '2018-02-28', '2000.00', 'SGD', 'iOS developer', 5, 0, 1),
(4, '2018-10-01', '2019-01-31', '0.00', 'SGD', 'Researcher', 3, 1, 1),
(5, '2017-04-01', '2017-09-30', '1200.00', 'SGD', 'Web developer', 6, 1, 0),
(6, '2017-04-01', '2017-09-30', '1000000.00', 'WON', 'Web developer', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `diploma` varchar(45) NOT NULL,
  `gpa` decimal(3,2) DEFAULT NULL,
  `tech_subj_score` int(3) DEFAULT NULL,
  `mobile` int(8) NOT NULL,
  `personal_email` varchar(45) NOT NULL,
  `iprep_status` varchar(45) DEFAULT NULL,
  `oiip_interest` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `diploma`, `gpa`, `tech_subj_score`, `mobile`, `personal_email`, `iprep_status`, `oiip_interest`) VALUES
(15013325, 'Xiao Ming', 'DMSD', '2.87', NULL, 86666888, 'xiaoming@hotmail.com', 'withdrawn', 1),
(15035033, 'Da Ming', 'DMSD', '3.87', NULL, 96662222, 'daming@hotmail.com', 'valid', 0),
(15059783, 'Da Xiao', 'DIT', '4.00', NULL, 82032222, 'daxiao@hotmail.com', 'valid', 0),
(15072232, 'Xiao Li', 'DBIS', '2.51', NULL, 82323111, 'xiaoli@hotmail.com', 'withdrawn', 0),
(15082233, 'Da Li', 'DBIS', '3.55', NULL, 92223322, 'dali@hotmail.com', 'valid', 1),
(15090023, 'Xiao Xiao', 'DIT', '2.98', NULL, 80112002, 'xiaoxiao@hotmail.com', 'valid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_has_course`
--

CREATE TABLE `student_has_course` (
  `student_course_id` int(3) NOT NULL,
  `student_id` int(10) NOT NULL,
  `course_id` int(3) NOT NULL,
  `status` varchar(45) NOT NULL,
  `course_app_form` varchar(45) DEFAULT NULL,
  `imda_course_ approval_email` varchar(45) DEFAULT NULL,
  `course_payment_request_form` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_has_course`
--

INSERT INTO `student_has_course` (`student_course_id`, `student_id`, `course_id`, `status`, `course_app_form`, `imda_course_ approval_email`, `course_payment_request_form`) VALUES
(1, 15035033, 1, 'new', NULL, NULL, NULL),
(2, 15082233, 2, 'approved', NULL, NULL, NULL),
(3, 15090023, 3, 'approved', NULL, NULL, NULL),
(4, 15059783, 4, 'payment requested', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_oiip_assignment`
--

CREATE TABLE `student_oiip_assignment` (
  `oiiip_assignment_id` int(5) NOT NULL,
  `student_id` int(10) NOT NULL,
  `vacancy_id` int(5) NOT NULL,
  `funding_status` varchar(45) DEFAULT NULL,
  `job_status` varchar(45) DEFAULT NULL,
  `funding_approval_email` varchar(45) DEFAULT NULL,
  `funding_request_email` varchar(45) DEFAULT NULL,
  `funding_source` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_oiip_assignment`
--

INSERT INTO `student_oiip_assignment` (`oiiip_assignment_id`, `student_id`, `vacancy_id`, `funding_status`, `job_status`, `funding_approval_email`, `funding_request_email`, `funding_source`) VALUES
(1, 15082233, 1, 'new', 'new', NULL, NULL, 'iprep'),
(2, 15090023, 4, 'applied', 'new', NULL, NULL, 'ytp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `type`) VALUES
(15013325, 'a1221c1ba6f59571346ce1c94abd7725961e3d2d', 'student'),
(15035033, '39c1293a6650277a2256f445716f7da29ab59e98', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `oiip_vacancy`
--
ALTER TABLE `oiip_vacancy`
  ADD PRIMARY KEY (`vacancy_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_has_course`
--
ALTER TABLE `student_has_course`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_oiip_assignment`
--
ALTER TABLE `student_oiip_assignment`
  ADD PRIMARY KEY (`oiiip_assignment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `vacancy_id` (`vacancy_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `oiip_vacancy`
--
ALTER TABLE `oiip_vacancy`
  MODIFY `vacancy_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student_has_course`
--
ALTER TABLE `student_has_course`
  MODIFY `student_course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_oiip_assignment`
--
ALTER TABLE `student_oiip_assignment`
  MODIFY `oiiip_assignment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15035034;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `oiip_vacancy`
--
ALTER TABLE `oiip_vacancy`
  ADD CONSTRAINT `oiip_vacancy_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `student_has_course`
--
ALTER TABLE `student_has_course`
  ADD CONSTRAINT `student_has_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `student_has_course_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student_oiip_assignment`
--
ALTER TABLE `student_oiip_assignment`
  ADD CONSTRAINT `student_oiip_assignment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_oiip_assignment_ibfk_2` FOREIGN KEY (`vacancy_id`) REFERENCES `oiip_vacancy` (`vacancy_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
