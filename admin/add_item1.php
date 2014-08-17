<?php
include "auth.php";
?><html>
<head>
<title>Add page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.maintable {
	background: #EEEEEE;
	color: Black;
	background-position: center;
	font: 11px;
	vertical-align: middle;
}
</style>
<?php include("editor.php");?>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
/**
 * Sent - add news
*/
if(isset($_POST['submit'])) { 
	$title = $_POST['title'];
	$urltitle = sanitize_title_with_dashes($_POST['urltitle']);
		if ($urltitle == ""){
			$urltitle = sanitize_title_with_dashes($title);
		}
	$keywords = $_POST['keywords'];
	$text = $_POST['text'];
	$status = 1;

	database_connect();			
	$insert = "INSERT INTO
			content (title, urltitle, text, keywords, status) 
			VALUES ('$title', '$urltitle', '$text', '$keywords', $status)";
	mysql_query($insert) or die(mysql_error());
	
} else {
?>
<form method="post" enctype="multipart/form-data" id="Compose" name="Compose">
<p>title <input name="title" type="text" class="input" id="title" size="25" maxlength="100"> page url <input name="urltitle" type="text" class="input" id="urltitle" size="25" maxlength="200"></p>
<p>meta description <input type="text" name="keywords" id="keywords" size="53"></p>
<textarea cols="40" rows="20" name="text"></textarea>
<input name="submit" type="submit" value="submit" onClick="SetVals()">
  </form>
<?php } ?>
    
</body>
</html>
