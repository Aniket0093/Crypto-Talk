<?php
session_start();
$cname = $_POST['cname'];
$cdesc = $_POST['cdesc'];
$ctag = $_POST['ctag'];
$ctype = $_POST['ctype'];
$email = $_SESSION['email'];

require_once ("db_connect.inc.php");
if($cname != '')
{
	$chname = htmlspecialchars(mysqli_real_escape_string($conn,$cname));
	$chdesc = htmlspecialchars(mysqli_real_escape_string($conn,$cdesc));
	$chtag = htmlspecialchars(mysqli_real_escape_string($conn,$ctag));
	$chtype = htmlspecialchars(mysqli_real_escape_string($conn,$ctype));
	
	$resultver = mysqli_query($conn, "SELECT CName from `channel` where CName = '{$chname}'");
	$rowsver= mysqli_num_rows($resultver);
	if($rowsver>0){
		include "channel.php";
	}else{
		echo 'a';
	mysqli_query($conn,"INSERT INTO `channel` SET `CName`='{$chname}', `CDesc`='{$chdesc}',
	`CTag`='{$chtag}', `Type`='{$chtype}', `CreatedBy`='{$email}', `TimeStamp`=CURRENT_TIMESTAMP()");
	
	$resultuid = mysqli_query($conn, "SELECT userid from `userinfo` where email = '{$email}'");
	$rowsuid = mysqli_num_rows($resultuid);
	if($rowsuid > 0)
	{
		while($userid = mysqli_fetch_array($resultuid)){
			echo $userid['userid'];
				//inner query
				$result = mysqli_query($conn, "SELECT CId from `channel` where CName = '{$chname}'");
				$rows = mysqli_num_rows($result);
				if($rows > 0)
				{
					while($channel = mysqli_fetch_array($result)){
						echo $channel['CId'];
						mysqli_query($conn,"INSERT INTO `userchannel` SET `UserID`='{$userid['userid']}', `CID`='{$channel['CId']}'");
						
					}
				}
		}
	}
	}
	mysqli_close($conn);
}
include "channel.php";
?>