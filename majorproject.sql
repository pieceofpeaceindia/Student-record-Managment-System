-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 05:04 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majorproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincredentials`
--

CREATE TABLE `admincredentials` (
  `id` int(32) NOT NULL,
  `adminid` varchar(32) NOT NULL,
  `adminpass` varchar(255) NOT NULL,
  `adminemail` varchar(64) NOT NULL,
  `lastlogin` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `date` date NOT NULL,
  `subjectcode` varchar(16) NOT NULL,
  `studentrollno` bigint(64) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `id` int(64) NOT NULL,
  `facultyname` text NOT NULL,
  `username` text NOT NULL,
  `facultypassword` varchar(128) NOT NULL,
  `emailid` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultydetails`
--

INSERT INTO `facultydetails` (`id`, `facultyname`, `username`, `facultypassword`, `emailid`) VALUES
(5, 'P S Pandey', 'psp', '$2y$12$BSwC4XHtHqZRX9NIvbqp/e6vS62ivsA.7W..ibCBWjYJFVrJSCvRi', 'purn@gmail.com'),
(6, 'Anoopshi Johari', 'anoopshi', '$2y$12$ypJg7Gf/.igw0HlodVciL.vUw.IpYne5VC2z0WHybeYLCqK6hWh8S', 'akg@gmail.com'),
(7, 'Praful Ranjan', 'prf', '$2y$12$EuJg0lSEC3OKy1G0LvhgwO48yJH6JBPUcJgVVxhtxYUyapk.9pSW6', 'prf@rediffmail.com'),
(8, 'Mahesh K Aghwariya', 'mka', '$2y$12$X2QZREAoRjIhStW9yii7veUo/VnWrg3y2l1rI4MnX4.gkd0ycaF3y', 'mah@ymail.com'),
(9, 'Ginne Rani', 'ginne', '$2y$12$A8xNy7ofFUqlMpTm58zOxevoPq985jRXMztVr33YPMJ/iROTjVQWC', 'ginne@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(64) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `messege` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `messege`) VALUES
(3, 'Vivek Kumar Gupta', 'vivek@gmail.com', 'csdcs', 'aspberry Pi based microcomputer in every classroom which will take input through touch LCD screen'),
(4, 'Vivek Kumar Gupta', 'vivek@gmail.com', '798', 'vm s,fv hdfv jhfv jab hjabjhabr abkhb ksjf');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `subject` varchar(16) NOT NULL,
  `studentrollno` bigint(64) NOT NULL,
  `firstsessional` int(16) NOT NULL,
  `secondsessional` int(16) NOT NULL,
  `makeup` int(16) NOT NULL,
  `assignment` int(16) NOT NULL,
  `attendance` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `rollno` bigint(64) NOT NULL,
  `nameofstudent` text NOT NULL,
  `studentbranch` text NOT NULL,
  `studentyear` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`rollno`, `nameofstudent`, `studentbranch`, `studentyear`) VALUES
(140970102038, 'Vivek Kumar Gupta', 'ECE', 'Fourth'),
(140970102001, 'Abdul', 'ECE', 'Fourth'),
(140970102002, 'Abhiruchi Joshi', 'ECE', 'Fourth'),
(140970102004, 'Amit Negi', 'ECE', 'Fourth'),
(140970102005, 'Anjali Kotnala', 'ECE', 'Fourth'),
(140970102006, 'Ankit Gangwar', 'ECE', 'Fourth'),
(140970102037, 'Vivek Arya', 'ECE', 'Fourth'),
(140970102007, 'Ankit Ramola', 'ECE', 'Fourth'),
(140970102008, 'Ankuj Bisht', 'ECE', 'Fourth'),
(140970102011, 'Ashish Pan', 'ECE', 'Fourth'),
(140970102012, 'Bipin Dangwal', 'ECE', 'Fourth'),
(140970102013, 'Deepak Singh Bohra', 'ECE', 'Fourth'),
(140970102014, 'Devashish Sharma', 'ECE', 'Fourth'),
(140970102015, 'Gaurav Deshwal', 'ECE', 'Fourth'),
(140970102016, 'Gunjan Bijalwan', 'ECE', 'Fourth'),
(140970102017, 'Himanshu Sharma', 'ECE', 'Fourth'),
(140970102018, 'Jatin Prakash Chhabra', 'ECE', 'Fourth'),
(140970102019, 'Karan Bhatt', 'ECE', 'Fourth'),
(140970102020, 'Kiran Panwar', 'ECE', 'Fourth'),
(140970102021, 'Km. Naincy', 'ECE', 'Fourth'),
(140970102022, 'Lalita Tiwari', 'ECE', 'Fourth'),
(140970102023, 'Manish Tewari', 'ECE', 'Fourth'),
(140970102024, 'Nidhi Gagat', 'ECE', 'Fourth'),
(140970102025, 'Nishtha Kukreti', 'ECE', 'Fourth'),
(140970102026, 'Samidha Thakur', 'ECE', 'Fourth'),
(140970102027, 'Saurabh Sharma', 'ECE', 'Fourth'),
(140970102028, 'Shivansh Shanker Atri', 'ECE', 'Fourth'),
(140970102029, 'Shweta Bhandari', 'ECE', 'Fourth'),
(140970102030, 'Sonali Ranghar', 'ECE', 'Fourth'),
(140970102031, 'Subham Kumar', 'ECE', 'Fourth'),
(140970102032, 'Sumit Bhatt', 'ECE', 'Fourth'),
(140970102033, 'Tarun', 'ECE', 'Fourth'),
(140970102034, 'Vikas Bahuguna', 'ECE', 'Fourth'),
(140970102035, 'Vinayak Lohan', 'ECE', 'Fourth'),
(140970101017, 'Himadri Bouwal', 'ECE', 'Fourth'),
(140970101031, 'Rajat Singh', 'ECE', 'Fourth'),
(140970101040, 'Shivam Dobhal', 'ECE', 'Fourth'),
(150970102002, 'Akanksha Pant', 'ECE', 'Third'),
(150970102006, 'Avinash Pokhriyal', 'ECE', 'Third'),
(150970102007, 'Dushyant', 'ECE', 'Third'),
(150970102013, 'Prashant Shah', 'ECE', 'Third'),
(660970102003, 'Deepak Prasad sati', 'ECE', 'Third'),
(150970102014, 'Rohit Singh Bisht', 'ECE', 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(32) NOT NULL,
  `year` text NOT NULL,
  `branch` text NOT NULL,
  `subjectode` varchar(32) NOT NULL,
  `semester` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `branch`, `subjectode`, `semester`) VALUES
(9, 'First', 'ECE', 'TEE 101', 'First'),
(8, 'First', 'ECE', 'THM 101', 'First'),
(7, 'First', 'ECE', 'TPH 101', 'First'),
(6, 'First', 'ECE', 'TMA 101', 'First'),
(10, 'First', 'ECE', 'TCS 101', 'First'),
(11, 'First', 'EE', 'TMA 101', 'First'),
(12, 'First', 'EE', 'TPH 101', 'First'),
(13, 'First', 'EE', 'THM 101', 'First'),
(14, 'First', 'EE', 'TEE 101', 'First'),
(15, 'First', 'EE', 'TCS 101', 'First'),
(16, 'First', 'CSE', 'TMA 101', 'First'),
(17, 'First', 'CSE', 'TPH 101', 'First'),
(18, 'First', 'CSE', 'THM 101', 'First'),
(19, 'First', 'CSE', 'TEE 101', 'First'),
(20, 'First', 'CSE', 'TCS 101', 'First'),
(21, 'First', 'ME', 'TMA 101', 'First'),
(22, 'First', 'ME', 'TCY 101', 'First'),
(23, 'First', 'ME', 'THM 101', 'First'),
(24, 'First', 'Civil', 'TME 101', 'First'),
(25, 'First', 'Civil', 'TEC 101', 'First'),
(26, 'First', 'Civil', 'TMA 101', 'First'),
(27, 'First', 'Civil', 'TCY 101', 'First'),
(28, 'First', 'Civil', 'THM 101', 'First'),
(29, 'First', 'Civil', 'TME 101', 'First'),
(30, 'First', 'Civil', 'TEC 101', 'First'),
(31, 'First', 'ECE', 'TMA 201', 'Second'),
(32, 'First', 'ECE', 'TCY 201', 'Second'),
(33, 'First', 'ECE', 'THM 201', 'Second'),
(34, 'First', 'ECE', 'TME 201', 'Second'),
(35, 'First', 'ECE', 'TEC 201', 'Second'),
(36, 'First', 'EE', 'TMA 201', 'Second'),
(37, 'First', 'EE', 'TCY 201', 'Second'),
(38, 'First', 'EE', 'THM 201', 'Second'),
(39, 'First', 'EE', 'TME 201', 'Second'),
(40, 'First', 'EE', 'TEC 201', 'Second'),
(41, 'First', 'CSE', 'TMA 201', 'Second'),
(42, 'First', 'CSE', 'TCY 201', 'Second'),
(43, 'First', 'CSE', 'THM 201', 'Second'),
(44, 'First', 'CSE', 'TME 201', 'Second'),
(45, 'First', 'CSE', 'TEC 201', 'Second'),
(46, 'First', 'ME', 'TMA 201', 'Second'),
(47, 'First', 'ME', 'TPH 201', 'Second'),
(48, 'First', 'ME', 'THM 201', 'Second'),
(49, 'First', 'ME', 'TEE 201', 'Second'),
(50, 'First', 'ME', 'TCS 201', 'Second'),
(51, 'First', 'Civil', 'TMA 201', 'Second'),
(52, 'First', 'Civil', 'TPH 201', 'Second'),
(53, 'First', 'Civil', 'THM 201', 'Second'),
(54, 'First', 'Civil', 'TEE 201', 'Second'),
(55, 'First', 'Civil', 'TCS 201', 'Second'),
(56, 'Second', 'ECE', 'TCS 301', 'Third'),
(57, 'Second', 'ECE', 'TEC 301', 'Third'),
(58, 'Second', 'ECE', 'TEC 302', 'Third'),
(59, 'Second', 'ECE', 'TEC 303', 'Third'),
(60, 'Second', 'ECE', 'TEE 301', 'Third'),
(61, 'Second', 'ECE', 'THM 301', 'Third'),
(62, 'Second', 'ECE', 'TCS 401', 'Fourth'),
(63, 'Second', 'ECE', 'TEC 401', 'Fourth'),
(64, 'Second', 'ECE', 'TEC 402', 'Fourth'),
(65, 'Second', 'ECE', 'TEC 404', 'Fourth'),
(66, 'Second', 'ECE', 'TEE 405', 'Fourth'),
(67, 'Second', 'ECE', 'TEC 406', 'Fourth'),
(68, 'Third', 'ECE', 'TCS 507', 'Fifth'),
(69, 'Third', 'ECE', 'TEC 501', 'Fifth'),
(70, 'Third', 'ECE', 'TEC 502', 'Fifth'),
(71, 'Third', 'ECE', 'TEC 503', 'Fifth'),
(72, 'Third', 'ECE', 'TEE 504', 'Fifth'),
(73, 'Third', 'ECE', 'TEC 505', 'Fifth'),
(74, 'Third', 'ECE', 'TCS 607', 'Sixth'),
(75, 'Third', 'ECE', 'TEC 601', 'Sixth'),
(76, 'Third', 'ECE', 'TEC 602', 'Sixth'),
(77, 'Third', 'ECE', 'TEC 603', 'Sixth'),
(78, 'Third', 'ECE', 'TEE 604', 'Sixth'),
(79, 'Third', 'ECE', 'THU 608', 'Sixth'),
(80, 'Fourth', 'ECE', 'TEC 701', 'Seventh'),
(81, 'Fourth', 'ECE', 'TEC 702', 'Seventh'),
(82, 'Fourth', 'ECE', 'TEC 703', 'Seventh'),
(83, 'Fourth', 'ECE', 'TEC 01X', 'Seventh'),
(84, 'Fourth', 'ECE', 'TOE XX', 'Seventh'),
(85, 'Fourth', 'ECE', 'TEC 801', 'Eighth'),
(86, 'Fourth', 'ECE', 'TEC 802', 'Eighth'),
(87, 'Fourth', 'ECE', 'TEC 02X', 'Eighth'),
(88, 'Fourth', 'ECE', 'TEC 03X', 'Eighth'),
(89, 'Second', 'CSE', 'TCS 301', 'Third'),
(90, 'Second', 'CSE', 'TCS 302', 'Third'),
(91, 'Second', 'CSE', 'TCS 303', 'Third'),
(92, 'Second', 'CSE', 'TEC 301', 'Third'),
(93, 'Second', 'CSE', 'TCS 304', 'Third'),
(94, 'Second', 'CSE', 'THU 301', 'Third'),
(95, 'Second', 'CSE', 'TCS 401', 'Fourth'),
(96, 'Second', 'CSE', 'TCS 402', 'Fourth'),
(97, 'Second', 'CSE', 'TCS 403', 'Fourth'),
(98, 'Second', 'CSE', 'TCS 404', 'Fourth'),
(99, 'Second', 'CSE', 'TCS 405', 'Fourth'),
(100, 'Second', 'CSE', 'TCS 406', 'Fourth'),
(101, 'Third', 'CSE', 'TCS 501', 'Fifth'),
(102, 'Third', 'CSE', 'TCS 502', 'Fifth'),
(103, 'Third', 'CSE', 'TCS 503', 'Fifth'),
(104, 'Third', 'CSE', 'TCS 504', 'Fifth'),
(105, 'Third', 'CSE', 'TCS 505', 'Fifth'),
(106, 'Third', 'CSE', 'TCS 506', 'Fifth'),
(107, 'Third', 'CSE', 'TCS 601', 'Sixth'),
(108, 'Third', 'CSE', 'TCS 602', 'Sixth'),
(109, 'Third', 'CSE', 'TCS 603', 'Sixth'),
(110, 'Third', 'CSE', 'TCS 604', 'Sixth'),
(111, 'Third', 'CSE', 'TCS 605', 'Sixth'),
(112, 'Third', 'CSE', 'THU 608', 'Sixth'),
(113, 'Fourth', 'CSE', 'TCS 701', 'Seventh'),
(114, 'Fourth', 'CSE', 'TCS 702', 'Seventh'),
(115, 'Fourth', 'CSE', 'TCS 703', 'Seventh'),
(116, 'Fourth', 'CSE', 'TCS 01X', 'Seventh'),
(117, 'Fourth', 'CSE', 'TOE XX', 'Seventh'),
(118, 'Fourth', 'CSE', 'TCS 801', 'Eighth'),
(119, 'Fourth', 'CSE', 'TCS 802', 'Eighth'),
(120, 'Fourth', 'CSE', 'TCS 02X', 'Eighth'),
(121, 'Fourth', 'CSE', 'TCS 03X', 'Eighth'),
(122, 'Second', 'EE', 'TMA 301', 'Third'),
(123, 'Second', 'EE', 'TEE 301', 'Third'),
(124, 'Second', 'EE', 'TEE 302', 'Third'),
(125, 'Second', 'EE', 'TME 304', 'Third'),
(126, 'Second', 'EE', 'TEC 304', 'Third'),
(127, 'Second', 'EE', 'TEC 305', 'Third'),
(128, 'Second', 'EE', 'TEE 401', 'Fourth'),
(129, 'Second', 'EE', 'TEE 402', 'Fourth'),
(130, 'Second', 'EE', 'TEE 403', 'Fourth'),
(131, 'Second', 'EE', 'TEE 404', 'Fourth'),
(132, 'Second', 'EE', 'TEC 401', 'Fourth'),
(133, 'Second', 'EE', 'THU 401', 'Fourth'),
(134, 'Third', 'EE', 'TEE 501', 'Fifth'),
(135, 'Third', 'EE', 'TEE 502', 'Fifth'),
(136, 'Third', 'EE', 'TEE 503', 'Fifth'),
(137, 'Third', 'EE', 'TEE 504', 'Fifth'),
(138, 'Third', 'EE', 'TEC 502', 'Fifth'),
(139, 'Third', 'EE', 'TCS 507', 'Fifth'),
(140, 'Third', 'EE', 'TEE 601', 'Sixth'),
(141, 'Third', 'EE', 'TEE 602', 'Sixth'),
(142, 'Third', 'EE', 'TEE 603', 'Sixth'),
(143, 'Third', 'EE', 'TEE 604', 'Sixth'),
(144, 'Third', 'EE', 'TCS 607', 'Sixth'),
(145, 'Third', 'EE', 'THU 608', 'Sixth'),
(146, 'Fourth', 'EE', 'TEE 701', 'Seventh'),
(147, 'Fourth', 'EE', 'TEE 702', 'Seventh'),
(148, 'Fourth', 'EE', 'TEE 703', 'Seventh'),
(149, 'Fourth', 'EE', 'TEE 01X', 'Seventh'),
(150, 'Fourth', 'EE', 'TOE XX', 'Seventh'),
(151, 'Fourth', 'EE', 'TEE 801', 'Eighth'),
(152, 'Fourth', 'EE', 'TEE 802', 'Eighth'),
(153, 'Fourth', 'EE', 'TEE 02X', 'Eighth'),
(154, 'Fourth', 'EE', 'TEE 03X', 'Eighth'),
(155, 'Second', 'ME', 'TMA 301', 'Third'),
(156, 'Second', 'ME', 'TME 301', 'Third'),
(157, 'Second', 'ME', 'TME 302', 'Third'),
(158, 'Second', 'ME', 'TME 303', 'Third'),
(159, 'Second', 'ME', 'TCE 301', 'Third'),
(160, 'Second', 'ME', 'THU 301', 'Third'),
(161, 'Second', 'ME', 'TME 401', 'Fourth'),
(162, 'Second', 'ME', 'TME 402', 'Fourth'),
(163, 'Second', 'ME', 'TME 403', 'Fourth'),
(164, 'Second', 'ME', 'TME 404', 'Fourth'),
(165, 'Second', 'ME', 'TME 405', 'Fourth'),
(166, 'Second', 'ME', 'TEE 405', 'Fourth'),
(167, 'Third', 'ME', 'TME 501', 'Fifth'),
(168, 'Third', 'ME', 'TME 502', 'Fifth'),
(169, 'Third', 'ME', 'TME 503', 'Fifth'),
(170, 'Third', 'ME', 'TME 504', 'Fifth'),
(171, 'Third', 'ME', 'TME 505', 'Fifth'),
(172, 'Third', 'ME', 'TCS 507', 'Fifth'),
(173, 'Third', 'ME', 'TME 601', 'Sixth'),
(174, 'Third', 'ME', 'TME 602', 'Sixth'),
(175, 'Third', 'ME', 'TME 603', 'Sixth'),
(176, 'Third', 'ME', 'TME 604', 'Sixth'),
(177, 'Third', 'ME', 'TME 605', 'Sixth'),
(178, 'Third', 'ME', 'THU 608', 'Sixth'),
(179, 'Fourth', 'ME', 'TME 701', 'Seventh'),
(180, 'Fourth', 'ME', 'TME 702', 'Seventh'),
(181, 'Fourth', 'ME', 'TME 703', 'Seventh'),
(182, 'Fourth', 'ME', 'TME 01X', 'Seventh'),
(183, 'Fourth', 'ME', 'TOE XX', 'Seventh'),
(184, 'Fourth', 'ME', 'TME 801', 'Eighth'),
(185, 'Fourth', 'ME', 'TME 802', 'Eighth'),
(186, 'Fourth', 'ME', 'TME 02X', 'Eighth'),
(187, 'Fourth', 'ME', 'TME 03X', 'Eighth'),
(188, 'Second', 'Civil', 'TMA 301', 'Third'),
(189, 'Second', 'Civil', 'TCE 301', 'Third'),
(190, 'Second', 'Civil', 'TCE 302', 'Third'),
(191, 'Second', 'Civil', 'TCE 303', 'Third'),
(192, 'Second', 'Civil', 'TME 303', 'Third'),
(193, 'Second', 'Civil', 'THU 301', 'Third'),
(194, 'Second', 'Civil', 'TCE 401', 'Fourth'),
(195, 'Second', 'Civil', 'TCE 402', 'Fourth'),
(196, 'Second', 'Civil', 'TCE 403', 'Fourth'),
(197, 'Second', 'Civil', 'TCE 404', 'Fourth'),
(198, 'Second', 'Civil', 'TCE 405', 'Fourth'),
(199, 'Second', 'Civil', 'TCE 406', 'Fourth'),
(200, 'Third', 'Civil', 'TCE 501', 'Fifth'),
(201, 'Third', 'Civil', 'TCE 502', 'Fifth'),
(202, 'Third', 'Civil', 'TCE 503', 'Fifth'),
(203, 'Third', 'Civil', 'TCE 504', 'Fifth'),
(204, 'Third', 'Civil', 'TCE 505', 'Fifth'),
(205, 'Third', 'Civil', 'TCE 506', 'Fifth'),
(206, 'Third', 'Civil', 'TCE 601', 'Sixth'),
(207, 'Third', 'Civil', 'TCE 602', 'Sixth'),
(208, 'Third', 'Civil', 'TCE 603', 'Sixth'),
(209, 'Third', 'Civil', 'TCE 604', 'Sixth'),
(210, 'Third', 'Civil', 'TCE 605', 'Sixth'),
(211, 'Third', 'Civil', 'TCE 606', 'Sixth'),
(212, 'Fourth', 'Civil', 'TCE 701', 'Seventh'),
(213, 'Fourth', 'Civil', 'TCE 702', 'Seventh'),
(214, 'Fourth', 'Civil', 'TCE 703', 'Seventh'),
(215, 'Fourth', 'Civil', 'TCE 01X', 'Seventh'),
(216, 'Fourth', 'Civil', 'TOE XX', 'Seventh'),
(217, 'Fourth', 'Civil', 'TCE 03X', 'Eighth'),
(218, 'Fourth', 'Civil', 'TCE 04X', 'Eighth'),
(219, 'Fourth', 'Civil', 'TCE 05X', 'Eighth'),
(220, 'Fourth', 'Civil', 'TCE 06X', 'Eighth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admincredentials`
--
ALTER TABLE `admincredentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminemail` (`adminemail`);

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admincredentials`
--
ALTER TABLE `admincredentials`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facultydetails`
--
ALTER TABLE `facultydetails`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
