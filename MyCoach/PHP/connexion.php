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
    <?php
        include("PHPnavigation.php");
    ?>
    

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