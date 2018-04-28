<?php
session_start();
require('controller/controller.php');

try {


    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') { //recupération des chapitres
            listPosts();
        } elseif ($_GET['action'] == 'post') {//click sur un chapitre à la page accueil.
            $id = htmlspecialchars($_GET['id']);
            if (isset($id) && $id > 0) {
                post($id);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } elseif ($_GET['action'] == 'adComment') { //envoie de commentaire sur une page chapitre
            $text = htmlspecialchars($_POST['text']);
            $membrePseudo = htmlspecialchars($_POST['membrePseudo']);
            $idChapter = htmlspecialchars($_GET['id']);
            if (!empty($text) && (!empty($membrePseudo))) { // verification que tous les champs commentaire sont remplis
                adComment($text, $membrePseudo, $idChapter);
            }
            else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        } elseif ($_GET['action'] == 'signaler') {//signaler un commentaire
            $donnee = htmlspecialchars($_GET['id']);
            $idChapter = htmlspecialchars($_GET['idPost']);
            signaler($donnee, $idChapter);
        }else{
            listPosts();
        }
    } else {
        listPosts();
    }
}catch (Exception $e){
    require ('views/frontend/error.php');
}