<?php

if (version_compare(phpversion(), "5.3.0", ">=") == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);

require_once("db_connect.inc.php");
$s_sm = $_POST['smessage'];
$smessage=htmlspecialchars(mysqli_real_escape_string($conn,$s_sm));
$mid=$_POST['messageid'];
$uid=$_POST['userid'];
$destination=$_POST['destination'];

require_once('inc/subchat.inc.php');

$oSubChat = new SubChat();
//$sChatResult = 'SubThread';
$sChatResult = $oSubChat->acceptSMessages($smessage,$mid,$uid,$destination);
    
echo $oSubChat->getSubMessages($mid,$uid,$destination);


?>