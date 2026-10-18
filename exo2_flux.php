
<?php
// Auteur : Amal Nejmi
// Objectif : conditions et boucles.
// Date : 18/10/2026

require  "/config.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2 - PHP</title>
</head>
<body>

<h1>Partie 2 : Structures de contrôle</h1>

<h2>Exercice 2.1 : if / elseif / else</h2>

<?php
$notesTest = [18, 15, 13, 10, 7];

foreach ($notesTest as $note) {
    echo "Note $note : " . mention($note) . "<br>";
}
?>

<h2>Exercice 2.2 : switch</h2>

<?php
$mois = date("m");

switch ($mois) {
    case "01": $nomMois = "janvier"; break;
    case "02": $nomMois = "février"; break;
    case "03": $nomMois = "mars"; break;
    case "04": $nomMois = "avril"; break;
    case "05": $nomMois = "mai"; break;
    case "06": $nomMois = "juin"; break;
    case "07": $nomMois = "juillet"; break;
    case "08": $nomMois = "août"; break;
    case "09": $nomMois = "septembre"; break;
    case "10": $nomMois = "octobre"; break;
    case "11": $nomMois = "novembre"; break;
    case "12": $nomMois = "décembre"; break;
    default: $nomMois = "mois inconnu";
}

echo "Nous sommes en " . $nomMois . ".<br>";
echo "Sans break, les cases suivants peuvent aussi s'exécuter.";
?>

<h2>Exercice 2.3 : boucles</h2>

<h3>1. Triangle d'étoiles</h3>

<?php
for ($ligne = 1; $ligne <= 6; $ligne++) {
    for ($colonne = 1; $colonne <= $ligne; $colonne++) {
        echo "*";
    }
    echo "<br>";
}
?>

<h3>2. while : nombres de 0 à 20 par pas de 2</h3>

<?php
$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong><br>";
    } else {
        echo "$i<br>";
    }

    $i += 2;
}
?>

<h3>3. for et continue : nombres pairs</h3>

<?php
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }

    echo "$i ";
}
?>

<h3>4. while, switch et break 2</h3>

<?php
$i = 1;

while ($i <= 12) {
    switch ($i) {
        case 5:
            echo "<br>At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}
?>

<h3>5. do-while</h3>

<?php
$i = 0;

do {
    echo "$i<br>";
    $i += 2;
} while ($i <= 20);

echo "do-while exécute le bloc au moins une fois.";
?>

</body>
</html>
