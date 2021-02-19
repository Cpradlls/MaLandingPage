<?php
    include "conf_con.php";
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

$idRS = $_POST['id_RS'];
$nomRS = $_POST['nom_RS'];
$lienRS = $_POST['lien_RS'];
$imgRS = $_POST['img_RS'];

try {
    $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);    
    $req = "UPDATE `RS_liens` SET `nom_RS` = :nom_RS, `lien_RS` = :lien_RS, `img_RS` = :img_RS WHERE `id_RS` = :id_RS;";
    $prep = $connexion->prepare($req);
    $prep->execute(array(
        ":id_RS" => $idRS,
        ":nom_RS" => $nomRS,
        ":lien_RS" => $lienRS,
        ":img_RS" => $imgRS
    ));
    $res = $prep->rowCount();

    if ($res == 1) {
        echo "<p>Lien modifié, bien joué !</p>";
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