<?php
include "conf_con.php";
include "Read_InfoChange_requetes.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <?php
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
include "conf_con.php";
$nomRS = $_POST['nom_RS']; 

try {
    $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);

    $req = "DELETE FROM `RS_liens` WHERE `nom_RS` = :nom_RS";
    $prep = $connexion->prepare($req);
    $prep->execute(array(
        ":nom_RS" => $nomRS
    ));
    $res = $prep->rowCount();
    var_dump($res);

    if ($res == 1) {
    echo "<p>Lien supprimé, bien joué !<p>";
    echo "<div class='lienRetour'>"
            . "<a href='../admin.php' class='RetourAdmin'>Retour page admin</a>"
        . "</div>";
    }
} 

catch (PDOException $e) {
    $connexion = NULL; // bye db
    exit("OOPS - DB error : " . $e->getMessage());
}

?>
</body>
</html>