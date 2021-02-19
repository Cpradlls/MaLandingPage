<!DOCTYPE html>
<html lang="fr">
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
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
                    "color: " . $colorFontRead . ";",
                "}",
            "</style>";
        ?>
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="login_check.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Adresse mail :</b></label>
                <input type="mail" class="InputG" placeholder="Entrer votre adresse mail" name="mail" required>

                <label><b>Mot de passe :</b></label>
                <input type="password" class="InputG" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" class="inputSubmit" value="Valider">

            </form>
        </div>
    </body>
</html>