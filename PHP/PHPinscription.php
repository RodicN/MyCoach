<?php
    // Démarrage de la session
    session_start();

    // Connexion à la base de données
    require("../PHP/connexionBdd.php");

    // Vérification si le formulaire d'inscription a été soumis
    if(isset($_POST['valider'])){
        // Récupération des données depuis le formulaire en utilisant htmlspecialchars pour prévenir l'injection de code HTML
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        
        // Hachage du mot de passe en utilisant md5
        $motDePasse = md5($_POST['motdepasse']);

        // Préparation d'une requête SQL pour insérer un nouvel utilisateur dans la base de données
        $reqSQL = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, email, motDePasse) VALUES (?, ?, ?, ?)");
        $reqSQL->execute(array($nom, $prenom, $email, $motDePasse));

        // Préparation d'une requête SQL pour récupérer l'ID de l'utilisateur nouvellement inscrit
        $reqIDUtilisateur = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ? AND motDePasse = ?");
        $reqIDUtilisateur->execute(array($email, $motDePasse));

        // Vérification si des résultats ont été trouvés
        if($reqIDUtilisateur->rowCount() > 0){
            // Initialisation de variables de session avec l'email, le mot de passe et l'ID de l'utilisateur
            $_SESSION['email'] = $email;
            $_SESSION['motDePasse'] = $motDePasse;
            
            // Utilisation de fetch pour obtenir les résultats de la requête
            $ligne = $reqIDUtilisateur->fetch();
            $_SESSION['idUtilisateur'] = $ligne['idUtilisateur'];
        }

        // Test : affichage de l'ID utilisateur après l'inscription
        // echo $_SESSION['idUtilisateur'];

        // Redirection vers la page de connexion après l'inscription
        header("Location: connexion.php");
        
        // Quitter le script après la redirection
        exit;
    }
?>