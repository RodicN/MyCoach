<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inscription.css">
    <title>Inscription</title>
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

    <!-- Formulaire d'inscription -->
    <h1>Inscription</h1>
    <form action="PHPinscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required>
        <br>
        <button type="submit" name="valider">S'inscrire</button>
    </form>

    <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>
</body>
</html>
