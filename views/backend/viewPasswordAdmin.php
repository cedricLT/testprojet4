<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="contener">
    <h1> formulaire d inscription.</h1>
    <div id="inscription">
        <div align="center">
            <form action="../../indexAdmin.php?action=admin" method="post" >
                <table>
                    <tr>
                        <td align="right"><label for="nom">nom :</label></td>
                        <td><input type="text" placeholder="votre nom" name="nom" id="pseudo"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="password">Mot de passe :</label></td>
                        <td><input type="password" placeholder="votre mot de passe" name="pass" id="pass"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><br><input type="submit" name=""></td>
                    </tr>
                </table>
            </form>
</body>
</html>