<?php

function timestamp2datime($timestamp){
	$datime = NULL;
	$year = substr($timestamp, 0, 4);
	$month = substr($timestamp, 4, 2);
	$day = substr($timestamp, 6, 2);
	$hour = substr($timestamp, 8, 2);
	$min = substr($timestamp, 10, 2);
	$datime .= "$month/$day/$year {$hour}:$min";

	return $datime;
}

function timestamp2date($timestamp){
	$date = NULL;
	$year = substr($timestamp, 0, 4);
	$month = substr($timestamp, 4, 2);
	$day = substr($timestamp, 6, 2);		
	$date .= "$month/$day/$year";
	return $date;
}

Function valid($vname) {
	$vname = str_replace("&","&#38;",$vname);
	$vname = str_replace("?","&#63;",$vname);
	$vname = str_replace("'","&#039;",$vname);
	return $vname;	
}

?>