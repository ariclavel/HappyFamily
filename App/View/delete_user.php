<?php 
require_once'../Model/rooms.php';
require_once'../Model/user.query.php';
$msg="";

 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

    $deleteApart = delete_user_apart($db,$id);
    $deleteRoom = delete_user_apart_rooms($db,$id);
    
    $deleteDevices =  delete_user_devices($db,$id);
    $deletePet = delete_user_pet($db,$id);
    $deleteAddress = delete_user_address($db,$id);
    $deleteSchedule = delete_user_schedule($db,$id);


    if($deleteApart && $deleteRoom && $deletePet && $deleteAddress &&  $deleteSchedule && $deleteDevices)
    {
      $result =delete_user($db,$id);
      if($result)
      {
        $msg = "<div class='alert alert-success'>user deleted successfully</div>";
        
        header("Location:UsersAdmin.php?msg=$msg");
      }
      else
      {
          echo "Failed: ". mysqli_error($db);
      }
    }
    else
    {
      $msg = "<div class='alert alert-danger'>error unable to delete user</div>";
      header("Location:UsersAdmin.php?msg=$msg");

    }
    
 }
?>