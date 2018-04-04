<?php
require('controller/controllerAdmin.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'supprimer') {//supprimer chapitre
            $idChapitre = $_GET['id'];
            supprimer($idChapitre);
        } elseif (($_GET['action'] == 'adChapter')) {// création nouveau chapitre
            $title = htmlspecialchars($_POST['title']);
            $text = $_POST['text'];
            $chapter_number = htmlspecialchars($_POST['chapter_number']);
            if(!empty($title) && !empty($chapter_number) && !empty($text)){
                if($chapter_number > 0){
                    adChapter($title, $text, $chapter_number);
                }
                else{
                    throw new Exception('Le numéro de chapitre doit être positif');
                }
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        } elseif ($_GET['action'] == 'modifier') {
            $id = $_GET['id'];
            modifier($id);
        } elseif ($_GET['action'] == 'editeur') { // tinymce editer un nouveau chapitre
            editer();
        } elseif ($_GET['action'] == 'nouvelModif') { // modifier un chapitre dejas existant
            $title = htmlspecialchars($_POST['title']);
            $text = $_POST['text'];
            $chapter_number = htmlspecialchars($_POST['chapter_number']);
            $id = $_GET['id'];
            if(!empty($title) && !empty($chapter_number) && !empty($text)){
                if($chapter_number > 0){
                    nouvelModif($title, $text, $chapter_number, $id);
                }
                else{
                    throw new Exception('Le numéro de chapitre doit être positif');
                }
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }

        } elseif ($_GET['action'] == 'supprimComment') { // supprimer un commentaire en admin
            $idDonnee = $_GET['id'];
            $idChapter = $_GET['idPost'];
            supprimComment($idDonnee, $idChapter);
        } elseif ($_GET['action'] == 'voirCommentaire') {
            $idChapter = htmlspecialchars($_GET['id']);
            $id = htmlspecialchars($_GET['id']);
            voirCommentaire($idChapter, $id);
        } elseif ($_GET['action'] == 'deleteReport') {
            $idDonnee = $_GET['id'];
            deleteReport($idDonnee);
        }
    } else {
        tableauBord();
    }
}catch (Exception $e){
    require ('views/frontend/error.php');
}
