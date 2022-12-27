<?php

try{
     $bdd = new PDO('mysql:host=localhost:3306;dbname=happyfamily;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
     die('Error: '.$e->getMessage());
}