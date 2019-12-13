<?php

include "bdd-connexion.php";

//UPDATE DES CARTES//
var_dump($_POST['id']);
if (isset($_POST['id'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    var_dump($_POST)['id'];
    var_dump($_POST)['title'];
    var_dump($_POST)['description'];

    $sql = "UPDATE cards SET id='" . mysqli_escape_string($bdd, $_POST['id']) . "' WHERE
    title = 'test1' AND
    description = 'test2' ";

    if (mysqli_query($bdd, $sql)) {
        echo "<h2 style=\"color:green;\">New record created successfully</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
    }
}

mysqli_close($bdd);
