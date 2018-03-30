<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href=" public/css/styleAdmin.css" rel="stylesheet" />
    <title>Administrateur</title>
</head>
    <body>
        <div class="contener">

            <h1>Tableau de bord administrateur</h1>

            <div id="chapitres">

                <h2>Chapitres</h2>

                <div id="creatChapitres">
                    <a id="nouvChap" href="indexAdmin.php?action=editeur">Créer un nouveau chapitres</a>
                </div>

                <ul id="blockCommentaires">

                <?php while ($chapitre = $chapitres->fetch()) { ?>

                    <li id="liens">
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
                    </li>
                <?php
                }
                $chapitres->closeCursor();
                ?>
                </ul>


            </div>
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


