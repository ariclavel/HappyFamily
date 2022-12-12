<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'connection.php';

function Connection() : bool{
    
    $conn = connection($person_id, $username, $email, $password, $first_name, $last_name, $phoneNumber);
    if($conn){
    
        $request = "INSERT INTO Person(person_id, username, email, password, first_name, last_name, phoneNumber,activation_code) VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)";
        $statement = $conn->prepare($request);
        $statement->bindParam(':value1', $person_id);
        $statement->bindParam(':value2', $username);
        $statement->bindParam(':value3', $email);
        $statement->bindParam(':value4', $password);
        $statement->bindParam(':value5', $first_name);
        $statement->bindParam(':value6', $last_name);
        $statement->bindParam(':value7', $phoneNumber);
        $statement->bindParam(':value8', "1234");
       

        return $statement->execute();
    }else{
        return false;
    }
}