<div id="menu1">
    <div id="menuAccueil">
        <nav>
            <ul>
                <li id="menu1Présent"><a href="#presentationJf">présentation</a></li>
                <li id="menu1Article1"><a href="#chapitreTitre">Chapitres</a></li>
                <?php if (!isset($_SESSION['pseudo']))
                    echo "<li id=\"connexiion\"><a href=\"views/backend/viewConnexionAdmin.php\">Connexion</a></li>";
                else echo "<li id=\"connexiion\"><a href=\"indexAdmin.php\">Tableau de bord</a></li>" ?>
            </ul>
        </nav>
    </div>
</div>