<?php
date_default_timezone_set("Etc/GMT+8");
session_start();
require_once'../Model/rooms.php';
$msg="";
$UID = $_SESSION['id'];

$petID = $_GET['id'];

if (ISSET($_POST['ADDPET']))
  {
 $pic = $_FILES['pet_Pic'];
 $picName = $pic['name'];
 $picTmpName = $pic['tmp_name'];
 $picError = $pic['error'];
 $picExt = explode('.', $picName);
 $picActualExt = strtolower(end($picExt));
 $allowed = array('jpg','jpeg','png');


 $category= clean($_POST['Category']);
 $pet_name=clean($_POST['pet_name']);
 $description=clean($_POST['desc']);
 $date_created=date("Y-m-d H:i:s");
 if(in_array($picActualExt, $allowed))
 {
   if($picError === 0)
   {
    
     $userName = $_SESSION['name'];
     $picNameNew = $userName. $_SESSION['id'].".".$picActualExt;
     $picDestination = "../img/pet_pic/".$picNameNew;
     move_uploaded_file($picTmpName, $picDestination);
    
     
     $result2 = check_pet($db,$pet_name);
   
     if($result2->num_rows>0)
     {
         $msg = "<div class='alert text-danger'>Sorry pet already exist</div>";
         header("Location: ../View/Add_pet.php?msg=$msg");
     }
     else
     {
        if($pet_name !=" " &&  !empty($category) && $description !=" ")
        {
     $result =add_pet($db,$category,$pet_name,$description,$picNameNew,$date_created,$UID);
    
     if($result)
     {

     
       $msg = "<div class='alert alert-info'>New pet added successfully.</div>";
       header("Location: ../View/Add_pet.php?msg=$msg");
     
     }
     else
     {
    
       $msg= "<div class='alert text-danger'>There was an error in adding pet! Please Try again.</div>";
       header("Location: ../View/Add_pet.php?msg=$msg");
     }
    }
    else
    {
       $msg = "<div class='alert text-danger'>Error! invalid data not allowed.</div>";
       header("Location: ../View/Add_pet.php?msg=$msg");
    }
}
   }
   else
   {

     $msg = "<div class='alert text-danger'>There was an error in uploading your pet image! Please Try again!.</div>";
     header("Location: ../View/Add_pet.php?msg=$msg");
   }
 }
 else
 {
 
   $msg = "<div class='alert text-danger'>You cannot upload files with this extension.</div>";
   header("Location: ../View/Add_pet.php?msg=$msg");
 }
}




//this code will update pet

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

      
       $msg = "<div class='alert alert-info'>pet image updated successfully </div>";
   
       header("Location: ../View/editPets.php?id=$petID && msg=$msg"); 
     }
     else 
     {
     
       $msg = "<div class='alert alert-danger'>There was an error in uploading your pet Image! Please Try again!</div>";
       header("Location: ../View/editPets.php?id=$petID && msg=$msg");
     }
   }
   else
   {

     $msg = "<div class='alert alert-danger'>There was an error in uploading your profile image! Please Try again!</div>";
     header("Location: ../View/editPets.php?id=$petID && msg=$msg");
   }
 }
 else
 {

   $msg = "<div class='alert alert-danger'>You cannot upload files with this extension!</div>";
   header("Location: ../View/editPets.php?id=$petID && msg=$msg");
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
       
        $msg = "<div class='alert alert-info'>pet profile updated successfully.</div>";
        header("Location: ../View/editPets.php?id=$petID && msg=$msg");
          
         
      }
      else
      {
        $msg = "<div class='alert alert-danger'>Sorry! error updating pet profile</div>";
        header("Location: ../View/editPets.php?id=$petID && msg=$msg");
      }
    }
    else
    {
      $msg = "<div class='alert text-danger'>Error! invalid data not allowed.</div>";
      header("Location: ../View/editPets.php?id=$petID && msg=$msg");
    }
    }
?>