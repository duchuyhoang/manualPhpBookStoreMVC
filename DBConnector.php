<?php

require_once dirname(__FILE__) . "/./db.php";

abstract class DBConnector
{

    // protected $db;
    protected static $db;
    public function __construct()
    {
        // if(!self::$db){
        $servername = "171.241.46.90";
        $username = "root";
        $password = "huyhoang10032000@gmail.com";
        // try{
        $conn = new PDO("mysql:host=$servername;dbname=thuvien", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION);
        $this->db = $conn;
        // }
        //   catch(PDOException $e){
        //   var_dump($e);
        //   }
        //   }
    }
    public static function connectDB()
    {
        if (!self::$db) {
        
            $servername = "171.241.46.90";
            $username = "root";
            $password = "huyhoang10032000@gmail.com";
            // try{
            $conn = new PDO("mysql:host=$servername;dbname=thuvien", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION);
            self::$db = $conn;
            // }
            //   catch(PDOException $e){
            //   var_dump($e);
            //   }
        }
    }
}