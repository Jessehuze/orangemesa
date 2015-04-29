<?php
  require("/var/www/config.php");
  session_start();
  if ($_POST["usr_pass"] == $_POST["usr_pass_check"]) //Passwords match
  {
    $result = mysqli_query($con, "SELECT username FROM PEOPLE WHERE username = '" .$_POST["username"]. "'");
    if (mysqli_num_rows($result) == 0)
    {
      $date = DateTime::createFromFormat('m-d-Y', $_POST["dob"]);
      $date = $date->format('Y-m-d');
      if ($_POST["minit"] == "") { //NO MIDDLE NAME GIVEN
      
        $insert = mysqli_query($con, "INSERT INTO PEOPLE (username, usr_pass, fname, lname, dob)
                                      VALUES ('".$_POST["username"]."', '".$_POST["usr_pass"]."', 
                                              '".$_POST["fname"]."', '".$_POST["lname"]."', '".$date."')");
      } else { //MIDDLE NAME GIVEN
        $insert = mysqli_query($con, "INSERT INTO PEOPLE (username, usr_pass, fname, minit, lname, dob)
                        VALUES ('".$_POST["username"]."', '".$_POST["usr_pass"]."', '".$_POST["fname"]."',
                                            '".$_POST["minit"]."', '".$_POST["lname"]."' , '".$date."')");

      }
    }
    else //Redirect otherwise
    {
      header("Location: http://inceptisol.us.to:6670/login/login.php?error=Username Taken.&signin=true");
      exit();
    }
    if ($insert)
    {
      $_SESSION["User"] = $_POST["username"];
      header("Location: http://inceptisol.us.to:6670/profile/profile.php");
      exit();
    }
  }
  else //Passwords don't match
  {
    header("Location: http://inceptisol.us.to:6670/login/login.php?error=Passwords Don't Match.&signin=true");
    exit();
  }
?>