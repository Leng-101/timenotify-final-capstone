-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 10:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time_notify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'studenttrackingadmin', 'studenttrackingadmin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(250) NOT NULL,
  `studnum` text NOT NULL,
  `qr_img` longtext NOT NULL,
  `picture` longtext NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` text NOT NULL,
  `sex` varchar(10) NOT NULL,
  `grade_year` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `department` varchar(150) NOT NULL,
  `teacher_prof` varchar(150) NOT NULL,
  `g_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `studnum`, `qr_img`, `picture`, `lastname`, `middlename`, `firstname`, `fullname`, `age`, `sex`, `grade_year`, `strand`, `course`, `section`, `department`, `teacher_prof`, `g_email`) VALUES
(18, '2023456', 'Reposo 2023456.png', 'reposopau.jpg', 'Reposo', 'Aquisay', 'Paulene', 'Reposo Paulene Aquisay', '20', 'Female', '4th year', 'None-College', 'Bachelor of Physical Education', '1', 'College', 'Ms. Camille Endaya', 'faraf57771@armablog.com'),
(19, '2034567', 'Bette 2034567.png', 'bettejosephine.jpg', 'Bette', 'Ramirez', 'Josephine', 'Bette Josephine Ramirez', '21', 'Male', '4th year', 'None-College', 'Bachelor of Science in Computer Science', '1', 'College', 'Ms. Camille Endaya', 'josephinevenesbette@gmail.com'),
(20, '2045678', 'Almodiel 2045678.png', 'almodielrenalyn.jpg', 'Almodiel', 'Dellosa', 'Renalyn', 'Almodiel Renalyn Dellosa', '22', 'Female', '4th year', 'None-College', 'Bachelor of Science in Information Technology', '1', 'College', 'Ms. Camille Endaya', 'bevemed160@bikedid.com'),
(21, '2012345', 'Paja 2012345.png', 'pajajei.jpg', 'Paja', 'Cerdon', 'Jeisamae', 'Paja Jeisamae Cerdon', '21', 'Female', '4th year', 'None-College', 'Bachelor of Science in Nursing', '1', 'College', 'Ms. Ava Valenzuela', 'hagizeto@afia.pro'),
(32, '1800876', 'Castriciones 1800876.png', 'GradeStud.jpg', 'Castriciones', 'Dellosa', 'Precious Lara May', 'Castriciones Precious Lara May Dellosa', '10', 'Female', 'Grade 5', 'None-Grade School', 'None-Grade School', '4', 'Grade School', 'Ms. Lea Balirano', 'wadyda@lyft.live'),
(33, '20117631', 'Swift 20117631.png', 'Prince.jpg', 'Swift', 'Taylor', 'Prince Jhon', 'Swift Prince Jhon Taylor', '14', 'Male', 'Grade 9', 'None-JHS', 'None-JHS', '5', 'Junior High', 'Mr. Axel Wyatt', 'wadyda@lyft.live'),
(34, '2000671', 'Perez 2000671.png', 'JHS.jpg', 'Perez', 'Miliana', 'Kylie anne', 'Perez Kylie anne Miliana', '11', 'Female', 'Grade 7', 'None-JHS', 'None-JHS', '2', 'Junior High', 'Mrs. Angelica Dela Cruz', 'wadyda@lyft.live'),
(35, '2300871', 'Marquez 2300871.png', 'SHS.jpg', 'Marquez', 'Uy', 'Jerico', 'Marquez Jerico Uy', '17', 'Male', 'Grade 11', 'ICT', 'None-SHS', '5', 'Senior High', 'Mrs. Clint Homer', 'wadyda@lyft.live'),
(36, '1900871', 'Delana 1900871.png', 'SHS (2).jpg', 'Delana', 'Luna', 'Riri', 'Delana Riri Luna', '18', 'Female', 'Grade 12', 'ABM', 'None-SHS', '2', 'Senior High', 'Mr. Michael Lopez', 'wadyda@lyft.live');

-- --------------------------------------------------------

--
-- Table structure for table `student_code_records`
--

CREATE TABLE `student_code_records` (
  `id` int(11) NOT NULL,
  `sg_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `stat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_code_records`
--

INSERT INTO `student_code_records` (`id`, `sg_id`, `code`, `stat`) VALUES
(1, 0, 86633, ''),
(2, 0, 42756, ''),
(3, 0, 41947, ''),
(4, 0, 95182, ''),
(5, 0, 77617, ''),
(6, 0, 93693, ''),
(7, 0, 29875, ''),
(8, 11, 50442, ''),
(9, 11, 13402, ''),
(10, 11, 16613, ''),
(11, 11, 41157, ''),
(12, 11, 42257, ''),
(13, 11, 10478, ''),
(14, 11, 33181, 'active'),
(15, 11, 57651, 'active'),
(16, 11, 17583, 'active'),
(17, 11, 90350, 'active'),
(18, 11, 99551, 'active'),
(19, 11, 74585, 'active'),
(20, 11, 60786, 'active'),
(21, 11, 69266, 'active'),
(22, 11, 25154, 'active'),
(23, 11, 11889, 'active'),
(24, 11, 65245, 'active'),
(25, 11, 41173, 'active'),
(26, 11, 96420, 'active'),
(27, 11, 32282, 'active'),
(28, 11, 28198, 'active'),
(29, 11, 74580, 'active'),
(30, 11, 71598, 'active'),
(31, 11, 61599, 'active'),
(32, 11, 91012, 'active'),
(33, 11, 94597, 'active'),
(34, 11, 58478, 'active'),
(35, 11, 66031, 'active'),
(36, 11, 62162, 'active'),
(37, 11, 85788, 'active'),
(38, 11, 95832, 'active'),
(39, 11, 28627, 'active'),
(40, 11, 32685, 'active'),
(41, 11, 45104, 'active'),
(42, 11, 57792, 'active'),
(43, 11, 68918, 'active'),
(44, 11, 12718, 'active'),
(45, 11, 27034, 'active'),
(46, 11, 12391, 'active'),
(47, 11, 79399, 'active'),
(48, 11, 89361, 'active'),
(49, 11, 74302, 'active'),
(50, 11, 49717, 'active'),
(51, 11, 57904, 'active'),
(52, 11, 44602, 'active'),
(53, 11, 34665, 'active'),
(54, 11, 54861, 'active'),
(55, 12, 40044, 'active'),
(56, 11, 31162, 'active'),
(57, 11, 47931, 'active'),
(58, 11, 32006, 'active'),
(59, 0, 98302, 'active'),
(60, 11, 25771, 'active'),
(61, 11, 45386, 'active'),
(62, 11, 34250, 'active'),
(63, 11, 57511, 'active'),
(64, 11, 27974, 'active'),
(65, 11, 69418, 'active'),
(66, 11, 66379, 'active'),
(67, 11, 34100, 'active'),
(68, 11, 14603, 'active'),
(69, 11, 45646, 'active'),
(70, 11, 13504, 'active'),
(71, 11, 99547, 'active'),
(72, 12, 22672, 'active'),
(73, 13, 50044, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `studguardian_acc`
--

CREATE TABLE `studguardian_acc` (
  `sg_id` int(20) NOT NULL,
  `sg_username` varchar(50) NOT NULL,
  `sg_password` varchar(50) NOT NULL,
  `sg_stud_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studguardian_acc`
--

INSERT INTO `studguardian_acc` (`sg_id`, `sg_username`, `sg_password`, `sg_stud_id`) VALUES
(11, 'Paja, Jeisamae Cerdon', 'paja12345', '21'),
(12, 'Reposo, Paulene Aquisay', 'reposo', '18'),
(13, 'Renalyn Almodiel', 'Renalyn Almodiel', '20'),
(14, 'Josephine venes Bette', 'Josephine venes Bette', '19');

-- --------------------------------------------------------

--
-- Table structure for table `s_trash`
--

CREATE TABLE `s_trash` (
  `stud_id` int(250) NOT NULL,
  `studnum` text NOT NULL,
  `qr_img` longtext NOT NULL,
  `picture` longtext NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` text NOT NULL,
  `sex` varchar(10) NOT NULL,
  `grade_year` varchar(100) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `section` varchar(50) NOT NULL,
  `department` varchar(150) NOT NULL,
  `teacher_prof` varchar(150) NOT NULL,
  `g_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_trash`
--

INSERT INTO `s_trash` (`stud_id`, `studnum`, `qr_img`, `picture`, `lastname`, `middlename`, `firstname`, `fullname`, `age`, `sex`, `grade_year`, `strand`, `course`, `section`, `department`, `teacher_prof`, `g_email`) VALUES
(31, '20008671', 'Mickey 20008671.png', 'Student1.jpg', 'Mickey', 'Jerry', 'Mouseline', 'Mickey Mouseline Jerry', '8', 'Male', 'Grade 3', 'None-Grade School', 'None-Grade School', '2', 'Grade School', 'Mr. Michael Lopez', 'wadyda@lyft.live');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_acc`
--

CREATE TABLE `teachers_acc` (
  `teacher_id` int(20) NOT NULL,
  `t_username` varchar(50) NOT NULL,
  `t_password` varchar(50) NOT NULL,
  `t_department` varchar(50) NOT NULL,
  `t_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_acc`
--

INSERT INTO `teachers_acc` (`teacher_id`, `t_username`, `t_password`, `t_department`, `t_email`) VALUES
(2, 'Prof. Marygin Sarmiento', 'Prof. Marygin Sarmiento', 'College', 'wadyda@lyft.live'),
(3, 'Ms. Jaelle Isacchar', 'Ms. Jaelle Isacchar', 'Junior High School', 'wadyda@lyft.live'),
(5, 'Ms. Jessica Joyce', 'Ms. Jessica Joyce', 'Senior High School', 'wadyda@lyft.live'),
(6, 'Prof. Rhonnel Paculanan', 'Prof. Rhonnel Paculanan', 'Grade School', 'wadyda@lyft.live'),
(11, 'Mr. Jerie Bautista', 'Mr. Jerie Bautista', 'College', 'wadyda@lyft.live');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_code_records`
--

CREATE TABLE `teachers_code_records` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_code_records`
--

INSERT INTO `teachers_code_records` (`id`, `teacher_id`, `code`) VALUES
(1, 6, 65109),
(2, 6, 44617),
(3, 6, 43764),
(4, 6, 45508),
(5, 6, 20012),
(6, 6, 35896),
(7, 6, 19114),
(8, 6, 75644),
(9, 6, 43855),
(10, 6, 45983),
(11, 6, 98313),
(12, 6, 23598),
(13, 6, 99855),
(14, 6, 55659),
(15, 6, 22454),
(16, 6, 20436),
(17, 6, 77409),
(18, 2, 18405),
(19, 6, 55852),
(20, 6, 37063),
(21, 6, 40858),
(22, 6, 62919),
(23, 6, 70667),
(24, 6, 52691),
(25, 6, 32099),
(26, 6, 51046),
(27, 6, 53560),
(28, 2, 66704),
(29, 2, 15147),
(30, 6, 31993),
(31, 6, 29168),
(32, 6, 64122),
(33, 6, 76715),
(34, 6, 66240),
(35, 2, 29117),
(36, 0, 33452),
(37, 2, 23310),
(38, 2, 94533),
(39, 2, 97391),
(40, 2, 90400),
(41, 6, 57599),
(42, 6, 42578),
(43, 6, 21097),
(44, 6, 97603),
(45, 2, 77194),
(46, 6, 50625),
(47, 6, 26475),
(48, 6, 22998),
(49, 6, 46868),
(50, 2, 52153),
(51, 3, 34735),
(52, 5, 31069),
(53, 6, 37119),
(54, 6, 39891),
(55, 6, 54704),
(56, 6, 84803),
(57, 6, 90209),
(58, 6, 12378),
(59, 2, 77998),
(60, 2, 70547),
(61, 6, 50225),
(62, 6, 67423),
(63, 6, 44964),
(64, 3, 77681),
(65, 6, 47623),
(66, 6, 79540),
(67, 3, 97493),
(68, 6, 88633),
(69, 3, 54065),
(70, 3, 68084),
(71, 6, 73404),
(72, 3, 12765),
(73, 3, 13073),
(74, 3, 84267),
(75, 6, 63054),
(76, 6, 65425),
(77, 6, 62221),
(78, 3, 54792),
(79, 6, 98191),
(80, 6, 72459),
(81, 6, 78939),
(82, 6, 19628),
(83, 6, 83614),
(84, 6, 76116),
(85, 6, 74708),
(86, 6, 62620),
(87, 3, 27295),
(88, 6, 11957),
(89, 6, 60232),
(90, 6, 54418),
(91, 6, 29872),
(92, 3, 77379),
(93, 6, 83869),
(94, 10, 28406),
(95, 10, 72164),
(96, 6, 44425),
(97, 3, 44779),
(98, 5, 47209),
(99, 5, 76724),
(100, 2, 10881),
(101, 2, 65788),
(102, 6, 36601),
(103, 6, 24003),
(104, 6, 87242),
(105, 3, 53296),
(106, 3, 77558),
(107, 5, 47273),
(108, 11, 36806);

-- --------------------------------------------------------

--
-- Table structure for table `time_in_records`
--

CREATE TABLE `time_in_records` (
  `timeID` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `studnum` bigint(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `studname` varchar(200) NOT NULL,
  `daterec` varchar(150) NOT NULL,
  `time` varchar(100) NOT NULL,
  `g_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_in_records`
--

INSERT INTO `time_in_records` (`timeID`, `stud_id`, `studnum`, `type`, `studname`, `daterec`, `time`, `g_email`) VALUES
(5, 0, 200653, 'in', 'Reposo, Pauline Jennie', 'Monday, July 10, 2023', '12:32:59 PM', 'paureposo@gmail.com'),
(6, 0, 2000175, 'in', 'Bette, Josephine Ramirez', 'Monday, July 10, 2023', '09:06:13 PM', 'bettejv@gmail.com'),
(7, 14, 2000234, 'in', 'sample 1, sample 1 sample 1', 'Monday, July 10, 2023', '11:17:17 PM', 'sample@gmail.com'),
(8, 14, 2000234, 'in', 'sample 1, sample 1 sample 1', 'Monday, July 10, 2023', '11:58:35 PM', 'sample@gmail.com'),
(9, 14, 2000234, 'Out', 'sample 1, sample 1 sample 1', 'Tuesday, July 11, 2023', '12:01:26 AM', 'sample@gmail.com'),
(11, 14, 2000234, 'in', 'sample 1, sample 1 sample 1', 'Tuesday, July 11, 2023', '12:17:16 AM', 'sample@gmail.com'),
(12, 14, 2000234, 'out', 'sample 1, sample 1 sample 1', 'Tuesday, July 11, 2023', '12:18:41 AM', 'sample@gmail.com'),
(14, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Tuesday, July 11, 2023', '05:11:54 PM', 'jeisamae@gmail'),
(15, 21, 2012345, 'out', 'Paja, Jeisamae Cerdon', 'Tuesday, July 11, 2023', '05:19:19 PM', 'jeisamae@gmail'),
(16, 21, 2012345, 'out', 'Paja, Jeisamae Cerdon', 'Tuesday, July 11, 2023', '05:23:26 PM', 'jeisamae@gmail'),
(17, 21, 2012345, 'out', 'Paja, Jeisamae Cerdon', 'Tuesday, July 11, 2023', '05:25:05 PM', 'jeisamae@gmail'),
(19, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Tuesday, July 11, 2023', '05:59:08 PM', 'jeisamae@gmail'),
(20, 21, 2012345, 'out', 'Paja, Jeisamae Cerdon', 'Tuesday, July 11, 2023', '06:00:30 PM', 'jeisamae@gmail'),
(21, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Wednesday, July 12, 2023', '04:04:15 PM', 'jeisamae@gmail'),
(22, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Thursday, July 13, 2023', '07:37:09 PM', 'paja@gmail'),
(23, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Thursday, July 13, 2023', '07:40:00 PM', 'paja@gmail'),
(24, 21, 2012345, 'out', 'Paja, Jeisamae Cerdon', 'Thursday, July 13, 2023', '07:41:52 PM', 'paja@gmail'),
(25, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, July 15, 2023', '07:20:42 AM', 'paja@gmail'),
(26, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Thursday, August 17, 2023', '10:04:57 PM', 'paja@gmail'),
(27, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:09:26 AM', 'pajajeisamaec@gmail'),
(28, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:10:05 AM', 'pajajeisamaec@gmail'),
(29, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:11:18 AM', 'pajajeisamaec@gmail'),
(30, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:13:27 AM', 'pajajeisamaec@gmail'),
(31, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:13:47 AM', 'pajajeisamaec@gmail'),
(32, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:14:21 AM', 'pajajeisamaec@gmail'),
(33, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:17:06 AM', 'pajajeisamaec@gmail'),
(34, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:17:46 AM', 'pajajeisamaec@gmail'),
(35, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:18:03 AM', 'pajajeisamaec@gmail'),
(36, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:22:15 AM', 'pajajeisamaec@gmail'),
(37, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:22:32 AM', 'pajajeisamaec@gmail'),
(38, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:24:37 AM', 'pajajeisamaec@gmail'),
(39, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:25:24 AM', 'pajajeisamaec@gmail'),
(40, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:30:25 AM', 'pajajeisamaec@gmail'),
(41, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:32:04 AM', 'pajajeisamaec@gmail'),
(42, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '12:32:18 AM', 'pajajeisamaec@gmail'),
(43, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '11:23:29 PM', 'pajajeisamaec@gmail'),
(44, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '11:27:20 PM', 'pajajeisamaec@gmail'),
(45, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Friday, August 18, 2023', '11:42:10 PM', 'pajajeisamaec@gmail'),
(46, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:12:02 PM', 'pajajeisamaec@gmail'),
(47, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:16:49 PM', 'pajajeisamaec@gmail'),
(48, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:36:15 PM', 'pajajeisamaec@gmail'),
(49, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:39:31 PM', 'pajajeisamaec@gmail'),
(50, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:42:41 PM', 'pajajeisamaec@gmail'),
(51, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:45:32 PM', 'pajajeisamaec@gmail'),
(52, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '10:46:48 PM', 'pajajeisamaec@gmail'),
(53, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:02:03 PM', 'pajajeisamaec@gmail'),
(54, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:07:51 PM', 'pajajeisamaec@gmail'),
(55, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:09:23 PM', 'pajajeisamaec@gmail'),
(56, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:16:05 PM', 'pajajeisamaec@gmail'),
(57, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:26:37 PM', 'pajajeisamaec@gmail'),
(58, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:29:36 PM', 'pajajeisamaec@gmail'),
(59, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:36:05 PM', 'pajajeisamaec@gmail'),
(60, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:36:35 PM', 'pajajeisamaec@gmail'),
(61, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:36:59 PM', 'pajajeisamaec@gmail'),
(62, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:37:30 PM', 'pajajeisamaec@gmail'),
(63, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:39:18 PM', 'pajajeisamaec@gmail'),
(64, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:40:14 PM', 'pajajeisamaec@gmail'),
(65, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:40:18 PM', 'pajajeisamaec@gmail'),
(66, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:40:22 PM', 'pajajeisamaec@gmail'),
(67, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:40:43 PM', 'pajajeisamaec@gmail'),
(68, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:42:26 PM', 'pajajeisamaec@gmail'),
(69, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:42:55 PM', 'pajajeisamaec@gmail'),
(70, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:42:58 PM', 'pajajeisamaec@gmail'),
(71, 19, 2034567, 'in', 'Bette, Josephine Ramirez', 'Saturday, August 19, 2023', '11:44:01 PM', 'josephinevenesbette@gmail.com'),
(72, 18, 2023456, 'in', 'Reposo, Paulene Aquisay', 'Saturday, August 19, 2023', '11:44:42 PM', 'paulenereposo25@gmail.com'),
(73, 20, 2045678, 'in', 'Almodiel, Renalyn Dellosa', 'Saturday, August 19, 2023', '11:45:25 PM', 'ralmodiel8@gmail.com'),
(74, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:48:40 PM', 'pajajeisamaec@gmail'),
(75, 19, 2034567, 'in', 'Bette, Josephine Ramirez', 'Saturday, August 19, 2023', '11:49:28 PM', 'josephinevenesbette@gmail.com'),
(76, 18, 2023456, 'in', 'Reposo, Paulene Aquisay', 'Saturday, August 19, 2023', '11:50:00 PM', 'paulenereposo25@gmail.com'),
(77, 18, 2023456, 'in', 'Reposo, Paulene Aquisay', 'Saturday, August 19, 2023', '11:51:56 PM', 'paulenereposo25@gmail.com'),
(78, 19, 2034567, 'in', 'Bette, Josephine Ramirez', 'Saturday, August 19, 2023', '11:52:24 PM', 'josephinevenesbette@gmail.com'),
(79, 20, 2045678, 'in', 'Almodiel, Renalyn Dellosa', 'Saturday, August 19, 2023', '11:55:27 PM', 'ralmodiel8@gmail.com'),
(80, 20, 2045678, 'in', 'Almodiel, Renalyn Dellosa', 'Saturday, August 19, 2023', '11:56:22 PM', 'ralmodiel8@gmail.com'),
(81, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Saturday, August 19, 2023', '11:56:58 PM', 'pajajeisamaec@gmail.com'),
(82, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Sunday, August 20, 2023', '12:02:20 AM', 'pajajeisamaec@gmail.com'),
(83, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Sunday, August 20, 2023', '12:05:19 AM', 'pajajeisamaec@gmail.com'),
(84, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Sunday, August 20, 2023', '12:08:32 AM', 'magsajo99@gmail.com'),
(85, 21, 2012345, 'in', 'Paja, Jeisamae Cerdon', 'Sunday, August 20, 2023', '12:10:27 AM', 'magsajomiguel@gmail.com'),
(86, 22, 2035436, 'in', 'McBrown, Ashleigh Swift', 'Sunday, August 20, 2023', '04:58:41 PM', 'mcbrown@gmail.com'),
(87, 22, 2035436, 'in', 'McBrown, Ashleigh Swift', 'Sunday, August 20, 2023', '04:59:29 PM', 'pajajeisamaec@gmail.com'),
(88, 23, 205353, 'in', 'Yu, Arnold Cruz', 'Sunday, August 20, 2023', '05:00:03 PM', 'pajajeisamaec@gmail.com'),
(89, 23, 205353, 'in', 'Yu, Arnold Cruz', 'Sunday, August 20, 2023', '05:00:23 PM', 'pajajeisamaec@gmail.com'),
(90, 24, 20121212, 'in', 'Buleto, David Zacharias', 'Sunday, August 20, 2023', '05:00:56 PM', 'pajajeisamaec@gmail.com'),
(91, 24, 20121212, 'in', 'Buleto, David Zacharias', 'Sunday, August 20, 2023', '05:01:13 PM', 'pajajeisamaec@gmail.com'),
(92, 23, 205353, 'in', 'Yu, Arnold Cruz', 'Sunday, August 20, 2023', '05:09:31 PM', 'pajajeisamaec@gmail.com'),
(93, 23, 205353, 'out', 'Yu, Arnold Cruz', 'Sunday, August 20, 2023', '05:13:08 PM', 'pajajeisamaec@gmail.com'),
(94, 23, 205353, 'out', 'Yu, Arnold Cruz', 'Sunday, August 20, 2023', '05:14:07 PM', 'pajajeisamaec@gmail.com'),
(95, 24, 20121212, 'out', 'Buleto, David Zacharias', 'Sunday, August 20, 2023', '05:18:42 PM', 'pajajeisamaec@gmail.com'),
(96, 24, 20121212, 'in', 'Buleto, David Zacharias', 'Sunday, August 20, 2023', '05:20:52 PM', 'pajajeisamaec@gmail.com'),
(97, 22, 2035436, 'in', 'McBrown, Ashleigh Swift', 'Sunday, August 20, 2023', '05:37:06 PM', 'pajajeisamaec@gmail.com'),
(98, 25, 2000876, 'in', 'Garfield, Moki Daki', 'Thursday, August 24, 2023', '12:31:39 AM', 'ralmodiel8@gmail.com'),
(99, 25, 2000876, 'in', 'Garfield, Moki Daki', 'Thursday, August 24, 2023', '12:39:28 AM', 'ralmodiel8@gmail.com'),
(100, 25, 2000876, 'in', 'Garfield, Moki Daki', 'Saturday, August 26, 2023', '07:52:24 PM', 'ralmodiel8@gmail.com'),
(101, 25, 2000876, 'in', 'Garfield, Moki Daki', 'Saturday, August 26, 2023', '07:52:31 PM', 'ralmodiel8@gmail.com'),
(102, 25, 2000876, 'in', 'Garfield, Moki Daki', 'Saturday, August 26, 2023', '07:53:24 PM', 'ralmodiel8@gmail.com'),
(103, 0, 0, 'in', ',  ', 'Sunday, August 27, 2023', '11:52:03 PM', ''),
(104, 0, 0, 'in', ',  ', 'Sunday, August 27, 2023', '11:56:37 PM', ''),
(107, 32, 1800876, 'in', 'Castriciones, Precious Lara May Dellosa', 'Tuesday, November 21, 2023', '11:50:35 PM', 'wadyda@lyft.live'),
(108, 32, 1800876, 'in', 'Castriciones, Precious Lara May Dellosa', 'Tuesday, November 21, 2023', '11:50:39 PM', 'wadyda@lyft.live'),
(109, 32, 1800876, 'in', 'Castriciones, Precious Lara May Dellosa', 'Tuesday, November 21, 2023', '11:50:59 PM', 'wadyda@lyft.live'),
(110, 32, 1800876, 'in', 'Castriciones, Precious Lara May Dellosa', 'Tuesday, November 21, 2023', '11:51:11 PM', 'wadyda@lyft.live'),
(111, 31, 20008671, 'out', 'Mickey, Mouseline Jerry', 'Tuesday, November 21, 2023', '11:51:36 PM', 'wadyda@lyft.live'),
(112, 31, 20008671, 'out', 'Mickey, Mouseline Jerry', 'Tuesday, November 21, 2023', '11:51:53 PM', 'wadyda@lyft.live'),
(113, 31, 20008671, 'out', 'Mickey, Mouseline Jerry', 'Tuesday, November 21, 2023', '11:52:19 PM', 'wadyda@lyft.live'),
(114, 34, 2000671, 'in', 'Perez, Kylie anne Miliana', 'Wednesday, November 22, 2023', '12:28:47 AM', 'wadyda@lyft.live'),
(115, 34, 2000671, 'in', 'Perez, Kylie anne Miliana', 'Wednesday, November 22, 2023', '12:29:00 AM', 'wadyda@lyft.live'),
(116, 34, 2000671, 'in', 'Perez, Kylie anne Miliana', 'Wednesday, November 22, 2023', '12:29:12 AM', 'wadyda@lyft.live'),
(117, 33, 20117631, 'out', 'Swift, Prince Jhon Taylor', 'Wednesday, November 22, 2023', '12:29:31 AM', 'wadyda@lyft.live'),
(118, 33, 20117631, 'out', 'Swift, Prince Jhon Taylor', 'Wednesday, November 22, 2023', '12:29:44 AM', 'wadyda@lyft.live'),
(119, 33, 20117631, 'out', 'Swift, Prince Jhon Taylor', 'Wednesday, November 22, 2023', '12:29:56 AM', 'wadyda@lyft.live'),
(120, 36, 1900871, 'in', 'Delana, Riri Luna', 'Wednesday, November 22, 2023', '01:00:06 AM', 'wadyda@lyft.live'),
(121, 36, 1900871, 'in', 'Delana, Riri Luna', 'Wednesday, November 22, 2023', '01:00:19 AM', 'wadyda@lyft.live'),
(122, 36, 1900871, 'in', 'Delana, Riri Luna', 'Wednesday, November 22, 2023', '01:00:30 AM', 'wadyda@lyft.live'),
(123, 35, 2300871, 'out', 'Marquez, Jerico Uy', 'Wednesday, November 22, 2023', '01:00:54 AM', 'wadyda@lyft.live'),
(124, 35, 2300871, 'out', 'Marquez, Jerico Uy', 'Wednesday, November 22, 2023', '01:01:05 AM', 'wadyda@lyft.live'),
(125, 35, 2300871, 'out', 'Marquez, Jerico Uy', 'Wednesday, November 22, 2023', '01:01:16 AM', 'wadyda@lyft.live'),
(126, 20, 2045678, 'in', 'Almodiel, Renalyn Dellosa', 'Wednesday, November 22, 2023', '04:47:23 PM', 'bevemed160@bikedid.com'),
(127, 20, 2045678, 'out', 'Almodiel, Renalyn Dellosa', 'Wednesday, November 22, 2023', '04:47:59 PM', 'bevemed160@bikedid.com');

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
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `student_code_records`
--
ALTER TABLE `student_code_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studguardian_acc`
--
ALTER TABLE `studguardian_acc`
  ADD PRIMARY KEY (`sg_id`);

--
-- Indexes for table `s_trash`
--
ALTER TABLE `s_trash`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `teachers_acc`
--
ALTER TABLE `teachers_acc`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teachers_code_records`
--
ALTER TABLE `teachers_code_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_in_records`
--
ALTER TABLE `time_in_records`
  ADD PRIMARY KEY (`timeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_code_records`
--
ALTER TABLE `student_code_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `studguardian_acc`
--
ALTER TABLE `studguardian_acc`
  MODIFY `sg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `s_trash`
--
ALTER TABLE `s_trash`
  MODIFY `stud_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `teachers_acc`
--
ALTER TABLE `teachers_acc`
  MODIFY `teacher_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers_code_records`
--
ALTER TABLE `teachers_code_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `time_in_records`
--
ALTER TABLE `time_in_records`
  MODIFY `timeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
