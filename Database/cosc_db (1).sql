-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2015 at 05:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cosc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cosc3332_sgrades`
--

CREATE TABLE IF NOT EXISTS `cosc3332_sgrades` (
  `id` int(11) NOT NULL,
  `s1i1pq1` int(5) DEFAULT NULL,
  `s1i1q1` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cosc3332_sgrades`
--

INSERT INTO `cosc3332_sgrades` (`id`, `s1i1pq1`, `s1i1q1`) VALUES
(0, 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cosc3332_sprogress`
--

CREATE TABLE IF NOT EXISTS `cosc3332_sprogress` (
  `id` int(11) NOT NULL,
  `s1i1assgUName` varchar(25) NOT NULL,
  `s1i1assgUDate` date NOT NULL,
  `s1i1qAttempts` int(2) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollement`
--

CREATE TABLE IF NOT EXISTS `enrollement` (
  `id` int(11) NOT NULL,
  `cosc3332` tinyint(1) NOT NULL,
  `otherclass` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollement`
--

INSERT INTO `enrollement` (`id`, `cosc3332`, `otherclass`) VALUES
(0, 1, 0),
(1186213, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(1186213, '1434595273');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `fname`, `lname`, `email`, `password`, `salt`) VALUES
(0, 'Arturo_Admin', '', '', 'agerardosn28@hotmail.com', '27038c8112d198172a99b83382a83b3509ab1db08463b5b9c4df62805998c7479ce13d6fe1cce50a195fb3824b796e0395eee5c2dbfafdd8371f895cedc174cc', '281b4a1c3d5442756a7898d449fac7b6a5eb162c7dca4d772463120f380f9b348aaf981eafca796fb458f4c28926977accd6bf6d7441b8a01fc24ee5e8e5b6ef'),
(1186213, 'agsalaz2', 'Arturo', 'Salazar', 'agsalazar@uh.edu', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `id` int(10) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `qType` varchar(2) NOT NULL,
  `question` varchar(255) NOT NULL,
  `rightAnswer` varchar(255) NOT NULL,
  `wAnswer1` varchar(255) NOT NULL,
  `wAnswer2` varchar(255) NOT NULL,
  `wAnswer3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`id`, `topic`, `qType`, `question`, `rightAnswer`, `wAnswer1`, `wAnswer2`, `wAnswer3`) VALUES
(1, 'numbers', 'mc', 'What is the binary representation of 139 base 10?', '10001011', '10011011', '10011001', '11001011'),
(2, 'numbers', 'tf', 'Is 294 the decimal representation of 100100110? ', 'TRUE', 'FALSE', 'null', 'null'),
(3, 'numbers', 'mc', 'What is the octal representation of 326 base 10?', '506', '551', '497', '499'),
(4, 'numbers', 'tf', 'Is 236 the decimal representation of 342 base 8? ', 'FALSE', 'TRUE', 'null', 'null'),
(5, 'numbers', 'mc', 'What is the octal representation of 110110100?', '664', '662', '679', '632'),
(6, 'numbers', 'mc', 'What is the binary representation of 346 base 8?', '11100110', '11010110', '10001001', '10100110'),
(7, 'numbers', 'tf', 'Is 111100111001 the binary representation of 0xF39? ', 'TRUE', 'FALSE', 'null', 'null'),
(8, 'numbers', 'fr', 'Convert the following to hexadecimal: 2668', '0xB6', 'null', 'null', 'null'),
(9, 'numbers', 'fr', 'Convert the following to decimal: 0x3B9D', '15231', 'null', 'null', 'null'),
(10, 'numbers', 'fr', 'Convert the following to octal: 0x12FF', '11377', 'null', 'null', 'null'),
(11, 'numbers', 'mc', 'Convert the following to octal: 0xB4F79', '2647571', '2954491', '2833912', '2653371'),
(12, 'numbers', 'tf', 'Is 1010100111000 the binary representation of 5432 base 10?', 'TRUE', 'FALSE', 'null', 'null'),
(13, 'numbers', 'tf', 'Is 0x32FD the hexadecimal representation of 31374 base 8? ', 'FALSE', 'TRUE', 'null', 'null'),
(14, 'numbers', 'mc', 'What is the octal representation of 7521 base 10?', '16541', '17550', '16342', '17093'),
(15, 'numbers', 'mc', 'What is the hexadecimal representation of 17323 base 8?', '0x1ED3', '0x1FD3', '0x1DE4', '0x1ED4'),
(16, 'numbers', 'tf', 'Is 3038 the decimal representation of 0xBE1? ', 'FALSE', 'TRUE', 'null', 'null'),
(17, 'numbers', 'tf', 'Is 4353 the octal representation of 100011101011?', 'TRUE', 'FALSE', 'null', 'null'),
(18, 'numbers', 'fr', 'Convert the following to binary, octal, and hexadecimal: 467 base 10 (separated by commas)', '111010011, 723, 0x1D3', 'null', 'null', 'null'),
(19, 'numbers', 'fr', 'Convert the following to hexadecimal: 110101001011101011010010', '0xD4BAD2', 'null', 'null', 'null'),
(20, 'numbers', 'fr', 'Convert the following to binary: 0xCF302A', '1.10011E+23', 'null', 'null', 'null'),
(21, 'numbers', 'mc', 'What is the octal representation of 110010111?', '626', '637', '627', '636'),
(22, 'numbers', 'mc', 'What is the hexadecimal representation of 331395 base 10?', '0xCF1', '0xCF3', '0xCE1', '0xCE2'),
(23, 'numbers', 'tf', 'Is 3621 the decimal representation of 0xE25? ', 'TRUE', 'FALSE', 'null', 'null'),
(24, 'numbers', 'mc', 'What is the binary representation of 451 base 8?', '100101001', '100101101', '101001001', '100100001'),
(25, 'numbers', 'tf', 'Is 0x16A the hexadecimal representation of 551? ', 'FALSE', 'TRUE', 'null', 'null'),
(26, 'numbers', 'tf', 'Is 342 the octal representation of 11100100? ', 'FALSE', 'TRUE', 'null', 'null'),
(27, 'numbers', 'mc', 'What is the decimal representation of 0xB1A2?', '45474', '45490', '46021', '44783'),
(28, 'numbers', 'fr', 'Convert the following to decimal: 0x5EC3', '24259', 'null', 'null', 'null'),
(29, 'numbers', 'fr', 'Convert the following to binary: 6204 base 8', '1.1001E+11', 'null', 'null', 'null'),
(30, 'numbers', 'fr', 'Convert the following to octal: 110110010', '662', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`),
  KEY `topic_by` (`topic_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cosc3332_sgrades`
--
ALTER TABLE `cosc3332_sgrades`
  ADD CONSTRAINT `FK_studentID` FOREIGN KEY (`id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollement`
--
ALTER TABLE `enrollement`
  ADD CONSTRAINT `FK_enrollement` FOREIGN KEY (`id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `members` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `members` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
