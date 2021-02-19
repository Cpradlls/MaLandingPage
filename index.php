<?php
include "requetes/conf_con.php";
include "requetes/Read_InfoChange_requetes.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php
    echo '<title name="title">' . htmlspecialchars($titleRead, ENT_QUOTES) . '</title>',
    '<meta name="description" content="' . htmlspecialchars($metaDescRead, ENT_QUOTES) . '">';
    ?>
</head>
<body>

    <header>
        <h1>Bonjour !</h1>
        <div class="backgroundCo">
            <a class="connexion" href="conf/login.php">Connexion</a>
        </div>
    </header>

    <main>
        <?php

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

        <!-- Lecture de l'intro -->
        <?php
        echo "<p>" . htmlspecialchars($introRead, ENT_QUOTES) . "</p>";
        ?>

        <!-- Lecture des liens de la bd -->
        <h2>Retrouver moi sur :</h2>
        <?php
        include "requetes/Read_lien.php";
        foreach ($resultLien as $value) {
            echo '<a href="' . htmlspecialchars($value['lien_RS'], ENT_QUOTES) . '" target="_blank"><img class="img" src="' . htmlspecialchars($value['img_RS'], ENT_QUOTES) . '" alt="Icone ' . $value['nom_RS'] . '"></a>'; 
        }
        ?>

    </main>

</body>
</html>