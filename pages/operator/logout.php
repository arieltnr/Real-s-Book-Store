<?php
session_start();
//if(isset($_SESSION['user'])){ 
  // session_unset();
   //session_destroy();   
//}
unset($_SESSION['operator']);
header("location: ../login.php");
?>