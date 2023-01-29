
<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';
session_start();


$Did=$_GET['deviceID'];
if(isset($_GET['xxx']))
{
  $keyValue=$_GET['xxx'];
}

 //$deviceIDD= $_SESSION['Did'];
 //this code will run on page load
 $result2 = select_status($db,  $Did);
$fetch=$result2->fetch_array();
$status =$fetch['device_status'];
 if ($status) {//status = 1 (on)
     $status_str = "on";
     $checked_status = "checked";
 } else {
     $status_str = "off";
     $checked_status = "";
 }

 if (isset($_POST['form_submit'])) {//Form was submitted
     (isset($_POST['machine_state'])) ? $status = 1 : $status = 0;
     //Update DB
     $result = display_device_status($db,$Did,$status);
     //this will run after update load
     $result2 = select_status($db,  $Did);
     $fetch=$result2->fetch_array();
     $status =$fetch['device_status'];
      if ($status) {//status = 1 (on)
          $status_str = "on";
          $checked_status = "checked";
      } else {
          $status_str = "off";
          $checked_status = "";
      }





 } else {//Page was loaded
     //$status = $_SESSION['device_status'];
 }

 

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Happy Family</title>

  
  <!-- Font Awesome Cdn Link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  <link rel="stylesheet" href="../css/view_device_form2.css">

</head>

<body>
<?php
include("Dashboard_header.php");
?>

 
  <div class="container">
  <?php
include("Dashboard_left_menu.php");
?>
   

<div class="main-body">
   
<div class="content">

<div class="cont"> 
   <h1>CONTROL DEVICES PAGE</h1>
<div class="productcont">
                      <?php
                         
                      
                        $tbl_schedule = display_ONEDevice($db,$Did);
						            $fetch=$tbl_schedule->fetch_array();
                          $deviceID = $fetch['device_id'];
                          $deviceStatus = $fetch['device_status'];
                        
                        
                         
						?>



                        <div class="product">
                              
                        <form method="POST" id="toggleForm">
                        <img class="imgg"  id="imm" width="200px" height="200px" src="../img/device_pic/<?php if($deviceStatus==0){ echo $fetch['device_image1'];}else{ echo $fetch['device_image2'];} ?>"><br/>
                      
                            <table>
                               <tr>
                                <td>
                                Name:
                                </td>
                                <td>
                                <p class="productname"><?php echo $fetch['device_name']; ?></p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                Category:
                                </td>
                                <td>
                                <p><?php echo $fetch['device_category']; ?></p>
                                </td>
                                </tr>
                            
                                <tr>
                                <td>
                                Room name:
                                </td>
                                <td>
                                <p><?php echo $fetch['room_name']; ?></p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                Last update:
                                </td>
                                <td>
                                <p class="text-center" id="updatedAt">Last updated at: </p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                <label class="switch" id="statusText" for="customSwitch<?php echo $deviceID; ?>">
                                    <input type="checkbox" class="custom-control-input"  id="customSwitch<?php echo $deviceID; ?>" name='machine_state'<?php echo $checked_status; ?>>
                                    <span class="slider round"></span>
                                    
                                    </label> 
                                </td>
                                <td>
                                <button type="submit" class="addtocart" name="form_submit">Update</button>
                                </td>
                                </tr>

                                <tr>
                                <td>
                        
                                <span>Currently: </span>
                                </td>
                                <td>
                                <span><?php echo $status_str; ?></span>
                                </td>
                                </tr>
                            </table>
                            <input type="hidden" name="submit" value="">
                            
                            </form>

                       
                                                
                            </div>

                            <?php 
                              $Did=$_GET['deviceID'];
                              $count_rows = get_total_rows($db,$Did);
                              if($count_rows > 0)
                              {
                                $Totalduration = get_duration($db,$Did);
                                $fetch2=$Totalduration->fetch_array();
                                $duration= $fetch2['duration'];
                               ?>
                           
  
                                
                              <div class="product">
                                  <div class="container timeBar ys1" data=<?php echo $duration?>></div>
                              </div>
                              <?php 
                              }
                              ?>
                              
                           
        </div>
        
  
</div>

   


    </div>


  </div>

  
<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script src="countdown.js"></script>
<script src="../js/count_down.js"></script>
</body>
</html>
