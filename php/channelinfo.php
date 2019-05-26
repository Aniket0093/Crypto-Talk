<!DOCTYPE html>
<html>

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah')

					.attr('src', e.target.result)
					.width(120)
					.height(120);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
	function reload(Email){
		alert(Email);
		location.load();
	}
	
	function test(){
		alert('hello');
		location.reload();
		
	}

</script>

<head>
	<link rel="stylesheet" type="text/css" href="css/chat.css">
</head>
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



	h1 {
		text-align: center;
	}

	h4 {
		text-align: center;
	}

	h3 {
		text-align: center;
		color: white;
	}

	h2 {
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
		width: 11%;
		padding: 10px 18px;
		background-color: #0075b5;
	}



	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}

	img.avatar {
		padding-top: 5%;
		width: 25%;
		height: 25%;
		border-radius: 20%;
		float: left;
	}

	.container {
		height: 50%;
		border: 1px solid #c4c4c4;
		border-radius: 5px;
		background-color: #00245e;
		opacity: 0.9;

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
	<div class="test" style="color:white;">
		<div id="Horiz_bar">
			<ul>
				<li><a href="login.php">Home</a></li>
				<lf>
					<li><a href='./logout.php'>Sign Out</a></li>
				</lf>

			</ul>
		</div>
		<div class="userdata">
			<h2>User Profile</h2>

			<form method="POST" enctype="multipart/form-data">

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
        
		
        
?>
						<h5><a href="login.php">Return to chat</a></h5>
				</div>

				<br>
				<hr>
				<br>
				<div class="container1" style='overflow:auto; width:auto;height:300px; background-color:#00245e; opacity:0.9'>
					<h3>Channel Names</h3>
					<?php
  require_once ("db_connect.inc.php");
  
$Cname=$_GET['value'];
 
	$result = mysqli_query($conn, "select u.username from `userinfo` u, `channel` c, `userchannel` uc where c.CName = '{$Cname}' and c.CId=uc.CID and uc.UserID=u.userid");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$uname = $res['username'];
		echo "<div style='width:100%; height:40px; background-color:#e5e5e5; color:black; border:1px solid #c4c4c4;   
	  border-radius: 5px; text-align: center;'><p>" . $uname . "</p></div><br>"; 
	}
	   
  }
  
  ?>

				</div>


			</form>
			<?php
require_once ("db_connect.inc.php");
	


if(isset($_POST['submit'])){
	$c = $_SESSION["channelid"];
            if(isset($_POST['boxes'])){
			foreach($_POST['boxes'] as $key=>$value){
            $s = "insert into userchannel(UserID,CID) values('$value','$cid')"; 
                $res=mysqli_query($conn,$s);
                if($res){
                    echo "insert success";
					header("Location: ../ODUCSF2K19A3/User.php");
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
