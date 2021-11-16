<?php
$servername = "171.241.46.90";
$username = "root";
$password = "huyhoang10032000@gmail.com";

$conn=null;
try {
    $conn = new PDO("mysql:host=$servername;dbname=thuvien", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
// ?>