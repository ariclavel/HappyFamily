
<?php

date_default_timezone_set("Etc/GMT+8");
include '../View/adding_and_remove_devices.php';
require 'conn.php';
$conn=$db;
$sensor_name= $_POST['sname']??="";;
$mode= $_POST['mode']??="";;
$s_desc= $_POST['ds']??="";;
$type= $_POST['type']??="";;
$date= date("Y-m-d H:i:s");
$room_id= $_POST['roomid']??="";;
$sensor_id = $room_id;

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



?>