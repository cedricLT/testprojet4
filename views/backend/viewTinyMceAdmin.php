<!--modifier un chapitre-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('templateAdmin.php'); ?>

    <title><?= $title ?></title>

    <link href=" public/css/styleAdmin.css" rel="stylesheet"/>
</head>
<body>
    <div class="contener">

        <?php $modif = $modifChapitre->fetch()
        ?>
        <div class="navigation">
            <?php require 'templatePageAcueil.php'; ?>
            <?php require 'templateDeconnexion.php'; ?>
        </div>

        <div id="retourTB">
            <a href="indexAdmin.php">Retour au tableau de bord</a>
        </div>

        <h1>Modification du chapitre :<br/><?= $modif['title'] ?></h1>

        <form name="formulaire" id="formulaire" action="indexAdmin.php?action=nouvelModif&id=<?= $modif['id'] ?>"
              enctype="multipart/form-data" method="post">

            <div id="titreEditeur">
                <label for="titre">Titre</label> :<br/> <input required type="text" name="title" id="title"
                                                               value="<?= $modif['title'] ?>"/>
            </div>

            <br/><br/>

            <div id="numeroChapitre">
                <label for="chapter_number">Numero du chapitre</label> :<br/> <input required type="text"
                                                                                     name="chapter_number"
                                                                                     id="chapter_number"
                                                                                     value="<?= $modif['chapter_number'] ?>"/><br/><br/>
            </div>

            <div id="editeurTinyMce">
                <textarea required id="texte" name="text" rows="25"><?= $modif['text'] ?></textarea>
            </div>

            <div id="publication">
                <input type="submit" id="envoyer" value="Publier"/>
            </div>
        </form>


    </div>
</body>
</html>