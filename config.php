<?php
// Auteur : Tahiri Bayane
// Objectif : constantes de configuration de l'application
// Date : 18/10/2026

const ETABLISSEMENT = "FSSM"; 
define('NOTE_MIN', 0);                              
define('NOTE_MAX', 20);
define('SEUIL', 10);
function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}