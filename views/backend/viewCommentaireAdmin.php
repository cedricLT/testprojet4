
<!-- page commentaire par chapitre -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('templateAdmin.php'); ?>
    <title><?= $title ?></title>
    <link href=" public/css/styleAdmin.css" rel="stylesheet" />

</head>
    <body>
        <div class="contener">

            <div class="navigation">
                <?php require 'templatePageAcueil.php'; ?>
                <?php require 'templateDeconnexion.php'; ?>
            </div>

            <?php  $chapitre = $chapitres ?>

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
                   <a id="suppre" href="indexAdmin.php?action=supprimComment&id=<?= $donnees['id'] ?>&idPost=<?= $donnees['id_chapitre'] ?>">Supprimer</a>
                </div>
                <?php
            }// Fin de la boucle des commentaires
           $voirCommentAd->closeCursor();
            ?>
            <div id="retourTB">
                <a href="indexAdmin.php">Retour au tableau de bord</a>
            </div>
        </div>
    </body>
</html>


