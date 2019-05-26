<?php
require_once ("db_connect.inc.php");


//For Accept sub message


$auserid = $_GET['userid'];
$adestination = $_GET['destination'];



//For Get sub message
$mtype = $_GET['name'];
$mid=$_GET['messageid'];
$uid=$_GET['userid'];
$destination=$_GET['destination'];

require_once('inc/subchat.inc.php');
$oSubChat = new SubChat();




echo $oSubChat->getSubMessages($mid,$uid,$destination);

?>
