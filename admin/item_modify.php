<?php
require "auth.php";
require "./dbfunctions.php";
$errormessage = NULL;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Modify Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">

<?php include("editor.php");?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body>
<span class="title1">Modify Page</span> <br>
<?php
if(!isset($_GET['id'])) {
		echo "wrong parameters";
		exit;
	}

	if (isset($_POST['submit']))
	{
		database_connect();
		//--- TESTen
		$id = $_GET['id'];
		$title = valid($_POST['title']);
		$urltitle = sanitize_title_with_dashes($_POST['urltitle']);
		$menutitle = valid($_POST['menutitle']);
		$keywords = valid($_POST['keywords']);
		$description = valid($_POST['description']);
		$text = valid($_POST['text']);

		//begin image uploaden

		if($title=="") $errormessage .= "Please fill in a title.<br>";

		if($errormessage) echo "<br>" . $errormessage . "<br><input name=\"back\" type=\"button\" value=\"&lt; Back\" onClick=\"history.go(-1)\">";
		else {
					$sql = "UPDATE content
							SET title='$title',urltitle='$urltitle',menutitle='$menutitle', keywords='$keywords', description='$description', text='$text'
							WHERE id='$id'"; 

					}
			$query = mysql_query($sql)or die("There's a problem with the query: ". mysql_error()); 	
			if($query) echo "<br>The page is succesfully edit.<br><br>\n<a href=\"item_list.php\" target=\"links\"><img src=\"../img/ico_overview.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Pages\"></a>&nbsp;<a href=\"item_detail.php?id=$id\"><img src=\"../img/ico_detail.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"More info\"></a>&nbsp;<a href=\"item_modify.php?id=$id\"><img src=\"../img/ico_edit.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Edit\"></a>";
        	
	} 
	else 
	{	
		database_connect();		
		if(isset($_GET['id'])) {
			$id = ($_GET['id']);
		}
		$select = "SELECT *
					FROM content
					where id = '$id'";
		$query = 		mysql_query($select);
		$news = 		mysql_fetch_object($query);
		$deid = 		$news->id;
		$menutitle =    $news->menutitle;
		$title = 		$news->title;
		$urltitle = 	$news->urltitle;
		if ($urltitle == ""){
			$urltitle = sanitize_title_with_dashes($news->title);
			}
		$keywords =     $news->keywords;
		$description =  $news->description;
		$text = 		$news->text;
?>
<form action="" method="post" enctype="multipart/form-data" id="Compose" name="Compose"> 
<p>title <input name="title" type="text" value="<?php echo $title; ?>" size="25" maxlength="75"> page url <input name="urltitle" type="text" value="<?php echo $urltitle; ?>" size="25" maxlength="200"></p>
<p>menu title <input name="menutitle" type="text" value="<?php echo $menutitle; ?>" size="25" maxlength="50"></p>
<p>meta keywords <input type="text" name="keywords" id="keywords" value="<?php echo $keywords; ?>" size="25"></p>
<p>meta description <input type="text" name="description" id="description" value="<?php echo $description; ?>" size="75" maxlength="200"></p>
<textarea cols="40" rows="25" name="text"><?php echo $text; ?></textarea></td>
<input name="submit" type="submit" value="submit" onClick="SetVals()">
</form>
<?php } ?>						               
</body>
</html>