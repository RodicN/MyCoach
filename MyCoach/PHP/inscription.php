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
    <?php
        include("PHPnavigation.php");
    ?>

    <!-- Formulaire d'inscription -->
    <h1>Inscription</h1>
    <form action="PHPinscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required autocomplete="off">
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required autocomplete="off">
        <br>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required autocomplete="off">
        <br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required autocomplete="off">
        <br>
        <button type="submit" name="valider">S'inscrire</button>
    </form>
    <!-- Lien vers la page de connexion -->
    <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>
    
</body>
</html>
