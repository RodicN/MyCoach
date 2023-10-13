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
    <?php
        include("PHPnavigation.php");
    ?>
    
    <!-- Séances -->
    <h1>Séances</h1>
    <section class="seances">
        <form method="post" action="">
            <select id="programmeSelect" name="selectionProgramme">
                <option value="*">--- Choisir un programme ---</option>
                <option value="all">Voir toutes les séances</option>
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
                // Récupérer la valeur sélectionnée dans le menu déroulant
                $selectionProgramme = $_POST['selectionProgramme'];

                if ($selectionProgramme === 'all') {
                    // Si "Voir toutes les séances" est sélectionné, récupérer toutes les séances
                    $reqSQL = "SELECT libelle, jour, niveau, adresse, CP, Ville, Salle, heureDebut, heureFin 
                                FROM seance, programme, niveau, lieu, jours
                                WHERE seance.idProgramme = programme.idProgramme
                                AND seance.idNiveau = niveau.idNiveau
                                AND seance.idLieu = lieu.idLieu
                                AND seance.idJours = jours.idJours
                                ORDER BY jour ASC";
                } else {
                    // Sinon, récupérer les séances du programme sélectionné
                    $reqSQL = "SELECT libelle, jour, niveau, adresse, CP, Ville, Salle, heureDebut, heureFin 
                                FROM seance, programme, niveau, lieu, jours
                                WHERE seance.idProgramme = programme.idProgramme
                                AND seance.idNiveau = niveau.idNiveau
                                AND seance.idLieu = lieu.idLieu
                                AND seance.idJours = jours.idJours
                                AND seance.idProgramme = $selectionProgramme
                                ORDER BY jour ASC";
                }

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
