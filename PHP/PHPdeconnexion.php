<?php
    session_start();
    session_destroy(); // Détruire la session existante
    header("Location: connexion.php"); // Rediriger vers la page de connexion
    exit; //quitter le script après la redirection
?>