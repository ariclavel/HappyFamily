<?php
require 'connectionreturn.php';

function get_user($id){
    //WHERE userid='$email'
    $dbb = connection();
    //$query=$dbb->prepare("SELECT `message` FROM messages JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id={$userid};") or die($this->conn->error);
    $query=$dbb->prepare("SELECT `first_name`,`last_name` FROM registration WHERE reg_id = $id;") or die($this->conn->error);
       
    if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
    }

}


function message_get(){
    //WHERE userid='$email'
    $dbb = connection();
    //$query=$dbb->prepare("SELECT `message` FROM messages JOIN rooms ON sensor.room_id = rooms.room_id WHERE rooms.reg_id={$userid};") or die($this->conn->error);
    $query=$dbb->prepare("SELECT `message`,`id_user`,`id_message` FROM messages;") or die($this->conn->error);
       
    if($query->execute()){
            $result=$query->get_result();
            
            return $result;
            
    }
}



function message_delete($id){
    $dbb = connection();
    $query=$dbb->prepare("DELETE FROM `messages` WHERE id_message=$id");
        if($query->execute()){ 
            return true;
        }
        else{ 
            return false;
           
        }
}
function message_post($user_id, $message){
    $conn = connection();
    if($conn){
      

        $request = "INSERT INTO `messages`(`id_user`, `message`) VALUES ('$user_id', '$message')";
        $statement = $conn->prepare($request);
     
        if($statement->execute()){
           
            echo '<script type="text/javascript"> window.location.rel="noopener" target="_blank" href = "http://localhost/happyfamily/App/View/devicesManage.php";

            </script>';
           
        } else{
            echo "ERROR: Could not able to execute $request. " 
                                                . $conn->error;
            //header('Location: ../View/devicesManage.php');
        }
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