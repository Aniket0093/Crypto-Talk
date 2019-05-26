<!DOCTYPE html>
<html>
<style>
	form {}

	input[type=text],
	input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	h2 {
		text-align: center;
	}
	
	h4 {
		text-align: center;
	}

	h5 {
		text-align: center;
		color: white;
	}

	button:hover {
		opacity: 0.8;
	}

	.userinp {
		width: 10%;
		padding: 10px 18px;
	}

	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #0075b5;
	}

	.invitebtn {
		width: 15%;
		text-align: center;
		padding: 10px 18px;
		background-color: #0075b5;
	}



	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}

	img.avatar {
		width: 40%;
		border-radius: 50%;
	}

	.container {
		padding: 16px;
		border: 1px solid #c4c4c4;
		border-radius: 5px;

	}

	.container1 {
		padding: 16px;

		border-radius: 5px;
		overflow: auto;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	.test {

		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	.userdata {
		margin: 0 auto;
		width: 50%;

		height: 100%;
	}

	#dispuser {
		border: none;
	}


	body,
	html {
		background-image: url('Images/step1.jpg');
		background-repeat: no-repeat;
		background-size: 100%;


	}

	/* Change styles for span and cancel button on extra small screens */

	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 50%;
		}

	}

</style>

<body>
<?php 
session_start();
require_once("db_connect.inc.php");
?>
	<script>
		/* function myFunction() {
			var x = document.getElementById("dispuser").value;
			location.href = "showuser.php?inp=" + x;
		} */

	</script>
	<div class="test" style="color:white;">
		<div class="userdata">
			<h2>Remove user(s) from Channel</h2>

			<form action="" method="POST">

				<div class="container">

					<div>

						<?php 
	  
                        $Cname=$_GET['value'];
                       
                        echo "<h2 align=center;>Channel Name: ".$Cname."</h2>";
                    ?>
					</div>
					<h1>
						<?php
                        $Cname=$_GET['value'];
                        $sql1= "SELECT CDesc FROM `channel` WHERE CName='{$Cname}'";
                        $result1=mysqli_query($conn,$sql1);
                        while($row1=mysqli_fetch_array($result1))
                        echo "<h4 align=center;>Desctiption: ".$row1['CDesc']."</h4>";
                    ?>
					</h1>
					<?php
        
		echo '<h5><a href="login.php?value='.$Cname.'">Return to chat</a></h5>';
        
?>
						
				</div>

				<br>
				<hr>
				<br>
				<div class="container1" style='overflow:auto; width:auto;height:300px;'>
					<?php
					$Cname=$_GET['value'];
					$_SESSION["uname"]=array();
  require_once ("db_connect.inc.php");
  //session_start();
  $result = mysqli_query($conn, "select u.username from `userinfo` u, `channel` c, `userchannel` uc where c.CName = '{$Cname}' and c.CId=uc.CID and uc.UserID=u.userid and u.username NOT IN (select username from userinfo where usertype='superuser')");

	$rows = mysqli_num_rows($result);
	if($rows>0){
    while($row_user = mysqli_fetch_assoc($result))
                    {
						
                        array_push($_SESSION["uname"],$row_user['username']);                
                    }
	}
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
	  border-radius: 5px; text-align: center;'><p><input type='checkbox' name='boxes[]' value=".$curuserid." style='float:right;'>" . $value . "</p></div><br>";  
  }
  
						require_once ("db_connect.inc.php");
					$cn = $_SESSION["channelname"];
					$chstat = mysqli_query($conn, "SELECT status from `channel` where CName = '{$cn}'");
						while($chstatus=mysqli_fetch_assoc($chstat))
						{
							$stat=$chstatus['status'];
						}
						
							if($stat=='unarchived'){
						echo '<h5><button type="submit" name="submit" class="invitebtn">Remove</button></h5>';
							}
						?>
				</div>

				
			</form>
			<?php
require_once ("db_connect.inc.php");
	
$Cname=$_GET['value'];

if(isset($_POST['submit'])){
	echo "asdas";
	$c = $_SESSION["channelid"];
            if(isset($_POST['boxes'])){
			foreach($_POST['boxes'] as $key=>$value){
				echo $value;
            $s = "DELETE FROM `userchannel` where UserID = '{$value}' and CID ='{$c}'"; 
                $res=mysqli_query($conn,$s);
                if($res){
                    echo "insert success";
					header("Location: ../removeuser.php?value=".$Cname);
                }else{
                    echo "error in inserting";
                }
			}
          }

        }
?>
		</div>
	</div>

</body>

</html>
