<?php

    include "conf/session_start.php";

    if (!isset($_SESSION['token'])) {
        exit('Session not good !');
    }


?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php
    include "requetes/conf_con.php";
    include "requetes/Read_lien.php";
    include "requetes/Read_InfoChange_requetes.php";
    echo '<title name="title">' . htmlspecialchars($titleRead, ENT_QUOTES) . '</title>',
    '<meta name="description" content="' . htmlspecialchars($metaDescRead, ENT_QUOTES) . '">';
    ?>
</head>
<body>

    <header>
        <h1>Bonjour !</h1>
        <div class="backgroundCo">
            <a class="connexion" href="conf/logout.php">Déconnexion</a>
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


        /*
            UPDATE COLOR FOND
        */
        echo "<h2>Modifier la couleur de fond : </h2>";
        echo '<form action="requetes/Update_InfoChange_requetes.php" method="post">',
                '<label for="color_fond">Couleur du fond : </label>',
                '<input type="color" class="inputColor" name="color_fond" value="' . htmlspecialchars($colorFondRead, ENT_QUOTES) . '">',
                '<input type="number" hidden name="id_infoChange" value="' . htmlspecialchars($idInfoChangeRead, ENT_QUOTES) . '">',
                '<input type="submit" class="inputSubmit" name="updateFond" value="Modifier">',
            '</form>';


        /*
            UPDATE COLOR FONT
        */
        echo "<h2>Modifier la couleur de typo : </h2>";
        echo '<form action="requetes/Update_InfoChange_requetes.php" method="post">',
                '<label for="color_font">Couleur de la typo : </label>',
                '<input type="color" class="inputColor" name="color_font" value="' . htmlspecialchars($colorFontRead, ENT_QUOTES) . '">',
                '<input type="number" hidden name="id_infoChange" value="' . htmlspecialchars($idInfoChangeRead, ENT_QUOTES) . '">',
                '<input type="submit" class="inputSubmit" name="updateFont" value="Modifier">',
            '</form>';


        /*
            UPDATE TITLE
        */
        echo "<h2>Modifier le title : </h2>";
        echo '<form action="requetes/Update_InfoChange_requetes.php" method="post">',
                '<label for="title">Title : </label>',
                '<input type="text" class="InputG" name="title" value="' . htmlspecialchars($titleRead, ENT_QUOTES) . '">',
                '<input type="number" hidden name="id_infoChange" value="' . htmlspecialchars($idInfoChangeRead, ENT_QUOTES) . '">',
                '<input type="submit" class="inputSubmit" name="updateTitle" value="Modifier">',
            '</form>';

        /*
            UPDATE META
        */
        echo "<h2>Modifier la meta description : </h2>";
        echo '<form action="requetes/Update_InfoChange_requetes.php" method="post">',
                '<label for="metaDesc">Meta description : </label>',
                '<input type="text" class="InputG" name="metaDesc" value="' . htmlspecialchars($metaDescRead, ENT_QUOTES) . '">',
                '<input type="number" hidden name="id_infoChange" value="' . htmlspecialchars($idInfoChangeRead, ENT_QUOTES) . '">',
                '<input type="submit" class="inputSubmit" name="updateMetaDesc" value="Modifier">',
            '</form>';


        /*
            UPDATE INTRO
        */
        echo "<h2>Modifier l'intro : </h2>";
        echo '<form action="requetes/Update_InfoChange_requetes.php" method="post">',
                '<label for="intro">Intro : </label>',
                '<input type="text" class="InputG" name="intro" value="' . htmlspecialchars($introRead, ENT_QUOTES) . '">',
                '<input type="text" hidden name="id_infoChange" value="' . htmlspecialchars($idInfoChangeRead, ENT_QUOTES) . '">',
                '<input type="submit" class="inputSubmit" name="updateIntro" value="Modifier">',
            '</form>';


        /*
            CREATE LIEN
        */
        echo "<h2>Ajouter un lien : </h2>";
        echo '<form action="requetes/Create_lien.php" method="post">',

            '<label for="nom_RS">Nom du réseau social : </label>',
            '<input type="text" class="InputG" name="nom_RS" required placeholder="Tik Tok">',
            '<br>',
            '<label for="lien_RS">Url (lien) du réseau social : </label>',
            '<input type="text" class="InputG" name="lien_RS" required placeholder="http://tiktok.fr">',
            '<br>',
            '<label for="img_RS">Icone du réseau social : </label>',
            '<input type="text" class="InputG" name="img_RS" required placeholder="img/tiktok.png">',

            '<input type="submit" class="inputSubmit" value="Ajouter">',
        '</form>';


        /*
            UPDATE LIENS
        */
        echo "<h2>Modifier les liens : </2>";
        foreach ($resultLien as $value) {
        echo '<h3>' . htmlspecialchars($value['nom_RS'], ENT_QUOTES) . '</h3>',
        '<form action="requetes/Update_lien.php" method="post">',
            '<input type="text" hidden name="id_RS" value="' . htmlspecialchars($value['id_RS'], ENT_QUOTES) . '">',

            '<label for="nom_RS">Nom du réseau social : </label>',
            '<input type="text" class="InputG" name="nom_RS" value="' . htmlspecialchars($value['nom_RS'], ENT_QUOTES) . '">',
            '<br>',
            '<label for="lien_RS">Url (lien) du réseau social : </label>',
            '<input type="text" class="InputG" name="lien_RS" value="' . htmlspecialchars($value['lien_RS'], ENT_QUOTES) . '">',
            '<br>',
            '<label for="img_RS">Icone du réseau social : </label>',
            '<input type="text" class="InputG" name="img_RS" value="' . htmlspecialchars($value['img_RS'], ENT_QUOTES) . '">',

            '<input type="submit" class="inputSubmit" value="Modifier">',
        '</form>',
        '<br>';
        }


        /*
            DELETE LIEN
        */
        echo "<h2>Supprimer un lien : </2>";
        echo '<form action="requetes/Delete_lien.php" method="post">',
                '<select name="nom_RS" class="InputG" id="pet-select">';
                foreach ($resultLien as $value) {
                echo '<option name="' . htmlspecialchars($value['nom_RS'], ENT_QUOTES) . '">' . htmlspecialchars($value['nom_RS'], ENT_QUOTES) . '</option>';
                }
            echo '</select>',
                '<input type="submit" class="inputSubmit" value="Supprimer">',
            '</form>',
            '<br>';

        
        ?>


    </main>

</body>
</html>