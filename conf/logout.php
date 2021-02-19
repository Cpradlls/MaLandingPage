<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
include "session_start.php";
include "session_close.php";
header("location: ../index.php#Deconnexion");
?>
</body>
</html>