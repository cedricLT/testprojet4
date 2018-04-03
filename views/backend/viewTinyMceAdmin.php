<!--modifier un chapitre-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php require('templateAdmin.php'); ?>
        <title><?= $title ?></title>

        <link href=" public/css/styleAdmin.css" rel="stylesheet" />
    </head>
    <body>

        <?php $modif =  $modifChapitre->fetch()
        ?>

        <h1>Modification du chapitre :<br /><?= $modif['title'] ?></h1>

        <form name="formulaire" id="formulaire" action="indexAdmin.php?action=nouvelModif&id=<?= $modif['id'] ?>" method="post">
            <div id="titreEditeur">
                <label for="titre">Titre</label> :<br /> <input type="text" name="title" id="title" value="<?=  $modif['title'] ?>"/>
            </div>

            <br/><br/>

            <div id="numeroChapitre">
                <label for="chapter_number">Numero du chapitre</label> :<br /> <input type="text" name="chapter_number" id="chapter_number" value="<?= $modif['chapter_number'] ?>"/><br/><br/>
            </div>

            <div id="editeurTinyMce">
                <textarea id="texte" name="text" rows="25"><?= $modif['text'] ?></textarea>
            </div>

        </form>

        <div id="retourTB">
            <a href="indexAdmin.php">Retour au tableau de bord</a>
        </div>

    </body>
</html>