<?php
    session_start();

    require("../PHP/connexionBdd.php");

    if(isset($_POST['valider'])){
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = md5($_POST['motdepasse']);

        $reqSQL = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ? AND motDePasse = ?");
        $reqSQL->execute(array($email, $motdepasse));

        if($reqSQL->rowCount() > 0){
            $ligne = $reqSQL->fetch();
            $_SESSION['email'] = $email;
            $_SESSION['motDePasse'] = $motdepasse;
            $_SESSION['idUtilisateur'] = $ligne['idUtilisateur'];
            $_SESSION['nom'] = $ligne['nom'];
            $_SESSION['prenom'] = $ligne['prenom'];

            header("Location: index.php");
            exit; //quitte le script après la redirection
        } else {
            echo "Votre email ou mot de passe est incorrect.";
            header("Location: connexion.php");
            exit; //quitte le script après la redirection
        }
    }
?>
