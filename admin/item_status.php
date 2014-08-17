<?php
require "../config.php";
	if(!isset($_GET['id']) || !isset($_GET['status'])) {
		echo "error";
		exit;
	}
	else
	{
		database_connect();
		$ref = $_GET['ref'];
	    $id = $_GET['id'];
		$status = $_GET['status'];
		$update = "UPDATE content
					SET status='$status'
					WHERE id='$id'"; 
		$query = mysql_query($update)or die("Their was a problem updating the status: ". mysql_error()); 	
		if($query){header("Location: $ref");}		
	}?>	