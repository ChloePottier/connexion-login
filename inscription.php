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

if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd-verif'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd-verif'];
    $tab = array(
        'id' => '',
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'user' => $user,
        'password' => $pwd);
    $sqlEmail = "SELECT email FROM connexion";
    $reqEmail = $dbh->prepare($sqlEmail);
    $reqEmail ->execute(array($sqlEmail));
        if( $reqEmail == $email){
            echo "cet email existe déja";
        } else{
            $sqlUser = "SELECT user FROM connexion";
            $reqUser = $dbh->prepare($sqlUser);
            $reqUser ->execute(array($sqlUser));
            if($reqUser == $user){
                echo "cet email existe déja";
            } else {
                if($pwd != $pwd2){
                    echo "Mots de passes différents";
                } else{
                    if(strlen($pwd)<8){
                    echo "Mot de passe trop court, il faut au moins 8 caractères. Ici votre mot de passe ne contient que ".strlen($pwd)." caractères";
                    }else{
                        $sql2 = "INSERT INTO connexion  VALUES(:id, :nom, :prenom, :email, :user, :password)"; 
                        $req = $dbh->prepare($sql2);
                        $req->execute($tab);
                        if($req == true){
                            echo "Merci pour votre inscription"; 
                        } else {
                            echo "inscription impossible";
                            }
                        }
                    }
                }
            }
} else {
    echo "<p>Merci de renseigner tous les champs</p> ";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="#" >
    <!-- NOM -->
        <label for="nom" >Votre nom</label>
        <input id="nom" name="nom" type="text" required/>
    <!-- PRENOM -->
        <label for="nom" >Votre prénom</label>
        <input id="prenom" name="prenom" type="text" required/>
    <!-- PRENOM -->
        <label for="email" >Votre email</label>
        <input id="email" name="email" type="email"  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,8}$" required/>
    <!-- IDENTIFIANT -->
        <label for="identifiant" >Votre identifiant</label>
        <input id="user" name="user" type="text" required/>
    <!-- MOT DE PASSE -->
        <label for="password">Votre mot de passe</label>
        <input id="pwd" name="pwd" type="password" required/>
    <!-- MOT DE PASSE VERIFICATION-->
        <label for="password">Votre mot de passe</label>
        <input id="pwd-verif" name="pwd-verif" type="password" required/>
        <button type="submit" value="submit" name="inscription" style="width: 150px; height: 30px;margin-top:10px;">S'inscrire</button>
    </form>
    <!-- Si identifiant existe déja alors mettre un messsage echo "Ce nom d'utilisateur est déjà utilisé.";
    Il faut crypter les passwords
    Mettre une limite :
        - mot de passe : min 10 carac, lettre , chiffre, majuscule. Si trop court : "mot de passe trop court"
        - identifiant : min 6 charac -->

</body>
</html>