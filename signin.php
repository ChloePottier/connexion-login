<?php
$userBdd ='root';
$pass ='';
//Connexion à la BDD en PDO
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $userBdd, $pass);
    // print 'connexion bdd ok'; //juste pour voir si il se connecte correctement
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
//variable du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$tab = array(
    'id' => '',
    'nom'=>$nom,
    'prenom'=>$prenom,
    'email'=>$email,
    'user' => $user,
    'password' => $pwd);
//requete SQL
$sql2 = "INSERT INTO connexion  VALUES(:id, :nom, :prenom, :email, :user, :password)"; 
$req = $dbh->prepare($sql2);
$req->execute($tab);
if($req == true){
    echo "Merci pour votre inscription"; 
} else {
    echo "inscription impossible";
}
?>