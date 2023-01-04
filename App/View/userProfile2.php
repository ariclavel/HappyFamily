<?php
date_default_timezone_set("Etc/GMT+8");
session_start();


require_once'../Model/user.query.php';
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

if (ISSET($_POST['update_user']))
  {
    $userID = $_SESSION['id'];
     $name= clean($_POST['fname']);
     $lname=clean($_POST['lname']);
     $phoneNumber=clean($_POST['phone_no']);
     $result2 = update_user($db,$userID,$name,$lname,$phoneNumber);

     //for address
     $address1= clean($_POST['address_1']);
     $address2=clean($_POST['address_2']);
     $country=clean($_POST['country']);
     $city=clean($_POST['state']);
     $postCode1=clean($_POST['postcode1']);
     $postCode2=clean($_POST['postcode2']);
     
     $arr_postalCode=[];
     $arr_postalCode[0]=$postCode1;
     $arr_postalCode[1]=$postCode2;
     $array_size_post=sizeof($arr_postalCode);

     $arr_address=[];
     $arr_address[0]=$address1;
     $arr_address[1]= $address2;
     
     $array_size=sizeof($arr_address);
     
    //  for($i=0; $i<$array_size; $i++)
    //  {
    //   $result =add_user_address($db,$arr_address[$i],$country,$city,$arr_postalCode[$i],$userID);

    //  }
   

    if($address1 !="" && $postCode1!="")
    {
      $result =add_user_address($db,$arr_address[0],$country,$city,$arr_postalCode[0],$userID);
      if($result2)
      {
        
        $_SESSION['message'] = "<div class='alert alert-info'>User profile updated successfully.</div>";

      }
      else
      {
        $_SESSION['message'] = "<div class='alert alert-danger'>Sorry! error updating profile</div>";
      }
    }
    else
    {
      $_SESSION['message'] = "<div class='alert alert-danger'>Sorry! error invalid! address and post code.</div>";
    }

    if($address1 !=null && $postCode1!=null)
    {
      $result =add_user_address($db,$arr_address[1],$country,$city,$arr_postalCode[1],$userID);
    }
    else
    {
      
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

       <form method="POST">
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
                   <div class="col-md-12"><input type="text" class="form-control" name="postcode1" value="<?php echo $fetch2['zip_code']?>" placeholder="Address one Postal code"></div>
                  
                      
                 
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
       
       <div class="mt-5 text-center"><button type="submit" class="btnn" name ="update_user">Save Profile</button></div>
                 </div>
                 <?php 
										
                    if(ISSET($_SESSION['message'])){
                      echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                    }

                                          unset($_SESSION['message']);
                  ?>
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
