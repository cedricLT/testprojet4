<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Billet pour l'Alaska</title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/animate.css">
    </head>
    <body>
        <div class="contener">
            <header>
                <div class="contener1">
                    <div class="fixed">
                        <div id="jeanF">
                            <p>Jean Forteroche</p>
                        </div>
                        <div id="menu1">
                            <ul>
                                <li id="menu1Article1"><a href="#chapitreTitre">Chapitres</a></li>
                                <li id="menu1Présent"><a href="#">présentation</a></li>
                                <li id="menu1Inscriptionl"><a href="#">Inscription</a></li>
                                <li id="menu1Connexion1"><a href="#">Connexion</a></li>
                            </ul>
                        </div>

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