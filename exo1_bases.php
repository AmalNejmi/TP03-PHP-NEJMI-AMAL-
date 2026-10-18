<?php
/**
 * Auteur : Amal Nejmi
 * Objectif : Exercice sur les variables, constantes, types, conversions et chaînes de caractères
 * Date : 2026-10-18
 */

require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1 - Bases PHP</title>
</head>
<body>
    <h1>Partie 1 : Variables, constantes, types et chaînes</h1>

    <?php
    // Exercice 1.1 : Noms de variables 
    /*
     * $x       : Valide (commence par une lettre)
     * $_x      : Valide (commence par un underscore)
     * $2x      : Invalide (ne peut pas commencer par un chiffre)
     * $x-y     : Invalide (le tiret '-' est interprété comme un opérateur de soustraction)
     * $Prix_HT : Valide (lettres et underscore)
     * $prix ht : Invalide (contient un espace)
     * $état    : Valide (caractères accentués acceptés en PHP moderne, mais déconseillé)
     */
    $x = 10;
    $_x = 20;
    $Prix_HT = 100;

    // Démonstration que $a et $A sont deux variables distinctes
    $a = "valeur de a minuscule";
    $A = "VALEUR DE A MAJUSCULE";
    echo "<p>\$a = $a | \$A = $A (Elles sont bien distinctes)</p>";

    //  Exercice 1.2 : Constantes
    echo "<h2>Constantes :</h2>";
    echo "<p>Établissement : " . ETABLISSEMENT . "</p>";
    echo "<p>Note Min : " . NOTE_MIN . " | Note Max : " . NOTE_MAX . " | Seuil : " . SEUIL . "</p>";

    echo "<p>Test defined('SEUIL') : " . (defined('SEUIL') ? 'Oui' : 'Non') . "</p>";
    echo "<p>Test defined('INCONNUE') : " . (defined('INCONNUE') ? 'Oui' : 'Non') . "</p>";

    /*
     * Réponses aux questions :
     * - Que se passe-t-il si on affiche une constante non définie ? PHP déclenche une erreur.
     * - Différence entre const et define() : const est évalué à la compilation (ne peut pas être mis dans un if), 
     *   tandis que define() est évalué à l'exécution.
     */

    // Exercice 1.3 : Calcul TTC
    echo "<h2>Calcul Prix TTC :</h2>";
    $prix_ht = 60;
    $tva = 20;
    $prix_ttc = $prix_ht * (1 + $tva / 100);
    echo "<p>Le prix TTC du produit est de $prix_ttc €.</p>";

    //  Exercice 1.4 : Types et conversions
    echo "<h2>Types et conversions :</h2>";
    $test = 42;
    $test_str = (string) $test;
    echo "<pre>";
    var_dump($test_str);
    echo "</pre>";

    echo "<h3>Vérification des booléens :</h3><pre>";
    var_dump((bool) 0);       // false
    var_dump((bool) 0.0);     // false
    var_dump((bool) "0");     // false
    var_dump((bool) "");      // false
    var_dump((bool) "abc");   // true
    var_dump((bool) []);      // false
    var_dump((bool) null);    // false
    echo "</pre>";

    echo "<h3>Conversions numériques :</h3><pre>";
    var_dump((int) 3.9);         // int(3)
    var_dump((int) "12abc");     // int(12)
    var_dump((float) "1.5e3");   // float(1500)
    var_dump((int) true);        // int(1)
    echo "</pre>";

    $dec = 255;
    $hex = 0xFF;
    $oct = 0377;
    $bin = 0b11111111;
    echo "<p>Nombre 255 en décimal : $dec, hexadécimal : $hex, octal : $oct, binaire : $bin</p>";

    //  Exercice 1.5 : Chaînes de caractères 
    echo "<h2>Chaînes de caractères :</h2>";
    $traitees = "égales à";
    $ici = 2;

    echo "<p>1. Ahmed a dit: \"J'ai réussi\"</p>";
    echo "<p>2. Voulez-vous supprimer C:\\*.*? </p>";
    echo '<p>3. Ceci n\'affichera pas \n de nouvelle ligne</p>';
    echo '<p>4. Les variables ne seront pas $traitees $ici</p>';
    echo "<p>5. Les variables seront $traitees $ici</p>";

    $chaine_etoiles = "*Bonjour les développeurs*";
    echo "<p>Nettoyage avec trim() : " . trim($chaine_etoiles, "*") . "</p>";

    echo "<p>Affichage lettre par lettre :</p>";
    $mot = "PHP";
    for ($i = 0; $i < strlen($mot); $i++) {
        echo $mot[$i] . "<br>";
    }
    ?>
</body>
</html>
