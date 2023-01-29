<?php
date_default_timezone_set("Etc/GMT+8");
session_start();
require_once'../Model/rooms.php';
$msg="";
unset($_SESSION['message']);


// This code uses ajax to auto cascade apartment to user and rooms to apartment
if (isset($_POST['getApartmentByUsername']) == "getApartmentByUsername") {
    $user_id = $_POST['userId'];
   
    $apartments = getApartmentByUsername($db,$user_id);
    $apartData = '<option value="">Select apartment</option>';
    if ($apartments->num_rows>0){
        while ($apartment = $apartments->fetch_object()) {
            $apartData .= '<option value="'.$apartment->apartment_id.'">'.$apartment->apartment_name.'</option>';
        }
    }
    echo "test^".$apartData;
}
if (isset($_POST['getRoomByApartment']) == "getRoomByApartment") {
    $apart_id = $_POST['apartmentId'];
   
    $roomss = getRoomByApartment($db,$apart_id);
    $roomData = '<option value="">Select Room</option>';
    if ($roomss->num_rows>0){
        while ($room = $roomss->fetch_object()) {
            $roomData .= '<option value="'.$room->room_id.'">'.$room->room_name.'</option>';
        }
    }
    echo "test^".$roomData;
}



// This code insert new device into the database

if (ISSET($_POST['Add_Device']))
  {
    //for image1
 $pic1 = $_FILES['device_pic1'];
 $picName1 = $pic1['name'];
 $picTmpName1 = $pic1['tmp_name'];
 $picError1 = $pic1['error'];
 $picExt1 = explode('.', $picName1);
 $picActualExt1 = strtolower(end($picExt1));


  //for image2
  $pic2 = $_FILES['device_pic2'];
  $picName2 = $pic2['name'];
  $picTmpName2 = $pic2['tmp_name'];
  $picError2 = $pic2['error'];
  $picExt2 = explode('.', $picName2);
  $picActualExt2 = strtolower(end($picExt2));


 $allowed = array('jpg','jpeg','png');
 
 if(in_array($picActualExt1, $allowed) && in_array($picActualExt2, $allowed))
 {
  



   if($picError1 === 0  && $picError2 === 0)
   {
     //pic1
    
     $randomm1=rand(10,999999);
     $picNameNew1 = $pic1.$randomm1.".".$picActualExt1;
     $picDestination = "../img/device_pic/".$picNameNew1;
     move_uploaded_file($picTmpName1, $picDestination);

     //pic2
     $randomm2=rand(99,888888888);
     $picNameNew2 = $pic2.$randomm2.".".$picActualExt2;
     $picDestination = "../img/device_pic/".$picNameNew2;
     move_uploaded_file($picTmpName2, $picDestination);

    //form data
     $category= clean($_POST['category']);
     $deviceName=clean($_POST['device_name']);
     $sensorID=clean($_POST['sensor']);
     $roomID=clean($_POST['room']);
     $user=clean($_POST['user']);
     $apartmentID=clean($_POST['apartment']);
     $date_created=date("Y-m-d H:i:s");
     
     if(!empty($category) && $deviceName !=" " && !empty($sensorID) && !empty($roomID) && !empty($apartmentID))
     {
     $result =add_device($db,$category,$deviceName,$sensorID,$picNameNew1,$picNameNew2,0,$roomID,$user,$apartmentID,$date_created);
     if($result)
     {
       
       
       $msg = "<div class='alert alert-info'>Device added successfully.</div>";
       $_SESSION['message']=$msg;
       header("Location: ../View/device_add.php?msg=$msg");
     
     }
     else
     {
       //die("bad");
       $msg = " <div class='alert alert-danger'>There was an error in uploading your devie Image! Please Try again!</div>";
       
       header("Location: ../View/device_add.php?msg=$msg");
     }
    }
    else
    {
        $msg =  "<div class='alert alert-danger'>Error! invalid data not allowed.</div>";
     
      header("Location: ../View/device_add.php?msg=$msg");
    }
   }
   else
   {
    $msg = "<div class='alert alert-danger'>There was an error in uploading your device image! Please Try again!</div>";
    
     header("Location: ../View/device_add.php?msg=$msg");
   }
 }
 else
 {
    $msg  = "<div class='alert alert-danger'>You cannot upload files with this extension</div>";
    
   header("Location: ../View/device_add.php?msg=$msg");
 }
}





//this code would edit and update devices

$idd = $_GET['id'];
if (ISSET($_POST['Update_device']))
  {
   
    //for image1
 $pic1 = $_FILES['device_pic1'];
 $picName1 = $pic1['name'];
 $picTmpName1 = $pic1['tmp_name'];
 $picError1 = $pic1['error'];
 $picExt1 = explode('.', $picName1);
 $picActualExt1 = strtolower(end($picExt1));


  //for image2
  $pic2 = $_FILES['device_pic2'];
  $picName2 = $pic2['name'];
  $picTmpName2 = $pic2['tmp_name'];
  $picError2 = $pic2['error'];
  $picExt2 = explode('.', $picName2);
  $picActualExt2 = strtolower(end($picExt2));


  $category= clean($_POST['category']);
  $deviceName=clean($_POST['device_name']);
  $sensorID=clean($_POST['sensor']);
  $roomID=clean($_POST['room']);
  $user=clean($_POST['user']);
  $apartmentID=clean($_POST['apartment']);
  $date_created=date("Y-m-d H:i:s");




 $allowed = array('jpg','jpeg','png');
 //update when files not uploaded
  if($_FILES["device_pic1"]["error"] == 4 && $_FILES["device_pic2"]["error"] == 4) {
    if(!empty($category) && $deviceName !=" " && !empty($sensorID) && !empty($roomID) && !empty($apartmentID))
     {
      $result_1 =Update_device1($db,$category,$deviceName,$sensorID,$roomID,$apartmentID,$idd);
      
      if($result_1)
     {

     
       
       $msg  = "<div class='alert alert-info'>Device updated successfully.</div>";
       
       header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
       
      
     }
     else
     {
       //die("bad");
       $msg = " <div class='alert alert-danger'>There was an error in uploading your device Image! Please Try again!</div>";
      
       header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
      
       
     }
    }
    else
    {
      $msg = "<div class='alert alert-danger'>Error! invalid data not allowed.</div>";
     
      header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
    }
    
    }
 
    else
    {





 if(in_array($picActualExt1, $allowed) && in_array($picActualExt2, $allowed))
 {
   if($picError1 === 0  && $picError2 === 0)
   {
     //pic1
     $randomm1=rand(10,999999);
     $picNameNew1 = $pic1.$randomm1.".".$picActualExt1;
     $picDestination = "../img/device_pic/".$picNameNew1;
     move_uploaded_file($picTmpName1, $picDestination);

     //pic2
     $randomm2=rand(99,888888888);
     $picNameNew2 = $pic2.$randomm2.".".$picActualExt2;
     $picDestination = "../img/device_pic/".$picNameNew2;
     move_uploaded_file($picTmpName2, $picDestination);

    
 
     if(!empty($category) && $deviceName !=" " && !empty($sensorID) && !empty($roomID) && !empty($apartmentID))
     {

     $result =Update_device($db,$category,$deviceName,$sensorID,$picNameNew1,$picNameNew2,$roomID,$apartmentID,$idd);
     
     if($result)
     {
      
       $msg = "<div class='alert alert-info'>Device updated successfully.</div>";
       
       header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
       
     }
     else
     {
       
       $msg = " <div class='alert alert-danger'>There was an error in uploading your devie Image! Please Try again!</div>";
      
       header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
     }
    
   }
    else
    {
      $msg = "<div class='alert alert-danger'>Error! invalid data not allowed.</div>";
      
      header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
    }
  }
   else
   {
     $msg = "<div class='alert alert-danger'>There was an error in uploading your device image! Please Try again!</div>";
    
     header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
   }
  
 }
 else
 {
   $msg = "<div class='alert alert-danger'>You cannot upload files with this extension</div>";
   
   header("Location: ../View/editDevice.php?id=$idd && msg=$msg");
 }
}

}





?>