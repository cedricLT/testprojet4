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
                       <?php require 'templateMenuUser.php' ?>
                    </div>
                    <h1 id="titre1">"Un billet pour l'Alaska"</h1>
                </div>
            </header>
            <div class="contener2">
                <div id="presentationJf"></div>
                <h2>Qui suis je ?</h2>
                <div id="presentationText">
                    <p>
                        Jean Forteroche est né en 1966 sur l'île Adak, en Alaska, et y a passé une partie de son enfance avant de s'installer en France avec sa mère et sa sœur.
                        Il a rédigé son premier roman LES NAUFRAGES lors d'un voyage en mer.
                        Après avoir parcouru plus de 40 000 milles sur les océans, il échoue lors de sa tentative de tour du monde en solitaire sur un trimaran qu'il a dessiné et construit lui-même.
                        En 2013, il publie LE DERNIER MILE récit de son propre naufrage dans les Caraïbes lors de son voyage de noces quelques années plus tôt.
                        Ce livre fait partie de la liste des best-sellers du Figaro. Publié en France en janvier 2010, LES NAUFRAGES remporte immédiatement un immense succès. Il remporte le prix Médicis et s'est vendu à plus de 300 000 exemplaires.

                        Porté par son succès, Jean Forteroche est aujourd'hui traduit en dix-huit langues dans plus de soixante pays. Une adaptation cinématographique par une société de production française est en cours.

                        En 2017, il décide de publier en ligne chapitre par chapitre sur son propre site, son dernier roman BILLET SIMPLE POUR L'ALASKA.
                    </p>
                </div>
            </div>
            <div class="contener3">
                <h2 id="chapitreTitre">Chapitres : </h2>
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
    <footer>
        
    </footer>
    </body>
</html>