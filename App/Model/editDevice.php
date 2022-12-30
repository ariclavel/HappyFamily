
<?php

date_default_timezone_set("Etc/GMT+8");
include '../View/devicesManage.php';


    $sensor_name= $_POST['newname']??="";
    $mode= $_POST['newmode']??="";
    $s_desc= $_POST['newds']??="";
    $type= $_POST['newtype']??="";
    $id = $_POST['idsens'];
    
    if(device_update($id,$sensor_name,  $mode, $s_desc, $type));
    header('Location: ../View/devicesManage.php');
?>