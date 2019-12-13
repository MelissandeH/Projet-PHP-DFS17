<?php

include "bdd-connexion.php";

//AJOUTER DES CARTES//
//IMAGES//
// File upload path
if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['jpg', 'png', 'pdf'])) {
        echo "You file extension must be .jpg, .png or .pdf";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            //TITRE ET DESCRIPTION//
            $title = $_POST['title'];
            $description = $_POST['description'];

            $sql = "INSERT INTO cards (title,description,img_name) VALUES ('$title','$description','img/$filename')";
            if (mysqli_query($bdd, $sql)) {
                echo "<h2 style=\"color:green;\">New record created successfully</h2>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
            }
        }
    }
}

mysqli_close($bdd);
header('Location:index.php');
