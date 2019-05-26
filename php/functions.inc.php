<?php
 
function show_userbox()
{
	$u = $_SESSION['email'];
	echo "<div id='userbox'>
	 Welcome $u 
		<ul>
		   <li><a href='./logout.php'>Logout</a></li>
		</ul>
			 </div>";
 
}

function show_chat()
{
	include "./second_page.php";	
}

function git_login($username,$email_id,$profile_pic)
{
    $db = mysqli_connect("localhost", "admin", "M0n@rch$", "cryptocurrency");
    $tagname=$username;
    $github_pic=$profile_pic;
    $password=md5(strip_tags('GiThUb'));
    
    $query = sprintf("SELECT username,email,userid FROM `userinfo` WHERE email = '{$email_id}' LIMIT 1;");
		$result = mysqli_query($db,$query);

        if (mysqli_num_rows($result) != 1)
		{
           
            $sql = "INSERT INTO `userinfo` (username,password,email,tagname,image) VALUES ('$username','$password','$email_id','git@$tagname','$github_pic')";
            mysqli_query($db,$sql);
            $channel_ins = sprintf("SELECT username,email,userid FROM `userinfo` WHERE email = '{$email_id}' LIMIT 1;");
		      $result_ins = mysqli_query($db,$channel_ins);
             $row_ins = mysqli_fetch_array($result_ins);
            $channelsql = "INSERT INTO `userchannel`(`UserID`, `CID`) VALUES ('{$row_ins['userid']}',4)";
               mysqli_query($db, $channelsql);
             $_SESSION['userid'] = sprintf("SELECT userid FROM `userinfo` WHERE email = '{$email_id}' LIMIT 1;");
			$_SESSION['email'] = $email_id;
			//header(location "./login.php");
            header("Location: ./login.php");
		}
    
           else {
              $row = mysqli_fetch_array($result);
            $sql="UPDATE `userinfo` SET `image`='{$github_pic}' WHERE `email`='{$row['email']}'";
               mysqli_query($db,$sql);
             $_SESSION['userid'] = sprintf("SELECT userid FROM userinfo WHERE email = '{$email_id}' LIMIT 1;");
			$_SESSION['email'] = $email_id;
			header("Location: ./login.php"); 
           }
       
       
       
     /*  $result=mysqli_query($db, $sql);
       echo $result;*/
       
       
/*       if (mysqli_query($db, $sql)) {
		$query = sprintf("SELECT userid FROM userinfo WHERE email = '{$email}' LIMIT 1;");
		$result = mysqli_query($db,$query);

        if (mysqli_num_rows($result) != 1)
		{
            include "index.php";
		} 
           else {
               $row = mysqli_fetch_array($result);
			$_SESSION['userid'] = $row['userid'];
			$_SESSION['email'] = $email;
			show_chat();
        } 
    }
    
    }
    */
    
  } 
    
    



?>
