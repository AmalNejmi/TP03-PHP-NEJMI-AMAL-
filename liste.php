
<?php
// Auteur : Amal Nejmi
// Objectif : lire et afficher les notes enregistrées.
// Date : 18/10/2026

require __DIR__ . "/config.php";
require __DIR__ . "/includes/entete_inc.php";
require __DIR__ . "/includes/menu_inc.php";

$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    echo "Aucune note enregistrée pour le moment.";
    require __DIR__ . "/includes/pied_inc.php";
    exit;
}

$fp = fopen($fichier, "r");

if (!$fp) {
    echo "Erreur lors de l'ouverture du fichier.";
    require __DIR__ . "/includes/pied_inc.php";
    exit;
}

$totalMoyennes = 0;
$nombre = 0;

echo '<table border="1" cellpadding="6">';
echo '<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>';

while (($ligne = fgetcsv($fp, 1000, ";")) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    [$nom, $info, $math] = $ligne;

    $moyenne = ((float)$info + (float)$math) / 2;
    $totalMoyennes += $moyenne;
    $nombre++;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>" . htmlspecialchars($info) . "</td>";
    echo "<td>" . htmlspecialchars($math) . "</td>";
    echo "<td>" . round($moyenne, 2) . "</td>";
    echo "<td>" . htmlspecialchars(mention($moyenne)) . "</td>";
    echo "</tr>";
}

fclose($fp);
echo "</table>";

if ($nombre > 0) {
    echo "<p>Moyenne générale : "
        . round($totalMoyennes / $nombre, 2)
        . "</p>";
}

require __DIR__ . "/includes/pied_inc.php";
?>
