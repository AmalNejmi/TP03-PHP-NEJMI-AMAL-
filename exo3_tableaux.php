
<?php
// Auteur : Amal Nejmi
// Objectif : tableaux, statistiques et tris.
// Date : 18/10/2026

require __DIR__ . "/config.php";
require __DIR__ . "/includes/entete_inc.php";
require __DIR__ . "/includes/menu_inc.php";

// Exercice 3.1 : tableau associatif des notes
$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "Algorithmique", "Base de données"];

// Fonction d'affichage réutilisée pour les tris
function afficher($tab) {
    echo "<ul>";

    foreach ($tab as $cle => $valeur) {
        echo "<li>"
            . htmlspecialchars((string)$cle)
            . " : "
            . htmlspecialchars((string)$valeur)
            . "</li>";
    }

    echo "</ul>";
}
?>

<h2>Exercice 3.1 : tableau des modules</h2>

<?php
echo "<h3>Avec foreach</h3>";

foreach ($modules as $module) {
    echo htmlspecialchars($module) . "<br>";
}

echo "<h3>Par indice</h3>";

for ($i = 0; $i < count($modules); $i++) {
    echo "$i : " . htmlspecialchars($modules[$i]) . "<br>";
}
?>

<h2>Exercice 3.2 : tableau HTML des notes</h2>

<table border="1" cellpadding="6">
    <tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
    </tr>

    <?php foreach ($notes as $nom => $note): ?>
        <tr style="<?= $note < SEUIL ? 'color:red;' : '' ?>">
            <td><?= htmlspecialchars($nom) ?></td>
            <td><?= $note ?></td>
            <td><?= htmlspecialchars(mention($note)) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Exercice 3.3 : statistiques</h2>

<?php
$somme = 0;
$meilleure = null;
$faible = null;
$effectifs = [];

foreach ($notes as $nom => $note) {
    $somme += $note;

    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }

    if ($faible === null || $note < $faible) {
        $faible = $note;
    }

    $m = mention($note);

    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }

    $effectifs[$m]++;
}

$moyenne = $somme / count($notes);

echo "Somme = $somme<br>";
echo "Moyenne = " . round($moyenne, 2) . "<br>";
echo "Meilleure note = $meilleure<br>";
echo "Plus faible note = $faible<br>";

echo "Vérification avec array_sum : "
    . array_sum($notes) . "<br>";

echo "Nombre d'apprenants : "
    . count($notes) . "<br>";

echo "Note maximale : " . max($notes) . "<br>";
echo "Note minimale : " . min($notes) . "<br>";

echo "<h3>Effectifs par mention</h3>";
afficher($effectifs);
?>

<h2>Exercice 3.4 : tris</h2>

<?php
$tab = $notes;
ksort($tab);
echo "<h3>Noms croissants</h3>";
afficher($tab);

$tab = $notes;
arsort($tab);
echo "<h3>Notes décroissantes</h3>";
afficher($tab);

$tab = $notes;
krsort($tab);
echo "<h3>Noms décroissants</h3>";
afficher($tab);

$tab = $notes;
asort($tab);
echo "<h3>Notes croissantes</h3>";
afficher($tab);

echo "Pour trier les valeurs d'un tableau indexé : sort().";
?>

<h2>Exercice 3.5 : opérateurs de tableaux</h2>

<?php
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<pre>";
var_dump($a + $b);
var_dump($a == $b);
var_dump($a === $b);
echo "</pre>";

echo "Le signe + réunit les tableaux en conservant les clés "
    . "du premier en cas de conflit.<br>";

echo "== compare les paires clé-valeur sans exiger le même ordre.<br>";

echo "=== compare aussi l'ordre et les types.";
?>

<?php require __DIR__ . "/includes/pied_inc.php"; ?>
