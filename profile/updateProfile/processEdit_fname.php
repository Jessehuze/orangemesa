<?php
  require("/var/config.php");
  session_start();
  $username = mysqli_real_escape_string($con, $_SESSION["username"]);
  $fname = mysqli_real_escape_string($con, $_POST["fname"]);
  $update = mysqli_query($con, "UPDATE PEOPLE 
                                SET fname = '".$fname."' 
                                WHERE username = '".$username ."'"); 
  echo $_POST["refer"];
  header("Location: ".$_POST["refer"]);
  exit();
  
?>