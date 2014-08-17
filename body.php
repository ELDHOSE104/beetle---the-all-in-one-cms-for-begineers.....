<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $description; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
/*
if(isset($_GET['id']))
{
	$idpath=$_GET['id'];
	$query="SELECT templateURL from content WHERE id=$idpath";
	$qres=mysql_query($query);
	while($rowpath=mysql_fetch_assoc($qres))
	{
		$path=$rowpath['templateURL'];
	}
	echo "<link href=\"$path\" rel=\"stylesheet\" type=\"text/css\">";
}
*/

?>
<link href="style.css" rel="stylesheet" type="text/css"> 

</head>
<body bgcolor="<?php echo $backcolor; ?>">
<br />
<table width="1000" border="0" align="center" class="htable">
<tr>
	<td colspan="2" align="center" valign="top"><h1><?php echo $title; ?></h1></td>
</tr>
<tr>
<td width="1000" align="center" valign="top">
<?php
//database_connect();
$navquery = "SELECT id,title,urltitle,menutitle,startpage FROM content WHERE status = 1 ORDER by startpage desc, position;";
$navresult = mysql_query($navquery);
while ($row = mysql_fetch_assoc($navresult)) {
$navid = $row['id'];
$title = $row['title'];
$urltitle = $row['urltitle'];
$menutitle = $row['menutitle'];
$startpage = $row['startpage'];
//if no menu title entered, then use the title.
	if ($menutitle == ""){
		$menutitle = $row['title'];
	}

if ($startpage == 1) {
	$href = "./index.php";
}else{
//	$href = "page.php?id=$navid";

			$href = "page.php?id=$navid";
	}
?>
<div class="nav" style="display:inline;"><a href="<?php echo $href;?>"><strong><?php echo $menutitle;?></strong></a></div>
<?php
$startpage = NULL;
}
if ($result) {
	mysql_free_result($result);
	mysql_free_result($navresult);
	mysql_close();
}
?>
</td>
</tr>
<tr>
	<td width="750" valign="top" style="height: 300px; padding: 15px;"><?php echo $text;?></td>
</tr>
<tr>
	<td colspan="2" align="right"><small></small></td>
</tr>
</table>
</body>
</html>
