<?php
  require("/var/config.php");
  session_start();
  $username = mysqli_real_escape_string($con, $_SESSION["username"]);
  $description = mysqli_real_escape_string($con, $_POST["description"]);
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET description = '".$description."' 
                                WHERE username = '".$username."'"); 
  header("Location: ".$_POST["refer"]);
  exit();
  
?>