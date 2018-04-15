
<!DOCTYPE html>
<html lang="fr">
<head>

    <?php require'templateUser.php'; ?>
    <title><?= $title ?></title>
    <title>Chapitre <?=  htmlspecialchars($chapitre['chapter_number']) ?> un billet pour l'alaska</title>
</head>

<body>
    <div class="contenerChapitre">
        <div class="contener2Chapitre">
            <img src="<?= $chapitre['image'] ?>" alt="">

            <h1>Chapitre <?=  $chapitre['chapter_number'] ?></h1>
            <h2><?=  $chapitre['title'] ?></h2>
            <div id="text"><?=  $chapitre['text'] ?></div>
        </div>

        <div class="contener3Chapitre">
            <div class="envoiCom">
                <h4>Ecrire un commentaire :</h4>
                <form action="index.php?action=adComment&id=<?=  htmlspecialchars($chapitre['id']) ?>" method="post">
                    <ul>
                        <li><div class="pseudo"><label for="pseudo">Pseudo :</label>  <input required type="text" name="membrePseudo" id="membrePseudo" /></div></li><br />
                        <li><div class="message"><label for="message">Commentaire :</label>   <input required type="text" name="text" id="message" /></div></li><br />

                        <li><input type="submit" id="envoyer" value="Envoyer" /></li>
                    </ul>
                </form>
            </div>
            <?php

            while ($donnees = $commentaires->fetch())
            {
                ?>
                <div class="comment">
                    <div class="news">
                        <h3>
                            <?php echo htmlspecialchars($donnees['membrePseudo']); ?>
                            <em>le <?php echo $donnees['dates_fr']; ?></em>
                        </h3>

                        <p>
                            <?php
                            // On affiche le contenu du commentaire
                            echo nl2br(htmlspecialchars($donnees['text']));
                            ?>

                        </p>
                        <div id="signalCom">
                            <a  href="index.php?action=signaler&id=<?= $donnees['id'] ?>&idPost=<?= $donnees['id_chapitre'] ?>">Signaler le commentaire</a>
                        </div>
                    </div>
                </div>
                <?php
            }// Fin de la boucle des billets
            $commentaires->closeCursor();
            ?>

         </div>
        <div class="retour">
            <a href="index.php">Retour accueil</a>
        </div>
    </div>
    <?php require'templateFooter.php'; ?>
</body>
</html>