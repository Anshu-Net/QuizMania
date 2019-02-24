-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2019 at 05:13 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qmania`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `answerid` int(6) NOT NULL AUTO_INCREMENT,
  `answerdesc` varchar(450) NOT NULL,
  `status` varchar(25) NOT NULL,
  `quesid` int(10) NOT NULL,
  `userid` varchar(16) NOT NULL,
  `answerdescmark` int(11) DEFAULT NULL,
  PRIMARY KEY (`answerid`),
  UNIQUE KEY `quesid_2` (`quesid`,`userid`),
  KEY `userid` (`userid`),
  KEY `quesid` (`quesid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answerid`, `answerdesc`, `status`, `quesid`, `userid`, `answerdescmark`) VALUES
(24, 'kjbkjkjhjk', 'completed', 51, '01FM15CCA002', 1),
(25, 'hii', 'completed', 51, '01FM15CCA007', 2),
(35, 'hww', 'completed', 39, '01FM15CCA007', 5),
(36, 'hello', 'completed', 40, '01FM15CCA007', 4),
(37, 'hh', 'completed', 41, '01FM15CCA007', 2),
(41, 'abhishek', 'completed', 39, '01FM15CCA002', 5),
(42, 'gowda', 'completed', 40, '01FM15CCA002', 5),
(43, 'patil', 'completed', 41, '01FM15CCA002', 5),
(46, 'dos attack', 'completed', 86, '01FM15CCA015', 2);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batchid` int(10) NOT NULL AUTO_INCREMENT,
  `batchname` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'activated',
  PRIMARY KEY (`batchid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchid`, `batchname`, `status`) VALUES
(2, '2015-2018', 'activated'),
(3, '2016-2019', 'activated'),
(4, '2017-2020', 'activated'),
(5, '2018-2021', 'activated'),
(13, '2019-2022', 'De-activated');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `groupid` int(10) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(26) NOT NULL,
  `userid` varchar(16) NOT NULL,
  `batch` varchar(12) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'activated',
  PRIMARY KEY (`groupid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupid`, `groupname`, `userid`, `batch`, `status`) VALUES
(10, 'MCA', 'fac_001', '2015-2018', 'De-activated'),
(11, 'MCA', 'Anshu007', '2015-2018', 'activated'),
(19, 'Network', 'faculty01', '2016-2019', 'activated'),
(20, 'web', 'faculty01', '2015-2018', 'activated'),
(22, 'Data Science', 'faculty01', '2017-2020', 'activated'),
(23, 'new web', 'faculty01', '2017-2020', 'activated'),
(24, 'Group 1', 'faculty01', '2016-2019', 'activated'),
(25, 'demo', 'faculty01', '2016-2019', 'activated'),
(26, 'Data Science', 'faculty02', '2016-2019', 'activated'),
(27, 'Cyber Security', 'faculty03', '2016-2019', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `groupmap`
--

DROP TABLE IF EXISTS `groupmap`;
CREATE TABLE IF NOT EXISTS `groupmap` (
  `groupmapid` int(10) NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL,
  `userid` varchar(16) NOT NULL,
  PRIMARY KEY (`groupmapid`),
  KEY `userid` (`userid`),
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupmap`
--

INSERT INTO `groupmap` (`groupmapid`, `groupid`, `userid`) VALUES
(28, 10, '01FM15CCA022'),
(30, 19, '01FM15CCA002'),
(32, 20, '01FM15CCA022'),
(34, 22, '01FM15CCA006'),
(35, 19, '01FM15CCA007'),
(36, 24, '01FM15CCA002'),
(37, 25, '01FM15CCA002'),
(38, 25, '01FM15CCA007'),
(39, 26, '01FM15CCA002'),
(40, 26, '01FM15CCA007'),
(41, 26, '01FM15CCA056'),
(42, 27, '01FM15CCA002'),
(43, 27, '01FM15CCA007'),
(44, 27, '01FM15CCA015'),
(45, 27, '01FM15CCA056');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `option_id` int(5) NOT NULL AUTO_INCREMENT,
  `options` varchar(80) NOT NULL,
  `quesid` int(10) NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `quesid` (`quesid`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `options`, `quesid`) VALUES
(27, 'true', 15),
(32, 'false', 15),
(41, 'true', 20),
(65, 'Narendra Modi', 30),
(66, 'Sonia Gandhi', 30),
(67, 'Rahul Gandhi', 30),
(68, 'Sourav basu roy', 30),
(69, 'true', 31),
(70, 'false', 33),
(71, 'true', 35),
(80, '1', 38),
(81, '2', 38),
(82, '3', 38),
(83, '4', 38),
(84, 'hi', 49),
(85, 'hello', 49),
(86, 'hii', 49),
(87, 'hey', 49),
(88, 'false', 50),
(109, '1', 72),
(110, '2', 72),
(111, '3', 72),
(112, '4', 72),
(113, 'false', 73),
(114, '', 74),
(115, 'true', 75),
(116, 'false', 76),
(117, '1', 77),
(118, '2', 77),
(119, '3', 77),
(120, '3', 77),
(121, 'true', 78),
(122, 'false', 79),
(123, '1', 80),
(124, '2', 80),
(125, '3', 80),
(126, '4', 80),
(127, 'true', 81),
(128, 'false', 82),
(129, 'Raw facts and figures', 83),
(130, 'Bits', 83),
(131, 'Values', 83),
(132, 'undefined variable', 83),
(133, 'true', 84),
(138, 'true', 87),
(139, 'world web web', 88),
(140, 'wide web world ', 88),
(141, 'world web  wide', 88),
(142, 'world web  wide', 88);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `quesid` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(450) NOT NULL,
  `questype` varchar(85) NOT NULL,
  `correctans_id` int(10) DEFAULT NULL,
  `mark` int(5) NOT NULL,
  `quizid` int(15) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  PRIMARY KEY (`quesid`),
  KEY `quizid` (`quizid`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quesid`, `question`, `questype`, `correctans_id`, `mark`, `quizid`, `user_id`) VALUES
(5, 'HEllo', 'descriptive', NULL, 2, 1, '0'),
(15, 'Am i Kaushik', 'truefalse', 27, 1, 1, '0'),
(19, 'hjdhdjh', 'multiplechoice', NULL, 1, 1, 'Anshu007'),
(20, 'jkwejkwej', 'truefalse', 41, 1, 1, 'Anshu007'),
(30, 'Who is the PM of India?', 'multiplechoice', 65, 1, 21, 'faculty01'),
(31, 'Answer is true.', 'truefalse', 69, 1, 21, 'faculty01'),
(32, 'Full form of TCP?', 'descriptive', NULL, 1, 21, 'faculty01'),
(33, 'Answer is false.', 'truefalse', 70, 5, 11, 'faculty01'),
(34, 'Descrptive question?', 'descriptive', NULL, 2, 11, 'faculty01'),
(35, 'true', 'truefalse', 71, 5, 11, 'faculty01'),
(38, 'choose 1', 'multiplechoice', 80, 2, 11, 'faculty01'),
(39, 'wt is network', 'descriptive', NULL, 5, 22, 'faculty01'),
(40, 'wt is  router', 'descriptive', NULL, 5, 22, 'faculty01'),
(41, 'wt is switch', 'descriptive', NULL, 5, 22, 'faculty01'),
(49, 'choose 2?', 'multiplechoice', 85, 2, 26, 'faculty01'),
(50, 'select false ?', 'truefalse', 88, 2, 26, 'faculty01'),
(51, 'sdfds', 'descriptive', NULL, 4, 26, 'faculty01'),
(52, 'asdsfdsadf', 'descriptive', NULL, 4, 26, 'faculty01'),
(53, 'Desc 2 ?', 'descriptive', NULL, 2, 11, 'faculty01'),
(63, 'true', 'truefalse', 97, 1, 11, 'faculty01'),
(64, 'true?', 'truefalse', 98, 2, 11, 'faculty01'),
(72, 'choose 3?', 'multiplechoice', 111, 2, 27, 'faculty01'),
(73, 'false?', 'truefalse', 113, 1, 27, 'faculty01'),
(74, 'True?', 'truefalse', 114, 1, 27, 'faculty01'),
(75, 'Answer True', 'truefalse', 115, 1, 27, 'faculty01'),
(76, 'Answer False', 'truefalse', 116, 1, 27, 'faculty01'),
(77, 'chose 4', 'multiplechoice', 120, 1, 28, 'faculty01'),
(78, 'ans true', 'truefalse', 121, 1, 28, 'faculty01'),
(79, 'ans false', 'truefalse', 122, 1, 28, 'faculty01'),
(80, 'chose 3', 'multiplechoice', 125, 1, 29, 'faculty01'),
(81, 'true..', 'truefalse', 127, 1, 29, 'faculty01'),
(82, 'false...', 'truefalse', 128, 1, 29, 'faculty01'),
(83, 'What is data?', 'multiplechoice', 129, 2, 30, 'faculty02'),
(84, 'Data analyst are those who study about data. ', 'truefalse', 133, 1, 30, 'faculty02'),
(86, 'What is DOS attack?', 'descriptive', NULL, 2, 31, 'faculty03'),
(87, 'cyber attack happens on internet.', 'truefalse', 138, 1, 31, 'faculty03'),
(88, 'Full form WWW.', 'multiplechoice', 142, 1, 31, 'faculty03');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `quizid` int(15) NOT NULL AUTO_INCREMENT,
  `quizname` varchar(24) NOT NULL,
  `description` varchar(180) NOT NULL,
  `timer` int(180) NOT NULL,
  `groupid` int(14) DEFAULT NULL,
  `userid` varchar(16) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`quizid`),
  KEY `userid` (`userid`),
  KEY `groupid` (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `description`, `timer`, `groupid`, `userid`, `status`) VALUES
(1, 'Basic', 'Hello', 20, NULL, 'fac_001', 'De-activated'),
(3, 'Baisc Quiz', 'basics', 30, NULL, 'fac_001', 'activated'),
(11, 'Network Unit 1', 'Test 01', 30, NULL, 'faculty01', 'activated'),
(21, 'Quiz1', 'quiz for demo', 5, NULL, 'faculty01', 'De-activated'),
(22, 'Quiz3', 'mk', 5, NULL, 'faculty01', 'activated'),
(26, 'demo', 'ok', 5, NULL, 'faculty01', 'activated'),
(27, 'hello', 'hi', 1, NULL, 'faculty01', 'activated'),
(28, 'test2', 'test for demo', 5, NULL, 'faculty01', 'De-activated'),
(29, 'true false', 'check', 2, NULL, 'faculty01', 'De-activated'),
(30, 'Data Science', 'Introduction to data science', 10, NULL, 'faculty02', 'activated'),
(31, 'Cyber Attack', 'All about attacks', 5, NULL, 'faculty03', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `quizmap`
--

DROP TABLE IF EXISTS `quizmap`;
CREATE TABLE IF NOT EXISTS `quizmap` (
  `quizmapid` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`quizmapid`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizmap`
--

INSERT INTO `quizmap` (`quizmapid`, `quiz_id`, `group_id`) VALUES
(31, 1, 12),
(32, 9, 12),
(33, 9, 12),
(34, 9, 10),
(35, 9, 13),
(36, 9, 11),
(37, 9, 10),
(38, 9, 11),
(39, 9, 10),
(40, 9, 11),
(41, 9, 10),
(42, 1, 10),
(43, 1, 10),
(44, 1, 13),
(46, 10, 10),
(47, 11, 19),
(48, 11, 19),
(49, 12, 20),
(50, 13, 19),
(51, 13, 20),
(52, 17, 19),
(53, 17, 20),
(54, 21, 19),
(55, 22, 19),
(56, 22, 20),
(57, 22, 22),
(58, 22, 24),
(59, 24, 19),
(60, 24, 19),
(61, 24, 20),
(62, 24, 22),
(63, 24, 23),
(64, 24, 24),
(65, 24, 24),
(66, 25, 19),
(67, 25, 20),
(68, 25, 22),
(69, 25, 23),
(70, 25, 24),
(71, 26, 19),
(72, 26, 25),
(73, 12, 19),
(74, 11, 20),
(75, 11, 25),
(76, 27, 19),
(77, 27, 20),
(78, 28, 19),
(79, 28, 20),
(80, 28, 24),
(81, 28, 23),
(82, 28, 22),
(83, 28, 25),
(84, 29, 19),
(85, 29, 20),
(86, 29, 22),
(87, 29, 23),
(88, 29, 24),
(89, 29, 25),
(90, 30, 26),
(91, 31, 27);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `userid` varchar(16) NOT NULL,
  `quizid` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`,`quizid`),
  KEY `userid` (`userid`),
  KEY `quizid` (`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`userid`, `quizid`, `score`, `status`) VALUES
('01FM15CCA002', 22, 15, 'completed'),
('01FM15CCA002', 26, 3, 'completed'),
('01FM15CCA002', 27, 4, 'completed'),
('01FM15CCA002', 29, 3, 'completed'),
('01FM15CCA002', 30, 3, 'completed'),
('01FM15CCA007', 22, 11, 'completed'),
('01FM15CCA007', 26, 6, 'completed'),
('01FM15CCA007', 27, 3, 'completed'),
('01FM15CCA007', 29, 1, 'completed'),
('01FM15CCA015', 31, 4, 'completed'),
('01FM15CCA056', 30, 3, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(16) NOT NULL,
  `fname` varchar(14) NOT NULL,
  `lname` varchar(14) NOT NULL,
  `password` varchar(16) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `batch` varchar(12) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'De-activated',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `password`, `gender`, `email`, `batch`, `type`, `status`) VALUES
('01FM15CCA002', 'abhishek', 'gowda', '1234', 'male', 'abhi@gmail.com', '2016-2019', 'student', 'activated'),
('01FM15CCA004', 'Aditi', 'jha', 'abcd', 'female', 'aditi@gmail.com', '2018-2021', 'student', 'activated'),
('01FM15CCA006', 'Ankush', 'Manyalli', '1234', 'male', 'Anku@gmail.com', '2017-2020', 'student', 'activated'),
('01FM15CCA007', 'Anshuman', 'Gupta', '1234', 'male', 'Anshu@gmail.com', '2016-2019', 'student', 'activated'),
('01FM15CCA015', 'Dinesh', 'Deshpande', '1234', 'male', 'Dinesh@gmail.com', '2016-2019', 'student', 'activated'),
('01FM15CCA022', 'Kaushik', 'Das', '1234', 'male', 'kaushikdas771@gmail.com', '2015-2018', 'student', 'activated'),
('01FM15CCA056', 'Sourav Basu', 'Roy', '1234', 'male', 'Sourav@gmail.com', '2016-2019', 'student', 'activated'),
('admin', 'admin', 'admin', 'admin', 'male', 'admin@qmanial.com', NULL, 'admin', 'activated'),
('Anshu007', 'Ansh', 'Gup', '1234', 'male', 'Ansh@gmail.com', NULL, 'faculty', 'activated'),
('faculty01', 'Tamal', 'Dey', '1234', 'male', 'Tamal@gmail.com', NULL, 'faculty', 'activated'),
('faculty02', 'Thenmozhi', 'S', '1234', 'female', 'Thenmozhi@gmail.com', NULL, 'faculty', 'activated'),
('faculty03', 'Veena', 'S', '1234', 'female', 'Venna@pes.edu', NULL, 'faculty', 'activated'),
('fac_001', 'kd', 'das', 'abcd', 'Male', 'kaushikdas771@gmail.com', NULL, 'faculty', 'De-activated');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`quesid`) REFERENCES `questions` (`quesid`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `groupmap`
--
ALTER TABLE `groupmap`
  ADD CONSTRAINT `groupmap_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `groupmap_ibfk_2` FOREIGN KEY (`groupid`) REFERENCES `group` (`groupid`);

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_ibfk_1` FOREIGN KEY (`quesid`) REFERENCES `questions` (`quesid`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`groupid`) REFERENCES `group` (`groupid`);

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `rank_ibfk_3` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
