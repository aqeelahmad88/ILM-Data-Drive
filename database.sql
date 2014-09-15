-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2014 at 01:05 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ilm`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Information Technology'),
(2, 'Accounts'),
(3, 'Medical');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `semester_id` int(255) DEFAULT NULL,
  `subject_id` int(255) DEFAULT NULL,
  `filename` text,
  `filesize` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `doc_paths` text,
  `uploaded_filename` text,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `privacy` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `semester_id` int(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) DEFAULT NULL,
  `user_rights` int(11) DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `department` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `postal_address` tinytext,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `facebook` text,
  `twitter` text,
  `linkedin` text,
  `avatar` text,
  `resume` longtext,
  `privacy` longtext,
  `about` longtext,
  `active` int(11) DEFAULT '1',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `premium` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `user_rights`, `first_name`, `last_name`, `father_name`, `user_name`, `email`, `password`, `department`, `gender`, `blood_group`, `cnic`, `contact_number`, `dob`, `postal_address`, `city`, `province`, `country`, `facebook`, `twitter`, `linkedin`, `avatar`, `resume`, `privacy`, `about`, `active`, `time`, `premium`) VALUES
(7, 2, 0, 'Aqeel', 'Ahmad', '', 'comet_nice', 'comet_nice2@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 'male', '', '', '', '2014-09-17', '', '', '', '', '', '', '', NULL, NULL, NULL, '', 1, '2014-09-15 00:41:00', 0),
(8, 1, 0, 'Asad', 'Naseem', 'Naseem Sarwar', 'asad', 'asad@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 'male', 'A?', '352027465749', '03134292529', '2014-09-10', '140-6-AII Township', 'Lahore', 'Punjab', 'Pakistan', 'https://www.facebook.com/Sera3Com', 'https://twitter.com/Sera3_comm', 'https://linkedin.com/Sera3_comm', '1410763871_liverpool.png', '{"edu_degree":["Masters In Information Technology (MIT)","Bachelor In Science (B.Sc)","Intermediate In computer (ICS)","Secondary Education (Matriculation)"],"edu_institution":["Govt. College Model Town","Superior University","Govt. Hight School","Superior Universityy"],"edu_year":["2014","2010","2000","2000"],"ex_organization":["Lead Concept","U-Track (Pvt) Ltd.","Sea Breeze Travels","Vision Soft Technologies"],"ex_designation":["Assistant web developer","Network Support Officer","Senior Web Developer","Software Engineer (PHP Developer)"],"ex_from":["2013","2011","2000","2003"],"ex_to":["2010","2005","2002","1999"],"skill_name":["Jquery","CSS","Javascript","HTML","Ajax","PHP"],"about_skill":["99","98","86","86","85","82"]}', '{"father_name":"on","email":"on","gender":"on","blood_group":"on","cnic":"on","contact_number":"on","dob":"on","postal_address":"on","city":"on","province":"on","country":"on","facebook":"on","twitter":"on","linkedin":"on","resume":"on"}', 'MASTERING MAGENTO is the perfect companion guide for both newcomers and experienced Magento users. Designers, developers and store owners alike will have a better understanding of how Magento works', 1, '2014-09-15 00:42:04', 0),
(10, 2, 1, 'Aqeel', 'Ahmad', NULL, 'admin', 'admin@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'male', NULL, NULL, NULL, '2014-09-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2014-09-15 06:19:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'Teacher'),
(2, 'Student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
