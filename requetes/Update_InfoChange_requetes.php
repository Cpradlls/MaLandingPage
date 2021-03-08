<?php
    include "Read_InfoChange_requetes.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <?php
    echo '<title name="title">' . htmlspecialchars($titleRead, ENT_QUOTES) . '</title>',
    '<meta name="description" content="' . htmlspecialchars($metaDescRead, ENT_QUOTES) . '">';
    ?>
</head>
<body>
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
    UPDATE META DESCRIPTION
*/
$idInfoChange = $_POST['id_infoChange'];

if (isset($_POST['updateMetaDesc'])) {
    $metaDesc = $_POST['metaDesc'];
    try {
        $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);    
        $req = "UPDATE `infoChange` SET `metaDesc` = :metaDesc WHERE `id_infoChange` = :id_infoChange;";
        $prep = $connexion->prepare($req);
        $prep->execute(array(
            ":id_infoChange" => $idInfoChange,
            ":metaDesc" => $metaDesc
        ));
        $res = $prep->rowCount();

        if ($res == 1) {
            echo "<p>Meta description modifiée, bien joué !</p>";
            echo "<div class='lienRetour'>"
                    . "<a href='../admin.php' class='RetourAdmin'>Retour page admin</a>"
                . "</div>";
        }

    } 
   
    catch (PDOException $e) {
        $connexion = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
    }
}

/*
    UPDATE TITLE
*/
if (isset($_POST['updateTitle'])) {
    $title = $_POST['title'];
    try {
        $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);    
        $req = "UPDATE `infoChange` SET `title` = :title WHERE `id_infoChange` = :id_infoChange;";
        $prep = $connexion->prepare($req);
        $prep->execute(array(
            ":id_infoChange" => $idInfoChange,
            ":title" => $title
        ));
        $res = $prep->rowCount();

        if ($res == 1) {
            echo "<p>Title modifiée, bien joué !</p>";
            echo "<div class='lienRetour'>"
                    . "<a href='../admin.php' class='RetourAdmin'>Retour page admin</a>"
                . "</div>";
        }
    
    }   
    catch (PDOException $e) {
        $connexion = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
    }
}

/*
    UPDATE COLOR FOND
*/
if (isset($_POST['updateFond'])) {
    $colorFond = $_POST['color_fond'];
    try {
        $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);    
        $req = "UPDATE `infoChange` SET `color_fond` = :color_fond WHERE `id_infoChange` = :id_infoChange;";
        $prep = $connexion->prepare($req);
        $prep->execute(array(
            ":id_infoChange" => $idInfoChange,
            ":color_fond" => $colorFond
        ));
        $res = $prep->rowCount();

        if ($res == 1) {
            echo "<p>Color fond modifiée, bien joué !</p>";
            echo "<div class='lienRetour'>"
                    . "<a href='../admin.php' class='RetourAdmin'>Retour page admin</a>"
                . "</div>";
        }
    
    }   
    catch (PDOException $e) {
        $connexion = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
    }
}

/*
    UPDATE COLOR FONT
*/
if (isset($_POST['updateFont'])) {
    $colorFont = $_POST['color_font'];
    try {
        $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);    
        $req = "UPDATE `infoChange` SET `color_font` = :color_font WHERE `id_infoChange` = :id_infoChange;";
        $prep = $connexion->prepare($req);
        $prep->execute(array(
            ":id_infoChange" => $idInfoChange,
            ":color_font" => $colorFont
        ));
        $res = $prep->rowCount();

        if ($res == 1) {
            echo "<p>Color font modifiée, bien joué !</p>";
            echo "<div class='lienRetour'>"
                    . "<a href='../admin.php' class='RetourAdmin'>Retour page admin</a>"
                . "</div>";
        }
    
    }   
    catch (PDOException $e) {
        $connexion = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
    }
}

/*
    UPDATE INTRO
*/
if (isset($_POST['updateIntro'])) {
    $intro = $_POST['intro'];
    try {
        $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);    
        $req = "UPDATE `infoChange` SET `intro` = :intro WHERE `id_infoChange` = :id_infoChange;";
        $prep = $connexion->prepare($req);
        $prep->execute(array(
            ":id_infoChange" => $idInfoChange,
            ":intro" => $intro
        ));
        $res = $prep->rowCount();

        if ($res == 1) {
            echo "<p>Intro modifiée, bien joué !</p>";
            echo "<div class='lienRetour'>"
                    . "<a href='../admin.php' class='RetourAdmin'>Retour page admin</a>"
                . "</div>";
        }
    
    }   
    catch (PDOException $e) {
        $connexion = NULL; // bye db
        exit("OOPS - DB error : " . $e->getMessage());
    }
}

?>
</body>
</html>
