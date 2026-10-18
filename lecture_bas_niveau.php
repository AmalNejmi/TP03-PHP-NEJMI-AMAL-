
<?php
// Auteur : Amal Nejmi
// Objectif : lire le CSV avec fgets et explode.
// Date : 18/10/2026

require __DIR__ . "/config.php";
require __DIR__ . "/includes/entete_inc.php";

$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    echo "Le fichier notes.csv n'existe pas encore.";
} else {
    $fp = fopen($fichier, "r");

    if (!$fp) {
        echo "Erreur d'ouverture.";
        exit;
    }

    echo "<h2>Lecture du fichier</h2>";

    while (!feof($fp)) {
        $ligne = fgets($fp);

        if ($ligne === false || trim($ligne) === "") {
            continue;
        }

        $colonnes = explode(";", trim($ligne));

        echo htmlspecialchars(implode(" | ", $colonnes));
        echo "<br>";
    }

    fclose($fp);
}

require __DIR__ . "/includes/pied_inc.php";
?>
