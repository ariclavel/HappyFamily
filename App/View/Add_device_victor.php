<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();


if (ISSET($_POST['submit']))
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
     $date_created=date("Y-m-d H:i:s");

     $result =add_device($db,$category,$deviceName,$sensorID,$picNameNew1,$picNameNew2,0,$roomID,$date_created);
     if($result)
     {

       $_SESSION['message'] = "<div class='alert alert-info'>Device added successfully.</div>";
       
       header("Location: Add_device_victor.php");
     }
     else
     {
       //die("bad");
       $_SESSION['message'] = " <div class='alert alert-danger'>There was an error in uploading your devie Image! Please Try again!</div>";
      
       header("Location: Add_device_victor.php");
     }
   }
   else
   {
     $_SESSION['message'] = "<div class='alert alert-danger'>There was an error in uploading your device image! Please Try again!</div>";
     header("Location: Add_device_victor.php");
   }
 }
 else
 {
   $_SESSION['message'] = "<div class='alert alert-danger'>You cannot upload files with this extension</div>";
   header("Location: Add_device_victor.php");
 }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>

  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  <style type="text/css">
   .text-danger{
    color:red;
   }
   .alert-info{
    color:green;
   }
   .main-body{
    margin-right: 230px;
   }
   .side_navbar{
    background-color:#fff;
   }
   #imm{
    padding: 15px;
   }
   .btnn, #btnn{
    background: #f85508;
    border:none;
    color:white;
   }
   .settings
   {
    background:red;
    
   }
   @media (max-width: 1200px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 30px;}
  .search_box{margin-left: 60px;}
  .both{display: block;}
  .profile{display: -webkit-box;}

}
@media (max-width: 950px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 30px;}
  .search_box{margin-left: 60px;}
  .both{display: block;}
  .profile{display: -webkit-box;}
  .search_box input{width: 170px;}
  .content{width: 500px;}
  .form-control{width: 300px;}
}
@media (max-width: 840px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 30px;}
  .search_box{margin-left: 60px;}
  .both{display: block;}
  .profile{display: -webkit-box;}
  .search_box input{width: 200px;}
  .content{width: 450px;}
  .form-control{width: 275px;}
}
@media (max-width: 715px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 30px;}
  .search_box{margin-left: 60px;}
  .both{display: block;}
  .profile{display: -webkit-box;}
  .search_box input{width: 200px;}
  .content{width: 450px;}
  .side_navbar{width: 120px;}
  .side_navbar a{padding: 10px;}
  .form-control{width: 250px;}
}
@media (max-width: 650px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 15px;}
  .search_box{margin-left: 15px;}
  .both{display: block;}
  .profile{display: -webkit-box;}
  .search_box input{width: 200px;}
  .content{width: 300px;}
  .middle_part{width: 150px;}
.form-control{width:250px;}
  .both{margin: 0px;}
  .table td, th{padding: none;}
}

  
 
  </style>
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

<form method="POST" enctype="multipart/form-data">
         <table>
         <tr>
               <th><h4 class="text-right">ADD DEVICES</h4></th>
        </tr>
                <tr>
                            <td> 
                            <select class="form-control" name="category" id="subject">
                            <option value="" selected="selected">Select Category</option>
                                    
                                    
                                 <option>Blinds</option>
                                 <option>Cameras</option>
                                 <option>Doors</option>
                                 <option>Windows</option>
                                 <option>lights</option>
                                 <option>Feeder</option>
                                    
                                 </select>
                            </td>
                           
                
                </tr>
                <tr>
                           
                            <td>
                            <input type="text" placeholder ="Device name" class="form-control"  name="device_name">
                            </td>
                </tr>
                <tr>
                       
                        <td>
                        <select class="form-control" name="sensor">
                                            <option value="" selected="selected">Select sensor type</option>
                                            <?php
                                             
                                             $tbl_ltype = display_sensors($db);
                                             while($row=$tbl_ltype->fetch_array()){
                                     ?>
                                     
                                 <option value="<?php echo $row['sensor_id']?>"><?php echo $row['sensor_name']?></option>
                                     <?php
                                        }
                                     ?>
                        
                                        </select>
                        
                    
                       </td>
                 
                    
                </tr>

                <tr>
                       
                       <td>
                       <select class="form-control" name="room">
                                           <option value="" selected="selected">Select Room</option>
                                           <?php
                                            
                                            $tbl_ltype = display_rooms($db);
                                            while($row=$tbl_ltype->fetch_array()){
                                    ?>
                                    
                                <option value="<?php echo $row['room_id']?>"><?php echo $row['room_name']?></option>
                                    <?php
                                       }
                                    ?>
                       
                                       </select>
                       
                   
                      </td>
                
                   
               </tr>

                <tr>
                <td> 

                
                

                Divice pic1: <input type="file" id="myFile" name="device_pic1">
                </td>
                </tr>

                <tr>
                   
                    <td> 
                    Divice pic2: <input type="file" id="myFile" name="device_pic2">
                    </td>
                    
                </tr>

               

                <tr>
                    
                    <td> 
                    <button type="submit" name="submit" class="btnn">Add device</button>
                    </td>
                   <td>
                   <a href="viewDevices_victor.php">View all devices</a><i class="fa-solid fa-arrow-right"></i>
                    </td>
                    <td> 
                   
                    <br/>
                    <?php 
                         
                         if(ISSET($_SESSION['message'])){
                           echo "<center><label>".$_SESSION['message']."</label></center>";
                         }

                         
                       ?>
                    </td>
                    
                </tr>
               
        </table>
                                     <br/><br/>
                           
                        
        </form>
       


        

 
        
</div>
  
 

   


    </div>


  </div>
  





</body>
</html>
