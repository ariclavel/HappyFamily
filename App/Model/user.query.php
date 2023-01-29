<?php
require_once'conn.php';
require '../vendor/autoload.php';
//include ('../View/filter_string.php');
		
   
function add_user($dbb,$firstname,$lastname,$email,$password,$activationCode,$activationStatus,$date){
	$query="INSERT INTO `Registration` (`first_name`, `last_name`,`email`, `password`, `activation_status`, `activation_code`,`date`) VALUES(?, ?, ?, ?, ?, ?, ?)" or die($this->conn->error);
	$data = $dbb->prepare($query);
            
    $data->bind_param("ssssiss",$firstname, $lastname, $email, $password,$activationStatus,$activationCode,$date);
    return $data->execute();
	
}
    
function check_email($dbb,$email){
            
    $query=$dbb->prepare("SELECT * FROM Registration WHERE email='$email'") or die($this->conn->error);
	if($query->execute()){
		$result=$query->get_result();
		return $result;	
    }
}


function email_verification($dbb,$activationStatus,$activationCode){        
    $query=$dbb->prepare("UPDATE Registration SET activation_status=? WHERE activation_code=?") or die($this->conn->error);
    $query->bind_param("is", $activationStatus, $activationCode);		
	if($query->execute()){		
		return true;
	}
}

function user_login($dbb,$email,$password){
            
    $query=$dbb->prepare("SELECT * FROM Registration WHERE email='$email' AND password='$password'") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
    }
}

       
function check_activation_status($dbb,$activationCode){         
    $query=$dbb->prepare("SELECT * FROM Registration WHERE activation_code='$activationCode'") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
    }
}


function update_user($dbb,$u_id, $fname, $lname, $phoneNo){
	$query=$dbb->prepare("UPDATE `registration` SET `first_name`=?, `last_name`=?, `phoneNumber`=? WHERE `reg_id`=?") or die($this->conn->error);
	$query->bind_param("sssi",$fname, $lname, $phoneNo,$u_id);
			
	if($query->execute()){		
		return true;
	}
}

function add_user_address($dbb,$address,$country,$city,$zip_code,$reg_id){
	$query="INSERT INTO `address` (`address`,`country`,`city`,`zip_code`, `reg_id`)VALUES(?,?, ?, ?, ?)" or die($this->conn->error);
	$data = $dbb->prepare($query);
            
    $data->bind_param("ssssi",$address,$country,$city, $zip_code, $reg_id);
    return $data->execute();
	
}
//ADMIN DELETION
function delete_user($dbb, $user_id){
    $query=$dbb->prepare("DELETE FROM `Registration` WHERE reg_id=?") or die($this->conn->error);
    $query->bind_param("i", $user_id);
    if($query->execute()){
        
        return true;
    }
}
//display all users
function display_users($dbb)
{
    $query=$dbb->prepare("SELECT * FROM Registration WHERE type NOT IN ('Admin')") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
        
    
    }
}

    
?>