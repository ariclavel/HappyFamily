<?php

date_default_timezone_set("Etc/GMT+8");
include '../View/contact.php';


    $message= $_POST['message']??="";
    //$userid= $_SESSION['id']; 
    if($message == ""){
        echo "<script>alert(\"Message empty\")</script>";
        echo "<script> location.replace('../View/contact.php'); </script>";

    }
    if(message_post($_SESSION['id'], $message)){
        echo "<script>alert(\"Message sended!\")</script>";
        echo "<script> location.replace('../View/contact.php'); </script>";
        
    }
    else{
        echo "<script>alert(\"Message NOT sended!\")</script>";
        echo "<script> location.replace('../View/contact.php'); </script>";
    }
    
    //echo "<script> location.replace('../View/devicesManage.php'); </script>";
   
   
?>