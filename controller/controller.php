<?php

require_once('models/PostManager.php');
require_once('models/CommentManager.php');

/*========================== chapitres ==================================================================*/

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
    if ($chapitre === false){
        require 'views/frontend/error.php';
    }else{
        $commentaires = $commentManager->getCommentaire($id);
        require('views/frontend/viewChapitres.php');
    }


}

/*============================ envoie de commentaire ========================================================*/

function adComment($text, $membrePseudo, $idChapter){
    $commentManager = new CommentManager();
    $commentaires = $commentManager->postComment($text, $membrePseudo, $idChapter);

    header('Location: index.php?action=post&id='.$idChapter);
}

/*=========================== signaler un comentaire ============================================================*/

function signaler($donnee, $idChapter){
    $signalerComment = new CommentManager();
    $signalerCommentaire = $signalerComment->signalCommentaire($donnee);
    header('Location:index.php?action=post&id='.$idChapter);
}
