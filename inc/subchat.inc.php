

<?php

session_start();
require_once ("db_connect.inc.php");

class SubChat {
    var $sDbName;
    var $sDbUser;
    var $sDbPass;
    
function SubChat() {
        $this->sDbName = 'cryptocurrency';
        $this->sDbUser = 'admin';
        $this->sDbPass = 'M0n@rch$';
    }    


function acceptSMessages($sMessage,$mid,$uid,$destination){
	$sMessages=$sMessage;
	echo $sMessages;

$conn = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass, $this->sDbName);
$submsg = htmlspecialchars(mysqli_real_escape_string($conn,$sMessages));
if ($submsg != '') {
mysqli_query($conn,"INSERT INTO `submessage` SET `s_message`='{$sMessage}', `mid`='{$mid}', `userid`='{$uid}', `destination`='{$destination}', `lcount`=0, `dcount`=0, `TimeStamp`=CURRENT_TIMESTAMP()");
                }
mysqli_close($conn);

   ob_start();
	 //require_once('second_page.php');
        $sShoutboxForm = ob_get_clean();

        return $sShoutboxForm;
}


    function getSubMessages($mid,$uid,$destination) {
		$vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass);
mysqli_select_db($vLink,$this->sDbName);

$vRes = mysqli_query($vLink,"SELECT m.message,u.image,u.username,s.lcount,s.dcount,s.mid,s.subid,s.destination,s.s_message, DATE_FORMAT(s.timestamp, '%H:%i') as timestamp 
FROM `submessage` s, `userinfo` u,`message` m where u.userid=s.userid and m.mid='{$mid}' and (s.mid='{$mid}' AND s.destination='{$destination}') OR (s.destination='{$mid}' AND 
s.mid='{$destination}') ORDER BY `timestamp` ASC, subid ASC ");
		
	
$sMessages = '';
if ($vRes) {
            while($aMessages = mysqli_fetch_array($vRes)) {

$sMessages .= '<div id="rmessage"> <table><tr><td>

<img class="user_profile" src="'.$aMessages['image'].'" style=width:40px;border-radius:30%;></img>

</td><td><h4 style="font-family:Arial;">'.$aMessages['username'].'</h4></td><td></td><td><span"><h6 style="font-family:Arial;">'.$aMessages['timestamp'].'</h6></span></td>
				 
<span id=reaction_buttons style=float:right;display:inline;> 
				 
<div>
<button title="delete" id="'.$aMessages['message'].'" value="'.$destination.'" name="like" sid="'.$aMessages['subid'].'" sname="'.$aMessages['message'].'"  onclick="delete_submsg(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['subid'].','.$aMessages['mid'].')"><img src="Images/delete.png" width=15px height=15px;/></button> 				 
</div>
</span></tr></table>
<div><div id="Message" style="margin-left:5%; font-family:Arial;" onclick="mthread()">'.$aMessages['s_message'].'</div></div><br>
				 
</div><div id="showreac"> 
<button title="like" id="'.$aMessages['message'].'" value="'.$_SESSION["channelname"].'" name="like" sid="'.$aMessages['subid'].'" sname="'.$aMessages['message'].'"  onclick="getsubreaction(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['subid'].','.$aMessages['mid'].')"><img src="Images/like.png" width=15px height=15px;/>' .$aMessages['lcount'].'</button>

<button title="dislike" id="'.$aMessages['message'].'" value="'.$_SESSION["channelname"].'" name="dislike" sid="'.$aMessages['subid'].'" sname="'.$aMessages['message'].'"  onclick="getsubreaction(this.id,this.name,'.$_SESSION['usid'].',this.value,'.$aMessages['subid'].','.$aMessages['mid'].')"><img src="Images/dislike.png" width=15px height=15px;/>' .$aMessages['dcount'].'</button> </div> <hr>';
            }
        } else {
            $sMessages = 'DB error, create SQL table before';
        }

        mysqli_close($vLink);

        ob_start();
        //require_once('chat_begin.html');
        echo $sMessages;
        //require_once('chat_end.html');
        return ob_get_clean();
    }
		
}
?>
