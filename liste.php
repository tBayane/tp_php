<?php
// Auteur : Tahiri Bayane
// Objectif : lire data/notes.csv et afficher les résultats
// Date : 18/10/2026

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$fichier = 'data/notes.csv';

if (!file_exists($fichier)) {
    echo "<p>Aucune donnée : le fichier n'existe pas encore.</p>";
    include 'includes/pied_inc.php';
    exit;
}

$f = fopen($fichier, 'r');
if (!$f) {
    echo "<p style='color:red'>Impossible d'ouvrir le fichier.</p>";
    exit;
}

echo "<h3>Lecture avec fgetcsv()</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";

$totalMoyennes = 0;
$nb = 0;
while (($ligne = fgetcsv($f, 0, ';', '"', '')) !== false) {
    if ($ligne === [null]) {
        continue; 
    }
    [$nom, $info, $math] = $ligne;
    $moyenne = ($info + $math) / 2;
    $totalMoyennes += $moyenne;
    $nb++;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>$info</td><td>$math</td>";
    echo "<td>" . round($moyenne, 2) . "</td>";
    echo "<td>" . mention($moyenne) . "</td>";
    echo "</tr>";
}
echo "</table>";
fclose($f);

if ($nb > 0) {
    echo "<p><b>Moyenne générale de la classe : " . round($totalMoyennes / $nb, 2) . "</b></p>";
}

echo "<h3>Lecture avec fgets(), feof() et explode()</h3>";
$f = fopen($fichier, 'r');
while (!feof($f)) {
    $ligne = fgets($f);
    if ($ligne === false || trim($ligne) === '') {
        continue;
    }
    $champs = explode(';', trim($ligne));
    echo implode(" | ", $champs) . "<br>";
}
fclose($f);
include 'includes/pied_inc.php';