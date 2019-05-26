<?php
session_start();
require_once ("db_connect.inc.php");
$rtype = $_GET['rtype'];
$mid=$_GET['messageid'];
$uid=$_GET['userid'];
$cname=$_GET['cname'];
$t=$_GET['t'];
echo $t;

echo $mid;
//echo $rtype;
//echo $mid;
//echo $uid;
//echo $cname;

$verify=mysqli_query($conn,"SELECT * FROM `reaction` WHERE RId='{$rtype}' and MId='{$mid}' and cname='{$cname}' and uid='{$uid}'");

$verifyrows = mysqli_num_rows($verify);
//echo $verifyrows;

if($verifyrows>0)
{
	header('Location: ../login.php?value='.$cname);	
	//header('Location: ../ODUCSF2K19A3/login.php?value='.$cname);	
}
else
{ 
	echo "here";
	if($rtype=='like'){
		$type='dislike';
		$name='dcount';
		$oname='lcount';
	}
	else if($rtype=='dislike'){
		$type='like';
		$name='lcount';
		$oname='dcount';
	}

	
	
		mysqli_query($conn,"UPDATE `message` SET `TimeStamp`='{$t}',`{$name}`=`{$name}`-1 where `MId` = '{$mid}'");
		mysqli_query($conn,"DELETE FROM `reaction` WHERE `RId`='{$type}' and MId='{$mid}' and cname='{$cname}' and uid='{$uid}'");
	
	
		
		mysqli_query($conn,"UPDATE `message` SET `TimeStamp`='{$t}',`{$oname}`=`{$oname}`+1 where `MId` = '{$mid}'");
		mysqli_query($conn,"INSERT INTO `reaction` (`RId`, `MId`, `cname`, `uid`) VALUES ('{$rtype}', '{$mid}', '{$cname}', '{$uid}')");
		

header('Location: ../login.php?value='.$cname);		
//header('Location: ../ODUCSF2K19A3/login.php?value='.$cname);		
}

?>