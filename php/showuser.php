<?php
session_start();
require_once ("db_connect.inc.php");
$inp = $_GET['inp'];
$cid = $_SESSION['channelid'];
$_SESSION["uname"]=array();


if($inp != '')
{
	$input = htmlspecialchars(mysqli_real_escape_string($conn,$inp));
	$result = mysqli_query($conn, "SELECT DISTINCT username from `userinfo` where username LIKE '{$input}%' and userid NOT IN (Select UserID from userchannel where CID = '{$cid}')");

	$rows = mysqli_num_rows($result);
	if($rows>0){
    while($row_user = mysqli_fetch_assoc($result))
                    {
						
                        array_push($_SESSION["uname"],$row_user['username']);                
                    }
	}
$_SESSION['inpt']=$inp;
	
}

if(isset($_SESSION["uname"])){
  foreach($_SESSION["uname"] as $key=>$value){
	  $input = mysqli_real_escape_string($conn,$value);
	$result = mysqli_query($conn, "SELECT userid from `userinfo` where username = '{$value}'");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		//echo $res['userid'];
		$curuserid = $res['userid'];
	}
	}
	  echo "<div style='width:100%; height:40px; background-color:#e5e5e5; color:black; border:1px solid #c4c4c4;   
	  border-radius: 5px; text-align: center;'><p><input type='checkbox' name='boxes[]' value=".$curuserid." style='float:right;'>" . $value . "</p></div><br>
		  ";  
  }
  }

//include "user.php";
?>