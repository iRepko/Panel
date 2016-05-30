<!DOCTYPE html>
<?php 
  session_start();
  if(!isset($_SESSION['user_id'])){ 
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
    <title>Panel™</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="dist/signin.css" rel="stylesheet">
    <script src="dist/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="sql/check/auth.php">
        <h2 class="form-signin-heading">Authentication</h2>
        <p>You've been emailed your authorization code.</p>
        <label for="authcode" clas
        s="sr-only">Auth Code</label>
        <input type="password" id="authcode" class="form-control" name="authcode" placeholder="Authentication Code" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>