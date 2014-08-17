<?php
include("auth.php");
include("./dbfunctions.php");
?>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.tabeltextoneven {
	
}
.tabeltextover {
	background-color: #EEEEEE;
}

-->
</style>
<script language="JavaScript">
function VerwijderItem(idurl)
{
	go_on = confirm("Are you sure?");
	if (go_on)
	{
		document.location.href=idurl;
	}
}	
<!--
function BGNew(obj, new_style, message) {
obj.className = new_style;
window.status = message;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<p><span class="title1"><a href="?t<?php echo time();?>'">Page List</span> <small>(reload after added new page)</small></a></p>
<table border="0" cellspacing="0" width="100%">
<tr>
<?php
$i=0;

database_connect();

$query = "SELECT * from content
          ORDER BY position ASC";
$error = mysql_error();
if (!$result = mysql_query($query)) {
    print "$error";
	exit;
	}

while($rij = mysql_fetch_object($result)){
  $time = timestamp2date($rij->posting_time);
  $status = $rij->status;
  $menutitle = 	$rij->menutitle;
  if ($menutitle == ""){
	  $menutitle = $rij->title;
}
  $i++;
  print ($i%2) ? '<tr class="tabeltextoneven">' : '<tr class="tabeltext">';
  print("
		 <td>
		 <strong>$menutitle</strong>
		 </td>
        ");
  $newsid = $rij->id;
  $zelfpage = "item_list.php";
  if($status==0) echo "<td align=\"right\" class=\"comment\"> <a href=\"item_status.php?id=$newsid&status=1&ref=$zelfpage\"  onClick=\"MM_swapImage('status$newsid','','../img/ico_unblock.gif',1)\" onClick=\"MM_swapImgRestore()\">
  <img src=\"../img/ico_block.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Publish Page\" name=\"status"."$newsid\" id=\"status"."$newsid\"></a></td>";
  elseif($status==1)  echo "<td align=\"right\">&nbsp;<a href=\"item_status.php?id=$newsid&status=0&ref=$zelfpage\" onClick=\"MM_swapImage('status$newsid','','../img/ico_block.gif',1)\" onClick=\"MM_swapImgRestore()\"><img src=\"../img/ico_unblock.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Unpublish Page\" name=\"status$newsid\" id=\"status$newsid\"></a></td>";
  echo "<td align=\"center\" width=\"120\">&nbsp;<a href=\"item_position.php?id=$newsid&mode=down\"><img src=\"../img/ico_up.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Move page up in navigation\"></a>&nbsp;<a href=\"item_position.php?id=$newsid&mode=up\"><img src=\"../img/ico_dows.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Move page down in navigation\"></a>&nbsp;<a href=\"item_detail.php?id=$newsid\" target=\"rechts\"><img src=\"../img/ico_detail.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Preview Page\"></a>&nbsp;<a href=\"item_modify.php?id=$newsid\" target=\"rechts\"><img src=\"../img/icons/ico_edit.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Edit Page\"></a>&nbsp;<a href=\"#\" onClick=\"VerwijderItem('item_delete.php?id=$newsid')\"><img src=\"../img/ico_delete.gif\" width=\"19\" height=\"19\" border=\"0\" alt=\"Delete Page\"></a>&nbsp;</td>";
}
if(isset($_POST['reg']))
mysql_query("UPDATE content SET value=1");
if(isset($_POST['reg1']))
mysql_query("UPDATE content SET value=0");

?>

 <tr><td align="center"><form name="" action="" method="post"><input type="submit" id="reg" value="Add Reg.Form" name="reg"/><input type="submit" id="reg" value="Remove Reg.Form" name="reg1"/>
  <a href="../register/add_form.php" target="_blank"> Edit Form</a>
 </form></td></tr>
</table>
</body>
</html>
