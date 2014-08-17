<?php
include ("auth.php");
?>
<html>
<head>
<title>Config pages</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
database_connect();
if (isset($_POST['submit']) == "Save"){
	$id = $_POST['startpage'];
	$sql4 = "UPDATE content SET startpage=0 WHERE startpage=1"; 
	$query4 = mysql_query($sql4) or die(mysql_error());

	$sql = "UPDATE content SET startpage=1 WHERE id=$id"; 
	$query3 = mysql_query($sql) or die(mysql_error());
	if($query3) echo "<p>The configuration is succesfully saved.</p>\n";

}else{

$query ="SELECT * 
         FROM content 
		 WHERE startpage = 1;";
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$startpage = $row['startpage'];
$title = $row['title'];
$description = $row['description'];
$keywords = $row['keywords'];
}
?>
<form enctype="multipart/form-data" method="post">
<p>Select the Start Page (Home Page)</p>
<select name="startpage" class="input">
<?php
$query2 = "SELECT *
           FROM content
		   ORDER BY position ASC;";
$result2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_object($result2)){
$id = $row2->id;
$title = $row2->title;
print("<option value=\"$id\"> $title </option>");
}		    
?>
</select>
<?php
$result4 = mysql_query("SELECT title from content where startpage = 1;") or die(mysql_error());
$row4 = mysql_fetch_object($result4);
$title4 = $row4->title;
 ?>

<p>Current homepage is set to: <strong><?php echo "$title4"; ?></strong></p>
<input type="submit" class="input" value="Save" name="submit">
</form>
<?php } ?>
</body>
</html>
