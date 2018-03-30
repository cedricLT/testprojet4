<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="../public/css/style.css" rel="stylesheet" />
    <title>Chapitre <?= $chapitre['chapter_number'] ?> un billet pour l'alaska</title>
</head>
    <body>
        <h1>Chapitre <?= $chapitre['chapter_number'] ?> </h1>
        <h2><?= $chapitre['title'] ?></h2>

        <p><?= $chapitre['text'] ?> </p>



    <form action="index.php?action=adComment&id=<?= $chapitre['id'] ?>" method="post">
        <p>
            <label for="pseudo">Pseudo</label> : <input type="text" name="membrePseudo" id="membrePseudo" /><br />
            <label for="message">Commentaire</label> :  <input type="text" name="text" id="message" /><br />

            <input type="submit" value="Envoyer" />
        </p>
    </form>

        <?php

        while ($donnees = $commentaires->fetch())
        {
            ?>

            <div class="news">
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
                <a href="index.php?action=signaler&id=<?= $donnees['id'] ?>&idPost=<?= $donnees['id_chapitre'] ?>">Signaler le commentaire</a>
            </div>
            <?php
        }// Fin de la boucle des billets
        $commentaires->closeCursor();
        ?>

        <a href="index.php">Retour accueil</a>

    </body>
</html>