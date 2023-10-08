<?php
    session_start();

    require("../PHP/connexionBdd.php");

    if(isset($_POST['valider'])){
        $nom = htmlspecialchars($_POST['nom']); // htmlspecialchars empêche l'injection de code html
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $motDePasse = md5($_POST['motdepasse']); // md5 : hachage du mot de passe

        $reqSQL = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, email, motDePasse) VALUES (?, ?, ?, ?)");
        $reqSQL->execute(array($nom, $prenom, $email, $motDePasse));

        $reqIDUtilisateur = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ? AND motDePasse = ?");
        $reqIDUtilisateur->execute(array($email, $motDePasse));

        if($reqIDUtilisateur->rowCount() > 0){
            $_SESSION['email'] = $email;
            $_SESSION['motDePasse'] = $motDePasse;
            
            // Utiliser fetch pour obtenir les résultats de la requête
            $ligne = $reqIDUtilisateur->fetch();
            $_SESSION['idUtilisateur'] = $ligne['idUtilisateur'];
        }

        // Test affichage de l'ID utilisateur après l'inscription
        // echo $_SESSION['idUtilisateur'];

        // Rediriger vers la page de connexion après l'inscription
        header("Location: connexion.php");
        exit; //quitter le script après la redirection
    }
?>