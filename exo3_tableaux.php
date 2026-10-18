<?php
// Auteur : Tahiri Bayane
// Objectif : tableaux indexés et associatifs, statistiques, tris
// Date : 18/10/2026

require 'config.php';
   include 'includes/entete_inc.php';
   include 'includes/menu_inc.php';
echo "<h3>Exercice 3.1</h3>";
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["Algorithmique", "Base de données", "Programmation web"];

echo "<b>Avec foreach :</b><br>";
foreach ($modules as $module) {
    echo "$module<br>";
}

echo "<br><b>Avec les indices :</b><br>";
for ($i = 0; $i < count($modules); $i++) {
    echo "Module $i : $modules[$i]<br>";
}

echo "<h3>Exercice 3.2</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? " style='color:red'" : "";
    echo "<tr$style>";
    echo "<td>$nom</td><td>$note</td><td>" . mention($note) . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<h3>Exercice 3.3</h3>";

$somme = 0;
$nb = 0;
$meilleure = NOTE_MIN;  
$faible = NOTE_MAX;    
foreach ($notes as $note) {
    $somme += $note;
    $nb++;
    if ($note > $meilleure) {
        $meilleure = $note;
    }
    if ($note < $faible) {
        $faible = $note;
    }
}
$moyenne = $somme / $nb;
echo "<b>Avec une boucle :</b> somme = $somme, moyenne = " . round($moyenne, 2)
   . ", meilleure note = $meilleure, plus faible note = $faible<br>";

echo "<b>Avec les fonctions :</b> somme = " . array_sum($notes)
   . ", moyenne = " . round(array_sum($notes) / count($notes), 2)
   . ", meilleure note = " . max($notes)
   . ", plus faible note = " . min($notes) . "<br>";

$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}
echo "<br><b>Effectifs par mention :</b><br>";
foreach ($effectifs as $m => $effectif) {
    echo "$m : $effectif<br>";
}

echo "<h3>Exercice 3.4</h3>";

function afficher($tab) {
    foreach ($tab as $cle => $valeur) {
        echo "$cle : $valeur<br>";
    }
}

$t = $notes;
ksort($t);
echo "<b>Noms croissants (ksort)</b><br>";
afficher($t);

$t = $notes;
arsort($t);
echo "<br><b>Notes décroissantes (arsort)</b><br>";
afficher($t);

$t = $notes;
krsort($t);
echo "<br><b>Noms décroissants (krsort)</b><br>";
afficher($t);

$t = $notes;
asort($t);
echo "<br><b>Notes croissantes (asort)</b><br>";
afficher($t);

// Q : Quelle fonction de tri utiliser sur un tableau indexé comme $modules ?
// R : sort() (ordre croissant) ou rsort() (ordre décroissant). Elles trient
//     par valeur et réindexent le tableau. ksort/asort servent aux tableaux
//     associatifs : elles conservent le lien clé => valeur.
$m = $modules;
sort($m);
echo "<br><b>Modules triés (sort)</b><br>";
afficher($m);

echo "<h3>Exercice 3.5</h3>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<b>\$a + \$b :</b> ";
print_r($a + $b);
echo "<br><b>\$a == \$b :</b> ";
var_dump($a == $b);
echo "<br><b>\$a === \$b :</b> ";
var_dump($a === $b);

// Prédictions et explications :
// $a + $b  : union. On garde les éléments de $a, et on ajoute ceux de $b dont la
//            clé n'existe pas dans $a. Ici toutes les clés existent déjà, donc
//            le résultat est ["x" => 1, "y" => 2].
// $a == $b : true, car les deux tableaux ont les mêmes paires clé/valeur,
//            quel que soit l'ordre.
// $a === $b: false, car === exige en plus le même ORDRE des éléments (et les
//            mêmes types). Ici x et y ne sont pas dans le même ordre.
include 'includes/pied_inc.php';
// Expérience 1 : include d'un fichier inexistant → simple Warning, le script
//   CONTINUE de s'exécuter. require d'un fichier inexistant → Fatal error,
//   le script S'ARRÊTE immédiatement.
// Expérience 2 : include 'includes/menu_inc.php' deux fois → le menu s'affiche
//   deux fois. include_once → le menu ne s'affiche qu'une seule fois (les
//   inclusions suivantes du même fichier sont ignorées).