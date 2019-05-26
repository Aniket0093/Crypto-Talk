<?php
require_once ("db_connect.inc.php");
$chname = $_GET['chname'];
$user = $_GET['user'];

	$result = mysqli_query($conn, "SELECT usertype from `userinfo` where email = '{$user}'");
	while($res=mysqli_fetch_assoc($result))
	{
		$type=$res['usertype'];
	}
	
	if($type=='superuser'){
		$chstat = mysqli_query($conn, "SELECT status from `channel` where CName = '{$chname}'");
						while($chstatus=mysqli_fetch_assoc($chstat))
						{
							$stat=$chstatus['status'];
						}
						
							if($stat=='archived'){
								$unarc="unarchived";
								mysqli_query($conn, "UPDATE `channel` SET `status` = '{$unarc}' where `CName` = '{$chname}'");
								echo "<script>var r = confirm('Channel unarchived');
													if (r == true) {
													location.href = 'login.php?value=".$chname."';
													}else{
														location.href = 'login.php?value=".$chname."';
													}
													</script>";
							}else if($stat=='unarchived'){
								$arc="archived";
								mysqli_query($conn, "UPDATE `channel` SET `status` = '{$arc}' where `CName` = '{$chname}'");
								echo "<script>var r = confirm('Channel archived');
													if (r == true) {
														location.href = 'login.php?value=".$chname."';
													}else{
														location.href = 'login.php?value=".$chname."';	
													}
													</script>";
							}
							
		
	}else{
		echo "<script>var r = confirm('You are not authorized to archive this channel.');
													if (r == true) {
														location.href = 'login.php?value=".$chname."';
													}else{
														location.href = 'login.php?value=".$chname."';
													}
													</script>";
	}


?>
