<?php session_start(); ?>
<?php include "header.php" ?>
<script src="tabledit/jquery.tabledit.js"></script>
<main role="main">

  <section class="jumbotron text-center" id="witcher3-bg">
    <div class="container">
      <h1 class="jumbotron-heading">My Account</h1>
      <p class="lead py-2">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="index.php" class="btn btn-primary m-2">Back to my collection</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == '2') {
        echo "" ?>
        <div class="row mt-2">
          <div class="col-md-5 mx-auto">

            <h1 class="text-center mb-5">My Informations</h1>
            <h2>Pseudo :</h2>
            <p><?php echo $_SESSION['pseudo'] ?></p>
            <h2>Id :</h2>
            <p><?php echo $_SESSION['id'] ?></p>
            <h2>Password :</h2>
            <p><?php echo $_SESSION['password'] ?></p>
          </div>

          <div class="col-md-5 mx-auto">
            <h1 class="text-center mb-5">My settings</h1>

            <h2>Role :</h2>
            <p><?php echo $_SESSION['role'] ?></p>
          </div>
        </div>


        <h1 class="text-center mb-5">Users</h1>

        <div class="row">
          <div class="col-md-10 mx-auto">

            <?php
              //CONNEXION BDD//
              $con = mysqli_connect('localhost', 'root', '1234');
              mysqli_select_db($con, 'web_app_mh');
              // Check connection
              if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }

              $result = mysqli_query($con, "SELECT * FROM users");

              echo "<form action=\"account.php\" method=\"post\">
          <table id=\"editable_table\" class=\"table table-hover\" border='1' style=\"width:100%;\">
          <thead class=\"thead-dark\">
          <tr>
            <th>id</th>
            <th>Pseudo</th>
            <th>Role</th>
          </tr>
          </thead>";

              // AFFICHAGE DONNEES BDD DANS UN TABLEAU//
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['pseudo'] . "</td>";
                echo "<td><input type=\"text\" name=\"role-" . $row['id'] . "\" value=\"" . $row['role'] . "\"/></td>
              <input type=\"hidden\" name=\"user_id[]\" value=\"" . $row['id'] . "\">";
                echo "</tr>";
              }
              echo "</table>";
              echo "<input type=\"submit\" name=\"update\" value=\"UPDATE\"></input>
          </form>"

              ?>

            <?php

              if (isset($_POST['update'])) {
                $content = $_POST['role-' . $row['id']];
                $total = count($_POST); // on compte le nombre de lignes//
                $user_id_arr = $_POST['user_id']; // on identifie l'id de chaque ligne
                $role_arr = $_POST['role-']; // id de chaque ligne
                var_dump($_POST['role-' . $row['id']]);
                var_dump($_POST['role-8']);
                // var_dump($user_id_arr); // id
                for ($i = 0; $i < $total; $i++) {
                  $user_id = $user_id_arr[$i]; //id du contenu
                  $role = $role_arr[$i];
                  $query = "UPDATE users SET users.role=" . $role . " WHERE users.id= " . $user_id . " ";
                  $con->query($query);
                }
              }

              //SAVE CHANGES INTO BDD//
              // if (isset($_POST['valider'])) {
              //   $role = $_POST['role'];
              //   $row = mysqli_fetch_row($row);
              //   $bdd->exec("INSERT INTO users(role) VALUES('$role')");
              //   echo "Changes has been applied to BDD";
              // } else {
              //   echo "Couldn't save changes";
              // }

              mysqli_close($con);


              ?>
          </div>
        </div>
      <?php } else {
        echo "<h1 class=\"text-center\">Vous n'êtes pas autorisé à consulter cette page</h1>";
        echo "<a href=\"log.php\"> <h4 class=\"text-mute text-center\" >Veuillez vous connecter à ce lien</h4></a>";
      } ?>

    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
  </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vendor/holder.min.js"></script>
</body>

</html>