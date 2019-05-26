<?php
require_once ("db_connect.inc.php");
$cname = $_GET['cname'];
if($cname != '')
{
	$channelname = htmlspecialchars(mysqli_real_escape_string($conn,$cname));
	$result = mysqli_query($conn, "SELECT CName from `channel` where CName = '{$channelname}'");
	$rows = mysqli_num_rows($result);
	if($rows>0)
    $_SESSION['test'] = 1;
	else
	$_SESSION['test'] = 2;
	$_SESSION['chname'] = $cname;
}
include "channel.php";
?>
