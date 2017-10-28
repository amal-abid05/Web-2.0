<?php


// Database Constants
defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
defined('DB_USER')   ? null : define('DB_USER', 'root');
defined('DB_PASS')   ? null : define('DB_PASS', '');
defined('DB_NAME')   ? null : define('DB_NAME', 'tpmooc');

class MySQLDatabase
{
    private $_connection;

    function __construct() {
        $this->openConnection();

    }

    public function openConnection() {

        try
        {
            // On se connecte à MySQL
            $this->_connection= new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);

        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }


    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->_connection;
    }



    public function closeConnection() {

    }

}