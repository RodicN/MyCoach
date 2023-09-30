<?php
    session_start();
    if(!$_SESSION['idUtilisateur']){
        header('Location: connexion.php');
        exit;
    }
?>
<?php
    require("../PHP/connexionBdd.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/seance.css">
    <title>Séances</title>
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
                        echo '<a href="connexion.php">https://icones8.fr/icon/26216/d%C3%A9connexion</a>';
                    }
                ?>
            </div>
        </div>
    </nav>



    <h1>Séances</h1>
 
    <!-- Séances -->
    <section class="seances">
        <form method="post" action="">
            <select id="programmeSelect" name="selectionProgramme">
                <option value="*">--- Choisir un programme ---</option>
                <?php
                    $reqSQL = "SELECT DISTINCT idProgramme, libelle FROM programme";

                    $result = $connexion->query($reqSQL);
                    $ligne = $result->fetch();

                    while ($ligne != false) {
                        $libelle = $ligne['libelle'];
                        $idProgramme = $ligne['idProgramme'];

                        echo "<option value='$idProgramme'>$libelle</option>";

                        $ligne = $result->fetch();
                    }
                ?>
            </select>
            <input type="submit" value="Afficher">
        </form>

        <?php
            // Vérifier si le formulaire a été soumis
            if (isset($_POST['selectionProgramme'])) {
                // Récupérer l'identifiant du programme sélectionné depuis le formulaire
                $selectionProgrammeId = $_POST['selectionProgramme'];

                // Requête SQL pour récupérer les séances du programme sélectionné
                $reqSQL = "SELECT libelle, jour, niveau, adresse, CP, Ville, Salle, heureDebut, heureFin 
                        FROM seance, programme, niveau, lieu, jours
                        WHERE seance.idProgramme = programme.idProgramme
                        AND seance.idNiveau = niveau.idNiveau
                        AND seance.idLieu = lieu.idLieu
                        AND seance.idJours = jours.idJours
                        AND seance.idProgramme = $selectionProgrammeId
                        ORDER BY jour ASC";

                // Exécution de la requête SQL
                $result = $connexion->query($reqSQL);

                // Vérifier si des séances ont été trouvées
                if ($result && $result->rowCount() > 0) {
                    while ($seance = $result->fetch()) {
                        // Affichage des détails de chaque séance
                        echo '<div class="seance">';
                        echo '<h2>' . $seance['jour'] . '</h2>';
                        echo '<p><strong>Programme :</strong> ' . $seance['libelle'] . '</p>';
                        echo '<p><strong>Heure :</strong> ' . $seance['heureDebut'] . ' - ' . $seance['heureFin'] . '</p>';
                        echo '<p><strong>Lieu :</strong> ' . $seance['adresse'] . ', ' . $seance['CP'] . ' ' . $seance['Ville'] . '</p>';
                        echo '<p><strong>Salle :</strong> ' . $seance['Salle'] . '</p>';
                        echo '<p><strong>Niveau :</strong> ' . $seance['niveau'] . '</p>';
                        echo '</div>';
                    }
                } else {
                    // Aucune séance disponible pour le programme sélectionné
                    echo '<p>Aucune séance disponible pour le programme sélectionné.</p>';
                }
            }
        ?>
    </section>

</body>
</html>
