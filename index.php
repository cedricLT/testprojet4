<?php

require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post($_GET['id']);
        }
       else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }elseif ($_GET['action'] == 'adComment'){
        $text = $_POST['text'];
        $membrePseudo = $_POST['membrePseudo'];
        $idChapter = $_GET['id'];
        adComment($text,$membrePseudo,$idChapter);
    }
}
else {
    listPosts();
}

