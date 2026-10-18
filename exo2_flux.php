<?php
// Auteur : Tahiri Bayane
// Objectif : structures de contrôle (if, switch, boucles)
// Date : 18/10/2026

require 'config.php';

echo "<h3>Exercice 2.1</h3>";
$tests = [18, 16, 15, 14, 13, 12, 10, 9, 5];
foreach ($tests as $n) {
    echo "Note $n : " . mention($n) . "<br>";
}

echo "<h3>Exercice 2.2</h3>";
$mois = (int) date("m");

switch ($mois) {
    case 1:  $nom = "Janvier";   break;
    case 2:  $nom = "Février";   break;
    case 3:  $nom = "Mars";      break;
    case 4:  $nom = "Avril";     break;
    case 5:  $nom = "Mai";       break;
    case 6:  $nom = "Juin";      break;
    case 7:  $nom = "Juillet";   break;
    case 8:  $nom = "Août";      break;
    case 9:  $nom = "Septembre"; break;
    case 10: $nom = "Octobre";   break;
    case 11: $nom = "Novembre";  break;
    case 12: $nom = "Décembre";  break;
    default: $nom = "Mois inconnu";
}
echo "Mois courant : $nom<br>";

// Q : Que se passe-t-il si on oublie un break dans un case ?
// R : L'exécution continue dans le case suivant (effet "fall-through"),
//     sans tester sa condition, jusqu'au prochain break ou à la fin du switch.
//     Par exemple, sans break après case 10, $nom deviendrait "Novembre",
//     puis "Décembre".

echo "<h3>Exercice 2.3</h3>";
echo "<b>1. Triangle</b><br>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br><b>2. while (pas de 2)</b><br>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}
echo "<br>";
echo "<br><b>3. for + continue (nombres pairs)</b><br>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue; 
    }
    echo "$i ";
}
echo "<br>";
echo "<br><b>4. while + switch + break 2</b><br>";
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;              
        case 10:
            echo "At 10; quitting<br>";
            break 2;            
        default:
            break;
    }
    $i++;
}

echo "<br><b>5. do-while</b><br>";
$i = 0;
do {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
} while ($i <= 20);
echo "<br>";

// Différence essentielle entre while et do-while :
// - while teste la condition AVANT d'exécuter le corps : si elle est fausse
//   dès le départ, le corps ne s'exécute jamais.
// - do-while teste la condition APRÈS : le corps s'exécute AU MOINS UNE FOIS.