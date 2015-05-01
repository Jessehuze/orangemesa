<?php
  require("/var/www/config.php");
  session_start();
  $username = mysqli_real_escape_string($con, $_POST["username"]);
  $lname = mysqli_real_escape_string($con, $_POST["lname"]);
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET lname = '".$lname."' 
                                WHERE username = '".$username."'"); 
  header("Location: ".$_POST["refer"]);
  exit();
  
?>