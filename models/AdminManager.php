<?php
// fonctions qui concernent l admin

require_once('models/model.php');

class AdminManager extends Manager{

    public function creationAdministrateur($pseudo, $mdp){
        $bdd = $this->dbConnect();
        $ins = $bdd->prepare('INSERT INTO  membres (pseudo, mdp, date_inscription) VALUE (?,?, CURDATE())');
        $ins->execute(array($pseudo, $mdp));

        return $ins;
    }

    public function recupMdp($pseudo, $mdp){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT pseudo, mdp FROM membres  WHERE pseudo=?');
        $req->execute(array($pseudo));

        return $req;
    }
}