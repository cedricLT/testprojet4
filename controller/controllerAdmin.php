<?php

require_once('models/PostManager.php');
require_once('models/CommentManager.php');
require_once('models/AdminManager.php');

function tableauBord()
{
    $postManager = new PostManager();
    $chapitres = $postManager->getChapitres();

    $commentManager = new CommentManager();
    $commentaires = $commentManager->getCommentaires();

    $signalComment = new CommentManager();
    $signalerCommentaire = $signalComment->report();

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

function adChapter($title, $text, $chapteur_number, $image)
{ //création d un nouveau chapitre via tinyMce
    $postChapitre = new postManager();
    $postChapter = $postChapitre->nouveauChapitre($title, $text, $chapteur_number, $image);
    header('Location: indexAdmin.php');
}

function modifier($id)
{
    $modifChapter = new postManager();
    $modifChapitre = $modifChapter->modifChapter($id);
    require('views/backend/viewTinyMceAdmin.php');
}

function editer()
{ //tinyMce
    require('views/backend/viewAdmin.php');
}

function nouvelModif($title, $text, $chapter_number, $id)
{ //enregistrement d une modif d un chapitre dans la bdd
    $newsModif = new postManager();
    $nouvelModif = $newsModif->modificationChapitre($title, $text, $chapter_number, $id);
    //require ('views/backend/viewTableauBord.php');
    header('Location: indexAdmin.php');
}

function supprimComment($idDonnee, $idChapter)//supprimer un commentaire en admin
{
    $supprimeCommentaire = new CommentManager();
    $supprimeCommentaireAdmin = $supprimeCommentaire->suprimeCommentaireAd($idDonnee);
    header('Location: indexAdmin.php?action=voirCommentaire&id=' . $idChapter);

}


function voirCommentaire($idChapter, $id)
{ // commentaires par chapitre
    $voirComment = new CommentManager();
    $postManager = new PostManager();
    $voirCommentAd = $voirComment->voirCommentaireAd($idChapter);
    $chapitres = $postManager->getChapitre($id);
    require('views/backend/viewCommentaireAdmin.php');
}

function deleteReport($idDonnee){ // supprimer un commentaire signaler
    $suppredel = new CommentManager();
    $supprimdelete = $suppredel->suppreCommentSignal($idDonnee);
    header('Location: indexAdmin.php');
}

function admin($pseudo, $mdp){ //creation mot de pass pour l admin
    $creationAdmin = new AdminManager();
    $creatAd = $creationAdmin->creationAdministrateur($pseudo, $mdp);
    header('Location: indexAdmin.php');
}

function connexionAdm($pseudo, $mdp){ //recup du mot de pass
    $connexionAdmin = new AdminManager();
    $connexAdm = $connexionAdmin->recupMdp($pseudo, $mdp);
    $resultat = $connexAdm->fetch();
    $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
    $_SESSION['pseudo'] = $resultat['pseudo']; // transformation des variable recupere en session
    $_SESSION['mdp'] = $resultat['mdp'];
    $_SESSION['id'] = $resultat['id'];
    if ($isPasswordCorrect){
        header('Location: indexAdmin.php');
    }else{
        //throw new Exception('vos identifients sont incorrect');
        require('views/backend/erreur.php');
    }

}