<?php
// Auteur : Tahiri Bayane
// Objectif : traiter un formulaire envoyé en GET
// Date : 18/10/2026

$nom = htmlspecialchars($_GET['nom'] ?? '');
$prenom = htmlspecialchars($_GET['prenom'] ?? '');
$sexe = $_GET['sexe'] ?? 'M';

$civilite = ($sexe === 'F') ? "Madame" : "Monsieur";
echo "Bonjour $civilite $prenom $nom";

// Observation : après l'envoi, l'URL contient les données en clair :
// info.php?nom=...&prenom=...&sexe=...