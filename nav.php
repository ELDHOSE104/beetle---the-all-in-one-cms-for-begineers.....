<table width="150">
<?php 
database_connect();
$query = "SELECT * from content
          WHERE status = 1
          ORDER by position;";
$error = mysql_error();
if (!$result = mysql_query($query)) {
    print "$error";
	exit;
	}

$result = mysql_query($query);	
while ($row = mysql_fetch_assoc($result)) {
$id = $row['id'];
$menutitle = $row['menutitle'];

//if no menu title entered, then use the title.
if ($menutitle == ""){
	$menutitle = $row['title'];
}

$startpage = $row['startpage'];
$href = "page.php?id=$id";
	if ($startpage == 1) {
		$href = "";
		}
?>
<tr>
<td>
<a href="<?php echo $href;?>"><strong><?php echo $menutitle;?></strong></a>
</td>
</tr>
<?php
}
?>
</table>
