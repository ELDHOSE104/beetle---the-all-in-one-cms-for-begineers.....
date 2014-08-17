<?php
error_reporting(E_ERROR);
include "config.php";

	//replacing substring 'src="images/' with 'src="admin/images/'
	$qry="UPDATE content SET text=REPLACE(text,'src=\"images/','src=\"admin/images/') ";
	$qryq=mysql_query("UPDATE content SET text=REPLACE(text,'src=\"tiny','src=\"admin/tiny') ");
	$qryRes=mysql_query($qry);
	$echoErr=mysql_error();


//if no id defined then load the home page.
if(isset($_GET['id'])){
	$id = $_GET['id'];
		$keyfield = "id";
		$pg = $id;
	}else{
		$pg = str_replace("/", "", $_SERVER['REQUEST_URI']);
		$keyfield = "urltitle";
	}

database_connect();
$query = "SELECT * from content where $keyfield = '$pg' LIMIT 1;";
$echo = mysql_error();
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$num_rows = mysql_num_rows($result);

if ($num_rows == 0) {
	include "404.php";
	exit;
}
	$id =  $row['id'];
	$title = $row['title'];
	$stitle = sanitize_title_with_dashes($title);
	$text = $row['text'];
	$description = $row['description'];
	$keywords = $row['keywords'];
include("body.php");
?>

