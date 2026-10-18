<?php
// Auteur : Tahiri Bayane
// Objectif : exporter les résultats en JSON et comparer avec serialize()
// Date : 18/10/2026

$resultats = [];
if (file_exists('data/notes.csv')) {
    $f = fopen('data/notes.csv', 'r');
    while (($ligne = fgetcsv($f, 0, ';', '"', '')) !== false) {
        if ($ligne === [null]) {
            continue;
        }
        $resultats[] = [
            "nom"     => $ligne[0],
            "info"    => (float) $ligne[1],
            "math"    => (float) $ligne[2],
            "moyenne" => ((float) $ligne[1] + (float) $ligne[2]) / 2
        ];
    }
    fclose($f);
}

$json = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data/notes.json', $json);

$relu = json_decode(file_get_contents('data/notes.json'), true);
echo "<h3>Données relues depuis notes.json (print_r)</h3><pre>";
print_r($relu);
echo "</pre>";
echo "<h3>serialize()</h3><pre>" . htmlspecialchars(serialize($resultats)) . "</pre>";
echo "<h3>json_encode()</h3><pre>" . htmlspecialchars($json) . "</pre>";

// Q : Lequel de ces formats est directement exploitable par une application JavaScript ?
// R : JSON. JavaScript le lit avec JSON.parse(), et c'est un format standard
//     indépendant du langage. serialize() produit un format propre à PHP,
//     lisible seulement avec unserialize().