<?php
session_start();
require_once ("db_connect.inc.php");
$rtype = $_GET['rtype'];
$mid=$_GET['messageid'];
$uid=$_GET['userid'];
$cname=$_GET['cname'];

echo $rtype;
echo $mid;
echo $uid;
echo $cname;

$verify=mysqli_query($conn,"SELECT * FROM `subreaction` WHERE rid='{$rtype}' and sid='{$mid}' and cname='{$cname}' and uid='{$uid}'");

$verifyrows = mysqli_num_rows($verify);
echo $verifyrows;

if($verifyrows>0)
{
	echo "exit";
}
else
{ 
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

	
	
		mysqli_query($conn,"UPDATE `submessage` SET `{$name}`=`{$name}`-1 where `subid` = '{$mid}'");
		mysqli_query($conn,"DELETE FROM `subreaction` WHERE `rid`='{$type}' and `sid`='{$mid}' and `cname`='{$cname}' and `uid`='{$uid}'");
	
	
		
		mysqli_query($conn,"UPDATE `submessage` SET `{$oname}`=`{$oname}`+1 where `subid` = '{$mid}'");
		mysqli_query($conn,"INSERT INTO `subreaction` (`rid`, `sid`, `cname`, `uid`) VALUES ('{$rtype}', '{$mid}', '{$cname}', '{$uid}')");
		

echo "done";
}

?>