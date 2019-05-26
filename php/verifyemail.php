<?php
require_once ("db_connect.inc.php");
$Email = $_GET['email'];
if($Email != '')
{
	$Emailid = mysqli_real_escape_string($conn,$Email);
	$result = mysqli_query($conn, "SELECT email from `userinfo` where email = '{$Emailid}'");
	$rows = mysqli_num_rows($result);
	if($rows>0)
    $_SESSION['test'] = 1;
	else
	$_SESSION['test'] = 2;
	$_SESSION['email'] = $Email;
}
include "sign_up.php";
?>
