<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <?php
    include "../requetes/Read_InfoChange_requetes.php";
    echo '<title name="title">' . htmlspecialchars($titleRead, ENT_QUOTES) . '</title>',
    '<meta name="description" content="' . htmlspecialchars($metaDescRead, ENT_QUOTES) . '">';
    /*
        READ COLOR 
    */
    echo "<style>",
            "html {",
                "background-color: " . $colorFondRead . ";",
            "}",
            "h1, h2, h3 {",
                "color: " . $colorFontRead . ";",
            "}",
        "</style>";
    ?>
</head>
<body>
<?php

include "../requetes/Read_user.php";// insertion de la requete sql readall

// check the login

$sentMail    = $_POST["mail"] ?? false;
$sentPassword = $_POST["password"] ?? false;
if($sentMail && $sentPassword) {

    if (
        $sentMail == $result["mail"] &&
        password_verify($sentPassword, $result["password"])
    ) {
        // user authenticated
        // let's create a secure session
        // and redirect the user to the backoffice
        include("session_start.php");
        $_SESSION['token'] = true;
        $connexion = NULL;
        header("Location: ../admin.php");
        exit;
    }
    else {
        // still here ? so that user does not exist
        $connexion = NULL;
        header("Location: login.php#misspelled-email-or-password");
        exit;
    }

} else {
    // missing credential
    // so back to the login screen
    $connexion = NULL;
    header("Location: login.php#missing-email-or-password");
    exit;
}
?>
</body>
</html>
