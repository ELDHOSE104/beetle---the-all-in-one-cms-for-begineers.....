<?php
require "../config.php";
	if(!isset($_GET['id'])) {
		echo "error!";
		exit;
	}

	database_connect();
    $id = $_GET['id'];
	$ref = $_GET['ref'];
	$sql = "DELETE FROM content 
				WHERE id = $id;";
	$query = mysql_query($sql)or die("There was a problem while deleting: ". mysql_error()); 	
	if($query) $ref ? header("Location: $ref") : header("Location: item_list.php");
?>