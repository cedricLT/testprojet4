<?php

require_once('models/PostManager.php');
require_once('models/CommentManager.php');

function tableauBord()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $chapitres = $postManager->getChapitres();
    $commentaires = $commentManager->getCommentaires();

    require('views/backend/viewTableauBord.php');
}

function supprimer($idChapitre) // suppression d un chapitres et de tous les commentaire attenant
{
    $suppreComment = new CommentManager();
    $suppreCommentaire = $suppreComment->suprimeCommentaire($idChapitre);

    $suppreManager = new PostManager();
    $suppreChapritre = $suppreManager->efface($idChapitre);

    header('Location: indexAdmin.php');

}

function adChapter($title, $text, $chapteur_number){ //création d un nouveau chapitre via tinyMce
    $postChapitre = new postManager();
    $postChapter = $postChapitre->nouveauChapitre($title, $text, $chapteur_number);
    header('Location: indexAdmin.php');
}

function modifier($id){
    $modifChapter = new postManager();
    $modifChapitre = $modifChapter->modifChapter($id);
    require('views/backend/viewTinyMceAdmin.php');
}

function editer(){ //tinyMce
    require ('views/backend/viewAdmin.php');
}

function nouvelModif($title, $text, $chapter_number, $id){ //enregistrement d une modif d un chapitre dans la bdd
    $newsModif = new postManager();
    $nouvelModif = $newsModif->modificationChapitre($title, $text, $chapter_number, $id);
    //require ('views/backend/viewTableauBord.php');
    header('Location: indexAdmin.php');
}

function supprimComment($idDonnee, $idChapter){ //supprimer un commentaire en admin
    $supprimeCommentaire = new CommentManager();
    $supprimeCommentaireAdmin = $supprimeCommentaire->suprimeCommentaireAd( $idDonnee);
    header('Location: indexAdmin.php?action=voirCommentaire&id='.$idChapter);

}


function voirCommentaire($idChapter, $id){ // commentaires par chapitre
    $voirComment = new CommentManager();
    $postManager = new PostManager();
    $voirCommentAd = $voirComment->voirCommentaireAd($idChapter);
    $chapitres = $postManager->getChapitre($id);
   require('views/backend/viewCommentaireAdmin.php');
}