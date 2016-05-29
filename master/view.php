<!DOCTYPE html>
<?php require('sql/global/header.php'); ?>
<?php $VID = $_GET['ID']; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php echo $config['system']['site_name']; ?>- Panel™</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="dist/dashboard.css" rel="stylesheet">
    <script src="dist/js/ie-emulation-modes-warning.js"></script>
  </head>

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
          <a class="navbar-brand" href="#">Panel™</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/home.php">Home</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Server Status</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Reinstall</a></li>
            <li><a href="#">SnapShots</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">(Hostname)</h1>

          <div class="row placeholders">
          <h2 class="sub-header">Disk Space</h2>
            <div class="progress">
              <div class="progress-bar progress-bar-success" style="width: 70%">
                <span>Free ?GB</span>
              </div>
              <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
                <span>Used ?GB</span>
              </div>
              <div class="progress-bar progress-bar-danger" style="width: 10%">
                <span>System ?GB</span>
              </div>
            </div>
          <h2 class="sub-header">Memory</h2>
            <div class="progress">
              <div class="progress-bar progress-bar-success" style="width: 90%">
                <span>Free ?MB</span>
              </div>
              <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 10%">
                <span>Used ?MB</span>
              </div>
            </div>
          </div>
          <?php
              $query = mysqli_query($sql, "SELECT * FROM `virtuals` WHERE `OwnerID` = '".$user['ID']."'");
          ?>
          <h2 class="sub-header">Control</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
              <?php while($row = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $row['Hostname']; ?></td>
                  <td><?php echo $row['IP']; ?></td>
                  <td><?php echo $row['OS']; ?></td>
                  <td><?php echo $row['Status']; ?></td>
                  <td><a href="start.php?ID=<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a> <a href="stop.php?ID=<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a> <a href="restart.php?vID=<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a><a href="edit.php?ID=<?php echo $row['ID']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="dist/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="dist/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>