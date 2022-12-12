<?php
//require 'connection.php';

function connection(){
    $serverName = "localhost";
    $username = "root";
    $passwd = "";
    $DBName = "happyfamily";

    return new PDO("mysql:host=$serverName;dbname=$DBName", $username, $passwd);
    
}