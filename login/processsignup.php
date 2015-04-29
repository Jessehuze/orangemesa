<?php
  require("/var/www/config.php");
  $result = mysqli_query($con, "SELECT username FROM PEOPLE WHERE username = '" .$_POST["username"]. "'");
  if (!$result && $_POST["mname"] == "") { //NO MIDDLE NAME GIVEN
    $insert = mysqli_query($con, "INSERT INTO PEOPLE (username, usr_pass, fname, lname, dob)
    									VALUES ('".$_POST["username"]."', '".$_POST["usr_pass"]."', 
                                    			'".$_POST["fname"]."', '".$_POST["lname"]."', ".$_POST["dob"]."");
  }
  else if (!$result) { //MIDDLE NAME GIVEN
    $insert = mysqli_query($con, "INSERT INTO PEOPLE (username, usr_pass, fname, minit, lname, dob)
    									VALUES ('".$_POST["username"]."', '".$_POST["usr_pass"]."', '".$_POST["minit"]."',
                                    			'".$_POST["fname"]."', '".$_POST["lname"]."' , ".$_POST["dob"]."");
  }
  else
  {
    header("Location: http://inceptisol.us.to:6670/login/login.php");
    exit();
  }
  if ($insert)
  {
  	header("Location: http://inceptisol.us.to:6670/template/template.php");
    exit();
  }
?>