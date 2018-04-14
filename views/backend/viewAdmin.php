<!--Création d un chapitre-->
<?php isConnect() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require('templateAdmin.php'); ?>
    <title><?= $title ?></title>
    <link href=" public/css/styleAdmin.css" rel="stylesheet" />

</head>
<body>
    <div class="contener">
    <?php require ('templateDeconnexion.php'); ?>
        <h2>Editer un chapitre</h2>
        <div id="editeur">
            <form name="formulaire" id="formulaire" action="indexAdmin.php?action=adChapter" method="post">
                <div id="titreEditeur">
                    <label for="titre">Titre</label> <br /> <input required type="text" name="title" id="title" /><br /><br />
                </div>
                <div id="numeroChapitre">
                    <label for="chapter_number">Numero du chapitre</label> <br /> <input required type="text" name="chapter_number" id="chapter_number" /><br /><br />
                </div>
                <div id="editeurTinyMce">
                    <textarea id="texte" name="text" rows="25" ></textarea>
                </div>

            </form>
        </div>
        <div id="retourTB">
            <a href="indexAdmin.php">Retour au tableau de bord</a>
        </div>

    </div>
</body>
</html>