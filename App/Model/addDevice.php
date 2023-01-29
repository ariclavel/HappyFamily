
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
        
        echo "<script>alert(\"You need a room and a sensor name!!!\")</script>";
        echo "<script> location.replace('../View/devicesManage.php'); </script>";
        $podra = false;
      
        

    }
    elseif(!room_get($userid,$room_id)){
        
        echo "<script>alert(\"The room does not exist!!!\")</script>";
        echo "<script> location.replace('../View/devicesManage.php'); </script>";
        $podra = false;
       
     

    }
    else{
        $podra = true;
        if(strlen($s_desc)>50 or strlen($mode)>50 or strlen($sensor_name)>50){
            echo "<script>alert(\"Max of 50 characters for mode,description and name!!!\")</script>";
            echo "<script> location.replace('../View/devicesManage.php'); </script>";
            $podra = false;
            

        }



                 
        for ($i=0; $i<count($myArray); $i++){
                     
            
            if(json_encode($myArray[$i]["sensor_name"]) == $sensor_name){
                echo "<script>alert(\"Name already exists!!!\")</script>";
                echo "<script> location.replace('../View/devicesManage.php'); </script>";
                $podra = false;
                
            }
                      
        }
       
        if($podra == true) device_post($room_id, $sensor_name,  $mode, $s_desc, $type, $date);
        
        echo "<script> location.replace('../View/devicesManage.php'); </script>";
    } 
    //echo "<script> location.replace('../View/devicesManage.php'); </script>";
   
   
?>