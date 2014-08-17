<?php
include("config.php");
//this script installs the table in your mysql database. You can delete this script if the database is created succesfully. 

database_connect();

$query3 =
"CREATE TABLE IF NOT EXISTS `content` (
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
   PRIMARY KEY (`id`),
  KEY `urltitle` (`urltitle`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0;";

$created3 = mysql_query($query3);
$created1 = mysql_query("ALTER TABLE `content` ADD `templateURL` TEXT NOT NULL ");

$created6 = mysql_query("ALTER TABLE `content` ADD `value` INT");


$error3 = mysql_error();

mysql_query("CREATE TABLE IF NOT EXISTS `login` (`username` varchar(40),`password` varchar(100))");
$passEncr=md5("test");
mysql_query("INSERT INTO `login` values('admin','$passEncr')"); 

$query4 = "INSERT INTO `content` (`id`, `title`, `urltitle`, `menutitle`, `startpage`, `last_updated`, `posting_time`, `text`, `description`, `keywords`, `position`, `status`) VALUES
(1, 'The Fruit Stand - Your source for Fruit!','', 'Fruit Stand Home', 1, '2013-02-02 14:47:20', '2013-02-02 00:30:51', '<h3>This is the home page. Here you find lots of information about fruit stands!</h3>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and  typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy  text ever since the 1500s, when an unknown printer took a galley of  type and scrambled it to make a type specimen book. It has survived not  only five centuries, but also the leap into electronic typesetting,  remaining essentially unchanged. It was popularised in the 1960s with  the release of Letraset sheets containing Lorem Ipsum passages, and more  recently with desktop publishing software like Aldus PageMaker  including versions of Lorem Ipsum.</p>', 'Come to appleton and find all your fruit needs in one simple place.', 'fruit,apples,grapes', 0, 1),
(2, 'Green Pears', 'green-pears','', 0, '2013-02-03 14:47:20', '0000-00-00 00:00:00', '<p><strong>Pears</strong> are great.</p>\r\n', '', 'pears,fruit', 0, 1),
(3, 'Red Apples', 'red-apples', NULL, 0, '2013-02-02 14:46:45', '0000-00-00 00:00:00', '<p>This is a page about <strong><em>apples and fruit</em></strong>.</p>', NULL, 'apples,fruit', 0, 1);";
			
$created4 = mysql_query($query4);

$error4 = mysql_error();
if ($created4) {
   echo "<p>The data is <strong>successfully</strong> added to the content table in: <strong>$database</strong> <br /><br /></p>";
   echo "<p>If everything was added <strong>succesfully</strong>. Please delete this page!(install.php)</p>";
} else {
 echo "<p>There was a <strong>problem</strong> adding data to the content table. Please check config.php<br /></p>";
 echo "<p><strong>$error</strong></p>";
}

?>