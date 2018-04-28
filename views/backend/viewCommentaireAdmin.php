
<!-- page commentaire par chapitre -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('templateAdmin.php'); ?>
    <title><?= $title ?></title>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>
    <link href=" public/css/styleAdmin.css" rel="stylesheet" />

</head>
    <body>
        <div class="contener">

            <div class="navigation">
                <?php require 'templatePageAcueil.php'; ?>
                <?php require 'templateDeconnexion.php'; ?>
            </div>

            <div id="retourTB">
                <a href="indexAdmin.php">Retour au tableau de bord</a>
            </div>

            <?php  $chapitre = $chapitres ?>
            <div id="ancre"></div>
            <h2>Commentaire du chapitre <?= $chapitre['chapter_number'] ?> <br /><br /> "<?= $chapitre['title'] ?>"</h2>
            <br />

            <?php while ($donnees = $voirCommentAd->fetch()) { ?>

                <div class="news">
                    <h3>
                        <em>Pseudo : <?= htmlspecialchars($donnees['membrePseudo']); ?></em>
                        <br/>
                        <em>le <?php echo $donnees['dates_fr']; ?></em>
                    </h3>
                    <br />
                    <p id="commentaire">
                        <?php
                        // On affiche le contenu du commentaire
                        echo nl2br(htmlspecialchars($donnees['text']));
                        ?>
                    </p>
                   <!--<a id="suppre" href="indexAdmin.php?action=supprimComment&id=<?= $donnees['id'] ?>&idPost=<?= $donnees['id_chapitre'] ?>">Supprimer</a>-->
                    <p class="delete_btn">Supprimer </p>
                    <?php require 'templateDeletViewCommentaire.php'; ?>
                </div>
                <?php
            }// Fin de la boucle des commentaires
           $voirCommentAd->closeCursor();
            ?>

        </div>
    </body>
</html>


