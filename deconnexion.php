<?php
session_start();
// Auteur : Tahiri Bayane
// Objectif : fermer la session et rediriger vers la connexion
// Date : 18/10/2026

session_unset();    
session_destroy();  
header("Location: login.php");
exit;