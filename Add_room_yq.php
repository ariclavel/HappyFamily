<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();



if (ISSET($_POST['submit']))
  {
    $regid = $_SESSION['id'];
    $roomName=clean($_POST['room_name']);
    $roomNumber = clean($_POST['room_number']);
    $result =add_room($db,$roomName,$roomNumber,$regid);

     if($result)
     {

       $_SESSION['message'] = "<div class='alert alert-info'>ROOM ADDED SUCCESSFULLY</div>";
       
       header("Location: Add_room.php");
     }
     else
     {
       $_SESSION['message'] = "<div class='alert alert-info'>NOT ADDED</div>";
       header("Location: Add_room.php");
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
               <th><h4 class="text-right">ADD ROOM</h4></th>
        </tr>
                
                <tr>
                           
                            <td>
                            <input type="text" placeholder ="Room name" class="form-control"  name="room_name">
                            </td>
                </tr>
                <tr>
                           
                            <td>
                            <input type="text" placeholder ="Room number" class="form-control"  name="room_number">
                            </td>
                </tr>

                <tr>
                           
                            <td>
                            <!--<input type="text" placeholder ="reg id" class="form-control"  name="reg_id">-->
                            <input type="hidden" name="reg_id" value="<?php echo session_id($regID); ?>">
                            </td>
                </tr>

                <tr>
                    
                    <td> 
                    <button type="submit" name="submit" class="btnn">Add room</button>
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