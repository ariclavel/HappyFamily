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

            function check_sensorName($dbb,$sensorName){
            
                $query=$dbb->prepare("SELECT * FROM sensor WHERE sensor_name='$sensorName'") or die($this->conn->error);
                    if($query->execute()){
                        $result=$query->get_result();
                        return $result;
                        
                    
                    }
                    }





            function check_pet($dbb,$pet_name){
            
                $query=$dbb->prepare("SELECT * FROM pet WHERE name='$pet_name'") or die($this->conn->error);
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

        function display_device_status($dbb,$id,$stat)
        {
            $query=$dbb->prepare("UPDATE `device` SET `device_status` = ? WHERE `device_id`=?") or die($this->conn->error);
            $query->bind_param("ii",$stat,$id);
			
			if($query->execute()){
				
				return true;
			}
        }


        function select_status($dbb,$id)
        {
            $query=$dbb->prepare("SELECT `device_status` FROM `device` WHERE `device_id`='$id' LIMIT 1 ") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function select_date($dbb,$id)
        {
            $query=$dbb->prepare("SELECT `update_date_time` FROM `device` WHERE `device_id`='$id' LIMIT 1 ") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_sensors($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM sensor ") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

     





        function add_schedule($dbb,$from,$to,$duration,$timer,$device_id,$room_id,$user_id,$setTime){
			$query="INSERT INTO `scheduler` (`from`, `to`,`duration`,`setTime`,`device_id`, `room_id`,`reg_id`,`set_Time`) VALUES(?, ?,?, ?, ?, ?,?,?)" or die($this->conn->error);
			$data = $dbb->prepare($query);
            
            $data->bind_param("ssisiiis",$from, $to, $duration,$timer,$device_id,$room_id,$user_id,$setTime);
            return $data->execute();
	
        }


        function add_device($dbb,$category,$device_name,$sensor_id,$device_image1,$device_image2,$status,$roomID,$user_id,$apart_id,$dateTime){
			$query="INSERT INTO `device` (`device_category`, `device_name`,`sensor_id`, `device_image1`, `device_image2`,`device_status`,`room_id`,`userID`,`apart_id`,`update_date_time`) VALUES(?, ?, ?, ?, ?,?,?,?,?,?)" or die($this->conn->error);
			$data = $dbb->prepare($query);
            
            $data->bind_param("ssissiiiis",$category, $device_name, $sensor_id, $device_image1,$device_image2,$status,$roomID,$user_id,$apart_id,$dateTime);
            return $data->execute();
	
        }


        
        function add_sensor($dbb,$sensor_name,$mode,$desc,$type,$dateTime){
			$query="INSERT INTO `sensor` (`sensor_name`, `mode`,`s_desc`, `type`,`date`) VALUES(?, ?, ?, ?, ?)" or die($this->conn->error);
			$data = $dbb->prepare($query);
            $data->bind_param("sssss",$sensor_name,$mode,$desc,$type,$dateTime);
            return $data->execute();
	
        }
            //Apartment queries
        function add_apartment($dbb,$apart_name,$apart_type,$numRooms,$user_id){
			$query="INSERT INTO `apartment` (`apartment_name`, `apartment_type`,`number_of_rooms`, `reg_id`) VALUES(?, ?, ?, ?)" or die($this->conn->error);
			$data = $dbb->prepare($query);
            $data->bind_param("ssii",$apart_name,$apart_type,$numRooms,$user_id);
            return $data->execute();
	
        }

        //this code would update apartment
    function Update_apartment($dbb,$apart_name,$apart_type,$numRooms,$id)
    {
        $query=$dbb->prepare("UPDATE `apartment` SET `apartment_name` = ?,`apartment_type` = ? ,`number_of_rooms` = ? WHERE `apartment_id`=?") or die($this->conn->error);
        $query->bind_param("ssii",$apart_name,$apart_type,$numRooms,$id);
        
        if($query->execute()){
            
            return true;
        }
    }

        function display_apartment($dbb, $apart_id)
        {
            $query=$dbb->prepare("SELECT * FROM apartment WHERE apartment_id=?") or die($this->conn->error);
            $query->bind_param("i", $apart_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function getApartmentByUsername($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM apartment WHERE reg_id=?") or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }


        function getRoomByApartment($dbb, $apart_id)
        {
            $query=$dbb->prepare("SELECT * FROM rooms WHERE apartment_id=?") or die($this->conn->error);
            $query->bind_param("i", $apart_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_AllApartments($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM apartment") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_Customers_AllApartments($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM apartment WHERE reg_id =?") or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function delete_apart($dbb, $A_id){
			$query=$dbb->prepare("DELETE FROM `apartment` WHERE apartment_id=?") or die($this->conn->error);
			$query->bind_param("i", $A_id);
            if($query->execute()){
				
				return true;
			}
		}



    //These queris are for managing rooms
    
    function add_room($dbb,$room_name,$room_no,$apart_id,$userID){
        $query="INSERT INTO `rooms` (`room_name`, `room_number`, `apartment_id`,`user_id`) VALUES(?, ?, ?,?)" or die($this->conn->error);
        $data = $dbb->prepare($query);
        $data->bind_param("siii",$room_name,$room_no,$apart_id,$userID);
        return $data->execute();

    }


    //These queris are for managing pets

    function add_pet($dbb,$category,$pet_name,$desc,$pic_name,$date,$user_id){
        $query="INSERT INTO `pet` (`category`, `name`, `desc`,`image`,`date`,`reg_id`) VALUES(?, ?, ?,?,?,?)" or die($this->conn->error);
        $data = $dbb->prepare($query);
        $data->bind_param("sssssi",$category,$pet_name,$desc,$pic_name,$date,$user_id);
        return $data->execute();

    }

    function display_pet($dbb, $reg_id)
    {
        $query=$dbb->prepare("SELECT * FROM pet WHERE reg_id=?") or die($this->conn->error);
        $query->bind_param("i", $reg_id);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
    }

    function display_One_pet($dbb, $pet_id)
    {
        $query=$dbb->prepare("SELECT * FROM pet WHERE pet_id=?") or die($this->conn->error);
        $query->bind_param("i", $pet_id);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
    }

    function delete_pet($dbb, $pet_id){
        $query=$dbb->prepare("DELETE FROM `pet` WHERE pet_id=?") or die($this->conn->error);
        $query->bind_param("i", $pet_id);
        if($query->execute()){
            
            return true;
        }
    }

    function Update_pet_image($dbb,$image,$pet_id)
    {
        $query=$dbb->prepare("UPDATE `pet` SET `image` = ? WHERE `pet_id`=?") or die($this->conn->error);
        $query->bind_param("si",$image,$pet_id);
        
        if($query->execute()){
            
            return true;
        }
    }

    function Update_pet($dbb,$category,$pet_name,$desc,$pet_id)
    {
        $query=$dbb->prepare("UPDATE `pet` SET `category`=?, `name`=?, `desc`=? WHERE `pet_id`=?") or die($this->conn->error);
        $query->bind_param("sssi",$category,$pet_name,$desc,$pet_id);
        
        if($query->execute()){
            
            return true;
        }
    }




    function display_room($dbb, $room_id)
    {
        $query=$dbb->prepare("SELECT * FROM rooms WHERE room_id=?") or die($this->conn->error);
        $query->bind_param("i", $room_id);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
    }

    function display_apart_room($dbb, $apart_id)
    {
        $query=$dbb->prepare("SELECT * FROM rooms WHERE apartment_id=?") or die($this->conn->error);
        $query->bind_param("i", $apart_id);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
    }

    function display_AllRooms($dbb)
    {
        $query=$dbb->prepare("SELECT * FROM rooms") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            return $result;
            
        
        }
    }

    function delete_room($dbb, $R_id){
        $query=$dbb->prepare("DELETE FROM `rooms` WHERE room_id=?") or die($this->conn->error);
        $query->bind_param("i", $R_id);
        if($query->execute()){
            
            return true;
        }
    }
    //this code would update room
    function Update_room($dbb,$roomName,$roomNumber,$id)
    {
        $query=$dbb->prepare("UPDATE `rooms` SET `room_name` = ?,`room_number` = ? WHERE `room_id`=?") or die($this->conn->error);
        $query->bind_param("sii",$roomName,$roomNumber,$id);
        
        if($query->execute()){
            
            return true;
        }
    }



    //this will return total numbers of rooms
    function get_total_rooms($dbb, $apart_id)
    {
        $query=$dbb->prepare("SELECT * FROM rooms WHERE apartment_id=?") or die($this->conn->error);
        $query->bind_param("i", $apart_id);
        if($query->execute()){
            $result=$query->get_result();
            $count =mysqli_num_rows($result);
            return $count;
            
        
        }
    }


    //this will return total numbers of users
    function get_total_users($dbb, $userType)
    {
        $query=$dbb->prepare("SELECT * FROM registration WHERE type=?") or die($this->conn->error);
        $query->bind_param("s", $userType);
        if($query->execute()){
            $result=$query->get_result();
            $count =mysqli_num_rows($result);
            return $count;
            
        
        }
    }


    //this will return total numbers of pets
    function get_total_pets($dbb)
    {
        $query=$dbb->prepare("SELECT * FROM pet") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            $count =mysqli_num_rows($result);
            return $count;
            
        
        }
    }

    //this will return total numbers of devices
    function get_total_devices($dbb)
    {
        $query=$dbb->prepare("SELECT * FROM device") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            $count =mysqli_num_rows($result);
            return $count;
            
        
        }
    }

     //this will return total numbers of messages
     function get_total_messages($dbb)
     {
         $query=$dbb->prepare("SELECT * FROM message") or die($this->conn->error);
         if($query->execute()){
             $result=$query->get_result();
             $count =mysqli_num_rows($result);
             return $count;
             
         
         }
     }




        function Update_device($dbb,$category,$device_name,$sensor_id,$device_image1,$device_image2,$roomID,$apartID,$id)
        {
            $query=$dbb->prepare("UPDATE `device` SET `device_category` = ?,`device_name` = ?,`sensor_id` = ?,`device_image1` = ?,`device_image2` = ?,`room_id` = ?,`apart_id` = ?  WHERE `device_id`=?") or die($this->conn->error);
            $query->bind_param("ssissiii",$category,$device_name,$sensor_id,$device_image1,$device_image2,$roomID,$apartID,$id);
			
			if($query->execute()){
				
				return true;
			}
        }

        function Update_device1($dbb,$category,$device_name,$sensor_id,$roomID,$apartID,$id)
        {
            $query=$dbb->prepare("UPDATE `device` SET `device_category` = ?,`device_name` = ?,`sensor_id` = ?,`room_id` = ?,`apart_id` = ? WHERE `device_id`=?") or die($this->conn->error);
            $query->bind_param("ssiiii",$category,$device_name,$sensor_id,$roomID,$apartID,$id);
			
			if($query->execute()){
				
				return true;
			}
        }

        function Update_sensor($dbb,$sensor_name,$mode,$desc,$type,$id)
        {
            $query=$dbb->prepare("UPDATE `sensor` SET `sensor_name` = ?,`mode` = ?,`s_desc` = ?,`type` = ? WHERE `sensor_id`=?") or die($this->conn->error);
            $query->bind_param("ssssi",$sensor_name,$mode,$desc,$type,$id);
			
			if($query->execute()){
				
				return true;
			}
        }



        function display_schedule($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler INNER JOIN `device` ON scheduler.device_id=device.device_id INNER JOIN `Rooms` ON scheduler.room_id=Rooms.room_id WHERE scheduler.reg_id=?") or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
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

        //this will return total numbers of rows
        function get_total_rows($dbb, $device_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler WHERE device_id=?") or die($this->conn->error);
            $query->bind_param("i", $device_id);
            if($query->execute()){
                $result=$query->get_result();
                $count =mysqli_num_rows($result);
                return $count;
                
            
            }
        }

        function get_duration($dbb, $device_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler WHERE device_id=?") or die($this->conn->error);
            $query->bind_param("i", $device_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_AllDevice($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM device INNER JOIN `sensor` ON device.sensor_id=sensor.sensor_id INNER JOIN `Rooms` ON device.room_id=Rooms.room_id WHERE userID=?") or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function AllDevices($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM device INNER JOIN `sensor` ON device.sensor_id=sensor.sensor_id INNER JOIN `Rooms` ON device.room_id=Rooms.room_id") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function AllSensors($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM sensor") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }


        function display_AllPets($dbb)
        {
            $query=$dbb->prepare("SELECT * FROM pet INNER JOIN `registration` ON pet.reg_id=registration.reg_id") or die($this->conn->error);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }





        function display_ONEDevice($dbb, $id)
        {
            $query=$dbb->prepare("SELECT * FROM device INNER JOIN `sensor` ON device.sensor_id=sensor.sensor_id INNER JOIN `Rooms` ON device.room_id=Rooms.room_id WHERE device_id=?") or die($this->conn->error);
            $query->bind_param("i", $id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

        function display_ONESensor($dbb, $id)
        {
            $query=$dbb->prepare("SELECT * FROM sensor WHERE sensor_id=?") or die($this->conn->error);
            $query->bind_param("i", $id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }





        function update_schedule($dbb,$s_id,$from,$to,$duration,$device_id,$room_id){
			$query=$dbb->prepare("UPDATE `scheduler` SET `from`=?, `to`=?, `duration`=?,`device_id`=?,`room_id`=? WHERE `scheduler_id`=?") or die($this->conn->error);
			$query->bind_param("sssiii",$from, $to, $duration,$device_id,$room_id,$s_id);
			
			if($query->execute()){
				
				return true;
			}
		}

        function get_schedule($dbb, $user_id)
        {
            $query=$dbb->prepare("SELECT * FROM scheduler INNER JOIN `device` ON scheduler.device_id=device.device_id INNER JOIN `Rooms` ON scheduler.room_id=Rooms.room_id WHERE scheduler_id=?") or die($this->conn->error);
            $query->bind_param("i", $user_id);
            if($query->execute()){
                $result=$query->get_result();
                return $result;
                
            
            }
        }

         function delete_schedule($dbb, $S_id){
			$query=$dbb->prepare("DELETE FROM `scheduler` WHERE scheduler_id=?") or die($this->conn->error);
			$query->bind_param("i", $S_id);
            if($query->execute()){
				
				return true;
			}
		}

        function delete_device($dbb, $D_id){
			$query=$dbb->prepare("DELETE FROM `device` WHERE device_id=?") or die($this->conn->error);
			$query->bind_param("i", $D_id);
            if($query->execute()){
				
				return true;
			}
		}
        
        function delete_user($dbb, $user_id){
			$query=$dbb->prepare("DELETE FROM `Registration` WHERE reg_id=?") or die($this->conn->error);
			$query->bind_param("i", $user_id);
            if($query->execute()){
				
				return true;
			}
		}

        function delete_sensor($dbb, $s_id){
			$query=$dbb->prepare("DELETE FROM `sensor` WHERE sensor_id=?") or die($this->conn->error);
			$query->bind_param("i", $s_id);
            if($query->execute()){
				
				return true;
			}
      
        }


?>