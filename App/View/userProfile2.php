<?php
date_default_timezone_set("Etc/GMT+8");
session_start();


require_once'../Model/user.query.php';
//  if (ISSET($_POST['save']))
//  {
//  $productType = $_POST['type'];
//  $productName = dataFilter($_POST['pname']);
//  $productInfo = $_POST['pinfo'];
//  $productPrice = dataFilter($_POST['price']);
//  $user_id = $_SESSION['id'];

//  $sql = "INSERT INTO product (user_id, product, pcat, pinfo, price)
//       VALUES ('$user_id', '$productName', '$productType', '$productInfo', '$productPrice')";
//  $result = mysqli_query($db->conn, $sql);
//  if(!$result)
//  {
//    $_SESSION['message'] = "Unable to upload Product !!!";
//    header("Location: Product.php");
//  }
//  else {
//    $_SESSION['message'] = "successfull !!!";
//  }
if (ISSET($_POST['update']))
  {
 $pic = $_FILES['userPic'];
 $picName = $pic['name'];
 $picTmpName = $pic['tmp_name'];
 $picSize = $pic['size'];
 $picError = $pic['error'];
 $picType = $pic['type'];
 $picExt = explode('.', $picName);
 $picActualExt = strtolower(end($picExt));
 $allowed = array('jpg','jpeg','png');
 if(in_array($picActualExt, $allowed))
 {
   if($picError === 0)
   {
     $_SESSION['userPic'] = $_SESSION['id'];
     $userName = $_SESSION['name'];
     $picNameNew = $userName. $_SESSION['id'].".".$picActualExt ;
     $picDestination = "../img/profile_pix/".$picNameNew;
     move_uploaded_file($picTmpName, $picDestination);
     $id = $_SESSION['id'];

     $sql = "UPDATE Registration SET profile_pic='$picNameNew' WHERE reg_id='$id';";

     $result = mysqli_query($db, $sql);
     if($result)
     {

       $_SESSION['message'] = "profile Image Uploaded successfully !!!";
       header("Location: userProfile2.php");
     }
     else
     {
       //die("bad");
       $_SESSION['message'] = "There was an error in uploading your profile Image! Please Try again!";
       header("Location: userProfile2.php");
     }
   }
   else
   {
     $_SESSION['message'] = "There was an error in uploading your profile image! Please Try again!";
     header("Location: userProfile2.php");
   }
 }
 else
 {
   $_SESSION['message'] = "You cannot upload files with this extension!!!";
   header("Location: userProfile2.php");
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | Happy Family</title>
  <link rel="stylesheet" href="../css/user_profile_victor.css">
  <link rel="stylesheet" href="style.css" />
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
       
      
       <div ><button type="button" id="btnn" class="update_photo">change photo</button></div><br/>
      
   </div>

   
   <div class="middle_part">
       <div class="settings">
           <h4 class="text-right">Profile Settings</h4>
       </div>

       <form name="form1" id="form1" action="/action_page.php">
           <div class="both">
                 <div class="both_1">
                   <div class="col-md-12"><input type="text" class="form-control" placeholder="first name" value="<?php echo $_SESSION['name']?>"></div>
                   <div class="col-md-12"><input type="text" class="form-control" placeholder="last name " value="<?php echo $_SESSION['surname']?>"></div>
                   <div class="col-md-12"><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                   <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                   
                      
                 
               </div>

                 <div class="both_2">
                   <div class="col-md-12"><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>      
                   <div class="col-md-12"><select class="form-control" name="subject" id="subject">
                       <option value="" selected="selected">Select country</option>
                       <option value="" >Nigeria</option>
                       <option value="" >France</option>
                       <option value="" >UK</option>
                     </select></div>  
               
                     <div class="col-md-12"><select class="form-control" name="subject" id="subject">
                       <option value="" selected="selected">Select State/region</option>
                       <option value="" >Paris</option>
                       <option value="" >Touluese</option>
                       <option value="" >Samtel</option>
                     </select></div>  
                 
       
       <div class="mt-5 text-center"><button class="btnn" type="button">Save Profile</button></div>
                 </div>
                 </div>
       </form>
           </div>
          
           <div class="modal">
               <div class="modal-content">
                   <span class="close-button">×</span>
                   <h3>Update profile photo</h3>
                   <form method="POST" enctype="multipart/form-data">
                       <input type="file" id="myFile" name="userPic">
                       <button type="submit" name ="update">upload</button>
                   </form>
               </div>
               <?php 
										
                    if(ISSET($_SESSION['message'])){
                      echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                    }

                                          unset($_SESSION['message']);
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
