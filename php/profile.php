<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/profile.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">


<title>Profile Page!</title>
    
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
</head>
<body>
    
<script>
    // Get the modal


    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 


    // When the user clicks on <span> (x), close the modal
    function close_m() {
        window.location.reload(true);
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function preview_image() {
        document.getElementById("subimg").value = "uploadimage";
        document.getElementById("subimg").name = "uploadimage";
        // document.getElementById("submitbtn1").style.dislay = "none";   
        var total_file = document.getElementById("file-upload").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' style=width:200px; height=200px;><br>");
        }
    }

</script>

<script>
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

    function reload(Email) {
        alert(Email);
        location.load();
    }

    function test() {
        alert('hello');
        location.reload();

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

    function refresh_profile() {
        var src = document.getElementById("gravatar").value;
        alert(src);
    }


    function imagesrc() {
        var src = document.getElementById("imgsource").value;
        var email= document.getElementById("imgsource").name;
        
        switch (src) {
            case 'local':
                var modal = document.getElementById('myModal');
                modal.style.display = "block";
                
                break;
            case 'gravatar':
                
                $.ajax({
                    url: "./upload_img.php",
                    method: "POST",
                    data: "email=" + email,
                    success: function(result) {
                        alert(result);
                        console.log(result);
                       if (result=="success"){
                       }
                    }
                });
                window.location.reload(true);
                break;
            case 'github':
                alert("t2 is clicked");
                window.location.reload(true);
                break;
        }
    }
    function pg_refresh(){
         window.location.reload(true);
    }

    /*

}*/

</script>




    <?php 
session_start();
require_once("db_connect.inc.php");
    
      
?>

    <div class="test" style="color:white;">
        <div id="Horiz_bar">
            <ul>
                <li><a href="login.php">Home</a></li>
                
                    <li style="float:right"><a href="./logout.php">Sign Out</a></li>
                
                <li style="float:right"><a href="./helppage.php"><i class="fa fa-question-circle fa-fw" aria-hidden="true"></i></a></li>
            </ul>

        </div>
        <div class="container" style="margin-top:80px;height:auto; ">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <!--<div class="well well-sm">-->
                    <div class="row">

                        <div class="col-md-10 ">
                            <div class="col-sm-6 col-md-4" style="margin-top:30px;">
                                <?php 
                                    $Email=$_GET['email'];
                                    $sql= "SELECT image FROM `userinfo` WHERE email='{$Email}'";
                                    $result=mysqli_query($conn,$sql);
                                    while($row=mysqli_fetch_array($result))
                                    echo "<img src='". $row['image'] ."' alt='profile_pic' class='img-rounded img-responsive' style='height:300px;width:500px'>";
                                ?>
                            </div>

                            <h4 id="name"> <i class="glyphicon glyphicon-user"></i>
                                <?php
                                                                $Email=$_GET['email'];
                                                                $sql1= "SELECT username FROM `userinfo` WHERE email='{$Email}'";
                                                                $result1=mysqli_query($conn,$sql1);
                                                                while($row1=mysqli_fetch_array($result1))
                                                                echo $row1['username'];
                            ?>
                            </h4>
                            <br>

                            <h4 id="email"><i class="glyphicon glyphicon-envelope"></i>
                                <?php
                                                                $Email=$_GET['email'];
                                                                echo $Email;
                                ?>
                            </h4>
                            <br>
                            <h4 id="tagname">
                                <?php
                                                                $Email=$_GET['email'];
                                                                $sql1= "SELECT tagname FROM `userinfo` WHERE email='{$Email}'";
                                                                $result1=mysqli_query($conn,$sql1);
                                                                while($row1=mysqli_fetch_array($result1))
                                                                echo $row1['tagname'];
                            ?>
                            </h4><br>




                            <?php 
                                
				                if(isset($_SESSION['test']) ){
				                    $Email=$_SESSION['test'];
                                    $curemail=$_GET['email'];
                                    $sql=mysqli_query($conn,"select `tagname` from `userinfo` where `email` = '{$Email}' LIMIT 1");
                                    $res=mysqli_fetch_assoc($sql);
                                    if (strpos($res['tagname'], 'git@') !== false) {
                                    echo '*User Logged in using github account';
                                    }else{

				                        if($curemail==$Email){
                                            
					               echo "<h4 style=\"display: inline-block; margin-left:5px;\"> Select Profile picture:</h4>
                                        <form style=\"display: inline-block; margin-left:5px;\" method=\"POST\">
                                          <select id=\"imgsource\" name=\"{$Email}\" style=\"background-color:black;\" onchange=\"imagesrc()\">
                                          <option  value=\"default\">Select Source</option>
                                          <option value=\"local\">Upload image Avatar</option>
                                          <option value=\"gravatar\">Gravatar Avatar</option>  
                                          <option value=\"github\">github Avatar</option>
                                        </select> <button style=\"background-color:black;\" onclick=\"pg_refresh()\"><i class=\"fa fa-refresh\" aria-hidden=\"true\"></i></button>
                                        </form>";
                                            
                                  echo '
                            <!-- The Modal -->
                            <div id="myModal" class="modal" >

                              <!-- Modal content -->
                              <div class="modal-content" >
                                <div class="modal-header">
                                  <span class="close" onclick="close_m()">&times;</span>
                                  <h2>Insert Image</h2>
                                </div>
                                <div class="modal-body" style="color:black";>
                                <h3><b>Attach Image</b></h3>
                                <form action="" method="post" enctype="multipart/form-data">
                                <label style="background-color:Grey;" for="file-upload" class="custom-file-upload" title="Upload image from local">
                                <i class="fa fa-file-image-o" aria-hidden="true"></i></i></label>
				                <input id="file-upload" name="image" value="image" type="file" accept="image/*" onchange="preview_image()" />  
                                <input type="submit" id="subimg" name="submit_image" value="Upload Image"/>
                                <div id="image_preview"></div>
                                </form>
                                <hr>
                                
                                </div>
                                <div class="modal-footer">
                                  <h3></h3>
                                </div>
                              </div>

                            </div>';
				                        }
                                    
				                }  
                                }
                             if (isset($_POST['uploadimage'])) {   
        $target = "Images/".basename($_FILES['image']['name']);
        $db = mysqli_connect("localhost", "admin", "M0n@rch$", "cryptocurrency");
        $image = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $types = array('image/jpeg', 'image/gif','image/png');
        
        
       if(in_array($_FILES['image']['type'], $types)) 
        {
            $sql = mysqli_query($db,"update `userinfo` set `image` = 'Images/{$image}' where `email` = '{$Email}'");
            mysqli_query($db, $sql);
           
        }
        else
        {
            echo "<script>alert(\"Sorry! Couldn't upload the image. Invalid Format! .\")</script>";
           
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image Uploaded Successfully";
           echo "<meta http-equiv='refresh' content='0'>";
        } 
        else {
            $msg = "There Was A problem uploading image";
        }
           
}
				  ?>

                        </div>
                    </div>

                    <div id="tabbedwin" class="tabwindow">
                        <div class="tab" style="color:black">
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




                    <!--Php code for generating channel name from dB-->
                    <!--<div class="container1" style='overflow:auto; width:auto;height:300px; background-color:#00245e; opacity:0.9'>
					<h3>Channel Names</h3>
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
		                  echo "<div style='width:100%; height:40px; background-color:#e5e5e5; color:black; border:1px solid  #c4c4c4;   
	                           border-radius: 5px; text-align: center;'><p>" . $cname . "</p></div><br>"; 
	                       }
                        }
                    }
  
  ?>

				</div>-->

                </div>
            </div>
        </div>

        <!--	<div class="userdata">
			<h2>User Profile</h2>

			<form method="POST" enctype="multipart/form-data">

				<div class="container">

					<div>

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


					<?php
        
		if(isset($_SESSION['test']) ){
		$Email=$_SESSION['test'];
		$curemail=$_GET['email'];
		if($curemail==$Email){
		echo "<form method='POST' enctype='multipart/form-data'><input type='file' name='image' onchange='readURL(this);'required> <br><br><div>	<img id='blah' src='#' /></div></form>";
		echo'<br><button name="upload" onclick="test()">Submit</button>';
		}
		}
		
		
	if (isset($_POST['upload'])) {
        $target = "Images/".basename($_FILES['image']['name']);
        $db = mysqli_connect("localhost", "admin", "M0n@rch$", "cryptocurrency");
        $image = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        
        $types = array('image/jpeg', 'image/gif');
        
		
        if(in_array($_FILES['image']['type'], $types)) 
        {
            $sql = "UPDATE `userinfo` SET `image`='Images/{$image}' where `email`='{$Email}'";
            mysqli_query($db, $sql);
            
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			
            $msg = "Image Uploaded Successfully";
        } 
        else {
			
            $msg = "There Was A problem uploading image";
        }
        
}
        
?>
						<h5><a href="login.php">Return to chat</a></h5>
				</div>

				<br>
				<hr>
				<br>
				


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
		</div>-->
    </div>

</body>

</html>
