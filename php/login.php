<?php
session_start();
require_once ("db_connect.inc.php");
require_once ("functions.inc.php");
if (!isset($_SESSION["userid"]) || !isset($_SESSION["email"]))  
{		
	if (isset($_POST['cmdlogin']))   //works when login button is clicked
	{
		$u = strip_tags($_POST['email']);
		$p = md5(strip_tags($_POST['password']));
		$query = sprintf("SELECT userid FROM userinfo WHERE email = '%s' AND password = '%s' LIMIT 1;",
			mysqli_real_escape_string($conn,$u), mysqli_real_escape_string($conn,$p));
		$result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) != 1)
		{
			$_SESSION['message']='Wrong username or password!';
			include "index.php";
		} 
        else {
			$row = mysqli_fetch_array($result);
			$_SESSION['userid'] = $row['userid'];
			$_SESSION['email'] = $u;
			show_chat();
		}
	} 
 
   else if (isset($_POST['register']))   //Works when clicked on signup
    {
        
        $db = mysqli_connect("localhost", "admin", "M0n@rch$", "cryptocurrency");
     $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=strip_tags($_POST['remail']);
        $tagname=mysqli_real_escape_string($db,$_POST['tagname']);
        $password=md5(strip_tags($_POST['rpassword']));
       $default = "https://www.gravatar.com/avatar/00000000000000000000000000000000";
       $size = 40;
       $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

       
       $sql = "INSERT INTO userinfo (username,password,email,tagname,image) VALUES ('$username','$password','$email','@$tagname','$grav_url')";
       
       
       
     /*  $result=mysqli_query($db, $sql);
       echo $result;*/
       
       
       if (mysqli_query($db, $sql)) {
		$query = sprintf("SELECT userid FROM userinfo WHERE email = '{$email}' LIMIT 1;");
		$result = mysqli_query($db,$query);

        if (mysqli_num_rows($result) != 1)
		{
            include "index.php";
		} 
           else {
               $row = mysqli_fetch_array($result);
                $channelsql = "INSERT INTO `userchannel`(`UserID`, `CID`) VALUES ('{$row['userid']}',4)";
               mysqli_query($db, $channelsql);
			$_SESSION['userid'] = $row['userid'];
			$_SESSION['email'] = $email;
			show_chat();
        } 
    }
    
   }
    else {
		include "second_page.php";
	}
    
 
}
else {
	show_chat();
}
?>
