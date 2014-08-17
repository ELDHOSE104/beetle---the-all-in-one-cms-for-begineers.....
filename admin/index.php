<?php
include("auth.php");
$page = NULL;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
$exists = file_exists('../install.php');
	if($exists) {
	echo "<p style='color:red;text-align: center'>Warning: install.php file should be removed.</p>";
}
if($pass==md5("test")) {
	echo "<p style='color:red;text-align: center'>Warning: Change admin password in the config file.</p>";
}
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin - CMS Script</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body background="../img/int1_back.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="95%" border="0" align="center" class="htable">
  <tr>
    <td>
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" background="../img/int1_topback.gif">
        <tr> 
          <td> <a href="./index.php">Simple CMS</a></td>
          <td align="center" valign="top"><br>
		    <a href="./index.php?page=config" class="title2"><u>Configure Homepage</u></a>&nbsp;&nbsp;&nbsp;
            <a href="./index.php?page=news" class="title2"><u>Page - Admin</u></a>&nbsp;&nbsp;&nbsp;
            <a href="../" class="title2" target="_blank"><u>View Site</u></a>&nbsp;&nbsp;&nbsp;
            <a href="./index.php?page=template" class="title2"><u>Add Template</u></a> <br />
            <div align="center">
<?php
	if($page=="news") echo "<p><a href=\"item_list.php\" class=\"title2\" target=\"links\">View all the pages</a> | <a href=\"add_item1.php\" class=\"title2\" target=\"rechts\">Add a page</a></p>";
?>
</div></td>
        </tr>
      </table>
<?php
if($page=="news"){
?>
	  <table width="95%" border="0">
  		<tr>
   		 <td align="left" valign="top"><iframe src="item_list.php" width="400" height="400" id="links" name="links" class="iframe" scrolling="auto" frameborder="0"></iframe></td>
   		 <td rowspan="2" valign="top" align="right"><iframe src="about:blank" width="750" height="606" id="rechts" name="rechts" class="iframe" scrolling="auto" frameborder="0"></iframe></td>
		 </tr>
		 <tr>
		 <td valign="top" align="left">
		 <iframe src="item_legend.php" width="400" height="200" id="under" name="under" class="iframe" scrolling="auto" frameborder="0"></iframe>
		 </td>
		 </tr>
	  </table>
<?php
}
if($page=="template"){
	?>
	  <table width="95%" border="0">
  		<tr>
   		 <td align="left" valign="top"><iframe src="template_add.php" width="100%" height="700" id="links" name="links" class="iframe" scrolling="auto" frameborder="0"></iframe></td>
		 </tr>
	  </table>
<?php }
if($page=="config"){
?>
	  <table width="95%" border="0">
  		<tr>
   		 <td align="left" valign="top"><iframe src="config_pages.php" width="100%" height="360" id="links" name="links" class="iframe" scrolling="auto" frameborder="0"></iframe></td>
		 </tr>
	  </table>
<?php
}
?>

	</td>
  </tr>
</table>
</body>
</html>