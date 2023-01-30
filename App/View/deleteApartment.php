<?php 

require_once'../Model/rooms.php';
require_once'../Model/user.query.php';
$msg="";
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

    $deleteUserApart = delete_user_apart_rooms($db,$id);
    $deleteUserRooms =  delete_user_devices($db,$id);

    if($deleteUserApart && $deleteUserRooms)
    {
    $result =delete_apart($db,$id);
    if($result)
    {
      $msg = "<div class='alert alert-success'>apartment deleted successfully</div>";
      header("Location:apartment.php?msg=$msg");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
  }
    else
    {
      $msg = "<div class='alert alert-danger'>error unable to delete apartment</div>";
      header("Location:UsersAdmin.php?msg=$msg");

    }
 }
?>