<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="settings.css">
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
  
  <?php
    require("../logincheck.php");
  ?>

  <style>
    .search{
      max-height: calc(100vh - 175px);
      overflow-y: scroll;
      overflow-x: hidden; 
      word-wrap: break-word;
      padding-right: 15px
    }
  </style>


  <body>

    <!-- Settings Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Settings</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_fname.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <input name="fname" type="text" class="edit__input fname" placeholder="First Name" />
                <button name="update_fname" type="submit" class="edit__submit">Update First Name</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_minit.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <input name="minit" type="text" class="edit__input minit" placeholder="Middle Initial" />
                <button name="update_minit" type="submit" class="edit__submit">Update Middle Initial</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_lname.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <input name="lname" type="text" class="edit__input lname" placeholder="Last Name" />
                <button name="update_lname" type="submit" class="edit__submit">Update Last Name</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_description.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <textarea name="description" class="edit__input description" placeholder="Description" rows="6"></textarea>
                <button name="update_description" type="submit" class="edit__submit">Update Description</button>
                </form>
               </div>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>


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
                require("/var/config.php");
                $username = mysqli_real_escape_string($con, $_SESSION["username"]);
                $result = mysqli_query($con, "SELECT fname FROM PEOPLE WHERE username = '" .$username. "'");
                $name = mysqli_fetch_array($result);
                echo $name["fname"];
            ?>
            </a></li>
            <li><a href="groups.php">Groups</a></li>
            <li><a data-toggle="modal" data-target="#myModal" href="#myModal">Settings</a></li>
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-left" action="search.php" method="GET">
            <div class="input-group">
              <input name="query" type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                 <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search" style="color:#FA7B01" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </nav>
    
    <style>
      .usrimg{
        margin-left: 13%;
        width: 70%;
        margin-top: 15%;
        border-radius: 512px;
        box-shadow: 0 0 10px rgba(0,0,0, .3)
      }
      a{
        color:#000;
        text-decoration:none;
      }
      .addbtn {
        margin:5% calc(50% - 27px);
      }
    </style>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <h1>People</h1>
          <hr>
          <div class="search">
          <?php
            $query = mysqli_real_escape_string($con, $_GET["query"]);
            $friends_result = mysqli_query($con, "SELECT username, fname, lname, description FROM PEOPLE WHERE fname LIKE '%".$query."%' OR lname LIKE '%".$query."%' AND username != ".$_SESSION["username"]." ORDER BY fname, lname"); 
            if ($friends_result)
            {
              while ($friend = mysqli_fetch_array($friends_result)) 
              {
                echo "<div class='row'>
                  <div class='col-xs-4'>
                    <a href='profile.php?user=" . $friend["username"] . "'>
                      <img class='usrimg' src='../images/user.png'/>
                     </a>
                    <form action='addFriend.php?user=" . $friend["username"] . "' method='POST'>
                      <button class='btn addbtn btn-default' type='submit'>Add</button>
                    </form>
                  </div>
                  <div class='col-xs-8'>
                    <a href='profile.php?user=" . $friend["username"] . "'>
                      <h3>" . $friend["fname"] . " "  . $friend["lname"] . " </h3>
                    </a>
                    <p>". $friend["description"] . "</p>
                  </div>
                </div>";
              }
            }
          ?> 
          </div>
        </div>
        <div class="col-md-4">
          <h1>Groups</h1>
          <hr>
          <div class="search">
          <?php
            $query = mysqli_real_escape_string($con, $_GET["query"]);
            $group_result = mysqli_query($con, "SELECT name, description FROM GROUPS WHERE name LIKE '%".$query."%' ORDER BY name"); 
            if ($group_result)
            {
              while ($group = mysqli_fetch_array($group_result)) 
              {
                echo "<div class=\"row\">
                  <div class=\"col-xs-4\">
                    <img class=\"usrimg\" src=\"../images/user.png\"/>
					<form action='joinGroup.php?group= '".$group["name"]."' method = 'GET'>
					  <button class=\"btn addbtn btn-default\" type='submit'>Join</button>
					</form>
				  </div>
                  <div class=\"col-xs-8\">
                    <h3>" . $group["name"] . " </h3>
                    <p>". $group["description"] . "</p>
                  </div>
                </div>";
              }
            }
          ?> 
          </div>
        </div>
        <div class="col-md-4">
          <h1>Events</h1>
          <hr>
          <div class="search">
          <?php
            $query = mysqli_real_escape_string($con, $_GET["query"]);
            $event_result = mysqli_query($con, "SELECT eventname, eventdate, description FROM GROUPS WHERE eventname LIKE '%".$query."%' ORDER BY eventname"); 
            if ($event_result)
            {
              while ($event = mysqli_fetch_array($event_result)) 
              {
                echo "<div class=\"row\">
                  <div class=\"col-xs-4\">
                    <img class=\"usrimg\" src=\"../images/user.png\"/>
                    <button class=\"btn addbtn btn-default\" type=\"button\">Going</button>
                  </div>
                  <div class=\"col-xs-8\">
                    <h3>" . $event["eventname"] . " " . $friend["eventdate"] . "</h3>
                    <p>". $event["description"] . "</p>
                  </div>
                </div>";
              }
            }
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