<?php
session_start();
include ("../config.php");
$loggedin = $_SESSION["loggedin"];
if ($loggedin != "1"){
	header("Location:../login.php?e=1"); /* Redirect browser */ 
	/* Make sure that code below does not get executed when we redirect. */ 
	exit; 
}
//echo "ok";
?>