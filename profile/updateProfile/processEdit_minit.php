<?php
  require("/var/www/config.php");
  session_start();
  $username = mysqli_real_escape_string($con, $_POST["username"]);
  $minit = mysqli_real_escape_string($con, $_POST["minit"]);
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET minit = '".$minit."' 
                                WHERE username = '".$username."'"); 
  header("Location: ".$_POST["refer"]);
  exit();
  
?>