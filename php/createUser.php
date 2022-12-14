<?php

include 'users.php';


$person_id = $_GET['email'];
$username = $_GET['email']; 
$email = $_GET['email'];
$password = $_GET['pss1'];
$first_name = "Ariana";
$last_name = "Ayaviri";
$phoneNumber = "11111";


$result = Conn($person_id, $username, $email, $password, $first_name, $last_name, $phoneNumber);
?>