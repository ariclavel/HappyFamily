<?php
require_once'conn.php';
require '../vendor/autoload.php';
include ('../View/filter_string.php');

function add_user($dbb,$firstname,$lastname,$email,$password,$activationCode,$activationStatus,$date){
	$query="INSERT INTO `Registration` (`first_name`, `last_name`,`email`, `password`, `activation_status`, `activation_code`,`date`) VALUES(?, ?, ?, ?, ?, ?, ?)" or die($this->conn->error);
	$data = $dbb->prepare($query);
            
    $data->bind_param("ssssiss",$firstname, $lastname, $email, $password,$activationStatus,$activationCode,$date);
    return $data->execute();
	
}
?>
    