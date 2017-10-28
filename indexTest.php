<?php
require_once('MySQLDatabase.php');
require_once('UserManager.php');

//BDD
$mySQLDatabase = new MySQLDatabase();
$db = $mySQLDatabase->getConnection();

//Manager
$userManager = new UserManager($db);

$email="mariem@gmail.com";
$password="1234567";

$user = $userManager->verifyLogin($email, $password);
if ($user !=null) {
    echo "Hi ". $email;
} else {
    echo "Username or Password is invalid";
}



?>