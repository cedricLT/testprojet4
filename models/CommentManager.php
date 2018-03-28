<?php
// fonctions qui concernent tous les commentaires

require_once('models/model.php');

class CommentManager extends Manager
{
    public function getCommentaires($id) // recuperation des commentaires
    {
        $bdd = $this->dbConnect();
        // Récupération des 10 derniers commmentaires
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

    public function suprimeCommentaire($idChapitre)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id_chapitre = ?');
        $req->execute(array($idChapitre));
        return $req;
    }

}