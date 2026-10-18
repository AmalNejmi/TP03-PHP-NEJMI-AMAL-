
<?php
// Auteur : Amal Nejmi
// Objectif : exporter les résultats en JSON.
// Date : 18/10/2026

require __DIR__ . "/config.php";
require __DIR__ . "/includes/entete_inc.php";
require __DIR__ . "/includes/menu_inc.php";

$fichier = __DIR__ . "/data/notes.csv";
$resultats = [];

if (file_exists($fichier)) {
    $fp = fopen($fichier, "r");

    if ($fp) {
        while (($ligne = fgetcsv($fp, 1000, ";")) !== false) {
            if (count($ligne) < 3) {
                continue;
            }

            [$nom, $info, $math] = $ligne;

            $resultats[] = [
                "nom" => $nom,
                "note_info" => (float)$info,
                "note_math" => (float)$math,
                "moyenne" => ((float)$info + (float)$math) / 2
            ];
        }

        fclose($fp);
    }
}

$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false) {
    $json = "[]";
}

file_put_contents(__DIR__ . "/data/notes.json", $json);

$contenu = file_get_contents(__DIR__ . "/data/notes.json");
$decode = json_decode($contenu, true);

echo "<h2>Résultats JSON</h2>";
echo "<pre>";
echo htmlspecialchars(print_r($decode, true));
echo "</pre>";

echo "<h2>Résultat de serialize()</h2>";
echo "<pre>";
echo htmlspecialchars(serialize($resultats));
echo "</pre>";

echo "<h2>Résultat de json_encode()</h2>";
echo "<pre>";
echo htmlspecialchars($json);
echo "</pre>";

echo "<p>JSON est directement exploitable par JavaScript.</p>";

require __DIR__ . "/includes/pied_inc.php";
?>
