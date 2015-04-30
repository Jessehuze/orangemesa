<?php
  require("/var/www/config.php");
  session_start();
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET fname = '".$_POST["fname"]."' 
                                WHERE username = '".$_SESSION["username"]."'"); 
  echo $_POST["refer"];
  header("Location: \"".$_POST["refer"]."\"");
  exit();
  
?>