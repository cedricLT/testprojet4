<h1>Tableau de bord</h1>
<div id="chapitres">
    <h2>Chapitres</h2>
    <ul>
        <?php
        while ($chapitre = $chapitres->fetch()) {
            ?>
        <li> <?= $chapitre['title'] ?> chapitre <?= $chapitre['chapter_number'] ?>
            <a href="indexAdmin.php?action=supprimer&id=<?= $chapitre['id'] ?>">Supprimer</a>
            <a href="indexAdmin.php?action=modifier&id=<?= $chapitre['id'] ?>">Modifier</a>

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

<div id="commentaires">
    <h2>Commentaire</h2>

</div>