<?php
  require("/var/www/config.php");
  session_start();
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET description = '".$_POST["description"]."' 
                                WHERE username = '".$_SESSION["username"]."'"); 
  header("Location: http://inceptisol.us.to:6670/profile/settings.php");
  exit();
  
?>