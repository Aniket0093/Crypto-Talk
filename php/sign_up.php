<html>

<head>
	<style>
		body {
			background-image: url("Images/coins.PNG");
			background-repeat: no-repeat;
			background-position: left;
		}

	</style>

	<link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>CryptoTalk!</title>
	<link rel="shortcut icon" type="image/x-icon" href="Images/logo.png" />
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<meta charset=utf-8 />

	<style>
		form {
			border: 1px solid #ccc;
			color: white;
			border-radius: 10px;
			background-color: #031c44;
			padding-top: 5%;
			width: 33%;
			height: 80%;
			margin-top: 3%;
			opacity: 0.90;
		}

		h1 {
			margin-top: 0;
			color: white;
			text-align: center;
		}

		.center {
			margin: auto;
			width: 50%;
			padding: 10px;
		}

		.button {

			font-size: 16px;
			background-color: #4CAF50;
			color: White;

		}

	</style>
	<div>



		<form style="float:right" class="form" method="post" action="sign_up.php" enctype="multipart/form-data">
			<div>
				<h1>SignUp</h1>

				<div top-margin:0>
					<label><b>UserName</b></label>
					<input class="textbox" type="text" placeholder="Enter UserName" name="username" required><span>*</span>
				</div>
				<br>
				<br>

				<div>
					<label><b>Email</b></label>
					<input tabindex="1" accesskey="u" id="email" class="textbox" type="text" pattern="[^ @]*@[^ @]*" onchange="myFunction()" placeholder="Enter Email" name="email" required><span>*</span>
				</div>
				<br>
				<br>


				<div>
					<label><b>TagName</b></label>
					<input class="textbox" type="text" placeholder="Enter TagName" name="tagname" required><span>*</span>
				</div>
				<br>
				<br>


				<div>
					<label><b>Password</b></label>
					<input class="textbox" type="password" placeholder="Enter Password" name="psw" required><span>*</span>
				</div>
				<br>
				<br>


				<div>
					<label><b>Repeat Password</b></label>
					<input class="textbox" type="password" placeholder="Repeat Password" name="psw-repeat" required><span>*</span>
				</div>
				<br>
				<br>


				<div>
					<label><b>Upload Photo</b></label>
					<form method="post" enctype="multipart/form-data">
						<table>


							<td><input type="file" name="image" onchange="readURL(this);" required><br><br>
								<img id="blah" src="#" /></td>
						</table>

					</form>


				</div>


				<?php
          
	if (isset($_POST['upload'])) {
        $target = "Images/".basename($_FILES['image']['name']);
        $db = mysqli_connect("localhost", "admin", "M0n@rch$", "cryptocurrency");
        $image = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=strip_tags($_POST['email']);
        $tagname=mysqli_real_escape_string($db,$_POST['tagname']);
        $password=md5(strip_tags($_POST['psw']));
        $repeatpassword=md5(strip_tags($_POST['psw-repeat']));
        $types = array('image/jpeg', 'image/gif');
        if($password!=$repeatpassword)
        {
            $_SESSION['message1']='Passwords do not match';
        }
        else if(in_array($_FILES['image']['type'], $types)) 
        {
            $sql = "INSERT INTO userinfo (username,password,email,tagname,image,imagetype) VALUES ('$username','$password','$email','$tagname','$image','$type')";
            mysqli_query($db, $sql);
            $_SESSION['message']='Registration Complete';
        }
        else
        {
            
            $_SESSION['message2']='Invalid Format!';
           
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image Uploaded Successfully";
        } 
        else {
            $msg = "There Was A problem uploading image";
        }
        
}
        
?>
					<table align="center">
						<tr>
							<button class="button" type="submit" name="upload" value="upload">Sign Up</button>
						</tr>
						<tr>
							<form action="index.php">
								<button class="button" type="submit" name="upload" value="upload">Cancel</button>
							</form>
						</tr>
					</table>

					<table align="center">
						<td>
							<font color="Green">
								<?php if (isset($_SESSION['message']))
                    {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
							</font>
						</td>

					</table>
					<table align="center">
						<td>
							<font color="Red">
								<?php if (isset($_SESSION['message2']))
                    {
                        echo $_SESSION['message2'];
                        unset($_SESSION['message2']);
                    }
                    ?>
							</font>
						</td>

					</table>
					<table align="center">
						<td>
							<font color="red">
								<?php if (isset($_SESSION['message1']))
                    {
                        echo $_SESSION['message1'];
                        unset($_SESSION['message1']);
                    }
                    ?>
							</font>
						</td>
					</table>
			</div>
		</form>




		<script>
			function myFunction() {
				var x = document.getElementById("email").value;
				location.href = "verifyemail.php?email=" + x;
			}

			var a = "<?php 
			if (isset($_SESSION['test'])) {
				$s = $_SESSION['test'];
				echo $s;
			} 
			?>";
			if (a == 1) {
				alert('Email already exists');
				var q = document.getElementById("email");
				q.value = '';
			} else {
				var q = document.getElementById("email");
				var z = "<?php 
				if (isset($_SESSION['email'])) {
					$s = $_SESSION['email'];
					echo $s;
				} 
			?>";
				q.value = z;
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

		</script>

	</div>



</head>


<body>

	<ul>
		<li><img src="Images/logo.png" width="40" height="20" alt="Logo"></li>
		<li style="float:right"><a href="./helppage.php"><i class="fa fa-question-circle fa-fw" href="helppage.html" aria-hidden="true"></i></a></li>
	</ul>


</body>

</html>
