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
	
	.container2 {
		height: 1px;

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
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	<script>
		function myFunction() {
			var x = document.getElementById("dispuser").value;
			//location.href = "showuser.php?inp=" + x;
			$.ajax({
		url: "showuser.php",
		method: 'GET',
		data: "inp=" + x,
		success: function (result) {
			console.log(result);
			$(".container1").empty();
		 	$(".container1").append(result);
		
		}
	});  
		}

	</script>
	<div class="test" style="color:white;">
		<div class="userdata">
			<h2>Invite user(s) to channel</h2>

			<form action="" method="POST">
			<div class="container">
				<?php
				session_start();
  require_once ("db_connect.inc.php");
					$cn = $_SESSION["channelname"];
					$chstat = mysqli_query($conn, "SELECT status from `channel` where CName = '{$cn}'");
						while($chstatus=mysqli_fetch_assoc($chstat))
						{
							$stat=$chstatus['status'];
						}
						
							if($stat=='archived'){
								echo '<input type="text" id="dispuser" onkeyup="myFunction()" name="uname" placeholder="Search" style="width: 100%; padding: 10px; opacity: 1;" disabled>';
							}else{
								echo '<input type="text" id="dispuser" onkeyup="myFunction()" name="uname" placeholder="Search" style="width: 100%; padding: 10px; opacity: 1;">';
							}
				?>
				
					
				</div>

				<br>
				<hr>
				<br>
				<div class="container1" style='overflow:auto; width:auto;height:250px;'>
					<?php
					
  require_once ("db_connect.inc.php");
  //session_start();
  
  ?>
						
				</div>
				
				<div class="container2" style='overflow:auto; width:auto;height:150px;'>
					<?php
  require_once ("db_connect.inc.php");
  //session_start();
  $cn = $_SESSION["channelname"];
  
  
				echo "<h5><button type='submit' name='submit' class='invitebtn'>Invite</button></h5>
							<h5><a href='login.php?value=".$cn."'>Return to chat</a></h5>";
							?>
						
				</div>

				
			</form>
			<?php
			
require_once ("db_connect.inc.php");
	


if(isset($_POST['submit'])){
	$c = $_SESSION["channelid"];
            if(isset($_POST['boxes'])){
			foreach($_POST['boxes'] as $key=>$value){
            $s = "insert into userchannel(UserID,CID) values('$value','$c')"; 
                $res=mysqli_query($conn,$s);
                if($res){
                    echo "insert success";
					header("Location: ../user.php");
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
