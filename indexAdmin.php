<?php
require('controller/controllerAdmin.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'supprimer') {//supprimer chapitre
        $idChapitre = $_GET['id'];
        supprimer($idChapitre);
    }elseif (($_GET['action'] == 'adChapter')){// création nouveau chapitre
        $title = $_POST['title'];
        $text = $_POST['text'];
        $chapter_number = $_POST['chapter_number'];
        adChapter($title, $text, $chapter_number);
    }elseif ($_GET['action'] == 'modifier'){
        $id = $_GET['id'];
        modifier($id);
    }elseif ($_GET['action'] == 'editeur'){ // tinymce editer un nouveau chapitre
        editer();
    }elseif ($_GET['action'] == 'nouvelModif'){ // modifier un chapitre dejas existant
        $title = $_POST['title'];
        $text = $_POST['text'];
        $chapter_number = $_POST['chapter_number'];
        $id = $_GET['id'];
        nouvelModif($title, $text, $chapter_number, $id);
    }elseif ($_GET['action'] == 'supprimComment'){ // supprimer un commentaire en admin
        $idDonnee = $_GET['id'];
        $idChapter = $_GET['idPost'];
        supprimComment($idDonnee, $idChapter);
    }elseif ($_GET['action'] == 'voirCommentaire'){
        $idChapter = $_GET['id'];
        $id = $_GET['id'];
        voirCommentaire($idChapter, $id);


    }
}
else {
   tableauBord();
}
