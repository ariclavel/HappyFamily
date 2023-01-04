<?php

session_start();
if(!isset($_SESSION['id']))
{
   header("Location:../home.php");
   die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  
  <!-- Font Awesome Cdn Link -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">

  
  <style type="text/css">
 

  .middle_part{
    margin-right:200px;
    
  }
  
  .row{
    display:flex;
    align-items:center;
    gap:3em;
  }
  .wrap{
    
    margin-left:50px;
    border-radius:7px;
    background:#5B2C6F;
    box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
    width: 200px;
    
  }

  .image2{
    border-radius:50px;
    margin-left:130px;
    margin-top:20px;
    
  }
  .main-body{
    margin-right: 230px;
   
   
   }

   .tit{
    margin-left:20px;
    color:white;
    position:absolute;
    top:150px;
    font-weight:bold;
    font-size:20px;
   } 
    #wead{
        cursor:grab;
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

<form method="POST">
         <table>
        
               
    
                <tr>
                            <td> 
                             <a class="weather">   
                            <div id="wead" class="wrap">
        <img class="image2" width="100px" height="100px" src="../img/weather.png">
        
        <p class="tit">WEATHER <br/>REPORT</p>
        </div>
                </a>
                            </td>
                            <td>
                            <a href="viewDevices_victor.php">
                            <div class="wrap">
        <img class="image2" width="100px" height="100px" src="../img/feedpet.png">
        <p class="tit">FEED <br/>PET</p>
        </div>    
        </a>
                            </td>

                            <td>
                            <a href="petTracker_victor.php">
                            <div class="wrap">
        <img class="image2" width="100px" height="100px" src="../img/trackPet.png">
        <p class="tit">TRACK <br/>PETS</p>
        </div>      
        </a>
                            </td>




                            <td>
                            <a href="health_report_victor.php">
                            <div class="wrap">
        <img class="image2" width="100px" height="100px" src="../img/pet-health.png">
        <p class="tit">HEALTH <br/>MONITOR</p>
        </div>      
        </a>
                            </td>
                
                </tr>
               

                

                
                
               
                                    </table> <br/><br/>
                           
                        
        </form>
       
        

           

              <div class="modal" id="div3">
                <div class="modal-content">
                    <span class="close-button">×</span>
                    <div  class="div33">
             
                            
                        <?php require('weather.php');?>
      
                    </div>
                   
                    </form>
                </div>
            </div>
  


  </div>


  <script>

var modal = document.querySelector(".modal");
var trigger = document.querySelector(".weather");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>
</body>
</html>
