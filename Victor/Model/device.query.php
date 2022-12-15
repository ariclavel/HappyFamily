<?php
require 'conn.php';
//require '../vendor/autoload.php';
//include ('../View/filter_string.php');
function device_get($dbb,$userid){
    //WHERE userid='$email'
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT sensor_name FROM sensor JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
        }
}

?>