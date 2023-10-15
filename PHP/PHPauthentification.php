<?php
    session_start();

    require("../PHP/connexionBdd.php");

    // Vérifie si le formulaire de connexion a été soumis
    if(isset($_POST['valider'])){
        $email = htmlspecialchars($_POST['email']); // Évite l'injection de code HTML en convertissant les caractères spéciaux
        $motdepasse = md5($_POST['motdepasse']); // Hash le mot de passe à l'aide de l'algorithme MD5

        // Prépare une requête SQL pour vérifier les informations de connexion
        $reqSQL = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ? AND motDePasse = ?");
        $reqSQL->execute(array($email, $motdepasse));

        // Vérifie si une ligne correspondante a été trouvée dans la base de données
        if($reqSQL->rowCount() > 0){
            $ligne = $reqSQL->fetch();
            
            // Initialise les sessions pour stocker les informations de l'utilisateur
            $_SESSION['email'] = $email;
            $_SESSION['motDePasse'] = $motdepasse;
            $_SESSION['idUtilisateur'] = $ligne['idUtilisateur'];
            $_SESSION['nom'] = $ligne['nom'];
            $_SESSION['prenom'] = $ligne['prenom'];

            // Redirige l'utilisateur vers la page d'accueil
            header("Location: index.php");
            exit; // Quitte le script après la redirection
        } else {
            // Affiche un message d'erreur si l'email ou le mot de passe sont incorrects
            echo "Votre email ou mot de passe est incorrect.";
            header("Location: connexion.php");
            exit; // Quitte le script après la redirection
        }
    }
?>