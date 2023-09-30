<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <div class="nav-left"></div>     <!-- Espace vide au centre -->
        <div class="nav-center">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="seance.php">Séances</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="utilisateur-info">
                <?php
                    session_start();
                    if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                        // Si l'utilisateur est connecté, affiche le bouton de déconnexion
                        echo '<a href="PHPdeconnexion.php"><button>Se déconnecter</button></a>';
                        echo '<span>' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</span>';
                    } else {
                        // Sinon, affiche le lien de connexion
                        echo '<a href="connexion.php">Connexion</a>';
                    }
                ?>
            </div>
        </div>
    </nav>

    <!-- Connexion -->
    <h1>Connexion</h1>
    <form action="PHPauthentification.php" method="POST">
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required autocomplete="off">
        <br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required autocomplete="off">
        <br>
        <button type="submit" name="valider">Se connecter</button>
    </form>

    <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous ici.</a></p>
</body>
</html>