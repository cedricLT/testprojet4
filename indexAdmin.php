<?php
require('controller/controllerAdmin.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'supprimer') {//supprimer chapitre
        $idChapitre = $_GET['id'];
        supprimer($idChapitre);
    }elseif (($_GET['action'] == 'adChapter')){
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
    }
}
else {
   tableauBord();
}
