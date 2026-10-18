<?php
// Auteur : Tahiri Bayane
// Objectif : valider et afficher les données d'un formulaire POST
// Date : 18/10/2026

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$erreur = "";

if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])
    || empty(trim($_POST['nom']))
    || $_POST['note_info'] === ''
    || $_POST['note_math'] === '') {
    $erreur = "Tous les champs sont obligatoires.";
} else {
    $nom = trim($_POST['nom']);
    $info = $_POST['note_info'];
    $math = $_POST['note_math'];

    if (!is_numeric($info) || !is_numeric($math)
        || $info < NOTE_MIN || $info > NOTE_MAX
        || $math < NOTE_MIN || $math > NOTE_MAX) {
        $erreur = "Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".";
    }
}

if ($erreur !== "") {
    echo "<p style='color:red'>" . htmlspecialchars($erreur) . "</p>";
    echo "<a href='saisie.html'>Retour au formulaire</a>";
} else {
    echo "<h2>Récapitulatif</h2>";
    echo "<p>Nom : " . htmlspecialchars($nom) . "<br>";
    echo "Note info : " . htmlspecialchars($info) . "<br>";
    echo "Note math : " . htmlspecialchars($math) . "</p>";
}
if ($erreur !== "") {
    echo "<p style='color:red'>" . htmlspecialchars($erreur) . "</p>";
    echo "<a href='saisie.html'>Retour au formulaire</a>";
} else {

    if (!is_dir('data')) {
        mkdir('data');
    }
    $f = fopen('data/notes.csv', 'a');                 
    fputcsv($f, [$nom, $info, $math], ';', '"', '');   
    fclose($f);                                        
    echo "<p style='color:green'>Enregistrement effectué.</p>";
}

// Q (5.1) : Que se passerait-il avec le mode "w" au lieu de "a" ?
// R : "w" vide le fichier à chaque ouverture : à chaque saisie, les anciennes
//     lignes seraient écrasées et on ne garderait que le dernier apprenant.

// Q : Pourquoi préférer POST à GET pour un mot de passe ?
// R : Avec POST, les données sont dans le corps de la requête et non dans l'URL :
//     elles n'apparaissent pas dans la barre d'adresse, l'historique, les favoris
//     ni les journaux du serveur. (POST seul ne chiffre pas : il faut HTTPS.)
//
// Q : Que contient $_REQUEST ?
// R : Un tableau qui regroupe le contenu de $_GET, $_POST et $_COOKIE.

include 'includes/pied_inc.php';