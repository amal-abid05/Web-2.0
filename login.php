<?php
session_start(); // Starting Session

require_once('MySQLDatabase.php');
require_once('UserManager.php');
/*
$postdata = file_get_contents("php://input");
$postdata = json_decode($postdata);
*/

//BDD
$mySQLDatabase = new MySQLDatabase();
$db = $mySQLDatabase->getConnection();

//Manager
$userManager = new UserManager($db);


$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['inputEmail']) || empty($_POST['inputPassword'])) {
        $error = "Email or Password is invalid";
    }
    else
    {
// Define $email  and $password
        $email=$_POST['inputEmail'];
        $password=$_POST['inputPassword'];

// SQL query to fetch information of registerd users and finds user match.
        $user = $userManager->verifyLogin($email, $password);
        if ($user !=null) {
            $_SESSION['login_user']=$email; // Initializing Session
            $_SESSION['user_id']=$user->getId();
            header("location: index.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }
}
?>