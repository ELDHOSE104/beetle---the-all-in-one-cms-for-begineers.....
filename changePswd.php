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
?>
<h1 align="center" style="color:white;">Beetle-The CMS</a></h1>
<div id="login_form">
	<img src="img/login1.png" alt="Login" width="75" style="margin-left:10px;">
    <span><strong></strong></span>
	<form method="post" name="login" id="login-f">
   	  <label for="formlogin"><strong>New Username</strong></label><br>
        <input name="formlogin" id="formlogin" class="tb10" type="text" placeholder="Enter New Username"><br>
        <label for="formpass"><strong>Current Password</strong></label><br>
        <input name="formpass" id="formpass" class="tb10" type="password" placeholder="Enter Current Password"><br>
        <label for="newpass"><strong>New Password</strong></label><br>
        <input name="newpass" id="newpass" class="tb10" type="password" placeholder="Enter New Password"><br>
        <label for="conpass"><strong>Confirm New Password</strong></label><br>
        <input name="conpass" id="conpass" class="tb10" type="password" placeholder="Enter New Password"><br>

        <p style="color:#FFF;" id="inner"></p>
      <center><input name="submit" id="submit" type="submit" value="Save" class="button-l"></center>
    </form>
</div>
<?php
if($_POST['submit'])
{
	$newUser=$_POST['formlogin'];
	$oldPass=$_POST['formpass'];
	$newPass=$_POST['newpass'];
	$newPassCon=$_POST['conpass'];
	$qrr=mysql_query("select * from login");
	$passQry=mysql_fetch_array($qrr);
	$pass1=$passQry['password'];
	if(md5($oldPass)!=$pass1)
	{?>
    <script type="text/javascript">
	document.getElementById('inner').innerHTML="Invalid current Password! Try again";
	</script>
    <?php
	}
	elseif($newPass!=$newPassCon)
	{?>
    <script type="text/javascript">
	document.getElementById('inner').innerHTML="Passwords do not match! Try again";
	</script>
    <?php
	}
	else
	{
		$newPass=md5($newPass);
		mysql_query("update login set username='$newUser' ");
		mysql_query("update login set password='$newPass' ");
		?>
        <script>
		alert("Username and Password Successfully Saved!!");
		location.replace("login.php");
		</script><?php
	}
}
?>
<div id="foot">
	<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2014 &copy; Eldhose K Shibu , Sharun S Thazhackal & Jijo John</strong>
</div>
</body>
</html>