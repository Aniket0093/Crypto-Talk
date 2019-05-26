<!DOCTYPE html>
<html>

<head>

	<title>CryptoTalk!</title>
	<link rel="stylesheet" type="text/css" href="css/chat.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div id="rightmySidenav" class="rightsidenav">
	 <div id="replywindowheader" class="header">
		<h3><label id="reply_head">Reply Message</label></h3>
		<a href="javascript:void(0)" class="closebtn" onclick="rightcloseNav()">&times;</a>
		<hr>
	</div> 
</div>

<body>


	<script src="js/jscripts.js">
	
	</script>
	
	<script type='text/javascript'>

        function check(CName,b)
        {
			$.ajax({
				url: "second_page.php",
				data: "page=" + b,
				success: function (result) {
					console.log(result);
					$("#chat_box").empty();
					$("#chat_box").append(result);
					},
				error: function(){
				alert("error");
				}
				});
        }

</script>
	<?php
	require_once ("functions.inc.php");
class SimpleChat {
    var $sDbName;
    var $sDbUser;
    var $sDbPass;
    
function SimpleChat() {
        $this->sDbName = 'cryptocurrency';
        $this->sDbUser = 'admin';
        $this->sDbPass = 'M0n@rch$';
    }    
    
function acceptDMessages($Email,$name,$msgtyp,$cid,$uid) {
		$email=$Email;
        $dname=$name;   
        $msgtype=$msgtyp;
        $cid=$cid;
        $uid=$uid;
        

$vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass, $this->sDbName);

$sMessage = htmlspecialchars(mysqli_real_escape_string($vLink,$_POST['s_message']));
                
if ($sMessage != '') {
mysqli_query($vLink,"INSERT INTO `message` SET `Message`='{$sMessage}', `messageformat`='text',`MessageType`='{$msgtype}', `CId`='{$cid}', `UserId`='{$uid}', `WId`=1, `Source`='{$email}',`Destination`='{$dname}',`lcount`=0, `dcount`=0, `TimeStamp`=CURRENT_TIMESTAMP()");
                }
                mysqli_close($vLink);
            
           
        ob_start();
        require_once('second_page.php');
        $sShoutboxForm = ob_get_clean();
        return $sShoutboxForm;
    }


function get_message_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);   
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}

function acceptDMessages1($Email,$dmail,$sid) {
		$email=$Email;
        $dmail=$dmail;
		$sid=$sid; 
     
        
$vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass, $this->sDbName);				
$sMessage = htmlspecialchars(mysqli_real_escape_string($vLink,$_POST['s_message']));
if ($sMessage != '') {
mysqli_query($vLink,"INSERT INTO `message` SET `Message`='{$sMessage}', `messageformat`='text', `MessageType`='D', `UserId`='{$sid}', `WId`=1, `Source`='{$email}',`Destination`='{$dmail}', `lcount`=0, `dcount`=0, `TimeStamp`=CURRENT_TIMESTAMP()");
                }
                mysqli_close($vLink);
          
        ob_start();
        require_once('second_page.php');
        $sShoutboxForm = ob_get_clean();
        return $sShoutboxForm;
    }

function getMessages($cid,$pag) //Group Messaging.
	{		
	
$vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass);
mysqli_select_db($vLink,$this->sDbName);
    
    
    $qry2=mysqli_query($vLink,"SELECT CName from `channel` WHERE `CId`='{$cid}'");
    
    while($res=mysqli_fetch_array($qry2))
    {
        $CName=$res['CName'];
    }
    $page=$pag;
    
if($page=="" || $page=="1")
{
    $page1=0;
    
}
    else
    {
        $page1=($page*10)-10;
    }

$vRes = mysqli_query($vLink,"SELECT m.TimeStamp,c.status,m.messageformat,u.username,c.CName,u.image,m.Destination,m.dcount,m.lcount,m.UserId,m.MId,m.Source,m.Message,
m.TimeStamp as TimeStamp FROM `message` m,`userinfo` u, `channel` c where m.CId=c.CId and m.UserId=u.userid and 
m.CId = '{$cid}'  GROUP BY `TimeStamp` ORDER BY `TimeStamp` DESC limit $page1,10");
	
$sMessages = '';

$dRes = mysqli_query($vLink,"SELECT DISTINCT DATE_FORMAT(TimeStamp, '%W %M %D %Y') as TimeStamp FROM `message` limit $page1,10");

$count= mysqli_num_rows($dRes);
		
if($dRes){
			while($adisplay = mysqli_fetch_array($dRes))
			{
			
			$storedate=	$adisplay['TimeStamp'];
		$sdisplay='<div style="font-family:Arial;"> <hr style="width:40%;float:left"><span style="margin-left:1%;margin-right:1">'.$adisplay['TimeStamp'].' </span><hr style="width:40%;float:right;"> </div>';				
			}
		}

		 if ($vRes) {
            while($aMessages = mysqli_fetch_array($vRes)) {
				//echo $aMessage['MId'];
				$replycount = mysqli_query($vLink,"SELECT count(s.subid) as cont from `submessage` s INNER JOIN `message` m ON m.MId=s.mid where m.MId = '{$aMessages['MId']}'");
				$rcount= mysqli_num_rows($replycount);
				while($rcnt=mysqli_fetch_array($replycount)){
				if($rcnt['cont']>0){
					if($rcnt['cont']==1){
					$cnt=$rcnt['cont'].' reply';
					}
					else{
					$cnt=$rcnt['cont'].' replies';	
					}
				}else{
					$cnt="";
				}
				}
				
				
                if($aMessages['messageformat']=='image'){
					$mtype='<a target="_blank" href="Images/'.$aMessages['Message'].'">
					<img class="user_profile" src="Images/'.$aMessages['Message'].'" style=width:10%; height:10%;></img>
					</a>';
                    
                }
				else{
				$mtype="";   
                }
				
				 if($aMessages['messageformat']=='file'){
					$ftype='<a href="files/'.$aMessages['Message'].'" target="_blank" download>Download file</a>';
                    
                }
				else{
				$ftype="";   
                }
				
				
				
				
				if (strpos($aMessages['Message'], '@b') !== false && strpos($aMessages['Message'], 'b@') !== false) {
    			
					
				$key1='@b';
				$key2='b@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<b>".$parsed."</b>"; 


				$trimmed = str_replace('@b'.$parsed.'b@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}



				if (strpos($aMessages['Message'], '@i') !== false && strpos($aMessages['Message'], 'i@') !== false) {
					echo 'true';

				$key1='@i';
				$key2='i@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<i>".$parsed."</i>"; 


				$trimmed = str_replace('@i'.$parsed.'i@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}

				if (strpos($aMessages['Message'], '@code') !== false && strpos($aMessages['Message'], 'code@') !== false) {
					echo 'true';

				$key1='@code';
				$key2='code@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<pre><code>".$parsed."</code><pre>"; 


				$trimmed = str_replace('@code'.$parsed.'code@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}
				
				if (strpos($aMessages['Message'], '@m') !== false && strpos($aMessages['Message'], 'm@') !== false) {
					echo 'true';

				$key1='@m';
				$key2='m@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<mark>".$parsed."</mark>"; 


				$trimmed = str_replace('@m'.$parsed.'m@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}
				
				if (strpos($aMessages['Message'], '@d') !== false && strpos($aMessages['Message'], 'd@') !== false) {
					echo 'true';

				$key1='@d';
				$key2='d@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<del>".$parsed."</del>"; 


				$trimmed = str_replace('@d'.$parsed.'d@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}
				
				
				
				
				
				$stat=$aMessages['status'];

if($stat=='unarchived'){	
$sMessages .= '<div id="wholemessage" value="'.$aMessages['MId'].'"> <table><tr><td>

<img class="user_profile" src="'.$aMessages['image'].'" style=width:50px;border-radius:30%;></img>


</td><td><h4 style="font-family:Arial;">'.$aMessages['username'].'</h4></td><td></td><td><h6 style="font-family:Arial;"> '.$aMessages['TimeStamp'].'</h6></td>
				 
<span id=reaction_buttons style=float:right;width:14%;display:inline;> 

<div id=all_btn>
<div style="float:right;">

				 

				 
<button title="Click to reply" id="'.$aMessages['MId'].'" name="'.$aMessages['Message'].'" value="'.$aMessages['Destination'].'" onclick="getreply(this.id,this.name,'.$_SESSION['usid'].',this.value)"><img src="Images/reply.png" width=15px height=15px;/></button>

<button title="Delete Message" id="'.$aMessages['MId'].'" name="'.$aMessages['CName'].'" onclick="delete_msg(this.id,this.name)"><img src="Images/delete.png" width=15px height=15px;/></button>

</div>
				 
</div>

</span></tr></table>
<div><div id="Message" style="margin-left:5%; font-family:Arial;">'.$aMessages['Message'].'</div>

'.$mtype.'
'.$ftype.'
</div><br>
				 
</div><div id="showreac"> <button title="like" id="'.$aMessages['TimeStamp'].'" name="like" value="'.$aMessages['Destination'].'" 

onclick="getreaction(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['MId'].')">

<img src="Images/like.png" width=15px height=15px;/>' .$aMessages['lcount'].'</button><button title="dislike" id="'.$aMessages['TimeStamp'].'" name="dislike" value="'.$aMessages['Destination'].'" 

onclick="getreaction(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['MId'].')">
<img src="Images/dislike.png" width=15px height=15px;/>' .$aMessages['dcount'].'</button> </div><br>

<div><button style="background:white; border:none; color: blue;" id="'.$aMessages['MId'].'" name="'.$aMessages['Message'].'" value="'.$aMessages['Destination'].'" onclick="getreply(this.id,this.name,'.$_SESSION['usid'].',this.value)">'.$cnt.'</button></div><hr>';

$cnt="";
}
else{
$sMessages .= '<div id="wholemessage" value="'.$aMessages['MId'].'"> <table><tr><td>

<img class="user_profile" src="Images/'.$aMessages['image'].'" style=width:50px;border-radius:30%;></img>


</td><td><h4 style="font-family:Arial;">'.$aMessages['username'].'</h4></td><td></td><td><h6 style="font-family:Arial;"> '.$aMessages['TimeStamp'].'</h6></td>
				 
<span id=reaction_buttons style=float:right;width:14%;display:inline;> 

<div id=all_btn>
<div style="float:right;">

				 

				 
<img src="Images/reply.png" width=15px height=15px;/>

<img src="Images/delete.png" width=15px height=15px;/>

</div>
				 
</div>

</span></tr></table>
<div><div id="Message" style="margin-left:5%; font-family:Arial;">'.$aMessages['Message'].'</div>
<img class="user_profile" src="Images/'.$mtype.'" style=width:10%; height:10%;></img>
</div><br>
				 
</div><div id="showreac"> <img src="Images/like.png" width=15px height=15px;/>' .$aMessages['lcount'].'<img src="Images/dislike.png" width=15px height=15px;/>' .$aMessages['dcount'].'</div><br>
<div>'.$cnt.'</div><hr>';
			
}

			
}	//Main while
             
             
$vRes1 = mysqli_query($vLink,"SELECT u.image,m.Destination,m.dcount,m.lcount,m.UserId,m.MId,m.Source,m.Message,DATE_FORMAT(m.TimeStamp, '%k:%i:%s') 
as TimeStamp FROM `message` m,`userinfo` u where m.UserId=u.userid and m.CId = '{$cid}' ORDER BY `TimeStamp` DESC"); 
			$count1= mysqli_num_rows($vRes1);
             
            $a=$count1/10;
             $a=ceil($a);
            
             
             echo "<div id=\"pagination_tab\" align='center'>";
             for($b=1;$b<=$a;$b++)
             {
                 
    ?>
		<font size="4">
            
            <button onClick="check('<?php echo $CName; ?>',<?php echo $b; ?>)"><?php echo $b." "; ?></button>
            
			
		</font>
		<?php
                 
             }
             echo"</div>";
             
			
	}
     
        else {
            $sMessages = 'DB error, create SQL table before';
        }

        mysqli_close($vLink);
		
        ob_start();
        require_once('chat_begin.html');
		//echo $sdisplay;
        echo $sMessages;
        require_once('chat_end.html');
        return ob_get_clean();
    }
	
function getMessages1($Email,$dmail,$pag) // For Direct Messaging.
	{
		$email=$Email;
		$dmail=$dmail;

$vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass);
mysqli_select_db($vLink,$this->sDbName);
		
		
	$page=$pag;
    
	if($page=="" || $page=="1")
		{
			$page1=0;
		}
    else
		{
			$page1=($page*10)-10;
		}
		
$vRes = mysqli_query($vLink,"SELECT du.username as dusername,m.TimeStamp,u.image,u.username,m.messageformat,m.lcount,m.dcount,m.MId,m.Destination,m.Source,m.Message,m.UserId FROM `message` m, `userinfo` u,`userinfo` du where  (m.Source='{$email}' AND m.Destination='{$dmail}') and m.Source=u.email and du.email='{$dmail}'

UNION

SELECT du.username as dusername,m.TimeStamp,u.image,u.username,m.messageformat,m.lcount,m.dcount,m.MId,m.Destination,m.Source,m.Message,m.UserId FROM `message` m, `userinfo` u,`userinfo` du where (m.Source='{$dmail}' AND m.Destination='{$email}') and m.Source=u.email and du.email='{$dmail}'

ORDER BY TimeStamp DESC limit $page1,10");
$sMessages = '';
		
$dRes = mysqli_query($vLink,"SELECT DISTINCT DATE_FORMAT(TimeStamp, '%W %M %D %Y') as TimeStamp FROM `message`");
$count= mysqli_num_rows($dRes);
		
if($dRes){
	while($adisplay = mysqli_fetch_array($dRes))
	{			
$storedate=	$adisplay['TimeStamp'];
$sdisplay='<div> <hr style="width:40%;float:left"><span style="margin-left:1%;margin-right:1">'.$adisplay['TimeStamp']. ' </span><hr style="width:40%;float:right;"> </div>';
	}
}
		
if ($vRes) {
while($aMessages = mysqli_fetch_array($vRes)) {
	$Des = $aMessages['dusername'];
	$replycount = mysqli_query($vLink,"SELECT count(s.subid) as cont from `submessage` s INNER JOIN `message` m ON m.MId=s.mid where m.MId = '{$aMessages['MId']}'");
				$rcount= mysqli_num_rows($replycount);
				while($rcnt=mysqli_fetch_array($replycount)){
				if($rcnt['cont']>0){
					if($rcnt['cont']==1){
					$cnt=$rcnt['cont'].' reply';
					}
					else{
					$cnt=$rcnt['cont'].' replies';	
					}
				}else{
					$cnt="";
				}
				}
				
				
               if($aMessages['messageformat']=='image'){
					$mtype='<a target="_blank" href="Images/'.$aMessages['Message'].'">
					<img class="user_profile" src="Images/'.$aMessages['Message'].'" style=width:10%; height:10%;></img>
					</a>';
                    
                }
				else{
				$mtype="";   
                }
				
				 if($aMessages['messageformat']=='file'){
					$ftype='<a href="files/'.$aMessages['Message'].'" target="_blank" download>Download file</a>';
                    
                }
				else{
				$ftype="";   
                }
				
				
				if (strpos($aMessages['Message'], '@b') !== false && strpos($aMessages['Message'], 'b@') !== false) {
    			
					
				$key1='@b';
				$key2='b@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<b>".$parsed."</b>"; 


				$trimmed = str_replace('@b'.$parsed.'b@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}



				if (strpos($aMessages['Message'], '@i') !== false && strpos($aMessages['Message'], 'i@') !== false) {
					echo 'true';

				$key1='@i';
				$key2='i@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<i>".$parsed."</i>"; 


				$trimmed = str_replace('@i'.$parsed.'i@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}

				if (strpos($aMessages['Message'], '@code') !== false && strpos($aMessages['Message'], 'code@') !== false) {
					echo 'true';

				$key1='@code';
				$key2='code@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<pre><code>".$parsed."</code><pre>"; 


				$trimmed = str_replace('@code'.$parsed.'code@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}
				
				if (strpos($aMessages['Message'], '@m') !== false && strpos($aMessages['Message'], 'm@') !== false) {
					echo 'true';

				$key1='@m';
				$key2='m@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<mark>".$parsed."</mark>"; 


				$trimmed = str_replace('@m'.$parsed.'m@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}
				
				if (strpos($aMessages['Message'], '@d') !== false && strpos($aMessages['Message'], 'd@') !== false) {
					echo 'true';

				$key1='@d';
				$key2='d@';


				$parsed = $this->get_message_between($aMessages['Message'], $key1, $key2);

				$formatted_msg = "<del>".$parsed."</del>"; 


				$trimmed = str_replace('@d'.$parsed.'d@', $formatted_msg,$aMessages['Message']) ;
				$final= $trimmed ;
				$aMessages['Message']=$final;
				}
				
	
$sMessages .= '<div id="wholemessage"> <table><tr><td>

<img class="user_profile" src="'.$aMessages['image'].'" style=width:50px;border-radius:30%></img>

</td><td><h4>'.$aMessages['username'].' </h4></td><td><h6>'.$aMessages['TimeStamp'].'</h6></td>
				 
<span id=reaction_buttons style=float:right;width:10%;display:inline;> 
				 
<div id=all_btn>
<div style="float:right;">
			 
<button title="Click to reply" id="'.$aMessages['MId'].'" name="'.$aMessages['Message'].'" value="'.$aMessages['Destination'].'" onclick="getreply(this.id,this.name,'.$_SESSION['usid'].',this.value)"><img src="Images/reply.png" width=15px height=15px;/></button>

<button title="Delete Message" id="'.$aMessages['MId'].'" name="'.$aMessages['dusername'].'" onclick="delete_msg(this.id,this.name)"><img src="Images/delete.png" width=15px height=15px;/></button>

</div>
				 
</div>
</span></tr></table>
<div><div id="Message" style="margin-left:5%; font-family:Arial;">'.$aMessages['Message'].'</div>

'.$mtype.'
'.$ftype.'
</div><br>
				 
</div><div id="showreac"> <button title="like" id="'.$aMessages['TimeStamp'].'" name="like" value="'.$aMessages['dusername'].'" 

onclick="getreaction(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['MId'].')">

<img src="Images/like.png" width=15px height=15px;/>' .$aMessages['lcount'].'</button><button title="dislike" id="'.$aMessages['TimeStamp'].'" name="dislike" value="'.$aMessages['dusername'].'" 
onclick="getreaction(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['MId'].')">

<img src="Images/dislike.png" width=15px height=15px;/>' .$aMessages['dcount'].'</button> </div><br>
<div><button style="background:white; border:none; color: blue;" id="'.$aMessages['MId'].'" name="'.$aMessages['Message'].'" value="'.$aMessages['Destination'].'" onclick="getreply(this.id,this.name,'.$_SESSION['usid'].',this.value)">'.$cnt.'</button></div><hr>';
$cnt="";
}

$vRes1 = mysqli_query($vLink,"SELECT du.username as dusername,m.TimeStamp,u.image,u.username,m.messageformat,m.lcount,m.dcount,m.MId,m.Destination,m.Source,m.Message,m.UserId FROM `message` m, `userinfo` u,`userinfo` du where  (m.Source='{$email}' AND m.Destination='{$dmail}') and m.Source=u.email and du.email='{$dmail}'

UNION

SELECT du.username as dusername,m.TimeStamp,u.image,u.username,m.messageformat,m.lcount,m.dcount,m.MId,m.Destination,m.Source,m.Message,m.UserId FROM `message` m, `userinfo` u,`userinfo` du where (m.Source='{$dmail}' AND m.Destination='{$email}') and m.Source=u.email and du.email='{$dmail}'

ORDER BY TimeStamp DESC"); 
			$count1= mysqli_num_rows($vRes1);
             
            $a=$count1/10;
             $a=ceil($a);
            
             
             echo "<div id=\"pagination_tab\" align='center'>";
             for($b=1;$b<=$a;$b++)
             {
                 
    ?>
		<font size="4">
            
            <button onClick="check('<?php echo $Des; ?>',<?php echo $b; ?>)"><?php echo $b." "; ?></button>
            
			
		</font>
		<?php
                 
             }
             echo"</div>";
}
     
else {
$sMessages = 'DB error, create SQL table before';
      }

        mysqli_close($vLink);

        ob_start();
        require_once('chat_begin.html');
        //echo $sdisplay;
		echo $sMessages;
		
        require_once('chat_end.html');
        return ob_get_clean();
    }
}
?>

</body>

</html>
