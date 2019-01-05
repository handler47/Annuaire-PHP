<?php

$serverName = "localhost";
$username = "username";
$password = "password";
$dbName = "dbName";

function getConnection()
{
    global $serverName, $username, $password, $dbName;

    echo 'Tentative de connexion au serveur : '. $serverName;
    try {
        $conn = new PDO('mysql:host=' . $serverName . 'dbname=' . $dbName, $username, $password);
    } catch (PDOException $e) {
        $msg = 'Erreur PDO : impossible de se connecter ';
        die($msg);
    }

    return $conn;
}

?>