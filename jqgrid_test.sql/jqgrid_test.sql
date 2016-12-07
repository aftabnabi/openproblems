-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2010 at 05:35 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jqgrid_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesssponsors`
--

CREATE TABLE IF NOT EXISTS `businesssponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `sponsorname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `businesssponsors`
--

INSERT INTO `businesssponsors` (`id`, `groupname`, `sponsorname`) VALUES
(1, 'LUMS', 'Ashraf'),
(2, 'Fast', 'Fahad'),
(3, 'LUMS', 'Liaqat'),
(4, 'Fast', 'Fahim');

-- --------------------------------------------------------

--
-- Table structure for table `projectestimatetypes`
--

CREATE TABLE IF NOT EXISTS `projectestimatetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projectestimatetypes`
--

INSERT INTO `projectestimatetypes` (`id`, `name`) VALUES
(2, 'HighLevel'),
(3, 'PreAnalysis'),
(4, 'PostAnalysis'),
(5, 'PostDesign');

-- --------------------------------------------------------

--
-- Table structure for table `projectphases`
--

CREATE TABLE IF NOT EXISTS `projectphases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `projectphases`
--

INSERT INTO `projectphases` (`id`, `name`) VALUES
(1, 'Inception'),
(2, 'Requirements'),
(3, 'Analysis'),
(4, 'Design'),
(5, 'Coding'),
(6, 'QA'),
(7, 'UserTesting'),
(8, 'Implementation'),
(9, 'PostImplementation');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `highlevelideano` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `projectno` int(11) DEFAULT NULL,
  `approvalstatus` char(1) DEFAULT NULL,
  `subprojectno` int(11) DEFAULT NULL,
  `ba` varchar(30) NOT NULL,
  `deliverydate` date DEFAULT NULL,
  `pjm` varchar(50) DEFAULT NULL,
  `devlead` varchar(255) DEFAULT NULL,
  `projectphaseid` int(11) DEFAULT NULL,
  `projectstartdate` date NOT NULL,
  `projectestimate` varchar(255) DEFAULT NULL,
  `estimatetypeid` int(11) DEFAULT NULL,
  `team` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id_3` (`id`),
  KEY `Id` (`highlevelideano`),
  KEY `Id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `highlevelideano`, `name`, `projectno`, `approvalstatus`, `subprojectno`, `ba`, `deliverydate`, `pjm`, `devlead`, `projectphaseid`, `projectstartdate`, `projectestimate`, `estimatetypeid`, `team`) VALUES
(1, 1, 'Return To School - Fixed Payments', 1, 'A', 1, 'katrina', '2010-11-25', 'Lorraine Piechota', 'Dinesh', 1, '2010-12-03', NULL, 1, NULL),
(3, 4, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 3, 'A', 1, 'asdfsdf', '2010-11-25', 'Jeff Wensel', NULL, 3, '2010-12-03', NULL, 3, NULL),
(5, 2, 'Modify Class 809 Report to Exclude Unidfs', 3, 'A', 1, '', '2010-11-25', 'asdfasd', NULL, 5, '2010-12-03', NULL, 2, NULL),
(6, 7, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 6, 'A', 2, 'asdfasd', '2010-11-25', 'asdfadf', NULL, 6, '2010-12-03', NULL, 3, NULL),
(25, 6, '', 0, '<', 0, '<input role="textbox" name="ba', '0000-00-00', '<input role="textbox" name="devlead" id="2_devlead', '', 0, '0000-00-00', '<input role="textbox" \r\nname="projectestimate" id="2_projectestimate" style="width: 98%;" type="text">', 0, ''),
(8, 2, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 8, 'U', 2, 'asdf', '2011-01-14', 'cvbcvb', NULL, 8, '2010-11-08', NULL, 2, NULL),
(23, 6, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 6, 'A', 2, 'asdfasd', '2010-12-03', 'asdfadf', '', 0, '2010-11-25', '', 0, ''),
(24, 6, '', 0, '<', 0, '<input role="textbox" name="ba', '0000-00-00', '<input role="textbox" name="devlead" id="2_devlead', '', 0, '0000-00-00', '<input role="textbox" name="projectestimate" id="2_projectestimate" style="width: 98%;" type="text">', 0, ''),
(12, 13, '', 0, '', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(13, 14, '', 0, '', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(14, 11, '', 0, '', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(15, 11, '', 0, '', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(16, 11, '', 0, '', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(17, 11, 'Enter name here', 2, '<', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(18, 11, 'Enter name here', 2, 'A', 0, '<input role="textbox" name="ba', '0000-00-00', '', '', 0, '0000-00-00', '', 0, ''),
(19, 11, 'Enter name here', 0, 'A', 0, '', '0000-00-00', '', '', 0, '2010-12-22', '', 0, ''),
(20, 11, 'Enter name here', 23, 'A', 5, 'fgdgh', '2010-12-23', 'devlead', '', 0, '2010-12-13', 'projestimate', 0, ''),
(21, 11, 'Enter name here', 3, 'U', 0, '', '2010-12-16', '', '', 0, '2010-12-20', '', 0, ''),
(22, 10, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 10, 'A', 2, '', '2010-12-03', 'sdf', '', 0, '2010-11-25', '', 0, ''),
(26, 6, '', 0, 'U', 0, '<input role="textbox" name="ba', '0000-00-00', '<input role="textbox" name="devlead" id="2_devlead', '', 0, '0000-00-00', '<input role="textbox" name="projectestimate" id="2_projectestimate" style="width: 98%;" type="text">', 0, ''),
(27, 6, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 6, 'A', 2, 'asdfasd', '2010-12-03', 'asdfadf', '', 0, '2010-11-25', '', 0, ''),
(28, 6, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 6, 'A', 2, 'asdfasd', '2010-12-03', 'asdfadf', '', 0, '2010-11-25', '', 0, ''),
(29, 8, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 8, 'U', 2, 'asdf', '2010-11-08', 'cvbcvb', '', 0, '2011-01-14', '', 0, ''),
(30, 6, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 6, 'A', 2, 'asdfasd', '2010-12-03', 'asdfadf', '', 0, '2010-11-25', '', 0, ''),
(31, 6, 'Modify Class 809 Report to Exclude Unisured Loans - MP', 6, 'A', 2, 'asdfasd', '2010-12-03', 'asdfadf', '', 0, '2010-11-25', '', 0, ''),
(32, 7, '', 0, '', 0, '', '0000-00-00', '', '', 0, '0000-00-00', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
