<?php
define("HOST", "localhost");
define("DBUSER", "admin");
define("PASS", "M0n@rch$");
define("DB", "cryptocurrency");
 
$conn = mysqli_connect(HOST, DBUSER, PASS);
if (!$conn)
{
	die('Could not connect !<br />Please contact the site\'s administrator.');
}
$db = mysqli_select_db($conn,DB);
if (!$db)
{
	die('Could not connect to database !<br />Please contact the site\'s administrator.');
}
?>
