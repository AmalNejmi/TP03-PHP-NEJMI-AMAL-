
<?php
// Auteur : Amal Nejmi
// Objectif : afficher le pied de page et la date.
// Date : 18/10/2026
?>
<hr>
<footer>
    <p>Date du jour : <?= date("d/m/Y") ?></p>

    <?php
    $finSemestre = new DateTime("2027-01-31");
    $aujourdHui = new DateTime();
    $diff = $aujourdHui->diff($finSemestre);

    if ($finSemestre >= $aujourdHui) {
        echo "Jours restants avant le 31/01/2027 : "
            . $diff->days;
    } else {
        echo "La date de fin de semestre est passée.";
    }

    echo "<br>";

    // Exemple de date invalide : 31 février 2026
    var_dump(checkdate(2, 31, 2026));
    ?>
</footer>
</body>
</html>
