<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mini-chat</title>
</head>
<style>
    form
    {
        text-align:center;
    }
</style>
<body>

<form action="model_postComment.php" method="post">
    <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="membrePseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="text" id="message" /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT text, membrePseudo, dates FROM commentaire ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' . htmlspecialchars($donnees['membrePseudo']) . '</strong> : ' . htmlspecialchars($donnees['text']) . '</strong> : ' . htmlspecialchars($donnees['dates']) . '</p>';
}

$reponse->closeCursor();

?>
</body>
</html>