<?php
  require("/var/www/config.php");
  session_start();
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET lname = '".$_POST["lname"]."' 
                                WHERE username = '".$_SESSION["username"]."'"); 
  header("Location: ".$_POST["refer"]);
  exit();
  
?>