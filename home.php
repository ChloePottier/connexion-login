<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Home</title>
</head>
<body>
    

<?php 
// démarrer la session
session_start();
//si la session existe alors afficher la page sinon retour vers la page de connection
if(isset($_SESSION['login']) && isset($_SESSION['pwd'])){
    echo"<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>Document</title>
    </head>
    <body>
        <div >Bienvenue ".$_SESSION['login']." !!!</div>
        <form action='logout.php' method='POST'><button type='submit' value='deconnect'>déconnection</button></form>
    </body>
    </html>";


} else{
    header("Location: http://localhost/php/connexion-login/index.php");
}
?>
</body>
</html>
