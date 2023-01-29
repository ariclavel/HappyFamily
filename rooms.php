<?php
require_once'conn.php';
require '../vendor/autoload.php';
include ('../View/filter_string.php');
		
   
        function add_user($dbb,$firstname,$lastname,$email,$password,$activationCode,$activationStatus,$date){
			$query="INSERT INTO `Registration` (`first_name`, `last_name`,`email`, `password`, `activation_status`, `activation_code`,`date`) VALUES(?, ?, ?, ?, ?, ?, ?)" ;//or die($this->conn->error);
			$data = $dbb->prepare($query);
            
            $data->bind_param("ssssiss",$firstname, $lastname, $email, $password,$activationStatus,$activationCode,$date);
            return $data->execute();
	
        }
    

    function check_email($dbb,$email){
            
        $query=$dbb->prepare("SELECT * FROM Registration WHERE email='$email'") ;//or die($this->conn->error);
			if($query->execute()){
				$result=$query->get_result();
				return $result;
				
			
            }
			}

function email_verification($dbb,$activationStatus,$activationCode){
            
$query=$dbb->prepare("UPDATE Registration SET activation_status=? WHERE activation_code=?") ;//or die($this->conn->error);

$query->bind_param("is", $activationStatus, $activationCode);
			
			if($query->execute()){
				
				return true;
			}
}

function user_login($dbb,$email,$password){
            
    $query=$dbb->prepare("SELECT * FROM Registration WHERE email='$email' AND password='$password'") ;//or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
        }

        
function check_activation_status($dbb,$activationCode){
            
    $query=$dbb->prepare("SELECT * FROM Registration WHERE activation_code='$activationCode'") ;//or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
        }


        function display_rooms($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM rooms ") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_device($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM device ") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_device_status($dbb,$id,$stat)
        {
            $query=$dbb->prepare("UPDATE `device` SET `device_status` = ? WHERE `device_id`=?") ;//or die($this->conn->error);
            $query->bind_param("ii",$stat,$id);
			
			if($query->execute()){
				
				return true;
			}
        }


        function select_status($dbb,$id)
        {
            $query=$dbb->prepare("SELECT `device_status` FROM `device` WHERE `device_id`='$id' LIMIT 1 ") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function select_date($dbb,$id)
        {
            $query=$dbb->prepare("SELECT `update_date_time` FROM `device` WHERE `device_id`='$id' LIMIT 1 ") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_sensors($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM sensor ") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

     





        function add_schedule($dbb,$from,$to,$duration,$timer,$device_id,$room_id,$user_id,$setTime){
			$query="INSERT INTO `scheduler` (`from`, `to`,`duration`,`setTime`,`device_id`, `room_id`,`reg_id`,`set_Time`) VALUES(?, ?,?, ?, ?, ?,?,?)" ;//or die($this->conn->error);
			$data = $dbb->prepare($query);
            
            $data->bind_param("ssisiiis",$from, $to, $duration,$timer,$device_id,$room_id,$user_id,$setTime);
            return $data->execute();
	
        }


        function add_device($dbb,$category,$device_name,$sensor_id,$device_image1,$device_image2,$status,$roomID,$dateTime){
			$query="INSERT INTO `device` (`device_category`, `device_name`,`sensor_id`, `device_image1`, `device_image2`,`device_status`,`room_id`,`update_date_time`) VALUES(?, ?, ?, ?, ?,?,?,?)" ;//or die($this->conn->error);
			$data = $dbb->prepare($query);
            
            $data->bind_param("ssissiis",$category, $device_name, $sensor_id, $device_image1,$device_image2,$status,$roomID,$dateTime);
            return $data->execute();
	
        }



        function display_schedule($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler INNER JOIN `device` ON scheduler.device_id=device.device_id INNER JOIN `Rooms` ON scheduler.room_id=Rooms.room_id WHERE reg_id=?") ;//or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        //display all users
        function display_users($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM Registration WHERE type NOT IN ('Admin')") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        //this will return total numbers of rows
        function get_total_rows($dbb, $device_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler WHERE device_id=?") ;//or die($this->conn->error);
            $query->bind_param("i", $device_id);
            if($query->execute()){
                $result=$query->get_result();
                $count =mysqli_num_rows($result);
                return $count;
                
            
            }
        }

        function get_duration($dbb, $device_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler WHERE device_id=?") ;//or die($this->conn->error);
            $query->bind_param("i", $device_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_AllDevice($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM device INNER JOIN `sensor` ON device.sensor_id=sensor.sensor_id INNER JOIN `Rooms` ON device.room_id=Rooms.room_id") ;//or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_ONEDevice($dbb, $id)
        {
            $query=$dbb->prepare("SELECT * FROM device INNER JOIN `sensor` ON device.sensor_id=sensor.sensor_id INNER JOIN `Rooms` ON device.room_id=Rooms.room_id WHERE device_id=?") ;//or die($this->conn->error);
            $query->bind_param("i", $id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }





        function update_schedule($dbb,$s_id,$from,$to,$duration,$device_id,$room_id){
			$query=$dbb->prepare("UPDATE `scheduler` SET `from`=?, `to`=?, `duration`=?,`device_id`=?,`room_id`=? WHERE `scheduler_id`=?") ;//or die($this->conn->error);
			$query->bind_param("sssiii",$from, $to, $duration,$device_id,$room_id,$s_id);
			
			if($query->execute()){
				
				return true;
			}
		}

        function get_schedule($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler INNER JOIN `device` ON scheduler.device_id=device.device_id INNER JOIN `Rooms` ON scheduler.room_id=Rooms.room_id WHERE scheduler_id=?") ;//or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

         function delete_schedule($dbb, $user_id){
			$query=$dbb->prepare("DELETE FROM `scheduler` WHERE scheduler_id=?") ;//or die($this->conn->error);
			$query->bind_param("i", $user_id);
            if($query->execute()){
				
				return true;
			}
		}

        function add_room($dbb,$room_name,$room_number,$reg_id){
			$query="INSERT INTO `rooms` (`room_name` ,`room_number`,`reg_id`) VALUES(?,?,?)" ;//or die($this->conn->error);
			$data = $dbb->prepare($query);      
            $data->bind_param("sii", $room_name, $room_number,$reg_id);
            return $data->execute();
	
        }



?>