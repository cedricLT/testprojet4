<?php

require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') { //recupération des chapitres
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {//click sur un chapitre à la page accueil.
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post($_GET['id']);
        }
       else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }elseif ($_GET['action'] == 'adComment'){ //envoie de commentaire sur une page chapitre
        $text = $_POST['text'];
        $membrePseudo = $_POST['membrePseudo'];
        $idChapter = $_GET['id'];
        adComment($text,$membrePseudo,$idChapter);
    }
}
else {
    listPosts();
}

