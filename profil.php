<?php
session_start();
// Auteur : Tahiri Bayane
// Objectif : page protégée accessible seulement après connexion
// Date : 18/10/2026

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

echo "<p>Bienvenue " . htmlspecialchars($_SESSION['login']) . " !</p>";
echo "<p><a href='deconnexion.php'>Se déconnecter</a></p>";

echo "<h3>Validation d'une date</h3>";
?>
<form method="get" action="profil.php">
    Jour : <input type="number" name="jour" min="1" max="31">
    Mois : <input type="number" name="mois" min="1" max="12">
    Année : <input type="number" name="annee">
    <button type="submit">Vérifier</button>
</form>
<?php
if (isset($_GET['jour'], $_GET['mois'], $_GET['annee'])
    && $_GET['jour'] !== '' && $_GET['mois'] !== '' && $_GET['annee'] !== '') {
    $j = (int) $_GET['jour'];
    $m = (int) $_GET['mois'];
    $a = (int) $_GET['annee'];
    if (checkdate($m, $j, $a)) {
        echo "<p style='color:green'>$j/$m/$a est une date valide.</p>";
    } else {
        echo "<p style='color:red'>$j/$m/$a n'est pas une date valide.</p>";
    }
}

include 'includes/pied_inc.php';