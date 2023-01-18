
<?php

date_default_timezone_set("Etc/GMT+8");
include '../View/devicesManage.php';


    $sensor_name= $_POST['newname']??="";
    $mode= $_POST['newmode']??="";
    $s_desc= $_POST['newds']??="";
    $type= $_POST['newtype']??="";
    $id = $_POST['idsens'];
    
    device_update($id,$sensor_name,  $mode, $s_desc, $type);
    if($sensor_name != "" or $mode != "" or $s_desc != "" or $type != ""){
        
        echo "<script>alert(\"Updated done!!\")</script>";
    }
        
    
    echo "<script> location.replace('../View/devicesManage.php'); </script>";
?>