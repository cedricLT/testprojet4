<div id="commentaires">

    <?php  $chapitre = $chapitres ?>
        <h2>Commentaire du chapitre <?= $chapitre['chapter_number'] ?>  "<?= $chapitre['title'] ?>"</h2>



   <?php while ($donnees = $voirCommentAd->fetch()) { ?>

        <div class="news">
            <h3>
                <?= $donnees['id_chapitre'] ?>
                <em>Pseudo : <?= htmlspecialchars($donnees['membrePseudo']); ?></em>
                <br/>
                <em>le <?php echo $donnees['dates']; ?></em>
            </h3>
            <p>
                <?php
                // On affiche le contenu du commentaire
                echo nl2br(htmlspecialchars($donnees['text']));
                ?>
            </p>
           <a href="indexAdmin.php?action=supprimComment&id=<?= $donnees['id'] ?>&idPost=<?= $donnees['id_chapitre'] ?>">Supprimer</a>
        </div>
        <?php

    }// Fin de la boucle des commentaires
   $voirCommentAd->closeCursor();
    ?>
    <a href="indexAdmin.php">Retour au tableau de bord</a>

</div>


