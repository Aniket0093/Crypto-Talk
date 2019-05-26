<html>
    <head>
<link rel="stylesheet" type="text/css" href="css/form.css">
        <style>
            body,
    html {
        background-image: url('Images/step1.jpg');
        background-repeat: no-repeat;
        background-size: 100%;

    }
.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100px;
  height: 100px;
        </style>
    </head>
    
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

<!--    <div align="center" class="btcwdgt-chart"></div>-->
    
    
    
    <script type="text/javascript">
baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByTagName("script");
var embedder = scripts[ scripts.length - 1 ];
(function (){
var appName = encodeURIComponent(window.location.hostname);
if(appName==""){appName="local";}
var s = document.createElement("script");
s.type = "text/javascript";
s.async = true;
var theUrl = baseUrl+'serve/v3/coin/chart?fsym=BTC&tsyms=USD,EUR,CNY,GBP,GOLD,JPY,RUB,SGD,CAD,INR';
s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
embedder.parentNode.appendChild(s);
})();
</script>
    
</html>
<!--
<script>
  (function(b,i,t,C,O,I,N) {
    window.addEventListener('load',function() {
      if(b.getElementById(C))return;
      I=b.createElement(i),N=b.getElementsByTagName(i)[0];
      I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
    },false)
  })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');
</script>-->
