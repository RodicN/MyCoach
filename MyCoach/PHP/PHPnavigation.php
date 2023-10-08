<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>
    <link rel="stylesheet" href="../CSS/navigation.css">
</head>
<body>
    
</body>
</html>

<?php
    echo '<nav>';
        echo '<div class="nav-left"></div>'; 
        echo '<div class="nav-center">';
            echo '<ul>';
                echo '<li><a href="index.php">Accueil</a></li>';
                echo '<li><a href="seance.php">Séances</a></li>';
            echo '</ul>';
        echo '</div>';
        echo '<div class="nav-right">';
            echo '<div class="utilisateur-info">';
                if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                    // Si l'utilisateur est connecté, affiche le bouton de déconnexion
                    echo '<a href="PHPdeconnexion.php"><button>Se déconnecter</button></a>';
                    echo '<span>' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</span>';
                } else {
                    // Sinon, affiche le lien de connexion
                    echo '<a href="connexion.php">Connexion</a>';
                }
            echo '</div>';
        echo '</div>';
    echo '</nav>';
?>