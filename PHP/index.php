<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCoach</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <!-- Header -->
    <header>
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
                            echo '<a href="PHPdeconnexion.php"><button class="bouton-deconnexion">Se déconnecter</button></a>';
                            echo '<span>' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . '</span>';
                        } else {
                            // Sinon, affiche le lien de connexion
                            echo '<a href="connexion.php">Connexion</a>';
                        }
                    ?>
                </div>
            </div>
        </nav>

        
        <h1>MyCoach</h1>
        <div class="header-content">
            <div class="header-text">
                <p>Mark Dupont <br> - <br> Coach sportif</p>
            </div>
            <div class="header-image">
                <img src="../images/image-header.jpeg" alt="MyCoach Logo">
            </div>
        </div>
    </header>

    <!-- Présentation -->
    <section class="presentation" id="presentation">
        <h2>Mark Dupont</h2>

        <div class="texte-et-image">
            <img src="../images/coach.jpeg" alt="Mark Dupont">
            <div class="texte">
                <h3>A Propos de Moi</h3>
                <p>Je suis passionné par la santé, la forme physique et le bien-être depuis aussi longtemps que je m'en souvienne. Mon engagement envers l'amélioration de la vie des autres par le biais de la remise en forme m'a conduit à devenir un coach sportif certifié.</p>
                
                <h3>Expérience</h3>
                <p>J'ai 5 ans d'expérience dans l'industrie du fitness. J'ai eu le privilège de travailler avec des personnes de tous âges et de tous niveaux de forme physique. Mon objectif principal est d'aider mes clients à atteindre leurs objectifs personnels tout en adoptant un mode de vie sain et actif.</p>
                
                <h3>Philosophie d'Entraînement</h3>
                <p>Je crois fermement en l'approche holistique de la santé. Mon entraînement ne se limite pas aux séances en salle de sport, mais englobe également la nutrition, la gestion du stress et le soutien mental. Mon approche vise à créer un équilibre durable pour une vie saine.</p>
                
                <h3>Mission</h3>
                <p>Ma mission est d'aider mes clients à dépasser leurs limites, à surmonter les obstacles et à atteindre des niveaux de forme physique qu'ils n'auraient jamais crus possibles. Mon succès réside dans leur succès.</p>
            </div>
        </div>
    </section>

    <!-- Programmes -->
    <section class="lesProgrammes" id="lesProgrammes">
        <h2>Programmes</h2>

        <div class="activites">
            <div class="programme">
                <h3>Renforcement musculaire</h3>
                <p>Notre programme de renforcement musculaire est conçu pour vous aider à développer une force optimale. Grâce à des exercices ciblés, vous renforcerez vos muscles, augmenterez votre endurance et améliorerez votre forme physique globale.</p>
            </div>

            <div class="programme">
                <h3>Perte de poids</h3>
                <p>Notre programme de perte de poids vous guidera dans votre voyage pour atteindre un poids santé. Nous vous fournirons des conseils nutritionnels et des séances d'entraînement efficaces pour perdre du poids de manière durable.</p>
            </div>

            <div class="programme">
                <h3>Remise en forme</h3>
                <p>Vous cherchez à améliorer votre condition physique générale ? Notre programme de remise en forme est conçu pour vous aider à augmenter votre niveau d'activité physique, à renforcer votre endurance et à vous sentir plus énergique au quotidien.</p>
            </div>

            <div class="programme">
                <h3>Relaxation</h3>
                <p>La relaxation est essentielle pour une vie équilibrée. Notre programme de relaxation vous enseignera des techniques de gestion du stress, de méditation et de respiration pour vous aider à atteindre un état de calme et de bien-être.</p>
            </div>

            <div class="programme">
                <h3>Préparation physique</h3>
                <p>Si vous avez des objectifs spécifiques en vue, comme une compétition sportive, notre programme de préparation physique vous préparera à atteindre votre pic de performance. Nous adapterons l'entraînement pour répondre à vos besoins.</p>
            </div>

            <div class="programme">
                <h3>Étirements et assouplissements</h3>
                <p>La flexibilité est essentielle pour éviter les blessures et améliorer votre mobilité. Notre programme d'étirements et d'assouplissements vous aidera à maintenir des muscles souples et à prévenir les tensions.</p>
            </div>
        </div>
    </section>

</body>
</html>
