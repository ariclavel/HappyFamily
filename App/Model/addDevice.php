
<?php

date_default_timezone_set("Etc/GMT+8");
include '../View/devicesManage.php';


    $sensor_name= $_POST['sname']??="";
    $mode= $_POST['mode']??="";
    $s_desc= $_POST['ds']??="";
    $type= $_POST['type']??="";
    $date= date("Y-m-d H:i:s");
    $room_id= $_POST['roomid']??="";
    $sensor_id = $room_id;

    return device_post($sensor_name,  $mode, $s_desc, $type, $date);
?>