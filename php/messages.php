<!--<meta http-equiv="refresh" content="5">--!>
<?php
require_once ("db_connect.inc.php");
session_start();
require_once ("db_connect.inc.php");
$cid=$_SESSION["channelid"];
$dmail=$_SESSION["dmail"];
$Email=$_SESSION["email"];
$pag=$_GET["page"];

$res = mysqli_query($conn,"select userid from `userinfo` where `email` = '{$Email}'");
		$getrows = mysqli_num_rows($res);
	if($getrows>0)
	{
		while($result=mysqli_fetch_assoc($res))
		{
			$_SESSION['usid']=$result['userid'];
		}
	}

require_once('inc/chat.inc.php');
$oSimpleChat = new SimpleChat();

if($cid!=NULL)
{
	echo $oSimpleChat->getMessages($cid,$pag);
}
else
echo $oSimpleChat->getMessages1($Email,$dmail,$pag); 
?>
