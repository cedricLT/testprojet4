<?php
session_start();
require('controller/controllerAdmin.php');
require ('views/backend/services.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'connexionAdm') {
            $pseudo = htmlspecialchars($_POST['nom']);
            $mdp = $_POST['pass'];
            if (isset($pseudo) && isset($mdp)) {
                connexionAdm($pseudo, $mdp);
            } else {
                throw new Exception('renseigner vos identifients');
            }

        } elseif
        ($_GET['action'] == 'supprimer') {//supprimer chapitre
            $idChapitre = $_GET['id'];
            supprimer($idChapitre);
        } elseif
        (($_GET['action'] == 'adChapter')) {// création nouveau chapitre
            $title = htmlspecialchars($_POST['title']);
            $text = $_POST['text'];
            $chapter_number = htmlspecialchars($_POST['chapter_number']);
            if (!empty($title) && !empty($chapter_number) && !empty($text)) {
                if ($chapter_number > 0) {
                    adChapter($title, $text, $chapter_number);
                } else {
                    throw new Exception('Le numéro de chapitre doit être positif');
                }
            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        } elseif
        ($_GET['action'] == 'modifier') {
            isConnect();
            $id = $_GET['id'];
            modifier($id);
        } elseif
        ($_GET['action'] == 'editeur') {// tinymce editer un nouveau chapitre
            isConnect();
            editer();
        } elseif
        ($_GET['action'] == 'nouvelModif') {// modifier un chapitre dejas existant
            isConnect();
            $title = htmlspecialchars($_POST['title']);
            $text = $_POST['text'];
            $chapter_number = htmlspecialchars($_POST['chapter_number']);
            $id = $_GET['id'];
            if (!empty($title) && !empty($chapter_number) && !empty($text)) {
                isConnect();
                if ($chapter_number > 0) {
                    nouvelModif($title, $text, $chapter_number, $id);
                } else {
                    throw new Exception('Le numéro de chapitre doit être positif');
                }
            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }

        } elseif
        ($_GET['action'] == 'supprimComment') { // supprimer un commentaire en admin
            isConnect();
            $idDonnee = $_GET['id'];
            $idChapter = $_GET['idPost'];
            supprimComment($idDonnee, $idChapter);
        } elseif
        ($_GET['action'] == 'voirCommentaire') {
            isConnect();
            $idChapter = htmlspecialchars($_GET['id']);
            $id = htmlspecialchars($_GET['id']);
            voirCommentaire($idChapter, $id);
        } elseif
        ($_GET['action'] == 'deleteReport') {
            $idDonnee = $_GET['id'];
            deleteReport($idDonnee);
        } elseif
        ($_GET['action'] == 'admin') { // création de l admin
            $pseudo = htmlspecialchars($_POST['nom']);
            $pass = $_POST['pass'];
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            admin($pseudo, $mdp);
        } elseif ($_GET['action'] == 'deconnexionAdm') {
            session_destroy();
            header('Location: index.php');
        }elseif ($_GET['action'] == 'accueil'){
            if (session_start() == true){
                header('Location: index.php');
            }
        }

    } else {
        isConnect();
        tableauBord();
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
