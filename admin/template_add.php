<?php
include ("auth.php");
?>
<html>
<head>
<title>Select Template</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php 
database_connect();
if (isset($_POST['submit']) == "Save"){
	if($_FILES["tempBrowse"]["error"]>0)
	echo "Select a template first";
	elseif($_FILES["tempBrowse"]["type"]!="text/css")
	echo "The file you have selected is not a valid template! Please try again!";
	else
	{
	$id = $_POST['pagetemp'];
	$qry=mysql_query("select * from content where id=$id");
	$row = mysql_fetch_array($qry);
	$tempField=$row['templateURL'];
	if($tempField!=NULL)
		{
			$fileCont=file_get_contents("../templates/".$tempField);
			$fileCon="<style>".$fileCont."</style>";
			if(!mysql_query("UPDATE content SET text=REPLACE(text,'$fileCon','') where id=$id"))
			{
				$fileCon="<!-- ".$fileCont." -->";
				mysql_query("UPDATE content SET text=REPLACE(text,'$fileCon','') where id=$id");
			}
		}
		
	$tempName=$_FILES["tempBrowse"]["name"];
	echo "Selected template is ",$tempName;
	if(!file_exists("..templates/".$_FILES["tempBrowse"]["name"]))
	move_uploaded_file($_FILES["tempBrowse"]["tmp_name"],"../templates/".$_FILES["tempBrowse"]["name"]);
	$sql = "UPDATE content SET templateURL='$tempName' WHERE id=$id"; 
	$query3 = mysql_query($sql) or die(mysql_error());
	

	$fileCont=file_get_contents("../templates/".$tempName);
	$filecnt="<style>".$fileCont."</style>";
	mysql_query("update content set text=concat('$filecnt',text) where id=$id");
	if($query3) echo "<p>Template Successfully Saved</p>\n";
	}
}else{

$query ="SELECT * 
         FROM content 
		 WHERE startpage = 1;";
$result = mysql_query($query) or die(mysql_error());
?>
<form enctype="multipart/form-data" method="post">
<p>Select the page to which template to be assigned</p>
<select name="pagetemp" class="input">
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
<input type="submit" class="input" value="Save" name="submit">
<div style=" width:50%; float:right;">
<label for="tempBrowse">Choose Template</label>
<input name="tempBrowse" type="file" id="tempBrowse" value="Choose Template" style="border: ridge">
</div>
</form>
<?php } ?>
</body>
</html>
