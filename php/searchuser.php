<?php
session_start();
require_once ("db_connect.inc.php");
$inp = $_GET['inp'];
$uname=array();


if($inp != '')
{
	$input = htmlspecialchars(mysqli_real_escape_string($conn,$inp));
	$result = mysqli_query($conn, "SELECT DISTINCT username,email from `userinfo` where username LIKE '{$input}%'");

	$rows = mysqli_num_rows($result);
	if($rows>0){
    while($row_user = mysqli_fetch_assoc($result))
                    {
						
                        echo "<a href=./profile.php?email=".$row_user['email'].">".$row_user['username']."</a>";
                    }
		 
	}

}
?>