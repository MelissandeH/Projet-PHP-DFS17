<?php session_start(); ?>

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
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '2') { ?>
        <form class="form-signin " method="post" action="inscription.php">
          <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
          <fieldset>
            <legend>Identifiants</legend>
            <label for="pseudo"></label>
            <input name="pseudo" type="text" id="pseudo" class="form-control" placeholder="Votre Pseudo" required required autofocus>
            <label for="password"></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe">
            <label for="confirm"></label>
            <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirmation du mot de passe" />
          </fieldset>
          <p><input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="S'inscrire"></p>
        </form>
        <a href="index.php">Home</a>
        <?php include "inscriptionConfirmation.php"; ?>

      <?php } else { ?>
        <h1 class="text-center">Vous n'êtes pas autorisé à consulter cette page</h1>
        <a href="log.php">
          <h4 class="text-mute text-center">Veuillez vous connecter à ce lien</h4>
        </a>
      <?php }?>
      
    </div>
  </div>
  </div>
</body>

</html>