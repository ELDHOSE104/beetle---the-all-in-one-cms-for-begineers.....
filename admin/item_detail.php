<?php
include "auth.php";
include "./dbfunctions.php";
?>
<link href="./style.css" rel="stylesheet" type="text/css">
<?php 
$id = $_GET['id'];
$title = NULL;
$text = NULL;
$urltitle = NULL;
database_connect();
$query = "select title,text,urltitle from content where id = $id;";
//echo $query;
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$urltitle = $row['urltitle'];
	if ($urltitle <> ""){
		$display = "<a href='../$urltitle/' target='_blank'>url : /".$urltitle."/</a>";
		}
$title = $row['title'];
$text = $row['text'];
?>
<span class="title2">Preview <?php echo $display;?></span>
<hr>
<?php
echo "<p>Title: $title</p>";
echo "<hr>";
echo "<p>$text</p>";
?>