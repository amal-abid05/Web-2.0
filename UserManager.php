<?php

require_once('User.php');

class UserManager
{

    private $_db; // Instance de PDO.

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }


    public function verifyLogin($email, $password)
    {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Course.

        $req = $this->_db->query("select * from user where email='$email' AND password='$password'");

        $res = $req->fetch();

        if ($res !=null) {
        return new User($res['id'],$res['username'],$res['firstname'], $res['lastname'], $res['email'],$res['password'],
            $res['address'],$res['image']);
        } else
            return null;



    }


}