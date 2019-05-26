<!DOCTYPE HTML>
<html>
<head>

    <title>CryptoTalk!</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
     <link rel="shortcut icon" type="image/x-icon" href="Images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
    body,
    html {
        background-image: url('Images/step1.jpg');
        background-repeat: no-repeat;
        background-size: 100%;

    }
	
	h3{
		text-align:center;
	}
	
	h2{
		text-align:center;
	}
</style>

<body>

    <ul>
        <li><a class="active" href="login.php">Home</a></li>
 <li style="float:right"><a href="./helppage.php"><i class="fa fa-question-circle fa-fw" href="helppage.html" aria-hidden="true"></i></a></li>
    </ul>
    <br><br><br><br><br><br>
    

    <form style="border-radius: 10px; background-color: #031c44; width: 30%; color: white; opacity:0.9"  method="POST" action="addchannel.php">
	<br>
        <h2 style="color:white; font-family: sans-serif;">Create Channel</h2>
        <table width="100px">
            <tr>
                <td><h4>Channel Name:</h4>
                </td>
                <td>
                    <input id="cname" onchange="myFunction()"  accesskey="u" class="textbox"  placeholder="Enter Channel Name" pattern="^[a-zA-Z0-9_-]+$" type="text" name="cname" required></td>
            </tr>
       
            
			<tr>
                <td><h4>Description:</h4>
                </td>
                <td>
                    <input tabindex="1" accesskey="u" class="textbox"  placeholder="Enter Channel Description" type="text" name="cdesc" required></td>
            </tr>
            
            <tr></tr>
			<tr>
                <td><h4>Tag:</h4>
                </td>
                <td>
                    <input tabindex="1" accesskey="u" class="textbox"  placeholder="Enter Channel Tag" type="text" name="ctag" id="ctag" required></td>
            </tr>
			<tr>
                <td><h4>Type:</h4>
                </td>
                <td>
                    <input type="radio" name="ctype" value="Private" required>Private</input>
					<br><br>
					<input type="radio" name="ctype" value="Public" required>Public</input>
            </tr>
            
            <td>
                <td><button type="submit" name="cmdlogin" accesskey="l" class="button" style="vertical-align: middle"><span>Create</span></button></td>
        </table>
		<h3><a href="login.php">Return to chat</a></h3>
    </form>
	
	
	
	<script>
	
function myFunction(){
    var x = document.getElementById("cname").value;
	location.href="verifychannel.php?cname="+x;
}

var a = "<?php 
	if (isset($_SESSION['test'])){
	$s = $_SESSION['test'];
	echo $s;
	}
	?>";
	
	if(a==1)
	{
		alert('Channel name already exists');
	var q = document.getElementById("cname");
	q.value = '';
	}else{
		var q = document.getElementById("cname");
		var z = "<?php 
	if (isset($_SESSION['chname'])){
	$s = $_SESSION['chname'];
	echo $s;
	}
	?>";
	q.value = z;
	}
	


</script>

</body>


</html>