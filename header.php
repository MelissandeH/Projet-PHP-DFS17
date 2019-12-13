<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>My Gaming List</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3767e481f3.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">Welcome <?php if (isset($_SESSION['pseudo'])){ echo $_SESSION['pseudo']; } else { echo "Visitor";}?> !</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="index.php"><i class="fas fa-home m-1"></i>Home</a>
            <?php
            if (isset($_SESSION['login'])){
               echo "<a class=\"p-2 text-dark\" href=\"account.php\">My Account</a>";
               echo "<a class=\"p-2 text-dark\" href=\"inscription.php\">New account</a>";
               echo "</nav>";
               echo '<a href="logout.php" class="p-2 text-dark btn btn-outline-primary m-2">Log Out</a>';
            } else {
                echo '<a href="log.php" class="p-2 text-dark btn btn-outline-primary m-2">Log In</a>';
            }

            ?>
        </div>
    </header>

    <!--<?php var_dump($_SESSION); ?>-->