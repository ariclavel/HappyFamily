<?php
require 'connectionreturn.php';
//require '../vendor/autoload.php';
//include ('../View/filter_string.php');
function device_get($userid){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT sensor_name FROM sensor JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='8';") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
        }
}
function device_delete($deviceid){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("DELETE FROM `sensor` WHERE sensor_id=$deviceid");
        if($query->execute()){ 
            echo '<script type="text/javascript">

                    window.onload = function () { alert("Your device has been deleted!"); }

            </script>';
            header('Location: ../View/devicesManage.php');
            
        }
        else{
            echo '<script type="text/javascript">

                    window.onload = function () { alert("Your device COULD NOT being deleted!"); }

            </script>';
            header('Location: ../View/devicesManage.php');
        }
}
function device_post($sensor_name,  $mode, $s_desc, $type, $date){
    $conn = connection();
    if($conn){
        $dos = "4";
        $uno = "1";

        $request = "INSERT INTO `sensor`(`sensor_id`, `sensor_name`, `mode`, `s_desc`, `type`, `date`, `room_id`) VALUES ('$dos', '$sensor_name', '$mode', '$s_desc', '$type', '$date', '$uno')";
        //echo $request;
        
        //$request = "INSERT INTO sensor(sensor_id, sensor_name, mode, s_desc, type, date, room_id) VALUES ($dos, $sensor_name, $mode, $s_desc, $type, $date, $uno)";
        //echo "INSERT INTO sensor(sensor_id, sensor_name, mode, s_desc, type, date, room_id) VALUES ($dos, $sensor_name, $mode, $s_desc, $type, $date, $uno)";
        
        $statement = $conn->prepare($request);
     
       
    
        return $statement->execute();
    }else{
        echo "INSERT INTO sensor(sensor_id, sensor_name, mode, s_desc, type, date, room_id) VALUES (:value1, :value2, :value3, :value4, :value5, :value6, :value7)";
        return false;
    }
    
    
    
}

?>