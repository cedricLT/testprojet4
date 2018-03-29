<?php
// fonctions qui concernent tous les commentaires

require_once('models/model.php');

class CommentManager extends Manager
{
    public function getCommentaires() // recuperation des commentaires
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, dates FROM commentaire ORDER BY ID ');
        $req->execute(array());

        return $req;

    }

    public function getCommentaire($id) // recuperation d'un commentaire
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, dates, id_chapitre FROM commentaire WHERE id_chapitre = ? ORDER BY ID DESC LIMIT 0, 10');
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


    public function voirCommentaireAd($idChapter){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, text, membrePseudo, dates, id_chapitre FROM commentaire WHERE id_chapitre = ? ');
        $req->execute(array($idChapter));

        return $req;
    }

    public function signalCommentaire($donnee){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE commentaire SET report=(report+1) WHERE id = ?');
        $req->execute(array($donnee));

        return $req;
    }
}