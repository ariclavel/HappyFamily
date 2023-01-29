<?php
date_default_timezone_set("Etc/GMT+8");
require_once'../Model/rooms.php';
session_start();


unset($_SESSION['message']);
$petID = $_GET['id'];


if (ISSET($_POST['update_pet_photo']))
  {
 $pic = $_FILES['petPix'];
 $picName = $pic['name'];
 $picTmpName = $pic['tmp_name'];
 $picError = $pic['error'];
 $picExt = explode('.', $picName);
 $picActualExt = strtolower(end($picExt));
 $allowed = array('jpg','jpeg','png');
 if(in_array($picActualExt, $allowed))
 {
   if($picError === 0)
   {
   
     $userName = $_SESSION['name'];
     $picNameNew = $userName. $_SESSION['id'].".".$picActualExt;
     $picDestination = "../img/pet_pic/".$picNameNew;
     move_uploaded_file($picTmpName, $picDestination);
 
     
     $result = Update_pet_image($db,$picNameNew,$petID);
     if($result)
     {

      
      $_SESSION['message'] = "<div class='alert alert-info'>pet image updated successfully </div>";
       
     }
     else
     {
     
      $_SESSION['message'] = "<div class='alert alert-danger'>There was an error in uploading your pet Image! Please Try again!</div>";
       
     }
   }
   else
   {

    $_SESSION['message'] = "<div class='alert alert-danger'>There was an error in uploading your profile image! Please Try again!</div>";
     
   }
 }
 else
 {

  $_SESSION['message'] = "<div class='alert alert-danger'>You cannot upload files with this extension!</div>";
  
 }
}


if (ISSET($_POST['update_pet']))
  {
    
    $category= clean($_POST['Category']);
    $pet_name=clean($_POST['pet_name']);
    $description=clean($_POST['desc']);

    if($pet_name !=" " &&  !empty($category) && $description !=" ")
    {
     $result2 = Update_pet($db,$category,$pet_name,$description,$petID);

      if($result2)
      {
        
        $_SESSION['message']= "<div class='alert alert-info'>pet profile updated successfully.</div>";
        
      }
      else
      {
        $_SESSION['message'] = "<div class='alert alert-danger'>Sorry! error updating pet profile</div>";
        
      }
    }
    else
    {
      $_SESSION['message'] = "<div class='alert text-danger'>Error! invalid data not allowed.</div>";
      
    }
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

   .both{
    display:flex;
   }

   .image2{
     border-radius:50%;
     margin-left:45px;
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
      
      
     

<?php
                     
                     $tbl_pet = display_One_pet($db, $petID);
                     
                     $fetch=$tbl_pet->fetch_array();
                   ?>
  <div class="middle_part">
        <div class="settings">
            <h4 class="text-right">Edit pet</h4>
        </div>

        <form method="POST">
        <div class="both">
             <div class="both_1">
                    <div class="col-md-12">
                      <select class="form-control" name="Category" id="Category">
                        <option value="" selected="selected">Select category</option>
                        <option value="Dogs" >Dogs</option>
                        <option value="Cats" >Cats</option>
                        <option value="Snakes" >Snakes</option>
                        <option value="Pigs" >Pigs</option>
    
                      </select>
                    </div>  
                  
                    <div class="col-md-12"><input type="text" value="<?php echo $fetch['name']; ?>" name="pet_name" class="form-control" placeholder="Pet name"></div>
                    
                          <div class="col-md-12">
                            <label class="labels">Description</label><br/>
                            <textarea  placeholder="Pet description" value="<?php echo $fetch['desc']; ?>" name="desc" rows="4" cols="50"></textarea>
                           </div>

                          <div> <?php 
										
                    if(ISSET($_SESSION['message'])){
                      echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                    }

                                          
                  ?>
</div>
                           <div class="mt-5 text-center"><button type="submit" class="btnn" name="update_pet" type="button">Update</button></div>
                    </div>
                    
                    <div class="both_2">
             
                    
        
                            <div class="profile_pxx">
                                 <img class="image2" width="100px" height="100px" src="../img/pet_pic/<?php echo $fetch['image']; ?>"><br/><br/><span class="pet_name">Name: Nanny-p</span>
                                <div ><button type="button" class="update_pet">change photo</button></div>
                                
                            </div>
                       
               </div>
               </div>
                </div>


                
        </form>
         

            </div>
           
           
            <div class="modal">
                <div class="modal-content">
                    <span class="close-button">×</span>
                    <h1>Update pet photo</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" id="myFile" name="petPix">
                        <button type="submit" name ="update_pet_photo">upload</button>
                   
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
