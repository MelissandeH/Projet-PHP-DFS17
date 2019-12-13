<?php
//CONNEXION BDD//
try {
    // On se connecte à MySQL
    $bdd = mysqli_connect('localhost', 'root', '1234');
    mysqli_select_db($bdd, 'web_app_mh');
    //echo '<h2 class="mt-4">Vous êtes bien connecté à votre BDD</h2>';
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
    echo '<h1>Erreur connexion BDD</h1>';
}

?>