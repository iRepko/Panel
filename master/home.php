<!DOCTYPE html>
<?php 
  require('sql/global/header.php'); 
  if(!isset($_SESSION['user'])) {
    header("Location: index.php");
  }
  if(!isset($_SESSION['authcode'])) { 
    header("Location: index.php");
  }
?>

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
          <h1 class="page-header"><?php echo $user['Username'];?>'s Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>
          <?php
              $query = mysqli_query($sql, "SELECT * FROM `virtuals` WHERE `OwnerID` = '".$user['ID']."'");
          ?>
          <h2 class="sub-header">Manage Servers</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Hostname</th>
                  <th>IP</th>
                  <th>Operating System</th>
                  <th>Status</th>
                  <th>Control</th>
                </tr>
              </thead>
              <tbody>
              <?php while($row = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo "<h3>".$row['Hostname']."</h3>"; ?></td>
                  <td><?php echo "<h3>".$row['IP']."</h3>"; ?></td>
                  <td><?php echo "<h3>".$row['OS']."</h3>"; ?></td>
                  <td>
                  <?php 
                    //if($row['Status'] = 'Online') {
                      //echo "<p style=\"color:green\";\"\"><h3>Online</h3></p>"; 
                    //} elseif($row['Status'] = 'Offline') {
                      //echo "<img src="""; 
                    //}

                  ?>
                  </td>
                  <td>
                  <!-- Start Button-->
                  <form id = "form" name = "form" action="sql/global/api.php?Command=start&ID=<?php echo $row['ID']; ?>" method = "POST">
                    <button class="glyphicon glyphicon-repeat" aria-hidden="true"></button>
                  </form>
                  <!-- Stop Button-->
                  <form id = "form" name = "form" action="sql/global/api.php?Command=stop&ID=<?php echo $row['ID']; ?>" method = "POST">
                    <button class="glyphicon glyphicon-off" aria-hidden="true"></button>
                  </form>
                  <!-- Restart Button-->
                  <form id = "form" name = "form" action="sql/global/api.php?Command=restart&ID=<?php echo $row['ID']; ?>" method = "POST">
                      <button type="image" class="glyphicon glyphicon-refresh" aria-hidden="true"></button>
                  </form>
                  <!-- Edit Button-->
                  <form id = "form" name = "form" action="view.php?ID=<?php echo $row['ID']; ?>" method = "POST">
                    <button class="glyphicon glyphicon-pencil" aria-hidden="true"></button>
                  <form id = "form" name = "form" action="sql/global/api.php" method = "POST">
                  </td>
                </tr>
              <?php }?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Using Javascript to post page without leaving it-->
    <script type="text/javascript">
    var frm = $('#form');
    frm.submit(function (ev) {
        $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
            alert('ok');
        }
    });

    ev.preventDefault();
});
</script>
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