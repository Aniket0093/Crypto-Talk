

<html>
<head>

    <title>CryptoTalk!</title>
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
     <link rel="shortcut icon" type="image/x-icon" href="Images/logo.png" />
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
</head>

<style>
    body,
    html {
        background-image: url('Images/cryptocurrency.jpg');
        background-repeat: no-repeat;
        background-size: 100%;

    }
    form {
        border:1px solid #ccc;
        color: white;
        border-radius: 10px;
        background-color:#031c44;
        width:35%;
        height:50%;
        margin:auto;
        position:relative;
        }
    
</style>
    

<body>
    
    <ul>
        <li><a class="active" href="index.php">Home</a></li>

    </ul>
    <br><br><br><br><br><br>
    <div align="center">
        <img src="Images/coins-a.png" width=30%; alt="Logo"/>
    </div>
  
    <form style='opacity:0.95' class="form" method="post" action="login.php" method="POST" action="">
        <h1 style='color :white'>SignIn</h1>
        <table align="center">
    <td><font color="red">
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
            <tr>
                <td><img style='filter:invert(100%);' src="Images/user.png" width="50" height="28" alt="Logo"/></td>
    <td><input tabindex="1" accesskey="u" type="email" class="textbox" pattern="[^ @]*@[^ @]*" placeholder="Enter Email" type="text" name="email" id="email" required></td>
            </tr>
        </table>

    
           <table align="center">
                <tr>
                    <td><img style='filter:invert(100%);' src="Images/pass.png" width="50" height="28" alt="Logo"/></td>
               
<td><input tabindex="2" accesskey="p" type="password" class="textbox"  pattern=".{1,}" placeholder="Enter Password" name="password" id="password"  required></td>
          
                </tr>
			</table>
        <table align="center">
            <td><button type="submit" name="cmdlogin" accesskey="l" class="button" style="vertical-align: middle"><span>LogIn</span></button></td>
        </table>

<table align="center">
            <td><a href="sign_up.php" style='color :cyan'>Sign Up</a></td>
                
</table>


    
       
    </form>
</body>


</html>