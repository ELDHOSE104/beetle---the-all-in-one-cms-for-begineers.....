<?php
include "../config.php";
	$position = $_GET['position'];
	$pos = $_GET['pos'];
	$error = mysql_error();
	$id = $_GET['id'];
    $hoger = $pos+1;
	$lager = $pos-1;

   database_connect();

$DB = mysql_query("SELECT * FROM content ORDER BY position");
$num_rows = mysql_num_rows($DB);
$rows = $num_rows + 2;
$i = 0;
while($resultje = mysql_fetch_object($DB)){
$i++;
}

if ($_GET[mode] == down ) {   
    $querywissel = "UPDATE content
	                SET position = position + 1
			        WHERE position = position - 1
					AND position < 0";
		if 	(mysql_query($querywissel)){
            header("Location: item_list.php");
   	 	}else{
		print "down query problem";
	 	echo mysql_error();
     	exit;
		}
	
    $queryzakken = "UPDATE content
	                SET position = position -1
			        WHERE id = $id
					AND position > 0;";

		if 	(mysql_query($queryzakken)){
            header("Location: item_list.php");
   	 	}else{
		print "down query problem";
	 	echo mysql_error();
     	exit;
	}
}
else if ($_GET[mode] == up) {   
    $queryzakken = "UPDATE content
	                SET position = position +1
			        WHERE id = $id
					AND position < $rows;";

	  if (mysql_query($queryzakken)){
 			header("Location: item_list.php");
   	  }else{
		print "up query problem";
	 	echo mysql_error();
     	exit;
	}
}
?>
    
 