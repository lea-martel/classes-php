<?php session_start();

class user {
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $mysql;

public function __construct()
{
    $this->mysql = mysqli_connect('localhost', 'root','',"classes"); 
}

private function query($request)

{
    return mysqli_query($this->mysql, $request);
}

public function register($login, $password, $email, $firstname, $lastname)
{
$mysql = mysqli_connect('localhost', 'root','',"classes");
$req = "INSERT INTO utilisateurs (`id`,`login`,`password`,`email`,`firstname`,`lastname`) VALUES ('null','$login', '$password', '$email', '$firstname', '$lastname')";
$query = mysqli_query($mysql, $req);

return [$login, $password, $email, $firstname, $lastname];

}

public function connect($login, $password) {

if(!isset($this->mysql)) {
        $requete = $this->query ("SELECT * FROM utilisateurs WHERE login = $login AND password = $password");
        $query1 = mysqli_fetch_assoc($requete);
    }
}

public function disconnect()
    {
        session_destroy();

        echo 'Vous avez été déconnecté';
        
}

public function delete() {

    $mysql = mysqli_connect('localhost', 'root','',"classes");
    $requete1 = "DELETE FROM `utilisateur` WHERE id = '$_SESSION[id]' ";
    $query2 = mysqli_query($mysql, $requete1);

    session_destroy();
    echo 'Vous avez été déconnecté';

}


public function update($login, $password, $email, $firstname, $lastname) {

    $requete2 = "UPDATE utilisateurs SET `login`='$login',`password`='$password',`email`='$email',`firstname`='$firstname',`lastname`='$lastname' WHERE `id` = '".$_SESSION['id']."'";
    $query3 = mysqli_connect($mysql,$requete2);

}
}
$user = new user;
// $user->__construct();
$user = $user->register('Lea','lea','lea.martel@laplateforme.io','Lea','Martel');
echo $user[0];
// $user->connect("Lea","lea");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
    <body>
    <main>
    <h1>Connexion</h1>
    <form method="post" action="user.php">
        <p>Login</p>
        <input class="input" type="text" name="login">
        <p>Mot de passe</p>
        <input class="input" type="password" name="password"><br/><br/>
        <input class="input" id="connexionSubmit" type="submit" name="submit" value="Valider"><br/>
    </form>
</main>
</body>
</html>