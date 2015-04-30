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
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/friends.php"/>
                <input name="fname" type="text" class="edit__input fname" placeholder="First Name" />
                <button name="update_fname" type="submit" class="edit__submit">Update First Name</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_minit.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/friends.php"/>
                <input name="minit" type="text" class="edit__input minit" placeholder="Middle Initial" />
                <button name="update_minit" type="submit" class="edit__submit">Update Middle Initial</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_lname.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/friends.php"/>
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
            <li class="active"><a href="profile.php"><i class="fa fa-user"></i>
            <?php
                require("/var/www/config.php");
                $result = mysqli_query($con, "SELECT fname FROM PEOPLE WHERE username = '" .$_SESSION["username"]. "'");
                $name = mysqli_fetch_array($result);
                echo $name["fname"];
            ?>
            </a></li>
            <li><a href="friends.php">Friends</a></li>
            <li><a href="events.php">Events</a></li>
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
      .userinfo{
        background-color:rgba(250,123,1,.80);
      }
      .usrimg{
        margin-left: 13%;
        width: 70%;
        border-radius: 512px;
        box-shadow: 0 0 10px rgba(0,0,0, .3)
      }
    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar userinfo">
          <div>
            <img class="usrimg" src="../images/user.png">
          </div>
          <hr>
          <h2>
            <?php
              require("/var/www/config.php");
              $result = mysqli_query($con, "SELECT fname, lname FROM PEOPLE WHERE username = '" .$_SESSION["username"]. "'");
              $name = mysqli_fetch_array($result);
              echo ($name["fname"]." ".$name["lname"]);
            ?>
          </h2>
          <h3>About</h3>
          <p>
            <?php
              require("/var/www/config.php");
              $result = mysqli_query($con, "SELECT description FROM PEOPLE WHERE username = '" .$_SESSION["username"]. "'");
              $desc = mysqli_fetch_array($result);
              echo $desc["description"];
            ?>
          </p>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class:"col-md-2">
          <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab">Friends</a></li>
              <li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Events</a></li>
              <li role="presentation"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">Groups</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="friends">...</div>
              <div role="tabpanel" class="tab-pane fade" id="events">...</div>
              <div role="tabpanel" class="tab-pane fade" id="groups">...</div>
            </div>

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
