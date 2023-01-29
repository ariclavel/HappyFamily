<?php
session_start();

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
   .user_email
   {
    margin-left:30px;
   }

   .all-div{
    display:flex;
   }
   .hedd{
    
    width:100%;
   }
   .text-title{
    text-align:center;
   }
  
 .div33{
  display:none;
  border-left:1px solid black;
  border-right:1px solid black;
 }
 .image2{
  border-radius:50%;
  margin-left: 30px;
  margin-top: 20px;
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
   
   
<div class="profile">
  <div class="middle_part">
        
            
       

        <form name="form1" id="form1" action="/action_page.php">
         
        <div class="all-div">
        <div class="div2">
         <div class="profile_pxx">
                                 <img class="image2" width="120px" height="120px" src="../img/pet2.png"><br/><br/><span class="pet_name">Name: Nanny-p</span>
                                <div ><button type="button" class="update_pet">change photo</button></div>
                                
                            </div>

         </div>
        <div class="div1">
         <table>
         <tr>
          
             <td>
             <h2 class="text-title">Edit pet</h2>
             </td>
          </tr>
          <tr>
          
             <td>
             <select class="form-control" name="subject" id="subject">
                        <option value="" selected="selected">Select category</option>
                        <option value="" >Dogs</option>
                        <option value="" >Cats</option>
    
                      </select>
             </td>
          </tr>

          <tr>
             <td>
             <input type="text" class="form-control" placeholder="Pet name" value="">
             </td>
          </tr>

          <tr>
             <td>
             <label class="labels">Description</label><br/>
                            <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
             </td>
          </tr>

          <tr>
             <td>
             <button class="btnn" type="button">Update</button><button class="btnn" id="toggle" type="button">View weather</button><a href="petTracker_victor.php"> <i class="fa-solid fa-location-check">  </i>Pet location</a>
             </td>
            
          </tr>

        </table>
         </div>
        
         <div  class="div33" id="div3">
             
                            
             <?php require('weather.php');?>
      
              </div>
     
             

                </div>
                
        </form>
         

            </div>
           
           
            <div class="modal">
                <div class="modal-content">
                    <span class="close-button">×</span>
                    <h4>Update pet photo</h4>
                    <form action="/action_page.php">
                        <input type="file" id="myFile" name="filename">
                        <button type="submit" name ="update">upload</button>
                   
                    </form>
                </div>
            </div>
            
    </div>


       </div>
       </div>

   </div>


</div>
  
 

   


    </div>


  </div>
  <script>
    const targetDiv = document.getElementById("div3");
    const btn = document.getElementById("toggle");
     
    btn.onclick = function () {
      if (targetDiv.style.display !== "none") {
        targetDiv.style.display = "none";
      } else {
        targetDiv.style.display = "block";
      }
    };
  </script>

<script>

var modal = document.querySelector(".modal");
var trigger = document.querySelector(".update_pet");
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
