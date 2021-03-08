<?php
include "conf_con.php";
try {
    $connexion = new PDO($DB_DRIVER . ":host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=" . $DB_CHARSET, $DB_LOGIN, $DB_PASS, $DB_OPTIONS);
    $req = "SELECT * FROM `users`
            WHERE `mail` = :mail ";
    $prep = $connexion->prepare($req);
    $prep->execute(array(
        ":mail" => $_POST['mail']
    ));
    $result = $prep->fetchAll(); // récupère le resultat dans un tableau

} 

catch (PDOException $e) {
    $connexion = NULL; // bye db
    exit("OOPS - DB error : " . $e->getMessage());
}

?>