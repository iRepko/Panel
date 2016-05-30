<!DOCTYPE html>
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

      <form class="form-signin" method="POST" action="sql/check/login.php">
        <h2 class="form-signin-heading">Panel™</h2>
        <?php 
            if (empty($_GET['error'])) {
            } elseif($_GET['error'] == 1){
            echo "<p style=\"color:red\";\"\">Username or Password Incorrect!</p>";
            } elseif($_GET['error'] == 2){
            echo "<p style=\"color:red\";\"\">Database Error!</p>";
            } elseif($_GET['error'] == 3){
            echo "<p style=\"color:red\";\"\">Must Fill in Both Username And Password!</p>";
            } elseif($_GET['error'] == 4){
            echo "<p style=\"color:red\";\"\">Authentication Code Incorrect!</p>";
            }
          ?>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="username" id="username" class="form-control" name="username" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>