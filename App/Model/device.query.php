<?php
require 'connectionreturn.php';
//require '../vendor/autoload.php';
//include ('../View/filter_string.php');
function device_get($userid){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT sensor_name FROM sensor JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
        }
}
function device_post($sensor_name,  $mode, $s_desc, $type, $date){
    $conn = connection();
    if($conn){
        
        $request = "INSERT INTO sensor(sensor_id, sensor_name, mode, s_desc, type, date, room_id) VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7)";
        $statement = $conn->prepare($request);
        $statement->bindParam(':value1', "2");
        $statement->bindParam(':value2', $sensor_name);
        $statement->bindParam(':value3', $mode);
        $statement->bindParam(':value4', $s_desc);
        $statement->bindParam(':value5', $type);
        $statement->bindParam(':value6', $date);
        $statement->bindParam(':value7', "1");
        
       
    
        return $statement->execute();
    }else{
        echo "caca0";
        return false;
    }
    
    
    
}

?>