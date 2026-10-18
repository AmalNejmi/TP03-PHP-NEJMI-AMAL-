
<?php
// Auteur : Amal Nejmi
// Objectif : valider les notes et enregistrer dans CSV.
// Date : 18/10/2026

require __DIR__ . "/config.php";
require __DIR__ . "/includes/entete_inc.php";
require __DIR__ . "/includes/menu_inc.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Veuillez envoyer le formulaire.";
    require __DIR__ . "/includes/pied_inc.php";
    exit;
}

$champs = ["nom", "note_info", "note_math"];

foreach ($champs as $champ) {
    if (!isset($_POST[$champ]) ||
        trim((string)$_POST[$champ]) === "") {
        echo "Erreur : le champ "
            . htmlspecialchars($champ)
            . " est obligatoire.";

        require __DIR__ . "/includes/pied_inc.php";
        exit;
    }
}

$nom = trim($_POST["nom"]);
$noteInfo = filter_var(
    $_POST["note_info"],
    FILTER_VALIDATE_FLOAT
);
$noteMath = filter_var(
    $_POST["note_math"],
    FILTER_VALIDATE_FLOAT
);

if (
    $noteInfo === false || $noteMath === false ||
    $noteInfo < NOTE_MIN || $noteInfo > NOTE_MAX ||
    $noteMath < NOTE_MIN || $noteMath > NOTE_MAX
) {
    echo "Erreur : les notes doivent être entre 0 et 20.";
} else {
    $moyenne = ($noteInfo + $noteMath) / 2;

    if (!is_dir(__DIR__ . "/data")) {
        mkdir(__DIR__ . "/data", 0777, true);
    }

    $fichier = fopen(__DIR__ . "/data/notes.csv", "a");

    if (!$fichier) {
        echo "Impossible d'ouvrir le fichier CSV.";
    } else {
        fputcsv(
            $fichier,
            [$nom, $noteInfo, $noteMath],
            ";"
        );

        fclose($fichier);

        echo "<h2>Enregistrement réussi</h2>";
        echo "Nom : " . htmlspecialchars($nom) . "<br>";
        echo "Note informatique : " . $noteInfo . "<br>";
        echo "Note mathématiques : " . $noteMath . "<br>";
        echo "Moyenne : " . $moyenne . "<br>";
        echo "Mention : " . htmlspecialchars(mention($moyenne));

        echo '<p><a href="saisie.html">Ajouter un autre apprenant</a></p>';
        echo '<p><a href="liste.php">Voir la liste</a></p>';
    }
}

require __DIR__ . "/includes/pied_inc.php";
?>
