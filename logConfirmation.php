<?php

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['password'] = $_POST['password'];
    echo "<b>Votre pseudo est </b>: " . $_SESSION['pseudo'] . "\r\n";
    echo "<b>Votre mot de passe est :</b> " . $_SESSION['password'];

    //CONNEXION BDD//
    try {
        // On se connecte à MySQL
        $bdd = mysqli_connect('localhost', 'root', '1234');
        mysqli_select_db($bdd, 'web_app_mh');
        echo '<h2 class="mt-4">Vous êtes bien connecté à votre BDD</h2>';
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
        echo '<h1>Erreur connexion BDD</h1>';
    }

    // Define variables and initialize with empty values
    $pseudo = $password = "";
    $pseudo_err = $password_err = "";


    // Check if username is empty
    if (empty(trim($_POST["pseudo"]))) { } else {
        $pseudo = trim($_POST["pseudo"]);
        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
            // Validate credentials
            if (empty($pseudo_err) && empty($password_err)) {
                // Prepare a select statement
                $sql = "SELECT id, pseudo, password FROM users WHERE pseudo = ?";
                if ($stmt = mysqli_prepare($bdd, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "s", $param_pseudo);

                    $param_pseudo = $pseudo;
                    $hashed_password = md5($password);

                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Store result
                        mysqli_stmt_store_result($stmt);
                        // Check if pseudo exists, if yes then verify password

                        //CONNEXION BDD//
                        $dsn = "mysql:host=localhost;dbname=web_app_mh;charset=utf8mb4";

                        try {
                            // On se connecte à MySQL
                            $pdo = new PDO($dsn, 'root', '1234');
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (Exception $e) {
                            // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : ' . $e->getMessage());
                            echo '<h1>Unlucky ça marche pas</h1>';
                        }

                        // On sélectionne tous les users et password correspondant aux post
                        $req = "SELECT * FROM users WHERE users.pseudo = :pseudo AND users.password = :password";
                        $stmt = $pdo->prepare($req);
                        $stmt->execute(array(
                            'pseudo' => $_POST['pseudo'],
                            'password' => md5($_POST['password']),
                        ));
                        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Si $resultat n'est pas vide alors on a forcement retourné des informations communes BDD à $_POST
                        if (!empty($resultat)) {
                            session_start();
                            $_SESSION['login'] = true;
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['pseudo'] = $pseudo;
                            $_SESSION['password'] = $password;
                            $_SESSION['role'] = $resultat['role'];
                            header("Location:index.php");
                            return "Vous êtes connecté !";
                        } else {
                            echo "<span style=\"color:red;\">Mauvais identifiant ou mauvais mot de passe</span>\r\n";
                            //var_dump($resultat);
                        }

                        // //CONNEXION BDD//
                        // $dsn = "mysql:host=localhost;dbname=web_app_mh;charset=utf8mb4";

                        // try {
                        //     // On se connecte à MySQL
                        //     $pdo = new PDO($dsn, 'root', '1234');
                        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        // } catch (Exception $e) {
                        //     // En cas d'erreur, on affiche un message et on arrête tout
                        //     die('Erreur : ' . $e->getMessage());
                        //     echo '<h1>Unlucky ça marche pas</h1>';
                        // }

                        // //RE-DIRECTION//

                        // // On vérifie si le champ Login n'est pas vide.
                        // if ($_SESSION['pseudo'] == '') {
                        //     Header('Location:index.html');
                        // } else {
                        //     echo "  <a href src='Disconnect.php'> Se déconnecter </a> || Utilisateur: " . $_SESSION['pseudo'] . "\r\n";
                        // }

                        // $req = "SELECT * FROM users WHERE pseudo = :pseudo";

                        // $stmt = $pdo->prepare($req);
                        // /*Paramètres*/
                        // $stmt->execute(array(
                        //     'pseudo' => $_POST['pseudo'],
                        // ));
                        // $pseudo = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // if (!empty($pseudo)) {
                        //     echo "<span style=\"color:red;\">Pseudo non disponible</span>";

                        //     $req = "SELECT * FROM users WHERE password = :password";
                        //     $stmt = $pdo->prepare($req);
                        //     $stmt->execute(array(
                        //         'password' => $_POST['password'],
                        //     ));
                        //     $password = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        //     $isPasswordCorrect = password_verify($_POST['password'], $pseudo['password']);

                        //     if (!$resultat) {
                        //         echo 'Mauvais identifiant ou mot de passe !';
                        //     } else {
                        //         if ($isPasswordCorrect) {

                        //             session_start();
                        //             $_SESSION['id'] = $resultat['id'];
                        //             $_SESSION['pseudo'] = $pseudo;
                        //             echo 'Vous êtes connecté !';
                        //         } else {
                        //             echo 'Mauvais identifiant ou mot de passe !';
                        //         }
                        //     }
                        // } else {
                        //     echo "<span style=\"color:green;\">Pseudo disponible</span>\r\n";
                        // }
                    }
                }
            }
        }
    }
}
