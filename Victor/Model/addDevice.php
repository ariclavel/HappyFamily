
<?php
date_default_timezone_set("Etc/GMT+8");
include '../View/adding_and_remove_devices.php';
require 'conn.php';
$sensor_name= $_POST['sname'];
$mode= $_POST['mode'];
$s_desc= $_POST['ds'];
$type=$_POST['type'];
$date=date("Y-m-d H:i:s");
$room_id=$_POST['roomid'];


$sensor_id = $room_id;
$query="INSERT INTO `sensor`(`sensor_name`, `mode`, `s_desc`, `type`, `date`, `room_id`) VALUES(?, ?, ?, ?, ?, ?)" or die($this->conn->error);
$data = $db->prepare($query);
            
$data->bind_param($sensor_name, $mode, $s_desc, $type, $date, $room_id);

return $data->execute();

?>