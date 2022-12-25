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


        function display_rooms($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM rooms ") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_device($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM device ") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function add_schedule($dbb,$from,$to,$duration,$device_id,$room_id,$user_id){
			$query="INSERT INTO `scheduler` (`from`, `to`,`duration`, `device_id`, `room_id`,`reg_id`) VALUES(?, ?, ?, ?, ?,?)" or die($this->conn->error);
			$data = $dbb->prepare($query);
            
            $data->bind_param("ssiiii",$from, $to, $duration, $device_id,$room_id,$user_id);
            return $data->execute();
	
        }

        function display_schedule($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler INNER JOIN `device` ON scheduler.device_id=device.device_id INNER JOIN `Rooms` ON scheduler.room_id=Rooms.room_id WHERE reg_id=?") or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }


      



?>