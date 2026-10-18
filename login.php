<?php
session_start();
// Auteur : Tahiri Bayane
// Objectif : connexion avec session et cookie
// Date : 18/10/2026

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['login'] ?? ''))) {
    $login = trim($_POST['login']);

    $_SESSION['login'] = $login;

   setcookie("dernier_login",
    json_encode(["login" => $login, "date" => date("d/m/Y H:i")]),
    time() + 86400, "/");
    exit;
}

$cookie = isset($_COOKIE['dernier_login']) ? json_decode($_COOKIE['dernier_login'], true) : null;
$valeur = htmlspecialchars($cookie['login'] ?? '');

// Q1 : Où est stockée une session ? Où est stocké un cookie ?
// R1 : La session est stockée CÔTÉ SERVEUR (fichier temporaire) ; le navigateur
//      ne garde que l'identifiant PHPSESSID, dans un cookie. Un cookie est
//      stocké CÔTÉ CLIENT, dans le navigateur.
//
// Q2 : Pourquoi setcookie() et header() doivent-ils être appelés avant tout affichage ?
// R2 : Ils modifient les en-têtes HTTP, envoyés AVANT le corps de la page. Dès
//      qu'un caractère est affiché (même un espace), les en-têtes sont déjà
//      partis : erreur "headers already sent".
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="post" action="login.php">
        Login : <input type="text" name="login" value="<?= $valeur ?>">
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>