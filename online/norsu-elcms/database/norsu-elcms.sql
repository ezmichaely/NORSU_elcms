-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 08:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `norsu-elcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `account_request` int(11) NOT NULL,
  `account_status` enum('ONLINE','OFFLINE') NOT NULL,
  `account_token` varchar(255) DEFAULT NULL,
  `account_username` varchar(255) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `account_firstname` varchar(255) NOT NULL,
  `account_middlename` varchar(255) NOT NULL,
  `account_lastname` varchar(255) NOT NULL,
  `account_suffixname` varchar(255) NOT NULL,
  `account_address` varchar(255) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_contactno` varchar(255) NOT NULL,
  `account_gender` varchar(255) NOT NULL,
  `account_dob` varchar(255) NOT NULL,
  `account_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_unique`, `account_type`, `account_request`, `account_status`, `account_token`, `account_username`, `account_password`, `account_firstname`, `account_middlename`, `account_lastname`, `account_suffixname`, `account_address`, `account_email`, `account_contactno`, `account_gender`, `account_dob`, `account_created`) VALUES
(1, '20113215542', '1', 1, 'OFFLINE', NULL, 'ezmichaely', '301d86bb428da11ffcd7b09966daa760', 'EZ', '', 'Yucor', '', 'bacong', 'ezmichaely@gmail.com', '09268311909', 'Male', '2021-11-29', '2021-12-01 14:05:18'),
(2, '201245842154', '3', 1, 'OFFLINE', NULL, 'RegisterInstructor', '580a600a3b16e13cbee611e65aeffeb4', 'Instructor', '', 'Register ', '', 'RegisterInstructor', 'RegisterInstructor@gmail.com', '09111111111', 'Male', '2021-11-29', '2021-12-01 14:16:50'),
(3, '20124584212', '4', 1, 'ONLINE', NULL, 'RegisterDeptHead', '51cb169430384dd749ed45087da16f52', 'DeptHead', '', 'Register', '', 'RegisterDeptHead', 'RegisterDeptHead@gmail.com', '12312312313', 'Female', '2021-12-22', '2021-12-01 16:08:10'),
(4, '202131842213', '5', 1, 'ONLINE', NULL, 'RegisterDean', '37e1a4bb82ed441e4daa1b127e240b7e', 'Dean', '', 'Register', '', 'RegisterDean', 'RegisterDean@gmail.com', '12312312312', 'Male', '2021-11-28', '2021-12-02 10:24:12'),
(5, '2011321123123', '2', 1, 'OFFLINE', NULL, 'StudentRegister', 'd1f2cccb4e697c1967ca34cec7cff0e2', 'Student', '', 'Register', '', 'StudentRegister', 'StudentRegister@gmail.com', '31231231231', 'Female', '2021-12-15', '2021-12-04 21:25:53'),
(7, '20854846487', '1', 1, 'OFFLINE', NULL, 'RegisterAdmin', '9d08029fa82183b64fe35731a80946da', 'Admin', '', 'Register', '', 'RegisterAdmin', 'RegisterAdmin@gmail.com', '02054984654', 'Female', '2021-12-08', '2021-12-11 11:39:36'),
(8, '26465465451', '2', 1, 'OFFLINE', NULL, 'MajorRegister', '7a5b75082364d46df009b9c98245d208', 'Major', 'in', 'Register', '', 'MajorRegister', 'MajorRegister@gmail.com', '25460465719', 'Female', '2021-12-12', '2021-12-12 10:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_code` varchar(255) NOT NULL,
  `announcement_creator` varchar(255) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_content` blob NOT NULL,
  `announcement_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `atypes`
--

CREATE TABLE `atypes` (
  `atype_id` int(11) NOT NULL,
  `atype_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atypes`
--

INSERT INTO `atypes` (`atype_id`, `atype_name`) VALUES
(1, 'Administrator'),
(2, 'Student'),
(3, 'Instructor'),
(4, 'Department Head'),
(5, 'College Dean');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `class_module` varchar(255) NOT NULL,
  `class_subject` int(11) NOT NULL,
  `class_schoolyear` int(11) NOT NULL,
  `class_semester` int(11) NOT NULL,
  `class_day` varchar(255) NOT NULL,
  `class_time` varchar(255) NOT NULL,
  `class_section` varchar(255) NOT NULL,
  `class_teacher` varchar(255) NOT NULL,
  `class_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_code`, `class_module`, `class_subject`, `class_schoolyear`, `class_semester`, `class_day`, `class_time`, `class_section`, `class_teacher`, `class_datetime`) VALUES
(1, 'WYOp7wUY2D', 'ef9dfbb3f1c3c7c806babf3bf3309cda', 1, 1, 3, 'MWF', '8:00 - 9:00 AM', 'C', '20124584212', '2021-12-04 13:38:42'),
(9, '2SN7g41e1U', '9c973ff1383adec131750ee08ec345d6', 1, 1, 1, 'TTH', '8', 'b', '201245842154', '2021-12-10 20:38:19'),
(10, 'IlVzDLKyyo', '939f3c53b7a159c400d9c5819bed694c', 4, 1, 2, 'TTH', '8', 'b', '201245842154', '2021-12-10 21:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `classmembers`
--

CREATE TABLE `classmembers` (
  `member_id` int(11) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `class_student` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classmembers`
--

INSERT INTO `classmembers` (`member_id`, `class_code`, `class_student`) VALUES
(2, 'WYOp7wUY2D', '2011321123123');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `college_acronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name`, `college_acronym`) VALUES
(1, 'College of Agriculture, Forestry And Fisheries', 'CAFF'),
(2, 'College of Arts and Sciences', 'CAS'),
(3, 'College of Business Administration', 'CBA'),
(4, 'College of Criminal Justice Education', 'CCJE'),
(5, 'College of Engineering and Architecture', 'CEA'),
(6, 'College of Industrial Technology', 'CIT'),
(7, 'College of Nursing, Pharmacy and Allied Health Services', 'CNPHAS'),
(8, 'College of Teacher Education', 'CTED');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_code` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_code`, `post_code`, `account_unique`, `comment_content`, `comment_datetime`) VALUES
(22, '1639609171wjGTktpQPU', '752b61ebd6772bdfe9d5b12769e5282f', '2011321123123', 'asdasd', '2021-12-15 22:59:31'),
(23, '1639609502M2mLEBrYb7', '752b61ebd6772bdfe9d5b12769e5282f', '2011321123123', 'sdfsdfdsf', '2021-12-15 23:05:02'),
(24, '1639609509DRHw0Jf2vU', '8d8be15249567cdd0a0a6ac027b6a4d1', '2011321123123', 'sdfsdfsdf', '2021-12-15 23:05:09'),
(25, '1639609712Ot3sCEGlQu', '874f947bde54074851fb32ba03158bd4', '2011321123123', 'sdfsdfsdf', '2021-12-15 23:08:32'),
(26, '16396097628Tjq09d1AT', '752b61ebd6772bdfe9d5b12769e5282f', '202131842213', 'sdfsdfsdfsdf', '2021-12-15 23:09:22'),
(27, '1639609803Tg9PLZXjpb', '104a615805a5380a525cdb8d6144b7f9', '202131842213', 'dfsdfsdf', '2021-12-15 23:10:03'),
(28, '16396099199kmqa27O4K', '060779ddcd7ce3d421e7436d4b1d03a5', '202131842213', 'fdgdfgdfgd', '2021-12-15 23:11:59'),
(29, '1639658394OSaPptXfo4', '8d8be15249567cdd0a0a6ac027b6a4d1', '201245842154', 'sdfsdf', '2021-12-16 12:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_sender` varchar(255) NOT NULL,
  `contact_receiver` varchar(255) NOT NULL,
  `contact_mnum` int(11) NOT NULL,
  `contact_status` int(11) NOT NULL,
  `contact_datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_sender`, `contact_receiver`, `contact_mnum`, `contact_status`, `contact_datetime`) VALUES
(65, '20124584212', '201245842154', 0, 0, 1639657971),
(66, '201245842154', '20124584212', 0, 0, 1639657971),
(80, '2011321123123', '202131842213', 0, 0, 1639605237),
(81, '20854846487', '26465465451', 1, 1, 1639578259),
(82, '26465465451', '20854846487', 0, 0, 1639578259),
(83, '20854846487', '2011321123123', 1, 1, 1639605223),
(84, '2011321123123', '20854846487', 0, 0, 1639605223),
(85, '202131842213', '2011321123123', 0, 0, 1639605236),
(86, '20124584212', '202131842213', 0, 0, 1639643263);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_acronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `college_id`, `course_name`, `course_acronym`) VALUES
(1, 1, 'Bachelor of Science in Forestry', 'BSF'),
(2, 1, 'Bachelor of Science in Agriculture', 'BSA'),
(3, 1, 'Bachelor of Science in Fisheries', 'BSFish'),
(4, 1, 'Bachelor of Agricultural Technology', 'BSAT'),
(5, 2, 'Bachelor of Arts', 'BA'),
(6, 2, 'Bachelor of Mass Communication', 'BSMC'),
(7, 2, 'Bachelor of Science in Biology', 'BSBIO'),
(8, 2, 'Bachelor of Science in Chemistry', 'BSCHEM'),
(9, 2, 'Bachelor of Science in Computer Science', 'BSComSci'),
(10, 2, 'Bachelor of Science in Information Technology', 'BSInfo Tech'),
(11, 2, 'Bachelor of Science in Mathematics', 'BSMath'),
(12, 2, 'Bachelor of Science in Psychology', 'BSPsycho'),
(13, 2, 'Bachelor of Science in Social Science', 'BSSocSci'),
(14, 3, 'Bachelor of Science in Accountancy', 'BSAcc'),
(15, 3, 'Bachelor of Science in Business Administration', 'BSBA'),
(16, 3, 'Bachelor of Science in Hospitality Managment', 'BSHM'),
(17, 3, 'Bachelor of Science in Office Administration', 'BSOA'),
(18, 3, 'Bachelor of Science in Tourism Management', 'BSTM'),
(19, 4, 'Bachelor of Science in Criminology', 'BSCrim'),
(20, 5, 'Bachelor of Science in Architecture', 'BSArch'),
(21, 5, 'Bachelor of Science in Civil Engineering', 'BSCE'),
(22, 5, 'Bachelor of Science in Computer Engineering', 'BSCoE'),
(23, 5, 'Bachelor of Science in Electrical Engineering', 'BSEE'),
(24, 5, 'Bachelor of Science in Electronics Engineering', 'BSElecE'),
(25, 5, 'Bachelor of Science in Geodetic Engineering', 'BSGE'),
(26, 6, 'Bachelor of Science in Aviation Maintenance', 'BSAM'),
(27, 6, 'Bachelor of Science in Business Administration', 'BSBA'),
(28, 6, 'Bachelor of Science in Industrial Technology', 'BSIT'),
(29, 6, 'Bachelor of Technological Technology', 'BTT'),
(30, 7, 'Associate in Medical-Dental-Nursing Assistant', 'AMDNA'),
(31, 7, 'Midwifery', 'Midwifery'),
(32, 7, 'Bachelor of Science in Nursing', 'BSNursing'),
(33, 7, 'Bachelor of Science in Pharmacy', 'BSPharma'),
(34, 8, 'Bachelor of Culture &amp; Arts Education', 'BCAE'),
(35, 8, 'Bachelor of Early Childhood Education', 'BECE'),
(36, 8, 'Bachelor of Elementary Education', 'BEE'),
(37, 8, 'Bachelor of Physical Education', 'BPE'),
(38, 8, 'Bachelor of Secondary Education', 'BSeD'),
(39, 8, 'Bachelor of Special Needs Education', 'BSNEd'),
(40, 8, 'Bachelor of Technology &amp; Livelihood Education', 'BTLE'),
(41, 2, 'Bachelor of Science in Geology', 'BSGeo'),
(42, 5, 'Bachelor of Science in Geothermal Engineering', 'BSGeoE'),
(43, 5, 'Bachelor of Science in Mechanical Engineering', 'BSME'),
(44, 6, 'Bachelor of Technological Education', 'BTechEd');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_acronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `college_id`, `department_name`, `department_acronym`) VALUES
(1, 2, 'Computer Science and Information Technology Department', 'CSIT'),
(2, 1, 'Agriculture Department', 'Agri'),
(3, 3, 'Business Administration Department', 'Business Ad'),
(4, 4, 'Criminology Department', 'Crim'),
(5, 5, 'Engineering Department', 'Engineering'),
(6, 6, 'Insdustrial Technology Department', 'IT'),
(7, 7, 'Nursing Department', 'Nursing'),
(8, 8, 'Physical Education Department', 'PE'),
(9, 1, 'Not yet here!', 'NOT'),
(10, 2, 'Not yet here!', 'Not'),
(11, 3, 'Not yet here!', 'Not'),
(12, 4, 'Not yet here!', 'Not'),
(13, 5, 'Not yet here!', 'Not'),
(14, 6, 'Not yet here!', 'Not'),
(15, 7, 'Not yet here!', 'Not'),
(16, 8, 'Not yet here!', 'Not');

-- --------------------------------------------------------

--
-- Table structure for table `loadslips`
--

CREATE TABLE `loadslips` (
  `loadslip_id` int(11) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `schoolyear_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `loadslip_path` varchar(255) NOT NULL,
  `loadslip_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loadslips`
--

INSERT INTO `loadslips` (`loadslip_id`, `account_unique`, `schoolyear_id`, `semester_id`, `loadslip_path`, `loadslip_name`) VALUES
(1, '20113215542', 1, 2, '/upload/users/loadslips/', 'Loadslip_20113215542-SecondSemester-SY2020-2021.png'),
(2, '2011321123123', 1, 2, '/upload/users/loadslips/', 'Loadslip_2011321123123_Second Semester_SY 2020-2021.jpg'),
(3, '26465465451', 1, 2, '/upload/users/loadslips/', 'Loadslip_26465465451_SecondSemester_SY2020-2021.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `log_action` varchar(255) NOT NULL,
  `log_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `account_unique`, `log_action`, `log_datetime`) VALUES
(1, '20113215542', 'Student EZ Yucor registered an account.', '2021-12-01 14:05:18'),
(2, '201245842154', 'Instructor Register Instructor registered an account.', '2021-12-01 14:16:50'),
(3, '20113215542', 'Student EZ Yucor has successfully logged in.', '2021-12-01 14:17:39'),
(4, '20113215542', 'Student EZ Yucor has successfully logged out.', '2021-12-01 14:28:01'),
(5, '201245842154', 'Instructor Register Instructor has successfully logged in.', '2021-12-01 14:28:30'),
(6, '201245842154', 'Instructor Register Instructor added a new post.', '2021-12-01 15:04:01'),
(7, '201245842154', 'Instructor Register Instructor added a new post.', '2021-12-01 15:06:01'),
(8, '201245842154', 'Instructor Register Instructor deleted a post.', '2021-12-01 15:06:11'),
(9, '201245842154', 'Instructor Register Instructor deleted a post.', '2021-12-01 15:07:01'),
(10, '201245842154', 'Instructor Register Instructor deleted a post.', '2021-12-01 15:07:05'),
(11, '201245842154', 'Instructor Register Instructor added a new post.', '2021-12-01 15:16:47'),
(12, '201245842154', 'Instructor Register Instructor has successfully logged out.', '2021-12-01 16:07:17'),
(13, '20124584212', 'Department Head Register DeptHead registered an account.', '2021-12-01 16:08:10'),
(14, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-01 16:08:25'),
(15, '20124584212', 'Department Head Register DeptHead added Instructor Register Instructor in her contact lists.', '2021-12-02 05:00:24'),
(59, '20124584212', 'Department Head Register DeptHead added Student EZ Yucor in her contact lists.', '2021-12-02 08:49:58'),
(63, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-02 10:22:57'),
(64, '202131842213', 'College Dean Register Dean registered an account.', '2021-12-02 10:24:13'),
(65, '202131842213', 'College Dean Register Dean has successfully logged in.', '2021-12-02 10:24:22'),
(66, '202131842213', 'College Dean Register Dean has successfully logged out.', '2021-12-02 10:24:28'),
(67, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-02 10:24:34'),
(68, '20124584212', 'Department Head Register DeptHead added College Dean Register Dean in her contact lists.', '2021-12-02 10:33:54'),
(69, '20124584212', 'Department Head Register DeptHead added College Dean Register Dean in her contact lists.', '2021-12-02 10:36:37'),
(72, '20124584212', 'Department Head Register DeptHead added a new post.', '2021-12-02 15:34:59'),
(73, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-03 04:16:41'),
(74, '20124584212', 'Department Head Register DeptHead added Instructor Register Instructor in her contact lists.', '2021-12-03 05:07:15'),
(75, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 05:08:40'),
(76, '20124584212', 'Department Head Register DeptHead added Instructor Register Instructor in her contact lists.', '2021-12-03 05:36:01'),
(77, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 05:37:23'),
(78, '20124584212', 'Department Head Register DeptHead added Instructor Register Instructor in her contact lists.', '2021-12-03 05:55:23'),
(79, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 05:55:30'),
(80, '20124584212', 'Department Head Register DeptHead added Instructor Register Instructor in her contact lists.', '2021-12-03 06:00:46'),
(81, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:00:50'),
(82, '20124584212', 'Department Head Register DeptHead added Instructor Register Instructor in her contact lists.', '2021-12-03 06:05:31'),
(83, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:05:35'),
(84, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:05:59'),
(85, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:07:37'),
(86, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:10:48'),
(87, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:11:32'),
(88, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:12:45'),
(89, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:15:08'),
(90, '201245842154', 'Instructor Register Instructor has successfully logged in.', '2021-12-03 06:16:18'),
(91, '201245842154', 'Instructor Register Instructor has successfully logged in.', '2021-12-03 06:16:19'),
(92, '201245842154', 'Instructor Register Instructor sent a message to Department Head Register DeptHead', '2021-12-03 06:24:31'),
(93, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:38:54'),
(94, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 06:42:57'),
(95, '201245842154', 'Instructor Register Instructor sent a message to Department Head Register DeptHead', '2021-12-03 07:02:53'),
(96, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 07:03:06'),
(97, '201245842154', 'Instructor Register Instructor sent a message to Department Head Register DeptHead', '2021-12-03 07:12:25'),
(98, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-03 07:16:40'),
(99, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-03 10:44:50'),
(100, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-03 10:46:42'),
(101, '20124584212', 'Department Head Register DeptHead created a module entitled: sa in subject GE 6', '2021-12-04 07:28:26'),
(102, '20124584212', 'Department Head Register DeptHead created a module entitled: \"sadasd\" in subject GE 6', '2021-12-04 07:29:53'),
(103, '20124584212', 'Department Head Register DeptHead created a module entitled: \"EZ MICHAEL YUCOR\" in subject GE 4.', '2021-12-04 07:46:01'),
(104, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-04 07:46:21'),
(105, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-04 07:46:36'),
(106, '20124584212', 'Department Head Register DeptHead created a module entitled: \"ez gwapo\" in subject GE 4.', '2021-12-04 08:27:18'),
(107, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-04 08:33:06'),
(108, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-04 08:40:55'),
(109, '201245842154', 'Instructor Register Instructor has successfully logged in.', '2021-12-04 08:41:03'),
(110, '201245842154', 'Instructor Register Instructor created a module entitled: \"EZ MICHAEL YUCOR\" in subject GE 5.', '2021-12-04 08:41:28'),
(111, '201245842154', 'Instructor Register Instructor has successfully logged out.', '2021-12-04 09:03:30'),
(112, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-04 09:03:35'),
(113, '20124584212', 'Department Head Register DeptHead published her module entitled: \"EZ MICHAEL YUCOR\" in subject GE 4.', '2021-12-04 10:37:47'),
(114, '20124584212', 'Department Head Register DeptHead published her module entitled: \"EZ MICHAEL YUCOR\" in subject GE 4.', '2021-12-04 10:38:16'),
(115, '20124584212', 'Department Head Register DeptHead published her module entitled: \"EZ MICHAEL YUCOR\" in subject GE 4.', '2021-12-04 10:38:17'),
(116, '20124584212', 'Department Head Register DeptHead published her module entitled: \"ez gwapo\" in subject GE 4.', '2021-12-04 10:40:17'),
(117, '20124584212', 'Department Head Register DeptHead published her module entitled: \"ez gwapo\" in subject GE 4.', '2021-12-04 10:40:44'),
(118, '20124584212', 'Department Head Register DeptHead published her module entitled: \"ez gwapo\" in subject GE 4.', '2021-12-04 10:41:09'),
(119, '20124584212', 'Department Head Register DeptHead submitted her module entitled: \"EZ MICHAEL YUCOR\" in subject GE 4 for Dean\'s approval.', '2021-12-04 10:45:34'),
(120, '20124584212', 'Department Head Register DeptHead sent a message to Instructor Register Instructor', '2021-12-04 12:20:20'),
(121, '20124584212', 'Department Head Register DeptHead created a new class.', '2021-12-04 13:38:42'),
(122, '20124584212', 'Department Head Register DeptHead created a new class.', '2021-12-04 13:41:52'),
(123, '20124584212', 'Department Head Register DeptHead created a new class.', '2021-12-04 13:42:24'),
(124, '20124584212', 'Department Head Register DeptHead created an outline \n                        entitled: \"The Great King\" in her module entitled: \"EZ MICHAEL YUCOR\".', '2021-12-04 17:42:58'),
(125, '20124584212', 'Department Head Register DeptHead created an outline entitled: \"Collectorsss\" in her module entitled: \"EZ MICHAEL YUCOR\".', '2021-12-04 17:47:35'),
(126, '20124584212', 'Department Head Register DeptHead created an outline entitled: \"R23234234\" in her module entitled: \"EZ MICHAEL YUCOR\".', '2021-12-04 19:46:17'),
(127, '20124584212', 'Department Head Register DeptHead created an outline entitled: \"fsdfsdfs\" in her module entitled: \"EZ MICHAEL YUCOR\".', '2021-12-04 20:57:31'),
(128, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-04 21:24:20'),
(129, '2011321123123', 'Student Student Register registered an account.', '2021-12-04 21:25:53'),
(130, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-04 21:26:01'),
(131, '2011321123123', 'Student Student Register joined a class.', '2021-12-04 21:52:55'),
(132, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-04 21:53:51'),
(133, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-04 21:54:01'),
(134, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-04 21:57:40'),
(135, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-04 21:58:10'),
(136, '2011321123123', 'Student Student Register joined a class.', '2021-12-04 22:13:00'),
(137, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-05 00:12:15'),
(138, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-05 00:12:25'),
(139, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-05 00:44:42'),
(140, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-05 01:23:23'),
(141, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-05 16:36:30'),
(142, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-05 17:49:32'),
(143, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-05 17:50:37'),
(144, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-06 13:31:33'),
(145, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-06 13:31:53'),
(146, '2011321123123', 'Student Student Register added Department Head Register DeptHead in her contact lists.', '2021-12-06 13:39:29'),
(147, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-06 13:44:02'),
(148, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-06 13:44:11'),
(149, '20124584212', 'Department Head Register DeptHead has successfully logged out.', '2021-12-06 13:45:26'),
(150, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-06 13:45:42'),
(151, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-06 13:47:27'),
(152, '20124584212', 'Department Head Register DeptHead has successfully logged in.', '2021-12-06 13:47:30'),
(153, '20124584212', 'Department Head Register DeptHead edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4.', '2021-12-06 15:54:41'),
(154, '20124584212', 'Department Head Register DeptHead edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4.', '2021-12-06 15:55:27'),
(155, '20124584212', 'Department Head Register DeptHead edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4.', '2021-12-06 15:55:42'),
(156, '20124584212', 'Department Head Register DeptHead edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4.', '2021-12-06 15:56:16'),
(157, '20124584212', 'Department Head Register DeptHead edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4.', '2021-12-06 16:05:45'),
(158, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"I AM THE MODULE TITLE\" in subject .', '2021-12-06 16:54:11'),
(159, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4.', '2021-12-06 16:58:45'),
(160, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"I AM THE MODULE TITLE\" in subject  authored by: DeptHead Register.', '2021-12-06 17:11:40'),
(161, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4 authored by: DeptHead Register.', '2021-12-06 17:13:28'),
(162, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"I AM THE MODULE TITLE\" in subject  authored by: DeptHead Register.', '2021-12-06 17:16:22'),
(163, '20124584212', 'Department Head DeptHead Register edited an outline entitled: \"The Great King is Me!\" in her module entitled: \"I AM THE MODULE TITLE\".', '2021-12-06 17:37:55'),
(164, '20124584212', 'Department Head DeptHead Register edited an outline entitled: \"The Great King is Me! s\" in her module entitled: \"I AM THE MODULE TITLE\".', '2021-12-06 17:38:20'),
(165, '20124584212', 'Department Head DeptHead Register edited an outline entitled: \"The Great King is Me!\" in her module entitled: \"I AM THE MODULE TITLE\".', '2021-12-06 17:38:28'),
(166, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"I AM THE MODULE TITLE\" in subject GE 4 authored by: DeptHead Register.', '2021-12-06 17:39:26'),
(167, '20124584212', 'Department Head DeptHead Register edited an outline entitled: \"Martial Peak Chapter 5830: Jade\" in her module entitled: \"I AM THE MODULE TITLE\".', '2021-12-06 17:43:04'),
(168, '20124584212', 'Department Head DeptHead Register edited an outline entitled: \"Martial Peak Chapter 5830: Jade\" in her module entitled: \"I AM THE MODULE TITLE\".', '2021-12-06 17:43:41'),
(169, '20124584212', 'Department Head DeptHead Register edited an outline entitled: \"Martial Peak Chapter 5830: Jade\" in her module entitled: \"I AM THE MODULE TITLE\".', '2021-12-06 17:43:47'),
(170, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"Martial Peak\" in subject GE 4 authored by: DeptHead Register.', '2021-12-06 17:44:22'),
(171, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-07 06:32:49'),
(172, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-07 18:47:53'),
(173, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-07 18:54:12'),
(174, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-07 18:54:15'),
(175, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-07 18:58:17'),
(176, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-07 18:58:19'),
(177, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-07 18:58:26'),
(178, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-07 18:58:38'),
(179, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-07 20:11:59'),
(180, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-07 20:12:03'),
(181, '201245842154', 'Instructor Instructor Register  edited a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 authored by: Instructor Register.', '2021-12-07 20:15:53'),
(182, '201245842154', 'Instructor Instructor Register  created an outline entitled: \"LEARNING OUTCOMES\" in his module entitled: \"\".', '2021-12-07 20:16:22'),
(183, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"MODULE TITLE\" in subject ITS 101 authored by: DeptHead Register.', '2021-12-07 20:17:33'),
(184, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"OUTLINE TITLE\" in her module entitled: \"\".', '2021-12-07 20:17:48'),
(185, '201245842154', 'Instructor Instructor Register  created an outline entitled: \"SADASD\" in his module entitled: \"\".', '2021-12-07 20:20:22'),
(186, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"213231\" in her module entitled: \"\".', '2021-12-07 20:24:38'),
(187, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"wqeqwe\" in her module entitled: \"\".', '2021-12-07 20:24:58'),
(188, '201245842154', 'Instructor Instructor Register  created an outline entitled: \"324234\" in his module entitled: \"\".', '2021-12-07 20:32:09'),
(189, '201245842154', 'Instructor Instructor Register  created an outline entitled: \"324234sdfsdf\" in his module entitled: \"\".', '2021-12-07 20:32:25'),
(190, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"sdfsdf\" in her module entitled: \"MODULE TITLE\".', '2021-12-07 20:36:49'),
(191, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"sdfsdfdsfsdf\" in her module entitled: \"MODULE TITLE\".', '2021-12-07 20:37:49'),
(192, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"sdfsdfdsfsdfssss\" in her module entitled: \"MODULE TITLE\".', '2021-12-07 20:38:02'),
(193, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"dfsdf\" in her module entitled: \"MODULE TITLE\".', '2021-12-07 20:38:54'),
(194, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"qwewqe\" in her module entitled: \"MODULE TITLE\".', '2021-12-07 20:39:22'),
(195, '20124584212', 'Department Head DeptHead Register created a module entitled: \"sadasd\" in subject ITS 101.', '2021-12-07 20:42:23'),
(196, '20124584212', 'Department Head DeptHead Register created a module entitled: \"sadasd\" in subject PE 1.', '2021-12-07 20:43:09'),
(197, '20124584212', 'Department Head DeptHead Register created an outline entitled: \"ez\" in her module entitled: \"MODULE TITLE\".', '2021-12-07 20:46:16'),
(198, '201245842154', 'Instructor Instructor Register  created an outline entitled: \"ez\" in his module entitled: \"INTRO TO COMPUTER\".', '2021-12-07 20:47:10'),
(199, '201245842154', 'Instructor Instructor Register  added a new post.', '2021-12-07 20:54:58'),
(200, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-07 21:02:14'),
(201, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-07 21:02:17'),
(202, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-07 21:04:04'),
(203, '20124584212', 'Department Head DeptHead Register added a new post.', '2021-12-07 21:04:19'),
(204, '20124584212', 'Department Head DeptHead Register added a new post.', '2021-12-07 21:04:37'),
(205, '20124584212', 'Department Head DeptHead Register added a new post.', '2021-12-07 21:04:56'),
(206, '20124584212', 'Department Head DeptHead Register added a new post.', '2021-12-07 21:05:18'),
(207, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-07 21:06:49'),
(208, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-07 21:06:54'),
(209, '202131842213', 'College Dean Dean Register added a new post.', '2021-12-07 21:07:02'),
(210, '20124584212', 'Department Head DeptHead Register added College Dean Dean Register in her contact lists.', '2021-12-07 21:07:11'),
(211, '20124584212', 'Department Head DeptHead Register sent a message to College Dean Dean Register', '2021-12-07 21:07:18'),
(212, '202131842213', 'College Dean Dean Register sent a message to Department Head DeptHead Register', '2021-12-07 21:07:45'),
(213, '20124584212', 'Department Head DeptHead Register deleted a post.', '2021-12-07 21:10:18'),
(214, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"sadasd\" in subject PE 1 authored by: DeptHead Register.', '2021-12-07 21:13:23'),
(215, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"sadasd\" in subject GE 1 authored by: DeptHead Register.', '2021-12-07 21:13:40'),
(216, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"sadasd\" in subject PE 1 authored by: DeptHead Register.', '2021-12-07 21:14:16'),
(217, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"sadasd\" in subject NSTP 1 authored by: DeptHead Register.', '2021-12-07 21:14:34'),
(218, '20124584212', 'Department Head DeptHead Register submitted her module entitled: \"MODULE TITLE\" in subject ITS 101 for Dean\'s approval.', '2021-12-07 21:14:43'),
(219, '20124584212', 'Department Head DeptHead Register created a new class.', '2021-12-07 21:19:33'),
(220, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-08 00:19:30'),
(221, '20124584212', 'Department Head DeptHead Register copied the module of DeptHead Registerentitled: \"Martial Peak\".', '2021-12-08 10:25:44'),
(222, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-08 10:35:08'),
(223, '201245842154', 'Instructor Instructor Register  copied the module of DeptHead Registerentitled: \"Martial Peak\".', '2021-12-08 10:36:01'),
(224, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-08 10:51:46'),
(225, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-08 11:01:20'),
(226, '201245842154', 'Instructor Instructor Register  created a new class.', '2021-12-08 11:02:19'),
(227, '20124584212', 'Department Head DeptHead Register deleted a class.', '2021-12-08 13:22:33'),
(228, '20124584212', 'Department Head DeptHead Register deleted a class.', '2021-12-08 13:23:12'),
(229, '20124584212', 'Department Head DeptHead Register edited a class.', '2021-12-08 15:18:26'),
(230, '20124584212', 'Department Head DeptHead Register transfered a class (code: L35acX3l8p) to Instructor Register .', '2021-12-08 15:19:16'),
(231, '20124584212', 'Department Head DeptHead Register transfered a class (code: L35acX3l8p) to Instructor Register .', '2021-12-08 15:34:46'),
(232, '201245842154', 'Instructor Instructor Register  deleted a class.', '2021-12-08 15:36:46'),
(233, '201245842154', 'Instructor Instructor Register  transfered a class (code: BTzR2wvkTf) to DeptHead Register.', '2021-12-08 15:37:33'),
(234, '20124584212', 'Department Head DeptHead Register deleted a class.', '2021-12-08 15:43:38'),
(235, '20124584212', 'Department Head DeptHead Register edited a module entitled: \"NSTP 1\" in subject NSTP 1 authored by: DeptHead Register.', '2021-12-08 15:44:12'),
(236, '20124584212', 'Department Head DeptHead Register created a new class.', '2021-12-08 15:44:36'),
(237, '20124584212', 'Department Head DeptHead Register transfered a class (code: 3fyErnQqUU) to Instructor Register .', '2021-12-08 15:46:19'),
(238, '201245842154', 'Instructor Instructor Register  transfered a class (code: 3fyErnQqUU) to DeptHead Register.', '2021-12-08 15:47:52'),
(239, '20124584212', 'Department Head DeptHead Register edited a class.', '2021-12-08 15:53:41'),
(240, '20124584212', 'Department Head DeptHead Register transfered a class (code: 3fyErnQqUU) to Instructor Register .', '2021-12-08 15:58:04'),
(241, '201245842154', 'Instructor Instructor Register  deleted a post.', '2021-12-08 15:58:26'),
(242, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-08 16:18:24'),
(243, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-08 16:22:40'),
(244, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-08 16:22:59'),
(245, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-08 17:30:17'),
(246, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-08 17:30:22'),
(247, '20113215542', 'Admin EZ Yucor has successfully logged in.', '2021-12-08 17:52:51'),
(248, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-08 18:31:21'),
(249, '20113215542', 'Admin EZ Yucor has successfully logged in.', '2021-12-08 21:02:37'),
(250, '20113215542', 'Admin EZ Yucor edited a subject record!', '2021-12-08 21:24:06'),
(251, '20113215542', 'Admin EZ Yucor added a new subject.', '2021-12-08 21:28:55'),
(252, '20113215542', 'Admin EZ Yucor edited a Course record in College of Agriculture, Forestry And Fisheries', '2021-12-08 21:37:22'),
(253, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-08 21:43:00'),
(254, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-08 22:06:42'),
(255, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-08 22:06:45'),
(256, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-08 22:11:29'),
(257, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-08 22:11:32'),
(258, '20124584212', 'Department Head DeptHead Register submitted her module entitled: \"sadasd\" in subject PE 1 for Dean\'s approval.', '2021-12-09 15:07:36'),
(259, '20124584212', 'Department Head DeptHead Register submitted her module entitled: \"sadasd\" in subject PE 1 for Dean\'s approval.', '2021-12-09 15:07:37'),
(260, '20124584212', 'Department Head DeptHead Register submitted her module entitled: \"NSTP 1\" in subject NSTP 1 for Dean\'s approval.', '2021-12-09 15:08:10'),
(261, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-09 16:39:56'),
(262, '20113215542', 'Admin EZ Yucor has successfully logged out.', '2021-12-10 05:02:34'),
(263, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-10 05:09:24'),
(264, '20124584212', 'Department Head DeptHead Register approved a module entitled: \"INTRO TO COMPUTER\" in subject  for Dean\'s approval.', '2021-12-10 10:55:05'),
(265, '20124584212', 'Department Head DeptHead Register approved a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dean\'s approval.', '2021-12-10 10:56:18'),
(266, '20124584212', 'Department Head DeptHead Register approved a module entitled: \"MODULE TITLE\" in subject ITS 101 for Dean\'s approval.', '2021-12-10 10:57:58'),
(267, '20124584212', 'Department Head DeptHead Register endorsed a module entitled: \"MODULE TITLE\" in subject ITS 101 for Dean\'s approval.', '2021-12-10 11:00:14'),
(268, '20124584212', 'Department Head DeptHead Register endorsed a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dean\'s approval.', '2021-12-10 11:00:31'),
(269, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:19:27'),
(270, '20124584212', 'Department Head DeptHead Register sent a module remarks to    ', '2021-12-10 12:19:27'),
(271, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"MODULE TITLE\" in subject ITS 101 to be revise.', '2021-12-10 12:19:36'),
(272, '20124584212', 'Department Head DeptHead Register sent a module remarks to    ', '2021-12-10 12:19:36'),
(273, '20124584212', 'Department Head DeptHead Register endorsed a module entitled: \"MODULE TITLE\" in subject ITS 101 for Dean\'s approval.', '2021-12-10 12:20:31'),
(274, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-10 12:21:16'),
(275, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:30:14'),
(276, '20124584212', 'Department Head DeptHead Register sent a module remarks to    ', '2021-12-10 12:30:14'),
(277, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:30:21'),
(278, '20124584212', 'Department Head DeptHead Register sent a module remarks to    ', '2021-12-10 12:30:21'),
(279, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:30:22'),
(280, '20124584212', 'Department Head DeptHead Register sent a module remarks to    ', '2021-12-10 12:30:22'),
(281, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:30:23'),
(282, '20124584212', 'Department Head DeptHead Register sent a module remarks to    ', '2021-12-10 12:30:23'),
(283, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"MODULE TITLE\" in subject ITS 101 to be revise.', '2021-12-10 12:33:15'),
(284, '20124584212', 'Department Head DeptHead Register sent a module remarks toDepartment Head DeptHead Register', '2021-12-10 12:33:15'),
(285, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"MODULE TITLE\" in subject ITS 101 to be revise.', '2021-12-10 12:34:24'),
(286, '20124584212', 'Department Head DeptHead Register sent a module remarks toDepartment Head DeptHead Register', '2021-12-10 12:34:24'),
(287, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"MODULE TITLE\" in subject ITS 101 to be revise.', '2021-12-10 12:37:08'),
(288, '20124584212', 'Department Head DeptHead Register sent a module remarks toDepartment Head DeptHead Register', '2021-12-10 12:37:09'),
(289, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:40:06'),
(290, '20124584212', 'Department Head DeptHead Register sent a module remarks toInstructor Instructor Register ', '2021-12-10 12:40:06'),
(291, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"MODULE TITLE\" in subject ITS 101 to be revise.', '2021-12-10 12:41:57'),
(292, '20124584212', 'Department Head DeptHead Register sent a module remarks toDepartment Head DeptHead Register', '2021-12-10 12:41:57'),
(293, '20124584212', 'Department Head DeptHead Register returned a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be revise.', '2021-12-10 12:42:44'),
(294, '20124584212', 'Department Head DeptHead Register sent a module remarks toInstructor Instructor Register ', '2021-12-10 12:42:44'),
(295, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dean\'s approval.', '2021-12-10 12:49:18'),
(296, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:50:39'),
(297, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:55:12'),
(298, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:55:15'),
(299, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:55:16'),
(300, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:55:16'),
(301, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:55:17'),
(302, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:31'),
(303, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:35'),
(304, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:38'),
(305, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:39'),
(306, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:40'),
(307, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:41'),
(308, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:42'),
(309, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:56:43'),
(310, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:57:33'),
(311, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:57:50'),
(312, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:58:31'),
(313, '201245842154', 'Instructor Instructor Register  submitted his module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dept Head\'s approval.', '2021-12-10 12:59:00'),
(314, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-10 13:04:30'),
(315, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-10 13:04:43'),
(316, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-10 19:09:57'),
(317, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-10 19:10:07'),
(318, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-10 19:13:37'),
(319, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-10 19:13:57'),
(320, '202131842213', 'College Dean Dean Register approved a module entitled: \"NSTP 1\" in subject NSTP 1 to be published.', '2021-12-10 20:15:05'),
(321, '202131842213', 'College Dean Dean Register returned a module entitled: \"sadasd\" in subject PE 1 to be revise.', '2021-12-10 20:15:18'),
(322, '202131842213', 'College Dean Dean Register sent a module remarks toDepartment Head DeptHead Register', '2021-12-10 20:15:18'),
(323, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-10 20:34:25'),
(324, '201245842154', 'Instructor Instructor Register  deleted a class.', '2021-12-10 20:36:53'),
(325, '201245842154', 'Instructor Instructor Register  created a new class.', '2021-12-10 20:38:19'),
(326, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-10 20:39:47'),
(327, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-10 20:39:58'),
(328, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-10 20:44:17'),
(329, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-10 21:31:17'),
(330, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-10 21:32:15'),
(331, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-10 21:32:18'),
(332, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-10 21:32:48'),
(333, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-10 21:32:51'),
(334, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-10 21:40:57'),
(335, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-10 21:41:01'),
(336, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-10 21:41:10'),
(337, '20124584212', 'Department Head DeptHead Register endorsed a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 for Dean\'s approval.', '2021-12-10 21:42:35'),
(338, '202131842213', 'College Dean Dean Register approved a module entitled: \"INTRO TO COMPUTER\" in subject ITS 100 to be published.', '2021-12-10 21:42:46'),
(339, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-10 21:42:54'),
(340, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-10 21:42:58'),
(341, '201245842154', 'Instructor Instructor Register  created a new class.', '2021-12-10 21:44:25'),
(342, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-10 21:49:44'),
(343, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-10 21:49:47'),
(344, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-10 21:51:15'),
(345, '20113215542', 'Admin EZ Yucor has successfully logged in.', '2021-12-10 21:51:34'),
(346, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-10 22:32:38'),
(347, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-11 00:33:06'),
(348, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-11 04:11:27'),
(349, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-11 04:11:30'),
(350, '20854846487', 'Admin Admin Register registered an account.', '2021-12-11 11:39:36'),
(351, '20113215542', 'Admin EZ Yucor has successfully logged out.', '2021-12-11 11:40:12'),
(352, '20854846487', 'Admin Admin Register has successfully logged in.', '2021-12-11 11:40:17'),
(353, '20854846487', 'Admin Admin Register has successfully logged out.', '2021-12-11 13:11:12'),
(354, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-11 13:11:33'),
(355, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-12 01:37:59'),
(356, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-12 01:49:01'),
(357, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-12 01:51:08'),
(358, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-12 01:51:19'),
(359, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-12 01:51:29'),
(360, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-12 01:51:31'),
(361, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-12 02:48:48'),
(362, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-12 02:48:51'),
(363, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-12 09:49:13'),
(364, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-12 10:01:12'),
(365, '26465465451', 'Student Major Register registered an account.', '2021-12-12 10:02:18'),
(366, '26465465451', 'Student Major Register has successfully logged in.', '2021-12-12 10:02:27'),
(367, '26465465451', 'Student Major Register has successfully logged out.', '2021-12-12 10:02:55'),
(368, '26465465451', 'Student Major Register has successfully logged in.', '2021-12-12 10:02:59'),
(369, '2011321123123', 'Student Student Register updated her personal information.', '2021-12-12 14:47:01'),
(370, '2011321123123', 'Student Student Register updated  personal information.', '2021-12-12 14:47:33'),
(371, '2011321123123', 'Student Student Register updated  personal information.', '2021-12-12 14:48:11'),
(372, '2011321123123', 'Student Student Register updated her personal information.', '2021-12-12 14:51:52'),
(373, '2011321123123', 'Student Student Register updated her personal information.', '2021-12-12 14:52:07'),
(374, '2011321123123', 'Student Student Register updated his personal information.', '2021-12-12 14:52:19'),
(375, '2011321123123', 'Student Student Register updated his personal information.', '2021-12-12 14:52:20'),
(376, '2011321123123', 'Student Student Register updated his personal information.', '2021-12-12 14:52:31'),
(377, '2011321123123', 'Student Student Register updated his personal information.', '2021-12-12 14:53:23'),
(378, '2011321123123', 'Student Student Register updated her personal information.', '2021-12-12 14:54:04'),
(379, '2011321123123', 'Student Female Student Register updated her other details information.', '2021-12-12 15:07:25'),
(380, '2011321123123', 'Student Female Student Register updated her other details information.', '2021-12-12 15:09:01'),
(381, '2011321123123', 'Student Female Student Register updated her other details information.', '2021-12-12 15:10:53'),
(382, '2011321123123', 'Student Female Student Register updated her other details information.', '2021-12-12 15:12:23'),
(383, '2011321123123', 'Student Female Student Register updated her other details information.', '2021-12-12 15:12:36'),
(384, '2011321123123', 'Student Female Student Register updated her social media information.', '2021-12-12 15:21:08'),
(385, '2011321123123', 'Student Female Student Register updated her social media information.', '2021-12-12 15:21:59'),
(386, '2011321123123', 'Student Female Student Register updated her other details information.', '2021-12-12 15:25:37'),
(387, '26465465451', 'Student Major Register updated her other details information.', '2021-12-12 15:27:59'),
(388, '26465465451', 'Student Major Register updated her personal information.', '2021-12-12 15:31:46'),
(389, '2011321123123', 'Student Female Student Register updated her educational information.', '2021-12-13 18:14:06'),
(390, '26465465451', 'Student Major in Register has successfully logged out.', '2021-12-13 18:16:41'),
(391, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-13 18:16:44'),
(392, '20124584212', 'Department Head DeptHead Register updated her educational information.', '2021-12-13 18:23:35'),
(393, '2011321123123', 'Student Female Student Register updated her educational information.', '2021-12-13 18:26:09'),
(394, '2011321123123', 'Student Female Student Register updated her educational information.', '2021-12-14 00:35:24'),
(395, '2011321123123', 'Student Female Student Register updated her social media information.', '2021-12-14 00:53:55'),
(396, '2011321123123', 'Student Female Student Register updated her social media information.', '2021-12-14 00:54:08'),
(397, '2011321123123', 'Student Female Student Register updated her social media information.', '2021-12-14 00:54:54'),
(398, '2011321123123', 'Student Female Student Register has successfully logged in.', '2021-12-14 01:55:10'),
(399, '2011321123123', 'Student Female Student Register updated her loadslip.', '2021-12-14 02:10:53'),
(400, '2011321123123', 'Student Female Student Register updated her loadslip.', '2021-12-14 02:13:13'),
(401, '2011321123123', 'Student Female Student Register updated her loadslip.', '2021-12-14 02:14:06'),
(402, '2011321123123', 'Student Female Student Register updated her loadslip.', '2021-12-14 02:15:46'),
(403, '2011321123123', 'Student Female Student Register updated her loadslip.', '2021-12-14 02:16:19'),
(404, '2011321123123', 'Student Female Student Register updated her loadslip.', '2021-12-14 02:36:57'),
(405, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-14 03:16:47'),
(406, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-14 11:14:34'),
(407, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 12:28:55'),
(408, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 12:40:11'),
(409, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 12:41:07'),
(410, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 12:45:45'),
(411, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 12:47:07'),
(412, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 12:47:57'),
(413, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 12:54:51'),
(414, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 12:55:49'),
(415, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:00:34'),
(416, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 13:04:42'),
(417, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:07:47'),
(418, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:08:06'),
(419, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:08:36'),
(420, '2011321123123', 'Student Female Student Register updated her profile picture.', '2021-12-14 13:13:45'),
(421, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:13:58'),
(422, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:14:21'),
(423, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:14:43'),
(424, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:15:21'),
(425, '2011321123123', 'Student Female Student Register updated her cover photo.', '2021-12-14 13:15:37'),
(426, '2011321123123', 'Student Female Student Register has successfully logged out.', '2021-12-14 13:18:54'),
(427, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:13:31'),
(428, '20124584212', 'Department Head DeptHead Register updated her profile picture.', '2021-12-14 23:14:51'),
(429, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:25:16'),
(430, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:27:45'),
(431, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:28:54'),
(432, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:32:15'),
(433, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:33:07'),
(434, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:34:18'),
(435, '20124584212', 'Department Head DeptHead Register updated her profile picture.', '2021-12-14 23:35:11'),
(436, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:35:44'),
(437, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:36:28'),
(438, '20124584212', 'Department Head DeptHead Register updated her profile picture.', '2021-12-14 23:37:28'),
(439, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:37:37'),
(440, '20124584212', 'Department Head DeptHead Register updated her cover photo.', '2021-12-14 23:51:27'),
(441, '2011321123123', 'Student Female Student Register has successfully logged in.', '2021-12-14 23:53:36'),
(442, '20124584212', 'Department Head DeptHead Register updated her other details information.', '2021-12-14 23:58:12'),
(443, '2011321123123', 'Student Female Student Register updated her personal information.', '2021-12-15 00:02:59'),
(444, '2011321123123', 'Student Student Register added College Dean Dean Register in her contact lists.', '2021-12-15 00:04:37'),
(445, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 00:41:22'),
(446, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 00:41:24'),
(447, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 00:41:26'),
(448, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-15 00:41:41'),
(449, '20124584212', 'Department Head DeptHead Register submitted her module entitled: \"MODULE TITLE\" in subject ITS 101 for Dean\'s approval.', '2021-12-15 00:41:54'),
(450, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-15 00:42:00'),
(451, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-15 00:42:03'),
(452, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-15 00:42:14'),
(453, '20854846487', 'Admin Admin Register has successfully logged in.', '2021-12-15 00:43:25');
INSERT INTO `logs` (`log_id`, `account_unique`, `log_action`, `log_datetime`) VALUES
(454, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 04:16:56'),
(455, '20854846487', 'Admin Admin Register has successfully logged in.', '2021-12-15 05:25:31'),
(456, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 05:45:02'),
(457, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-15 05:45:05'),
(458, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-15 05:45:55'),
(459, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-15 05:46:03'),
(460, '20854846487', 'Admin Admin Register accepted Student Register\'s account.', '2021-12-15 11:55:29'),
(461, '20854846487', 'Admin Admin Register accepted Major in Register\'s account.', '2021-12-15 11:57:26'),
(462, '20854846487', 'Admin Admin Register accepted Student Register\'s account.', '2021-12-15 11:57:37'),
(463, '20854846487', 'Admin Admin Register accepted Instructor Register \'s account.', '2021-12-15 11:57:56'),
(464, '20854846487', 'Admin Admin Register accepted DeptHead Register\'s account.', '2021-12-15 11:58:02'),
(465, '20854846487', 'Admin Admin Register accepted Dean Register\'s account.', '2021-12-15 11:58:09'),
(466, '20854846487', 'Admin Admin Register accepted all the students account.', '2021-12-15 13:31:08'),
(467, '20854846487', 'Admin Admin Register accepted Instructor Register \'s account.', '2021-12-15 13:41:10'),
(468, '20854846487', 'Admin Admin Register accepted DeptHead Register\'s account.', '2021-12-15 13:42:53'),
(469, '20854846487', 'Admin Admin Register accepted Dean Register\'s account.', '2021-12-15 13:43:01'),
(470, '20854846487', 'Admin Admin Register accepted all the students account.', '2021-12-15 13:50:07'),
(471, '20854846487', 'Admin Admin Register accepted all the Instructors account.', '2021-12-15 13:50:12'),
(472, '20854846487', 'Admin Admin Register accepted all the DeptHead account.', '2021-12-15 13:50:17'),
(473, '20854846487', 'Admin Admin Register accepted all the Dean account.', '2021-12-15 13:50:24'),
(474, '20854846487', 'Admin Admin Register sent a message to  Major in Register', '2021-12-15 14:19:55'),
(475, '20854846487', 'Admin Admin Register sent a message to Major in Register', '2021-12-15 14:20:10'),
(476, '20854846487', 'Admin Admin Register sent a message to Major in Register', '2021-12-15 14:21:54'),
(477, '20854846487', 'Admin Admin Register sent a message to Major in Register', '2021-12-15 14:22:26'),
(478, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-15 14:23:02'),
(479, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 14:23:07'),
(480, '20854846487', 'Admin Admin Register sent a message to Student Register', '2021-12-15 14:23:24'),
(481, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 14:23:38'),
(482, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-15 14:23:56'),
(483, '26465465451', 'Student Major in Register sent a message to Admin Admin Register', '2021-12-15 14:24:19'),
(484, '26465465451', 'Student Major in Register has successfully logged out.', '2021-12-15 14:24:23'),
(485, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-15 14:24:27'),
(486, '26465465451', 'Student Major in Register has successfully logged out.', '2021-12-15 14:24:29'),
(487, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-15 14:24:30'),
(488, '26465465451', 'Student Major in Register has successfully logged out.', '2021-12-15 14:24:33'),
(489, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-15 14:24:36'),
(490, '26465465451', 'Student Major in Register has successfully logged out.', '2021-12-15 14:24:38'),
(491, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 14:24:44'),
(492, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 14:25:12'),
(493, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 14:25:16'),
(494, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 14:25:25'),
(495, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 14:25:28'),
(496, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 14:25:34'),
(497, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 14:27:15'),
(498, '20854846487', 'Admin Admin Register sent a message to Student Register', '2021-12-15 14:33:36'),
(499, '20854846487', 'Admin Admin Register sent a message to Student Register', '2021-12-15 14:33:46'),
(500, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:31:20'),
(501, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:31:29'),
(502, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:31:34'),
(503, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:32:02'),
(504, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:32:06'),
(505, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:39:33'),
(506, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:39:38'),
(507, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:55:13'),
(508, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:55:18'),
(509, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:56:56'),
(510, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:57:15'),
(511, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:57:19'),
(512, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:57:22'),
(513, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:57:32'),
(514, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:57:36'),
(515, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 17:57:41'),
(516, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 17:57:43'),
(517, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 18:07:20'),
(518, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 18:10:33'),
(519, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 18:10:39'),
(520, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 18:11:16'),
(521, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 18:11:24'),
(522, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 18:21:01'),
(523, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 18:21:15'),
(524, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 18:21:26'),
(525, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 20:00:01'),
(526, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 20:00:33'),
(527, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 20:01:31'),
(528, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 20:02:01'),
(529, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 20:02:12'),
(530, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 20:02:16'),
(531, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 21:11:32'),
(532, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 21:11:50'),
(533, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 21:11:56'),
(534, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 21:26:01'),
(535, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 21:26:02'),
(536, '2011321123123', 'Student Student Register commented in the post of Department Head DeptHead Register.', '2021-12-15 21:53:04'),
(537, '2011321123123', 'Student Student Register sent a message to Admin Admin Register', '2021-12-15 21:53:43'),
(538, '2011321123123', 'Student Student Register sent a message to College Dean Dean Register', '2021-12-15 21:53:57'),
(539, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 21:54:52'),
(540, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 21:55:07'),
(541, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-15 22:51:58'),
(542, '202131842213', 'College Dean Dean Register commented in the post of Department Head DeptHead Register.', '2021-12-15 22:53:16'),
(543, '202131842213', 'College Dean Dean Register commented in the post of Student Student Register.', '2021-12-15 22:53:27'),
(544, '202131842213', 'College Dean Dean Register commented in the post of Student Student Register.', '2021-12-15 22:54:55'),
(545, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-15 22:55:07'),
(546, '2011321123123', 'Student Student Register has successfully logged in.', '2021-12-15 22:55:10'),
(547, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 22:55:13'),
(548, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 22:55:22'),
(549, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 22:55:27'),
(550, '2011321123123', 'Student Student Register commented in the post of Department Head DeptHead Register.', '2021-12-15 22:56:02'),
(551, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 22:56:38'),
(552, '2011321123123', 'Student Student Register deleted a post.', '2021-12-15 22:56:48'),
(553, '2011321123123', 'Student Student Register added a new post.', '2021-12-15 22:58:19'),
(554, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 22:58:22'),
(555, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 22:59:31'),
(556, '2011321123123', 'Student Student Register commented in the post of Student Student Register.', '2021-12-15 23:05:02'),
(557, '2011321123123', 'Student Student Register commented in the post of Department Head DeptHead Register.', '2021-12-15 23:05:09'),
(558, '2011321123123', 'Student Student Register commented in the post of College Dean Dean Register.', '2021-12-15 23:08:32'),
(559, '2011321123123', 'Student Student Register has successfully logged out.', '2021-12-15 23:09:02'),
(560, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-15 23:09:07'),
(561, '202131842213', 'College Dean Dean Register commented in the post of Student Student Register.', '2021-12-15 23:09:22'),
(562, '202131842213', 'College Dean Dean Register approved a module entitled: \"MODULE TITLE\" in subject ITS 101 to be published.', '2021-12-15 23:09:46'),
(563, '202131842213', 'College Dean Dean Register commented in the post of Department Head DeptHead Register.', '2021-12-15 23:10:03'),
(564, '202131842213', 'College Dean Dean Register commented in the post of Instructor Instructor Register.', '2021-12-15 23:11:59'),
(565, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-15 23:13:41'),
(566, '20124584212', 'Department Head DeptHead Register has successfully logged out.', '2021-12-15 23:19:45'),
(567, '20854846487', 'Admin Admin Register has successfully logged in.', '2021-12-15 23:20:05'),
(568, '20854846487', 'Admin Admin Register accepted all the students account.', '2021-12-15 23:20:13'),
(569, '20854846487', 'Admin Admin Register accepted all the Instructors account.', '2021-12-15 23:20:17'),
(570, '20854846487', 'Admin Admin Register accepted all the DeptHead account.', '2021-12-15 23:20:21'),
(571, '20854846487', 'Admin Admin Register accepted all the Dean account.', '2021-12-15 23:20:25'),
(572, '20854846487', 'Admin Admin Register has successfully logged out.', '2021-12-16 07:34:18'),
(573, '20124584212', 'Department Head DeptHead Register has successfully logged in.', '2021-12-16 07:39:38'),
(574, '20124584212', 'Department Head DeptHead Register added College Dean Dean Register in her contact lists.', '2021-12-16 08:27:43'),
(575, '202131842213', 'College Dean Dean Register has successfully logged out.', '2021-12-16 09:43:39'),
(576, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-16 09:43:49'),
(577, '20124584212', 'Department Head DeptHead Register sent a message to Instructor Instructor Register ', '2021-12-16 10:00:41'),
(578, '20124584212', 'Department Head DeptHead Register sent a message to Instructor Instructor Register ', '2021-12-16 10:00:45'),
(579, '201245842154', 'Instructor Instructor Register  sent a message to Department Head DeptHead Register', '2021-12-16 10:00:49'),
(580, '20124584212', 'Department Head DeptHead Register sent a message to Instructor Instructor Register ', '2021-12-16 12:30:55'),
(581, '20124584212', 'Department Head DeptHead Register sent a message to Instructor Instructor Register ', '2021-12-16 12:30:59'),
(582, '20124584212', 'Department Head DeptHead Register sent a message to Instructor Instructor Register ', '2021-12-16 12:31:28'),
(583, '201245842154', 'Instructor Instructor Register  sent a message to Department Head DeptHead Register', '2021-12-16 12:32:39'),
(584, '201245842154', 'Instructor Instructor Register  sent a message to Department Head DeptHead Register', '2021-12-16 12:32:51'),
(585, '201245842154', 'Instructor Instructor Register  commented in the post of Department Head DeptHead Register.', '2021-12-16 12:39:54'),
(586, '201245842154', 'Instructor Instructor Register  has successfully logged in.', '2021-12-21 02:23:45'),
(587, '201245842154', 'Instructor Instructor Register  has successfully logged out.', '2021-12-21 02:29:45'),
(588, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-21 02:29:48'),
(589, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-21 04:21:52'),
(590, '20124584212', 'Department Head DeptHead Register updated her personal information.', '2021-12-21 18:22:00'),
(591, '26465465451', 'Student Major in Register has successfully logged in.', '2021-12-29 07:43:51'),
(592, '26465465451', 'Student Major in Register has successfully logged out.', '2021-12-29 07:46:08'),
(593, '202131842213', 'College Dean Dean Register has successfully logged in.', '2021-12-29 07:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `major_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `course_id`, `major_name`) VALUES
(1, 4, 'Major in Animal Husbandry'),
(2, 2, 'Major in Animal Science'),
(3, 2, 'Major in Agribusiness'),
(4, 2, 'Major in Agronomy'),
(5, 5, 'Major in General Curriculum'),
(6, 5, 'Major in Social Science'),
(7, 15, 'Major in Financial Management'),
(8, 15, 'Major in Human Resource Management'),
(9, 15, 'Major in Marketing Management'),
(10, 26, 'Major in Airframe and Maintenance'),
(11, 27, 'Major in Avionics (Aviotion Electronics)'),
(12, 28, 'Major in Architectural Drafting Technology'),
(13, 28, 'Major in Civil Technology'),
(14, 29, 'Major in Computer Technology'),
(15, 28, 'Major in Electrical Technology'),
(16, 28, 'Major in Food Technology'),
(17, 28, 'Major in Garments Technology'),
(18, 28, 'Major in Mechanical Technology'),
(19, 28, 'Major in Refrigeration and Air Conditioning Technology'),
(20, 28, 'Major in Automotive Technology'),
(22, 38, 'Major in English'),
(23, 39, 'Specialization in Deaf and Hard-of-Hearing Learners'),
(24, 39, 'Specialization in Early Childhood Education'),
(25, 39, 'Specialization in Elementary School Teaching'),
(26, 39, 'Specialization in General'),
(27, 39, 'Specialization in Teaching Learners with Visual Impairment'),
(28, 40, 'Specialization in Agri-Fishery Arts'),
(29, 40, 'Specialization in Home Economics'),
(30, 40, 'Specialization in Industrial Arts'),
(31, 38, 'Major in Values Education'),
(32, 38, 'Major in Filipino'),
(33, 38, 'Major in Mathematics'),
(34, 38, 'Major in Sciences'),
(35, 38, 'Major in Social Studies'),
(36, 40, 'Specialization in Information &amp; Communication Technology'),
(38, 28, 'Major in Computer Technology'),
(39, 36, 'Major in General Curriculum');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_sender` varchar(255) NOT NULL,
  `message_receiver` varchar(255) NOT NULL,
  `message_content` blob NOT NULL,
  `message_status` int(11) NOT NULL,
  `message_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_sender`, `message_receiver`, `message_content`, `message_status`, `message_datetime`) VALUES
(8, '20124584212', '201245842154', 0x736466736466, 1, '2021-12-03 06:05:35'),
(9, '20124584212', '201245842154', 0x73646673646673, 1, '2021-12-03 06:05:59'),
(10, '20124584212', '201245842154', 0x61736461736478787878, 1, '2021-12-03 06:07:37'),
(11, '20124584212', '201245842154', 0x646664, 1, '2021-12-03 06:10:48'),
(12, '20124584212', '201245842154', 0x736473, 1, '2021-12-03 06:11:31'),
(13, '20124584212', '201245842154', 0x73, 1, '2021-12-03 06:12:45'),
(14, '20124584212', '201245842154', 0x736461647361, 1, '2021-12-03 06:15:08'),
(15, '201245842154', '20124584212', 0x736466736466, 1, '2021-12-03 06:24:30'),
(16, '20124584212', '201245842154', 0x73656e64, 1, '2021-12-03 06:38:54'),
(17, '20124584212', '201245842154', 0x616b6f, 1, '2021-12-03 06:42:57'),
(18, '201245842154', '20124584212', 0x6d6f2073656e64206b6f20617320696e7374727563746f72, 1, '2021-12-03 07:02:53'),
(19, '20124584212', '201245842154', 0x616b6f206173206465707468656164, 1, '2021-12-03 07:03:06'),
(20, '201245842154', '20124584212', 0x6d6f2073656e64206b6f20617320696e7374727563746f7220746173737373206b6161797520616b6f6e67206d65737361676573737373, 1, '2021-12-03 07:12:25'),
(21, '20124584212', '201245842154', 0x687474703a2f2f6c6f63616c686f73742f6e6f7273752d656c636d732f64657074686561642f6d657373616765732e706870206473647361646173646173206461736420777165717765777165777165717765777165717765717765777165717765717765717765717765717765717765777165717765717765, 1, '2021-12-03 07:16:40'),
(22, '20124584212', '201245842154', 0x617364617364, 1, '2021-12-04 12:20:19'),
(23, '20124584212', '202131842213', 0x6869, 1, '2021-12-07 21:07:18'),
(24, '202131842213', '20124584212', 0x6d75737461, 1, '2021-12-07 21:07:44'),
(27, '20124584212', '201245842154', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313030202d20494e54524f20544f20434f4d50555445523c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e64617364617364617364, 1, '2021-12-10 12:30:14'),
(28, '20124584212', '201245842154', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313030202d20494e54524f20544f20434f4d50555445523c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e64617364617364617364, 1, '2021-12-10 12:30:21'),
(29, '20124584212', '201245842154', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313030202d20494e54524f20544f20434f4d50555445523c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e64617364617364617364, 1, '2021-12-10 12:30:22'),
(30, '20124584212', '201245842154', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313030202d20494e54524f20544f20434f4d50555445523c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e64617364617364617364, 1, '2021-12-10 12:30:23'),
(31, '20124584212', '20124584212', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313031202d204d4f44554c45205449544c453c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e64667366736466736466, 1, '2021-12-10 12:33:15'),
(32, '20124584212', '20124584212', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313031202d204d4f44554c45205449544c453c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e, 1, '2021-12-10 12:34:24'),
(33, '20124584212', '20124584212', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313031202d204d4f44554c45205449544c453c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e, 1, '2021-12-10 12:37:08'),
(34, '20124584212', '201245842154', 0x3c683620636c6173733d226673742d6974616c6963223e49545320313030202d20494e54524f20544f20434f4d50555445523c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e647366736466736466, 1, '2021-12-10 12:40:05'),
(35, '20124584212', '20124584212', 0x3c683620636c6173733d226673742d6974616c6963223e4d4f44554c453a2049545320313031202d204d4f44554c45205449544c453c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e415344415344415344, 1, '2021-12-10 12:41:57'),
(36, '20124584212', '201245842154', 0x3c683620636c6173733d226673742d6974616c6963223e4d4f44554c453a2049545320313030202d20494e54524f20544f20434f4d50555445523c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e4453465344465344465344, 1, '2021-12-10 12:42:44'),
(37, '202131842213', '20124584212', 0x3c683620636c6173733d226673742d6974616c6963223e4d4f44554c453a2050452031202d207361646173643c2f68363e3c7020636c6173733d2266772d626f6c6420746578742d757070657263617365223e52454d41524b533a3c2f703e66647366647366736466, 1, '2021-12-10 20:15:18'),
(38, '20854846487', '26465465451', 0x736466736466736466, 1, '2021-12-15 14:19:55'),
(39, '20854846487', '26465465451', 0x736466736466736466, 1, '2021-12-15 14:20:10'),
(40, '20854846487', '26465465451', 0x7366736466736466, 1, '2021-12-15 14:21:54'),
(41, '20854846487', '26465465451', 0x617364617364, 1, '2021-12-15 14:22:26'),
(42, '20854846487', '2011321123123', 0x617364617364617364, 1, '2021-12-15 14:23:24'),
(43, '26465465451', '20854846487', 0x7364617364617364, 1, '2021-12-15 14:24:19'),
(44, '20854846487', '2011321123123', 0x73736466736466, 1, '2021-12-15 14:33:36'),
(45, '20854846487', '2011321123123', 0x647366736466, 1, '2021-12-15 14:33:46'),
(46, '2011321123123', '20854846487', 0x6869, 1, '2021-12-15 21:53:43'),
(47, '2011321123123', '202131842213', 0x6869, 1, '2021-12-15 21:53:57'),
(48, '20124584212', '201245842154', 0x6466736466736466, 1, '2021-12-16 10:00:41'),
(49, '20124584212', '201245842154', 0x617364617364, 1, '2021-12-16 10:00:45'),
(50, '201245842154', '20124584212', 0x736466736466736466, 1, '2021-12-16 10:00:49'),
(51, '20124584212', '201245842154', 0x736466736466, 1, '2021-12-16 12:30:55'),
(52, '20124584212', '201245842154', 0x736466, 1, '2021-12-16 12:30:59'),
(53, '20124584212', '201245842154', 0x736466736466, 1, '2021-12-16 12:31:28'),
(54, '201245842154', '20124584212', 0x647366736466, 1, '2021-12-16 12:32:39'),
(55, '201245842154', '20124584212', 0x617364617364, 1, '2021-12-16 12:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `module_watermark` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `module_title` varchar(255) NOT NULL,
  `module_intro` varchar(255) NOT NULL,
  `module_outcomes` blob NOT NULL,
  `module_author` varchar(255) NOT NULL,
  `module_copier` varchar(255) NOT NULL,
  `module_consent` enum('Agreed','Declined') NOT NULL,
  `module_status` enum('To be Publish','Dept Head: For Approval','Dept Head: For Revision','Dean: For Approval','Dean: For Revision','Published') NOT NULL,
  `module_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_code`, `module_watermark`, `subject_id`, `module_title`, `module_intro`, `module_outcomes`, `module_author`, `module_copier`, `module_consent`, `module_status`, `module_datetime`) VALUES
(38, 'ef9dfbb3f1c3c7c806babf3bf3309cda', 'PjlVcAIxul', 1, 'Martial Peak', 'I AM THE MODULE TITLEsds', 0x3c703e4920414d20544845204d4f44554c45205449544c457364733c2f703e0d0a, '20124584212', '20124584212', 'Agreed', 'Published', '2021-12-04 07:46:01'),
(39, '92cb9fd67f761d11452ff0f82e1218c6', 'qMfyDZjVH9', 5, 'MODULE TITLE', 'MODULE INTRODUCTION', 0x3c703e4c4541524e494e47204f5554434f4d45533c2f703e0d0a, '20124584212', '20124584212', 'Declined', 'Published', '2021-12-04 08:27:18'),
(40, '939f3c53b7a159c400d9c5819bed694c', 'T6Yb9OBv6q', 4, 'INTRO TO COMPUTER', 'INTRO TO COMPUTER MODULE INTRODUCTION', 0x3c703e494e54524f20544f20434f4d5055544552204c4541524e494e47204f5554434f4d45533c2f703e0d0a, '201245842154', '201245842154', 'Agreed', 'Published', '2021-12-04 08:41:28'),
(41, '7c090c3f4a36f08d687b66def195fd6e', 'N7sj3l3Kmd', 7, 'NSTP 1', 'asdasdasd', 0x3c703e6173646173646173643c2f703e0d0a, '20124584212', '20124584212', 'Agreed', 'Published', '2021-12-07 20:42:23'),
(42, '03e4abae1f32cc4f753f587d1ddb73d1', 'xPL58itXaA', 6, 'sadasd', 'asdasd', 0x3c703e6173646173643c2f703e0d0a, '20124584212', '20124584212', 'Agreed', 'Dean: For Revision', '2021-12-07 20:43:09'),
(48, '9c973ff1383adec131750ee08ec345d6', 'PjlVcAIxul', 1, 'Martial Peak', 'I AM THE MODULE TITLEsds', 0x3c703e4920414d20544845204d4f44554c45205449544c457364733c2f703e0d0a, '20124584212', '201245842154', 'Agreed', 'Published', '2021-12-08 10:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `outlines`
--

CREATE TABLE `outlines` (
  `outline_id` int(11) NOT NULL,
  `outline_code` varchar(255) NOT NULL,
  `module_code` varchar(255) NOT NULL,
  `outline_number` int(11) NOT NULL,
  `outline_title` varchar(255) NOT NULL,
  `outline_objective` blob NOT NULL,
  `outline_content` blob NOT NULL,
  `outline_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outlines`
--

INSERT INTO `outlines` (`outline_id`, `outline_code`, `module_code`, `outline_number`, `outline_title`, `outline_objective`, `outline_content`, `outline_datetime`) VALUES
(1, 'PxcZPoZYUs1638639778', 'ef9dfbb3f1c3c7c806babf3bf3309cda', 1, 'The Great King is Me!', 0x3c703e3c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f6e6f7273752d656c636d732f75706c6f61642f6d6f64756c65732f4d6f64756c655f32303132343538343231325f313633383633393534375f6d30634f4a755a484f6a2e6a706722207374796c653d22666c6f61743a6c6566743b206865696768743a32303070783b206d617267696e3a3570783b2077696474683a323030707822202f3e3c2f703e0d0a0d0a3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c2f703e0d0a, 0x3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c2f703e0d0a, '2021-12-04 17:42:58'),
(2, 'UpQWMmLM6t1638640055', 'ef9dfbb3f1c3c7c806babf3bf3309cda', 2, 'Collectorsss', 0x3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f6e6f7273752d656c636d732f75706c6f61642f6d6f64756c65732f4d6f64756c655f32303132343538343231325f313633383633393836355f587749656d51434c6c392e6a706722207374796c653d226865696768743a34303070783b206d617267696e3a3570783b2077696474683a333230707822202f3e3c2f703e0d0a, 0x3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c2f703e0d0a, '2021-12-04 17:47:35');
INSERT INTO `outlines` (`outline_id`, `outline_code`, `module_code`, `outline_number`, `outline_title`, `outline_objective`, `outline_content`, `outline_datetime`) VALUES
(3, 'I8nIPlfK2l1638647176', 'ef9dfbb3f1c3c7c806babf3bf3309cda', 3, 'Martial Peak Chapter 5830: Jade', 0x3c703e4d61727469616c205065616b204368617074657220353833303a204a6164653c2f703e0d0a, 0x3c703e546865207661737420657870616e7365206f66266e6273703b566f69642c2074686520636f756e746c6573732061726d696573206f66207468652074776f20747269626573206f662070656f706c6520616e6420696e6b206172652072757368696e6720746f2066696768742c206f6e65206279206f6e65266e6273703b426174746c6573686970266e6273703b6372756973696e672c206f6e65206279206f6e65266e6273703b53656372657420546563686e69717565266e6273703b666c79696e6720696e2e3c2f703e0d0a0d0a3c703e54686572652069732074686520706f776572206f6620746865206576696c2073706972697420737065617220746f20626c6f6f6d2c266e6273703b626c61636b20696e6b20636c6f7564266e6273703b746f20636f766572266e6273703b566f69642c20616e64206f6e20746865206368616f746963266e6273703b626174746c656669656c642c206c69666520697320776974686572696e67206576657279206d6f6d656e742e3c2f703e0d0a0d0a3c703e41266e6273703b426174746c6573686970266e6273703b636f756c64206e6f7420776974687374616e64207468652076696f6c656e742061747461636b206f6620746865266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f7573652e205768656e266e6273703b646566656e736520666f726d6174696f6e266e6273703b7761732062726f6b656e2c2069742077617320636f6d706c6574656c7920626c6f776e2075702e204265666f726520746865266e6273703b426174746c6573686970266e6273703b62757273742c207365766572616c206669677572657320666c6577206f757420616e64206272617a656e6c792062726f6b6520696e746f2074686520656e656d792067726f75702e20546865206c617374266e6273703b72617973206f66206c69676874266e6273703b6f6620626c6f6f6d696e67206c6966652e3c2f703e0d0a0d0a3c703e5468657265206973206120706c616365207768657265266e6273703b426c61636b20496e6b20436c616e266e6273703b676174686572732c20616e6420697420697320746172676574656420627920746865207374726f6e67266e6273703b48756d616e20526163652e2041266e6273703b536563726574205472656173757265266e6273703b706f77657220636c656172732061206c617267652076616375756d20617265612e3c2f703e0d0a0d0a3c703e546869732074726167696320666967687420686173206265656e2063617272696564206f7574206d616e792074696d65732073696e636520746865266e6273703b4368692048756f266e6273703b61726d7920696e766164656420746865266e6273703b452d35266e6273703b646f6d61696e2e3c2f703e0d0a0d0a3c703e54686520776172206f6e20746865206d61696e266e6273703b626174746c656669656c64266e6273703b697320696e2066756c6c207377696e672c20616e64206265736964657320746865206d61696e266e6273703b626174746c656669656c642c20746865726520617265206d616e792064697669646564266e6273703b626174746c656669656c642e3c2f703e0d0a0d0a3c703e5468697320697320746865266e6273703b626174746c656669656c64266e6273703b746861742062656c6f6e677320746f20746865207374726f6e67657374206f66207468652074776f2067726f7570732e3c2f703e0d0a0d0a3c703e48756d616e2052616365266c7371756f3b73266e6273703b382d52616e6b2c266e6273703b486f6c79205370697269742c266e6273703b426c61636b20496e6b20436c616e266c7371756f3b73266e6273703b5465727269746f7279204c6f72642c2070736575646f266e6273703b526f79616c204c6f72642c20656163682066696768742065616368206f7468657220696e20746869732070756e6973686d656e74266e6273703b626174746c656669656c642c2066726f6d2074696d6520746f2074696d652074686572652069732074686520736f756e64206f66266e6273703b447261676f6e20526f6172266e6273703b50686f656e6978204372792c206576656e20746869732076616375756d266e6273703b566f6964204c616e64266e6273703b62656c742c2074686174206973206d6978656420776974682073757267696e6720706f7765722054686520726f6172206f6626727371756f3b732063616e20616c736f20626520636c6561726c79207472616e736d697474656420746f207468652065617273206f6620626f74682074686520656e656d7920616e64206f7572732c207368616b696e6720746865206865617274737472696e67732e3c2f703e0d0a0d0a3c703e457665727920666967687420616761696e7374266e6273703b626174746c656669656c64266e6273703b6973206669657263652e3c2f703e0d0a0d0a3c703e546865266e6273703b4368692048756f266e6273703b61726d7920646f6573206e6f74206861766520746865266e6273703b392d52616e6b2e20466163696e67207468652070736575646f266e6273703b526f79616c204c6f7264266e6273703b6f66266e6273703b426c61636b20496e6b20436c616e2c266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b63616e206f6e6c7920666f726d206120636f6e66726f6e746174696f6e2e204f6674656e206f6e652070736575646f266e6273703b526f79616c204c6f7264266e6273703b63616e20636f6e7461696e2066697665206f7220736978266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e2e3c2f703e0d0a0d0a3c703e54686572652061726520616c736f266e6273703b486f6c7920537069726974732077686f20617265207465616d696e6720757020746f20666967687420616761696e7374207468652070736575646f266e6273703b526f79616c204c6f72642e3c2f703e0d0a0d0a3c703e466f7274756e6174656c792c20746865266e6273703b48756d616e2052616365266e6273703b706172747920686173206761696e65642061206c6f742066726f6d266e6273703b556e697665727365204675726e6163652c20616e642061206c61726765206e756d626572206f66266e6273703b382d52616e6b73207765726520626f726e2c20616e64207468652046616e70696e266e6273703b4f70656e2048656176656e2050696c6c266e6273703b62726f75676874206f75742066726f6d266e6273703b556e697665727365204675726e616365266e6273703b686173206d616465266e6273703b48756d616e2052616365266e6273703b61206c61726765206e756d626572206f66266e6273703b382d52616e6b732c206f746865727769736520746865206e756d626572206f66266e6273703b382d52616e6b73206f6e20746865266e6273703b4368692048756f266e6273703b61726d79206d7573742062652064657465726d696e65642e204e6f7420656e6f75676820746f20636f6e7461696e2074686520656e656d792e3c2f703e0d0a0d0a3c703e74686973206b696e64206f66266e6273703b697320612062696720626174746c652c20616e6420746865726520617265206d616e7920666163746f727320746861742064657465726d696e652074686520766963746f7279206f72206465666561742e20416c74686f7567682074686520776172206265747765656e207468652074776f2067726f75707320686173206265656e2063617272696564206f757420666f72206120706572696f64206f66266e6273703b74696d652c20666f72207468652074696d65206265696e672c206974206973206e6f7420636c656172207768696368206973206265747465722e3c2f703e0d0a0d0a3c703e536f6d65266e6273703b626174746c656669656c64266e6273703b48756d616e2052616365266e6273703b6861732074686520616476616e746167652c2062757420696e20736f6d6520706c616365732c266e6273703b426c61636b20496e6b20436c616e266e6273703b6861732074686520616476616e746167652e20496620796f752077616e7420746f2077696e2c20697420646570656e6473206f6e20776869636820736964652063616e20657870616e6420746865736520616476616e74616765732c20726573756c74696e6720696e206120736e6f7762616c6c206566666563742e3c2f703e0d0a0d0a3c703e466f72207468652074696d65206265696e672c20686f77657665722c20626f7468266e6273703b48756d616e2052616365266e6273703b616e64266e6273703b426c61636b20496e6b20436c616e266e6273703b6c61636b20746865266e6273703b74686973206b696e64206f66266e6273703b6d65616e732e3c2f703e0d0a0d0a3c703e496e2074656e2079656172732c20746865266e6273703b4368692048756f266e6273703b61726d7920686173206861642073756368206c617267652d7363616c6520636f6e66726f6e746174696f6e7320776974682074686520656e656d79207365766572616c2074696d65732c2062757420656163682074696d65206974206661696c656420746f2074616b6520616476616e74616765206f662069742c20616e6420697420776173206e6f742061206c6f737320666f7220697473656c662e204f766572616c6c2c206974207761732061207469652e3c2f703e0d0a0d0a3c703e486f77657665722c2077697468207468652070617373616765206f66266e6273703b74696d65266e6273703b616e642074686520696e63726561736520696e20626174746c65732c2074686520736974756174696f6e20686173206265636f6d65206d6f726520616e64206d6f726520646973616476616e746167656f757320666f7220746865266e6273703b48756d616e2052616365266e6273703b736964652e3c2f703e0d0a0d0a3c703e4f6e6c79206265636175736520746865266e6273703b4368692048756f266e6273703b61726d7926727371756f3b7320726573706f6e736520746f207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b697320746f6f2064656369736976652e3c2f703e0d0a0d0a3c703e426c61636b20496e6b20436c616e26727371756f3b73206d616e792066616b65266e6273703b526f79616c204c6f726473206861766520616c77617973206265656e20612068656176792062757264656e206f6e20746865266e6273703b4368692048756f266e6273703b61726d792e20546865266e6273703b4368692048756f266e6273703b61726d792c2077686574686572206974206973266e6273703b382d52616e6b266e6273703b6f72266e6273703b486f6c79205370697269742c206973206e6f7420616e206f70706f6e656e74206f66207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b616c6f6e652c20616e642068617320746f2062652070616972656420757020746f20636f6e74656e642e3c2f703e0d0a0d0a3c703e546865206e756d626572206f662070736575646f266e6273703b526f79616c204c6f7264266e6273703b696e766573746564206279266e6273703b426c61636b20496e6b20436c616e266e6273703b696e20746865266e6273703b452d35266e6273703b646f6d61696e20697320636c6f736520746f2032302e2053756368206120706f77657266756c20666f72636520726573747261696e732061206c617267652070617274206f6620746865266e6273703b4368692048756f266e6273703b61726d7926727371756f3b7320656e657267792e3c2f703e0d0a0d0a3c703e536f20696e20726573706f6e736520746f20746865207765616b6e657373206f66266e6273703b426c61636b20496e6b20436c616e2c20696e20657665727920626174746c6520616761696e7374207468652070736575646f266e6273703b526f79616c204c6f72642c266e6273703b48756d616e205261636526727371756f3b73266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b697320746f2067697665207570206f6e6526727371756f3b73206c69666520616e6420666f7267657420746f206469652c20646f696e6720616c6c2069742063616e2c20686f6c64696e67207468652069646561206f6620e2808be2808b68757274696e6720746865206f70706f6e656e74206576656e206966207468652070736575646f266e6273703b526f79616c204c6f7264266e6273703b63616e6e6f74206265206b696c6c65642c206173206c6f6e672061732074686520656e656d792054686520616363756d756c6174656420696e6a7572696573206172652074726167696320656e6f7567682c20616e642074686572652069732061206368616e636520746f206b696c6c207468656d2e3c2f703e0d0a0d0a3c703e4173206120726573756c742c207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b6f66266e6273703b426c61636b20496e6b20436c616e266e6273703b686173206265656e20696e6a75726564206672657175656e746c792c20616e6420746865266e6273703b382d52616e6b266e6273703b6f66266e6273703b48756d616e2052616365266e6273703b68617320616c736f206265656e206b696c6c656420696e206d616e7920626174746c65732e3c2f703e0d0a0d0a3c703e496e2074656e2079656172732c207468657265207765726520616c6d6f73742074776f2068756e647265642070656f706c65206b696c6c656420696e20746865266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b756e646572207468652068616e6473206f662074686573652070736575646f2d526f79616c204c6f72647320616c6f6e652e2045616368206f66207468657365266e6273703b382d52616e6b73206469642074686569722062657374206265666f7265206479696e672c2063617573696e672074686520656e656d7920746f2073756666657220756e7265636f76657261626c6520696e6a75726965732e3c2f703e0d0a0d0a3c703e54776f2068756e64726564266e6273703b382d52616e6b266e6273703b69732061206e756d6265722074686174206973206861726420746f2069676e6f72652e204174207468652074696d652c20746865206e756d626572206f66266e6273703b382d52616e6b266e6273703b6f776e6564206279266e6273703b626c61636b20696e6b20626174746c656669656c64266e6273703b776173206f6e6c7920696e207468652068756e64726564732e3c2f703e0d0a0d0a3c703e497420697320616c736f206e6f772074686174266e6273703b48756d616e2052616365266e6273703b6261636b67726f756e64266e6273703b686173206265636f6d65206d756368207374726f6e6765722c20616e64266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b686173206265656e20626f726e206672657175656e746c7920746f20776974687374616e6420746865206c6f7373206f66266e6273703b74686973206b696e64206f662e3c2f703e0d0a0d0a3c703e48756d616e2052616365266e6273703b757365642074686973206d6574686f6420746f206669676874207468652070736575646f266e6273703b526f79616c204c6f72642c20616e64266e6273703b426c61636b20496e6b20436c616e266c7371756f3b7320726573706f6e73652077617320616c736f20766572792073696d706c652e205468652070736575646f266e6273703b526f79616c204c6f72642c20776869636820697320646966666963756c7420746f20666967687420616761696e2c207761732077697468647261776e20746f266e6273703b4e6f2d52657475726e2050617373266e6273703b666f72207265636f766572792c20616e64207468656e2074686520696e746163742070736575646f266e6273703b526f79616c204c6f7264266e6273703b776173206d6f62696c697a65642066726f6d266e6273703b4e6f2d52657475726e2050617373266e6273703b746f207265696e666f72636520746865266e6273703b452d35266e6273703b646f6d61696e207761722e3c2f703e0d0a0d0a3c703e466f722074686520706173742074656e2079656172732c20616c74686f7567682061206c61726765206e756d626572206f662066616b65266e6273703b526f79616c204c6f7264266e6273703b666163656420627920746865266e6273703b4368692048756f266e6273703b61726d792068617665206265656e20726f74617465642c20746865206e756d62657220686173206e6f74206368616e6765642e3c2f703e0d0a0d0a3c703e4e6f2d52657475726e2050617373266e6273703b7374696c6c206861732061206c61726765206e756d626572206f662066616b65266e6273703b526f79616c204c6f7264266e6273703b6f6e207374616e6462792c20627574204d616e61796120646964206e6f742070757420616c6c207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b6f6e266e6273703b626174746c656669656c642e204f6e652069732074686174266e6273703b4e6f2d52657475726e2050617373266e6273703b6e6565647320746865207374726f6e6720746f206b656570206775617264732c20616e6420746865206f7468657220697320696e74656e74696f6e616c2e3c2f703e0d0a0d0a3c703e4f6e6c7920627920646f696e6720736f2063616e2074686520706f776572206f66266e6273703b48756d616e2052616365266e6273703b626520636f6e74696e756f75736c79207765616b656e65642e3c2f703e0d0a0d0a3c703e4c696b65204d69204a696e676c756e26727371756f3b7320696465612c207468652063757272656e7420776172206265747765656e207468652070656f706c6520616e642074686520696e6b206973206e6f74206d61696e6c792061626f75742072656761696e696e67207468652062696720646f6d61696e2c206275742061626f7574206566666563746976656c79207265647563696e672074686520656e656d7926727371756f3b7320737472656e6774682e20497420697320707265636973656c792062656361757365206f662074686520636f696e636964656e6365206f66207468652074776f2073696465732c207468652077617220696e20746865266e6273703b452d35266e6273703b646f6d61696e2e2049742077696c6c2065766f6c766520736f20747261676963616c6c792e3c2f703e0d0a0d0a3c703e4368692048756f266e6273703b4561737420526f7574652041726d792c2061626f6172642061266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b6f6620746865204368696e6573652041726d792c266e6273703b4561737465726e2041726d79266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e646572266e6273703b5a756f7169752059616e676875612073697474696e67206865726520697320696e7665737469676174696e672074686520626174746c65207265706f7274732067617468657265642066726f6d20766172696f757320706c616365732c2069737375696e6720766172696f7573206f72646572732c206c6f6f6b696e6720736f6c656d6e2c2070656f706c6520636f6d696e6720616e6420676f696e6720696e20746865266e6273703b426174746c6573686970266e6273703b636f6d6d616e6420636162696e2e205468652061746d6f73706865726520697320736f6c656d6e2e3c2f703e0d0a0d0a3c703e48756d616e2052616365266e6273703b5477656c76652041726d792c20616c6c206f66207468656d20686176652068656c64266e6273703b626174746c656669656c64266e6273703b696e2061206365727461696e20706c61636520666f722074686f7573616e6473206f662079656172732c20616e6420666f7567687420616761696e7374266e6273703b426c61636b20496e6b20436c616e266e6273703b666f722074686f7573616e6473206f662079656172732e20496e2074686520657261207768656e266e6273703b392d52616e6b266e6273703b776173206e6f7420626f726e2c20616c6c207468652074726f6f707320776572652063726561746564206279205a756f7169752059616e67687561266e6273703b74686973206b696e64206f66266e6273703b7665746572616e266e6273703b382d52616e6b266e6273703b57652061726520696e20636f6e74726f6c2e3c2f703e0d0a0d0a3c703e456163682061726d79206861732061206c61726765206e756d626572206f6620736f6c64696572732e20497420697320646966666963756c7420746f20636f6e74726f6c20746865206f766572616c6c20736974756174696f6e20776974682061266e6273703b382d52616e6b266e6273703b616c6f6e652e205468657265666f72652c207468652061726d79206f6620656163682061726d79206973206469766964656420696e746f2074686520666f75722061726d79206469766973696f6e73206f6620746865266e6273703b626c61636b20696e6b20626174746c656669656c64266e6273703b6d616a6f72207061737365732c20776869636820617265206469766964656420696e746f20666f75722061726d6965732c20736f757468656173742c206e6f727468776573742c20616e64206f6e652e2054686520656e74697265206c6567696f6e2e3c2f703e0d0a0d0a3c703e416c74686f7567682074686572652061726520736f6d6520647261776261636b7320746f20746869732c2074686520666f7572266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e646572732077696c6c20616c77617973206861766520736f6d652064697361677265656d656e74732c206275742074686973206973206e6f207761792e20576974686f7574266e6273703b392d52616e6b2c2077652063616e206f6e6c792072656c79206f6e20746865206b65656e2073656e7365206f6620746865206f6c64266e6273703b382d52616e6b266e6273703b746f206d6f62696c697a65207468652061726d7920746f20636f6f7264696e617465206f7065726174696f6e732e3c2f703e0d0a0d0a3c703e466f7274756e6174656c792c2061667465722074686f7573616e6473206f66207965617273206f662072756e6e696e672d696e2c2074686520666f7572266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e64657273206f66266e6273703b4368692048756f266e6273703b6861766520616c726561647920636f6f7065726174656420636c6f73656c792c20616e64207468652077686f6c652061726d792069732072756e6e696e67206c696b65206f6e652c207665727920636c6f73652e3c2f703e0d0a0d0a3c703e4974206973207468726f75676820736f206d616e79207965617273206f6620746163697420756e6465727374616e64696e6720616e6420636f6f7065726174696f6e207468617420746865266e6273703b4368692048756f266e6273703b61726d792063616e20657865727420697473207374726f6e6765737420737472656e67746820616e6420626c6f636b207468652061747461636b206f66266e6273703b426c61636b20496e6b20436c616e266e6273703b72657065617465646c79266e6273703b776974686f7574206c657474696e672074686520656e656d792074616b6520616476616e746167652e3c2f703e0d0a0d0a3c703e447572696e6720746865207761722c2074686520736974756174696f6e206f6620736f6d65266e6273703b626174746c656669656c64266e6273703b6973206368616e67696e672072617069646c792e20496e207468652066696572636520626174746c652c2065766572796f6e65206973206f6e6c7920636f6e6365726e65642061626f757420746865206f6e652d7468697264206f66266e6273703b6f776e266c7371756f3b73206c616e642e20497420697320646966666963756c7420746f207365652074686520736974756174696f6e206f66206f74686572266e6273703b6c6f636174696f6e2f706f736974696f6e266e6273703b626174746c65732e20496e2074686973207761792c20697420697320656173792054686572652077696c6c206265206120736974756174696f6e207768657265266e6273703b6c6f636174696f6e2f706f736974696f6e266e6273703b616476616e6365732076696f6c656e746c7920616e64206f74686572266e6273703b6c6f636174696f6e2f706f736974696f6e266e6273703b636f6e74696e75657320746f206c6f73652067726f756e642c206f7220736f6d6520736f6c64696572732061726520626573696567656420616e64206e65656420746f20626520726573637565642e3c2f703e0d0a0d0a3c703e54686520736f6c6469657273206f6620746865266e6273703b4368692048756f266e6273703b61726d792063616e206f6e6c7920636f6f7264696e61746520696e746f2061207265616c2077686f6c6520756e6465722074686520636f6e7374616e74206d6f62696c697a6174696f6e206f662074686520757070657220656368656c6f6e732e3c2f703e0d0a0d0a3c703e4f6e266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c65736869702c20617320736f6f6e206173205a756f205169752059616e676875612069737375656420616e206f726465722c20616e206f62736572766572206d6f6e69746f72696e672074686520737461747573206f66266e6273703b626174746c656669656c64266e6273703b6578636c61696d65643a20266c6471756f3b4d79206c6f72642c2074686572652061726520612067726f7570206f66266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f757365732077686f2062726f6b65207468726f7567682066726f6d207468652066726f6e742e20546865206c6561646572206973266e6273703b74776f266e6273703b70736575646f266e6273703b526f79616c204c6f72642668656c6c69703b26726471756f3b204174207468652073616d652074696d652c20686520757267656420746865206d6f6e69746f72696e67266e6273703b666f726d6174696f6e266e6273703b696e2066726f6e74206f662068696d2c20616e6420717569636b6c7920636f6e6669726d656420746865206964656e74697479206f66207468652076697369746f722c2068697320766f696365207472656d626c65643a20266c6471756f3b497426727371756f3b73204a696563686920616e642048756f79752126726471756f3b3c2f703e0d0a0d0a3c703e4120636f6c64206c6967687420666c617368656420696e205a756f7169752059616e6768756126727371756f3b7320657965732c20616e642068652068756d6d65643a20266c6471756f3b4a7573742074656c6c206d6520686f772074686579206869642c20697420776173207468697320696465612126726471756f3b3c2f703e0d0a0d0a3c703e4f766572207468652079656172732c20746865266e6273703b426c61636b20496e6b20436c616e266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b68617665206265656e20696e20636f6e666c69637420776974682065616368206f746865722e20546865266e6273703b4368692048756f266e6273703b61726d79206973206e61747572616c6c7920636c6561722e20416c74686f75676820746865266e6273703b426c61636b20496e6b20436c616e266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b6c6576656c20706f776572686f7573657320617265206672657175656e746c79206d6f62696c697a65642c2074686572652061726520616c776179732061206665772070736575646f2d526f79616c204c6f7264266e6273703b77686f2068617665206265656e266e6273703b4368692048756f2e20547265617465642061732061206d616a6f7220636f6e6365726e2e3c2f703e0d0a0d0a3c703e4a69616e2043686920616e642048752059752061726520616d6f6e67207468656d266e6273703b74776f2e2054686973266e6273703b74776f266e6273703b70736575646f266e6273703b526f79616c204c6f7264266e6273703b6d6179206e6f74206265207374726f6e676572207468616e206f746865722070736575646f266e6273703b526f79616c204c6f72642c20627574206974207365656d73206d6f726520736176767920616e642068617264657220746f206465616c20776974682e3c2f703e0d0a0d0a3c703e546865204561737420526f7574652041726d792068617320666f7567687420616761696e737420746865266e6273703b74776f266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b6d616e792074696d65732c20616e64266e6273703b382d52616e6b266e6273703b68617320616c736f20666f7567687420616761696e73742069742e20546865792077616e74656420746f20776f756e64207468656d2c206275742074686579206e65766572207375636365656465642e204f6e2074686520636f6e74726172792c2074686579206c6f7374206120666577266e6273703b382d52616e6b2e3c2f703e0d0a0d0a3c703e41742074686520626567696e6e696e67206f6620746865207761722c20746865204561737420526f7574652041726d7920666f6375736564206f6e2074686520776865726561626f757473206f66207468652070736575646f266e6273703b526f79616c204c6f7264732c20627574206e6576657220666f756e6420746865207472616365206f6620746865266e6273703b74776f2c20736f207768656e2074686579206a756d706564206f757420617420746865206d6f6d656e742c205a756f7169752059616e676875612077686f207761732073697474696e67206865726520776173206e6f74266e6273703b6163636964656e74616c2f737572707269736564266e6273703b617420616c6c2e3c2f703e0d0a0d0a3c703e54686520696e74656e74696f6e206f662074686973266e6273703b74776f266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f75736520697320616c7265616479206f6276696f75732e204173206c6f6e6720617320796f75206b696c6c205a756f7169752059616e676875612c2074686520456173742041726d792077696c6c2068617665206e6f206c65616465722c206576656e2069662074686572652069732061207265706c6163656d656e742e20546f2067697665206f726465727320616e6420636f6d6d616e64266e6273703b4561737465726e2041726d792c206974206973206162736f6c7574656c7920696d706f737369626c6520746f20646f20626574746572207468616e205a756f7169752059616e676875612e3c2f703e0d0a0d0a3c703e496e2074686973207761792c266e6273703b426c61636b20496e6b20436c616e266e6273703b6861732061206368616e636520746f206f766572636f6d65266e6273703b4561737465726e2041726d792e3c2f703e0d0a0d0a3c703e74776f266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b7465616d65642075702c2073686f77696e67207468652064657465726d696e6174696f6e206f66266e6273703b426c61636b20496e6b20436c616e2c206e6f7420746f206d656e74696f6e2c207468657920616c736f2062726f7567687420612067726f7570206f66266e6273703b5465727269746f7279204c6f7264266e6273703b77697468207468656d2e3c2f703e0d0a0d0a3c703e416c6f6e672074686520726f61642c266e6273703b48756d616e2052616365266e6273703b382d52616e6b266e6273703b63616d6520746f2073746f702066726f6d2074696d6520746f2074696d652c20627574266e6273703b74776f266e6273703b70736575646f266e6273703b526f79616c204c6f7264266e6273703b646964206e6f74206c6f6f6b2061742069742c20616e6420746865206163636f6d70616e79696e67266e6273703b5465727269746f7279204c6f7264266e6273703b77656e7420746f2066696768742e3c2f703e0d0a0d0a3c703e57686572657665722068652077656e742c2074686520706f776572206f6620696e6b206f766572666c6f7765642c20636f6d62696e656420776974682074686520706f776572206f66206d616e79266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f757365732c20746f206f70656e206120626c6f6f64207061746820616d6f6e6720746865266e6273703b48756d616e2052616365266e6273703b61726d792c20616e6420676f20737472616967687420746f20746865204368696e6573652061726d79266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c65736869702e3c2f703e0d0a0d0a3c703e266c6471756f3b4d79206c6f72642c20492063616e26727371756f3b742073746f702069742e26726471756f3b20546865266e6273703b6d61727469616c20617274697374266e6273703b77686f207265706f727465642074686520736974756174696f6e206578636c61696d65642e204163636f7264696e6720746f20746865206d6f6d656e74756d206f66266e6273703b74686973206b696e64206f662c204920616d2061667261696420746861742069742077696c6c206e6f74206265206c6f6e67206265666f72652069742077696c6c2062652061626c6520746f2061747461636b2074686520636f6e76656e69656e63652e204279207468656e2c2074686520656e74697265266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b70656f706c652077696c6c206265206d6f726520617573706963696f75732e206c6573732e3c2f703e0d0a0d0a3c703e5a756f205169752059616e67687561266e6273703b636f6c646c79266e6273703b737461726564206174207468652074776f206669677572657320746861742063616d652066726f6d20616661722c206576656e2069662068697320737472656e67746820776173206e6f7420617320676f6f642061732068756d616e732c20686520646964206e6f7420776176657220617420616c6c2e2048652068656172642074686520776f72647320616e642073686f757465643a20266c6471756f3b4578656375746520746865206a61646520706c616e2126726471756f3b3c2f703e0d0a0d0a3c703e54686520736f756e642069732064656369736976652c206265796f6e6420646f7562742e3c2f703e0d0a0d0a3c703e45766572796f6e652061726f756e64207761732073746172746c65642c20736f6d652077616e74656420746f2064697373756164652c206275742074686579206469646e26727371756f3b742073617920776861742074686579207361696420746f207468656972206c6970732e204f766572207468652079656172732c20756e64657220746865206c656164657273686970206f66205a756f205169752059616e676875612c2065766572796f6e652068617320666f7567687420616761696e7374266e6273703b426c61636b20496e6b20436c616e2c206b696c6c656420636f756e746c65737320656e656d6965732c20616e64206d61646520756e706172616c6c656c65642066656174732e205a756f205169752059616e676875612054686579206861766520677265617420707265737469676520696e207468656972206865617274732c20616e642074686579206b6e6f77207468652063686172616374657220616e6420706572736f6e616c697479206f662074686973266e6273703b4561737465726e2041726d79266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e6465722e3c2f703e0d0a0d0a3c703e536f206166746572206865206761766520746865206f726465722c2074686520656e74697265266e6273703b6d61727469616c20617274697374266e6273703b6f6e266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b746f6f6b20616374696f6e2e3c2f703e0d0a0d0a3c703e536861646f77732073776570742c20616e6420746865266e6273703b426174746c6573686970266e6273703b626f617473207365706172617465642066726f6d20746865266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b6f6620746865266e6273703b68756765266e6273703b616e64206c65667420696e20616c6c20646972656374696f6e732c207768696c65205a756f205169752059616e6768756120616e64207365766572616c206f74686572266e6273703b382d52616e6b266e6273703b73746179656420626568696e642c206e6f74206f6e6c7920646964206e6f74206c656176652c206275742064656c696265726174656c79207572676564207468656972206f776e20706f7765722e3c2f703e0d0a0d0a3c703e546865206d65616e696e67206973206f6276696f75732e3c2f703e0d0a0d0a3c703e4920616d2068657265213c2f703e0d0a0d0a3c703e546865266e6273703b74776f266e6273703b426c61636b20496e6b20436c616e266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b77686f2063616d6520616c6c207468652077617920746f207468652061747461636b206f726967696e616c6c7920736177206d616e79266e6273703b426174746c6573686970266e6273703b6361727279696e67266e6273703b48756d616e2052616365266e6273703b6d61727469616c20617274697374266e6273703b6f7574206f66266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c65736869702c20616e64206d697374616b656e6c792074686f756768742074686174205a756f205169752059616e676875612068616420657363617065642e2041742074686973206d6f6d656e742c2068652066656c742068697320706f77657220616e6420696d6d6564696174656c7920736574746c656420646f776e2e3c2f703e0d0a0d0a3c703e43616e26727371756f3b742068656c702062757420736e65657220696e206d792068656172742c2074686973206973206b6e6f77696e672074686174266e6273703b6f776e266e6273703b697320626f756e6420746f206469652c20736f206c6574206f7468657220697272656c6576616e742070656f706c65206573636170652066697273743f205468657920646f6e26727371756f3b7420636172652e2054686520707572706f7365206f662074686973207472697020697320746f206b696c6c205a756f7169752059616e676875612e204173206c6f6e67206173266e6273703b4561737465726e2041726d792c20746865266e6273703b4561737465726e2041726d79266e6273703b6c65616465722c206973206b696c6c65642c266e6273703b426c61636b20496e6b20436c616e266e6273703b77696c6c20686176652074686520636f6e666964656e636520746f206465666561742074686520656e74697265266e6273703b4368692048756f266e6273703b4561737465726e2041726d792c20616e64207468656e2063616e6e6962616c697a6520746865206f746865722074687265652067726f7570732e20496e2074686973207761792c2069742063616e206361757365266e6273703b48756d616e20526163652e2054686520626967676573742064616d6167652e3c2f703e0d0a, '2021-12-04 19:46:16'),
(4, '3hlHX3EBTJ1638651451', 'ef9dfbb3f1c3c7c806babf3bf3309cda', 4, 'fsdfsdfs', 0x3c703e7364667364663c2f703e0d0a, 0x3c703e7364667364663c2f703e0d0a, '2021-12-04 20:57:31'),
(12, 'AgEHE1n1vI1638909409', '92cb9fd67f761d11452ff0f82e1218c6', 1, 'sdfsdf', 0x3c703e7364667364666173646173643c2f703e0d0a, 0x3c703e7364667364667364667364667364666173643c2f703e0d0a, '2021-12-07 20:36:49'),
(13, 'RtZx9H7XYZ1638909469', '92cb9fd67f761d11452ff0f82e1218c6', 2, 'sdfsdfdsfsdf', 0x3c703e78637863767863763c2f703e0d0a, 0x3c703e7863767863767863763c2f703e0d0a, '2021-12-07 20:37:49'),
(14, 'Q14sXUDmix1638909482', '92cb9fd67f761d11452ff0f82e1218c6', 3, 'sdfsdfdsfsdfssss', 0x3c703e78637863767863763c2f703e0d0a, 0x3c703e7863767863767863763c2f703e0d0a, '2021-12-07 20:38:02'),
(15, 'Bnj76RUped1638909534', '92cb9fd67f761d11452ff0f82e1218c6', 4, 'dfsdf', 0x3c703e7364667364663c2f703e0d0a, 0x3c703e73646673646673643c2f703e0d0a, '2021-12-07 20:38:54'),
(16, 'vocsSDdfME1638909562', '92cb9fd67f761d11452ff0f82e1218c6', 5, 'qwewqe', 0x3c703e7177657177653c2f703e0d0a, 0x3c703e77717771657177653c2f703e0d0a, '2021-12-07 20:39:22'),
(17, 'ulHttE76RL1638909976', '92cb9fd67f761d11452ff0f82e1218c6', 6, 'ez', 0x3c703e657a3c2f703e0d0a, 0x3c703e657a3c2f703e0d0a, '2021-12-07 20:46:16'),
(18, 'GPCNBoT7Ho1638910030', '939f3c53b7a159c400d9c5819bed694c', 1, 'ez', 0x3c703e657a3c2f703e0d0a, 0x3c703e657a3c2f703e0d0a, '2021-12-07 20:47:10'),
(31, 'UAu2Rm9czG1638959761', '9c973ff1383adec131750ee08ec345d6', 1, 'The Great King is Me!', 0x3c703e3c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f6e6f7273752d656c636d732f75706c6f61642f6d6f64756c65732f4d6f64756c655f32303132343538343231325f313633383633393534375f6d30634f4a755a484f6a2e6a706722207374796c653d22666c6f61743a6c6566743b206865696768743a32303070783b206d617267696e3a3570783b2077696474683a323030707822202f3e3c2f703e0d0a0d0a3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c2f703e0d0a, 0x3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c2f703e0d0a, '2021-12-08 10:36:01');
INSERT INTO `outlines` (`outline_id`, `outline_code`, `module_code`, `outline_number`, `outline_title`, `outline_objective`, `outline_content`, `outline_datetime`) VALUES
(32, 'J2zdBIqfPm1638959761', '9c973ff1383adec131750ee08ec345d6', 2, 'Collectorsss', 0x3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c696d6720616c743d2222207372633d22687474703a2f2f6c6f63616c686f73742f6e6f7273752d656c636d732f75706c6f61642f6d6f64756c65732f4d6f64756c655f32303132343538343231325f313633383633393836355f587749656d51434c6c392e6a706722207374796c653d226865696768743a34303070783b206d617267696e3a3570783b2077696474683a333230707822202f3e3c2f703e0d0a, 0x3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e0d0a0d0a3c703e3c7374726f6e673e4c6f72656d20497073756d3c2f7374726f6e673e266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e647573747279262333393b73207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f703e0d0a0d0a3c68323e57687920646f207765207573652069743f3c2f68323e0d0a0d0a3c703e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e6720262333393b436f6e74656e7420686572652c20636f6e74656e742068657265262333393b2c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220262333393b6c6f72656d20697073756d262333393b2077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e0d0a0d0a3c703e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b20285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c202671756f743b4c6f72656d20697073756d20646f6c6f722073697420616d65742e2e2671756f743b2c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f703e0d0a0d0a3c703e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202671756f743b64652046696e6962757320426f6e6f72756d206574204d616c6f72756d2671756f743b2062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f703e0d0a0d0a3c68323e57686572652063616e20492067657420736f6d653f3c2f68323e0d0a0d0a3c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e262333393b74206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f66204c6f72656d20497073756d2c20796f75206e65656420746f20626520737572652074686572652069736e262333393b7420616e797468696e6720656d62617272617373696e672068696464656e20696e20746865206d6964646c65206f6620746578742e20416c6c20746865204c6f72656d20497073756d2067656e657261746f7273206f6e2074686520496e7465726e65742074656e6420746f2072657065617420707265646566696e6564206368756e6b73206173206e65636573736172792c206d616b696e6720746869732074686520666972737420747275652067656e657261746f72206f6e2074686520496e7465726e65742e204974207573657320612064696374696f6e617279206f66206f76657220323030204c6174696e20776f7264732c20636f6d62696e6564207769746820612068616e6466756c206f66206d6f64656c2073656e74656e636520737472756374757265732c20746f2067656e6572617465204c6f72656d20497073756d207768696368206c6f6f6b7320726561736f6e61626c652e205468652067656e657261746564204c6f72656d20497073756d206973207468657265666f726520616c7761797320667265652066726f6d2072657065746974696f6e2c20696e6a65637465642068756d6f75722c206f72206e6f6e2d636861726163746572697374696320776f726473206574632e3c2f703e0d0a, '2021-12-08 10:36:01'),
(33, 'ZzbllvXC5f1638959761', '9c973ff1383adec131750ee08ec345d6', 3, 'Martial Peak Chapter 5830: Jade', 0x3c703e4d61727469616c205065616b204368617074657220353833303a204a6164653c2f703e0d0a, 0x3c703e546865207661737420657870616e7365206f66266e6273703b566f69642c2074686520636f756e746c6573732061726d696573206f66207468652074776f20747269626573206f662070656f706c6520616e6420696e6b206172652072757368696e6720746f2066696768742c206f6e65206279206f6e65266e6273703b426174746c6573686970266e6273703b6372756973696e672c206f6e65206279206f6e65266e6273703b53656372657420546563686e69717565266e6273703b666c79696e6720696e2e3c2f703e0d0a0d0a3c703e54686572652069732074686520706f776572206f6620746865206576696c2073706972697420737065617220746f20626c6f6f6d2c266e6273703b626c61636b20696e6b20636c6f7564266e6273703b746f20636f766572266e6273703b566f69642c20616e64206f6e20746865206368616f746963266e6273703b626174746c656669656c642c206c69666520697320776974686572696e67206576657279206d6f6d656e742e3c2f703e0d0a0d0a3c703e41266e6273703b426174746c6573686970266e6273703b636f756c64206e6f7420776974687374616e64207468652076696f6c656e742061747461636b206f6620746865266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f7573652e205768656e266e6273703b646566656e736520666f726d6174696f6e266e6273703b7761732062726f6b656e2c2069742077617320636f6d706c6574656c7920626c6f776e2075702e204265666f726520746865266e6273703b426174746c6573686970266e6273703b62757273742c207365766572616c206669677572657320666c6577206f757420616e64206272617a656e6c792062726f6b6520696e746f2074686520656e656d792067726f75702e20546865206c617374266e6273703b72617973206f66206c69676874266e6273703b6f6620626c6f6f6d696e67206c6966652e3c2f703e0d0a0d0a3c703e5468657265206973206120706c616365207768657265266e6273703b426c61636b20496e6b20436c616e266e6273703b676174686572732c20616e6420697420697320746172676574656420627920746865207374726f6e67266e6273703b48756d616e20526163652e2041266e6273703b536563726574205472656173757265266e6273703b706f77657220636c656172732061206c617267652076616375756d20617265612e3c2f703e0d0a0d0a3c703e546869732074726167696320666967687420686173206265656e2063617272696564206f7574206d616e792074696d65732073696e636520746865266e6273703b4368692048756f266e6273703b61726d7920696e766164656420746865266e6273703b452d35266e6273703b646f6d61696e2e3c2f703e0d0a0d0a3c703e54686520776172206f6e20746865206d61696e266e6273703b626174746c656669656c64266e6273703b697320696e2066756c6c207377696e672c20616e64206265736964657320746865206d61696e266e6273703b626174746c656669656c642c20746865726520617265206d616e792064697669646564266e6273703b626174746c656669656c642e3c2f703e0d0a0d0a3c703e5468697320697320746865266e6273703b626174746c656669656c64266e6273703b746861742062656c6f6e677320746f20746865207374726f6e67657374206f66207468652074776f2067726f7570732e3c2f703e0d0a0d0a3c703e48756d616e2052616365266c7371756f3b73266e6273703b382d52616e6b2c266e6273703b486f6c79205370697269742c266e6273703b426c61636b20496e6b20436c616e266c7371756f3b73266e6273703b5465727269746f7279204c6f72642c2070736575646f266e6273703b526f79616c204c6f72642c20656163682066696768742065616368206f7468657220696e20746869732070756e6973686d656e74266e6273703b626174746c656669656c642c2066726f6d2074696d6520746f2074696d652074686572652069732074686520736f756e64206f66266e6273703b447261676f6e20526f6172266e6273703b50686f656e6978204372792c206576656e20746869732076616375756d266e6273703b566f6964204c616e64266e6273703b62656c742c2074686174206973206d6978656420776974682073757267696e6720706f7765722054686520726f6172206f6626727371756f3b732063616e20616c736f20626520636c6561726c79207472616e736d697474656420746f207468652065617273206f6620626f74682074686520656e656d7920616e64206f7572732c207368616b696e6720746865206865617274737472696e67732e3c2f703e0d0a0d0a3c703e457665727920666967687420616761696e7374266e6273703b626174746c656669656c64266e6273703b6973206669657263652e3c2f703e0d0a0d0a3c703e546865266e6273703b4368692048756f266e6273703b61726d7920646f6573206e6f74206861766520746865266e6273703b392d52616e6b2e20466163696e67207468652070736575646f266e6273703b526f79616c204c6f7264266e6273703b6f66266e6273703b426c61636b20496e6b20436c616e2c266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b63616e206f6e6c7920666f726d206120636f6e66726f6e746174696f6e2e204f6674656e206f6e652070736575646f266e6273703b526f79616c204c6f7264266e6273703b63616e20636f6e7461696e2066697665206f7220736978266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e2e3c2f703e0d0a0d0a3c703e54686572652061726520616c736f266e6273703b486f6c7920537069726974732077686f20617265207465616d696e6720757020746f20666967687420616761696e7374207468652070736575646f266e6273703b526f79616c204c6f72642e3c2f703e0d0a0d0a3c703e466f7274756e6174656c792c20746865266e6273703b48756d616e2052616365266e6273703b706172747920686173206761696e65642061206c6f742066726f6d266e6273703b556e697665727365204675726e6163652c20616e642061206c61726765206e756d626572206f66266e6273703b382d52616e6b73207765726520626f726e2c20616e64207468652046616e70696e266e6273703b4f70656e2048656176656e2050696c6c266e6273703b62726f75676874206f75742066726f6d266e6273703b556e697665727365204675726e616365266e6273703b686173206d616465266e6273703b48756d616e2052616365266e6273703b61206c61726765206e756d626572206f66266e6273703b382d52616e6b732c206f746865727769736520746865206e756d626572206f66266e6273703b382d52616e6b73206f6e20746865266e6273703b4368692048756f266e6273703b61726d79206d7573742062652064657465726d696e65642e204e6f7420656e6f75676820746f20636f6e7461696e2074686520656e656d792e3c2f703e0d0a0d0a3c703e74686973206b696e64206f66266e6273703b697320612062696720626174746c652c20616e6420746865726520617265206d616e7920666163746f727320746861742064657465726d696e652074686520766963746f7279206f72206465666561742e20416c74686f7567682074686520776172206265747765656e207468652074776f2067726f75707320686173206265656e2063617272696564206f757420666f72206120706572696f64206f66266e6273703b74696d652c20666f72207468652074696d65206265696e672c206974206973206e6f7420636c656172207768696368206973206265747465722e3c2f703e0d0a0d0a3c703e536f6d65266e6273703b626174746c656669656c64266e6273703b48756d616e2052616365266e6273703b6861732074686520616476616e746167652c2062757420696e20736f6d6520706c616365732c266e6273703b426c61636b20496e6b20436c616e266e6273703b6861732074686520616476616e746167652e20496620796f752077616e7420746f2077696e2c20697420646570656e6473206f6e20776869636820736964652063616e20657870616e6420746865736520616476616e74616765732c20726573756c74696e6720696e206120736e6f7762616c6c206566666563742e3c2f703e0d0a0d0a3c703e466f72207468652074696d65206265696e672c20686f77657665722c20626f7468266e6273703b48756d616e2052616365266e6273703b616e64266e6273703b426c61636b20496e6b20436c616e266e6273703b6c61636b20746865266e6273703b74686973206b696e64206f66266e6273703b6d65616e732e3c2f703e0d0a0d0a3c703e496e2074656e2079656172732c20746865266e6273703b4368692048756f266e6273703b61726d7920686173206861642073756368206c617267652d7363616c6520636f6e66726f6e746174696f6e7320776974682074686520656e656d79207365766572616c2074696d65732c2062757420656163682074696d65206974206661696c656420746f2074616b6520616476616e74616765206f662069742c20616e6420697420776173206e6f742061206c6f737320666f7220697473656c662e204f766572616c6c2c206974207761732061207469652e3c2f703e0d0a0d0a3c703e486f77657665722c2077697468207468652070617373616765206f66266e6273703b74696d65266e6273703b616e642074686520696e63726561736520696e20626174746c65732c2074686520736974756174696f6e20686173206265636f6d65206d6f726520616e64206d6f726520646973616476616e746167656f757320666f7220746865266e6273703b48756d616e2052616365266e6273703b736964652e3c2f703e0d0a0d0a3c703e4f6e6c79206265636175736520746865266e6273703b4368692048756f266e6273703b61726d7926727371756f3b7320726573706f6e736520746f207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b697320746f6f2064656369736976652e3c2f703e0d0a0d0a3c703e426c61636b20496e6b20436c616e26727371756f3b73206d616e792066616b65266e6273703b526f79616c204c6f726473206861766520616c77617973206265656e20612068656176792062757264656e206f6e20746865266e6273703b4368692048756f266e6273703b61726d792e20546865266e6273703b4368692048756f266e6273703b61726d792c2077686574686572206974206973266e6273703b382d52616e6b266e6273703b6f72266e6273703b486f6c79205370697269742c206973206e6f7420616e206f70706f6e656e74206f66207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b616c6f6e652c20616e642068617320746f2062652070616972656420757020746f20636f6e74656e642e3c2f703e0d0a0d0a3c703e546865206e756d626572206f662070736575646f266e6273703b526f79616c204c6f7264266e6273703b696e766573746564206279266e6273703b426c61636b20496e6b20436c616e266e6273703b696e20746865266e6273703b452d35266e6273703b646f6d61696e20697320636c6f736520746f2032302e2053756368206120706f77657266756c20666f72636520726573747261696e732061206c617267652070617274206f6620746865266e6273703b4368692048756f266e6273703b61726d7926727371756f3b7320656e657267792e3c2f703e0d0a0d0a3c703e536f20696e20726573706f6e736520746f20746865207765616b6e657373206f66266e6273703b426c61636b20496e6b20436c616e2c20696e20657665727920626174746c6520616761696e7374207468652070736575646f266e6273703b526f79616c204c6f72642c266e6273703b48756d616e205261636526727371756f3b73266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b697320746f2067697665207570206f6e6526727371756f3b73206c69666520616e6420666f7267657420746f206469652c20646f696e6720616c6c2069742063616e2c20686f6c64696e67207468652069646561206f6620e2808be2808b68757274696e6720746865206f70706f6e656e74206576656e206966207468652070736575646f266e6273703b526f79616c204c6f7264266e6273703b63616e6e6f74206265206b696c6c65642c206173206c6f6e672061732074686520656e656d792054686520616363756d756c6174656420696e6a7572696573206172652074726167696320656e6f7567682c20616e642074686572652069732061206368616e636520746f206b696c6c207468656d2e3c2f703e0d0a0d0a3c703e4173206120726573756c742c207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b6f66266e6273703b426c61636b20496e6b20436c616e266e6273703b686173206265656e20696e6a75726564206672657175656e746c792c20616e6420746865266e6273703b382d52616e6b266e6273703b6f66266e6273703b48756d616e2052616365266e6273703b68617320616c736f206265656e206b696c6c656420696e206d616e7920626174746c65732e3c2f703e0d0a0d0a3c703e496e2074656e2079656172732c207468657265207765726520616c6d6f73742074776f2068756e647265642070656f706c65206b696c6c656420696e20746865266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b756e646572207468652068616e6473206f662074686573652070736575646f2d526f79616c204c6f72647320616c6f6e652e2045616368206f66207468657365266e6273703b382d52616e6b73206469642074686569722062657374206265666f7265206479696e672c2063617573696e672074686520656e656d7920746f2073756666657220756e7265636f76657261626c6520696e6a75726965732e3c2f703e0d0a0d0a3c703e54776f2068756e64726564266e6273703b382d52616e6b266e6273703b69732061206e756d6265722074686174206973206861726420746f2069676e6f72652e204174207468652074696d652c20746865206e756d626572206f66266e6273703b382d52616e6b266e6273703b6f776e6564206279266e6273703b626c61636b20696e6b20626174746c656669656c64266e6273703b776173206f6e6c7920696e207468652068756e64726564732e3c2f703e0d0a0d0a3c703e497420697320616c736f206e6f772074686174266e6273703b48756d616e2052616365266e6273703b6261636b67726f756e64266e6273703b686173206265636f6d65206d756368207374726f6e6765722c20616e64266e6273703b382d52616e6b266e6273703b4f70656e2048656176656e266e6273703b686173206265656e20626f726e206672657175656e746c7920746f20776974687374616e6420746865206c6f7373206f66266e6273703b74686973206b696e64206f662e3c2f703e0d0a0d0a3c703e48756d616e2052616365266e6273703b757365642074686973206d6574686f6420746f206669676874207468652070736575646f266e6273703b526f79616c204c6f72642c20616e64266e6273703b426c61636b20496e6b20436c616e266c7371756f3b7320726573706f6e73652077617320616c736f20766572792073696d706c652e205468652070736575646f266e6273703b526f79616c204c6f72642c20776869636820697320646966666963756c7420746f20666967687420616761696e2c207761732077697468647261776e20746f266e6273703b4e6f2d52657475726e2050617373266e6273703b666f72207265636f766572792c20616e64207468656e2074686520696e746163742070736575646f266e6273703b526f79616c204c6f7264266e6273703b776173206d6f62696c697a65642066726f6d266e6273703b4e6f2d52657475726e2050617373266e6273703b746f207265696e666f72636520746865266e6273703b452d35266e6273703b646f6d61696e207761722e3c2f703e0d0a0d0a3c703e466f722074686520706173742074656e2079656172732c20616c74686f7567682061206c61726765206e756d626572206f662066616b65266e6273703b526f79616c204c6f7264266e6273703b666163656420627920746865266e6273703b4368692048756f266e6273703b61726d792068617665206265656e20726f74617465642c20746865206e756d62657220686173206e6f74206368616e6765642e3c2f703e0d0a0d0a3c703e4e6f2d52657475726e2050617373266e6273703b7374696c6c206861732061206c61726765206e756d626572206f662066616b65266e6273703b526f79616c204c6f7264266e6273703b6f6e207374616e6462792c20627574204d616e61796120646964206e6f742070757420616c6c207468652066616b65266e6273703b526f79616c204c6f7264266e6273703b6f6e266e6273703b626174746c656669656c642e204f6e652069732074686174266e6273703b4e6f2d52657475726e2050617373266e6273703b6e6565647320746865207374726f6e6720746f206b656570206775617264732c20616e6420746865206f7468657220697320696e74656e74696f6e616c2e3c2f703e0d0a0d0a3c703e4f6e6c7920627920646f696e6720736f2063616e2074686520706f776572206f66266e6273703b48756d616e2052616365266e6273703b626520636f6e74696e756f75736c79207765616b656e65642e3c2f703e0d0a0d0a3c703e4c696b65204d69204a696e676c756e26727371756f3b7320696465612c207468652063757272656e7420776172206265747765656e207468652070656f706c6520616e642074686520696e6b206973206e6f74206d61696e6c792061626f75742072656761696e696e67207468652062696720646f6d61696e2c206275742061626f7574206566666563746976656c79207265647563696e672074686520656e656d7926727371756f3b7320737472656e6774682e20497420697320707265636973656c792062656361757365206f662074686520636f696e636964656e6365206f66207468652074776f2073696465732c207468652077617220696e20746865266e6273703b452d35266e6273703b646f6d61696e2e2049742077696c6c2065766f6c766520736f20747261676963616c6c792e3c2f703e0d0a0d0a3c703e4368692048756f266e6273703b4561737420526f7574652041726d792c2061626f6172642061266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b6f6620746865204368696e6573652041726d792c266e6273703b4561737465726e2041726d79266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e646572266e6273703b5a756f7169752059616e676875612073697474696e67206865726520697320696e7665737469676174696e672074686520626174746c65207265706f7274732067617468657265642066726f6d20766172696f757320706c616365732c2069737375696e6720766172696f7573206f72646572732c206c6f6f6b696e6720736f6c656d6e2c2070656f706c6520636f6d696e6720616e6420676f696e6720696e20746865266e6273703b426174746c6573686970266e6273703b636f6d6d616e6420636162696e2e205468652061746d6f73706865726520697320736f6c656d6e2e3c2f703e0d0a0d0a3c703e48756d616e2052616365266e6273703b5477656c76652041726d792c20616c6c206f66207468656d20686176652068656c64266e6273703b626174746c656669656c64266e6273703b696e2061206365727461696e20706c61636520666f722074686f7573616e6473206f662079656172732c20616e6420666f7567687420616761696e7374266e6273703b426c61636b20496e6b20436c616e266e6273703b666f722074686f7573616e6473206f662079656172732e20496e2074686520657261207768656e266e6273703b392d52616e6b266e6273703b776173206e6f7420626f726e2c20616c6c207468652074726f6f707320776572652063726561746564206279205a756f7169752059616e67687561266e6273703b74686973206b696e64206f66266e6273703b7665746572616e266e6273703b382d52616e6b266e6273703b57652061726520696e20636f6e74726f6c2e3c2f703e0d0a0d0a3c703e456163682061726d79206861732061206c61726765206e756d626572206f6620736f6c64696572732e20497420697320646966666963756c7420746f20636f6e74726f6c20746865206f766572616c6c20736974756174696f6e20776974682061266e6273703b382d52616e6b266e6273703b616c6f6e652e205468657265666f72652c207468652061726d79206f6620656163682061726d79206973206469766964656420696e746f2074686520666f75722061726d79206469766973696f6e73206f6620746865266e6273703b626c61636b20696e6b20626174746c656669656c64266e6273703b6d616a6f72207061737365732c20776869636820617265206469766964656420696e746f20666f75722061726d6965732c20736f757468656173742c206e6f727468776573742c20616e64206f6e652e2054686520656e74697265206c6567696f6e2e3c2f703e0d0a0d0a3c703e416c74686f7567682074686572652061726520736f6d6520647261776261636b7320746f20746869732c2074686520666f7572266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e646572732077696c6c20616c77617973206861766520736f6d652064697361677265656d656e74732c206275742074686973206973206e6f207761792e20576974686f7574266e6273703b392d52616e6b2c2077652063616e206f6e6c792072656c79206f6e20746865206b65656e2073656e7365206f6620746865206f6c64266e6273703b382d52616e6b266e6273703b746f206d6f62696c697a65207468652061726d7920746f20636f6f7264696e617465206f7065726174696f6e732e3c2f703e0d0a0d0a3c703e466f7274756e6174656c792c2061667465722074686f7573616e6473206f66207965617273206f662072756e6e696e672d696e2c2074686520666f7572266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e64657273206f66266e6273703b4368692048756f266e6273703b6861766520616c726561647920636f6f7065726174656420636c6f73656c792c20616e64207468652077686f6c652061726d792069732072756e6e696e67206c696b65206f6e652c207665727920636c6f73652e3c2f703e0d0a0d0a3c703e4974206973207468726f75676820736f206d616e79207965617273206f6620746163697420756e6465727374616e64696e6720616e6420636f6f7065726174696f6e207468617420746865266e6273703b4368692048756f266e6273703b61726d792063616e20657865727420697473207374726f6e6765737420737472656e67746820616e6420626c6f636b207468652061747461636b206f66266e6273703b426c61636b20496e6b20436c616e266e6273703b72657065617465646c79266e6273703b776974686f7574206c657474696e672074686520656e656d792074616b6520616476616e746167652e3c2f703e0d0a0d0a3c703e447572696e6720746865207761722c2074686520736974756174696f6e206f6620736f6d65266e6273703b626174746c656669656c64266e6273703b6973206368616e67696e672072617069646c792e20496e207468652066696572636520626174746c652c2065766572796f6e65206973206f6e6c7920636f6e6365726e65642061626f757420746865206f6e652d7468697264206f66266e6273703b6f776e266c7371756f3b73206c616e642e20497420697320646966666963756c7420746f207365652074686520736974756174696f6e206f66206f74686572266e6273703b6c6f636174696f6e2f706f736974696f6e266e6273703b626174746c65732e20496e2074686973207761792c20697420697320656173792054686572652077696c6c206265206120736974756174696f6e207768657265266e6273703b6c6f636174696f6e2f706f736974696f6e266e6273703b616476616e6365732076696f6c656e746c7920616e64206f74686572266e6273703b6c6f636174696f6e2f706f736974696f6e266e6273703b636f6e74696e75657320746f206c6f73652067726f756e642c206f7220736f6d6520736f6c64696572732061726520626573696567656420616e64206e65656420746f20626520726573637565642e3c2f703e0d0a0d0a3c703e54686520736f6c6469657273206f6620746865266e6273703b4368692048756f266e6273703b61726d792063616e206f6e6c7920636f6f7264696e61746520696e746f2061207265616c2077686f6c6520756e6465722074686520636f6e7374616e74206d6f62696c697a6174696f6e206f662074686520757070657220656368656c6f6e732e3c2f703e0d0a0d0a3c703e4f6e266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c65736869702c20617320736f6f6e206173205a756f205169752059616e676875612069737375656420616e206f726465722c20616e206f62736572766572206d6f6e69746f72696e672074686520737461747573206f66266e6273703b626174746c656669656c64266e6273703b6578636c61696d65643a20266c6471756f3b4d79206c6f72642c2074686572652061726520612067726f7570206f66266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f757365732077686f2062726f6b65207468726f7567682066726f6d207468652066726f6e742e20546865206c6561646572206973266e6273703b74776f266e6273703b70736575646f266e6273703b526f79616c204c6f72642668656c6c69703b26726471756f3b204174207468652073616d652074696d652c20686520757267656420746865206d6f6e69746f72696e67266e6273703b666f726d6174696f6e266e6273703b696e2066726f6e74206f662068696d2c20616e6420717569636b6c7920636f6e6669726d656420746865206964656e74697479206f66207468652076697369746f722c2068697320766f696365207472656d626c65643a20266c6471756f3b497426727371756f3b73204a696563686920616e642048756f79752126726471756f3b3c2f703e0d0a0d0a3c703e4120636f6c64206c6967687420666c617368656420696e205a756f7169752059616e6768756126727371756f3b7320657965732c20616e642068652068756d6d65643a20266c6471756f3b4a7573742074656c6c206d6520686f772074686579206869642c20697420776173207468697320696465612126726471756f3b3c2f703e0d0a0d0a3c703e4f766572207468652079656172732c20746865266e6273703b426c61636b20496e6b20436c616e266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b68617665206265656e20696e20636f6e666c69637420776974682065616368206f746865722e20546865266e6273703b4368692048756f266e6273703b61726d79206973206e61747572616c6c7920636c6561722e20416c74686f75676820746865266e6273703b426c61636b20496e6b20436c616e266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b6c6576656c20706f776572686f7573657320617265206672657175656e746c79206d6f62696c697a65642c2074686572652061726520616c776179732061206665772070736575646f2d526f79616c204c6f7264266e6273703b77686f2068617665206265656e266e6273703b4368692048756f2e20547265617465642061732061206d616a6f7220636f6e6365726e2e3c2f703e0d0a0d0a3c703e4a69616e2043686920616e642048752059752061726520616d6f6e67207468656d266e6273703b74776f2e2054686973266e6273703b74776f266e6273703b70736575646f266e6273703b526f79616c204c6f7264266e6273703b6d6179206e6f74206265207374726f6e676572207468616e206f746865722070736575646f266e6273703b526f79616c204c6f72642c20627574206974207365656d73206d6f726520736176767920616e642068617264657220746f206465616c20776974682e3c2f703e0d0a0d0a3c703e546865204561737420526f7574652041726d792068617320666f7567687420616761696e737420746865266e6273703b74776f266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b6d616e792074696d65732c20616e64266e6273703b382d52616e6b266e6273703b68617320616c736f20666f7567687420616761696e73742069742e20546865792077616e74656420746f20776f756e64207468656d2c206275742074686579206e65766572207375636365656465642e204f6e2074686520636f6e74726172792c2074686579206c6f7374206120666577266e6273703b382d52616e6b2e3c2f703e0d0a0d0a3c703e41742074686520626567696e6e696e67206f6620746865207761722c20746865204561737420526f7574652041726d7920666f6375736564206f6e2074686520776865726561626f757473206f66207468652070736575646f266e6273703b526f79616c204c6f7264732c20627574206e6576657220666f756e6420746865207472616365206f6620746865266e6273703b74776f2c20736f207768656e2074686579206a756d706564206f757420617420746865206d6f6d656e742c205a756f7169752059616e676875612077686f207761732073697474696e67206865726520776173206e6f74266e6273703b6163636964656e74616c2f737572707269736564266e6273703b617420616c6c2e3c2f703e0d0a0d0a3c703e54686520696e74656e74696f6e206f662074686973266e6273703b74776f266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f75736520697320616c7265616479206f6276696f75732e204173206c6f6e6720617320796f75206b696c6c205a756f7169752059616e676875612c2074686520456173742041726d792077696c6c2068617665206e6f206c65616465722c206576656e2069662074686572652069732061207265706c6163656d656e742e20546f2067697665206f726465727320616e6420636f6d6d616e64266e6273703b4561737465726e2041726d792c206974206973206162736f6c7574656c7920696d706f737369626c6520746f20646f20626574746572207468616e205a756f7169752059616e676875612e3c2f703e0d0a0d0a3c703e496e2074686973207761792c266e6273703b426c61636b20496e6b20436c616e266e6273703b6861732061206368616e636520746f206f766572636f6d65266e6273703b4561737465726e2041726d792e3c2f703e0d0a0d0a3c703e74776f266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b7465616d65642075702c2073686f77696e67207468652064657465726d696e6174696f6e206f66266e6273703b426c61636b20496e6b20436c616e2c206e6f7420746f206d656e74696f6e2c207468657920616c736f2062726f7567687420612067726f7570206f66266e6273703b5465727269746f7279204c6f7264266e6273703b77697468207468656d2e3c2f703e0d0a0d0a3c703e416c6f6e672074686520726f61642c266e6273703b48756d616e2052616365266e6273703b382d52616e6b266e6273703b63616d6520746f2073746f702066726f6d2074696d6520746f2074696d652c20627574266e6273703b74776f266e6273703b70736575646f266e6273703b526f79616c204c6f7264266e6273703b646964206e6f74206c6f6f6b2061742069742c20616e6420746865206163636f6d70616e79696e67266e6273703b5465727269746f7279204c6f7264266e6273703b77656e7420746f2066696768742e3c2f703e0d0a0d0a3c703e57686572657665722068652077656e742c2074686520706f776572206f6620696e6b206f766572666c6f7765642c20636f6d62696e656420776974682074686520706f776572206f66206d616e79266e6273703b426c61636b20496e6b20436c616e266e6273703b706f776572686f757365732c20746f206f70656e206120626c6f6f64207061746820616d6f6e6720746865266e6273703b48756d616e2052616365266e6273703b61726d792c20616e6420676f20737472616967687420746f20746865204368696e6573652061726d79266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c65736869702e3c2f703e0d0a0d0a3c703e266c6471756f3b4d79206c6f72642c20492063616e26727371756f3b742073746f702069742e26726471756f3b20546865266e6273703b6d61727469616c20617274697374266e6273703b77686f207265706f727465642074686520736974756174696f6e206578636c61696d65642e204163636f7264696e6720746f20746865206d6f6d656e74756d206f66266e6273703b74686973206b696e64206f662c204920616d2061667261696420746861742069742077696c6c206e6f74206265206c6f6e67206265666f72652069742077696c6c2062652061626c6520746f2061747461636b2074686520636f6e76656e69656e63652e204279207468656e2c2074686520656e74697265266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b70656f706c652077696c6c206265206d6f726520617573706963696f75732e206c6573732e3c2f703e0d0a0d0a3c703e5a756f205169752059616e67687561266e6273703b636f6c646c79266e6273703b737461726564206174207468652074776f206669677572657320746861742063616d652066726f6d20616661722c206576656e2069662068697320737472656e67746820776173206e6f7420617320676f6f642061732068756d616e732c20686520646964206e6f7420776176657220617420616c6c2e2048652068656172642074686520776f72647320616e642073686f757465643a20266c6471756f3b4578656375746520746865206a61646520706c616e2126726471756f3b3c2f703e0d0a0d0a3c703e54686520736f756e642069732064656369736976652c206265796f6e6420646f7562742e3c2f703e0d0a0d0a3c703e45766572796f6e652061726f756e64207761732073746172746c65642c20736f6d652077616e74656420746f2064697373756164652c206275742074686579206469646e26727371756f3b742073617920776861742074686579207361696420746f207468656972206c6970732e204f766572207468652079656172732c20756e64657220746865206c656164657273686970206f66205a756f205169752059616e676875612c2065766572796f6e652068617320666f7567687420616761696e7374266e6273703b426c61636b20496e6b20436c616e2c206b696c6c656420636f756e746c65737320656e656d6965732c20616e64206d61646520756e706172616c6c656c65642066656174732e205a756f205169752059616e676875612054686579206861766520677265617420707265737469676520696e207468656972206865617274732c20616e642074686579206b6e6f77207468652063686172616374657220616e6420706572736f6e616c697479206f662074686973266e6273703b4561737465726e2041726d79266e6273703b526567696d656e7426727371756f3b7320436f6d6d616e6465722e3c2f703e0d0a0d0a3c703e536f206166746572206865206761766520746865206f726465722c2074686520656e74697265266e6273703b6d61727469616c20617274697374266e6273703b6f6e266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b746f6f6b20616374696f6e2e3c2f703e0d0a0d0a3c703e536861646f77732073776570742c20616e6420746865266e6273703b426174746c6573686970266e6273703b626f617473207365706172617465642066726f6d20746865266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c6573686970266e6273703b6f6620746865266e6273703b68756765266e6273703b616e64206c65667420696e20616c6c20646972656374696f6e732c207768696c65205a756f205169752059616e6768756120616e64207365766572616c206f74686572266e6273703b382d52616e6b266e6273703b73746179656420626568696e642c206e6f74206f6e6c7920646964206e6f74206c656176652c206275742064656c696265726174656c79207572676564207468656972206f776e20706f7765722e3c2f703e0d0a0d0a3c703e546865206d65616e696e67206973206f6276696f75732e3c2f703e0d0a0d0a3c703e4920616d2068657265213c2f703e0d0a0d0a3c703e546865266e6273703b74776f266e6273703b426c61636b20496e6b20436c616e266e6273703b70736575646f2d526f79616c204c6f7264266e6273703b77686f2063616d6520616c6c207468652077617920746f207468652061747461636b206f726967696e616c6c7920736177206d616e79266e6273703b426174746c6573686970266e6273703b6361727279696e67266e6273703b48756d616e2052616365266e6273703b6d61727469616c20617274697374266e6273703b6f7574206f66266e6273703b457870656c6c696e6720426c61636b20496e6b20426174746c65736869702c20616e64206d697374616b656e6c792074686f756768742074686174205a756f205169752059616e676875612068616420657363617065642e2041742074686973206d6f6d656e742c2068652066656c742068697320706f77657220616e6420696d6d6564696174656c7920736574746c656420646f776e2e3c2f703e0d0a0d0a3c703e43616e26727371756f3b742068656c702062757420736e65657220696e206d792068656172742c2074686973206973206b6e6f77696e672074686174266e6273703b6f776e266e6273703b697320626f756e6420746f206469652c20736f206c6574206f7468657220697272656c6576616e742070656f706c65206573636170652066697273743f205468657920646f6e26727371756f3b7420636172652e2054686520707572706f7365206f662074686973207472697020697320746f206b696c6c205a756f7169752059616e676875612e204173206c6f6e67206173266e6273703b4561737465726e2041726d792c20746865266e6273703b4561737465726e2041726d79266e6273703b6c65616465722c206973206b696c6c65642c266e6273703b426c61636b20496e6b20436c616e266e6273703b77696c6c20686176652074686520636f6e666964656e636520746f206465666561742074686520656e74697265266e6273703b4368692048756f266e6273703b4561737465726e2041726d792c20616e64207468656e2063616e6e6962616c697a6520746865206f746865722074687265652067726f7570732e20496e2074686973207761792c2069742063616e206361757365266e6273703b48756d616e20526163652e2054686520626967676573742064616d6167652e3c2f703e0d0a, '2021-12-08 10:36:01'),
(34, 'LeMx9aiF9C1638959761', '9c973ff1383adec131750ee08ec345d6', 4, 'fsdfsdfs', 0x3c703e7364667364663c2f703e0d0a, 0x3c703e7364667364663c2f703e0d0a, '2021-12-08 10:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `post_content` varchar(255) DEFAULT NULL,
  `post_filename` varchar(255) DEFAULT NULL,
  `post_filepath` varchar(255) DEFAULT NULL,
  `post_filenamedb` varchar(255) DEFAULT NULL,
  `post_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_status` enum('Publish','Hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_code`, `account_unique`, `post_content`, `post_filename`, `post_filepath`, `post_filenamedb`, `post_datetime`, `post_status`) VALUES
(5, '060779ddcd7ce3d421e7436d4b1d03a5', '201245842154', '', '3.jpg', '/upload/users/posts/images/', 'Post-Img_201245842154_1638910498_060779ddcd7ce3d421e7436d4b1d03a5_3.jpg', '2021-12-07 20:54:58', 'Publish'),
(6, 'cee67038c56d79ef8e60f4c43ac99e46', '20124584212', '', '201102740-2021-2022-first.pdf', '/upload/users/posts/documents/', 'Post-File_20124584212_1638911059-cee67038c56d79ef8e60f4c43ac99e46_201102740-2021-2022-first.pdf', '2021-12-07 21:04:19', 'Publish'),
(7, '104a615805a5380a525cdb8d6144b7f9', '20124584212', '', 'Organic-Native-Chicken-Farming-System-Training-2.docx', '/upload/users/posts/documents/', 'Post-File_20124584212_1638911077-104a615805a5380a525cdb8d6144b7f9_Organic-Native-Chicken-Farming-System-Training-2.docx', '2021-12-07 21:04:37', 'Publish'),
(8, 'd1a093163c830e3b631ddfbeaafdc9ea', '20124584212', '', 'NFST-INPUT-CONCOCTION.pptx', '/upload/users/posts/documents/', 'Post-File_20124584212_1638911096-d1a093163c830e3b631ddfbeaafdc9ea_NFST-INPUT-CONCOCTION.pptx', '2021-12-07 21:04:56', 'Publish'),
(9, '8d8be15249567cdd0a0a6ac027b6a4d1', '20124584212', '', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY.xlsx', '/upload/users/posts/documents/', 'Post-File_20124584212_1638911118-8d8be15249567cdd0a0a6ac027b6a4d1_BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY.xlsx', '2021-12-07 21:05:18', 'Publish'),
(10, '874f947bde54074851fb32ba03158bd4', '202131842213', '', '1.jpg', '/upload/users/posts/images/', 'Post-Img_202131842213_1638911221_874f947bde54074851fb32ba03158bd4_1.jpg', '2021-12-07 21:07:01', 'Publish'),
(25, '752b61ebd6772bdfe9d5b12769e5282f', '2011321123123', 'sdfsdf', '', '', '', '2021-12-15 22:58:19', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `profilecovers`
--

CREATE TABLE `profilecovers` (
  `profilecover_id` int(11) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `profilecover_name` varchar(255) NOT NULL,
  `profilecover_caption` varchar(255) DEFAULT NULL,
  `profilecover_path` varchar(255) NOT NULL,
  `profilecover_filename` varchar(255) NOT NULL,
  `profilecover_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `profilecover_status` enum('Current','Previous') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profilecovers`
--

INSERT INTO `profilecovers` (`profilecover_id`, `account_unique`, `profilecover_name`, `profilecover_caption`, `profilecover_path`, `profilecover_filename`, `profilecover_datetime`, `profilecover_status`) VALUES
(1, '20113215542', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-01 14:02:36', 'Current'),
(2, '201245842154', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-01 14:16:50', 'Current'),
(3, '20124584212', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-01 16:08:10', 'Previous'),
(4, '202131842213', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-02 10:24:12', 'Current'),
(5, '2011321123123', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-04 21:25:53', 'Previous'),
(6, '20854846487', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-11 11:39:36', 'Current'),
(7, '26465465451', 'norsu_banner.png', NULL, '/assets/images/icons/', 'norsu_banner.png', '2021-12-12 10:02:18', 'Current'),
(17, '2011321123123', 'TBcNHravKt.png', NULL, '/upload/users/profile_cover/', 'PC_2011321123123_1639487721.png', '2021-12-14 13:15:21', 'Previous'),
(18, '2011321123123', 'tO7cFbgazY.png', NULL, '/upload/users/profile_cover/', 'PC_2011321123123_1639487736.png', '2021-12-14 13:15:36', 'Current'),
(19, '20124584212', 'ptmavn3sFk.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639523611.png', '2021-12-14 23:13:31', 'Previous'),
(20, '20124584212', 'jzQqZtF8ov.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524316.png', '2021-12-14 23:25:16', 'Previous'),
(21, '20124584212', 'a0Sm7QsynX.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524465.png', '2021-12-14 23:27:45', 'Previous'),
(22, '20124584212', 'huct7aLuvo.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524533.png', '2021-12-14 23:28:54', 'Previous'),
(23, '20124584212', 'sz05ACHynR.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524735.png', '2021-12-14 23:32:15', 'Previous'),
(24, '20124584212', 'BzbKI48jeo.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524787.png', '2021-12-14 23:33:07', 'Previous'),
(25, '20124584212', 'B5GdEGyEjj.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524858.png', '2021-12-14 23:34:18', 'Previous'),
(26, '20124584212', 'TBrDZ3hjre.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524944.png', '2021-12-14 23:35:44', 'Previous'),
(27, '20124584212', 'P08iH7Et0s.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639524988.png', '2021-12-14 23:36:28', 'Previous'),
(28, '20124584212', '5u1445Q05j.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639525057.png', '2021-12-14 23:37:37', 'Previous'),
(29, '20124584212', 'wwMrIUiohp.png', NULL, '/upload/users/profile_cover/', 'PC_20124584212_1639525887.png', '2021-12-14 23:51:27', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `profilephotos`
--

CREATE TABLE `profilephotos` (
  `profilephoto_id` int(11) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `profilephoto_name` varchar(255) NOT NULL,
  `profilephoto_caption` varchar(255) DEFAULT NULL,
  `profilephoto_path` varchar(255) NOT NULL,
  `profilephoto_filename` varchar(255) NOT NULL,
  `profilephoto_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `profilephoto_status` enum('Current','Previous') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profilephotos`
--

INSERT INTO `profilephotos` (`profilephoto_id`, `account_unique`, `profilephoto_name`, `profilephoto_caption`, `profilephoto_path`, `profilephoto_filename`, `profilephoto_datetime`, `profilephoto_status`) VALUES
(1, '20113215542', 'male_user.svg', NULL, '/assets/images/icons/', 'male_user.svg', '2021-12-01 14:05:18', 'Current'),
(2, '201245842154', 'male_user.svg', NULL, '/assets/images/icons/', 'male_user.svg', '2021-12-01 14:16:50', 'Current'),
(3, '20124584212', 'female_user.svg', NULL, '/assets/images/icons/', 'female_user.svg', '2021-12-01 16:08:10', 'Previous'),
(4, '202131842213', 'male_user.svg', NULL, '/assets/images/icons/', 'male_user.svg', '2021-12-02 10:24:13', 'Current'),
(5, '2011321123123', 'female_user.svg', NULL, '/assets/images/icons/', 'female_user.svg', '2021-12-04 21:25:53', 'Previous'),
(6, '20854846487', 'female_user.svg', NULL, '/assets/images/icons/', 'female_user.svg', '2021-12-11 11:39:36', 'Current'),
(7, '26465465451', 'female_user.svg', NULL, '/assets/images/icons/', 'female_user.svg', '2021-12-12 10:02:18', 'Current'),
(13, '2011321123123', 'RCCgfTwGPW.png', NULL, '/upload/users/profile_photo/', 'PP_2011321123123_1639486077.png', '2021-12-14 12:47:57', 'Previous'),
(14, '2011321123123', '3yiybTxwfC.png', NULL, '/upload/users/profile_photo/', 'PP_2011321123123_1639487082.png', '2021-12-14 13:04:42', 'Previous'),
(15, '2011321123123', 'pTT8w0eSwJ.png', NULL, '/upload/users/profile_photo/', 'PP_2011321123123_1639487625.png', '2021-12-14 13:13:45', 'Current'),
(16, '20124584212', 'lTxHgLisXA.png', NULL, '/upload/users/profile_photo/', 'PP_20124584212_1639523691.png', '2021-12-14 23:14:51', 'Previous'),
(17, '20124584212', 'ibRRudpKID.png', NULL, '/upload/users/profile_photo/', 'PP_20124584212_1639524911.png', '2021-12-14 23:35:11', 'Previous'),
(18, '20124584212', 'qbt5h5oret.png', NULL, '/upload/users/profile_photo/', 'PP_20124584212_1639525048.png', '2021-12-14 23:37:28', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `schoolyear_id` int(11) NOT NULL,
  `schoolyear_name` varchar(255) NOT NULL,
  `schoolyear_start` varchar(255) NOT NULL,
  `schoolyear_end` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`schoolyear_id`, `schoolyear_name`, `schoolyear_start`, `schoolyear_end`) VALUES
(1, 'SY 2020-2021', '2020', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semester_id`, `semester_name`) VALUES
(1, 'First Semester'),
(2, 'Second Semester'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_code`, `subject_title`) VALUES
(1, 'GE 4', 'Mathematics in the Modem World'),
(2, 'GE 5', 'Purposive Communication'),
(3, 'GE 6', 'Art Appreciation'),
(4, 'ITS 100', 'Introduction to Computing'),
(5, 'ITS 101', 'Computer Programming I'),
(6, 'PE 1', 'Physical Education I'),
(7, 'NSTP 1', 'National Service Training Program I'),
(8, 'GE 1', 'Understanding the Self'),
(9, 'ITS 201', 'Systems Integration &amp; Architecture'),
(10, 'CAPSTONE 1', 'CAPSTONE 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `account_unique` varchar(255) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `major_id` int(11) DEFAULT NULL,
  `user_facebook` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `user_twitter` varchar(255) DEFAULT NULL,
  `tw_link` varchar(255) DEFAULT NULL,
  `user_instagram` varchar(255) DEFAULT NULL,
  `ig_link` varchar(255) DEFAULT NULL,
  `user_youtube` varchar(255) DEFAULT NULL,
  `yt_link` varchar(255) DEFAULT NULL,
  `user_aboutme` varchar(255) DEFAULT NULL,
  `user_othername` varchar(255) DEFAULT NULL,
  `user_namepronounce` varchar(255) DEFAULT NULL,
  `user_favequotes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_unique`, `college_id`, `department_id`, `course_id`, `major_id`, `user_facebook`, `fb_link`, `user_twitter`, `tw_link`, `user_instagram`, `ig_link`, `user_youtube`, `yt_link`, `user_aboutme`, `user_othername`, `user_namepronounce`, `user_favequotes`) VALUES
(1, '20113215542', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '201245842154', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '20124584212', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdasdasd', '', '', ''),
(4, '202131842213', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2011321123123', 2, NULL, 10, NULL, 'ezmichaely', 'https://www.facebook.com/ezmichaely/', '', '', '', '', '', '', 'asdasdasdasd', NULL, NULL, NULL),
(6, '20854846487', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '26465465451', 1, NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdasdadsadas', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_unique` (`account_unique`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `atypes`
--
ALTER TABLE `atypes`
  ADD PRIMARY KEY (`atype_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_code` (`class_code`);

--
-- Indexes for table `classmembers`
--
ALTER TABLE `classmembers`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `loadslips`
--
ALTER TABLE `loadslips`
  ADD PRIMARY KEY (`loadslip_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD UNIQUE KEY `module_code` (`module_code`);

--
-- Indexes for table `outlines`
--
ALTER TABLE `outlines`
  ADD PRIMARY KEY (`outline_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_code` (`post_code`);

--
-- Indexes for table `profilecovers`
--
ALTER TABLE `profilecovers`
  ADD PRIMARY KEY (`profilecover_id`);

--
-- Indexes for table `profilephotos`
--
ALTER TABLE `profilephotos`
  ADD PRIMARY KEY (`profilephoto_id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`schoolyear_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atypes`
--
ALTER TABLE `atypes`
  MODIFY `atype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classmembers`
--
ALTER TABLE `classmembers`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `loadslips`
--
ALTER TABLE `loadslips`
  MODIFY `loadslip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `outlines`
--
ALTER TABLE `outlines`
  MODIFY `outline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profilecovers`
--
ALTER TABLE `profilecovers`
  MODIFY `profilecover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `profilephotos`
--
ALTER TABLE `profilephotos`
  MODIFY `profilephoto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `schoolyear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
