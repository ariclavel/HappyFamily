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
function room_get($userid,$roomid){
    
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT EXISTS (SELECT * FROM rooms WHERE reg_id={$userid} AND room_id = {$roomid});") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            $row=mysqli_fetch_row($result);
            echo $row[0];
            if ($row[0]=="1"){
                return true;
            }
            else return false;
            
        }
}

function room_get_all($userid){
    
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT * FROM rooms WHERE reg_id={$userid};") or die($this->conn->error);
        if($query->execute()){
            $result=$query->get_result();
            //$row=mysqli_fetch_row($result);
            return $result;
            
        }
}
function device_get($userid){
    //WHERE userid='$email'
    $dbb = connection();
    //SELECT `sensor_name` FROM `sensor` JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id='3';
    $query=$dbb->prepare("SELECT sensor_name, sensor_id, sensor.room_id FROM sensor JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id={$userid};") or die($this->conn->error);
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
    $dbb->real_query("SELECT sensor_id FROM sensor ORDER BY sensor_id DESC");
    
    $result = $dbb->use_result();
    echo "Result set order...\n";
    foreach ($result as $row) {
        return $row['sensor_id'];
        echo " id = " . $row['sensor_id'] . "\n";
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
function device_post($roomid, $sensor_name, $mode, $s_desc, $type, $date){
    $conn = connection();
    if($conn){
      
        $id = device_max();
        $id = $id+1;
       

        $request = "INSERT INTO `sensor`(`sensor_id`, `sensor_name`, `mode`, `s_desc`, `type`, `date`, `room_id`) VALUES ('$id', '$sensor_name', '$mode', '$s_desc', '$type', '$date', '$roomid')";
        //echo $request;
        
        //$request = "INSERT INTO sensor(sensor_id, sensor_name, mode, s_desc, type, date, room_id) VALUES ($dos, $sensor_name, $mode, $s_desc, $type, $date, $uno)";
        //echo "INSERT INTO sensor(sensor_id, sensor_name, mode, s_desc, type, date, room_id) VALUES ($dos, $sensor_name, $mode, $s_desc, $type, $date, $uno)";
        
        $statement = $conn->prepare($request);
     
        if($statement->execute()){
           /* echo '<script type="text/javascript">
            
                window.onload = function () { alert("CREATED!"); }
        
            </script>';*/
            echo '<script type="text/javascript"> window.location.rel="noopener" target="_blank" href = "http://localhost/happyfamily/App/View/devicesManage.php";

            </script>';
           
        } else{
            echo "ERROR: Could not able to execute $request. " 
                                                . $conn->error;
            //header('Location: ../View/devicesManage.php');
        }
        //return $statement->execute();
    }else{
        echo "no connection!";
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