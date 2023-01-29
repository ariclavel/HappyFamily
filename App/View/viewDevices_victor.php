<?php
session_start();
require_once'../Model/rooms.php';


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
  <link rel="stylesheet" href="../css/view_device_form.css">
  
  
  

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
                          
                          $user= $_SESSION['id'];
                         //this would display empty list message
                         $stmt1 = "SELECT * FROM device WHERE userID='$user'";
                            $result=mysqli_query($db,$stmt1);
                            if(mysqli_num_rows($result)<=0)
                            {
                          ?>
                          <p id="empty_list">No control devicies added to your device lists</p>
                          <?php
                        }
                        ?>

                      <?php
                       
                        $tbl_schedule = display_AllDevice($db,$user);
						            while($fetch=$tbl_schedule->fetch_array()){ 
                            $deviceID = $fetch['device_id'];
                            $deviceStatus = $fetch['device_status'];
                       
					                	?>
                            
                          

                        <div class="product">
                              
                       
                        <img class="imgg"  id="imm" width="200px" height="200px" src="../img/device_pic/<?php if($deviceStatus==0){ echo $fetch['device_image1'];}else{ echo $fetch['device_image2'];} ?>"><br/>
                      
                            <table>
                               <tr>
                                <td>
                                NAME:
                                </td>
                                <td>
                                <p class="productname"><?php echo $fetch['device_name']; ?></p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                CATEGORY:
                                </td>
                                <td>
                                <p><?php echo $fetch['device_category']; ?></p>
                                </td>
                                </tr>
                            
                                <tr>
                                <td>
                                ROOM NAME:
                                </td>
                                <td>
                                <p><?php echo $fetch['room_name']; ?></p>
                                </td>
                                </tr>
                                <tr>
                                <td>
                                DEVICE CURRENTLY:
                                </td>
                                <td>
                                <p class="text-center" id="updatedAt"><?php if($fetch['device_status']==0){ echo "Off";}else{ echo "On";} ?> </p>
                                </td>
                                </tr>
                                

                                <tr>
                                <td>
                                <a href="viewDevices_victor2.php?deviceID=<?php echo $fetch['device_id']; ?>"><button type="submit"  class="addtocart" name="form_submit">control</button></a>
                               
                                </td>
                                <td>
                                
                                </td>
                                </tr>
                                
                            </table>
                          

                       
                                                
                            </div>
                            <?php
                             }
							?>

    
        </div>
        
  
</div>

   


    </div>


  </div>

  
  


</body>
</html>
