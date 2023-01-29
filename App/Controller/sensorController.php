<?php
date_default_timezone_set("Etc/GMT+8");
session_start();
require_once'../Model/rooms.php';
$msg="";

//this code will add new sensor to device
if (ISSET($_POST['Add_sensor']))
{

  //form data
   $sName= clean($_POST['sensor_name']);
   $sMode=clean($_POST['sensor_mode']);
   $sDesc=clean($_POST['sensor_desc']);
   $sType=clean($_POST['sensortype']);
 

   $date_created=date("Y-m-d H:i:s");

   $result2 = check_sensorName($db,$sName);
   
        if($result2->num_rows>0)
        {
            $msg = "<div class='alert text-danger'>Sorry sensor already exist</div>";
            header("Location: ../View/manage_sensor.php?msg=$msg");

        }
        else
        {
   if($sName !=" " && $sMode != " " &&  $sDesc != " " && !empty($sType))
   {
   $result =add_sensor($db,$sName,$sMode,$sDesc,$sType,$date_created);
   if($result)
   {

     $msg = "<div class='alert alert-info'>Sensor added successfully.</div>";
     
      header("Location: ../View/manage_sensor.php?msg=$msg"); 
   }
   else
   {
     
     $msg  = " <div class='alert text-danger'>There was an error adding sensor! Please Try again!</div>";
    
     header("Location: ../View/manage_sensor.php?msg=$msg"); 
   }
  }
  else
  {
    $msg  = " <div class='alert text-danger'>Error invalid information not allowed! Please Try again!</div>";
    header("Location: ../View/manage_sensor.php?msg=$msg"); 
  }
 }
 

}



//this code will update sensor details


$sID= $_GET['id'];
if (ISSET($_POST['Update_sensor']))
  {
   
    //form data
     $sName= clean($_POST['sensor_name']);
     $sMode=clean($_POST['sensor_mode']);
     $sDesc=clean($_POST['sensor_desc']);
     $sType=clean($_POST['sensortype']);
     
	 if(!empty($sName) || !empty($sMode) || !empty($sDesc) || !empty($sType))
	 {
     $result =Update_sensor($db,$sName,$sMode,$sDesc,$sType,$sID);
     if($result)
     {

       $msg = "<div class='alert alert-info'>Sensor updated successfully.</div>";
       
       header("Location: ../View/editSensor.php?id=$sID && msg=$msg"); 
     }
     else
     {
       //die("bad");
       $msg = " <div class='alert alert-danger'>There was an error updating sensor! Please Try again!</div>";
      
       header("Location: ../View/editSensor.php?id=$sID && msg=$msg"); 
     }
	}
	else
	{
	  $msg  = " <div class='alert text-danger'>Error invalid information not allowed! Please Try again!</div>";
	  header("Location: ../View/editSensor.php?id= $sID && msg=$msg"); 
	}
   }
  


?>