<?php
  require("/var/www/config.php");
  if($_POST["username"] != "" && $_POST["pass"] != "" && isset($_POST["login"])) {
    $result = mysqli_query($con, "SELECT username, usr_pass FROM PEOPLE WHERE username = '" .$_POST["username"]. "'");
    if (!$result) 
    $row = mysqli_fetch_array($result) ) {
    echo $row["Name"];    
    session_start();
    $_SESSION["User"] = $row["username"];
  }
?>