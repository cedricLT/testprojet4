<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('templateAdmin.php'); ?>
    <meta charset="UTF-8">
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
            <h1>Tableau de bord administrateur</h1>


            <div id="chapitres">

                <h2>Chapitres</h2>

                <div id="creatChapitres">

                    <a id="nouvChap" href="indexAdmin.php?action=editeur">Créer un nouveau chapitres</a>
                </div>

                <div id="blockCommentaires">

                <?php while ($chapitre = $chapitres->fetch()) { ?>

                    <div id="liens">
                        <div id="titre">
                            chapitre n° <?= $chapitre['chapter_number'] ?><br />
                            <?= $chapitre['title'] ?><br />
                        </div>

                        <div class="lien">
                            <a id="voirChapter" href="indexAdmin.php?action=voirChapter&id=<?= $chapitre['id'] ?>">Voir le chapitre</a>
                            <a id="modif" href="indexAdmin.php?action=modifier&id=<?= $chapitre['id'] ?>">Modifier</a>
                            <a id="comments" href="indexAdmin.php?action=voirCommentaire&id=<?= $chapitre['id'] ?>">Voir les commentaires</a>
                            <br />
                            <!--<a id="suppre" href="indexAdmin.php?action=supprimer&id=<?= $chapitre['id'] ?>">Supprimer</a>-->
                            <p class="delete_btn">Supprimer </p>
                            <?php require 'templateDeletChapter.php'?>

                        </div>
                    </div>
                <?php
                }
                $chapitres->closeCursor();
                ?>
                </div>
            </div>
            <hr/>
            <div id="commentaireSignalé">
                <h2>Commentaires signalés</h2>
                <div id="reportComment">
                    <?php
                    while ($donnees = $signalerCommentaire->fetch()){ ?>

                        <div class="signalement">

                            <p class="dates">Le :  <?php echo $donnees['dates_fr']; ?></p>

                             <p class="pseudo"> Pseudo : <?php echo htmlspecialchars($donnees['membrePseudo']); ?></p>

                             <p class="text">Commentaire : <?php echo nl2br(htmlspecialchars($donnees['text']));// On affiche le contenu du commentaire ?></p>

                            <p  class="delete_btn">Supprimer </p>
                            <?php require 'templateDeletCommet.php';?>
                        </div>
                    <?php
                    }
                    $signalerCommentaire->closeCursor();
                    ?>
                </div>

            </div>
        </div>

    </body>
</html>


