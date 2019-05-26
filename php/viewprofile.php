<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		body,
		html {
			background-image: url('Images/step1.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
		}

	</style>

</head>
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

	function opentab(evt, tabname) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(tabname).style.display = "block";
		evt.currentTarget.className += " active";
	}

</script>

<head>
	<link rel="stylesheet" type="text/css" href="css/chat.css">
</head>


<body>

	<?php 
session_start();
require_once("db_connect.inc.php");
?>
	<div class="test" style="color:white;">
		<div id="Horiz_bar">
			<ul>
				<li><a href="login.php">Home</a></li>
				<?php 
				if(isset($_SESSION['test']) ){
				$Email=$_SESSION['test'];
				$curemail=$_GET['email'];
				if($curemail==$Email){
					echo '<li><a href="profile.php?email='.$curemail.'">Modify Profile</a></li>';
				}
				}
				?>
				
				<lf>
					<li><a href='./logout.php'>Sign Out</a></li>
					
				</lf>
<li style="float:right"><a href="./helppage.php"><i class="fa fa-question-circle fa-fw" href="helppage.html" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="userdata">
			<h2>User Profile</h2>

			<form method="POST" enctype="multipart/form-data">

				<div class="container">

					<div id="profile_picture">

						<?php 
	  
                        $Email=$_GET['email'];
                        $sql= "SELECT image FROM `userinfo` WHERE email='{$Email}'";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        echo "<img src='Images/". $row['image'] ."' alt='Avatar' class='avatar'>";
                    ?>
					</div>
					<h1>
						<?php
                        $Email=$_GET['email'];
                        $sql1= "SELECT username FROM `userinfo` WHERE email='{$Email}'";
                        $result1=mysqli_query($conn,$sql1);
                        while($row1=mysqli_fetch_array($result1))
                        echo $row1['username'];
                    ?>
					</h1>

					<h4>
						<?php
                        $Email=$_GET['email'];
                        echo $Email;
                    ?>
					</h4>



					<h5><a href="login.php">Return to chat</a></h5>
				</div>

				<br>
				<hr>
				<br>
			</form>
		</div>


		<div id="tabbedwin" class="tabwindow">
			<div class="tab">
				<button class="tablinks" onclick="opentab(event, 'channel')">Channel Details</button>
				<button class="tablinks" onclick="opentab(event, 'stats')">Message Stats</button>
				<button class="tablinks" onclick="opentab(event, 'reputation')">Reputation</button>
			</div>



			<div id="channel" class="tabcontent">
				<?php
				$Email=$_GET['email'];
				$Em=$_SESSION['test'];
				
				$getustat = mysqli_query($conn, "SELECT usertype from `userinfo` where email = '{$Em}'");
									while($resll=mysqli_fetch_assoc($getustat))
									{
										$ustype=$resll['usertype'];
									}
				if($ustype=='superuser'){
				echo "<p>List of Private Channels</p>";
				
  				require_once ("db_connect.inc.php");
  

  if(isset($_SESSION["test"])){
	$result = mysqli_query($conn, "SELECT DISTINCT c.CName from `channel` c, `userchannel` uc, `userinfo` ui where c.Type='Private' and c.CId=uc.CID and uc.UserID=(select userid from userinfo where email='{$Email}')");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$cname = $res['CName'];
		echo "<div style='width:100%; height:40px; background-color:#e5e5e5; color:black; border:1px solid #c4c4c4;   
	  border-radius: 5px; text-align: center;'><p>" . $cname . "</p></div><br>"; 
	}
	   
  }
  }
				}
  ?>

					<p>List of Public Channels</p>
					<?php
  				require_once ("db_connect.inc.php");
  
$Email=$_GET['email'];
  if(isset($_SESSION["test"])){
	$result = mysqli_query($conn, "SELECT DISTINCT c.CName from `channel` c, `userchannel` uc, `userinfo` ui where c.Type='Public' and c.CId=uc.CID and uc.UserID=(select userid from userinfo where email='{$Email}')");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$cname = $res['CName'];
		echo "<div style='width:100%; height:40px; background-color:#e5e5e5; color:black; border:1px solid #c4c4c4;   
	  border-radius: 5px; text-align: center;'><p>" . $cname . "</p></div><br>"; 
	}
	   
  }
  }
  
  ?>
			</div>

			<div id="stats" class="tabcontent">

				<?php
  		require_once ("db_connect.inc.php");
  
		$Email=$_GET['email'];
 		if(isset($_SESSION["test"])){
		echo "<h2>Direct Message Stats:</h2>";
		$result = mysqli_query($conn, "SELECT count(*) as count FROM `message` WHERE Source=\"$Email\" and `MessageType`=\"D\"");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$count = $res['count'];
		echo "<p> <h2> Total Messages Sent : " . $count . " </h2></p>"; 
	}
	   
  }
	$result = mysqli_query($conn, "SELECT count(*) as count FROM `message` WHERE Destination=\"$Email\" and `MessageType`=\"D\"");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$count = $res['count'];
		echo "<p> <h2> Total Messages Received : " . $count . " </h2></p><br>"; 
		}	
	}
			echo "<hr><h2>Group Messages Stats:</h2>";
		$result = mysqli_query($conn, "SELECT count(*) as count FROM `message` WHERE Source=\"$Email\" and `MessageType`=\"G\"");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$count = $res['count'];
		echo "<p> <h2> Total Messages Sent in Group : " . $count . " </h2></p><br>"; 
	}
	   
  }
			
			
  }
  
  ?>


			</div>

			<div id="reputation" class="tabcontent">

	
		<div id="channel_invo" class="badge" style="display: inline-block;">
	
	<?php
	require_once ("db_connect.inc.php");
  	$Email=$_GET['email'];
  	if(isset($_SESSION["test"])){
	$result = mysqli_query($conn, "SELECT count(DISTINCT c.CName) as count from `channel` c, `userchannel` uc, `userinfo` ui where c.CId=uc.CID and uc.UserID=(select userid from userinfo where email='{$Email}')");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$ccount = $res['count'];
		}
		if($ccount==0){
		echo "<img src=\"Images/un-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h6><b>You need to like any comment first</b></h6>
							<h4><b>Involvement in Channels</b></h4>
							<p><h4>Your Score is: $ccount</h4></p>
						</div>";
			
		}
		elseif($ccount<=2){
		echo "<img src=\"Images/b-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Bronze user</b></h4>
							<h4><b>Involvement in Channels</b></h4>
							<p><h4>Your Score is: $ccount</h4></p>
						</div>";
			
		}		elseif($ccount<=5){
		echo "<img src=\"Images/s-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Silver user</b></h4>
							<h4><b>Involvement in Channels</b></h4>
							<p><h4>Your Score is: $ccount</h4></p>
						</div>";
			
		}		elseif($ccount>=7){
		echo "<img src=\"Images/g-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Golden user</b></h4>
							<h4><b>Involvement in Channels</b></h4>
							<p><h4>Your Score is: $ccount</h4></p>
						</div>";
			
		}

	   
  }
  }
  
  ?>
		</div>

		<div id="likecount" class="badge" style="display: inline-block;">
	
	<?php
	require_once ("db_connect.inc.php");
  	$Email=$_GET['email'];
  	if(isset($_SESSION["test"])){
	$result = mysqli_query($conn, "SELECT count(r.uid)+(SELECT count(sr.uid) FROM `subreaction` sr, `userinfo` u WHERE sr.uid=u.userid  and sr.RId ='like' and u.email='{$Email}') as count FROM `reaction` r, `userinfo` u WHERE r.uid=u.userid and r.RId='like' and u.email='{$Email}'");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$lcount = $res['count'];
		}
		if($lcount==0){
		echo "<img src=\"Images/un-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h6><b>You need to like any comment first</b></h6>
							<h4><b>Like Count</b></h4>
							<p><h4>Your Score is: $lcount</h4></p>
						</div>";
			
		}
		elseif($lcount<=2){
		echo "<img src=\"Images/b-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Bronze user</b></h4>
							<h4><b>Like Count</b></h4>
							<p><h4>Your Score is: $lcount</h4></p>
						</div>";
			
		}		elseif($lcount<=5){
		echo "<img src=\"Images/s-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Silver user</b></h4>
							<h4><b>Like Count</b></h4>
							<p><h4>Your Score is: $lcount</h4></p>
						</div>";
			
		}		elseif($lcount>=7){
		echo "<img src=\"Images/g-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Golden user</b></h4>
							<h4><b>Like Count</b></h4>
							<p><h4>Your Score is: $lcount</h4></p>
						</div>";
			
		}

	   
  }
  }
  
  ?>
		</div>
				
		<div id="dislikecount" class="badge" style="display: inline-block;">
	
	<?php
	require_once ("db_connect.inc.php");
  	$Email=$_GET['email'];
  	if(isset($_SESSION["test"])){
	$result = mysqli_query($conn, "SELECT count(r.uid)+(SELECT count(sr.uid) FROM `subreaction` sr, `userinfo` u WHERE sr.uid=u.userid  and sr.RId ='dlike' and u.email='{$Email}') as count FROM `reaction` r, `userinfo` u WHERE r.uid=u.userid and r.RId='dlike' and u.email='{$Email}'");
	$rows = mysqli_num_rows($result);
	if($rows){
		while($res= mysqli_fetch_assoc($result))
		{
		$dcount = $res['count'];
		}
		if($dcount==0){
		echo "<img src=\"Images/un-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h6><b>You need to dislike any comment first</b></h6>
							<h4><b>DisLike Count</b></h4>
							<p><h4>Your Score is: $dcount</h4></p>
						</div>";
			
		}
		elseif($dcount<=2){
		echo "<img src=\"Images/b-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Bronze user</b></h4>
							<h4><b>DisLike Count</b></h4>
							<p><h4>Your Score is: $dcount</h4></p>
						</div>";
			
		}		elseif($dcount<=5){
		echo "<img src=\"Images/s-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Silver user</b></h4>
							<h4><b>DisLike Count</b></h4>
							<p><h4>Your Score is: $dcount</h4></p>
						</div>";
			
		}		elseif($dcount>=7){
		echo "<img src=\"Images/g-badge.png\" alt=\"badge\" style=\"width:50%\">
						<div class=\"badge_desc\">
							<h4><b>Golden user</b></h4>
							<h4><b>DisLike Count</b></h4>
							<p><h4>Your Score is: $dcount</h4></p>
						</div>";
			
		}

	   
  }
  }
  
  ?>
		</div>
		
			
			

			</div>
		</div>




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

</body>

</html>
