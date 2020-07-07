<?php session_start();

class userpdo {
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $mysql;

public function __construct()
{
    $this->connect = mysqli_connect('localhost', 'root','',"classes"); 
}

public function register($login, $password, $email, $firstname, $lastname) 
{

    $this->$login; 
    $this->$password;
    $this->$email;
    $this->$firstname;
    $this->$lastname;

try {
        $bdd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8", "root", "");
    }   catch(PDOException $e){
        echo 'Erreur : ' . $e->getMessage();
    }
    $prepare = $bdd->prepare ("INSERT INTO utilisateurs (`id`,`login`,`password`,`email`,`firstname`,`lastname`) VALUES (?, ?, ?, ?, ?, ?)");
    $prepare->execute(array($login, $password, $email, $firstname, $lastname));
    
}


public function connect($login, $password) {

    $this->$login;
    $this->$password;

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8", "root", "");
    }   catch(PDOException $e){
        echo 'Erreur : ' . $e->getMessage();
    }
    $prepare = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
    $prepare->execute(array($login,$password));
    $user = $prepare->fetch(PDO::FETCH_ASSOC);
    $this->$login = $user['login'];
    $this->$password = $user['password'];
}

public function disconnect()
{
        session_destroy();
        
        echo 'Vous avez été déconnecté';
}


public function delete() {

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8", "root", "");
    }   catch(PDOException $e){
        echo 'Erreur : ' . $e->getMessage();
    }
    $prepare = $bdd->prepare("DELETE FROM `utilisateur` WHERE id = ?");
    $prepare->execute(array($this->id));

}

public function update($login, $password, $email, $firstname, $lastname) {

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8", "root", "");
    }   catch(PDOException $e){
        echo 'Erreur : ' . $e->getMessage();
    }
    $prepare = $bdd->prepare("UPDATE utilisateurs SET `login`='?',`password`='?',`email`='?',`firstname`='?',`lastname`='?' WHERE `id` = ?");
    $prepare->execute(array($this->login, $this->password, $this->email, $this->firstname, $this->lastname, $this->id));
    $user = $prepare->fetch(PDO::FETCH_ASSOC);
    $this->login = $user['login'];
    $this->password = $user['password'];
    $this->email = $user['email'];
    $this->firstname = $user['firstname'];
    $this->lastname = $user['lastname'];

}

public function isConnected() {

    $mysql = mysqli_connect('localhost', 'root','',"classes");
    
    if(isset($_SESSION['id'])){
        echo 'Vous êtes connecté';
        return True;

    }else
     echo 'Vous êtes deconnecté'; 
     return False;
     
}

public function getAllInfos() {

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8", "root", "");
    }   catch(PDOException $e){
        echo 'Erreur : ' . $e->getMessage();
    }
    $prepare = $bdd->prepare("SELECT * FROM utilisateurs WHERE `id`= ?");
    $prepare->execute(array($this->login, $this->password, $this->email, $this->firstname, $this->lastname, $this->id));
    $user = $prepare->fetch(PDO::FETCH_ASSOC);

}

public function getLogin(){

    return $this->login;
}

public function getEmail() {

    return $this->email;
}

public function getFirstname() {

    return $this->firstname;
}

public function getLastname() {

    return $this->lastname;
}


public function refresh() { 
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=classes;charset=utf8", "root", "");
    }   catch(PDOException $e){
        echo 'Erreur : ' . $e->getMessage();
    }
    $prepare = $bdd->prepare("SELECT * FROM utilisateurs WHERE `id`= ?");
    $prepare->execute(array($this->login, $this->password, $this->email, $this->firstname, $this->lastname, $this->id));
    $user = $prepare->fetch(PDO::FETCH_ASSOC);
}
}