<!DOCTYPE html>
<html>

<head>
    <title>CryptoTalk!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="signin.css">
    <link rel="stylesheet" type="text/css" href="css/fancytext.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type='text/javascript'>
        function reCaptchad() {
            document.getElementById("signin").disabled = false;
        }

        function validate_email() {
            var x = document.getElementById("r_email").value;
            $.ajax({
                url: "verifyemail.php",
                method: 'GET',
                data: "email=" + x,
                success: function(result) {
                    console.log(result);
                    if (result == "exist") {
                        alert("Email id already exist");
                        document.getElementById("r_email").value = "";
                    }

                }

            });


        }

        function validate_pass() {
            if (document.getElementById("pass").value != document.getElementById("re_pass").value)
                alert("Please enter same password");
        }

    </script>


    <style>
        body,
        html {
            background-image: url('Images/cryptocurrency.gif');
            background-repeat: no-repeat;
            background-size: 100%;
            color: white;
            overflow: hidden;
        }

        form {
            border: 1px solid #ccc;
            color: white;
            border-radius: 10px;
            background-color: #031c44;
            height: 50%;
            margin: auto;
            position: relative;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <svg viewBox="0 0 960 150">
    <symbol id="s-text">
		<text text-anchor="middle" x="50%" y="80%">CryptoTalk! </text>
	</symbol>

	<g class = "g-ants">
		<use xlink:href="#s-text" class="text-copy"></use>
		<use xlink:href="#s-text" class="text-copy"></use>
		<use xlink:href="#s-text" class="text-copy"></use>
		<use xlink:href="#s-text" class="text-copy"></use>
		<use xlink:href="#s-text" class="text-copy"></use>
	</g>
</svg>
        </div>

        <div class="row">

        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6" style="width:auto">

            <div class="centerc">
                <div class="panel with-nav-tabs panel-info" style="width: 60%; background-color:#031c44;opacity:0.95;">
                    <div class="panel-heading" style="background-color: #031c44;border-color: transparent;">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login" data-toggle="tab"> Login </a></li>
                            <li><a href="#signup" data-toggle="tab"> Signup </a></li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">

                            <div id="login" class="tab-pane fade in active register">
                                <form name="signform" method="POST" action="login.php">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <h2 class="text-center" style="color: white;"> <strong> Login  </strong></h2>
                                            <br>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-user"></span>
                                                            </div>
                                                            <input tabindex="1" accesskey="u" type="email" class="form-control" placeholder="Enter Email" name="email" id="email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-lock"></span>
                                                            </div>

                                                            <input tabindex="2" accesskey="p" type="password" class="form-control" pattern=".{1,}" placeholder="Enter Password" name="password" id="password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <?php if (isset($_SESSION['message']))
                                                        {
                                                        echo $_SESSION['message'];
                                                        unset($_SESSION['message']);
                                                        }
                                                ?>
                                                <div class="col-xs-6 col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <a href="#forgot" data-toggle="modal"> Forgot Password? </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">

                                                <div class="g-recaptcha" data-sitekey="6LcPTzwUAAAAACozxAtzNjjF11jUpBPUH5zr34K2" data-callback="reCaptchad"></div>
                                                <br/>
                                                





                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <br>
                                                    <button id="signin" type="submit" class="btn btn-success btn-block btn-lg" name="cmdlogin" onclick="validate_login()" disabled> Login </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                    <div id="OAuth_login" style="display:inline-block;margin-left:70px;">
                                                    <h5 style="display: inline-block; margin-left:5px;"> <strong>Login with : </strong></h5>
                                                    <div class="gitHubWrapper" style="display: inline-block; margin-left:5px;">
                                                        <a href="https://github.com/login/oauth/authorize?scope=user:email&client_id=efd986ccb7b5095e4186">
                                                        <i class="glyphicon fa fa-github"></i>&nbsp;&nbsp; GitHub
                                                        </a>
                                                    </div>
                                                </div>
                            </div>


                            <div id="signup" class="tab-pane fade">
                                <form name="signupform" method="POST" action="login.php">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <h2 class="text-center" style="color: #f0ad4e;">
                                                <Strong> Register </Strong>
                                            </h2>
                                            <hr />
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-user"></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Enter User Name" id="username" name="username" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="fa fa-at"></span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Enter Tag Name" id="tagname" name="tagname" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-envelope"></span>
                                                            </div>
                                                            <input type="email" class="form-control" placeholder="Enter E-Mail" id="r_email" name="remail" onchange="validate_email()" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-lock"></span>
                                                            </div>
                                                            <input id="r_password" type="password" class="form-control" placeholder="Enter Password" name="rpassword" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon iga1">
                                                                <span class="glyphicon glyphicon-lock"></span>
                                                            </div>
                                                            <input id="re_pass" type="password" class="form-control" placeholder="Please re-enter Password" name="r_password" required onchange="validate_pass()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" name="register" class="btn btn-lg btn-block btn-warning"> Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>



    <div class="modal fade" id="forgot">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
                    <h4 class="modal-title" style="font-size: 32px; padding: 12px;"> Recover Your Password </h4>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga2">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Enter Your E-Mail ID" name="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon iga2">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Enter Your New Password" name="newpwd">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-info"> Save <span class="glyphicon glyphicon-saved"></span></button>

                        <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
