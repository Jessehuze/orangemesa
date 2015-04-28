<?php
  require("/var/www/config.php");
  if($_POST["username"] != "" && $_POST["pass"] != "" && isset($_POST["login"])) {
    $result = mysqli_query($con, "SELECT username, usr_pass FROM PEOPLE WHERE username = '" .$_POST["username"]. "'");
    if (!$result) {
      $_SESSION["loginerror"] = 1;
      header("Location: http://inceptisol.us.to:6670/login/login.php");
      exit;
    }
    $row = mysqli_fetch_array($result) {
    echo $row["Name"]; 
    $_SESSION["User"] = $row["username"];
  }
?>