-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2014 at 03:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `urltitle` varchar(200) DEFAULT NULL,
  `menutitle` text,
  `startpage` tinyint(1) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posting_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `text` text NOT NULL,
  `description` text,
  `keywords` text NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `templateURL` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `urltitle` (`urltitle`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `urltitle`, `menutitle`, `startpage`, `last_updated`, `posting_time`, `text`, `description`, `keywords`, `position`, `status`, `templateURL`) VALUES
(1, 'The Fruit Stand - Your source for Fruit!', '', 'Fruit Stand Home', 1, '2014-06-07 11:57:16', '2013-02-01 19:00:51', '<style>body{color:#900;font-size:14px;font-style:italic;background-color:#0FF;}h1{font-size:24px;color:#F00;font-style:oblique;}td{background-color:#CCC;}a{text-decoration:none;}a:hover{color:#300;font-style:italic;}h3{color:#000;}\r\n</style><style>body{margin:1%;padding:1%;color:#900;font-size:14px;font-family:"Courier New", Courier, monospace;font-style:italic;background-color:#0FF;}h1{font-size:24px;color:#F00;font-style:oblique;}td{background-color:#CCC;}a{text-decoration:none;}a:hover{color:#300;font-style:italic;}h3{color:#000;}\n</style><style>body{margin:3%;padding:5%;color:#900;font-size:14px;font-family:"Courier New", Courier, monospace;font-style:italic;background-color:#0FF;}h1{font-size:24px;color:#F00;font-style:oblique;}td{background-color:#CCC;}a{text-decoration:none;}a:hover{color:#300;font-<style>body{margin:10%;padding:5%;color:#900;font-size:14px;font-family:"Courier New", Courier, monospace;font-style:italic;background-color:#0FF;}h1{font-size:24px;color:#F00;font-style:oblique;}table{background-color:#CCC;}a{text-decoration:none;}a:hover{color:#300;font-style:italic;}\n</style><h3>This is the home page. Here you find lots of information about fruit stands!</h3>\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and  typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy  text ever since the 1500s, when an unknown printer took a galley of  type and scrambled it to make a type specimen book. It has survived not  only five centuries, but also the leap into electronic typesetting,  remaining essentially unchanged. It was popularised in the 1960s with  the release of Letraset sheets containing Lorem Ipsum passages, and more  recently with desktop publishing software like Aldus PageMaker  including versions of Lorem Ipsum.</p>', 'Come to appleton and find all your fruit needs in one simple place.', 'fruit,apples,grapes', 0, 1, 'temp3.css'),
(2, 'Green Pears', 'green-pears', '', 0, '2014-06-07 12:24:53', '0000-00-00 00:00:00', '<style>body{background-color:#CCC;padding:5%;font-family:"Courier New", Courier, monospace;text-outline:#900;color: #F00;}table{background-color:#C33;}</style><!-- body{background-color:#CCC;padding:5%;font-family:"Courier New", Courier, monospace;text-outline:#900;color: #F00;}table{background-color:#C33;} -->\n<p><strong><img title="Embarassed" src="admin/tiny_mce/plugins/emotions/img/smiley-embarassed.gif" border="0" alt="Embarassed" /><img style="float: right;" src="admin/images/logo.jpg" alt="" width="700" height="413" />Pears</strong> are great.</p>', '', 'pears,fruit', 0, 1, 'temp1.css'),
(3, 'Red Apples', 'red-apples', NULL, 0, '2013-02-02 09:16:45', '0000-00-00 00:00:00', '<p>This is a page about <strong><em>apples and fruit</em></strong>.</p>', NULL, 'apples,fruit', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '098f6bcd4621d373cade4e832627b4f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
