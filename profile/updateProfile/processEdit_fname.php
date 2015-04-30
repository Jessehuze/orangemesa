<?php
  require("/var/www/config.php");
  session_start();
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET fname = '".$_POST["fname"]."' 
                                WHERE username = '".$_SESSION["username"]."'"); 
  header("\"".$_POST["refer"]."\"");
  exit();
  
?>