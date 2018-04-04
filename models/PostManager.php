<?php
//fonctions pour les chapitres
require_once('models/model.php');

class PostManager extends Manager
{
    public function getChapitres() // Récupération des chapitres
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT id, title, text, chapter_number, dates FROM chapitre ORDER BY chapter_number ');
        $req->execute(array());
        return $req;

    }

    public function getChapitre($id)// Récupération d un chapitre
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, text, chapter_number, dates FROM chapitre WHERE id = ?');
        $req->execute(array($id));
        return $req->fetch();
    }

    public function efface($idChapitre) //efface chapitre admin
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM chapitre WHERE id = ?');
        $req->execute(array($idChapitre));
        return $req;
    }

    public  function nouveauChapitre($title, $text, $chapteur_number){// enregistre les nouveaux chapitres et les fait apparaitre coder utilisateur et admin
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO chapitre (title, text, chapter_number, dates) VALUES(?,?,?, NOW()) ');
        $req->execute(array($title, $text, $chapteur_number));
        return $req;
    }

    public function modifChapter($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, title, text, chapter_number FROM chapitre WHERE id = ?');
        $req->execute(array($id));
        return $req;
    }

    public function modificationChapitre($title, $text, $chapter_number, $id){ // modifier un chapitre
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE chapitre SET title = ?, text = ?, chapter_number = ? where id = ?');
        $req->execute(array($title, $text, $chapter_number, $id));
       return $req;
    }
}