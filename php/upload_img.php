<?php
require_once ("db_connect.inc.php");
$email=$_POST['email'];
$default = "https://www.gravatar.com/avatar/00000000000000000000000000000000";
       $size = 40;
       $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
$sql = mysqli_query($conn,"update `userinfo` set `image` = '{$grav_url}' where `email` = '{$email}'");
mysqli_query($conn,$sql);
echo "success";
       


if(isset($_POST['post_image']))
{
 $image_url=$_POST['image_path'];
 $data = file_get_contents($image_url);
 $new =  'Images/'.substr($image_url, strrpos($image_url, '/') + 1);
 $upload =file_put_contents($new, $data);
 if($upload) {
     echo $new;
 }else{
    echo "Please upload only image files";
 } 
}
?>

