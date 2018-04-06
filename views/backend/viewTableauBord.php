<!--page tableau de bord admin-->



<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('templateAdmin.php'); ?>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href=" public/css/styleAdmin.css" rel="stylesheet" />
</head>
    <body>
        <div class="contener">
            <?php require ('templateDeconnexion.php'); ?>
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

                            <a id="modif" href="indexAdmin.php?action=modifier&id=<?= $chapitre['id'] ?>">Modifier</a>
                            <a id="comments" href="indexAdmin.php?action=voirCommentaire&id=<?= $chapitre['id'] ?>">Voir les commentaires</a>
                            <br />
                            <a id="suppre" href="indexAdmin.php?action=supprimer&id=<?= $chapitre['id'] ?>">Supprimer</a>

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
                <h2>Commentaires signalé</h2>
                <div id="reportComment">
                    <?php
                    while ($donnees = $signalerCommentaire->fetch()){ ?>
                        <div id="signalement">

                            <p id="dates">Le :  <?php echo $donnees['dates']; ?></p>

                             <p id="pseudo"> Pseudo : <?php echo htmlspecialchars($donnees['membrePseudo']); ?></p>

                             <p id="text">Commentaire : <?php echo nl2br(htmlspecialchars($donnees['text']));// On affiche le contenu du commentaire ?></p>

                              <a id="supprime" href="indexAdmin.php?action=deleteReport&id=<?= $donnees['id'] ?>">Supprimer</a>
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


