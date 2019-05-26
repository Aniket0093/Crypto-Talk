<?php
session_start();
require_once ("db_connect.inc.php");

$sid=$_GET['sid'];
$user=$_SESSION['email'];

$result = mysqli_query($conn, "SELECT usertype from `userinfo` where email = '{$user}'");
	while($res=mysqli_fetch_assoc($result))
	{
		$type=$res['usertype'];
	}



if($type!='superuser'){
	echo "Only admin can delete message(s) from this channel";
} else {
	mysqli_query($conn,"DELETE FROM `submessage` WHERE `subid`='{$sid}'");
	echo "Message deleted";
}

?>