<?php 

require_once'../Model/rooms.php';
 if(isset($_GET['id']))
 {
    $id =$_GET['id'];

 
    $result =delete_user($db,$id);
    if($result)
    {
      header("Location:All_Users.php?msg=user deleted successfully");
    }
    else
    {
        echo "Failed: ". mysqli_error($db);
    }
 }
?>