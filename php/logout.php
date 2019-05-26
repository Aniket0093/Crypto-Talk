<?php
session_start();
if (isset($_SESSION['userid']) == false && isset($_SESSION['email']) == false){
   header('Location: index.php');
   session_destroy();
} else {
   unset($_SESSION['userid']);
   unset($_SESSION['email']);
   session_destroy();
   header('Location: index.php');
}
?>
