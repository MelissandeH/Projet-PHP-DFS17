<?php

include "bdd-connexion.php";

//SUPPRIMER DES CARTES//

if (isset($_POST['id'])) {
    var_dump($_POST)['id'];
    $sql = "DELETE FROM cards WHERE id='" . mysqli_escape_string($bdd, $_POST['id']) . "'";
    if (mysqli_query($bdd, $sql)) {
        echo "<h2 style=\"color:green;\">New record created successfully</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
    }
}

header('Location:index.php');

mysqli_close($bdd);
