<?php
include "conf_con.php";

try {
    $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);
    $req = "SELECT * FROM `infoChange`";
    $prep = $connexion->prepare($req);
    $prep->execute();
    $resultInfo = $prep->fetch(); // récupère le resultat dans un tableau

    $idInfoChangeRead = $resultInfo['id_infoChange'];
    $metaDescRead = $resultInfo['metaDesc'];
    $titleRead = $resultInfo['title'];
    $colorFondRead = $resultInfo['color_fond'];
    $colorFontRead = $resultInfo['color_font'];
    $introRead = $resultInfo['intro'];
} 
catch (PDOException $e) {
    $connexion = NULL; // bye db
    exit("OOPS - DB error : " . $e->getMessage());
}

?>