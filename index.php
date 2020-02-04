<?php 
//variables pour la connexion BDD
$userBdd ='root';
$pass ='';
/**
 * Nous voulons juste hacher notre mot de passe en utiliant l'algorithme par défaut.
 * Actuellement, il s'agit de BCRYPT, ce qui produira un résultat sous forme de chaîne de
 * caractères d'une longueur de 60 caractères.
 *
 * Gardez à l'esprit que DEFAULT peut changer dans le temps, aussi, vous devriez vous
 * y préparer en autorisant un stockage supérieur à 60 caractères (255 peut être un bon choix)
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identification</title>
</head>
<body>
<p style="text-align: center;">Merci de vous identifier pour accéder à notre site</p>
<form action="login.php" method="POST" style="display:flex; flex-direction: column; width:250px; margin: auto; padding-top: 150px;">
        <label for="identifiant" >Votre identifiant</label>
        <input id="user" name="user" type="text" required/>
        <label for="identifiant">Votre mot de passe</label>
        <input id="pwd" name="pwd" type="password" required/>
        <button type="submit" value="submit" style="width: 150px; height: 30px;margin-top:10px;">Se connecter</button>
</form>
<div style="text-align: center; margin-top: 20px;">Vous n'êtes  pas encore inscrit ? <a href="inscription.php">inscription</a> </div>
</body>
</html>