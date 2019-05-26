<!DOCTYPE html>
<html>
<head>
	<title>About CryptoTalk!</title>

	<meta name="viewport" content="initial-scale=1, maximum-scale=1">


	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Abeezee:400|Open+Sans:400,600,700|Source+Sans+Pro:400,600">

    <link rel="stylesheet" type="text/css" href="css/defaults.css">
	<link rel="stylesheet" type="text/css" href="css/help.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    
    

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/accordion.js"></script>
    
    

    <style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
        
       
.floating-box {
    float: left;
    width: 160px;
    height: 200px;
    margin: 10px;
    border: 3px solid black;  
    background-color: #031c44;
    opacity: 0.8;
}

    .floating-box1 {
    float: right;
    width: 210px;
    height: 290px;
    margin: 10px;
    border: 3px solid black;  
    background-color: #031c44;
    opacity: 0.8;
}
.after-box {
    clear: left;
    border: 3px solid red;      
}
.after-box {
    clear: left;
    border: 3px solid red;      
}
</style>

</head>
    
<body>
    <?php
    require_once ('db_connect.inc.php');
    session_start();
        if(isset($_SESSION['email']))
        {
            
            $Email = $_SESSION['email'];
           
        }

            if(isset($Email)) 
            {
                        echo '<ul>
                        <li><a class="active" href="./login.php">Return to chat</a></li>
						
					</ul>';
                if(isset($_SESSION['Name']));
                {
                    $cname=$_SESSION['Name'];
                    $sql= "SELECT image FROM `userinfo` WHERE email='{$Email}'";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result))
                    echo "<div align='center'><img src='Images/". $row['image'] ."' Height='60px' Width='60px' border-radius:30%;></div>";
                    echo '<div align="center"><h5 style="color:Black;font-size: 1.5em;">Hello '.$cname.', how we may help you?</h5></div>';
                
                }
            } 
    else
    {
        echo '<ul>
                        <li><a class="active" href="./index.php">Back</a></li>
						
					</ul>';
    }
?>
    
	<header>
        <h4 align="center" style="color:Black; font-size: 1.5em;">About CryptoTalk!</h4>

        
        <div align="center"><em><h6 style="color:Black; font-size: 1.5em;">Gain Badge's of reputation.</h6></em></div><br>
	</header>
<div style="margin-right:8%;">
    <div class="floating-box1"><p align="center" style="color:white; font-size: 1.5em;">No Badge.<img src="Images/un-badge.png" alt="Smiley face" height="40" width="40"></p><br>
        <em> <p style="color:Yellow; font-size: 1.3em;">1. Channel involvement score is 0.</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">2. Like count is 0.</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">3. dislike count is 0.</p><br>
                              <p style="color:Yellow; font-size: 1.2em;">4. Number of comments is 0.</p></em>
    </div>
    <div class="floating-box1"><p align="center" style="color:white; font-size: 1.5em;">Bronze Badge<img src="Images/b-badge.png" alt="Smiley face" height="40" width="40"></p><br>
                               <em><p style="color:Yellow; font-size: 1.3em;">1. Channel involvement should be less than equal to 2.</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">2. Like count should be less than equal to 1</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">3. Dislike count should be less than equal to 1.</p><br>
                                   <p style="color:Yellow; font-size: 1.3em;">4. Number of comments should be less than equal to 1.</p> </em>
    </div>
<div class="floating-box1"><p align="center" style="color:white; font-size: 1.5em;">Silver Badge<img src="Images/s-badge.png" alt="Smiley face" height="40" width="40"></p><br>
                              <em> <p style="color:Yellow; font-size: 1.3em;">1. Channel involvement should be less than equal to 5.</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">2. Like count should be less than equal to 20</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">3. Dislike count should be less than equal to 20.</p><br>
                                  <p style="color:Yellow; font-size: 1.3em;">4. Number of comments should be less than equal to 10.</p></em>
    </div>
<div class="floating-box1"><p align="center" style="color:white; font-size: 1.5em;">Gold Badge<img src="Images/g-badge.png" alt="Smiley face" height="40" width="40"></p><br>
                               <em><p style="color:Yellow; font-size: 1.3em;">1. Channel involvement should be greater than equal to 7.</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">2. Like count should be greater than equal to 30</p><br>
                              <p style="color:Yellow; font-size: 1.3em;">3. dislike count should be greater than equal to 30</p><br>
                                   <p style="color:Yellow; font-size: 1.3em;">4. Number of comments should be greater than equal to 20.</p></em>
    </div>

    </div>

	<br><br>
	<div class="main">
		<div class="accordion">
			<div class="accordion-section">
                
                <strong><a class="accordion-section-title" href="#accordion-1">Account</a></strong>
				<div id="accordion-1" class="accordion-section-content">
 
<br>
                              <p style="color:black; font-size: 1.1em;">1. You can Edit <i class="fa fa-pencil" aria-hidden="true"></i> your profile.</p><br>
                              <p style="color:black; font-size: 1.1em;">2. Upload a profile <i class="fa fa-picture-o" aria-hidden="true"></i> photo.</p><br>
                              <p style="color:black; font-size: 1.1em;">3. Sign up and create your own account.</p>
    

                    
                    
				</div>
			</div>

			<div class="accordion-section">
                <strong><a class="accordion-section-title" href="#accordion-2">Messaging</a></strong>
				<div id="accordion-2" class="accordion-section-content">
 
                    <br>
                              <p style="color:black; font-size: 1.1em;">1. User can reply <i class="fa fa-reply" aria-hidden="true"></i> to any message in any channel.</p><br>
                              <p style="color:black; font-size: 1.1em;">2. User can provide <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> and <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> reactions.</p><br>
                              <p style="color:black; font-size: 1.1em;">3. Superuser can delete <i class="fa fa-trash-o" aria-hidden="true"></i> the messages.</p>
    


                    
				</div>
			</div>

			<div class="accordion-section">
                <strong><a class="accordion-section-title" href="#accordion-3">Files</a></strong>
				<div id="accordion-3" class="accordion-section-content">
                    

                        
                              <p style="color:black; font-size: 1.1em;">1. User will be able to add images <i class="fa fa-picture-o" aria-hidden="true"></i> from the local machine.</p><br>
                              <p style="color:black; font-size: 1.1em;">2. upload any image from the <i class="fa fa-globe" aria-hidden="true"></i> web.</p><br>
                              <p style="color:black; font-size: 1.1em;">3. Delete <i class="fa fa-trash-o" aria-hidden="true"></i> any uploaded image.</p>
    

				</div>
			</div>
            <div class="accordion-section">
                <strong><a class="accordion-section-title" href="#accordion-4">Score calculation.</a></strong>
				<div id="accordion-4" class="accordion-section-content">

                    
                              <p style="color:black; font-size: 1.1em;">Your Score is generated based on the Number of Posts, number of Channels and Reactions. Which is divided into 3 Categories: Gold badge, Silver badge and Bronze badge.</p>
   

				</div>
			</div>
            <div class="accordion-section">
                
                <strong><a class="accordion-section-title" href="#accordion-5">Public and Private Channels</a></strong>
				<div id="accordion-5" class="accordion-section-content">
                    
                    
                    <ul style="background-color: white; font-size: 1.733em;line-height: 0.650em;">
					
                        <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">User can create Public as well as private Channels. Public Channels are accessibe by everyone, but private channels will be displayed only to the group members.</p>
                        
                    </ul>
                    
                    
				</div>
            </div>
                <div class="accordion-section">
                
                <strong><a class="accordion-section-title" href="#accordion-6">Administrator</a></strong>
				<div id="accordion-6" class="accordion-section-content">
                    
                    
                    <ul style="background-color: white; font-size: 1.733em;line-height: 0.650em;">
					
                        <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">Administrator is a super user who alone can perform following tasks:- </p>
                        <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">Archive <i class="fa fa-archive" aria-hidden="true"></i> and Unarchive of a Channel</p>
                        <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">Edit <i class="fa fa-pencil" aria-hidden="true"></i> Channel membership</p>
                        <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">Delete <i class="fa fa-trash-o" aria-hidden="true"></i> posts</p>
                        <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">Invite User</p>
                       

                    </ul>
                    
                    
				</div>
			</div>
                <div class="accordion-section">
                
                <strong><a class="accordion-section-title" href="#accordion-7">Styling of a text.</a></strong>
				<div id="accordion-7" class="accordion-section-content">
                    
                    
                    <ul style="background-color: white; font-size: 1.733em;line-height: 0.650em;">
                        <h6><strong>Bold Text</strong></h6>
                    <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">
                        If inserted message consists of @b Hello b@ then it will convert Hello to bold.
                        
                    </p>
                        <p><em><h6>Italic Text</h6></em></p>
                    <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">
                        If inserted message consists of @i Hello i@ then it will convert Hello to Italics.
                        
                    </p>
                    <p><code><h6>Computer Code</h6></code></p>
                    <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">
                        If inserted message consists some piece of code between @code  code@ then it will print the code in its specified format. 
                        
                    </p>
                        <h6><mark>Highlighted text</mark></h6>
                    <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">
                        If inserted message consists of @m Hello m@ then it will convert Hello to marked text.
                        
                    </p>
                        <del><h6>Strike through</h6></del>
                    <p style="margin: 5px 0px 5px 20px;font-size: 0.6em;line-height: 1.2em;">
                        If inserted message consists of @d Hello d@ then it will convert Hello to striked text.
                        
                    </p>

                        
                    </ul>
                    
                    
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>