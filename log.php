<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div class="row">
      <div class="col-lg-12">
   
    <form class="form-signin" action="log.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="pseudo" class="sr-only">Pseudo</label>
      <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

    <?php include "logConfirmation.php" ?>
      <a href="inscription.php">Inscription</a>
      <a href="index.php">Home</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </div>
    </div>
  </body>
</html>
