<?php
  require("/var/www/config.php");
  session_start();
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET minit = '".$_POST["minit"]."' 
                                WHERE username = '".$_SESSION["username"]."'"); 
  header("Location: ".$_POST["refer"]);
  exit();
  
?>