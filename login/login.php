<!DOCTYPE html>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="login.js"></script>
  <script type="text/javascript"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="icon" href="../images/logo.png">
  <title>OrangeMesa</title>
</head>

<?php
  session_start();
  if (isset($_SESSION["User"])) 
  {
    header("Location: http://inceptisol.us.to:6670/profile/profile.php");
    exit();
  }
?>

<body>
<div class="cont">
  <div class="demo">
    <div class="login">
      <object type="image/svg+xml" data="../images/logo.svg" width="300" height="300"></object>
      <div class="login__form">
       <form action="processlogin.php" method="POST">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input name="username" type="text" class="login__input name" placeholder="Username" required/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input name="pass" type="password" class="login__input pass" placeholder="Password" required/>
        </div>
        <p class="loginerror">
          <?php
            if (isset($_GET["error"]) && !isset($_GET["signin"])) {
              echo $_GET["error"];
            }
          ?>
        </p>
        <button name="login" type="submit" class="login__submit">Sign in</button>
        </form>
        <p class="login__signup">Don't have an account? &nbsp;<a id="signup">Sign up</a></p>
      </div>
    </div>
    
    <div class="signup">
      <div class="signup__form">
        <form action="processsignup.php" method="POST">
        <div class="signup__row">
          <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input name="username" type="text" class="signup__input username" placeholder="Username" required/>
        </div>
        <div class="signup__row">
          <svg class="signup__icon fname svg-icon" viewBox="0 0 20 20">
            <path d="M5,20 L5,0 L15,0 M5,9 L13,9" />
          </svg>
          <input name="fname" type="text" class="signup__input fname" placeholder="First Name" required/>
        </div>
        <div class="signup__row">
          <svg class="signup__icon mname svg-icon" viewBox="0 0 20 20">
            <path d="M3,20 L3,0 L10,18 L17,0 L17,20" />
          </svg>
          <input name="minit" type="text" class="signup__input minit" placeholder="Middle Name (Optional)"/>
        </div>
        <div class="signup__row">
          <svg class="signup__icon lname svg-icon" viewBox="0 0 20 20">
            <path d="M5,0 L5,20 L15,20" />
          </svg>
          <input name="lname" type="text" class="signup__input lname" placeholder="Last Name" required/>
        </div>
        <div class="signup__row">
          <svg class="signup__icon dob svg-icon" viewBox="0 0 20 20">
            <path d="M3,20 L 17,20 M10,20 L10,0 M7,13 L13,13 M6,6 L14,6 M3,11 L6,6 L7,3" />
          </svg>
          <input name="dob" type="text" class="signup__input dob" name="dob" placeholder="mm-dd-yyyy" required pattern="((((0[13578]|1[02])(\/|-|.)(0[1-9]|1[0-9]|2[0-9]|3[01]))|((0[469]|11)(\/|-|.)(0[1-9]|1[0-9]|2[0-9]|3[0]))|((02)((\/|-|.)(0[1-9]|1[0-9]|2[0-8]))))(\/|-|.)(19([6-9][0-9])|20(0[0-9]|1[0-4])))|((02)(\/|-|.)(29)(\/|-|.)(19(6[048]|7[26]|8[048]|9[26])|20(0[048]|1[26])))"/>
        </div>
        <div class="signup__row">
          <svg class="signup__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M12,8 a6,8 0 0,1 12,0" />
          </svg>
          <input name="usr_pass" type="password" class="signup__input usr_pass" placeholder="Password" required/>
        </div>
        <div class="signup__row">
          <svg class="signup__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input name="usr_pass_check" type="password" class="signup__input usr_pass_check" placeholder="Re-Enter Password" required/>
        </div>
        <p class="loginerror">
          <?php
            if (isset($_GET["error"])) {
              echo $_GET["error"];
            }
          ?>
        </p>
        <button name="signup" type="submit" class="signup__submit">Sign up</button>
        <a id="back2login" style="cursor: pointer;"><i style="font-size: 6em;" class="fa fa-angle-double-left fa-5x"></i></a>
      </form>
    </div>
  </div>
</div>
</div>

<script>
jQuery('input[name="dob"]').bind('keyup',function(e){

    var strokes = $(this).val().length;
    if (!((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) && e.keyCode != 8 && e.keyCode != 37 && e.keyCode != 39)
    {
      var thisVal = $(this).val();
      thisVal = thisVal.substr(0, strokes - 1);
      $(this).val(thisVal);
    } else if(strokes === 2 || strokes === 5) {
      if (e.keyCode != 8) {
        var thisVal = $(this).val();
        thisVal += '-';
        $(this).val(thisVal);
      }
    } else if(strokes >= 11) {
       var thisVal = $(this).val();
       thisVal = thisVal.substr(0,10);
       $(this).val(thisVal);
    }
});

<?php
  if (isset($_GET["signin"]))
    echo 'setTimeout(function() {$("#signup").click();}, 50);';
?>
</script>

</body>
<html>