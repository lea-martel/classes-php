<?php

class utilisateurs {
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

public function register($login, $password, $email, $firstname,$lastname)
{
$req = "INSERT INTO utilisateurs (`id`,`login`,`password`,`email`,`firstname`,`lastname`) VALUES ('null','$login', '$password', '$email', '$firstname', '$lastname')";
$query = mysqli_query($this->mysql,$req);
$tab=array($login,$password,$email,$firstname,$lastname);
var_dump($tab);

foreach ($tab as $key) {

    echo $key."<br />";
}
}
}

$user = new utilisateurs;
$user->__construct();
$user->register("Lea","lea","lea.martel@laplateforme.io","Lea","Martel");