<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="stylesheet" type="text/css" href="groups.css">
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/logo.png">
	 
	<title>OrangeMesa</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>
 </html>
 
  <?php
    require("../logincheck.php");
  ?>
  
  <body>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img href="../images/logo.png"></img>
          <a class="navbar-brand" href="profile.php">
            <object id="logoO" type="image/svg+xml" data="../images/logo.svg" width="25" height="25"></object>
            <object id="logoW" type="image/svg+xml" data="../images/logow.svg" width="25" height="25" style="position: relative; left: -30.25px; opacity: 0;"></object>
            <span style="position: relative; top: -5.5px; left: -37.25px;">rangeMesa</span></a>
        </div>
         <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php"><i class="fa fa-user"></i>
            <?php
                require("/var/www/config.php");
                $result = mysqli_query($con, "SELECT fname FROM PEOPLE WHERE username = '" .$_SESSION["username"]. "'");
                $name = mysqli_fetch_array($result);
                echo $name["fname"];
            ?>
            </a></li>
            <li><a href="friends.php">Friends</a></li>
            <li><a href="events.php">Events</a></li>
            <li class="active"><a href="groups.php">Groups</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                 <button class="btn btn-default" type="button">
                  <span class="glyphicon glyphicon-search" style="color:#FA7B01" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </nav>
	
	<div class="cont">
   	<div class = "demo">
     <div class="createGroup">
      <div class="createGroup__form">
       <form action="createGroup.php" method="POST">
       <div class="createGroup__row">
        <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
        </svg>
        <input name="groupName" type="text" class="createGroup__input groupName" placeholder="Group Name" required/>
       </div>
	   <div class="createGroupDesc__row">
        <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
        </svg>
        <input name="groupDesc" type="text" class="createGroup__input groupDesc" placeholder="Description" required/>
       </div>
	   <button name="createGroup" type="submit" class="createGroup__submit">Create Group</button>
	  </form> 
      </div>
     </div>
	 
	 <div class="listGroups">
		Groups you belong to:
		<div class="listgroups2">
		<?php
			require("grouplist.php");
		?>
		</div>
	 </div>
    </div>
   </div>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
