<?php

  //INSCRIPTION//
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //CONNEXION BDD//
    try {
      // On se connecte à MySQL
      $bdd = mysqli_connect('localhost', 'root', '1234');
      mysqli_select_db($bdd, 'web_app_mh');
      echo '<h2 class="mt-4">Vous êtes bien connecté à votre BDD</h2>';
    } catch (Exception $e) {
      // En cas d'erreur, on affiche un message et on arrête tout
      die('Erreur : ' . $e->getMessage());
      echo '<h2 class="mt-4">Erreur connexion BDD</h2>';
    }

    $pseudo = $_POST['pseudo'];
    $pswd = $_POST['password'];
    $confirmpswd = $_POST['confirm'];

    echo "<span>Ton pseudo : $pseudo</span>";
    echo "<span>Ton password : $pswd et ta confirmation $confirmpswd</span>";

    if ($pseudo && $pswd && $confirmpswd) {
      if (strlen($pswd) >= 6) {
        if ($pswd == $confirmpswd) {
          // On crypte le mot de passe
          $pswd = md5($pswd);
          $confirmpswd = md5($confirmpswd);

          $sql = "INSERT INTO users (pseudo, password, confirmpassword)
                VALUES ('$pseudo', '$pswd', '$confirmpswd')";

          if (mysqli_query($bdd, $sql)) {
            echo "<h2 style=\"color:green;\">New record created successfully</h2>";
            header("Location:index.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
          }

          mysqli_close($bdd);
        } else echo "<p style=\"color:red;\">Les mots de passe ne sont pas identiques</p>";
      } else echo "<p style=\"color:red;\">Le mot de passe est trop court !";
    } else echo "<p style=\"color:red;\">Veuillez saisir tous les champs !";
  }
