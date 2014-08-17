<?php
session_start();
if(isset($_SESSION["loggedin"]))
{
	header("location:admin/");
}
$formpass = NULL;
$formlogin = NULL;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Beetle-The CMS</title>
<link href="login.css" rel="stylesheet" type="text/css">
<script src="library/jquery.js" type="text/javascript"></script>
</head>

<body id="login">
<?php
require ("config.php");
if (isset($e)) {
	if ($e ==  "1") {
	echo "<p>Please Login</p>";	
	}
}
?>
<h1 align="center" style="color:white;">Beetle-The CMS</a></h1>
<div id="login_form">
	<img src="img/login1.png" alt="Login" width="75" style="margin-left:10px;">
    <span><strong></strong></span>
	<form action="login.php" method="post" name="login" id="login-f">
   	  <label for="formlogin"><strong>Username</strong></label><br>
        <input name="formlogin" id="formlogin" class="tb10" type="text" placeholder="Enter Username"><br>
        <label for="formpass"><strong>Password</strong></label><br>
        <input name="formpass" id="formpass" class="tb10" type="password" placeholder="Enter Password"><br>
        <p style="color:#FFF;"><?php
//echo "formlogin=$formlogin";
//echo "<br>formpass=$formpass";
//echo "<br>login=$login";
//echo "<br>pass=$pass";

if(isset($_POST['formpass'])) {
	$formpass = ($_POST['formpass']);
}

if(isset($_POST['formlogin'])) {
	$formlogin = ($_POST['formlogin']);
}

if (md5($formpass) ==$pass && $formlogin == $login) {
	$_SESSION["loggedin"] = "1";
	//session_register("loggedin");
	//$loggedin = "1";
	//logged in so run a javascript redirect to admin page.
?>
<script language="javascript">
<!-- 
location.replace("admin");
-->
</script>
	<h4><a href='admin'>you are now logged in, continue to the admin section</a></h4>
<?php
}
?></p>
      <center><input name="submit" id="submit" type="submit" value="Login" class="button-l"></center>
	<center><p style="color:#FFF;"><a href="changePswd.php">Change Username/Password</a></p></center>
    </form>
</div>
<div id="foot">
	<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2014 &copy; Eldhose K Shibu , Sharun S Thazhackal & Jijo John</strong>
</div>
</body>
</html>