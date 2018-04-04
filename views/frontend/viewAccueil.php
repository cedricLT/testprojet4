<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('templateUser.php'); ?>
        <title><?= $title ?></title>

    </head>
    <body>
        <div class="contener">
            <header>
                <div class="contener1">
                    <div class="fixed">
                        <div id="jeanF">
                            <p>Jean Forteroche</p>
                        </div>
                        <div id="Accueil"></div>
                       <?php require ('templateMenuUser.php') ?>

                        <div id="connexion" class="">
                            <div class="userConnexion">
                                <ul>
                                    <li><input type="text" name="pseudo" /></li>
                                    <li><input type="password" name="mot_de_passe" /></li>
                                    <li><input id="subBtn" type="submit" value="Valider" /></li>
                                    <li><p><a href="inscription.php">Insciption ici</a></p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h1 id="titre1">"Un billet pour l'Alaska"</h1>
                </div>
            </header>
            <div class="contener2">
                <h2 id="chapitreTitre">Chapitres</h2>
                <div id="menuChapitre">
                    <ul>
                        <?php
                        while ($chapitre = $chapitres->fetch()){
                            ?>
                            <li><h3><a href="index.php?action=post&id=<?= $chapitre['id'] ?>">Chapitre <?= $chapitre['chapter_number'] ?></h3><?= $chapitre['title'] ?></a></li>
                        <?php
                        }
                        $chapitres->closeCursor();
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <script src="js/identification.js"></script>
    </body>
</html>