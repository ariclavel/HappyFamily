
<?php

date_default_timezone_set("Etc/GMT+8");
include '../View/devicesManage.php';


    $sensor_name= $_POST['sname']??="";
    $mode= $_POST['mode']??="";
    $s_desc= $_POST['ds']??="";
    $type= $_POST['type']??="";
    $date= date("Y-m-d H:i:s");
    $room_id= $_POST['roomid']??="";
   
    
    $userid= $_SESSION['id']; // this would store the session in a variable call $user
    //device_post($room_id, $sensor_name,  $mode, $s_desc, $type, $date);
    //Verify data
    if($sensor_name == "" or $room_id == ""){
        //header('Location: ../View/devicesManage.php');
        echo '<script type="text/javascript">
            
                window.onload = function () { alert("You need a device name and a room id!!"); }
            
        </script>';
        //header('Location: ../View/devicesManage.php');

    }
    elseif(!room_get($userid,$room_id)){
        //header('Location: ../View/devicesManage.php');
        echo '<script type="text/javascript">
            
                window.onload = function () { alert("The room number does not exist!!!"); }
            
        </script>';
        //header('Location: ../View/devicesManage.php');

    }
    else{
        device_post($room_id, $sensor_name,  $mode, $s_desc, $type, $date);
        //header('Location: ../View/devicesManage.php');
    } 
    
?>