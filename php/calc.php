<!DOCTYPE HTML>
<html lang="en">
<head>


<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/form.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="styling.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    
    <style>
        body,
    html {
        background-image: url('Images/step1.jpg');
        background-repeat: no-repeat;
        background-size: 100%;

    }
  *{
        font-family: 'Inconsolata', monospace;
        
    }
    
   
    .container1 {
        width: 20%;
        float: left;
        background-color: black;
        margin: 80px auto;
    }
        .container2 {
        width: 20%;
        float: left;
        background-color: white;
        margin: 80px auto;
    }
        
        
    table {
        width: 100%;
        border-color: #f4f4f4;
    }
    td {
        width: 25%;
    }
    button {
        width: 100%;
        height: 70px;
        font-size: 24px;
        background-color: white;
        border: none;
    }
    #inputLabel {
        height: 120px;
        font-size: 40px;
        vertical-align: bottom;
        text-align: right;
        padding-right: 16px;
        background-color: #ececec;
    
    }
        
    html {
        font-size: 20px;
    }

    .panel {
        background: #333333;
        border: solid white;
    }

.results {
  font-size: 1em;
  color: #FFFFFF;
}

.dropdown {
  margin-bottom: 50px;
}

.inline-block {
  display: inline-block;
}

.center {
  width: 90%;
  margin: 0 auto 30px;
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
                        
						
                        </li>
					</ul>';
    
            }
    ?>
    



<!--
        <ul>
           
                        <li style="float:right"><a href='./logout.php'>Sign Out</a></li>
            
					</ul>
-->



<!--
<div class="container1">
    <table border="1" cellspacing="0">
        <tr>
            <td colspan="4" id="inputLabel">0</td>
        </tr>
        <tr>
            <td colspan="3"><button onclick="pushBtn(this);">AC</button></td>
            <td><button onclick="pushBtn(this);">/</button></td>
        </tr>
        <tr>
            <td><button onclick="pushBtn(this);">7</button></td>
            <td><button onclick="pushBtn(this);">8</button></td>
            <td><button onclick="pushBtn(this);">9</button></td>
            <td><button onclick="pushBtn(this);">*</button></td>
        </tr>
        <tr>
            <td><button onclick="pushBtn(this);">4</button></td>
            <td><button onclick="pushBtn(this);">5</button></td>
            <td><button onclick="pushBtn(this);">6</button></td>
            <td><button onclick="pushBtn(this);">-</button></td>
        </tr>
        <tr>
            <td><button onclick="pushBtn(this);">1</button></td>
            <td><button onclick="pushBtn(this);">2</button></td>
            <td><button onclick="pushBtn(this);">3</button></td>
            <td><button onclick="pushBtn(this);">+</button></td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="pushBtn(this);">0</button></td>
            <td><button onclick="pushBtn(this);">.</button></td>
            <td><button onclick="pushBtn(this);">=</button></td>
        </tr>
    </table>
</div>
-->
    

  <div class="row">
    <div style="margin-top: 120px;" class="col-md-6 col-md-offset-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading">
          
            <h4 style="color: white;">Live Cryptocurrencies <h3 ><script type="text/javascript">
crypt_multi_num_cur = "3";
crypt_base_cur_0 = "Bitcoin (BTC)";crypt_target_cur_0 = "US Dollar (USD)";crypt_base_cur_1 = "Litecoin (LTC)";crypt_target_cur_1 = "US Dollar (USD)";crypt_base_cur_2 = "Ethereum (ETH)";crypt_target_cur_2 = "US Dollar (USD)";crypt_multi_font_color = "#FFFFFF";</script><script type="text/javascript" src="https://www.cryptonator.com/ui/js/widget/multi_widget.js"></script></h3></h4>
            
            
            
        </div>
        
        <div class="panel-body">
            <script type="text/javascript">
crypt_calc_border_width = 2;crypt_calc_font_family = "Sans-Serif";</script><script type="text/javascript" src="https://www.cryptonator.com/ui/js/widget/calc_widget.js"></script>
            
            
        </div>
      </div>
    </div>
  </div>


    
 
<script>
    var inputLabel = document.getElementById('inputLabel');
     
    function pushBtn(obj) {
         
        var pushed = obj.innerHTML;
         
        if (pushed == '=') {
            // Calculate
            inputLabel.innerHTML = eval(inputLabel.innerHTML);
             
        } else if (pushed == 'AC') {
            // All Clear
            inputLabel.innerHTML = '0';
             
        } else {
            if (inputLabel.innerHTML == '0') {
                inputLabel.innerHTML = pushed;
                 
            } else {
                inputLabel.innerHTML += pushed;
                 
            }
        }
    }
</script>
    
    
    
    
</body>
</html>