<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>
    <link rel="stylesheet" href="../CSS/navigation.css">
</head>
<body>
    <nav>
        <div class="nav-left"></div>
        <div class="nav-center">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="seance.php">Séances</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="utilisateur-info">
                <?php
                    if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                        // Si l'utilisateur est connecté, affiche le bouton de déconnexion
                        echo '<span>' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</span>';
                        echo '<a href="PHPdeconnexion.php"><button>Se déconnecter</button></a>';
                    } else {
                        // Sinon, affiche le lien de connexion
                        echo '<a href="connexion.php">Connexion</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
</body>
</html>
