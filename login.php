
<?php
// Auteur : Amal Nejmi
// Objectif : connexion avec session et cookie.
// Date : 18/10/2026

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");

    if ($login !== "") {
        $_SESSION["login"] = $login;

        setcookie(
            "dernier_login",
            $login,
            time() + 86400,
            "/"
        );

        $infos = json_encode([
            "login" => $login,
            "date" => date("Y-m-d H:i:s")
        ]);

        setcookie(
            "infos_connexion",
            $infos,
            time() + 86400,
            "/"
        );

        header("Location: profil.php");
        exit;
    }

    $erreur = "Veuillez saisir un login.";
}

$dernierLogin = htmlspecialchars(
    $_COOKIE["dernier_login"] ?? ""
);

$infosCookie = json_decode(
    $_COOKIE["infos_connexion"] ?? "{}",
    true
);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php
    if (isset($erreur)) {
        echo htmlspecialchars($erreur);
    }
    ?>

    <form method="post" action="login.php">
        <label>Login :
            <input type="text" name="login"
                   value="<?= $dernierLogin ?>" required>
        </label>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
