<?php
date_default_timezone_set("Etc/GMT+8");
session_start();
require_once'../Model/user.query.php';


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
   
   .user_email
   {
    margin-left:30px;
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
  .search_box input{width: 200px;}
  .content{width: 500px;}
}
@media (max-width: 715px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 30px;}
  .search_box{margin-left: 60px;}
  .both{display: block;}
  .profile{display: -webkit-box;}
  .search_box input{width: 200px;}
  .content{width: 500px;}
  .side_navbar{width: 120px;}
  .side_navbar a{padding: 10px;}
}
@media (max-width: 650px) {
  .logo a{margin: 0px;}
  .titt{margin-left: 15px;}
  .search_box{margin-left: 15px;}
  .both{display: block;}
  .profile{display: -webkit-box;}
  .search_box input{width: 200px;}
  .content{width: 350px;}
  .middle_part{width: 150px;}
.form-control{width:150px;}
  .both{margin: 0px;}
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
      
       <div class="profile_px">
                  <?php
                      $user_id = $_SESSION['id'];
                                           
											$tbl_user=$db->query("SELECT * FROM `registration` WHERE reg_id='$user_id'");
											$fetch=$tbl_user->fetch_array();
										?>
       
       <img class="image" id="imm" width="130px" height="130px" src="../img/profile_pix/<?php echo $fetch['profile_pic']; ?>"><br/>
       <span class="User_name"><?php echo $fetch['first_name']; ?> <?php echo $fetch['last_name']; ?></span><br/><span class="user_email">(<?php echo $_SESSION['userEmail']?>)</span>
       
      
       <div ><button type="button"  class="update_photo">change photo</button></div><br/>
      
   </div>

   
   <div class="middle_part">
       <div class="settings">
           <h4 class="text-right">Profile Settings</h4>
       </div>

       <form method="POST" action="../Controller/userController.php">
           <div class="both">
                 <div class="both_1">
                   <div class="col-md-12"><input type="text" class="form-control" name="fname" placeholder="first name" value="<?php echo $_SESSION['name']?>"></div>
                   <div class="col-md-12"><input type="text" class="form-control" name="lname" placeholder="last name " value="<?php echo $_SESSION['surname']?>"></div>
                   <div class="col-md-12"><input type="text" class="form-control" name="phone_no" placeholder="enter phone number" value="<?php echo $fetch['phoneNumber']?>"></div>


                   <?php
                      $user_id = $_SESSION['id'];
                                           
											$tbl_address=$db->query("SELECT * FROM `address` WHERE reg_id='$user_id' LIMIT 1");
											$fetch2=$tbl_address->fetch_array();
										   ?>

                   <div class="col-md-12"> <textarea placeholder="Address line one" value="<?php echo $fetch2['address']?>" name="address_1"cols="30" rows="5"></textarea></div>
                   <div class="col-md-12"><input type="text" class="form-control" name="postcode1" value="<?php if(!$fetch2){}else {echo $fetch2['zip_code'];}?>" placeholder="Address one Postal code"></div>
                  
                      
                 
               </div>

                 <div class="both_2">
                 <div class="col-md-12"> <textarea placeholder="Address line two(optional)" name="address_2"cols="30" rows="5"></textarea></div>
                   <div class="col-md-12">
                    <select class="form-control" name="country" id="country">
                       <option value="" selected="selected">Select country</option>
                       <option>Nigeria</option>
                       <option>France</option>
                       <option>UK</option>
                     </select>
                    </div>  
               
                     <div class="col-md-12">
                      <select class="form-control" name="state" id="state">
                       <option value="" selected="selected">Select State/region</option>
                       <option>Paris</option>
                       <option>Touluese</option>
                       <option>Samtel</option>
                     </select>
                    </div>  
                     <div class="col-md-12"><input type="text" class="form-control" name="postcode2" placeholder="Address two postal code(optional)" value=""></div>
       
       <div class="mt-5 text-center"><button type="submit" class="btnn" name ="update_user_profile">Save Profile</button></div>
                 </div>
                 
       </form>
           </div>
          
           <div class="modal">
               <div class="modal-content">
                   <span class="close-button">×</span>
                   <h3>Update profile photo</h3>
                   <form method="POST" enctype="multipart/form-data" action="../Controller/userController.php">
                       <input type="file" id="myFile" name="userPic">
                       <button type="submit" name ="update_user_photo">upload</button>
                   </form>
               </div>
              
           </div>
           <?php 
										
                    if(ISSET($_GET['msg'])){
                      echo "<center><label>".$_GET['msg']."</label></center>";
                    }
                  ?>
                 </div>
   </div>


       </div>
       </div>

   </div>


</div>

    </div>


  </div>
  

<script>

var modal = document.querySelector(".modal");
var trigger = document.querySelector(".update_photo");
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
