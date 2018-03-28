<?php

require_once('models/PostManager.php');
require_once('models/CommentManager.php');

function listPosts() //recuperation des chapitres
{
    $postManager = new PostManager();
    $chapitres = $postManager->getChapitres();

    require('views/frontend/viewAccueil.php');
}

function post($id){
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $chapitre = $postManager->getChapitre($id);
    $commentaires = $commentManager->getCommentaire($id);
    require('views/frontend/viewChapitres.php');

}

function adComment($text, $membrePseudo, $idChapter){
    $commentManager = new CommentManager();
    $commentaires = $commentManager->postComment($text, $membrePseudo, $idChapter);

    header('Location: index.php?action=post&id='.$idChapter);
}
