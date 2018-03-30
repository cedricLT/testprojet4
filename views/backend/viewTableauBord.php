<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="../public/css/style.css" rel="stylesheet" />
    <title>Administrateur</title>
</head>
    <body>
        <div class="contener">
            <h1>Tableau de bord administrateur</h1>
            <div id="chapitres">
                <h2>Chapitres</h2>
                <ul>

                <?php while ($chapitre = $chapitres->fetch()) { ?>

                    <li>
                        <?= $chapitre['title'] ?> chapitre <?= $chapitre['chapter_number'] ?>
                        <a href="indexAdmin.php?action=supprimer&id=<?= $chapitre['id'] ?>">Supprimer</a>
                        <a href="indexAdmin.php?action=modifier&id=<?= $chapitre['id'] ?>">Modifier</a>
                        <a href="indexAdmin.php?action=voirCommentaire&id=<?= $chapitre['id'] ?>">Voir les commentaires</a>

                    </li>
                    <?php
                    }
                    $chapitres->closeCursor();
                    ?>
                </ul>

                <div id="creatChapitres">
                    <a href="indexAdmin.php?action=editeur">Créer un nouveau chapitres</a>
                </div>
            </div>
            <div id="commentaireSignalé">
                <h1>Commentaires signalé</h1>
                <div id="reportComment">
                    <?php
                    while ($donnees = $signalerCommentaire->fetch()){ ?>

                    <h3>
                    <?php echo htmlspecialchars($donnees['membrePseudo']); ?>
                    <em>le <?php echo $donnees['dates']; ?></em>
                    </h3>
                        <p>
                            <?php
                            // On affiche le contenu du commentaire
                            echo nl2br(htmlspecialchars($donnees['text']));
                            ?>

                        </p>
                        <a href="indexAdmin.php?action=deleteReport&id=<?= $donnees['id'] ?>">Supprimer</a>
                    <?php
                    }
                    $signalerCommentaire->closeCursor();
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>