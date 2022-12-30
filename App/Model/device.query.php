<?php
require 'connectionreturn.php';
//require '../vendor/autoload.php';
//include ('../View/filter_string.php');

function device_details($id){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT  `sensor_name`, `mode`, `s_desc`, `type` FROM `sensor` WHERE sensor_id = $id;") or die($this->conn->error);
    
    if($query->execute()){
        $query->store_result();
        $query->bind_result($sensorname, $mode, $description, $type);
        $rows = [];
        while ($query->fetch()) {
            $rows[] = [
                'name' => $sensorname,
                'mode' => $mode,
                'Description' => $description,
                'type' => $type,
            ];
        }
        
        return $rows[0];
            
    }
}
function device_get($userid){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT sensor_name,sensor_id FROM sensor JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='8';") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
        }
}
function device_max(){
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    /*$query=$dbb->prepare("SELECT MAX(sensor_id) AS id FROM sensor;") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
        }

    */
    $dbb->real_query("SELECT sensor_id FROM sensor ORDER BY id ASC");
    return $result = $dbb->use_result();

    echo "Result set order...\n";
    foreach ($result as $row) {
        echo " id = " . $row['id'] . "\n";
    }
    
}
function device_delete($deviceid){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("DELETE FROM `sensor` WHERE sensor_id=$deviceid");
        if($query->execute()){ 
            return true;
        }
        else{ 
            return false;
           
        }
}
function device_post($sensor_name,  $mode, $s_desc, $type, $date){
    $conn = connection();
    if($conn){
        $uno = "1";
        $dos = device_max();
        echo json_encode($dos);
      
        

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

function device_update($id, $sensor_name,  $mode, $s_desc, $type){
    $conn = connection();
    echo $id;
    //$id = "10";
    if($conn){
        if($sensor_name != ""){

            $sql = "UPDATE `sensor` SET `sensor_name`= '{$sensor_name}'  WHERE sensor_id = {$id}";
            if($conn->query($sql) === true){
                echo "Records was updated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " 
                                                    . $conn->error;
            }
            $conn->close();
            
            

        }
        if($mode != ""){
            $sql = "UPDATE `sensor` SET `mode`= '{$mode}'  WHERE sensor_id = {$id}";
            if($conn->query($sql) === true){
                echo "Records was updated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " 
                                                    . $conn->error;
            }
            $conn->close();
            
        }
        if($s_desc != ""){
            $sql = "UPDATE `sensor` SET `s_desc`= '{$s_desc}'  WHERE sensor_id = {$id}";
            if($conn->query($sql) === true){
                echo "Records was updated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " 
                                                    . $conn->error;
            }
            $conn->close();
            
            
        }
        if($type != ""){
            $sql = "UPDATE `sensor` SET `type`= '{$type}'  WHERE sensor_id = {$id}";
            if($conn->query($sql) === true){
                echo "Records was updated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " 
                                                    . $conn->error;
            }
            $conn->close();
            
            
        }
    }

}

?>