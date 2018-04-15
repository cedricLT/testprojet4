<?php
// fonctions qui concernent tous les commentaires

require_once('models/model.php');

class CommentManager extends Manager
{
    public function getCommentaires() // recuperation des commentaires
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, DATE_FORMAT(dates, \'%d/%m/%Y\') AS dates_fr FROM commentaire ORDER BY ID ');
        $req->execute(array());

        return $req;

    }

    public function getCommentaire($id) // recuperation d'un commentaire
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, id_chapitre ,DATE_FORMAT(dates, \'%d/%m/%Y\') AS dates_fr  FROM commentaire WHERE id_chapitre = ? ORDER BY ID DESC LIMIT 0, 10');
        $req->execute(array($id));

        return $req;

    }

    public function postComment($text, $membrePseudo, $idChapter) // enregistre les commentaire dans la bdd
    {
        $bdd = $this->dbConnect();
        // Insertion du message à l'aide d'une requête préparée
        $ins = $bdd->prepare('INSERT INTO commentaire (text, membrePseudo, dates, id_chapitre) VALUES(?, ?, CURDATE(), ?)');
        $ins->execute(array($text, $membrePseudo, $idChapter));

        return $ins;

    }

    public function suprimeCommentaire($idChapitre)//supprime les commentaire a la suppression d un chappitre
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id_chapitre = ?');
        $req->execute(array($idChapitre));
        return $req;
    }

    public function suprimeCommentaireAd($idDonnee) //supprimer un commentaire en admin
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE  FROM commentaire WHERE id = ? ');
        $req->execute(array($idDonnee));
        return $req;
    }


    public function voirCommentaireAd($idChapter){ // commentaires par chapitre sur l admin
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, id_chapitre, DATE_FORMAT(dates, \'%d/%m/%Y\') AS dates_fr FROM commentaire WHERE id_chapitre = ? ');
        $req->execute(array($idChapter));

        return $req;
    }

    public function signalCommentaire($donnee){ // commentaire signaler sql
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE commentaire SET report=(report+1) WHERE id = ?');
        $req->execute(array($donnee));

        return $req;
    }

    public function report(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, dates FROM commentaire WHERE report>2 ');
        $req->execute(array());

        return $req;
    }

    public function suppreCommentSignal($idDonnee){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE  FROM commentaire WHERE id = ? ');
        $req->execute(array($idDonnee));
        return $req;
    }


}