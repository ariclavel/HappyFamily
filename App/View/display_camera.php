<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>

  
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
  <script>

        /*window.onload=function non(){
        document.getElementById("vido").style.cssText = "display:none;";
        }
        function open_video(){
            document.getElementById("vido").style.cssText = "display:block;";
        }*/
        function showandhide(){
            var v = document.getElementById("vido");
            if(vido.style.visibility=='visible')
            {
              vido.style.visibility='hidden';
              
            }else {
              vido.style.visibility='visible';
            }          
        }
    </script>

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
    <th><h4 class="text-right">CAMERA</h4></th>
  </tr>
  
  <!--<tr>
                       
    <td>
      <select class="form-control" name="room">
        <option value="" selected="selected">Select Camera</option>
          <?php
            //$tbl_ltype = display_cameras($db);
            //while($row=$tbl_ltype->fetch_array()){
          ?>
                                    
        <option value="<?php //echo $row['device_id']?>"><?php //echo $row['device_name']?></option>
          <?php
          //}
          ?>
                       
      </select>
    </td>
  </tr>-->

  <tr>
    
    <td>
            <input type="button" id="btn" onclick="showandhide()" value="Turn on/off the camera" class="btnn"><br>
    </td>
  </tr>       
  <tr> 
      <td> 
            <div id="vido" style="visibility:hidden">
                <video controls loop>
                    <source src="../Videos/cat.mp4" type="video/mp4">
                </video>
            </div>
      </td>
  </tr>
</table>
<br>
        </form>
       


        

 
        
</div>
  
 

   


    </div>


  </div>
  





</body>
</html>