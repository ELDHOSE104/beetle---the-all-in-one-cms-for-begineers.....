<?php 
include "config.php";

//if no id defined then load the home page.
if(!isset($_GET['id'])){
	database_connect();
	
	$query = "SELECT * from content;";
	$res123 = mysql_query($query);
	$val = mysql_fetch_array($res123);
	if($val['value']==1)
	{
	
	echo '<a href="register/register.php">Registration form</a>';
	}
	
	
	$result = mysql_query($query);
	$echo = mysql_error();
	$num_rows = mysql_num_rows($result);
		if ($num_rows == 0) {
			include "404.php";
		exit;
	}

while ($row = mysql_fetch_assoc($result)) {
	$startpage = $row['startpage'];
	if ($startpage == 1){
		$title = $row['title'];
		$text = $row['text'];
		$description = $row['description'];
		$keywords = $row['keywords'];
		}
	}
}
include("body.php");
?>

