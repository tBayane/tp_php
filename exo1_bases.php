<?php
// Auteur : Tahiri Bayane
// Objectif : bases PHP (variables, constantes, types, chaînes)
// Date : 18/10/2026

require 'config.php';

echo 'Hello PHP'; // commentaire sur une ligne avec //
# commentaire sur une ligne avec #
/* commentaire
   sur plusieurs lignes */
echo "<br>";

// $x       : VALIDE   (commence par une lettre)
// $_x      : VALIDE   (le _ est autorisé en première position)
// $2x      : INVALIDE (un nom ne peut pas commencer par un chiffre)
// $x-y     : INVALIDE (le tiret est lu comme l'opérateur moins : $x - y)
// $Prix_HT : VALIDE   (lettres, chiffres et _ sont autorisés)
// $prix ht : INVALIDE (l'espace n'est pas autorisé dans un nom)
// $état    : VALIDE   (PHP accepte les caractères accentués, octets 0x80 à 0xFF)

// déclaration des variables valides
$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "ok";

echo "<h3>Exercice 1.1</h3>";
echo "x = $x, _x = $_x, Prix_HT = $Prix_HT, état = $état<br>";

// $a et $A sont deux variables distinctes (PHP est sensible à la casse)
$a = 1;
$A = 2;
echo "a = $a et A = $A : deux variables différentes<br>";
var_dump($a === $A);
echo "<br>";

echo "<h3>Exercice 1.2</h3>";
echo ETABLISSEMENT, "<br>";
echo NOTE_MIN, "<br>";
echo NOTE_MAX, "<br>";
echo SEUIL, "<br>";

var_dump(defined('SEUIL'));    
echo "<br>";
var_dump(defined('INCONNUE')); 
echo "<br>";

// Q1 : Que se passe-t-il si on affiche une constante non définie ?
// R1 : En PHP 8, une erreur fatale "Undefined constant" est levée et le script
//      s'arrête. (En PHP 7, simple warning et la constante était traitée comme
//      la chaîne "INCONNUE".)
//
// Q2 : Différence entre const et define() ?
// R2 : const est résolu à la compilation : il doit être écrit au niveau global
//      (ou dans une classe), pas dans un if, une boucle ou une fonction.
//      define() est exécuté à l'exécution : on peut l'appeler dans une
//      condition ou avec un nom calculé dynamiquement.

echo "<h3>Exercice 1.3</h3>";
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo "Le prix TTC du produit est de $prix_ttc €.<br>";

echo "<h3>Exercice 1.4</h3>";

$test = 42;
$test = (string) $test;
var_dump($test);   
echo "<br>";
// Prédictions : 0 → false, 0.0 → false, "0" → false, "" → false,
//               "abc" → true, [] → false, null → false
echo "(bool) : ";
var_dump((bool) 0);
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);
echo "<br>";

// Prédictions : (int) 3.9 → 3 ; (int) "12abc" → 12 ; (float) "1.5e3" → 1500 ; (int) true → 1
echo "Conversions : ";
var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);
echo "<br>";

$dec = 255;       
$hex = 0xFF;      
$oct = 0377;      
$bin = 0b11111111; 
echo "Décimal : $dec | Hexa (0xFF) : $hex | Octal (0377) : $oct | Binaire (0b11111111) : $bin<br>";
echo "255 en hexa : " . dechex(255) . " | en octal : " . decoct(255) . " | en binaire : " . decbin(255) . "<br>";

echo "<h3>Exercice 1.5</h3>";
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo 'Voulez-vous supprimer C:\*.*?<br>';
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";
$s = trim("*Bonjour les développeurs*", "*");
echo "<br>$s<br><br>";
$lettres = preg_split('//u', $s, -1, PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($lettres); $i++) {
    echo $lettres[$i], "<br>";
}

echo "<br>Avec strlen() :<br>";
$mot = "Bonjour";
for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i], "<br>";
}